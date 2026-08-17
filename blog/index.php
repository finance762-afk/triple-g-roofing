<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$currentPage = 'blog';
$pageTitle = 'Roofing & Siding Tips for North Harris County | Triple G Roofing Blog';
$pageDescription = 'Expert roofing and siding advice for Huffman, Humble, Atascocita, Kingwood, and Crosby homeowners — costs, storm damage, insurance claims, and Gulf Coast maintenance guides.';
$canonicalUrl = $siteUrl . '/blog/';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<main id="main-content">
    <!-- Page Header -->
    <section class="blog-post__header">
        <div class="container">
            <span class="blog-post__category">Roofing Knowledge</span>
            <h1>Triple G Roofing <span class="text-accent">Blog</span></h1>
            <p style="color: var(--color-gray); max-width: 60ch; margin: 0 auto;">Roofing and siding answers for Huffman, Humble, Atascocita, Kingwood, and Crosby homeowners — written by the crew that works these neighborhoods.</p>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="section">
        <div class="container">
            <div class="blog-grid" data-p1-dynamic>
                <?php foreach ($blogPosts as $post): ?>
                <a href="/blog/<?php echo $post['slug']; ?>/" class="blog-card">
                    <div class="blog-card__image">
                        <img src="<?php echo $post['image']; ?>"
                             alt="<?php echo htmlspecialchars($post['alt']); ?>"
                             width="960" height="600" loading="lazy">
                    </div>
                    <div class="blog-card__body">
                        <span class="blog-card__category"><?php echo htmlspecialchars($post['category']); ?></span>
                        <h2 class="blog-card__title"><?php echo htmlspecialchars($post['title']); ?></h2>
                        <p class="blog-card__excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                        <div class="blog-card__meta">
                            <time datetime="<?php echo $post['dateISO']; ?>"><?php echo $post['date']; ?></time>
                            <span>•</span>
                            <span><?php echo $post['readtime']; ?></span>
                        </div>
                        <span class="blog-card__cta">Read Article →</span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section cta-banner">
        <div class="container" style="text-align:center">
            <h2>Have a roofing question we haven't answered?</h2>
            <p>Call the Triple G Roofing team — real answers from a local roofer, no runaround.</p>
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo $phone; ?></a>
        </div>
    </section>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
