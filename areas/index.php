<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Service Areas Overview — Triple G Roofing (Phase 6)
   ============================================================ */

$currentPage     = 'areas';
$pageTitle       = 'Roofing Service Areas in North Harris County, TX | Triple G Roofing';
$metaDescription = 'Triple G Roofing serves Huffman, Humble, Atascocita, Kingwood, Crosby, and surrounding North Harris County communities with trusted roofing inspections, repairs, and installations. Call (281) 570-3325.';
$canonicalUrl    = $siteUrl . '/areas/';

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
            "item": "<?php echo $canonicalUrl; ?>"
        }
    ]
}
</script>

<!-- Hero Section -->
<section class="hero hero--inner">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">WHERE WE WORK</span>
            <h1>Roofing Services Across <span class="text-accent">North Harris County</span> & Surrounding Communities</h1>
            <p class="hero__subtitle">Triple G Roofing brings trusted roofing inspections, repairs, attic venting, seamless gutters, and storm damage restoration to homeowners throughout Huffman and the surrounding region. We're your local roofer—serving the neighborhoods you call home.</p>
            <div class="hero__cta-group">
                <a href="/contact/" class="btn btn-primary">Get Your Free Estimate</a>
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Service Areas Grid -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">Communities We <span class="text-accent">Serve</span></h2>
            <p class="section-subtitle">Professional roofing where you live</p>
            <p class="prose-centered" style="max-width: 65ch; margin: var(--space-6) auto 0;">Triple G Roofing is based in Huffman and proudly serves homeowners across North Harris County. We know the local climate challenges—intense summer heat, sudden hailstorms, and hurricane-season wind exposure—and we design every roof to handle them. Click a community below to learn how we serve your neighborhood.</p>
        </div>

        <div class="service-areas-grid">
            <?php
            $areaDetails = [
                [
                    'name' => 'Huffman',
                    'slug' => 'huffman',
                    'tagline' => 'Our home base — deep roots in the Huffman community',
                    'img' => '1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n',
                    'alt' => 'Completed residential roofing project in Huffman, TX'
                ],
                [
                    'name' => 'Humble',
                    'slug' => 'humble',
                    'tagline' => 'Serving historic downtown and new developments',
                    'img' => '1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n',
                    'alt' => 'Roof repair on a brick home in Humble, TX'
                ],
                [
                    'name' => 'Atascocita',
                    'slug' => 'atascocita',
                    'tagline' => 'Storm-resilient roofing for lakeside homes',
                    'img' => '1786991247713-sn27ek-473073340_1169795181350450_5273767219034025918_n',
                    'alt' => 'New roof installation in Atascocita, TX'
                ],
                [
                    'name' => 'Kingwood',
                    'slug' => 'kingwood',
                    'tagline' => 'Expert roofing for the Livable Forest community',
                    'img' => '1786991248049-gw11k8-473165663_1169782761351692_4112942555971947607_n',
                    'alt' => 'Roofing project in Kingwood, TX'
                ],
                [
                    'name' => 'Crosby',
                    'slug' => 'crosby',
                    'tagline' => 'Trusted roofing for rural and suburban properties',
                    'img' => '1786991248337-5pneph-473228977_1169795098017125_8651076958427985971_n',
                    'alt' => 'Residential roofing service in Crosby, TX'
                ]
            ];

            foreach ($areaDetails as $area):
            ?>
            <article class="area-card" data-animate="reveal-up">
                <a href="/areas/<?php echo $area['slug']; ?>/" class="area-card__link">
                    <div class="area-card__image">
                        <img
                            src="/assets/images/<?php echo $area['img']; ?>.jpg"
                            srcset="/assets/images/<?php echo $area['img']; ?>-480.webp 480w,
                                    /assets/images/<?php echo $area['img']; ?>-960.webp 960w,
                                    /assets/images/<?php echo $area['img']; ?>-1600.webp 1600w"
                            sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw"
                            alt="<?php echo htmlspecialchars($area['alt']); ?>"
                            width="800"
                            height="600"
                            loading="lazy">
                    </div>
                    <div class="area-card__body">
                        <h3 class="area-card__title"><?php echo htmlspecialchars($area['name']); ?>, TX</h3>
                        <p class="area-card__tagline"><?php echo htmlspecialchars($area['tagline']); ?></p>
                        <span class="area-card__cta">Learn More <?php echo icon('arrow-up', 16); ?></span>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Coverage Map Visual -->
<section class="section">
    <div class="container">
        <div class="split split--reverse">
            <div class="split__text">
                <span class="eyebrow-label">LOCAL COVERAGE</span>
                <h2 class="section-title">We're <span class="text-accent">Your Neighbors</span></h2>
                <p>Triple G Roofing has served North Harris County families for years. We understand the climate challenges unique to our region—from the intense summer heat that cooks attic spaces to the sudden hail and wind events that can tear through neighborhoods in minutes.</p>
                <p>When you call Triple G Roofing, you're calling a local business that lives and works in the same communities you do. We respond fast because your home is near our home. We stand behind our work because our reputation is built one roof at a time, one neighbor at a time.</p>
                <div class="cta-inline">
                    <a href="/contact/" class="btn btn-primary">Request a Free Estimate</a>
                </div>
            </div>
            <div class="split__visual">
                <div class="map-embed">
                    <?php echo $gbpMapEmbed; ?>
                </div>
                <a href="<?php echo $directionsUrl; ?>" class="btn btn-secondary" target="_blank" rel="noopener">
                    <?php echo icon('map-pin', 18); ?> Get Directions
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Highlight -->
<section class="section section--alt">
    <div class="container">
        <div class="section__header">
            <h2 class="section-title">What We Do in <span class="text-accent">Every Community</span></h2>
            <p class="prose-centered" style="max-width: 65ch; margin: var(--space-4) auto 0;">No matter which North Harris County neighborhood you call home, Triple G Roofing delivers the same professional roofing services with the same commitment to quality and transparency.</p>
        </div>

        <div class="grid-3">
            <div class="feature-block" data-animate="reveal-up">
                <div class="feature-block__icon">
                    <?php echo icon('search', 32); ?>
                </div>
                <h3>Roof Inspections</h3>
                <p>Storm damage documentation, wear assessments, and insurance claim–ready reports.</p>
            </div>
            <div class="feature-block" data-animate="reveal-up" data-delay="1">
                <div class="feature-block__icon">
                    <?php echo icon('wrench', 32); ?>
                </div>
                <h3>Repairs & Replacements</h3>
                <p>Leak repairs, shingle replacement, and full re-roofing tailored to your home and budget.</p>
            </div>
            <div class="feature-block" data-animate="reveal-up" data-delay="2">
                <div class="feature-block__icon">
                    <?php echo icon('wind', 32); ?>
                </div>
                <h3>Storm Damage Restoration</h3>
                <p>Same-day inspections, direct insurance billing, and rapid repairs after severe weather.</p>
            </div>
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
            <h2>Need a Roofer in North Harris County?</h2>
            <p>Call Triple G Roofing for a free estimate on your roofing project.</p>
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
/* Service Areas Grid */
.service-areas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-8);
    margin-top: var(--space-10);
}

.area-card {
    background: var(--color-bg);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all var(--transition);
}

.area-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.area-card__link {
    display: block;
    color: inherit;
    text-decoration: none;
}

.area-card__image {
    position: relative;
    aspect-ratio: 4 / 3;
    overflow: hidden;
}

.area-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}

.area-card:hover .area-card__image img {
    transform: scale(1.05);
}

.area-card__body {
    padding: var(--space-6);
}

.area-card__title {
    font-family: var(--font-heading);
    font-size: var(--font-size-xl);
    font-weight: 700;
    margin-bottom: var(--space-2);
    color: var(--color-primary);
}

.area-card__tagline {
    font-size: var(--font-size-sm);
    color: var(--color-text-light);
    margin-bottom: var(--space-4);
    line-height: 1.5;
}

.area-card__cta {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-weight: 600;
    color: var(--color-secondary);
    font-size: var(--font-size-sm);
}

.area-card__cta svg {
    transform: rotate(45deg);
    transition: transform var(--transition);
}

.area-card:hover .area-card__cta svg {
    transform: rotate(45deg) translate(2px, -2px);
}

/* Map Embed */
.map-embed {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    overflow: hidden;
    border-radius: var(--radius);
    margin-bottom: var(--space-4);
}

.map-embed iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

/* Feature Block */
.feature-block {
    text-align: center;
    padding: var(--space-6);
    background: var(--color-bg);
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
}

.feature-block__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
    border-radius: 50%;
    margin-bottom: var(--space-4);
    color: var(--color-white);
}

.feature-block h3 {
    font-family: var(--font-heading);
    font-size: var(--font-size-lg);
    font-weight: 700;
    margin-bottom: var(--space-3);
}

.feature-block p {
    color: var(--color-text-light);
    font-size: var(--font-size-sm);
    line-height: 1.6;
}

.cta-centered {
    text-align: center;
    margin-top: var(--space-8);
}

.cta-inline {
    margin-top: var(--space-6);
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
