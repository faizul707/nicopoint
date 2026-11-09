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
    if (!$id) {
        throw new InvalidArgumentException('Invalid order ID.');
    }

    $allowedOrder = ['pending_review','confirmed','processing','ready_to_ship','shipped','delivered','cancelled','on_hold'];
    $allowedPayment = ['not_started','pending','paid','failed','refunded'];
    $allowedFulfillment = nix_v4_allowed_fulfillment_statuses();

    $orderStatus = (string)($_POST['order_status'] ?? '');
    $paymentStatus = (string)($_POST['payment_status'] ?? '');
    $fulfillmentStatus = (string)($_POST['fulfillment_status'] ?? '');

    if (!in_array($orderStatus, $allowedOrder, true)) {
        throw new InvalidArgumentException('Invalid order status.');
    }
    if (!in_array($paymentStatus, $allowedPayment, true)) {
        throw new InvalidArgumentException('Invalid payment status.');
    }
    if (!in_array($fulfillmentStatus, $allowedFulfillment, true)) {
        throw new InvalidArgumentException('Invalid fulfilment status.');
    }

    $pdo = nix_order_db();
    $stmt = $pdo->prepare('SELECT * FROM nix_orders WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $id]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        throw new InvalidArgumentException('Order not found.');
    }

    $pdo->beginTransaction();

    $update = $pdo->prepare(
        'UPDATE nix_orders
         SET order_status = :order_status,
             payment_status = :payment_status,
             fulfillment_status = :fulfillment_status,
             updated_at = NOW()
         WHERE id = :id'
    );
    $update->execute([
        'order_status' => $orderStatus,
        'payment_status' => $paymentStatus,
        'fulfillment_status' => $fulfillmentStatus,
        'id' => $id,
    ]);

    $events = [
        ['order_status', 'order_status_changed', $order['order_status'], $orderStatus, 'Order status updated.'],
        ['payment_status', 'payment_status_changed', $order['payment_status'], $paymentStatus, 'Payment status updated.'],
        ['fulfillment_status', 'fulfillment_status_changed', $order['fulfillment_status'], $fulfillmentStatus, 'Fulfilment status updated.'],
    ];

    $eventStmt = $pdo->prepare(
        'INSERT INTO nix_order_events
         (order_id, event_type, old_status, new_status, actor_type, actor_label, note)
         VALUES (:order_id, :event_type, :old_status, :new_status, :actor_type, :actor_label, :note)'
    );

    foreach ($events as $event) {
        if ((string)$event[2] === (string)$event[3]) {
            continue;
        }

        $eventStmt->execute([
            'order_id' => $id,
            'event_type' => $event[1],
            'old_status' => $event[2],
            'new_status' => $event[3],
            'actor_type' => 'admin',
            'actor_label' => 'Owner',
            'note' => $event[4],
        ]);
    }

    $pdo->commit();

    echo json_encode(['ok' => true, 'message' => 'Order updated.']);
} catch (InvalidArgumentException $e) {
    if (isset($pdo) && $pdo instanceof PDO && $pdo->inTransaction()) $pdo->rollBack();
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => $e->getMessage()]);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO && $pdo->inTransaction()) $pdo->rollBack();
    error_log('NIXGO9 admin update-order error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Unable to update this order right now.']);
}
