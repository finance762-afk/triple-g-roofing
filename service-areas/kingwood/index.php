<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$areaName = 'Kingwood';
$pageTitle = 'Kingwood Roofing Services | Storm Damage & Roof Replacement | ' . $siteName;
$pageDescription = 'Triple G Roofing serves Kingwood, TX with expert roofing services including storm damage repair, architectural replacements, and HOA-compliant installations. Licensed Northeast Harris County roofer.';
$canonicalUrl = $siteUrl . '/service-areas/kingwood/';

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
            <span style="color: var(--color-white);">Kingwood</span>
        </nav>

        <h1>Kingwood, TX Roofing Contractor — HOA-Approved Replacements</h1>

        <div class="hero-answer">
            <p>
                <strong>Triple G Roofing serves Kingwood, TX with HOA-compliant roofing services including architectural
                shingle replacements, storm damage repair, and preventive inspections tailored to this heavily-wooded
                master-planned community.</strong> We understand Kingwood's strict architectural guidelines and can navigate
                the approval process while delivering roofs that meet "Livable Forest" standards.
            </p>
        </div>

        <div class="cta-row">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent" style="font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                <?php echo icon('phone', 20); ?> <?php echo $phone; ?>
            </a>
            <a href="/contact/" class="btn btn-primary" style="background: var(--color-white); color: var(--color-primary); font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                Get Free Kingwood Estimate
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
                <h2>Kingwood's Trusted HOA-Approved Roofing Contractor</h2>

                <p>
                    Triple G Roofing is a licensed Texas roofing contractor serving Kingwood's unique "Livable Forest"
                    community. Kingwood sits within the East Fork of the San Jacinto River floodplain, surrounded by
                    towering pines, oaks, and magnolias that define its character — but also accelerate roof wear through
                    constant debris accumulation, algae growth, and granule loss from acidic pine needles. We've replaced
                    roofs in Trailwood, Woodland Hills, Bear Branch, Timber Lakes, Riverwood, and the neighborhoods along
                    Kingwood Drive, each with HOA architectural review boards that require color matching, material
                    specifications, and contractor licensing verification before work begins.
                </p>

                <p>
                    Kingwood's strict HOA covenants exist for good reason — they preserve property values and aesthetic
                    cohesion — but they also mean you can't just pick any roofer. We know which shingle manufacturers
                    offer Kingwood-approved colors (Weathered Wood, Driftwood, Pewter Gray), how to submit architectural
                    review applications with the required documentation, and which shortcuts will get your project rejected.
                    Beyond compliance, Kingwood's tree canopy creates roofing challenges most contractors miss: moss retention
                    along north-facing roof planes, clogged valleys from constant leaf drop, and premature seal tab failure
                    from moisture trapped under shade. We inspect every vulnerable point and recommend solutions that work
                    in Kingwood's environment — not just generic Houston roofing.
                </p>

                <div class="local-highlights">
                    <h4><?php echo icon('map-pin', 20); ?> Kingwood Villages We Serve</h4>
                    <ul>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Trailwood, Woodland Hills, Bear Branch</strong> — original 1970s-1980s neighborhoods where roofs are hitting the 25-30 year replacement cycle</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Timber Lakes, Riverwood, Kings River</strong> — established communities with complex HOA approval processes and strict color/material requirements</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Kingwood Greens, Lakeshore, Elm Grove</strong> — mid-tier subdivisions where tree canopy density accelerates moss and algae growth</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>The Hills, Park at Blackhorse, Kingwood Lakes</strong> — newer developments with builder-grade roofs failing before warranty expiration</span>
                        </li>
                    </ul>
                </div>

                <h3>Complete Roofing Services for Kingwood, Texas</h3>

                <p>
                    Whether you need emergency repairs after a wind event, a full architectural shingle replacement that
                    meets HOA color standards, or preventive maintenance to combat Kingwood's moss and algae buildup,
                    Triple G Roofing has you covered. We're family-owned and locally operated — not a franchise that
                    disappears after deposit — and we guarantee our work for 10 years while handling HOA submittals,
                    insurance coordination, and post-storm documentation.
                </p>

                <div class="services-grid">
                    <?php foreach (array_slice($services, 0, 6) as $service): ?>
                    <div class="service-badge">
                        <?php echo icon('check-circle', 18); ?>
                        <span><?php echo htmlspecialchars($service['name']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <h3>Why Kingwood Homeowners Choose Triple G Roofing</h3>

                <p>
                    Kingwood's "Livable Forest" design is beautiful — but it's brutal on roofs. Constant shade prevents
                    UV drying of morning dew, pine sap bonds to shingles and traps moisture, and falling branches during
                    wind events punch through underlayment. We've roofed through Hurricane Ike's aftermath, the Memorial
                    Day floods, and the freeze events that made brittle shingles crack. When you call Triple G Roofing,
                    you're working with a crew that knows Kingwood's HOA submittal timelines (typically 7-14 days for
                    approval), which manufacturers honor warranties after tree damage, and how to document storm loss in
                    language that gets insurance claims approved.
                </p>

                <p>
                    We're transparent about pricing, realistic about timelines, and we never pressure you into upgrades
                    you don't need. Call <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-primary); font-weight: 600;"><?php echo $phone; ?></a>
                    for a free inspection of your Kingwood home, or submit our contact form to schedule at your convenience.
                    Same-day emergency response for storm damage. Licensed, insured, and HOA-approved throughout Kingwood.
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
                            if ($area === 'Kingwood') continue;
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
            "name": "Kingwood",
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
        "name": "Kingwood, TX"
    },
    "priceRange": "$$",
    "openingHours": "Mo-Su 08:00-20:00"
}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
