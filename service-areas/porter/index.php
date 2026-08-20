<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Porter';
$pageTitle = 'Roofing Contractor in Porter, TX | Triple G Roofing';
$pageDescription = 'Roof replacement, storm repair, siding and patio covers in Porter, TX from a father-and-son team in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/porter/';

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

/* Real reviews — this community first, then two exterior-work reviews from nearby communities (cities shown exactly as published) */
$cityReviews = array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Porter, TX'));
foreach ([['Clint', 'Humble, TX'], ['Donna S.', 'Spring, TX']] as [$n, $c]) {
    foreach ($testimonials as $t) {
        if ($t['name'] === $n && $t['city'] === $c) { $cityReviews[] = $t; break; }
    }
}
$cityReviews = array_slice($cityReviews, 0, 3);

$areaFaqs = [
    [
        'q' => 'My house in Valley Ranch or The Highlands is only a few years old. Do I really need a roof inspection?',
        'a' => 'A new roof is not a storm-proof roof. Builder shingles are installed fast and to the minimum spec, and the first real hail or wind event — the May 2024 storms and Hurricane Beryl both hit this corridor — is when nail pops, lifted tabs and loose ridge caps show up. A free inspection gives you photos and a written record, and if nothing is wrong we tell you so.',
    ],
    [
        'q' => 'Do you work on older acreage homes and outbuildings off FM 1314, not just the subdivisions?',
        'a' => 'Yes. Porter Heights and the acreage lots around it date to the 1970s, and those properties usually come with a shop, barn or carport that needs a roof too. We install both architectural shingle and metal, and we build the patio covers, decks, fences and gates that go with a bigger lot. No job is too big or small.',
    ],
    [
        'q' => 'Can you help with the insurance claim after wind or hail damage?',
        'a' => 'We help you through the whole process. With more than 50 years of roofing, claims-handling and adjuster experience, we document every slope with photos, meet the adjuster at your home and explain the policy language in plain English. Whether a claim is approved, and for how much, is always the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix pt-
   Tokens only. Full-bleed photo hero with bottom-anchored copy,
   overlapping proof card, two-era local context, corridor
   scroll-snap ledger (signature), mosaic services, stepper
   claims, featured review, FAQ, nearby.
   ========================================================== */

/* ---------- Reveal direction modifiers (opacity handled by framework [data-animate]) ---------- */
[data-animate].pt-from-left { transform: translateX(-32px); }
[data-animate].pt-from-right { transform: translateX(32px); }
[data-animate].pt-from-scale { transform: scale(0.94); }
[data-animate].pt-from-left.animated,
[data-animate].pt-from-right.animated,
[data-animate].pt-from-scale.animated { transform: none; }

/* ---------- Hero ---------- */
.pt-hero {
    position: relative;
    isolation: isolate;
    min-height: clamp(560px, 82vh, 820px);
    display: flex;
    align-items: flex-end;
    padding: calc(var(--nav-height) + var(--space-16)) 0 var(--space-16);
    background: var(--color-dark);
    overflow: hidden;
}

.pt-hero__bg {
    position: absolute;
    inset: 0;
    z-index: -3;
}

.pt-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 40%;
}

.pt-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--color-dark) 55%, transparent) 0%, color-mix(in srgb, var(--color-dark) 35%, transparent) 40%, color-mix(in srgb, var(--color-dark) 92%, transparent) 100%),
        linear-gradient(90deg, color-mix(in srgb, var(--color-dark) 70%, transparent) 0%, transparent 70%);
}

.pt-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.07;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.pt-hero__inner { max-width: 720px; }

.pt-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 60%, transparent);
}

.pt-breadcrumb a { color: color-mix(in srgb, var(--color-white) 88%, transparent); transition: color var(--transition-fast); }
.pt-breadcrumb a:hover { color: var(--color-accent); }
.pt-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.pt-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-accent);
    margin-bottom: var(--space-4);
}

.pt-hero__eyebrow::before {
    content: '';
    width: 36px;
    height: 2px;
    background: var(--color-accent);
}

.pt-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.3rem, 5vw, 3.9rem);
    line-height: 1.05;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.pt-hero h1 em { font-style: normal; color: var(--color-accent); }

.pt-hero__answer {
    color: color-mix(in srgb, var(--color-white) 90%, transparent);
    font-size: clamp(1rem, 1.5vw, 1.15rem);
    line-height: 1.7;
    max-width: 60ch;
    margin-bottom: var(--space-6);
}

.pt-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.pt-ctas .btn-lg { font-size: var(--font-size-base); }

/* ---------- Proof card (overlaps hero) ---------- */
.pt-proof { position: relative; z-index: 2; margin-top: calc(-1 * var(--space-10)); }

.pt-proof__card {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    background: var(--color-white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    border: 1px solid var(--color-border);
    overflow: hidden;
}

.pt-proof__card div {
    padding: var(--space-6);
    display: grid;
    gap: var(--space-1);
    border-left: 1px solid var(--color-border);
}

.pt-proof__card div:first-child { border-left: 0; }
.pt-proof__card div:nth-child(odd) { background: color-mix(in srgb, var(--color-primary) 4%, var(--color-white)); }
.pt-proof__card strong { font-family: var(--font-heading); font-size: var(--font-size-2xl); line-height: 1; color: var(--color-dark); }
.pt-proof__card span { font-size: var(--font-size-xs); letter-spacing: 0.06em; text-transform: uppercase; color: var(--color-gray); }

/* ---------- Section scaffolding ---------- */
.pt-section { padding: var(--space-16) 0; }
.pt-section--alt { background: var(--color-light); }
.pt-section--dark { background: var(--color-dark); color: var(--color-white); }

.pt-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.pt-section--dark .pt-eyebrow { color: var(--color-accent); }
.pt-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.pt-section--dark h2 { color: var(--color-white); }
.pt-section h3 { text-wrap: balance; }
.pt-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.pt-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.pt-prose a { color: var(--color-primary); font-weight: 600; }
.pt-prose a:hover { text-decoration: underline; }
.pt-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.pt-section--dark .pt-lead { color: color-mix(in srgb, var(--color-white) 82%, transparent); }

/* ---------- Local context: two eras ---------- */
.pt-local {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(0, 3fr);
    gap: var(--space-12);
    align-items: start;
}

.pt-local__photos {
    position: sticky;
    top: calc(var(--nav-height) + var(--space-4));
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4);
}

.pt-figure {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 3 / 4;
    position: relative;
}

.pt-figure--drop { margin-top: var(--space-12); }
.pt-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.pt-figure:hover img { transform: scale(1.04); }

.pt-figure figcaption {
    position: absolute;
    left: var(--space-3);
    right: var(--space-3);
    bottom: var(--space-3);
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-md);
    background: color-mix(in srgb, var(--color-dark) 82%, transparent);
    color: var(--color-white);
    font-size: var(--font-size-xs);
    line-height: 1.4;
}

.pt-two {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-5);
    margin: var(--space-6) 0;
}

.pt-two__col {
    padding: var(--space-6);
    border-radius: var(--radius-xl);
    border: 1px solid var(--color-border);
    position: relative;
    overflow: hidden;
}

.pt-two__col--new { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.pt-two__col--old { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }

.pt-two__col::before {
    content: attr(data-year);
    position: absolute;
    right: var(--space-3);
    top: var(--space-2);
    font-family: var(--font-heading);
    font-size: var(--font-size-5xl);
    font-weight: 800;
    line-height: 1;
    color: color-mix(in srgb, var(--color-dark) 7%, transparent);
    pointer-events: none;
}

.pt-two__col h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-3); color: var(--color-dark); position: relative; }
.pt-two__col ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-2); position: relative; }
.pt-two__col li { display: flex; gap: var(--space-2); font-size: var(--font-size-sm); line-height: 1.55; color: var(--color-gray-dark); }
.pt-two__col li svg { flex-shrink: 0; margin-top: 3px; color: var(--color-primary); }

/* ---------- Signature: corridor ledger (scroll-snap) ---------- */
.pt-ledger {
    margin-top: var(--space-8);
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: minmax(280px, 1fr);
    gap: var(--space-5);
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding-bottom: var(--space-4);
    scrollbar-width: thin;
    scrollbar-color: var(--color-accent) transparent;
}

.pt-ledger__item {
    scroll-snap-align: start;
    position: relative;
    padding: var(--space-8) var(--space-6) var(--space-6);
    border-radius: var(--radius-xl);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    display: grid;
    grid-template-rows: auto auto 1fr auto;
    gap: var(--space-3);
    transition: transform var(--transition-fast), border-color var(--transition-fast), background var(--transition-fast);
}

.pt-ledger__item:hover {
    transform: translateY(-4px);
    border-color: color-mix(in srgb, var(--color-accent) 60%, transparent);
    background: color-mix(in srgb, var(--color-white) 9%, transparent);
}

.pt-ledger__index {
    position: absolute;
    top: calc(-1 * var(--space-4));
    left: var(--space-6);
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-weight: 700;
    box-shadow: var(--shadow-md);
}

.pt-ledger__item h3 { color: var(--color-white); font-size: var(--font-size-xl); margin: 0; }
.pt-ledger__meta { font-size: var(--font-size-xs); letter-spacing: 0.08em; text-transform: uppercase; color: var(--color-accent); }
.pt-ledger__item p { font-size: var(--font-size-sm); line-height: 1.65; color: color-mix(in srgb, var(--color-white) 80%, transparent); margin: 0; }

.pt-ledger__tag {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--font-size-xs);
    color: var(--color-white);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-primary) 35%, transparent);
    justify-self: start;
}

.pt-ledger__tag svg { color: var(--color-accent); }
.pt-ledger__hint { margin-top: var(--space-3); font-size: var(--font-size-xs); color: color-mix(in srgb, var(--color-white) 55%, transparent); display: flex; align-items: center; gap: var(--space-2); }

/* ---------- Services: mosaic ---------- */
.pt-mosaic {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    grid-auto-rows: minmax(150px, auto);
    gap: var(--space-4);
    margin-top: var(--space-8);
}

.pt-tile {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    gap: var(--space-1);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    overflow: hidden;
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.pt-tile:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.pt-tile--2 { grid-column: span 2; }
.pt-tile--3 { grid-column: span 3; }
.pt-tile--photo { grid-row: span 2; padding: 0; border: 0; }
.pt-tile--photo img { width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0; }

.pt-tile--photo .pt-tile__cap {
    position: relative;
    margin-top: auto;
    padding: var(--space-5);
    background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--color-dark) 88%, transparent));
    color: var(--color-white);
    font-size: var(--font-size-sm);
    line-height: 1.5;
}

.pt-tile--photo .pt-tile__cap strong { display: block; font-family: var(--font-heading); color: var(--color-accent); }
.pt-tile:nth-child(3n+1):not(.pt-tile--photo) { background: color-mix(in srgb, var(--color-primary) 5%, var(--color-white)); }
.pt-tile:nth-child(3n+2):not(.pt-tile--photo) { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.pt-tile:nth-child(3n):not(.pt-tile--photo) { background: color-mix(in srgb, var(--color-dark) 4%, var(--color-white)); }
.pt-tile svg { color: var(--color-primary); margin-bottom: auto; }
.pt-tile strong { font-family: var(--font-heading); color: var(--color-dark); }
.pt-tile span { font-size: var(--font-size-xs); color: var(--color-gray); line-height: 1.5; }

/* ---------- Claims: stepper ---------- */
.pt-claims { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: var(--space-12); align-items: start; }

.pt-steps { list-style: none; margin: 0; padding: 0; position: relative; display: grid; gap: var(--space-6); }

.pt-steps::before {
    content: '';
    position: absolute;
    left: 23px;
    top: 12px;
    bottom: 12px;
    width: 2px;
    background: linear-gradient(180deg, var(--color-primary), var(--color-accent));
}

.pt-steps li { display: grid; grid-template-columns: 48px 1fr; gap: var(--space-4); align-items: start; position: relative; }

.pt-steps li span:first-child {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-white);
    border: 2px solid var(--color-primary);
    color: var(--color-primary);
    position: relative;
    z-index: 1;
}

.pt-steps strong { display: block; color: var(--color-dark); font-family: var(--font-heading); margin-bottom: 2px; }
.pt-steps p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

.pt-claims__aside { display: grid; gap: var(--space-5); }

.pt-note {
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    background: var(--color-dark);
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    border-left: 5px solid var(--color-accent);
    font-size: var(--font-size-sm);
    line-height: 1.65;
}

.pt-note strong { color: var(--color-accent); font-family: var(--font-heading); display: block; margin-bottom: var(--space-1); }

/* ---------- Reviews: featured + pair ---------- */
.pt-reviews { display: grid; grid-template-columns: minmax(0, 1.3fr) minmax(0, 1fr); gap: var(--space-6); margin-top: var(--space-8); }
.pt-reviews__rest { display: grid; gap: var(--space-6); }

.pt-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-8) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
}

.pt-review--featured {
    background: linear-gradient(160deg, var(--color-dark) 0%, var(--color-dark-alt) 100%);
    border: 0;
    padding: var(--space-10) var(--space-8) var(--space-8);
}

.pt-review::before {
    content: '\201C';
    position: absolute;
    top: var(--space-1);
    right: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-primary) 22%, transparent);
}

.pt-review--featured::before { color: color-mix(in srgb, var(--color-accent) 40%, transparent); }
.pt-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.pt-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); flex: 1; }
.pt-review--featured p { color: color-mix(in srgb, var(--color-white) 90%, transparent); font-size: var(--font-size-lg); line-height: 1.65; }
.pt-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-dark); }
.pt-review--featured footer { color: var(--color-white); }
.pt-review__avatar { width: 40px; height: 40px; border-radius: var(--radius-full); display: grid; place-items: center; background: var(--color-primary); color: var(--color-white); font-weight: 700; }
.pt-review footer span { color: var(--color-gray); font-weight: 400; }
.pt-review--featured footer span { color: var(--color-accent); }

/* ---------- FAQ ---------- */
.pt-faq { max-width: 840px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.pt-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.pt-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.pt-faq summary {
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

.pt-faq summary::-webkit-details-marker { display: none; }
.pt-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.pt-faq details[open] summary svg { transform: rotate(45deg); }
.pt-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.pt-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.pt-nearby a {
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

.pt-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.pt-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.pt-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.pt-chips span, .pt-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.pt-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.pt-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.pt-divider { line-height: 0; display: block; }
.pt-divider svg { width: 100%; height: 64px; display: block; }
.pt-divider--tilt { background: var(--color-light); }
.pt-divider--tilt svg { fill: var(--color-dark); }
.pt-divider--zigzag { background: var(--color-dark); }
.pt-divider--zigzag svg { fill: var(--color-white); }
.pt-divider--curve { background: var(--color-white); }
.pt-divider--curve svg { fill: var(--color-light); }

/* ---------- CTA ---------- */
.pt-cta {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    padding: var(--space-16) 0;
}

.pt-cta::after {
    content: '';
    position: absolute;
    right: -120px;
    top: -120px;
    width: 360px;
    height: 360px;
    border-radius: var(--radius-full);
    border: 40px solid color-mix(in srgb, var(--color-white) 8%, transparent);
    pointer-events: none;
}

.pt-cta__inner { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; position: relative; }
.pt-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.pt-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .pt-local { grid-template-columns: 1fr; }
    .pt-local__photos { position: static; order: 2; }
    .pt-proof__card { grid-template-columns: 1fr 1fr; }
    .pt-proof__card div:nth-child(3) { border-left: 0; }
    .pt-proof__card div:nth-child(-n+2) { border-bottom: 1px solid var(--color-border); }
    .pt-mosaic { grid-template-columns: repeat(2, 1fr); }
    .pt-tile--2, .pt-tile--3 { grid-column: span 1; }
    .pt-tile--photo { grid-column: span 2; grid-row: auto; min-height: 260px; }
    .pt-claims { grid-template-columns: 1fr; }
    .pt-reviews { grid-template-columns: 1fr; }
    .pt-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .pt-hero { min-height: 0; padding-top: calc(var(--nav-height) + var(--space-12)); }
    .pt-ctas .btn { width: 100%; justify-content: center; }
    .pt-proof { margin-top: calc(-1 * var(--space-6)); }
    .pt-proof__card { grid-template-columns: 1fr; }
    .pt-proof__card div { border-left: 0; border-bottom: 1px solid var(--color-border); }
    .pt-two { grid-template-columns: 1fr; }
    .pt-local__photos { grid-template-columns: 1fr; }
    .pt-figure--drop { margin-top: 0; }
    .pt-mosaic { grid-template-columns: 1fr; }
    .pt-tile--photo { grid-column: span 1; }
    .pt-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .pt-figure img, .pt-tile, .pt-nearby a, .pt-ledger__item { transition: none; }
    .pt-ledger { scroll-behavior: auto; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="pt-hero" aria-labelledby="pt-title">
    <div class="pt-hero__bg" aria-hidden="true">
        <?php echo areaPhoto('hero-roof-home-v2', 'Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing & Construction', 1600, 900, '100vw', true); ?>
    </div>
    <div class="container">
        <div class="pt-hero__inner">
            <nav class="pt-breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a><span>/</span>
                <a href="/service-areas/">Service Areas</a><span>/</span>
                <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
            </nav>

            <span class="pt-hero__eyebrow">I-69 at the Grand Parkway · Montgomery County</span>

            <h1 id="pt-title">Roofing Contractor in <em>Porter</em>, TX — New Builds and Old Acreage Alike</h1>

            <p class="pt-hero__answer">
                Porter is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a family-owned
                father-and-son team based in Humble, TX, in business since 1973. We replace and repair shingle and metal roofs,
                handle storm damage and the claim paperwork that follows, and build the gutters, siding, patio covers, decks and fences
                that finish a home — with a free inspection and written estimate first.
            </p>

            <div class="pt-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
            </div>
        </div>
    </div>
</section>

<!-- ===================== PROOF CARD ===================== -->
<div class="pt-proof" aria-label="At a glance">
    <div class="container">
        <div class="pt-proof__card">
            <div><strong>1973</strong><span>Serving Greater Houston since</span></div>
            <div><strong>Father &amp; son</strong><span>Glenn &amp; Tim Menn, owner on every job</span></div>
            <div><strong>2022 · 23 · 24</strong><span>Nextdoor Neighborhood Favorite</span></div>
            <div><strong>Free</strong><span>Inspections &amp; written estimates</span></div>
        </div>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="pt-section" aria-labelledby="pt-local-title">
    <div class="container">
        <div class="pt-local">
            <div class="pt-local__photos">
                <figure class="pt-figure pt-from-left" data-animate>
                    <?php echo areaPhoto('roof-large-home', 'Large two-story brick home with a completed roof replacement', 1200, 1600, '(max-width: 1024px) 50vw, 20vw'); ?>
                    <figcaption>Two-story brick, architectural shingle — the newer-subdivision profile</figcaption>
                </figure>
                <figure class="pt-figure pt-figure--drop" data-animate>
                    <?php echo areaPhoto('crew-shingles', 'Roofer carrying shingles across a roof covered in new underlayment', 1200, 1600, '(max-width: 1024px) 50vw, 20vw'); ?>
                    <figcaption>Synthetic underlayment down, shingles going on</figcaption>
                </figure>
            </div>

            <div class="pt-prose">
                <span class="pt-eyebrow">Two Porters, one roofer</span>
                <h2 id="pt-local-title">Builder-grade roofs meeting their first storms, next to 1970s acreage that has seen plenty</h2>
                <p class="pt-subtitle">Unincorporated Montgomery County, grown in two completely different eras.</p>

                <p>
                    The newer Porter sits on the I-69 and Grand Parkway interchange. Valley Ranch — Signorelli's 1,400-acre master plan
                    around Valley Ranch Town Center — started going vertical in the early 2000s. Oakhurst at Kingwood began as Bentwood
                    in the 1990s, was relaunched by Friendswood Development in 2002 with only about 40 homes, and filled in around the
                    golf course over the following two decades. The Highlands, Caldwell's 2,300 acres off the Grand Parkway, was named
                    the Greater Houston Builders Association's Master Planned Community of the Year for 2024 and opened Highlands
                    Elementary for New Caney ISD in the fall of 2025. These are roofs that are five, ten or twenty years old and mostly
                    still on their original builder shingles.
                </p>
                <p>
                    The older Porter runs along FM 1314 and the side roads off it. Porter Heights dates to the 1970s and has stayed
                    under two thousand people. Lots are bigger, homes are one story with a shop or barn behind them, and the tree cover
                    is the loblolly pine and hardwood forest that was here before the subdivisions. Those roofs have been through Harvey
                    in 2017, Imelda in 2019, the May 2024 flooding on the East Fork of the San Jacinto and Caney Creek, and Hurricane
                    Beryl two months later.
                </p>

                <div class="pt-two">
                    <div class="pt-two__col pt-two__col--new" data-year="2000s">
                        <h3>Valley Ranch · Oakhurst · The Highlands</h3>
                        <ul>
                            <li><?php echo icon('check-circle', 16); ?> Builder shingles reaching their first real hail and wind</li>
                            <li><?php echo icon('check-circle', 16); ?> Lifted ridge caps and nail pops after the May 2024 storms and Beryl</li>
                            <li><?php echo icon('check-circle', 16); ?> HOA color and material approvals before a replacement</li>
                            <li><?php echo icon('check-circle', 16); ?> Attic ventilation that was never balanced at build time</li>
                        </ul>
                    </div>
                    <div class="pt-two__col pt-two__col--old" data-year="1970s">
                        <h3>Porter Heights &amp; the FM 1314 acreage</h3>
                        <ul>
                            <li><?php echo icon('check-circle', 16); ?> Roofs on their second or third cycle, fascia and soffit rot behind old gutters</li>
                            <li><?php echo icon('check-circle', 16); ?> Metal roofs for shops, barns and carports</li>
                            <li><?php echo icon('check-circle', 16); ?> Pine limbs, straw-choked valleys and squirrels in the vent boots</li>
                            <li><?php echo icon('check-circle', 16); ?> Fences, gates, decks and patio covers sized for a real yard</li>
                        </ul>
                    </div>
                </div>

                <p>
                    Searching for <strong>roof repair near me in Porter</strong>? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>.
                    Tim does the inspection himself, photographs what he finds, and leaves a written estimate — then the decision is yours.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="pt-divider pt-divider--curve" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><path d="M0,64 L0,32 Q360,0 720,32 T1440,32 L1440,64 Z"/></svg>
</div>

<!-- ===================== SERVICES ===================== -->
<section class="pt-section pt-section--alt" aria-labelledby="pt-svc-title">
    <div class="container">
        <span class="pt-eyebrow">Roofing / Siding — and the rest of the exterior</span>
        <h2 id="pt-svc-title">Everything on the outside of a Porter home, from one crew with the owner on site</h2>
        <p class="pt-lead">
            A patio roof extension is how one homeowner here found us — he had a concept, Tim expanded on it, and the trim matched
            perfectly. Roofing is the core of what <?php echo htmlspecialchars($shortName); ?> does, but the bigger lots out here
            usually need more than a roof.
        </p>

        <div class="pt-mosaic">
            <a class="pt-tile pt-tile--3 pt-tile--photo pt-from-scale" href="/services/patio-covers-decks/" data-animate>
                <?php echo areaPhoto('patio-covers-decks', 'Finished covered patio with ceiling fans and a concrete slab', 1000, 1333, '(max-width: 1024px) 100vw, 50vw'); ?>
                <div class="pt-tile__cap"><strong>Patio Covers, Pergolas &amp; Decks</strong> Covered and screened patios, roof extensions that match the house, cedar pergolas and wood decks.</div>
            </a>
            <a class="pt-tile pt-tile--3" href="/services/roof-replacement/" data-animate><?php echo icon('home', 24); ?><strong>Roof Replacement</strong><span>Architectural shingle and standing-seam or corrugated metal — tear-off, decking repair, underlayment, clean site.</span></a>
            <a class="pt-tile pt-tile--3 pt-from-right" href="/services/storm-damage-repair/" data-animate><?php echo icon('wind', 24); ?><strong>Storm &amp; Wind Damage</strong><span>Hail, wind and limb damage documented slope by slope for your claim.</span></a>
            <a class="pt-tile pt-tile--2" href="/services/roof-repair/" data-animate><?php echo icon('wrench', 24); ?><strong>Roof Repair</strong><span>Leaks, flashing, pipe boots, wood rot.</span></a>
            <a class="pt-tile pt-tile--2 pt-from-left" href="/services/roof-inspection/" data-animate><?php echo icon('search', 24); ?><strong>Roof Inspection</strong><span>Free, photo-documented, written.</span></a>
            <a class="pt-tile pt-tile--2" href="/services/roof-damage-repair/" data-animate><?php echo icon('hammer', 24); ?><strong>Roof Damage Repair</strong><span>Aging, worn or compromised roofs.</span></a>
            <a class="pt-tile pt-tile--2 pt-from-right" href="/services/attic-venting/" data-animate><?php echo icon('shield', 24); ?><strong>Attic Venting</strong><span>Balanced intake and exhaust.</span></a>
            <a class="pt-tile pt-tile--2" href="/services/gutter-installation/" data-animate><?php echo icon('droplets', 24); ?><strong>Gutters</strong><span>Sized for pine straw and Texas rain.</span></a>
            <a class="pt-tile pt-tile--2 pt-from-left" href="/services/siding-fascia-soffit/" data-animate><?php echo icon('ruler', 24); ?><strong>Siding, Fascia &amp; Soffit</strong><span>Hardie, vinyl, rot repair, paint.</span></a>
            <a class="pt-tile pt-tile--3 pt-from-right" href="/services/fences-gates/" data-animate><?php echo icon('hammer', 24); ?><strong>Fences &amp; Gates</strong><span>Cedar and pine privacy, ranch rail and custom gates for acreage lots.</span></a>
            <a class="pt-tile pt-tile--3 pt-tile--photo pt-from-scale" href="/services/gutter-installation/" data-animate>
                <?php echo areaPhoto('gutter-installation-v2', 'New downspout and gutter on a brick covered patio', 720, 960, '(max-width: 1024px) 100vw, 50vw'); ?>
                <div class="pt-tile__cap"><strong>Gutters &amp; Downspouts</strong> Moving roof water away from slab foundations on ground that already holds too much of it.</div>
            </a>
        </div>

        <p class="pt-lead" style="margin-top: var(--space-8);">
            One thing worth knowing before a replacement in a newer subdivision: shingle manufacturers can void or limit the shingle
            warranty when the attic is not properly ventilated, and builder-installed venting is rarely balanced. We check intake and
            exhaust on every inspection — see <a href="/services/attic-venting/" style="color: var(--color-primary); font-weight: 600;">attic venting</a>.
        </p>
    </div>
</section>

<div class="pt-divider pt-divider--tilt" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 1440,0 1440,64"/></svg>
</div>

<!-- ===================== SIGNATURE: CORRIDOR LEDGER ===================== -->
<section class="pt-section pt-section--dark" aria-labelledby="pt-ledger-title">
    <div class="container">
        <span class="pt-eyebrow">Porter, corridor by corridor</span>
        <h2 id="pt-ledger-title">What we usually find, by where you live</h2>
        <p class="pt-lead">Five parts of Porter, five different roofs. None of this replaces an inspection — it tells you what we'll be looking for when we climb up.</p>

        <div class="pt-ledger">
            <article class="pt-ledger__item pt-from-left" data-animate>
                <span class="pt-ledger__index">1</span>
                <span class="pt-ledger__meta">I-69 &amp; Grand Parkway · early 2000s onward</span>
                <h3>Valley Ranch</h3>
                <p>Tract homes built quickly in waves. The earliest sections are past the age where builder shingles start shedding granules, and the open exposure around the Town Center side lets wind get under ridge caps.</p>
                <span class="pt-ledger__tag"><?php echo icon('search', 14); ?> Inspection + ridge cap check</span>
            </article>
            <article class="pt-ledger__item" data-animate>
                <span class="pt-ledger__index">2</span>
                <span class="pt-ledger__meta">Golf course community · 1990s–2000s</span>
                <h3>Oakhurst at Kingwood</h3>
                <p>Steeper pitches, more dormers and valleys, and the heaviest remaining tree cover of the newer communities. Valley leaks, moss on shaded slopes and HOA color approvals are the usual conversation.</p>
                <span class="pt-ledger__tag"><?php echo icon('home', 14); ?> Valleys, flashing, HOA packet</span>
            </article>
            <article class="pt-ledger__item" data-animate>
                <span class="pt-ledger__index">3</span>
                <span class="pt-ledger__meta">Off the Grand Parkway · 2020s</span>
                <h3>The Highlands</h3>
                <p>Brand-new homes under warranty from a dozen builders. The roof itself is rarely the problem yet — attic ventilation, gutter coverage and the first hail event are. A baseline inspection with photos is worth having on file.</p>
                <span class="pt-ledger__tag"><?php echo icon('shield', 14); ?> Baseline photos + ventilation</span>
            </article>
            <article class="pt-ledger__item" data-animate>
                <span class="pt-ledger__index">4</span>
                <span class="pt-ledger__meta">FM 1314 · 1970s</span>
                <h3>Porter Heights</h3>
                <p>One-story homes on bigger lots under mature pine. Second- and third-cycle roofs, rotted fascia behind sagging gutters, and outbuildings that are overdue for metal. Fences and gates come up on almost every visit.</p>
                <span class="pt-ledger__tag"><?php echo icon('hammer', 14); ?> Shingle or metal, fascia, fence</span>
            </article>
            <article class="pt-ledger__item pt-from-right" data-animate>
                <span class="pt-ledger__index">5</span>
                <span class="pt-ledger__meta">Toward Caney Creek &amp; the East Fork</span>
                <h3>The low side</h3>
                <p>Properties nearest the creeks took water in 2017, 2019 and May 2024. Roof water has to leave the slab fast here — oversized downspouts, splash blocks and soffit that dries out matter as much as the shingles.</p>
                <span class="pt-ledger__tag"><?php echo icon('droplets', 14); ?> Gutters, downspouts, soffit</span>
            </article>
        </div>
        <p class="pt-ledger__hint"><?php echo icon('arrow-up', 14); ?> Scroll sideways for all five</p>
    </div>
</section>

<div class="pt-divider pt-divider--zigzag" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 0,40 120,8 240,40 360,8 480,40 600,8 720,40 840,8 960,40 1080,8 1200,40 1320,8 1440,40 1440,64"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="pt-section" aria-labelledby="pt-claims-title">
    <div class="container">
        <div class="pt-claims">
            <div>
                <span class="pt-eyebrow">After hail, wind or a fallen pine</span>
                <h2 id="pt-claims-title">A claim process run by people who have sat on the adjuster's side of the table</h2>
                <p class="pt-lead" style="margin-bottom: var(--space-8);">
                    Between Glenn and Tim Menn there are more than 50 years of roofing, claims-handling and adjuster experience. We
                    take the paperwork off your plate; the coverage decision stays with your carrier.
                </p>
                <ol class="pt-steps">
                    <li data-animate class="pt-from-left"><span><?php echo icon('search', 20); ?></span><span><strong>Document before anything is touched</strong><p>Photos of every slope, every hail strike, every lifted tab — dated and organized.</p></span></li>
                    <li data-animate class="pt-from-left"><span><?php echo icon('hard-hat', 20); ?></span><span><strong>Meet the adjuster on your roof</strong><p>We walk it together so nothing is missed or misread.</p></span></li>
                    <li data-animate class="pt-from-left"><span><?php echo icon('check-circle', 20); ?></span><span><strong>Explain the policy in plain English</strong><p>Deductible, depreciation and scope, line by line, before you sign anything.</p></span></li>
                    <li data-animate class="pt-from-left"><span><?php echo icon('home', 20); ?></span><span><strong>Do the work as agreed</strong><p>Owner on site, landscaping covered, daily cleanup, magnet sweep for nails.</p></span></li>
                </ol>
            </div>
            <div class="pt-claims__aside">
                <figure class="pt-figure pt-from-right" data-animate style="aspect-ratio: 4 / 5;">
                    <?php echo areaPhoto('storm-damage-repair-v2', 'Tarped roof with a Triple G crew starting storm damage repairs', 1200, 1600, '(max-width: 1024px) 100vw, 40vw'); ?>
                </figure>
                <div class="pt-note" data-animate>
                    <strong>The honest part</strong>
                    Whether a claim is approved, and for how much, is always the insurance carrier's decision. What we control is how
                    well the damage is documented and how clearly you understand your own policy. Ask about temporary tarping if a
                    storm has opened the roof.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="pt-section pt-section--alt" aria-labelledby="pt-reviews-title">
    <div class="container">
        <span class="pt-eyebrow">From our customers</span>
        <h2 id="pt-reviews-title">A Porter patio roof, and the outdoor work neighbors hired us for next</h2>
        <p class="pt-lead">Real reviews, published by the client with first name and city exactly as written.</p>
        <div class="pt-reviews">
            <?php foreach ($cityReviews as $i => $r): ?>
            <?php if ($i === 0): ?>
            <article class="pt-review pt-review--featured pt-from-scale" data-animate>
                <div class="pt-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="pt-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <div class="pt-reviews__rest">
            <?php else: ?>
            <article class="pt-review pt-from-right" data-animate>
                <div class="pt-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="pt-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="pt-section" aria-labelledby="pt-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="pt-eyebrow">Common questions</span>
            <h2 id="pt-faq-title">Straight answers before you call</h2>
        </div>
        <div class="pt-faq">
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
<section class="pt-section pt-section--alt" aria-labelledby="pt-nearby-title">
    <div class="container">
        <span class="pt-eyebrow">Nearby communities</span>
        <h2 id="pt-nearby-title">Up and down I-69 from the Grand Parkway</h2>
        <p class="pt-lead">Kingwood is just across the county line, Humble is a few exits south, and New Caney and Splendora continue north up the freeway. We cover more than 50 Greater Houston communities in all.</p>
        <div class="pt-nearby">
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/new-caney/">New Caney, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/splendora/">Splendora, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="pt-chips">
            <?php foreach (['Woodbranch', 'Roman Forest', 'Atascocita', 'Spring', 'The Woodlands', 'Conroe', 'Cleveland'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="pt-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="pt-cta" aria-labelledby="pt-cta-title">
    <div class="container">
        <div class="pt-cta__inner">
            <div>
                <h2 id="pt-cta-title">Free roof inspection in Porter — photos, a written estimate, and no pressure</h2>
                <p>Call and we'll come take a look, whether it's a five-year-old roof in The Highlands or a shop roof off FM 1314. The owner handles the inspection and the decision stays with you.</p>
            </div>
            <div class="pt-ctas">
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
    "name": "Roofing Contractor in <?php echo htmlspecialchars($areaName); ?>, TX",
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
