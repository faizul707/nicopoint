<?php
/**
 * ============================================================
 * NIXGO9 — PRODUCTS PAGE V3
 * Editorial collection / real product imagery / compact flow
 * ============================================================
 */

require_once __DIR__ . '/includes/core/config.php';

$page = [
    'title'       => 'NIXGO9 | Nicotine Pouches & Flavours',
    'description' => 'Explore the NIXGO9 collection of premium tobacco-free nicotine pouch flavours, strengths and formats.',
    'keywords'    => 'NIXGO9, nicotine pouches, tobacco-free nicotine pouches, nicotine pouch flavours, private label nicotine pouches',
    'canonical'   => BASE_URL . 'products.php',
    'body_class'  => 'products-page-body'
];

require_once __DIR__ . '/includes/layout/header.php';

/* Keep the existing catalogue exactly as supplied in the current Products page. */
$products = [
    ['slug'=>'cool-mint','name'=>'Cool Mint','category'=>'Mint','profile'=>'Cool • Fresh • Crisp','description'=>'Crisp, fresh and cooling with a clean mint profile.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'12 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'SIGNATURE','theme'=>'mint','number'=>'01','image'=>'cool-mint.png'],
    ['slug'=>'spearmint','name'=>'Spearmint','category'=>'Mint','profile'=>'Cool • Crisp • Herbal','description'=>'A clean spearmint profile with a crisp and refreshing finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'CLASSIC','theme'=>'spearmint','number'=>'02','image'=>'spearmint.png'],
    ['slug'=>'sweet-green-mint','name'=>'Sweet Green Mint','category'=>'Mint','profile'=>'Sweet • Green • Cooling','description'=>'A softer green mint character with a naturally refreshing finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'FRESH','theme'=>'green','number'=>'03','image'=>'sweet-green-mint.png'],
    ['slug'=>'menthol-freeze','name'=>'Menthol Freeze','category'=>'Mint','profile'=>'Cold • Sharp • Intense','description'=>'An intense cooling character built around a sharp menthol finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'INTENSE','theme'=>'ice','number'=>'04','image'=>'menthol-freeze.png'],
    ['slug'=>'tropical-mix','name'=>'Tropical Mix','category'=>'Fruit','profile'=>'Tropical • Bright • Sweet','description'=>'A vibrant tropical profile with bright fruit character.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'TROPICAL','theme'=>'tropical','number'=>'05','image'=>'tropical-mix.png'],
    ['slug'=>'mango-burst','name'=>'Mango Burst','category'=>'Fruit','profile'=>'Smooth • Tropical • Sweet','description'=>'Smooth tropical mango character with a bright and expressive finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'FRUIT','theme'=>'mango','number'=>'06','image'=>'mango-burst.png'],
    ['slug'=>'citrus-zest','name'=>'Citrus Zest','category'=>'Citrus','profile'=>'Bright • Zesty • Refreshing','description'=>'Bright citrus notes delivering a lively and refreshing profile.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'ZEST','theme'=>'citrus','number'=>'07','image'=>'citrus-zest.png'],
    ['slug'=>'watermelon','name'=>'Watermelon','category'=>'Fruit','profile'=>'Juicy • Sweet • Fresh','description'=>'A juicy watermelon profile with a smooth refreshing character.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'JUICY','theme'=>'watermelon','number'=>'08','image'=>'watermelon.png'],
    ['slug'=>'blueberry','name'=>'Blueberry','category'=>'Berry','profile'=>'Rich • Fruity • Smooth','description'=>'A rich blueberry character with a smooth fruity finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'BERRY','theme'=>'blueberry','number'=>'09','image'=>'blueberry.png'],
    ['slug'=>'strawberry-ice','name'=>'Strawberry Ice','category'=>'Berry','profile'=>'Sweet • Fruity • Cool','description'=>'Sweet strawberry character balanced with a refreshing cooling note.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'COOL BERRY','theme'=>'strawberry','number'=>'10','image'=>'strawberry-ice.png'],
    ['slug'=>'coffee','name'=>'Coffee','category'=>'Coffee','profile'=>'Bold • Roasted • Rich','description'=>'A deeper roasted coffee profile designed for a distinctive finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'SIGNATURE','theme'=>'coffee','number'=>'11','image'=>'coffee.png'],
    ['slug'=>'vanilla','name'=>'Vanilla','category'=>'Classic','profile'=>'Soft • Creamy • Smooth','description'=>'A smooth vanilla profile with a soft and balanced character.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'CLASSIC','theme'=>'vanilla','number'=>'12','image'=>'Vanilla.png'],
    ['slug'=>'cinnamon','name'=>'Cinnamon','category'=>'Classic','profile'=>'Warm • Spiced • Bold','description'=>'A warm cinnamon profile with a distinctive spiced character.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'SPICED','theme'=>'cinnamon','number'=>'13','image'=>'cinnamon.png'],
    ['slug'=>'ginger-lemon','name'=>'Ginger Lemon','category'=>'Citrus','profile'=>'Zesty • Spiced • Bright','description'=>'A bright citrus profile layered with a warm ginger character.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'SIGNATURE','theme'=>'ginger','number'=>'14','image'=>'ginger-lemon.png'],
    ['slug'=>'licorice','name'=>'Licorice','category'=>'Classic','profile'=>'Deep • Herbal • Distinctive','description'=>'A distinctive herbal profile with deep and expressive character.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'ORIGINAL','theme'=>'licorice','number'=>'15','image'=>'licorice.png'],
    ['slug'=>'cola-ice','name'=>'Cola Ice','category'=>'Classic','profile'=>'Sweet • Fizzy • Cool','description'=>'A familiar cola character paired with a crisp cooling finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'COOL','theme'=>'cola','number'=>'16','image'=>'cola-ice.png'],
    ['slug'=>'cherry','name'=>'Cherry','category'=>'Berry','profile'=>'Sweet • Vibrant • Fruity','description'=>'Sweet and vibrant cherry character with a smooth finish.','strengths'=>['04 MG','10 MG','20 MG'],'default'=>'20 MG','format'=>'20 Pouches','price'=>'₹542','badge'=>'LIMITED','theme'=>'cherry','number'=>'17','image'=>'cherry.png'],
];
?>
<link rel="stylesheet" href="<?= CSS_PATH ?>products-v5.css?v=5.0.0">

<main id="main-content" class="nx-products-page">

<section class="nx-products-hero" aria-labelledby="products-title">
    <div class="nx-products-hero-media" aria-hidden="true"></div>
    <div class="nx-products-hero-shade" aria-hidden="true"></div>
    <div class="nx-products-container nx-products-hero-grid">
        <div class="nx-products-hero-copy">
            <p class="nx-products-kicker"><span></span> Premium nicotine pouches</p>
            <h1 id="products-title">Find your <em>flavour.</em><strong>Find your moment.</strong></h1>
            <p class="nx-products-hero-lead">A premium collection of tobacco-free nicotine pouches, crafted for different tastes, strengths and moments — from crisp mint to bright fruit, familiar classics and distinctive profiles.</p>
            <div class="nx-products-hero-facts">
                <span><b>17</b> flavours</span><span><b>20</b> pouches</span><span><b>04 / 10 / 20 MG</b> strengths</span><span><b>18+</b> adults only</span>
            </div>
            <a class="nx-products-button" href="#collection">Explore the collection <span>→</span></a>
        </div>
        <div class="nx-products-hero-product">
            <div class="nx-products-hero-product-stage"></div>
            <img src="<?= IMG_PATH ?>products/cool-mint.png" alt="NIXGO9 Cool Mint nicotine pouch" loading="eager" decoding="async">
            <div class="nx-products-hero-side-note"><strong>More flavour.</strong><span>Better moments.</span></div>
        </div>
    </div>
</section>

<section class="nx-products-families" aria-label="Flavour families">
    <div class="nx-products-container nx-products-family-row">
        <div class="nx-products-family-intro"><small>START HERE</small><strong>What are you in the mood for?</strong></div>
        <div class="nx-products-family-links">
            <?php foreach (['Mint','Fruit','Berry','Citrus','Coffee','Classic'] as $family): $fkey=strtolower($family); ?>
                <button type="button" data-filter="<?= htmlspecialchars($family) ?>" class="nx-family-link">
                    <img src="<?= IMG_PATH ?>products/family-icons/<?= $fkey ?>.jpg" alt="" aria-hidden="true"><span><?= htmlspecialchars($family) ?></span>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="nx-products-collection" id="collection">
    <div class="nx-products-container">
        <div class="nx-products-section-head">
            <div><p class="nx-products-kicker"><span></span> The collection</p><h2>Different flavours.<br><strong>Different personalities.</strong></h2></div>
            <p>Take your time. Start with a flavour family, look at the ingredients, compare the profiles, then open the pouch that catches your attention.</p>
        </div>

        <div class="nx-products-toolbar" id="productToolbar">
            <label class="nx-products-search"><span aria-hidden="true">⌕</span><input id="productSearch" type="search" placeholder="Search a flavour..." aria-label="Search a flavour"></label>
            <div class="nx-products-filter" id="productFilters">
                <button class="is-active" type="button" data-filter="all">All</button>
                <?php foreach (['Mint','Fruit','Berry','Citrus','Coffee','Classic'] as $family): $fkey=strtolower($family); ?>
                    <button type="button" data-filter="<?= htmlspecialchars($family) ?>"><img src="<?= IMG_PATH ?>products/family-icons/<?= $fkey ?>.jpg" alt="" aria-hidden="true"><?= htmlspecialchars($family) ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="nx-products-count"><span id="productCount">17</span> flavour profiles</div>

        <div class="nx-products-featured-head"><div><span>FEATURED FLAVOURS</span><h3>Start with four favourites.</h3></div><p>Each one gets its own visual world — not just a coloured background.</p></div>
        <div class="nx-products-grid nx-products-featured-grid" id="featuredGrid">
            <?php $featured=['cool-mint','mango-burst','blueberry','coffee']; foreach ($featured as $slug): foreach ($products as $product): if ($product['slug'] !== $slug) { continue; } ?>
                <article class="nx-product-card nx-product-card-featured" data-category="<?= htmlspecialchars($product['category']) ?>" data-name="<?= htmlspecialchars(strtolower($product['name'].' '.$product['profile'].' '.$product['description'])) ?>">
                    <div class="nx-product-card-visual" style="--flavour-image:url(<?= IMG_PATH ?>products/flavours/<?= htmlspecialchars($product['slug']) ?>.jpg)">
                        <span class="nx-product-number"><?= htmlspecialchars($product['number']) ?></span><span class="nx-product-category"><?= htmlspecialchars($product['category']) ?></span>
                        <img src="<?= IMG_PATH ?>products/<?= htmlspecialchars($product['image']) ?>" alt="NIXGO9 <?= htmlspecialchars($product['name']) ?> nicotine pouch" loading="lazy" decoding="async">
                        <span class="nx-card-heart" aria-hidden="true">♡</span>
                    </div>
                    <div class="nx-product-card-content"><span class="nx-product-badge"><?= htmlspecialchars($product['badge']) ?></span><h3><?= htmlspecialchars($product['name']) ?></h3><p class="nx-product-profile"><?= htmlspecialchars($product['profile']) ?></p><p class="nx-product-description"><?= htmlspecialchars($product['description']) ?></p><div class="nx-product-meta"><span>04 / 10 / 20 MG</span><span>20 Pouches</span></div><a href="product.php?slug=<?= urlencode($product['slug']) ?>" class="nx-product-link">Explore flavour <span>→</span></a></div>
                </article>
            <?php break; endforeach; endforeach; ?>
        </div>

        <div class="nx-products-all-head"><span>THE FULL COLLECTION</span><h3>17 flavour profiles. Take your time.</h3></div>
        <div class="nx-products-grid nx-products-all-grid" id="productsGrid">
            <?php foreach ($products as $product): if (in_array($product['slug'], ['cool-mint','mango-burst','blueberry','coffee'], true)) continue; ?>
                <article class="nx-product-card" data-category="<?= htmlspecialchars($product['category']) ?>" data-name="<?= htmlspecialchars(strtolower($product['name'].' '.$product['profile'].' '.$product['description'])) ?>">
                    <div class="nx-product-card-visual" style="--flavour-image:url(<?= IMG_PATH ?>products/flavours/<?= htmlspecialchars($product['slug']) ?>.jpg)"><span class="nx-product-number"><?= htmlspecialchars($product['number']) ?></span><span class="nx-product-category"><?= htmlspecialchars($product['category']) ?></span><img src="<?= IMG_PATH ?>products/<?= htmlspecialchars($product['image']) ?>" alt="NIXGO9 <?= htmlspecialchars($product['name']) ?> nicotine pouch" loading="lazy" decoding="async"></div>
                    <div class="nx-product-card-content"><span class="nx-product-badge"><?= htmlspecialchars($product['badge']) ?></span><h3><?= htmlspecialchars($product['name']) ?></h3><p class="nx-product-profile"><?= htmlspecialchars($product['profile']) ?></p><p class="nx-product-description"><?= htmlspecialchars($product['description']) ?></p><div class="nx-product-meta"><span>04 / 10 / 20 MG</span><span>20 Pouches</span></div><a href="product.php?slug=<?= urlencode($product['slug']) ?>" class="nx-product-link">Explore flavour <span>→</span></a></div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="nx-products-empty" id="productsEmpty" hidden>No flavour matched that search. Try another name or family.</div>
    </div>
</section>

<section class="nx-products-story">
    <div class="nx-products-container">
        <div class="nx-products-story-intro"><div><p class="nx-products-kicker"><span></span> More than a flavour list</p><h2>What goes into the <strong>experience matters too.</strong></h2></div><p>Behind every profile is a wider pathway — product development, formulation, manufacturing and attention to the details that make a finished product feel considered.</p></div>
        <div class="nx-products-story-grid">
            <figure class="nx-story-image nx-story-large"><img src="<?= IMG_PATH ?>products/flavours/cool-mint.jpg" alt="Mint leaves and ice inspiration" loading="lazy"><figcaption><span>01</span> Inspiration &amp; flavour</figcaption></figure>
            <div class="nx-story-copy-card"><span>THE DETAILS MATTER</span><h3>From the first idea to the finished pouch.</h3><p>Flavour is only one part of the journey. We think about the product as a whole — how it is developed, produced, packaged and prepared for the people and businesses it is meant to serve.</p><a href="manufacturing.php">See how we manufacture →</a></div>
            <figure class="nx-story-image"><img src="<?= IMG_PATH ?>products/flavours/coffee.jpg" alt="Coffee and botanical product inspiration" loading="lazy"><figcaption><span>02</span> Production &amp; precision</figcaption></figure>
            <figure class="nx-story-image nx-story-tall"><img src="<?= IMG_PATH ?>products/flavours/berries.jpg" alt="Berry ingredients and product direction" loading="lazy"><figcaption><span>03</span> Your brand, your direction</figcaption></figure>
        </div>
    </div>
</section>

<section class="nx-products-cta"><div class="nx-products-cta-image" aria-hidden="true"></div><div class="nx-products-container nx-products-cta-inner"><p class="nx-products-kicker"><span></span> Your next product</p><h2>Like one of these?<br><strong>Let’s build something of your own.</strong></h2><p>Explore private label development, manufacturing support and product options for your business.</p><div class="nx-products-cta-actions"><a class="nx-products-button" href="private-label.php">Explore private label <span>→</span></a><a class="nx-products-text-link" href="contact.php">Talk to us about your requirements ↗</a></div></div></section>
<div class="nx-products-age"><div class="nx-products-container"><strong>18+</strong><span>This product contains nicotine. Nicotine is addictive. For adults 18+ only, subject to the laws of your country. Keep out of reach of children.</span></div></div>
</main>

<script>
document.addEventListener('DOMContentLoaded',()=>{
 const page=document.querySelector('.nx-products-page'); if(!page)return;
 const cards=[...page.querySelectorAll('.nx-product-card')], buttons=[...page.querySelectorAll('[data-filter]')], search=page.querySelector('#productSearch'), count=page.querySelector('#productCount'), empty=page.querySelector('#productsEmpty'); let active='all';
 const apply=()=>{const q=(search?.value||'').trim().toLowerCase();let n=0;cards.forEach(c=>{const ok=(active==='all'||c.dataset.category===active)&&(!q||c.dataset.name.includes(q));c.hidden=!ok;if(ok)n++});if(count)count.textContent=n;if(empty)empty.hidden=n>0;};
 buttons.forEach(b=>b.addEventListener('click',()=>{active=b.dataset.filter||'all';buttons.forEach(x=>x.classList.toggle('is-active',x.dataset.filter===active));apply(); if(b.closest('.nx-products-families')) document.querySelector('#collection')?.scrollIntoView({behavior:'smooth',block:'start'});}));
 search?.addEventListener('input',apply); apply();
 if('IntersectionObserver' in window&&!window.matchMedia('(prefers-reduced-motion: reduce)').matches){const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('is-visible');io.unobserve(e.target)}}),{threshold:.06});cards.forEach(c=>io.observe(c));}else cards.forEach(c=>c.classList.add('is-visible'));
});
</script>
<?php include __DIR__ . '/includes/layout/footer.php'; include __DIR__ . '/includes/layout/scripts.php'; ?>
