<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Humble';
$pageTitle = 'Roof Replacement, Repair & Exterior Services in Humble, TX | ' . $siteName;
$pageDescription = 'Roof replacement, repair, storm damage, siding, gutters, patio covers and fences in Humble, TX — home base of a family-owned father-and-son contractor in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/humble/';
$ogImage = 'hero-roof-home-v2-1600.webp';

/* Responsive photo helper — emits only the webp variants (480, 960, 1600) that exist on disk */
if (!function_exists('areaPhoto')) {
    function areaPhoto($name, $alt, $w, $h, $sizes, $eager = false) {
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';
        $set = [];
        foreach ([480, 960, 1600] as $px) {
            if (file_exists($dir . $name . '-' . $px . '.webp')) {
                $set[] = '/assets/images/' . $name . '-' . $px . '.webp ' . $px . 'w';
            }
        }
        $load = $eager ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"';
        return '<img src="/assets/images/' . $name . '.jpg"' . ($set ? ' srcset="' . implode(', ', $set) . '"' : '')
            . ' sizes="' . htmlspecialchars($sizes) . '" alt="' . htmlspecialchars($alt) . '"'
            . ' width="' . (int) $w . '" height="' . (int) $h . '" ' . $load . '>';
    }
}

/* Real reviews from this community — names + cities exactly as the client published them */
$pick = ['Violet', 'Clint', 'Stephanie'];
$cityReviews = array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Humble, TX' && in_array($t['name'], $pick, true)));
usort($cityReviews, fn($a, $b) => array_search($a['name'], $pick) <=> array_search($b['name'], $pick));

$areaFaqs = [
    [
        'q' => 'Where is Triple G Roofing & Construction located?',
        'a' => 'Triple G Roofing & Construction is based in Humble, TX and works on-site across the Greater Houston area — more than 50 communities, from Spring and The Woodlands to Baytown and Crosby. Call and we come to you. The inspection and the written estimate are free.',
    ],
    [
        'q' => 'How do I know whether my roof needs a repair or a full replacement?',
        'a' => 'Start with a free, photo-documented inspection. We walk every slope, photograph what we find and show you the pictures. Many problems — a failed pipe boot, cracked step flashing at a chimney, a handful of wind-lifted shingles — are repairs. Widespread granule loss, brittle shingles and soft decking point to replacement. Either way you get a written estimate and the decision stays with you.',
    ],
    [
        'q' => 'Do you do more than roofing?',
        'a' => 'Yes. Triple G Roofing & Construction also does siding, fascia and soffit, wood-rot repair, exterior paint, gutters, patio covers, screened and enclosed patios, pergolas, wood decks, and cedar or pine privacy fences and gates. One crew, one call, and the owner on every job.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix hm-
   Tokens only. Full-bleed photo hero, three-era housing
   timeline (signature), split services, reviews, FAQ.
   ========================================================== */

/* ---------- Hero: full-bleed photo + gradient + noise ---------- */
.hm-hero {
    position: relative;
    overflow: hidden;
    min-height: 78vh;
    display: flex;
    align-items: flex-end;
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
    isolation: isolate;
    background: var(--color-dark);
}

.hm-hero__bg {
    position: absolute;
    inset: 0;
    z-index: -3;
}

.hm-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 40%;
}

.hm-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--color-dark) 55%, transparent) 0%, color-mix(in srgb, var(--color-dark) 35%, transparent) 40%, color-mix(in srgb, var(--color-dark) 92%, transparent) 100%),
        linear-gradient(90deg, color-mix(in srgb, var(--color-dark) 70%, transparent) 0%, transparent 70%);
}

.hm-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.06;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.hm-hero__inner { max-width: 760px; }

.hm-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.hm-breadcrumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.hm-breadcrumb a:hover { color: var(--color-white); }
.hm-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.hm-hero__pill {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    background: var(--color-primary);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
    box-shadow: var(--shadow-md);
}

.hm-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.3rem, 5vw, 3.9rem);
    line-height: 1.05;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.hm-hero h1 .text-accent { color: var(--color-accent); }

.hm-hero__answer {
    position: relative;
    padding-left: var(--space-6);
    margin-bottom: var(--space-8);
}

.hm-hero__answer::before {
    content: '';
    position: absolute;
    left: 0;
    top: 4px;
    bottom: 4px;
    width: 4px;
    border-radius: var(--radius-full);
    background: linear-gradient(180deg, var(--color-accent), var(--color-primary));
}

.hm-hero__answer p {
    color: color-mix(in srgb, var(--color-white) 90%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.2rem);
    line-height: 1.7;
    margin: 0;
    max-width: 62ch;
}

.hm-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.hm-ctas .btn-lg { font-size: var(--font-size-base); }

/* ---------- Proof bar (overlaps hero) ---------- */
.hm-proof { position: relative; z-index: 2; margin-top: calc(-1 * var(--space-10)); }

.hm-proof__card {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    overflow: hidden;
}

.hm-proof__item {
    padding: var(--space-6);
    display: grid;
    gap: var(--space-1);
    border-right: 1px solid var(--color-border);
}

.hm-proof__item:last-child { border-right: 0; }

.hm-proof__item strong {
    font-family: var(--font-heading);
    font-size: var(--font-size-3xl);
    line-height: 1;
    color: var(--color-primary);
}

.hm-proof__item span {
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
    line-height: 1.4;
}

/* ---------- Section scaffolding ---------- */
.hm-section { padding: var(--space-16) 0; }
.hm-section--alt { background: var(--color-light); }
.hm-section--dark { background: var(--color-dark-alt); color: var(--color-white); }

.hm-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.hm-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.hm-section--dark h2 { color: var(--color-white); }

.hm-subtitle {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}

.hm-prose p {
    color: var(--color-gray-dark);
    line-height: 1.8;
    margin-bottom: var(--space-5);
    max-width: 65ch;
}

.hm-prose a { color: var(--color-primary); font-weight: 600; }
.hm-prose a:hover { text-decoration: underline; }

.hm-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }

/* ---------- Local context: text + tall figure + highlight card ---------- */
.hm-local {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: start;
}

.hm-figure {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 3 / 4;
    position: relative;
}

.hm-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.hm-figure:hover img { transform: scale(1.04); }

.hm-figure--offset { margin-top: var(--space-10); }

.hm-highlights {
    margin: var(--space-6) 0;
    display: grid;
    gap: var(--space-3);
}

.hm-highlight {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-left: 4px solid var(--color-accent);
    line-height: 1.6;
    color: var(--color-gray-dark);
}

.hm-highlight:nth-child(even) { border-left-color: var(--color-primary); }
.hm-highlight svg { color: var(--color-primary); margin-top: 3px; }
.hm-highlight strong { color: var(--color-dark); display: block; }

/* ---------- Signature: three-era timeline ---------- */
.hm-eras {
    position: relative;
    margin-top: var(--space-10);
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-6);
}

.hm-eras::before {
    content: '';
    position: absolute;
    top: 28px;
    left: 8%;
    right: 8%;
    height: 2px;
    background: linear-gradient(90deg, var(--color-accent), var(--color-primary), var(--color-dark));
    opacity: 0.5;
}

.hm-era {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-12) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.hm-era:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }

.hm-era__dot {
    position: absolute;
    top: 16px;
    left: var(--space-6);
    width: 26px;
    height: 26px;
    border-radius: var(--radius-full);
    background: var(--color-accent);
    border: 5px solid var(--color-light);
    box-shadow: var(--shadow-sm);
}

.hm-era:nth-child(2) .hm-era__dot { background: var(--color-primary); }
.hm-era:nth-child(3) .hm-era__dot { background: var(--color-dark); }

.hm-era__years {
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-2);
}

.hm-era h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-3); }
.hm-era p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; margin-bottom: var(--space-4); }

.hm-era ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-2); }
.hm-era li { display: flex; gap: var(--space-2); font-size: var(--font-size-sm); color: var(--color-gray-dark); }
.hm-era li svg { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }

/* ---------- Services split ---------- */
.hm-services {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
}

.hm-services__stack {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-5);
}

.hm-services__stack .hm-figure { aspect-ratio: 4 / 5; }
.hm-services__stack .hm-figure:nth-child(2) { margin-top: var(--space-12); }

.hm-svc-list { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; gap: var(--space-3); }

.hm-svc-list a {
    display: grid;
    grid-template-columns: 48px 1fr auto;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast);
}

.hm-svc-list a:hover { border-color: var(--color-primary); transform: translateX(4px); box-shadow: var(--shadow-md); }

.hm-svc-list .hm-svc-icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white));
    color: var(--color-primary);
}

.hm-svc-list li:nth-child(3n+2) .hm-svc-icon { background: color-mix(in srgb, var(--color-accent) 18%, var(--color-white)); color: var(--color-primary-dark); }
.hm-svc-list li:nth-child(3n) .hm-svc-icon { background: color-mix(in srgb, var(--color-dark) 8%, var(--color-white)); color: var(--color-dark); }

.hm-svc-list strong { display: block; font-family: var(--font-heading); color: var(--color-dark); }
.hm-svc-list small { color: var(--color-gray); font-size: var(--font-size-xs); }
.hm-svc-list .hm-svc-arrow { color: var(--color-primary); }

/* ---------- Claims band ---------- */
.hm-claims {
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
    gap: var(--space-12);
    align-items: center;
}

.hm-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 58ch; }

.hm-claims__grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }

.hm-claims__tile {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 7%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
}

.hm-claims__tile svg { color: var(--color-accent); margin-bottom: var(--space-3); }
.hm-claims__tile strong { display: block; color: var(--color-white); font-family: var(--font-heading); margin-bottom: var(--space-1); }
.hm-claims__tile span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); line-height: 1.55; }

.hm-claims__note {
    margin-top: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 75%, transparent);
    border-left: 3px solid var(--color-accent);
    padding-left: var(--space-4);
}

/* ---------- Reviews ---------- */
.hm-reviews {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr));
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.hm-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    box-shadow: var(--shadow-card);
    border-top: 4px solid var(--color-accent);
    display: flex;
    flex-direction: column;
}

.hm-review:nth-child(2) { border-top-color: var(--color-primary); }
.hm-review:nth-child(3) { border-top-color: var(--color-dark); }

.hm-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.hm-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); flex: 1; }

.hm-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }

.hm-review__avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-dark);
    color: var(--color-white);
    font-weight: 700;
}

.hm-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.hm-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }

.hm-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.hm-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.hm-faq summary {
    cursor: pointer;
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-5) var(--space-6);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
}

.hm-faq summary::-webkit-details-marker { display: none; }
.hm-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.hm-faq details[open] summary svg { transform: rotate(45deg); }
.hm-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.hm-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.hm-nearby a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
    transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast);
}

.hm-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.hm-nearby a svg { color: var(--color-primary); }

.hm-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.hm-chips span, .hm-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.hm-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }

.hm-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.hm-divider { line-height: 0; display: block; }
.hm-divider svg { width: 100%; height: 56px; display: block; }
.hm-divider--tilt { background: var(--color-white); }
.hm-divider--tilt svg { fill: var(--color-light); }
.hm-divider--curve { background: var(--color-light); }
.hm-divider--curve svg { fill: var(--color-dark-alt); }

/* ---------- CTA ---------- */
.hm-cta {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
    padding: var(--space-16) 0;
}

.hm-cta__inner {
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    gap: var(--space-8);
    align-items: center;
}

.hm-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.hm-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .hm-proof__card { grid-template-columns: 1fr 1fr; }
    .hm-proof__item:nth-child(2) { border-right: 0; }
    .hm-proof__item:nth-child(-n+2) { border-bottom: 1px solid var(--color-border); }
    .hm-local { grid-template-columns: 1fr; }
    .hm-figure--offset { margin-top: 0; max-width: 420px; }
    .hm-eras { grid-template-columns: 1fr; }
    .hm-eras::before { display: none; }
    .hm-services { grid-template-columns: 1fr; }
    .hm-claims { grid-template-columns: 1fr; }
    .hm-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .hm-hero { min-height: 0; padding-top: calc(var(--nav-height) + var(--space-8)); }
    .hm-ctas .btn { width: 100%; justify-content: center; }
    .hm-proof__card { grid-template-columns: 1fr; }
    .hm-proof__item { border-right: 0; border-bottom: 1px solid var(--color-border); }
    .hm-proof__item:last-child { border-bottom: 0; }
    .hm-services__stack { grid-template-columns: 1fr; }
    .hm-services__stack .hm-figure:nth-child(2) { margin-top: 0; }
    .hm-claims__grid { grid-template-columns: 1fr; }
    .hm-section { padding: var(--space-12) 0; }
    .hm-svc-list a { grid-template-columns: 40px 1fr auto; }
}

@media (prefers-reduced-motion: reduce) {
    .hm-figure img, .hm-era, .hm-svc-list a, .hm-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="hm-hero" aria-labelledby="hm-title">
    <div class="hm-hero__bg" aria-hidden="true">
        <?php echo areaPhoto('hero-roof-home-v2', 'Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing & Construction', 1600, 1333, '100vw', true); ?>
    </div>
    <div class="container">
        <div class="hm-hero__inner">
            <nav class="hm-breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a><span>/</span>
                <a href="/service-areas/">Service Areas</a><span>/</span>
                <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
            </nav>

            <span class="hm-hero__pill"><?php echo icon('home', 14); ?> Our home base</span>

            <h1 id="hm-title">Roofing &amp; Exterior Contractor in <span class="text-accent">Humble</span>, TX</h1>

            <div class="hm-hero__answer">
                <p>
                    <strong><?php echo htmlspecialchars($siteName); ?> is based in Humble, TX</strong> and serves it as one of more than
                    50 Greater Houston communities. We're a family-owned father-and-son team, in business since 1973: roof replacement
                    and repair, storm damage, siding, gutters, patio covers, decks and fences — with a free inspection and written
                    estimate on every project.
                </p>
            </div>

            <div class="hm-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
            </div>
        </div>
    </div>
</section>

<!-- ===================== PROOF BAR ===================== -->
<div class="hm-proof">
    <div class="container">
        <div class="hm-proof__card">
            <div class="hm-proof__item"><strong>1973</strong><span>Serving the Greater Houston area since</span></div>
            <div class="hm-proof__item"><strong>50+</strong><span>Communities served, from Orange to Galveston</span></div>
            <div class="hm-proof__item"><strong>3×</strong><span>Nextdoor Neighborhood Favorite — 2022, 2023, 2024</span></div>
            <div class="hm-proof__item"><strong>Free</strong><span>Inspections and written estimates</span></div>
        </div>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="hm-section" aria-labelledby="hm-local-title">
    <div class="container">
        <div class="hm-local">
            <div class="hm-prose">
                <span class="hm-eyebrow">The town that named an oil company</span>
                <h2 id="hm-local-title">From Old Humble to Fall Creek — a town built in layers</h2>
                <p class="hm-subtitle">Every layer has its own roof problems. We've worked on all of them.</p>

                <p>
                    Humble grew up around the 1904 oilfield that gave Humble Oil its name, and you can still read that history in the
                    housing stock. Old Humble, along Main Street by the railroad, is cottages and ranch homes from the 1940s through
                    the 1970s — low-slope additions, original brick chimneys and flashing that has been patched more than once. The
                    ring of subdivisions along FM 1960 and Will Clayton Parkway near Deerbrook Mall went in through the 1980s and
                    1990s and is now on its second or third roof.
                </p>
                <p>
                    Then there's the newest layer: master-planned Fall Creek off Beltway 8 in the shadow of Bush Intercontinental
                    Airport, and Eagle Springs and Summerwood toward Lake Houston. Those homes have steeper, more complicated roof
                    lines, HOA color palettes, and builder-grade shingles that are reaching the age where storms find the weak spots.
                    Under all of it is Harris County gumbo clay that swells and shrinks with the seasons — which is why we pay as much
                    attention to gutters and downspout drainage as we do to shingles.
                </p>

                <div class="hm-highlights">
                    <div class="hm-highlight"><?php echo icon('map-pin', 18); ?><div><strong>Old Humble &amp; Main Street</strong> Mid-century homes with low-slope additions and aging chimney flashing — usually repair candidates before replacement ones.</div></div>
                    <div class="hm-highlight"><?php echo icon('map-pin', 18); ?><div><strong>FM 1960 &amp; Will Clayton Parkway</strong> 1980s–90s subdivisions around Deerbrook Mall where roofs installed after the last big hail cycle are aging out together.</div></div>
                    <div class="hm-highlight"><?php echo icon('map-pin', 18); ?><div><strong>Fall Creek &amp; Beltway 8, near IAH</strong> Complex roof lines and HOA palettes; a Fall Creek homeowner had us do siding, paint, sealed windows and a cedar fence in one visit.</div></div>
                    <div class="hm-highlight"><?php echo icon('map-pin', 18); ?><div><strong>Eagle Springs &amp; Summerwood</strong> Toward Lake Houston — open wind exposure, algae streaking from the humidity, and attics that run hot without balanced ventilation.</div></div>
                </div>

                <p>
                    Looking for <strong>roof replacement near me in Humble</strong>? You're calling the company that lives here.
                    Dial <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> and Tim will come look at it himself.
                </p>
            </div>

            <div>
                <figure class="hm-figure hm-figure--offset">
                    <?php echo areaPhoto('roof-replacement', 'Triple G crew replacing the roof on a two-story brick home', 1200, 1600, '(max-width: 1024px) 420px, 30vw'); ?>
                </figure>
            </div>
        </div>
    </div>
</section>

<div class="hm-divider hm-divider--tilt" aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none"><polygon points="0,56 1440,0 1440,56"/></svg>
</div>

<!-- ===================== SIGNATURE: THREE-ERA TIMELINE ===================== -->
<section class="hm-section hm-section--alt" aria-labelledby="hm-eras-title">
    <div class="container">
        <span class="hm-eyebrow">Three generations of roofs</span>
        <h2 id="hm-eras-title">What we look for, by the decade your house was built</h2>
        <p class="hm-lead">A roof inspection here starts with a question: when was this built? The answer tells us where the problems usually hide.</p>

        <div class="hm-eras">
            <article class="hm-era" data-animate>
                <span class="hm-era__dot" aria-hidden="true"></span>
                <div class="hm-era__years">1940s – 1970s</div>
                <h3>The original streets by Main Street</h3>
                <p>Simple gables, later additions with low pitch, brick chimneys and skylights that have outlived several roofs.</p>
                <ul>
                    <li><?php echo icon('check-circle', 16); ?> Step and counter flashing at chimneys</li>
                    <li><?php echo icon('check-circle', 16); ?> Low-slope add-ons that pond water</li>
                    <li><?php echo icon('check-circle', 16); ?> Decking and fascia wood rot</li>
                </ul>
            </article>
            <article class="hm-era" data-animate>
                <span class="hm-era__dot" aria-hidden="true"></span>
                <div class="hm-era__years">1980s – 1990s</div>
                <h3>FM 1960 &amp; Will Clayton subdivisions</h3>
                <p>Roofs on their second or third cycle, often with layered repairs and undersized ventilation from the original build.</p>
                <ul>
                    <li><?php echo icon('check-circle', 16); ?> Granule loss and brittle shingles</li>
                    <li><?php echo icon('check-circle', 16); ?> Pipe boots cracked by sun</li>
                    <li><?php echo icon('check-circle', 16); ?> Attic venting that can void shingle warranties</li>
                </ul>
            </article>
            <article class="hm-era" data-animate>
                <span class="hm-era__dot" aria-hidden="true"></span>
                <div class="hm-era__years">2000s – today</div>
                <h3>Fall Creek, Eagle Springs, Summerwood</h3>
                <p>Steep, cut-up roofs with many valleys and dormers; HOA palettes to match; builder shingles meeting their first real storms.</p>
                <ul>
                    <li><?php echo icon('check-circle', 16); ?> Valley and dead-valley leaks</li>
                    <li><?php echo icon('check-circle', 16); ?> Wind-lifted hip and ridge caps</li>
                    <li><?php echo icon('check-circle', 16); ?> Hail bruising after spring storms</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="hm-section" aria-labelledby="hm-svc-title">
    <div class="container">
        <div class="hm-services">
            <div>
                <span class="hm-eyebrow">Roofing / Siding — it's on the sign</span>
                <h2 id="hm-svc-title">Everything on the outside of the house, from one local crew</h2>
                <p class="hm-lead">
                    Roofs are the core of what we do, but a Humble customer recently handed us a list — cedar fence, gate, two roof
                    leaks, sheetrock, window sealing, siding and exterior paint — and we finished it in one visit. That's the idea.
                </p>
                <ul class="hm-svc-list">
                    <li><a href="/services/roof-replacement/"><span class="hm-svc-icon"><?php echo icon('home', 22); ?></span><span><strong>Roof Replacement</strong><small>Architectural shingle &amp; metal — tear-off, decking, underlayment, cleanup</small></span><span class="hm-svc-arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/roof-repair/"><span class="hm-svc-icon"><?php echo icon('wrench', 22); ?></span><span><strong>Roof Repair &amp; Inspection</strong><small>Leaks, flashing, pipe boots, wood rot — free photo-documented inspections</small></span><span class="hm-svc-arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/storm-damage-repair/"><span class="hm-svc-icon"><?php echo icon('wind', 22); ?></span><span><strong>Storm &amp; Wind Damage</strong><small>Hail, wind and hurricane repair, documented for your claim</small></span><span class="hm-svc-arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/siding-fascia-soffit/"><span class="hm-svc-icon"><?php echo icon('ruler', 22); ?></span><span><strong>Siding, Fascia &amp; Soffit</strong><small>Hardie and vinyl siding, wood-rot repair, window re-sealing, exterior paint</small></span><span class="hm-svc-arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/gutter-installation/"><span class="hm-svc-icon"><?php echo icon('droplets', 22); ?></span><span><strong>Gutters</strong><small>New gutters and downspouts that keep water off the foundation</small></span><span class="hm-svc-arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/patio-covers-decks/"><span class="hm-svc-icon"><?php echo icon('hammer', 22); ?></span><span><strong>Patio Covers, Pergolas &amp; Decks</strong><small>Covered, screened and enclosed patios, pergolas, wood decks</small></span><span class="hm-svc-arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/fences-gates/"><span class="hm-svc-icon"><?php echo icon('shield', 22); ?></span><span><strong>Fences &amp; Gates</strong><small>Cedar and pine privacy, ranch rail, custom gates</small></span><span class="hm-svc-arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                </ul>
            </div>
            <div class="hm-services__stack">
                <figure class="hm-figure">
                    <?php echo areaPhoto('siding-fascia-soffit', 'Crew member replacing siding on a dormer above a shingle roof', 1200, 1600, '(max-width: 1024px) 50vw, 24vw'); ?>
                </figure>
                <figure class="hm-figure">
                    <?php echo areaPhoto('patio-cover-fans', 'Covered patio with beadboard ceiling and fans', 1200, 1600, '(max-width: 1024px) 50vw, 24vw'); ?>
                </figure>
            </div>
        </div>
    </div>
</section>

<div class="hm-divider hm-divider--curve" aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none"><path d="M0,56 C480,0 960,0 1440,56 L1440,56 L0,56 Z"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="hm-section hm-section--dark" aria-labelledby="hm-claims-title">
    <div class="container">
        <div class="hm-claims">
            <div>
                <span class="hm-eyebrow">After the storm</span>
                <h2 id="hm-claims-title">More than 50 years of claims experience, on your side of the table</h2>
                <p>
                    When Beryl came through in 2024, a homeowner here told us the most valuable thing we did was sit down and explain
                    her policy so she understood it. That's the job: document the damage, meet the adjuster, explain the paperwork in
                    plain English, and then do the work as agreed.
                </p>
                <p class="hm-claims__note">Whether a claim is approved, and for how much, is the insurance carrier's decision. We make sure the damage is documented properly and you understand your options.</p>
            </div>
            <div class="hm-claims__grid">
                <div class="hm-claims__tile"><?php echo icon('search', 22); ?><strong>Document</strong><span>Photos of every slope and every strike, before anything is touched.</span></div>
                <div class="hm-claims__tile"><?php echo icon('hard-hat', 22); ?><strong>Meet the adjuster</strong><span>We walk the roof with them so nothing is missed.</span></div>
                <div class="hm-claims__tile"><?php echo icon('check-circle', 22); ?><strong>Explain the policy</strong><span>Deductible, depreciation, scope — line by line.</span></div>
                <div class="hm-claims__tile"><?php echo icon('home', 22); ?><strong>Do the work as agreed</strong><span>Owner on site, landscaping covered, daily cleanup.</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="hm-section hm-section--alt" aria-labelledby="hm-reviews-title">
    <div class="container">
        <span class="hm-eyebrow">From our neighbors</span>
        <h2 id="hm-reviews-title">What Humble homeowners say about Triple G</h2>
        <p class="hm-lead">Real reviews, published by the client with first name and city.</p>
        <div class="hm-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="hm-review" data-animate>
                <div class="hm-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="hm-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="hm-section" aria-labelledby="hm-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="hm-eyebrow">Common questions</span>
            <h2 id="hm-faq-title">Straight answers before you call</h2>
        </div>
        <div class="hm-faq">
            <?php foreach ($areaFaqs as $i => $faq): ?>
            <details <?php echo $i === 0 ? 'open' : ''; ?>>
                <summary><?php echo htmlspecialchars($faq['q']); ?> <?php echo icon('plus', 20); ?></summary>
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== NEARBY ===================== -->
<section class="hm-section hm-section--alt" aria-labelledby="hm-nearby-title">
    <div class="container">
        <span class="hm-eyebrow">Nearby communities</span>
        <h2 id="hm-nearby-title">Minutes from home base</h2>
        <p class="hm-lead">Atascocita and Kingwood are next door, and the rest of the Lake Houston area is a short drive. We cover more than 50 Greater Houston communities in all.</p>
        <div class="hm-nearby">
            <a href="/service-areas/atascocita/">Atascocita, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/huffman/">Huffman, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/crosby/">Crosby, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="hm-chips">
            <?php foreach (['Spring', 'Aldine', 'Porter', 'New Caney', 'Houston', 'The Woodlands', 'Cypress', 'Jersey Village'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="hm-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="hm-cta" aria-labelledby="hm-cta-title">
    <div class="container">
        <div class="hm-cta__inner">
            <div>
                <h2 id="hm-cta-title">Free roof inspection from the company based right here</h2>
                <p>Photos of what we find, a written estimate, and no pressure. The owner comes out personally.</p>
            </div>
            <div class="hm-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
            </div>
        </div>
    </div>
</section>

<!-- Schema: BreadcrumbList -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Service Areas", "item": "<?php echo $siteUrl; ?>/service-areas/" },
        { "@type": "ListItem", "position": 3, "name": "<?php echo htmlspecialchars($areaName); ?>, TX", "item": "<?php echo $canonicalUrl; ?>" }
    ]
}
</script>

<!-- Schema: Service (provider = homepage organization; no street address published) -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "@id": "<?php echo $canonicalUrl; ?>#service",
    "url": "<?php echo $canonicalUrl; ?>",
    "name": "Roofing & Exterior Services in <?php echo htmlspecialchars($areaName); ?>, TX",
    "serviceType": "Roofing and exterior contractor",
    "description": "<?php echo htmlspecialchars($pageDescription); ?>",
    "provider": { "@id": "<?php echo $siteUrl; ?>#organization" },
    "areaServed": { "@type": "City", "name": "<?php echo htmlspecialchars($areaName); ?>, TX" },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Services offered in <?php echo htmlspecialchars($areaName); ?>, TX",
        "itemListElement": [
            <?php foreach ($services as $i => $s): ?>
            { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "<?php echo htmlspecialchars($s['name']); ?>", "url": "<?php echo $siteUrl; ?>/services/<?php echo $s['slug']; ?>/" } }<?php echo $i < count($services) - 1 ? ',' : ''; ?>

            <?php endforeach; ?>
        ]
    }
}
</script>

<script type="application/ld+json">
<?php echo generateFAQSchema($areaFaqs); ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
