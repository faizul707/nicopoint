<?php
/**
 * ==========================================================
 * NIXGO9
 * WHY NIXGO9 — BUSINESS INFORMATION PAGE
 * ==========================================================
 */

require_once __DIR__ . '/includes/core/config.php';


/* ==========================================================
   PAGE META
========================================================== */

$page = [

    'title' =>
        'Why NIXGO9 | Business Capabilities',

    'description' =>
        'Understand NIXGO9 business capabilities, manufacturing coordination, private-label programs, documentation and international business pathways.',

    'keywords' =>
        'NIXGO9, business capabilities, manufacturing, private label, export, documentation',

    'canonical' =>
        BASE_URL . 'why-nixgo9.php',

    'body_class' =>
        'why-nixgo9-page'

];


/* ==========================================================
   SHARED HEADER
========================================================== */

require_once __DIR__ . '/includes/layout/header.php';

?>


<!-- ==========================================================
     WHY NIXGO9 PAGE STYLESHEET
     Versioned to prevent stale browser cache
========================================================== -->

<link
    rel="stylesheet"
    href="<?= CSS_PATH ?>why-nixgo9.css?v=20260907"
>


<!-- ==========================================================
     MAIN CONTENT
========================================================== -->

<main
    id="main-content"
    class="why-nixgo9-page"
>

    <?php
    require_once __DIR__ . '/includes/scenes/why-nixgo9-scene.php';
    ?>

</main>


<?php

/* ==========================================================
   SHARED FOOTER
========================================================== */

require_once __DIR__ . '/includes/layout/footer.php';

?>