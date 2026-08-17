<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Kingwood Service Area — Triple G Roofing (Phase 6)
   ============================================================ */

$currentPage     = 'areas';
$pageTitle       = 'Roofing Contractor in Kingwood, TX | Triple G Roofing';
$pageDescription = 'Triple G Roofing serves Kingwood, TX—the Livable Forest—with roof inspections, repairs, and installations. Serving Woodland Hills, Kings Point, and the Greens. Call (281) 570-3325 for a free estimate.';
$canonicalUrl    = $siteUrl . '/areas/kingwood/';

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
            "name": "Kingwood, TX",
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
    "description": "Roofing contractor serving Kingwood, TX with inspections, repairs, storm damage restoration, and new roof installations.",
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
        "name": "Kingwood, TX"
    }
}
</script>

<!-- Hero Section -->
<section class="hero hero--area">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">KINGWOOD, TX ROOFING</span>
            <h1>Expert Roofing for the <span class="text-accent">Livable Forest</span></h1>
            <p class="hero-answer">Triple G Roofing is a licensed Texas roofing contractor serving Kingwood homeowners from Woodland Hills to the Greens with roof inspections, tree-debris cleanup, HOA-compliant installations, and rapid storm damage repairs. Kingwood's mature tree canopy and strict architectural standards demand a roofer who understands both—and that's exactly what we deliver.</p>
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
                    src="/assets/images/1786991248049-gw11k8-473165663_1169782761351692_4112942555971947607_n.jpg"
                    srcset="/assets/images/1786991248049-gw11k8-473165663_1169782761351692_4112942555971947607_n-480.webp 480w,
                            /assets/images/1786991248049-gw11k8-473165663_1169782761351692_4112942555971947607_n-960.webp 960w,
                            /assets/images/1786991248049-gw11k8-473165663_1169782761351692_4112942555971947607_n-1600.webp 1600w"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="Roofing project in Kingwood, TX"
                    width="800"
    height="600"
                    loading="eager"
                    fetchpriority="high">
            </div>
            <div class="split__text">
                <span class="eyebrow-label">THE LIVABLE FOREST</span>
                <h2 class="section-title">Roofing in <span class="text-accent">Kingwood's Canopy</span></h2>
                <p><strong>Kingwood is unique in North Harris County.</strong> Known as "the Livable Forest," Kingwood was master-planned in the 1970s to preserve the existing pine and hardwood canopy. That mature tree cover creates shade and natural beauty—but it also means your roof faces constant debris accumulation, moss growth in shaded areas, and the risk of limb damage during windstorms.</p>
                <p>Homes in Woodland Hills, Kings Point, and the Greens were built with architectural shingles and strict HOA color and style guidelines. We've completed dozens of HOA-compliant re-roofs in Kingwood, and we handle all the architectural review submissions, color approvals, and compliance documentation for you. You get a seamless experience from start to finish.</p>
                <p>Kingwood's soil is sandy and well-drained, which reduces foundation movement compared to clay-heavy areas like Humble. But the tree roots can stress roof structures over time—especially on older homes where root systems have grown under foundations. We inspect for sagging ridgelines, fascia rot from clogged gutters, and shingle wear from constant leaf debris.</p>
            </div>
        </div>
    </div>
</section>

<!-- Neighborhoods Served -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Kingwood Neighborhoods <span class="text-accent">We Serve</span></h2>
            <p class="section-subtitle">HOA-compliant roofing across the Livable Forest</p>
        </div>

        <div class="grid-3">
            <div class="local-block" data-animate="reveal-up">
                <h3><?php echo icon('home', 24); ?> Woodland Hills</h3>
                <p>Established 1970s-1980s homes with mature trees and strict HOA roofing standards. We handle compliance, color matching, and all required approvals.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="1">
                <h3><?php echo icon('home', 24); ?> Kings Point</h3>
                <p>Golf course community with premium roof systems and architectural review requirements. We've completed dozens of re-roofs here since 2020.</p>
            </div>
            <div class="local-block" data-animate="reveal-up" data-delay="2">
                <h3><?php echo icon('home', 24); ?> The Greens</h3>
                <p>Master-planned neighborhood with heavy tree canopy. Gutter cleaning, debris removal, and moss prevention are essential maintenance here.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Why Kingwood Homeowners <span class="text-accent">Choose Triple G Roofing</span></h2>
        </div>

        <div class="grid-2">
            <div class="reason-block" data-animate="reveal-up">
                <div class="reason-block__icon">
                    <?php echo icon('shield', 32); ?>
                </div>
                <h3>We Handle HOA Compliance</h3>
                <p>Kingwood's architectural review boards have strict requirements. We manage all paperwork, color approvals, and submissions—you don't lift a finger.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="1">
                <div class="reason-block__icon">
                    <?php echo icon('clock', 32); ?>
                </div>
                <h3>Tree-Debris Cleanup Included</h3>
                <p>Every re-roof includes full debris removal, gutter cleaning, and inspection for limb damage. We leave your property cleaner than we found it.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="2">
                <div class="reason-block__icon">
                    <?php echo icon('award', 32); ?>
                </div>
                <h3>Moss & Algae Prevention</h3>
                <p>Shaded roofs grow moss and algae faster. We install zinc or copper strips that prevent growth and keep your roof looking clean for years.</p>
            </div>
            <div class="reason-block" data-animate="reveal-up" data-delay="3">
                <div class="reason-block__icon">
                    <?php echo icon('wrench', 32); ?>
                </div>
                <h3>10-Year Workmanship Warranty</h3>
                <p>Every installation carries our 10-year warranty on workmanship, plus full manufacturer warranties on shingles and materials.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services in Kingwood -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Roofing Services in <span class="text-accent">Kingwood, TX</span></h2>
            <p class="prose-centered" style="max-width: 65ch; margin: var(--space-4) auto 0;">Triple G Roofing delivers comprehensive roofing services to Kingwood homeowners. From HOA-compliant installations to tree-damage repairs, we're the local roofer the Livable Forest trusts.</p>
        </div>

        <div class="services-list">
            <?php
            $kingwoodServices = [
                ['icon' => 'search', 'name' => 'Roof Inspections', 'desc' => "Detailed inspections for tree damage, moss growth, and storm wear—with photo documentation for HOA submissions."],
                ['icon' => 'wrench', 'name' => 'Roof Repairs', 'desc' => "Limb-damage repairs, shingle replacement, and flashing fixes—most completed within 48 hours."],
                ['icon' => 'home', 'name' => 'HOA-Compliant Re-Roofs', 'desc' => "Full replacements with architectural shingles that meet Kingwood's strict color and style guidelines."],
                ['icon' => 'wind', 'name' => 'Storm & Limb Damage Repair', 'desc' => "Rapid response after severe weather—we document damage, clear debris, and start repairs fast."],
                ['icon' => 'droplets', 'name' => 'Seamless Gutter Systems', 'desc' => "Custom gutters designed to handle Kingwood's heavy leaf debris and frequent rainstorms."],
                ['icon' => 'ruler', 'name' => 'Attic Ventilation Upgrades', 'desc' => "Ridge and soffit vents that combat humidity under Kingwood's dense tree canopy and extend shingle life."],
            ];
            foreach ($kingwoodServices as $index => $service):
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
            <h2>Need a Roofer in Kingwood, TX?</h2>
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
