<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/core/config.php';
require_once __DIR__ . '/../includes/core/orders.php';
require_once __DIR__ . '/../includes/core/fulfilment.php';
require_once __DIR__ . '/../includes/core/admin-auth.php';

nix_require_admin();
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed.']);
    exit;
}

try {
    $csrf = (string)($_POST['csrf'] ?? '');
    if (!nix_order_check_csrf($csrf)) {
        throw new RuntimeException('Invalid security token. Refresh the page and try again.');
    }

    $id = filter_var($_POST['order_id'] ?? null, FILTER_VALIDATE_INT);
    if (!$id) throw new InvalidArgumentException('Invalid order.');

    $pdo = nix_order_db();
    $stmt = $pdo->prepare('SELECT * FROM nix_orders WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $id]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$order) throw new InvalidArgumentException('Order not found.');

    $courier = trim((string)($_POST['courier_name'] ?? ''));
    $tracking = trim((string)($_POST['tracking_number'] ?? ''));
    $fulfillment = (string)($_POST['fulfillment_status'] ?? $order['fulfillment_status']);

    if (!in_array($fulfillment, nix_v4_allowed_fulfillment_statuses(), true)) {
        throw new InvalidArgumentException('Invalid fulfilment status.');
    }
    if (mb_strlen($courier) > 120 || mb_strlen($tracking) > 160) {
        throw new InvalidArgumentException('Courier or tracking value is too long.');
    }

    $pdo->beginTransaction();

    $set = 'courier_name = :courier_name, tracking_number = :tracking_number, fulfillment_status = :fulfillment_status';
    $params = [
        'courier_name' => $courier !== '' ? $courier : null,
        'tracking_number' => $tracking !== '' ? $tracking : null,
        'fulfillment_status' => $fulfillment,
        'id' => $id,
    ];

    if ($fulfillment === 'shipped' && empty($order['shipped_at'])) {
        $set .= ', shipped_at = NOW()';
    }
    if ($fulfillment === 'delivered' && empty($order['delivered_at'])) {
        $set .= ', delivered_at = NOW()';
    }

    $update = $pdo->prepare("UPDATE nix_orders SET {$set}, updated_at = NOW() WHERE id = :id");
    $update->execute($params);

    $eventStmt = $pdo->prepare(
        'INSERT INTO nix_order_events
         (order_id, event_type, old_status, new_status, actor_type, actor_label, note)
         VALUES (:order_id, :event_type, :old_status, :new_status, :actor_type, :actor_label, :note)'
    );

    if ((string)$fulfillment !== (string)$order['fulfillment_status']) {
        $eventStmt->execute([
            'order_id' => $id,
            'event_type' => 'fulfillment_status_changed',
            'old_status' => $order['fulfillment_status'],
            'new_status' => $fulfillment,
            'actor_type' => 'admin',
            'actor_label' => 'Owner',
            'note' => 'Fulfilment status updated.',
        ]);
    }

    if ($courier !== (string)($order['courier_name'] ?? '') || $tracking !== (string)($order['tracking_number'] ?? '')) {
        $eventStmt->execute([
            'order_id' => $id,
            'event_type' => 'shipment_details_updated',
            'old_status' => null,
            'new_status' => null,
            'actor_type' => 'admin',
            'actor_label' => 'Owner',
            'note' => 'Courier and tracking details updated.',
        ]);
    }

    $pdo->commit();
    echo json_encode(['ok' => true, 'message' => 'Fulfilment saved.']);
} catch (InvalidArgumentException $e) {
    if (isset($pdo) && $pdo instanceof PDO && $pdo->inTransaction()) $pdo->rollBack();
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => $e->getMessage()]);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO && $pdo->inTransaction()) $pdo->rollBack();
    error_log('NIXGO9 admin fulfilment error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Unable to update fulfilment details.']);
}
