<?php
/**
 * ==========================================================
 * NIXGO9 — ABOUT PAGE
 * Premium Editorial About Experience
 * ==========================================================
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/core/config.php';


/*
|-------------------------------------------------------------------------- 
| Page Information
|-------------------------------------------------------------------------- 
*/

$page = [
    'title'       => 'NIXGO9 | About',
    'description' => 'Discover NIXGO9 — a complete product development and manufacturing pathway built around formulation, design, quality and scale.',
    'keywords'    => 'NIXGO9, About, Nicotine Pouches, Product Development, Formulation, Manufacturing, Private Label',
    'canonical'   => BASE_URL . 'about.php',
    'body_class'  => 'about-page'
];


/*
|-------------------------------------------------------------------------- 
| Page Header
|-------------------------------------------------------------------------- 
*/

include __DIR__ . '/includes/layout/header.php';


/*
|-------------------------------------------------------------------------- 
| Navigation
|-------------------------------------------------------------------------- 
*/

include __DIR__ . '/includes/layout/navbar.php';
?>


<main id="main-content">

    <?php
    include __DIR__ . '/includes/scenes/about-page.php';
    ?>

</main>


<?php

/*
|-------------------------------------------------------------------------- 
| Footer
|-------------------------------------------------------------------------- 
*/

include __DIR__ . '/includes/layout/footer.php';


/*
|-------------------------------------------------------------------------- 
| Global JavaScript
|-------------------------------------------------------------------------- 
*/

include __DIR__ . '/includes/layout/scripts.php';

?>