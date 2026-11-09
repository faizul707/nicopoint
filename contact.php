<?php
/**
 * ==========================================================
 * NIXGO9 — CONTACT PAGE
 * Cinematic Contact Experience
 * ==========================================================
 */

declare(strict_types=1);


/*
|-------------------------------------------------------------------------- 
| Load Core Configuration
|-------------------------------------------------------------------------- 
*/

require_once __DIR__ . '/includes/core/config.php';


/*
|-------------------------------------------------------------------------- 
| Page Information
|-------------------------------------------------------------------------- 
*/

$page = [
    'title'       => 'NIXGO9 | Contact',
    'description' => 'Connect with NIXGO9 for premium nicotine pouch solutions, private label development and business enquiries.',
    'keywords'    => 'NIXGO9, Contact, Private Label, Nicotine Pouches, Business Enquiries',
    'canonical'   => BASE_URL . 'contact.php',
    'body_class'  => 'contact-page'
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


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main id="main-content">


    <!-- =====================================================
         CONTACT PAGE SCENE
    ====================================================== -->

    <?php
    include __DIR__ . '/includes/scenes/contact-page.php';
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