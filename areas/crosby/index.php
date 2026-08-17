<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Crosby Service Area — Triple G Roofing (Phase 6)
   ============================================================ */

$currentPage     = 'areas';
$pageTitle       = 'Roofing Contractor in Crosby, TX | Triple G Roofing';
$metaDescription = 'Triple G Roofing serves Crosby, TX with roof inspections, repairs, and installations for rural and suburban properties. Serving Newport, Barrett Station, and FM 2100 corridor. Call (281) 570-3325.';
$canonicalUrl    = $siteUrl . '/areas/crosby/';

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
            "name": "Crosby, TX",
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
    "description": "Roofing contractor serving Crosby, TX with inspections, repairs, storm damage restoration, and new roof installations for rural and suburban properties.",
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
        "name": "Crosby, TX"
    }
}
</script>

<!-- Hero Section -->
<section class="hero hero--area">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">CROSBY, TX ROOFING</span>
            <h1>Trusted Roofing for <span class="text-accent">Crosby's Rural & Suburban Properties</span></h1>
            <p class="hero-answer">Triple G Roofing is a licensed Texas roofing contractor serving Crosby homeowners from Newport to Barrett Station with roof inspections, metal roof installations, agricultural building roofing, and rapid storm damage repairs. Crosby's mix of rural acreage and suburban neighborhoods demands a roofer who understands both—and that's exactly what we deliver.</p>
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
                    src="/assets/images/1786991248337-5pneph-473228977_1169795098017125_8651076958427985971_n.jpg"
                    srcset="/assets/images/1786991248337-5pneph-473228977_1169795098017125_8651076958427985971_n-480.webp 480w,
                            /assets/images/1786991248337-5pneph-473228977_1169795098017125_8651076958427985971_n-960.webp 960w,
                            /assets/images/1786991248337-5pneph-473228977_1169795098017125_8651076958427985971_n-1600.webp 1600w"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="Residential roofing service in Crosby, TX"
                    width="800"
                    height="600"
                    loading="eager"
                    fetchpriority="high">
            </div>
            <div class="split__text">
                <span class="eyebrow-label">RURAL & SUBURBAN ROOFING</span>
                <h2 class="section-title">Roofing Across <span class="text-accent">Crosby's Communities</span></h2>
                <p><strong>Crosby is where rural Harris County meets suburban growth.</strong> Properties along FM 2100 and the Newport area feature larger lots, often 1-5 acres, with homes built from the 1960s through today. Many properties include detached garages, workshops, or agricultural buildings that need metal roofing—and we handle those alongside residential shingle roofs.</p>
                <p>Barrett Station, one of the oldest African American communities in Texas (established 1865), features a mix of historic homes and newer construction. We've worked in Barrett Station for years, and we understand the community's pride in preserving its heritage while modernizing homes for the next generation. Respectful service and quality workmanship matter here—and that's exactly what we deliver.</p>
                <p>Crosby's soil is sandy loam with good drainage, but properties near the San Jacinto River floodplain can experience seasonal high water tables. Wind exposure is higher here than in more wooded areas like Kingwood, which means roof fastening schedules and edge flashing details matter. We design every roof for Crosby's open-country conditions.</p>
            </div>
        </div>
    </div>
</section>

<!-- Neighborhoods Served -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Crosby Communities <span class="text-accent">We Serve</span></h2>
            <p class="section-subtitle">Residential and agricultural roofing across the area</p>
        </div>

        <div class="grid-3">
            <div class="local-block" data-animate="reveal-up">
                <h3><?php echo icon('home', 24); ?> Newport</h3>
                <p>Suburban-rural mix with larger lots and homes from the 1970s-2000s. We handle residential re-roofs, metal shop buildings, and detached garage roofing.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="1">
                <h3><?php echo icon('home', 24); ?> Barrett Station</h3>
                <p>Historic community established 1865 with a mix of heritage homes and modern construction. Respectful, quality service is our standard here.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="2">
                <h3><?php echo icon('home', 24); ?> FM 2100 Corridor</h3>
                <p>Growing suburban corridor with 1-5 acre properties. We've completed dozens of re-roofs and agricultural building projects here since 2020.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Why Crosby Property Owners <span class="text-accent">Choose Triple G Roofing</span></h2>
        </div>

        <div class="grid-2">
            <div class="reason-block" data-animate="reveal-up">
                <div class="reason-block__icon">
                    <?php echo icon('shield', 32); ?>
                </div>
                <h3>We Handle Residential & Agricultural</h3>
                <p>From your home's architectural shingles to your workshop's standing-seam metal roof, we handle both. One roofer for your entire property.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="1">
                <div class="reason-block__icon">
                    <?php echo icon('clock', 32); ?>
                </div>
                <h3>Built for Open-Country Wind</h3>
                <p>Crosby's higher wind exposure demands upgraded fastening schedules and edge flashing. We design every roof for your property's specific exposure.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="2">
                <div class="reason-block__icon">
                    <?php echo icon('award', 32); ?>
                </div>
                <h3>Metal Roof Specialists</h3>
                <p>Standing-seam, corrugated, and 5V-crimp metal roofing for shops, barns, and garages. We cut, fit, and install on-site—no prefab panels.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="3">
                <div class="reason-block__icon">
                    <?php echo icon('wrench', 32); ?>
                </div>
                <h3>10-Year Workmanship Warranty</h3>
                <p>Every installation carries our 10-year warranty on workmanship, plus full manufacturer warranties on shingles and metal panels.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services in Crosby -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Roofing Services in <span class="text-accent">Crosby, TX</span></h2>
            <p class="prose-centered" style="max-width: 65ch; margin: var(--space-4) auto 0;">Triple G Roofing delivers comprehensive roofing services to Crosby property owners. From residential shingle roofs to metal agricultural buildings, we're the local roofer rural and suburban Crosby trusts.</p>
        </div>

        <div class="services-list">
            <?php
            $crosbyServices = [
                ['icon' => 'search', 'name' => 'Roof Inspections', 'desc' => 'Detailed inspections for residential and agricultural buildings—photo-documented for insurance claims.'],
                ['icon' => 'wrench', 'name' => 'Roof Repairs', 'desc' => 'Leak repairs, shingle replacement, metal panel replacement, and structural fixes—residential and ag buildings.'],
                ['icon' => 'home', 'name' => 'Complete Re-Roofs', 'desc' => 'Full residential tear-offs and installations with architectural or impact-resistant shingles built for wind exposure.'],
                ['icon' => 'wind', 'name' => 'Storm Damage Restoration', 'desc' => 'Rapid response after severe weather—we document damage, coordinate insurance, and start repairs fast.'],
                ['icon' => 'hard-hat', 'name' => 'Metal Roof Installation', 'desc' => 'Standing-seam, corrugated, and 5V-crimp metal roofs for shops, barns, garages, and agricultural buildings.'],
                ['icon' => 'ruler', 'name' => 'Attic Ventilation Upgrades', 'desc' => 'Ridge and soffit vents that combat Crosby's open-country heat and extend residential shingle life.'],
            ];
            foreach ($crosbyServices as $index => $service):
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
            <h2>Need a Roofer in Crosby, TX?</h2>
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
