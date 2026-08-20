<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Kingwood';
$pageTitle = 'Roof Replacement & Storm Damage Repair in Kingwood, TX | ' . $siteName;
$pageDescription = 'Roof replacement, repair, storm damage, gutters, siding and patio covers in Kingwood, TX from a family-owned contractor based in nearby Humble, in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/kingwood/';

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
$cityReviews = array_slice(array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Kingwood, TX')), 0, 3);

$areaFaqs = [
    [
        'q' => 'Will you help with the HOA paperwork for a new roof in Kingwood?',
        'a' => 'We help with the HOA paperwork. Most villages here have an architectural review step for a roof color or material change, and we supply the product and color information your association asks for. The approval itself is the association\'s decision; we just make sure the packet is complete.',
    ],
    [
        'q' => 'Does tree cover really shorten a roof\'s life?',
        'a' => 'Yes, in a few specific ways. Pine straw and oak leaves dam water in valleys and gutters, shaded slopes stay damp and grow algae and moss, falling limbs puncture shingles, and squirrels get into anything they can reach. None of that means you need a new roof right away — it means a free inspection once a year is worth doing, and gutters and fascia deserve attention.',
    ],
    [
        'q' => 'Can you help with an insurance claim after storm damage?',
        'a' => 'We help you through the whole process. With more than 50 years of roofing, claims-handling and adjuster experience, we document the damage, meet the adjuster at your home and explain your policy in plain English. Whether a claim is approved, and for how much, is always the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix kw-
   Tokens only. Split hero with stat rail, "what we handle /
   what you decide" signature panel, gutters-first services,
   reviews, FAQ, nearby communities.
   ========================================================== */

/* ---------- Hero ---------- */
.kw-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(115deg, var(--color-dark-alt) 0%, var(--color-dark) 50%, color-mix(in srgb, var(--color-dark) 70%, var(--color-primary)) 100%);
    padding: calc(var(--nav-height) + var(--space-12)) 0 0;
    isolation: isolate;
}

.kw-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        radial-gradient(circle at 10% 20%, color-mix(in srgb, var(--color-accent) 18%, transparent) 0%, transparent 40%),
        repeating-linear-gradient(135deg, transparent 0 28px, color-mix(in srgb, var(--color-white) 3%, transparent) 28px 29px);
}

.kw-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.06;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.kw-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
    gap: var(--space-12);
    align-items: end;
}

.kw-hero__copy { padding-bottom: var(--space-16); }

.kw-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.kw-breadcrumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.kw-breadcrumb a:hover { color: var(--color-white); }
.kw-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.kw-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-sm);
    background: color-mix(in srgb, var(--color-accent) 16%, transparent);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
}

.kw-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 4.6vw, 3.6rem);
    line-height: 1.08;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.kw-hero h1 .text-accent { color: var(--color-accent); }

.kw-hero__answer {
    border-left: 4px solid var(--color-accent);
    padding-left: var(--space-5);
    margin-bottom: var(--space-6);
}

.kw-hero__answer p {
    color: color-mix(in srgb, var(--color-white) 90%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.15rem);
    line-height: 1.7;
    margin: 0;
    max-width: 62ch;
}

.kw-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.kw-ctas .btn-lg { font-size: var(--font-size-base); }

.kw-hero__visual {
    position: relative;
    align-self: stretch;
    display: flex;
    align-items: flex-end;
}

.kw-hero__frame {
    width: 100%;
    aspect-ratio: 4 / 5;
    max-height: 560px;
    overflow: hidden;
    border-radius: var(--radius-xl) var(--radius-xl) 0 0;
    box-shadow: var(--shadow-xl);
}

.kw-hero__frame img { width: 100%; height: 100%; object-fit: cover; }

/* Stat rail under hero */
.kw-rail { background: var(--color-primary); }

.kw-rail ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

.kw-rail li {
    padding: var(--space-5) var(--space-6);
    border-right: 1px solid color-mix(in srgb, var(--color-white) 18%, transparent);
    color: var(--color-white);
    display: grid;
    gap: 2px;
}

.kw-rail li:last-child { border-right: 0; }
.kw-rail strong { font-family: var(--font-heading); font-size: var(--font-size-2xl); line-height: 1; }
.kw-rail span { font-size: var(--font-size-xs); letter-spacing: 0.06em; text-transform: uppercase; color: color-mix(in srgb, var(--color-white) 80%, transparent); }

/* ---------- Section scaffolding ---------- */
.kw-section { padding: var(--space-16) 0; }
.kw-section--alt { background: var(--color-light); }
.kw-section--dark { background: var(--color-dark); color: var(--color-white); }

.kw-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.kw-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.kw-section--dark h2 { color: var(--color-white); }
.kw-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.kw-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.kw-prose a { color: var(--color-primary); font-weight: 600; }
.kw-prose a:hover { text-decoration: underline; }
.kw-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }

/* ---------- Local context ---------- */
.kw-local {
    display: grid;
    grid-template-columns: minmax(0, 3fr) minmax(0, 2fr);
    gap: var(--space-12);
    align-items: start;
}

.kw-local__aside { display: grid; gap: var(--space-5); position: sticky; top: calc(var(--nav-height) + var(--space-4)); }

.kw-figure { overflow: hidden; border-radius: var(--radius-xl); box-shadow: var(--shadow-card); aspect-ratio: 4 / 5; }
.kw-figure--wide { aspect-ratio: 4 / 3; }
.kw-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.kw-figure:hover img { transform: scale(1.04); }

.kw-villages {
    margin: var(--space-6) 0;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
}

.kw-villages__head {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-4) var(--space-6);
    background: var(--color-dark);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-weight: 600;
}

.kw-villages__head svg { color: var(--color-accent); }
.kw-villages ul { list-style: none; margin: 0; padding: 0; }

.kw-villages li {
    display: grid;
    grid-template-columns: 150px 1fr;
    gap: var(--space-4);
    padding: var(--space-4) var(--space-6);
    border-top: 1px solid var(--color-border);
    background: var(--color-white);
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    line-height: 1.6;
}

.kw-villages li:nth-child(even) { background: var(--color-light); }
.kw-villages li strong { color: var(--color-dark); font-family: var(--font-heading); }

/* ---------- Signature: handle vs decide ---------- */
.kw-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.kw-panel {
    border-radius: var(--radius-xl);
    padding: var(--space-8);
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-card);
}

.kw-panel--we { background: var(--color-dark); color: var(--color-white); }
.kw-panel--you { background: var(--color-white); border: 1px solid var(--color-border); }

.kw-panel::after {
    content: '';
    position: absolute;
    right: -60px;
    bottom: -60px;
    width: 200px;
    height: 200px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-accent) 20%, transparent);
    pointer-events: none;
}

.kw-panel--you::after { background: color-mix(in srgb, var(--color-primary) 10%, transparent); }

.kw-panel h3 {
    font-size: var(--font-size-xl);
    margin-bottom: var(--space-5);
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.kw-panel--we h3 { color: var(--color-white); }
.kw-panel--we h3 svg { color: var(--color-accent); }
.kw-panel--you h3 svg { color: var(--color-primary); }

.kw-panel ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-3); position: relative; }
.kw-panel li { display: flex; gap: var(--space-3); line-height: 1.6; font-size: var(--font-size-sm); }
.kw-panel--we li { color: color-mix(in srgb, var(--color-white) 85%, transparent); }
.kw-panel--you li { color: var(--color-gray-dark); }
.kw-panel li svg { flex-shrink: 0; margin-top: 3px; }
.kw-panel--we li svg { color: var(--color-accent); }
.kw-panel--you li svg { color: var(--color-primary); }

.kw-panel__foot {
    margin-top: var(--space-6);
    padding-top: var(--space-4);
    border-top: 1px solid color-mix(in srgb, var(--color-white) 15%, transparent);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 70%, transparent);
}

.kw-panel--you .kw-panel__foot { border-top-color: var(--color-border); color: var(--color-gray); }

/* ---------- Services: gutters-first ---------- */
.kw-services {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
}

.kw-feature {
    position: relative;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    aspect-ratio: 4 / 5;
    max-width: 460px;
}

.kw-feature img { width: 100%; height: 100%; object-fit: cover; }

.kw-feature__cap {
    position: absolute;
    left: var(--space-5);
    right: var(--space-5);
    bottom: var(--space-5);
    background: color-mix(in srgb, var(--color-dark) 85%, transparent);
    backdrop-filter: blur(6px);
    color: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-4) var(--space-5);
    font-size: var(--font-size-sm);
    line-height: 1.5;
}

.kw-feature__cap strong { display: block; font-family: var(--font-heading); color: var(--color-accent); margin-bottom: 2px; }

.kw-svc-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); margin-top: var(--space-6); }

.kw-svc {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.kw-svc:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.kw-svc:nth-child(4n+1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.kw-svc:nth-child(4n+2) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.kw-svc:nth-child(4n+3) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }
.kw-svc:nth-child(4n) { background: var(--color-white); }

.kw-svc svg { color: var(--color-primary); }
.kw-svc strong { font-family: var(--font-heading); color: var(--color-dark); }
.kw-svc span { font-size: var(--font-size-xs); color: var(--color-gray); line-height: 1.5; }

/* ---------- Claims ---------- */
.kw-claims { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: var(--space-12); align-items: center; }
.kw-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 58ch; }

.kw-claims__list { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-4); }

.kw-claims__list li {
    display: grid;
    grid-template-columns: 48px 1fr;
    gap: var(--space-4);
    align-items: start;
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    line-height: 1.6;
}

.kw-claims__list li span:first-child {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    background: color-mix(in srgb, var(--color-white) 8%, transparent);
    color: var(--color-accent);
}

.kw-claims__list strong { display: block; color: var(--color-white); }
.kw-claims__note { margin-top: var(--space-5); font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); border-left: 3px solid var(--color-accent); padding-left: var(--space-4); }

/* ---------- Reviews ---------- */
.kw-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 320px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.kw-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-8) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
}

.kw-review::before {
    content: '\201C';
    position: absolute;
    top: var(--space-2);
    right: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-primary) 25%, transparent);
}

.kw-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.kw-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); }
.kw-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }
.kw-review__avatar { width: 40px; height: 40px; border-radius: var(--radius-full); display: grid; place-items: center; background: var(--color-dark); color: var(--color-accent); font-weight: 700; }
.kw-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.kw-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.kw-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.kw-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.kw-faq summary {
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

.kw-faq summary::-webkit-details-marker { display: none; }
.kw-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.kw-faq details[open] summary svg { transform: rotate(45deg); }
.kw-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.kw-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.kw-nearby a {
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

.kw-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.kw-nearby a svg { color: var(--color-primary); }

.kw-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.kw-chips span, .kw-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.kw-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.kw-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.kw-divider { line-height: 0; display: block; }
.kw-divider svg { width: 100%; height: 60px; display: block; }
.kw-divider--steps { background: var(--color-white); }
.kw-divider--steps svg { fill: var(--color-light); }
.kw-divider--swoop { background: var(--color-white); }
.kw-divider--swoop svg { fill: var(--color-dark); }

/* ---------- CTA ---------- */
.kw-cta { position: relative; overflow: hidden; background: linear-gradient(120deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); padding: var(--space-16) 0; }

.kw-cta__inner { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.kw-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.kw-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .kw-hero__grid { grid-template-columns: 1fr; }
    .kw-hero__copy { padding-bottom: var(--space-10); }
    .kw-hero__frame { max-width: 420px; max-height: 420px; }
    .kw-rail ul { grid-template-columns: 1fr 1fr; }
    .kw-rail li:nth-child(2) { border-right: 0; }
    .kw-rail li:nth-child(-n+2) { border-bottom: 1px solid color-mix(in srgb, var(--color-white) 18%, transparent); }
    .kw-local { grid-template-columns: 1fr; }
    .kw-local__aside { position: static; grid-template-columns: 1fr 1fr; }
    .kw-split { grid-template-columns: 1fr; }
    .kw-services { grid-template-columns: 1fr; }
    .kw-claims { grid-template-columns: 1fr; }
    .kw-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .kw-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .kw-ctas .btn { width: 100%; justify-content: center; }
    .kw-hero__visual { display: none; }
    .kw-rail ul { grid-template-columns: 1fr; }
    .kw-rail li { border-right: 0; border-bottom: 1px solid color-mix(in srgb, var(--color-white) 18%, transparent); }
    .kw-local__aside { grid-template-columns: 1fr; }
    .kw-villages li { grid-template-columns: 1fr; gap: var(--space-1); }
    .kw-svc-grid { grid-template-columns: 1fr; }
    .kw-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .kw-figure img, .kw-svc, .kw-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="kw-hero" aria-labelledby="kw-title">
    <div class="container">
        <div class="kw-hero__grid">
            <div class="kw-hero__copy">
                <nav class="kw-breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="kw-hero__eyebrow"><?php echo icon('map-pin', 14); ?> The Livable Forest · one of 50+ communities we serve</span>

                <h1 id="kw-title">Roof Replacement &amp; Storm Damage Repair in <span class="text-accent">Kingwood</span>, TX</h1>

                <div class="kw-hero__answer">
                    <p>
                        <strong><?php echo htmlspecialchars($siteName); ?> serves Kingwood, TX</strong> — one of more than 50 Greater Houston
                        communities covered by our family-owned, father-and-son team based in neighboring Humble, in business since 1973.
                        Roof replacement and repair under heavy tree cover, storm damage, gutters, siding, patio covers and fences, with a
                        free inspection and written estimate on every project.
                    </p>
                </div>

                <div class="kw-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
                </div>
            </div>

            <div class="kw-hero__visual">
                <div class="kw-hero__frame">
                    <?php echo areaPhoto('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, '(max-width: 1024px) 420px, 38vw', true); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="kw-rail" aria-label="At a glance">
        <div class="container">
            <ul>
                <li><strong>1973</strong><span>In business since</span></li>
                <li><strong>Father &amp; son</strong><span>Family owned and operated</span></li>
                <li><strong>3× Favorite</strong><span>Nextdoor 2022 · 2023 · 2024</span></li>
                <li><strong>Free</strong><span>Inspections &amp; estimates</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="kw-section" aria-labelledby="kw-local-title">
    <div class="container">
        <div class="kw-local">
            <div class="kw-prose">
                <span class="kw-eyebrow">The Livable Forest</span>
                <h2 id="kw-local-title">Roofing under the canopy of the Livable Forest</h2>
                <p class="kw-subtitle">The trees are the point of living here. They're also the thing your roof fights every day.</p>

                <p>
                    Kingwood was laid out starting in 1971 as a master-planned community of villages threaded together by greenbelt
                    trails, and the City of Houston annexed it in 1996. The oldest villages — Trailwood, Woodland Hills, Bear Branch —
                    are on their third or fourth roof now; Elm Grove, Kings Point and Kingwood Greens came later, and Kings River and
                    the newer sections toward Lake Houston later still. Kingwood Drive is the spine, Humble ISD runs the schools, and
                    almost every lot sits under mature loblolly pine, oak and sweetgum.
                </p>
                <p>
                    That canopy changes how roofs fail here. Pine straw and leaves dam water in valleys and gutters and rot the
                    fascia behind them. Shaded north slopes stay damp and grow moss and algae. Limbs punch holes that don't leak until
                    months later. And anything a squirrel can reach, a squirrel will chew — vent pipes and lead boots included. One
                    customer here has had us back repeatedly for exactly that mix: squirrels, leaky vent pipes, drainage and
                    overgrown trees rubbing the shingles. We come out, look at it, photograph it and fix what actually needs fixing.
                </p>

                <div class="kw-villages">
                    <div class="kw-villages__head"><?php echo icon('map-pin', 18); ?> The villages, by what we usually find</div>
                    <ul>
                        <li><strong>Trailwood, Woodland Hills, Bear Branch</strong><span>The original 1970s–80s villages. Roofs on their third or fourth cycle, fascia and soffit rot from decades of leaf load, older gutters.</span></li>
                        <li><strong>Elm Grove, Kings Point, Kingwood Greens</strong><span>1980s–90s homes with steeper pitches and more dormers; valley leaks and moss on shaded slopes are the common calls.</span></li>
                        <li><strong>Kings River &amp; the lake side</strong><span>Newer homes with more open wind exposure off Lake Houston — lifted ridge caps after a front, and builder shingles reaching their first real storms.</span></li>
                        <li><strong>Along Kingwood Drive</strong><span>Established streets with the heaviest canopy — where a yearly free inspection and clean gutters earn their keep.</span></li>
                    </ul>
                </div>

                <p>
                    Looking for <strong>roof replacement near me in Kingwood</strong>? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. Tim handles the inspection himself, at no
                    charge, and leaves the decision with you — nothing pushy.
                </p>
            </div>

            <aside class="kw-local__aside">
                <figure class="kw-figure">
                    <?php echo areaPhoto('crew-underlayment', 'Triple G roofers installing synthetic underlayment on a steep roof', 1200, 1600, '(max-width: 1024px) 50vw, 32vw'); ?>
                </figure>
                <figure class="kw-figure kw-figure--wide">
                    <?php echo areaPhoto('roof-inspection-v2', 'Close-up of cracked and lifted shingles found during a roof inspection', 1200, 1600, '(max-width: 1024px) 50vw, 32vw'); ?>
                </figure>
            </aside>
        </div>
    </div>
</section>

<div class="kw-divider kw-divider--steps" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,60 0,40 360,40 360,20 720,20 720,0 1440,0 1440,60"/></svg>
</div>

<!-- ===================== SIGNATURE: WHAT WE HANDLE / WHAT YOU DECIDE ===================== -->
<section class="kw-section kw-section--alt" aria-labelledby="kw-split-title">
    <div class="container">
        <span class="kw-eyebrow">HOA paperwork &amp; insurance claims</span>
        <h2 id="kw-split-title">What we handle, and what stays your call</h2>
        <p class="kw-lead">A roof here usually involves two sets of paperwork — the village architectural review and, after a storm, the insurance claim. Here's the honest division of labor.</p>

        <div class="kw-split">
            <div class="kw-panel kw-panel--we" data-animate>
                <h3><?php echo icon('hard-hat', 22); ?> What Triple G handles</h3>
                <ul>
                    <li><?php echo icon('check-circle', 18); ?> A free, photo-documented inspection of every slope</li>
                    <li><?php echo icon('check-circle', 18); ?> Product and color information for your HOA's architectural review packet</li>
                    <li><?php echo icon('check-circle', 18); ?> Meeting the insurance adjuster at your home and walking the roof together</li>
                    <li><?php echo icon('check-circle', 18); ?> Explaining your policy — deductible, depreciation, scope — in plain English</li>
                    <li><?php echo icon('check-circle', 18); ?> The work itself: owner on site, landscaping covered, daily cleanup, magnet sweep</li>
                </ul>
                <p class="kw-panel__foot">More than 50 years of roofing, claims-handling and adjuster experience between Glenn and Tim Menn.</p>
            </div>
            <div class="kw-panel kw-panel--you" data-animate>
                <h3><?php echo icon('home', 22); ?> What stays your decision</h3>
                <ul>
                    <li><?php echo icon('check-circle', 18); ?> Whether to repair or replace — we give you the photos and a written estimate for each</li>
                    <li><?php echo icon('check-circle', 18); ?> Shingle style and color, within your village's approved palette</li>
                    <li><?php echo icon('check-circle', 18); ?> When to schedule — we'll get you on the calendar when you're ready</li>
                    <li><?php echo icon('check-circle', 18); ?> Whether to add gutters, fascia repair or attic ventilation while the crew is there</li>
                </ul>
                <p class="kw-panel__foot">HOA approval is your association's decision. Whether a claim is approved, and for how much, is your insurance carrier's decision.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="kw-section" aria-labelledby="kw-svc-title">
    <div class="container">
        <div class="kw-services">
            <div class="kw-feature" data-animate>
                <?php echo areaPhoto('roof-overhead', 'Overhead view of a completed architectural shingle roof', 1200, 1600, '(max-width: 1024px) 100vw, 460px'); ?>
                <div class="kw-feature__cap"><strong>Roofing / Siding</strong> Full roof replacements and repairs, plus the gutters, fascia and soffit that take the worst of the leaf load.</div>
            </div>
            <div>
                <span class="kw-eyebrow">What we do here</span>
                <h2 id="kw-svc-title">Roofs, gutters and fascia — then everything else on the exterior</h2>
                <p class="kw-lead">Under this much tree cover, gutters and fascia are part of the roofing conversation, not an add-on. <?php echo htmlspecialchars($shortName); ?> handles all of it with one crew.</p>
                <div class="kw-svc-grid">
                    <a class="kw-svc" href="/services/roof-replacement/"><?php echo icon('home', 22); ?><strong>Roof Replacement</strong><span>Architectural shingle &amp; metal; tear-off, decking, underlayment</span></a>
                    <a class="kw-svc" href="/services/roof-repair/"><?php echo icon('wrench', 22); ?><strong>Roof Repair &amp; Inspection</strong><span>Leaks, flashing, pipe boots, squirrel damage, wood rot</span></a>
                    <a class="kw-svc" href="/services/gutter-installation/"><?php echo icon('droplets', 22); ?><strong>Gutters</strong><span>New gutters and downspouts sized for leaf load and Houston rain</span></a>
                    <a class="kw-svc" href="/services/siding-fascia-soffit/"><?php echo icon('ruler', 22); ?><strong>Siding, Fascia &amp; Soffit</strong><span>Rot repair, Hardie and vinyl siding, window re-sealing, paint</span></a>
                    <a class="kw-svc" href="/services/storm-damage-repair/"><?php echo icon('wind', 22); ?><strong>Storm &amp; Wind Damage</strong><span>Hail, wind and limb damage, documented for your claim</span></a>
                    <a class="kw-svc" href="/services/attic-venting/"><?php echo icon('search', 22); ?><strong>Attic Venting</strong><span>Balanced intake and exhaust that protects shingles and their warranty</span></a>
                    <a class="kw-svc" href="/services/patio-covers-decks/"><?php echo icon('hammer', 22); ?><strong>Patio Covers, Pergolas &amp; Decks</strong><span>Covered and screened patios, pergolas, wood decks</span></a>
                    <a class="kw-svc" href="/services/fences-gates/"><?php echo icon('shield', 22); ?><strong>Fences &amp; Gates</strong><span>Cedar and pine privacy, ranch rail, custom gates</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="kw-divider kw-divider--swoop" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,60 C360,0 1080,60 1440,10 L1440,60 Z"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="kw-section kw-section--dark" aria-labelledby="kw-claims-title">
    <div class="container">
        <div class="kw-claims">
            <div>
                <span class="kw-eyebrow">After hail, wind or a fallen limb</span>
                <h2 id="kw-claims-title">The claim process, handled by people who have sat on the adjuster's side</h2>
                <p>
                    A homeowner here told us he expected a hassle and a major expense, and instead got an inspection at no charge,
                    a plain-English walk-through of how to work with his insurance company, and no pressure to decide. That's how
                    every storm job starts.
                </p>
                <p class="kw-claims__note">Coverage is always the insurance carrier's decision. We make sure the damage is documented properly and that you understand what your policy says.</p>
            </div>
            <ul class="kw-claims__list">
                <li><span><?php echo icon('search', 22); ?></span><span><strong>Document</strong>Photos of every slope, every strike, every lifted shingle before anything is touched.</span></li>
                <li><span><?php echo icon('hard-hat', 22); ?></span><span><strong>Meet the adjuster</strong>We walk the roof with them so nothing is missed or misunderstood.</span></li>
                <li><span><?php echo icon('check-circle', 22); ?></span><span><strong>Explain the policy</strong>Deductible, depreciation and scope, line by line, before you sign anything.</span></li>
                <li><span><?php echo icon('home', 22); ?></span><span><strong>Do the work as agreed</strong>Owner on site, landscaping covered, daily cleanup, magnet sweep.</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="kw-section kw-section--alt" aria-labelledby="kw-reviews-title">
    <div class="container">
        <span class="kw-eyebrow">From our customers</span>
        <h2 id="kw-reviews-title">What Kingwood homeowners say about Triple G</h2>
        <p class="kw-lead">Real reviews, published by the client with first name and city.</p>
        <div class="kw-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="kw-review" data-animate>
                <div class="kw-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="kw-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="kw-section" aria-labelledby="kw-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="kw-eyebrow">Common questions</span>
            <h2 id="kw-faq-title">Straight answers before you call</h2>
        </div>
        <div class="kw-faq">
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
<section class="kw-section kw-section--alt" aria-labelledby="kw-nearby-title">
    <div class="container">
        <span class="kw-eyebrow">Nearby communities</span>
        <h2 id="kw-nearby-title">Across the river and around the lake</h2>
        <p class="kw-lead">Humble and Atascocita are just across the San Jacinto on US 59, and the east side of Lake Houston is a short drive. We cover more than 50 Greater Houston communities in all.</p>
        <div class="kw-nearby">
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/atascocita/">Atascocita, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/huffman/">Huffman, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/crosby/">Crosby, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="kw-chips">
            <?php foreach (['Porter', 'Porter Heights', 'New Caney', 'Woodbranch', 'Roman Forest', 'Splendora', 'Spring'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="kw-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="kw-cta" aria-labelledby="kw-cta-title">
    <div class="container">
        <div class="kw-cta__inner">
            <div>
                <h2 id="kw-cta-title">Free roof inspection under the canopy — photos included, no pressure</h2>
                <p>Call and we'll come take a look. The owner handles the inspection, you get the pictures and a written estimate, and the decision stays with you.</p>
            </div>
            <div class="kw-ctas">
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
    "name": "Roof Replacement & Storm Damage Repair in <?php echo htmlspecialchars($areaName); ?>, TX",
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
