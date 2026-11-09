<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/core/config.php';
$page=[
 'title'=>'Privacy Policy | NIXGO9',
 'description'=>'This page describes the general approach to information used by the NIXGO9 website.',
 'keywords'=>'NIXGO9 Privacy Policy',
 'canonical'=>BASE_URL . 'privacy-policy.php',
 'body_class'=>'legal-page',
];
require_once __DIR__ . '/includes/layout/header.php';
?>
<link rel="stylesheet" href="<?= CSS_PATH ?>legal.css?v=20261004">
<main class="legal-page">
<section class="legal-shell">
<span class="legal-kicker">NIXGO9 / INFORMATION</span>
<h1>Privacy, handled with care.</h1>
<p class="legal-intro">This page describes the general approach to information used by the NIXGO9 website.</p>
<div class="legal-card">
<h2>Information we may receive</h2>
<p>When you contact us, create an optional account, or submit permitted order information, we may receive the details you choose to provide.</p>
<h2>How information is used</h2>
<p>Information may be used to provide website functionality, respond to enquiries, support permitted order processing, protect the service, and maintain records required by law.</p>
<h2>Account information</h2>
<p>Customer accounts are optional. Account credentials are stored using password hashing rather than plain-text passwords.</p>
<h2>Your choices</h2>
<p>You can choose not to create an account and can contact NIXGO9 about questions relating to your information.</p>
</div>
<p class="legal-updated">Please check the laws and age requirements that apply in your location before using or purchasing any nicotine product.</p>
</section>
</main>
<?php require_once __DIR__ . '/includes/layout/footer.php'; ?>
<?php require_once __DIR__ . '/includes/layout/scripts.php'; ?>
