<?php
/**
 * ==========================================================
 * Project Abdullah
 * NIXGO9 Experience Platform
 * Homepage Controller — shop-first layout (v4)
 * ==========================================================
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/core/config.php';

/*
|--------------------------------------------------------------------------
| Shop data (flavours, bundles, settings)
|--------------------------------------------------------------------------
*/

$shop      = require __DIR__ . '/includes/data/shop-flavours.php';
$settings  = $shop['settings'];
$flavours  = [];
$byId      = [];

foreach ($shop['flavours'] as $f) {
    $f['image']    = IMG_PATH . 'cans/' . $f['id'] . '.webp';
    $f['url']      = $f['url'] ?? (BASE_URL . 'product.php?id=' . rawurlencode($f['id']));
    $f['strength'] = $f['strength'] ?? $settings['strength_label'];
    $flavours[]    = $f;
    $byId[$f['id']] = $f;
}

$bundles = [];
foreach ($shop['bundles'] as $b) {
    if ($b['price'] === null || empty($b['url'])) {
        continue; // only show bundles that are real, priced products
    }
    $b['items'] = array_values(array_filter($b['items'], static fn($id) => isset($byId[$id])));
    $b['image'] = $byId[$b['items'][0]]['image'] ?? '';
    $bundles[]  = $b;
}

$flavourCount = count($flavours);

/** Format a price, or return '' when it is not set. */
function nx_price(?float $price, string $currency): string
{
    return $price === null ? '' : $currency . number_format($price, 2);
}

/*
|--------------------------------------------------------------------------
| Page Information
|--------------------------------------------------------------------------
*/

$page = [
    'title'       => 'NIXGO9 | Premium Nicotine Pouches — Shop ' . $flavourCount . ' Flavours',
    'description' => 'Shop NIXGO9 premium nicotine pouches — ' . $flavourCount . ' bold flavours, 20 pouches per can. Age-verified checkout. For adults 18+ only.',
    'keywords'    => 'NIXGO9, nicotine pouches, buy nicotine pouches, nicotine pouch flavours',
    'canonical'   => BASE_URL,
    'body_class'  => 'homepage nx-homepage',
    // extra <head> tags (rendered by header.php)
    'head'        => '<link href="https://fonts.googleapis.com/css2?family=Anton&family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">'
                   . '<link rel="stylesheet" href="' . CSS_PATH . 'nx-home.css?v=20261031">'
                   . '<link rel="preload" as="image" href="' . IMG_PATH . 'cans/sweet-green-mint.webp">',
    // extra scripts (rendered by scripts.php before </body>)
    'scripts'     => '<script src="' . JS_PATH . 'nx-home.js?v=20261031" defer></script>',
];

/* Data handed to nx-home.js (escaped for safe embedding). */
$nxData = [
    'currency'     => $settings['currency'],
    'cartEndpoint' => $settings['cart_endpoint'],
    'cartUrl'      => $settings['cart_url'],
    'pouches'      => $settings['pouches_per_can'],
    'frames'       => [
        'pattern' => IMG_PATH . 'build/build_{n}.webp',
        'count'   => (int)$settings['build_frames'],
        'pad'     => 3,
    ],
    'flavours'     => array_map(static fn($f) => [
        'id' => $f['id'], 'name' => $f['name'], 'word' => $f['word'], 'line' => $f['line'],
        'prof' => $f['profile'], 'acc' => $f['acc'], 'acc2' => $f['acc2'], 'c2' => $f['side'],
        'price' => $f['price'], 'img' => $f['image'], 'url' => $f['url'], 'strength' => $f['strength'],
    ], $flavours),
    'bundles'      => array_map(static fn($b) => [
        'id' => $b['id'], 'name' => $b['name'], 'items' => $b['items'], 'price' => $b['price'],
        'img' => $b['image'], 'url' => $b['url'], 'tag' => $b['tag'], 'feat' => (bool)$b['featured'],
    ], $bundles),
];

/*
|--------------------------------------------------------------------------
| Layout
|--------------------------------------------------------------------------
*/

include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/navbar.php';
?>

<main id="main-content">
<div id="nx-home" class="nx-home">

    <?php include __DIR__ . '/includes/scenes/nx-hero.php'; ?>

    <?php include __DIR__ . '/includes/scenes/nx-build-story.php'; ?>

    <?php include __DIR__ . '/includes/scenes/nx-shop.php'; ?>

    <?php include __DIR__ . '/includes/scenes/nx-bundles.php'; ?>

    <?php include __DIR__ . '/includes/scenes/nx-why.php'; ?>

    <?php include __DIR__ . '/includes/scenes/nx-wholesale.php'; ?>

    <?php include __DIR__ . '/includes/scenes/nx-faq.php'; ?>

    <div class="nx-toast" id="nx-toast" role="status" aria-live="polite">
        <img id="nx-toast-img" alt="">
        <span id="nx-toast-txt"></span>
        <a id="nx-toast-view" href="<?= htmlspecialchars($settings['cart_url']) ?>">View cart</a>
    </div>

    <script type="application/json" id="nx-data"><?= json_encode($nxData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

</div>
</main>

<?php

include __DIR__ . '/includes/layout/footer.php';
include __DIR__ . '/includes/layout/scripts.php';
