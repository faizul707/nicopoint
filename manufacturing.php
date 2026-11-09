<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/core/config.php';

$page = [
    'title'       => 'NIXGO9 | Manufacturing',
    'description' => 'From product ideas and formulation to production, packaging, planning and business support — discover how NIXGO9 helps bring products to life.',
    'keywords'    => 'NIXGO9 manufacturing, nicotine pouch manufacturing, private label, wholesale, retail, product development, packaging, production',
    'canonical'   => BASE_URL . 'manufacturing.php',
    'body_class'  => 'manufacturing-page'
];

include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/navbar.php';
?>

<main id="main-content" class="nx-manufacturing-page">

    <!-- HERO -->
    <section class="nx-mfg-hero">
        <div class="nx-mfg-hero__image" aria-hidden="true"></div>
        <div class="nx-mfg-hero__veil" aria-hidden="true"></div>

        <div class="container nx-mfg-hero__inner">
            <div class="nx-mfg-hero__copy">
                <span class="nx-mfg-kicker">MANUFACTURING · PRODUCT · PARTNERSHIP</span>

                <h1>
                    Where an idea
                    <span>becomes a product.</span>
                </h1>

                <p>
                    Maybe you already have a brand. Maybe you have a product idea.
                    Maybe you know exactly what you want — or maybe you're still
                    working it out. You don't have to have every answer before
                    you talk to us.
                </p>

                <div class="nx-mfg-hero__actions">
                    <a href="/contact.php" class="nx-mfg-button nx-mfg-button--primary">
                        Tell us what you're thinking <span>→</span>
                    </a>
                    <a href="#mfg-start" class="nx-mfg-text-link">
                        See how we help <span>↓</span>
                    </a>
                </div>
            </div>

            <div class="nx-mfg-hero__note">
                <span>FROM IDEA</span>
                <i></i>
                <span>TO PRODUCTION</span>
                <i></i>
                <span>TO YOUR MARKET</span>
            </div>
        </div>
    </section>

    <!-- INTRO / HUMAN PARTNERSHIP -->
    <section class="nx-mfg-intro" id="mfg-start">
        <div class="container">
            <div class="nx-mfg-intro__editorial">

                <div class="nx-mfg-intro__copy">
                    <div class="nx-mfg-label">
                        <span>01</span> YOU DON'T HAVE TO BUILD IT ALONE
                    </div>

                    <h2>
                        Some people come to us
                        <span>with a finished plan.</span>
                    </h2>

                    <p class="nx-mfg-lead">
                        Others simply say, “I want to build this.”
                    </p>

                    <p>
                        Both are good places to start. We work with retail
                        customers, wholesale buyers, brands and businesses
                        looking to develop and manufacture their own products.
                    </p>

                    <p>
                        We can help you understand the product, the production
                        side, packaging, planning, costing and the practical
                        details that sit between an idea and a finished box.
                    </p>

                    <p class="nx-mfg-soft">
                        Tell us what you're thinking. We'll work through it together.
                    </p>

                    <div class="nx-mfg-intro__services" aria-label="Ways we can help">
                        <div>
                            <span class="nx-mfg-service-icon">•••</span>
                            <strong>Personal<br>consultation</strong>
                        </div>
                        <div>
                            <span class="nx-mfg-service-icon">⚙</span>
                            <strong>Technical<br>guidance</strong>
                        </div>
                        <div>
                            <span class="nx-mfg-service-icon">□</span>
                            <strong>Packaging<br>support</strong>
                        </div>
                        <div>
                            <span class="nx-mfg-service-icon">♧</span>
                            <strong>Business<br>growth</strong>
                        </div>
                    </div>

                    <div class="nx-mfg-intro__actions">
                        <a href="/contact.php" class="nx-mfg-button nx-mfg-button--green">
                            Let's discuss your idea <span>→</span>
                        </a>

                        <div class="nx-mfg-intro__statement">
                            <span></span>
                            <div>
                                <strong>FROM IDEA TO IMPACT</strong>
                                <small>A CLEANER TOMORROW</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nx-mfg-intro__visual">
                    <img
                        src="<?= IMG_PATH ?>manufacturing/manufacturing-idea.jpg"
                        alt="NIXGO9 product development conversation"
                        loading="lazy"
                    >
                    <div class="nx-mfg-intro__visual-copy">
                        <span>IDEAS</span>
                        <span>PRODUCTS</span>
                        <span>PARTNERSHIPS</span>
                        <span>A CLEANER TOMORROW</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- IDEA -->
    <section class="nx-mfg-story nx-mfg-story--split">
        <div class="container nx-mfg-split">
            <div class="nx-mfg-media nx-mfg-media--tall">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-idea.jpg"
                     alt="Team discussing a new product idea"
                     loading="lazy">
                <span class="nx-mfg-image-caption">THE FIRST CONVERSATION</span>
            </div>

            <div class="nx-mfg-story__copy">
                <div class="nx-mfg-label"><span>02</span> START WITH THE IDEA</div>
                <h2>You don't need to know every technical detail.</h2>
                <p>
                    Start with the simple things. What are you trying to build?
                    Who is it for? Where do you want to sell it? What should it
                    feel like? What kind of price point are you working toward?
                </p>
                <p>
                    From flavour and strength to quantity, packaging and positioning,
                    these conversations help turn a rough idea into something we can
                    actually work on.
                </p>
                <div class="nx-mfg-quote">
                    “Bring the idea. We'll help with the details.”
                </div>
            </div>
        </div>
    </section>

    <!-- RAW MATERIALS -->
    <section class="nx-mfg-image-band">
        <div class="container">
            <div class="nx-mfg-image-band__grid">
                <div>
                    <span class="nx-mfg-kicker">THE MATERIALS MATTER</span>
                    <h2>Before the machine starts, <span>the product has to make sense.</span></h2>
                    <p>
                        Ingredients, materials, flavour direction and product
                        characteristics all have a place in the conversation.
                        We look at the product as a whole rather than treating
                        manufacturing as an isolated step.
                    </p>
                </div>

                <div class="nx-mfg-media">
                    <img src="<?= IMG_PATH ?>manufacturing/manufacturing-raw-materials.jpg"
                         alt="Natural raw materials and botanicals"
                         loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- FORMULATION -->
    <section class="nx-mfg-story nx-mfg-story--reverse">
        <div class="container nx-mfg-split">
            <div class="nx-mfg-story__copy">
                <div class="nx-mfg-label"><span>03</span> THEN WE WORK OUT THE PRODUCT</div>
                <h2>Formulation is where the idea starts becoming real.</h2>
                <p>
                    This is where product characteristics begin to take shape:
                    flavour direction, strength, pouch characteristics, materials
                    and the details that affect how the finished product feels.
                </p>
                <p>
                    The goal is not simply to make something that can be produced.
                    It is to make something that makes sense for the brand and
                    the market you're trying to serve.
                </p>
            </div>

            <div class="nx-mfg-media nx-mfg-media--tall">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-formulation.jpg"
                     alt="Product formulation work in a laboratory"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- PRODUCT DEVELOPMENT -->
    <section class="nx-mfg-development">
        <div class="container">
            <div class="nx-mfg-development__heading">
                <div class="nx-mfg-label"><span>04</span> MAKE IT FEEL LIKE YOUR PRODUCT</div>
                <h2>Product development is more than a formula.</h2>
                <p>
                    The product, the pack and the experience have to belong together.
                    That's why we keep product development and packaging conversations
                    connected.
                </p>
            </div>

            <div class="nx-mfg-development__visual">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-product-development.jpg"
                     alt="Team developing product and packaging concepts"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- TECHNICAL SUPPORT -->
    <section class="nx-mfg-support">
        <div class="container">
            <div class="nx-mfg-support__heading">
                <span class="nx-mfg-kicker">THE PART MOST PEOPLE DON'T SEE</span>
                <h2>Good manufacturing is also about solving the practical problems.</h2>
                <p>
                    Machines, packaging, planning, costing and production decisions
                    can quickly become complicated. This is where practical support
                    matters.
                </p>
            </div>

            <div class="nx-mfg-support__grid">
                <article>
                    <span>01</span>
                    <h3>Machines</h3>
                    <p>Understand the production equipment and setup needed for the product you are planning.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Packaging</h3>
                    <p>Work through pack formats, materials, presentation and the practical side of getting products packed.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Planning</h3>
                    <p>Think through quantities, production requirements, timelines and the steps that need to happen in order.</p>
                </article>
                <article>
                    <span>04</span>
                    <h3>Costing</h3>
                    <p>Understand the main production and packaging considerations that affect your product economics.</p>
                </article>
                <article>
                    <span>05</span>
                    <h3>Technical assistance</h3>
                    <p>Talk through the practical production questions that appear once an idea moves closer to manufacturing.</p>
                </article>
                <article>
                    <span>06</span>
                    <h3>Production support</h3>
                    <p>Keep the conversation connected from approved product direction through production and packing.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- MACHINE IMAGE -->
    <section class="nx-mfg-full-image">
        <div class="container">
            <div class="nx-mfg-full-image__frame">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-machine-planning.jpg"
                     alt="Technical team reviewing manufacturing machinery"
                     loading="lazy">
                <div class="nx-mfg-full-image__overlay">
                    <span>FROM THE MACHINE</span>
                    <strong>TO THE PRODUCT IN YOUR HAND.</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCTION -->
    <section class="nx-mfg-production">
        <div class="container">
            <div class="nx-mfg-production__intro">
                <div class="nx-mfg-label"><span>05</span> WHEN IT'S TIME TO MAKE IT REAL</div>
                <h2>Production should feel like the next step — not a completely different world.</h2>
                <p>
                    Once the product direction is clear, production brings together
                    people, machinery, materials, process and attention to detail.
                    That is where an idea becomes something repeatable.
                </p>
            </div>

            <div class="nx-mfg-production__grid">
                <div class="nx-mfg-media">
                    <img src="<?= IMG_PATH ?>manufacturing/manufacturing-production.jpg"
                         alt="Modern production line"
                         loading="lazy">
                </div>
                <div class="nx-mfg-production__copy">
                    <h3>People and machines work together.</h3>
                    <p>
                        Machinery gives a production system its repeatability.
                        People bring judgement, care and the ability to respond
                        when something needs attention.
                    </p>
                    <p>
                        That's why the manufacturing story isn't just about
                        equipment. It's about the people behind it.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CRAFT -->
    <section class="nx-mfg-craft">
        <div class="container nx-mfg-craft__grid">
            <div class="nx-mfg-craft__copy">
                <div class="nx-mfg-label"><span>06</span> PEOPLE STILL MATTER</div>
                <h2>Even in a modern facility, <span>good work is personal.</span></h2>
                <p>
                    Every pouch, pack and finished product passes through a chain
                    of decisions. Careful handling, attention to detail and people
                    who understand what they are making all matter.
                </p>
            </div>
            <div class="nx-mfg-media">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-craftsmanship.jpg"
                     alt="Worker carefully handling finished pouches"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- QUALITY -->
    <section class="nx-mfg-quality">
        <div class="container">
            <div class="nx-mfg-quality__heading">
                <span class="nx-mfg-kicker">QUALITY WITHOUT THE CORPORATE SPEECH</span>
                <h2>Check it. Verify it. Keep it consistent.</h2>
                <p>
                    Quality is part of the journey from development through
                    production and packaging. The exact checks depend on the
                    product and production requirements, but the principle stays
                    simple: understand what should be right, then check it.
                </p>
            </div>

            <div class="nx-mfg-quality__visual">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-quality.jpg"
                     alt="Quality inspection of finished product"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- PACKAGING -->
    <section class="nx-mfg-packaging">
        <div class="container nx-mfg-split">
            <div class="nx-mfg-media nx-mfg-media--tall">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-packaging.jpg"
                     alt="Packaging process in a modern production facility"
                     loading="lazy">
            </div>
            <div class="nx-mfg-story__copy">
                <div class="nx-mfg-label"><span>07</span> THEN WE PACK IT FOR THE WORLD</div>
                <h2>Packaging is where the product meets the customer.</h2>
                <p>
                    The final pack needs to protect the product, communicate the
                    brand and work in the real world. We help connect packaging
                    decisions with the product and production requirements.
                </p>
                <p>
                    From the format and materials to the practical packing process,
                    this is another part of the journey we can work through together.
                </p>
            </div>
        </div>
    </section>

    <!-- BUSINESS -->
    <section class="nx-mfg-business">
        <div class="container">
            <div class="nx-mfg-business__heading">
                <div class="nx-mfg-label"><span>08</span> AND THEN COMES YOUR BUSINESS</div>
                <h2>We don't only make products. <span>We help people build businesses around them.</span></h2>
                <p>
                    Some customers simply want finished products. Others want to
                    create a wholesale operation, develop a private-label range,
                    build a new brand or expand an existing business.
                </p>
            </div>

            <div class="nx-mfg-business__cards">
                <article>
                    <span>RETAIL</span>
                    <h3>Finished products, ready to sell.</h3>
                    <p>For customers looking to purchase finished NIXGO9 products for their market.</p>
                </article>
                <article>
                    <span>WHOLESALE</span>
                    <h3>Built around quantity and continuity.</h3>
                    <p>For businesses buying products for resale and distribution.</p>
                </article>
                <article>
                    <span>PRIVATE LABEL</span>
                    <h3>Your brand. Your direction.</h3>
                    <p>For businesses looking to develop a product range around their own brand.</p>
                </article>
                <article>
                    <span>MANUFACTURING</span>
                    <h3>From concept to production.</h3>
                    <p>For partners who need product development and manufacturing support.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- PLANNING -->
    <section class="nx-mfg-planning">
        <div class="container nx-mfg-planning__grid">
            <div class="nx-mfg-media">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-planning-costing.jpg"
                     alt="Team reviewing production planning and costing"
                     loading="lazy">
            </div>
            <div class="nx-mfg-planning__copy">
                <span class="nx-mfg-kicker">BUILDING THE BUSINESS SIDE</span>
                <h2>Because a good product still needs a good plan.</h2>
                <p>
                    Production quantities, packaging choices, costing, timing and
                    the route to market all influence the business around a product.
                </p>
                <p>
                    We can sit with you and work through those questions instead
                    of leaving you to figure them out alone.
                </p>
                <a href="/contact.php" class="nx-mfg-text-link">Let's talk about your product <span>→</span></a>
            </div>
        </div>
    </section>

    <!-- WAREHOUSE -->
    <section class="nx-mfg-warehouse">
        <div class="container">
            <div class="nx-mfg-warehouse__frame">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-warehouse.jpg"
                     alt="Finished products prepared in a warehouse"
                     loading="lazy">
                <div class="nx-mfg-warehouse__copy">
                    <span>WHEN THE PRODUCT IS READY</span>
                    <h2>It should feel like a beginning, not an ending.</h2>
                    <p>
                        Finished products are where your next chapter starts:
                        selling, distributing, launching, growing and learning
                        what customers want next.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- PARTNERSHIP -->
    <section class="nx-mfg-partnership">
        <div class="container nx-mfg-partnership__grid">
            <div class="nx-mfg-partnership__copy">
                <div class="nx-mfg-label"><span>09</span> WE'D RATHER BUILD WITH YOU</div>
                <h2>Come with the idea. <span>Stay for the conversation.</span></h2>
                <p>
                    The best projects are not built from a single handoff.
                    They're built through conversations, questions, changes,
                    decisions and people working toward the same result.
                </p>
                <p>
                    Whether you're buying finished products, building a wholesale
                    business or developing your own brand, we're here to help you
                    understand the next step.
                </p>
            </div>

            <div class="nx-mfg-media nx-mfg-media--tall">
                <img src="<?= IMG_PATH ?>manufacturing/manufacturing-partnership.jpg"
                     alt="Business partners discussing a product opportunity"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="nx-mfg-final">
        <div class="nx-mfg-final__glow" aria-hidden="true"></div>
        <div class="container">
            <div class="nx-mfg-final__inner">
                <span class="nx-mfg-kicker">YOUR NEXT STEP</span>
                <h2>Bring us the idea.<br><span>We'll help with the rest.</span></h2>
                <p>
                    You don't need a perfect plan before you reach out.
                    Tell us what you're building, where you are today and
                    what you want to achieve.
                </p>
                <a href="/contact.php" class="nx-mfg-button nx-mfg-button--primary">
                    Start the conversation <span>→</span>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
include __DIR__ . '/includes/layout/footer.php';
include __DIR__ . '/includes/layout/scripts.php';
?>
