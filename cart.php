<?php

declare(strict_types=1);

/**
 * ============================================================
 * NIXGO9 — PREMIUM CART
 * ============================================================
 */

require_once __DIR__ . '/includes/core/config.php';


/*
|--------------------------------------------------------------------------
| SESSION
|--------------------------------------------------------------------------
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

$cart = $_SESSION['cart'] ?? [];

if (!is_array($cart)) {
    $cart = [];
}


/*
|--------------------------------------------------------------------------
| CART TOTALS
|--------------------------------------------------------------------------
*/

$totalItems = 0;
$subtotal   = 0.0;

foreach ($cart as $item) {

    $quantity = max(
        1,
        (int) ($item['quantity'] ?? 1)
    );

    $price = (float) (
        $item['price'] ?? 0
    );

    $totalItems += $quantity;

    $subtotal +=
        $price * $quantity;
}


$total = $subtotal;


/*
|--------------------------------------------------------------------------
| PAGE META
|--------------------------------------------------------------------------
*/

$page = [
    'title'       => 'Your Selection | NIXGO9',
    'description' => 'Review your selected NIXGO9 flavours, strengths and quantities.',
    'keywords'    => 'NIXGO9 cart, NIXGO9 selection, nicotine pouches',
    'canonical'   => BASE_URL . 'cart.php',
    'body_class'  => 'cart-page'
];


/*
|--------------------------------------------------------------------------
| SHARED HEADER
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/includes/layout/header.php';

?>


<!-- ============================================================
     CART CSS
============================================================ -->

<link
    rel="stylesheet"
    href="<?= CSS_PATH ?>cart.css"
>


<main
    id="main-content"
    class="cart-page"
>


    <!-- ========================================================
         ATMOSPHERE
    ========================================================= -->

    <div
        class="cart-atmosphere"
        aria-hidden="true"
    >

        <div class="cart-orb cart-orb-one"></div>

        <div class="cart-orb cart-orb-two"></div>

        <div class="cart-orbit cart-orbit-one"></div>

        <div class="cart-orbit cart-orbit-two"></div>

    </div>


    <!-- ========================================================
         HERO
    ========================================================= -->

    <section class="cart-hero">

        <div class="cart-container cart-hero-layout">


            <div class="cart-hero-copy">

                <div class="cart-eyebrow">

                <span class="cart-eyebrow-line"></span>

                YOUR NIXGO9 COLLECTION

            </div>


            <h1 class="cart-title">

                Your
                <span>Selection.</span>

            </h1>


            <p class="cart-intro">

                Thoughtfully selected.
                Carefully considered.
                Ready when you are.

            </p>


            <?php if ($totalItems > 0): ?>

                <div class="cart-trust-line">

                    <span>
                        <?= $totalItems ?>
                        <?= $totalItems === 1 ? 'Pouch Selection' : 'Pouch Selections' ?>
                    </span>

                    <span>
                        ✓ Transparent pricing
                    </span>

                    <span>
                        ✓ Adults 18+ only
                    </span>

                </div>

            <?php else: ?>

                <div class="cart-trust-line">

                    <span>
                        17 Premium Flavours
                    </span>

                    <span>
                        ✓ Clear product information
                    </span>

                    <span>
                        ✓ Adults 18+ only
                    </span>

                </div>

            <?php endif; ?>

                </div>

            <div class="cart-hero-visual" aria-hidden="true">
                <div class="cart-hero-visual-backdrop"></div>
                <div class="cart-hero-visual-orbit cart-hero-visual-orbit-one"></div>
                <div class="cart-hero-visual-orbit cart-hero-visual-orbit-two"></div>

                <?php
                    $heroSlug = 'cool-mint';
                    $heroProductImage = 'cool-mint.png';
                    if (!empty($cart)) {
                        $firstCartItem = reset($cart);
                        $heroSlug = (string) ($firstCartItem['slug'] ?? 'cool-mint');
                        $heroProductImage = (string) ($firstCartItem['image'] ?? 'cool-mint.png');
                    }
                    $heroFlavourMap = [
                        'cool-mint'=>'cool-mint.jpg','spearmint'=>'spearmint.jpg','sweet-green-mint'=>'sweet-green-mint.jpg','menthol-freeze'=>'menthol-freeze.jpg',
                        'tropical-mix'=>'tropical-mix.jpg','mango-burst'=>'mango-burst.jpg','citrus-zest'=>'citrus-zest.jpg','watermelon'=>'watermelon.jpg',
                        'blueberry'=>'blueberry.jpg','strawberry-ice'=>'strawberry-ice.jpg','coffee'=>'coffee.jpg','vanilla'=>'vanilla.jpg','cinnamon'=>'cinnamon.jpg',
                        'licorice'=>'licorice.jpg','ginger-lemon'=>'citrus-zest.jpg','cola-ice'=>'cola-ice.jpg','cherry'=>'cherry.jpg'
                    ];
                    $heroFlavour = $heroFlavourMap[$heroSlug] ?? 'cool-mint.jpg';
                ?>

                <div class="cart-hero-flavour" style="--cart-hero-flavour: url('<?= IMG_PATH ?>products/flavours/<?= htmlspecialchars($heroFlavour, ENT_QUOTES, 'UTF-8') ?>');"></div>

                <img
                    class="cart-hero-product"
                    src="<?= IMG_PATH ?>products/<?= htmlspecialchars($heroProductImage, ENT_QUOTES, 'UTF-8') ?>"
                    alt=""
                    loading="eager"
                    decoding="async"
                >

                <span class="cart-hero-caption">
                    <?= empty($cart) ? 'EXPLORE THE COLLECTION' : 'YOUR CURRENT SELECTION' ?>
                </span>
            </div>

        </div>

    </section>



    <!-- ========================================================
         CART CONTENT
    ========================================================= -->

    <section class="cart-section">

        <div class="cart-container">


<?php if (empty($cart)): ?>


            <!-- =================================================
                 EMPTY CART
            ================================================== -->

            <div class="cart-empty">


                <div
                    class="cart-empty-visual"
                    aria-hidden="true"
                >

                    <div class="empty-orbit"></div>

                    <div class="empty-orbit empty-orbit-two"></div>

                    <div class="empty-core">

                        <span>9</span>

                    </div>

                </div>


                <span class="cart-empty-kicker">

                    YOUR COLLECTION AWAITS

                </span>


                <h2>

                    Nothing here.
                    <span>Yet.</span>

                </h2>


                <p>

                    Your selection is currently empty.
                    Explore the NIXGO9 collection and discover
                    the flavour that belongs in your selection.

                </p>


                <a
                    href="<?= BASE_URL ?>products.php"
                    class="cart-primary-button"
                >

                    Explore Products

                    <span aria-hidden="true">
                        ↗
                    </span>

                </a>


                <div class="cart-empty-note">

                    <strong>
                        TAKE YOUR TIME.
                    </strong>

                    <span>
                        Good choices don't need to be rushed.
                    </span>

                </div>


            </div>


<?php else: ?>


            <!-- =================================================
                 CART GRID
            ================================================== -->

            <div class="cart-grid">


                <!-- =============================================
                     CART ITEMS
                ============================================== -->

                <div class="cart-items-panel">


                    <div class="cart-panel-heading">


                        <div>

                            <span>
                                YOUR SELECTION
                            </span>

                            <h2>

                                <?= $totalItems ?>

                                <?= $totalItems === 1
                                    ? 'Item'
                                    : 'Items'
                                ?>

                            </h2>

                        </div>


                        <a
                            href="<?= BASE_URL ?>products.php"
                            class="continue-shopping"
                        >

                            Continue Exploring
                            <span>→</span>

                        </a>


                    </div>



<?php foreach ($cart as $cartKey => $item): ?>


<?php

    /*
    |--------------------------------------------------------------------------
    | ITEM DATA
    |--------------------------------------------------------------------------
    */

    $slug = (string) (
        $item['slug'] ?? ''
    );

    $name = (string) (
        $item['name'] ?? 'NIXGO9 Product'
    );

    $image = (string) (
        $item['image'] ?? ''
    );

    $strength = (string) (
        $item['strength'] ?? '20 MG'
    );

    $price = (float) (
        $item['price'] ?? 0
    );

    $quantity = max(
        1,
        (int) (
            $item['quantity'] ?? 1
        )
    );

    $lineTotal =
        $price * $quantity;


    /*
    |--------------------------------------------------------------------------
    | ESCAPED VALUES
    |--------------------------------------------------------------------------
    */

    $safeName =
        htmlspecialchars(
            $name,
            ENT_QUOTES,
            'UTF-8'
        );

    $safeImage =
        htmlspecialchars(
            $image,
            ENT_QUOTES,
            'UTF-8'
        );

    $safeStrength =
        htmlspecialchars(
            $strength,
            ENT_QUOTES,
            'UTF-8'
        );

    $safeCartKey =
        htmlspecialchars(
            (string) $cartKey,
            ENT_QUOTES,
            'UTF-8'
        );

    $flavourMap = [
        'cool-mint'=>'cool-mint.jpg','spearmint'=>'spearmint.jpg','sweet-green-mint'=>'sweet-green-mint.jpg','menthol-freeze'=>'menthol-freeze.jpg',
        'tropical-mix'=>'tropical-mix.jpg','mango-burst'=>'mango-burst.jpg','citrus-zest'=>'citrus-zest.jpg','watermelon'=>'watermelon.jpg',
        'blueberry'=>'blueberry.jpg','strawberry-ice'=>'strawberry-ice.jpg','coffee'=>'coffee.jpg','vanilla'=>'vanilla.jpg','cinnamon'=>'cinnamon.jpg',
        'licorice'=>'licorice.jpg','ginger-lemon'=>'citrus-zest.jpg','cola-ice'=>'cola-ice.jpg','cherry'=>'cherry.jpg'
    ];

    $flavourImage = $flavourMap[$slug] ?? 'cool-mint.jpg';

?>


                    <!-- =========================================
                         CART ITEM
                    ========================================== -->

                    <article
                        class="cart-item"
                        data-cart-key="<?= $safeCartKey ?>"
                        data-slug="<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>"
                    >


                        <!-- PRODUCT VISUAL -->

                        <div
                            class="cart-item-image"
                            style="--cart-flavour-image: url('<?= IMG_PATH ?>products/flavours/<?= htmlspecialchars($flavourImage, ENT_QUOTES, 'UTF-8') ?>');"
                        >

                            <div class="cart-item-photo" aria-hidden="true"></div>
                            <div class="cart-item-glow" aria-hidden="true"></div>
                            <div class="cart-item-orbit" aria-hidden="true"></div>

                            <img
                                src="<?= IMG_PATH ?>products/<?= $safeImage ?>"
                                alt="<?= $safeName ?>"
                                loading="lazy"
                                decoding="async"
                            >

                            <span class="cart-item-flavour-tag">
                                <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
                            </span>

                        </div>



                        <!-- PRODUCT INFORMATION -->

                        <div class="cart-item-info">


                            <span class="cart-item-category">

                                NIXGO9
                                <span aria-hidden="true">
                                    •
                                </span>
                                PREMIUM COLLECTION

                            </span>


                            <h3>
                                <?= $safeName ?>
                            </h3>


                            <p>
                                A considered flavour selection
                                from the NIXGO9 collection.
                            </p>


                            <div class="cart-item-meta">


                                <span>

                                    <?= $safeStrength ?>

                                </span>


                                <span>

                                    20 Pouches

                                </span>


                            </div>


                            <button
                                type="button"
                                class="cart-remove-button"
                                data-cart-key="<?= $safeCartKey ?>"
                            >

                                Remove

                                <span aria-hidden="true">
                                    ×
                                </span>

                            </button>


                        </div>



                        <!-- QUANTITY -->

                        <div class="cart-item-quantity">


                            <span class="cart-item-label">
                                QUANTITY
                            </span>


                            <div class="cart-quantity-control">


                                <button
                                    type="button"
                                    class="cart-quantity-minus"
                                    data-cart-key="<?= $safeCartKey ?>"
                                    aria-label="Decrease <?= $safeName ?> quantity"
                                >
                                    −
                                </button>


                                <strong
                                    class="cart-quantity-value"
                                >
                                    <?= $quantity ?>
                                </strong>


                                <button
                                    type="button"
                                    class="cart-quantity-plus"
                                    data-cart-key="<?= $safeCartKey ?>"
                                    aria-label="Increase <?= $safeName ?> quantity"
                                >
                                    +
                                </button>


                            </div>


                        </div>



                        <!-- PRICE -->

                        <div class="cart-item-price">


                            <span class="cart-item-label">
                                LINE TOTAL
                            </span>


                            <strong>

                                ₹<?= number_format(
                                    $lineTotal,
                                    0
                                ) ?>

                            </strong>


                            <small>

                                ₹<?= number_format(
                                    $price,
                                    0
                                ) ?>
                                each

                            </small>


                        </div>


                    </article>


<?php endforeach; ?>


                </div>



                <!-- =============================================
                     ORDER SUMMARY
                ============================================== -->

                <aside class="cart-summary">


                    <span class="summary-kicker">

                        YOUR ORDER

                    </span>


                    <h2>

                        A considered
                        <span>selection.</span>

                    </h2>


                    <div class="summary-lines">


                        <div>

                            <span>
                                Items
                            </span>

                            <strong>
                                <?= $totalItems ?>
                            </strong>

                        </div>


                        <div>

                            <span>
                                Collection
                            </span>

                            <strong>
                                NIXGO9
                            </strong>

                        </div>


                        <div>

                            <span>
                                Subtotal
                            </span>

                            <strong
                                class="cart-subtotal-value"
                            >

                                ₹<?= number_format(
                                    $subtotal,
                                    0
                                ) ?>

                            </strong>

                        </div>


                    </div>


                    <div class="summary-total">


                        <span>
                            TOTAL
                        </span>


                        <strong
                            class="cart-total-value"
                        >

                            ₹<?= number_format(
                                $total,
                                0
                            ) ?>

                        </strong>


                    </div>


                    <button
                        type="button"
                        class="checkout-button"
                        id="checkoutButton"
                    >

                        <span>
                            Continue to Checkout
                        </span>

                        <span
                            aria-hidden="true"
                        >
                            →
                        </span>

                    </button>


                    <!-- TRUST -->

                    <div class="summary-trust">


                        <div class="trust-item">


                            <span>
                                ✓
                            </span>


                            <p>

                                <strong>
                                    Clear pricing.
                                </strong>

                                No unnecessary surprises.

                            </p>


                        </div>


                        <div class="trust-item">


                            <span>
                                ✓
                            </span>


                            <p>

                                <strong>
                                    Your choice.
                                </strong>

                                Your pace. Your decision.

                            </p>


                        </div>


                        <div class="trust-item">


                            <span>
                                18+
                            </span>


                            <p>

                                Products are intended
                                for adults only.

                            </p>


                        </div>


                    </div>


                </aside>


            </div>


<?php endif; ?>


        </div>

    </section>



    <!-- ========================================================
         BRAND STATEMENT
    ========================================================= -->

    <section class="cart-statement">

        <div class="cart-container">


            <div class="cart-statement-inner">


                <span
                    class="statement-number"
                    aria-hidden="true"
                >
                    09
                </span>


                <div>


                    <span class="statement-kicker">

                        THE NIXGO9 STANDARD

                    </span>


                    <h2>

                        Designed with intention.
                        <span>
                            Delivered with respect.
                        </span>

                    </h2>


                    <p>

                        We believe a premium experience is about
                        more than what is inside the pouch.
                        It is about clarity, consistency and
                        respecting the people who choose us.

                    </p>


                </div>


            </div>

        </div>

    </section>



    <!-- ========================================================
         TRUST / TRANSPARENCY
    ========================================================= -->

    <section class="cart-trust-section">

        <div class="cart-container">


            <div class="cart-trust-heading">


                <span>
                    GOOD CHOICES DESERVE
                </span>


                <h2>

                    Clear
                    <em>information.</em>

                </h2>


                <p>

                    Review your flavour, strength,
                    quantity and total before continuing.
                    The decision is always yours.

                </p>


            </div>


            <div class="cart-trust-grid">


                <div class="cart-trust-card">


                    <span>
                        01
                    </span>


                    <h3>
                        CLEAR BY DESIGN
                    </h3>


                    <p>

                        Product details and selected
                        quantities remain visible throughout
                        your selection.

                    </p>


                </div>


                <div class="cart-trust-card">


                    <span>
                        02
                    </span>


                    <h3>
                        QUALITY, NOT NOISE
                    </h3>


                    <p>

                        We would rather give you useful
                        information than pressure you
                        into a decision.

                    </p>


                </div>


                <div class="cart-trust-card">


                    <span>
                        03
                    </span>


                    <h3>
                        YOUR PACE
                    </h3>


                    <p>

                        Take a moment.
                        Review your selection.
                        Continue when you're ready.

                    </p>


                </div>


            </div>

        </div>

    </section>



    <!-- ========================================================
         AGE NOTICE
    ========================================================= -->

    <section class="cart-age-notice">

        <div class="cart-container">


            <div class="cart-age-inner">


                <span class="cart-age-icon">
                    18+
                </span>


                <div>


                    <strong>
                        ADULTS ONLY
                    </strong>


                    <p>

                        NIXGO9 nicotine products are intended
                        for adults only. Keep out of reach
                        of children.

                    </p>


                </div>


            </div>

        </div>

    </section>


</main>



<?php

/*
|--------------------------------------------------------------------------
| FOOTER
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/includes/layout/footer.php';

?>


<!-- ============================================================
     CART JAVASCRIPT
============================================================ -->

<script src="<?= JS_PATH ?>cart.js"></script>