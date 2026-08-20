<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Cypress';
$pageTitle = 'Roofing, Siding & Fences in Cypress, TX | ' . $shortName;
$pageDescription = 'Roof repair, hail damage, siding and fences in Cypress, TX from a family-owned team serving Greater Houston since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/cypress/';
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

/* No published review carries this city tag yet — show real roof-replacement reviews from across the area, labeled honestly */
$cityReviews = array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Cypress, TX'));
$fallbackReviews = empty($cityReviews) ? getTestimonialsFor('roof-replacement', 3) : [];

$areaFaqs = [
    [
        'q' => 'Does my HOA need to approve a new roof in Cypress?',
        'a' => 'In many Cypress master-planned communities — Bridgeland, Towne Lake, Fairfield, Coles Crossing and others — the architectural guidelines cover roof color and material, so check your community\'s rules before work starts. Triple G Roofing & Construction lists the exact shingle line and color on your free written estimate, which is usually what the review committee asks to see. How long the approval takes is up to the HOA.',
    ],
    [
        'q' => 'How can I tell whether hail actually damaged my roof?',
        'a' => 'From the ground you usually can\'t. We look for bruising and granule loss on the shingles, dents in soft metals like roof vents, gutters and the air-conditioner fins, and cracked pipe boots — then photograph it all during a free inspection. If there is real damage we explain what a claim involves; whether a claim is approved is your insurance carrier\'s decision.',
    ],
    [
        'q' => 'Do you handle more than roofing?',
        'a' => 'Yes. Triple G Roofing & Construction builds and repairs siding, fascia and soffit, gutters, patio covers, pergolas, wood decks, and cedar or pine privacy fences, and the same father-and-son team oversees every one of those jobs. The written estimate is free for all of it.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix cy-
   Tokens only. Full-bleed photo hero with bottom-anchored
   copy + glass fact card, fact ribbon, bento local context,
   horizontal HOA stepper (signature), ledger services,
   claims split, FAQ card grid, nearby, split CTA.
   ========================================================== */

/* ---------- Reveal directions (page-level variants of the framework's data-animate) ---------- */
[data-animate="left"]  { transform: translateX(-32px); }
[data-animate="right"] { transform: translateX(32px); }
[data-animate="down"]  { transform: translateY(-28px); }
[data-animate="scale"] { transform: scale(0.94); }
[data-animate].animated { transform: none; }

/* ---------- Hero ---------- */
.cy-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    min-height: min(88vh, 820px);
    display: flex;
    align-items: flex-end;
    padding: calc(var(--nav-height) + var(--space-16)) 0 var(--space-12);
    background: var(--color-dark);
}

.cy-hero__photo {
    position: absolute;
    inset: 0;
    z-index: -3;
}

.cy-hero__photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 40%;
}

.cy-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--color-dark) 55%, transparent) 0%, color-mix(in srgb, var(--color-dark) 25%, transparent) 35%, color-mix(in srgb, var(--color-dark) 92%, transparent) 100%),
        linear-gradient(90deg, color-mix(in srgb, var(--color-dark) 70%, transparent) 0%, transparent 60%);
}

.cy-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.07;
    pointer-events: none;
    mix-blend-mode: overlay;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.cy-hero__inner {
    display: grid;
    grid-template-columns: minmax(0, 1.35fr) minmax(0, 0.65fr);
    gap: var(--space-10);
    align-items: end;
}

.cy-crumb {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    align-items: center;
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 60%, transparent);
    margin-bottom: var(--space-6);
}

.cy-crumb a { color: color-mix(in srgb, var(--color-white) 88%, transparent); }
.cy-crumb a:hover { color: var(--color-accent); }
.cy-crumb [aria-current] { color: var(--color-white); font-weight: 600; }
.cy-crumb svg { opacity: 0.5; }

.cy-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-1) var(--space-3) var(--space-1) var(--space-2);
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-accent) 18%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-accent) 45%, transparent);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
}

.cy-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.4rem, 5.2vw, 4rem);
    line-height: 1.04;
    letter-spacing: -0.01em;
    text-wrap: balance;
    margin-bottom: var(--space-5);
    max-width: 14ch;
}

.cy-hero h1 em {
    font-style: normal;
    color: var(--color-accent);
    position: relative;
    white-space: nowrap;
}

.cy-hero h1 em::after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0.06em;
    height: 0.12em;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-accent) 45%, transparent);
    z-index: -1;
}

.cy-hero__lead {
    color: color-mix(in srgb, var(--color-white) 90%, transparent);
    font-size: clamp(1rem, 1.5vw, 1.15rem);
    line-height: 1.7;
    max-width: 58ch;
    margin-bottom: var(--space-7);
}

.cy-hero__lead strong { color: var(--color-white); }

.cy-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }

/* Glass fact card, bottom-right */
.cy-fact {
    justify-self: end;
    width: min(100%, 360px);
    border-radius: var(--radius-xl);
    background: color-mix(in srgb, var(--color-white) 8%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 18%, transparent);
    backdrop-filter: blur(14px);
    box-shadow: var(--shadow-xl);
    padding: var(--space-6);
    color: var(--color-white);
}

.cy-fact__label {
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-accent);
    margin-bottom: var(--space-4);
    display: block;
}

.cy-fact dl { margin: 0; display: grid; gap: var(--space-3); }

.cy-fact div {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: var(--space-3);
    align-items: baseline;
    padding-bottom: var(--space-3);
    border-bottom: 1px dashed color-mix(in srgb, var(--color-white) 18%, transparent);
}

.cy-fact div:last-child { border-bottom: 0; padding-bottom: 0; }
.cy-fact dt { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 72%, transparent); }
.cy-fact dd { margin: 0; font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-base); text-align: right; }

/* ---------- Fact ribbon ---------- */
.cy-ribbon {
    background: var(--color-primary);
    color: var(--color-white);
    overflow: hidden;
}

.cy-ribbon ul {
    list-style: none;
    margin: 0;
    padding: var(--space-4) 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-3) 0;
}

.cy-ribbon li {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: 0 var(--space-6);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    letter-spacing: 0.02em;
    border-right: 1px solid color-mix(in srgb, var(--color-white) 30%, transparent);
}

.cy-ribbon li:last-child { border-right: 0; }
.cy-ribbon li svg { color: var(--color-accent); }

/* ---------- Section scaffolding ---------- */
.cy-section { padding: var(--space-16) 0; position: relative; }
.cy-section--alt { background: var(--color-light); }
.cy-section--dark { background: var(--color-dark); color: var(--color-white); }

.cy-eyebrow {
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

.cy-eyebrow::before { content: ''; width: 28px; height: 2px; background: var(--color-primary); border-radius: var(--radius-full); }
.cy-section--dark .cy-eyebrow { color: var(--color-accent); }
.cy-section--dark .cy-eyebrow::before { background: var(--color-accent); }

.cy-section h2 { font-size: clamp(1.8rem, 3.4vw, 2.6rem); line-height: 1.12; text-wrap: balance; margin-bottom: var(--space-4); }
.cy-section--dark h2 { color: var(--color-white); }
.cy-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-primary); margin-bottom: var(--space-5); }
.cy-lead { max-width: 62ch; color: var(--color-gray-dark); line-height: 1.8; }
.cy-prose p { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); }
.cy-prose a { color: var(--color-primary); font-weight: 600; }
.cy-prose a:hover { text-decoration: underline; }

/* ---------- Local context: bento ---------- */
.cy-bento {
    display: grid;
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr);
    gap: var(--space-10);
    align-items: start;
}

.cy-tiles {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-auto-rows: auto;
    gap: var(--space-4);
}

.cy-tile {
    border-radius: var(--radius-lg);
    padding: var(--space-5);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
    position: relative;
    overflow: hidden;
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.cy-tile:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.cy-tile--tint-1 { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.cy-tile--tint-2 { background: color-mix(in srgb, var(--color-primary) 7%, var(--color-white)); }
.cy-tile--tint-3 { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.cy-tile::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
    opacity: 0;
    transition: opacity var(--transition-fast);
}

.cy-tile:hover::before { opacity: 1; }
.cy-tile strong { display: block; font-family: var(--font-heading); color: var(--color-dark); margin-bottom: var(--space-2); font-size: var(--font-size-base); }
.cy-tile span { display: block; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }
.cy-tile small { display: inline-block; margin-top: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-xs); letter-spacing: 0.08em; text-transform: uppercase; color: var(--color-primary); }

.cy-tile--photo {
    grid-column: 1 / -1;
    padding: 0;
    aspect-ratio: 16 / 9;
    border: 0;
}

.cy-tile--photo img { width: 100%; height: 100%; object-fit: cover; object-position: center 30%; transition: transform var(--transition-slow); }
.cy-tile--photo:hover img { transform: scale(1.04); }

.cy-tile--photo figcaption {
    position: absolute;
    left: var(--space-4);
    bottom: var(--space-4);
    background: color-mix(in srgb, var(--color-dark) 80%, transparent);
    color: var(--color-white);
    font-size: var(--font-size-xs);
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-md);
    backdrop-filter: blur(6px);
}

.cy-exposure {
    margin-top: var(--space-6);
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-dark);
    color: var(--color-white);
}

.cy-exposure svg { color: var(--color-accent); margin-top: 2px; }
.cy-exposure strong { display: block; font-family: var(--font-heading); margin-bottom: var(--space-1); }
.cy-exposure p { margin: 0; font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.65; max-width: 60ch; }

/* ---------- Dividers ---------- */
.cy-divider { line-height: 0; display: block; position: relative; }
.cy-divider svg { width: 100%; height: 70px; display: block; }
.cy-divider--slant { background: var(--color-white); }
.cy-divider--slant svg { fill: var(--color-light); }
.cy-divider--curve { background: var(--color-light); }
.cy-divider--curve svg { fill: var(--color-dark); }
.cy-divider--notch { background: var(--color-dark); }
.cy-divider--notch svg { fill: var(--color-white); }

/* ---------- Signature: HOA-ready stepper (horizontal) ---------- */
.cy-stepper-wrap { position: relative; }

.cy-stepper-wrap::after {
    content: '';
    position: absolute;
    right: -140px;
    top: -80px;
    width: 360px;
    height: 360px;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, color-mix(in srgb, var(--color-accent) 22%, transparent) 0%, transparent 70%);
    pointer-events: none;
}

.cy-stepper {
    list-style: none;
    margin: var(--space-10) 0 0;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: var(--space-6);
    position: relative;
    counter-reset: cystep;
}

.cy-stepper::before {
    content: '';
    position: absolute;
    top: 28px;
    left: 8%;
    right: 8%;
    border-top: 2px dashed color-mix(in srgb, var(--color-primary) 45%, transparent);
}

.cy-step { position: relative; counter-increment: cystep; }

.cy-step__num {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-lg);
    background: var(--color-white);
    color: var(--color-primary);
    border: 2px solid var(--color-primary);
    box-shadow: var(--shadow-md);
    position: relative;
    z-index: 1;
    margin-bottom: var(--space-5);
    transition: background var(--transition-base), color var(--transition-base), transform var(--transition-base);
}

.cy-step__num::before { content: counter(cystep, decimal-leading-zero); }
.cy-step:hover .cy-step__num { background: var(--color-primary); color: var(--color-white); transform: translateY(-3px); }

.cy-step__card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    padding: var(--space-5);
    box-shadow: var(--shadow-sm);
    height: 100%;
}

.cy-step:nth-child(even) .cy-step__card { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.cy-step__card strong { display: block; font-family: var(--font-heading); color: var(--color-dark); margin-bottom: var(--space-2); }
.cy-step__card p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; }

.cy-stepper-note {
    margin-top: var(--space-8);
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-8);
    align-items: center;
}

.cy-stepper-note figure { border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 5 / 4; box-shadow: var(--shadow-card); }
.cy-stepper-note figure img { width: 100%; height: 100%; object-fit: cover; object-position: center 35%; }
.cy-stepper-note p { color: var(--color-gray-dark); line-height: 1.8; max-width: 58ch; margin-bottom: var(--space-4); }
.cy-stepper-note p a { color: var(--color-primary); font-weight: 600; }

/* ---------- Services: ledger rows ---------- */
.cy-ledger { margin-top: var(--space-8); border-top: 1px solid var(--color-border); }

.cy-row {
    display: grid;
    grid-template-columns: 96px minmax(0, 1.1fr) minmax(0, 2fr) auto;
    gap: var(--space-6);
    align-items: center;
    padding: var(--space-5) 0;
    border-bottom: 1px solid var(--color-border);
    transition: background var(--transition-fast), padding-left var(--transition-base);
}

.cy-row:hover { background: color-mix(in srgb, var(--color-accent) 8%, transparent); padding-left: var(--space-3); }
.cy-row__thumb { width: 96px; aspect-ratio: 1; border-radius: var(--radius-md); overflow: hidden; }
.cy-row__thumb img { width: 100%; height: 100%; object-fit: cover; }
.cy-row h3 { font-size: var(--font-size-lg); margin: 0; }
.cy-row p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

.cy-row__link {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    white-space: nowrap;
    font-family: var(--font-heading);
    font-weight: 600;
    font-size: var(--font-size-sm);
    color: var(--color-primary);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    border: 1px solid color-mix(in srgb, var(--color-primary) 40%, transparent);
    transition: background var(--transition-fast), color var(--transition-fast);
}

.cy-row__link:hover { background: var(--color-primary); color: var(--color-white); }
.cy-row__link svg { transform: rotate(45deg); }

.cy-also { margin-top: var(--space-6); display: flex; flex-wrap: wrap; align-items: center; gap: var(--space-2); }
.cy-also > span { font-family: var(--font-heading); font-weight: 600; color: var(--color-dark); margin-right: var(--space-2); }

.cy-also a {
    font-size: var(--font-size-sm);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white));
    color: var(--color-dark);
    transition: background var(--transition-fast), color var(--transition-fast);
}

.cy-also a:hover { background: var(--color-dark); color: var(--color-white); }

/* ---------- Claims ---------- */
.cy-claims { display: grid; grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr); gap: var(--space-12); align-items: center; }

.cy-claims__photo {
    position: relative;
    border-radius: var(--radius-xl);
    overflow: hidden;
    aspect-ratio: 4 / 5;
    box-shadow: var(--shadow-xl);
}

.cy-claims__photo img { width: 100%; height: 100%; object-fit: cover; }

.cy-claims__photo::after {
    content: '';
    position: absolute;
    inset: auto 0 0 0;
    height: 45%;
    background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--color-dark) 75%, transparent));
}

.cy-claims__badge {
    position: absolute;
    left: var(--space-5);
    bottom: var(--space-5);
    z-index: 1;
    color: var(--color-white);
    font-family: var(--font-heading);
}

.cy-claims__badge strong { display: block; font-size: var(--font-size-4xl); line-height: 1; color: var(--color-accent); }
.cy-claims__badge span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 85%, transparent); }
.cy-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 60ch; }

.cy-claims__grid { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }

.cy-claims__grid li {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    color: color-mix(in srgb, var(--color-white) 90%, transparent);
    font-size: var(--font-size-sm);
    line-height: 1.6;
}

.cy-claims__grid li svg { color: var(--color-accent); display: block; margin-bottom: var(--space-3); }
.cy-claims__note { margin-top: var(--space-6); padding: var(--space-4) var(--space-5); border-radius: var(--radius-md); background: color-mix(in srgb, var(--color-accent) 14%, transparent); border-left: 3px solid var(--color-accent); font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 88%, transparent); max-width: 60ch; }

/* ---------- Reviews ---------- */
.cy-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.cy-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-7) var(--space-6) var(--space-6);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    position: relative;
    display: flex;
    flex-direction: column;
}

.cy-review::before {
    content: '\201C';
    position: absolute;
    top: -18px;
    left: var(--space-6);
    width: 44px;
    height: 44px;
    border-radius: var(--radius-full);
    background: var(--color-primary);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-3xl);
    line-height: 1.35;
    text-align: center;
    box-shadow: var(--shadow-md);
}

.cy-review:nth-child(2)::before { background: var(--color-accent); color: var(--color-dark); }
.cy-review:nth-child(3)::before { background: var(--color-dark); }
.cy-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.cy-review p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; flex: 1; margin-bottom: var(--space-4); }
.cy-review footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-dark); display: flex; justify-content: space-between; gap: var(--space-3); border-top: 1px dashed var(--color-border); padding-top: var(--space-3); }
.cy-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ: card grid ---------- */
.cy-faq { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: var(--space-5); margin-top: var(--space-8); }

.cy-faq article {
    padding: var(--space-6);
    border-radius: var(--radius-xl);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    position: relative;
    transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}

.cy-faq article:hover { border-color: color-mix(in srgb, var(--color-primary) 45%, var(--color-border)); box-shadow: var(--shadow-md); }
.cy-faq article:nth-child(2) { background: color-mix(in srgb, var(--color-primary) 5%, var(--color-white)); }
.cy-faq article:nth-child(3) { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.cy-faq h3 { font-size: var(--font-size-lg); line-height: 1.3; margin-bottom: var(--space-3); display: flex; gap: var(--space-3); align-items: flex-start; text-wrap: balance; }
.cy-faq h3 svg { flex-shrink: 0; color: var(--color-primary); margin-top: 3px; }
.cy-faq p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.7; }

/* ---------- Nearby ---------- */
.cy-nearby { margin-top: var(--space-8); display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: var(--space-4); }

.cy-nearby a {
    display: grid;
    gap: var(--space-1);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    color: var(--color-dark);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.cy-nearby a:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.cy-nearby strong { font-family: var(--font-heading); display: flex; justify-content: space-between; align-items: center; }
.cy-nearby strong svg { color: var(--color-primary); transform: rotate(45deg); }
.cy-nearby small { color: var(--color-gray); font-size: var(--font-size-xs); }

.cy-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.cy-chips span, .cy-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.cy-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.cy-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- CTA: split ---------- */
.cy-cta { background: var(--color-white); padding: var(--space-16) 0; }

.cy-cta__box {
    display: grid;
    grid-template-columns: minmax(0, 1.3fr) minmax(0, 0.7fr);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}

.cy-cta__copy { background: linear-gradient(135deg, var(--color-primary-dark), var(--color-primary)); color: var(--color-white); padding: var(--space-10); position: relative; }

.cy-cta__copy::after {
    content: '';
    position: absolute;
    right: -60px;
    top: -60px;
    width: 220px;
    height: 220px;
    border-radius: var(--radius-full);
    border: 24px solid color-mix(in srgb, var(--color-white) 10%, transparent);
    pointer-events: none;
}

.cy-cta__copy h2 { color: var(--color-white); font-size: clamp(1.7rem, 3vw, 2.4rem); text-wrap: balance; margin-bottom: var(--space-3); }
.cy-cta__copy p { color: color-mix(in srgb, var(--color-white) 88%, transparent); line-height: 1.7; max-width: 55ch; margin-bottom: var(--space-6); }

.cy-cta__phone {
    background: var(--color-dark);
    color: var(--color-white);
    padding: var(--space-10);
    display: grid;
    place-content: center;
    text-align: center;
    gap: var(--space-3);
}

.cy-cta__phone span { font-family: var(--font-heading); font-size: var(--font-size-xs); letter-spacing: 0.12em; text-transform: uppercase; color: var(--color-accent); }
.cy-cta__phone a { font-family: var(--font-heading); font-size: clamp(1.5rem, 2.6vw, 2.1rem); font-weight: 800; color: var(--color-white); }
.cy-cta__phone a:hover { color: var(--color-accent); }
.cy-cta__phone small { color: color-mix(in srgb, var(--color-white) 65%, transparent); font-size: var(--font-size-sm); }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .cy-hero__inner { grid-template-columns: 1fr; }
    .cy-fact { justify-self: start; }
    .cy-bento { grid-template-columns: 1fr; }
    .cy-stepper { grid-template-columns: 1fr 1fr; }
    .cy-stepper::before { display: none; }
    .cy-stepper-note { grid-template-columns: 1fr; }
    .cy-claims { grid-template-columns: 1fr; }
    .cy-claims__photo { max-width: 420px; }
    .cy-faq { grid-template-columns: 1fr; }
    .cy-cta__box { grid-template-columns: 1fr; }
    .cy-row { grid-template-columns: 80px 1fr; }
    .cy-row p { grid-column: 2; }
    .cy-row__link { grid-column: 2; justify-self: start; }
}

@media (max-width: 640px) {
    .cy-hero { min-height: 0; padding-top: calc(var(--nav-height) + var(--space-10)); }
    .cy-hero h1 { max-width: none; }
    .cy-ctas .btn { width: 100%; justify-content: center; }
    .cy-ribbon li { border-right: 0; padding: 0 var(--space-3); }
    .cy-tiles { grid-template-columns: 1fr; }
    .cy-stepper { grid-template-columns: 1fr; }
    .cy-claims__grid { grid-template-columns: 1fr; }
    .cy-section { padding: var(--space-12) 0; }
    .cy-cta__copy, .cy-cta__phone { padding: var(--space-8) var(--space-6); }
}

@media (prefers-reduced-motion: reduce) {
    .cy-tile, .cy-tile--photo img, .cy-step__num, .cy-row, .cy-nearby a, .cy-faq article { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="cy-hero" aria-labelledby="cy-title">
    <div class="cy-hero__photo">
        <?php echo areaPhoto('hero-roof-home-v2', 'Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing & Construction', 1600, 900, '100vw', true); ?>
    </div>
    <div class="container">
        <div class="cy-hero__inner">
            <div>
                <nav class="cy-crumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><?php echo icon('chevron-down', 12); ?>
                    <a href="/service-areas/">Service Areas</a><?php echo icon('chevron-down', 12); ?>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="cy-hero__eyebrow"><?php echo icon('map-pin', 14); ?> Northwest Harris County · Cy-Fair</span>

                <h1 id="cy-title">Roofing, Siding &amp; Fences in <em>Cypress</em>, TX</h1>

                <p class="cy-hero__lead">
                    <strong>Cypress is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a family-owned father-and-son team based in Humble, TX, in business since 1973.</strong>
                    Hail and wind damage, leak repair, full roof replacement, siding, gutters, patio covers and fences — with a free inspection and a free written estimate before any work begins.
                </p>

                <div class="cy-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Book a Free Inspection</a>
                </div>
            </div>

            <aside class="cy-fact" aria-label="Quick facts">
                <span class="cy-fact__label">At a glance</span>
                <dl>
                    <div><dt>In business since</dt><dd>1973</dd></div>
                    <div><dt>Who shows up</dt><dd>The owner, every job</dd></div>
                    <div><dt>Nextdoor Neighborhood Favorite</dt><dd>2022 · 2023 · 2024</dd></div>
                    <div><dt>Inspection &amp; estimate</dt><dd>Free</dd></div>
                </dl>
            </aside>
        </div>
    </div>
</section>

<!-- ===================== FACT RIBBON ===================== -->
<div class="cy-ribbon" aria-label="Why homeowners call Triple G">
    <div class="container">
        <ul>
            <li><?php echo icon('home', 18); ?> Family owned — father &amp; son</li>
            <li><?php echo icon('hard-hat', 18); ?> Owner on every job</li>
            <li><?php echo icon('award', 18); ?> Nextdoor Favorite 2022–2024</li>
            <li><?php echo icon('check-circle', 18); ?> Shingle &amp; metal roofing</li>
        </ul>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="cy-section" aria-labelledby="cy-local-title">
    <div class="container">
        <div class="cy-bento">
            <div class="cy-prose">
                <span class="cy-eyebrow">Unincorporated, and enormous</span>
                <h2 id="cy-local-title">Master-planned roofs, open-prairie weather</h2>
                <p class="cy-subtitle">Thousands of roofs built within a few years of each other tend to age out together.</p>

                <p>
                    Cypress is still unincorporated Harris County, which surprises people given its size. It grew out of the
                    ranch land and grassy prairie along US-290 northwest of Houston, with large-scale subdivision building
                    starting in the 1980s and accelerating through the 1990s, 2000s and 2010s — Fairfield and Coles Crossing on
                    the earlier end, Cypress Creek Lakes and Blackhorse Ranch after them, and Towne Lake and Bridgeland, which
                    Howard Hughes has been building along the Grand Parkway since 2006, on the newer end. Kids go to Cy-Fair ISD,
                    the third-largest district in Texas.
                </p>
                <p>
                    That history matters for your roof. Whole sections of Cypress were shingled in the same two or three years
                    with builder-grade product, so when one house on the street starts shedding granules, the neighbors usually
                    aren't far behind. And the ground that was prairie is still flat and open: southwest of 290 there's little
                    to slow a spring hail core or a straight-line wind gust before it reaches your ridge.
                </p>
                <p>
                    Looking for <strong>hail damage roof repair near me in Cypress</strong>? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — the inspection is free, and you get photos
                    of every slope before we recommend a thing.
                </p>

                <div class="cy-exposure">
                    <?php echo icon('wind', 22); ?>
                    <div>
                        <strong>Water, too — not just wind</strong>
                        <p>Cypress Creek set its two highest crests on record in the Tax Day flood of April 2016 and Hurricane Harvey in August 2017. Roofs don't flood, but fences, decks and siding near the creek do — and we rebuild all three.</p>
                    </div>
                </div>
            </div>

            <div class="cy-tiles">
                <figure class="cy-tile cy-tile--photo" data-animate="scale">
                    <?php echo areaPhoto('roof-large-home', 'Large two-story brick home with a completed roof replacement', 1200, 1600, '(max-width: 1024px) 100vw, 46vw'); ?>
                    <figcaption>Two-story brick with a cut-up roof line — the typical master-planned profile</figcaption>
                </figure>
                <div class="cy-tile cy-tile--tint-1" data-animate="left">
                    <strong>Bridgeland &amp; Towne Lake</strong>
                    <span>Newer homes along the Grand Parkway and the 300-acre Towne Lake. Steep, complex roofs and HOA color palettes; first-generation shingles now meeting their first big hail.</span>
                    <small>Newest stock</small>
                </div>
                <div class="cy-tile cy-tile--tint-2" data-animate="right">
                    <strong>Fairfield &amp; Coles Crossing</strong>
                    <span>The established side of Cypress off 290. Mature trees, second roofs coming due, and fences from the original build that have reached the end of the line.</span>
                    <small>Established</small>
                </div>
                <div class="cy-tile cy-tile--tint-3" data-animate="left">
                    <strong>Cypress Creek Lakes &amp; Blackhorse Ranch</strong>
                    <span>2000s builds with patio covers, pergolas and decks added over the years — the outdoor-living work we get called for as often as the roof.</span>
                    <small>Outdoor living</small>
                </div>
                <div class="cy-tile" data-animate="right">
                    <strong>Along US-290 &amp; the Grand Parkway</strong>
                    <span>Open frontage takes the wind first. Lifted ridge caps and creased shingles on the southwest-facing slopes are the most common thing we find here after a front.</span>
                    <small>Exposure</small>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="cy-divider cy-divider--slant" aria-hidden="true">
    <svg viewBox="0 0 1440 70" preserveAspectRatio="none"><polygon points="0,70 1440,0 1440,70"/></svg>
</div>

<!-- ===================== SIGNATURE: HOA-READY STEPPER ===================== -->
<section class="cy-section cy-section--alt cy-stepper-wrap" aria-labelledby="cy-hoa-title">
    <div class="container">
        <span class="cy-eyebrow">Built for master-planned communities</span>
        <h2 id="cy-hoa-title">HOA-ready from the first phone call</h2>
        <p class="cy-lead">Most Cypress subdivisions have architectural guidelines that cover what a visible exterior change can look like. We've built our process so the paperwork is never the slow part.</p>

        <ol class="cy-stepper">
            <li class="cy-step" data-animate="down">
                <span class="cy-step__num" aria-hidden="true"></span>
                <div class="cy-step__card">
                    <strong>Free inspection, with photos</strong>
                    <p>We walk every slope, the attic and the soft metals, and hand you the pictures. If the roof doesn't need replacing, we say so.</p>
                </div>
            </li>
            <li class="cy-step" data-animate="down">
                <span class="cy-step__num" aria-hidden="true"></span>
                <div class="cy-step__card">
                    <strong>Written estimate that names the product</strong>
                    <p>Shingle line, color, underlayment, flashing and ventilation are spelled out — the details an architectural review committee typically asks for.</p>
                </div>
            </li>
            <li class="cy-step" data-animate="down">
                <span class="cy-step__num" aria-hidden="true"></span>
                <div class="cy-step__card">
                    <strong>You submit; we supply what's missing</strong>
                    <p>Need a color sample, a spec sheet or a site plan note for the HOA? Ask. Approval timing is the association's; the paperwork being right is ours.</p>
                </div>
            </li>
            <li class="cy-step" data-animate="down">
                <span class="cy-step__num" aria-hidden="true"></span>
                <div class="cy-step__card">
                    <strong>Install, clean up, magnet sweep</strong>
                    <p>Landscaping and pool covered, daily cleanup, a magnet run for nails, and the owner on site from tear-off to final walk-through.</p>
                </div>
            </li>
        </ol>

        <div class="cy-stepper-note">
            <div data-animate="left">
                <p>
                    One more line item we always include on a Cypress estimate: ventilation. Shingle manufacturers can void or
                    limit a shingle warranty when the attic isn't ventilated to their spec — balanced intake and exhaust — and
                    a hot, sealed attic under a west-facing slope is exactly where we see shingles cook early.
                    <a href="/services/attic-venting/">Here's how we handle attic venting.</a>
                </p>
                <p>
                    The same estimate can cover the <a href="/services/gutter-installation/">gutters</a>, a
                    <a href="/services/siding-fascia-soffit/">siding or fascia repair</a>, or the
                    <a href="/services/fences-gates/">fence</a> along the back line — one visit, one written price.
                </p>
            </div>
            <figure data-animate="right">
                <?php echo areaPhoto('roof-overhead', 'Overhead view of a completed architectural shingle roof', 1200, 1600, '(max-width: 1024px) 100vw, 45vw'); ?>
            </figure>
        </div>
    </div>
</section>

<!-- ===================== SERVICES: LEDGER ===================== -->
<section class="cy-section" aria-labelledby="cy-svc-title">
    <div class="container">
        <span class="cy-eyebrow">What we do here</span>
        <h2 id="cy-svc-title">One crew for the roof and everything attached to it</h2>
        <p class="cy-lead"><?php echo htmlspecialchars($shortName); ?> installs shingle and metal roofs, then handles the siding, gutters, patio covers, decks and fences that Cypress backyards collect over the years.</p>

        <div class="cy-ledger">
            <article class="cy-row" data-animate>
                <div class="cy-row__thumb"><?php echo areaPhoto('storm-damage-repair-v2', 'Tarped roof with a Triple G crew starting storm damage repairs', 1200, 1600, '96px'); ?></div>
                <h3>Hail, Wind &amp; Storm Damage</h3>
                <p>Photo documentation, temporary tarping on request, and help through the claim from the first call to the final walk-through.</p>
                <a class="cy-row__link" href="/services/storm-damage-repair/">Storm damage <?php echo icon('arrow-up', 14); ?></a>
            </article>
            <article class="cy-row" data-animate>
                <div class="cy-row__thumb"><?php echo areaPhoto('roof-inspection-v2', 'Close-up of cracked and lifted shingles found during a roof inspection', 1200, 1600, '96px'); ?></div>
                <h3>Roof Repair &amp; Inspection</h3>
                <p>Leak tracing, flashing, pipe boots, lifted ridge caps and wood rot. Every inspection is free and documented.</p>
                <a class="cy-row__link" href="/services/roof-repair/">Roof repair <?php echo icon('arrow-up', 14); ?></a>
            </article>
            <article class="cy-row" data-animate>
                <div class="cy-row__thumb"><?php echo areaPhoto('roof-replacement', 'Triple G crew replacing the roof on a two-story brick home', 1200, 1600, '96px'); ?></div>
                <h3>Roof Replacement</h3>
                <p>Architectural shingle or metal, full tear-off, decking repair, new underlayment and flashing, ventilation set to spec.</p>
                <a class="cy-row__link" href="/services/roof-replacement/">Roof replacement <?php echo icon('arrow-up', 14); ?></a>
            </article>
            <article class="cy-row" data-animate>
                <div class="cy-row__thumb"><?php echo areaPhoto('patio-cover-fans', 'Covered patio with beadboard ceiling and fans', 1200, 1600, '96px'); ?></div>
                <h3>Patio Covers, Pergolas &amp; Decks</h3>
                <p>Covered and screened patios, cedar pergolas and wood decks built to match the house and the HOA's guidelines.</p>
                <a class="cy-row__link" href="/services/patio-covers-decks/">Patios &amp; decks <?php echo icon('arrow-up', 14); ?></a>
            </article>
            <article class="cy-row" data-animate>
                <div class="cy-row__thumb"><?php echo areaPhoto('fence-gate-cedar', 'New cedar fence and double gate beside a brick home', 1200, 1600, '96px'); ?></div>
                <h3>Fences &amp; Gates</h3>
                <p>Cedar and pine privacy fences, ranch rail and custom gates — new, repaired or replaced, shared lines included.</p>
                <a class="cy-row__link" href="/services/fences-gates/">Fences &amp; gates <?php echo icon('arrow-up', 14); ?></a>
            </article>
        </div>

        <div class="cy-also">
            <span>Also:</span>
            <a href="/services/roof-inspection/">Roof Inspection</a>
            <a href="/services/roof-damage-repair/">Roof Damage Repair</a>
            <a href="/services/siding-fascia-soffit/">Siding, Fascia &amp; Soffit</a>
            <a href="/services/gutter-installation/">Gutters</a>
            <a href="/services/attic-venting/">Attic Venting</a>
        </div>
    </div>
</section>

<div class="cy-divider cy-divider--curve" aria-hidden="true">
    <svg viewBox="0 0 1440 70" preserveAspectRatio="none"><path d="M0,70 L0,40 Q360,0 720,40 T1440,40 L1440,70 Z"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="cy-section cy-section--dark" aria-labelledby="cy-claims-title">
    <div class="container">
        <div class="cy-claims">
            <div class="cy-claims__photo" data-animate="left">
                <?php echo areaPhoto('crew-underlayment', 'Triple G roofers installing synthetic underlayment on a steep roof', 1200, 1600, '(max-width: 1024px) 420px, 38vw'); ?>
                <div class="cy-claims__badge"><strong>50+</strong><span>years of roofing, claims-handling &amp; adjuster experience</span></div>
            </div>
            <div>
                <span class="cy-eyebrow">After the hail</span>
                <h2 id="cy-claims-title">We know what the adjuster is looking for, because we've been one</h2>
                <p>
                    Glenn and Tim Menn have handled the claim side of storm damage for decades. On a Cypress hail or wind claim
                    we document every slope before anything is touched, meet the adjuster on your roof, and explain your policy —
                    deductible, depreciation, scope — in plain English. The stress moves from your plate to ours.
                </p>
                <ul class="cy-claims__grid">
                    <li data-animate><?php echo icon('search', 20); ?>Photo documentation of every slope, vent, gutter and soft metal</li>
                    <li data-animate><?php echo icon('hard-hat', 20); ?>We meet the adjuster at your home and walk the roof together</li>
                    <li data-animate><?php echo icon('check-circle', 20); ?>Your policy explained line by line, before you sign anything</li>
                    <li data-animate><?php echo icon('home', 20); ?>The work done as agreed, with the owner on site</li>
                </ul>
                <p class="cy-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. Our job is to document the damage properly and make sure you understand your options.</p>
            </div>
        </div>
    </div>
</section>

<div class="cy-divider cy-divider--notch" aria-hidden="true">
    <svg viewBox="0 0 1440 70" preserveAspectRatio="none"><polygon points="0,70 0,30 660,30 720,0 780,30 1440,30 1440,70"/></svg>
</div>

<!-- ===================== REVIEWS ===================== -->
<?php $shown = !empty($cityReviews) ? $cityReviews : $fallbackReviews; if (!empty($shown)): ?>
<section class="cy-section" aria-labelledby="cy-reviews-title">
    <div class="container">
        <span class="cy-eyebrow">From our customers</span>
        <h2 id="cy-reviews-title"><?php echo !empty($cityReviews) ? 'What ' . $areaName . ' homeowners say about Triple G' : 'What homeowners across Greater Houston say about a Triple G roof'; ?></h2>
        <p class="cy-lead">Real reviews, published by the client with first name and city.</p>
        <div class="cy-reviews">
            <?php foreach ($shown as $r): ?>
            <article class="cy-review" data-animate="scale">
                <div class="cy-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer><?php echo htmlspecialchars($r['name']); ?> <span><?php echo htmlspecialchars($r['city']); ?></span></footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="cy-section cy-section--alt" aria-labelledby="cy-faq-title">
    <div class="container">
        <span class="cy-eyebrow">Common questions</span>
        <h2 id="cy-faq-title">What homeowners here ask us first</h2>
        <div class="cy-faq">
            <?php foreach ($areaFaqs as $i => $faq): ?>
            <article data-animate="<?php echo ['left', '', 'right'][$i] ?? ''; ?>">
                <h3><?php echo icon('plus', 18); ?> <?php echo htmlspecialchars($faq['q']); ?></h3>
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== NEARBY ===================== -->
<section class="cy-section" aria-labelledby="cy-nearby-title">
    <div class="container">
        <span class="cy-eyebrow">Nearby communities</span>
        <h2 id="cy-nearby-title">Down 290 and around the northwest side</h2>
        <p class="cy-lead">Jersey Village sits just inside Beltway 8 on the same freeway, and Spring and The Woodlands are a short run east on the Grand Parkway. We cover more than 50 Greater Houston communities in all.</p>
        <div class="cy-nearby">
            <a href="/service-areas/jersey-village/"><strong>Jersey Village, TX <?php echo icon('arrow-up', 18); ?></strong><small>US-290 at Beltway 8</small></a>
            <a href="/service-areas/houston/"><strong>Houston, TX <?php echo icon('arrow-up', 18); ?></strong><small>Inside the city limits</small></a>
            <a href="/service-areas/spring/"><strong>Spring, TX <?php echo icon('arrow-up', 18); ?></strong><small>East on the Grand Parkway</small></a>
            <a href="/service-areas/the-woodlands/"><strong>The Woodlands, TX <?php echo icon('arrow-up', 18); ?></strong><small>North up I-45</small></a>
        </div>
        <div class="cy-chips">
            <?php foreach (['Humble', 'Kingwood', 'Atascocita', 'Conroe', 'Bellaire', 'Spring Valley Village', 'Hedwig Village'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="cy-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="cy-cta" aria-labelledby="cy-cta-title">
    <div class="container">
        <div class="cy-cta__box">
            <div class="cy-cta__copy">
                <h2 id="cy-cta-title">Hail last spring? Fence leaning? Let's take a look.</h2>
                <p>Free inspection, photos of what we find, and a written estimate with the product named — ready for you and for your HOA. No pressure; that's how we've done it since 1973.</p>
                <div class="cy-ctas">
                    <a href="/contact/" class="btn btn-accent btn-lg">Request a Free Estimate</a>
                </div>
            </div>
            <div class="cy-cta__phone">
                <span>Call the owner directly</span>
                <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>
                <small><?php echo htmlspecialchars($businessHours); ?></small>
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
    "name": "Roofing, Siding & Fences in <?php echo htmlspecialchars($areaName); ?>, TX",
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
