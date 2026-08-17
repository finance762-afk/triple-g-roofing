<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Humble Service Area — Triple G Roofing (Phase 6)
   ============================================================ */

$currentPage     = 'areas';
$pageTitle       = 'Roofing Contractor in Humble, TX | Triple G Roofing';
$pageDescription = 'Triple G Roofing serves Humble, TX with roof inspections, repairs, and installations. Serving Fall Creek, Atascocita Springs, and historic downtown Humble. Call (281) 570-3325 for a free estimate.';
$canonicalUrl    = $siteUrl . '/areas/humble/';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Breadcrumb Schema -->
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
            "item": "<?php echo $siteUrl; ?>/areas/"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "Humble, TX",
            "item": "<?php echo $canonicalUrl; ?>"
        }
    ]
}
</script>

<!-- LocalBusiness Schema with areaServed -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "RoofingContractor",
    "name": "<?php echo htmlspecialchars($siteName); ?>",
    "description": "Roofing contractor serving Humble, TX with inspections, repairs, storm damage restoration, and new roof installations.",
    "url": "<?php echo $siteUrl; ?>",
    "telephone": "<?php echo $phone; ?>",
    "email": "<?php echo $email; ?>",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",
        "addressLocality": "Huffman",
        "addressRegion": "TX",
        "postalCode": "<?php echo htmlspecialchars($address['zip']); ?>"
    },
    "areaServed": {
        "@type": "City",
        "name": "Humble, TX"
    }
}
</script>

<!-- Hero Section -->
<section class="hero hero--area">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">HUMBLE, TX ROOFING</span>
            <h1>Trusted Roofing Services in <span class="text-accent">Humble, Texas</span></h1>
            <p class="hero-answer">Triple G Roofing is a licensed Texas roofing contractor serving Humble homeowners from Fall Creek to historic downtown with roof inspections, leak repairs, storm damage restoration, seamless gutters, and complete re-roofs. We understand Humble's mix of older homes and new developments—and we tailor every roof to your property's needs.</p>
            <div class="hero__cta-group">
                <a href="/contact/" class="btn btn-primary">Get Your Free Estimate</a>
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Local Content Section -->
<section class="section">
    <div class="container">
        <div class="split">
            <div class="split__visual">
                <img
                    src="/assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n.jpg"
                    srcset="/assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n-480.webp 480w,
                            /assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n-960.webp 960w,
                            /assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n-1600.webp 1600w"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="Roof repair on a brick home in Humble, TX"
                    width="800"
                    height="600"
                    loading="eager"
                    fetchpriority="high">
            </div>
            <div class="split__text">
                <span class="eyebrow-label">HUMBLE ROOFING EXPERTS</span>
                <h2 class="section-title">Roofing Across <span class="text-accent">Humble's Neighborhoods</span></h2>
                <p><strong>Humble is a city of contrasts.</strong> Historic downtown Humble features homes built in the 1940s and 1950s—many with original wood decking, shallow roof pitches, and aging ventilation systems that struggle in our summer heat. Meanwhile, newer developments like Fall Creek and Atascocita Springs were built in the 1990s and 2000s with steeper pitches, engineered trusses, and modern venting—but they're now approaching the 20-25 year mark when roofs need replacement.</p>
                <p>Humble sits near the San Jacinto River watershed, which means clay-heavy soil with poor drainage in some neighborhoods. Foundation movement is common here, and that can stress roof structures over time. We inspect for sagging ridgelines, rafter spread, and truss uplift—issues that show up more often in Humble than in better-drained areas.</p>
                <p>Triple G Roofing knows Humble. We've re-roofed homes on Main Street, repaired storm damage in Fall Creek after the 2023 hailstorm, and installed ventilation upgrades across the FM 1960 corridor. We're your local roofer.</p>
            </div>
        </div>
    </div>
</section>

<!-- Neighborhoods Served -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Humble Neighborhoods <span class="text-accent">We Serve</span></h2>
            <p class="section-subtitle">Local roofing from historic downtown to new developments</p>
        </div>

        <div class="grid-3">
            <div class="local-block" data-animate="reveal-up">
                <h3><?php echo icon('home', 24); ?> Historic Downtown Humble</h3>
                <p>1940s-1960s homes with shallow-pitch roofs, wood decking, and aging ventilation—careful tear-offs and structural inspections are essential.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="1">
                <h3><?php echo icon('home', 24); ?> Fall Creek</h3>
                <p>1990s-2000s neighborhood with homes now reaching the 20-25 year re-roof mark. We handle architectural shingle replacements and gutter upgrades here regularly.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="2">
                <h3><?php echo icon('home', 24); ?> Atascocita Springs</h3>
                <p>Master-planned community east of US-59—homes feature steeper roof pitches and engineered trusses. We've completed dozens of re-roofs here since 2020.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Why Humble Homeowners <span class="text-accent">Choose Triple G Roofing</span></h2>
        </div>

        <div class="grid-2">
            <div class="reason-block" data-animate="reveal-up">
                <div class="reason-block__icon">
                    <?php echo icon('shield', 32); ?>
                </div>
                <h3>We Know Humble's Housing Stock</h3>
                <p>From post-war bungalows downtown to 2000s-era subdivisions, we understand the structural differences and tailor our approach to your home's age, roof pitch, and decking type.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="1">
                <div class="reason-block__icon">
                    <?php echo icon('clock', 32); ?>
                </div>
                <h3>Same-Day Storm Inspections</h3>
                <p>After severe weather, we prioritize Humble homeowners with rapid inspections and photo-documented damage reports that insurance companies accept.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="2">
                <div class="reason-block__icon">
                    <?php echo icon('award', 32); ?>
                </div>
                <h3>Direct Insurance Billing</h3>
                <p>We handle claim coordination, communicate directly with your adjuster, and bill your insurance company whenever possible—so you're not paying out of pocket.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="3">
                <div class="reason-block__icon">
                    <?php echo icon('wrench', 32); ?>
                </div>
                <h3>10-Year Workmanship Warranty</h3>
                <p>Every installation carries a 10-year warranty on our workmanship, plus manufacturer warranties on shingles and materials. Your investment is protected.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services in Humble -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Roofing Services in <span class="text-accent">Humble, TX</span></h2>
            <p class="prose-centered" style="max-width: 65ch; margin: var(--space-4) auto 0;">Triple G Roofing delivers comprehensive residential roofing services to Humble homeowners. From routine maintenance to emergency storm repairs, we're the local roofer you can trust.</p>
        </div>

        <div class="services-list">
            <?php
            $humbleServices = [
                ['icon' => 'search', 'name' => 'Roof Inspections', 'desc' => 'Detailed inspections with photo documentation—perfect for pre-purchase evaluations or insurance claims.'],
                ['icon' => 'wrench', 'name' => 'Roof Repairs', 'desc' => 'Leak repairs, shingle replacement, flashing fixes, and structural repairs—most completed within 48 hours.'],
                ['icon' => 'home', 'name' => 'Complete Re-Roofs', 'desc' => 'Full tear-offs and installations with impact-resistant or architectural shingles built for Texas weather.'],
                ['icon' => 'wind', 'name' => 'Storm Damage Restoration', 'desc' => 'Rapid response after hail, wind, or severe weather—we document damage and coordinate with your insurance.'],
                ['icon' => 'droplets', 'name' => 'Seamless Gutter Systems', 'desc' => 'Custom-fitted gutters that protect your foundation from Humble\'s heavy rainstorms and poor drainage.'],
                ['icon' => 'ruler', 'name' => 'Attic Ventilation Upgrades', 'desc' => 'Ridge and soffit vents that lower attic temperatures and extend shingle life in our brutal summer heat.'],
            ];
            foreach ($humbleServices as $index => $service):
            ?>
            <div class="service-item" data-animate="reveal-left" data-delay="<?php echo $index % 3; ?>">
                <div class="service-item__icon">
                    <?php echo icon($service['icon'], 28); ?>
                </div>
                <div class="service-item__content">
                    <h3><?php echo htmlspecialchars($service['name']); ?></h3>
                    <p><?php echo htmlspecialchars($service['desc']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="cta-centered">
            <a href="/services/" class="btn btn-outline">View All Services</a>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner">
    <div class="container">
        <div class="cta-banner__content">
            <h2>Need a Roofer in Humble, TX?</h2>
            <p>Call Triple G Roofing today for a free estimate on your roofing project.</p>
        </div>
        <div class="cta-banner__action">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-light">
                <?php echo icon('phone', 18); ?> <?php echo $phone; ?>
            </a>
            <a href="/contact/" class="btn btn-outline-light">Get Free Estimate</a>
        </div>
    </div>
</section>

<style>
/* Hero Answer */
.hero-answer {
    font-size: var(--font-size-lg);
    line-height: 1.6;
    max-width: 75ch;
    margin-bottom: var(--space-6);
}

/* Local Block */
.local-block {
    padding: var(--space-6);
    background: var(--color-bg);
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    border-left: 4px solid var(--color-primary);
}

.local-block h3 {
    font-family: var(--font-heading);
    font-size: var(--font-size-lg);
    font-weight: 700;
    margin-bottom: var(--space-3);
    display: flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-primary);
}

.local-block p {
    color: var(--color-text-light);
    font-size: var(--font-size-sm);
    line-height: 1.6;
}

/* Reason Block */
.reason-block {
    padding: var(--space-6);
    background: var(--color-bg);
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition);
}

.reason-block:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.reason-block__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
    border-radius: 50%;
    margin-bottom: var(--space-4);
    color: var(--color-white);
}

.reason-block h3 {
    font-family: var(--font-heading);
    font-size: var(--font-size-lg);
    font-weight: 700;
    margin-bottom: var(--space-3);
}

.reason-block p {
    color: var(--color-text-light);
    font-size: var(--font-size-sm);
    line-height: 1.6;
}

/* Services List */
.services-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.service-item {
    display: flex;
    gap: var(--space-4);
    padding: var(--space-5);
    background: var(--color-bg);
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition);
}

.service-item:hover {
    transform: translateX(4px);
    box-shadow: var(--shadow);
}

.service-item__icon {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    background: rgba(var(--color-primary-rgb), 0.1);
    border-radius: var(--radius-sm);
    color: var(--color-primary);
}

.service-item__content h3 {
    font-family: var(--font-heading);
    font-size: var(--font-size-base);
    font-weight: 700;
    margin-bottom: var(--space-2);
}

.service-item__content p {
    color: var(--color-text-light);
    font-size: var(--font-size-sm);
    line-height: 1.5;
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
