<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$areaName = 'Huffman';
$pageTitle = 'Roofing Services in Huffman, TX | Storm Damage & Roof Repair | ' . $siteName;
$metaDescription = 'Triple G Roofing serves Huffman, TX with professional roofing services including storm damage repair, roof replacements, and emergency repairs. Licensed Texas roofer serving Huffman homeowners.';
$canonicalUrl = $siteUrl . '/service-areas/huffman/';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Area Hero */
.area-hero {
    position: relative;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    padding: clamp(100px, 15vw, 160px) 0 clamp(80px, 12vw, 120px);
    overflow: hidden;
}

.area-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 50%, rgba(221, 159, 93, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(238, 88, 22, 0.1) 0%, transparent 50%);
    z-index: 0;
}

.area-hero .container {
    position: relative;
    z-index: 1;
}

.area-breadcrumb {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-4);
    font-size: var(--font-size-sm);
}

.area-breadcrumb a {
    color: rgba(255, 255, 255, 0.8);
    transition: color var(--transition-fast);
}

.area-breadcrumb a:hover {
    color: var(--color-white);
}

.area-breadcrumb span {
    color: rgba(255, 255, 255, 0.5);
}

.area-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 5vw, 3.75rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.area-hero .hero-answer {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    margin-bottom: var(--space-6);
}

.area-hero .hero-answer p {
    color: var(--color-white);
    font-size: clamp(1rem, 2vw, 1.25rem);
    line-height: 1.7;
    margin: 0;
}

.area-hero .cta-row {
    display: flex;
    gap: var(--space-4);
    flex-wrap: wrap;
}

/* Content Section */
.area-content {
    padding: var(--space-12) 0;
}

.area-content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: var(--space-10);
}

.area-main h2 {
    color: var(--color-secondary);
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    margin-bottom: var(--space-5);
    font-weight: 700;
}

.area-main h3 {
    color: var(--color-secondary);
    font-size: clamp(1.25rem, 3vw, 1.75rem);
    margin-top: var(--space-8);
    margin-bottom: var(--space-4);
    font-weight: 600;
}

.area-main p {
    color: var(--color-text-light);
    line-height: 1.8;
    margin-bottom: var(--space-5);
    font-size: var(--font-size-base);
}

.local-highlights {
    background: var(--color-bg-alt);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    margin: var(--space-6) 0;
}

.local-highlights h4 {
    color: var(--color-secondary);
    font-size: var(--font-size-lg);
    margin-bottom: var(--space-4);
    font-weight: 600;
}

.local-highlights ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.local-highlights li {
    display: flex;
    align-items: flex-start;
    gap: var(--space-3);
    margin-bottom: var(--space-3);
    color: var(--color-text-light);
}

.local-highlights li:last-child {
    margin-bottom: 0;
}

.local-highlights li svg {
    color: var(--color-accent);
    flex-shrink: 0;
    margin-top: 4px;
}

/* Sidebar */
.area-sidebar {
    position: sticky;
    top: 100px;
    align-self: start;
}

.sidebar-card {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow);
    margin-bottom: var(--space-6);
}

.sidebar-card h3 {
    color: var(--color-secondary);
    font-size: var(--font-size-xl);
    margin-bottom: var(--space-4);
    font-weight: 600;
}

.sidebar-card .btn {
    width: 100%;
    margin-bottom: var(--space-3);
}

.sidebar-card .btn:last-child {
    margin-bottom: 0;
}

.sidebar-services {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-services li {
    margin-bottom: var(--space-3);
}

.sidebar-services li:last-child {
    margin-bottom: 0;
}

.sidebar-services a {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-text-light);
    transition: color var(--transition-fast);
    font-size: var(--font-size-sm);
}

.sidebar-services a:hover {
    color: var(--color-primary);
}

.sidebar-services svg {
    color: var(--color-accent);
    flex-shrink: 0;
}

/* Service Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-4);
    margin: var(--space-6) 0;
}

.service-badge {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-3) var(--space-4);
    background: var(--color-bg-alt);
    border-radius: var(--radius);
    font-size: var(--font-size-sm);
    font-weight: 500;
    color: var(--color-text);
    border: 1px solid var(--color-border);
}

.service-badge svg {
    color: var(--color-primary);
    flex-shrink: 0;
}

@media (max-width: 968px) {
    .area-content-grid {
        grid-template-columns: 1fr;
    }

    .area-sidebar {
        position: static;
    }
}

@media (max-width: 768px) {
    .area-hero .cta-row {
        flex-direction: column;
    }

    .area-hero .cta-row .btn {
        width: 100%;
    }
}
</style>

<!-- Hero Section -->
<section class="area-hero">
    <div class="container">
        <nav class="area-breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a>
            <span>/</span>
            <a href="/service-areas/">Service Areas</a>
            <span>/</span>
            <span style="color: var(--color-white);">Huffman</span>
        </nav>

        <h1>Professional Roofing Services in Huffman, Texas</h1>

        <div class="hero-answer">
            <p>
                <strong>Yes, Triple G Roofing serves Huffman, TX with same-day emergency response for storm damage,
                full roof replacements, and preventive inspections.</strong> As a locally-based roofing contractor,
                we're minutes away when severe weather hits and know exactly how Huffman's heat, humidity, and
                seasonal storms test residential roofing systems.
            </p>
        </div>

        <div class="cta-row">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent" style="font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                <?php echo icon('phone', 20); ?> <?php echo $phone; ?>
            </a>
            <a href="/contact/" class="btn btn-primary" style="background: var(--color-white); color: var(--color-primary); font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                Get Free Huffman Estimate
            </a>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="area-content">
    <div class="container">
        <div class="area-content-grid">
            <!-- Main Column -->
            <div class="area-main">
                <h2>Your Trusted Roofer for Huffman Homes</h2>

                <p>
                    Triple G Roofing is a licensed Texas roofing contractor based in Huffman, serving homeowners
                    throughout this close-knit North Harris County community. From the older ranch-style homes near
                    FM 1960 to the newer subdivisions off Wallisville Road, we've protected Huffman families through
                    hail storms, wind events, and the relentless Gulf Coast sun that prematurely ages roofing materials.
                </p>

                <p>
                    Huffman sits in a low-lying area where drainage matters as much as shingle quality. Many homes here
                    are built on pier-and-beam foundations or elevated slabs to manage the sandy, saturated soil —
                    and that means your roof's integrity directly impacts your home's structural health. A small leak
                    left unchecked can escalate quickly in Huffman's humid climate, where moisture feeds mold growth
                    and wood rot. We understand these local conditions and inspect every vulnerable point: valleys,
                    flashing around chimneys, soffit ventilation, and ridge cap integrity.
                </p>

                <div class="local-highlights">
                    <h4><?php echo icon('map-pin', 20); ?> Local Areas We Serve in Huffman</h4>
                    <ul>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Lakeshore Estates & Lake Houston neighborhoods</strong> — homes near the water face higher wind exposure and salt-air corrosion</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>FM 1960 corridor homes</strong> — older roofs nearing 15-20 years that need replacement before the next hail season</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Wallisville Road subdivisions</strong> — newer builds where builder-grade shingles often underperform in Texas heat</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Properties near Huffman ISD and the fire station</strong> — central Huffman homes with mature tree canopies that accelerate granule loss</span>
                        </li>
                    </ul>
                </div>

                <h3>Services We Provide to Huffman Homeowners</h3>

                <p>
                    Whether you need emergency storm damage repair after a hail event, a full architectural shingle
                    replacement, or preventive attic ventilation to combat Texas heat, Triple G Roofing delivers. We're
                    not a franchise — we're your neighbors, and every Huffman job is supervised by the same crew that
                    handles our own families' homes.
                </p>

                <div class="services-grid">
                    <?php foreach (array_slice($services, 0, 6) as $service): ?>
                    <div class="service-badge">
                        <?php echo icon('check-circle', 18); ?>
                        <span><?php echo htmlspecialchars($service['name']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <h3>Why Choose Triple G Roofing in Huffman, TX</h3>

                <p>
                    We've roofed homes through Huffman's worst weather — the 2020 hail storms, the derecho winds of 2021,
                    and the brutal heat waves that crack seal strips and warp starter courses. When you call Triple G
                    Roofing, you're not talking to a call center — you're speaking directly with Tim Menn or a crew
                    supervisor who knows Huffman's soil conditions, insurance claim requirements for North Harris County,
                    and which manufacturers honor warranties after severe weather events. We coordinate with your
                    insurance adjuster, bill your carrier directly when possible, and guarantee our work for 10 years.
                </p>

                <p>
                    Huffman's tight-knit community deserves transparent pricing, skilled labor, and roofs that last.
                    That's what we deliver — no hidden fees, no pressure tactics, and no cutting corners. Call
                    <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-primary); font-weight: 600;"><?php echo $phone; ?></a>
                    for a free inspection, or fill out our contact form to schedule at your convenience.
                </p>
            </div>

            <!-- Sidebar -->
            <aside class="area-sidebar">
                <div class="sidebar-card">
                    <h3>Get Started</h3>
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent">
                        <?php echo icon('phone', 18); ?> Call Now
                    </a>
                    <a href="/contact/" class="btn btn-primary">
                        Request Free Estimate
                    </a>
                </div>

                <div class="sidebar-card">
                    <h3>Our Services</h3>
                    <ul class="sidebar-services">
                        <?php foreach ($services as $service): ?>
                        <li>
                            <a href="/services/<?php echo $service['slug']; ?>/">
                                <?php echo icon('arrow-up', 16); ?>
                                <?php echo htmlspecialchars($service['name']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="sidebar-card">
                    <h3>Other Areas We Serve</h3>
                    <ul class="sidebar-services">
                        <?php foreach ($serviceAreas as $area):
                            if ($area === 'Huffman') continue;
                        ?>
                        <li>
                            <a href="/service-areas/<?php echo getAreaSlug($area); ?>/">
                                <?php echo icon('map-pin', 16); ?>
                                <?php echo htmlspecialchars($area); ?>, TX
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Schema Markup -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "<?php echo $siteUrl; ?>/"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Service Areas",
            "item": "<?php echo $siteUrl; ?>/service-areas/"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "Huffman",
            "item": "<?php echo $canonicalUrl; ?>"
        }
    ]
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "RoofingContractor",
    "name": "<?php echo htmlspecialchars($siteName); ?>",
    "url": "<?php echo $siteUrl; ?>",
    "logo": "<?php echo $siteUrl; ?>/assets/images/logo.png",
    "telephone": "<?php echo $phone; ?>",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",
        "addressLocality": "<?php echo htmlspecialchars($address['city']); ?>",
        "addressRegion": "<?php echo htmlspecialchars($address['state']); ?>",
        "postalCode": "<?php echo htmlspecialchars($address['zip']); ?>"
    },
    "areaServed": {
        "@type": "City",
        "name": "Huffman, TX"
    },
    "priceRange": "$$",
    "openingHours": "Mo-Su 08:00-20:00"
}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
