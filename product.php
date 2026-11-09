<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| CORE
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/includes/core/config.php';


/*
|--------------------------------------------------------------------------
| PRODUCT DATA
|--------------------------------------------------------------------------
*/

$products = [

    'cool-mint' => [
        'name'        => 'Cool Mint',
        'category'    => 'Mint',
        'profile'     => 'Cool • Fresh • Crisp',
        'description' => 'Crisp, fresh mint character with a clean cooling finish.',
        'image'       => 'cool-mint.png',
        'badge'       => 'SIGNATURE',
        'number'      => '01',
        'theme'       => 'mint',
    ],

    'spearmint' => [
        'name'        => 'Spearmint',
        'category'    => 'Mint',
        'profile'     => 'Cool • Crisp • Herbal',
        'description' => 'A clean spearmint profile with a crisp and refreshing finish.',
        'image'       => 'spearmint.png',
        'badge'       => 'CLASSIC',
        'number'      => '02',
        'theme'       => 'spearmint',
    ],

    'sweet-green-mint' => [
        'name'        => 'Sweet Green Mint',
        'category'    => 'Mint',
        'profile'     => 'Sweet • Green • Cooling',
        'description' => 'A softer green mint character with a naturally refreshing finish.',
        'image'       => 'sweet-green-mint.png',
        'badge'       => 'FRESH',
        'number'      => '03',
        'theme'       => 'green',
    ],

    'menthol-freeze' => [
        'name'        => 'Menthol Freeze',
        'category'    => 'Mint',
        'profile'     => 'Cold • Sharp • Intense',
        'description' => 'An intense cooling character built around a sharp menthol finish.',
        'image'       => 'menthol-freeze.png',
        'badge'       => 'INTENSE',
        'number'      => '04',
        'theme'       => 'ice',
    ],

    'tropical-mix' => [
        'name'        => 'Tropical Mix',
        'category'    => 'Fruit',
        'profile'     => 'Tropical • Bright • Sweet',
        'description' => 'A vibrant tropical profile with bright fruit character.',
        'image'       => 'tropical-mix.png',
        'badge'       => 'TROPICAL',
        'number'      => '05',
        'theme'       => 'tropical',
    ],

    'mango-burst' => [
        'name'        => 'Mango Burst',
        'category'    => 'Fruit',
        'profile'     => 'Smooth • Tropical • Sweet',
        'description' => 'A smooth tropical mango character with a bright and expressive finish.',
        'image'       => 'mango-burst.png',
        'badge'       => 'FRUIT',
        'number'      => '06',
        'theme'       => 'mango',
    ],

    'citrus-zest' => [
        'name'        => 'Citrus Zest',
        'category'    => 'Citrus',
        'profile'     => 'Bright • Zesty • Refreshing',
        'description' => 'Bright citrus notes delivering a lively and refreshing profile.',
        'image'       => 'citrus-zest.png',
        'badge'       => 'ZEST',
        'number'      => '07',
        'theme'       => 'citrus',
    ],

    'watermelon' => [
        'name'        => 'Watermelon',
        'category'    => 'Fruit',
        'profile'     => 'Juicy • Sweet • Fresh',
        'description' => 'A juicy watermelon character with a smooth refreshing finish.',
        'image'       => 'watermelon.png',
        'badge'       => 'JUICY',
        'number'      => '08',
        'theme'       => 'watermelon',
    ],

    'blueberry' => [
        'name'        => 'Blueberry',
        'category'    => 'Berry',
        'profile'     => 'Rich • Fruity • Smooth',
        'description' => 'A rich blueberry character with a smooth fruity finish.',
        'image'       => 'blueberry.png',
        'badge'       => 'BERRY',
        'number'      => '09',
        'theme'       => 'blueberry',
    ],

    'strawberry-ice' => [
        'name'        => 'Strawberry Ice',
        'category'    => 'Berry',
        'profile'     => 'Sweet • Fruity • Cool',
        'description' => 'Sweet strawberry character balanced with a refreshing cooling note.',
        'image'       => 'strawberry-ice.png',
        'badge'       => 'COOL BERRY',
        'number'      => '10',
        'theme'       => 'strawberry',
    ],

    'coffee' => [
        'name'        => 'Coffee',
        'category'    => 'Coffee',
        'profile'     => 'Bold • Roasted • Rich',
        'description' => 'A deeper roasted coffee profile designed for a distinctive finish.',
        'image'       => 'coffee.png',
        'badge'       => 'SIGNATURE',
        'number'      => '11',
        'theme'       => 'coffee',
    ],

    'vanilla' => [
        'name'        => 'Vanilla',
        'category'    => 'Classic',
        'profile'     => 'Soft • Creamy • Smooth',
        'description' => 'A smooth vanilla profile with a soft and balanced character.',
        'image'       => 'Vanilla.png',
        'badge'       => 'CLASSIC',
        'number'      => '12',
        'theme'       => 'vanilla',
    ],

    'cinnamon' => [
        'name'        => 'Cinnamon',
        'category'    => 'Classic',
        'profile'     => 'Warm • Spiced • Bold',
        'description' => 'A warm cinnamon profile with a distinctive spiced character.',
        'image'       => 'cinnamon.png',
        'badge'       => 'SPICED',
        'number'      => '13',
        'theme'       => 'cinnamon',
    ],

    'licorice' => [
        'name'        => 'Licorice',
        'category'    => 'Classic',
        'profile'     => 'Dark • Herbal • Distinctive',
        'description' => 'A distinctive licorice profile with a dark herbal character.',
        'image'       => 'licorice.png',
        'badge'       => 'DISTINCTIVE',
        'number'      => '16',
        'theme'       => 'licorice',
    ],

];


/*
|--------------------------------------------------------------------------
| GET PRODUCT
|--------------------------------------------------------------------------
*/

$slug = isset($_GET['slug'])
    ? trim((string) $_GET['slug'])
    : 'cool-mint';


/*
|--------------------------------------------------------------------------
| SECURITY
|--------------------------------------------------------------------------
*/

if (!isset($products[$slug])) {
    http_response_code(404);
    $slug = 'cool-mint';
    $product = $products[$slug];
    $notFound = true;
} else {
    $product = $products[$slug];
    $notFound = false;
}


/*
|--------------------------------------------------------------------------
| PAGE META
|--------------------------------------------------------------------------
*/

$page = [
    'title'       => $product['name'] . ' | NIXGO9',
    'description' => $product['description'],
    'keywords'    => 'NIXGO9, ' . $product['name'] . ', tobacco pouches, ' . $product['category'],
    'canonical'   => BASE_URL . 'product.php?slug=' . urlencode($slug),
];


/*
|--------------------------------------------------------------------------
| HEADER
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/includes/layout/header.php';

?>

<link
    rel="stylesheet"
    href="<?= CSS_PATH ?>product-detail.css"
>

<main
    id="main-content"
    class="product-page product-theme-<?= htmlspecialchars($product['theme']) ?>"
>

    <!-- =====================================================
         AGE / PRODUCT NOTICE
    ====================================================== -->

    <div class="product-age-notice">
        <span class="product-age-icon">⚠</span>

        <span>
            This product contains. For adults 18+ only.
            Keep out of reach of children.
        </span>
    </div>


    <!-- =====================================================
         BREADCRUMB
    ====================================================== -->

    <div class="product-container">

        <div class="product-breadcrumb">

            <a href="<?= BASE_URL ?>products.php">
                ← Back to Collection
            </a>

            <span>/</span>

            <span>
                <?= htmlspecialchars($product['category']) ?>
            </span>

        </div>


        <!-- =================================================
             HERO PRODUCT
        ================================================== -->

        <section class="product-hero">


            <!-- PRODUCT VISUAL -->

            <div class="product-visual">

                <div class="product-number">

                    <span>FLAVOUR</span>

                    <strong>
                        <?= htmlspecialchars($product['number']) ?>
                    </strong>

                    <small>/ 17</small>

                </div>


                <div class="product-glow"></div>


                <div class="product-image-wrap">

                    <img
                        src="<?= IMG_PATH ?>products/<?= htmlspecialchars($product['image']) ?>"
                        alt="<?= htmlspecialchars($product['name']) ?> NIXGO9 tobacco pouch"
                        class="product-image"
                    >

                </div>


                <div class="product-orbit orbit-one"></div>
                <div class="product-orbit orbit-two"></div>


                <div class="product-floating-tag">
                    <?= htmlspecialchars($product['badge']) ?>
                </div>

            </div>


            <!-- PRODUCT INFORMATION -->

            <div class="product-info">

                <div class="product-eyebrow">
                    NIXGO9 · <?= htmlspecialchars($product['category']) ?>
                </div>


                <h1>

                    <span>
                        <?= htmlspecialchars($product['name']) ?>
                    </span>

                </h1>


                <div class="product-profile">

                    <?= htmlspecialchars($product['profile']) ?>

                </div>


                <p class="product-description">

                    <?= htmlspecialchars($product['description']) ?>

                </p>


                <!-- STRENGTH -->

                <div class="product-option">

                    <div class="option-heading">

                        <span>
                            SELECT STRENGTH
                        </span>

                        <strong>
                            20 MG EXTRA STRONG
                        </strong>

                    </div>


                    <div class="strength-selector">

                        <button
                            type="button"
                            class="strength-option"
                            data-strength="04 MG"
                        >
                            <strong>04 MG</strong>
                            <small>MILD</small>
                        </button>


                        <button
                            type="button"
                            class="strength-option"
                            data-strength="10 MG"
                        >
                            <strong>10 MG</strong>
                            <small>STRONG</small>
                        </button>


                        <button
                            type="button"
                            class="strength-option active"
                            data-strength="20 MG"
                        >
                            <strong>20 MG</strong>
                            <small>EXTRA STRONG</small>
                        </button>

                    </div>

                </div>


                <!-- PRICE -->

                <div class="product-purchase">

                    <div class="product-price-label">
                        PRICE
                    </div>

                    <div class="product-price">
                        ₹542
                    </div>

                    <div class="product-pack">
                        20 POUCHES · SLIM POUCH
                    </div>

                </div>


                <!-- QUANTITY -->

                <div class="purchase-row">

                    <div class="quantity-control">

                        <button
                            type="button"
                            class="quantity-minus"
                        >
                            −
                        </button>

                        <span
                            class="quantity-value"
                        >
                            1
                        </span>

                        <button
                            type="button"
                            class="quantity-plus"
                        >
                            +
                        </button>

                    </div>


                    <button
                        type="button"
                        class="add-to-cart"
                    >
                        ADD TO CART
                        <span>→</span>
                    </button>
                    
                    <a
    href="<?= BASE_URL ?>cart.php"
    class="go-to-cart"
>
    VIEW CART
    <span>→</span>
</a>

                </div>


                <!-- 18+ WARNING -->

                <div class="product-warning">

                    <div class="warning-icon">
                        ⚠
                    </div>

                    <div>

                        <strong>
                            18+ PRODUCT
                        </strong>

                        <p>
                            This product contains.
                            For adults 18+ only.
                            Keep out of reach of children.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- =================================================
             FLAVOUR PROFILE
        ================================================== -->

        <section class="flavour-profile-section">

            <div class="section-kicker">
                THE FLAVOUR
            </div>

            <div class="flavour-profile-grid">

                <div>

                    <span class="profile-label">
                        PROFILE
                    </span>

                    <h2>
                        <?= htmlspecialchars($product['profile']) ?>
                    </h2>

                </div>


                <div>

                    <span class="profile-label">
                        EXPERIENCE
                    </span>

                    <p>
                        <?= htmlspecialchars($product['description']) ?>
                    </p>

                </div>

            </div>

        </section>


        <!-- =================================================
             PRODUCT DETAILS
        ================================================== -->

        <section class="product-details-section">

            <div class="section-kicker">
                PRODUCT DETAILS
            </div>


            <div class="details-grid">

                <div class="detail-card">

                    <span>
                        FORMAT
                    </span>

                    <strong>
                        Slim Pouch
                    </strong>

                </div>


                <div class="detail-card">

                    <span>
                        PACK SIZE
                    </span>

                    <strong>
                        20 Pouches
                    </strong>

                </div>


                <div class="detail-card">

                    <span>
                        AVAILABLE STRENGTHS
                    </span>

                    <strong>
                        04 / 10 / 20 MG
                    </strong>

                </div>


                <div class="detail-card">

                    <span>
                        PRODUCT
                    </span>

                    <strong>
                        NIXGO9
                    </strong>

                </div>

            </div>

        </section>


        <!-- =================================================
             NAVIGATION
        ================================================== -->

        <section class="product-next-section">

            <a
                href="<?= BASE_URL ?>products.php"
                class="back-collection"
            >

                <span>
                    EXPLORE ALL FLAVOURS
                </span>

                <strong>
                    NIXGO9 COLLECTION →
                </strong>

            </a>

        </section>

    </div>

</main>


<!-- =====================================================
     FOOTER
====================================================== -->

<?php
require_once __DIR__ . '/includes/layout/footer.php';
?>


<script src="<?= JS_PATH ?>product-detail.js"></script>


</body>
</html>