<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$currentPage     = 'blog';
$postSlug        = 'hail-damage-roof-inspection-guide';
$pageTitle       = 'How to Spot Hail Damage on a Houston-Area Roof';
$pageDescription = 'The signs of hail damage Greater Houston homeowners miss from the ground, why prompt documentation matters if you file a claim, and what a free professional roof inspection covers.';
$canonicalUrl    = $siteUrl . '/blog/' . $postSlug . '/';
$ogImage         = 'roof-inspection-v2-960.webp';

$faqs = [
    [
        'q' => 'Can I see hail damage from the ground?',
        'a' => 'Sometimes, but not reliably. Dented gutters, downspouts, vents and AC fins are visible from the yard and are a strong hint the shingles took hits too. Bruised shingles with loose granules are usually only visible up close on the roof, which is why a professional inspection is the dependable answer.',
    ],
    [
        'q' => 'How soon after a hailstorm should I get my roof inspected?',
        'a' => 'Promptly — within days rather than months. Homeowner policies require prompt notice of damage and many set a filing deadline, and fresh damage is easier to distinguish from ordinary wear. A free inspection costs nothing, and if there is no damage you simply have a documented clean bill of health.',
    ],
    [
        'q' => 'Does hail damage always mean an insurance claim?',
        'a' => 'No. Whether damage is covered, and whether it is worth a claim against your deductible, depends on your policy and the carrier\'s decision. Triple G Roofing & Construction documents what we find and explains your options so you can decide; coverage itself is always up to your insurer.',
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
    "image": "<?php echo $siteUrl; ?>/assets/images/roof-inspection-v2-960.webp",
    "author": { "@type": "Organization", "@id": "<?php echo $siteUrl; ?>#organization", "name": "<?php echo htmlspecialchars($siteName); ?>" },
    "publisher": { "@type": "Organization", "@id": "<?php echo $siteUrl; ?>#organization", "name": "<?php echo htmlspecialchars($siteName); ?>", "logo": { "@type": "ImageObject", "url": "<?php echo $siteUrl; ?>/assets/images/logo.png" } },
    "datePublished": "2026-08-15",
    "dateModified": "2026-08-20",
    "mainEntityOfPage": "<?php echo $canonicalUrl; ?>",
    "keywords": "hail damage roof, hail damage inspection Houston, storm damage roof, free roof inspection, Gulf Coast hail"
}
</script>

<!-- FAQPage Schema — mirrors the visible FAQ below exactly -->
<script type="application/ld+json">
<?php echo generateFAQSchema($faqs); ?>
</script>

<style>
  .post-hail .post-layout { display: grid; grid-template-columns: minmax(0, 1fr) 300px; gap: var(--space-10); align-items: start; }
  .post-hail .post-aside { position: sticky; top: 110px; display: grid; gap: var(--space-6); }
  .post-hail .post-toc { background: var(--color-light); border-left: 4px solid var(--color-accent); padding: var(--space-6); border-radius: var(--radius-sm); }
  .post-hail .post-toc h2 { font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 0.08em; margin: 0 0 var(--space-3); color: var(--color-gray); }
  .post-hail .post-toc ol { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-2); }
  .post-hail .post-toc a { color: var(--color-dark); text-decoration: none; font-size: var(--font-size-sm); line-height: 1.4; }
  .post-hail .post-toc a:hover { color: var(--color-primary); }
  .post-hail .post-cta { background: var(--color-dark); color: var(--color-white); padding: var(--space-6); border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
  .post-hail .post-cta h3 { color: var(--color-white); margin-bottom: var(--space-2); }
  .post-hail .post-cta p { color: color-mix(in srgb, var(--color-white) 82%, transparent); font-size: var(--font-size-sm); margin-bottom: var(--space-4); }
  .post-hail .post-cta .btn { width: 100%; justify-content: center; }
  .post-hail .post-cta .post-cta__link { color: var(--color-accent); }
  .post-hail .post-figures { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); margin: var(--space-8) 0; }
  .post-hail .post-figures figure { margin: 0; }
  .post-hail .post-figures img { width: 100%; height: auto; border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
  .post-hail .post-figures figcaption { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-2); }
  .post-hail .post-quote { margin: var(--space-8) 0; padding: var(--space-6); background: var(--color-light); border-left: 4px solid var(--color-primary); border-radius: var(--radius-sm); font-style: italic; }
  .post-hail .post-quote cite { display: block; margin-top: var(--space-3); font-style: normal; font-size: var(--font-size-sm); color: var(--color-gray); }
  .post-hail .post-faq { margin-top: var(--space-10); }
  .post-hail .post-faq .faq-grid { grid-template-columns: 1fr; }
  @media (max-width: 900px) {
    .post-hail .post-layout { grid-template-columns: 1fr; }
    .post-hail .post-aside { position: static; }
    .post-hail .post-figures { grid-template-columns: 1fr; }
  }
</style>

<div class="page-body" class="post-hail">
    <article class="blog-post">
        <header class="blog-post__header">
            <div class="container-narrow">
                <span class="blog-post__category">Storm Damage</span>
                <h1>How to Spot Hail Damage on a <span class="text-accent">Houston-Area Roof</span></h1>
                <div class="blog-post__meta">
                    <time datetime="2026-08-15">August 15, 2026</time>
                    <span>•</span>
                    <span>6 min read</span>
                </div>
            </div>
        </header>

        <div class="blog-post__featured-image">
            <img src="/assets/images/roof-inspection-v2-960.webp"
                 srcset="/assets/images/roof-inspection-v2-480.webp 480w,
                         /assets/images/roof-inspection-v2-960.webp 960w"
                 sizes="(max-width: 768px) 100vw, (max-width: 1200px) 90vw, 1200px"
                 alt="Close-up of cracked and lifted shingles found during a roof inspection"
                 width="1200" height="1600" loading="eager" fetchpriority="high">
        </div>

        <div class="blog-post__content">
            <div class="container post-layout">
                <div class="post-main">
                    <div class="answer-block">
                        <p class="lead"><strong>Hail damage on asphalt shingles shows up as round or irregular bruises with loose granules, dark spots where the fiberglass mat is exposed, and cracked or split shingles — often alongside dented gutters, vents and soft metals.</strong> Most Greater Houston homeowners miss it because it rarely shows from the ground, especially on darker shingles. A prompt, photo-documented inspection gives you a clear answer and a dated record if you decide to file a claim.</p>
                    </div>

                    <p>Triple G Roofing &amp; Construction has inspected hail-hit roofs across the Greater Houston area — from Baytown and Crosby up through Kingwood, Spring and Conroe — since 1973. The patterns below are what we look for on every storm inspection.</p>

                    <h2 id="visible-signs">What does hail damage look like on a roof?</h2>
                    <p>Up close, hail leaves a fairly distinctive signature on asphalt shingles:</p>
                    <ul>
                        <li><strong>Bruises and dents</strong> — round or irregular impact marks, sometimes soft to the touch where the mat underneath has been fractured</li>
                        <li><strong>Concentrated granule loss</strong> — bare, dark spots where granules were knocked free, as opposed to the even thinning of an old roof</li>
                        <li><strong>Cracked or split shingles</strong> — especially on brittle, older shingles that have already baked through a few Texas summers</li>
                        <li><strong>Random pattern, one direction</strong> — hail damage is scattered rather than uniform, and usually heavier on the slopes that faced the storm</li>
                        <li><strong>Damaged accessories</strong> — dented box vents, pipe boots, ridge caps and flashing take hits right alongside the shingles</li>
                    </ul>
                    <p>Not every mark is hail. Blistering, scuffing from foot traffic and plain old age can look similar to an untrained eye, which is one reason carriers send their own adjuster — and one reason a roofer who knows the difference is worth having on the roof first.</p>

                    <h2 id="ground-check">What can you check safely from the ground?</h2>
                    <p>You don't need to climb anything to gather useful evidence. Walk the property after the storm and look at the &ldquo;soft metals&rdquo;: gutters and downspouts, window screens, the fins on your AC condenser, mailbox, grill lids and patio furniture. Dents there mean the hail was big enough to matter. Check the yard and driveway for granule piles below the downspouts, and look at fences, siding and any patio cover or pergola for fresh impact marks. Photograph all of it with your phone the day of the storm — the timestamps are useful later.</p>
                    <p>If you find those signs, stop there and call for an inspection. Walking a roof after a storm is genuinely dangerous, and stepping on bruised shingles can turn a small problem into a bigger one.</p>

                    <h2 id="timing">Why does prompt documentation matter?</h2>
                    <p>Two reasons. First, fresh hail damage is easy to tell from ordinary wear; a year later the distinction blurs, and an adjuster can reasonably argue the roof simply aged. Second, homeowner policies in Texas require prompt notice of a loss, and many set a hard deadline for filing — read your policy or ask your agent for the specific language. Waiting months is one of the most common reasons a claim gets a harder look.</p>
                    <p>To be clear: an inspection doesn't obligate you to file anything, and finding damage doesn't guarantee a claim will be approved — that decision always belongs to your carrier. What documentation does is put you in the strongest position to make a good decision. Our <a href="/blog/storm-damage-roof-insurance-claim-texas/">Texas storm damage claim guide</a> walks through the rest of the process step by step.</p>

                    <h2 id="inspection">What does a professional hail inspection include?</h2>
                    <p>A <a href="/services/roof-inspection/">free Triple G roof inspection</a> after a hailstorm covers:</p>
                    <ul>
                        <li>Every slope, valley and ridge walked on foot — not a drone-only glance</li>
                        <li>Flashing, pipe boots, box vents and skylight seals checked for impact damage</li>
                        <li>Gutters, downspouts, fascia and soffit looked over for dents and loosened hangers</li>
                        <li>Photos of everything we flag, so you see what we see</li>
                        <li>A plain-English explanation of whether what we found is storm damage, wear, or nothing to worry about</li>
                    </ul>
                    <p>There is no charge and no obligation. If the roof is fine, you'll know. If it isn't, you'll have a written, photo-documented record and a free estimate for the <a href="/services/storm-damage-repair/">storm damage repair</a>.</p>

                    <blockquote class="post-quote">
                        &ldquo;I used Triple G Roofing because I remember seeing signs of their business in yards throughout the neighborhood shortly after a hail storm came through. I'm sure glad I did. Tim was outstanding and took the time to keep me posted throughout the process.&rdquo;
                        <cite>— Keith, Baytown, TX</cite>
                    </blockquote>

                    <h2 id="next-steps">What happens if damage is confirmed?</h2>
                    <ol>
                        <li><strong>Decide whether to file.</strong> Compare the likely repair scope against your deductible. Isolated damage on a young roof may be a simple out-of-pocket repair — see <a href="/blog/roof-repair-vs-replacement/">repair vs. replacement</a> for how we think about that line.</li>
                        <li><strong>Report the claim promptly</strong> and keep your claim number handy.</li>
                        <li><strong>Have your roofer meet the adjuster.</strong> With more than 50 years of claims-handling and adjuster experience, we walk the roof with the adjuster so the same damage gets looked at from both sides.</li>
                        <li><strong>Schedule the work</strong> once you know where the claim stands — and if a storm has shortened an already-aging roof's life, <a href="/blog/how-long-does-roof-last-texas/">how long roofs last in Texas heat</a> explains what to expect.</li>
                    </ol>
                    <p>Wherever you are in the Greater Houston area — Pasadena, Cypress, Atascocita, Dayton or anywhere between — call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> after a hailstorm and we'll come take a look.</p>

                    <section class="post-faq" aria-labelledby="faq-heading">
                        <h2 id="faq-heading">Hail damage FAQ</h2>
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
                            <li><a href="#visible-signs">What hail damage looks like</a></li>
                            <li><a href="#ground-check">What to check from the ground</a></li>
                            <li><a href="#timing">Why prompt documentation matters</a></li>
                            <li><a href="#inspection">What a professional inspection includes</a></li>
                            <li><a href="#next-steps">If damage is confirmed</a></li>
                            <li><a href="#faq-heading">FAQ</a></li>
                        </ol>
                    </nav>
                    <div class="post-cta">
                        <h3>Free storm inspection</h3>
                        <p>Family owned since 1973. The owner is on every job, and every inspection comes with photos and a free written estimate.</p>
                        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo $phone; ?></a>
                        <p style="margin: var(--space-4) 0 0;"><a class="post-cta__link" href="/contact/">Or request an inspection online →</a></p>
                    </div>
                </aside>
            </div>
        </div>

        <!-- Related Services -->
        <section class="blog-post__related-services">
            <div class="container-narrow">
                <h2>Related Services</h2>
                <div class="service-links">
                    <a href="/services/roof-inspection/" class="service-link-card">
                        <h3>Roof Inspection</h3>
                        <p>Free, photo-documented storm inspections across the Greater Houston area.</p>
                    </a>
                    <a href="/services/storm-damage-repair/" class="service-link-card">
                        <h3>Storm &amp; Wind Damage Repair</h3>
                        <p>Hail, wind and hurricane repairs, with help through the claims process from start to finish.</p>
                    </a>
                    <a href="/services/gutter-installation/" class="service-link-card">
                        <h3>Gutter Installation</h3>
                        <p>Hail-dented gutters replaced so water keeps moving away from your foundation.</p>
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
                    usort($related, fn($a, $b) => ($b['category'] === 'Storm Damage') <=> ($a['category'] === 'Storm Damage'));
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
