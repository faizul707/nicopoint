<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/core/config.php';
$page=[
 'title'=>'Refund Policy | NIXGO9',
 'description'=>'Refunds, cancellations and returns depend on the product, destination and applicable local law.',
 'keywords'=>'NIXGO9 Refund Policy',
 'canonical'=>BASE_URL . 'refund-policy.php',
 'body_class'=>'legal-page',
];
require_once __DIR__ . '/includes/layout/header.php';
?>
<link rel="stylesheet" href="<?= CSS_PATH ?>legal.css?v=20261004">
<main class="legal-page">
<section class="legal-shell">
<span class="legal-kicker">NIXGO9 / INFORMATION</span>
<h1>Clear terms. No surprises.</h1>
<p class="legal-intro">Refunds, cancellations and returns depend on the product, destination and applicable local law.</p>
<div class="legal-card">
<h2>Order review</h2>
<p>Orders are subject to the applicable legal, age, destination and fulfilment checks.</p>
<h2>Cancellations</h2>
<p>If an order can no longer be cancelled because processing has begun, the available options will depend on the applicable law and order status.</p>
<h2>Refunds</h2>
<p>Where a refund is legally available and approved, it will be handled using the applicable payment and fulfilment process.</p>
<h2>Contact</h2>
<p>For an order-specific question, use the contact page and include the relevant order reference.</p>
</div>
<p class="legal-updated">Please check the laws and age requirements that apply in your location before using or purchasing any nicotine product.</p>
</section>
</main>
<?php require_once __DIR__ . '/includes/layout/footer.php'; ?>
<?php require_once __DIR__ . '/includes/layout/scripts.php'; ?>
