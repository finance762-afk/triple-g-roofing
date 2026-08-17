<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Atascocita Service Area — Triple G Roofing (Phase 6)
   ============================================================ */

$currentPage     = 'areas';
$pageTitle       = 'Roofing Contractor in Atascocita, TX | Triple G Roofing';
$pageDescription = 'Triple G Roofing provides professional roofing services in Atascocita, TX. Serving Eagle Springs, Kings River, and lakeside communities near Lake Houston. Call (281) 570-3325 for a free estimate.';
$canonicalUrl    = $siteUrl . '/areas/atascocita/';

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
            "name": "Atascocita, TX",
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
    "description": "Roofing contractor serving Atascocita, TX with inspections, repairs, storm damage restoration, and new roof installations.",
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
        "name": "Atascocita, TX"
    }
}
</script>

<!-- Hero Section -->
<section class="hero hero--area">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">ATASCOCITA, TX ROOFING</span>
            <h1>Storm-Resilient Roofing in <span class="text-accent">Atascocita, Texas</span></h1>
            <p class="hero-answer">Triple G Roofing is a licensed Texas roofing contractor serving Atascocita homeowners from Eagle Springs to Kings River with roof inspections, impact-resistant installations, lake-climate ventilation upgrades, and rapid storm damage repairs. Atascocita's proximity to Lake Houston demands roofs built to withstand sudden severe weather—and that's exactly what we deliver.</p>
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
                    src="/assets/images/1786991247713-sn27ek-473073340_1169795181350450_5273767219034025918_n.jpg"
                    srcset="/assets/images/1786991247713-sn27ek-473073340_1169795181350450_5273767219034025918_n-480.webp 480w,
                            /assets/images/1786991247713-sn27ek-473073340_1169795181350450_5273767219034025918_n-960.webp 960w,
                            /assets/images/1786991247713-sn27ek-473073340_1169795181350450_5273767219034025918_n-1600.webp 1600w"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="New roof installation in Atascocita, TX"
                    width="800"
                    height="600"
                    loading="eager"
                    fetchpriority="high">
            </div>
            <div class="split__text">
                <span class="eyebrow-label">LAKESIDE ROOFING EXPERTS</span>
                <h2 class="section-title">Roofing for <span class="text-accent">Lake Houston Communities</span></h2>
                <p><strong>Atascocita sits right on the western shore of Lake Houston.</strong> That proximity to open water creates unique weather challenges for homeowners. Thunderstorms rolling off the lake can intensify rapidly—wind gusts above 70 mph, golf-ball-sized hail, and torrential downpours are common during spring and summer storm season. Your roof takes the brunt of it.</p>
                <p>Neighborhoods like Eagle Springs, Kings River, and Walden on Lake Houston were developed in the 1980s and 1990s with steeper roof pitches and better drainage than older areas, but they're now entering the re-roof cycle. We've handled dozens of full replacements in Atascocita since 2020, and we understand the local building codes, HOA requirements, and architectural guidelines that govern these communities.</p>
                <p>Atascocita's soil is a mix of sandy loam near the lake and heavier clay as you move inland. Foundation movement is less common here than in Humble, but we still inspect for truss uplift and rafter spread—especially on homes built before 2000 when engineered trusses weren't the standard.</p>
            </div>
        </div>
    </div>
</section>

<!-- Neighborhoods Served -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Atascocita Neighborhoods <span class="text-accent">We Serve</span></h2>
            <p class="section-subtitle">Expert roofing across lakeside and inland communities</p>
        </div>

        <div class="grid-3">
            <div class="local-block" data-animate="reveal-up">
                <h3><?php echo icon('home', 24); ?> Eagle Springs</h3>
                <p>1990s-era homes with engineered trusses and steeper pitches. We've completed dozens of re-roofs here—many with impact-resistant shingles for hail protection.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="1">
                <h3><?php echo icon('home', 24); ?> Kings River</h3>
                <p>Master-planned community with strict HOA roofing standards. We handle compliance, color matching, and all HOA approvals for you.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="2">
                <h3><?php echo icon('home', 24); ?> Walden on Lake Houston</h3>
                <p>Lakefront and near-lake homes with premium roof systems. High wind exposure demands impact-rated materials and upgraded fastening schedules—we install both.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Why Atascocita Homeowners <span class="text-accent">Choose Triple G Roofing</span></h2>
        </div>

        <div class="grid-2">
            <div class="reason-block" data-animate="reveal-up">
                <div class="reason-block__icon">
                    <?php echo icon('shield', 32); ?>
                </div>
                <h3>We Understand Lake-Climate Roofing</h3>
                <p>Atascocita's proximity to Lake Houston means rapid-onset severe weather. We design every roof for high wind exposure, hail impact, and the humidity challenges of waterfront living.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="1">
                <div class="reason-block__icon">
                    <?php echo icon('clock', 32); ?>
                </div>
                <h3>HOA-Compliant Installations</h3>
                <p>We handle all HOA paperwork, color approvals, and architectural review submissions for Atascocita communities. You get a hassle-free experience from start to finish.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="2">
                <div class="reason-block__icon">
                    <?php echo icon('award', 32); ?>
                </div>
                <h3>Impact-Resistant Shingles</h3>
                <p>We specialize in Class 4 impact-resistant shingles that qualify for insurance discounts and withstand hail better than standard architectural shingles.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="3">
                <div class="reason-block__icon">
                    <?php echo icon('wrench', 32); ?>
                </div>
                <h3>10-Year Workmanship Warranty</h3>
                <p>Every installation carries our 10-year warranty on workmanship, plus full manufacturer warranties on materials. Your investment is protected for the long term.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services in Atascocita -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Roofing Services in <span class="text-accent">Atascocita, TX</span></h2>
            <p class="prose-centered" style="max-width: 65ch; margin: var(--space-4) auto 0;">Triple G Roofing delivers comprehensive roofing services to Atascocita homeowners. From HOA-compliant installations to emergency storm repairs, we're the local roofer lakeside communities trust.</p>
        </div>

        <div class="services-list">
            <?php
            $atascocitaServices = [
                ['icon' => 'search', 'name' => 'Roof Inspections', 'desc' => 'Detailed storm damage assessments with photo documentation for insurance claims and HOA submissions.'],
                ['icon' => 'wrench', 'name' => 'Roof Repairs', 'desc' => 'Leak repairs, shingle replacement, and flashing fixes—most completed within 48 hours of approval.'],
                ['icon' => 'home', 'name' => 'Impact-Resistant Re-Roofs', 'desc' => 'Full replacements with Class 4 hail-rated shingles that qualify for insurance discounts.'],
                ['icon' => 'wind', 'name' => 'Storm Damage Restoration', 'desc' => 'Rapid response after severe weather—we document damage, coordinate with insurance, and start repairs fast.'],
                ['icon' => 'droplets', 'name' => 'Seamless Gutter Systems', 'desc' => 'Custom gutters that handle Atascocita\'s heavy rainstorms and protect lakeside foundations from erosion.'],
                ['icon' => 'ruler', 'name' => 'Attic Ventilation Upgrades', 'desc' => 'Ridge and soffit vent systems that combat lake-climate humidity and lower attic temperatures year-round.'],
            ];
            foreach ($atascocitaServices as $index => $service):
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
            <h2>Need a Roofer in Atascocita, TX?</h2>
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
