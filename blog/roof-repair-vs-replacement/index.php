<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$currentPage     = 'blog';
$postSlug        = 'roof-repair-vs-replacement';
$pageTitle       = 'Roof Repair vs. Replacement: How to Decide';
$pageDescription = 'When is a roof repair enough and when is replacement the smarter spend? Decision points for Greater Houston homeowners — roof age, extent of damage, storm involvement and the cost math.';
$canonicalUrl    = $siteUrl . '/blog/' . $postSlug . '/';
$ogImage         = 'roof-repair-v2-960.webp';

$faqs = [
    [
        'q' => 'Can a roof with one leak be repaired instead of replaced?',
        'a' => 'Usually, yes — if the roof is otherwise healthy. A single leak with a traceable source, such as failed flashing, a cracked pipe boot or a few wind-lifted shingles, is a repair job. Replacement comes into the conversation when leaks are showing up in several places or the shingles themselves are worn out.',
    ],
    [
        'q' => 'Will a roofer tell me honestly whether I need a repair or a new roof?',
        'a' => 'Ask for photos of everything they flag and a written recommendation, and prefer a contractor who does both repairs and replacements. Triple G Roofing & Construction has done both across the Greater Houston area since 1973, and the owner is on every inspection, so the recommendation comes from the person who will actually do the work.',
    ],
    [
        'q' => 'Does storm damage change the repair-or-replace decision?',
        'a' => 'Often. Storm damage spread across multiple slopes is frequently beyond what a targeted repair can fix, and it may be a matter for your homeowner\'s policy rather than your checkbook. Whether a claim is covered is the carrier\'s decision, but documenting the damage promptly keeps that option open.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Blog", "item": "<?php echo $siteUrl; ?>/blog/" },
        { "@type": "ListItem", "position": 3, "name": "<?php echo htmlspecialchars($pageTitle); ?>", "item": "<?php echo $canonicalUrl; ?>" }
    ]
}
</script>

<!-- BlogPosting Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "<?php echo htmlspecialchars($pageTitle); ?>",
    "description": "<?php echo htmlspecialchars($pageDescription); ?>",
    "image": "<?php echo $siteUrl; ?>/assets/images/roof-repair-v2-960.webp",
    "author": { "@type": "Organization", "@id": "<?php echo $siteUrl; ?>#organization", "name": "<?php echo htmlspecialchars($siteName); ?>" },
    "publisher": { "@type": "Organization", "@id": "<?php echo $siteUrl; ?>#organization", "name": "<?php echo htmlspecialchars($siteName); ?>", "logo": { "@type": "ImageObject", "url": "<?php echo $siteUrl; ?>/assets/images/logo.png" } },
    "datePublished": "2026-08-17",
    "dateModified": "2026-08-20",
    "mainEntityOfPage": "<?php echo $canonicalUrl; ?>",
    "keywords": "roof repair vs replacement, roof leak repair Houston, when to replace a roof, Greater Houston roofer"
}
</script>

<!-- FAQPage Schema — mirrors the visible FAQ below exactly -->
<script type="application/ld+json">
<?php echo generateFAQSchema($faqs); ?>
</script>

<style>
  .post-decide .post-layout { display: grid; grid-template-columns: minmax(0, 1fr) 300px; gap: var(--space-10); align-items: start; }
  .post-decide .post-aside { position: sticky; top: 110px; display: grid; gap: var(--space-6); }
  .post-decide .post-toc { background: var(--color-light); padding: var(--space-6); border-radius: var(--radius-lg); }
  .post-decide .post-toc h2 { font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 0.08em; margin: 0 0 var(--space-3); color: var(--color-primary); }
  .post-decide .post-toc ol { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-2); }
  .post-decide .post-toc li { padding-left: var(--space-4); border-left: 2px solid color-mix(in srgb, var(--color-primary) 30%, transparent); }
  .post-decide .post-toc a { color: var(--color-dark); text-decoration: none; font-size: var(--font-size-sm); line-height: 1.4; }
  .post-decide .post-toc a:hover { color: var(--color-primary); }
  .post-decide .post-cta { background: var(--color-dark); color: var(--color-white); padding: var(--space-6); border-radius: var(--radius-lg); box-shadow: var(--shadow-card); }
  .post-decide .post-cta h3 { color: var(--color-accent); margin-bottom: var(--space-2); }
  .post-decide .post-cta p { color: color-mix(in srgb, var(--color-white) 82%, transparent); font-size: var(--font-size-sm); margin-bottom: var(--space-4); }
  .post-decide .post-cta .btn { width: 100%; justify-content: center; }
  .post-decide .post-cta .post-cta__link { color: var(--color-accent); }
  .post-decide .post-verdict { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); margin: var(--space-6) 0; }
  .post-decide .post-verdict > div { background: var(--color-light); padding: var(--space-6); border-radius: var(--radius-md); border-top: 4px solid var(--color-accent); }
  .post-decide .post-verdict > div:last-child { border-top-color: var(--color-primary); }
  .post-decide .post-verdict h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-3); }
  .post-decide .post-verdict ul { margin: 0; padding-left: var(--space-4); }
  .post-decide .post-figures { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); margin: var(--space-8) 0; }
  .post-decide .post-figures figure { margin: 0; }
  .post-decide .post-figures img { width: 100%; height: auto; border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
  .post-decide .post-figures figcaption { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-2); }
  .post-decide .post-quote { margin: var(--space-8) 0; padding: var(--space-6); background: var(--color-light); border-left: 4px solid var(--color-primary); border-radius: var(--radius-sm); font-style: italic; }
  .post-decide .post-quote cite { display: block; margin-top: var(--space-3); font-style: normal; font-size: var(--font-size-sm); color: var(--color-gray); }
  .post-decide .post-faq { margin-top: var(--space-10); }
  .post-decide .post-faq .faq-grid { grid-template-columns: 1fr; }
  @media (max-width: 900px) {
    .post-decide .post-layout { grid-template-columns: 1fr; }
    .post-decide .post-aside { position: static; }
    .post-decide .post-verdict, .post-decide .post-figures { grid-template-columns: 1fr; }
  }
</style>

<div class="page-body" class="post-decide">
    <article class="blog-post">
        <header class="blog-post__header">
            <div class="container-narrow">
                <span class="blog-post__category">Roofing 101</span>
                <h1>Roof Repair vs. Replacement: <span class="text-accent">How to Decide</span></h1>
                <div class="blog-post__meta">
                    <time datetime="2026-08-17">August 17, 2026</time>
                    <span>•</span>
                    <span>6 min read</span>
                </div>
            </div>
        </header>

        <div class="blog-post__featured-image">
            <img src="/assets/images/roof-repair-v2-960.webp"
                 srcset="/assets/images/roof-repair-v2-480.webp 480w,
                         /assets/images/roof-repair-v2-960.webp 960w"
                 sizes="(max-width: 768px) 100vw, (max-width: 1200px) 90vw, 1200px"
                 alt="New step flashing sealed against a brick chimney during a roof repair"
                 width="1200" height="1600" loading="eager" fetchpriority="high">
        </div>

        <div class="blog-post__content">
            <div class="container post-layout">
                <div class="post-main">
                    <div class="answer-block">
                        <p class="lead"><strong>Repair the roof when the damage is isolated — one leak, a few missing shingles, failed flashing — and the roof is still young for our climate. Replace it when damage is widespread, the shingles are near the end of their life, or repair bills keep stacking up year after year.</strong> The honest answer almost always comes down to age plus extent of damage, and a free inspection settles it.</p>
                    </div>

                    <p>Triple G Roofing &amp; Construction has repaired and replaced roofs across the Greater Houston area since 1973 — Atascocita, Conroe, Deer Park, Bellaire and dozens of communities between. Because we do both, we have no reason to steer you toward the more expensive option.</p>

                    <h2 id="when-repair">When is a repair the right call?</h2>
                    <p>A targeted repair makes sense when the problem is local and the rest of the roof is healthy. The repair-scope problems we see most often on Gulf Coast homes: wind-lifted or missing shingles after a storm, flashing failures around chimneys and walls, cracked pipe boots, a nail-pop or two, and isolated leaks with a traceable source. Handled promptly through our <a href="/services/roof-repair/">roof repair service</a>, these stay small. Left alone through a wet Houston winter, they rot decking and become a much bigger conversation.</p>

                    <blockquote class="post-quote">
                        &ldquo;I used Triple G Roofing for a leak that no other roofer could fix. I paid 2 roofing companies for repairs that did not fix my leak. Tim found the problem right away and fixed it. It was bizarre because the issue was far away from where it leaked. He also noticed we had a couple other issues that he corrected before we had a leak.&rdquo;
                        <cite>— Virginia, Atascocita, TX</cite>
                    </blockquote>

                    <h2 id="when-replace">When does replacement become the smarter spend?</h2>
                    <p>Replacement wins when repairs stop being isolated. The warning signs: shingles curling or shedding granules across whole slopes, repairs in multiple areas within a couple of years, decking that feels spongy underfoot, or a roof that has simply reached the end of its realistic Gulf Coast life — which, as we explain in <a href="/blog/how-long-does-roof-last-texas/">how long roofs actually last in Texas heat</a>, is shorter than the packaging suggests.</p>

                    <div class="post-verdict">
                        <div>
                            <h3>Usually a repair</h3>
                            <ul>
                                <li>One leak, younger roof</li>
                                <li>A few wind-lifted shingles</li>
                                <li>Failed flashing or pipe boot</li>
                                <li>Rest of the roof looks healthy</li>
                            </ul>
                        </div>
                        <div>
                            <h3>Usually a replacement</h3>
                            <ul>
                                <li>Storm damage across multiple slopes — likely an <a href="/blog/storm-damage-roof-insurance-claim-texas/">insurance conversation</a></li>
                                <li>Third repair in three years</li>
                                <li>Granule loss and curling everywhere</li>
                                <li>Soft decking, daylight in the attic</li>
                            </ul>
                        </div>
                    </div>

                    <h2 id="cost-math">How should the cost math work?</h2>
                    <p>A useful rule of thumb: if a single repair would cost a large fraction of a replacement, or cumulative repairs would cross that line within a couple of years, replacement usually wins. Age matters too — money spent patching a roof that is already at the end of its life is money you'll spend again soon. And if storm damage is in the picture, the math may change entirely: that becomes a question for your homeowner's policy, and while coverage is always the carrier's decision, documenting damage promptly keeps the option open. Our <a href="/blog/roof-replacement-cost-houston-tx/">Houston-area replacement cost guide</a> explains what drives a quote so you can compare apples to apples.</p>

                    <h2 id="get-answer">How do you get a straight answer?</h2>
                    <p>Get an inspection from a contractor who does both repairs and replacements, ask for photos of everything they flag, and ask for the recommendation in writing. Our <a href="/services/roof-inspection/">inspections are free</a> anywhere in the Greater Houston area, documented with photos, and come with a written estimate for whichever the roof actually needs — a repair scope or a <a href="/services/roof-replacement/">replacement</a>. The owner is on every job, so the person who looks at your roof is the person who stands behind the work. Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>.</p>

                    <section class="post-faq" aria-labelledby="faq-heading">
                        <h2 id="faq-heading">Repair or replace FAQ</h2>
                        <div class="faq-grid">
                            <?php foreach ($faqs as $faq): ?>
                            <div class="faq-item">
                                <h3><?php echo htmlspecialchars($faq['q']); ?></h3>
                                <p><?php echo htmlspecialchars($faq['a']); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                </div>

                <aside class="post-aside">
                    <nav class="post-toc" aria-label="On this page">
                        <h2>On this page</h2>
                        <ol>
                            <li><a href="#when-repair">When a repair is the right call</a></li>
                            <li><a href="#when-replace">When replacement is smarter</a></li>
                            <li><a href="#cost-math">How the cost math works</a></li>
                            <li><a href="#get-answer">Getting a straight answer</a></li>
                            <li><a href="#faq-heading">FAQ</a></li>
                        </ol>
                    </nav>
                    <div class="post-cta">
                        <h3>Not sure which you need?</h3>
                        <p>Free inspection, photos of what we find, and a written estimate — repair or replacement, whichever the roof actually needs.</p>
                        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo $phone; ?></a>
                        <p style="margin: var(--space-4) 0 0;"><a class="post-cta__link" href="/contact/">Request an inspection online →</a></p>
                    </div>
                </aside>
            </div>
        </div>

        <!-- Related Services -->
        <section class="blog-post__related-services">
            <div class="container-narrow">
                <h2>Related Services</h2>
                <div class="service-links">
                    <a href="/services/roof-repair/" class="service-link-card">
                        <h3>Roof Repair</h3>
                        <p>Leak, shingle, flashing and pipe-boot repairs that stop damage before it spreads.</p>
                    </a>
                    <a href="/services/roof-replacement/" class="service-link-card">
                        <h3>Roof Replacement</h3>
                        <p>Architectural shingle and metal replacements — tear-off, decking repair, underlayment, clean-up.</p>
                    </a>
                    <a href="/services/roof-inspection/" class="service-link-card">
                        <h3>Roof Inspection</h3>
                        <p>Free photo-documented inspections with an honest repair-or-replace recommendation.</p>
                    </a>
                </div>
            </div>
        </section>

        <!-- Related Articles -->
        <section class="blog-post__related-articles">
            <div class="container">
                <h2>Related Articles</h2>
                <div class="blog-grid" data-p1-dynamic>
                    <?php
                    $related = array_filter($blogPosts, fn($p) => $p['slug'] !== $postSlug);
                    usort($related, fn($a, $b) => ($b['category'] === 'Roofing 101') <=> ($a['category'] === 'Roofing 101'));
                    foreach (array_slice($related, 0, 3) as $post): ?>
                    <a href="/blog/<?php echo $post['slug']; ?>/" class="blog-card">
                        <div class="blog-card__image">
                            <img src="<?php echo $post['image']; ?>" alt="<?php echo htmlspecialchars($post['alt']); ?>" width="960" height="600" loading="lazy">
                        </div>
                        <div class="blog-card__body">
                            <span class="blog-card__category"><?php echo htmlspecialchars($post['category']); ?></span>
                            <h3 class="blog-card__title"><?php echo htmlspecialchars($post['title']); ?></h3>
                            <div class="blog-card__meta"><time datetime="<?php echo $post['dateISO']; ?>"><?php echo $post['date']; ?></time><span>•</span><span><?php echo $post['readtime']; ?></span></div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </article>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
