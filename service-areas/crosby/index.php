<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$areaName = 'Crosby';
$pageTitle = 'Crosby, TX Roofing Services | Storm Damage & Roof Repair | ' . $siteName;
$pageDescription = 'Triple G Roofing serves Crosby, TX with professional roofing including storm damage repair, metal roofing, and agricultural building solutions. Licensed Harris County contractor.';
$canonicalUrl = $siteUrl . '/service-areas/crosby/';

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
            <span style="color: var(--color-white);">Crosby</span>
        </nav>

        <h1>Crosby, Texas Roofing Services — Residential & Agricultural</h1>

        <div class="hero-answer">
            <p>
                <strong>Triple G Roofing serves Crosby, TX with comprehensive roofing services for residential homes,
                ranch properties, and agricultural buildings throughout this rural Northeast Harris County community.</strong>
                We understand Crosby's mix of historic homes, newer subdivisions along FM 2100, and working properties
                that demand durable, weather-resistant roofing solutions.
            </p>
        </div>

        <div class="cta-row">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent" style="font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                <?php echo icon('phone', 20); ?> <?php echo $phone; ?>
            </a>
            <a href="/contact/" class="btn btn-primary" style="background: var(--color-white); color: var(--color-primary); font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                Get Free Crosby Estimate
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
                <h2>Crosby's Trusted Roofing Contractor</h2>

                <p>
                    Triple G Roofing is a licensed Texas roofing contractor serving Crosby's unique blend of rural acreage,
                    established neighborhoods, and growing subdivisions. Crosby sits east of Houston's sprawl, where FM 2100
                    and Highway 90 intersect — a community that still retains its small-town character while absorbing
                    population growth from families seeking affordable land and good schools. We've roofed everything from
                    historic homesteads along the Lynchburg Ferry corridor to new builds in Newport, Barrett Station, and
                    the subdivisions near Crosby High School, each with distinct roofing challenges shaped by Crosby's
                    soil, vegetation, and exposure to coastal storm patterns.
                </p>

                <p>
                    Crosby's sandy loam soil and proximity to the San Jacinto River bottomlands mean many homes are elevated
                    on pier-and-beam or slab foundations designed to handle occasional flooding — which makes roof integrity
                    critical. A small leak during a rain event can saturate insulation, promote mold growth in crawl spaces,
                    and compromise structural framing faster than in urban areas with municipal drainage. We inspect every
                    vulnerable point: flashing around brick chimneys common in older Crosby homes, valley integrity where
                    complex roof lines concentrate water, and attic ventilation systems often undersized for Texas heat.
                    Beyond residential work, we also roof barns, equipment sheds, and pole buildings for Crosby's working
                    ranches and horse properties.
                </p>

                <div class="local-highlights">
                    <h4><?php echo icon('map-pin', 20); ?> Crosby Areas We Serve</h4>
                    <ul>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>FM 2100 corridor & Old Crosby</strong> — historic homes on large lots with aging roofs, mature trees, and accessibility challenges</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Newport, Barrett Station, Kennings</strong> — rural subdivisions where builder-grade roofs fail prematurely under sun and wind exposure</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Crosby ISD area & Highway 90 properties</strong> — newer developments and remodeled homes with complex roof lines and multiple valleys</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Lynchburg area, ranch properties, and horse farms</strong> — working acreage requiring residential roof service plus barn and outbuilding solutions</span>
                        </li>
                    </ul>
                </div>

                <h3>Complete Roofing Solutions for Crosby, TX</h3>

                <p>
                    Whether you need emergency storm damage repair after a hail event, a full architectural shingle replacement
                    for your family home, or metal roofing for a barn or workshop, Triple G Roofing delivers. We're
                    family-owned and locally operated — not a franchise or storm-chasing crew — and we back every Crosby
                    job with a 10-year workmanship warranty and direct coordination with your insurance carrier when storm
                    damage occurs.
                </p>

                <div class="services-grid">
                    <?php foreach (array_slice($services, 0, 6) as $service): ?>
                    <div class="service-badge">
                        <?php echo icon('check-circle', 18); ?>
                        <span><?php echo htmlspecialchars($service['name']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <h3>Why Crosby Homeowners Trust Triple G Roofing</h3>

                <p>
                    Crosby's weather patterns bring everything Gulf Coast Texas can dish out — intense summer heat that
                    cracks seal tabs, Gulf moisture that feeds algae and moss growth, sudden hail storms driven by spring
                    cold fronts, and hurricane remnants that test every fastener and flashing detail. We've roofed through
                    Hurricane Harvey's aftermath, the derecho winds, and the freeze events that make brittle shingles snap.
                    When you call Triple G Roofing, you're working with a crew that understands Harris County permitting,
                    knows which manufacturers honor warranties after severe weather, and can document storm damage in language
                    that gets insurance claims approved the first time.
                </p>

                <p>
                    We're transparent about pricing, realistic about timelines, and we respect your property — large lots
                    mean more cleanup, and we leave every Crosby job site cleaner than we found it. Call
                    <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-primary); font-weight: 600;"><?php echo $phone; ?></a>
                    for a free inspection of your Crosby home or property, or request an estimate online. Same-day emergency
                    response for storm damage. Licensed, insured, and trusted by Crosby families.
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
                            if ($area === 'Crosby') continue;
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
            "name": "Crosby",
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
        "name": "Crosby, TX"
    },
    "priceRange": "$$",
    "openingHours": "Mo-Su 08:00-20:00"
}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
