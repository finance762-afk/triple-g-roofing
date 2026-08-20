<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'New Caney';
$pageTitle = 'Roof Replacement & Repair in New Caney, TX | Triple G';
$pageDescription = 'Roof replacement, repair, storm damage, gutters and siding in New Caney, TX from a father-and-son team in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/new-caney/';

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

/* No reviews published from this community yet — show real roof-replacement reviews from nearby cities, labeled honestly */
$cityReviews = getTestimonialsFor('roof-replacement', 3);

$areaFaqs = [
    [
        'q' => 'Our Tavola house is still fairly new. When should we have the roof looked at?',
        'a' => 'After the first serious hail or wind event, and then about once a year. Builder roofs go on fast and to the minimum spec, so the early problems are nail pops, lifted ridge caps and unbalanced attic ventilation rather than worn-out shingles. A free inspection puts dated photos on file, which also makes any future claim far easier to document.',
    ],
    [
        'q' => 'We are on acreage off FM 1485 with a house, a shop and a carport. Can you handle all three?',
        'a' => 'Yes. We install architectural shingle and metal, and a lot of New Caney acreage properties end up with shingle on the house and corrugated or standing-seam metal on the outbuildings. We also build the fences, gates, patio covers and decks that go with a bigger lot. No job is too big or small.',
    ],
    [
        'q' => 'Will you help with the insurance claim after storm damage?',
        'a' => 'We help you through the whole process. With more than 50 years of roofing, claims-handling and adjuster experience, we document every slope, meet the adjuster at your home and explain your policy in plain English. Whether a claim is approved, and for how much, is always the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix nc-
   Tokens only. Light split hero with arched photo LEFT and
   copy right, dotted trust row, then-and-now local context,
   services list beside a tall photo, roof-age clock track
   (signature), card-style claims, reviews, two-column FAQ,
   nearby, dark CTA band.
   ========================================================== */

/* ---------- Reveal direction modifiers (opacity handled by framework [data-animate]) ---------- */
[data-animate].nc-from-left { transform: translateX(-32px); }
[data-animate].nc-from-right { transform: translateX(32px); }
[data-animate].nc-from-down { transform: translateY(-28px); }
[data-animate].nc-from-scale { transform: scale(0.94); }
[data-animate].nc-from-left.animated,
[data-animate].nc-from-right.animated,
[data-animate].nc-from-down.animated,
[data-animate].nc-from-scale.animated { transform: none; }

/* ---------- Hero ---------- */
.nc-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-12);
    background: linear-gradient(180deg, var(--color-light) 0%, var(--color-white) 100%);
}

.nc-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        radial-gradient(ellipse at 85% 15%, color-mix(in srgb, var(--color-primary) 12%, transparent) 0%, transparent 45%),
        radial-gradient(ellipse at 10% 90%, color-mix(in srgb, var(--color-accent) 18%, transparent) 0%, transparent 40%);
}

.nc-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.05;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.nc-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr);
    gap: var(--space-12);
    align-items: center;
}

.nc-hero__visual { position: relative; }

.nc-hero__arch {
    width: 100%;
    max-width: 440px;
    aspect-ratio: 4 / 5;
    overflow: hidden;
    border-radius: var(--radius-full) var(--radius-full) var(--radius-xl) var(--radius-xl);
    box-shadow: var(--shadow-xl);
    position: relative;
    z-index: 1;
}

.nc-hero__arch img { width: 100%; height: 100%; object-fit: cover; }

.nc-hero__visual::before {
    content: '';
    position: absolute;
    left: calc(-1 * var(--space-6));
    bottom: calc(-1 * var(--space-6));
    width: 60%;
    height: 50%;
    border-radius: var(--radius-xl);
    background: repeating-linear-gradient(45deg, color-mix(in srgb, var(--color-primary) 30%, transparent) 0 2px, transparent 2px 10px);
    z-index: 0;
}

.nc-hero__badge {
    position: absolute;
    right: var(--space-4);
    bottom: var(--space-8);
    z-index: 2;
    background: var(--color-dark);
    color: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-4) var(--space-5);
    box-shadow: var(--shadow-lg);
    display: grid;
    gap: 2px;
}

.nc-hero__badge strong { font-family: var(--font-heading); font-size: var(--font-size-2xl); line-height: 1; color: var(--color-accent); }
.nc-hero__badge span { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 0.08em; color: color-mix(in srgb, var(--color-white) 75%, transparent); }

.nc-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: var(--color-gray);
}

.nc-breadcrumb a { color: var(--color-gray-dark); transition: color var(--transition-fast); }
.nc-breadcrumb a:hover { color: var(--color-primary); }
.nc-breadcrumb [aria-current] { color: var(--color-dark); font-weight: 600; }

.nc-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    border: 1px solid color-mix(in srgb, var(--color-primary) 40%, transparent);
    color: var(--color-primary);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
}

.nc-hero h1 {
    color: var(--color-dark);
    font-size: clamp(2.25rem, 4.6vw, 3.6rem);
    line-height: 1.08;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.nc-hero h1 span { color: var(--color-primary); }

.nc-hero__answer {
    color: var(--color-gray-dark);
    font-size: clamp(1rem, 1.5vw, 1.15rem);
    line-height: 1.75;
    max-width: 62ch;
    margin-bottom: var(--space-6);
    padding-left: var(--space-5);
    border-left: 4px solid var(--color-accent);
}

.nc-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.nc-ctas .btn-lg { font-size: var(--font-size-base); }

/* Dotted trust row */
.nc-trust {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3) var(--space-6);
    margin-top: var(--space-8);
    padding-top: var(--space-6);
    border-top: 1px dashed var(--color-border);
    list-style: none;
    padding-left: 0;
}

.nc-trust li { display: flex; align-items: center; gap: var(--space-2); font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600; color: var(--color-dark); }
.nc-trust li svg { color: var(--color-primary); }

/* ---------- Section scaffolding ---------- */
.nc-section { padding: var(--space-16) 0; }
.nc-section--alt { background: var(--color-light); }
.nc-section--dark { background: var(--color-dark); color: var(--color-white); }

.nc-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.nc-section--dark .nc-eyebrow { color: var(--color-accent); }
.nc-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.nc-section--dark h2 { color: var(--color-white); }
.nc-section h3 { text-wrap: balance; }
.nc-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.nc-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.nc-prose a { color: var(--color-primary); font-weight: 600; }
.nc-prose a:hover { text-decoration: underline; }
.nc-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.nc-section--dark .nc-lead { color: color-mix(in srgb, var(--color-white) 82%, transparent); }

/* ---------- Local context: then and now ---------- */
.nc-then-now {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    margin-top: var(--space-8);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
}

.nc-era { padding: var(--space-8); position: relative; }
.nc-era--then { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }
.nc-era--now { background: var(--color-white); }

.nc-era__label {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-sm);
    margin-bottom: var(--space-4);
}

.nc-era--then .nc-era__label { background: var(--color-dark); color: var(--color-accent); }
.nc-era--now .nc-era__label { background: var(--color-primary); color: var(--color-white); }
.nc-era h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-3); color: var(--color-dark); }
.nc-era p { font-size: var(--font-size-sm); line-height: 1.7; color: var(--color-gray-dark); margin: 0 0 var(--space-4); }

.nc-era dl { display: grid; grid-template-columns: auto 1fr; gap: var(--space-2) var(--space-4); font-size: var(--font-size-sm); margin: 0; }
.nc-era dt { font-family: var(--font-heading); font-weight: 700; color: var(--color-primary); white-space: nowrap; }
.nc-era dd { margin: 0; color: var(--color-gray-dark); line-height: 1.5; }

.nc-era--now::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 1px;
    background: var(--color-border);
}

.nc-local-photos {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-5);
    margin-top: var(--space-8);
}

.nc-figure {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 16 / 10;
}

.nc-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.nc-figure:hover img { transform: scale(1.04); }

/* ---------- Services: list beside tall photo ---------- */
.nc-services {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr);
    gap: var(--space-12);
    align-items: start;
}

.nc-tall {
    position: sticky;
    top: calc(var(--nav-height) + var(--space-4));
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    aspect-ratio: 3 / 4;
}

.nc-tall img { width: 100%; height: 100%; object-fit: cover; }

.nc-tall__cap {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: var(--space-6) var(--space-5) var(--space-5);
    background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--color-dark) 90%, transparent));
    color: var(--color-white);
    font-size: var(--font-size-sm);
    line-height: 1.5;
}

.nc-tall__cap strong { display: block; font-family: var(--font-heading); color: var(--color-accent); }

.nc-list { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; }

.nc-list a {
    display: grid;
    grid-template-columns: 44px 1fr auto;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-4) var(--space-3);
    border-top: 1px solid var(--color-border);
    color: var(--color-dark);
    transition: background var(--transition-fast), padding-left var(--transition-fast);
}

.nc-list li:last-child a { border-bottom: 1px solid var(--color-border); }
.nc-list a:hover { background: color-mix(in srgb, var(--color-primary) 5%, var(--color-white)); padding-left: var(--space-5); }
.nc-list a:hover .nc-list__arrow { transform: translateX(4px); color: var(--color-primary); }

.nc-list__icon {
    width: 44px;
    height: 44px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    color: var(--color-primary);
}

.nc-list li:nth-child(3n+1) .nc-list__icon { background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white)); }
.nc-list li:nth-child(3n+2) .nc-list__icon { background: color-mix(in srgb, var(--color-accent) 20%, var(--color-white)); }
.nc-list li:nth-child(3n) .nc-list__icon { background: color-mix(in srgb, var(--color-dark) 7%, var(--color-white)); }
.nc-list strong { display: block; font-family: var(--font-heading); }
.nc-list small { display: block; font-size: var(--font-size-xs); color: var(--color-gray); line-height: 1.5; }
.nc-list__arrow { color: var(--color-gray); transition: transform var(--transition-fast), color var(--transition-fast); transform: rotate(90deg); }

/* ---------- Signature: roof-age clock track ---------- */
.nc-clock { margin-top: var(--space-10); position: relative; }

.nc-clock__track {
    position: absolute;
    left: 0;
    right: 0;
    top: 28px;
    height: 4px;
    border-radius: var(--radius-full);
    background: linear-gradient(90deg, var(--color-accent) 0%, var(--color-primary) 60%, var(--color-white) 100%);
    opacity: 0.9;
}

.nc-clock__items {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-6);
    position: relative;
}

.nc-clock__items li { display: grid; gap: var(--space-3); }

.nc-clock__dot {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-sm);
    background: var(--color-dark);
    color: var(--color-white);
    border: 4px solid var(--color-accent);
    box-shadow: var(--shadow-md);
}

.nc-clock__items li:nth-child(2) .nc-clock__dot { border-color: color-mix(in srgb, var(--color-accent) 60%, var(--color-primary)); }
.nc-clock__items li:nth-child(3) .nc-clock__dot { border-color: var(--color-primary); }
.nc-clock__items li:nth-child(4) .nc-clock__dot { border-color: var(--color-white); }

.nc-clock__card {
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    border-radius: var(--radius-lg);
    padding: var(--space-5);
    display: grid;
    gap: var(--space-2);
    height: 100%;
}

.nc-clock__card h3 { color: var(--color-white); font-size: var(--font-size-lg); margin: 0; }
.nc-clock__card p { margin: 0; font-size: var(--font-size-sm); line-height: 1.65; color: color-mix(in srgb, var(--color-white) 80%, transparent); }
.nc-clock__card a { color: var(--color-accent); font-weight: 600; font-size: var(--font-size-sm); }
.nc-clock__card a:hover { text-decoration: underline; }

.nc-clock__note {
    margin-top: var(--space-8);
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-accent) 15%, transparent);
    border-left: 4px solid var(--color-accent);
    font-size: var(--font-size-sm);
    line-height: 1.7;
    color: color-mix(in srgb, var(--color-white) 90%, transparent);
    max-width: 70ch;
}

.nc-clock__note a { color: var(--color-accent); font-weight: 600; }

/* ---------- Claims: cards ---------- */
.nc-claims { display: grid; grid-template-columns: minmax(0, 2fr) minmax(0, 3fr); gap: var(--space-12); align-items: start; }
.nc-claims__photo { border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-card); aspect-ratio: 4 / 5; }
.nc-claims__photo img { width: 100%; height: 100%; object-fit: cover; }

.nc-cards { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); margin-top: var(--space-6); }

.nc-card {
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    display: grid;
    gap: var(--space-2);
    align-content: start;
}

.nc-card:nth-child(1) { background: color-mix(in srgb, var(--color-primary) 5%, var(--color-white)); }
.nc-card:nth-child(2) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.nc-card:nth-child(3) { background: color-mix(in srgb, var(--color-dark) 4%, var(--color-white)); }
.nc-card svg { color: var(--color-primary); }
.nc-card strong { font-family: var(--font-heading); color: var(--color-dark); }
.nc-card p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

.nc-card--note {
    grid-column: span 2;
    background: var(--color-dark);
    border: 0;
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
}

.nc-card--note strong { color: var(--color-accent); }
.nc-card--note p { color: color-mix(in srgb, var(--color-white) 85%, transparent); }

/* ---------- Reviews ---------- */
.nc-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.nc-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-8) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border-top: 4px solid var(--color-primary);
    display: flex;
    flex-direction: column;
}

.nc-review:nth-child(2) { border-top-color: var(--color-accent); }
.nc-review:nth-child(3) { border-top-color: var(--color-dark); }
.nc-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.nc-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); flex: 1; }
.nc-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }
.nc-review__avatar { width: 40px; height: 40px; border-radius: var(--radius-full); display: grid; place-items: center; background: var(--color-dark); color: var(--color-accent); font-weight: 700; }
.nc-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ: two-column ---------- */
.nc-faq-grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 2fr); gap: var(--space-12); align-items: start; }
.nc-faq { display: grid; gap: var(--space-3); }
.nc-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.nc-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.nc-faq summary {
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

.nc-faq summary::-webkit-details-marker { display: none; }
.nc-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.nc-faq details[open] summary svg { transform: rotate(45deg); }
.nc-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

.nc-faq-side { position: sticky; top: calc(var(--nav-height) + var(--space-4)); }
.nc-faq-side .btn { margin-top: var(--space-4); }

/* ---------- Nearby ---------- */
.nc-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.nc-nearby a {
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

.nc-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.nc-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.nc-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.nc-chips span, .nc-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.nc-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.nc-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.nc-divider { line-height: 0; display: block; }
.nc-divider svg { width: 100%; height: 56px; display: block; }
.nc-divider--wave { background: var(--color-white); }
.nc-divider--wave svg { fill: var(--color-light); }
.nc-divider--notch { background: var(--color-light); }
.nc-divider--notch svg { fill: var(--color-dark); }
.nc-divider--slant { background: var(--color-dark); }
.nc-divider--slant svg { fill: var(--color-white); }

/* ---------- CTA band ---------- */
.nc-cta {
    position: relative;
    overflow: hidden;
    background: var(--color-dark);
    padding: var(--space-16) 0;
}

.nc-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, color-mix(in srgb, var(--color-primary) 35%, transparent) 0%, transparent 60%);
    pointer-events: none;
}

.nc-cta__inner { position: relative; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.nc-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.nc-cta p { color: color-mix(in srgb, var(--color-white) 85%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

.nc-cta__phone {
    display: inline-flex;
    align-items: center;
    gap: var(--space-3);
    font-family: var(--font-heading);
    font-size: clamp(1.5rem, 3vw, 2.2rem);
    font-weight: 800;
    color: var(--color-white);
    transition: color var(--transition-fast);
}

.nc-cta__phone:hover { color: var(--color-accent); }
.nc-cta__phone svg { color: var(--color-accent); }
.nc-cta__actions { display: grid; gap: var(--space-4); justify-items: start; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .nc-hero__grid { grid-template-columns: 1fr; }
    .nc-hero__visual { order: 2; max-width: 420px; }
    .nc-then-now { grid-template-columns: 1fr; }
    .nc-era--now::before { width: auto; height: 1px; right: 0; bottom: auto; }
    .nc-services { grid-template-columns: 1fr; }
    .nc-tall { position: static; max-width: 480px; }
    .nc-clock__items { grid-template-columns: 1fr 1fr; }
    .nc-clock__track { display: none; }
    .nc-claims { grid-template-columns: 1fr; }
    .nc-claims__photo { max-width: 420px; }
    .nc-faq-grid { grid-template-columns: 1fr; }
    .nc-faq-side { position: static; }
    .nc-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .nc-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .nc-ctas .btn { width: 100%; justify-content: center; }
    .nc-hero__badge { position: static; margin-top: var(--space-4); }
    .nc-local-photos { grid-template-columns: 1fr; }
    .nc-clock__items { grid-template-columns: 1fr; }
    .nc-cards { grid-template-columns: 1fr; }
    .nc-card--note { grid-column: span 1; }
    .nc-list a { grid-template-columns: 44px 1fr; }
    .nc-list__arrow { display: none; }
    .nc-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .nc-figure img, .nc-list a, .nc-nearby a, .nc-list__arrow { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="nc-hero" aria-labelledby="nc-title">
    <div class="container">
        <div class="nc-hero__grid">
            <div class="nc-hero__visual">
                <div class="nc-hero__arch">
                    <?php echo areaPhoto('roof-two-story', 'Two-story brick home during a roof replacement', 1200, 1600, '(max-width: 1024px) 420px, 36vw', true); ?>
                </div>
                <div class="nc-hero__badge">
                    <strong>1973</strong>
                    <span>Serving Greater Houston since</span>
                </div>
            </div>

            <div>
                <nav class="nc-breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="nc-hero__eyebrow"><?php echo icon('map-pin', 14); ?> East Montgomery County · one of 50+ communities</span>

                <h1 id="nc-title">Roof Replacement &amp; Repair in <span>New Caney</span>, TX</h1>

                <p class="nc-hero__answer">
                    New Caney is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a
                    family-owned father-and-son team based in Humble, TX, in business since 1973. Shingle and metal roof replacement,
                    leak and storm repair, gutters, siding, patio covers, decks and fences — with a free inspection and written estimate
                    before any work starts, and the owner on every job.
                </p>

                <div class="nc-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Inspection</a>
                </div>

                <ul class="nc-trust" aria-label="At a glance">
                    <li><?php echo icon('hard-hat', 18); ?> Father &amp; son — Glenn &amp; Tim Menn</li>
                    <li><?php echo icon('award', 18); ?> Nextdoor Favorite 2022 · 2023 · 2024</li>
                    <li><?php echo icon('check-circle', 18); ?> Free inspections &amp; estimates</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="nc-divider nc-divider--wave" aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none"><path d="M0,56 L0,28 C240,56 480,0 720,28 C960,56 1200,0 1440,28 L1440,56 Z"/></svg>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="nc-section nc-section--alt" aria-labelledby="nc-local-title">
    <div class="container">
        <div class="nc-prose">
            <span class="nc-eyebrow">Caney Station, then and now</span>
            <h2 id="nc-local-title">A railroad town from the 1880s, now one of the fastest-growing stretches of I-69</h2>
            <p class="nc-subtitle">New Caney has had two lives, and the roofs tell you which one a house belongs to.</p>
            <p>
                New Caney is unincorporated southeastern Montgomery County, centered on the junction of FM 1485 and Loop 494 about
                seventeen miles southeast of Conroe. It started in the 1860s as Presswood, became Caney Station when the Houston, East
                and West Texas Railway came through in 1877 — named for the canebrakes along Caney Creek — and got its post office as
                New Caney in 1882 because Texas already had a Caney. Roman Forest and Woodbranch, the two small incorporated cities
                next door, share New Caney ISD with it, and neighborhoods like Peach Creek Forest and Peach Creek Pines sit on the
                creeks that give the area its character and its flood history.
            </p>
        </div>

        <div class="nc-then-now">
            <div class="nc-era nc-era--then nc-from-left" data-animate>
                <span class="nc-era__label">Then · FM 1485 &amp; Loop 494</span>
                <h3>Acreage, older frame and brick homes, shops behind the house</h3>
                <p>The original New Caney along FM 1485, Loop 494 and the side roads toward Peach Creek. One-story homes on big wooded lots, many on their second or third roof, with metal on the barn or shop and a fence line that has seen decades of weather.</p>
                <dl>
                    <dt>Usual calls</dt><dd>Second-cycle roofs, rotted fascia behind old gutters, pine limbs and squirrels, metal for outbuildings</dd>
                    <dt>Weather file</dt><dd>Harvey 2017, Imelda 2019 and the May 2024 East Fork flooding all reached this side</dd>
                </dl>
            </div>
            <div class="nc-era nc-era--now nc-from-right" data-animate>
                <span class="nc-era__label">Now · I-69 corridor</span>
                <h3>Tavola and the new subdivisions off the freeway</h3>
                <p>Friendswood Development's Tavola — more than 1,800 single-family homes and 100 townhomes in the woods beside I-69 — set the pace, and Big Rivers Waterpark at Grand Texas went in on SH 242 a mile west of the freeway. These are builder roofs between a few years and a decade old.</p>
                <dl>
                    <dt>Usual calls</dt><dd>First-storm damage on builder shingles, lifted ridge caps, unbalanced attic ventilation, HOA color approvals</dd>
                    <dt>Weather file</dt><dd>Beryl in July 2024 was the first hurricane most of these roofs had ever seen</dd>
                </dl>
            </div>
        </div>

        <div class="nc-local-photos">
            <figure class="nc-figure nc-from-down" data-animate>
                <?php echo areaPhoto('roof-tearoff', 'Roof tear-off in progress with a dump trailer staged in the driveway', 1200, 1600, '(max-width: 640px) 100vw, 50vw'); ?>
            </figure>
            <figure class="nc-figure nc-from-scale" data-animate>
                <?php echo areaPhoto('roof-underlayment', 'Synthetic underlayment laid across a roof before shingles', 1200, 1600, '(max-width: 640px) 100vw, 50vw'); ?>
            </figure>
        </div>

        <p class="nc-lead" style="margin-top: var(--space-8);">
            Looking for <strong>roof replacement near me in New Caney</strong>? Call <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-primary); font-weight: 600;"><?php echo $phone; ?></a>
            and Tim will come look at it himself — photos, a written estimate, and no pressure to decide on the spot.
        </p>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="nc-section" aria-labelledby="nc-svc-title">
    <div class="container">
        <div class="nc-services">
            <div class="nc-tall nc-from-left" data-animate>
                <?php echo areaPhoto('attic-venting-v2', 'Freshly shingled roof with box vents installed for attic ventilation', 1200, 1600, '(max-width: 1024px) 480px, 38vw'); ?>
                <div class="nc-tall__cap"><strong>Roofing / Siding</strong> New architectural shingles with box vents set for balanced attic exhaust — the detail builder roofs most often skip.</div>
            </div>
            <div>
                <span class="nc-eyebrow">What we do in New Caney</span>
                <h2 id="nc-svc-title">Roofs first, then the gutters, siding and outdoor living that go with a New Caney lot</h2>
                <p class="nc-lead">
                    Roofing is the core of what <?php echo htmlspecialchars($shortName); ?> does. But out here a roof estimate usually
                    turns into a conversation about the fascia behind the gutters, the shop out back, or the patio cover the family
                    has wanted for years — and one crew, with the owner on site, handles all of it.
                </p>
                <ul class="nc-list">
                    <li><a href="/services/roof-replacement/"><span class="nc-list__icon"><?php echo icon('home', 20); ?></span><span><strong>Roof Replacement</strong><small>Architectural shingle and metal — tear-off, decking, underlayment, clean site</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/roof-repair/"><span class="nc-list__icon"><?php echo icon('wrench', 20); ?></span><span><strong>Roof Repair</strong><small>Leaks, flashing, pipe boots, rotted decking</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/roof-inspection/"><span class="nc-list__icon"><?php echo icon('search', 20); ?></span><span><strong>Roof Inspection</strong><small>Free, photo-documented, written — the baseline every newer roof should have on file</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/storm-damage-repair/"><span class="nc-list__icon"><?php echo icon('wind', 20); ?></span><span><strong>Storm &amp; Wind Damage</strong><small>Hail, wind and hurricane damage documented for your claim</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/roof-damage-repair/"><span class="nc-list__icon"><?php echo icon('hammer', 20); ?></span><span><strong>Roof Damage Repair</strong><small>Aging, worn or compromised roofs brought back right</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/attic-venting/"><span class="nc-list__icon"><?php echo icon('shield', 20); ?></span><span><strong>Attic Venting</strong><small>Balanced intake and exhaust that protects the shingles and their warranty</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/gutter-installation/"><span class="nc-list__icon"><?php echo icon('droplets', 20); ?></span><span><strong>Gutters</strong><small>Gutters and downspouts that get roof water off a slab fast</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/siding-fascia-soffit/"><span class="nc-list__icon"><?php echo icon('ruler', 20); ?></span><span><strong>Siding, Fascia &amp; Soffit</strong><small>Hardie and vinyl siding, wood-rot repair, window re-sealing, exterior paint</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/patio-covers-decks/"><span class="nc-list__icon"><?php echo icon('home', 20); ?></span><span><strong>Patio Covers, Pergolas &amp; Decks</strong><small>Covered and screened patios, cedar pergolas, wood decks</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                    <li><a href="/services/fences-gates/"><span class="nc-list__icon"><?php echo icon('hammer', 20); ?></span><span><strong>Fences &amp; Gates</strong><small>Cedar and pine privacy, ranch rail, custom gates</small></span><span class="nc-list__arrow"><?php echo icon('arrow-up', 18); ?></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="nc-divider nc-divider--notch" aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none"><polygon points="0,56 0,0 660,0 720,40 780,0 1440,0 1440,56"/></svg>
</div>

<!-- ===================== SIGNATURE: ROOF-AGE CLOCK ===================== -->
<section class="nc-section nc-section--dark" aria-labelledby="nc-clock-title">
    <div class="container">
        <span class="nc-eyebrow">The builder-roof clock</span>
        <h2 id="nc-clock-title">What a New Caney roof needs at each age — from the Tavola move-in day to the acreage second cycle</h2>
        <p class="nc-lead">Most roofs along I-69 here are young. Most roofs off FM 1485 are not. This is the honest schedule for both.</p>

        <div class="nc-clock">
            <div class="nc-clock__track" aria-hidden="true"></div>
            <ol class="nc-clock__items">
                <li data-animate class="nc-from-down">
                    <span class="nc-clock__dot">0–2</span>
                    <div class="nc-clock__card">
                        <h3>Move-in baseline</h3>
                        <p>Get dated photos of every slope on file and have the attic ventilation checked while the builder warranty is still live. Unbalanced intake and exhaust is the most common flaw we find on brand-new roofs.</p>
                        <a href="/services/roof-inspection/">Free inspection →</a>
                    </div>
                </li>
                <li data-animate>
                    <span class="nc-clock__dot">3–7</span>
                    <div class="nc-clock__card">
                        <h3>First real storms</h3>
                        <p>After each hail or wind event — Beryl was the big one for this corridor — look for lifted ridge caps, creased tabs and nail pops. Gutters get sized properly now if the builder's were too small.</p>
                        <a href="/services/storm-damage-repair/">Storm damage →</a>
                    </div>
                </li>
                <li data-animate>
                    <span class="nc-clock__dot">8–15</span>
                    <div class="nc-clock__card">
                        <h3>Sealants and boots</h3>
                        <p>Pipe boots crack, sealant around flashing dries out, and shaded slopes under pine grow algae. These are repairs, not a replacement — a good inspection keeps it that way.</p>
                        <a href="/services/roof-repair/">Roof repair →</a>
                    </div>
                </li>
                <li data-animate class="nc-from-down">
                    <span class="nc-clock__dot">15+</span>
                    <div class="nc-clock__card">
                        <h3>The acreage decision</h3>
                        <p>Granule loss, soft decking and rotted fascia mean it's time to talk shingle versus metal, and whether the shop gets done at the same time. You get photos and a written estimate for each option.</p>
                        <a href="/services/roof-replacement/">Roof replacement →</a>
                    </div>
                </li>
            </ol>
        </div>

        <p class="nc-clock__note">
            Why ventilation shows up at the very start of the clock: shingle manufacturers can void or limit the shingle warranty when
            the attic is not properly ventilated, and a builder-installed roof is rarely checked for balanced intake and exhaust.
            Details on the <a href="/services/attic-venting/">attic venting</a> page.
        </p>
    </div>
</section>

<div class="nc-divider nc-divider--slant" aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none"><polygon points="0,56 0,0 1440,56"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="nc-section" aria-labelledby="nc-claims-title">
    <div class="container">
        <div class="nc-claims">
            <div class="nc-claims__photo nc-from-left" data-animate>
                <?php echo areaPhoto('roof-damage-repair-v2', 'Roof stripped to the decking showing holes and rotted wood before repair', 1200, 1600, '(max-width: 1024px) 420px, 36vw'); ?>
            </div>
            <div>
                <span class="nc-eyebrow">After the storm</span>
                <h2 id="nc-claims-title">Claims help from a father and son with more than 50 years on the adjuster's side</h2>
                <p class="nc-lead">
                    A homeowner in The Woodlands put it simply: Tim found more damage, helped with the insurance claim, and she felt
                    taken care of. That is the whole job — document it properly, explain it plainly, and do the work as agreed.
                </p>
                <div class="nc-cards">
                    <div class="nc-card nc-from-right" data-animate><?php echo icon('search', 22); ?><strong>Document</strong><p>Photos of every slope and every strike before anything is touched.</p></div>
                    <div class="nc-card nc-from-right" data-animate><?php echo icon('hard-hat', 22); ?><strong>Meet the adjuster</strong><p>We walk the roof with them at your home so nothing is missed.</p></div>
                    <div class="nc-card nc-from-right" data-animate><?php echo icon('check-circle', 22); ?><strong>Explain the policy</strong><p>Deductible, depreciation and scope in plain English before you sign.</p></div>
                    <div class="nc-card nc-card--note" data-animate><?php echo icon('shield', 22); ?><strong>Coverage is the carrier's call</strong><p>Whether a claim is approved, and for how much, is always the insurance carrier's decision. We make sure the damage is documented and that you understand what your policy says. Ask about temporary tarping if a storm has opened the roof.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="nc-section nc-section--alt" aria-labelledby="nc-reviews-title">
    <div class="container">
        <span class="nc-eyebrow">From our customers</span>
        <h2 id="nc-reviews-title">What roof replacement customers across Greater Houston say</h2>
        <p class="nc-lead">Real reviews, published by the client with first name and city exactly as written — from the communities around New Caney and beyond.</p>
        <div class="nc-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="nc-review" data-animate>
                <div class="nc-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="nc-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="nc-section" aria-labelledby="nc-faq-title">
    <div class="container">
        <div class="nc-faq-grid">
            <div class="nc-faq-side">
                <span class="nc-eyebrow">Common questions</span>
                <h2 id="nc-faq-title">Before you call</h2>
                <p class="nc-lead">Short answers to what New Caney homeowners usually ask first. Anything else — call and ask Tim directly.</p>
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            </div>
            <div class="nc-faq">
                <?php foreach ($areaFaqs as $i => $faq): ?>
                <details <?php echo $i === 0 ? 'open' : ''; ?>>
                    <summary><?php echo htmlspecialchars($faq['q']); ?> <?php echo icon('plus', 20); ?></summary>
                    <p><?php echo htmlspecialchars($faq['a']); ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===================== NEARBY ===================== -->
<section class="nc-section nc-section--alt" aria-labelledby="nc-nearby-title">
    <div class="container">
        <span class="nc-eyebrow">Nearby communities</span>
        <h2 id="nc-nearby-title">Up and down the I-69 corridor</h2>
        <p class="nc-lead">Porter is the next exit south, Splendora the next one north, and Kingwood and Humble are a short run down the freeway. We cover more than 50 Greater Houston communities in all.</p>
        <div class="nc-nearby">
            <a href="/service-areas/porter/">Porter, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/splendora/">Splendora, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="nc-chips">
            <?php foreach (['Roman Forest', 'Woodbranch', 'Porter Heights', 'Cleveland', 'Cut and Shoot', 'Conroe', 'The Woodlands'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="nc-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="nc-cta" aria-labelledby="nc-cta-title">
    <div class="container">
        <div class="nc-cta__inner">
            <div>
                <h2 id="nc-cta-title">Free roof inspection in New Caney — photos, a written estimate, your decision</h2>
                <p>Tavola, Peach Creek or acreage off FM 1485 — call and we'll come take a look. The owner does the inspection himself and nobody pushes you to sign anything.</p>
            </div>
            <div class="nc-cta__actions">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="nc-cta__phone"><?php echo icon('phone', 26); ?> <?php echo $phone; ?></a>
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
