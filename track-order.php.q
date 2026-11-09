<?php
declare(strict_types=1);

/**
 * NIXGO9 — V9 CUSTOMER TRACKING EXPERIENCE
 * Cinematic shipment journey / live customer tracking.
 */

require_once __DIR__ . '/includes/core/config.php';

$orderId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$token   = trim((string)($_GET['token'] ?? ''));

require_once __DIR__ . '/includes/core/tracking-data.php';

function nx_track_e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if (!$orderId && $token === '') {
    $orderId = null;
}

$order = nixgo9_get_tracking_order($orderId ?: null, $token);

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
    <link rel="stylesheet" href="<?= nx_track_e(CSS_PATH . 'tracking.css?v=9.0.0') ?>">
    <main class="tracking-page tracking-page--error">
        <section class="tracking-error-shell">
            <span class="tracking-eyebrow">NIXGO9 ORDER JOURNEY</span>
            <h1>We couldn't find<br><em>that order.</em></h1>
            <p>Please check the tracking link and try again.</p>
            <a class="tracking-button" href="<?= nx_track_e(BASE_URL) ?>"><span>Return to NIXGO9</span><b>→</b></a>
        </section>
    </main>
    <?php
    require_once __DIR__ . '/includes/layout/footer.php';
    exit;
}

$page = [
    'title'       => 'Track Your NIXGO9 Order | NIXGO9',
    'description' => 'Follow your NIXGO9 order from fulfilment to delivery.',
    'canonical'   => BASE_URL . 'track-order.php',
    'body_class'  => 'tracking-page'
];

require_once __DIR__ . '/includes/layout/header.php';

$steps = $order['steps'];
$currentIndex = max(0, min(count($steps) - 1, (int)$order['current_step_index']));
$currentStep = $steps[$currentIndex];
$nextStep = $steps[$currentIndex + 1] ?? null;
$progress = count($steps) > 1 ? (int)round(($currentIndex / (count($steps) - 1)) * 100) : 0;
$trackingUrl = trim((string)($order['tracking_url'] ?? ''));
$sceneUrl = IMG_PATH . 'tracking/nixgo9-journey-scene.png';
$apiUrl = BASE_URL . 'tracking-api.php?id=' . (int)$order['id'];
$estimated = trim((string)($order['estimated_delivery'] ?? ''));
$origin = trim((string)($order['origin'] ?? 'India')) ?: 'India';
$destination = trim((string)($order['destination'] ?? 'Your destination')) ?: 'Your destination';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= nx_track_e(CSS_PATH . 'tracking.css?v=9.0.0') ?>">

<main id="main-content" class="tracking-page" data-order-id="<?= (int)$order['id'] ?>" data-live-endpoint="<?= nx_track_e($apiUrl) ?>">
    <div class="tracking-atmosphere" aria-hidden="true">
        <span class="atmo-orb atmo-orb--green"></span>
        <span class="atmo-orb atmo-orb--gold"></span>
        <span class="atmo-grid"></span>
        <span class="atmo-grain"></span>
    </div>

    <section class="tracking-cinema">
        <div class="tracking-container tracking-cinema__inner">
            <div class="tracking-cinema__copy">
                <div class="tracking-live-pill"><span></span><b>LIVE</b> ORDER JOURNEY</div>
                <span class="tracking-eyebrow">NIXGO9 · <?= nx_track_e($currentStep['short']) ?></span>

                <h1>Your package<br><em>is on its way.</em></h1>

                <p class="tracking-cinema__lead"><?= nx_track_e($currentStep['customer_message']) ?></p>

                <div class="tracking-cinema__meta">
                    <div class="tracking-order-chip">
                        <small>ORDER</small>
                        <strong><?= nx_track_e($order['order_number']) ?></strong>
                        <button type="button" class="tracking-copy" data-copy="<?= nx_track_e($order['order_number']) ?>" aria-label="Copy order number">⧉</button>
                    </div>
                    <div class="tracking-arrival-chip">
                        <small><?= $estimated !== '' ? 'ESTIMATED ARRIVAL' : 'CURRENT MILESTONE' ?></small>
                        <strong><?= nx_track_e($estimated !== '' ? $estimated : $currentStep['sub']) ?></strong>
                    </div>
                </div>

                <div class="tracking-cinema__trust">
                    <span class="trust-mark">✓</span>
                    <div><strong>Secure shipment journey</strong><small>Your order status is refreshed automatically.</small></div>
                </div>
            </div>

            <div class="tracking-stage" aria-label="NIXGO9 shipment journey">
                <div class="stage-glow" aria-hidden="true"></div>
                <img class="tracking-stage__image" src="<?= nx_track_e($sceneUrl) ?>" alt="NIXGO9 premium package beside Sydney Harbour at golden hour" loading="eager" decoding="async">
                <div class="stage-caption"><span>NIXGO9 JOURNEY</span><b><?= nx_track_e($currentStep['label']) ?></b></div>
            </div>

            <aside class="tracking-command" aria-live="polite">
                <div class="tracking-command__top">
                    <span><i></i> CURRENT STATUS</span>
                    <b><?= nx_track_e($currentStep['label']) ?></b>
                </div>

                <div class="tracking-command__main">
                    <div class="command-index">0<?= $currentIndex + 1 ?></div>
                    <div>
                        <small>YOUR SHIPMENT</small>
                        <h2><?= nx_track_e($currentStep['label']) ?></h2>
                        <p><?= nx_track_e($currentStep['customer_message']) ?></p>
                    </div>
                </div>

                <div class="command-progress">
                    <div class="command-progress__labels"><span>JOURNEY PROGRESS</span><strong><?= $progress ?>%</strong></div>
                    <div class="command-progress__track"><i style="width:<?= $progress ?>%"></i></div>
                </div>

                <div class="command-route">
                    <div><small>FROM</small><strong><?= nx_track_e($origin) ?></strong></div>
                    <span class="command-route__line"><i>✦</i></span>
                    <div class="command-route__destination"><small>TO</small><strong><?= nx_track_e($destination) ?></strong></div>
                </div>

                <div class="command-next">
                    <span class="command-next__icon">→</span>
                    <div><small>NEXT MILESTONE</small><strong><?= nx_track_e($nextStep['label'] ?? 'Journey complete') ?></strong></div>
                    <b><?= $nextStep ? str_pad((string)($currentIndex + 2), 2, '0', STR_PAD_LEFT) : '✓' ?></b>
                </div>

                <div class="command-tracking">
                    <div><small><?= nx_track_e($order['courier'] ?: 'CARRIER') ?></small><strong><?= nx_track_e($order['tracking_number'] ?: 'Tracking will appear after dispatch') ?></strong></div>
                    <?php if ($order['tracking_number'] !== ''): ?><button type="button" class="tracking-copy tracking-copy--small" data-copy="<?= nx_track_e($order['tracking_number']) ?>" aria-label="Copy tracking number">⧉</button><?php endif; ?>
                </div>

                <?php if ($trackingUrl !== ''): ?>
                    <a class="command-carrier-link" href="<?= nx_track_e($trackingUrl) ?>" target="_blank" rel="noopener noreferrer"><span>Open carrier tracking</span><b>↗</b></a>
                <?php endif; ?>

                <div class="command-foot"><span>UPDATED</span><strong><?= nx_track_e($order['status_updated_at'] ?: 'Just now') ?></strong></div>
            </aside>
        </div>

        <div class="tracking-container tracking-rail-wrap">
            <div class="tracking-rail-head"><div><span>YOUR JOURNEY</span><p>Every milestone, from our hands to yours.</p></div><strong><?= $progress ?>% COMPLETE</strong></div>
            <div class="tracking-rail" data-current-index="<?= $currentIndex ?>">
                <div class="tracking-rail__base"></div>
                <div class="tracking-rail__fill" style="width:<?= $progress ?>%"></div>
                <?php foreach ($steps as $index => $step):
                    $state = $index < $currentIndex ? 'is-complete' : ($index === $currentIndex ? 'is-current' : 'is-upcoming');
                ?>
                    <div class="tracking-rail__step <?= $state ?>" data-step="<?= $index ?>">
                        <span class="tracking-rail__node"><?php if ($state === 'is-complete'): ?>✓<?php elseif ($state === 'is-current'): ?>✦<?php else: ?><?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?><?php endif; ?></span>
                        <div><b><?= nx_track_e($step['label']) ?></b><small><?= nx_track_e($step['sub']) ?></small></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tracking-story">
        <div class="tracking-container">
            <div class="story-intro reveal-on-scroll">
                <span class="tracking-eyebrow">BEYOND THE TRACKING NUMBER</span>
                <h2>Not just a parcel.<br><em>A journey you can follow.</em></h2>
                <p><?= nx_track_e($order['route_message']) ?></p>
            </div>

            <div class="story-grid">
                <article class="story-card story-card--destination reveal-on-scroll">
                    <span class="story-card__number">01</span>
                    <span class="tracking-eyebrow">DESTINATION</span>
                    <h3><?= nx_track_e($destination) ?></h3>
                    <p>Your NIXGO9 experience is travelling toward its destination.</p>
                    <div class="story-route-mini"><span></span><i>✦</i><span></span></div>
                    <div class="story-route-labels"><b><?= nx_track_e($origin) ?></b><b><?= nx_track_e($destination) ?></b></div>
                </article>

                <article class="story-card story-card--arrival reveal-on-scroll">
                    <span class="story-card__number">02</span>
                    <span class="tracking-eyebrow">ARRIVAL WINDOW</span>
                    <h3><?= nx_track_e($estimated ?: 'Carrier update pending') ?></h3>
                    <p>We will keep the journey moving as new fulfilment and carrier events arrive.</p>
                    <div class="arrival-ring"><span><?= $progress ?>%</span><small>complete</small></div>
                </article>

                <article class="story-card story-card--details reveal-on-scroll">
                    <span class="story-card__number">03</span>
                    <span class="tracking-eyebrow">SHIPMENT DETAILS</span>
                    <dl>
                        <div><dt>Courier</dt><dd><?= nx_track_e($order['courier'] ?: 'Awaiting carrier assignment') ?></dd></div>
                        <div><dt>Tracking</dt><dd><?= nx_track_e($order['tracking_number'] ?: 'Will appear after dispatch') ?></dd></div>
                        <div><dt>Destination</dt><dd><?= nx_track_e($destination) ?></dd></div>
                    </dl>
                    <?php if ($trackingUrl !== ''): ?><a class="tracking-button tracking-button--full" href="<?= nx_track_e($trackingUrl) ?>" target="_blank" rel="noopener noreferrer"><span>Track with carrier</span><b>↗</b></a><?php endif; ?>
                </article>
            </div>

            <div class="tracking-history-v7 reveal-on-scroll">
                <div class="history-heading"><div><span class="tracking-eyebrow">ORDER HISTORY</span><h2>Every update.<br><em>Nothing hidden.</em></h2></div><span class="history-count"><?= count($order['activity']) ?> EVENTS</span></div>
                <div class="history-list">
                    <?php foreach ($order['activity'] as $event): ?>
                        <article class="history-event">
                            <span class="history-event__marker"></span>
                            <div class="history-event__body"><small><?= nx_track_e($event['date']) ?> · <?= nx_track_e($event['actor']) ?></small><h3><?= nx_track_e($event['title']) ?></h3><p><?= nx_track_e($event['description']) ?></p><?php if ($event['change'] !== ''): ?><strong><?= nx_track_e($event['change']) ?></strong><?php endif; ?></div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="<?= nx_track_e(JS_PATH . 'tracking.js?v=9.0.0') ?>" defer></script>
<?php require_once __DIR__ . '/includes/layout/footer.php'; ?>
