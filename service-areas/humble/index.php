<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$areaName = 'Humble';
$pageTitle = 'Roofing Services in Humble, TX | Roof Replacement & Storm Repair | ' . $siteName;
$metaDescription = 'Triple G Roofing provides professional roofing services in Humble, TX including roof replacements, storm damage repair, and inspections. Licensed contractor serving Humble homeowners.';
$canonicalUrl = $siteUrl . '/service-areas/humble/';

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
            <span style="color: var(--color-white);">Humble</span>
        </nav>

        <h1>Roof Replacement & Storm Damage Repair in Humble, Texas</h1>

        <div class="hero-answer">
            <p>
                <strong>Triple G Roofing serves Humble, TX with comprehensive roofing services including full replacements,
                storm damage repair, and preventive inspections throughout Harris County's fastest-growing community.</strong>
                We understand Humble's mix of historic homes near Old Town and newer subdivisions along FM 1960, each with
                distinct roofing challenges that demand local expertise.
            </p>
        </div>

        <div class="cta-row">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent" style="font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                <?php echo icon('phone', 20); ?> <?php echo $phone; ?>
            </a>
            <a href="/contact/" class="btn btn-primary" style="background: var(--color-white); color: var(--color-primary); font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                Get Free Humble Estimate
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
                <h2>Trusted Roofing Contractor for Humble Homes</h2>

                <p>
                    Triple G Roofing is a licensed Texas roofing contractor proudly serving Humble, one of Harris County's
                    most diverse communities. From the tree-lined streets of Old Town Humble near Main Street to the sprawling
                    subdivisions along Will Clayton Parkway and the newer developments near Beltway 8, we've protected
                    thousands of Humble roofs against hail, wind, and the relentless Houston-area heat. Humble's rapid growth
                    means we work on everything from 1970s ranch homes with original 3-tab shingles to brand-new builds where
                    builder-grade materials fail prematurely under Texas sun exposure.
                </p>

                <p>
                    Humble sits in the transition zone between Houston's urban core and the Piney Woods — which means your
                    roof battles both urban pollution (granule degradation) and dense tree canopies (moss, algae, and
                    constant debris accumulation). Many Humble homes are built on expansive clay soil that shifts with
                    seasonal moisture changes, stressing roof framing and causing ridge caps to separate. We inspect every
                    Humble roof with these conditions in mind: checking for compromised flashing around older brick chimneys,
                    verifying attic ventilation in homes where HVAC ductwork crowds the space, and ensuring proper drainage
                    on low-slope additions common in mid-century Humble construction.
                </p>

                <div class="local-highlights">
                    <h4><?php echo icon('map-pin', 20); ?> Humble Neighborhoods We Serve</h4>
                    <ul>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Old Town Humble & Downtown district</strong> — historic homes with steep-pitch roofs, aging flashing, and original skylights that need re-sealing</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>FM 1960 & Will Clayton corridor</strong> — 1980s-1990s subdivisions where roofs are hitting the 20-25 year replacement window</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Beltway 8 developments & Humble ISD area</strong> — newer builds where inadequate ventilation causes premature shingle failure</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span><strong>Northgate, Timberwood, Eagle Springs neighborhoods</strong> — mature subdivisions with towering pines that accelerate roof wear and clog gutters</span>
                        </li>
                    </ul>
                </div>

                <h3>Complete Roofing Services for Humble, TX</h3>

                <p>
                    Whether you're dealing with granule loss from UV exposure, wind-lifted shingles after a derecho, or
                    persistent leaks around valley flashing, Triple G Roofing has the solution. We're a family-owned local
                    business — not a franchise or storm-chaser crew — and we back every Humble job with a 10-year
                    workmanship warranty and direct coordination with your insurance carrier.
                </p>

                <div class="services-grid">
                    <?php foreach (array_slice($services, 0, 6) as $service): ?>
                    <div class="service-badge">
                        <?php echo icon('check-circle', 18); ?>
                        <span><?php echo htmlspecialchars($service['name']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <h3>Why Humble Homeowners Choose Triple G Roofing</h3>

                <p>
                    Humble's weather is unforgiving — summer heat that regularly tops 100°F, hail storms driven by Gulf
                    moisture colliding with cold fronts, and sudden wind events that tear off ridge caps and expose underlayment.
                    We've roofed through it all, from the Memorial Day storms to the freeze events that crack seal tabs and
                    leave roofs vulnerable. When you hire Triple G Roofing, you're working with a crew that understands
                    Harris County building codes, knows which manufacturers honor warranties after severe weather, and
                    can document storm damage for insurance adjusters in language that gets claims approved.
                </p>

                <p>
                    We're transparent about pricing, realistic about timelines, and we don't pressure you into upgrades
                    you don't need. Call <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-primary); font-weight: 600;"><?php echo $phone; ?></a>
                    for a free inspection of your Humble home, or request an estimate online. We're here when you need us —
                    same-day emergency response for storm damage, scheduled inspections for preventive maintenance, and
                    full replacements backed by industry-leading warranties.
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
                            if ($area === 'Humble') continue;
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
            "name": "Humble",
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
        "name": "Humble, TX"
    },
    "priceRange": "$$",
    "openingHours": "Mo-Su 08:00-20:00"
}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
