<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Jersey Village';
$pageTitle = 'Roof Replacement & Repair in Jersey Village, TX | Triple G';
$pageDescription = 'Roof replacement, leak repair and gutters in Jersey Village, TX from a family-owned team serving Greater Houston since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/jersey-village/';
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

/* Real reviews from this community — names + cities exactly as the client published them */
$cityReviews = array_slice(array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Jersey Village, TX')), 0, 3);
$stormReview = array_values(array_filter($cityReviews, fn($t) => $t['name'] === 'Nabail'));

$areaFaqs = [
    [
        'q' => 'My Jersey Village home was built in the 1960s and part of the roof is nearly flat. Can you replace it?',
        'a' => 'Yes. Many of the original ranch homes in Jersey Village have a low-slope section over a den, garage or patio addition that can\'t take standard shingles. Triple G Roofing & Construction specs a low-slope membrane or roll product for those areas and architectural shingles for the steeper slopes, with the transition flashed properly so the seam isn\'t the next leak. The inspection and written estimate are free.',
    ],
    [
        'q' => 'Do gutters help with the flooding Jersey Village is known for?',
        'a' => 'Honest answer: gutters won\'t stop a bayou from leaving its banks. What they do is keep roof runoff from pooling against your slab and rotting the fascia and soffit, which matters on a flat lot where water already drains slowly. If you\'ve elevated your home since the 2016 flood, the downspouts need to reach the ground and discharge away from the piers — we build them that way.',
    ],
    [
        'q' => 'Will you help with my insurance claim after a windstorm?',
        'a' => 'We help you through the whole process. With more than 50 years of roofing, claims-handling and adjuster experience, we document the damage, meet the adjuster at your home and explain your policy in plain English. Whether a claim is approved, and for how much, is the carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix jv-
   Tokens only. LIGHT split hero with arch-clipped photo and
   floating badges, dateline strip, local context with offset
   collage, "original ranch vs. rebuilt" ledger (signature),
   110-mph storm-test pull quote, icon tile-wall services,
   claims, reviews, numbered FAQ, nearby, dark CTA band.
   ========================================================== */

/* ---------- Reveal directions ---------- */
[data-animate="left"]  { transform: translateX(-32px); }
[data-animate="right"] { transform: translateX(32px); }
[data-animate="down"]  { transform: translateY(-28px); }
[data-animate="scale"] { transform: scale(0.94); }
[data-animate].animated { transform: none; }

/* ---------- Hero (light) ---------- */
.jv-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background:
        radial-gradient(ellipse at 15% 20%, color-mix(in srgb, var(--color-accent) 22%, transparent) 0%, transparent 50%),
        linear-gradient(180deg, var(--color-light) 0%, var(--color-white) 100%);
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
}

.jv-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.05;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.jv-hero::after {
    content: '1956';
    position: absolute;
    z-index: -1;
    right: -0.1em;
    top: calc(var(--nav-height) + var(--space-4));
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: clamp(8rem, 22vw, 20rem);
    line-height: 1;
    letter-spacing: -0.04em;
    color: color-mix(in srgb, var(--color-dark) 4%, transparent);
    pointer-events: none;
    user-select: none;
}

.jv-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 0.85fr);
    gap: var(--space-12);
    align-items: center;
}

.jv-crumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--font-size-sm);
    color: var(--color-gray);
    margin-bottom: var(--space-6);
}

.jv-crumb a { color: var(--color-gray-dark); }
.jv-crumb a:hover { color: var(--color-primary); }
.jv-crumb [aria-current] { color: var(--color-dark); font-weight: 600; }

.jv-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-4);
}

.jv-hero h1 {
    color: var(--color-dark);
    font-size: clamp(2.3rem, 4.8vw, 3.7rem);
    line-height: 1.06;
    text-wrap: balance;
    margin-bottom: var(--space-5);
}

.jv-hero h1 span { color: var(--color-primary); }

.jv-hero__answer {
    position: relative;
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    margin-bottom: var(--space-6);
}

.jv-hero__answer::before {
    content: '';
    position: absolute;
    left: -1px;
    top: var(--space-5);
    bottom: var(--space-5);
    width: 4px;
    border-radius: 0 var(--radius-full) var(--radius-full) 0;
    background: linear-gradient(180deg, var(--color-primary), var(--color-accent));
}

.jv-hero__answer p { margin: 0; color: var(--color-gray-dark); line-height: 1.7; font-size: clamp(1rem, 1.5vw, 1.1rem); }
.jv-hero__answer strong { color: var(--color-dark); }

.jv-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }

.jv-hero__meta {
    margin-top: var(--space-6);
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3) var(--space-6);
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
}

.jv-hero__meta span { display: inline-flex; align-items: center; gap: var(--space-2); }
.jv-hero__meta svg { color: var(--color-primary); }

/* Arch photo + floating badges */
.jv-arch { position: relative; justify-self: center; width: min(100%, 420px); }

.jv-arch__img {
    aspect-ratio: 4 / 5;
    overflow: hidden;
    border-radius: var(--radius-full) var(--radius-full) var(--radius-xl) var(--radius-xl);
    box-shadow: var(--shadow-xl);
    border: 6px solid var(--color-white);
}

.jv-arch__img img { width: 100%; height: 100%; object-fit: cover; object-position: center 30%; }

.jv-badge {
    position: absolute;
    display: grid;
    gap: 2px;
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
    font-family: var(--font-heading);
    animation: jv-float 7s ease-in-out infinite;
}

.jv-badge strong { font-size: var(--font-size-2xl); line-height: 1; }
.jv-badge span { font-size: var(--font-size-xs); letter-spacing: 0.06em; text-transform: uppercase; }
.jv-badge--a { left: -28px; top: 22%; background: var(--color-dark); color: var(--color-white); }
.jv-badge--a strong { color: var(--color-accent); }
.jv-badge--b { right: -24px; bottom: 14%; background: var(--color-accent); color: var(--color-dark); animation-delay: -3.5s; }

@keyframes jv-float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

/* ---------- Dateline strip ---------- */
.jv-dateline { background: var(--color-dark); color: var(--color-white); }

.jv-dateline ol {
    list-style: none;
    margin: 0;
    padding: var(--space-6) 0;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: var(--space-6);
    position: relative;
}

.jv-dateline ol::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    top: calc(var(--space-6) + 7px);
    height: 1px;
    background: linear-gradient(90deg, transparent, color-mix(in srgb, var(--color-accent) 60%, transparent) 15%, color-mix(in srgb, var(--color-accent) 60%, transparent) 85%, transparent);
}

.jv-dateline li { position: relative; padding-top: var(--space-5); }

.jv-dateline li::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 15px;
    height: 15px;
    border-radius: var(--radius-full);
    background: var(--color-dark);
    border: 3px solid var(--color-accent);
}

.jv-dateline strong { display: block; font-family: var(--font-heading); font-size: var(--font-size-xl); color: var(--color-accent); line-height: 1; margin-bottom: var(--space-2); }
.jv-dateline span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 78%, transparent); line-height: 1.55; display: block; }

/* ---------- Section scaffolding ---------- */
.jv-section { padding: var(--space-16) 0; position: relative; }
.jv-section--alt { background: var(--color-light); }
.jv-section--dark { background: var(--color-dark); color: var(--color-white); }

.jv-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
    padding-bottom: var(--space-1);
    border-bottom: 2px solid color-mix(in srgb, var(--color-primary) 35%, transparent);
}

.jv-section--dark .jv-eyebrow { color: var(--color-accent); border-color: color-mix(in srgb, var(--color-accent) 40%, transparent); }
.jv-section h2 { font-size: clamp(1.8rem, 3.4vw, 2.55rem); line-height: 1.12; text-wrap: balance; margin-bottom: var(--space-4); }
.jv-section--dark h2 { color: var(--color-white); }
.jv-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-5); }
.jv-lead { max-width: 62ch; color: var(--color-gray-dark); line-height: 1.8; }
.jv-prose p { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); }
.jv-prose a { color: var(--color-primary); font-weight: 600; }
.jv-prose a:hover { text-decoration: underline; }

/* ---------- Local context: text + offset collage ---------- */
.jv-local { display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr); gap: var(--space-12); align-items: center; }

.jv-collage { position: relative; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); padding-top: var(--space-10); }
.jv-collage figure { overflow: hidden; border-radius: var(--radius-xl); box-shadow: var(--shadow-card); aspect-ratio: 4 / 5; }
.jv-collage figure:first-child { margin-top: calc(var(--space-10) * -1); }
.jv-collage figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.jv-collage figure:hover img { transform: scale(1.04); }

.jv-collage::after {
    content: '';
    position: absolute;
    right: -40px;
    bottom: -40px;
    width: 180px;
    height: 180px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-primary) 10%, transparent);
    z-index: -1;
}

.jv-callouts { display: grid; gap: var(--space-3); margin: var(--space-6) 0; }

.jv-callout {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}

.jv-callout:hover { transform: translateX(4px); box-shadow: var(--shadow-md); }
.jv-callout:nth-child(1) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.jv-callout:nth-child(3) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.jv-callout svg { color: var(--color-primary); margin-top: 3px; }
.jv-callout strong { display: block; font-family: var(--font-heading); color: var(--color-dark); margin-bottom: var(--space-1); }
.jv-callout span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

/* ---------- Dividers ---------- */
.jv-divider { line-height: 0; display: block; }
.jv-divider svg { width: 100%; height: 64px; display: block; }
.jv-divider--zigzag { background: var(--color-white); }
.jv-divider--zigzag svg { fill: var(--color-light); }
.jv-divider--tilt { background: var(--color-light); }
.jv-divider--tilt svg { fill: var(--color-dark); }
.jv-divider--wave { background: var(--color-dark); }
.jv-divider--wave svg { fill: var(--color-white); }

/* ---------- Signature: original ranch vs. rebuilt ledger ---------- */
.jv-ledger { margin-top: var(--space-10); border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid var(--color-border); background: var(--color-white); }

.jv-ledger__head {
    display: grid;
    grid-template-columns: 180px 1fr 1fr;
    background: var(--color-dark);
    color: var(--color-white);
}

.jv-ledger__head > div { padding: var(--space-5); font-family: var(--font-heading); font-weight: 700; }
.jv-ledger__head > div:first-child { color: color-mix(in srgb, var(--color-white) 55%, transparent); font-size: var(--font-size-xs); letter-spacing: 0.12em; text-transform: uppercase; align-self: center; }
.jv-ledger__head small { display: block; font-weight: 400; font-size: var(--font-size-xs); color: color-mix(in srgb, var(--color-white) 65%, transparent); margin-top: var(--space-1); }
.jv-ledger__head > div:nth-child(2) { border-left: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent); }
.jv-ledger__head > div:nth-child(3) { border-left: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent); background: color-mix(in srgb, var(--color-primary) 35%, var(--color-dark)); }

.jv-ledger__row {
    display: grid;
    grid-template-columns: 180px 1fr 1fr;
    border-top: 1px solid var(--color-border);
    transition: background var(--transition-fast);
}

.jv-ledger__row:hover { background: color-mix(in srgb, var(--color-accent) 8%, var(--color-white)); }
.jv-ledger__row > div { padding: var(--space-5); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; }
.jv-ledger__row > div:first-child { font-family: var(--font-heading); font-weight: 700; color: var(--color-dark); display: flex; align-items: center; gap: var(--space-2); }
.jv-ledger__row > div:first-child svg { color: var(--color-primary); flex-shrink: 0; }
.jv-ledger__row > div:nth-child(2), .jv-ledger__row > div:nth-child(3) { border-left: 1px solid var(--color-border); }
.jv-ledger__row > div:nth-child(3) { background: color-mix(in srgb, var(--color-primary) 3%, transparent); }
.jv-ledger__foot { padding: var(--space-4) var(--space-5); font-size: var(--font-size-xs); color: var(--color-gray); border-top: 1px solid var(--color-border); background: var(--color-light); }

/* ---------- Storm test: pull quote with stat ---------- */
.jv-storm { position: relative; overflow: hidden; }

.jv-storm::before {
    content: '';
    position: absolute;
    left: 50%;
    top: -200px;
    width: 700px;
    height: 700px;
    margin-left: -350px;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, color-mix(in srgb, var(--color-primary) 28%, transparent) 0%, transparent 65%);
    pointer-events: none;
}

.jv-storm__grid { display: grid; grid-template-columns: minmax(0, 0.8fr) minmax(0, 1.2fr); gap: var(--space-12); align-items: center; position: relative; }

.jv-storm__stat { text-align: center; padding: var(--space-8); border-radius: var(--radius-xl); background: color-mix(in srgb, var(--color-white) 6%, transparent); border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent); }
.jv-storm__stat strong { display: block; font-family: var(--font-heading); font-size: clamp(4rem, 9vw, 7rem); line-height: 0.95; color: var(--color-accent); letter-spacing: -0.03em; }
.jv-storm__stat em { display: block; font-style: normal; font-family: var(--font-heading); font-size: var(--font-size-xl); color: var(--color-white); margin-top: var(--space-2); }
.jv-storm__stat span { display: block; font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 70%, transparent); margin-top: var(--space-3); line-height: 1.5; }

.jv-storm blockquote { margin: 0; position: relative; padding-left: var(--space-8); }

.jv-storm blockquote::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    border-radius: var(--radius-full);
    background: linear-gradient(180deg, var(--color-accent), transparent);
}

.jv-storm blockquote p { font-size: clamp(1.05rem, 1.7vw, 1.3rem); line-height: 1.7; color: color-mix(in srgb, var(--color-white) 92%, transparent); font-style: italic; margin-bottom: var(--space-4); }
.jv-storm blockquote footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-accent); }
.jv-storm__note { margin-top: var(--space-5); font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 65%, transparent); max-width: 60ch; line-height: 1.6; }

/* ---------- Services: icon tile wall ---------- */
.jv-tiles { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.jv-tile {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    color: var(--color-dark);
    overflow: hidden;
    transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
}

.jv-tile:nth-child(3n+1) { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.jv-tile:nth-child(3n+2) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.jv-tile:nth-child(3n) { background: color-mix(in srgb, var(--color-dark) 4%, var(--color-white)); }
.jv-tile:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.jv-tile::after {
    content: '';
    position: absolute;
    right: -30px;
    bottom: -30px;
    width: 90px;
    height: 90px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-primary) 8%, transparent);
    transition: transform var(--transition-base);
}

.jv-tile:hover::after { transform: scale(1.6); }
.jv-tile__icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-dark); color: var(--color-accent); }
.jv-tile strong { font-family: var(--font-heading); font-size: var(--font-size-base); line-height: 1.3; }
.jv-tile span { font-size: var(--font-size-xs); color: var(--color-gray-dark); line-height: 1.55; flex: 1; }
.jv-tile small { font-family: var(--font-heading); font-size: var(--font-size-xs); font-weight: 700; color: var(--color-primary); display: inline-flex; align-items: center; gap: var(--space-1); }
.jv-tile small svg { transform: rotate(45deg); transition: transform var(--transition-fast); }
.jv-tile:hover small svg { transform: rotate(45deg) translate(2px, -2px); }

/* ---------- Claims (light, photo + steps) ---------- */
.jv-claims { display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr); gap: var(--space-12); align-items: center; }
.jv-claims__photo { border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 4 / 5; box-shadow: var(--shadow-xl); position: relative; }
.jv-claims__photo img { width: 100%; height: 100%; object-fit: cover; object-position: center 20%; }
.jv-claims__photo figcaption { position: absolute; left: var(--space-4); right: var(--space-4); bottom: var(--space-4); padding: var(--space-3) var(--space-4); border-radius: var(--radius-md); background: color-mix(in srgb, var(--color-dark) 82%, transparent); color: var(--color-white); font-size: var(--font-size-xs); backdrop-filter: blur(6px); }

.jv-steps { list-style: none; margin: var(--space-6) 0 0; padding: 0; counter-reset: jvstep; display: grid; gap: var(--space-3); }

.jv-steps li {
    counter-increment: jvstep;
    display: grid;
    grid-template-columns: 44px 1fr;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    line-height: 1.55;
}

.jv-steps li::before {
    content: counter(jvstep);
    width: 44px;
    height: 44px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    font-family: var(--font-heading);
    font-weight: 800;
    background: var(--color-primary);
    color: var(--color-white);
}

.jv-steps li:nth-child(even)::before { background: var(--color-accent); color: var(--color-dark); }
.jv-claims__note { margin-top: var(--space-5); padding: var(--space-4) var(--space-5); border-radius: var(--radius-md); background: color-mix(in srgb, var(--color-primary) 7%, var(--color-white)); border-left: 3px solid var(--color-primary); font-size: var(--font-size-sm); color: var(--color-gray-dark); max-width: 60ch; line-height: 1.6; }

/* ---------- Reviews (wide card) ---------- */
.jv-reviews { margin-top: var(--space-8); display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 360px), 1fr)); gap: var(--space-6); }

.jv-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-7);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    display: grid;
    grid-template-columns: 64px 1fr;
    gap: var(--space-5);
}

.jv-review__avatar { width: 64px; height: 64px; border-radius: var(--radius-full); display: grid; place-items: center; background: var(--color-dark); color: var(--color-accent); font-family: var(--font-heading); font-size: var(--font-size-2xl); font-weight: 800; }
.jv-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.jv-review p { color: var(--color-gray-dark); line-height: 1.75; margin-bottom: var(--space-4); }
.jv-review footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-dark); }
.jv-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ: numbered accordion ---------- */
.jv-faq { max-width: 860px; margin: var(--space-8) auto 0; counter-reset: jvfaq; display: grid; gap: var(--space-3); }
.jv-faq details { counter-increment: jvfaq; background: var(--color-white); border: 1px solid var(--color-border); border-left: 4px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; transition: border-color var(--transition-fast), box-shadow var(--transition-fast); }
.jv-faq details[open] { border-left-color: var(--color-primary); box-shadow: var(--shadow-md); }

.jv-faq summary {
    cursor: pointer;
    list-style: none;
    display: grid;
    grid-template-columns: auto 1fr auto;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-5) var(--space-6);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
}

.jv-faq summary::-webkit-details-marker { display: none; }
.jv-faq summary::before { content: counter(jvfaq, decimal-leading-zero); font-size: var(--font-size-xs); letter-spacing: 0.1em; color: var(--color-primary); }
.jv-faq summary svg { color: var(--color-primary); transition: transform var(--transition-fast); }
.jv-faq details[open] summary svg { transform: rotate(180deg); }
.jv-faq details p { margin: 0; padding: 0 var(--space-6) var(--space-6) calc(var(--space-6) + 2.2rem); color: var(--color-gray-dark); line-height: 1.7; }

/* ---------- Nearby ---------- */
.jv-nearby { margin-top: var(--space-8); display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); }

.jv-nearby a {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-full);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
    transition: background var(--transition-fast), color var(--transition-fast), transform var(--transition-fast);
}

.jv-nearby a svg { color: var(--color-primary); }
.jv-nearby a:hover { background: var(--color-dark); color: var(--color-white); transform: translateY(-2px); }
.jv-nearby a:hover svg { color: var(--color-accent); }

.jv-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.jv-chips span, .jv-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.jv-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.jv-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- CTA: dark band ---------- */
.jv-cta { position: relative; overflow: hidden; background: var(--color-dark); color: var(--color-white); padding: var(--space-16) 0; }

.jv-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 10% 50%, color-mix(in srgb, var(--color-primary) 35%, transparent) 0%, transparent 45%),
        radial-gradient(circle at 90% 50%, color-mix(in srgb, var(--color-accent) 25%, transparent) 0%, transparent 45%);
    pointer-events: none;
}

.jv-cta__grid { position: relative; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.jv-cta h2 { color: var(--color-white); font-size: clamp(1.7rem, 3vw, 2.4rem); text-wrap: balance; margin-bottom: var(--space-3); }
.jv-cta p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.7; max-width: 58ch; margin: 0; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .jv-hero__grid { grid-template-columns: 1fr; }
    .jv-arch { justify-self: start; width: min(100%, 360px); }
    .jv-hero::after { font-size: 9rem; }
    .jv-dateline ol { grid-template-columns: 1fr 1fr; }
    .jv-dateline ol::before { display: none; }
    .jv-local { grid-template-columns: 1fr; }
    .jv-storm__grid { grid-template-columns: 1fr; }
    .jv-tiles { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    .jv-claims { grid-template-columns: 1fr; }
    .jv-claims__photo { max-width: 420px; }
    .jv-cta__grid { grid-template-columns: 1fr; }
    .jv-ledger__head, .jv-ledger__row { grid-template-columns: 140px 1fr 1fr; }
}

@media (max-width: 640px) {
    .jv-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .jv-hero::after { display: none; }
    .jv-ctas .btn { width: 100%; justify-content: center; }
    .jv-badge--a { left: 0; }
    .jv-badge--b { right: 0; }
    .jv-dateline ol { grid-template-columns: 1fr; }
    .jv-collage { grid-template-columns: 1fr; padding-top: 0; }
    .jv-collage figure:first-child { margin-top: 0; }
    .jv-tiles { grid-template-columns: 1fr 1fr; }
    .jv-ledger__head { display: none; }
    .jv-ledger__row { grid-template-columns: 1fr; }
    .jv-ledger__row > div:nth-child(2), .jv-ledger__row > div:nth-child(3) { border-left: 0; border-top: 1px dashed var(--color-border); }
    .jv-ledger__row > div:nth-child(2)::before { content: 'Original ranch: '; font-weight: 700; color: var(--color-dark); }
    .jv-ledger__row > div:nth-child(3)::before { content: 'Rebuilt or elevated: '; font-weight: 700; color: var(--color-dark); }
    .jv-review { grid-template-columns: 1fr; }
    .jv-section { padding: var(--space-12) 0; }
    .jv-faq details p { padding-left: var(--space-6); }
}

@media (prefers-reduced-motion: reduce) {
    .jv-badge { animation: none; }
    .jv-collage figure img, .jv-tile, .jv-tile::after, .jv-callout, .jv-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="jv-hero" aria-labelledby="jv-title">
    <div class="container">
        <div class="jv-hero__grid">
            <div>
                <nav class="jv-crumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="jv-hero__eyebrow"><?php echo icon('map-pin', 14); ?> US-290 at Beltway 8 · incorporated 1956</span>

                <h1 id="jv-title">Roof Replacement &amp; Repair in <span>Jersey Village</span>, TX</h1>

                <div class="jv-hero__answer">
                    <p>
                        <strong>Jersey Village is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a family-owned father-and-son team based in Humble, TX, in business since 1973.</strong>
                        We replace and repair the roofs on the city's original ranch homes and its newer rebuilds, and handle the gutters,
                        siding, patio covers and fences that go with them — free inspection and free written estimate on every project.
                    </p>
                </div>

                <div class="jv-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Inspection</a>
                </div>

                <div class="jv-hero__meta">
                    <span><?php echo icon('award', 16); ?> Nextdoor Neighborhood Favorite 2022–2024</span>
                    <span><?php echo icon('hard-hat', 16); ?> The owner is on every job</span>
                    <span><?php echo icon('clock', 16); ?> <?php echo htmlspecialchars($businessHours); ?></span>
                </div>
            </div>

            <div class="jv-arch">
                <div class="jv-arch__img">
                    <?php echo areaPhoto('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, '(max-width: 1024px) 360px, 420px', true); ?>
                </div>
                <div class="jv-badge jv-badge--a"><strong>1973</strong><span>Family owned since</span></div>
                <div class="jv-badge jv-badge--b"><strong>Free</strong><span>Inspection &amp; estimate</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== DATELINE ===================== -->
<div class="jv-dateline" aria-label="City timeline">
    <div class="container">
        <ol>
            <li><strong>1954</strong><span>First families move onto Clark Henry's former F&amp;M Dairy land — the Jersey cattle gave the city its name.</span></li>
            <li><strong>1956</strong><span>Jersey Village incorporates on April 16. Most of the original ranch homes go up over the next two decades.</span></li>
            <li><strong>1972</strong><span>Jersey Village High School opens; the city is served by Cy-Fair ISD to this day.</span></li>
            <li><strong>2016</strong><span>The Tax Day flood on April 18 damages more than 230 structures — and kicks off the rebuilds and home elevations you see today.</span></li>
        </ol>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="jv-section" aria-labelledby="jv-local-title">
    <div class="container">
        <div class="jv-local">
            <div class="jv-prose">
                <span class="jv-eyebrow">A small city inside the big one</span>
                <h2 id="jv-local-title">Ranch-house roofs, bayou-side lots, and a lot of rebuilding</h2>
                <p class="jv-subtitle">Two kinds of houses, two kinds of roof problems.</p>

                <p>
                    Jersey Village is its own incorporated city — about 7,900 people on the northwest side, wrapped by Houston,
                    sitting where US-290 meets Beltway 8 and FM 529. White Oak Bayou runs right through it, and so does its
                    history: the bayou left its banks in the Tax Day flood of April 2016 and damaged more than 230 structures.
                    Since then the city has pushed a home-elevation program, built a berm around Jersey Meadow Golf Course to
                    hold stormwater, and worked with the Harris County Flood Control District on widening the channel.
                </p>
                <p>
                    For us that means two very different roofs on the same street. The original 1950s–70s ranch homes are long and
                    low, with wide eaves, shallow pitches and often a near-flat section over a den or patio addition. Next door
                    there may be a rebuilt or elevated home with a steep, cut-up roof that stands well above its neighbors — and
                    takes the wind first. We spec each one differently, and we tell you why on the written estimate.
                </p>

                <div class="jv-callouts">
                    <div class="jv-callout" data-animate="left">
                        <?php echo icon('home', 18); ?>
                        <div><strong>Original ranch homes</strong><span>Shallow pitches, long eaves, low-slope additions, and decades of overlays and patch repairs under the current shingles.</span></div>
                    </div>
                    <div class="jv-callout" data-animate="left">
                        <?php echo icon('wind', 18); ?>
                        <div><strong>Elevated &amp; rebuilt homes</strong><span>Taller, steeper, more exposed. One Jersey Village roof we installed saw 110-mph winds a week later and held.</span></div>
                    </div>
                    <div class="jv-callout" data-animate="left">
                        <?php echo icon('droplets', 18); ?>
                        <div><strong>Flat lots, slow drainage</strong><span>Gutters and downspouts that discharge away from the slab — or the piers — keep fascia, soffit and siding from rotting.</span></div>
                    </div>
                </div>

                <p>
                    Searching for <strong>roof replacement near me in Jersey Village</strong>? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. The inspection is free and you'll have
                    photos of every slope before anyone talks about a price.
                </p>
            </div>

            <div class="jv-collage">
                <figure data-animate="down">
                    <?php echo areaPhoto('roof-tearoff', 'Roof tear-off in progress with a dump trailer staged in the driveway', 1200, 1600, '(max-width: 1024px) 50vw, 22vw'); ?>
                </figure>
                <figure data-animate="right">
                    <?php echo areaPhoto('crew-shingles', 'Roofer carrying shingles across a roof covered in new underlayment', 1200, 1600, '(max-width: 1024px) 50vw, 22vw'); ?>
                </figure>
            </div>
        </div>
    </div>
</section>

<div class="jv-divider jv-divider--zigzag" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 0,32 120,0 240,32 360,0 480,32 600,0 720,32 840,0 960,32 1080,0 1200,32 1320,0 1440,32 1440,64"/></svg>
</div>

<!-- ===================== SIGNATURE: ORIGINAL vs. REBUILT LEDGER ===================== -->
<section class="jv-section jv-section--alt" aria-labelledby="jv-ledger-title">
    <div class="container">
        <span class="jv-eyebrow">Two roofs, one street</span>
        <h2 id="jv-ledger-title">What changes between an original Jersey Village ranch and a rebuild</h2>
        <p class="jv-lead">The same storm hits both. What we look for — and what we install — is different. Here's the short version of what goes on your estimate.</p>

        <div class="jv-ledger" data-animate="scale">
            <div class="jv-ledger__head">
                <div>Item</div>
                <div>Original ranch home<small>1950s–1970s, one story, wide eaves</small></div>
                <div>Rebuilt or elevated home<small>Post-2016, taller, steeper</small></div>
            </div>
            <div class="jv-ledger__row">
                <div><?php echo icon('ruler', 16); ?> Pitch</div>
                <div>Shallow slopes and a near-flat section are common. Standard shingles can't go below the manufacturer's minimum pitch — those areas get a low-slope membrane or roll product, properly tied in.</div>
                <div>Steep, cut-up roofs with valleys and dormers. More flashing, more underlayment detail, and the valleys carry most of the water.</div>
            </div>
            <div class="jv-ledger__row">
                <div><?php echo icon('hammer', 16); ?> Decking</div>
                <div>Older decking and past overlays can hide soft spots. We price decking repair by the sheet and photograph what we replace.</div>
                <div>Newer sheathing, usually sound — the attention goes to nailing pattern and edge metal on a more exposed roof.</div>
            </div>
            <div class="jv-ledger__row">
                <div><?php echo icon('wind', 16); ?> Wind</div>
                <div>Long eaves lift first. Starter strip, drip edge and proper nail placement at the rakes matter more than the shingle brand.</div>
                <div>Height equals exposure. Ridge and hip caps and the windward slope get the first look after any front.</div>
            </div>
            <div class="jv-ledger__row">
                <div><?php echo icon('droplets', 16); ?> Ventilation</div>
                <div>Many have soffit vents and little exhaust. Shingle manufacturers can void or limit a shingle warranty when the attic isn't ventilated to spec — we balance intake and exhaust. <a href="/services/attic-venting/" style="color: var(--color-primary); font-weight: 600;">Attic venting</a></div>
                <div>Ridge vents are typical; we confirm intake matches so the ridge vent isn't pulling conditioned air from inside the house.</div>
            </div>
            <div class="jv-ledger__row">
                <div><?php echo icon('home', 16); ?> Beyond the roof</div>
                <div>Fascia and soffit rot at the eaves, tired cedar fences, and patio covers added in the '80s. <a href="/services/siding-fascia-soffit/" style="color: var(--color-primary); font-weight: 600;">Siding &amp; fascia</a> · <a href="/services/fences-gates/" style="color: var(--color-primary); font-weight: 600;">Fences</a></div>
                <div>Downspouts that reach grade from an elevated home, and new patio covers or decks built to the raised floor. <a href="/services/gutter-installation/" style="color: var(--color-primary); font-weight: 600;">Gutters</a> · <a href="/services/patio-covers-decks/" style="color: var(--color-primary); font-weight: 600;">Patio covers &amp; decks</a></div>
            </div>
            <div class="jv-ledger__foot">Every item above is inspected free and photographed before we write the estimate. Shingle or metal — your choice, our recommendation in writing.</div>
        </div>
    </div>
</section>

<div class="jv-divider jv-divider--tilt" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 0,0 1440,64"/></svg>
</div>

<!-- ===================== STORM TEST ===================== -->
<?php if (!empty($stormReview)): ?>
<section class="jv-section jv-section--dark jv-storm" aria-labelledby="jv-storm-title">
    <div class="container">
        <div class="jv-storm__grid">
            <div class="jv-storm__stat" data-animate="scale">
                <strong>110</strong>
                <em>mph winds, one week in</em>
                <span>A Jersey Village roof we replaced was hit by a major storm seven days later. No leaks, no missing shingles — in the customer's words.</span>
            </div>
            <div data-animate="right">
                <span class="jv-eyebrow">Field-tested, not just warrantied</span>
                <h2 id="jv-storm-title">The review we point to when someone asks how our roofs hold up</h2>
                <blockquote>
                    <p><?php echo htmlspecialchars($stormReview[0]['text']); ?></p>
                    <footer>— <?php echo htmlspecialchars($stormReview[0]['name']); ?>, <?php echo htmlspecialchars($stormReview[0]['city']); ?></footer>
                </blockquote>
                <p class="jv-storm__note">Why it held: full tear-off, new synthetic underlayment, starter strip and drip edge at every edge, and nails where the manufacturer says to put them. That's standard on every Triple G roof, not an upgrade.</p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<div class="jv-divider jv-divider--wave" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><path d="M0,0 C360,64 720,64 1080,32 C1260,16 1380,8 1440,0 L1440,64 L0,64 Z"/></svg>
</div>

<!-- ===================== SERVICES: TILE WALL ===================== -->
<section class="jv-section" aria-labelledby="jv-svc-title">
    <div class="container">
        <span class="jv-eyebrow">Everything on the outside of the house</span>
        <h2 id="jv-svc-title">Ten services, one father-and-son team, one written estimate</h2>
        <p class="jv-lead"><?php echo htmlspecialchars($shortName); ?> handles the whole exterior in Jersey Village, so the people who did your roof are the same ones who come back for the gutters, the fence or the patio cover.</p>

        <div class="jv-tiles">
            <a class="jv-tile" href="/services/roof-replacement/" data-animate><span class="jv-tile__icon"><?php echo icon('home', 20); ?></span><strong>Roof Replacement</strong><span>Shingle or metal, full tear-off, decking repair, ventilation to spec.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/roof-repair/" data-animate><span class="jv-tile__icon"><?php echo icon('wrench', 20); ?></span><strong>Roof Repair</strong><span>Leak tracing, flashing, pipe boots, low-slope tie-ins.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/roof-inspection/" data-animate><span class="jv-tile__icon"><?php echo icon('search', 20); ?></span><strong>Roof Inspection</strong><span>Free, photo-documented, with a written estimate if anything's found.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/storm-damage-repair/" data-animate><span class="jv-tile__icon"><?php echo icon('wind', 20); ?></span><strong>Storm &amp; Wind Damage</strong><span>Documentation, tarping on request, claim help start to finish.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/roof-damage-repair/" data-animate><span class="jv-tile__icon"><?php echo icon('hammer', 20); ?></span><strong>Roof Damage Repair</strong><span>Wood rot, failed flashing, worn shingles and damaged decking.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/attic-venting/" data-animate><span class="jv-tile__icon"><?php echo icon('droplets', 20); ?></span><strong>Attic Venting</strong><span>Balanced intake and exhaust that protects the shingles above it.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/gutter-installation/" data-animate><span class="jv-tile__icon"><?php echo icon('droplets', 20); ?></span><strong>Gutters</strong><span>New gutters and downspouts that carry water away from the slab.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/siding-fascia-soffit/" data-animate><span class="jv-tile__icon"><?php echo icon('ruler', 20); ?></span><strong>Siding, Fascia &amp; Soffit</strong><span>Hardie and vinyl siding, eave repair, exterior paint to finish.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/patio-covers-decks/" data-animate><span class="jv-tile__icon"><?php echo icon('hard-hat', 20); ?></span><strong>Patio Covers &amp; Decks</strong><span>Covered and screened patios, pergolas and wood decks.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
            <a class="jv-tile" href="/services/fences-gates/" data-animate><span class="jv-tile__icon"><?php echo icon('shield', 20); ?></span><strong>Fences &amp; Gates</strong><span>Cedar and pine privacy, ranch rail, custom gates, shared-line repairs.</span><small>Learn more <?php echo icon('arrow-up', 12); ?></small></a>
        </div>
    </div>
</section>

<!-- ===================== CLAIMS ===================== -->
<section class="jv-section jv-section--alt" aria-labelledby="jv-claims-title">
    <div class="container">
        <div class="jv-claims">
            <div>
                <span class="jv-eyebrow">Wind, hail &amp; hurricane claims</span>
                <h2 id="jv-claims-title">Two generations of claims experience on your side of the table</h2>
                <p class="jv-lead">
                    Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience to every storm job
                    here. You don't have to learn the process — we walk you through it.
                </p>
                <ol class="jv-steps">
                    <li data-animate="left">Photograph and document every slope before anything is disturbed</li>
                    <li data-animate="left">Meet the adjuster at your home and walk the roof together</li>
                    <li data-animate="left">Explain your policy — deductible, depreciation, scope — in plain English</li>
                    <li data-animate="left">Do the work as agreed, with the owner on site</li>
                </ol>
                <p class="jv-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. Our job is to document the damage properly and make sure you understand your options.</p>
            </div>
            <figure class="jv-claims__photo" data-animate="right">
                <?php echo areaPhoto('owner-father-v2', 'Glenn and Tim Menn, the father-and-son team behind Triple G Roofing & Construction', 1152, 1536, '(max-width: 1024px) 420px, 36vw'); ?>
                <figcaption>Glenn &amp; Tim Menn — the father-and-son team behind Triple G</figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="jv-section" aria-labelledby="jv-reviews-title">
    <div class="container">
        <span class="jv-eyebrow">From our customers</span>
        <h2 id="jv-reviews-title">What Jersey Village homeowners say about Triple G</h2>
        <p class="jv-lead">Real reviews, published by the client with first name and city.</p>
        <div class="jv-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="jv-review" data-animate>
                <div class="jv-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                <div>
                    <div class="jv-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
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
<section class="jv-section jv-section--alt" aria-labelledby="jv-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="jv-eyebrow">Common questions</span>
            <h2 id="jv-faq-title">Asked by homeowners here, answered straight</h2>
        </div>
        <div class="jv-faq">
            <?php foreach ($areaFaqs as $i => $faq): ?>
            <details <?php echo $i === 0 ? 'open' : ''; ?>>
                <summary><?php echo htmlspecialchars($faq['q']); ?> <?php echo icon('chevron-down', 20); ?></summary>
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== NEARBY ===================== -->
<section class="jv-section" aria-labelledby="jv-nearby-title">
    <div class="container">
        <span class="jv-eyebrow">Nearby communities</span>
        <h2 id="jv-nearby-title">Out 290 toward Cypress, and into the city</h2>
        <p class="jv-lead">Cypress is the next stop northwest on the same freeway; Houston surrounds Jersey Village on every side. We cover more than 50 Greater Houston communities in all.</p>
        <div class="jv-nearby">
            <a href="/service-areas/cypress/"><?php echo icon('map-pin', 18); ?> Cypress, TX</a>
            <a href="/service-areas/houston/"><?php echo icon('map-pin', 18); ?> Houston, TX</a>
            <a href="/service-areas/spring/"><?php echo icon('map-pin', 18); ?> Spring, TX</a>
            <a href="/service-areas/bellaire/"><?php echo icon('map-pin', 18); ?> Bellaire, TX</a>
        </div>
        <div class="jv-chips">
            <?php foreach (['Spring Valley Village', 'Hedwig Village', 'Hunters Creek Village', 'Bunker Hill Village', 'Piney Point Village', 'Humble', 'The Woodlands'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="jv-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="jv-cta" aria-labelledby="jv-cta-title">
    <div class="container">
        <div class="jv-cta__grid">
            <div>
                <h2 id="jv-cta-title">Ready for a roof that's been through a real storm?</h2>
                <p>Call and we'll come take a look. Free inspection, photos of what we find, a written estimate that spells out the product — and the owner on your roof, the same way it's been since 1973.</p>
            </div>
            <div class="jv-ctas">
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
    "name": "Roof Replacement & Repair in <?php echo htmlspecialchars($areaName); ?>, TX",
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
