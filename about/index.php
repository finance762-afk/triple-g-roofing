<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   About — Triple G Roofing (Phase 5)
   ============================================================ */

$currentPage     = 'about';
$pageTitle       = 'About Triple G Roofing | Family-Owned Roofing Contractor in Huffman, TX';
$metaDescription = 'Meet the team at Triple G Roofing. Family-owned roofing contractor serving Huffman and North Harris County since the beginning. Licensed, insured, and committed to protecting your home.';
$canonicalUrl    = $siteUrl . '/about/';

/* --- BreadcrumbList Schema --- */
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $metaDescription,
            'provider' => [
                '@id' => $siteUrl . '/#organization'
            ]
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $siteUrl . '/'
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'About',
                    'item' => $canonicalUrl
                ]
            ]
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">About</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero hero--interior" data-animate="fade-up">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">About Us</span>
            <h1>Your Neighbors in <span class="text-accent">Roofing Excellence</span></h1>
            <p class="hero__subtitle">Triple G Roofing is a family-owned roofing contractor based in Huffman, Texas, serving homeowners across North Harris County with honest service and expert craftsmanship.</p>
        </div>
    </div>
</section>

<!-- Company Story Section -->
<section class="section section--light" data-animate="fade-up">
    <div class="container">
        <div class="split">
            <div class="split__content">
                <span class="eyebrow-label">Our Story</span>
                <h2>Built on Trust, <span class="text-accent">Rooted in Huffman</span></h2>
                <p>Triple G Roofing was founded by <?php echo $ownerName; ?> to serve the Huffman community with reliable roofing services. We understand the challenges North Harris County homeowners face — severe weather, high heat, humidity, and the stress of dealing with storm damage and insurance claims.</p>
                <p>As a licensed Texas roofing contractor, we've built our reputation on transparency, skilled workmanship, and genuine care for the families we serve. When you call Triple G Roofing, you're getting a neighbor who understands the local climate, knows the building codes, and treats your home like their own.</p>
                <p>We're not the biggest roofing company in the area, but we're proud to be one of the most trusted. Our goal isn't just to fix your roof — it's to give you peace of mind knowing your home is protected.</p>
            </div>
            <div class="split__media">
                <img
                    src="/assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n.jpg"
                    srcset="/assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n-480.webp 480w,
                            /assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n-960.webp 960w,
                            /assets/images/1786991247117-3gjnsv-93541722_120782452918400_4443311484969156608_n-1600.webp 1600w"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="Triple G Roofing crew working on a Huffman home"
                    width="800"
                    height="600"
                    loading="lazy"
                >
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section" data-animate="fade-up">
    <div class="container">
        <div class="text-center" style="margin-bottom: var(--space-2xl);">
            <span class="eyebrow-label">Our Values</span>
            <h2>What Sets <span class="text-accent">Triple G Apart</span></h2>
            <p class="section-intro" style="max-width: 65ch; margin: 0 auto;">We're built on principles that guide every roof we inspect, repair, and install.</p>
        </div>

        <div class="grid-3">
            <div class="card card-tint-1" data-animate="fade-up">
                <div class="card__icon">
                    <?php echo icon('shield', 40); ?>
                </div>
                <h3>Licensed & Insured</h3>
                <p>Fully licensed by the State of Texas and insured to protect you and your property. Every crew member carries workers' comp coverage.</p>
            </div>
            <div class="card card-tint-2" data-animate="fade-up" style="animation-delay: 0.1s;">
                <div class="card__icon">
                    <?php echo icon('check-circle', 40); ?>
                </div>
                <h3>Transparent Pricing</h3>
                <p>No hidden fees. No surprise charges. We explain every line item so you know exactly what you're paying for.</p>
            </div>
            <div class="card card-tint-3" data-animate="fade-up" style="animation-delay: 0.2s;">
                <div class="card__icon">
                    <?php echo icon('award', 40); ?>
                </div>
                <h3>10-Year Workmanship Warranty</h3>
                <p>We guarantee our work for 10 years. If a problem arises from our installation, we'll make it right.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team & Expertise Section -->
<section class="section section--light" data-animate="fade-up">
    <div class="container">
        <div class="split split-reverse">
            <div class="split__content">
                <span class="eyebrow-label">Expertise</span>
                <h2>Deep Knowledge of <span class="text-accent">Texas Weather</span></h2>
                <p>Roofing in North Harris County isn't like roofing anywhere else. Gulf Coast humidity, intense summer heat, severe thunderstorms, hail, and wind gusts that can rip shingles clean off — our climate demands expertise.</p>
                <p>We know which materials hold up best to Huffman's heat and humidity. We know how to ventilate an attic properly to extend shingle life and cut cooling costs. And we know the signs of hail and wind damage that insurance adjusters look for.</p>
                <p>Our team has decades of combined experience navigating storm-damage claims, coordinating with adjusters, and getting homeowners the coverage they're entitled to — without the runaround.</p>
            </div>
            <div class="split__media">
                <img
                    src="/assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n.jpg"
                    srcset="/assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n-480.webp 480w,
                            /assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n-960.webp 960w,
                            /assets/images/1786991247425-rtz44w-119444757_187761652887146_1184401603342596739_n-1600.webp 1600w"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="Roofing work in progress on a North Harris County home"
                    width="800"
                    height="600"
                    loading="lazy"
                >
            </div>
        </div>
    </div>
</section>

<!-- Credentials Section -->
<section class="section" data-animate="fade-up">
    <div class="container">
        <div class="text-center" style="margin-bottom: var(--space-xl);">
            <span class="eyebrow-label">Credentials</span>
            <h2>Licensed, Certified, <span class="text-accent">Committed</span></h2>
            <p class="section-intro" style="max-width: 65ch; margin: 0 auto;">We maintain the licenses, insurance, and manufacturer certifications required to protect your investment.</p>
        </div>

        <div class="grid-2" style="max-width: 900px; margin: 0 auto;">
            <div class="card card-tint-neutral" data-animate="fade-up">
                <h3><?php echo icon('check-circle', 24); ?> Texas Roofing License</h3>
                <p>Licensed to operate as a roofing contractor in the State of Texas. All work meets or exceeds state and local building codes.</p>
            </div>
            <div class="card card-tint-neutral" data-animate="fade-up" style="animation-delay: 0.1s;">
                <h3><?php echo icon('shield', 24); ?> General Liability Insurance</h3>
                <p>Full coverage to protect your property during our work. Every crew carries workers' compensation insurance as required by Texas law.</p>
            </div>
        </div>
    </div>
</section>

<!-- Service Area Map Section -->
<section class="section section--light" data-animate="fade-up">
    <div class="container content-narrow text-center">
        <span class="eyebrow-label">Service Area</span>
        <h2>Serving <span class="text-accent">North Harris County</span></h2>
        <p>We proudly serve homeowners in <?php echo implode(', ', $serviceAreas); ?>, and surrounding communities across North Harris County.</p>
        <p style="margin-top: var(--space-lg);">
            <a href="/contact/" class="btn btn-primary">Get Your Free Estimate</a>
        </p>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-banner" data-animate="fade-up">
    <div class="container text-center">
        <h2>Ready to Protect Your Home?</h2>
        <p style="font-size: var(--font-size-lg); margin-bottom: var(--space-lg);">Call Triple G Roofing today for a free, no-obligation roof inspection and estimate.</p>
        <div class="cta-buttons">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary">
                <?php echo icon('phone', 18); ?> <?php echo $phone; ?>
            </a>
            <a href="/contact/" class="btn btn-secondary">Request Estimate Online</a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
