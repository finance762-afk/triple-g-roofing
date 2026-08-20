<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Crosby';
$pageTitle = 'Roofing, Metal Roofs & Storm Repair in Crosby, TX | ' . $siteName;
$pageDescription = 'Roof replacement, metal roofs, storm damage, siding, gutters, patio covers and fences in Crosby, TX from a family-owned father-and-son contractor serving Greater Houston since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/crosby/';

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
$cityReviews = array_slice(array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Crosby, TX')), 0, 3);

$areaFaqs = [
    [
        'q' => 'Do you install metal roofs on barns, shops and outbuildings in Crosby?',
        'a' => 'Yes. Triple G Roofing & Construction installs metal roofs on homes, barns, shop buildings and even poolside palapas, along with architectural shingle roofs. On acreage properties we can look at the house and the outbuildings in the same free inspection and give you one written estimate.',
    ],
    [
        'q' => 'Do you stand behind roofs you installed years ago?',
        'a' => 'We do. A Crosby customer whose roof we installed in 2015 had us back for a minor repair in 2023 at no charge. Ask us about the workmanship guarantee for your specific project when we write the estimate, and keep in mind that shingles also carry a manufacturer warranty.',
    ],
    [
        'q' => 'Can you help with an insurance claim after hail or hurricane damage?',
        'a' => 'We help you through the entire process. With more than 50 years of roofing, claims-handling and adjuster experience, we document the damage, meet the adjuster at your property and explain your policy in plain English. Whether a claim is approved, and for how much, is the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix cr-
   Tokens only. Angled photo-panel hero, shingle-vs-metal
   signature comparison, acreage service grid, reviews, FAQ.
   ========================================================== */

/* ---------- Hero: angled photo panel ---------- */
.cr-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, var(--color-dark) 0%, var(--color-dark-alt) 100%);
    isolation: isolate;
}

.cr-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.06;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.cr-hero__panel {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 46%;
    z-index: -2;
    clip-path: polygon(14% 0, 100% 0, 100% 100%, 0 100%);
}

.cr-hero__panel img { width: 100%; height: 100%; object-fit: cover; object-position: center; }

.cr-hero__panel::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, color-mix(in srgb, var(--color-dark) 70%, transparent) 0%, color-mix(in srgb, var(--color-dark) 15%, transparent) 45%, transparent 100%);
}

.cr-hero__inner {
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
    max-width: 640px;
}

.cr-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.cr-breadcrumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.cr-breadcrumb a:hover { color: var(--color-white); }
.cr-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.cr-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: var(--space-4);
}

.cr-hero__eyebrow::before { content: ''; width: 28px; height: 2px; background: var(--color-accent); }

.cr-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 4.6vw, 3.6rem);
    line-height: 1.08;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.cr-hero h1 .text-accent { color: var(--color-accent); }

.cr-hero__answer {
    background: color-mix(in srgb, var(--color-dark) 60%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-xl);
    padding: var(--space-5) var(--space-6);
    margin-bottom: var(--space-6);
}

.cr-hero__answer p { color: color-mix(in srgb, var(--color-white) 92%, transparent); font-size: clamp(1rem, 1.6vw, 1.15rem); line-height: 1.7; margin: 0; }

.cr-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.cr-ctas .btn-lg { font-size: var(--font-size-base); }

.cr-hero__strip {
    border-top: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    background: color-mix(in srgb, var(--color-dark) 50%, transparent);
    backdrop-filter: blur(8px);
}

.cr-hero__strip ul {
    list-style: none;
    margin: 0;
    padding: var(--space-4) 0;
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3) var(--space-8);
}

.cr-hero__strip li {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
}

.cr-hero__strip li svg { color: var(--color-accent); }

/* ---------- Section scaffolding ---------- */
.cr-section { padding: var(--space-16) 0; }
.cr-section--alt { background: var(--color-light); }
.cr-section--dark { background: var(--color-dark-alt); color: var(--color-white); }

.cr-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.cr-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.cr-section--dark h2 { color: var(--color-white); }
.cr-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.cr-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.cr-prose a { color: var(--color-primary); font-weight: 600; }
.cr-prose a:hover { text-decoration: underline; }
.cr-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }

/* ---------- Local context: text + photo column ---------- */
.cr-local {
    display: grid;
    grid-template-columns: minmax(0, 3fr) minmax(0, 2fr);
    gap: var(--space-12);
    align-items: start;
}

.cr-local__media { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); position: sticky; top: calc(var(--nav-height) + var(--space-4)); }

.cr-figure { overflow: hidden; border-radius: var(--radius-xl); box-shadow: var(--shadow-card); aspect-ratio: 3 / 4; }
.cr-figure--tall { grid-row: span 2; aspect-ratio: 3 / 5; }
.cr-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.cr-figure:hover img { transform: scale(1.04); }

.cr-year {
    border-radius: var(--radius-xl);
    background: var(--color-primary);
    color: var(--color-white);
    padding: var(--space-5);
    display: grid;
    gap: 2px;
    align-content: center;
}

.cr-year strong { font-family: var(--font-heading); font-size: var(--font-size-4xl); line-height: 1; }
.cr-year span { font-size: var(--font-size-xs); letter-spacing: 0.06em; text-transform: uppercase; color: color-mix(in srgb, var(--color-white) 85%, transparent); }

.cr-places { margin: var(--space-6) 0; display: grid; gap: var(--space-3); }

.cr-place {
    display: grid;
    grid-template-columns: 56px 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    line-height: 1.6;
    color: var(--color-gray-dark);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}

.cr-place:hover { transform: translateX(4px); box-shadow: var(--shadow-md); }

.cr-place__icon {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    background: color-mix(in srgb, var(--color-accent) 18%, var(--color-white));
    color: var(--color-primary-dark);
}

.cr-place:nth-child(even) .cr-place__icon { background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white)); color: var(--color-primary); }
.cr-place strong { display: block; color: var(--color-dark); font-family: var(--font-heading); }

/* ---------- Signature: shingle vs metal ---------- */
.cr-compare { margin-top: var(--space-8); display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); }

.cr-option {
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    display: flex;
    flex-direction: column;
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.cr-option:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }

.cr-option__img { aspect-ratio: 16 / 9; overflow: hidden; position: relative; }
.cr-option__img img { width: 100%; height: 100%; object-fit: cover; }

.cr-option__label {
    position: absolute;
    left: var(--space-4);
    top: var(--space-4);
    background: var(--color-dark);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-sm);
}

.cr-option:nth-child(2) .cr-option__label { background: var(--color-primary); }
.cr-option__body { padding: var(--space-6); display: flex; flex-direction: column; gap: var(--space-3); flex: 1; }
.cr-option__body h3 { font-size: var(--font-size-xl); }
.cr-option__body p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }

.cr-option ul { list-style: none; margin: var(--space-2) 0 0; padding: 0; display: grid; gap: var(--space-2); }
.cr-option li { display: flex; gap: var(--space-2); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5; }
.cr-option li svg { color: var(--color-primary); flex-shrink: 0; margin-top: 3px; }

.cr-compare__foot {
    margin-top: var(--space-6);
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border-left: 4px solid var(--color-accent);
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    line-height: 1.7;
    max-width: 70ch;
}

/* ---------- Services grid ---------- */
.cr-services { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.cr-svc {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    overflow: hidden;
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.cr-svc:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.cr-svc:nth-child(3n+1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.cr-svc:nth-child(3n+2) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.cr-svc:nth-child(3n) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.cr-svc::after {
    content: '';
    position: absolute;
    right: -30px;
    bottom: -30px;
    width: 90px;
    height: 90px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-white) 60%, transparent);
    pointer-events: none;
}

.cr-svc__icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-white); color: var(--color-primary); box-shadow: var(--shadow-sm); }
.cr-svc strong { font-family: var(--font-heading); color: var(--color-dark); font-size: var(--font-size-lg); }
.cr-svc span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; flex: 1; }
.cr-svc em { font-style: normal; color: var(--color-primary); font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600; display: inline-flex; align-items: center; gap: var(--space-1); }

/* ---------- Claims ---------- */
.cr-claims { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: var(--space-12); align-items: center; }
.cr-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 58ch; }

.cr-claims__steps { list-style: none; margin: 0; padding: 0; counter-reset: crstep; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }

.cr-claims__steps li {
    counter-increment: crstep;
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    font-size: var(--font-size-sm);
    line-height: 1.6;
}

.cr-claims__steps li::before {
    content: '0' counter(crstep);
    display: block;
    font-family: var(--font-heading);
    font-size: var(--font-size-2xl);
    font-weight: 800;
    color: var(--color-accent);
    margin-bottom: var(--space-2);
}

.cr-claims__steps strong { display: block; color: var(--color-white); margin-bottom: 2px; }
.cr-claims__note { margin-top: var(--space-5); font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); border-left: 3px solid var(--color-accent); padding-left: var(--space-4); }

/* ---------- Reviews ---------- */
.cr-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 320px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.cr-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    display: grid;
    grid-template-columns: 48px 1fr;
    gap: var(--space-4);
}

.cr-review__avatar { width: 48px; height: 48px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-primary); color: var(--color-white); font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-lg); }
.cr-review:nth-child(even) .cr-review__avatar { background: var(--color-dark); color: var(--color-accent); }
.cr-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-2); }
.cr-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-3); }
.cr-review footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-dark); }
.cr-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.cr-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.cr-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.cr-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.cr-faq summary {
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

.cr-faq summary::-webkit-details-marker { display: none; }
.cr-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.cr-faq details[open] summary svg { transform: rotate(45deg); }
.cr-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.cr-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.cr-nearby a {
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

.cr-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.cr-nearby a svg { color: var(--color-primary); }

.cr-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.cr-chips span, .cr-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.cr-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.cr-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.cr-divider { line-height: 0; display: block; }
.cr-divider svg { width: 100%; height: 60px; display: block; }
.cr-divider--slant { background: var(--color-white); }
.cr-divider--slant svg { fill: var(--color-light); }
.cr-divider--ridge { background: var(--color-white); }
.cr-divider--ridge svg { fill: var(--color-dark-alt); }

/* ---------- CTA ---------- */
.cr-cta { position: relative; overflow: hidden; background: linear-gradient(120deg, var(--color-primary-dark) 0%, var(--color-primary) 100%); padding: var(--space-16) 0; text-align: center; }

.cr-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(-45deg, transparent 0 40px, color-mix(in srgb, var(--color-white) 4%, transparent) 40px 41px);
    pointer-events: none;
}

.cr-cta h2 { color: var(--color-white); font-size: clamp(1.75rem, 3.4vw, 2.5rem); margin-bottom: var(--space-3); text-wrap: balance; position: relative; }
.cr-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); max-width: 60ch; margin: 0 auto var(--space-8); line-height: 1.7; position: relative; }
.cr-cta .cr-ctas { justify-content: center; position: relative; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .cr-hero__panel { width: 100%; clip-path: none; opacity: 0.35; }
    .cr-hero__inner { max-width: 100%; }
    .cr-local { grid-template-columns: 1fr; }
    .cr-local__media { position: static; max-width: 520px; }
    .cr-compare { grid-template-columns: 1fr; }
    .cr-claims { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .cr-hero__inner { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .cr-ctas .btn { width: 100%; justify-content: center; }
    .cr-local__media { grid-template-columns: 1fr; }
    .cr-figure--tall { grid-row: auto; aspect-ratio: 3 / 4; }
    .cr-claims__steps { grid-template-columns: 1fr; }
    .cr-review { grid-template-columns: 1fr; }
    .cr-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .cr-figure img, .cr-place, .cr-option, .cr-svc, .cr-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="cr-hero" aria-labelledby="cr-title">
    <div class="cr-hero__panel" aria-hidden="true">
        <?php echo areaPhoto('metal-roof-barn', 'New corrugated metal roof on a barn with white ranch-rail fencing', 1200, 1600, '(max-width: 1024px) 100vw, 46vw', true); ?>
    </div>
    <div class="container">
        <div class="cr-hero__inner">
            <nav class="cr-breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a><span>/</span>
                <a href="/service-areas/">Service Areas</a><span>/</span>
                <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
            </nav>

            <span class="cr-hero__eyebrow">East of Lake Houston · one of 50+ communities we serve</span>

            <h1 id="cr-title">Roofing, Metal Roofs &amp; Storm Damage Repair in <span class="text-accent">Crosby</span>, TX</h1>

            <div class="cr-hero__answer">
                <p>
                    <strong><?php echo htmlspecialchars($siteName); ?> serves Crosby, TX</strong> — one of more than 50 Greater Houston
                    communities covered by our family-owned, father-and-son team based in Humble, in business since 1973. Shingle and
                    metal roofs for homes, barns and shops, storm damage, siding, gutters, patio covers and fences, with a free
                    inspection and written estimate on every project.
                </p>
            </div>

            <div class="cr-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
            </div>
        </div>
    </div>
    <div class="cr-hero__strip">
        <div class="container">
            <ul>
                <li><?php echo icon('award', 16); ?> Nextdoor Neighborhood Favorite 2022–2024</li>
                <li><?php echo icon('hard-hat', 16); ?> Owner on every job</li>
                <li><?php echo icon('home', 16); ?> Father-and-son team since 1973</li>
                <li><?php echo icon('check-circle', 16); ?> Free inspections &amp; estimates</li>
            </ul>
        </div>
    </div>
</section>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="cr-section" aria-labelledby="cr-local-title">
    <div class="container">
        <div class="cr-local">
            <div class="cr-prose">
                <span class="cr-eyebrow">East side of Lake Houston</span>
                <h2 id="cr-local-title">Lake lots, acreage and a working-town roofline</h2>
                <p class="cr-subtitle">Houses, barns, shops and the occasional palapa — we roof all of it.</p>

                <p>
                    Crosby is an unincorporated community in east Harris County where FM 2100 crosses US 90, on the east side of Lake
                    Houston. It's a genuinely mixed place to roof. The Newport subdivision spreads along the lake with homes from the
                    1970s through the 2000s around its golf course; Indian Shores sits on the water further north; the older streets
                    near downtown and the rail line date back decades; and the county roads out toward Barrett and Highlands are
                    acreage — houses with barns, shops, horse property and long fence lines. Crosby ISD covers all of it, and the Crosby
                    Fair &amp; Rodeo each June is the town's calendar anchor.
                </p>
                <p>
                    The terrain is flat, low and open. Lake-side and pasture-side homes take wind with nothing to break it, so we see
                    lifted ridge caps and creased shingles after every strong front, and hail that rolls up from the coast in spring.
                    Gulf humidity streaks shaded slopes with algae. Sandy soils near the San Jacinto bottomland drain fast, but the clay
                    further east holds water, which is why gutters and downspouts come up in nearly every Crosby estimate we write. And
                    on acreage, the question is often shingle or metal — we do both, and we'll tell you honestly which fits the building.
                </p>

                <div class="cr-places">
                    <div class="cr-place"><span class="cr-place__icon"><?php echo icon('map-pin', 22); ?></span><div><strong>Newport &amp; the lake</strong>Golf-course and waterfront homes from three decades of building; open wind exposure, ridge-cap and hip damage after fronts.</div></div>
                    <div class="cr-place"><span class="cr-place__icon"><?php echo icon('home', 22); ?></span><div><strong>Indian Shores &amp; the north end</strong>Lakefront lots with mature trees — shaded slopes, debris in valleys, and docks and outbuildings that need metal.</div></div>
                    <div class="cr-place"><span class="cr-place__icon"><?php echo icon('hammer', 22); ?></span><div><strong>FM 2100 / US 90 &amp; downtown</strong>Older homes with brick chimneys and layered repairs — usually a flashing and pipe-boot conversation before a replacement one.</div></div>
                    <div class="cr-place"><span class="cr-place__icon"><?php echo icon('ruler', 22); ?></span><div><strong>Acreage toward Barrett &amp; Highlands</strong>Houses plus barns, shops and long runs of fence. One inspection, one estimate, one crew for the whole property.</div></div>
                </div>

                <p>
                    Looking for <strong>metal roofing near me in Crosby</strong>, or a shingle roof for the house? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. Tim comes out himself, the inspection is free,
                    and you get photos and a written estimate before deciding anything.
                </p>
            </div>

            <div class="cr-local__media">
                <figure class="cr-figure cr-figure--tall">
                    <?php echo areaPhoto('roof-two-story', 'Two-story brick home during a roof replacement', 1200, 1600, '(max-width: 1024px) 50vw, 20vw'); ?>
                </figure>
                <div class="cr-year"><strong>1973</strong><span>Serving Greater Houston since</span></div>
                <figure class="cr-figure">
                    <?php echo areaPhoto('roof-metal-shop', 'Crew installing a new metal roof on a metal shop building', 1200, 1600, '(max-width: 1024px) 50vw, 20vw'); ?>
                </figure>
            </div>
        </div>
    </div>
</section>

<div class="cr-divider cr-divider--slant" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,0 1440,60 0,60"/></svg>
</div>

<!-- ===================== SIGNATURE: SHINGLE OR METAL ===================== -->
<section class="cr-section cr-section--alt" aria-labelledby="cr-compare-title">
    <div class="container">
        <span class="cr-eyebrow">The acreage question</span>
        <h2 id="cr-compare-title">Shingle or metal? It depends on the building</h2>
        <p class="cr-lead">On an acreage property here we're often asked to look at the house and the barn in the same visit. They usually get different answers — here's how we think about it.</p>

        <div class="cr-compare">
            <article class="cr-option" data-animate>
                <div class="cr-option__img">
                    <?php echo areaPhoto('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, '(max-width: 1024px) 100vw, 50vw'); ?>
                    <span class="cr-option__label">Architectural shingle</span>
                </div>
                <div class="cr-option__body">
                    <h3>Usually the house</h3>
                    <p>Architectural shingles match the neighborhood, come in the colors Newport and lakeside homes expect, and carry a manufacturer warranty — as long as the attic is properly ventilated.</p>
                    <ul>
                        <li><?php echo icon('check-circle', 16); ?> Full tear-off, decking repair, new underlayment and flashing</li>
                        <li><?php echo icon('check-circle', 16); ?> Balanced attic ventilation so the shingle warranty holds</li>
                        <li><?php echo icon('check-circle', 16); ?> Landscaping and pools covered; magnet sweep when we leave</li>
                    </ul>
                </div>
            </article>
            <article class="cr-option" data-animate>
                <div class="cr-option__img">
                    <?php echo areaPhoto('palapa-metal', 'Poolside palapa converted from thatch to a metal roof', 896, 1600, '(max-width: 1024px) 100vw, 50vw'); ?>
                    <span class="cr-option__label">Metal</span>
                </div>
                <div class="cr-option__body">
                    <h3>Barns, shops, palapas — and some homes</h3>
                    <p>Metal sheds debris, handles open-field wind and suits agricultural buildings. Some homeowners choose it for the house too. We've even converted thatched poolside palapas to metal.</p>
                    <ul>
                        <li><?php echo icon('check-circle', 16); ?> Corrugated and standing-profile metal on barns and shop buildings</li>
                        <li><?php echo icon('check-circle', 16); ?> Metal roofs on homes and patio covers</li>
                        <li><?php echo icon('check-circle', 16); ?> One inspection and one written estimate for the whole property</li>
                    </ul>
                </div>
            </article>
        </div>

        <p class="cr-compare__foot">Not sure? That's what the free inspection is for. We'll look at the structure, the pitch, the exposure and your budget and give you a straight recommendation — and a written estimate for each option if you want to compare.</p>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="cr-section" aria-labelledby="cr-svc-title">
    <div class="container">
        <span class="cr-eyebrow">What we do here</span>
        <h2 id="cr-svc-title">Roofing, siding, gutters, patios and fences — one crew for the whole place</h2>
        <p class="cr-lead">Large lots mean more roofline, more fence and more cleanup. <?php echo htmlspecialchars($shortName); ?> handles the whole exterior and leaves the property the way we found it.</p>

        <div class="cr-services">
            <a class="cr-svc" href="/services/roof-replacement/"><span class="cr-svc__icon"><?php echo icon('home', 22); ?></span><strong>Roof Replacement</strong><span>Architectural shingle and metal, for houses and outbuildings.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="cr-svc" href="/services/roof-repair/"><span class="cr-svc__icon"><?php echo icon('wrench', 22); ?></span><strong>Roof Repair &amp; Inspection</strong><span>Leaks, flashing, pipe boots, airflow fixes and wood rot — free photo-documented inspections.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="cr-svc" href="/services/storm-damage-repair/"><span class="cr-svc__icon"><?php echo icon('wind', 22); ?></span><strong>Storm &amp; Hurricane Damage</strong><span>Hail, wind and hurricane repair, documented for your claim. Ask about temporary tarping.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="cr-svc" href="/services/siding-fascia-soffit/"><span class="cr-svc__icon"><?php echo icon('ruler', 22); ?></span><strong>Siding, Fascia &amp; Soffit</strong><span>Hardie and vinyl siding, wood-rot repair, window re-sealing, exterior paint.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="cr-svc" href="/services/gutter-installation/"><span class="cr-svc__icon"><?php echo icon('droplets', 22); ?></span><strong>Gutters</strong><span>New gutters and downspouts that move water away from slab and crawl space.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="cr-svc" href="/services/patio-covers-decks/"><span class="cr-svc__icon"><?php echo icon('hammer', 22); ?></span><strong>Patio Covers, Pergolas &amp; Decks</strong><span>Covered, screened and enclosed patios, pergolas, wood decks.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="cr-svc" href="/services/fences-gates/"><span class="cr-svc__icon"><?php echo icon('shield', 22); ?></span><strong>Fences &amp; Gates</strong><span>Cedar and pine privacy, ranch rail for acreage, custom gates.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="cr-svc" href="/services/attic-venting/"><span class="cr-svc__icon"><?php echo icon('search', 22); ?></span><strong>Attic Venting</strong><span>Balanced intake and exhaust that protects shingles and their warranty.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
        </div>
    </div>
</section>

<div class="cr-divider cr-divider--ridge" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,60 480,10 960,50 1440,0 1440,60"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="cr-section cr-section--dark" aria-labelledby="cr-claims-title">
    <div class="container">
        <div class="cr-claims">
            <div>
                <span class="cr-eyebrow">Hail, wind &amp; hurricane claims</span>
                <h2 id="cr-claims-title">From the first photo to the last shingle, we carry the claim</h2>
                <p>
                    Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience to every storm job
                    out here. We know what an adjuster needs to see, we know what the policy language means, and we take the stress
                    of the process off your plate and put it on ours.
                </p>
                <p class="cr-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. We make sure the damage is documented properly and you understand your options.</p>
            </div>
            <ol class="cr-claims__steps">
                <li><strong>Document</strong>Photos of every slope and every strike before anything is touched.</li>
                <li><strong>Meet the adjuster</strong>At your property, on the roof, together.</li>
                <li><strong>Explain the policy</strong>Deductible, depreciation, scope — in plain English.</li>
                <li><strong>Do the work as agreed</strong>Owner on site, property protected, full cleanup.</li>
            </ol>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="cr-section cr-section--alt" aria-labelledby="cr-reviews-title">
    <div class="container">
        <span class="cr-eyebrow">From our customers</span>
        <h2 id="cr-reviews-title">What Crosby homeowners say about Triple G</h2>
        <p class="cr-lead">Real reviews, published by the client with first name and city.</p>
        <div class="cr-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="cr-review" data-animate>
                <div class="cr-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                <div>
                    <div class="cr-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                    <p><?php echo htmlspecialchars($r['text']); ?></p>
                    <footer><?php echo htmlspecialchars($r['name']); ?> · <span><?php echo htmlspecialchars($r['city']); ?></span></footer>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="cr-section" aria-labelledby="cr-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="cr-eyebrow">Common questions</span>
            <h2 id="cr-faq-title">Straight answers before you call</h2>
        </div>
        <div class="cr-faq">
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
<section class="cr-section cr-section--alt" aria-labelledby="cr-nearby-title">
    <div class="container">
        <span class="cr-eyebrow">Nearby communities</span>
        <h2 id="cr-nearby-title">Up FM 2100, across the lake and down toward the Ship Channel</h2>
        <p class="cr-lead">From here it's a short drive north on FM 2100 to Huffman, across the FM 1960 bridge to Atascocita and Humble, or south to Highlands and Baytown. We cover more than 50 Greater Houston communities in all.</p>
        <div class="cr-nearby">
            <a href="/service-areas/huffman/">Huffman, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/atascocita/">Atascocita, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="cr-chips">
            <?php foreach (['Barrett', 'Highlands', 'Baytown', 'Mont Belvieu', 'Dayton', 'Sheldon', 'Channelview', 'Old River-Winfree'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="cr-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="cr-cta" aria-labelledby="cr-cta-title">
    <div class="container">
        <h2 id="cr-cta-title">House, barn or shop — get a free roof inspection in Crosby</h2>
        <p>Call and we'll come look at the whole property. Photos of what we find, a written estimate, and no pressure — the same way we've done it since 1973.</p>
        <div class="cr-ctas">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
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
    "name": "Roofing, Metal Roofs & Storm Damage Repair in <?php echo htmlspecialchars($areaName); ?>, TX",
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
