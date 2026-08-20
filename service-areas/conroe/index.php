<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Conroe';
$pageTitle = 'Roofing & Storm Repair in Conroe, TX | Triple G Roofing';
$pageDescription = 'Roof replacement, storm repair, siding, gutters and fences in Conroe, TX from a father-and-son team in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/' . getAreaSlug($areaName) . '/';
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

/* No published review carries this city yet — show three real roof-replacement reviews from Greater Houston neighbors */
$cityReviews = array_values(array_filter($testimonials, fn($t) => $t['city'] === $areaName . ', TX'));
$showReviews = !empty($cityReviews) ? array_slice($cityReviews, 0, 3) : getTestimonialsFor('roof-replacement', 3);
$reviewsAreLocal = !empty($cityReviews);

/* Service grid: slug => [icon, one-line blurb] — links every service page */
$svcMeta = [
    'roof-replacement'     => ['home', 'Architectural shingle and metal, on homes, barns and shops'],
    'roof-repair'          => ['wrench', 'Leaks, flashing, pipe boots, rotted decking'],
    'roof-inspection'      => ['search', 'Free, photo-documented, written estimate'],
    'storm-damage-repair'  => ['wind', 'Hail, wind and hurricane damage, documented for your claim'],
    'roof-damage-repair'   => ['hammer', 'Aging and compromised roofs brought back'],
    'attic-venting'        => ['arrow-up', 'Balanced intake and exhaust for long, hot summers'],
    'gutter-installation'  => ['droplets', 'Gutters and downspouts that carry water off the slab'],
    'siding-fascia-soffit' => ['ruler', 'Hardie and vinyl siding, fascia and soffit, exterior paint'],
    'patio-covers-decks'   => ['hard-hat', 'Patio covers, screened patios, pergolas, wood decks'],
    'fences-gates'         => ['shield', 'Cedar and pine privacy, ranch rail, custom gates'],
];

$areaFaqs = [
    [
        'q' => 'Does Triple G Roofing & Construction cover all of Conroe, including the lake side?',
        'a' => 'Yes. Triple G Roofing & Construction works across Conroe, TX — historic downtown, the neighborhoods along I-45 and Loop 336 such as Grand Central Park and Graystone Hills, and out toward the Lake Conroe communities like April Sound and Walden. The company is a family-owned father-and-son team based in Humble, in business since 1973, and treats Conroe as one of more than 50 Greater Houston communities it serves. Inspections and written estimates are free.',
    ],
    [
        'q' => 'Do you do metal roofs, barns and shop buildings as well as houses?',
        'a' => 'Yes. Triple G Roofing & Construction installs architectural shingle and metal roofs on homes, and has put new metal roofs on barns and metal shop buildings — the kind of properties common on the acreage lots north and west of town toward the national forest. Each project gets a free inspection and a written estimate before any work starts.',
    ],
    [
        'q' => 'How does a storm claim work, and will my insurance pay for the roof?',
        'a' => 'We cannot promise what a carrier will do — whether a claim is approved, and for how much, is the insurance carrier\'s decision. What Triple G Roofing & Construction does is bring more than 50 years of claims-handling and adjuster experience to your side of the table: documenting the damage with photos, meeting the adjuster on the roof, explaining the policy in plain English and doing the repair as agreed once you decide how to proceed.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix cn-
   Tokens only. LIGHT hero with a diagonal-clipped photo and a
   "1973" watermark, signature scroll-snap "three Conroes"
   rail, services split with photo pair, claims with inset
   dark card, proof band, reviews, FAQ, nearby, CTA.
   ========================================================== */

/* ---------- Page-scoped reveal directions (framework owns opacity + .animated) ---------- */
.cn-page [data-animate][data-dir="left"]  { transform: translateX(-32px); }
.cn-page [data-animate][data-dir="right"] { transform: translateX(32px); }
.cn-page [data-animate][data-dir="down"]  { transform: translateY(-28px); }
.cn-page [data-animate][data-dir="scale"] { transform: scale(0.94); }
.cn-page [data-animate][data-dir].animated { transform: none; }

/* ---------- Hero: light, diagonal photo on the left ---------- */
.cn-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background: var(--color-light);
    padding: calc(var(--nav-height) + var(--space-10)) 0 var(--space-16);
}

.cn-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--color-accent) 14%, transparent) 0%, transparent 45%),
        radial-gradient(ellipse at 90% 10%, color-mix(in srgb, var(--color-primary) 12%, transparent) 0%, transparent 55%),
        var(--color-light);
}

.cn-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.04;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.cn-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
    gap: var(--space-12);
    align-items: center;
}

.cn-hero__art { position: relative; }

.cn-hero__photo {
    aspect-ratio: 4 / 5;
    overflow: hidden;
    clip-path: polygon(0 0, 100% 0, 100% 88%, 0 100%);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    max-width: 480px;
}

.cn-hero__photo img { width: 100%; height: 100%; object-fit: cover; }

.cn-watermark {
    position: absolute;
    right: calc(-1 * var(--space-4));
    bottom: calc(-1 * var(--space-6));
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: clamp(5rem, 12vw, 9rem);
    line-height: 1;
    color: color-mix(in srgb, var(--color-dark) 7%, transparent);
    pointer-events: none;
    user-select: none;
    letter-spacing: -0.04em;
}

.cn-hero__chip {
    position: absolute;
    left: var(--space-5);
    top: var(--space-5);
    background: var(--color-dark);
    color: var(--color-white);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    box-shadow: var(--shadow-md);
}

.cn-crumbs {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    align-items: center;
    font-size: var(--font-size-sm);
    color: var(--color-gray);
    margin-bottom: var(--space-6);
}

.cn-crumbs a { color: var(--color-gray-dark); transition: color var(--transition-fast); }
.cn-crumbs a:hover { color: var(--color-primary); }
.cn-crumbs [aria-current] { color: var(--color-dark); font-weight: 600; }

.cn-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.cn-hero h1 {
    color: var(--color-dark);
    font-size: clamp(2.2rem, 4.6vw, 3.6rem);
    line-height: 1.06;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.cn-hero h1 mark {
    background: linear-gradient(transparent 58%, color-mix(in srgb, var(--color-accent) 55%, transparent) 58%);
    color: inherit;
    padding: 0 0.1em;
}

.cn-hero__lead {
    color: var(--color-gray-dark);
    font-size: clamp(1rem, 1.5vw, 1.15rem);
    line-height: 1.75;
    max-width: 58ch;
    margin-bottom: var(--space-8);
}

.cn-hero__lead strong { color: var(--color-dark); }

.cn-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); align-items: center; }
.cn-ctas .btn-lg { font-size: var(--font-size-base); }

.cn-hero__facts {
    list-style: none;
    margin: var(--space-8) 0 0;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-3);
}

.cn-hero__facts li {
    display: flex;
    gap: var(--space-2);
    align-items: center;
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
    font-weight: 500;
}

.cn-hero__facts svg { color: var(--color-primary); flex-shrink: 0; }

/* ---------- Section scaffolding ---------- */
.cn-section { padding: var(--space-16) 0; position: relative; }
.cn-section--alt { background: var(--color-light); }
.cn-section--dark { background: var(--color-dark-alt); color: var(--color-white); }

.cn-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.cn-section h3 { text-wrap: balance; }
.cn-section--dark h2 { color: var(--color-white); }

.cn-subtitle {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}

.cn-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.cn-prose a { color: var(--color-primary); font-weight: 600; }
.cn-prose a:hover { text-decoration: underline; }
.cn-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }

/* ---------- Local context: narrow prose + facts column ---------- */
.cn-local {
    display: grid;
    grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.8fr);
    gap: var(--space-12);
    align-items: start;
}

.cn-facts {
    display: grid;
    gap: var(--space-4);
    position: sticky;
    top: calc(var(--nav-height) + var(--space-6));
}

.cn-fact {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-4);
    align-items: start;
}

.cn-fact:nth-child(1) { border-top: 4px solid var(--color-accent); }
.cn-fact:nth-child(2) { border-top: 4px solid var(--color-primary); }
.cn-fact:nth-child(3) { border-top: 4px solid var(--color-dark); }

.cn-fact__year {
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-2xl);
    line-height: 1;
    color: var(--color-primary);
    min-width: 68px;
}

.cn-fact:nth-child(1) .cn-fact__year { color: var(--color-accent); }
.cn-fact:nth-child(3) .cn-fact__year { color: var(--color-dark); }
.cn-fact strong { display: block; font-family: var(--font-heading); color: var(--color-dark); margin-bottom: 2px; }
.cn-fact span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; }

/* ---------- Signature: three-Conroes scroll-snap rail ---------- */
.cn-rail-wrap { position: relative; margin-top: var(--space-8); }

.cn-rail {
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: minmax(320px, 1fr);
    gap: var(--space-6);
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding: var(--space-2) var(--space-2) var(--space-6);
    scrollbar-width: thin;
    scrollbar-color: var(--color-primary) var(--color-gray-light);
}

.cn-rail::-webkit-scrollbar { height: 8px; }
.cn-rail::-webkit-scrollbar-track { background: var(--color-gray-light); border-radius: var(--radius-full); }
.cn-rail::-webkit-scrollbar-thumb { background: var(--color-primary); border-radius: var(--radius-full); }

.cn-card {
    scroll-snap-align: start;
    position: relative;
    display: grid;
    grid-template-rows: auto 1fr;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.cn-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }

.cn-card__photo { aspect-ratio: 16 / 10; overflow: hidden; position: relative; }
.cn-card__photo img { width: 100%; height: 100%; object-fit: cover; object-position: center 35%; }

.cn-card__photo::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 50%, color-mix(in srgb, var(--color-dark) 70%, transparent) 100%);
}

.cn-card__label {
    position: absolute;
    left: var(--space-5);
    bottom: var(--space-4);
    z-index: 1;
    color: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.cn-card__body { padding: var(--space-6); display: flex; flex-direction: column; }
.cn-card h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-2); }
.cn-card__body > p { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.7; margin-bottom: var(--space-4); }

.cn-card ul { list-style: none; margin: auto 0 0; padding: var(--space-4) 0 0; border-top: 1px dashed var(--color-border); display: grid; gap: var(--space-2); }
.cn-card li { display: flex; gap: var(--space-2); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5; }
.cn-card li svg { flex-shrink: 0; margin-top: 2px; color: var(--color-primary); }

.cn-card:nth-child(1) li svg { color: var(--color-accent); }
.cn-card:nth-child(3) li svg { color: var(--color-dark); }

.cn-rail-hint {
    font-size: var(--font-size-xs);
    color: var(--color-gray);
    display: flex;
    align-items: center;
    gap: var(--space-2);
    margin-top: var(--space-2);
}

.cn-rail-hint svg { transform: rotate(90deg); color: var(--color-primary); }

/* ---------- Services: split with photo pair ---------- */
.cn-services {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1.2fr);
    gap: var(--space-12);
    align-items: start;
}

.cn-pair { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); position: sticky; top: calc(var(--nav-height) + var(--space-6)); }

.cn-pair figure {
    margin: 0;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    border: 4px solid var(--color-white);
}

.cn-pair figure:last-child { margin-top: var(--space-10); }
.cn-pair img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.cn-pair figure:hover img { transform: scale(1.04); }

.cn-svc-grid {
    list-style: none;
    margin: var(--space-6) 0 0;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4);
}

.cn-svc-grid a {
    display: grid;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    color: var(--color-dark);
    height: 100%;
    transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast);
}

.cn-svc-grid a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); }

.cn-svc-grid li:nth-child(4n+1) a { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }
.cn-svc-grid li:nth-child(4n+2) a { background: var(--color-white); }
.cn-svc-grid li:nth-child(4n+3) a { background: color-mix(in srgb, var(--color-primary) 7%, var(--color-white)); }
.cn-svc-grid li:nth-child(4n) a { background: color-mix(in srgb, var(--color-dark) 4%, var(--color-white)); }

.cn-svc-grid__icon { color: var(--color-primary); }
.cn-svc-grid strong { font-family: var(--font-heading); display: block; }
.cn-svc-grid small { font-size: var(--font-size-xs); color: var(--color-gray-dark); line-height: 1.45; display: block; }

/* ---------- Claims: prose + inset dark card ---------- */
.cn-claims {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
}

.cn-claims__card {
    background: var(--color-dark);
    color: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-8);
    box-shadow: var(--shadow-xl);
    position: relative;
    overflow: hidden;
}

.cn-claims__card::before {
    content: '';
    position: absolute;
    top: -40%;
    right: -20%;
    width: 70%;
    aspect-ratio: 1;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, color-mix(in srgb, var(--color-primary) 40%, transparent) 0%, transparent 70%);
}

.cn-claims__card h3 { color: var(--color-white); font-size: var(--font-size-xl); margin-bottom: var(--space-5); position: relative; }

.cn-claims__card ol { margin: 0; padding: 0; list-style: none; counter-reset: cs; display: grid; gap: var(--space-4); position: relative; }

.cn-claims__card li {
    counter-increment: cs;
    display: grid;
    grid-template-columns: 32px 1fr;
    gap: var(--space-3);
    align-items: start;
    font-size: var(--font-size-sm);
    line-height: 1.6;
    color: color-mix(in srgb, var(--color-white) 82%, transparent);
}

.cn-claims__card li::before {
    content: counter(cs);
    width: 32px;
    height: 32px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-accent);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-weight: 800;
    font-size: var(--font-size-sm);
}

.cn-claims__card strong { color: var(--color-white); display: block; font-family: var(--font-heading); }

.cn-claims__note {
    margin-top: var(--space-6);
    padding-top: var(--space-5);
    border-top: 1px solid color-mix(in srgb, var(--color-white) 15%, transparent);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 75%, transparent);
    line-height: 1.6;
    position: relative;
}

.cn-claims__photo {
    aspect-ratio: 4 / 5;
    max-width: 300px;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    margin-top: var(--space-6);
}

.cn-claims__photo img { width: 100%; height: 100%; object-fit: cover; }

/* ---------- Proof band ---------- */
.cn-proof {
    background: var(--color-primary);
    color: var(--color-white);
    padding: var(--space-10) 0;
    position: relative;
    overflow: hidden;
}

.cn-proof::after {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(90deg, transparent 0 120px, color-mix(in srgb, var(--color-white) 5%, transparent) 120px 121px);
    pointer-events: none;
}

.cn-proof__grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-6); position: relative; z-index: 1; }

.cn-proof__item { text-align: center; padding: 0 var(--space-4); border-right: 1px solid color-mix(in srgb, var(--color-white) 25%, transparent); }
.cn-proof__item:last-child { border-right: 0; }
.cn-proof__item strong { display: block; font-family: var(--font-heading); font-size: var(--font-size-4xl); line-height: 1; margin-bottom: var(--space-2); }
.cn-proof__item span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 88%, transparent); line-height: 1.4; display: block; }

/* ---------- Reviews ---------- */
.cn-reviews {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr));
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.cn-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    display: flex;
    flex-direction: column;
    border-bottom: 5px solid var(--color-accent);
}

.cn-review:nth-child(2) { border-bottom-color: var(--color-primary); }
.cn-review:nth-child(3) { border-bottom-color: var(--color-dark); }

.cn-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.cn-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); flex: 1; }
.cn-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }
.cn-review footer span { color: var(--color-gray); font-weight: 400; }

.cn-review__avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    background: var(--color-dark);
    color: var(--color-white);
    font-weight: 700;
}

/* ---------- FAQ ---------- */
.cn-faq { max-width: 860px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }

.cn-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.cn-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.cn-faq summary {
    cursor: pointer;
    list-style: none;
    display: grid;
    grid-template-columns: 1fr auto;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-5) var(--space-6);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
}

.cn-faq summary::-webkit-details-marker { display: none; }
.cn-faq summary svg { color: var(--color-primary); transition: transform var(--transition-fast); }
.cn-faq details[open] summary svg { transform: rotate(45deg); }
.cn-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.cn-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.cn-nearby a {
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

.cn-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.cn-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.cn-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.cn-chips span, .cn-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.cn-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }

.cn-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers (two styles: ripple + notch) ---------- */
.cn-divider { line-height: 0; display: block; }
.cn-divider svg { width: 100%; height: 52px; display: block; }
.cn-divider--ripple { background: var(--color-light); }
.cn-divider--ripple svg { fill: var(--color-white); }
.cn-divider--ripple-in { background: var(--color-white); }
.cn-divider--ripple-in svg { fill: var(--color-light); }
.cn-divider--notch { background: var(--color-light); }
.cn-divider--notch svg { fill: var(--color-primary); }

/* ---------- CTA ---------- */
.cn-cta {
    position: relative;
    overflow: hidden;
    background: var(--color-dark);
    padding: var(--space-16) 0;
    isolation: isolate;
}

.cn-cta::before {
    content: '';
    position: absolute;
    left: -5%;
    top: -60%;
    width: 45%;
    aspect-ratio: 1;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, color-mix(in srgb, var(--color-accent) 30%, transparent) 0%, transparent 70%);
    z-index: -1;
}

.cn-cta__inner { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: var(--space-8); align-items: center; }
.cn-cta h2 { color: var(--color-white); font-size: clamp(1.6rem, 3vw, 2.3rem); margin-bottom: var(--space-2); text-wrap: balance; }
.cn-cta p { color: color-mix(in srgb, var(--color-white) 80%, transparent); margin: 0; max-width: 60ch; line-height: 1.7; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .cn-hero__grid { grid-template-columns: 1fr; }
    .cn-hero__art { order: 2; max-width: 420px; }
    .cn-local { grid-template-columns: 1fr; }
    .cn-facts { position: static; }
    .cn-services { grid-template-columns: 1fr; }
    .cn-pair { position: static; max-width: 520px; }
    .cn-claims { grid-template-columns: 1fr; }
    .cn-proof__grid { grid-template-columns: 1fr 1fr; }
    .cn-proof__item:nth-child(2) { border-right: 0; }
    .cn-proof__item:nth-child(-n+2) { margin-bottom: var(--space-6); }
    .cn-cta__inner { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .cn-hero { padding-top: calc(var(--nav-height) + var(--space-6)); }
    .cn-ctas .btn { width: 100%; justify-content: center; }
    .cn-hero__facts { grid-template-columns: 1fr; }
    .cn-rail { grid-auto-columns: 86%; }
    .cn-svc-grid { grid-template-columns: 1fr; }
    .cn-pair { grid-template-columns: 1fr; }
    .cn-pair figure:last-child { display: none; }
    .cn-proof__grid { grid-template-columns: 1fr; }
    .cn-proof__item { border-right: 0; }
    .cn-claims__card { padding: var(--space-6); }
    .cn-section { padding: var(--space-12) 0; }
    .cn-watermark { display: none; }
}

@media (prefers-reduced-motion: reduce) {
    .cn-card, .cn-pair img, .cn-svc-grid a, .cn-nearby a { transition: none; }
    .cn-rail { scroll-behavior: auto; }
}
</style>

<div class="cn-page">

<!-- ===================== HERO ===================== -->
<section class="cn-hero" aria-labelledby="cn-title">
    <div class="container">
        <div class="cn-hero__grid">
            <div class="cn-hero__art">
                <div class="cn-hero__photo">
                    <?php echo areaPhoto('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, '(max-width: 1024px) 420px, 40vw', true); ?>
                </div>
                <span class="cn-hero__chip">Free inspection &amp; estimate</span>
                <span class="cn-watermark" aria-hidden="true">1973</span>
            </div>

            <div>
                <nav class="cn-crumbs" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="cn-eyebrow">The county seat, the lake and the interstate</span>

                <h1 id="cn-title">Roofing &amp; Storm Repair in <mark>Conroe</mark>, TX — From Downtown to the Lake</h1>

                <p class="cn-hero__lead">
                    <strong>Conroe is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a
                    family-owned father-and-son team based in Humble, TX, in business since 1973.</strong> Shingle and metal roof replacement,
                    leak and storm repair, siding, gutters, patio covers, decks and fences — with the owner on every job and a written
                    estimate before any work starts.
                </p>

                <div class="cn-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Inspection</a>
                </div>

                <ul class="cn-hero__facts">
                    <li><?php echo icon('check-circle', 16); ?> Father-and-son team, family owned</li>
                    <li><?php echo icon('check-circle', 16); ?> Nextdoor Neighborhood Favorite 2022–24</li>
                    <li><?php echo icon('check-circle', 16); ?> Free photo-documented inspections</li>
                    <li><?php echo icon('check-circle', 16); ?> 50+ Greater Houston communities</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="cn-divider cn-divider--ripple" aria-hidden="true">
    <svg viewBox="0 0 1440 52" preserveAspectRatio="none"><path d="M0,26 C180,52 360,0 540,26 C720,52 900,0 1080,26 C1260,52 1350,13 1440,26 L1440,52 L0,52 Z"/></svg>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="cn-section" aria-labelledby="cn-local-title">
    <div class="container">
        <div class="cn-local">
            <div class="cn-prose">
                <span class="cn-eyebrow">Montgomery County's seat since 1889</span>
                <h2 id="cn-local-title">A lake town, a courthouse town and an interstate town — all with different roofs</h2>
                <p class="cn-subtitle">Lake Conroe filled in 1973. So did our first year of business.</p>
                <p>
                    Conroe has been the seat of Montgomery County since 1889, and the roofs here tell three separate stories. Downtown,
                    around the courthouse square and the 1935 Crighton Theatre, the older homes have simple gables, original brick
                    chimneys and decking that has seen several roofs. Along I-45 and Loop 336, Grand Central Park is rising on the former
                    Camp Strake Boy Scout camp, and Graystone Hills sits on 331 acres of rolling hills and bluffs off Longmire Road —
                    steep, cut-up builder roofs with valleys that collect pine straw.
                </p>
                <p>
                    Then there is the lake. Lake Conroe covers roughly 21,000 acres and reaches about 21 miles up the West Fork of the
                    San Jacinto, with its northern end inside the Sam Houston National Forest. The communities along its shore — April Sound,
                    gated since 1972, and Walden among them — take wind straight off open water, and many of the original lake houses are
                    now on their third or fourth roof. We also put metal roofs on barns and shop buildings on the acreage lots north and
                    west of town.
                </p>
                <p>
                    Looking for <strong>roof replacement near me in Conroe</strong>? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>.
                    Tim comes out himself, photographs every slope and hands you a written estimate — the inspection and the estimate are free.
                </p>
            </div>

            <div class="cn-facts">
                <div class="cn-fact" data-animate data-dir="right"><span class="cn-fact__year">1889</span><div><strong>County seat</strong><span>Conroe replaced the town of Montgomery as the seat of Montgomery County and still holds it.</span></div></div>
                <div class="cn-fact" data-animate data-dir="right"><span class="cn-fact__year">1973</span><div><strong>The lake fills</strong><span>The San Jacinto River Authority completed the dam in January and the lake was full by October 31 — the same year Triple G started.</span></div></div>
                <div class="cn-fact" data-animate data-dir="right"><span class="cn-fact__year">1944</span><div><strong>Camp Strake</strong><span>The Boy Scout camp dedicated to George Strake in 1944 became the 2,046-acre Grand Central Park master-planned community.</span></div></div>
            </div>
        </div>
    </div>
</section>

<div class="cn-divider cn-divider--ripple-in" aria-hidden="true">
    <svg viewBox="0 0 1440 52" preserveAspectRatio="none"><path d="M0,26 C180,0 360,52 540,26 C720,0 900,52 1080,26 C1260,0 1350,39 1440,26 L1440,52 L0,52 Z"/></svg>
</div>

<!-- ===================== SIGNATURE: THREE CONROES RAIL ===================== -->
<section class="cn-section cn-section--alt" aria-labelledby="cn-rail-title">
    <div class="container">
        <span class="cn-eyebrow">What we look for, by part of town</span>
        <h2 id="cn-rail-title">Three parts of town, three inspection checklists</h2>
        <p class="cn-lead">An inspection here starts with a question: where is the house? Downtown, the I-45 corridor and the lakeshore each hide problems in different places.</p>

        <div class="cn-rail-wrap">
            <div class="cn-rail" tabindex="0" aria-label="Scroll horizontally to see all three areas">
                <article class="cn-card" data-animate data-dir="left">
                    <div class="cn-card__photo">
                        <?php echo areaPhoto('roof-repair-v2', 'New step flashing sealed against a brick chimney during a roof repair', 1200, 1600, '(max-width: 640px) 86vw, 400px'); ?>
                        <span class="cn-card__label">Historic downtown</span>
                    </div>
                    <div class="cn-card__body">
                        <h3>Around the courthouse square</h3>
                        <p>Older homes near the Crighton Theatre and the square: simple gables, brick chimneys, low-slope additions and repairs layered over repairs.</p>
                        <ul>
                            <li><?php echo icon('check-circle', 16); ?> Step and counter flashing at chimneys</li>
                            <li><?php echo icon('check-circle', 16); ?> Soft decking and fascia rot</li>
                            <li><?php echo icon('check-circle', 16); ?> Sun-cracked pipe boots and rusted vents</li>
                        </ul>
                    </div>
                </article>

                <article class="cn-card" data-animate data-dir="down">
                    <div class="cn-card__photo">
                        <?php echo areaPhoto('roof-overhead', 'Overhead view of a completed architectural shingle roof', 1200, 1600, '(max-width: 640px) 86vw, 400px'); ?>
                        <span class="cn-card__label">I-45 &amp; Loop 336</span>
                    </div>
                    <div class="cn-card__body">
                        <h3>Grand Central Park &amp; Graystone Hills</h3>
                        <p>Newer two-stories with hips, dormers and dead valleys under a pine canopy, and HOA color palettes to match when it's time to re-roof.</p>
                        <ul>
                            <li><?php echo icon('check-circle', 16); ?> Valley leaks and pine-straw dams</li>
                            <li><?php echo icon('check-circle', 16); ?> Hail bruising on builder-grade shingles</li>
                            <li><?php echo icon('check-circle', 16); ?> Gutters that overflow behind the fascia</li>
                        </ul>
                    </div>
                </article>

                <article class="cn-card" data-animate data-dir="right">
                    <div class="cn-card__photo">
                        <?php echo areaPhoto('metal-roof-barn', 'New corrugated metal roof on a barn with white ranch-rail fencing', 1200, 1600, '(max-width: 640px) 86vw, 400px'); ?>
                        <span class="cn-card__label">The lakeshore &amp; acreage</span>
                    </div>
                    <div class="cn-card__body">
                        <h3>April Sound, Walden and the lake lots</h3>
                        <p>Wind straight off 21,000 acres of open water, 1970s and 80s lake houses on their third or fourth roof, and barns and shops that want metal.</p>
                        <ul>
                            <li><?php echo icon('check-circle', 16); ?> Wind-lifted ridge caps and tabs</li>
                            <li><?php echo icon('check-circle', 16); ?> Rusted fasteners on older metal</li>
                            <li><?php echo icon('check-circle', 16); ?> Patio covers and dockside pergolas that take the same wind</li>
                        </ul>
                    </div>
                </article>
            </div>
            <p class="cn-rail-hint"><?php echo icon('arrow-up', 14); ?> Scroll sideways on smaller screens to see all three.</p>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="cn-section" aria-labelledby="cn-svc-title">
    <div class="container">
        <div class="cn-services">
            <div class="cn-pair" data-animate data-dir="left">
                <figure><?php echo areaPhoto('pergola-cedar', 'Custom cedar pergola over a back patio on a brick home', 1200, 1600, '(max-width: 1024px) 260px, 20vw'); ?></figure>
                <figure><?php echo areaPhoto('siding-dormer', 'Dormer siding replaced with new fiber-cement panels', 1200, 1600, '(max-width: 1024px) 260px, 20vw'); ?></figure>
            </div>
            <div>
                <span class="cn-eyebrow">Roofing / Siding — it's on the yard sign</span>
                <h2 id="cn-svc-title">Everything on the outside of the house, from one family crew</h2>
                <p class="cn-lead">
                    Roofs are the core of it. But a lake house needs a <a href="/services/patio-covers-decks/">patio cover</a> that holds in the wind, an
                    acreage lot needs a <a href="/services/fences-gates/">ranch-rail fence</a>, and a downtown cottage needs its
                    <a href="/services/siding-fascia-soffit/">fascia and siding</a> replaced before the paint. One more thing on every roof: shingle
                    manufacturers can void the shingle warranty without proper <a href="/services/attic-venting/">attic ventilation</a>, so balanced
                    intake and exhaust is part of the estimate.
                </p>
                <ul class="cn-svc-grid">
                    <?php foreach ($services as $i => $s): $m = $svcMeta[$s['slug']] ?? ['home', $s['description']]; ?>
                    <li data-animate data-dir="<?php echo ['down', 'right'][$i % 2]; ?>">
                        <a href="/services/<?php echo $s['slug']; ?>/">
                            <span class="cn-svc-grid__icon"><?php echo icon($m[0], 24); ?></span>
                            <span><strong><?php echo htmlspecialchars($s['name']); ?></strong><small><?php echo htmlspecialchars($m[1]); ?></small></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ===================== CLAIMS ===================== -->
<section class="cn-section cn-section--alt" aria-labelledby="cn-claims-title">
    <div class="container">
        <div class="cn-claims">
            <div>
                <span class="cn-eyebrow">Storm, wind &amp; hail</span>
                <h2 id="cn-claims-title">More than 50 years of claims-handling experience, on your side of the table</h2>
                <p class="cn-lead">
                    Open water, tall pines and long hail seasons mean storm damage is a matter of when, not if, in Conroe. When it happens,
                    the process matters as much as the repair: document first, explain the policy in plain English, meet the adjuster, and
                    do the <a href="/services/storm-damage-repair/">storm and wind damage repair</a> as agreed. Ask about temporary tarping.
                </p>
                <div class="cn-claims__photo" data-animate data-dir="scale">
                    <?php echo areaPhoto('roof-damage-repair-v2', 'Roof stripped to the decking showing holes and rotted wood before repair', 1200, 1600, '300px'); ?>
                </div>
            </div>
            <div class="cn-claims__card" data-animate data-dir="right">
                <h3>How a storm job runs with Triple G</h3>
                <ol>
                    <li><div><strong>Free inspection &amp; photos</strong> Every slope, every strike, documented before anything is touched.</div></li>
                    <li><div><strong>We help with the claim</strong> Paperwork, scope, deductible and depreciation — walked through line by line.</div></li>
                    <li><div><strong>We meet the adjuster</strong> On the roof with them so nothing gets missed.</div></li>
                    <li><div><strong>Repair as agreed</strong> Landscaping tarped, daily cleanup, magnet nail sweep, owner on site.</div></li>
                </ol>
                <p class="cn-claims__note">Whether a claim is approved, and for how much, is the insurance carrier's decision. We make sure the damage is documented properly and you understand your options.</p>
            </div>
        </div>
    </div>
</section>

<div class="cn-divider cn-divider--notch" aria-hidden="true">
    <svg viewBox="0 0 1440 52" preserveAspectRatio="none"><polygon points="0,52 0,40 680,40 720,0 760,40 1440,40 1440,52"/></svg>
</div>

<!-- ===================== PROOF BAND ===================== -->
<div class="cn-proof" role="note" aria-label="Why homeowners call Triple G">
    <div class="container">
        <div class="cn-proof__grid">
            <div class="cn-proof__item"><strong>1973</strong><span>Serving the Greater Houston area since</span></div>
            <div class="cn-proof__item"><strong>50+</strong><span>Communities, from Orange to Galveston</span></div>
            <div class="cn-proof__item"><strong>3×</strong><span>Nextdoor Neighborhood Favorite — 2022, 2023, 2024</span></div>
            <div class="cn-proof__item"><strong>Free</strong><span>Inspections and written estimates</span></div>
        </div>
    </div>
</div>

<!-- ===================== REVIEWS ===================== -->
<section class="cn-section" aria-labelledby="cn-reviews-title">
    <div class="container">
        <span class="cn-eyebrow">From our neighbors</span>
        <h2 id="cn-reviews-title"><?php echo $reviewsAreLocal ? 'What Conroe homeowners say about Triple G' : 'What Greater Houston homeowners say about a Triple G roof'; ?></h2>
        <p class="cn-lead">Real reviews, published by the client with first name and city<?php echo $reviewsAreLocal ? '.' : ' — the same crew and the same owner come to Conroe.'; ?></p>
        <div class="cn-reviews">
            <?php foreach ($showReviews as $i => $r): ?>
            <article class="cn-review" data-animate data-dir="<?php echo ['left', 'scale', 'right'][$i % 3]; ?>">
                <div class="cn-review__stars" aria-label="Five star review"><?php for ($k = 0; $k < 5; $k++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="cn-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== FAQ ===================== -->
<section class="cn-section cn-section--alt" aria-labelledby="cn-faq-title">
    <div class="container">
        <span class="cn-eyebrow">Common questions</span>
        <h2 id="cn-faq-title">Straight answers before you call</h2>
        <div class="cn-faq">
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
<section class="cn-section" aria-labelledby="cn-nearby-title">
    <div class="container">
        <span class="cn-eyebrow">Nearby communities</span>
        <h2 id="cn-nearby-title">Down I-45 and across Montgomery County</h2>
        <p class="cn-lead">The Woodlands is the next exit south, Spring just past it, and Cut and Shoot, Panorama Village and Pinehurst are minutes away. We cover more than 50 Greater Houston communities in all.</p>
        <div class="cn-nearby">
            <a href="/service-areas/the-woodlands/">The Woodlands, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/spring/">Spring, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/new-caney/">New Caney, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/porter/">Porter, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="cn-chips">
            <?php foreach (['Cut and Shoot', 'Panorama Village', 'Pinehurst', 'Shenandoah', 'Oak Ridge North', 'Cleveland', 'Splendora', 'Humble'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="cn-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="cn-cta" aria-labelledby="cn-cta-title">
    <div class="container">
        <div class="cn-cta__inner">
            <div>
                <h2 id="cn-cta-title">Free roof inspection in Conroe — downtown, the corridor or the lake</h2>
                <p>Photos of what we find, a written estimate, and the owner on the roof. Roofing, siding, gutters, patio covers and fences from one family crew, since 1973.</p>
            </div>
            <div class="cn-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
            </div>
        </div>
    </div>
</section>

</div><!-- /.cn-page -->

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
