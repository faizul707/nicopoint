<?php
declare(strict_types=1);

/**
 * NIXGO9 — Order confirmation (redesigned)
 * Left:  receipt printer = what was ordered (items, totals, address)
 * Right: thank-you, live tracker, what happens next, help, suggestions
 */

require_once __DIR__ . '/includes/core/config.php';
require_once __DIR__ . '/includes/core/orders.php';
require_once __DIR__ . '/includes/core/customer-auth.php';
require_once __DIR__ . '/includes/components/receipt-printer.php';

if (session_status() === PHP_SESSION_NONE) session_start();   // same session as checkout

$orderNumber = nix_order_clean((string)($_GET['order'] ?? ''), 32);
$order  = null;
$items  = [];
$events = [];

if ($orderNumber !== '') {
    try {
        $pdo = nix_order_db();
        // Only the buyer (same browser session) or the signed-in customer with the
        // same email can open an order — order numbers can't be guessed to reveal data.
        $receipt = nix_receipt_load($orderNumber);
        if ($receipt) {
            $order = $receipt['order'];
            $items = $receipt['items'];
            $ev = $pdo->prepare('SELECT * FROM nix_order_events WHERE order_id = :id ORDER BY created_at ASC, id ASC');
            $ev->execute([':id' => $order['id']]);
            $events = $ev->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Throwable $e) {
        error_log('NIXGO9 confirmation error: ' . $e->getMessage());
    }
}

$e = static fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');

/* ---------- Order facts ---------- */
$firstName = $order ? (strtok((string)$order['customer_name'], ' ') ?: 'friend') : '';
$itemCount = array_sum(array_map(static fn($i) => (int)$i['quantity'], $items));
$placedAt  = $order && !empty($order['created_at']) ? strtotime((string)$order['created_at']) : time();
$customer  = function_exists('nix_customer_user') ? nix_customer_user() : null;

/* ---------- Tracker ----------
 * Stages in order. The current stage comes from order_status.
 */
$status = (string)($order['order_status'] ?? 'pending_review');
$stages = [
    ['key' => 'placed',     'title' => 'Order placed',      'text' => 'We’ve saved your order and details.'],
    ['key' => 'review',     'title' => 'Under review',      'text' => 'Age and delivery eligibility are checked.'],
    ['key' => 'confirmed',  'title' => 'Confirmed',         'text' => 'You’ll get an email with the next steps.'],
    ['key' => 'shipped',    'title' => 'Packed & shipped',  'text' => 'Tracking details arrive by email.'],
    ['key' => 'delivered',  'title' => 'Delivered',         'text' => 'Enjoy — and keep it out of reach of children.'],
];
$statusToIndex = [
    'pending_review' => 1, 'review' => 1, 'under_review' => 1,
    'confirmed' => 2, 'processing' => 2, 'paid' => 2,
    'shipped' => 3, 'dispatched' => 3,
    'delivered' => 4, 'completed' => 4,
];
$current   = $statusToIndex[$status] ?? 1;
$cancelled = in_array($status, ['cancelled', 'canceled', 'rejected'], true);

/* timestamp for "Order placed" from the first event, if any */
$placedEvent = $events[0]['created_at'] ?? ($order['created_at'] ?? null);

/* ---------- Suggestions: 3 flavours not in this order ---------- */
$suggest = [];
$shopFile = __DIR__ . '/includes/data/shop-flavours.php';
if ($order && is_file($shopFile)) {
    $shop = require $shopFile;
    $ordered = array_map(static fn($i) => strtolower(trim((string)$i['product_name'])), $items);
    foreach ($shop['flavours'] ?? [] as $f) {
        if (in_array(strtolower($f['name']), $ordered, true)) continue;
        if (!is_file(__DIR__ . '/assets/images/cans/' . $f['id'] . '.webp')) continue;
        $suggest[] = $f;
        if (count($suggest) === 3) break;
    }
}

$supportEmail = defined('SUPPORT_EMAIL') ? SUPPORT_EMAIL : (defined('COMPANY_EMAIL') ? COMPANY_EMAIL : '');
$phone        = defined('PHONE_NUMBER') && strpos((string)PHONE_NUMBER, 'X') === false ? PHONE_NUMBER : '';

$page = [
    'title'       => ($order ? 'Order ' . $order['order_number'] . ' received' : 'Order confirmation') . ' | NIXGO9',
    'description' => 'NIXGO9 order confirmation.',
    'keywords'    => 'NIXGO9 order confirmation',
    'canonical'   => BASE_URL . 'order-confirmation.php',
    'body_class'  => 'order-confirmation-page nxc-page',
];

require_once __DIR__ . '/includes/layout/header.php';
?>
<meta name="robots" content="noindex,nofollow">
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= CSS_PATH ?>receipt-printer.css?v=4">
<link rel="stylesheet" href="<?= CSS_PATH ?>nx-confirmation.css?v=2">

<main id="main-content" class="nxc" data-current="<?= (int)$current ?>">
    <div class="nxc-bg" aria-hidden="true"><i></i><i></i><i></i></div>
    <canvas class="nxc-confetti" id="nxc-confetti" aria-hidden="true"></canvas>

<?php if ($order): ?>
    <div class="nxc-wrap">

        <!-- ============ HERO (right column, first on mobile) ============ -->
        <header class="nxc-hero">
            <div class="nxc-eyebrow">
                <span class="nxc-pill <?= $cancelled ? 'is-cancel' : '' ?>"><span class="nxc-dot"></span><?= $cancelled ? 'Cancelled' : $e($stages[$current]['title']) ?></span>
                <span>Order <?= $e($order['order_number']) ?></span>
            </div>
            <h1>
                <span class="nxc-ln"><span>Thank you, <?= $e($firstName) ?>.</span></span>
                <span class="nxc-ln"><span class="nxc-serif">Your order is successfully placed.</span></span>
            </h1>
            <p class="nxc-lead">We’ve received your order and we’re reviewing it now. Your receipt is printing now — you’ll also get updates at <strong><?= $e($order['customer_email']) ?></strong>.</p>

            <dl class="nxc-facts">
                <div>
                    <dt>Order number</dt>
                    <dd><button type="button" class="nxc-copy" data-copy="<?= $e($order['order_number']) ?>" aria-label="Copy order number"><?= $e($order['order_number']) ?> <span class="nxc-copy-ico" aria-hidden="true">⧉</span></button></dd>
                </div>
                <div><dt>Placed</dt><dd><?= $e(date('d M Y, H:i', $placedAt)) ?></dd></div>
                <div><dt>Items</dt><dd data-count="<?= (int)$itemCount ?>"><?= (int)$itemCount ?></dd></div>
                <div><dt>Total</dt><dd class="nxc-gold"><?= $e(nix_receipt_money($order['total'], (string)($order['currency'] ?? 'INR'))) ?></dd></div>
            </dl>
        </header>

        <!-- ============ RECEIPT PRINTER (left column) ============ -->
        <aside class="nxc-print" aria-label="Your receipt">
            <?php nix_receipt_printer($order, $items, ['actions' => 'print']); ?>
        </aside>

        <!-- ============ DETAILS (right column) ============ -->
        <div class="nxc-main">

            <!-- Tracker -->
            <section class="nxc-card nxc-track nxc-rv" aria-labelledby="nxc-track-title">
                <div class="nxc-card-head">
                    <h2 id="nxc-track-title">Order status</h2>
                    <span class="nxc-muted">Updated live as we process it</span>
                </div>
                <?php if ($cancelled): ?>
                    <p class="nxc-cancel">This order has been cancelled. If this is unexpected, please contact us.</p>
                <?php else: ?>
                <ol class="nxc-steps" style="--n:<?= count($stages) ?>">
                    <span class="nxc-rail" aria-hidden="true"><i id="nxc-rail-fill"></i></span>
                    <?php foreach ($stages as $i => $st):
                        $state = $i < $current ? 'done' : ($i === $current ? 'now' : 'next'); ?>
                    <li class="nxc-step is-<?= $state ?>" style="--i:<?= $i ?>" <?= $state === 'now' ? 'aria-current="step"' : '' ?>>
                        <span class="nxc-node" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="m6.5 12.5 3.5 3.5 7.5-8"/></svg>
                        </span>
                        <div>
                            <strong><?= $e($st['title']) ?></strong>
                            <small><?= $e($st['text']) ?></small>
                            <?php if ($i === 0 && $placedEvent): ?><em><?= $e(date('d M, H:i', strtotime((string)$placedEvent))) ?></em><?php endif; ?>
                            <?php if ($state === 'now'): ?><em class="nxc-now">In progress</em><?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
                <?php endif; ?>
            </section>

            <!-- What happens next -->
            <section class="nxc-next nxc-rv" aria-labelledby="nxc-next-title">
                <h2 id="nxc-next-title">What happens <span class="nxc-serif">next</span></h2>
                <div class="nxc-next-grid">
                    <article class="nxc-card nxc-tile" style="--d:0">
                        <span class="nxc-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3 4 6v6c0 4.5 3.4 8.3 8 9 4.6-.7 8-4.5 8-9V6l-8-3Z"/><path d="m8.5 12 2.5 2.5 4.5-5"/></svg></span>
                        <h3>We review it</h3>
                        <p>We check age eligibility and that we can deliver to your address.</p>
                    </article>
                    <article class="nxc-card nxc-tile" style="--d:1">
                        <span class="nxc-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></span>
                        <h3>You hear from us</h3>
                        <p>An email to <?= $e($order['customer_email']) ?> confirms your order and the next steps.</p>
                    </article>
                    <article class="nxc-card nxc-tile" style="--d:2">
                        <span class="nxc-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 7h11v9H3zM14 10h4l3 3v3h-7z"/><circle cx="7" cy="17.5" r="1.8"/><circle cx="17" cy="17.5" r="1.8"/></svg></span>
                        <h3>It ships</h3>
                        <p>We pack it and send tracking details as soon as it leaves us.</p>
                    </article>
                </div>
            </section>

            <!-- Help + account -->
            <section class="nxc-help nxc-rv">
                <div class="nxc-card nxc-help-card">
                    <h2>Need help with this order?</h2>
                    <p>Quote <strong><?= $e($order['order_number']) ?></strong> and we’ll find it straight away.</p>
                    <div class="nxc-actions">
                        <?php if ($supportEmail): ?><a class="nxc-btn nxc-btn-line" href="mailto:<?= $e($supportEmail) ?>?subject=<?= rawurlencode('Order ' . $order['order_number']) ?>">Email <?= $e($supportEmail) ?></a><?php endif; ?>
                        <?php if ($phone): ?><a class="nxc-btn nxc-btn-line" href="tel:<?= $e(preg_replace('/[^0-9+]/', '', $phone)) ?>">Call <?= $e($phone) ?></a><?php endif; ?>
                        <a class="nxc-btn nxc-btn-line" href="<?= BASE_URL ?>contact.php">Contact page</a>
                    </div>
                </div>
                <div class="nxc-card nxc-help-card nxc-account">
                    <?php if ($customer): ?>
                        <h2>Track it any time</h2>
                        <p>This order is saved to your account.</p>
                        <a class="nxc-btn nxc-btn-gold" href="<?= BASE_URL ?>customer/account.php">View my orders <span class="nxc-arr">→</span></a>
                    <?php else: ?>
                        <h2>Track it any time</h2>
                        <p>Create a free account with <?= $e($order['customer_email']) ?> to see this order from any device.</p>
                        <a class="nxc-btn nxc-btn-gold" href="<?= BASE_URL ?>customer/register.php">Create account <span class="nxc-arr">→</span></a>
                    <?php endif; ?>
                </div>
            </section>

            <?php if ($suggest): ?>
            <!-- While you wait -->
            <section class="nxc-suggest nxc-rv" aria-labelledby="nxc-sug-title">
                <div class="nxc-sug-head">
                    <h2 id="nxc-sug-title">While you <span class="nxc-serif">wait</span></h2>
                    <a href="<?= BASE_URL ?>products.php" class="nxc-link">Shop all flavours →</a>
                </div>
                <div class="nxc-sug-grid">
                    <?php foreach ($suggest as $k => $f): ?>
                    <a class="nxc-card nxc-can" style="--c:<?= $e($f['acc']) ?>;--d:<?= $k ?>" href="<?= BASE_URL ?>product.php?id=<?= rawurlencode($f['id']) ?>">
                        <img src="<?= IMG_PATH ?>cans/<?= $e($f['id']) ?>.webp" alt="NIXGO9 <?= $e($f['name']) ?> can" loading="lazy" width="200" height="200">
                        <strong><?= $e($f['name']) ?></strong>
                        <small><?= $e($f['profile']) ?></small>
                    </a>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>

            <a class="nxc-btn nxc-btn-gold nxc-continue nxc-rv" href="<?= BASE_URL ?>products.php">Continue shopping <span class="nxc-arr">→</span></a>
        </div>
    </div>

<?php else: ?>
    <div class="nxc-empty">
        <div class="nxc-empty-mark" aria-hidden="true">?</div>
        <h1>We couldn’t show<br><span class="nxc-serif">that order here.</span></h1>
        <p class="nxc-lead">For your privacy, orders can only be viewed in the browser they were placed in, or after signing in with the same email. Your confirmation email has all the details.</p>
        <div class="nxc-actions" style="justify-content:center">
            <a class="nxc-btn nxc-btn-gold" href="<?= BASE_URL ?>customer/login.php">Sign in <span class="nxc-arr">→</span></a>
            <a class="nxc-btn nxc-btn-line" href="<?= BASE_URL ?>products.php">Continue shopping</a>
        </div>
    </div>
<?php endif; ?>
</main>

<?php require_once __DIR__ . '/includes/layout/footer.php'; ?>
<script src="<?= JS_PATH ?>receipt-printer.js?v=4" defer></script>
<script src="<?= JS_PATH ?>nx-confirmation.js?v=2" defer></script>
