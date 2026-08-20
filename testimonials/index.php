<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Customer Reviews — Triple G Roofing & Construction
   Every review below is rendered from includes/testimonials-data.php
   (the client's own published reviews — never invented, never edited).
   No Review or star-rating schema of any kind: BreadcrumbList only (v6.2 rule).
   ============================================================ */

$currentPage     = 'about';
$reviewCount     = count($testimonials);
$pageTitle       = 'Customer Reviews — ' . $siteName;
$pageDescription = $reviewCount . ' reviews from Greater Houston homeowners about Triple G Roofing & Construction, a family-owned father-and-son roofing team based in Humble, TX since 1973.';
$canonicalUrl    = $siteUrl . '/testimonials/';
$ogImage         = 'owner-father-v2-960.webp';

/* slug → display name for the service tags + filter pills */
$serviceNames = array_column($services, 'name', 'slug');

/* which services actually have reviews (drives the filter pills) */
$taggedServices = [];
foreach ($testimonials as $t) {
    $slug = $t['service'];
    if (!isset($taggedServices[$slug])) {
        $taggedServices[$slug] = 0;
    }
    $taggedServices[$slug]++;
}

/* Nextdoor badges — real award artwork (manifest: kind = badge, no webp variants) */
$badges = [
    ['file' => 'nextdoor-2022.png', 'w' => 391, 'h' => 600, 'alt' => 'Nextdoor Neighborhood Favorite 2022 award badge', 'year' => '2022'],
    ['file' => 'nextdoor-2023.png', 'w' => 390, 'h' => 600, 'alt' => 'Nextdoor Neighborhood Faves 2023 award badge', 'year' => '2023'],
    ['file' => 'nextdoor-2024.png', 'w' => 338, 'h' => 600, 'alt' => 'Nextdoor Neighborhood Faves 2024 winner badge', 'year' => '2024'],
];

/* --- Schema: WebPage + BreadcrumbList ONLY --- */
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type'       => 'WebPage',
            '@id'         => $canonicalUrl . '#webpage',
            'url'         => $canonicalUrl,
            'name'        => $pageTitle,
            'description' => $pageDescription,
            'isPartOf'    => ['@id' => $siteUrl . '/#website'],
            'about'       => ['@id' => $siteUrl . '#organization'],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About',   'item' => $siteUrl . '/about/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Reviews', 'item' => $canonicalUrl],
            ],
        ],
    ],
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   /testimonials/ — page-specific styles (tokens only)
   ============================================================ */

/* ---------- Reveal directions (page-level, none above the fold) ---------- */
[data-animate="fade-left"] {
    transform: translateX(-40px);
}
[data-animate="fade-right"] {
    transform: translateX(40px);
}
[data-animate="zoom"] {
    transform: scale(0.94);
}
[data-animate="fade-left"].animated,
[data-animate="fade-right"].animated {
    transform: translateX(0);
}
[data-animate="zoom"].animated {
    transform: scale(1);
}

/* ---------- Hero (layered: gradient overlay + noise texture) ---------- */
.rv-hero {
    position: relative;
    overflow: hidden;
    isolation: isolate;
    padding-bottom: var(--space-16);
}
.rv-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        radial-gradient(ellipse at 12% 18%, rgba(var(--color-primary-rgb), 0.28), transparent 48%),
        radial-gradient(ellipse at 88% 82%, rgba(var(--color-accent-rgb), 0.18), transparent 52%),
        linear-gradient(135deg, var(--color-secondary) 0%, var(--color-dark-alt) 100%);
}
.rv-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.35;
    background-image:
        repeating-radial-gradient(circle at 0 0, transparent 0, rgba(var(--color-secondary-rgb), 0.9) 2px, transparent 3px),
        repeating-linear-gradient(45deg, rgba(var(--color-accent-rgb), 0.05) 0, rgba(var(--color-accent-rgb), 0.05) 1px, transparent 1px, transparent 6px);
    mix-blend-mode: soft-light;
    pointer-events: none;
}
.rv-hero .hero__content {
    max-width: 860px;
}
.rv-hero h1 {
    text-wrap: balance;
    font-size: clamp(var(--font-size-4xl), 5vw, var(--font-size-6xl));
    line-height: 1.05;
}
.rv-hero__intro {
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    font-size: var(--font-size-lg);
    line-height: 1.7;
    max-width: 62ch;
    margin: var(--space-5) auto 0;
    text-wrap: pretty;
}
.rv-hero__intro strong {
    color: var(--color-white);
    font-weight: 600;
}
.rv-hero__actions {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    justify-content: center;
    margin-top: var(--space-8);
}
.rv-hero__actions .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
}

/* Badge strip */
.rv-badges {
    margin-top: var(--space-12);
    padding-top: var(--space-8);
    border-top: 1px solid color-mix(in srgb, var(--color-white) 15%, transparent);
}
.rv-badges__label {
    display: block;
    text-align: center;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}
.rv-badges__row {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    gap: var(--space-8);
    flex-wrap: wrap;
}
.rv-badge {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-3);
    text-align: center;
}
.rv-badge img {
    height: 150px;
    width: auto;
    display: block;
    filter: drop-shadow(var(--shadow-lg));
    transition: transform var(--transition-base);
}
.rv-badge:hover img {
    transform: translateY(-4px) rotate(-1deg);
}
.rv-badge span {
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: color-mix(in srgb, var(--color-white) 80%, transparent);
}

/* ---------- Divider 1: angled slice between hero and ribbon ---------- */
.rv-divider-angle {
    position: relative;
    height: var(--space-16);
    background: var(--color-secondary);
    margin-top: calc(-1 * var(--space-16));
    clip-path: polygon(0 0, 100% 0, 100% 35%, 0 100%);
    z-index: 1;
}

/* ---------- Facts ribbon (real numbers only) ---------- */
.rv-ribbon {
    background: var(--color-white);
    padding: var(--space-10) 0 var(--space-12);
}
.rv-ribbon__grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-6);
}
.rv-fact {
    position: relative;
    padding: var(--space-5) var(--space-6);
    border-left: 3px solid var(--color-accent);
    background: linear-gradient(90deg, rgba(var(--color-accent-rgb), 0.08), transparent 70%);
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
}
.rv-fact__value {
    display: block;
    font-family: var(--font-heading);
    font-size: var(--font-size-3xl);
    font-weight: 700;
    color: var(--color-secondary);
    line-height: 1.1;
}
.rv-fact__label {
    display: block;
    margin-top: var(--space-2);
    font-size: var(--font-size-sm);
    color: var(--color-gray);
    text-wrap: balance;
}

/* ---------- Reviews section (signature: masonry wall with oversized quote marks) ---------- */
.rv-wall {
    background: var(--color-light);
    padding: var(--space-16) 0;
    position: relative;
}
.rv-wall__head {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: var(--space-10);
    align-items: end;
    margin-bottom: var(--space-10);
}
.rv-wall__head h2 {
    text-wrap: balance;
    font-size: clamp(var(--font-size-3xl), 4vw, var(--font-size-5xl));
    line-height: 1.1;
}
.rv-wall__head p {
    color: var(--color-gray-dark);
    max-width: 52ch;
    line-height: 1.7;
}
.rv-wall__count {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-primary);
}

/* Filter pills */
.rv-filter {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    margin-bottom: var(--space-10);
    padding-bottom: var(--space-6);
    border-bottom: 1px dashed var(--color-gray-light);
}
.rv-filter__pill {
    appearance: none;
    font: inherit;
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-gray-dark);
    background: var(--color-white);
    border: 1.5px solid var(--color-gray-light);
    border-radius: var(--radius-full);
    padding: var(--space-2) var(--space-4);
    cursor: pointer;
    transition: background var(--transition-fast), color var(--transition-fast), border-color var(--transition-fast), transform var(--transition-fast);
}
.rv-filter__pill small {
    font-weight: 500;
    color: var(--color-gray);
    margin-left: var(--space-1);
}
.rv-filter__pill:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    transform: translateY(-1px);
}
.rv-filter__pill.is-active {
    background: var(--color-secondary);
    color: var(--color-white);
    border-color: var(--color-secondary);
}
.rv-filter__pill.is-active small {
    color: var(--color-accent);
}
.rv-filter__pill:focus-visible {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
}

/* Masonry wall via CSS columns */
.rv-grid {
    column-count: 3;
    column-gap: var(--space-6);
}
.rv-card {
    position: relative;
    display: inline-block;
    width: 100%;
    break-inside: avoid;
    margin: 0 0 var(--space-6);
    padding: var(--space-8) var(--space-6) var(--space-6);
    background: var(--color-white);
    border: 1px solid var(--color-gray-light);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-sm);
    transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
}
.rv-card[hidden] {
    display: none;
}
.rv-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-card);
    border-color: rgba(var(--color-accent-rgb), 0.6);
}
.rv-card::before {
    content: "\201C";
    position: absolute;
    top: var(--space-1);
    left: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: rgba(var(--color-primary-rgb), 0.18);
    pointer-events: none;
}
.rv-card:nth-child(4n+2) {
    background: linear-gradient(180deg, rgba(var(--color-accent-rgb), 0.10), var(--color-white) 60%);
}
.rv-card:nth-child(4n+3) {
    background: linear-gradient(180deg, rgba(var(--color-primary-rgb), 0.07), var(--color-white) 60%);
}
.rv-card:nth-child(4n+4) {
    background: linear-gradient(180deg, rgba(var(--color-secondary-rgb), 0.06), var(--color-white) 60%);
}
.rv-card:nth-child(7n+1) .rv-card__text {
    font-size: var(--font-size-lg);
}
.rv-card__text {
    position: relative;
    margin: 0 0 var(--space-5);
    color: var(--color-gray-dark);
    line-height: 1.75;
    font-size: var(--font-size-base);
    text-wrap: pretty;
}
.rv-card__foot {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-3);
    padding-top: var(--space-4);
    border-top: 1px solid var(--color-gray-light);
}
.rv-card__who {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}
.rv-card__avatar {
    display: inline-grid;
    place-items: center;
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    background: var(--color-secondary);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: var(--font-size-base);
    flex-shrink: 0;
}
.rv-card:nth-child(3n) .rv-card__avatar {
    background: var(--color-primary);
    color: var(--color-white);
}
.rv-card:nth-child(3n+1) .rv-card__avatar {
    background: var(--color-accent);
    color: var(--color-secondary);
}
.rv-card__name {
    display: block;
    font-family: var(--font-heading);
    font-weight: 700;
    color: var(--color-secondary);
    font-size: var(--font-size-sm);
    line-height: 1.2;
}
.rv-card__city {
    display: block;
    font-size: var(--font-size-xs);
    color: var(--color-gray);
    margin-top: var(--space-1);
}
.rv-tag {
    display: inline-flex;
    align-items: center;
    gap: var(--space-1);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 600;
    letter-spacing: 0.3px;
    color: var(--color-primary);
    background: rgba(var(--color-primary-rgb), 0.08);
    border-radius: var(--radius-full);
    padding: var(--space-1) var(--space-3);
    text-decoration: none;
    transition: background var(--transition-fast), color var(--transition-fast);
}
.rv-tag:hover,
.rv-tag:focus-visible {
    background: var(--color-primary);
    color: var(--color-white);
}
.rv-tag:focus-visible {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
}
.rv-empty {
    display: none;
    text-align: center;
    color: var(--color-gray);
    padding: var(--space-10) 0;
}

/* ---------- Divider 2: curved notch between wall and split ---------- */
.rv-divider-curve {
    position: relative;
    height: var(--space-16);
    background: var(--color-light);
    overflow: hidden;
}
.rv-divider-curve::after {
    content: "";
    position: absolute;
    left: -10%;
    right: -10%;
    bottom: 0;
    height: 200%;
    border-radius: 50% 50% 0 0 / 100% 100% 0 0;
    background: var(--color-white);
}

/* ---------- Split: why the reviews sound alike ---------- */
.rv-why {
    background: var(--color-white);
    padding: var(--space-12) 0 var(--space-16);
}
.rv-why__grid {
    display: grid;
    grid-template-columns: 1fr 1.15fr;
    gap: var(--space-12);
    align-items: center;
}
.rv-why__media {
    position: relative;
}
.rv-why__media::before {
    content: "";
    position: absolute;
    inset: var(--space-5) calc(-1 * var(--space-5)) calc(-1 * var(--space-5)) var(--space-5);
    border: 2px solid var(--color-accent);
    border-radius: var(--radius-xl);
    z-index: 0;
}
.rv-why__media img {
    position: relative;
    z-index: 1;
    width: 100%;
    height: auto;
    aspect-ratio: 3 / 4;
    object-fit: cover;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    display: block;
}
.rv-why__caption {
    position: absolute;
    z-index: 2;
    left: var(--space-5);
    bottom: var(--space-5);
    background: var(--color-secondary);
    color: var(--color-white);
    padding: var(--space-3) var(--space-5);
    border-radius: var(--radius-md);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    box-shadow: var(--shadow-md);
}
.rv-why__caption em {
    color: var(--color-accent);
    font-style: normal;
    font-family: var(--font-accent);
    font-size: var(--font-size-lg);
    display: block;
}
.rv-why h2 {
    text-wrap: balance;
    font-size: clamp(var(--font-size-3xl), 3.6vw, var(--font-size-5xl));
    line-height: 1.1;
    margin-bottom: var(--space-5);
}
.rv-why__lead {
    color: var(--color-gray-dark);
    font-size: var(--font-size-lg);
    line-height: 1.7;
    max-width: 58ch;
    margin-bottom: var(--space-8);
}
.rv-habits {
    list-style: none;
    margin: 0 0 var(--space-8);
    padding: 0;
    display: grid;
    gap: var(--space-4);
}
.rv-habits li {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-light);
    border-left: 3px solid var(--color-primary);
}
.rv-habits li:nth-child(even) {
    border-left-color: var(--color-accent);
}
.rv-habits__icon {
    display: grid;
    place-items: center;
    width: 40px;
    height: 40px;
    border-radius: var(--radius-md);
    background: var(--color-white);
    color: var(--color-primary);
    box-shadow: var(--shadow-sm);
}
.rv-habits strong {
    display: block;
    font-family: var(--font-heading);
    color: var(--color-secondary);
    margin-bottom: var(--space-1);
}
.rv-habits p {
    margin: 0;
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    line-height: 1.6;
}
.rv-habits cite {
    font-style: italic;
    color: var(--color-gray);
}
.rv-why__actions {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
}
.rv-why__actions .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
}

/* ---------- Divider 3: dotted rule ---------- */
.rv-divider-dots {
    height: 1px;
    background-image: radial-gradient(circle, var(--color-accent) 1px, transparent 1.5px);
    background-size: 12px 1px;
    background-repeat: repeat-x;
    max-width: 1200px;
    margin: 0 auto;
}

/* ---------- Leave-a-review band ---------- */
.rv-leave {
    padding: var(--space-16) 0;
    background:
        linear-gradient(120deg, rgba(var(--color-accent-rgb), 0.14), transparent 55%),
        var(--color-white);
}
.rv-leave__card {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: var(--space-8);
    align-items: center;
    padding: var(--space-10);
    border-radius: var(--radius-xl);
    background: var(--color-secondary);
    color: var(--color-white);
    box-shadow: var(--shadow-xl);
    position: relative;
    overflow: hidden;
}
.rv-leave__card::after {
    content: "";
    position: absolute;
    right: -10%;
    top: -40%;
    width: 50%;
    aspect-ratio: 1;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, rgba(var(--color-primary-rgb), 0.35), transparent 65%);
    pointer-events: none;
}
.rv-leave__card h2 {
    color: var(--color-white);
    text-wrap: balance;
    font-size: clamp(var(--font-size-2xl), 3vw, var(--font-size-4xl));
    margin-bottom: var(--space-3);
}
.rv-leave__card p {
    color: color-mix(in srgb, var(--color-white) 80%, transparent);
    max-width: 58ch;
    line-height: 1.7;
    margin: 0;
}
.rv-leave__actions {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    position: relative;
    z-index: 1;
}
.rv-leave__actions .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    white-space: nowrap;
}
.rv-leave__actions .btn-outline-white:hover {
    background: var(--color-white);
    color: var(--color-secondary);
}

/* ---------- Final CTA banner ---------- */
.rv-cta h2 {
    text-wrap: balance;
}
.rv-cta .cta-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    justify-content: center;
}
.rv-cta .cta-buttons .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .rv-grid {
        column-count: 2;
    }
    .rv-ribbon__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 900px) {
    .rv-wall__head {
        grid-template-columns: 1fr;
        gap: var(--space-4);
    }
    .rv-why__grid {
        grid-template-columns: 1fr;
        gap: var(--space-10);
    }
    .rv-why__media {
        max-width: 480px;
        margin: 0 auto;
    }
    .rv-leave__card {
        grid-template-columns: 1fr;
        padding: var(--space-8);
    }
    .rv-leave__actions {
        flex-direction: row;
        flex-wrap: wrap;
    }
}
@media (max-width: 640px) {
    .rv-grid {
        column-count: 1;
    }
    .rv-ribbon__grid {
        grid-template-columns: 1fr;
    }
    .rv-badge img {
        height: 110px;
    }
    .rv-badges__row {
        gap: var(--space-5);
    }
    .rv-card {
        padding: var(--space-7) var(--space-5) var(--space-5);
    }
    .rv-why__media::before {
        display: none;
    }
}
@media (prefers-reduced-motion: reduce) {
    .rv-card,
    .rv-badge img,
    .rv-filter__pill,
    .rv-tag {
        transition: none;
    }
    .rv-card:hover,
    .rv-badge:hover img,
    .rv-filter__pill:hover {
        transform: none;
    }
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li><a href="/about/">About</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">Reviews</li>
        </ol>
    </div>
</nav>

<!-- Hero -->
<section class="hero hero--interior rv-hero">
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">Customer Reviews</span>
            <h1>What Greater Houston <span class="text-accent">Homeowners Say</span></h1>
            <p class="rv-hero__intro"><?php echo htmlspecialchars($siteName); ?> is a <strong>family-owned, father-and-son team based in Humble, TX</strong>, serving the Greater Houston area <strong>since <?php echo $yearEstablished; ?></strong>. Every review on this page was written by a real customer and is shown exactly as they published it — first name, city and all.</p>
            <div class="rv-hero__actions">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white">Get a Free Inspection</a>
            </div>
        </div>

        <div class="rv-badges">
            <span class="rv-badges__label">Voted a Nextdoor Neighborhood Favorite</span>
            <div class="rv-badges__row">
                <?php foreach ($badges as $b): ?>
                <div class="rv-badge">
                    <img src="/assets/images/<?php echo $b['file']; ?>" alt="<?php echo htmlspecialchars($b['alt']); ?>" width="<?php echo $b['w']; ?>" height="<?php echo $b['h']; ?>" loading="lazy">
                    <span><?php echo $b['year']; ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<div class="rv-divider-angle" aria-hidden="true"></div>

<!-- Facts ribbon (every number here is a verified fact or computed from real data) -->
<section class="rv-ribbon">
    <div class="container">
        <div class="rv-ribbon__grid">
            <div class="rv-fact" data-animate="fade-up">
                <span class="rv-fact__value">Since <?php echo $yearEstablished; ?></span>
                <span class="rv-fact__label">Serving the Greater Houston area for more than 50 years</span>
            </div>
            <div class="rv-fact" data-animate="fade-up" style="transition-delay: 0.08s;">
                <span class="rv-fact__value"><?php echo $reviewCount; ?> reviews</span>
                <span class="rv-fact__label">Published by customers, reproduced word for word below</span>
            </div>
            <div class="rv-fact" data-animate="fade-up" style="transition-delay: 0.16s;">
                <span class="rv-fact__value">3 years running</span>
                <span class="rv-fact__label">Nextdoor Neighborhood Favorite — 2022, 2023 and 2024</span>
            </div>
            <div class="rv-fact" data-animate="fade-up" style="transition-delay: 0.24s;">
                <span class="rv-fact__value"><?php echo count($serviceAreaCities); ?> communities</span>
                <span class="rv-fact__label">From Humble and Kingwood to Baytown, The Woodlands and beyond</span>
            </div>
        </div>
    </div>
</section>

<!-- Reviews wall -->
<section class="rv-wall" id="reviews">
    <div class="container">
        <div class="rv-wall__head">
            <div data-animate="fade-left">
                <span class="eyebrow-label">In Their Own Words</span>
                <h2>Every Review, <span class="text-accent">Unedited</span></h2>
            </div>
            <p data-animate="fade-right">Roof replacements after Beryl and hail, stubborn leaks two other roofers missed, fences, pergolas, siding and paint. Filter by the kind of work you need, or read them all. <span class="rv-wall__count" id="rv-count"><?php echo $reviewCount; ?> reviews</span></p>
        </div>

        <div class="rv-filter" role="group" aria-label="Filter reviews by service" data-animate="fade-up">
            <button type="button" class="rv-filter__pill is-active" data-filter="all" aria-pressed="true">All <small><?php echo $reviewCount; ?></small></button>
            <?php foreach ($services as $svc):
                $slug = $svc['slug'];
                if (empty($taggedServices[$slug])) { continue; } ?>
            <button type="button" class="rv-filter__pill" data-filter="<?php echo htmlspecialchars($slug); ?>" aria-pressed="false"><?php echo htmlspecialchars($svc['name']); ?> <small><?php echo $taggedServices[$slug]; ?></small></button>
            <?php endforeach; ?>
        </div>

        <div class="rv-grid">
            <?php
            $dirs = ['fade-up', 'fade-left', 'zoom', 'fade-right'];
            foreach ($testimonials as $i => $t):
                $slug    = $t['service'];
                $svcName = $serviceNames[$slug] ?? ucwords(str_replace('-', ' ', $slug));
                $initial = mb_strtoupper(mb_substr(trim($t['name']), 0, 1));
            ?>
            <article class="rv-card" data-service="<?php echo htmlspecialchars($slug); ?>" data-animate="<?php echo $dirs[$i % 4]; ?>">
                <blockquote class="rv-card__text"><?php echo htmlspecialchars($t['text']); ?></blockquote>
                <footer class="rv-card__foot">
                    <div class="rv-card__who">
                        <span class="rv-card__avatar" aria-hidden="true"><?php echo htmlspecialchars($initial); ?></span>
                        <div>
                            <span class="rv-card__name"><?php echo htmlspecialchars($t['name']); ?></span>
                            <span class="rv-card__city"><?php echo htmlspecialchars($t['city']); ?></span>
                        </div>
                    </div>
                    <a class="rv-tag" href="/services/<?php echo htmlspecialchars($slug); ?>/"><?php echo icon('check-circle', 14); ?> <?php echo htmlspecialchars($svcName); ?></a>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="rv-empty" id="rv-empty">No reviews are tagged for that service yet.</p>
    </div>
</section>
<div class="rv-divider-curve" aria-hidden="true"></div>

<!-- Why the reviews sound alike -->
<section class="rv-why">
    <div class="container">
        <div class="rv-why__grid">
            <div class="rv-why__media" data-animate="zoom">
                <img
                    src="/assets/images/owner-father-v2-960.webp"
                    srcset="/assets/images/owner-father-v2-480.webp 480w, /assets/images/owner-father-v2-960.webp 960w"
                    sizes="(max-width: 900px) 90vw, 40vw"
                    alt="Glenn and Tim Menn, the father-and-son team behind Triple G Roofing &amp; Construction"
                    width="1152"
                    height="1536"
                    loading="lazy"
                >
                <div class="rv-why__caption"><em>Glenn &amp; Tim Menn</em>The father-and-son team behind every job</div>
            </div>
            <div data-animate="fade-right">
                <span class="eyebrow-label">Read Between the Lines</span>
                <h2>Why the Reviews <span class="text-accent">Sound Alike</span></h2>
                <p class="rv-why__lead">Read enough of them and a pattern shows up. Nobody told these homeowners what to write — the same habits just keep getting noticed, because <?php echo htmlspecialchars($ownerName); ?> is on every job and the crew does the same things on every roof.</p>
                <ul class="rv-habits">
                    <li>
                        <span class="rv-habits__icon"><?php echo icon('home', 20); ?></span>
                        <div>
                            <strong>The owner shows up in person</strong>
                            <p>"He was the only roofer we contacted who climbed up on the roof and took exact measurements." <cite>— James, Spring</cite></p>
                        </div>
                    </li>
                    <li>
                        <span class="rv-habits__icon"><?php echo icon('shield', 20); ?></span>
                        <div>
                            <strong>Landscaping and pools get tarped</strong>
                            <p>"They covered the landscaping, vegetable garden and pool to protect them from falling debris." <cite>— James, Spring</cite></p>
                        </div>
                    </li>
                    <li>
                        <span class="rv-habits__icon"><?php echo icon('search', 20); ?></span>
                        <div>
                            <strong>A magnet sweep for nails</strong>
                            <p>"After the roof was replaced, they cleaned up all debris and used a large magnet to pick up nails." <cite>— James, Spring</cite></p>
                        </div>
                    </li>
                    <li>
                        <span class="rv-habits__icon"><?php echo icon('clock', 20); ?></span>
                        <div>
                            <strong>Cleanup happens every day, not just the last one</strong>
                            <p>"His crew started on time every day, cleaned up the work-space at the end of each day." <cite>— Clint, Humble</cite></p>
                        </div>
                    </li>
                    <li>
                        <span class="rv-habits__icon"><?php echo icon('check-circle', 20); ?></span>
                        <div>
                            <strong>Photos of what was found, and plain-English explanations</strong>
                            <p>"He explains everything and shows you photos." <cite>— Virginia, Atascocita</cite></p>
                        </div>
                    </li>
                </ul>
                <div class="rv-why__actions">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
                    <a href="/gallery/" class="btn btn-secondary">See the Job Photos</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="rv-divider-dots" aria-hidden="true"></div>

<!-- Leave a review -->
<section class="rv-leave">
    <div class="container">
        <div class="rv-leave__card" data-animate="fade-up">
            <div>
                <span class="eyebrow-label">Worked With Us?</span>
                <h2>Leave a Google Review</h2>
                <p>If <?php echo htmlspecialchars($shortName); ?> replaced your roof, fixed a leak, or built your fence or patio cover, a few honest sentences on Google help the next homeowner decide. Thank you — it means a lot to a small family business.</p>
            </div>
            <div class="rv-leave__actions">
                <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" class="btn btn-primary" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Write a Google Review</a>
                <a href="<?php echo htmlspecialchars($gbpUrl); ?>" class="btn btn-outline-white" target="_blank" rel="noopener"><?php echo icon('external-link', 16); ?> See Us on Google Maps</a>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section cta-banner rv-cta" data-animate="fade-up">
    <div class="container text-center">
        <span class="eyebrow-label">Your Turn</span>
        <h2>Get a Free Inspection and Written Estimate</h2>
        <p style="font-size: var(--font-size-lg); margin-bottom: var(--space-lg);">Call <?php echo htmlspecialchars($ownerName); ?> and the crew. We'll come take a look, show you photos of what we find, and put everything in writing — no pressure and no charge for the visit.</p>
        <div class="cta-buttons">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            <a href="/contact/" class="btn btn-secondary">Request an Estimate Online</a>
        </div>
    </div>
</section>

<script>
(function () {
    var pills = document.querySelectorAll('.rv-filter__pill');
    var cards = document.querySelectorAll('.rv-card');
    var count = document.getElementById('rv-count');
    var empty = document.getElementById('rv-empty');
    if (!pills.length || !cards.length) { return; }
    pills.forEach(function (pill) {
        pill.addEventListener('click', function () {
            var filter = pill.getAttribute('data-filter');
            var shown = 0;
            pills.forEach(function (p) {
                var on = (p === pill);
                p.classList.toggle('is-active', on);
                p.setAttribute('aria-pressed', on ? 'true' : 'false');
            });
            cards.forEach(function (card) {
                var hit = (filter === 'all') || (card.getAttribute('data-service') === filter);
                card.hidden = !hit;
                if (hit) { shown++; card.classList.add('animated'); }
            });
            if (count) { count.textContent = shown + (shown === 1 ? ' review' : ' reviews'); }
            if (empty) { empty.style.display = shown ? 'none' : 'block'; }
        });
    });
})();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
