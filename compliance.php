<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/core/config.php';
$page=[
 'title'=>'Compliance | NIXGO9',
 'description'=>'NIXGO9 is intended for adult audiences and its nicotine-related products and information are subject to applicable laws and age restrictions.',
 'keywords'=>'NIXGO9 Compliance',
 'canonical'=>BASE_URL . 'compliance.php',
 'body_class'=>'legal-page',
];
require_once __DIR__ . '/includes/layout/header.php';
?>
<link rel="stylesheet" href="<?= CSS_PATH ?>legal.css?v=20261004">
<main class="legal-page">
<section class="legal-shell">
<span class="legal-kicker">NIXGO9 / INFORMATION</span>
<h1>Responsible by design.</h1>
<p class="legal-intro">NIXGO9 is intended for adult audiences and its nicotine-related products and information are subject to applicable laws and age restrictions.</p>
<div class="legal-card">
<h2>Age restriction</h2>
<p>This website is intended for adults. You must meet the applicable minimum legal age in your location to continue.</p>
<h2>Local law</h2>
<p>Product availability, nicotine limits, labelling, import rules, marketing rules and sale restrictions can differ by market.</p>
<h2>No guarantee of availability</h2>
<p>A product or flavour shown on this website may not be available or lawful in every destination.</p>
<h2>Responsible use</h2>
<p>Nicotine is addictive. This website does not encourage non-users to start using nicotine products.</p>
</div>
<p class="legal-updated">Please check the laws and age requirements that apply in your location before using or purchasing any nicotine product.</p>
</section>
</main>
<?php require_once __DIR__ . '/includes/layout/footer.php'; ?>
<?php require_once __DIR__ . '/includes/layout/scripts.php'; ?>
