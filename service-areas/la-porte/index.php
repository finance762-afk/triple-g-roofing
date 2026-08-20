<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'La Porte';
$pageTitle = 'Roof Repair & Replacement in La Porte, TX | Triple G Roofing';
$pageDescription = 'Roof replacement, storm repair, siding and gutters for La Porte, TX homes near Galveston Bay — family-owned since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/la-porte/';
$ogImage = 'roof-finished-brick-960.webp';

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

/* No published reviews carry a La Porte address yet — show real storm/claim reviews from across Greater Houston instead */
$areaReviews = getTestimonialsFor('storm-damage-repair', 3);

$areaFaqs = [
    [
        'q' => 'Does Triple G Roofing & Construction work in La Porte?',
        'a' => 'Yes. Triple G Roofing & Construction is based in Humble, TX and serves La Porte as one of more than 50 Greater Houston communities, from Sylvan Beach and Lomax to the Fairmont Park subdivisions. Call and we come to you; the inspection and the written estimate are free.',
    ],
    [
        'q' => 'How does salt air off Galveston Bay affect a roof?',
        'a' => 'Salt-laden air attacks exposed metal first: nail heads, flashing, drip edge, vent caps and gutter hangers corrode years before the shingles themselves wear out, and a rusted fastener is a loose shingle waiting for the next bay wind. On a bayside inspection we check every piece of exposed metal and every shingle edge for uplift, photograph what we find and put it in writing.',
    ],
    [
        'q' => 'Can you help with a storm-damage insurance claim?',
        'a' => 'We can. Triple G Roofing & Construction brings more than 50 years of claims-handling and adjuster experience to every storm job: we document the damage, meet the adjuster on the roof and explain the paperwork in plain English. Whether a claim is approved, and for how much, is the insurance carrier\'s decision — our job is to make sure the damage is documented properly and you understand your options.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix lp-
   Tokens only. Split hero with arched bayside photo, dark
   trust ribbon, reversed local-context split, staircase
   signature section (salt air + bay wind), service tile grid,
   claims timeline row, featured-plus-stack reviews.
   ========================================================== */

/* ---------- Reveal directions (page-scoped modifiers on [data-animate]) ---------- */
[data-animate].lp-in-left { transform: translateX(-32px); }
[data-animate].lp-in-right { transform: translateX(32px); }
[data-animate].lp-in-scale { transform: scale(0.94); }
[data-animate].lp-in-left.animated,
[data-animate].lp-in-right.animated,
[data-animate].lp-in-scale.animated { transform: none; }

/* ---------- Hero: split, light, arched photo ---------- */
.lp-hero {
    position: relative;
    overflow: hidden;
    isolation: isolate;
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
    background: var(--color-light);
}

.lp-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        radial-gradient(ellipse at 85% 20%, color-mix(in srgb, var(--color-accent) 22%, transparent) 0%, transparent 55%),
        linear-gradient(180deg, var(--color-white) 0%, var(--color-light) 60%, color-mix(in srgb, var(--color-accent) 10%, var(--color-light)) 100%);
}

.lp-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.05;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.lp-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
    gap: var(--space-12);
    align-items: center;
}

.lp-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: var(--color-gray);
}

.lp-breadcrumb a { color: var(--color-gray-dark); transition: color var(--transition-fast); }
.lp-breadcrumb a:hover { color: var(--color-primary); }
.lp-breadcrumb [aria-current] { color: var(--color-dark); font-weight: 600; }

.lp-hero__pill {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    color: var(--color-primary);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
    box-shadow: var(--shadow-sm);
}

.lp-hero h1 {
    color: var(--color-dark);
    font-size: clamp(2.3rem, 5vw, 4rem);
    line-height: 1.04;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.lp-hero h1 em { font-style: normal; color: var(--color-primary); }

.lp-hero__answer {
    color: var(--color-gray-dark);
    font-size: clamp(1rem, 1.6vw, 1.18rem);
    line-height: 1.75;
    max-width: 60ch;
    margin-bottom: var(--space-8);
}

.lp-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }

.lp-hero__figure {
    position: relative;
    justify-self: end;
    width: min(100%, 440px);
    aspect-ratio: 3 / 4;
    border-radius: var(--radius-full) var(--radius-full) var(--radius-xl) var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}

.lp-hero__figure img { width: 100%; height: 100%; object-fit: cover; object-position: center; }

.lp-hero__frame {
    position: absolute;
    inset: auto 0 0 auto;
    width: min(100%, 440px);
    aspect-ratio: 3 / 4;
    transform: translate(var(--space-4), var(--space-4));
    border: 2px solid var(--color-accent);
    border-radius: var(--radius-full) var(--radius-full) var(--radius-xl) var(--radius-xl);
    pointer-events: none;
    z-index: -1;
}

.lp-hero__photo-wrap { position: relative; justify-self: end; width: min(100%, 440px); }

.lp-hero__badge {
    position: absolute;
    left: calc(-1 * var(--space-8));
    bottom: var(--space-10);
    background: var(--color-dark);
    color: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-4) var(--space-5);
    box-shadow: var(--shadow-lg);
    display: grid;
    gap: 2px;
    z-index: 2;
}

.lp-hero__badge strong { font-family: var(--font-heading); font-size: var(--font-size-2xl); line-height: 1; color: var(--color-accent); }
.lp-hero__badge span { font-size: var(--font-size-xs); color: color-mix(in srgb, var(--color-white) 80%, transparent); }

/* ---------- Trust ribbon ---------- */
.lp-ribbon {
    background: var(--color-dark);
    border-top: 4px solid var(--color-primary);
    color: var(--color-white);
}

.lp-ribbon__row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

.lp-ribbon__item {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-6) var(--space-5);
    border-left: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
}

.lp-ribbon__item:first-child { border-left: 0; padding-left: 0; }
.lp-ribbon__item svg { color: var(--color-accent); flex-shrink: 0; }
.lp-ribbon__item strong { display: block; font-family: var(--font-heading); font-size: var(--font-size-lg); line-height: 1.1; }
.lp-ribbon__item span { font-size: var(--font-size-xs); color: color-mix(in srgb, var(--color-white) 70%, transparent); }

/* ---------- Section scaffolding ---------- */
.lp-section { padding: var(--space-16) 0; }
.lp-section--alt { background: var(--color-light); }
.lp-section--dark { background: var(--color-dark-alt); color: var(--color-white); }

.lp-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.lp-eyebrow::before { content: ''; width: var(--space-6); height: 2px; background: var(--color-accent); }

.lp-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.lp-section--dark h2 { color: var(--color-white); }

.lp-subtitle {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}

.lp-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.lp-prose a { color: var(--color-primary); font-weight: 600; }
.lp-prose a:hover { text-decoration: underline; }
.lp-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.lp-section--dark .lp-lead { color: color-mix(in srgb, var(--color-white) 82%, transparent); }

/* ---------- Local context: figure left, numbered facts right ---------- */
.lp-local {
    display: grid;
    grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr);
    gap: var(--space-12);
    align-items: start;
}

.lp-figure {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 3 / 4;
}

.lp-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.lp-figure:hover img { transform: scale(1.04); }

.lp-figure--tab::after {
    content: '';
    position: absolute;
    left: var(--space-5);
    bottom: 0;
    width: var(--space-16);
    height: var(--space-2);
    background: var(--color-primary);
    border-radius: var(--radius-full) var(--radius-full) 0 0;
}

.lp-facts { counter-reset: fact; list-style: none; margin: var(--space-6) 0; padding: 0; display: grid; gap: var(--space-3); }

.lp-facts li {
    counter-increment: fact;
    display: grid;
    grid-template-columns: var(--space-10) 1fr;
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

.lp-facts li:hover { transform: translateX(4px); box-shadow: var(--shadow-md); }

.lp-facts li::before {
    content: counter(fact, decimal-leading-zero);
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: var(--font-size-lg);
    color: var(--color-accent);
    line-height: 1.3;
}

.lp-facts li:nth-child(even)::before { color: var(--color-primary); }
.lp-facts strong { display: block; color: var(--color-dark); }

/* ---------- Signature: salt-air staircase ---------- */
.lp-stairs {
    position: relative;
    margin-top: var(--space-10);
    display: grid;
    gap: var(--space-5);
    padding-left: var(--space-8);
}

.lp-stairs::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: var(--space-2);
    width: 3px;
    border-radius: var(--radius-full);
    background: linear-gradient(180deg, var(--color-accent) 0%, var(--color-primary) 60%, var(--color-dark) 100%);
}

.lp-step {
    position: relative;
    display: grid;
    grid-template-columns: auto minmax(0, 1fr) minmax(0, 1.2fr);
    gap: var(--space-6);
    align-items: center;
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    padding: var(--space-6) var(--space-7);
    box-shadow: var(--shadow-card);
    width: calc(100% - var(--step-offset, 0px));
    margin-left: var(--step-offset, 0px);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.lp-step:nth-child(1) { --step-offset: 0px; }
.lp-step:nth-child(2) { --step-offset: var(--space-8); }
.lp-step:nth-child(3) { --step-offset: var(--space-16); }
.lp-step:nth-child(4) { --step-offset: calc(var(--space-16) + var(--space-8)); }

.lp-step:hover { transform: translateY(-3px); box-shadow: var(--shadow-lg); }

.lp-step::before {
    content: '';
    position: absolute;
    top: 50%;
    left: calc(-1 * var(--step-offset, 0px) - var(--space-6) - 1px);
    width: calc(var(--step-offset, 0px) + var(--space-6));
    height: 2px;
    background: color-mix(in srgb, var(--color-dark) 18%, transparent);
}

.lp-step__num {
    font-family: var(--font-heading);
    font-size: var(--font-size-4xl);
    font-weight: 800;
    line-height: 1;
    color: color-mix(in srgb, var(--color-accent) 55%, var(--color-white));
}

.lp-step:nth-child(even) .lp-step__num { color: color-mix(in srgb, var(--color-primary) 45%, var(--color-white)); }

.lp-step h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-2); text-wrap: balance; }
.lp-step p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; }

.lp-step__fix {
    border-left: 3px solid var(--color-accent);
    padding-left: var(--space-4);
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
    line-height: 1.65;
}

.lp-step__fix strong { color: var(--color-dark); display: block; font-family: var(--font-heading); margin-bottom: var(--space-1); }

/* ---------- Services tile grid ---------- */
.lp-tiles {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: var(--space-4);
    margin-top: var(--space-8);
}

.lp-tile {
    display: grid;
    gap: var(--space-3);
    align-content: start;
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    color: var(--color-dark);
    min-height: 170px;
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.lp-tile:nth-child(5n+1) { background: color-mix(in srgb, var(--color-primary) 7%, var(--color-white)); }
.lp-tile:nth-child(5n+3) { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }
.lp-tile:nth-child(5n) { background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); }

.lp-tile:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.lp-tile svg { color: var(--color-primary); }
.lp-tile strong { font-family: var(--font-heading); font-size: var(--font-size-base); line-height: 1.25; }
.lp-tile small { color: var(--color-gray); font-size: var(--font-size-xs); line-height: 1.5; }

.lp-svc-split {
    display: grid;
    grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
    gap: var(--space-10);
    align-items: end;
}

.lp-svc-split .lp-figure { aspect-ratio: 4 / 5; max-width: 380px; justify-self: end; }

/* ---------- Claims timeline row ---------- */
.lp-claims-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-5);
    margin-top: var(--space-10);
    position: relative;
}

.lp-claims-row::before {
    content: '';
    position: absolute;
    top: 26px;
    left: 6%;
    right: 6%;
    height: 2px;
    background: repeating-linear-gradient(90deg, var(--color-accent) 0 12px, transparent 12px 20px);
    opacity: 0.7;
}

.lp-claim {
    position: relative;
    padding-top: var(--space-16);
}

.lp-claim__dot {
    position: absolute;
    top: 0;
    left: 0;
    width: 52px;
    height: 52px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-dark-alt);
    border: 2px solid var(--color-accent);
    color: var(--color-accent);
}

.lp-claim strong { display: block; font-family: var(--font-heading); color: var(--color-white); margin-bottom: var(--space-2); font-size: var(--font-size-lg); }
.lp-claim span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); line-height: 1.6; }

.lp-claims-note {
    margin-top: var(--space-10);
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 7%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-accent) 50%, transparent);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    max-width: 70ch;
    line-height: 1.7;
}

/* ---------- Reviews: featured + stack ---------- */
.lp-reviews {
    display: grid;
    grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.lp-reviews__stack { display: grid; gap: var(--space-6); }

.lp-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-7);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
}

.lp-review--featured {
    background: linear-gradient(160deg, var(--color-white) 0%, color-mix(in srgb, var(--color-accent) 12%, var(--color-white)) 100%);
    border-color: color-mix(in srgb, var(--color-accent) 40%, var(--color-border));
}

.lp-review__mark {
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 0.6;
    color: color-mix(in srgb, var(--color-accent) 45%, transparent);
    margin-bottom: var(--space-4);
}

.lp-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.lp-review p { color: var(--color-gray-dark); line-height: 1.75; font-size: var(--font-size-sm); margin-bottom: var(--space-4); flex: 1; }
.lp-review--featured p { font-size: var(--font-size-base); }

.lp-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }

.lp-review__avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
    font-weight: 700;
}

.lp-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.lp-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); counter-reset: faq; }

.lp-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    counter-increment: faq;
}

.lp-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-accent) 60%, var(--color-border)); }

.lp-faq summary {
    cursor: pointer;
    list-style: none;
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-5) var(--space-6);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
}

.lp-faq summary::before { content: counter(faq, decimal-leading-zero); color: var(--color-accent); font-weight: 800; }
.lp-faq summary::-webkit-details-marker { display: none; }
.lp-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.lp-faq details[open] summary svg { transform: rotate(180deg); }
.lp-faq details p { padding: 0 var(--space-6) var(--space-6) calc(var(--space-6) + var(--space-8)); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.lp-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.lp-nearby a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-bottom: 3px solid var(--color-accent);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
    transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast);
}

.lp-nearby a:hover { border-bottom-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.lp-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.lp-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.lp-chips span, .lp-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: var(--color-white); border: 1px solid var(--color-border); color: var(--color-gray-dark); }
.lp-chips a { background: var(--color-dark); border-color: var(--color-dark); color: var(--color-white); font-weight: 600; }

.lp-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers: zigzag + wave ---------- */
.lp-divider { line-height: 0; display: block; }
.lp-divider svg { width: 100%; height: 48px; display: block; }
.lp-divider--zig { background: var(--color-white); }
.lp-divider--zig svg { fill: var(--color-light); }
.lp-divider--wave { background: var(--color-white); }
.lp-divider--wave svg { fill: var(--color-dark-alt); }

/* ---------- CTA ---------- */
.lp-cta {
    position: relative;
    overflow: hidden;
    background: var(--color-primary);
    padding: var(--space-16) 0;
}

.lp-cta::before {
    content: '';
    position: absolute;
    right: -10%;
    top: -40%;
    width: 50%;
    aspect-ratio: 1;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-white) 10%, transparent);
    pointer-events: none;
}

.lp-cta__inner { position: relative; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.lp-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.lp-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }
.lp-cta .btn-outline-white:hover { color: var(--color-primary); }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .lp-hero__grid { grid-template-columns: 1fr; }
    .lp-hero__photo-wrap { justify-self: start; }
    .lp-hero__badge { left: auto; right: calc(-1 * var(--space-4)); }
    .lp-ribbon__row { grid-template-columns: 1fr 1fr; }
    .lp-ribbon__item:nth-child(odd) { border-left: 0; padding-left: 0; }
    .lp-local { grid-template-columns: 1fr; }
    .lp-local .lp-figure { max-width: 420px; }
    .lp-step { grid-template-columns: auto 1fr; }
    .lp-step__fix { grid-column: 2; }
    .lp-tiles { grid-template-columns: repeat(3, 1fr); }
    .lp-tile:nth-child(5n+1), .lp-tile:nth-child(5n+3), .lp-tile:nth-child(5n) { background: var(--color-white); }
    .lp-tile:nth-child(3n+1) { background: color-mix(in srgb, var(--color-primary) 7%, var(--color-white)); }
    .lp-tile:nth-child(3n) { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }
    .lp-svc-split { grid-template-columns: 1fr; }
    .lp-svc-split .lp-figure { justify-self: start; }
    .lp-claims-row { grid-template-columns: 1fr 1fr; }
    .lp-claims-row::before { display: none; }
    .lp-reviews { grid-template-columns: 1fr; }
    .lp-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .lp-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .lp-ctas .btn { width: 100%; justify-content: center; }
    .lp-hero__badge { position: static; transform: none; margin-top: var(--space-4); width: fit-content; }
    .lp-ribbon__row { grid-template-columns: 1fr; }
    .lp-ribbon__item { border-left: 0; padding-left: 0; border-bottom: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent); }
    .lp-ribbon__item:last-child { border-bottom: 0; }
    .lp-stairs { padding-left: var(--space-5); }
    .lp-step { --step-offset: 0px !important; grid-template-columns: 1fr; padding: var(--space-5); }
    .lp-step::before { display: none; }
    .lp-step__fix { grid-column: 1; }
    .lp-tiles { grid-template-columns: 1fr 1fr; }
    .lp-claims-row { grid-template-columns: 1fr; }
    .lp-section { padding: var(--space-12) 0; }
    .lp-faq details p { padding-left: var(--space-6); }
}

@media (prefers-reduced-motion: reduce) {
    .lp-figure img, .lp-step, .lp-tile, .lp-nearby a, .lp-facts li { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="lp-hero" aria-labelledby="lp-title">
    <div class="container">
        <div class="lp-hero__grid">
            <div>
                <nav class="lp-breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="lp-hero__pill"><?php echo icon('wind', 14); ?> Galveston Bay &middot; Ship Channel</span>

                <h1 id="lp-title">Roofing &amp; Exterior Contractor in <em>La Porte</em>, TX</h1>

                <p class="lp-hero__answer">
                    La Porte is one of more than 50 Greater Houston communities served by <?php echo htmlspecialchars($siteName); ?>,
                    a family-owned father-and-son team based in Humble, TX, in business since 1973. Roof replacement and repair,
                    storm damage, siding, gutters, patio covers and fences for bayside homes — with a free inspection and a written
                    estimate before any work starts.
                </p>

                <div class="lp-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Inspection</a>
                </div>
            </div>

            <div class="lp-hero__photo-wrap">
                <span class="lp-hero__frame" aria-hidden="true"></span>
                <figure class="lp-hero__figure">
                    <?php echo areaPhoto('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, '(max-width: 1024px) 90vw, 440px', true); ?>
                </figure>
                <div class="lp-hero__badge">
                    <strong>1973</strong>
                    <span>Serving Greater Houston since</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== TRUST RIBBON ===================== -->
<div class="lp-ribbon">
    <div class="container">
        <div class="lp-ribbon__row">
            <div class="lp-ribbon__item"><?php echo icon('home', 26); ?><div><strong>Father &amp; son</strong><span>Glenn and Tim Menn — the owner is on every job</span></div></div>
            <div class="lp-ribbon__item"><?php echo icon('award', 26); ?><div><strong>Nextdoor Favorite</strong><span>Neighborhood Favorite 2022, 2023 and 2024</span></div></div>
            <div class="lp-ribbon__item"><?php echo icon('search', 26); ?><div><strong>Free inspections</strong><span>Photo-documented, with a written estimate</span></div></div>
            <div class="lp-ribbon__item"><?php echo icon('map-pin', 26); ?><div><strong>50+ communities</strong><span>From Orange to Galveston and sometimes beyond</span></div></div>
        </div>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="lp-section" aria-labelledby="lp-local-title">
    <div class="container">
        <div class="lp-local">
            <div data-animate class="lp-in-left">
                <figure class="lp-figure lp-figure--tab">
                    <?php echo areaPhoto('roof-inspection-v2', 'Close-up of cracked and lifted shingles found during a roof inspection', 1200, 1600, '(max-width: 1024px) 420px, 34vw'); ?>
                </figure>
            </div>

            <div class="lp-prose">
                <span class="lp-eyebrow">Where the channel meets the bay</span>
                <h2 id="lp-local-title">Roofs here live with salt air, bay wind and the occasional surge</h2>
                <p class="lp-subtitle">Sylvan Beach to Lomax to Fairmont Park — each part of town tells us what to look for.</p>

                <p>
                    La Porte sits where the Houston Ship Channel opens into Galveston Bay, and that address decides how a roof ages.
                    Sylvan Beach takes the bay wind head-on. Lomax, a separate town until it consolidated with La Porte in 1980, kept
                    its older, more spread-out streets. Fairmont Park and the subdivisions along Fairmont Parkway
                    filled in through the 1970s and 80s, which is why the typical house in La Porte dates to the early 1980s and is now
                    on its second or third roof.
                </p>
                <p>
                    The San Jacinto Monument stands at the north edge of town — the Battleship Texas left its berth beside it for
                    Galveston in 2022 — and the Fred Hartman Bridge carries SH 146 over the channel to Baytown. When Ike came ashore in
                    2008, its surge ran up this shoreline; Shoreacres next door saw most of its homes flood. Roofing in La Porte means
                    planning for the salt, the wind and the water, not just the sun.
                </p>

                <ul class="lp-facts">
                    <li><div><strong>Sylvan Beach &amp; the bayfront</strong> Open exposure to southeast bay wind; we check shingle edges, ridge caps and every piece of exposed metal for uplift and corrosion.</div></li>
                    <li><div><strong>Lomax &amp; the older streets</strong> Older homes with original chimney flashing and low-slope additions — usually repair candidates before replacement ones.</div></li>
                    <li><div><strong>Fairmont Park &amp; Fairmont Parkway</strong> 1970s–80s subdivisions where roofs installed after the last storm cycle are aging out together.</div></li>
                    <li><div><strong>La Porte ISD neighborhoods</strong> Homes built for families who stay; we match the existing trim, protect the landscaping and sweep for nails before we leave.</div></li>
                </ul>

                <p>
                    Searching for <strong>roof repair near me in La Porte</strong>? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>
                    and Tim will come out, walk the roof and show you photos of what he finds.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="lp-divider lp-divider--zig" aria-hidden="true">
    <svg viewBox="0 0 1440 48" preserveAspectRatio="none"><polygon points="0,48 0,24 120,48 240,24 360,48 480,24 600,48 720,24 840,48 960,24 1080,48 1200,24 1320,48 1440,24 1440,48"/></svg>
</div>

<!-- ===================== SIGNATURE: SALT-AIR STAIRCASE ===================== -->
<section class="lp-section lp-section--alt" aria-labelledby="lp-stairs-title">
    <div class="container">
        <span class="lp-eyebrow">Bayside roofing, step by step</span>
        <h2 id="lp-stairs-title">What salt air and bay wind do to a roof — and what we do about it</h2>
        <p class="lp-lead">Inland roofs mostly wear out from the top down. Near Galveston Bay they fail from the edges and the fasteners first. Here is the order we check things in.</p>

        <div class="lp-stairs">
            <article class="lp-step" data-animate>
                <span class="lp-step__num" aria-hidden="true">1</span>
                <div>
                    <h3>Exposed metal corrodes first</h3>
                    <p>Nail heads, drip edge, pipe-boot collars, vent caps and gutter hangers take the salt before the shingles show a thing.</p>
                </div>
                <div class="lp-step__fix"><strong>What we do</strong> Inspect every piece of metal on the roof, replace rusted flashing and boots, and recommend coated fasteners on bayside slopes.</div>
            </article>
            <article class="lp-step" data-animate>
                <span class="lp-step__num" aria-hidden="true">2</span>
                <div>
                    <h3>Wind lifts the edges</h3>
                    <p>Steady southeast wind off the bay works at rakes, eaves and ridge caps until the seal strip lets go — then one gust takes a row.</p>
                </div>
                <div class="lp-step__fix"><strong>What we do</strong> Hand-seal lifted tabs where a repair makes sense; on replacements, install starter strip and ridge caps to the manufacturer's high-wind pattern.</div>
            </article>
            <article class="lp-step" data-animate>
                <span class="lp-step__num" aria-hidden="true">3</span>
                <div>
                    <h3>Humidity cooks the attic</h3>
                    <p>Bay humidity plus a Texas summer means attics that never dry out, curling shingles and algae streaking on the north slope.</p>
                </div>
                <div class="lp-step__fix"><strong>What we do</strong> Balance intake and exhaust. Shingle manufacturers can void or limit their warranties when an attic is not properly ventilated — see our <a href="/services/attic-venting/">attic venting</a> page.</div>
            </article>
            <article class="lp-step" data-animate>
                <span class="lp-step__num" aria-hidden="true">4</span>
                <div>
                    <h3>Storms finish the job</h3>
                    <p>A roof already loosened by salt and wind is the one that loses decking in a hurricane or a spring hail cell.</p>
                </div>
                <div class="lp-step__fix"><strong>What we do</strong> Document storm damage slope by slope, ask about temporary tarping, and walk the roof with your adjuster. See <a href="/services/storm-damage-repair/">storm &amp; wind damage repair</a>.</div>
            </article>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="lp-section" aria-labelledby="lp-svc-title">
    <div class="container">
        <div class="lp-svc-split">
            <div>
                <span class="lp-eyebrow">Roofing / Siding — it's on the sign</span>
                <h2 id="lp-svc-title">Everything on the outside of a La Porte home, from one crew</h2>
                <p class="lp-lead">
                    Roofs are the heart of the business, but the same crew that replaces your shingles also builds the patio cover, hangs
                    the gutters, replaces the rotted fascia and sets the cedar fence. One estimate, one schedule, and Tim on site.
                </p>
            </div>
            <div data-animate class="lp-in-right">
                <figure class="lp-figure">
                    <?php echo areaPhoto('gutter-installation-v2', 'New downspout and gutter on a brick covered patio', 720, 960, '(max-width: 1024px) 380px, 30vw'); ?>
                </figure>
            </div>
        </div>

        <div class="lp-tiles">
            <a class="lp-tile" href="/services/roof-replacement/"><?php echo icon('home', 24); ?><strong>Roof Replacement</strong><small>Architectural shingle and metal</small></a>
            <a class="lp-tile" href="/services/roof-repair/"><?php echo icon('wrench', 24); ?><strong>Roof Repair</strong><small>Leaks, flashing, pipe boots, decking</small></a>
            <a class="lp-tile" href="/services/roof-inspection/"><?php echo icon('search', 24); ?><strong>Roof Inspection</strong><small>Free and photo-documented</small></a>
            <a class="lp-tile" href="/services/storm-damage-repair/"><?php echo icon('wind', 24); ?><strong>Storm &amp; Wind Damage</strong><small>Hail, wind and hurricane repair</small></a>
            <a class="lp-tile" href="/services/roof-damage-repair/"><?php echo icon('hammer', 24); ?><strong>Roof Damage Repair</strong><small>Wood rot, failed flashing, worn shingles</small></a>
            <a class="lp-tile" href="/services/attic-venting/"><?php echo icon('wind', 24); ?><strong>Attic Venting</strong><small>Balanced intake and exhaust</small></a>
            <a class="lp-tile" href="/services/gutter-installation/"><?php echo icon('droplets', 24); ?><strong>Gutters</strong><small>New gutters and downspouts</small></a>
            <a class="lp-tile" href="/services/siding-fascia-soffit/"><?php echo icon('ruler', 24); ?><strong>Siding, Fascia &amp; Soffit</strong><small>Hardie, vinyl, wood rot, exterior paint</small></a>
            <a class="lp-tile" href="/services/patio-covers-decks/"><?php echo icon('hard-hat', 24); ?><strong>Patio Covers &amp; Decks</strong><small>Covered, screened, pergolas, decks</small></a>
            <a class="lp-tile" href="/services/fences-gates/"><?php echo icon('shield', 24); ?><strong>Fences &amp; Gates</strong><small>Cedar and pine privacy, ranch rail</small></a>
        </div>
    </div>
</section>

<div class="lp-divider lp-divider--wave" aria-hidden="true">
    <svg viewBox="0 0 1440 48" preserveAspectRatio="none"><path d="M0,24 C240,48 480,0 720,24 C960,48 1200,0 1440,24 L1440,48 L0,48 Z"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="lp-section lp-section--dark" aria-labelledby="lp-claims-title">
    <div class="container">
        <span class="lp-eyebrow">After a bay storm</span>
        <h2 id="lp-claims-title">More than 50 years of claims experience, on your side of the table</h2>
        <p class="lp-lead">
            Hurricane season on Galveston Bay is not hypothetical. When a storm comes through La Porte, the paperwork can be as stressful
            as the damage. We take that part from your plate to ours — documenting, meeting the adjuster, and explaining the policy in
            plain English.
        </p>

        <div class="lp-claims-row">
            <div class="lp-claim" data-animate><span class="lp-claim__dot"><?php echo icon('search', 22); ?></span><strong>Document</strong><span>Photos of every slope and every strike before anything is touched.</span></div>
            <div class="lp-claim" data-animate><span class="lp-claim__dot"><?php echo icon('hard-hat', 22); ?></span><strong>Meet the adjuster</strong><span>We walk the roof with them so nothing is missed.</span></div>
            <div class="lp-claim" data-animate><span class="lp-claim__dot"><?php echo icon('check-circle', 22); ?></span><strong>Explain the policy</strong><span>Deductible, depreciation, scope — line by line.</span></div>
            <div class="lp-claim" data-animate><span class="lp-claim__dot"><?php echo icon('home', 22); ?></span><strong>Do the work as agreed</strong><span>Owner on site, landscaping covered, nails swept.</span></div>
        </div>

        <p class="lp-claims-note">Whether a claim is approved, and for how much, is the insurance carrier's decision. Our job is to make sure the damage is documented properly and that you understand your options before you sign anything.</p>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($areaReviews)): ?>
<section class="lp-section lp-section--alt" aria-labelledby="lp-reviews-title">
    <div class="container">
        <span class="lp-eyebrow">Storm-claim customers</span>
        <h2 id="lp-reviews-title">What Greater Houston homeowners say after the storm</h2>
        <p class="lp-lead">Real reviews, published by the client with first name and city.</p>
        <div class="lp-reviews">
            <?php foreach ($areaReviews as $i => $r): ?>
            <?php if ($i === 1): ?><div class="lp-reviews__stack"><?php endif; ?>
            <article class="lp-review <?php echo $i === 0 ? 'lp-review--featured lp-in-scale' : ''; ?>" data-animate>
                <?php if ($i === 0): ?><div class="lp-review__mark" aria-hidden="true">&ldquo;</div><?php endif; ?>
                <div class="lp-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="lp-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php if ($i === count($areaReviews) - 1 && count($areaReviews) > 1): ?></div><?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="lp-section" aria-labelledby="lp-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="lp-eyebrow">Common questions</span>
            <h2 id="lp-faq-title">Straight answers before you call</h2>
        </div>
        <div class="lp-faq">
            <?php foreach ($areaFaqs as $i => $faq): ?>
            <details <?php echo $i === 0 ? 'open' : ''; ?>>
                <summary><span><?php echo htmlspecialchars($faq['q']); ?></span> <?php echo icon('chevron-down', 20); ?></summary>
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== NEARBY ===================== -->
<section class="lp-section lp-section--alt" aria-labelledby="lp-nearby-title">
    <div class="container">
        <span class="lp-eyebrow">Along the channel</span>
        <h2 id="lp-nearby-title">Neighbors across the bridge and up SH 225</h2>
        <p class="lp-lead">Baytown is across the Fred Hartman Bridge, Deer Park and Pasadena are up the highway, and the rest of Greater Houston is a short drive. We cover more than 50 communities in all.</p>
        <div class="lp-nearby">
            <a href="/service-areas/baytown/">Baytown, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/deer-park/">Deer Park, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/pasadena/">Pasadena, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/houston/">Houston, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="lp-chips">
            <?php foreach (['South Houston', 'Galena Park', 'Jacinto City', 'Channelview', 'Mont Belvieu', 'Bellaire', 'West University Place', 'Humble'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="lp-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="lp-cta" aria-labelledby="lp-cta-title">
    <div class="container">
        <div class="lp-cta__inner">
            <div>
                <h2 id="lp-cta-title">Free roof inspection for your La Porte home</h2>
                <p>Photos of what we find, a written estimate, and no pressure. The owner comes out personally.</p>
            </div>
            <div class="lp-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-accent btn-lg">Request an Estimate</a>
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
