<?php
declare(strict_types=1);

/**
 * ============================================================
 * NIXGO9 — V5 CUSTOMER TRACKING
 * ------------------------------------------------------------
 * Premium customer-facing order journey.
 * Test-compatible with the existing order system.
 * ============================================================
 */

require_once __DIR__ . '/includes/core/config.php';

/*
|--------------------------------------------------------------------------
| Request
|--------------------------------------------------------------------------
| V5 accepts either:
|   /track-order.php?id=1
| or later:
|   /track-order.php?token=SECURE_PUBLIC_TOKEN
|
| ID mode is intended for development/testing only.
*/
$orderId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$token   = trim((string)($_GET['token'] ?? ''));

require_once __DIR__ . '/includes/core/tracking-data.php';

$order = nixgo9_get_tracking_order(
    $orderId ?: null,
    $token
);

if (!$order) {
    http_response_code(404);

    $page = [
        'title'       => 'Order Not Found | NIXGO9',
        'description' => 'The requested NIXGO9 tracking page could not be found.',
        'canonical'   => BASE_URL . 'track-order.php',
        'body_class'  => 'tracking-page tracking-page--error'
    ];

    require_once __DIR__ . '/includes/layout/header.php';
    ?>
    <main class="tracking-page tracking-page--error">
        <section class="tracking-error-shell">
            <span class="tracking-eyebrow">NIXGO9 ORDER JOURNEY</span>
            <h1>We couldn't find<br><em>that order.</em></h1>
            <p>Please check the tracking link and try again.</p>
            <a class="tracking-button" href="<?= htmlspecialchars(BASE_URL, ENT_QUOTES, 'UTF-8') ?>">
                <span>Return to NIXGO9</span><b>→</b>
            </a>
        </section>
    </main>
    <link rel="stylesheet" href="<?= htmlspecialchars(CSS_PATH . 'tracking.css?v=5.0.0', ENT_QUOTES, 'UTF-8') ?>">
    <?php
    require_once __DIR__ . '/includes/layout/footer.php';
    exit;
}

$page = [
    'title'       => 'Track Your Order | NIXGO9',
    'description' => 'Follow your NIXGO9 order from confirmation through delivery.',
    'canonical'   => BASE_URL . 'track-order.php',
    'body_class'  => 'tracking-page'
];

require_once __DIR__ . '/includes/layout/header.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$steps = $order['steps'];
$currentIndex = max(0, min(count($steps) - 1, (int)$order['current_step_index']));
$currentStep = $steps[$currentIndex];

$progress = count($steps) > 1
    ? (int) round(($currentIndex / (count($steps) - 1)) * 100)
    : 0;

$trackingUrl = trim((string)($order['tracking_url'] ?? ''));
?>
<link rel="stylesheet" href="<?= e(CSS_PATH . 'tracking.css?v=5.0.0') ?>">

<main
    id="main-content"
    class="tracking-page"
    data-order-id="<?= (int)$order['id'] ?>"
    data-refresh-url="<?= e(BASE_URL . 'track-order.php?id=' . (int)$order['id']) ?>"
>
    <div class="tracking-atmosphere" aria-hidden="true">
        <span class="tracking-orb tracking-orb--one"></span>
        <span class="tracking-orb tracking-orb--two"></span>
        <span class="tracking-orbit tracking-orbit--one"></span>
        <span class="tracking-orbit tracking-orbit--two"></span>
        <span class="tracking-grain"></span>
    </div>

    <section class="tracking-hero">
        <div class="tracking-container">
            <div class="tracking-hero-grid">

                <div class="tracking-hero-copy">
                    <div class="tracking-live-pill">
                        <span class="tracking-live-dot"></span>
                        <span>LIVE ORDER STATUS</span>
                    </div>

                    <span class="tracking-eyebrow">YOUR NIXGO9 JOURNEY</span>

                    <h1>
                        Your package<br>
                        <em>is on its way.</em>
                    </h1>

                    <p class="tracking-hero-intro">
                        <?= e($currentStep['customer_message']) ?>
                    </p>

                    <div class="tracking-order-ref">
                        <span>ORDER</span>
                        <strong><?= e($order['order_number']) ?></strong>
                    </div>
                </div>

                <div class="tracking-status-card" aria-live="polite">
                    <div class="tracking-status-card__top">
                        <span>CURRENT STATUS</span>
                        <span><?= e($currentStep['label']) ?></span>
                    </div>

                    <div class="tracking-status-orbit">
                        <div class="tracking-status-orbit__ring tracking-status-orbit__ring--outer"></div>
                        <div class="tracking-status-orbit__ring tracking-status-orbit__ring--inner"></div>
                        <div class="tracking-status-orbit__core">
                            <span class="tracking-status-orbit__pulse"></span>
                            <strong><?= e($currentStep['short']) ?></strong>
                            <small><?= e($currentStep['sub']) ?></small>
                        </div>
                    </div>

                    <div class="tracking-status-card__bottom">
                        <span><?= e($order['status_updated_label']) ?></span>
                        <strong><?= e($order['status_updated_at']) ?></strong>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="tracking-journey">
        <div class="tracking-container">

            <div class="tracking-section-heading">
                <div>
                    <span class="tracking-section-number">01</span>
                    <span class="tracking-eyebrow">THE JOURNEY</span>
                </div>
                <div class="tracking-section-heading__copy">
                    <h2>From our hands<br><em>to yours.</em></h2>
                    <p>
                        Every meaningful step is recorded as your order moves forward.
                    </p>
                </div>
            </div>

            <div class="tracking-progress-card">
                <div class="tracking-progress-head">
                    <span>ORDER PROGRESS</span>
                    <strong><?= $progress ?>%</strong>
                </div>

                <div class="tracking-progress-line" aria-hidden="true">
                    <span style="width: <?= $progress ?>%"></span>
                </div>

                <div class="tracking-step-row">
                    <?php foreach ($steps as $index => $step): ?>
                        <?php
                        $state = $index < $currentIndex
                            ? 'is-complete'
                            : ($index === $currentIndex ? 'is-current' : 'is-upcoming');
                        ?>
                        <div class="tracking-step <?= e($state) ?>">
                            <span class="tracking-step__node">
                                <?php if ($index < $currentIndex): ?>
                                    ✓
                                <?php elseif ($index === $currentIndex): ?>
                                    <i></i>
                                <?php else: ?>
                                    <?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?>
                                <?php endif; ?>
                            </span>
                            <strong><?= e($step['label']) ?></strong>
                            <small><?= e($step['sub']) ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="tracking-split-grid">

                <article class="tracking-route-card">
                    <div class="tracking-card-kicker">DELIVERY JOURNEY</div>
                    <h3>Your package<br><em>is moving.</em></h3>

                    <div class="tracking-route-visual" aria-hidden="true">
                        <div class="tracking-route-grid"></div>
                        <div class="tracking-route-path">
                            <span class="tracking-route-path__line"></span>
                            <span class="tracking-route-path__traveller"></span>
                        </div>

                        <div class="tracking-route-point tracking-route-point--origin">
                            <span></span>
                            <strong>ORIGIN</strong>
                            <small><?= e($order['origin']) ?></small>
                        </div>

                        <div class="tracking-route-point tracking-route-point--destination">
                            <span></span>
                            <strong>DESTINATION</strong>
                            <small><?= e($order['destination']) ?></small>
                        </div>
                    </div>

                    <p>
                        <?= e($order['route_message']) ?>
                    </p>
                </article>

                <article class="tracking-shipment-card">
                    <div class="tracking-card-kicker">SHIPMENT</div>
                    <h3>Everything<br><em>in one place.</em></h3>

                    <dl class="tracking-shipment-list">
                        <div>
                            <dt>Courier</dt>
                            <dd><?= e($order['courier'] ?: 'Awaiting carrier assignment') ?></dd>
                        </div>
                        <div>
                            <dt>Tracking number</dt>
                            <dd><?= e($order['tracking_number'] ?: 'Will appear after dispatch') ?></dd>
                        </div>
                        <div>
                            <dt>Destination</dt>
                            <dd><?= e($order['destination']) ?></dd>
                        </div>
                    </dl>

                    <?php if ($trackingUrl !== ''): ?>
                        <a
                            class="tracking-button tracking-button--full"
                            href="<?= e($trackingUrl) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <span>Track with carrier</span><b>↗</b>
                        </a>
                    <?php else: ?>
                        <div class="tracking-awaiting">
                            <span class="tracking-awaiting__dot"></span>
                            Carrier tracking will appear here once your shipment is dispatched.
                        </div>
                    <?php endif; ?>
                </article>

            </div>
        </div>
    </section>

    <section class="tracking-package">
        <div class="tracking-container">

            <div class="tracking-package-grid">

                <div class="tracking-package-visual">
                    <div class="tracking-package-glow"></div>

                    <?php if ($order['product_image'] !== ''): ?>
                        <img
                            src="<?= e(IMG_PATH . 'products/' . $order['product_image']) ?>"
                            alt="<?= e($order['product_name']) ?>"
                            loading="lazy"
                            decoding="async"
                        >
                    <?php endif; ?>

                    <span class="tracking-package-badge">YOUR SELECTION</span>
                </div>

                <div class="tracking-package-copy">
                    <span class="tracking-eyebrow">02 / YOUR PACKAGE</span>
                    <h2>Something worth<br><em>looking forward to.</em></h2>

                    <p>
                        Your selected NIXGO9 product is being carried through the
                        fulfilment journey with its order details attached every step
                        of the way.
                    </p>

                    <div class="tracking-product-card">
                        <div>
                            <span><?= e($order['product_strength']) ?></span>
                            <strong><?= e($order['product_name']) ?></strong>
                            <small>Quantity <?= (int)$order['quantity'] ?></small>
                        </div>
                        <strong class="tracking-product-price">
                            ₹<?= number_format((float)$order['total'], 0) ?>
                        </strong>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="tracking-history">
        <div class="tracking-container">

            <div class="tracking-section-heading tracking-section-heading--history">
                <div>
                    <span class="tracking-section-number">03</span>
                    <span class="tracking-eyebrow">ORDER HISTORY</span>
                </div>
                <div class="tracking-section-heading__copy">
                    <h2>Nothing hidden.<br><em>Just the journey.</em></h2>
                    <p>Meaningful updates are kept in chronological order.</p>
                </div>
            </div>

            <div class="tracking-timeline">
                <?php foreach ($order['activity'] as $event): ?>
                    <article class="tracking-event">
                        <div class="tracking-event__rail">
                            <span></span>
                        </div>
                        <div class="tracking-event__meta">
                            <span><?= e($event['date']) ?></span>
                            <small><?= e($event['actor']) ?></small>
                        </div>
                        <div class="tracking-event__content">
                            <h3><?= e($event['title']) ?></h3>
                            <p><?= e($event['description']) ?></p>
                            <?php if (!empty($event['change'])): ?>
                                <strong><?= e($event['change']) ?></strong>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <section class="tracking-trust">
        <div class="tracking-container">
            <div class="tracking-trust-card">
                <span class="tracking-trust-icon">✓</span>
                <div>
                    <span class="tracking-eyebrow">A CLEARER DELIVERY EXPERIENCE</span>
                    <h2>We'll keep you informed.</h2>
                    <p>
                        This page reflects the latest order information available
                        from the NIXGO9 fulfilment system.
                    </p>
                </div>
                <span class="tracking-trust-live">
                    <i></i> STATUS SYNC
                </span>
            </div>
        </div>
    </section>

</main>

<script src="<?= e(JS_PATH . 'tracking.js?v=5.0.0') ?>" defer></script>

<?php require_once __DIR__ . '/includes/layout/footer.php'; ?>
