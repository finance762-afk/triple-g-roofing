<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Huffman Service Area — Triple G Roofing (Phase 6)
   ============================================================ */

$currentPage     = 'areas';
$pageTitle       = 'Roofing Contractor in Huffman, TX | Triple G Roofing';
$pageDescription = 'Triple G Roofing provides trusted roof inspections, repairs, and installations in Huffman, TX. Serving neighborhoods from Lake Houston Estates to FM 1960. Call (281) 570-3325 for a free estimate.';
$canonicalUrl    = $siteUrl . '/areas/huffman/';

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
            "name": "Huffman, TX",
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
    "description": "Roofing contractor serving Huffman, TX and North Harris County with inspections, repairs, and storm damage restoration.",
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
        "name": "Huffman, TX"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": <?php echo $geo['lat']; ?>,
        "longitude": <?php echo $geo['lng']; ?>
    }
}
</script>

<!-- Hero Section -->
<section class="hero hero--area">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">HUFFMAN, TX ROOFING</span>
            <h1>Professional Roofing Services in <span class="text-accent">Huffman, Texas</span></h1>
            <p class="hero-answer">Triple G Roofing is a licensed Texas roofing contractor based in Huffman, serving homeowners throughout North Harris County with roof inspections, leak repairs, attic ventilation, seamless gutters, and emergency storm damage restoration. We're your neighbors—and we're here when you need us.</p>
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
                    src="/assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n.jpg"
                    srcset="/assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n-480.webp 480w,
                            /assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n-960.webp 960w,
                            /assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n-1600.webp 1600w"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="Completed residential roofing project in Huffman, TX"
                    width="800"
                    height="600"
                    loading="eager"
                    fetchpriority="high">
            </div>
            <div class="split__text">
                <span class="eyebrow-label">OUR HOME BASE</span>
                <h2 class="section-title">Roofing <span class="text-accent">Where We Live</span></h2>
                <p><strong>Huffman is home.</strong> Triple G Roofing serves neighborhoods from Lake Houston Estates and Timberline down to the FM 1960 corridor. We know the homes here—many were built in the 1970s and 1980s with wood decking that needs careful inspection during re-roofs. We understand the sandy, well-drained soil along the San Jacinto River floodplain and the intense afternoon sun that bakes west-facing roof planes all summer.</p>
                <p>Huffman sits just 6 miles east of Lake Houston, which means we're exposed to sudden severe thunderstorms rolling off the lake. Hail events in March and April, wind gusts above 60 mph during summer squall lines, and the occasional hurricane remnant—these are the weather realities we design every roof to handle.</p>
                <p>When you call Triple G Roofing in Huffman, you're calling a neighbor. We respond within hours, not days, because your street is minutes from ours.</p>
            </div>
        </div>
    </div>
</section>

<!-- Neighborhoods Served -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Huffman Neighborhoods <span class="text-accent">We Serve</span></h2>
            <p class="section-subtitle">Local roofing across the community</p>
        </div>

        <div class="grid-3">
            <div class="local-block" data-animate="reveal-up">
                <h3><?php echo icon('home', 24); ?> Lake Houston Estates</h3>
                <p>Waterfront and near-lake homes with older wood decking that requires careful tear-off and inspection during re-roofs.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="1">
                <h3><?php echo icon('home', 24); ?> Timberline Subdivision</h3>
                <p>Established 1980s neighborhood with mature oak canopy—debris removal and gutter cleaning are essential here.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="2">
                <h3><?php echo icon('home', 24); ?> FM 1960 Corridor</h3>
                <p>Mix of residential and small commercial properties along the main corridor—we handle both.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Why Huffman Homeowners <span class="text-accent">Choose Triple G Roofing</span></h2>
        </div>

        <div class="grid-2">
            <div class="reason-block" data-animate="reveal-up">
                <div class="reason-block__icon">
                    <?php echo icon('shield', 32); ?>
                </div>
                <h3>We're Based in Huffman</h3>
                <p>Not a big company dispatching crews from 40 miles away. We live here. We understand the local climate, soil conditions, and housing stock because this is our community.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="1">
                <div class="reason-block__icon">
                    <?php echo icon('clock', 32); ?>
                </div>
                <h3>Fast Storm Response</h3>
                <p>After a hailstorm or windstorm, we can be at your home the same day to document damage and start the insurance claim process. Speed matters when preventing secondary water damage.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="2">
                <div class="reason-block__icon">
                    <?php echo icon('award', 32); ?>
                </div>
                <h3>Licensed & Insured in Texas</h3>
                <p>We carry full liability and workers' compensation insurance. You're protected, and so is our crew.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="3">
                <div class="reason-block__icon">
                    <?php echo icon('wrench', 32); ?>
                </div>
                <h3>10-Year Workmanship Warranty</h3>
                <p>Every installation comes with a 10-year warranty on our workmanship, plus manufacturer warranties on materials. We stand behind every roof we install.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services in Huffman -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Roofing Services in <span class="text-accent">Huffman, TX</span></h2>
            <p class="prose-centered" style="max-width: 65ch; margin: var(--space-4) auto 0;">Triple G Roofing delivers the full range of residential roofing services to Huffman homeowners. From routine inspections to emergency storm repairs, we're the local roofer you can count on.</p>
        </div>

        <div class="services-list">
            <?php
            $huffmanServices = [
                ['icon' => 'search', 'name' => 'Roof Inspections', 'desc' => 'Photo-documented inspections that catch storm damage and support insurance claims.'],
                ['icon' => 'wrench', 'name' => 'Roof Repairs', 'desc' => 'Leak repairs, shingle replacement, and flashing fixes—most completed within 48 hours.'],
                ['icon' => 'home', 'name' => 'New Roof Installation', 'desc' => 'Full tear-offs and re-roofs with architectural shingles, metal, or impact-resistant materials.'],
                ['icon' => 'wind', 'name' => 'Storm & Wind Damage Repair', 'desc' => 'Same-day storm inspections and rapid repairs after hail, wind, or severe weather events.'],
                ['icon' => 'droplets', 'name' => 'Gutter Installation', 'desc' => 'Seamless gutters that protect your foundation and fascia from Texas rainstorms.'],
                ['icon' => 'ruler', 'name' => 'Attic Venting', 'desc' => 'Balanced ventilation systems that lower attic heat and extend shingle life in our climate.'],
            ];
            foreach ($huffmanServices as $index => $service):
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
            <h2>Need a Roofer in Huffman, TX?</h2>
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
