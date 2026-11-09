<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/core/config.php';
require_once __DIR__ . '/includes/core/tracking-data.php';

header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('X-Content-Type-Options: nosniff');

$orderId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$token = trim((string)($_GET['token'] ?? ''));
$order = nixgo9_get_tracking_order($orderId ?: null, $token);

if (!$order) {
    http_response_code(404);
    echo json_encode(['ok' => false], JSON_UNESCAPED_SLASHES);
    exit;
}

echo json_encode([
    'ok' => true,
    'status' => $order['status'],
    'updated_at' => $order['status_updated_at'],
    'current_step_index' => $order['current_step_index'],
], JSON_UNESCAPED_SLASHES);
