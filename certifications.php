<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/core/config.php';

$page = [
    'title'       => 'NIXGO9 | Quality & Certifications',
    'description' => 'Explore the certifications and business registrations that document 3G Enterprises and its manufacturing and export activities.',
    'keywords'    => 'NIXGO9 certifications, GMP, ISO 9001:2015, Udyam registration, IEC, 3G Enterprises',
    'canonical'   => BASE_URL . 'certifications.php',
    'body_class'  => 'certifications-page'
];

include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/navbar.php';
?>

<main id="main-content" class="nx-cert-page">

    <!-- HERO -->
    <section class="nx-cert-hero">
        <div class="nx-cert-hero__backdrop" aria-hidden="true"></div>

        <div class="container nx-cert-hero__inner">
            <div class="nx-cert-hero__copy">
                <span class="nx-cert-kicker">QUALITY · DOCUMENTATION · TRUST</span>

                <h1>
                    Trust is built
                    <span>with proof.</span>
                </h1>

                <p>
                    Behind every product is a business that should be
                    understandable, accountable and properly documented.
                    Here are the registrations and certifications that
                    support the work of 3G Enterprises.
                </p>

                <div class="nx-cert-hero__meta">
                    <span>3G ENTERPRISES</span>
                    <span>HYDERABAD, INDIA</span>
                    <span>MANUFACTURING</span>
                    <span>EXPORT</span>
                </div>
            </div>
        </div>
    </section>

    <!-- INTRO -->
    <section class="nx-cert-intro">
        <div class="container">
            <div class="nx-cert-intro__grid">
                <div>
                    <span class="nx-cert-label"><b>01</b> WHAT THESE DOCUMENTS MEAN</span>
                    <h2>
                        Not just logos on a website.
                        <span>Real documents behind the business.</span>
                    </h2>
                </div>

                <div class="nx-cert-intro__copy">
                    <p class="nx-cert-lead">
                        We want customers and business partners to be able
                        to understand what sits behind NIXGO9.
                    </p>
                    <p>
                        The documents below cover different parts of the
                        business. GMP and ISO 9001:2015 relate to manufacturing
                        and quality-management requirements. Udyam registration
                        documents the enterprise as a manufacturing micro
                        enterprise, while the IEC identifies the business for
                        import-export purposes.
                    </p>
                    <p class="nx-cert-note">
                        We show the documents as they were issued, rather than
                        turning them into marketing badges.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- GMP -->
    <section class="nx-cert-feature">
        <div class="container nx-cert-feature__grid">
            <div class="nx-cert-feature__visual">
                <button class="nx-cert-image" type="button" data-cert-open
                        data-cert-title="GMP Certificate"
                        data-cert-src="<?= IMG_PATH ?>certifications/gmp-certificate.jpg"
                        aria-label="View GMP certificate">
                    <img src="<?= IMG_PATH ?>certifications/gmp-certificate.jpg"
                         alt="GMP certificate issued to 3G Enterprises"
                         loading="lazy">
                    <span>VIEW DOCUMENT <b>↗</b></span>
                </button>
            </div>

            <div class="nx-cert-feature__copy">
                <span class="nx-cert-label"><b>02</b> GOOD MANUFACTURING PRACTICE</span>
                <h2>GMP</h2>
                <p class="nx-cert-big">
                    A documented framework around how manufacturing activities
                    are carried out and controlled.
                </p>
                <p>
                    The certificate shown here names <strong>3G Enterprises</strong>
                    and states compliance with Good Manufacturing Practice
                    requirements for the scope of manufacturing and exporting
                    nicotine pouches, tobacco products and nicotine
                    manufacturing machines.
                </p>

                <div class="nx-cert-facts">
                    <div><small>Certificate</small><strong>GMP/0850/0426</strong></div>
                    <div><small>Issued</small><strong>01 Apr 2026</strong></div>
                    <div><small>Valid until</small><strong>31 Mar 2029</strong></div>
                    <div><small>Issued by</small><strong>Quality Control Certification</strong></div>
                </div>

                <p class="nx-cert-disclaimer">
                    The certificate itself identifies Quality Control Certification
                    and states that QCC is accredited by UASL, England, UK.
                </p>
            </div>
        </div>
    </section>

    <!-- ISO -->
    <section class="nx-cert-feature nx-cert-feature--reverse">
        <div class="container nx-cert-feature__grid">
            <div class="nx-cert-feature__copy">
                <span class="nx-cert-label"><b>03</b> QUALITY MANAGEMENT SYSTEM</span>
                <h2>ISO 9001:2015</h2>
                <p class="nx-cert-big">
                    A quality-management standard focused on consistent,
                    controlled business processes.
                </p>
                <p>
                    The certificate shown here records 3G Enterprises as
                    compliant with a Quality Management System to ISO 9001:2015
                    for the same stated manufacturing and exporting scope.
                    In practical terms, it gives business partners a documented
                    quality-management framework to look at alongside the
                    manufacturing operation.
                </p>

                <div class="nx-cert-facts">
                    <div><small>Certificate</small><strong>QMS/0824/0426</strong></div>
                    <div><small>Issued</small><strong>01 Apr 2026</strong></div>
                    <div><small>Valid until</small><strong>31 Mar 2029</strong></div>
                    <div><small>Issued by</small><strong>Quality Control Certification</strong></div>
                </div>

                <p class="nx-cert-disclaimer">
                    The certificate shown on this page is the source for these
                    certificate details; it should not be interpreted as a
                    claim that ISO certification alone guarantees a particular
                    product outcome.
                </p>
            </div>

            <div class="nx-cert-feature__visual">
                <button class="nx-cert-image" type="button" data-cert-open
                        data-cert-title="ISO 9001:2015 Certificate"
                        data-cert-src="<?= IMG_PATH ?>certifications/iso-9001-2015.jpg"
                        aria-label="View ISO 9001:2015 certificate">
                    <img src="<?= IMG_PATH ?>certifications/iso-9001-2015.jpg"
                         alt="ISO 9001:2015 certificate issued to 3G Enterprises"
                         loading="lazy">
                    <span>VIEW DOCUMENT <b>↗</b></span>
                </button>
            </div>
        </div>
    </section>

    <!-- BUSINESS DOCUMENTS -->
    <section class="nx-cert-business">
        <div class="container">
            <div class="nx-cert-business__heading">
                <span class="nx-cert-label"><b>04</b> THE BUSINESS BEHIND THE BRAND</span>
                <h2>
                    Two more documents
                    <span>complete the picture.</span>
                </h2>
                <p>
                    These are not the same thing as GMP or ISO certification.
                    They document the business itself and its ability to operate
                    within India's formal registration and export framework.
                </p>
            </div>

            <div class="nx-cert-business__grid">
                <article>
                    <span class="nx-cert-card-tag">GOVERNMENT OF INDIA</span>
                    <h3>Udyam Registration</h3>
                    <p>
                        The Udyam certificate identifies 3G Enterprises as a
                        <strong>Micro</strong> enterprise for classification year
                        2025–26 and records its major activity as
                        <strong>Manufacturing</strong>.
                    </p>
                    <dl>
                        <div><dt>Udyam No.</dt><dd>UDYAM-TS-02-0327216</dd></div>
                        <div><dt>Registered</dt><dd>31 Mar 2026</dd></div>
                        <div><dt>Enterprise</dt><dd>Micro</dd></div>
                        <div><dt>Activity</dt><dd>Manufacturing</dd></div>
                    </dl>
                    <p class="nx-cert-card-note">
                        The certificate also lists manufacturing-related NIC
                        activities and states that the enterprise began
                        production/business on 20 Dec 2023.
                    </p>
                </article>

                <article>
                    <span class="nx-cert-card-tag">DGFT · GOVERNMENT OF INDIA</span>
                    <h3>Importer-Exporter Code (IEC)</h3>
                    <p>
                        The IEC is the official Importer-Exporter Code document
                        issued by the Directorate General of Foreign Trade.
                        It identifies 3G Enterprises for its import-export
                        registration details.
                    </p>
                    <dl>
                        <div><dt>IEC</dt><dd>AADFZ6123E</dd></div>
                        <div><dt>Issued</dt><dd>15 Jan 2024</dd></div>
                        <div><dt>Nature</dt><dd>Partnership</dd></div>
                        <div><dt>Last modified</dt><dd>24 Feb 2026</dd></div>
                    </dl>
                    <p class="nx-cert-card-note">
                        The document states that authenticity and updated
                        IEC details can be checked through the official DGFT
                        service using the IEC and firm name, or by scanning
                        its QR code.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <!-- SIMPLE TRUST SECTION -->
    <section class="nx-cert-trust">
        <div class="container">
            <div class="nx-cert-trust__inner">
                <span class="nx-cert-kicker">FOR CUSTOMERS · WHOLESALERS · BRAND PARTNERS</span>
                <h2>
                    You should know
                    <span>who you're doing business with.</span>
                </h2>
                <p>
                    That's why we prefer to show the documents, explain what
                    they represent and let you make your own assessment.
                </p>
                <a href="/contact.php" class="nx-cert-button">
                    Talk to our team <span>→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- CERTIFICATE LIGHTBOX -->
    <div class="nx-cert-modal" data-cert-modal aria-hidden="true">
        <div class="nx-cert-modal__backdrop" data-cert-close></div>
        <div class="nx-cert-modal__panel" role="dialog" aria-modal="true" aria-label="Certificate viewer">
            <button class="nx-cert-modal__close" type="button" data-cert-close aria-label="Close certificate">×</button>
            <img src="" alt="" data-cert-modal-image>
        </div>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.querySelector('[data-cert-modal]');
    const modalImage = document.querySelector('[data-cert-modal-image]');
    const openers = document.querySelectorAll('[data-cert-open]');
    const closers = document.querySelectorAll('[data-cert-close]');

    if (!modal || !modalImage) return;

    openers.forEach(function (button) {
        button.addEventListener('click', function () {
            modalImage.src = button.dataset.certSrc;
            modalImage.alt = button.dataset.certTitle || 'Certificate';
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('cert-modal-open');
        });
    });

    closers.forEach(function (button) {
        button.addEventListener('click', function () {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('cert-modal-open');
            modalImage.src = '';
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && modal.classList.contains('is-open')) {
            modal.querySelector('[data-cert-close]').click();
        }
    });
});
</script>

<?php
include __DIR__ . '/includes/layout/footer.php';
include __DIR__ . '/includes/layout/scripts.php';
?>
