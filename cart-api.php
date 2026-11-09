<?php

declare(strict_types=1);

/**
 * ============================================================
 * NIXGO9 — CART API
 * ============================================================
 */

require_once __DIR__ . '/includes/core/config.php';
require_once __DIR__ . '/includes/core/age-gate.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json; charset=UTF-8');
if (!nix_age_verified()) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'message' => 'Age confirmation is required before using the NIXGO9 site.']);
    exit;
}

header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');


/*
|--------------------------------------------------------------------------
| PRODUCT CATALOGUE
|--------------------------------------------------------------------------
|
| Temporary server-side catalogue.
| We will move this into a shared products-data.php later.
|
*/

$products = [

    'cool-mint' => [
        'name'      => 'Cool Mint',
        'image'     => 'cool-mint.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'spearmint' => [
        'name'      => 'Spearmint',
        'image'     => 'spearmint.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'sweet-green-mint' => [
        'name'      => 'Sweet Green Mint',
        'image'     => 'sweet-green-mint.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'menthol-freeze' => [
        'name'      => 'Menthol Freeze',
        'image'     => 'menthol-freeze.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'tropical-mix' => [
        'name'      => 'Tropical Mix',
        'image'     => 'tropical-mix.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'mango-burst' => [
        'name'      => 'Mango Burst',
        'image'     => 'mango-burst.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'citrus-zest' => [
        'name'      => 'Citrus Zest',
        'image'     => 'citrus-zest.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'watermelon' => [
        'name'      => 'Watermelon',
        'image'     => 'watermelon.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'blueberry' => [
        'name'      => 'Blueberry',
        'image'     => 'blueberry.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'strawberry-ice' => [
        'name'      => 'Strawberry Ice',
        'image'     => 'strawberry-ice.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'coffee' => [
        'name'      => 'Coffee',
        'image'     => 'coffee.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'vanilla' => [
        'name'      => 'Vanilla',
        'image'     => 'Vanilla.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'cinnamon' => [
        'name'      => 'Cinnamon',
        'image'     => 'cinnamon.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

    'licorice' => [
        'name'      => 'Licorice',
        'image'     => 'licorice.png',
        'price'     => 542,
        'strengths' => ['04 MG', '10 MG', '20 MG'],
    ],

];


/*
|--------------------------------------------------------------------------
| INITIALISE CART
|--------------------------------------------------------------------------
*/

if (
    !isset($_SESSION['cart']) ||
    !is_array($_SESSION['cart'])
) {
    $_SESSION['cart'] = [];
}


/*
|--------------------------------------------------------------------------
| READ JSON
|--------------------------------------------------------------------------
*/

$rawInput = file_get_contents('php://input');

$data = json_decode(
    $rawInput ?: '{}',
    true
);

if (!is_array($data)) {
    $data = [];
}


$action = trim(
    (string) ($data['action'] ?? '')
);


/*
|--------------------------------------------------------------------------
| RESPONSE HELPER
|--------------------------------------------------------------------------
*/

function cartResponse(
    bool $success,
    string $message = '',
    array $extra = []
): never {

    echo json_encode(
        array_merge(
            [
                'success' => $success,
                'message' => $message,
            ],
            $extra
        ),
        JSON_UNESCAPED_UNICODE |
        JSON_UNESCAPED_SLASHES
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| SUMMARY
|--------------------------------------------------------------------------
*/

function getCartSummary(): array
{
    $items = 0;
    $subtotal = 0.0;

    foreach ($_SESSION['cart'] as $item) {

        $quantity = max(
            1,
            (int) ($item['quantity'] ?? 1)
        );

        $price = (float) (
            $item['price'] ?? 0
        );

        $items += $quantity;

        $subtotal +=
            $price * $quantity;
    }

    return [
        'items'    => $items,
        'subtotal' => $subtotal,
        'total'    => $subtotal,
    ];
}


/*
|--------------------------------------------------------------------------
| GET CART
|--------------------------------------------------------------------------
*/

if ($action === 'get') {

    cartResponse(
        true,
        'Cart retrieved.',
        [
            'cart'    => $_SESSION['cart'],
            'summary' => getCartSummary(),
        ]
    );
}


/*
|--------------------------------------------------------------------------
| CLEAR CART
|--------------------------------------------------------------------------
*/

if ($action === 'clear') {

    $_SESSION['cart'] = [];

    cartResponse(
        true,
        'Cart cleared.',
        [
            'cart'    => [],
            'summary' => getCartSummary(),
        ]
    );
}


/*
|--------------------------------------------------------------------------
| CART KEY
|--------------------------------------------------------------------------
|
| Example:
|
| cool-mint|20mg
|
*/

$cartKey = trim(
    (string) ($data['cartKey'] ?? '')
);


/*
|--------------------------------------------------------------------------
| REMOVE
|--------------------------------------------------------------------------
*/

if ($action === 'remove') {

    if ($cartKey === '') {

        cartResponse(
            false,
            'Cart item key is required.'
        );
    }


    if (!isset($_SESSION['cart'][$cartKey])) {

        cartResponse(
            false,
            'Cart item was not found.'
        );
    }


    $removed =
        $_SESSION['cart'][$cartKey]['name']
        ?? 'Product';


    unset(
        $_SESSION['cart'][$cartKey]
    );


    cartResponse(
        true,
        $removed . ' removed from your selection.',
        [
            'cart'    => $_SESSION['cart'],
            'summary' => getCartSummary(),
        ]
    );
}


/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/

if ($action === 'update') {

    if ($cartKey === '') {

        cartResponse(
            false,
            'Cart item key is required.'
        );
    }


    if (!isset($_SESSION['cart'][$cartKey])) {

        cartResponse(
            false,
            'Cart item was not found.'
        );
    }


    $quantity = (int) (
        $data['quantity'] ?? 1
    );


    $quantity = max(
        1,
        min($quantity, 99)
    );


    $_SESSION['cart'][$cartKey]['quantity'] =
        $quantity;


    cartResponse(
        true,
        'Cart updated.',
        [
            'cart'    => $_SESSION['cart'],
            'summary' => getCartSummary(),
        ]
    );
}


/*
|--------------------------------------------------------------------------
| ADD TO CART
|--------------------------------------------------------------------------
*/

if ($action === 'add') {

    $slug = trim(
        (string) ($data['slug'] ?? '')
    );


    if ($slug === '') {

        cartResponse(
            false,
            'Product slug is required.'
        );
    }


    if (!isset($products[$slug])) {

        cartResponse(
            false,
            'Invalid product.'
        );
    }


    $product =
        $products[$slug];


    /*
    | Strength
    */

    $strength = trim(
        (string) (
            $data['strength']
            ?? '20 MG'
        )
    );


    if (
        !empty($product['strengths']) &&
        !in_array(
            $strength,
            $product['strengths'],
            true
        )
    ) {

        cartResponse(
            false,
            'Invalid strength selected.'
        );
    }


    /*
    | Quantity
    */

    $quantity = (int) (
        $data['quantity'] ?? 1
    );


    $quantity = max(
        1,
        min($quantity, 99)
    );


    /*
    | Create unique cart key
    */

    $normalisedStrength =
        strtolower(
            preg_replace(
                '/[^a-z0-9]/i',
                '',
                $strength
            )
        );


    $cartKey =
        $slug . '|' . $normalisedStrength;


    /*
    | Existing item
    */

    if (
        isset(
            $_SESSION['cart'][$cartKey]
        )
    ) {

        $_SESSION['cart'][$cartKey]['quantity'] =
            min(
                99,
                $_SESSION['cart'][$cartKey]['quantity']
                + $quantity
            );

    } else {

        $_SESSION['cart'][$cartKey] = [

            'slug' =>
                $slug,

            'name' =>
                $product['name'],

            'image' =>
                $product['image'],

            'strength' =>
                $strength,

            'price' =>
                (float) $product['price'],

            'quantity' =>
                $quantity,

        ];
    }


    cartResponse(
        true,
        $product['name'] .
        ' added to your selection.',
        [
            'cartKey' =>
                $cartKey,

            'cart' =>
                $_SESSION['cart'],

            'summary' =>
                getCartSummary(),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| TEMPORARY SESSION DEBUG
|--------------------------------------------------------------------------
*/

if ($action === 'debug') {

    cartResponse(
        true,
        'Session debug',
        [
            'session_id' => session_id(),
            'cart'       => $_SESSION['cart'],
            'summary'    => getCartSummary(),
        ]
    );
}
/*
|--------------------------------------------------------------------------
| UNKNOWN ACTION
|--------------------------------------------------------------------------
*/

cartResponse(
    false,
    'Unknown cart action.'
);