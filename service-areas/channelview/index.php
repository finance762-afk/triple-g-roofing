<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Channelview';
$pageTitle = 'Roofing, Siding & Gutters in Channelview, TX | Triple G';
$pageDescription = 'Roof repair, replacement, gutters, siding and attic venting for Channelview, TX homes along I-10 — family-owned since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/channelview/';
$ogImage = 'roof-home-trees-960.webp';

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

/* No published reviews carry this community's address yet — show real storm/claim reviews from neighboring Ship Channel communities */
$areaReviews = array_slice(getTestimonialsFor('storm-damage-repair', 5), 2, 3);

$areaFaqs = [
    [
        'q' => 'Does Triple G Roofing & Construction serve Channelview?',
        'a' => 'Yes. Channelview is unincorporated east Harris County along I-10 and Beltway 8, and Triple G Roofing & Construction serves it as one of more than 50 Greater Houston communities from our base in Humble, TX. The inspection and the written estimate are free, and the owner comes out personally.',
    ],
    [
        'q' => 'My house took on water in Harvey. Can you handle the roof and the outside of the house together?',
        'a' => 'That is exactly the kind of list we like. Triple G Roofing & Construction does roof repair and replacement, siding, fascia and soffit, wood-rot repair, exterior paint, gutters and downspouts, fences and gates, decks and patio covers, and interior sheetrock repair tied to exterior work. One written estimate, one crew, one schedule.',
    ],
    [
        'q' => 'Should a 1970s roof in Channelview be repaired or replaced?',
        'a' => 'It depends on what the inspection shows, not the age alone. A cracked pipe boot, failed chimney flashing or a handful of wind-lifted shingles are repairs. Brittle shingles, widespread granule loss and soft decking point to replacement. We photograph every slope, show you the pictures and give you a written estimate either way; the decision stays with you.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix cv-
   Tokens only. Light hero on a blueprint grid with the photo on
   the LEFT in a thick-bordered window, services-first layout
   (three featured photo cards + compact list), local-context
   prose with three fact plaques, "water from above, water from
   below" flow band (signature), quote-card reviews, dark claims
   split, indexed FAQ.
   ========================================================== */

/* ---------- Reveal directions (page-scoped modifiers on [data-animate]) ---------- */
[data-animate].cv-in-left { transform: translateX(-30px); }
[data-animate].cv-in-right { transform: translateX(30px); }
[data-animate].cv-in-down { transform: translateY(-26px); }
[data-animate].cv-in-scale { transform: scale(0.95); }
[data-animate].cv-in-left.animated,
[data-animate].cv-in-right.animated,
[data-animate].cv-in-down.animated,
[data-animate].cv-in-scale.animated { transform: none; }

/* ---------- Hero: blueprint grid, photo left ---------- */
.cv-hero {
    position: relative;
    overflow: hidden;
    isolation: isolate;
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
    background: var(--color-white);
}

.cv-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(180deg, transparent 0%, var(--color-white) 85%),
        linear-gradient(90deg, color-mix(in srgb, var(--color-dark) 6%, transparent) 1px, transparent 1px),
        linear-gradient(0deg, color-mix(in srgb, var(--color-dark) 6%, transparent) 1px, transparent 1px);
    background-size: 100% 100%, 48px 48px, 48px 48px;
}

.cv-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.045;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.cv-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 0.8fr) minmax(0, 1.2fr);
    gap: var(--space-12);
    align-items: center;
}

.cv-hero__window {
    position: relative;
    width: min(100%, 400px);
    aspect-ratio: 3 / 4;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: var(--space-2) solid var(--color-dark);
    box-shadow: var(--shadow-xl);
}

.cv-hero__window img { width: 100%; height: 100%; object-fit: cover; }

.cv-hero__window::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(0deg, color-mix(in srgb, var(--color-dark) 45%, transparent) 0%, transparent 45%);
    pointer-events: none;
}

.cv-hero__photo { position: relative; }

.cv-hero__photo::before {
    content: '';
    position: absolute;
    left: calc(-1 * var(--space-5));
    top: var(--space-8);
    width: var(--space-16);
    height: var(--space-16);
    border-radius: var(--radius-lg);
    background: var(--color-accent);
    opacity: 0.85;
    z-index: -1;
}

.cv-hero__chip {
    position: absolute;
    right: calc(-1 * var(--space-4));
    bottom: var(--space-8);
    background: var(--color-primary);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: var(--font-size-sm);
    padding: var(--space-3) var(--space-5);
    border-radius: var(--radius-full);
    box-shadow: var(--shadow-lg);
    white-space: nowrap;
}

.cv-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: var(--color-gray);
}

.cv-breadcrumb a { color: var(--color-gray-dark); transition: color var(--transition-fast); }
.cv-breadcrumb a:hover { color: var(--color-primary); }
.cv-breadcrumb [aria-current] { color: var(--color-dark); font-weight: 600; }

.cv-hero__tag {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-dark);
    margin-bottom: var(--space-4);
}

.cv-hero__tag::before { content: ''; width: var(--space-3); height: var(--space-3); border-radius: var(--radius-sm); background: var(--color-primary); transform: rotate(45deg); }

.cv-hero h1 {
    color: var(--color-dark);
    font-size: clamp(2.3rem, 5vw, 3.9rem);
    line-height: 1.05;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.cv-hero h1 mark { background: linear-gradient(180deg, transparent 58%, color-mix(in srgb, var(--color-accent) 55%, transparent) 58%); color: inherit; padding: 0 var(--space-1); }

.cv-hero__answer {
    color: var(--color-gray-dark);
    font-size: clamp(1rem, 1.6vw, 1.18rem);
    line-height: 1.75;
    max-width: 62ch;
    margin-bottom: var(--space-8);
}

.cv-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }

/* ---------- Trust ticker ---------- */
.cv-ticker {
    background: var(--color-dark);
    color: var(--color-white);
    overflow: hidden;
}

.cv-ticker__row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-3) var(--space-8);
    padding: var(--space-4) 0;
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    letter-spacing: 0.04em;
}

.cv-ticker__row span { display: inline-flex; align-items: center; gap: var(--space-2); }
.cv-ticker__row span::before { content: ''; width: 6px; height: 6px; border-radius: var(--radius-full); background: var(--color-accent); }

/* ---------- Section scaffolding ---------- */
.cv-section { padding: var(--space-16) 0; }
.cv-section--alt { background: var(--color-light); }
.cv-section--dark { background: var(--color-dark-alt); color: var(--color-white); }

.cv-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
    border-bottom: 2px solid var(--color-accent);
    padding-bottom: var(--space-1);
}

.cv-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.cv-section--dark h2 { color: var(--color-white); }

.cv-subtitle {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}

.cv-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.cv-prose a { color: var(--color-primary); font-weight: 600; }
.cv-prose a:hover { text-decoration: underline; }
.cv-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.cv-section--dark .cv-lead { color: color-mix(in srgb, var(--color-white) 82%, transparent); }

/* ---------- Services first: featured photo cards + compact list ---------- */
.cv-featured {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.cv-card {
    display: grid;
    grid-template-rows: auto 1fr;
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    color: var(--color-dark);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.cv-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.cv-card:nth-child(2) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.cv-card:nth-child(3) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }

.cv-card__img { aspect-ratio: 4 / 3; overflow: hidden; position: relative; }
.cv-card__img img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.cv-card:hover .cv-card__img img { transform: scale(1.05); }

.cv-card__img::after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: var(--space-2);
    background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
}

.cv-card__body { padding: var(--space-6); display: grid; gap: var(--space-2); align-content: start; }
.cv-card__body h3 { font-size: var(--font-size-xl); display: flex; align-items: center; gap: var(--space-3); }
.cv-card__body h3 svg { color: var(--color-primary); }
.cv-card__body p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }
.cv-card__more { font-family: var(--font-heading); font-weight: 700; color: var(--color-primary); font-size: var(--font-size-sm); margin-top: var(--space-2); }

.cv-more {
    margin-top: var(--space-8);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-3);
    list-style: none;
    padding: 0;
}

.cv-more a {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-dark);
    transition: border-color var(--transition-fast), background var(--transition-fast);
}

.cv-more a:hover { border-color: var(--color-primary); background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); color: var(--color-primary); }
.cv-more a svg { color: var(--color-accent); flex-shrink: 0; }

/* ---------- Local context: prose + three plaques ---------- */
.cv-local {
    display: grid;
    grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
    gap: var(--space-12);
    align-items: start;
}

.cv-plaques { display: grid; gap: var(--space-4); }

.cv-plaque {
    position: relative;
    padding: var(--space-5) var(--space-6) var(--space-5) var(--space-8);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
}

.cv-plaque::before {
    content: '';
    position: absolute;
    left: var(--space-4);
    top: var(--space-6);
    bottom: var(--space-6);
    width: 3px;
    border-radius: var(--radius-full);
    background: var(--color-accent);
}

.cv-plaque:nth-child(2)::before { background: var(--color-primary); }
.cv-plaque:nth-child(3)::before { background: var(--color-dark); }
.cv-plaque:nth-child(2) { margin-left: var(--space-6); }
.cv-plaque strong { display: block; font-family: var(--font-heading); color: var(--color-dark); margin-bottom: var(--space-1); }
.cv-plaque span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

.cv-figure {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 3 / 4;
}

.cv-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.cv-figure:hover img { transform: scale(1.04); }

/* ---------- Signature: water from above / below flow band ---------- */
.cv-flow {
    position: relative;
    margin-top: var(--space-10);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-5);
}

.cv-flow::before {
    content: '';
    position: absolute;
    top: 34px;
    left: 12%;
    right: 12%;
    height: 0;
    border-top: 3px dashed color-mix(in srgb, var(--color-primary) 45%, transparent);
}

.cv-flow__step {
    position: relative;
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    padding: var(--space-12) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.cv-flow__step:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.cv-flow__step:nth-child(even) { margin-top: var(--space-8); }

.cv-flow__drop {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 68px;
    height: 68px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
    border: 5px solid var(--color-light);
    box-shadow: var(--shadow-md);
}

.cv-flow__step:nth-child(2) .cv-flow__drop { background: var(--color-accent); }
.cv-flow__step:nth-child(3) .cv-flow__drop { background: var(--color-dark); }
.cv-flow__step:nth-child(4) .cv-flow__drop { background: var(--color-primary-dark); }

.cv-flow__stage {
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-gray);
    margin-bottom: var(--space-2);
    text-align: center;
}

.cv-flow__step h3 { font-size: var(--font-size-lg); text-align: center; margin-bottom: var(--space-3); text-wrap: balance; }
.cv-flow__step p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; margin-bottom: var(--space-3); }
.cv-flow__step a { color: var(--color-primary); font-weight: 600; font-size: var(--font-size-sm); }
.cv-flow__step a:hover { text-decoration: underline; }

.cv-flow__note {
    margin-top: var(--space-10);
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border-left: 4px solid var(--color-primary);
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    line-height: 1.7;
    max-width: 75ch;
}

/* ---------- Reviews: quote cards ---------- */
.cv-reviews {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.cv-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-10) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
}

.cv-review::before {
    content: '\201C';
    position: absolute;
    top: var(--space-2);
    left: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-accent) 50%, transparent);
}

.cv-review:nth-child(2) { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.cv-review:nth-child(3) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.cv-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.cv-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); flex: 1; }
.cv-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); border-top: 1px solid var(--color-border); padding-top: var(--space-4); }

.cv-review__avatar {
    width: 38px;
    height: 38px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-dark);
    color: var(--color-white);
    font-weight: 700;
}

.cv-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- Claims split ---------- */
.cv-claims {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
}

.cv-checks { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; gap: var(--space-3); }

.cv-checks li {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 7%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
    line-height: 1.6;
}

.cv-checks svg { color: var(--color-accent); margin-top: 2px; }
.cv-checks strong { display: block; color: var(--color-white); font-family: var(--font-heading); }
.cv-checks span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); }

.cv-callout {
    padding: var(--space-7);
    border-radius: var(--radius-xl);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-accent) 45%, transparent);
    position: relative;
}

.cv-callout__label {
    position: absolute;
    top: calc(-1 * var(--space-3));
    left: var(--space-7);
    padding: 0 var(--space-3);
    height: var(--space-6);
    display: inline-flex;
    align-items: center;
    background: var(--color-accent);
    color: var(--color-dark);
    border-radius: var(--radius-sm);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.cv-callout p { color: color-mix(in srgb, var(--color-white) 85%, transparent); line-height: 1.75; margin: 0; }
.cv-callout p + p { margin-top: var(--space-4); }

/* ---------- FAQ: indexed ---------- */
.cv-faq { max-width: 860px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }

.cv-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    display: grid;
    grid-template-columns: var(--space-16) 1fr;
}

.cv-faq details::before {
    content: attr(data-index);
    grid-row: 1 / span 2;
    display: grid;
    place-items: start center;
    padding-top: var(--space-5);
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-xl);
    color: var(--color-white);
    background: var(--color-dark);
}

.cv-faq details:nth-child(2)::before { background: var(--color-primary); }
.cv-faq details:nth-child(3)::before { background: var(--color-accent); color: var(--color-dark); }
.cv-faq details[open] { box-shadow: var(--shadow-md); }

.cv-faq summary {
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

.cv-faq summary::-webkit-details-marker { display: none; }
.cv-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.cv-faq details[open] summary svg { transform: rotate(180deg); }
.cv-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; grid-column: 2; }

/* ---------- Nearby ---------- */
.cv-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.cv-nearby a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 2px solid var(--color-border);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
    transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast);
}

.cv-nearby a:hover { border-color: var(--color-accent); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.cv-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.cv-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.cv-chips span, .cv-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-sm); background: var(--color-white); border: 1px solid var(--color-border); color: var(--color-gray-dark); }
.cv-chips a { background: var(--color-primary); border-color: var(--color-primary); color: var(--color-white); font-weight: 600; }

.cv-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers: notch + curve ---------- */
.cv-divider { line-height: 0; display: block; }
.cv-divider svg { width: 100%; height: 44px; display: block; }
.cv-divider--notch { background: var(--color-white); }
.cv-divider--notch svg { fill: var(--color-light); }
.cv-divider--curve { background: var(--color-light); }
.cv-divider--curve svg { fill: var(--color-dark-alt); }

/* ---------- CTA ---------- */
.cv-cta {
    position: relative;
    overflow: hidden;
    background: var(--color-primary-dark);
    padding: var(--space-16) 0;
}

.cv-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        linear-gradient(90deg, color-mix(in srgb, var(--color-white) 8%, transparent) 1px, transparent 1px),
        linear-gradient(0deg, color-mix(in srgb, var(--color-white) 8%, transparent) 1px, transparent 1px);
    background-size: 48px 48px;
    pointer-events: none;
}

.cv-cta__inner { position: relative; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.cv-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.cv-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }
.cv-cta .btn-outline-white:hover { color: var(--color-primary-dark); }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .cv-hero__grid { grid-template-columns: 1fr; }
    .cv-hero__photo { order: 2; }
    .cv-hero__window { width: min(100%, 360px); }
    .cv-featured { grid-template-columns: 1fr; }
    .cv-card { grid-template-columns: minmax(0, 0.8fr) minmax(0, 1.2fr); grid-template-rows: none; }
    .cv-card__img { aspect-ratio: auto; min-height: 180px; }
    .cv-more { grid-template-columns: 1fr 1fr; }
    .cv-local { grid-template-columns: 1fr; }
    .cv-plaque:nth-child(2) { margin-left: 0; }
    .cv-flow { grid-template-columns: 1fr 1fr; }
    .cv-flow::before { display: none; }
    .cv-flow__step:nth-child(even) { margin-top: 0; }
    .cv-reviews { grid-template-columns: 1fr; }
    .cv-claims { grid-template-columns: 1fr; }
    .cv-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .cv-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .cv-ctas .btn { width: 100%; justify-content: center; }
    .cv-hero__chip { right: var(--space-2); }
    .cv-ticker__row { justify-content: flex-start; }
    .cv-card { grid-template-columns: 1fr; }
    .cv-card__img { aspect-ratio: 4 / 3; }
    .cv-more { grid-template-columns: 1fr; }
    .cv-flow { grid-template-columns: 1fr; gap: var(--space-10); }
    .cv-faq details { grid-template-columns: var(--space-10) 1fr; }
    .cv-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .cv-figure img, .cv-card, .cv-card__img img, .cv-flow__step, .cv-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="cv-hero" aria-labelledby="cv-title">
    <div class="container">
        <div class="cv-hero__grid">
            <div class="cv-hero__photo">
                <figure class="cv-hero__window">
                    <?php echo areaPhoto('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, '(max-width: 1024px) 90vw, 400px', true); ?>
                </figure>
                <span class="cv-hero__chip">Since 1973</span>
            </div>

            <div>
                <nav class="cv-breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="cv-hero__tag">East Harris County &middot; I-10 &amp; Beltway 8</span>

                <h1 id="cv-title">Roofing, Siding &amp; Gutters in <mark>Channelview</mark>, TX</h1>

                <p class="cv-hero__answer">
                    Channelview is one of more than 50 Greater Houston communities served by <?php echo htmlspecialchars($siteName); ?>,
                    a family-owned father-and-son team based in Humble, TX, in business since 1973. Roof repair and replacement,
                    gutters, siding, attic venting, patio covers and fences — with a free, photo-documented inspection and a written
                    estimate before any work begins.
                </p>

                <div class="cv-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Inspection</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== TRUST TICKER ===================== -->
<div class="cv-ticker" aria-label="Why homeowners call Triple G">
    <div class="container">
        <div class="cv-ticker__row">
            <span>Serving Greater Houston since 1973</span>
            <span>Father-and-son team — Glenn &amp; Tim Menn</span>
            <span>The owner is on every job</span>
            <span>Nextdoor Neighborhood Favorite 2022, 2023, 2024</span>
            <span>Free inspections &amp; written estimates</span>
        </div>
    </div>
</div>

<!-- ===================== SERVICES ===================== -->
<section class="cv-section" aria-labelledby="cv-svc-title">
    <div class="container">
        <span class="cv-eyebrow">Roofing / Siding — it's on the sign</span>
        <h2 id="cv-svc-title">What Channelview homeowners call us for first</h2>
        <p class="cv-lead">
            Out here the calls come in threes: a roof that leaked in the last storm, gutters that overflowed onto the slab, and siding
            or fascia that rotted where the water kept landing. We handle all three on one written estimate, with Tim on site.
        </p>

        <div class="cv-featured">
            <a class="cv-card" href="/services/roof-repair/" data-animate>
                <div class="cv-card__img"><?php echo areaPhoto('roof-repair-v2', 'New step flashing sealed against a brick chimney during a roof repair', 1200, 1600, '(max-width: 1024px) 40vw, 30vw'); ?></div>
                <div class="cv-card__body">
                    <h3><?php echo icon('wrench', 22); ?> Roof Repair</h3>
                    <p>Chimney and wall flashing, cracked pipe boots, wind-lifted shingles and soft decking — found on a free inspection and fixed before the next front moves through.</p>
                    <span class="cv-card__more">Roof repair &rarr;</span>
                </div>
            </a>
            <a class="cv-card" href="/services/roof-replacement/" data-animate>
                <div class="cv-card__img"><?php echo areaPhoto('roof-underlayment', 'Synthetic underlayment laid across a roof before shingles', 1200, 1600, '(max-width: 1024px) 40vw, 30vw'); ?></div>
                <div class="cv-card__body">
                    <h3><?php echo icon('home', 22); ?> Roof Replacement</h3>
                    <p>Architectural shingle or metal: full tear-off, decking repair, synthetic underlayment, new flashing and a magnet sweep of the yard when we leave.</p>
                    <span class="cv-card__more">Roof replacement &rarr;</span>
                </div>
            </a>
            <a class="cv-card" href="/services/gutter-installation/" data-animate>
                <div class="cv-card__img"><?php echo areaPhoto('attic-venting-v2', 'Freshly shingled roof with box vents installed for attic ventilation', 1200, 1600, '(max-width: 1024px) 40vw, 30vw'); ?></div>
                <div class="cv-card__body">
                    <h3><?php echo icon('droplets', 22); ?> Gutters &amp; Attic Venting</h3>
                    <p>Gutters and downspouts that carry water away from the foundation, and balanced attic ventilation that keeps the roof deck dry and the house cooler.</p>
                    <span class="cv-card__more">Gutter installation &rarr;</span>
                </div>
            </a>
        </div>

        <ul class="cv-more">
            <li><a href="/services/roof-inspection/"><?php echo icon('search', 18); ?> Roof Inspection</a></li>
            <li><a href="/services/storm-damage-repair/"><?php echo icon('wind', 18); ?> Storm &amp; Wind Damage Repair</a></li>
            <li><a href="/services/roof-damage-repair/"><?php echo icon('hammer', 18); ?> Roof Damage Repair</a></li>
            <li><a href="/services/attic-venting/"><?php echo icon('wind', 18); ?> Attic Venting</a></li>
            <li><a href="/services/siding-fascia-soffit/"><?php echo icon('ruler', 18); ?> Siding, Fascia &amp; Soffit</a></li>
            <li><a href="/services/patio-covers-decks/"><?php echo icon('hard-hat', 18); ?> Patio Covers, Pergolas &amp; Decks</a></li>
            <li><a href="/services/fences-gates/"><?php echo icon('shield', 18); ?> Fences &amp; Gates</a></li>
            <li><a href="/services/"><?php echo icon('arrow-up', 18); ?> All services</a></li>
        </ul>
    </div>
</section>

<div class="cv-divider cv-divider--notch" aria-hidden="true">
    <svg viewBox="0 0 1440 44" preserveAspectRatio="none"><polygon points="0,44 0,30 660,30 720,0 780,30 1440,30 1440,44"/></svg>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="cv-section cv-section--alt" aria-labelledby="cv-local-title">
    <div class="container">
        <div class="cv-local">
            <div class="cv-prose">
                <span class="cv-eyebrow">Between the freeway and the river</span>
                <h2 id="cv-local-title">Channelview roofs: 1960s ranch homes, new subdivisions and a lot of water</h2>
                <p class="cv-subtitle">Unincorporated, working-class, and closer to the Ship Channel than anyone on I-10 realizes.</p>

                <p>
                    Channelview is an unincorporated community in east Harris County — no city hall, just Harris County, Channelview ISD
                    and the neighbors. I-10 runs straight through it and Beltway 8 forms its western edge, with the Houston Ship Channel
                    and the mouth of the San Jacinto River along the south and east. The housing follows the same map: ranch homes from
                    the 1960s and 70s along Sheldon Road and the older streets on either side of the freeway, and newer subdivisions filling in
                    toward Sheldon Lake State Park.
                </p>
                <p>
                    Water defines the place. Harvey in 2017 and Imelda in 2019 both put parts of Channelview under, and Imelda's
                    floodwater tore barges loose that struck the I-10 bridge over the San Jacinto River. Between storms, the channel-side
                    industry puts salt and grit in the air that wears on exposed roof metal. So when we inspect a Channelview roof we are
                    looking at the whole water path — shingles, flashing, gutters, downspouts and where the water lands — not just the
                    top of the house.
                </p>
                <p>
                    Searching for <strong>roof replacement near me in Channelview</strong>? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. Tim walks the roof himself, photographs what he
                    finds and hands you a written estimate — and one for the gutters, siding or fence at the same time if you want it.
                </p>
            </div>

            <div>
                <div class="cv-plaques">
                    <div class="cv-plaque" data-animate><strong>I-10 &amp; Beltway 8</strong><span>Freeway-side lots on the west and south edges get the wind first. We check shingle edges, ridge caps and vent flashing on those exposures.</span></div>
                    <div class="cv-plaque cv-in-right" data-animate><strong>Sheldon Road &amp; the older streets</strong><span>1960s–70s ranch homes with original flashing, low-slope additions and decking that has carried several roofs.</span></div>
                    <div class="cv-plaque" data-animate><strong>Toward Sheldon Lake State Park</strong><span>Newer subdivisions with steeper, cut-up roofs, HOA palettes and builder-grade shingles meeting their first real storms.</span></div>
                </div>
                <div style="margin-top: var(--space-6);" data-animate class="cv-in-scale">
                    <figure class="cv-figure">
                        <?php echo areaPhoto('roof-damage-repair-v2', 'Roof stripped to the decking showing holes and rotted wood before repair', 1200, 1600, '(max-width: 1024px) 420px, 30vw'); ?>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== SIGNATURE: WATER FROM ABOVE, WATER FROM BELOW ===================== -->
<section class="cv-section cv-section--alt" aria-labelledby="cv-flow-title" style="padding-top: 0;">
    <div class="container">
        <span class="cv-eyebrow">The whole water path</span>
        <h2 id="cv-flow-title">Water from above, water from below — we handle the top half</h2>
        <p class="cv-lead">Flooding comes up from the bayous; roof damage comes down from the sky. A Channelview house has to be ready for both. Here is the path rain takes and what we check at every stop.</p>

        <div class="cv-flow">
            <article class="cv-flow__step" data-animate>
                <span class="cv-flow__drop" aria-hidden="true"><?php echo icon('home', 26); ?></span>
                <div class="cv-flow__stage">Stop 1</div>
                <h3>The roof plane</h3>
                <p>Shingle condition, granule loss, hail bruising and wind-lifted tabs. Older roofs get a decking check from inside the attic.</p>
                <a href="/services/roof-inspection/">Free roof inspection &rarr;</a>
            </article>
            <article class="cv-flow__step" data-animate>
                <span class="cv-flow__drop" aria-hidden="true"><?php echo icon('wrench', 26); ?></span>
                <div class="cv-flow__stage">Stop 2</div>
                <h3>Valleys, flashing &amp; vents</h3>
                <p>Where most leaks start: chimney and wall flashing, pipe boots, valley metal and vent caps. Shingle manufacturers can void or limit their warranties when an attic is not properly ventilated.</p>
                <a href="/services/attic-venting/">Attic venting &rarr;</a>
            </article>
            <article class="cv-flow__step" data-animate>
                <span class="cv-flow__drop" aria-hidden="true"><?php echo icon('droplets', 26); ?></span>
                <div class="cv-flow__stage">Stop 3</div>
                <h3>Gutters &amp; downspouts</h3>
                <p>Overflowing gutters rot fascia and soffit and dump water against the slab. We size, pitch and extend downspouts so the water actually leaves.</p>
                <a href="/services/gutter-installation/">Gutter installation &rarr;</a>
            </article>
            <article class="cv-flow__step" data-animate>
                <span class="cv-flow__drop" aria-hidden="true"><?php echo icon('ruler', 26); ?></span>
                <div class="cv-flow__stage">Stop 4</div>
                <h3>Siding, fascia &amp; the ground</h3>
                <p>Wood-rot repair, siding and soffit replacement, exterior paint, fences and decks that took water in the last flood — repaired on the same estimate.</p>
                <a href="/services/siding-fascia-soffit/">Siding, fascia &amp; soffit &rarr;</a>
            </article>
        </div>

        <p class="cv-flow__note">
            After Harvey and Imelda, a lot of Channelview homeowners had a list that ran from the ridge cap to the fence line. That is
            the kind of job this crew is built for: roof, gutters, siding, sheetrock tied to the exterior work, <a href="/services/patio-covers-decks/">patio covers and decks</a>,
            <a href="/services/fences-gates/">fences and gates</a> — one estimate, one schedule, the owner on site.
        </p>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($areaReviews)): ?>
<section class="cv-section" aria-labelledby="cv-reviews-title">
    <div class="container">
        <span class="cv-eyebrow">From nearby storm-claim customers</span>
        <h2 id="cv-reviews-title">What homeowners up and down the Ship Channel say</h2>
        <p class="cv-lead">Real reviews, published by the client with first name and city.</p>
        <div class="cv-reviews">
            <?php $dirs = ['cv-in-left', '', 'cv-in-right']; foreach ($areaReviews as $i => $r): ?>
            <article class="cv-review <?php echo $dirs[$i] ?? ''; ?>" data-animate>
                <div class="cv-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="cv-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<div class="cv-divider cv-divider--curve" aria-hidden="true" style="background: var(--color-white);">
    <svg viewBox="0 0 1440 44" preserveAspectRatio="none"><path d="M0,44 C360,0 1080,0 1440,44 Z"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="cv-section cv-section--dark" aria-labelledby="cv-claims-title">
    <div class="container">
        <div class="cv-claims">
            <div>
                <span class="cv-eyebrow">After the storm</span>
                <h2 id="cv-claims-title">More than 50 years of claims experience, on your side of the table</h2>
                <p class="cv-lead">
                    Between the hurricanes and the spring hail, most Channelview roofs eventually meet an adjuster. We have sat on both
                    sides of that conversation, and we use it to make yours simpler.
                </p>
                <ul class="cv-checks">
                    <li data-animate><?php echo icon('search', 20); ?><div><strong>Document the damage</strong><span>Photos of every slope and every strike before anything is touched.</span></div></li>
                    <li data-animate><?php echo icon('hard-hat', 20); ?><div><strong>Meet the adjuster</strong><span>We walk the roof with them so nothing is missed.</span></div></li>
                    <li data-animate><?php echo icon('check-circle', 20); ?><div><strong>Explain the policy</strong><span>Deductible, depreciation, scope — in plain English. Ask about temporary tarping if the roof is open.</span></div></li>
                    <li data-animate><?php echo icon('home', 20); ?><div><strong>Do the work as agreed</strong><span>Owner on site, landscaping covered, nails swept.</span></div></li>
                </ul>
            </div>
            <div class="cv-callout cv-in-right" data-animate>
                <span class="cv-callout__label">Plain English</span>
                <p>Whether a claim is approved, and for how much, is the insurance carrier's decision — not ours and not yours. What we control is whether the damage is documented properly, whether the adjuster sees everything, and whether you understand the paperwork before you sign it.</p>
                <p>If the roof does not qualify, you still leave with photos and a written estimate for the repair, and no obligation. See <a href="/services/storm-damage-repair/" style="color: var(--color-accent); font-weight: 600;">storm &amp; wind damage repair</a>.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== FAQ ===================== -->
<section class="cv-section" aria-labelledby="cv-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="cv-eyebrow">Common questions</span>
            <h2 id="cv-faq-title">Straight answers before you call</h2>
        </div>
        <div class="cv-faq">
            <?php foreach ($areaFaqs as $i => $faq): ?>
            <details data-index="<?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?>" <?php echo $i === 0 ? 'open' : ''; ?>>
                <summary><?php echo htmlspecialchars($faq['q']); ?> <?php echo icon('chevron-down', 20); ?></summary>
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== NEARBY ===================== -->
<section class="cv-section cv-section--alt" aria-labelledby="cv-nearby-title">
    <div class="container">
        <span class="cv-eyebrow">East Harris County neighbors</span>
        <h2 id="cv-nearby-title">Sheldon, Highlands, Cloverleaf and beyond</h2>
        <p class="cv-lead">Its neighbors — Sheldon and Cloverleaf across the Beltway, Highlands across the river, Baytown down the channel — are all on our list. We cover more than 50 Greater Houston communities in all.</p>
        <div class="cv-nearby">
            <a href="/service-areas/baytown/">Baytown, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/houston/">Houston, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/crosby/">Crosby, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/pasadena/">Pasadena, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="cv-chips">
            <?php foreach (['Sheldon', 'Highlands', 'Cloverleaf', 'Jacinto City', 'Galena Park', 'Barrett', 'Deer Park', 'Humble'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="cv-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="cv-cta" aria-labelledby="cv-cta-title">
    <div class="container">
        <div class="cv-cta__inner">
            <div>
                <h2 id="cv-cta-title">Free roof inspection for your Channelview home</h2>
                <p>Photos of what we find, a written estimate, and no pressure. The owner comes out personally.</p>
            </div>
            <div class="cv-ctas">
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
