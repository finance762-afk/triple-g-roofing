<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = 'blog';
$pageTitle = 'Roofing Tips & Industry News | Triple G Roofing Blog';
$pageDescription = 'Expert roofing advice, storm preparation tips, and industry updates from Triple G Roofing. Learn how to protect your North Harris County home from our licensed roofing professionals.';
$canonicalUrl = $siteUrl . '/blog/';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<main id="main-content">
    <!-- Hero Section -->
    <section class="hero hero--page">
        <div class="container">
            <div class="hero__content">
                <span class="eyebrow-label">ROOFING KNOWLEDGE</span>
                <h1>Triple G Roofing <span class="text-accent">Blog</span></h1>
                <p class="hero-subtitle">Expert roofing advice, storm preparation tips, and industry updates for North Harris County homeowners</p>
            </div>
        </div>
    </section>

    <!-- Blog Posts Coming Soon -->
    <section class="section">
        <div class="container">
            <div class="prose prose-centered">
                <h2>Blog Posts Coming Soon</h2>
                <p>We're currently developing helpful roofing content for North Harris County homeowners. Check back soon for:</p>
                <ul style="text-align: left; max-width: 600px; margin: 2rem auto;">
                    <li>Storm preparation and damage prevention tips</li>
                    <li>Roof maintenance guides for Texas climates</li>
                    <li>Insurance claim process walkthroughs</li>
                    <li>Material selection advice for Gulf Coast homes</li>
                    <li>DIY inspection checklists</li>
                </ul>
                <p>In the meantime, if you have roofing questions, <a href="/contact/" style="color: var(--color-primary); text-decoration: underline;">contact us directly</a> — we're always happy to help.</p>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-banner__content">
                <h2>Need Roofing Help Today?</h2>
                <p>Don't wait for the blog — call Triple G Roofing now for expert advice and free estimates.</p>
            </div>
            <div class="cta-banner__action">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-light">
                    <?php echo icon('phone', 18); ?> <?php echo $phone; ?>
                </a>
                <a href="/contact/" class="btn btn-outline-light">Get Free Estimate</a>
            </div>
        </div>
    </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
