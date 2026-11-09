<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/core/config.php';

$page = [
    'title'       => 'NIXGO9 | Global Export',
    'description' => 'NIXGO9 supports international customers and business partners with product development, manufacturing, packaging and export coordination from India.',
    'keywords'    => 'NIXGO9 global export, nicotine pouch export, India nicotine pouch manufacturer, wholesale nicotine pouches, international private label',
    'canonical'   => BASE_URL . 'global-export.php',
    'body_class'  => 'global-export-page'
];

include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/navbar.php';
?>

<link
    rel="stylesheet"
    href="<?= CSS_PATH ?>global-export.css?v=999"
>

<main id="main-content" class="nx-global-page">

    <!-- HERO -->
    <section class="nx-gx-hero">
        <div class="nx-gx-hero__image" aria-hidden="true"></div>
        <div class="nx-gx-hero__veil" aria-hidden="true"></div>

        <div class="container nx-gx-hero__inner">
            <div class="nx-gx-hero__copy">
                <span class="nx-gx-kicker">GLOBAL EXPORT · FROM INDIA</span>

                <h1>
                    From here.
                    <span>To wherever you're building.</span>
                </h1>

                <p>
                    A product can start in one place and become part of a
                    business somewhere completely different. We help make
                    that journey easier to understand — from product and
                    packaging to production and export coordination.
                </p>

                <div class="nx-gx-hero__actions">
                    <a href="<?= BASE_URL ?>contact.php" class="nx-gx-button nx-gx-button--light">
                        Talk about your market <span>→</span>
                    </a>
                    <a href="#global-story" class="nx-gx-link">
                        Explore the journey <span>↓</span>
                    </a>
                </div>
            </div>

            <div class="nx-gx-hero__side">
                <span>INDIA</span>
                <span>PRODUCT</span>
                <span>PACKAGING</span>
                <span>EXPORT</span>
                <i></i>
                <small>ONE PARTNER<br>FROM ORIGIN TO MARKET</small>
            </div>
        </div>
    </section>

    <!-- HUMAN INTRO -->
    <section class="nx-gx-intro" id="global-story">
        <div class="container nx-gx-split">
            <div class="nx-gx-media">
                <img
                    src="<?= IMG_PATH ?>global/global-export.png"
                    alt="Global export and international distribution concept"
                    loading="lazy"
                >
                <span class="nx-gx-media__caption">FROM INDIA · TOWARD GLOBAL MARKETS</span>
            </div>

            <div class="nx-gx-copy">
                <span class="nx-gx-label"><b>01</b> GLOBAL DOESN'T HAVE TO FEEL FAR AWAY</span>

                <h2>
                    International business
                    <span>still starts with a conversation.</span>
                </h2>

                <p class="nx-gx-lead">
                    Tell us where you are, what you're building and what you need.
                </p>

                <p>
                    Working across borders can bring more questions: product
                    requirements, quantities, packaging, documentation,
                    production planning, freight and timing. We believe those
                    conversations should feel clear and human.
                </p>

                <p>
                    Whether you're buying finished products, developing a
                    private-label range or looking for a manufacturing partner,
                    we can work through the practical side with you.
                </p>

                <div class="nx-gx-pills">
                    <span>Wholesale</span>
                    <span>Private Label</span>
                    <span>Production</span>
                    <span>Export Support</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ORIGIN -->
    <section class="nx-gx-origin">
        <div class="container nx-gx-origin__grid">
            <div class="nx-gx-copy">
                <span class="nx-gx-kicker nx-gx-kicker--green">THE JOURNEY STARTS AT ORIGIN</span>

                <h2>
                    Good export work
                    <span>begins before the shipment.</span>
                </h2>

                <p>
                    Before anything leaves India, there is a product to make,
                    a specification to understand and a package to prepare.
                    That's why export support is connected to the work we do
                    earlier — product development, manufacturing and packaging.
                </p>

                <p>
                    The better those pieces are understood at the beginning,
                    the clearer the conversation becomes when it is time to
                    prepare a shipment for an international customer.
                </p>

                <div class="nx-gx-quote">
                    <span></span>
                    <strong>THE GOAL IS SIMPLE: MAKE THE NEXT STEP CLEAR.</strong>
                </div>
            </div>

            <div class="nx-gx-origin__visual">
                <img
                    src="<?= IMG_PATH ?>global/global-logistics.png"
                    alt="Global logistics and shipment preparation"
                    loading="lazy"
                >
            </div>
        </div>
    </section>

    <!-- WHAT WE HELP WITH -->
    <section class="nx-gx-support">
        <div class="container">
            <div class="nx-gx-support__heading">
                <span class="nx-gx-label"><b>02</b> WHAT WE HELP YOU WORK THROUGH</span>
                <h2>
                    The details matter.
                    <span>So we don't leave them until the end.</span>
                </h2>
                <p>
                    International orders are made up of many small decisions.
                    We help bring those conversations together so your team
                    knows what is happening and what needs to happen next.
                </p>
            </div>

            <div class="nx-gx-support__grid">
                <article>
                    <span>01</span>
                    <h3>Product requirements</h3>
                    <p>Discuss the product, format, flavour direction, strength and other agreed specifications.</p>
                </article>

                <article>
                    <span>02</span>
                    <h3>Packaging</h3>
                    <p>Work through packaging format, quantities, presentation and production requirements.</p>
                </article>

                <article>
                    <span>03</span>
                    <h3>Production planning</h3>
                    <p>Coordinate the practical manufacturing conversation around quantities and preparation.</p>
                </article>

                <article>
                    <span>04</span>
                    <h3>Documentation</h3>
                    <p>Understand the business and shipment documentation required for the agreed transaction.</p>
                </article>

                <article>
                    <span>05</span>
                    <h3>Shipment coordination</h3>
                    <p>Keep the handover between production, packaging and logistics clear as the order moves forward.</p>
                </article>

                <article>
                    <span>06</span>
                    <h3>Ongoing communication</h3>
                    <p>Stay connected through the process instead of wondering what happens after the purchase order.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- PACKAGING / PRODUCT -->
    <section class="nx-gx-packaging">
        <div class="container nx-gx-split nx-gx-split--reverse">
            <div class="nx-gx-copy">
                <span class="nx-gx-label"><b>03</b> WHAT ARRIVES MATTERS TOO</span>

                <h2>
                    Export isn't only about
                    <span>moving a box.</span>
                </h2>

                <p class="nx-gx-lead">
                    It is about helping your customer receive the product you agreed to build.
                </p>

                <p>
                    Packaging, product presentation, quantities and preparation
                    all become part of the customer experience. That's why we
                    treat the export conversation as an extension of the product
                    and manufacturing work — not a separate afterthought.
                </p>

                <a href="<?= BASE_URL ?>private-label.php" class="nx-gx-button nx-gx-button--green">
                    Explore private label <span>→</span>
                </a>
            </div>

            <div class="nx-gx-media">
                <img
                    src="<?= IMG_PATH ?>manufacturing/manufacturing-packaging.jpg"
                    alt="Product packaging prepared for manufacturing and distribution"
                    loading="lazy"
                >
            </div>
        </div>
    </section>

    <!-- PARTNERSHIP -->
    <section class="nx-gx-partnership">
        <div class="container nx-gx-partnership__grid">
            <div>
                <span class="nx-gx-kicker">FOR BUSINESS PARTNERS</span>

                <h2>
                    You don't need to know
                    <span>every answer before you call us.</span>
                </h2>
            </div>

            <div class="nx-gx-partnership__copy">
                <p>
                    Tell us your market, your product idea, your expected
                    quantities and what you are trying to achieve. We'll start
                    with the information we have and work through the details
                    together.
                </p>

                <p>
                    For established buyers, growing brands and new businesses,
                    the relationship matters. A good export partnership is not
                    only about one shipment — it is about making the next
                    conversation easier than the first.
                </p>

                <div class="nx-gx-partnership__signature">
                    <span></span>
                    <div>
                        <strong>NIXGO9</strong>
                        <small>PRODUCT · PRODUCTION · PARTNERSHIP</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL IMAGE / MARKET -->
    <section class="nx-gx-market">
        <div class="container">
            <div class="nx-gx-market__frame">
                <img
                    src="<?= IMG_PATH ?>global/global-export.png"
                    alt="NIXGO9 international market and export story"
                    loading="lazy"
                >
                <div class="nx-gx-market__overlay"></div>
                <div class="nx-gx-market__caption">
                    <span>FROM INDIA · FOR INTERNATIONAL PARTNERS</span>
                    <strong>Build locally. Think globally.</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="nx-gx-final">
        <div class="container nx-gx-final__inner">
            <span class="nx-gx-kicker">YOUR MARKET · YOUR PRODUCT · YOUR NEXT STEP</span>

            <h2>
                Wherever you're building,
                <span>let's start with a conversation.</span>
            </h2>

            <p>
                Tell us what you're looking for, where you're based and what
                you're trying to build. We'll help you understand the next step.
            </p>

            <a href="<?= BASE_URL ?>contact.php" class="nx-gx-button nx-gx-button--light">
                Talk to NIXGO9 <span>→</span>
            </a>
        </div>
    </section>

</main>

<?php
include __DIR__ . '/includes/layout/footer.php';
include __DIR__ . '/includes/layout/scripts.php';
?>
