<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'The Woodlands';
$pageTitle = 'Roof & Storm Repair in The Woodlands, TX | Triple G Roofing';
$pageDescription = 'Roof replacement, storm repair, gutters and siding in The Woodlands, TX from a father-and-son team in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/' . getAreaSlug($areaName) . '/';
$ogImage = 'roof-large-home-960.webp';

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

/* Real review from this community (Connie) + two more storm-claim reviews from nearby Greater Houston communities */
$cityReviews = array_values(array_filter($testimonials, fn($t) => $t['city'] === $areaName . ', TX'));
$moreReviews = array_values(array_filter(getTestimonialsFor('storm-damage-repair', 6), fn($t) => $t['city'] !== $areaName . ', TX'));
$moreReviews = array_slice($moreReviews, 0, 2);

/* Nine villages, oldest to newest (Grogan's Mill opened 1974; Creekside Park opened Oct 2007) */
$villages = [
    ['Grogan\'s Mill', 'The first village — opened 1974'],
    ['Panther Creek', 'Lake Woodlands shoreline'],
    ['Cochran\'s Crossing', 'Central, mature canopy'],
    ['Indian Springs', 'Along Woodlands Parkway'],
    ['Alden Bridge', 'West side, 1990s build-out'],
    ['Sterling Ridge', '2000s build-out'],
    ['College Park', 'North, near the campus'],
    ['Carlton Woods', 'Gated, estate lots'],
    ['Creekside Park', 'Harris County side — opened 2007'],
];

/* Service grid: slug => [icon, one-line blurb] — links every service page */
$svcMeta = [
    'roof-replacement'     => ['home', 'Architectural shingle and metal — tear-off, decking, underlayment'],
    'roof-repair'          => ['wrench', 'Leaks, flashing, pipe boots, limb strikes'],
    'roof-inspection'      => ['search', 'Free, photo-documented, written estimate'],
    'storm-damage-repair'  => ['wind', 'Hail, wind and hurricane damage, documented for your claim'],
    'roof-damage-repair'   => ['hammer', 'Aging and compromised roofs brought back'],
    'attic-venting'        => ['arrow-up', 'Balanced intake and exhaust in shaded, humid attics'],
    'gutter-installation'  => ['droplets', 'Gutters sized for pine straw, with downspouts placed right'],
    'siding-fascia-soffit' => ['ruler', 'Hardie and vinyl siding, fascia and soffit, wood-rot repair'],
    'patio-covers-decks'   => ['hard-hat', 'Patio covers, screened patios, pergolas, wood decks'],
    'fences-gates'         => ['shield', 'Cedar and pine privacy fences, ranch rail, custom gates'],
];

$areaFaqs = [
    [
        'q' => 'Do I need approval before replacing my roof in The Woodlands?',
        'a' => 'In most cases, yes. The Woodlands Township\'s covenants require prior written approval from your village\'s Residential Design Review Committee for roof replacements and for changes to exterior materials or colors. Triple G Roofing & Construction helps with the paperwork — photos, material and color details, the written scope — but approval is the committee\'s decision, not ours, and the committee has its own review window. We do not start work until you have the approval in hand.',
    ],
    [
        'q' => 'How do pine trees affect a roof in The Woodlands?',
        'a' => 'Three ways. Pine straw and cones pile up in valleys and gutters, holding moisture against shingles and fascia. Shade keeps roofs damp longer, which feeds algae and moss. And limbs fall — a single limb strike can crack shingles and decking in a spot you cannot see from the ground. A free, photo-documented inspection from Triple G Roofing & Construction catches all three before they become leaks.',
    ],
    [
        'q' => 'Where is Triple G Roofing & Construction based, and do you really cover The Woodlands?',
        'a' => 'Triple G Roofing & Construction is a family-owned father-and-son team based in Humble, TX, in business since 1973. The Woodlands is one of more than 50 Greater Houston communities the company serves, from Conroe and Spring down to Baytown and Pasadena. The owner is on every job, and the inspection and written estimate are free.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix tw-
   Tokens only. Stacked-photo hero with offset frames and a
   vertical trust rail, village mosaic, canopy section,
   signature RDRC "approval path" stepper, services ledger,
   dark claims band, pull-quote review, FAQ, nearby, CTA.
   ========================================================== */

/* ---------- Page-scoped reveal directions (framework owns opacity + .animated) ---------- */
.tw-page [data-animate][data-dir="left"]  { transform: translateX(-32px); }
.tw-page [data-animate][data-dir="right"] { transform: translateX(32px); }
.tw-page [data-animate][data-dir="down"]  { transform: translateY(-28px); }
.tw-page [data-animate][data-dir="scale"] { transform: scale(0.94); }
.tw-page [data-animate][data-dir].animated { transform: none; }

/* ---------- Hero: text + two offset frames + trust rail ---------- */
.tw-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background: var(--color-dark-alt);
    padding: calc(var(--nav-height) + var(--space-10)) 0 0;
}

.tw-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(115deg, var(--color-dark) 0%, var(--color-dark) 48%, transparent 49%),
        linear-gradient(180deg, var(--color-dark-alt) 0%, var(--color-dark) 100%);
}

.tw-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.06;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.tw-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
    padding-bottom: var(--space-16);
}

.tw-crumbs {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    align-items: center;
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
    margin-bottom: var(--space-6);
}

.tw-crumbs a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.tw-crumbs a:hover { color: var(--color-accent); }
.tw-crumbs [aria-current] { color: var(--color-white); font-weight: 600; }

.tw-kicker {
    display: inline-block;
    padding: var(--space-2) var(--space-4);
    border: 1px solid color-mix(in srgb, var(--color-accent) 60%, transparent);
    color: var(--color-accent);
    border-radius: var(--radius-sm);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
}

.tw-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.2rem, 4.6vw, 3.6rem);
    line-height: 1.06;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.tw-hero h1 span { color: var(--color-accent); }

.tw-hero__lead {
    color: color-mix(in srgb, var(--color-white) 86%, transparent);
    font-size: clamp(1rem, 1.5vw, 1.15rem);
    line-height: 1.75;
    max-width: 58ch;
    margin-bottom: var(--space-8);
}

.tw-hero__lead strong { color: var(--color-white); }

.tw-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); align-items: center; }
.tw-ctas .btn-lg { font-size: var(--font-size-base); }

/* Two offset frames */
.tw-stack {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-5);
    align-items: end;
}

.tw-frame {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    aspect-ratio: 3 / 4;
    background: var(--color-dark);
}

.tw-frame img { width: 100%; height: 100%; object-fit: cover; }

.tw-stack .tw-frame:first-child { margin-bottom: var(--space-16); border-radius: var(--radius-xl) var(--radius-xl) var(--radius-xl) 0; }
.tw-stack .tw-frame:last-child { border-radius: var(--radius-xl) 0 var(--radius-xl) var(--radius-xl); }

.tw-stack__tag {
    position: absolute;
    left: 50%;
    bottom: var(--space-6);
    transform: translateX(-50%);
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

/* Trust rail: four tiles sitting on the hero's bottom edge */
.tw-rail {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-top: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
}

.tw-rail__item {
    padding: var(--space-5) var(--space-4);
    color: color-mix(in srgb, var(--color-white) 75%, transparent);
    font-size: var(--font-size-sm);
    line-height: 1.4;
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-3);
    align-items: center;
    border-right: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
}

.tw-rail__item:last-child { border-right: 0; }
.tw-rail__item svg { color: var(--color-accent); }
.tw-rail__item strong { display: block; color: var(--color-white); font-family: var(--font-heading); }

/* ---------- Section scaffolding ---------- */
.tw-section { padding: var(--space-16) 0; position: relative; }
.tw-section--alt { background: var(--color-light); }
.tw-section--dark { background: var(--color-dark); color: var(--color-white); }

.tw-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.tw-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.tw-section h3 { text-wrap: balance; }
.tw-section--dark h2 { color: var(--color-white); }

.tw-subtitle {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}

.tw-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.tw-prose a { color: var(--color-primary); font-weight: 600; }
.tw-prose a:hover { text-decoration: underline; }
.tw-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.tw-center { text-align: center; }
.tw-center .tw-lead { margin: 0 auto; }

/* ---------- Villages: intro + nine-tile mosaic ---------- */
.tw-villages {
    display: grid;
    grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr);
    gap: var(--space-12);
    align-items: start;
}

.tw-mosaic {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-3);
}

.tw-tile {
    position: relative;
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    min-height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}

.tw-tile:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }

.tw-tile::before {
    content: attr(data-n);
    position: absolute;
    top: var(--space-3);
    right: var(--space-4);
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-xs);
    color: var(--color-gray);
    letter-spacing: 0.08em;
}

.tw-tile:nth-child(3n+1) { background: color-mix(in srgb, var(--color-accent) 16%, var(--color-white)); }
.tw-tile:nth-child(3n+2) { background: color-mix(in srgb, var(--color-primary) 8%, var(--color-white)); }
.tw-tile:nth-child(3n) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.tw-tile strong { font-family: var(--font-heading); color: var(--color-dark); display: block; margin-bottom: 2px; }
.tw-tile span { font-size: var(--font-size-xs); color: var(--color-gray-dark); line-height: 1.4; }

.tw-villages__note {
    margin-top: var(--space-4);
    font-size: var(--font-size-sm);
    color: var(--color-gray);
    line-height: 1.6;
}

/* ---------- Canopy: three problem cards over a photo column ---------- */
.tw-canopy {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1.2fr);
    gap: var(--space-12);
    align-items: center;
}

.tw-canopy__photo {
    aspect-ratio: 4 / 5;
    overflow: hidden;
    border-radius: 120px var(--radius-xl) 120px var(--radius-xl);
    box-shadow: var(--shadow-card);
    max-width: 460px;
}

.tw-canopy__photo img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.tw-canopy__photo:hover img { transform: scale(1.04); }

.tw-problems { display: grid; gap: var(--space-4); margin-top: var(--space-6); }

.tw-problem {
    display: grid;
    grid-template-columns: 52px 1fr;
    gap: var(--space-4);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
}

.tw-problem__icon {
    width: 52px;
    height: 52px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-dark);
    color: var(--color-accent);
}

.tw-problem:nth-child(2) .tw-problem__icon { background: var(--color-primary); color: var(--color-white); }
.tw-problem:nth-child(3) .tw-problem__icon { background: var(--color-accent); color: var(--color-dark); }
.tw-problem strong { display: block; font-family: var(--font-heading); color: var(--color-dark); margin-bottom: var(--space-1); }
.tw-problem p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; }
.tw-problem a { color: var(--color-primary); font-weight: 600; }

/* ---------- Signature: the approval path (horizontal stepper) ---------- */
.tw-path {
    position: relative;
    margin-top: var(--space-10);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-5);
    counter-reset: pathstep;
}

.tw-path::before {
    content: '';
    position: absolute;
    top: 34px;
    left: 12%;
    right: 12%;
    height: 3px;
    background: linear-gradient(90deg, var(--color-accent) 0%, var(--color-primary) 60%, var(--color-dark) 100%);
    border-radius: var(--radius-full);
}

.tw-step {
    position: relative;
    counter-increment: pathstep;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-16) var(--space-5) var(--space-6);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    transition: transform var(--transition-base);
}

.tw-step:hover { transform: translateY(-4px); }

.tw-step::before {
    content: counter(pathstep);
    position: absolute;
    top: var(--space-4);
    left: var(--space-5);
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    font-family: var(--font-heading);
    font-weight: 800;
    background: var(--color-accent);
    color: var(--color-dark);
    border: 4px solid var(--color-light);
    box-shadow: var(--shadow-sm);
}

.tw-step:nth-child(2)::before { background: var(--color-primary); color: var(--color-white); }
.tw-step:nth-child(3)::before { background: var(--color-dark); color: var(--color-white); }
.tw-step:nth-child(4)::before { background: var(--color-dark-alt); color: var(--color-white); }

.tw-step--theirs { border-style: dashed; border-color: color-mix(in srgb, var(--color-dark) 35%, var(--color-border)); background: color-mix(in srgb, var(--color-dark) 3%, var(--color-white)); }

.tw-step__who {
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-2);
}

.tw-step--theirs .tw-step__who { color: var(--color-dark); }
.tw-step h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.tw-step p { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; margin: 0; }

.tw-path__note {
    margin: var(--space-8) auto 0;
    max-width: 760px;
    padding: var(--space-4) var(--space-6);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border-left: 4px solid var(--color-accent);
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    line-height: 1.65;
}

/* ---------- Services ledger: two columns of rows ---------- */
.tw-ledger {
    margin-top: var(--space-8);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0 var(--space-12);
    list-style: none;
    padding: 0;
}

.tw-ledger a {
    display: grid;
    grid-template-columns: 40px 1fr auto;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-4) 0;
    border-bottom: 1px solid var(--color-border);
    color: var(--color-dark);
    transition: padding-left var(--transition-fast), color var(--transition-fast);
}

.tw-ledger a:hover { padding-left: var(--space-2); color: var(--color-primary); }
.tw-ledger__icon { color: var(--color-primary); }
.tw-ledger li:nth-child(even) .tw-ledger__icon { color: var(--color-accent); }
.tw-ledger strong { display: block; font-family: var(--font-heading); }
.tw-ledger small { color: var(--color-gray); font-size: var(--font-size-xs); line-height: 1.4; display: block; }
.tw-ledger__arrow { color: var(--color-gray-light); transform: rotate(45deg); transition: color var(--transition-fast); }
.tw-ledger a:hover .tw-ledger__arrow { color: var(--color-primary); }

.tw-services__intro {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-8);
    align-items: end;
}

.tw-services__intro .tw-lead { margin: 0; }
.tw-services__intro .tw-lead a { color: var(--color-primary); font-weight: 600; }

/* ---------- Claims band (dark) ---------- */
.tw-claims {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
}

.tw-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 58ch; }

.tw-claims__list { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; gap: var(--space-3); }

.tw-claims__list li {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-3);
    align-items: start;
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    font-size: var(--font-size-sm);
    line-height: 1.55;
}

.tw-claims__list svg { color: var(--color-accent); margin-top: 2px; }
.tw-claims__list strong { color: var(--color-white); font-family: var(--font-heading); }
.tw-claims__list a { color: var(--color-accent); font-weight: 600; }

.tw-claims__note {
    margin-top: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 75%, transparent);
    border-left: 3px solid var(--color-accent);
    padding-left: var(--space-4);
}

.tw-claims__photo {
    aspect-ratio: 4 / 5;
    max-width: 440px;
    margin: 0 auto;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    border: 6px solid color-mix(in srgb, var(--color-white) 8%, transparent);
}

.tw-claims__photo img { width: 100%; height: 100%; object-fit: cover; }

/* ---------- Reviews: one pull-quote + two small cards ---------- */
.tw-quote {
    margin-top: var(--space-8);
    display: grid;
    grid-template-columns: minmax(0, 1.3fr) minmax(0, 0.7fr);
    gap: var(--space-8);
    align-items: stretch;
}

.tw-quote__main {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-10) var(--space-10) var(--space-8);
    box-shadow: var(--shadow-card);
    border-top: 6px solid var(--color-accent);
}

.tw-quote__main::before {
    content: '\201C';
    position: absolute;
    top: var(--space-2);
    left: var(--space-6);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-primary) 30%, transparent);
}

.tw-quote__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-4); }
.tw-quote__main blockquote { margin: 0 0 var(--space-6); font-family: var(--font-heading); font-size: clamp(1.2rem, 2vw, 1.6rem); line-height: 1.45; color: var(--color-dark); text-wrap: balance; }
.tw-quote__main footer { font-family: var(--font-heading); font-size: var(--font-size-sm); display: flex; align-items: center; gap: var(--space-3); }
.tw-quote__main footer span { color: var(--color-gray); font-weight: 400; }

.tw-avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
    font-weight: 700;
}

.tw-quote__side { display: grid; gap: var(--space-5); }

.tw-mini {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-5);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
}

.tw-mini__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-2); }
.tw-mini p { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; margin-bottom: var(--space-3); flex: 1; }
.tw-mini footer { font-family: var(--font-heading); font-size: var(--font-size-xs); color: var(--color-dark); }
.tw-mini footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.tw-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }

.tw-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    border-left: 4px solid var(--color-accent);
}

.tw-faq details:nth-child(2) { border-left-color: var(--color-primary); }
.tw-faq details:nth-child(3) { border-left-color: var(--color-dark); }
.tw-faq details[open] { box-shadow: var(--shadow-md); }

.tw-faq summary {
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

.tw-faq summary::-webkit-details-marker { display: none; }
.tw-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.tw-faq details[open] summary svg { transform: rotate(45deg); }
.tw-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.tw-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.tw-nearby a {
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

.tw-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.tw-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.tw-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.tw-chips span, .tw-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.tw-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }

.tw-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers (two styles: treeline zig-zag + arc) ---------- */
.tw-divider { line-height: 0; display: block; }
.tw-divider svg { width: 100%; height: 48px; display: block; }
.tw-divider--zig { background: var(--color-light); }
.tw-divider--zig svg { fill: var(--color-white); }
.tw-divider--arc { background: var(--color-light); }
.tw-divider--arc svg { fill: var(--color-dark); }
.tw-divider--arc-out { background: var(--color-dark); }
.tw-divider--arc-out svg { fill: var(--color-white); }

/* ---------- CTA ---------- */
.tw-cta {
    position: relative;
    overflow: hidden;
    background: linear-gradient(100deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
    padding: var(--space-16) 0;
    isolation: isolate;
}

.tw-cta::after {
    content: '';
    position: absolute;
    top: -30%;
    right: -5%;
    width: 38%;
    aspect-ratio: 1;
    border-radius: var(--radius-full);
    border: 40px solid color-mix(in srgb, var(--color-white) 8%, transparent);
    z-index: -1;
}

.tw-cta__inner { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.tw-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.tw-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .tw-hero::before { background: linear-gradient(180deg, var(--color-dark-alt) 0%, var(--color-dark) 100%); }
    .tw-hero__grid { grid-template-columns: 1fr; }
    .tw-stack { max-width: 520px; }
    .tw-rail { grid-template-columns: 1fr 1fr; }
    .tw-rail__item:nth-child(2) { border-right: 0; }
    .tw-rail__item:nth-child(-n+2) { border-bottom: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent); }
    .tw-villages { grid-template-columns: 1fr; }
    .tw-canopy { grid-template-columns: 1fr; }
    .tw-path { grid-template-columns: 1fr 1fr; }
    .tw-path::before { display: none; }
    .tw-ledger { grid-template-columns: 1fr; }
    .tw-services__intro { grid-template-columns: 1fr; }
    .tw-claims { grid-template-columns: 1fr; }
    .tw-quote { grid-template-columns: 1fr; }
    .tw-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .tw-hero { padding-top: calc(var(--nav-height) + var(--space-6)); }
    .tw-ctas .btn { width: 100%; justify-content: center; }
    .tw-stack { grid-template-columns: 1fr; }
    .tw-stack .tw-frame:first-child { margin-bottom: 0; }
    .tw-stack .tw-frame:last-child { display: none; }
    .tw-rail { grid-template-columns: 1fr; }
    .tw-rail__item { border-right: 0; border-bottom: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent); }
    .tw-rail__item:last-child { border-bottom: 0; }
    .tw-mosaic { grid-template-columns: 1fr 1fr; }
    .tw-path { grid-template-columns: 1fr; }
    .tw-quote__main { padding: var(--space-8) var(--space-6) var(--space-6); }
    .tw-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .tw-tile, .tw-step, .tw-canopy__photo img, .tw-ledger a, .tw-nearby a { transition: none; }
}
</style>

<div class="tw-page">

<!-- ===================== HERO ===================== -->
<section class="tw-hero" aria-labelledby="tw-title">
    <div class="container">
        <div class="tw-hero__grid">
            <div>
                <nav class="tw-crumbs" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="tw-kicker">Under the pines since the pines were younger</span>

                <h1 id="tw-title">Roofing &amp; Storm Repair in <span>The Woodlands</span>, TX — Built for Life Under the Canopy</h1>

                <p class="tw-hero__lead">
                    <strong>The Woodlands is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a
                    family-owned father-and-son team based in Humble, TX, in business since 1973.</strong> Roof replacement and repair,
                    storm damage, gutters, siding, patio covers, decks and fences — and help with the township paperwork before a shingle
                    is touched. Free inspection, free written estimate.
                </p>

                <div class="tw-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Schedule a Free Inspection</a>
                </div>
            </div>

            <div class="tw-stack">
                <div class="tw-frame">
                    <?php echo areaPhoto('roof-large-home', 'Large two-story brick home with a completed roof replacement', 1200, 1600, '(max-width: 640px) 90vw, (max-width: 1024px) 250px, 22vw', true); ?>
                </div>
                <div class="tw-frame">
                    <?php echo areaPhoto('crew-underlayment', 'Triple G roofers installing synthetic underlayment on a steep roof', 1200, 1600, '(max-width: 1024px) 250px, 22vw'); ?>
                </div>
                <span class="tw-stack__tag">The owner is on every job</span>
            </div>
        </div>

        <div class="tw-rail" role="note" aria-label="Why homeowners call Triple G">
            <div class="tw-rail__item"><?php echo icon('clock', 22); ?><div><strong>Since 1973</strong>Serving the Greater Houston area</div></div>
            <div class="tw-rail__item"><?php echo icon('award', 22); ?><div><strong>Nextdoor Favorite</strong>Voted 2022, 2023 and 2024</div></div>
            <div class="tw-rail__item"><?php echo icon('search', 22); ?><div><strong>Free inspections</strong>Photo-documented, written estimate</div></div>
            <div class="tw-rail__item"><?php echo icon('home', 22); ?><div><strong>Father &amp; son</strong>Glenn and Tim Menn, family owned</div></div>
        </div>
    </div>
</section>

<!-- ===================== VILLAGES ===================== -->
<section class="tw-section" aria-labelledby="tw-villages-title">
    <div class="container">
        <div class="tw-villages">
            <div class="tw-prose">
                <span class="tw-eyebrow">Nine villages, fifty years of roofs</span>
                <h2 id="tw-villages-title">The Woodlands was planned village by village — and the roofs aged the same way</h2>
                <p class="tw-subtitle">Grogan's Mill opened in 1974, one year after we did.</p>
                <p>
                    When George Mitchell opened The Woodlands in 1974, fewer than 40 families lived in Settler's Corner in the Village of
                    Grogan's Mill. Today there are nine villages, and each one was built out in its own era. That matters for a roof: the
                    1970s and 80s homes of Grogan's Mill and Panther Creek around Lake Woodlands have been re-roofed before and often carry
                    old flashing and undersized ventilation, while Alden Bridge and Sterling Ridge homes from the 1990s and 2000s are hitting
                    the age where builder-grade shingles start giving up all at once.
                </p>
                <p>
                    Creekside Park, opened in 2007, is the outlier — it sits south of Spring Creek in Harris County and in Tomball ISD rather
                    than Conroe ISD, which serves the rest of The Woodlands. Its roofs are the youngest, but the pine canopy is the same, and
                    a canopy is the thing that sets a roof here apart from one in Humble or Baytown.
                </p>
                <p>
                    Need <strong>roof replacement near me in The Woodlands</strong>? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>.
                    Tim comes out himself, photographs every slope, and writes the estimate before anyone talks about a contract.
                </p>
            </div>

            <div>
                <div class="tw-mosaic">
                    <?php foreach ($villages as $i => $v): ?>
                    <div class="tw-tile" data-n="<?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>" data-animate data-dir="<?php echo ['left', 'down', 'right'][$i % 3]; ?>">
                        <strong><?php echo htmlspecialchars($v[0]); ?></strong>
                        <span><?php echo htmlspecialchars($v[1]); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <p class="tw-villages__note">We work in all nine villages, plus Shenandoah and Oak Ridge North next door. Lake Woodlands — 200 acres, dug in 1984 and filled in 1985 — sits in the middle of it all.</p>
            </div>
        </div>
    </div>
</section>

<div class="tw-divider tw-divider--zig" aria-hidden="true">
    <svg viewBox="0 0 1440 48" preserveAspectRatio="none"><polygon points="0,0 1440,0 1440,12 1380,48 1320,12 1260,48 1200,12 1140,48 1080,12 1020,48 960,12 900,48 840,12 780,48 720,12 660,48 600,12 540,48 480,12 420,48 360,12 300,48 240,12 180,48 120,12 60,48 0,12"/></svg>
</div>

<!-- ===================== CANOPY ===================== -->
<section class="tw-section tw-section--alt" aria-labelledby="tw-canopy-title">
    <div class="container">
        <div class="tw-canopy">
            <div class="tw-canopy__photo" data-animate data-dir="scale">
                <?php echo areaPhoto('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, '(max-width: 1024px) 460px, 36vw'); ?>
            </div>
            <div>
                <span class="tw-eyebrow">What the pines do to a roof</span>
                <h2 id="tw-canopy-title">Shade, straw and limbs: the three problems we find on almost every roof in The Woodlands</h2>
                <p class="tw-lead">The trees are the reason people move here. They are also the reason a roof here needs a closer look than one in the open.</p>
                <div class="tw-problems">
                    <div class="tw-problem" data-animate data-dir="right">
                        <span class="tw-problem__icon"><?php echo icon('droplets', 22); ?></span>
                        <div><strong>Pine straw in the valleys and gutters</strong><p>Needles mat in valleys and hold water against the shingles; gutters fill and overflow behind the fascia. We clear, check the fascia for rot, and size <a href="/services/gutter-installation/">gutters and downspouts</a> for the debris load.</p></div>
                    </div>
                    <div class="tw-problem" data-animate data-dir="right">
                        <span class="tw-problem__icon"><?php echo icon('wind', 22); ?></span>
                        <div><strong>Limb strikes you can't see from the ground</strong><p>One falling limb can crack shingles and the decking under them without leaving an obvious mark. Our <a href="/services/roof-inspection/">free inspection</a> walks every slope with a camera so you see what we see.</p></div>
                    </div>
                    <div class="tw-problem" data-animate data-dir="right">
                        <span class="tw-problem__icon"><?php echo icon('home', 22); ?></span>
                        <div><strong>Shade, moisture and a hot, damp attic</strong><p>Shaded roofs stay wet and grow algae and moss; shaded attics still run hot and humid. Shingle manufacturers can void the shingle warranty without proper <a href="/services/attic-venting/">attic ventilation</a>, so balanced intake and exhaust is part of every estimate.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== SIGNATURE: THE APPROVAL PATH ===================== -->
<section class="tw-section tw-section--alt" aria-labelledby="tw-path-title">
    <div class="container">
        <div class="tw-center">
            <span class="tw-eyebrow">Township covenants</span>
            <h2 id="tw-path-title">The approval path for a new roof in The Woodlands</h2>
            <p class="tw-lead">Roof replacements and changes to exterior materials or colors need prior written approval from your village's Residential Design Review Committee. We help with the paperwork; the decision belongs to the committee.</p>
        </div>

        <div class="tw-path">
            <article class="tw-step" data-animate data-dir="left">
                <span class="tw-step__who">Us</span>
                <h3>Free inspection &amp; photos</h3>
                <p>We walk every slope, photograph what we find, and write a scope and estimate. If it's a repair, not a replacement, we say so.</p>
            </article>
            <article class="tw-step" data-animate data-dir="down">
                <span class="tw-step__who">Us, with you</span>
                <h3>Application packet</h3>
                <p>Shingle or metal product, color, and the written scope — assembled so your Covenant Administration application is complete the first time.</p>
            </article>
            <article class="tw-step tw-step--theirs" data-animate data-dir="down">
                <span class="tw-step__who">The committee</span>
                <h3>RDRC review</h3>
                <p>Your village's Residential Design Review Committee reviews the application on its own timeline and makes the call. We don't speak for them and we don't rush them.</p>
            </article>
            <article class="tw-step" data-animate data-dir="right">
                <span class="tw-step__who">Us</span>
                <h3>Install after approval</h3>
                <p>Tear-off, decking repair, underlayment, shingles, cleanup and a magnet nail sweep — with the owner on site, once the approval is in hand.</p>
            </article>
        </div>

        <p class="tw-path__note">The same goes for <a href="/services/siding-fascia-soffit/">siding and exterior paint</a>, <a href="/services/patio-covers-decks/">patio covers and decks</a> and <a href="/services/fences-gates/">fences</a>: if it changes the outside of the house, we help you ask first. Approval is the committee's and the township's decision, not ours.</p>
    </div>
</section>

<div class="tw-divider tw-divider--zig" aria-hidden="true">
    <svg viewBox="0 0 1440 48" preserveAspectRatio="none"><polygon points="0,0 1440,0 1440,12 1380,48 1320,12 1260,48 1200,12 1140,48 1080,12 1020,48 960,12 900,48 840,12 780,48 720,12 660,48 600,12 540,48 480,12 420,48 360,12 300,48 240,12 180,48 120,12 60,48 0,12"/></svg>
</div>

<!-- ===================== SERVICES LEDGER ===================== -->
<section class="tw-section" aria-labelledby="tw-svc-title">
    <div class="container">
        <div class="tw-services__intro">
            <div>
                <span class="tw-eyebrow">Roofing / Siding — it's on the yard sign</span>
                <h2 id="tw-svc-title">Everything on the outside of the house, from one family crew</h2>
            </div>
            <p class="tw-lead">
                Roofing is the core of it, but the same crew that replaces the roof builds the <a href="/services/patio-covers-decks/">pergola</a>,
                hangs the <a href="/services/gutter-installation/">gutters</a> and replaces the rotted <a href="/services/siding-fascia-soffit/">fascia</a>.
                Every service page below applies to The Woodlands.
            </p>
        </div>
        <ul class="tw-ledger">
            <?php foreach ($services as $i => $s): $m = $svcMeta[$s['slug']] ?? ['home', $s['description']]; ?>
            <li data-animate data-dir="<?php echo $i % 2 ? 'right' : 'left'; ?>">
                <a href="/services/<?php echo $s['slug']; ?>/">
                    <span class="tw-ledger__icon"><?php echo icon($m[0], 24); ?></span>
                    <span><strong><?php echo htmlspecialchars($s['name']); ?></strong><small><?php echo htmlspecialchars($m[1]); ?></small></span>
                    <span class="tw-ledger__arrow"><?php echo icon('arrow-up', 18); ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<div class="tw-divider tw-divider--arc" aria-hidden="true">
    <svg viewBox="0 0 1440 48" preserveAspectRatio="none"><path d="M0,48 C360,0 1080,0 1440,48 Z"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="tw-section tw-section--dark" aria-labelledby="tw-claims-title">
    <div class="container">
        <div class="tw-claims">
            <div class="tw-claims__photo" data-animate data-dir="left">
                <?php echo areaPhoto('roof-inspection-v2', 'Close-up of cracked and lifted shingles found during a roof inspection', 1200, 1600, '(max-width: 1024px) 440px, 34vw'); ?>
            </div>
            <div>
                <span class="tw-eyebrow">After the storm</span>
                <h2 id="tw-claims-title">More than 50 years of claims-handling experience — and a homeowner here who felt it</h2>
                <p>
                    A Woodlands homeowner wrote that we "found more damage and helped with the insurance claim" and that she "felt safe and
                    taken care of." That is the whole job: find everything, document everything, and walk you through the process from
                    beginning to end.
                </p>
                <ul class="tw-claims__list">
                    <li data-animate data-dir="right"><?php echo icon('search', 18); ?><div><strong>Document</strong> — photos of every slope and every strike before anything is touched.</div></li>
                    <li data-animate data-dir="right"><?php echo icon('hard-hat', 18); ?><div><strong>Meet the adjuster</strong> — on the roof with them so nothing gets missed.</div></li>
                    <li data-animate data-dir="right"><?php echo icon('check-circle', 18); ?><div><strong>Explain the policy</strong> — deductible, depreciation and scope in plain English.</div></li>
                    <li data-animate data-dir="right"><?php echo icon('home', 18); ?><div><strong>Repair as agreed</strong> — <a href="/services/storm-damage-repair/">storm and wind damage repair</a>, owner on site. Ask about temporary tarping.</div></li>
                </ul>
                <p class="tw-claims__note">Whether a claim is approved, and for how much, is the insurance carrier's decision. We make sure the damage is documented properly and you understand your options.</p>
            </div>
        </div>
    </div>
</section>

<div class="tw-divider tw-divider--arc-out" aria-hidden="true">
    <svg viewBox="0 0 1440 48" preserveAspectRatio="none"><path d="M0,0 C360,48 1080,48 1440,0 L1440,48 L0,48 Z"/></svg>
</div>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): $main = $cityReviews[0]; ?>
<section class="tw-section" aria-labelledby="tw-reviews-title">
    <div class="container">
        <span class="tw-eyebrow">From our neighbors</span>
        <h2 id="tw-reviews-title">What a Woodlands homeowner said — and two storm-claim neighbors nearby</h2>
        <p class="tw-lead">Real reviews, published by the client with first name and city.</p>
        <div class="tw-quote">
            <article class="tw-quote__main" data-animate data-dir="scale">
                <div class="tw-quote__stars" aria-label="Five star review"><?php for ($k = 0; $k < 5; $k++) { echo icon('star', 18); } ?></div>
                <blockquote><?php echo htmlspecialchars($main['text']); ?></blockquote>
                <footer>
                    <div class="tw-avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($main['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($main['name']); ?><br><span><?php echo htmlspecialchars($main['city']); ?></span></div>
                </footer>
            </article>
            <div class="tw-quote__side">
                <?php foreach ($moreReviews as $r): ?>
                <article class="tw-mini" data-animate data-dir="right">
                    <div class="tw-mini__stars" aria-label="Five star review"><?php for ($k = 0; $k < 5; $k++) { echo icon('star', 14); } ?></div>
                    <p><?php echo htmlspecialchars(mb_strlen($r['text']) > 260 ? rtrim(mb_substr($r['text'], 0, 257)) . '…' : $r['text']); ?></p>
                    <footer><?php echo htmlspecialchars($r['name']); ?> · <span><?php echo htmlspecialchars($r['city']); ?></span></footer>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="tw-section tw-section--alt" aria-labelledby="tw-faq-title">
    <div class="container">
        <div class="tw-center">
            <span class="tw-eyebrow">Common questions</span>
            <h2 id="tw-faq-title">Straight answers before you call</h2>
        </div>
        <div class="tw-faq">
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
<section class="tw-section" aria-labelledby="tw-nearby-title">
    <div class="container">
        <span class="tw-eyebrow">Nearby communities</span>
        <h2 id="tw-nearby-title">Up and down the I-45 corridor</h2>
        <p class="tw-lead">Conroe is just north, Spring is just south across the creek, and Shenandoah and Oak Ridge North sit right at the edge of the villages. We cover more than 50 Greater Houston communities in all.</p>
        <div class="tw-nearby">
            <a href="/service-areas/conroe/">Conroe, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/spring/">Spring, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="tw-chips">
            <?php foreach (['Shenandoah', 'Oak Ridge North', 'Pinehurst', 'Cypress', 'Porter', 'New Caney', 'Houston', 'Atascocita'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="tw-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="tw-cta" aria-labelledby="tw-cta-title">
    <div class="container">
        <div class="tw-cta__inner">
            <div>
                <h2 id="tw-cta-title">Free roof inspection in any of the nine villages</h2>
                <p>Photos of what we find, a written estimate, and help with the township paperwork. Roofing, siding, gutters, patio covers and fences from one family crew, since 1973.</p>
            </div>
            <div class="tw-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
            </div>
        </div>
    </div>
</section>

</div><!-- /.tw-page -->

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
