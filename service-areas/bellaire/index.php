<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Bellaire';
$pageTitle = 'Roofing & Exteriors in Bellaire, TX | ' . $shortName;
$pageDescription = 'Roofing, siding, gutters and patio covers in Bellaire, TX from a father-and-son team serving Greater Houston since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/bellaire/';

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

/* No review is tagged with this city yet — show real roof-replacement reviews from across Greater Houston */
$cityReviews = getTestimonialsFor('roof-replacement', 3);

/* Nearby communities — linked only when that area page exists on disk, otherwise shown as a plain chip */
$nearbyCities = ['West University Place', 'Southside Place', 'Houston', 'Jersey Village', 'Spring Valley Village', 'Pasadena'];

$areaFaqs = [
    [
        'q' => 'Does a roof replacement in Bellaire need a city permit?',
        'a' => 'Bellaire is its own incorporated city with its own Development Services department, so permits run through the City of Bellaire rather than the City of Houston or Harris County. We handle the paperwork for the work we perform and tell you up front what the city will want to see. Bellaire also has a tree ordinance that protects mature trees during construction, so we plan access and material staging around them.',
    ],
    [
        'q' => 'Can you match the roof on a new two-story build, or only older ranch homes?',
        'a' => 'Both. Many of the original 1940s and 1950s ranch homes have been replaced by larger two-story houses with steeper, more complex rooflines, and we roof those just as often as the originals. Architectural shingle and metal are both on the table, and every project starts with a free inspection and a written estimate with photos.',
    ],
    [
        'q' => 'Do you help with hail and wind claims after a storm?',
        'a' => 'Yes. Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience. We photograph the damage, meet the adjuster on the roof and explain the policy language in plain English. Whether a claim is approved, and for how much, is always the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix be-
   Tokens only. Split hero with arch-framed portrait photo,
   era timeline-rail signature section, permit/tree notes,
   services mosaic, claims, reviews, FAQ, nearby, CTA.
   ========================================================== */

/* ---------- Reveal direction modifiers (scoped to this page) ---------- */
[data-animate][data-dir="left"] { transform: translateX(-32px); }
[data-animate][data-dir="right"] { transform: translateX(32px); }
[data-animate][data-dir="down"] { transform: translateY(-28px); }
[data-animate][data-dir="scale"] { transform: scale(0.94); }
[data-animate][data-dir].animated { transform: none; }

/* ---------- Hero: split with arch photo ---------- */
.be-hero {
    position: relative;
    overflow: hidden;
    isolation: isolate;
    background: var(--color-dark);
}

.be-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        radial-gradient(ellipse at 80% 20%, color-mix(in srgb, var(--color-primary) 28%, transparent) 0%, transparent 55%),
        linear-gradient(160deg, var(--color-dark) 0%, var(--color-dark-alt) 100%);
}

.be-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.05;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.be-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 7fr) minmax(0, 5fr);
    gap: var(--space-12);
    align-items: center;
    padding: calc(var(--nav-height) + var(--space-10)) 0 var(--space-12);
}

.be-crumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.be-crumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.be-crumb a:hover { color: var(--color-accent); }
.be-crumb [aria-current] { color: var(--color-white); font-weight: 600; }

.be-hero__tag {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    border: 1px solid color-mix(in srgb, var(--color-accent) 55%, transparent);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
}

.be-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 4.8vw, 3.75rem);
    line-height: 1.06;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.be-hero h1 em { font-style: normal; color: var(--color-accent); }

.be-hero__lead {
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.15rem);
    line-height: 1.7;
    max-width: 60ch;
    margin-bottom: var(--space-7);
}

.be-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.be-ctas .btn-lg { font-size: var(--font-size-base); }

.be-hero__media { position: relative; justify-self: end; width: min(100%, 440px); }

.be-arch {
    aspect-ratio: 3 / 4;
    overflow: hidden;
    border-radius: var(--radius-full) var(--radius-full) var(--radius-xl) var(--radius-xl);
    box-shadow: var(--shadow-lg);
    border: 6px solid color-mix(in srgb, var(--color-white) 10%, transparent);
}

.be-arch img { width: 100%; height: 100%; object-fit: cover; object-position: center; }

.be-hero__badge {
    position: absolute;
    left: calc(-1 * var(--space-8));
    bottom: var(--space-8);
    background: var(--color-primary);
    color: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-4) var(--space-5);
    box-shadow: var(--shadow-lg);
    display: grid;
    gap: 2px;
    min-width: 150px;
}

.be-hero__badge strong { font-family: var(--font-heading); font-size: var(--font-size-3xl); line-height: 1; }
.be-hero__badge span { font-size: var(--font-size-xs); letter-spacing: 0.06em; text-transform: uppercase; color: color-mix(in srgb, var(--color-white) 85%, transparent); }

/* ---------- Trust ribbon ---------- */
.be-ribbon { background: var(--color-primary); color: var(--color-white); }

.be-ribbon ul {
    list-style: none;
    margin: 0;
    padding: var(--space-4) 0;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-4);
}

.be-ribbon li {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    padding-left: var(--space-4);
    border-left: 1px solid color-mix(in srgb, var(--color-white) 30%, transparent);
}

.be-ribbon li:first-child { border-left: 0; padding-left: 0; }
.be-ribbon li svg { flex-shrink: 0; color: var(--color-accent); }

/* ---------- Section scaffolding ---------- */
.be-section { padding: var(--space-16) 0; }
.be-section--alt { background: var(--color-light); }
.be-section--dark { background: var(--color-dark); color: var(--color-white); }

.be-eyebrow {
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

.be-eyebrow::before { content: ''; width: 10px; height: 10px; border-radius: var(--radius-full); background: var(--color-accent); }
.be-section--dark .be-eyebrow { color: var(--color-accent); }

.be-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.be-section--dark h2 { color: var(--color-white); }
.be-section h3 { text-wrap: balance; }
.be-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.be-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.be-prose a { color: var(--color-primary); font-weight: 600; }
.be-prose a:hover { text-decoration: underline; }
.be-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.be-section--dark .be-lead { color: color-mix(in srgb, var(--color-white) 80%, transparent); }

/* ---------- Local context: prose + stacked photo column ---------- */
.be-local {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(0, 3fr);
    gap: var(--space-12);
    align-items: start;
}

.be-local__media { display: grid; gap: var(--space-4); position: sticky; top: calc(var(--nav-height) + var(--space-4)); }

.be-photo {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 4 / 5;
    position: relative;
}

.be-photo--wide { aspect-ratio: 4 / 3; }
.be-photo img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.be-photo:hover img { transform: scale(1.04); }

.be-photo figcaption {
    position: absolute;
    left: var(--space-4);
    bottom: var(--space-4);
    background: color-mix(in srgb, var(--color-dark) 78%, transparent);
    color: var(--color-white);
    font-size: var(--font-size-xs);
    font-family: var(--font-heading);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-sm);
    backdrop-filter: blur(6px);
}

.be-notes { margin: var(--space-6) 0; display: grid; gap: var(--space-3); }

.be-note {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    line-height: 1.6;
    color: var(--color-gray-dark);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}

.be-note:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
.be-note:nth-child(1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.be-note:nth-child(2) { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }
.be-note:nth-child(3) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }
.be-note:nth-child(4) { background: var(--color-white); }

.be-note__icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-white);
    color: var(--color-primary);
    box-shadow: var(--shadow-sm);
}

.be-note strong { display: block; color: var(--color-dark); font-family: var(--font-heading); margin-bottom: 2px; }

/* ---------- Signature: era timeline rail ---------- */
.be-rail { position: relative; margin-top: var(--space-10); }

.be-rail::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    top: 34px;
    height: 3px;
    background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
    border-radius: var(--radius-full);
}

.be-rail ol {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-5);
}

.be-era { position: relative; padding-top: var(--space-12); }

.be-era__dot {
    position: absolute;
    top: 24px;
    left: 0;
    width: 22px;
    height: 22px;
    border-radius: var(--radius-full);
    background: var(--color-white);
    border: 4px solid var(--color-primary);
    box-shadow: var(--shadow-sm);
}

.be-era:nth-child(even) .be-era__dot { border-color: var(--color-accent); }

.be-era__year {
    display: block;
    font-family: var(--font-heading);
    font-size: var(--font-size-3xl);
    font-weight: 800;
    line-height: 1;
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.be-era__card {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    padding: var(--space-5);
    box-shadow: var(--shadow-card);
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.be-era__card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.be-era__card h3 { font-size: var(--font-size-lg); }
.be-era__card p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }

.be-era__roof {
    margin-top: auto;
    padding-top: var(--space-3);
    border-top: 1px dashed var(--color-border);
    font-size: var(--font-size-sm);
    color: var(--color-primary-dark);
    font-family: var(--font-heading);
    font-weight: 600;
    display: block;
    line-height: 1.5;
}

.be-era__roof svg { vertical-align: -3px; margin-right: var(--space-1); color: var(--color-primary); }
.be-era__roof a { color: var(--color-primary); text-decoration: underline; }

.be-rail__photos {
    margin-top: var(--space-10);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-6);
    align-items: stretch;
}

.be-rail__photo { position: relative; border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 16 / 10; box-shadow: var(--shadow-card); }
.be-rail__photo img { width: 100%; height: 100%; object-fit: cover; }

.be-rail__photo span {
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

.be-rail__photo:nth-child(2) span { background: var(--color-primary); }

/* ---------- Services mosaic ---------- */
.be-mosaic {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: var(--space-4);
    margin-top: var(--space-8);
}

.be-tile {
    grid-column: span 2;
    position: relative;
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    overflow: hidden;
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.be-tile--wide { grid-column: span 3; }
.be-tile:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.be-tile:nth-child(4n+1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.be-tile:nth-child(4n+2) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.be-tile:nth-child(4n+3) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.be-tile::before {
    content: '';
    position: absolute;
    inset: auto -40px -40px auto;
    width: 110px;
    height: 110px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-white) 55%, transparent);
    pointer-events: none;
}

.be-tile__icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-white); color: var(--color-primary); box-shadow: var(--shadow-sm); }
.be-tile strong { font-family: var(--font-heading); color: var(--color-dark); font-size: var(--font-size-lg); }
.be-tile span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; flex: 1; }
.be-tile em { font-style: normal; color: var(--color-primary); font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600; display: inline-flex; align-items: center; gap: var(--space-1); }

.be-vent {
    margin-top: var(--space-6);
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-accent) 16%, var(--color-white));
    border-left: 4px solid var(--color-primary);
    color: var(--color-gray-dark);
    line-height: 1.7;
    max-width: 75ch;
}

.be-vent a { color: var(--color-primary); font-weight: 600; }

/* ---------- Claims ---------- */
.be-claims { display: grid; grid-template-columns: minmax(0, 5fr) minmax(0, 7fr); gap: var(--space-12); align-items: center; }
.be-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 58ch; }

.be-steps { list-style: none; margin: 0; padding: 0; counter-reset: bestep; display: grid; gap: var(--space-3); }

.be-steps li {
    counter-increment: bestep;
    display: grid;
    grid-template-columns: 56px 1fr;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    font-size: var(--font-size-sm);
    line-height: 1.6;
    transition: background var(--transition-fast);
}

.be-steps li:hover { background: color-mix(in srgb, var(--color-white) 10%, transparent); }

.be-steps li::before {
    content: counter(bestep);
    width: 56px;
    height: 56px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    font-family: var(--font-heading);
    font-size: var(--font-size-xl);
    font-weight: 800;
    color: var(--color-dark);
    background: var(--color-accent);
}

.be-steps strong { display: block; color: var(--color-white); margin-bottom: 2px; }
.be-claims__note { margin-top: var(--space-5); font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); border-left: 3px solid var(--color-accent); padding-left: var(--space-4); }

/* ---------- Reviews ---------- */
.be-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.be-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-7) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border-top: 4px solid var(--color-primary);
}

.be-review:nth-child(2) { border-top-color: var(--color-accent); }
.be-review:nth-child(3) { border-top-color: var(--color-dark); }

.be-review::before {
    content: '\201C';
    position: absolute;
    top: var(--space-2);
    right: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-primary) 14%, transparent);
}

.be-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.be-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); }
.be-review footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-dark); display: flex; gap: var(--space-2); align-items: center; }
.be-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.be-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.be-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.be-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.be-faq summary {
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

.be-faq summary::-webkit-details-marker { display: none; }
.be-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.be-faq details[open] summary svg { transform: rotate(45deg); }
.be-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.be-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.be-nearby a,
.be-nearby span {
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
}

.be-nearby a { transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast); }
.be-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.be-nearby a svg { color: var(--color-primary); }
.be-nearby span { color: var(--color-gray-dark); font-weight: 500; }

.be-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.be-chips span, .be-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.be-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.be-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.be-divider { line-height: 0; display: block; }
.be-divider svg { width: 100%; height: 56px; display: block; }
.be-divider--curve { background: var(--color-white); }
.be-divider--curve svg { fill: var(--color-light); }
.be-divider--steps { background: var(--color-white); }
.be-divider--steps svg { fill: var(--color-dark); }

/* ---------- CTA ---------- */
.be-cta { position: relative; overflow: hidden; background: var(--color-dark-alt); padding: var(--space-16) 0; }

.be-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 15% 50%, color-mix(in srgb, var(--color-primary) 35%, transparent) 0%, transparent 45%);
    pointer-events: none;
}

.be-cta__grid { position: relative; display: grid; grid-template-columns: minmax(0, 3fr) minmax(0, 2fr); gap: var(--space-10); align-items: center; }
.be-cta h2 { color: var(--color-white); font-size: clamp(1.75rem, 3.4vw, 2.5rem); margin-bottom: var(--space-3); text-wrap: balance; }
.be-cta p { color: color-mix(in srgb, var(--color-white) 85%, transparent); max-width: 58ch; line-height: 1.7; margin: 0; }
.be-cta .be-ctas { justify-content: flex-end; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .be-hero__grid { grid-template-columns: 1fr; gap: var(--space-8); }
    .be-hero__media { justify-self: start; width: min(100%, 360px); }
    .be-hero__badge { left: auto; right: calc(-1 * var(--space-4)); }
    .be-ribbon ul { grid-template-columns: 1fr 1fr; }
    .be-ribbon li:nth-child(3) { border-left: 0; padding-left: 0; }
    .be-local { grid-template-columns: 1fr; }
    .be-local__media { position: static; grid-template-columns: 1fr 1fr; }
    .be-rail ol { grid-template-columns: 1fr 1fr; }
    .be-rail::before { display: none; }
    .be-era { padding-top: var(--space-8); }
    .be-mosaic { grid-template-columns: repeat(2, 1fr); }
    .be-tile, .be-tile--wide { grid-column: span 1; }
    .be-claims { grid-template-columns: 1fr; }
    .be-cta__grid { grid-template-columns: 1fr; }
    .be-cta .be-ctas { justify-content: flex-start; }
}

@media (max-width: 640px) {
    .be-hero__grid { padding-top: calc(var(--nav-height) + var(--space-6)); }
    .be-ctas .btn { width: 100%; justify-content: center; }
    .be-ribbon ul { grid-template-columns: 1fr; }
    .be-ribbon li { border-left: 0; padding-left: 0; }
    .be-local__media { grid-template-columns: 1fr; }
    .be-rail ol { grid-template-columns: 1fr; }
    .be-rail__photos { grid-template-columns: 1fr; }
    .be-mosaic { grid-template-columns: 1fr; }
    .be-steps li { grid-template-columns: 44px 1fr; }
    .be-steps li::before { width: 44px; height: 44px; font-size: var(--font-size-lg); }
    .be-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .be-photo img, .be-note, .be-era__card, .be-tile, .be-nearby a, .be-steps li { transition: none; }
    [data-animate][data-dir] { transform: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="be-hero" aria-labelledby="be-title">
    <div class="container">
        <div class="be-hero__grid">
            <div>
                <nav class="be-crumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="be-hero__tag"><?php echo icon('map-pin', 14); ?> Inside the 610 Loop · one of 50+ communities we serve</span>

                <h1 id="be-title">Roofing &amp; Exterior Contractor in <em>Bellaire</em>, TX</h1>

                <p class="be-hero__lead">
                    Bellaire is one of more than 50 Greater Houston communities served by <?php echo htmlspecialchars($siteName); ?>,
                    a family-owned father-and-son team based in Humble, TX, in business since 1973. Shingle and metal roofs on
                    original ranch homes and new two-story builds alike, plus siding, gutters, patio covers, decks and fences —
                    with a free inspection and written estimate before you decide anything.
                </p>

                <div class="be-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
                </div>
            </div>

            <div class="be-hero__media">
                <div class="be-arch">
                    <?php echo areaPhoto('roof-large-home', 'Large two-story brick home with a completed roof replacement', 1200, 1600, '(max-width: 1024px) 360px, 440px', true); ?>
                </div>
                <div class="be-hero__badge" aria-label="Serving Greater Houston since 1973"><strong>1973</strong><span>Serving Greater Houston since</span></div>
            </div>
        </div>
    </div>
</section>

<div class="be-ribbon" role="presentation">
    <div class="container">
        <ul>
            <li><?php echo icon('award', 18); ?> Nextdoor Neighborhood Favorite 2022–2024</li>
            <li><?php echo icon('hard-hat', 18); ?> The owner is on every job</li>
            <li><?php echo icon('home', 18); ?> Father-and-son team since 1973</li>
            <li><?php echo icon('check-circle', 18); ?> Free inspections &amp; written estimates</li>
        </ul>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="be-section" aria-labelledby="be-local-title">
    <div class="container">
        <div class="be-local">
            <div class="be-local__media" data-animate data-dir="left">
                <figure class="be-photo">
                    <?php echo areaPhoto('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, '(max-width: 1024px) 50vw, 28vw'); ?>
                    <figcaption>Roofing around mature trees</figcaption>
                </figure>
                <figure class="be-photo be-photo--wide">
                    <?php echo areaPhoto('roof-tearoff', 'Roof tear-off in progress with a dump trailer staged in the driveway', 1200, 1600, '(max-width: 1024px) 50vw, 28vw'); ?>
                    <figcaption>Tear-off staged in the driveway</figcaption>
                </figure>
            </div>

            <div class="be-prose">
                <span class="be-eyebrow">Southwest Harris County, inside the Loop</span>
                <h2 id="be-local-title">The City of Homes has two very different rooflines</h2>
                <p class="be-subtitle">Low 1950s ranches and tall new builds, often next door to each other.</p>

                <p>
                    Bellaire is an independent city completely surrounded by Houston since Houston annexed the land around it at the
                    end of 1948. It was platted in 1908 and built out fast after the Second World War — hundreds of modest bungalows
                    and ranch homes a year in the early 1950s. That original housing stock is exactly what's being replaced today:
                    as lot values climbed, the low one-story ranches have been coming down and larger two-story houses going up on the
                    same lots, so a single block can hold a 1952 roof and a brand-new one.
                </p>
                <p>
                    That mix changes how we work. A Bellaire ranch home usually means a low-slope hip roof, original decking
                    that may need replacement, and attic ventilation that was never designed for a modern shingle. A new build means
                    steep pitches, multiple valleys, dormers and more flashing — more places for water to find a way in. Mature live
                    oaks line many streets and fall under the city's tree ordinance, so we plan our ladders, tarps and material staging
                    around the trees rather than through them. And because the City of Bellaire runs its own Development Services
                    department, permits are pulled with the city, not with Houston or the county.
                </p>

                <div class="be-notes">
                    <div class="be-note"><span class="be-note__icon"><?php echo icon('home', 22); ?></span><div><strong>1950s ranch homes</strong>Low hip roofs, aging decking and undersized attic ventilation — a full inspection before anyone talks about shingles.</div></div>
                    <div class="be-note"><span class="be-note__icon"><?php echo icon('ruler', 22); ?></span><div><strong>New two-story builds</strong>Steep pitches, valleys and dormers. Flashing and underlayment details decide whether these roofs stay dry.</div></div>
                    <div class="be-note"><span class="be-note__icon"><?php echo icon('shield', 22); ?></span><div><strong>City permits and tree ordinance</strong>Bellaire issues its own permits and protects its mature trees. We handle the paperwork and stage the job around the canopy.</div></div>
                    <div class="be-note"><span class="be-note__icon"><?php echo icon('droplets', 22); ?></span><div><strong>Harvey rebuilt much of the city</strong>Roughly a third of the homes here took water in 2017. Many were rebuilt or replaced, which is why a newer roof often sits next to a 1950s one.</div></div>
                </div>

                <p>
                    Searching for <strong>roof replacement near me in Bellaire</strong>, or a second opinion on a repair estimate? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. Tim comes out himself, the inspection is free,
                    and you get photos and a written estimate with no pressure attached.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="be-divider be-divider--curve" aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none"><path d="M0,56 C360,0 1080,0 1440,56 L1440,56 L0,56 Z"/></svg>
</div>

<!-- ===================== SIGNATURE: ERA RAIL ===================== -->
<section class="be-section be-section--alt" aria-labelledby="be-rail-title">
    <div class="container">
        <span class="be-eyebrow">Reading the roof by its era</span>
        <h2 id="be-rail-title">A hundred years of building, and what each era means for your roof</h2>
        <p class="be-lead">Bellaire's history is written in its rooflines. Knowing roughly when a house was built tells us what to look for before we ever set a ladder.</p>

        <div class="be-rail">
            <ol>
                <li class="be-era" data-animate data-dir="down">
                    <span class="be-era__dot" aria-hidden="true"></span>
                    <span class="be-era__year">1908</span>
                    <div class="be-era__card">
                        <h3>Platted as a residential town</h3>
                        <p>William Wright Baldwin laid out Bellaire as a quiet residential and farming community southwest of Houston. A handful of early homes survive, most of them reworked many times since.</p>
                        <div class="be-era__roof"><?php echo icon('search', 16); ?> Layers of old repairs — we strip to the decking and start clean.</div>
                    </div>
                </li>
                <li class="be-era" data-animate data-dir="down">
                    <span class="be-era__dot" aria-hidden="true"></span>
                    <span class="be-era__year">1950s</span>
                    <div class="be-era__card">
                        <h3>The post-war boom</h3>
                        <p>Hemmed in by Houston's 1948 annexation, the city filled in quickly with one-story ranches and bungalows. These are the original "City of Homes" houses.</p>
                        <div class="be-era__roof"><?php echo icon('wind', 16); ?> Low hips, tired decking, too little <a href="/services/attic-venting/">attic ventilation</a>.</div>
                    </div>
                </li>
                <li class="be-era" data-animate data-dir="down">
                    <span class="be-era__dot" aria-hidden="true"></span>
                    <span class="be-era__year">2017</span>
                    <div class="be-era__card">
                        <h3>Hurricane Harvey</h3>
                        <p>Floodwater entered more than 2,000 homes in the city. The rebuild that followed replaced a wave of older houses with new construction.</p>
                        <div class="be-era__roof"><?php echo icon('check-circle', 16); ?> Newer roofs — but wind and hail still strike them. Free inspections after every storm.</div>
                    </div>
                </li>
                <li class="be-era" data-animate data-dir="down">
                    <span class="be-era__dot" aria-hidden="true"></span>
                    <span class="be-era__year">Today</span>
                    <div class="be-era__card">
                        <h3>Teardowns and two-story builds</h3>
                        <p>Lot by lot, ranches give way to larger two-story homes with steep, complex roofs. Flashing, valleys and dormers carry the risk now.</p>
                        <div class="be-era__roof"><?php echo icon('hammer', 16); ?> Architectural shingle or standing-seam metal, detailed right the first time.</div>
                    </div>
                </li>
            </ol>
        </div>

        <div class="be-rail__photos">
            <figure class="be-rail__photo" data-animate data-dir="left">
                <?php echo areaPhoto('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, '(max-width: 640px) 100vw, 50vw'); ?>
                <span>The ranch</span>
            </figure>
            <figure class="be-rail__photo" data-animate data-dir="right">
                <?php echo areaPhoto('roof-two-story', 'Two-story brick home during a roof replacement', 1200, 1600, '(max-width: 640px) 100vw, 50vw'); ?>
                <span>The two-story</span>
            </figure>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="be-section" aria-labelledby="be-svc-title">
    <div class="container">
        <span class="be-eyebrow">Beyond the roof</span>
        <h2 id="be-svc-title">Roofing, siding, gutters, patio covers and fences for Bellaire homes</h2>
        <p class="be-lead"><?php echo htmlspecialchars($shortName); ?> handles the whole exterior, so a roof project can include the gutters, fascia and the fence line in one written estimate and one crew.</p>

        <div class="be-mosaic">
            <a class="be-tile be-tile--wide" href="/services/roof-replacement/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('home', 22); ?></span><strong>Roof Replacement</strong><span>Architectural shingle and metal, full tear-off, decking repair, new underlayment and flashing.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile be-tile--wide" href="/services/roof-repair/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('wrench', 22); ?></span><strong>Roof Repair</strong><span>Leaks, flashing, pipe boots and wood rot — fixed at the source, not where the stain shows.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile" href="/services/roof-inspection/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('search', 22); ?></span><strong>Roof Inspection</strong><span>Free, photo-documented, with a written estimate.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile" href="/services/storm-damage-repair/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('wind', 22); ?></span><strong>Storm &amp; Wind Damage</strong><span>Hail, wind and hurricane repair. Ask about temporary tarping.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile" href="/services/roof-damage-repair/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('hammer', 22); ?></span><strong>Roof Damage Repair</strong><span>Aging decking, failed flashing and worn shingles.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile" href="/services/siding-fascia-soffit/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('ruler', 22); ?></span><strong>Siding, Fascia &amp; Soffit</strong><span>Hardie and vinyl siding, wood-rot repair, exterior paint.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile" href="/services/gutter-installation/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('droplets', 22); ?></span><strong>Gutters</strong><span>New gutters and downspouts that carry water off the slab.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile" href="/services/patio-covers-decks/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('hammer', 22); ?></span><strong>Patio Covers, Pergolas &amp; Decks</strong><span>Covered and screened patios, pergolas, wood decks.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile be-tile--wide" href="/services/fences-gates/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('shield', 22); ?></span><strong>Fences &amp; Gates</strong><span>Cedar and pine privacy fences and custom gates for tight inside-the-Loop lots.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="be-tile be-tile--wide" href="/services/attic-venting/" data-animate data-dir="scale"><span class="be-tile__icon"><?php echo icon('wind', 22); ?></span><strong>Attic Venting</strong><span>Balanced intake and exhaust for older ranches that were never vented properly.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
        </div>

        <p class="be-vent">
            One thing we tell every homeowner: shingle manufacturers can void or limit the shingle warranty when the attic is not
            properly ventilated. On an older ranch home that is the rule, not the exception, which is why
            <a href="/services/attic-venting/">attic venting</a> is part of the conversation on nearly every roof we replace.
        </p>
    </div>
</section>

<div class="be-divider be-divider--steps" aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none"><polygon points="0,56 0,40 360,40 360,24 720,24 720,8 1080,8 1080,0 1440,0 1440,56"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="be-section be-section--dark" aria-labelledby="be-claims-title">
    <div class="container">
        <div class="be-claims">
            <div data-animate data-dir="left">
                <span class="be-eyebrow">Hail &amp; wind claims</span>
                <h2 id="be-claims-title">We document the damage and walk the claim with you</h2>
                <p>
                    Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience to every storm job.
                    We know what an adjuster needs to see on a roof, we know what the policy language means, and we take the stress of
                    the process off your plate.
                </p>
                <p class="be-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. Our job is to make sure the damage is documented properly and that you understand your options before you sign anything.</p>
            </div>
            <ol class="be-steps" data-animate data-dir="right">
                <li><div><strong>Photograph everything</strong>Every slope, every strike, every lifted shingle — before anything is touched.</div></li>
                <li><div><strong>Meet the adjuster on the roof</strong>At your home, together, so nothing is missed or misread.</div></li>
                <li><div><strong>Explain the policy in plain English</strong>Deductible, depreciation and scope, without the jargon.</div></li>
                <li><div><strong>Do the work as agreed</strong>Owner on site, landscaping covered, magnet sweep and full cleanup.</div></li>
            </ol>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="be-section be-section--alt" aria-labelledby="be-reviews-title">
    <div class="container">
        <span class="be-eyebrow">From our customers</span>
        <h2 id="be-reviews-title">What homeowners across Greater Houston say about Triple G</h2>
        <p class="be-lead">Real reviews from homeowners across Greater Houston, published by the client with first name and city.</p>
        <div class="be-reviews">
            <?php foreach ($cityReviews as $i => $r): ?>
            <article class="be-review" data-animate data-dir="<?php echo ['left', 'down', 'right'][$i % 3]; ?>">
                <div class="be-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer><?php echo htmlspecialchars($r['name']); ?> <span>· <?php echo htmlspecialchars($r['city']); ?></span></footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="be-section" aria-labelledby="be-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="be-eyebrow">Common questions</span>
            <h2 id="be-faq-title">Straight answers before you call</h2>
        </div>
        <div class="be-faq" data-animate data-dir="scale">
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
<section class="be-section be-section--alt" aria-labelledby="be-nearby-title">
    <div class="container">
        <span class="be-eyebrow">Nearby communities</span>
        <h2 id="be-nearby-title">West U, Southside Place and the rest of the inner Loop</h2>
        <p class="be-lead">Bellaire shares its borders with West University Place, Southside Place and Houston, with the Memorial villages a short drive up the West Loop. We cover more than 50 Greater Houston communities in all.</p>
        <div class="be-nearby">
            <?php foreach ($nearbyCities as $c):
                $slug = getAreaSlug($c);
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/service-areas/' . $slug . '/index.php')): ?>
            <a href="/service-areas/<?php echo $slug; ?>/"><?php echo htmlspecialchars($c); ?>, TX <?php echo icon('arrow-up', 18); ?></a>
            <?php else: ?>
            <span><?php echo htmlspecialchars($c); ?>, TX</span>
            <?php endif; endforeach; ?>
        </div>
        <div class="be-chips">
            <?php foreach (['Hunters Creek Village', 'Hedwig Village', 'Bunker Hill Village', 'Piney Point Village', 'Brookside Village', 'South Houston', 'Cypress'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="be-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="be-cta" aria-labelledby="be-cta-title">
    <div class="container">
        <div class="be-cta__grid">
            <div>
                <h2 id="be-cta-title">Ranch or new build — get a free roof inspection in Bellaire</h2>
                <p>Call and we'll come take a look. Photos of what we find, a written estimate, and no pressure — the same way this father-and-son team has worked since 1973.</p>
            </div>
            <div class="be-ctas">
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
    "name": "Roofing & Exterior Contractor in <?php echo htmlspecialchars($areaName); ?>, TX",
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
