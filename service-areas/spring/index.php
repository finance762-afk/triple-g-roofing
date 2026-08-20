<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Spring';
$pageTitle = 'Roof Replacement & Repair in Spring, TX | Triple G Roofing';
$pageDescription = 'Roof replacement, repair, storm damage, siding and gutters in Spring, TX from a father-and-son team in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/' . getAreaSlug($areaName) . '/';
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

/* Real reviews from this community — names + cities exactly as the client published them */
$pick = ['James', 'Peter', 'Donna S.'];
$cityReviews = array_values(array_filter($testimonials, fn($t) => $t['city'] === $areaName . ', TX' && in_array($t['name'], $pick, true)));
usort($cityReviews, fn($a, $b) => array_search($a['name'], $pick) <=> array_search($b['name'], $pick));

/* Service grid: slug => [icon, one-line blurb] — links every service page */
$svcMeta = [
    'roof-replacement'     => ['home', 'Architectural shingle and metal, tear-off to magnet sweep'],
    'roof-repair'          => ['wrench', 'Leaks, flashing, pipe boots, rotted decking'],
    'roof-inspection'      => ['search', 'Free, photo-documented, written estimate'],
    'storm-damage-repair'  => ['wind', 'Hail, wind and hurricane damage, documented for your claim'],
    'roof-damage-repair'   => ['hammer', 'Aging, worn and compromised roofs brought back'],
    'attic-venting'        => ['arrow-up', 'Balanced intake and exhaust that protects the shingle warranty'],
    'gutter-installation'  => ['droplets', 'Gutters and downspouts that move water off the slab'],
    'siding-fascia-soffit' => ['ruler', 'Hardie and vinyl siding, wood-rot repair, exterior paint'],
    'patio-covers-decks'   => ['hard-hat', 'Patio covers, screened patios, pergolas, wood decks'],
    'fences-gates'         => ['shield', 'Cedar and pine privacy fences, ranch rail, custom gates'],
];

$areaFaqs = [
    [
        'q' => 'Does Triple G Roofing & Construction work on both sides of I-45 in Spring?',
        'a' => 'Yes. Triple G Roofing & Construction serves all of Spring, TX — the Klein ISD side west of the interstate, including Northampton, Gleannloch Farms and Augusta Pines, and the Spring ISD side around Old Town Spring and FM 2920. The company is based in Humble and treats Spring as one of more than 50 Greater Houston communities it serves. The inspection and written estimate are free.',
    ],
    [
        'q' => 'My Spring home flooded or took wind damage in a storm. Where do I start?',
        'a' => 'Call for a free inspection first. We photograph every slope, show you the pictures, and write up what we find. If you decide to file a claim, we help you through the process — documenting the damage, meeting the adjuster and explaining the paperwork in plain English. Whether the claim is approved, and for how much, is the insurance carrier\'s decision; our job is to make sure the damage is documented properly and the repair is done as agreed.',
    ],
    [
        'q' => 'Can you handle a fence, patio cover or siding job along with the roof?',
        'a' => 'Yes. One homeowner here has used us for a new backyard gate and fence repairs; another for siding repair on all four sides of the house with matched paint. Triple G Roofing & Construction builds fences and gates, patio covers, pergolas and wood decks, and does siding, fascia, soffit, wood-rot repair and exterior paint — with the owner on site for every job.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix sp-
   Tokens only. Split hero (text panel + arched photo),
   ribbon trust strip, local-context feature, signature
   "I-45 divide" comparison, light claims split, ten-card
   services grid, reviews, FAQ, nearby, CTA.
   ========================================================== */

/* ---------- Page-scoped reveal directions (framework owns opacity + .animated) ---------- */
.sp-page [data-animate][data-dir="left"]  { transform: translateX(-32px); }
.sp-page [data-animate][data-dir="right"] { transform: translateX(32px); }
.sp-page [data-animate][data-dir="down"]  { transform: translateY(-28px); }
.sp-page [data-animate][data-dir="scale"] { transform: scale(0.94); }
.sp-page [data-animate][data-dir].animated { transform: none; }

/* ---------- Hero: split panel + arched photo ---------- */
.sp-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background: var(--color-dark);
    padding: calc(var(--nav-height) + var(--space-10)) 0 var(--space-16);
}

.sp-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        radial-gradient(ellipse at 15% 20%, color-mix(in srgb, var(--color-primary) 28%, transparent) 0%, transparent 55%),
        radial-gradient(ellipse at 85% 90%, color-mix(in srgb, var(--color-accent) 18%, transparent) 0%, transparent 50%),
        linear-gradient(160deg, var(--color-dark) 0%, var(--color-dark-alt) 100%);
}

.sp-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.05;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.sp-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
    gap: var(--space-12);
    align-items: center;
}

.sp-crumbs {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    align-items: center;
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
    margin-bottom: var(--space-6);
}

.sp-crumbs a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.sp-crumbs a:hover { color: var(--color-accent); }
.sp-crumbs [aria-current] { color: var(--color-white); font-weight: 600; }

.sp-hero__eyebrow {
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

.sp-hero__eyebrow::before {
    content: '';
    width: 36px;
    height: 2px;
    background: var(--color-accent);
}

.sp-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.2rem, 4.8vw, 3.7rem);
    line-height: 1.06;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.sp-hero h1 em {
    font-style: normal;
    color: var(--color-accent);
    position: relative;
    white-space: nowrap;
}

.sp-hero h1 em::after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0.04em;
    height: 0.12em;
    background: var(--color-primary);
    opacity: 0.75;
    border-radius: var(--radius-full);
    z-index: -1;
}

.sp-hero__lead {
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    font-size: clamp(1rem, 1.5vw, 1.15rem);
    line-height: 1.75;
    max-width: 60ch;
    margin-bottom: var(--space-8);
}

.sp-hero__lead strong { color: var(--color-white); }

.sp-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); align-items: center; }
.sp-ctas .btn-lg { font-size: var(--font-size-base); }

.sp-hero__note {
    margin-top: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 65%, transparent);
    display: flex;
    gap: var(--space-2);
    align-items: center;
}

.sp-hero__note svg { color: var(--color-accent); flex-shrink: 0; }

/* Arched photo with floating year badge */
.sp-hero__art { position: relative; justify-self: end; width: min(100%, 440px); }

.sp-arch {
    aspect-ratio: 4 / 5;
    overflow: hidden;
    border-radius: var(--radius-full) var(--radius-full) var(--radius-xl) var(--radius-xl);
    box-shadow: var(--shadow-xl);
    border: 6px solid color-mix(in srgb, var(--color-white) 10%, transparent);
}

.sp-arch img { width: 100%; height: 100%; object-fit: cover; object-position: center 30%; }

.sp-badge {
    position: absolute;
    left: calc(-1 * var(--space-8));
    bottom: var(--space-10);
    background: var(--color-white);
    color: var(--color-dark);
    border-radius: var(--radius-lg);
    padding: var(--space-4) var(--space-5);
    box-shadow: var(--shadow-lg);
    display: grid;
    gap: 2px;
    border-left: 5px solid var(--color-primary);
}

.sp-badge strong { font-family: var(--font-heading); font-size: var(--font-size-3xl); line-height: 1; color: var(--color-primary); }
.sp-badge span { font-size: var(--font-size-xs); color: var(--color-gray-dark); text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600; }

.sp-badge--top {
    left: auto;
    right: calc(-1 * var(--space-6));
    top: var(--space-8);
    bottom: auto;
    border-left-color: var(--color-accent);
}

.sp-badge--top strong { color: var(--color-dark); font-size: var(--font-size-xl); }

/* ---------- Ribbon trust strip (inline, not overlapping) ---------- */
.sp-ribbon {
    background: var(--color-primary);
    color: var(--color-white);
    padding: var(--space-4) 0;
    position: relative;
    overflow: hidden;
}

.sp-ribbon::before {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(-45deg, transparent 0 18px, color-mix(in srgb, var(--color-white) 6%, transparent) 18px 20px);
    pointer-events: none;
}

.sp-ribbon ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-3) var(--space-10);
    font-family: var(--font-heading);
    font-weight: 600;
    font-size: var(--font-size-sm);
    letter-spacing: 0.02em;
}

.sp-ribbon li { display: inline-flex; align-items: center; gap: var(--space-2); }
.sp-ribbon svg { color: var(--color-accent); }

/* ---------- Section scaffolding ---------- */
.sp-section { padding: var(--space-16) 0; position: relative; }
.sp-section--alt { background: var(--color-light); }
.sp-section--dark { background: var(--color-dark-alt); color: var(--color-white); }

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

.sp-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.sp-section h3 { text-wrap: balance; }
.sp-section--dark h2 { color: var(--color-white); }

.sp-subtitle {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}

.sp-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.sp-prose a { color: var(--color-primary); font-weight: 600; }
.sp-prose a:hover { text-decoration: underline; }
.sp-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }

/* ---------- Local context: photo LEFT, text right, landmark list ---------- */
.sp-local {
    display: grid;
    grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
    gap: var(--space-12);
    align-items: start;
}

.sp-local__art { position: relative; padding-bottom: var(--space-10); }

.sp-frame {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 3 / 4;
}

.sp-frame img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.sp-frame:hover img { transform: scale(1.04); }

.sp-frame--inset {
    position: absolute;
    right: calc(-1 * var(--space-6));
    bottom: 0;
    width: 46%;
    aspect-ratio: 4 / 5;
    border: 5px solid var(--color-white);
    box-shadow: var(--shadow-lg);
}

.sp-local__art::before {
    content: '';
    position: absolute;
    left: calc(-1 * var(--space-6));
    top: var(--space-8);
    width: 60%;
    height: 60%;
    border-radius: var(--radius-xl);
    background: color-mix(in srgb, var(--color-accent) 22%, transparent);
    z-index: -1;
}

.sp-landmarks { margin: var(--space-6) 0; display: grid; gap: var(--space-3); }

.sp-landmark {
    display: grid;
    grid-template-columns: 44px 1fr;
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

.sp-landmark:hover { transform: translateX(4px); box-shadow: var(--shadow-md); }

.sp-landmark__num {
    width: 44px;
    height: 44px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    font-family: var(--font-heading);
    font-weight: 700;
    color: var(--color-white);
    background: var(--color-primary);
}

.sp-landmark:nth-child(2) .sp-landmark__num { background: var(--color-accent); color: var(--color-dark); }
.sp-landmark:nth-child(3) .sp-landmark__num { background: var(--color-dark); }
.sp-landmark:nth-child(4) .sp-landmark__num { background: var(--color-dark-alt); }
.sp-landmark strong { display: block; color: var(--color-dark); font-family: var(--font-heading); }

/* ---------- Signature: the I-45 divide ---------- */
.sp-divide {
    position: relative;
    margin-top: var(--space-10);
    display: grid;
    grid-template-columns: minmax(0, 1fr) 72px minmax(0, 1fr);
    align-items: stretch;
}

.sp-divide__side {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    padding: var(--space-8);
    box-shadow: var(--shadow-card);
    display: flex;
    flex-direction: column;
}

.sp-divide__side--west { border-radius: var(--radius-xl) 0 0 var(--radius-xl); border-top: 5px solid var(--color-accent); }
.sp-divide__side--east { border-radius: 0 var(--radius-xl) var(--radius-xl) 0; border-top: 5px solid var(--color-primary); }

.sp-divide__label {
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-gray);
    margin-bottom: var(--space-2);
}

.sp-divide__side h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-2); }
.sp-divide__side > p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; margin-bottom: var(--space-5); }

.sp-divide__tags { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-bottom: var(--space-5); }
.sp-divide__tags span {
    font-size: var(--font-size-xs);
    font-weight: 600;
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-accent) 20%, var(--color-white));
    color: var(--color-dark);
}

.sp-divide__side--east .sp-divide__tags span { background: color-mix(in srgb, var(--color-primary) 12%, var(--color-white)); color: var(--color-primary-dark); }

.sp-divide__side ul { list-style: none; margin: auto 0 0; padding: 0; display: grid; gap: var(--space-2); }
.sp-divide__side li { display: flex; gap: var(--space-2); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5; }
.sp-divide__side li svg { color: var(--color-primary); flex-shrink: 0; margin-top: 2px; }

/* The road itself */
.sp-divide__road {
    position: relative;
    background: var(--color-dark);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.sp-divide__road::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 50%;
    width: 4px;
    margin-left: -2px;
    background: repeating-linear-gradient(180deg, var(--color-accent) 0 22px, transparent 22px 40px);
    opacity: 0.9;
}

.sp-divide__shield {
    position: relative;
    z-index: 1;
    background: var(--color-white);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-sm);
    letter-spacing: 0.04em;
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-md);
    border: 3px solid var(--color-primary);
    writing-mode: horizontal-tb;
}

/* ---------- Claims: light split with photo ---------- */
.sp-claims {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
}

.sp-claims__steps { counter-reset: step; display: grid; gap: var(--space-4); margin-top: var(--space-6); }

.sp-claims__step {
    counter-increment: step;
    position: relative;
    padding: var(--space-4) var(--space-5) var(--space-4) var(--space-16);
    background: var(--color-white);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    color: var(--color-gray-dark);
    line-height: 1.6;
}

.sp-claims__step::before {
    content: counter(step, decimal-leading-zero);
    position: absolute;
    left: var(--space-5);
    top: 50%;
    transform: translateY(-50%);
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-xl);
    color: var(--color-accent);
}

.sp-claims__step strong { display: block; color: var(--color-dark); font-family: var(--font-heading); }

.sp-claims__note {
    margin-top: var(--space-5);
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-primary) 8%, var(--color-white));
    border-left: 4px solid var(--color-primary);
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    line-height: 1.65;
}

.sp-claims__art .sp-frame { aspect-ratio: 4 / 5; max-width: 460px; margin: 0 auto; border-radius: var(--radius-xl) var(--radius-xl) var(--radius-xl) 80px; }

/* ---------- Services: ten-card grid, tinted rotation ---------- */
.sp-svc {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr));
    gap: var(--space-5);
    margin-top: var(--space-8);
}

.sp-svc a {
    display: grid;
    grid-template-columns: 48px 1fr;
    gap: var(--space-4);
    align-items: start;
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    color: var(--color-white);
    transition: transform var(--transition-fast), background var(--transition-fast), border-color var(--transition-fast);
}

.sp-svc a:hover { transform: translateY(-4px); background: color-mix(in srgb, var(--color-white) 10%, transparent); border-color: var(--color-accent); }

.sp-svc__icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
}

.sp-svc li:nth-child(3n+2) .sp-svc__icon { background: var(--color-accent); color: var(--color-dark); }
.sp-svc li:nth-child(3n) .sp-svc__icon { background: var(--color-white); color: var(--color-dark); }

.sp-svc strong { display: block; font-family: var(--font-heading); margin-bottom: var(--space-1); }
.sp-svc small { color: color-mix(in srgb, var(--color-white) 72%, transparent); font-size: var(--font-size-sm); line-height: 1.5; display: block; }
.sp-svc ul { list-style: none; margin: 0; padding: 0; display: contents; }

.sp-section--dark .sp-lead { color: color-mix(in srgb, var(--color-white) 82%, transparent); }
.sp-section--dark .sp-lead a { color: var(--color-accent); font-weight: 600; }

/* ---------- Reviews: staggered cards ---------- */
.sp-reviews {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr));
    gap: var(--space-6);
    margin-top: var(--space-8);
    align-items: start;
}

.sp-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    position: relative;
}

.sp-review:nth-child(2) { margin-top: var(--space-8); }

.sp-review::before {
    content: '\201C';
    position: absolute;
    top: var(--space-2);
    right: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-accent) 40%, transparent);
}

.sp-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.sp-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); }
.sp-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }
.sp-review footer span { color: var(--color-gray); font-weight: 400; }

.sp-review__avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
    font-weight: 700;
}

.sp-review:nth-child(2) .sp-review__avatar { background: var(--color-accent); color: var(--color-dark); }
.sp-review:nth-child(3) .sp-review__avatar { background: var(--color-dark); }

/* ---------- FAQ: two-column on desktop ---------- */
.sp-faq {
    display: grid;
    grid-template-columns: minmax(0, 0.8fr) minmax(0, 1.2fr);
    gap: var(--space-12);
    align-items: start;
}

.sp-faq__list { display: grid; gap: var(--space-3); }

.sp-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

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

.sp-faq__aside { position: sticky; top: calc(var(--nav-height) + var(--space-6)); }
.sp-faq__aside .btn { margin-top: var(--space-5); }

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

/* ---------- Dividers (two styles) ---------- */
.sp-divider { line-height: 0; display: block; }
.sp-divider svg { width: 100%; height: 64px; display: block; }
.sp-divider--wave { background: var(--color-white); }
.sp-divider--wave svg { fill: var(--color-light); }
.sp-divider--slant { background: var(--color-light); }
.sp-divider--slant svg { fill: var(--color-dark-alt); }
.sp-divider--on-white { background: var(--color-white); }
.sp-divider--slant-out { background: var(--color-dark-alt); }
.sp-divider--slant-out svg { fill: var(--color-white); }

/* ---------- CTA ---------- */
.sp-cta {
    position: relative;
    overflow: hidden;
    background: var(--color-dark);
    padding: var(--space-16) 0;
    isolation: isolate;
}

.sp-cta::before {
    content: '';
    position: absolute;
    inset: auto -10% -40% auto;
    width: 60%;
    aspect-ratio: 1;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, color-mix(in srgb, var(--color-primary) 45%, transparent) 0%, transparent 70%);
    z-index: -1;
}

.sp-cta__inner {
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    gap: var(--space-8);
    align-items: center;
}

.sp-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.sp-cta p { color: color-mix(in srgb, var(--color-white) 80%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .sp-hero__grid { grid-template-columns: 1fr; }
    .sp-hero__art { justify-self: start; width: min(100%, 380px); margin-top: var(--space-6); }
    .sp-badge { left: auto; right: calc(-1 * var(--space-4)); }
    .sp-local { grid-template-columns: 1fr; }
    .sp-local__art { max-width: 460px; }
    .sp-divide { grid-template-columns: 1fr; }
    .sp-divide__road { min-height: 64px; }
    .sp-divide__road::before { top: 50%; bottom: auto; left: 0; right: 0; width: auto; height: 4px; margin: -2px 0 0; background: repeating-linear-gradient(90deg, var(--color-accent) 0 22px, transparent 22px 40px); }
    .sp-divide__side--west { border-radius: var(--radius-xl) var(--radius-xl) 0 0; }
    .sp-divide__side--east { border-radius: 0 0 var(--radius-xl) var(--radius-xl); }
    .sp-claims { grid-template-columns: 1fr; }
    .sp-faq { grid-template-columns: 1fr; }
    .sp-faq__aside { position: static; }
    .sp-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .sp-hero { padding-top: calc(var(--nav-height) + var(--space-6)); }
    .sp-ctas .btn { width: 100%; justify-content: center; }
    .sp-ribbon ul { gap: var(--space-2) var(--space-5); font-size: var(--font-size-xs); }
    .sp-frame--inset { display: none; }
    .sp-local__art { padding-bottom: 0; }
    .sp-review:nth-child(2) { margin-top: 0; }
    .sp-section { padding: var(--space-12) 0; }
    .sp-badge--top { display: none; }
    .sp-badge { right: var(--space-2); bottom: var(--space-4); }
}

@media (prefers-reduced-motion: reduce) {
    .sp-frame img, .sp-landmark, .sp-svc a, .sp-nearby a { transition: none; }
}
</style>

<div class="sp-page">

<!-- ===================== HERO ===================== -->
<section class="sp-hero" aria-labelledby="sp-title">
    <div class="container">
        <div class="sp-hero__grid">
            <div>
                <nav class="sp-crumbs" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="sp-hero__eyebrow">Old Town to the Grand Parkway</span>

                <h1 id="sp-title">Roof Replacement &amp; Repair in <em>Spring</em>, TX — and Everything Else on the Outside of the House</h1>

                <p class="sp-hero__lead">
                    <strong>Spring is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a family-owned
                    father-and-son team based in Humble, TX, in business since 1973.</strong> Shingle and metal roof replacement, leak and
                    storm repair, siding, gutters, patio covers, decks and fences — with a free inspection and a written estimate first.
                </p>

                <div class="sp-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Book a Free Inspection</a>
                </div>

                <p class="sp-hero__note"><?php echo icon('check-circle', 16); ?> The owner, Tim Menn, is on every job. Voted a Nextdoor Neighborhood Favorite in 2022, 2023 and 2024.</p>
            </div>

            <div class="sp-hero__art">
                <div class="sp-arch">
                    <?php echo areaPhoto('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, '(max-width: 1024px) 380px, 36vw', true); ?>
                </div>
                <div class="sp-badge" aria-hidden="true"><strong>1973</strong><span>Serving Greater Houston since</span></div>
                <div class="sp-badge sp-badge--top" aria-hidden="true"><strong>Free</strong><span>Inspection &amp; estimate</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== RIBBON TRUST STRIP ===================== -->
<div class="sp-ribbon" role="note" aria-label="Why homeowners call Triple G">
    <div class="container">
        <ul>
            <li><?php echo icon('home', 16); ?> Father-and-son team, family owned</li>
            <li><?php echo icon('award', 16); ?> Nextdoor Neighborhood Favorite ×3</li>
            <li><?php echo icon('search', 16); ?> Free photo-documented inspections</li>
            <li><?php echo icon('map-pin', 16); ?> 50+ Greater Houston communities</li>
        </ul>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="sp-section" aria-labelledby="sp-local-title">
    <div class="container">
        <div class="sp-local">
            <div class="sp-local__art" data-animate data-dir="left">
                <div class="sp-frame">
                    <?php echo areaPhoto('roof-replacement', 'Triple G crew replacing the roof on a two-story brick home', 1200, 1600, '(max-width: 1024px) 460px, 38vw'); ?>
                </div>
                <div class="sp-frame sp-frame--inset">
                    <?php echo areaPhoto('fence-gate-cedar', 'New cedar fence and double gate beside a brick home', 1200, 1600, '(max-width: 1024px) 200px, 18vw'); ?>
                </div>
            </div>

            <div class="sp-prose">
                <span class="sp-eyebrow">A railroad town that became a suburb</span>
                <h2 id="sp-local-title">Spring grew in rings around a rail stop, and the roofs show it</h2>
                <p class="sp-subtitle">Old Town, the 1970s subdivisions, the master-planned 2000s — each ring ages differently.</p>

                <p>
                    Spring was a stop on the Houston &amp; Great Northern Railroad starting in 1871, and Old Town Spring still has original
                    buildings more than a century old along its shop-lined streets. Work outward from there and the housing stock gets
                    younger in rings: the ranch homes and low-pitch gables of the 1970s and 80s off FM 2920 and Aldine-Westfield, then the
                    brick two-stories of the 1990s, then the steep, cut-up roof lines of the master-planned communities along the Grand
                    Parkway (SH 99) corridor.
                </p>
                <p>
                    Water is the other story here. Spring Creek runs along the north edge of town and Cypress Creek along the south, and
                    both broke records during Harvey in 2017. We don't fix floods — but we do fix what blowing rain, wind-lifted
                    shingles and overflowing gutters do to a house, and we pay close attention to drainage on every roof we touch in
                    Spring.
                </p>

                <div class="sp-landmarks">
                    <div class="sp-landmark" data-animate data-dir="right"><span class="sp-landmark__num">01</span><div><strong>Old Town Spring &amp; FM 2920</strong> Mid-century homes and early-70s ranches with original chimney flashing, brittle pipe boots and attics that were never ventilated to today's spec.</div></div>
                    <div class="sp-landmark" data-animate data-dir="right"><span class="sp-landmark__num">02</span><div><strong>Northampton, off Gosling Road</strong> Started in 1968 — the oldest homes sit at the front of the subdivision and are often on their third roof; newer sections behind are on their first or second.</div></div>
                    <div class="sp-landmark" data-animate data-dir="right"><span class="sp-landmark__num">03</span><div><strong>Gleannloch Farms &amp; Augusta Pines</strong> Former Arabian horse farm turned Klein ISD master-planned community, with the Morafic statue at Champion Forest and Spring-Cypress. Builder-grade shingles on steep, valley-heavy roofs.</div></div>
                    <div class="sp-landmark" data-animate data-dir="right"><span class="sp-landmark__num">04</span><div><strong>Along both creek corridors</strong> Tree cover, humidity and wind exposure — algae streaking, limb strikes and gutters that clog every fall.</div></div>
                </div>

                <p>
                    Searching for <strong>roof repair near me in Spring</strong>? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>
                    and Tim will come look at it himself, photograph what he finds, and hand you a written estimate. No charge for either.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="sp-divider sp-divider--wave" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><path d="M0,32 C240,64 480,0 720,32 C960,64 1200,0 1440,32 L1440,64 L0,64 Z"/></svg>
</div>

<!-- ===================== SIGNATURE: THE I-45 DIVIDE ===================== -->
<section class="sp-section sp-section--alt" aria-labelledby="sp-divide-title">
    <div class="container">
        <span class="sp-eyebrow">Two sides of the interstate</span>
        <h2 id="sp-divide-title">What we look for on each side of I-45</h2>
        <p class="sp-lead">Roughly speaking, the interstate splits Spring between Klein ISD to the west and Spring ISD to the east — and it splits the roofing problems too.</p>

        <div class="sp-divide">
            <article class="sp-divide__side sp-divide__side--west" data-animate data-dir="left">
                <span class="sp-divide__label">West of I-45 · Klein ISD side</span>
                <h3>Master-planned roofs with complicated geometry</h3>
                <p>Gleannloch Farms, Augusta Pines and the newer sections of Northampton: two-story homes with hips, dormers, dead valleys and HOA color palettes to match.</p>
                <div class="sp-divide__tags"><span>Gleannloch Farms</span><span>Augusta Pines</span><span>Northampton</span><span>Kuykendahl</span></div>
                <ul>
                    <li><?php echo icon('check-circle', 16); ?> Valley leaks where two slopes dump into one spot</li>
                    <li><?php echo icon('check-circle', 16); ?> Hail bruising on builder-grade shingles after hail season</li>
                    <li><?php echo icon('check-circle', 16); ?> Wind-lifted ridge caps on open, exposed roofs</li>
                    <li><?php echo icon('check-circle', 16); ?> Shingle color-matching to the HOA approved list</li>
                </ul>
            </article>

            <div class="sp-divide__road" aria-hidden="true"><span class="sp-divide__shield">I-45</span></div>

            <article class="sp-divide__side sp-divide__side--east" data-animate data-dir="right">
                <span class="sp-divide__label">East of I-45 · Spring ISD side</span>
                <h3>Older roofs that have been patched before</h3>
                <p>Old Town, the FM 2920 and Aldine-Westfield subdivisions and the streets toward the Hardy Toll Road: simpler gables, older decking and repairs layered over repairs.</p>
                <div class="sp-divide__tags"><span>Old Town</span><span>FM 2920</span><span>Aldine-Westfield</span><span>Hardy Toll Road</span></div>
                <ul>
                    <li><?php echo icon('check-circle', 16); ?> Cracked step and counter flashing at brick chimneys</li>
                    <li><?php echo icon('check-circle', 16); ?> Sun-rotted pipe boots and rusted box vents</li>
                    <li><?php echo icon('check-circle', 16); ?> Soft decking and fascia rot under old gutters</li>
                    <li><?php echo icon('check-circle', 16); ?> Low-slope additions that pond water</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<!-- ===================== CLAIMS (light split) ===================== -->
<section class="sp-section" aria-labelledby="sp-claims-title">
    <div class="container">
        <div class="sp-claims">
            <div>
                <span class="sp-eyebrow">Storm, wind &amp; hail</span>
                <h2 id="sp-claims-title">More than 50 years of claims-handling experience, explained in plain English</h2>
                <p class="sp-lead">
                    A homeowner here told us his old roof was shedding shingles after every wind storm. We were the only roofer who
                    climbed up and measured. That is how every storm job starts — on the roof, with a camera.
                </p>
                <div class="sp-claims__steps">
                    <div class="sp-claims__step" data-animate data-dir="down"><strong>Free inspection &amp; photos</strong> Every slope, every strike, documented before anything is touched.</div>
                    <div class="sp-claims__step" data-animate data-dir="down"><strong>We help you through the claim</strong> Paperwork, scope, deductible and depreciation — walked through line by line.</div>
                    <div class="sp-claims__step" data-animate data-dir="down"><strong>We meet the adjuster</strong> On the roof with them, so nothing gets missed.</div>
                    <div class="sp-claims__step" data-animate data-dir="down"><strong>The work gets done as agreed</strong> Landscaping tarped, daily cleanup, magnet nail sweep, owner on site.</div>
                </div>
                <p class="sp-claims__note">Whether a claim is approved, and for how much, is the insurance carrier's decision. We make sure the damage is documented properly and you understand your options — including <a href="/services/storm-damage-repair/">storm and wind damage repair</a> whether or not a claim is involved. Ask about temporary tarping.</p>
            </div>
            <div class="sp-claims__art" data-animate data-dir="scale">
                <div class="sp-frame">
                    <?php echo areaPhoto('storm-damage-repair-v2', 'Tarped roof with a Triple G crew starting storm damage repairs', 1200, 1600, '(max-width: 1024px) 460px, 40vw'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="sp-divider sp-divider--slant sp-divider--on-white" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 1440,0 1440,64"/></svg>
</div>

<!-- ===================== SERVICES (dark, ten cards) ===================== -->
<section class="sp-section sp-section--dark" aria-labelledby="sp-svc-title">
    <div class="container">
        <span class="sp-eyebrow">Roofing / Siding — it's on the yard sign</span>
        <h2 id="sp-svc-title">Ten services, one crew, one call</h2>
        <p class="sp-lead">
            Roofs are the core of it, but the same crew builds the <a href="/services/fences-gates/">fence</a>, the
            <a href="/services/patio-covers-decks/">patio cover</a> and the <a href="/services/siding-fascia-soffit/">siding</a>. One thing we
            check on every roof: shingle manufacturers can void the shingle warranty without proper
            <a href="/services/attic-venting/">attic ventilation</a>, so balanced intake and exhaust is part of the estimate, not an upsell.
        </p>
        <ul class="sp-svc">
            <?php foreach ($services as $i => $s): $m = $svcMeta[$s['slug']] ?? ['home', $s['description']]; ?>
            <li data-animate data-dir="<?php echo ['left', 'down', 'right'][$i % 3]; ?>">
                <a href="/services/<?php echo $s['slug']; ?>/">
                    <span class="sp-svc__icon"><?php echo icon($m[0], 22); ?></span>
                    <span><strong><?php echo htmlspecialchars($s['name']); ?></strong><small><?php echo htmlspecialchars($m[1]); ?></small></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<div class="sp-divider sp-divider--slant-out" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 0,0 1440,64"/></svg>
</div>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="sp-section" aria-labelledby="sp-reviews-title">
    <div class="container">
        <span class="sp-eyebrow">From our neighbors</span>
        <h2 id="sp-reviews-title">What Spring homeowners say about Triple G</h2>
        <p class="sp-lead">Real reviews, published by the client with first name and city — a roof replacement, a roof repair and a backyard gate.</p>
        <div class="sp-reviews">
            <?php foreach ($cityReviews as $i => $r): ?>
            <article class="sp-review" data-animate data-dir="<?php echo ['left', 'down', 'right'][$i % 3]; ?>">
                <div class="sp-review__stars" aria-label="Five star review"><?php for ($k = 0; $k < 5; $k++) { echo icon('star', 16); } ?></div>
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

<!-- ===================== FAQ ===================== -->
<section class="sp-section sp-section--alt" aria-labelledby="sp-faq-title">
    <div class="container">
        <div class="sp-faq">
            <div class="sp-faq__aside">
                <span class="sp-eyebrow">Common questions</span>
                <h2 id="sp-faq-title">Straight answers before you call</h2>
                <p class="sp-lead">If yours isn't here, ask Tim directly. Free inspections, free written estimates, no pressure.</p>
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            </div>
            <div class="sp-faq__list">
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
<section class="sp-section" aria-labelledby="sp-nearby-title">
    <div class="container">
        <span class="sp-eyebrow">Nearby communities</span>
        <h2 id="sp-nearby-title">Up and down I-45 and the Grand Parkway</h2>
        <p class="sp-lead">The Woodlands is just across the creek to the north, Humble and Kingwood are a short drive east, and Cypress sits at the other end of the Grand Parkway. We cover more than 50 Greater Houston communities in all.</p>
        <div class="sp-nearby">
            <a href="/service-areas/the-woodlands/">The Woodlands, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/cypress/">Cypress, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="sp-chips">
            <?php foreach (['Aldine', 'Shenandoah', 'Oak Ridge North', 'Conroe', 'Jersey Village', 'Houston', 'Atascocita', 'Porter'] as $c): ?>
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
                <h2 id="sp-cta-title">Free roof inspection anywhere in Spring — Old Town to Gleannloch</h2>
                <p>Photos of what we find, a written estimate, and the owner on the roof. Roofing, siding, gutters, patio covers and fences from one family crew.</p>
            </div>
            <div class="sp-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
            </div>
        </div>
    </div>
</section>

</div><!-- /.sp-page -->

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
