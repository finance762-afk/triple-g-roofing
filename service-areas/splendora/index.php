<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Splendora';
$pageTitle = 'Roofing & Metal Roofs in Splendora, TX | Triple G Roofing';
$pageDescription = 'Shingle and metal roofing, storm repair, gutters and siding in Splendora, TX from a father-and-son team in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/splendora/';

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

/* No reviews published from this community yet — show real storm-damage reviews from across the service area, labeled honestly */
$cityReviews = getTestimonialsFor('storm-damage-repair', 3);

$areaFaqs = [
    [
        'q' => 'Do you put metal roofs on barns and shops, and can a house in Splendora have one too?',
        'a' => 'Yes to both. We install corrugated and standing-seam metal on barns, shops, carports and houses, and architectural shingle where that fits the home better. Plenty of Splendora acreage ends up with shingle on the house and metal on the outbuildings, done in one visit. You get a written estimate for each option and the choice stays yours.',
    ],
    [
        'q' => 'Peach Creek came up again this year. What should I be checking on the house after heavy rain?',
        'a' => 'Rising creek water is a flood problem, not a roof problem — but the rain that raises Peach Creek also finds every weak spot above you. Look for stained ceilings, water marks on the soffit, gutters that overflowed at the corners, and fascia that stays dark after everything else dries. We check all of it on a free inspection and photograph what we find.',
    ],
    [
        'q' => 'Can you help with the insurance claim after wind or hail?',
        'a' => 'We help you through the whole process. With more than 50 years of roofing, claims-handling and adjuster experience, we document the damage, meet the adjuster at your home and explain the policy in plain English. Whether a claim is approved, and for how much, is always the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix sp-
   Tokens only. Dark diagonal-split hero with two offset metal-
   roof photos, accent-band trust tiles, small-town local
   context, Peach Creek gauge (signature), metal-first services
   feature + ledger list, reviews, dark claims with the owners'
   photo, FAQ, nearby, CTA.
   ========================================================== */

/* ---------- Reveal direction modifiers (opacity handled by framework [data-animate]) ---------- */
[data-animate].sp-from-left { transform: translateX(-32px); }
[data-animate].sp-from-right { transform: translateX(32px); }
[data-animate].sp-from-down { transform: translateY(-28px); }
[data-animate].sp-from-scale { transform: scale(0.94); }
[data-animate].sp-from-left.animated,
[data-animate].sp-from-right.animated,
[data-animate].sp-from-down.animated,
[data-animate].sp-from-scale.animated { transform: none; }

/* ---------- Hero ---------- */
.sp-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background: var(--color-dark);
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
}

.sp-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(115deg, var(--color-dark) 0%, var(--color-dark) 52%, color-mix(in srgb, var(--color-primary) 28%, var(--color-dark)) 52.2%, color-mix(in srgb, var(--color-primary) 18%, var(--color-dark-alt)) 100%);
}

.sp-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.07;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.sp-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
    gap: var(--space-12);
    align-items: center;
}

.sp-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.sp-breadcrumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.sp-breadcrumb a:hover { color: var(--color-accent); }
.sp-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.sp-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
}

.sp-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 4.8vw, 3.7rem);
    line-height: 1.06;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.sp-hero h1 mark { background: none; color: var(--color-accent); }

.sp-hero__answer {
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    font-size: clamp(1rem, 1.5vw, 1.15rem);
    line-height: 1.72;
    max-width: 60ch;
    margin-bottom: var(--space-6);
}

.sp-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.sp-ctas .btn-lg { font-size: var(--font-size-base); }

.sp-hero__visual {
    position: relative;
    min-height: 520px;
}

.sp-hero__photo {
    position: absolute;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
}

.sp-hero__photo--a { width: 62%; aspect-ratio: 3 / 4; left: 0; top: 0; z-index: 1; }
.sp-hero__photo--b { width: 50%; aspect-ratio: 3 / 4; right: 0; bottom: 0; z-index: 2; border: 6px solid var(--color-dark); }
.sp-hero__photo img { width: 100%; height: 100%; object-fit: cover; }

.sp-hero__tag {
    position: absolute;
    left: var(--space-4);
    bottom: var(--space-4);
    z-index: 3;
    background: var(--color-accent);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-sm);
}

/* Trust tiles band */
.sp-band { background: var(--color-accent); }

.sp-band ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

.sp-band li {
    padding: var(--space-5) var(--space-6);
    display: flex;
    align-items: center;
    gap: var(--space-3);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-weight: 700;
    border-right: 1px solid color-mix(in srgb, var(--color-dark) 15%, transparent);
}

.sp-band li:last-child { border-right: 0; }
.sp-band li svg { flex-shrink: 0; }
.sp-band li small { display: block; font-family: var(--font-body); font-weight: 400; font-size: var(--font-size-xs); color: color-mix(in srgb, var(--color-dark) 75%, transparent); }

/* ---------- Section scaffolding ---------- */
.sp-section { padding: var(--space-16) 0; }
.sp-section--alt { background: var(--color-light); }
.sp-section--dark { background: var(--color-dark); color: var(--color-white); }

.sp-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.sp-section--dark .sp-eyebrow { color: var(--color-accent); }
.sp-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.sp-section--dark h2 { color: var(--color-white); }
.sp-section h3 { text-wrap: balance; }
.sp-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.sp-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.sp-prose a { color: var(--color-primary); font-weight: 600; }
.sp-prose a:hover { text-decoration: underline; }
.sp-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.sp-section--dark .sp-lead { color: color-mix(in srgb, var(--color-white) 82%, transparent); }

/* ---------- Local context ---------- */
.sp-local {
    display: grid;
    grid-template-columns: minmax(0, 3fr) minmax(0, 2fr);
    gap: var(--space-12);
    align-items: start;
}

.sp-facts {
    margin: var(--space-6) 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4);
}

.sp-fact {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    display: grid;
    gap: var(--space-1);
}

.sp-fact:nth-child(1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.sp-fact:nth-child(2) { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }
.sp-fact:nth-child(3) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }
.sp-fact:nth-child(4) { background: var(--color-white); }
.sp-fact strong { font-family: var(--font-heading); font-size: var(--font-size-xl); color: var(--color-dark); line-height: 1.1; }
.sp-fact span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5; }

.sp-local__aside { display: grid; gap: var(--space-5); }

.sp-figure {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 4 / 5;
    position: relative;
}

.sp-figure--offset { margin-left: var(--space-10); margin-top: calc(-1 * var(--space-10)); border: 6px solid var(--color-white); }
.sp-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.sp-figure:hover img { transform: scale(1.04); }

/* ---------- Signature: Peach Creek gauge ---------- */
.sp-gauge {
    display: grid;
    grid-template-columns: 120px minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-10);
    margin-top: var(--space-10);
    align-items: stretch;
}

.sp-gauge__bar {
    position: relative;
    border-radius: var(--radius-full);
    background: linear-gradient(180deg, color-mix(in srgb, var(--color-white) 8%, transparent) 0%, color-mix(in srgb, var(--color-primary) 55%, transparent) 60%, var(--color-primary) 100%);
    border: 1px solid color-mix(in srgb, var(--color-white) 15%, transparent);
    min-height: 420px;
}

.sp-gauge__bar::before {
    content: '';
    position: absolute;
    left: 50%;
    top: var(--space-4);
    bottom: var(--space-4);
    width: 2px;
    transform: translateX(-50%);
    background: repeating-linear-gradient(180deg, color-mix(in srgb, var(--color-white) 60%, transparent) 0 6px, transparent 6px 18px);
}

.sp-gauge__mark {
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 56px;
    height: 56px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-dark);
    border: 3px solid var(--color-accent);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-xs);
    box-shadow: var(--shadow-md);
}

.sp-gauge__mark--1 { top: 22%; }
.sp-gauge__mark--2 { top: 50%; }
.sp-gauge__mark--3 { top: 78%; border-color: var(--color-white); color: var(--color-white); }

.sp-gauge__events { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-5); align-content: space-between; }

.sp-gauge__events li {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border-left: 4px solid var(--color-accent);
}

.sp-gauge__events li:last-child { border-left-color: var(--color-white); }
.sp-gauge__events strong { display: block; font-family: var(--font-heading); color: var(--color-white); margin-bottom: var(--space-1); }
.sp-gauge__events p { margin: 0; font-size: var(--font-size-sm); line-height: 1.6; color: color-mix(in srgb, var(--color-white) 80%, transparent); }

.sp-gauge__house {
    border-radius: var(--radius-xl);
    padding: var(--space-8);
    background: var(--color-white);
    color: var(--color-dark);
    box-shadow: var(--shadow-xl);
}

.sp-gauge__house h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-4); color: var(--color-dark); }
.sp-gauge__house ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-3); }
.sp-gauge__house li { display: grid; grid-template-columns: 28px 1fr; gap: var(--space-3); font-size: var(--font-size-sm); line-height: 1.6; color: var(--color-gray-dark); }
.sp-gauge__house li svg { color: var(--color-primary); margin-top: 2px; }
.sp-gauge__house li a { color: var(--color-primary); font-weight: 600; }
.sp-gauge__house li a:hover { text-decoration: underline; }
.sp-gauge__house p { margin-top: var(--space-5); font-size: var(--font-size-xs); color: var(--color-gray); line-height: 1.6; }

/* ---------- Services: metal-first feature + ledger ---------- */
.sp-services { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: var(--space-12); align-items: center; }

.sp-feature {
    position: relative;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    aspect-ratio: 4 / 5;
    max-width: 480px;
}

.sp-feature img { width: 100%; height: 100%; object-fit: cover; }

.sp-feature__cap {
    position: absolute;
    left: var(--space-5);
    right: var(--space-5);
    bottom: var(--space-5);
    background: color-mix(in srgb, var(--color-dark) 86%, transparent);
    color: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-4) var(--space-5);
    font-size: var(--font-size-sm);
    line-height: 1.5;
}

.sp-feature__cap strong { display: block; font-family: var(--font-heading); color: var(--color-accent); }

.sp-ledger { list-style: none; margin: var(--space-6) 0 0; padding: 0; counter-reset: svc; }

.sp-ledger a {
    counter-increment: svc;
    display: grid;
    grid-template-columns: 36px 1fr;
    gap: var(--space-4);
    align-items: baseline;
    padding: var(--space-3) var(--space-2);
    border-bottom: 1px dashed var(--color-border);
    color: var(--color-dark);
    transition: background var(--transition-fast), color var(--transition-fast);
}

.sp-ledger a::before {
    content: counter(svc, decimal-leading-zero);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    color: var(--color-primary);
}

.sp-ledger a:hover { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); color: var(--color-primary); }
.sp-ledger strong { font-family: var(--font-heading); }
.sp-ledger small { display: block; font-size: var(--font-size-xs); color: var(--color-gray); line-height: 1.5; }

/* ---------- Reviews ---------- */
.sp-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.sp-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-8) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
}

.sp-review:nth-child(2) { transform: translateY(var(--space-6)); }
.sp-review::before {
    content: '\201C';
    position: absolute;
    top: var(--space-1);
    left: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-accent) 45%, transparent);
}

.sp-review__stars { display: flex; gap: 2px; color: var(--color-star); margin: 0 0 var(--space-3) auto; }
.sp-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); flex: 1; }
.sp-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }
.sp-review__avatar { width: 40px; height: 40px; border-radius: var(--radius-full); display: grid; place-items: center; background: var(--color-primary); color: var(--color-white); font-weight: 700; }
.sp-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- Claims (dark, with owners' photo) ---------- */
.sp-claims { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.4fr); gap: var(--space-12); align-items: center; }

.sp-owners {
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    aspect-ratio: 3 / 4;
    max-width: 400px;
    position: relative;
}

.sp-owners img { width: 100%; height: 100%; object-fit: cover; }

.sp-owners figcaption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: var(--space-5);
    background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--color-dark) 92%, transparent));
    color: var(--color-white);
    font-size: var(--font-size-sm);
    line-height: 1.5;
}

.sp-owners figcaption strong { display: block; font-family: var(--font-heading); color: var(--color-accent); }

.sp-claims__grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); margin-top: var(--space-6); }

.sp-claims__item {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    display: grid;
    gap: var(--space-2);
}

.sp-claims__item svg { color: var(--color-accent); }
.sp-claims__item strong { font-family: var(--font-heading); color: var(--color-white); }
.sp-claims__item p { margin: 0; font-size: var(--font-size-sm); line-height: 1.6; color: color-mix(in srgb, var(--color-white) 80%, transparent); }
.sp-claims__note { margin-top: var(--space-5); padding-left: var(--space-4); border-left: 3px solid var(--color-accent); font-size: var(--font-size-sm); line-height: 1.65; color: color-mix(in srgb, var(--color-white) 78%, transparent); max-width: 62ch; }

/* ---------- FAQ ---------- */
.sp-faq { max-width: 840px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.sp-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.sp-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.sp-faq summary {
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

.sp-faq summary::-webkit-details-marker { display: none; }
.sp-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.sp-faq details[open] summary svg { transform: rotate(45deg); }
.sp-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.sp-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.sp-nearby a {
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

.sp-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.sp-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.sp-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.sp-chips span, .sp-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.sp-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.sp-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.sp-divider { line-height: 0; display: block; }
.sp-divider svg { width: 100%; height: 60px; display: block; }
.sp-divider--ridge { background: var(--color-white); }
.sp-divider--ridge svg { fill: var(--color-dark); }
.sp-divider--swell { background: var(--color-dark); }
.sp-divider--swell svg { fill: var(--color-light); }
.sp-divider--peak { background: var(--color-light); }
.sp-divider--peak svg { fill: var(--color-dark); }

/* ---------- CTA ---------- */
.sp-cta {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
    padding: var(--space-16) 0;
}

.sp-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(-45deg, transparent 0 40px, color-mix(in srgb, var(--color-white) 4%, transparent) 40px 42px);
    pointer-events: none;
}

.sp-cta__inner { position: relative; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.sp-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.sp-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .sp-hero__grid { grid-template-columns: 1fr; }
    .sp-hero__visual { min-height: 0; aspect-ratio: 5 / 4; max-width: 520px; }
    .sp-band ul { grid-template-columns: 1fr 1fr; }
    .sp-band li:nth-child(2) { border-right: 0; }
    .sp-band li:nth-child(-n+2) { border-bottom: 1px solid color-mix(in srgb, var(--color-dark) 15%, transparent); }
    .sp-local { grid-template-columns: 1fr; }
    .sp-local__aside { grid-template-columns: 1fr 1fr; }
    .sp-figure--offset { margin: 0; }
    .sp-gauge { grid-template-columns: 80px minmax(0, 1fr); }
    .sp-gauge__house { grid-column: span 2; }
    .sp-services { grid-template-columns: 1fr; }
    .sp-claims { grid-template-columns: 1fr; }
    .sp-review:nth-child(2) { transform: none; }
    .sp-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .sp-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .sp-ctas .btn { width: 100%; justify-content: center; }
    .sp-hero__visual { display: none; }
    .sp-band ul { grid-template-columns: 1fr; }
    .sp-band li { border-right: 0; border-bottom: 1px solid color-mix(in srgb, var(--color-dark) 15%, transparent); }
    .sp-facts { grid-template-columns: 1fr; }
    .sp-local__aside { grid-template-columns: 1fr; }
    .sp-gauge { grid-template-columns: 1fr; }
    .sp-gauge__bar { display: none; }
    .sp-gauge__house { grid-column: span 1; }
    .sp-claims__grid { grid-template-columns: 1fr; }
    .sp-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .sp-figure img, .sp-ledger a, .sp-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="sp-hero" aria-labelledby="sp-title">
    <div class="container">
        <div class="sp-hero__grid">
            <div>
                <nav class="sp-breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="sp-hero__eyebrow"><?php echo icon('map-pin', 14); ?> US 59 at FM 2090 · East Montgomery County</span>

                <h1 id="sp-title">Shingle &amp; Metal Roofing in <mark>Splendora</mark>, TX</h1>

                <p class="sp-hero__answer">
                    Splendora is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a
                    family-owned father-and-son team based in Humble, TX, in business since 1973. Metal roofs for barns, shops and
                    houses, architectural shingle replacement and repair, storm damage and claim help, plus gutters, siding, patio
                    covers, decks and fences — free inspection and written estimate first, owner on every job.
                </p>

                <div class="sp-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
                </div>
            </div>

            <div class="sp-hero__visual" role="group" aria-label="Recent metal roofing work">
                <div class="sp-hero__photo sp-hero__photo--a">
                    <?php echo areaPhoto('metal-roof-barn', 'New corrugated metal roof on a barn with white ranch-rail fencing', 1200, 1600, '(max-width: 1024px) 320px, 28vw', true); ?>
                </div>
                <div class="sp-hero__photo sp-hero__photo--b">
                    <?php echo areaPhoto('roof-metal-shop', 'Crew installing a new metal roof on a metal shop building', 1200, 1600, '(max-width: 1024px) 260px, 22vw'); ?>
                </div>
                <span class="sp-hero__tag">Metal · barns, shops &amp; homes</span>
            </div>
        </div>
    </div>
</section>

<div class="sp-band" aria-label="At a glance">
    <div class="container">
        <ul>
            <li><?php echo icon('clock', 22); ?><span>Since 1973<small>Serving Greater Houston</small></span></li>
            <li><?php echo icon('hard-hat', 22); ?><span>Father &amp; son<small>Glenn &amp; Tim Menn — owner on every job</small></span></li>
            <li><?php echo icon('award', 22); ?><span>Nextdoor Favorite<small>2022 · 2023 · 2024</small></span></li>
            <li><?php echo icon('check-circle', 22); ?><span>Free<small>Inspections &amp; written estimates</small></span></li>
        </ul>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="sp-section" aria-labelledby="sp-local-title">
    <div class="container">
        <div class="sp-local">
            <div class="sp-prose">
                <span class="sp-eyebrow">Small town, big lots, real weather</span>
                <h2 id="sp-local-title">A railroad stop that became a city in 1966, and still roofs like country</h2>
                <p class="sp-subtitle">Splendora is one of the few actual cities on this stretch of US 59 — and one of the smallest.</p>

                <p>
                    Splendora started as Cox's Switch on the rail line in the late 1880s, took its current name in 1896, and
                    incorporated in December 1966. It sits at the junction of US 59 and FM 2090 in eastern Montgomery County with a
                    population still under two thousand, which tells you what the housing looks like: older one-story homes in town,
                    acreage spreading out along FM 2090 and the county roads, and almost every property with a barn, shop or carport
                    behind the house. Splendora ISD — headquartered on FM 2090 and covering 79 square miles — serves the city and
                    neighboring Patton Village, and Peach Creek runs right past town on its way to the East Fork of the San Jacinto.
                </p>
                <p>
                    That mix drives the work. Acreage outbuildings want metal, and a fair number of houses out here are going to
                    metal too. Town homes on their second or third shingle roof are dealing with rotted fascia behind old gutters,
                    pine limbs and squirrels in the vent boots. And because this is the wet side of the county, gutters, downspouts and
                    soffit earn their keep every spring.
                </p>

                <div class="sp-facts">
                    <div class="sp-fact sp-from-left" data-animate><strong>1966</strong><span>Incorporated as a city in December 1966 — a railroad stop called Cox's Switch before that</span></div>
                    <div class="sp-fact sp-from-down" data-animate><strong>US 59 &amp; FM 2090</strong><span>The crossroads the town is built around, and the intersection that floods first when Peach Creek rises</span></div>
                    <div class="sp-fact sp-from-down" data-animate><strong>79 sq mi</strong><span>Splendora ISD's footprint, serving the city and Patton Village from its FM 2090 campus</span></div>
                    <div class="sp-fact sp-from-right" data-animate><strong>Metal</strong><span>The natural roof for Splendora barns, shops and carports — and a growing number of homes</span></div>
                </div>

                <p>
                    Looking for <strong>metal roofing near me in Splendora</strong>, or a straight answer on whether the shingle roof
                    has another few years in it? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. Tim does the
                    inspection himself, photographs everything, and writes up the estimate — shingle, metal or both.
                </p>
            </div>

            <aside class="sp-local__aside">
                <figure class="sp-figure sp-from-right" data-animate>
                    <?php echo areaPhoto('fences-gates', 'New pine privacy fence with a Triple G Roofing yard sign', 1200, 1600, '(max-width: 1024px) 50vw, 30vw'); ?>
                </figure>
                <figure class="sp-figure sp-figure--offset sp-from-scale" data-animate>
                    <?php echo areaPhoto('deck-railing', 'Wood deck built around a mature tree with custom railing', 896, 1600, '(max-width: 1024px) 50vw, 26vw'); ?>
                </figure>
            </aside>
        </div>
    </div>
</section>

<div class="sp-divider sp-divider--ridge" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,60 0,30 240,30 360,0 480,30 1440,30 1440,60"/></svg>
</div>

<!-- ===================== SIGNATURE: PEACH CREEK GAUGE ===================== -->
<section class="sp-section sp-section--dark" aria-labelledby="sp-gauge-title">
    <div class="container">
        <span class="sp-eyebrow">The Peach Creek gauge</span>
        <h2 id="sp-gauge-title">When the creek at Splendora comes up, here is what the rain is doing to your roof</h2>
        <p class="sp-lead">The USGS gauge on Peach Creek at Splendora is how the county watches this town. The same rain that moves that needle is what we find on inspections afterward.</p>

        <div class="sp-gauge">
            <div class="sp-gauge__bar" aria-hidden="true">
                <span class="sp-gauge__mark sp-gauge__mark--1">2024</span>
                <span class="sp-gauge__mark sp-gauge__mark--2">20 ft</span>
                <span class="sp-gauge__mark sp-gauge__mark--3">2019</span>
            </div>
            <ul class="sp-gauge__events">
                <li data-animate class="sp-from-left">
                    <strong>January 2024 — minor flooding, warning extended</strong>
                    <p>A routine winter rain event still put Peach Creek at Splendora into minor flood stage and kept a flood warning running for Montgomery and Harris counties. Routine here means gutters that overflow at the corners and soffit that never quite dries.</p>
                </li>
                <li data-animate class="sp-from-left">
                    <strong>20 feet — the line where US 59 at FM 2090 starts to flood</strong>
                    <p>That is the published threshold for the town's main intersection. Long before the road goes under, every valley, pipe boot and piece of flashing on a roof here has been tested by the same downpour.</p>
                </li>
                <li data-animate class="sp-from-left">
                    <strong>September 2019 — Imelda</strong>
                    <p>Imelda put FM 2090 and sections of US 59 under water and dropped more than twenty inches of rain on this part of the county. Roofs that survived it still carried the damage — lifted shingles, saturated decking, fascia rot that showed up a year later.</p>
                </li>
            </ul>
            <div class="sp-gauge__house sp-from-right" data-animate>
                <h3>What the same rain does above the flood line</h3>
                <ul>
                    <li><?php echo icon('droplets', 20); ?><span><strong>Gutters and downspouts</strong> — undersized or clogged with pine straw, they dump roof water straight onto fascia and slab. <a href="/services/gutter-installation/">Gutter installation</a></span></li>
                    <li><?php echo icon('ruler', 20); ?><span><strong>Fascia and soffit</strong> — the boards behind old gutters stay wet the longest and rot first. <a href="/services/siding-fascia-soffit/">Siding, fascia &amp; soffit</a></span></li>
                    <li><?php echo icon('wrench', 20); ?><span><strong>Flashing and pipe boots</strong> — wind-driven rain finds dried sealant and cracked boots long before it finds a missing shingle. <a href="/services/roof-repair/">Roof repair</a></span></li>
                    <li><?php echo icon('wind', 20); ?><span><strong>Wind before the water</strong> — the fronts that bring this much rain lift ridge caps and crease tabs on the way in. <a href="/services/storm-damage-repair/">Storm &amp; wind damage</a></span></li>
                    <li><?php echo icon('shield', 20); ?><span><strong>Attic moisture</strong> — a roof that breathes dries out between storms. Shingle manufacturers can void or limit the shingle warranty when the attic is not properly ventilated. <a href="/services/attic-venting/">Attic venting</a></span></li>
                </ul>
                <p>Creek flooding itself is not roof damage and is not something a roofer can fix. The point is that rain out here is hard on everything above the flood line too — and all of that is a free inspection away from being known.</p>
            </div>
        </div>
    </div>
</section>

<div class="sp-divider sp-divider--swell" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,60 L0,20 C480,70 960,-20 1440,30 L1440,60 Z"/></svg>
</div>

<!-- ===================== SERVICES ===================== -->
<section class="sp-section sp-section--alt" aria-labelledby="sp-svc-title">
    <div class="container">
        <div class="sp-services">
            <div>
                <span class="sp-eyebrow">Roofing / Siding — and everything behind the house</span>
                <h2 id="sp-svc-title">Metal on the barn, shingle on the house, and the fence line in between</h2>
                <p class="sp-lead">
                    <?php echo htmlspecialchars($shortName); ?> installs both corrugated and standing-seam metal and architectural
                    shingle, so a Splendora property with a house, a shop and a carport gets one estimate and one crew. The patio
                    covers, decks, gutters, siding and fences that come with acreage are the same call.
                </p>
                <ol class="sp-ledger">
                    <li><a href="/services/roof-replacement/"><span><strong>Roof Replacement</strong><small>Metal or architectural shingle — tear-off, decking repair, underlayment, clean site</small></span></a></li>
                    <li><a href="/services/roof-repair/"><span><strong>Roof Repair</strong><small>Leaks, flashing, pipe boots, wood rot</small></span></a></li>
                    <li><a href="/services/roof-inspection/"><span><strong>Roof Inspection</strong><small>Free, photo-documented, written</small></span></a></li>
                    <li><a href="/services/storm-damage-repair/"><span><strong>Storm &amp; Wind Damage</strong><small>Hail, wind and hurricane damage documented for your claim</small></span></a></li>
                    <li><a href="/services/roof-damage-repair/"><span><strong>Roof Damage Repair</strong><small>Aging, worn or compromised roofs</small></span></a></li>
                    <li><a href="/services/attic-venting/"><span><strong>Attic Venting</strong><small>Balanced intake and exhaust</small></span></a></li>
                    <li><a href="/services/gutter-installation/"><span><strong>Gutters</strong><small>Sized for pine straw and East Texas rain</small></span></a></li>
                    <li><a href="/services/siding-fascia-soffit/"><span><strong>Siding, Fascia &amp; Soffit</strong><small>Hardie, vinyl, rot repair, window re-sealing, paint</small></span></a></li>
                    <li><a href="/services/patio-covers-decks/"><span><strong>Patio Covers, Pergolas &amp; Decks</strong><small>Covered and screened patios, pergolas, wood decks</small></span></a></li>
                    <li><a href="/services/fences-gates/"><span><strong>Fences &amp; Gates</strong><small>Cedar and pine privacy, ranch rail, custom gates</small></span></a></li>
                </ol>
            </div>
            <div class="sp-feature sp-from-scale" data-animate>
                <?php echo areaPhoto('pergola-detail', 'Cedar pergola with decorative rafter tails over a side patio', 1200, 1600, '(max-width: 1024px) 100vw, 480px'); ?>
                <div class="sp-feature__cap"><strong>Beyond the roof</strong> Cedar pergolas, covered patios and decks built to match the house — the outdoor living an acreage lot has room for.</div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="sp-section" aria-labelledby="sp-reviews-title">
    <div class="container">
        <span class="sp-eyebrow">From our customers</span>
        <h2 id="sp-reviews-title">What storm-damage customers across the service area say</h2>
        <p class="sp-lead">Real reviews, published by the client with first name and city exactly as written.</p>
        <div class="sp-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="sp-review" data-animate>
                <div class="sp-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="sp-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<div class="sp-divider sp-divider--peak" aria-hidden="true" style="background: var(--color-white);">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,60 720,0 1440,60"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="sp-section sp-section--dark" aria-labelledby="sp-claims-title">
    <div class="container">
        <div class="sp-claims">
            <figure class="sp-owners sp-from-left" data-animate>
                <?php echo areaPhoto('owner-father-v2', 'Glenn and Tim Menn, the father-and-son team behind Triple G Roofing & Construction', 1152, 1536, '(max-width: 1024px) 400px, 30vw'); ?>
                <figcaption><strong>Glenn &amp; Tim Menn</strong> More than 50 years of roofing, claims-handling and adjuster experience between them.</figcaption>
            </figure>
            <div>
                <span class="sp-eyebrow">After hail, wind or a hurricane</span>
                <h2 id="sp-claims-title">The claim, handled by people who know what the adjuster is looking for</h2>
                <p class="sp-lead">
                    A customer in Orange, TX called after her carrier first said no. Tim documented the roof with photos and phone
                    calls, the carrier reviewed it again, and that decision was reversed. We cannot promise that outcome for anyone —
                    the decision is always the carrier's — but we can promise the documentation will be done right.
                </p>
                <div class="sp-claims__grid">
                    <div class="sp-claims__item sp-from-right" data-animate><?php echo icon('search', 22); ?><strong>Document</strong><p>Photos of every slope and every strike before anything is touched.</p></div>
                    <div class="sp-claims__item sp-from-right" data-animate><?php echo icon('hard-hat', 22); ?><strong>Meet the adjuster</strong><p>We walk the roof with them at your home so nothing is missed.</p></div>
                    <div class="sp-claims__item sp-from-right" data-animate><?php echo icon('check-circle', 22); ?><strong>Explain the policy</strong><p>Deductible, depreciation and scope, in plain English, before you sign.</p></div>
                    <div class="sp-claims__item sp-from-right" data-animate><?php echo icon('home', 22); ?><strong>Do the work as agreed</strong><p>Owner on site, landscaping covered, daily cleanup, magnet sweep.</p></div>
                </div>
                <p class="sp-claims__note">Whether a claim is approved, and for how much, is always the insurance carrier's decision. Ask about temporary tarping if a storm has opened the roof.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== FAQ ===================== -->
<section class="sp-section" aria-labelledby="sp-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="sp-eyebrow">Common questions</span>
            <h2 id="sp-faq-title">Straight answers before you call</h2>
        </div>
        <div class="sp-faq">
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
<section class="sp-section sp-section--alt" aria-labelledby="sp-nearby-title">
    <div class="container">
        <span class="sp-eyebrow">Nearby communities</span>
        <h2 id="sp-nearby-title">North end of our US 59 run</h2>
        <p class="sp-lead">New Caney and Porter are the next exits south, and Kingwood and Humble follow on the way toward the shop in Humble. We cover more than 50 Greater Houston communities in all, out to Cleveland, Dayton and Liberty.</p>
        <div class="sp-nearby">
            <a href="/service-areas/new-caney/">New Caney, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/porter/">Porter, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="sp-chips">
            <?php foreach (['Woodbranch', 'Roman Forest', 'Cleveland', 'Cut and Shoot', 'Dayton', 'Liberty', 'Conroe'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="sp-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="sp-cta" aria-labelledby="sp-cta-title">
    <div class="container">
        <div class="sp-cta__inner">
            <div>
                <h2 id="sp-cta-title">Free roof inspection in Splendora — house, barn or shop, photos included</h2>
                <p>Call and we'll come take a look. The owner does the inspection, you get the pictures and a written estimate for shingle, metal or both, and the decision stays with you.</p>
            </div>
            <div class="sp-ctas">
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
    "name": "Shingle & Metal Roofing in <?php echo htmlspecialchars($areaName); ?>, TX",
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
