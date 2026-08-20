<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Baytown';
$pageTitle = 'Roof Replacement & Storm Repair in Baytown, TX | Triple G';
$pageDescription = 'Roof replacement, hail and hurricane repair, siding, gutters and fences for Baytown, TX — family-owned since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/baytown/';
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

/* Real reviews from this community — names + cities exactly as the client published them */
$pick = ['Keith', 'Lisa', 'Patrick'];
$cityReviews = array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Baytown, TX' && in_array($t['name'], $pick, true)));
usort($cityReviews, fn($a, $b) => array_search($a['name'], $pick) <=> array_search($b['name'], $pick));

$areaFaqs = [
    [
        'q' => 'Do you replace roofs on both sides of Cedar Bayou — Harris County and Chambers County?',
        'a' => 'Yes. Triple G Roofing & Construction works throughout Baytown, from the older Goose Creek and Pelly-era neighborhoods west of Cedar Bayou to the newer subdivisions east of it in Chambers County. We are based in Humble, TX and serve Baytown as one of more than 50 Greater Houston communities. The inspection and the written estimate are free.',
    ],
    [
        'q' => 'After a hail storm in Baytown, how do I know whether my roof needs an insurance claim?',
        'a' => 'Start with a free, photo-documented inspection. Hail bruises granules loose in a pattern you can see up close but rarely from the ground, and wind damage hides at ridge caps and shingle edges. We photograph every slope and show you the pictures. If the damage is real, we explain what a claim involves and meet the adjuster on the roof; whether the claim is approved, and for how much, is always the insurance carrier\'s decision.',
    ],
    [
        'q' => 'What else can Triple G do at my Baytown home besides the roof?',
        'a' => 'Siding, fascia and soffit, wood-rot repair, exterior paint, gutters and downspouts, patio covers, screened and enclosed patios, pergolas, wood decks, and cedar or pine privacy fences and gates. One crew, one written estimate, and the owner on every job.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix bt-
   Tokens only. Dark hero with diagonal clipped photo panel and
   cable-stay line motif, inline stat strip, local-context split
   with a two-county card, "two sides of Cedar Bayou" comparison
   (signature), yard-sign claims callout, stripe service cards,
   three real local reviews beside the owners' photo.
   ========================================================== */

/* ---------- Reveal directions (page-scoped modifiers on [data-animate]) ---------- */
[data-animate].bt-in-left { transform: translateX(-36px); }
[data-animate].bt-in-right { transform: translateX(36px); }
[data-animate].bt-in-down { transform: translateY(-28px); }
[data-animate].bt-in-left.animated,
[data-animate].bt-in-right.animated,
[data-animate].bt-in-down.animated { transform: none; }

/* ---------- Hero: dark, diagonal photo panel ---------- */
.bt-hero {
    position: relative;
    overflow: hidden;
    isolation: isolate;
    min-height: 72vh;
    display: flex;
    align-items: center;
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
    background: var(--color-dark);
    color: var(--color-white);
}

.bt-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(90deg, var(--color-dark) 0%, var(--color-dark) 45%, color-mix(in srgb, var(--color-dark) 55%, transparent) 70%, transparent 100%),
        linear-gradient(0deg, color-mix(in srgb, var(--color-primary) 18%, transparent) 0%, transparent 40%);
}

.bt-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.07;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.bt-hero__panel {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 58%;
    z-index: -3;
    clip-path: polygon(22% 0, 100% 0, 100% 100%, 0 100%);
}

.bt-hero__panel img { width: 100%; height: 100%; object-fit: cover; object-position: center 35%; }

.bt-hero__cables {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 58%;
    z-index: -1;
    pointer-events: none;
    opacity: 0.28;
    clip-path: polygon(22% 0, 100% 0, 100% 100%, 0 100%);
    background: repeating-linear-gradient(112deg, transparent 0 38px, color-mix(in srgb, var(--color-accent) 70%, transparent) 38px 39px);
}

.bt-hero__inner { max-width: 620px; position: relative; }

.bt-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.bt-breadcrumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.bt-breadcrumb a:hover { color: var(--color-accent); }
.bt-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.bt-hero__kicker {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    display: block;
    margin-bottom: var(--space-2);
}

.bt-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.3rem, 5vw, 3.9rem);
    line-height: 1.05;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.bt-hero h1 span { color: var(--color-accent); }

.bt-hero__answer {
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.18rem);
    line-height: 1.75;
    max-width: 58ch;
    margin-bottom: var(--space-8);
    padding-left: var(--space-5);
    border-left: 3px solid var(--color-primary);
}

.bt-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }

/* ---------- Stat strip ---------- */
.bt-stats {
    background: var(--color-white);
    border-bottom: 1px solid var(--color-border);
}

.bt-stats__row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-4) var(--space-8);
    padding: var(--space-5) 0;
}

.bt-stat { display: flex; align-items: baseline; gap: var(--space-3); }
.bt-stat strong { font-family: var(--font-heading); font-size: var(--font-size-3xl); line-height: 1; color: var(--color-primary); }
.bt-stat span { font-size: var(--font-size-sm); color: var(--color-gray-dark); max-width: 18ch; line-height: 1.3; }
.bt-stat + .bt-stat { padding-left: var(--space-8); border-left: 1px solid var(--color-border); }

/* ---------- Section scaffolding ---------- */
.bt-section { padding: var(--space-16) 0; }
.bt-section--alt { background: var(--color-light); }
.bt-section--dark { background: var(--color-dark-alt); color: var(--color-white); }

.bt-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-sm);
    background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white));
    margin-bottom: var(--space-4);
}

.bt-section--dark .bt-eyebrow { background: color-mix(in srgb, var(--color-white) 10%, transparent); color: var(--color-accent); }

.bt-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.bt-section--dark h2 { color: var(--color-white); }

.bt-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.bt-prose a { color: var(--color-primary); font-weight: 600; }
.bt-prose a:hover { text-decoration: underline; }
.bt-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.bt-section--dark .bt-lead { color: color-mix(in srgb, var(--color-white) 82%, transparent); }

/* ---------- Local context: prose + stacked figures + county card ---------- */
.bt-local {
    display: grid;
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
    gap: var(--space-12);
    align-items: start;
}

.bt-local__aside { display: grid; gap: var(--space-5); }

.bt-figure {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 4 / 5;
}

.bt-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.bt-figure:hover img { transform: scale(1.04); }

.bt-figure--short { aspect-ratio: 4 / 3; }

.bt-county {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-5);
    border-radius: var(--radius-xl);
    background: var(--color-dark);
    color: var(--color-white);
    box-shadow: var(--shadow-lg);
}

.bt-county strong { display: block; font-family: var(--font-heading); font-size: var(--font-size-lg); line-height: 1.2; }
.bt-county span { font-size: var(--font-size-xs); color: color-mix(in srgb, var(--color-white) 70%, transparent); }
.bt-county div:last-child { text-align: right; }

.bt-county__bayou {
    width: 3px;
    height: var(--space-12);
    border-radius: var(--radius-full);
    background: linear-gradient(180deg, var(--color-accent), var(--color-primary));
    position: relative;
}

.bt-county__bayou::after {
    content: 'Cedar Bayou';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%) rotate(-90deg);
    white-space: nowrap;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-accent);
    background: var(--color-dark);
    padding: 0 var(--space-2);
}

.bt-places { list-style: none; margin: var(--space-6) 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3); }

.bt-places li {
    display: grid;
    gap: var(--space-1);
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-top: 3px solid var(--color-accent);
    line-height: 1.55;
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
}

.bt-places li:nth-child(even) { border-top-color: var(--color-primary); }
.bt-places strong { color: var(--color-dark); font-family: var(--font-heading); }

/* ---------- Signature: two sides of Cedar Bayou ---------- */
.bt-sides {
    position: relative;
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
    gap: var(--space-8);
    margin-top: var(--space-10);
    align-items: stretch;
}

.bt-side {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    padding: var(--space-8);
    box-shadow: var(--shadow-card);
    position: relative;
    overflow: hidden;
}

.bt-side::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: var(--space-2);
    background: var(--color-accent);
}

.bt-side--east::before { background: var(--color-primary); }

.bt-side__tag {
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-gray);
    margin-bottom: var(--space-2);
}

.bt-side h3 { font-size: var(--font-size-2xl); margin-bottom: var(--space-3); text-wrap: balance; }
.bt-side > p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; margin-bottom: var(--space-5); }

.bt-side ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-3); }

.bt-side li {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-3);
    align-items: start;
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
    line-height: 1.6;
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-md);
    background: var(--color-light);
}

.bt-side li svg { color: var(--color-primary); margin-top: 2px; }
.bt-side--east li svg { color: var(--color-accent); }
.bt-side li strong { display: block; color: var(--color-dark); }

.bt-spine {
    display: grid;
    place-items: center;
    position: relative;
    width: var(--space-12);
}

.bt-spine::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 50%;
    width: 4px;
    transform: translateX(-50%);
    border-radius: var(--radius-full);
    background: repeating-linear-gradient(180deg, var(--color-accent) 0 18px, transparent 18px 28px);
    opacity: 0.6;
}

.bt-spine span {
    position: relative;
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--color-dark);
    background: var(--color-light);
    padding: var(--space-4) var(--space-2);
}

/* ---------- Claims: yard-sign callout + steps ---------- */
.bt-claims {
    display: grid;
    grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
    gap: var(--space-12);
    align-items: center;
}

.bt-sign {
    position: relative;
    margin: 0 auto;
    max-width: 420px;
    padding-bottom: var(--space-16);
}

.bt-sign__board {
    position: relative;
    background: var(--color-white);
    color: var(--color-dark);
    border: 6px solid var(--color-primary);
    border-radius: var(--radius-md);
    padding: var(--space-7) var(--space-6);
    box-shadow: var(--shadow-xl);
    transform: rotate(-1.5deg);
}

.bt-sign__board::before {
    content: '';
    position: absolute;
    inset: var(--space-2);
    border: 1px dashed color-mix(in srgb, var(--color-primary) 40%, transparent);
    border-radius: var(--radius-sm);
    pointer-events: none;
}

.bt-sign__board p { font-family: var(--font-heading); font-size: var(--font-size-lg); line-height: 1.45; margin-bottom: var(--space-4); text-wrap: balance; }
.bt-sign__board footer { font-size: var(--font-size-sm); color: var(--color-gray-dark); }
.bt-sign__board footer strong { color: var(--color-primary); }

.bt-sign__stake {
    position: absolute;
    left: 50%;
    bottom: 0;
    width: var(--space-3);
    height: var(--space-16);
    transform: translateX(-50%);
    background: linear-gradient(180deg, color-mix(in srgb, var(--color-white) 60%, transparent), color-mix(in srgb, var(--color-white) 15%, transparent));
    border-radius: 0 0 var(--radius-sm) var(--radius-sm);
}

.bt-steps { display: grid; gap: var(--space-4); margin-top: var(--space-6); }

.bt-step {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 7%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
}

.bt-step svg { color: var(--color-accent); margin-top: 2px; }
.bt-step strong { display: block; color: var(--color-white); font-family: var(--font-heading); margin-bottom: 2px; }
.bt-step span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); line-height: 1.55; }

.bt-claims__note {
    margin-top: var(--space-6);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 78%, transparent);
    border-left: 3px solid var(--color-accent);
    padding-left: var(--space-4);
    line-height: 1.65;
    max-width: 60ch;
}

/* ---------- Services: stripe cards ---------- */
.bt-svc-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-4);
    margin-top: var(--space-8);
}

.bt-svc {
    position: relative;
    display: grid;
    grid-template-columns: auto 1fr auto;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-5) var(--space-6) var(--space-5) var(--space-7);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    color: var(--color-dark);
    overflow: hidden;
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.bt-svc::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: var(--space-2);
    background: var(--color-accent);
}

.bt-svc:nth-child(3n+2)::before { background: var(--color-primary); }
.bt-svc:nth-child(3n)::before { background: var(--color-dark); }
.bt-svc:nth-child(4n+1) { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.bt-svc:nth-child(4n+3) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }

.bt-svc:hover { transform: translateX(6px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.bt-svc svg:first-child { color: var(--color-primary); }
.bt-svc strong { display: block; font-family: var(--font-heading); }
.bt-svc small { color: var(--color-gray); font-size: var(--font-size-xs); }
.bt-svc__go { color: var(--color-primary); transform: rotate(90deg); }

.bt-svc-head {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 0.7fr);
    gap: var(--space-10);
    align-items: end;
}

.bt-svc-head .bt-figure { aspect-ratio: 16 / 10; }

/* ---------- Reviews: three local reviews + owners photo ---------- */
.bt-reviews {
    display: grid;
    grid-template-columns: minmax(0, 0.8fr) minmax(0, 1.2fr);
    gap: var(--space-10);
    align-items: start;
    margin-top: var(--space-8);
}

.bt-reviews__photo { position: sticky; top: calc(var(--nav-height) + var(--space-6)); }
.bt-reviews__photo .bt-figure { aspect-ratio: 3 / 4; }

.bt-reviews__photo figcaption {
    margin-top: var(--space-3);
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
    line-height: 1.5;
}

.bt-reviews__list { display: grid; gap: var(--space-5); }

.bt-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6) var(--space-7);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    position: relative;
}

.bt-review:nth-child(2) { margin-left: var(--space-8); }
.bt-review:nth-child(3) { margin-left: var(--space-4); }

.bt-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.bt-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); }

.bt-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }

.bt-review__avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    background: var(--color-accent);
    color: var(--color-white);
    font-weight: 700;
}

.bt-review:nth-child(2) .bt-review__avatar { background: var(--color-primary); }
.bt-review:nth-child(3) .bt-review__avatar { background: var(--color-dark); }
.bt-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ: two columns ---------- */
.bt-faq { margin-top: var(--space-8); display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-4); align-items: start; }

.bt-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.bt-faq details:last-child { grid-column: 1 / -1; }
.bt-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.bt-faq summary {
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

.bt-faq summary::-webkit-details-marker { display: none; }
.bt-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.bt-faq details[open] summary svg { transform: rotate(45deg); }
.bt-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.bt-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.bt-nearby a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-dark);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-weight: 600;
    transition: background var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast);
}

.bt-nearby a:hover { background: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); }
.bt-nearby a svg { color: var(--color-accent); transform: rotate(45deg); }

.bt-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.bt-chips span, .bt-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.bt-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }

.bt-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers: slant + arcs ---------- */
.bt-divider { line-height: 0; display: block; }
.bt-divider svg { width: 100%; height: 52px; display: block; }
.bt-divider--slant { background: var(--color-light); }
.bt-divider--slant svg { fill: var(--color-dark-alt); }
.bt-divider--arcs { background: var(--color-white); }
.bt-divider--arcs svg { fill: var(--color-light); }

/* ---------- CTA ---------- */
.bt-cta {
    position: relative;
    overflow: hidden;
    background: linear-gradient(100deg, var(--color-dark) 0%, var(--color-dark-alt) 100%);
    padding: var(--space-16) 0;
}

.bt-cta::after {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(112deg, transparent 0 46px, color-mix(in srgb, var(--color-accent) 35%, transparent) 46px 47px);
    opacity: 0.25;
    pointer-events: none;
}

.bt-cta__inner { position: relative; z-index: 1; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.bt-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.bt-cta p { color: color-mix(in srgb, var(--color-white) 85%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .bt-hero__panel, .bt-hero__cables { width: 100%; clip-path: none; opacity: 0.35; }
    .bt-hero::before { background: linear-gradient(180deg, color-mix(in srgb, var(--color-dark) 85%, transparent), var(--color-dark)); }
    .bt-stat + .bt-stat { padding-left: 0; border-left: 0; }
    .bt-local { grid-template-columns: 1fr; }
    .bt-local__aside { grid-template-columns: 1fr 1fr; align-items: start; }
    .bt-county { grid-column: 1 / -1; }
    .bt-sides { grid-template-columns: 1fr; }
    .bt-spine { width: auto; height: var(--space-12); }
    .bt-spine::before { top: 50%; bottom: auto; left: 0; right: 0; width: auto; height: 4px; transform: translateY(-50%); background: repeating-linear-gradient(90deg, var(--color-accent) 0 18px, transparent 18px 28px); }
    .bt-spine span { writing-mode: horizontal-tb; transform: none; padding: var(--space-2) var(--space-4); }
    .bt-claims { grid-template-columns: 1fr; }
    .bt-svc-grid { grid-template-columns: 1fr; }
    .bt-svc-head { grid-template-columns: 1fr; }
    .bt-reviews { grid-template-columns: 1fr; }
    .bt-reviews__photo { position: static; max-width: 360px; }
    .bt-review:nth-child(2), .bt-review:nth-child(3) { margin-left: 0; }
    .bt-faq { grid-template-columns: 1fr; }
    .bt-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .bt-hero { min-height: 0; padding-top: calc(var(--nav-height) + var(--space-8)); }
    .bt-ctas .btn { width: 100%; justify-content: center; }
    .bt-stats__row { flex-direction: column; align-items: flex-start; }
    .bt-local__aside { grid-template-columns: 1fr; }
    .bt-places { grid-template-columns: 1fr; }
    .bt-side { padding: var(--space-6); }
    .bt-sign__board { transform: none; }
    .bt-section { padding: var(--space-12) 0; }
    .bt-svc { grid-template-columns: auto 1fr; }
    .bt-svc__go { display: none; }
}

@media (prefers-reduced-motion: reduce) {
    .bt-figure img, .bt-svc, .bt-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="bt-hero" aria-labelledby="bt-title">
    <div class="bt-hero__panel" aria-hidden="true">
        <?php echo areaPhoto('roof-large-home', 'Large two-story brick home with a completed roof replacement', 1200, 1600, '(max-width: 1024px) 100vw, 58vw', true); ?>
    </div>
    <span class="bt-hero__cables" aria-hidden="true"></span>
    <div class="container">
        <div class="bt-hero__inner">
            <nav class="bt-breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a><span>/</span>
                <a href="/service-areas/">Service Areas</a><span>/</span>
                <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
            </nav>

            <span class="bt-hero__kicker">Both sides of Cedar Bayou</span>
            <h1 id="bt-title">Roof Replacement &amp; Storm Repair in <span>Baytown</span>, TX</h1>

            <p class="bt-hero__answer">
                Baytown is one of more than 50 Greater Houston communities served by <?php echo htmlspecialchars($siteName); ?>, a
                family-owned father-and-son team based in Humble, TX, in business since 1973. Hail, wind and hurricane repair, full
                roof replacement, siding, gutters, patio covers and fences — with a free inspection and written estimate first.
            </p>

            <div class="bt-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
            </div>
        </div>
    </div>
</section>

<!-- ===================== STAT STRIP ===================== -->
<div class="bt-stats">
    <div class="container">
        <div class="bt-stats__row">
            <div class="bt-stat"><strong>1973</strong><span>Serving Greater Houston since</span></div>
            <div class="bt-stat"><strong>2</strong><span>Generations — Glenn &amp; Tim Menn</span></div>
            <div class="bt-stat"><strong>3×</strong><span>Nextdoor Neighborhood Favorite 2022–24</span></div>
            <div class="bt-stat"><strong>Free</strong><span>Inspections &amp; written estimates</span></div>
        </div>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="bt-section" aria-labelledby="bt-local-title">
    <div class="container">
        <div class="bt-local">
            <div class="bt-prose">
                <span class="bt-eyebrow">Refinery town, bay town</span>
                <h2 id="bt-local-title">Three towns that became one — and roofs from every decade since</h2>

                <p>
                    Baytown is really Goose Creek, Pelly and old Baytown, three rival towns that grew up around the Goose Creek oilfield
                    and the refinery and finally consolidated in 1948. You can still read that history in the housing: roughly three in
                    ten homes in Baytown were built between 1940 and 1969, most of them modest frame and brick houses in and around the
                    old downtown, while the median house dates to about 1981. East of Cedar Bayou, in the Chambers County part of town,
                    the subdivisions are newer and the roofs are steeper and more cut up.
                </p>
                <p>
                    Then there is the water. The ExxonMobil complex sprawls along the Houston Ship Channel on the city's south side; the
                    Fred Hartman Bridge carries SH 146 over the channel to La Porte; and the Baytown Nature Center sits on the peninsula
                    where the Brownwood subdivision once stood before subsidence and hurricanes took it. Carla, Alicia, Ike and Harvey
                    each hit Baytown hard. A roof here has to be built for wind first.
                </p>

                <ul class="bt-places">
                    <li><strong>Goose Creek &amp; old downtown</strong> 1940s–60s homes with low-slope additions, original flashing and decking that has seen several roofs.</li>
                    <li><strong>Country Club Oaks &amp; Eastpoint</strong> Established neighborhoods — branch abrasion, shaded-slope algae and clogged gutters wherever trees overhang the roof.</li>
                    <li><strong>East of Cedar Bayou (Chambers County)</strong> Newer subdivisions with complex roof lines, HOA palettes and builder-grade shingles meeting their first real storms.</li>
                    <li><strong>Goose Creek CISD families</strong> Roofs, fences and patio covers on the same estimate, scheduled around school mornings and shift work.</li>
                </ul>

                <p>
                    Looking for <strong>storm damage roof repair near me in Baytown</strong>? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>.
                    Tim comes out personally, photographs every slope and puts the findings in writing.
                </p>
            </div>

            <div class="bt-local__aside">
                <div data-animate class="bt-in-right">
                    <figure class="bt-figure">
                        <?php echo areaPhoto('storm-damage-repair-v2', 'Tarped roof with a Triple G crew starting storm damage repairs', 1200, 1600, '(max-width: 1024px) 50vw, 30vw'); ?>
                    </figure>
                </div>
                <div data-animate class="bt-in-right">
                    <figure class="bt-figure bt-figure--short">
                        <?php echo areaPhoto('crew-shingles', 'Roofer carrying shingles across a roof covered in new underlayment', 1200, 1600, '(max-width: 1024px) 50vw, 30vw'); ?>
                    </figure>
                </div>
                <div class="bt-county" data-animate>
                    <div><strong>Harris County</strong><span>Goose Creek, Pelly, the old downtown</span></div>
                    <span class="bt-county__bayou" aria-hidden="true"></span>
                    <div><strong>Chambers County</strong><span>Newer subdivisions east of the bayou</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="bt-divider bt-divider--arcs" aria-hidden="true">
    <svg viewBox="0 0 1440 52" preserveAspectRatio="none"><path d="M0,52 L0,30 Q180,0 360,30 Q540,60 720,30 Q900,0 1080,30 Q1260,60 1440,30 L1440,52 Z"/></svg>
</div>

<!-- ===================== SIGNATURE: TWO SIDES OF CEDAR BAYOU ===================== -->
<section class="bt-section bt-section--alt" aria-labelledby="bt-sides-title">
    <div class="container">
        <span class="bt-eyebrow">The inspection changes by address</span>
        <h2 id="bt-sides-title">Two sides of Cedar Bayou, two different roof checklists</h2>
        <p class="bt-lead">The bayou is the county line and, roughly, the age line. What we look for on a 1950s house off Texas Avenue is not what we look for on a 2015 build in Chambers County.</p>

        <div class="bt-sides">
            <article class="bt-side bt-side--west" data-animate>
                <div class="bt-side__tag">West of the bayou &middot; Harris County</div>
                <h3>The mid-century streets</h3>
                <p>Goose Creek, Pelly and the old downtown grid. Simple gables, later additions, brick chimneys and decking that may be original.</p>
                <ul>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Step and counter flashing</strong> at chimneys and wall lines — the most common leak we find on older Baytown homes.</div></li>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Low-slope additions</strong> that pond water and need a different underlayment than the main roof.</div></li>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Decking and fascia rot</strong> behind gutters that have been full since the last storm.</div></li>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Layered repairs</strong> — we pull back to sound decking rather than patch over a patch.</div></li>
                </ul>
            </article>

            <div class="bt-spine" aria-hidden="true"><span>Cedar Bayou</span></div>

            <article class="bt-side bt-side--east" data-animate>
                <div class="bt-side__tag">East of the bayou &middot; Chambers County</div>
                <h3>Newer subdivisions</h3>
                <p>Steeper pitches, hips and valleys everywhere, HOA color palettes and builder-grade shingles that were never meant for a second decade of Gulf storms.</p>
                <ul>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Hail bruising</strong> that looks fine from the driveway — the reason Keith saw our signs all over his neighborhood after a hail storm.</div></li>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Valley and dead-valley leaks</strong> where two roof planes dump into one short gutter run.</div></li>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Wind-lifted ridge and hip caps</strong> on the exposed south and east slopes.</div></li>
                    <li><?php echo icon('check-circle', 18); ?><div><strong>Undersized attic ventilation.</strong> Shingle manufacturers can void or limit their warranties when an attic is not properly ventilated — see <a href="/services/attic-venting/">attic venting</a>.</div></li>
                </ul>
            </article>
        </div>
    </div>
</section>

<div class="bt-divider bt-divider--slant" aria-hidden="true">
    <svg viewBox="0 0 1440 52" preserveAspectRatio="none"><polygon points="0,52 0,40 1440,0 1440,52"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="bt-section bt-section--dark" aria-labelledby="bt-claims-title">
    <div class="container">
        <div class="bt-claims">
            <div class="bt-sign" data-animate>
                <div class="bt-sign__board">
                    <p>&ldquo;I remember seeing signs of their business in yards throughout the neighborhood shortly after a hail storm came through. I'm sure glad I did.&rdquo;</p>
                    <footer><strong>Keith</strong> &middot; published review, quoted in full below</footer>
                </div>
                <span class="bt-sign__stake" aria-hidden="true"></span>
            </div>

            <div>
                <span class="bt-eyebrow">After the hail</span>
                <h2 id="bt-claims-title">More than 50 years of claims experience, on your side of the table</h2>
                <p class="bt-lead">
                    Patrick, a customer here, put it simply: we were "patient and accommodating in working with us, as well as the insurance
                    adjuster and other necessary documentation." That is the job — document, meet the adjuster, explain the policy in
                    plain English, then do the work as agreed.
                </p>
                <div class="bt-steps">
                    <div class="bt-step" data-animate><?php echo icon('search', 20); ?><div><strong>Document every slope</strong><span>Close-up photos of hail strikes and wind-lifted shingles before anything is touched.</span></div></div>
                    <div class="bt-step" data-animate><?php echo icon('hard-hat', 20); ?><div><strong>Meet the adjuster on the roof</strong><span>We walk it with them so nothing gets missed or minimized.</span></div></div>
                    <div class="bt-step" data-animate><?php echo icon('check-circle', 20); ?><div><strong>Explain the paperwork</strong><span>Deductible, depreciation and scope, line by line. Ask about temporary tarping if the roof is open.</span></div></div>
                </div>
                <p class="bt-claims__note">Whether a claim is approved, and for how much, is the insurance carrier's decision. We make sure the damage is documented properly and that you understand your options.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="bt-section" aria-labelledby="bt-svc-title">
    <div class="container">
        <div class="bt-svc-head">
            <div>
                <span class="bt-eyebrow">Roofing / Siding — it's on the sign</span>
                <h2 id="bt-svc-title">Roof, siding, gutters, patio, fence — one Baytown estimate</h2>
                <p class="bt-lead">
                    Patrick had us do his roof and then his in-laws'. That is how most of our work here comes in: one job, done right,
                    then the next project on the same house or the one down the street. Everything on the outside, one crew, Tim on site.
                </p>
            </div>
            <div data-animate class="bt-in-down">
                <figure class="bt-figure">
                    <?php echo areaPhoto('pergola-cedar', 'Custom cedar pergola over a back patio on a brick home', 1200, 1600, '(max-width: 1024px) 90vw, 34vw'); ?>
                </figure>
            </div>
        </div>

        <div class="bt-svc-grid">
            <a class="bt-svc" href="/services/roof-replacement/"><?php echo icon('home', 24); ?><span><strong>Roof Replacement</strong><small>Architectural shingle and metal — tear-off, decking, underlayment, cleanup</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/storm-damage-repair/"><?php echo icon('wind', 24); ?><span><strong>Storm &amp; Wind Damage Repair</strong><small>Hail, wind and hurricane damage, documented for your claim</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/roof-repair/"><?php echo icon('wrench', 24); ?><span><strong>Roof Repair</strong><small>Leaks, flashing, pipe boots, rotted decking</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/roof-inspection/"><?php echo icon('search', 24); ?><span><strong>Roof Inspection</strong><small>Free, photo-documented, with a written estimate</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/roof-damage-repair/"><?php echo icon('hammer', 24); ?><span><strong>Roof Damage Repair</strong><small>Wood rot, failed flashing, worn shingles on aging roofs</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/attic-venting/"><?php echo icon('wind', 24); ?><span><strong>Attic Venting</strong><small>Balanced intake and exhaust for a cooler attic</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/gutter-installation/"><?php echo icon('droplets', 24); ?><span><strong>Gutter Installation</strong><small>New gutters and downspouts that move water off the slab</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/siding-fascia-soffit/"><?php echo icon('ruler', 24); ?><span><strong>Siding, Fascia &amp; Soffit</strong><small>Hardie and vinyl siding, wood rot, window re-sealing, exterior paint</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/patio-covers-decks/"><?php echo icon('hard-hat', 24); ?><span><strong>Patio Covers, Pergolas &amp; Decks</strong><small>Covered, screened and enclosed patios, pergolas, wood decks</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
            <a class="bt-svc" href="/services/fences-gates/"><?php echo icon('shield', 24); ?><span><strong>Fences &amp; Gates</strong><small>Cedar and pine privacy, ranch rail, custom gates</small></span><span class="bt-svc__go"><?php echo icon('arrow-up', 18); ?></span></a>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="bt-section bt-section--alt" aria-labelledby="bt-reviews-title">
    <div class="container">
        <span class="bt-eyebrow">From our neighbors</span>
        <h2 id="bt-reviews-title">Three Baytown families, in their own words</h2>
        <p class="bt-lead">Real reviews, published by the client with first name and city.</p>
        <div class="bt-reviews">
            <div class="bt-reviews__photo" data-animate>
                <figure>
                    <div class="bt-figure">
                        <?php echo areaPhoto('owner-father-v2', 'Glenn and Tim Menn, the father-and-son team behind Triple G Roofing & Construction', 1152, 1536, '(max-width: 1024px) 360px, 30vw'); ?>
                    </div>
                    <figcaption>Glenn and Tim Menn — the "Tim and Glenn" in Lisa's review. One of them is on every job.</figcaption>
                </figure>
            </div>
            <div class="bt-reviews__list">
                <?php foreach ($cityReviews as $i => $r): ?>
                <article class="bt-review <?php echo $i % 2 ? 'bt-in-left' : 'bt-in-right'; ?>" data-animate>
                    <div class="bt-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                    <p><?php echo htmlspecialchars($r['text']); ?></p>
                    <footer>
                        <div class="bt-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                        <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                    </footer>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="bt-section" aria-labelledby="bt-faq-title">
    <div class="container">
        <span class="bt-eyebrow">Common questions</span>
        <h2 id="bt-faq-title">Straight answers before you call</h2>
        <div class="bt-faq">
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
<section class="bt-section bt-section--alt" aria-labelledby="bt-nearby-title">
    <div class="container">
        <span class="bt-eyebrow">Across the bridge and up the channel</span>
        <h2 id="bt-nearby-title">Neighbors we also serve</h2>
        <p class="bt-lead">La Porte is across the Fred Hartman Bridge, Channelview is up the Ship Channel, and Mont Belvieu and Highlands are a few minutes out. We cover more than 50 Greater Houston communities in all.</p>
        <div class="bt-nearby">
            <a href="/service-areas/la-porte/">La Porte, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/channelview/">Channelview, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/deer-park/">Deer Park, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/crosby/">Crosby, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="bt-chips">
            <?php foreach (['Mont Belvieu', 'Highlands', 'Barrett', 'Old River-Winfree', 'Dayton', 'Pasadena', 'Galena Park', 'Humble'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="bt-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="bt-cta" aria-labelledby="bt-cta-title">
    <div class="container">
        <div class="bt-cta__inner">
            <div>
                <h2 id="bt-cta-title">Free roof inspection for your Baytown home</h2>
                <p>Photos of what we find, a written estimate, and no pressure. Glenn or Tim comes out personally.</p>
            </div>
            <div class="bt-ctas">
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
