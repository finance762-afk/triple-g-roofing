<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'service-areas';
$pageTitle = 'Service Areas — Roofing Services in North Harris County | ' . $siteName;
$pageDescription = 'Triple G Roofing serves Huffman, Humble, Atascocita, Kingwood, Crosby, and surrounding North Harris County communities with professional roofing services. Licensed contractor serving your area.';
$canonicalUrl = $siteUrl . '/service-areas/';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Hero Section */
.hero-service-areas {
    position: relative;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    padding: clamp(80px, 15vw, 140px) 0 clamp(60px, 10vw, 100px);
    overflow: hidden;
}

.hero-service-areas::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.4;
    z-index: 0;
}

.hero-service-areas .container {
    position: relative;
    z-index: 1;
}

.hero-service-areas h1 {
    color: var(--color-white);
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.hero-service-areas .hero-intro {
    color: rgba(255, 255, 255, 0.95);
    font-size: clamp(1rem, 2vw, 1.25rem);
    line-height: 1.6;
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
}

/* Area Cards Grid */
.areas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
    margin-top: var(--space-10);
}

.area-card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all var(--transition);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
}

.area-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
}

.area-card-header {
    background: linear-gradient(135deg, var(--color-secondary) 0%, rgba(26, 26, 46, 0.9) 100%);
    padding: var(--space-6);
    position: relative;
    overflow: hidden;
}

.area-card-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(238, 88, 22, 0.15) 0%, transparent 70%);
    pointer-events: none;
}

.area-card-header h3 {
    color: var(--color-white);
    font-size: var(--font-size-2xl);
    font-weight: 700;
    margin: 0;
    position: relative;
    z-index: 1;
}

.area-card-body {
    padding: var(--space-6);
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.area-card-body p {
    color: var(--color-text-light);
    line-height: 1.7;
    margin-bottom: var(--space-4);
}

.area-highlights {
    list-style: none;
    margin: var(--space-4) 0;
    padding: 0;
}

.area-highlights li {
    display: flex;
    align-items: flex-start;
    gap: var(--space-2);
    margin-bottom: var(--space-3);
    color: var(--color-text-light);
    font-size: var(--font-size-sm);
}

.area-highlights li svg {
    color: var(--color-accent);
    flex-shrink: 0;
    margin-top: 2px;
}

.area-card .btn {
    margin-top: auto;
}

/* Coverage Map Section */
.coverage-section {
    background: var(--color-bg-alt);
    padding: var(--space-12) 0;
    margin-top: var(--space-12);
}

.coverage-intro {
    text-align: center;
    max-width: 700px;
    margin: 0 auto var(--space-8);
}

.coverage-intro h2 {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    margin-bottom: var(--space-4);
    color: var(--color-secondary);
}

.coverage-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.coverage-stat {
    text-align: center;
    padding: var(--space-6);
    background: var(--color-white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
}

.coverage-stat-number {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 800;
    color: var(--color-primary);
    display: block;
    margin-bottom: var(--space-2);
}

.coverage-stat-label {
    font-size: var(--font-size-base);
    color: var(--color-text-light);
    font-weight: 500;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--color-secondary) 0%, rgba(26, 26, 46, 0.95) 100%);
    padding: clamp(60px, 10vw, 100px) 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    z-index: 0;
}

.cta-section .container {
    position: relative;
    z-index: 1;
}

.cta-section h2 {
    color: var(--color-white);
    font-size: clamp(1.75rem, 4vw, 2.75rem);
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.cta-section p {
    color: rgba(255, 255, 255, 0.9);
    font-size: var(--font-size-lg);
    margin-bottom: var(--space-6);
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: var(--space-4);
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .areas-grid {
        grid-template-columns: 1fr;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: stretch;
    }

    .cta-buttons .btn {
        width: 100%;
    }
}
</style>

<!-- Hero Section -->
<section class="hero-service-areas">
    <div class="container" style="text-align: center;">
        <h1>Roofing Services in Huffman & Surrounding North Harris County Communities</h1>
        <p class="hero-intro">
            Triple G Roofing proudly serves homeowners across North Harris County with professional roofing services.
            From Huffman to Humble, Atascocita to Kingwood, we're your local roofing contractor with deep roots
            in the communities we serve.
        </p>
    </div>
</section>

<!-- Service Areas Grid -->
<section style="padding: var(--space-12) 0;">
    <div class="container">
        <div class="areas-grid">
            <?php foreach ($serviceAreas as $area):
                $areaSlug = getAreaSlug($area);
            ?>
            <article class="area-card" data-animate="fade-up">
                <div class="area-card-header">
                    <h3><?php echo htmlspecialchars($area); ?></h3>
                </div>
                <div class="area-card-body">
                    <p>
                        Professional roofing services for <?php echo htmlspecialchars($area); ?> homeowners.
                        We understand the unique challenges of <?php echo htmlspecialchars($area); ?>'s climate
                        and deliver solutions built to last.
                    </p>
                    <ul class="area-highlights">
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span>Same-day emergency response</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span>Licensed Texas roofing contractor</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span>Direct insurance claim coordination</span>
                        </li>
                        <li>
                            <?php echo icon('check-circle', 18); ?>
                            <span>10-year workmanship warranty</span>
                        </li>
                    </ul>
                    <a href="/service-areas/<?php echo $areaSlug; ?>/" class="btn btn-primary">
                        Learn More About <?php echo htmlspecialchars($area); ?>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Coverage Section -->
<section class="coverage-section">
    <div class="container">
        <div class="coverage-intro">
            <h2>Trusted by North Harris County Homeowners Since Day One</h2>
            <p>
                As a locally-owned and operated roofing contractor, we've built our reputation one roof at a time.
                We're not a national chain — we're your neighbors, and every job site is treated like family.
            </p>
        </div>

        <div class="coverage-stats">
            <div class="coverage-stat" data-animate="fade-up">
                <span class="coverage-stat-number">25+</span>
                <span class="coverage-stat-label">Mile Service Radius</span>
            </div>
            <div class="coverage-stat" data-animate="fade-up" style="animation-delay: 0.1s;">
                <span class="coverage-stat-number">5</span>
                <span class="coverage-stat-label">Major Communities Served</span>
            </div>
            <div class="coverage-stat" data-animate="fade-up" style="animation-delay: 0.2s;">
                <span class="coverage-stat-number">100%</span>
                <span class="coverage-stat-label">Licensed & Insured</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Need a Roofer in Your Area?</h2>
        <p>
            We're ready to help. Call now for same-day emergency response or schedule a free inspection at your convenience.
        </p>
        <div class="cta-buttons">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent" style="font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                <?php echo icon('phone', 20); ?> <?php echo $phone; ?>
            </a>
            <a href="/contact/" class="btn btn-primary" style="font-size: var(--font-size-lg); padding: var(--space-4) var(--space-8);">
                Get Your Free Estimate
            </a>
        </div>
    </div>
</section>

<!-- BreadcrumbList Schema -->
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
