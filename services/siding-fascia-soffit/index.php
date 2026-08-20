<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Service — Siding, Fascia & Soffit · Triple G Roofing & Construction
   Premium editorial service page (8-section structure)
   Facts: references/CLIENT-FACTS.md only. Photos: photo-manifest.
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Siding, Fascia & Soffit';
$serviceSlug     = 'siding-fascia-soffit';
$pageTitle       = 'Siding, Fascia & Soffit Repair Houston | Triple G Roofing';
$pageDescription = 'Siding repair and replacement, fascia and soffit wood-rot repair and exterior paint across Greater Houston. Family-owned since 1973. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';
$ogImage         = 'siding-fascia-soffit-960.webp';

/* Service record from config (drives schema description) */
$service = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $service = $s; break; } }

/* Real reviews tagged for this service (falls back to featured) */
$reviews = getTestimonialsFor('siding-fascia-soffit', 3);

/* --- FAQs (fact-safe; mirrored in FAQPage JSON-LD) --- */
$faqs = [
    [
        'q' => 'Should I repair my siding or replace all of it?',
        'a' => 'Repair it when the damage is local: a few rotted boards along the bottom course, a cracked panel on one wall, a dormer that takes the weather, or trim that has split at the corners. Replace it when rot, warping or failed paint shows up on most elevations, or when moisture is getting behind the panels. Triple G Roofing & Construction checks the sheathing behind the damage before recommending either one, and the inspection and written estimate are free.',
    ],
    [
        'q' => 'What is the difference between fiber-cement, vinyl and wood siding?',
        'a' => 'Fiber-cement siding such as Hardie board is a cement-and-fiber plank that resists rot, termites and fire, holds paint well and handles Gulf Coast humidity, but it is heavy and has to be installed and flashed correctly. Vinyl costs less up front and never needs paint, but it can warp in high heat, crack on impact and is hard to color-match years later. Wood looks traditional and is easy to repair in small sections, but it needs regular paint or sealing and is the most exposed to rot and insects in our climate.',
    ],
    [
        'q' => 'Why is my fascia or soffit rotting?',
        'a' => 'Almost always because water is sitting where it should not. Gutters that overflow or pull away dump rain straight onto the fascia board; missing or undersized drip edge lets water wick behind it; and an attic without enough airflow traps humid air against the soffit from the inside. Triple G Roofing & Construction fixes the rotted wood and the reason it rotted, which often means looking at the gutters and attic ventilation at the same time.',
    ],
    [
        'q' => 'Can you match my existing siding, trim and paint?',
        'a' => 'Yes. Triple G Roofing & Construction matches siding profiles and trim dimensions so a repaired wall does not read as a patch, and we color-match paint so new boards blend with the rest of the house. Matching trim and paint is something our customers mention in their reviews because it is the difference between a repair you can spot from the street and one you forget about.',
    ],
    [
        'q' => 'Do you also re-seal windows and paint after the siding work?',
        'a' => 'Yes. Window re-sealing and exterior paint are the finishing work on most of our siding and trim jobs, and we can repair interior sheetrock that was damaged by the same leak. You get one crew and one written estimate for the outside of the house instead of coordinating a siding company, a painter and a handyman.',
    ],
    [
        'q' => 'How much does siding or fascia repair cost in the Greater Houston area?',
        'a' => 'It depends on the material, how many square feet are affected, how much rot is hiding behind the surface, and whether paint, window re-sealing or gutters are part of the job. Triple G Roofing & Construction does not guess over the phone. We come out, look behind the damage, and give you a free written estimate with no obligation.',
    ],
];

/* --- Related services (3 cards — required services-grid markup) --- */
$relatedServices = [
    [
        'name' => 'Gutter Installation', 'slug' => 'gutter-installation', 'img' => 'gutter-installation-v2', 'variants' => [480], 'w' => 720, 'h' => 960,
        'alt' => 'New downspout and gutter on a brick covered patio',
        'desc' => 'New gutters and downspouts that keep water off your fascia and foundation.',
        'bullets' => ['Stops fascia rot at the source', 'Downspouts routed away', 'Sized for Houston downpours'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/></svg>',
    ],
    [
        'name' => 'Roof Repair', 'slug' => 'roof-repair', 'img' => 'roof-repair-v2', 'variants' => [480, 960], 'w' => 1200, 'h' => 1600,
        'alt' => 'New step flashing sealed against a brick chimney during a roof repair',
        'desc' => 'Leak repairs, flashing and pipe-boot fixes, and rotted-decking repair.',
        'bullets' => ['Leak traced to its source', 'Photos of every finding', 'Free written estimate'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z"/></svg>',
    ],
    [
        'name' => 'Patio Covers, Pergolas & Decks', 'slug' => 'patio-covers-decks', 'img' => 'patio-covers-decks', 'variants' => [480, 960], 'w' => 1000, 'h' => 1333,
        'alt' => 'Finished covered patio with ceiling fans and a concrete slab',
        'desc' => 'Custom patio covers, screened patios, pergolas and wood decks.',
        'bullets' => ['Matched to your home\'s trim', 'Screened and enclosed options', 'Cedar pergolas and decks'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>',
    ],
];

/* --- Schema: Service + BreadcrumbList + FAQPage --- */
$serviceSchema = [
    "@context"    => "https://schema.org",
    "@type"       => "Service",
    "@id"         => $canonicalUrl . '#service-' . $serviceSlug,
    "serviceType" => 'Siding, Fascia and Soffit Repair and Replacement',
    "name"        => 'Siding, Fascia & Soffit Repair and Replacement in Greater Houston',
    "description" => $service ? $service['description'] : 'Siding repair and replacement, fascia and soffit, wood-rot repair, window re-sealing and exterior paint.',
    "provider"    => ["@id" => $siteUrl . '#organization'],
    "areaServed"  => array_map(function ($c) use ($address) {
        return ["@type" => "City", "name" => $c . ', ' . $address['state']];
    }, $serviceAreaCities),
    "url"         => $canonicalUrl,
];
$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type"    => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $siteUrl . '/'],
        ["@type" => "ListItem", "position" => 2, "name" => "Services", "item" => $siteUrl . '/services/'],
        ["@type" => "ListItem", "position" => 3, "name" => $serviceName, "item" => $canonicalUrl],
    ],
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n"
    . '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n"
    . '<script type="application/ld+json">' . generateFAQSchema($faqs) . '</script>';

/* Responsive <img> helper scoped to this page (only references variants that exist on disk) */
function sdImg($name, $alt, $w, $h, $variants, $sizes, $eager = false) {
    $set = [];
    foreach ($variants as $v) { $set[] = '/assets/images/' . $name . '-' . $v . '.webp ' . $v . 'w'; }
    return '<img src="/assets/images/' . $name . '.jpg" srcset="' . implode(', ', $set) . '" sizes="' . $sizes . '" alt="' . htmlspecialchars($alt) . '" width="' . $w . '" height="' . $h . '"'
        . ($eager ? ' loading="eager" fetchpriority="high"' : ' loading="lazy"') . '>';
}

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Siding, Fascia & Soffit — page-specific styles (Premium tier)
   Tokens only. Signature section: annotated eave cross-section
   (fascia / soffit / drip edge / gutter / vent). Prefix: sd-
   ============================================================ */
:root {
  --sd-ink: var(--color-dark);
  --sd-accent: var(--color-primary);
  --sd-accent-soft: color-mix(in srgb, var(--color-primary) 8%, var(--color-white));
  --sd-gold: var(--color-accent);
  --sd-gold-soft: color-mix(in srgb, var(--color-accent) 16%, var(--color-white));
  --sd-mist: color-mix(in srgb, var(--color-secondary) 5%, var(--color-white));
  --sd-line: color-mix(in srgb, var(--color-secondary) 12%, var(--color-white));
  --sd-line-dark: color-mix(in srgb, var(--color-white) 12%, transparent);
  --sd-white-90: color-mix(in srgb, var(--color-white) 90%, transparent);
  --sd-white-72: color-mix(in srgb, var(--color-white) 72%, transparent);
  --sd-white-06: color-mix(in srgb, var(--color-white) 6%, transparent);
  --sd-wood: color-mix(in srgb, var(--color-accent) 55%, var(--color-secondary));
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, var(--color-white));
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, var(--color-white));
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, var(--color-white));
  --color-card-tint-neutral: var(--color-white);
}
.sd-page h1, .sd-page h2, .sd-page h3 { text-wrap: balance; }
[data-animate].reveal-delay-1 { transition-delay: .08s; }
[data-animate].reveal-delay-2 { transition-delay: .16s; }
[data-animate].reveal-delay-3 { transition-delay: .24s; }

/* ---- Breadcrumb (chevron trail) ---- */
.sd-crumbs { background: var(--sd-mist); }
.sd-crumbs ol { list-style: none; display: flex; flex-wrap: wrap; align-items: center; margin: 0; padding: var(--space-3) 0; font-size: var(--font-size-sm); color: var(--color-gray); }
.sd-crumbs li { display: inline-flex; align-items: center; }
.sd-crumbs li + li::before { content: ''; width: 7px; height: 7px; border-right: 2px solid var(--color-gray-light); border-bottom: 2px solid var(--color-gray-light); transform: rotate(-45deg); margin: 0 var(--space-3); }
.sd-crumbs a { color: var(--color-gray-dark); transition: color var(--transition-fast); }
.sd-crumbs a:hover { color: var(--sd-accent); }
.sd-crumbs [aria-current] { color: var(--sd-accent); font-weight: 600; }

/* =====================================================
   1 · HERO — layered photo, gradient + noise, with an
   offset scope strip below the headline (no reveals)
   ===================================================== */
.sd-hero {
  position: relative;
  min-height: 62vh;
  display: flex;
  align-items: flex-end;
  padding: var(--space-16) 0 0;
  overflow: hidden;
  background: var(--color-secondary);
  isolation: isolate;
}
.sd-hero__bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 30%; z-index: 0; }
.sd-hero::before { content: ''; position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(to top, rgba(var(--color-secondary-rgb), .97) 0%, rgba(var(--color-secondary-rgb), .82) 45%, rgba(var(--color-secondary-rgb), .38) 100%); }
.sd-hero::after { content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none; opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.sd-hero__inner { position: relative; z-index: 2; width: 100%; padding-top: var(--space-12); }
.sd-hero__kicker { display: inline-flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-xs); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--sd-gold); margin-bottom: var(--space-5); }
.sd-hero__kicker span { padding: var(--space-1) var(--space-3); border: 1px solid var(--sd-line-dark); border-radius: var(--radius-full); }
.sd-hero h1 { color: var(--color-white); font-size: clamp(2.2rem, 4.6vw, 3.6rem); line-height: 1.06; max-width: 20ch; margin-bottom: var(--space-5); }
.sd-hero h1 .text-accent { font-size: 1.06em; }
.sd-hero .hero-answer { color: var(--sd-white-90); font-size: var(--font-size-lg); line-height: 1.7; max-width: 64ch; margin-bottom: var(--space-6); }
.sd-hero__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-12); }
.sd-hero__actions .btn svg { width: 18px; height: 18px; }
.sd-scope { display: grid; grid-template-columns: repeat(4, 1fr); background: var(--color-white); border-radius: var(--radius-lg) var(--radius-lg) 0 0; box-shadow: var(--shadow-xl); overflow: hidden; }
.sd-scope__item { padding: var(--space-5) var(--space-6); border-right: 1px solid var(--sd-line); display: grid; grid-template-columns: auto 1fr; gap: var(--space-3); align-items: start; transition: background var(--transition-fast); }
.sd-scope__item:last-child { border-right: 0; }
.sd-scope__item:hover { background: var(--sd-accent-soft); }
.sd-scope__item svg { width: 22px; height: 22px; color: var(--sd-accent); margin-top: 2px; }
.sd-scope__item strong { display: block; font-family: var(--font-heading); color: var(--sd-ink); font-size: var(--font-size-base); margin-bottom: var(--space-1); }
.sd-scope__item span { font-size: var(--font-size-xs); color: var(--color-gray-dark); line-height: 1.5; }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background: var(--sd-accent-soft); border-left: 4px solid var(--sd-accent); border-radius: var(--radius-md); padding: var(--space-5) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-lg); margin: var(--space-4) auto 0; text-align: left; max-width: 72ch; }
.sd-updated { display: inline-block; margin-top: var(--space-4); font-size: var(--font-size-xs); letter-spacing: 1px; text-transform: uppercase; color: var(--color-gray); }

/* =====================================================
   2 · REPAIR VS REPLACE — two lanes with a centre marker
   ===================================================== */
.sd-lanes { background: var(--color-white); }
.sd-lanes__grid { position: relative; display: grid; grid-template-columns: 1fr var(--space-16) 1fr; gap: 0; margin-top: var(--space-10); align-items: stretch; }
.sd-lane { padding: var(--space-8); border-radius: var(--radius-lg); border: 1px solid var(--sd-line); background: var(--sd-mist); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.sd-lane:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.sd-lane--replace { background: linear-gradient(160deg, var(--sd-accent-soft), var(--color-white)); border-color: color-mix(in srgb, var(--sd-accent) 30%, var(--sd-line)); }
.sd-lane h3 { font-size: var(--font-size-xl); color: var(--sd-ink); margin-bottom: var(--space-2); display: flex; align-items: center; gap: var(--space-3); }
.sd-lane h3 svg { width: 24px; height: 24px; color: var(--sd-accent); }
.sd-lane > p { font-size: var(--font-size-sm); color: var(--color-gray); margin-bottom: var(--space-5); }
.sd-lane ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-3); }
.sd-lane li { position: relative; padding-left: var(--space-6); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }
.sd-lane li::before { content: ''; position: absolute; left: 0; top: .55em; width: 10px; height: 10px; border-radius: var(--radius-sm); background: var(--sd-gold); transform: rotate(45deg); }
.sd-lane--replace li::before { background: var(--sd-accent); }
.sd-lanes__or { display: flex; align-items: center; justify-content: center; position: relative; }
.sd-lanes__or::before { content: ''; position: absolute; top: 0; bottom: 0; left: 50%; width: 1px; background: var(--sd-line); }
.sd-lanes__or span { position: relative; z-index: 1; width: var(--space-12); height: var(--space-12); border-radius: var(--radius-full); background: var(--color-secondary); color: var(--color-white); font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-xs); letter-spacing: 1px; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-md); }
.sd-lanes__note { margin-top: var(--space-8); text-align: center; font-size: var(--font-size-sm); color: var(--color-gray-dark); max-width: 64ch; margin-inline: auto; line-height: 1.65; }

/* =====================================================
   3 · MATERIALS — spec-sheet cards
   ===================================================== */
.sd-materials { background: var(--sd-mist); position: relative; overflow: hidden; }
.sd-materials::before { content: ''; position: absolute; left: -8%; top: -10%; width: 40vw; height: 40vw; border-radius: var(--radius-full); background: radial-gradient(circle, rgba(var(--color-accent-rgb), .16), transparent 65%); pointer-events: none; }
.sd-materials .container { position: relative; z-index: 1; }
.sd-specs { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); margin-top: var(--space-10); }
.sd-spec { background: var(--color-white); border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--sd-line); display: flex; flex-direction: column; transition: transform var(--transition-base), box-shadow var(--transition-base); }
.sd-spec:hover { transform: translateY(-5px); box-shadow: var(--shadow-xl); }
.sd-spec__head { padding: var(--space-5) var(--space-6); color: var(--color-white); position: relative; overflow: hidden; }
.sd-spec--fc .sd-spec__head { background: var(--color-secondary); }
.sd-spec--vinyl .sd-spec__head { background: var(--color-gray-dark); }
.sd-spec--wood .sd-spec__head { background: var(--sd-wood); }
.sd-spec__head::after { content: ''; position: absolute; right: calc(-1 * var(--space-8)); top: calc(-1 * var(--space-8)); width: var(--space-16); height: var(--space-16); border-radius: var(--radius-full); background: var(--sd-white-06); }
.sd-spec__head small { display: block; font-size: var(--font-size-xs); letter-spacing: 2px; text-transform: uppercase; opacity: .8; margin-bottom: var(--space-1); }
.sd-spec__head h3 { color: var(--color-white); font-size: var(--font-size-xl); margin: 0; }
.sd-spec__rows { padding: var(--space-2) var(--space-6) var(--space-6); flex: 1; }
.sd-spec__row { display: grid; grid-template-columns: var(--space-16) 1fr; gap: var(--space-3); padding: var(--space-4) 0; border-bottom: 1px dashed var(--sd-line); font-size: var(--font-size-sm); line-height: 1.55; color: var(--color-gray-dark); }
.sd-spec__row:last-child { border-bottom: 0; }
.sd-spec__row dt { font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-xs); letter-spacing: 1px; text-transform: uppercase; color: var(--sd-accent); padding-top: 2px; }
.sd-spec__row dd { margin: 0; }
.sd-spec__pick { margin: 0 var(--space-6) var(--space-6); padding: var(--space-3) var(--space-4); border-radius: var(--radius-md); background: var(--sd-gold-soft); font-size: var(--font-size-xs); color: var(--color-gray-dark); line-height: 1.5; }
.sd-spec__pick strong { color: var(--sd-ink); }
.sd-materials__read { display: inline-flex; align-items: center; gap: var(--space-2); margin-top: var(--space-8); font-family: var(--font-heading); font-weight: 700; color: var(--sd-accent); }
.sd-materials__read svg { width: 18px; height: 18px; transition: transform var(--transition-fast); }
.sd-materials__read:hover svg { transform: translateX(4px); }

/* =====================================================
   4 · SIGNATURE — THE EAVE, ANNOTATED
   Cross-section diagram of where fascia, soffit, drip edge,
   gutter and attic airflow meet, with a numbered legend.
   ===================================================== */
.sd-eave { background: var(--color-dark); position: relative; overflow: hidden; }
.sd-eave::before { content: ''; position: absolute; inset: 0; pointer-events: none;
  background: linear-gradient(var(--sd-white-06) 1px, transparent 1px), linear-gradient(90deg, var(--sd-white-06) 1px, transparent 1px); background-size: 48px 48px;
  mask-image: radial-gradient(ellipse at 30% 50%, var(--color-dark) 0%, transparent 75%); }
.sd-eave .container { position: relative; z-index: 1; }
.sd-eave .section-header h2 { color: var(--color-white); }
.sd-eave .section-header .eyebrow { color: var(--sd-gold); }
.sd-eave .answer-block { background: var(--sd-white-06); border-left-color: var(--sd-gold); color: var(--sd-white-90); }
.sd-eave__grid { display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(280px, .8fr); gap: var(--space-12); align-items: center; margin-top: var(--space-12); }
.sd-diagram { background: var(--sd-white-06); border: 1px solid var(--sd-line-dark); border-radius: var(--radius-xl); padding: var(--space-6); box-shadow: var(--shadow-xl); }
.sd-diagram svg { width: 100%; height: auto; display: block; }
.sd-diagram .pin { transition: transform var(--transition-base); transform-box: fill-box; transform-origin: center; }
.sd-diagram .pin:hover { transform: scale(1.15); }
.sd-diagram .flow { stroke-dasharray: 6 6; animation: sd-flow 1.6s linear infinite; }
@keyframes sd-flow { to { stroke-dashoffset: -24; } }
.sd-legend { list-style: none; margin: 0; padding: 0; counter-reset: pin; display: grid; gap: var(--space-3); }
.sd-legend li { display: grid; grid-template-columns: var(--space-10) 1fr; gap: var(--space-4); align-items: start; padding: var(--space-4); border-radius: var(--radius-md); border: 1px solid var(--sd-line-dark); background: var(--sd-white-06); transition: background var(--transition-fast), border-color var(--transition-fast), transform var(--transition-base); }
.sd-legend li:hover { background: rgba(var(--color-primary-rgb), .1); border-color: rgba(var(--color-primary-rgb), .5); transform: translateX(var(--space-2)); }
.sd-legend li::before { counter-increment: pin; content: counter(pin); width: var(--space-10); height: var(--space-10); border-radius: var(--radius-full); background: var(--sd-gold); color: var(--color-secondary); font-family: var(--font-heading); font-weight: 800; display: flex; align-items: center; justify-content: center; }
.sd-legend strong { display: block; color: var(--color-white); font-family: var(--font-heading); font-size: var(--font-size-base); margin-bottom: var(--space-1); }
.sd-legend p { margin: 0; color: var(--sd-white-72); font-size: var(--font-size-sm); line-height: 1.55; }
.sd-legend a { color: var(--sd-gold); text-decoration: underline; text-underline-offset: 3px; }
.sd-legend a:hover { color: var(--color-white); }

/* =====================================================
   5 · FINISHING WORK — arch photo + pull quotes
   ===================================================== */
.sd-finish { background: var(--color-white); }
.sd-finish__grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(280px, 460px); gap: var(--space-12); align-items: center; }
.sd-finish .eyebrow { color: var(--sd-accent); }
.sd-finish p { color: var(--color-gray-dark); line-height: 1.7; }
.sd-finish__list { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }
.sd-finish__list li { display: flex; gap: var(--space-3); align-items: flex-start; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; }
.sd-finish__list svg { width: 20px; height: 20px; color: var(--sd-accent); flex-shrink: 0; margin-top: 2px; }
.sd-finish__photos { position: relative; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); align-items: end; }
.sd-finish__photos figure { margin: 0; position: relative; overflow: hidden; }
.sd-finish__photos figure:first-child { aspect-ratio: 2 / 3; border-radius: var(--radius-full) var(--radius-full) var(--radius-md) var(--radius-md); box-shadow: var(--shadow-xl); }
.sd-finish__photos figure:last-child { aspect-ratio: 3 / 4; border-radius: var(--radius-md); transform: translateY(calc(-1 * var(--space-8))); box-shadow: var(--shadow-lg); }
.sd-finish__photos img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.sd-finish__photos figure:hover img { transform: scale(1.05); }
.sd-finish__photos figcaption { position: absolute; left: 0; right: 0; bottom: 0; padding: var(--space-6) var(--space-3) var(--space-3); font-size: var(--font-size-xs); color: var(--color-white); background: linear-gradient(to top, rgba(var(--color-secondary-rgb), .88), transparent); }
.sd-quotes { display: grid; gap: var(--space-4); margin-top: var(--space-8); }
.sd-quote { position: relative; padding: var(--space-4) var(--space-5) var(--space-4) var(--space-12); background: var(--sd-gold-soft); border-radius: var(--radius-md); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }
.sd-quote::before { content: '\201C'; position: absolute; left: var(--space-4); top: var(--space-1); font-family: var(--font-heading); font-size: var(--font-size-4xl); line-height: 1; color: var(--sd-accent); }
.sd-quote cite { display: block; margin-top: var(--space-2); font-style: normal; font-weight: 600; color: var(--sd-ink); font-size: var(--font-size-xs); }

/* =====================================================
   6 · PROCESS — zig-zag rail, alternating sides
   ===================================================== */
.sd-process { background: var(--sd-accent-soft); position: relative; overflow: hidden; }
.sd-process::after { content: ''; position: absolute; right: -10%; bottom: -20%; width: 38vw; height: 38vw; border-radius: var(--radius-full); background: radial-gradient(circle, rgba(var(--color-primary-rgb), .12), transparent 65%); pointer-events: none; }
.sd-process .container { position: relative; z-index: 1; }
.sd-zig { position: relative; max-width: 900px; margin: var(--space-12) auto 0; counter-reset: zig; }
.sd-zig::before { content: ''; position: absolute; left: 50%; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--sd-accent), var(--sd-gold)); transform: translateX(-50%); }
.sd-zig__step {
  position: relative;
  width: calc(50% - var(--space-10));
  padding: var(--space-5) var(--space-6);
  background: var(--color-white);
  border-radius: var(--radius-lg);
  border: 1px solid var(--sd-line);
  box-shadow: var(--shadow-card);
  margin-bottom: var(--space-8);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.sd-zig__step:hover { transform: translateY(-3px); box-shadow: var(--shadow-lg); }
.sd-zig__step:nth-child(odd) { margin-right: auto; }
.sd-zig__step:nth-child(even) { margin-left: auto; }
.sd-zig__step::before { counter-increment: zig; content: counter(zig); position: absolute; top: var(--space-5); width: var(--space-10); height: var(--space-10); border-radius: var(--radius-full); background: var(--sd-accent); color: var(--color-white); font-family: var(--font-heading); font-weight: 800; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-md); }
.sd-zig__step:nth-child(odd)::before { right: calc(-1 * var(--space-10) - var(--space-5)); }
.sd-zig__step:nth-child(even)::before { left: calc(-1 * var(--space-10) - var(--space-5)); }
.sd-zig__step::after { content: ''; position: absolute; top: calc(var(--space-5) + var(--space-5) - 1px); width: var(--space-5); height: 2px; background: var(--sd-accent); }
.sd-zig__step:nth-child(odd)::after { right: calc(-1 * var(--space-5)); }
.sd-zig__step:nth-child(even)::after { left: calc(-1 * var(--space-5)); }
.sd-zig__step h3 { font-size: var(--font-size-lg); color: var(--sd-ink); margin-bottom: var(--space-2); }
.sd-zig__step p { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; margin: 0; }

/* =====================================================
   7 · PROOF — ledger-style reviews
   ===================================================== */
.sd-proof { background: var(--color-secondary); position: relative; overflow: hidden; }
.sd-proof::before { content: ''; position: absolute; inset: 0; pointer-events: none; background: radial-gradient(ellipse at 10% 0%, rgba(var(--color-primary-rgb), .2) 0%, transparent 55%); }
.sd-proof .container { position: relative; z-index: 1; }
.sd-proof .section-header h2 { color: var(--color-white); }
.sd-proof .section-header .eyebrow { color: var(--sd-gold); }
.sd-proof .answer-block { background: var(--sd-white-06); border-left-color: var(--sd-gold); color: var(--sd-white-90); }
.sd-ledger { margin-top: var(--space-10); border-top: 1px solid var(--sd-line-dark); }
.sd-entry { display: grid; grid-template-columns: minmax(160px, 220px) 1fr; gap: var(--space-8); padding: var(--space-8) 0; border-bottom: 1px solid var(--sd-line-dark); transition: background var(--transition-fast); }
.sd-entry:hover { background: var(--sd-white-06); }
.sd-entry__who { display: flex; flex-direction: column; gap: var(--space-2); }
.sd-entry__name { font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-xl); color: var(--color-white); line-height: 1.1; }
.sd-entry__city { font-size: var(--font-size-sm); color: var(--sd-white-72); }
.sd-entry__tag { display: inline-block; width: fit-content; margin-top: var(--space-2); font-size: var(--font-size-xs); letter-spacing: 1px; text-transform: uppercase; color: var(--sd-gold); border: 1px solid rgba(var(--color-accent-rgb), .4); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); }
.sd-entry blockquote { margin: 0; color: var(--sd-white-90); font-size: var(--font-size-base); line-height: 1.75; max-width: 70ch; }
.sd-entry blockquote p { margin: 0; }
.sd-proof__links { display: flex; flex-wrap: wrap; gap: var(--space-4); justify-content: center; margin-top: var(--space-10); }
.sd-proof__links a { display: inline-flex; align-items: center; gap: var(--space-2); color: var(--color-white); font-size: var(--font-size-sm); font-weight: 600; padding: var(--space-3) var(--space-5); border: 1px solid var(--sd-line-dark); border-radius: var(--radius-full); transition: background var(--transition-fast), border-color var(--transition-fast); }
.sd-proof__links a:hover { background: rgba(var(--color-primary-rgb), .2); border-color: var(--sd-accent); }
.sd-proof__links svg { width: 18px; height: 18px; color: var(--color-star); }

/* =====================================================
   8 · FAQ — sticky heading + accordion column
   ===================================================== */
.sd-faq { background: var(--color-white); }
.sd-faq__grid { display: grid; grid-template-columns: minmax(240px, 360px) minmax(0, 1fr); gap: var(--space-12); align-items: start; }
.sd-faq__aside { position: sticky; top: calc(var(--nav-height) + var(--space-6)); }
.sd-faq__aside .eyebrow { color: var(--sd-accent); }
.sd-faq__aside p { color: var(--color-gray-dark); line-height: 1.65; margin-top: var(--space-3); }
.sd-faq__aside .btn { margin-top: var(--space-6); }
.sd-faq__aside .btn svg { width: 18px; height: 18px; }
.faq-item { background: var(--color-white); border: 1px solid var(--sd-line); border-radius: var(--radius-lg); margin-bottom: var(--space-3); overflow: hidden; transition: box-shadow var(--transition-base), border-color var(--transition-base); }
.faq-item[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--sd-accent) 35%, var(--sd-line)); }
.faq-item:not([open]):hover { border-color: color-mix(in srgb, var(--sd-accent) 30%, var(--sd-line)); }
.faq-item summary { list-style: none; cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: var(--space-4); padding: var(--space-5) var(--space-6); font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-base); color: var(--sd-ink); }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary:hover { color: var(--sd-accent); }
.sd-faq__toggle { flex-shrink: 0; width: var(--space-8); height: var(--space-8); border-radius: var(--radius-sm); background: var(--sd-accent-soft); color: var(--sd-accent); display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base); }
.sd-faq__toggle svg { width: 16px; height: 16px; }
.faq-item[open] .sd-faq__toggle { transform: rotate(45deg); background: var(--sd-accent); color: var(--color-white); }
.faq-answer { padding: 0 var(--space-6) var(--space-6); }
.faq-answer p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.75; max-width: 65ch; }

/* =====================================================
   FINAL CTA — centered band, stacked tiles
   ===================================================== */
.sd-cta { position: relative; overflow: hidden; text-align: center; padding: var(--space-16) 0;
  background: linear-gradient(160deg, var(--color-secondary) 0%, var(--color-primary-dark) 55%, var(--color-primary) 100%); }
.sd-cta::before { content: ''; position: absolute; inset: 0; pointer-events: none; opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.sd-cta .container { position: relative; z-index: 1; }
.sd-cta h2 { color: var(--color-white); font-size: clamp(1.9rem, 4vw, 2.75rem); margin-bottom: var(--space-4); }
.sd-cta p { color: var(--sd-white-90); max-width: 60ch; margin: 0 auto var(--space-8); font-size: var(--font-size-lg); }
.sd-cta__actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.sd-cta .btn svg { width: 18px; height: 18px; }
.sd-cta__tiles { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-4); max-width: 760px; margin: var(--space-10) auto 0; }
.sd-cta__tile { background: var(--sd-white-06); border: 1px solid var(--sd-line-dark); border-radius: var(--radius-md); padding: var(--space-4); font-size: var(--font-size-sm); color: var(--sd-white-90); }
.sd-cta__tile strong { display: block; font-family: var(--font-heading); color: var(--sd-gold); font-size: var(--font-size-lg); margin-bottom: var(--space-1); }

/* =====================================================
   RELATED SERVICES (required services-grid markup)
   ===================================================== */
.sd-related { background: var(--sd-mist); }
.services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-8); margin-top: var(--space-12); }
.service-card-with-image { background: var(--color-card-tint-neutral); border-radius: var(--radius-lg); overflow: hidden; display: flex; flex-direction: column; box-shadow: var(--shadow-card); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.service-card-with-image:hover { transform: translateY(-6px); box-shadow: var(--shadow-xl); }
.card-tint-1 { background: var(--color-card-tint-1); }
.card-tint-2 { background: var(--color-card-tint-2); }
.card-tint-3 { background: var(--color-card-tint-3); }
.service-card__image { position: relative; aspect-ratio: 5 / 3; overflow: hidden; }
.service-card__image img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body { padding: var(--space-6); text-align: center; display: flex; flex-direction: column; align-items: center; gap: var(--space-3); flex: 1; }
.service-card__icon { width: 60px; height: 60px; border-radius: var(--radius-full); background: var(--color-white); box-shadow: var(--shadow-md); display: flex; align-items: center; justify-content: center; margin-top: calc(-1 * var(--space-10)); margin-bottom: var(--space-1); color: var(--sd-accent); position: relative; z-index: 1; border: 3px solid var(--color-white); }
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { color: var(--sd-ink); font-size: var(--font-size-xl); margin: 0; }
.service-card__desc { color: var(--color-gray-dark); font-size: var(--font-size-sm); margin: 0; line-height: 1.55; }
.service-card-with-image ul { list-style: none; padding: var(--space-4) 0 0; margin: var(--space-2) 0 0; width: 100%; text-align: left; display: flex; flex-direction: column; gap: var(--space-2); border-top: 1px solid rgba(var(--color-secondary-rgb), .08); }
.service-card-with-image ul li { font-size: var(--font-size-sm); color: var(--color-gray-dark); padding-left: var(--space-6); position: relative; }
.service-card-with-image ul li::before { content: "\2713"; color: var(--sd-accent); font-weight: 700; position: absolute; left: 0; top: 0; }
.service-card__cta { margin-top: var(--space-4); padding-top: var(--space-4); width: 100%; color: var(--sd-accent); font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-sm); border-top: 1px solid rgba(var(--color-secondary-rgb), .08); transition: color var(--transition-base); }
.service-card__cta::after { content: " \2192"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--sd-gold); }
.service-card__cta:hover::after { transform: translateX(4px); }

/* ---- SVG dividers (3 styles) ---- */
.sd-divider { display: block; overflow: hidden; line-height: 0; }
.sd-divider svg { display: block; width: 100%; height: 100%; }
.sd-divider--lap { height: 44px; }
.sd-divider--swoop { height: 72px; }
.sd-divider--peak { height: 56px; }

/* ---- Focus visibility (WCAG AA) ---- */
.sd-page a:focus-visible, .sd-page summary:focus-visible { outline: 3px solid var(--color-accent); outline-offset: 2px; border-radius: var(--radius-sm); }
.sd-page ::selection { background: rgba(var(--color-primary-rgb), .85); color: var(--color-white); }

/* ---- Multi-directional reveals (gated by data-animate) ---- */
[data-animate].sd-rv-left { transform: translateX(-36px); }
[data-animate].sd-rv-right { transform: translateX(36px); }
[data-animate].sd-rv-down { transform: translateY(-30px); }
[data-animate].sd-rv-scale { transform: scale(.93); }
[data-animate].sd-rv-left.animated, [data-animate].sd-rv-right.animated,
[data-animate].sd-rv-down.animated, [data-animate].sd-rv-scale.animated { transform: none; }

@media (prefers-reduced-motion: reduce) {
  [data-animate].sd-rv-left, [data-animate].sd-rv-right, [data-animate].sd-rv-down, [data-animate].sd-rv-scale { transform: none; }
  .sd-diagram .flow { animation: none; }
  .sd-lane:hover, .sd-spec:hover, .sd-legend li:hover, .sd-zig__step:hover, .service-card-with-image:hover,
  .sd-finish__photos figure:hover img, .service-card-with-image:hover .service-card__image img, .sd-diagram .pin:hover { transform: none; }
  .sd-finish__photos figure:last-child { transform: translateY(calc(-1 * var(--space-8))); }
}
@media (max-width: 1100px) {
  .sd-scope { grid-template-columns: 1fr 1fr; }
  .sd-scope__item:nth-child(2) { border-right: 0; }
  .sd-scope__item:nth-child(-n+2) { border-bottom: 1px solid var(--sd-line); }
  .sd-eave__grid { grid-template-columns: 1fr; }
  .sd-specs { grid-template-columns: 1fr; max-width: 560px; margin-inline: auto; }
  .sd-faq__grid { grid-template-columns: 1fr; }
  .sd-faq__aside { position: static; }
}
@media (max-width: 900px) {
  .sd-lanes__grid { grid-template-columns: 1fr; gap: var(--space-6); }
  .sd-lanes__or { height: var(--space-12); }
  .sd-lanes__or::before { top: 50%; bottom: auto; left: 0; right: 0; width: auto; height: 1px; }
  .sd-finish__grid { grid-template-columns: 1fr; }
  .sd-finish__photos { max-width: 460px; }
  .sd-entry { grid-template-columns: 1fr; gap: var(--space-4); }
  .sd-zig::before { left: var(--space-5); transform: none; }
  .sd-zig__step, .sd-zig__step:nth-child(odd), .sd-zig__step:nth-child(even) { width: auto; margin-left: var(--space-16); margin-right: 0; }
  .sd-zig__step:nth-child(odd)::before, .sd-zig__step:nth-child(even)::before { left: calc(-1 * var(--space-16) + var(--space-5) - var(--space-5)); right: auto; }
  .sd-zig__step:nth-child(odd)::after, .sd-zig__step:nth-child(even)::after { left: calc(-1 * var(--space-6)); right: auto; width: var(--space-6); }
  .services-grid { grid-template-columns: repeat(2, 1fr); }
  .sd-cta__tiles { grid-template-columns: 1fr; }
}
@media (max-width: 640px) {
  .sd-hero { min-height: auto; padding-top: var(--space-12); }
  .sd-hero h1 { font-size: clamp(2rem, 8vw, 2.6rem); max-width: none; }
  .sd-scope { grid-template-columns: 1fr; }
  .sd-scope__item { border-right: 0; border-bottom: 1px solid var(--sd-line); }
  .sd-scope__item:last-child { border-bottom: 0; }
  .sd-finish__list { grid-template-columns: 1fr; }
  .services-grid { grid-template-columns: 1fr; }
  .sd-spec__row { grid-template-columns: 1fr; gap: var(--space-1); }
}
@media (max-width: 480px) {
  .sd-hero__actions .btn, .sd-cta__actions .btn, .sd-faq__aside .btn { width: 100%; justify-content: center; }
  .sd-proof__links a { width: 100%; justify-content: center; }
  .sd-finish__photos { grid-template-columns: 1fr; }
  .sd-finish__photos figure:last-child { transform: none; }
}

/* ---- color-mix() fallbacks for older engines ---- */
@supports not (background: color-mix(in srgb, red 50%, blue)) {
  :root {
    --sd-accent-soft: rgba(var(--color-primary-rgb), .08);
    --sd-gold-soft: rgba(var(--color-accent-rgb), .16);
    --sd-mist: rgba(var(--color-secondary-rgb), .05);
    --sd-line: rgba(var(--color-secondary-rgb), .12);
    --sd-line-dark: var(--color-gray-dark);
    --sd-white-90: var(--color-light);
    --sd-white-72: var(--color-gray-light);
    --sd-white-06: transparent;
    --sd-wood: var(--color-accent);
    --color-card-tint-1: rgba(var(--color-primary-rgb), .08);
    --color-card-tint-2: rgba(var(--color-secondary-rgb), .06);
    --color-card-tint-3: rgba(var(--color-accent-rgb), .12);
  }
  .sd-lane--replace { background: var(--sd-accent-soft); border-color: var(--sd-accent); }
  .sd-legend li, .sd-diagram, .sd-cta__tile { background: var(--color-secondary); }
}

/* ---- Touch devices: no hover lifts ---- */
@media (hover: none) {
  .sd-lane:hover, .sd-spec:hover, .sd-zig__step:hover, .service-card-with-image:hover { transform: none; box-shadow: var(--shadow-sm); }
  .sd-legend li:hover { transform: none; }
  .sd-finish__photos figure:hover img, .service-card-with-image:hover .service-card__image img { transform: none; }
  .sd-diagram .pin:hover { transform: none; }
}

/* ---- Forced colors / Windows high contrast ---- */
@media (forced-colors: active) {
  .sd-lane, .sd-spec, .sd-legend li, .sd-zig__step, .faq-item, .service-card-with-image, .sd-scope, .sd-cta__tile, .sd-diagram { border: 1px solid CanvasText; }
  .sd-hero::before, .sd-hero::after, .sd-cta::before, .sd-materials::before, .sd-eave::before, .sd-process::after, .sd-proof::before { display: none; }
  .sd-lane li::before, .sd-zig__step::before, .sd-legend li::before { forced-color-adjust: none; }
}

/* ---- Wide screens ---- */
@media (min-width: 1440px) {
  .sd-hero { min-height: 56vh; }
  .sd-hero h1 { font-size: var(--font-size-6xl); }
  .sd-eave__grid { gap: var(--space-16); }
  .sd-specs { gap: var(--space-8); }
  .sd-zig { max-width: 1000px; }
}

/* ---- FAQ open motion ---- */
.faq-item[open] .faq-answer { animation: sd-fade .28s ease both; }
@keyframes sd-fade {
  from { opacity: 0; transform: translateY(-4px); }
  to   { opacity: 1; transform: none; }
}

/* ---- Micro-interactions ---- */
.sd-scope__item strong { transition: color var(--transition-fast); }
.sd-scope__item:hover strong { color: var(--sd-accent); }
.sd-spec__head h3 { transition: transform var(--transition-base); }
.sd-spec:hover .sd-spec__head h3 { transform: translateX(var(--space-1)); }
.sd-entry__name { transition: color var(--transition-fast); }
.sd-entry:hover .sd-entry__name { color: var(--sd-gold); }
.sd-proof__links a:focus-visible, .sd-legend a:focus-visible, .sd-materials__read:focus-visible { outline-color: var(--color-white); }
.sd-materials__read:focus-visible { outline-color: var(--color-accent); }

/* ---- Skeleton tint while lazy images load ---- */
.sd-finish__photos figure { background: var(--sd-line); }
.service-card__image { background: var(--color-card-tint-neutral); }

/* ---- Print ---- */
@media print {
  .sd-hero, .sd-eave, .sd-proof, .sd-cta { background: none !important; color: var(--sd-ink) !important; }
  .sd-hero__bg, .sd-divider { display: none !important; }
  .sd-hero h1, .sd-eave .section-header h2, .sd-proof .section-header h2, .sd-cta h2, .sd-entry__name, .sd-legend strong { color: var(--sd-ink) !important; }
  .faq-item, .sd-spec, .sd-zig__step, .sd-entry { break-inside: avoid; }
  [data-animate] { opacity: 1 !important; transform: none !important; }
}
</style>

<div class="sd-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="sd-crumbs" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/services/">Services</a></li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Siding, Fascia &amp; Soffit</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="sd-hero hero--interior" aria-label="Siding, fascia and soffit repair in Greater Houston">
  <img class="sd-hero__bg"
       src="/assets/images/siding-fascia-soffit.jpg"
       srcset="/assets/images/siding-fascia-soffit-480.webp 480w, /assets/images/siding-fascia-soffit-960.webp 960w"
       sizes="100vw"
       alt="Crew member replacing siding on a dormer above a shingle roof"
       width="1200" height="1600" loading="eager" fetchpriority="high">
  <div class="container sd-hero__inner">
    <span class="sd-hero__kicker"><span>Siding</span><span>Fascia &amp; Soffit</span><span>Exterior Paint</span></span>
    <h1>Siding, Fascia &amp; Soffit Repair and Replacement in <span class="text-accent">Greater Houston</span></h1>
    <p class="hero-answer">
      Triple G Roofing &amp; Construction is a family-owned roofing and exterior contractor based in Humble, TX, serving
      the Greater Houston area since 1973. We repair and replace siding in fiber-cement, vinyl and wood, cut out and
      rebuild rotted fascia and soffit, re-seal windows and finish with matched exterior paint, so the outside of the
      house is handled by one crew on one written estimate. Inspections and estimates are free.
    </p>
    <div class="sd-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get My Free Written Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="sd-scope" aria-label="What this service covers">
      <div class="sd-scope__item">
        <?php echo icon('home', 22); ?>
        <div><strong>Siding repair &amp; replacement</strong><span>Hardie fiber-cement, vinyl and wood, matched to the existing profile</span></div>
      </div>
      <div class="sd-scope__item">
        <?php echo icon('hammer', 22); ?>
        <div><strong>Fascia &amp; soffit</strong><span>Wood-rot cut out and rebuilt, with the water source fixed</span></div>
      </div>
      <div class="sd-scope__item">
        <?php echo icon('shield', 22); ?>
        <div><strong>Window re-sealing</strong><span>Failed caulk and trim around windows and doors</span></div>
      </div>
      <div class="sd-scope__item">
        <?php echo icon('check-circle', 22); ?>
        <div><strong>Exterior paint</strong><span>Color-matched finish on repaired boards and trim</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 2 · REPAIR VS REPLACE ===================== -->
<section class="section sd-lanes" aria-label="Siding repair versus replacement">
  <div class="container">
    <div class="section-header" style="max-width:800px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Repair or Replace?</span>
      <h2>Do I need siding repair or a full siding replacement?</h2>
      <p class="answer-block">
        Repair when the damage is confined to one area: a rotted bottom course, a cracked panel, a dormer, a few split
        trim boards. Replace when rot, warping or failed paint shows up on most sides of the house, or when moisture is
        getting behind the panels and into the sheathing. Triple G Roofing &amp; Construction opens up the damaged area
        and checks behind it before recommending either one.
      </p>
      <span class="sd-updated">Last Updated: <?php echo date('F Y'); ?></span>
    </div>
    <div class="sd-lanes__grid">
      <div class="sd-lane sd-rv-left" data-animate>
        <h3><?php echo icon('wrench', 24); ?> Repair makes sense when</h3>
        <p>The rest of the siding is sound and the fix will blend in.</p>
        <ul>
          <li>Rot is limited to the bottom course, a corner or one wall</li>
          <li>A single panel or board is cracked, split or wind-damaged</li>
          <li>A dormer or gable is weathering faster than the rest of the house</li>
          <li>Trim and caulk have failed but the boards behind them are dry</li>
          <li>The siding profile is still available to match</li>
        </ul>
      </div>
      <div class="sd-lanes__or" aria-hidden="true"><span>OR</span></div>
      <div class="sd-lane sd-lane--replace sd-rv-right" data-animate>
        <h3><?php echo icon('home', 24); ?> Replacement makes sense when</h3>
        <p>Patching would just chase the damage around the house.</p>
        <ul>
          <li>Rot, warping or swelling shows up on most elevations</li>
          <li>Paint is failing everywhere, not just where the sun hits</li>
          <li>Moisture or mold is behind the panels and in the sheathing</li>
          <li>The original siding is discontinued and cannot be matched</li>
          <li>You want to move from vinyl or wood to fiber-cement</li>
        </ul>
      </div>
    </div>
    <p class="sd-lanes__note sd-rv-scale" data-animate>Searching for siding repair near me in Houston and not sure which lane you are in? The inspection is free, and we will show you what is behind the damage before you decide.</p>
  </div>
</section>

<div class="sd-divider sd-divider--lap" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 44" preserveAspectRatio="none"><path d="M0,44 L0,22 L300,30 L300,14 L600,22 L600,6 L900,14 L900,0 L1200,8 L1200,44 Z" fill="var(--sd-mist)"/></svg>
</div>

<!-- ===================== 3 · MATERIALS ===================== -->
<section class="section sd-materials" aria-label="Siding materials compared">
  <div class="container">
    <div class="section-header" style="max-width:800px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Material Choices</span>
      <h2>Fiber-cement, vinyl or wood: which siding holds up in Houston?</h2>
      <p class="answer-block">
        Fiber-cement (Hardie board) handles Gulf Coast humidity, termites and heat best and holds paint well, which is
        why Triple G Roofing &amp; Construction installs it most often. Vinyl costs less up front but can warp and is
        hard to match later. Wood looks right on older homes and repairs easily in small sections, but it needs the
        most upkeep. Here is how they compare.
      </p>
    </div>
    <div class="sd-specs">
      <article class="sd-spec sd-spec--fc sd-rv-down" data-animate>
        <div class="sd-spec__head"><small>Most installed</small><h3>Fiber-cement (Hardie)</h3></div>
        <dl class="sd-spec__rows">
          <div class="sd-spec__row"><dt>Strength</dt><dd>Resists rot, termites, fire and hail; does not warp in summer heat.</dd></div>
          <div class="sd-spec__row"><dt>Watch for</dt><dd>Heavy planks that must be flashed and gapped correctly, or water gets behind them.</dd></div>
          <div class="sd-spec__row"><dt>Paint</dt><dd>Holds paint longer than wood; available pre-finished or painted on site.</dd></div>
        </dl>
        <p class="sd-spec__pick"><strong>Good fit:</strong> homeowners replacing rotted wood or warped vinyl who want to do it once.</p>
      </article>
      <article class="sd-spec sd-spec--vinyl sd-rv-down reveal-delay-1" data-animate>
        <div class="sd-spec__head"><small>Budget option</small><h3>Vinyl</h3></div>
        <dl class="sd-spec__rows">
          <div class="sd-spec__row"><dt>Strength</dt><dd>Lower upfront cost, never needs paint, easy to clean.</dd></div>
          <div class="sd-spec__row"><dt>Watch for</dt><dd>Can warp near grills and reflective windows, cracks on impact, fades unevenly.</dd></div>
          <div class="sd-spec__row"><dt>Paint</dt><dd>Not usually painted; a faded wall is hard to match with new panels.</dd></div>
        </dl>
        <p class="sd-spec__pick"><strong>Good fit:</strong> rental and budget-driven projects where a uniform replacement is planned.</p>
      </article>
      <article class="sd-spec sd-spec--wood sd-rv-down reveal-delay-2" data-animate>
        <div class="sd-spec__head"><small>Traditional</small><h3>Wood</h3></div>
        <dl class="sd-spec__rows">
          <div class="sd-spec__row"><dt>Strength</dt><dd>Classic look on older homes; small sections are simple to cut out and replace.</dd></div>
          <div class="sd-spec__row"><dt>Watch for</dt><dd>Most exposed to rot, termites and woodpeckers in our humidity; needs regular sealing.</dd></div>
          <div class="sd-spec__row"><dt>Paint</dt><dd>Needs repainting on a schedule; bare wood left unpainted fails fast.</dd></div>
        </dl>
        <p class="sd-spec__pick"><strong>Good fit:</strong> spot repairs on a wood-sided home where matching the original matters most.</p>
      </article>
    </div>
    <a class="sd-materials__read" href="/blog/vinyl-siding-vs-hardie-board-texas/">Read our full vinyl vs. Hardie board comparison for Texas <?php echo icon('external-link', 18); ?></a>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE — THE EAVE ===================== -->
<section class="section sd-eave" aria-label="Why fascia and soffit rot and how we fix it">
  <div class="container">
    <div class="section-header" style="max-width:800px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow">The Eave, Annotated</span>
      <h2>Why do fascia and soffit boards rot, and what does Triple G fix?</h2>
      <p class="answer-block">
        Fascia and soffit rot because water sits where it should not: gutters overflow onto the fascia, missing drip
        edge lets rain wick behind it, and a stuffy attic holds humid air against the soffit from the inside. Triple G
        Roofing &amp; Construction replaces the rotted wood and corrects the cause, which is why our fascia jobs often
        touch the gutters and attic vents too.
      </p>
    </div>
    <div class="sd-eave__grid">
      <div class="sd-diagram sd-rv-left" data-animate>
        <svg viewBox="0 0 640 400" role="img" aria-labelledby="sd-diagram-title sd-diagram-desc">
          <title id="sd-diagram-title">Cross-section of a roof eave</title>
          <desc id="sd-diagram-desc">Diagram showing shingles and decking sloping to the eave, drip edge, fascia board, gutter, vented soffit and wall siding, with attic airflow entering through the soffit vents.</desc>
          <!-- wall + siding -->
          <rect x="60" y="200" width="270" height="200" fill="var(--color-light)"/>
          <g stroke="var(--color-gray-light)" stroke-width="2">
            <line x1="60" y1="222" x2="330" y2="222"/><line x1="60" y1="246" x2="330" y2="246"/><line x1="60" y1="270" x2="330" y2="270"/>
            <line x1="60" y1="294" x2="330" y2="294"/><line x1="60" y1="318" x2="330" y2="318"/><line x1="60" y1="342" x2="330" y2="342"/>
            <line x1="60" y1="366" x2="330" y2="366"/><line x1="60" y1="390" x2="330" y2="390"/>
          </g>
          <!-- attic cavity -->
          <polygon points="60,76 330,158 330,200 60,200" fill="var(--color-secondary)" opacity=".55"/>
          <!-- soffit panel with vents -->
          <rect x="60" y="180" width="310" height="22" fill="var(--color-white)"/>
          <g fill="var(--color-gray-light)">
            <rect x="150" y="186" width="40" height="10" rx="2"/><rect x="200" y="186" width="40" height="10" rx="2"/><rect x="250" y="186" width="40" height="10" rx="2"/>
          </g>
          <!-- decking + shingles on slope -->
          <polygon points="40,56 380,152 380,172 40,76" fill="var(--sd-wood)"/>
          <polygon points="36,42 384,140 384,154 36,56" fill="var(--color-secondary)"/>
          <g stroke="var(--color-dark)" stroke-width="2">
            <line x1="90" y1="58" x2="96" y2="73"/><line x1="150" y1="75" x2="156" y2="90"/><line x1="210" y1="92" x2="216" y2="107"/><line x1="270" y1="109" x2="276" y2="124"/><line x1="330" y1="126" x2="336" y2="141"/>
          </g>
          <!-- drip edge -->
          <polyline points="372,146 392,152 392,176" fill="none" stroke="var(--sd-gold)" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
          <!-- fascia board -->
          <rect x="370" y="150" width="22" height="62" fill="var(--sd-wood)"/>
          <!-- gutter -->
          <path d="M392,166 L436,166 L436,188 Q436,210 414,210 L392,210 Z" fill="var(--color-gray-dark)"/>
          <!-- rain drops into gutter -->
          <g fill="var(--color-light)" opacity=".9">
            <circle cx="404" cy="124" r="3"/><circle cx="416" cy="108" r="3"/><circle cx="410" cy="140" r="3"/>
          </g>
          <!-- airflow arrows through soffit into attic -->
          <g fill="none" stroke="var(--sd-gold)" stroke-width="3" stroke-linecap="round">
            <path class="flow" d="M220,240 C220,215 190,200 170,180 C150,160 140,130 150,105"/>
            <path class="flow" d="M290,250 C290,225 260,205 245,185 C230,165 220,140 230,115"/>
          </g>
          <g fill="var(--sd-gold)">
            <polygon points="150,105 142,118 158,116"/>
            <polygon points="230,115 222,128 238,126"/>
          </g>
          <!-- numbered pins -->
          <g class="pin"><circle cx="210" cy="82" r="16" fill="var(--sd-gold)"/><text x="210" y="87" text-anchor="middle" font-size="15" font-weight="800" fill="var(--color-secondary)" font-family="var(--font-heading)">1</text></g>
          <g class="pin"><circle cx="392" cy="130" r="16" fill="var(--sd-gold)"/><text x="392" y="135" text-anchor="middle" font-size="15" font-weight="800" fill="var(--color-secondary)" font-family="var(--font-heading)">2</text></g>
          <g class="pin"><circle cx="354" cy="232" r="16" fill="var(--sd-gold)"/><text x="354" y="237" text-anchor="middle" font-size="15" font-weight="800" fill="var(--color-secondary)" font-family="var(--font-heading)">3</text></g>
          <g class="pin"><circle cx="460" cy="196" r="16" fill="var(--sd-gold)"/><text x="460" y="201" text-anchor="middle" font-size="15" font-weight="800" fill="var(--color-secondary)" font-family="var(--font-heading)">4</text></g>
          <g class="pin"><circle cx="110" cy="191" r="16" fill="var(--sd-gold)"/><text x="110" y="196" text-anchor="middle" font-size="15" font-weight="800" fill="var(--color-secondary)" font-family="var(--font-heading)">5</text></g>
          <g class="pin"><circle cx="100" cy="330" r="16" fill="var(--sd-gold)"/><text x="100" y="335" text-anchor="middle" font-size="15" font-weight="800" fill="var(--color-secondary)" font-family="var(--font-heading)">6</text></g>
          <!-- label -->
          <text x="470" y="300" font-size="13" fill="var(--color-light)" font-family="var(--font-body)" opacity=".8">Not to scale</text>
        </svg>
      </div>
      <ol class="sd-legend sd-rv-right" data-animate>
        <li><div><strong>Shingles and decking</strong><p>Where the roof ends, water has to be handed off cleanly. Worn shingles at the eave let it run under instead of off.</p></div></li>
        <li><div><strong>Drip edge</strong><p>The metal lip that kicks water into the gutter. When it is missing or short, rain wicks straight back onto the fascia.</p></div></li>
        <li><div><strong>Fascia board</strong><p>The vertical board the gutter hangs on. Once it is soft, the gutter pulls loose and the rot spreads. We cut it out and rebuild it.</p></div></li>
        <li><div><strong>Gutter</strong><p>Overflowing, sagging or clogged gutters are the most common reason fascia rots. Our <a href="/services/gutter-installation/">gutter installation</a> team sizes and hangs them to keep water moving.</p></div></li>
        <li><div><strong>Vented soffit</strong><p>The underside panel that lets air into the attic. Blocked or rotted soffit starves the attic of intake. See <a href="/services/attic-venting/">attic venting</a> for why that matters for your roof.</p></div></li>
        <li><div><strong>Siding</strong><p>The wall below takes the splash from everything above it. Bottom courses and corners rot first, and that is where most siding repairs start.</p></div></li>
      </ol>
    </div>
  </div>
</section>

<div class="sd-divider sd-divider--swoop" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,0 L1200,0 L1200,20 C1000,76 700,76 500,40 C350,14 150,14 0,40 Z" fill="var(--color-dark)"/></svg>
</div>

<!-- ===================== 5 · FINISHING WORK ===================== -->
<section class="section sd-finish" aria-label="Window re-sealing, exterior paint and matching trim">
  <div class="container">
    <div class="sd-finish__grid">
      <div class="sd-rv-left" data-animate>
        <span class="eyebrow">The Finishing Work</span>
        <h2>What finishes a siding or trim repair so it does not look like a patch?</h2>
        <p>
          Triple G Roofing &amp; Construction finishes siding and fascia work with three things most exterior repairs
          skip: the trim profile is matched, windows and doors are re-sealed where old caulk has pulled away, and new
          boards are painted to match the rest of the house. If the same leak damaged sheetrock inside, we repair that
          too, so one crew closes out the whole problem.
        </p>
        <ul class="sd-finish__list">
          <li><?php echo icon('check-circle', 20); ?> Trim and siding profiles matched to the existing house</li>
          <li><?php echo icon('check-circle', 20); ?> Windows and doors re-sealed with fresh caulk and flashing</li>
          <li><?php echo icon('check-circle', 20); ?> Exterior paint color-matched on repaired boards</li>
          <li><?php echo icon('check-circle', 20); ?> Interior sheetrock repaired when the leak got inside</li>
        </ul>
        <div class="sd-quotes">
          <blockquote class="sd-quote">Tim did a great job repairing and matching paint.<cite>Tiffany, Spring, TX &mdash; siding repair on all sides of her home</cite></blockquote>
          <blockquote class="sd-quote">Windows sealed, siding replacement, and exterior paint &hellip; his crew started on time every day, cleaned up the work-space at the end of each day.<cite>Clint, Humble, TX</cite></blockquote>
        </div>
      </div>
      <div class="sd-finish__photos sd-rv-right" data-animate>
        <figure>
          <?php echo sdImg('screened-porch', 'Screened porch with fresh exterior paint and new screens', 491, 919, [480], '(max-width: 900px) 45vw, 220px'); ?>
          <figcaption>Fresh exterior paint and new screens</figcaption>
        </figure>
        <figure>
          <?php echo sdImg('siding-dormer', 'Dormer siding replaced with new fiber-cement panels', 1000, 1333, [480, 960], '(max-width: 900px) 45vw, 220px'); ?>
          <figcaption>Dormer re-sided in fiber-cement</figcaption>
        </figure>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROCESS ===================== -->
<section class="section sd-process" aria-label="How a siding or fascia job works">
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Start to Finish</span>
      <h2>How does a siding, fascia or soffit job work with Triple G?</h2>
      <p class="answer-block">
        Triple G Roofing &amp; Construction runs exterior repairs in five steps: a free walkthrough that probes for rot,
        a written estimate with material options, removal of the damaged material and a look at the sheathing behind it,
        installation with proper flashing and sealing, and paint-matching with a daily cleanup. The owner is on every job.
      </p>
    </div>
    <div class="sd-zig">
      <div class="sd-zig__step sd-rv-left" data-animate>
        <h3>Walkthrough and moisture check</h3>
        <p>Tim walks every elevation, probes suspect boards for soft wood, looks at the gutters and soffit vents, and photographs what he finds.</p>
      </div>
      <div class="sd-zig__step sd-rv-right" data-animate>
        <h3>Written estimate with options</h3>
        <p>A free written estimate that spells out repair versus replacement and the material choices, so you can decide against your budget.</p>
      </div>
      <div class="sd-zig__step sd-rv-left" data-animate>
        <h3>Remove and look behind it</h3>
        <p>Damaged siding, fascia or soffit comes off and we check the sheathing and framing underneath. Hidden rot gets replaced, not covered.</p>
      </div>
      <div class="sd-zig__step sd-rv-right" data-animate>
        <h3>Install, flash and seal</h3>
        <p>New material goes on with correct gaps and flashing; windows and doors in the work area are re-sealed so water has nowhere to get back in.</p>
      </div>
      <div class="sd-zig__step sd-rv-left" data-animate>
        <h3>Paint-match, clean up, walk through</h3>
        <p>Repaired boards are painted to match, the work area is cleaned at the end of each day, and you inspect the finished job with Tim before the crew leaves.</p>
      </div>
    </div>
  </div>
</section>

<div class="sd-divider sd-divider--peak" aria-hidden="true" style="background:var(--color-secondary);">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none"><polygon fill="var(--sd-accent-soft)" points="0,0 1200,0 1200,12 600,56 0,12"/></svg>
</div>

<!-- ===================== 7 · PROOF ===================== -->
<section class="section sd-proof" aria-label="Customer reviews">
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow">In Their Words</span>
      <h2>What do customers say about Triple G&rsquo;s siding and exterior work?</h2>
      <p class="answer-block">
        These are real reviews from Triple G Roofing &amp; Construction customers, published on our own site with first
        name and city. Voted a Nextdoor Neighborhood Favorite in 2022, 2023 and 2024, we are a father-and-son team, and
        the owner is on every job.
      </p>
    </div>
    <div class="sd-ledger">
      <?php foreach ($reviews as $i => $r): ?>
      <article class="sd-entry <?php echo $i % 2 === 0 ? 'sd-rv-left' : 'sd-rv-right'; ?>" data-animate>
        <div class="sd-entry__who">
          <span class="sd-entry__name"><?php echo htmlspecialchars($r['name']); ?></span>
          <span class="sd-entry__city"><?php echo htmlspecialchars($r['city']); ?></span>
          <span class="sd-entry__tag"><?php echo $r['service'] === 'siding-fascia-soffit' ? 'Siding & exterior' : 'Roofing'; ?></span>
        </div>
        <blockquote><p><?php echo htmlspecialchars($r['text']); ?></p></blockquote>
      </article>
      <?php endforeach; ?>
    </div>
    <div class="sd-proof__links" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section sd-faq" aria-label="Siding, fascia and soffit FAQs">
  <div class="container">
    <div class="sd-faq__grid">
      <aside class="sd-faq__aside">
        <span class="eyebrow">Good Questions</span>
        <h2>What do homeowners ask about siding, fascia and soffit work?</h2>
        <p>Straight answers on repair versus replacement, materials, rot, matching and cost. If your question is not here, call and ask Tim directly.</p>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
      </aside>
      <div>
        <?php foreach ($faqs as $i => $f): ?>
        <details class="faq-item"<?php echo $i === 0 ? ' open' : ''; ?> data-animate>
          <summary>
            <?php echo htmlspecialchars($f['q']); ?>
            <span class="sd-faq__toggle" aria-hidden="true"><?php echo icon('plus', 16); ?></span>
          </summary>
          <div class="faq-answer"><p><?php echo htmlspecialchars($f['a']); ?></p></div>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===================== FINAL CTA ===================== -->
<section class="sd-cta" aria-label="Get a free siding estimate">
  <div class="container">
    <h2>Ready to fix the rot and make the outside of your house look whole again?</h2>
    <p>Book a free walkthrough with Triple G Roofing &amp; Construction. We will find what is behind the damage, give you a written estimate for repair or replacement, and finish with matched trim and paint.</p>
    <div class="sd-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get My Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <div class="sd-cta__tiles">
      <div class="sd-cta__tile"><strong>Since 1973</strong>Serving the Greater Houston area</div>
      <div class="sd-cta__tile"><strong>Father &amp; son</strong>Family owned and operated</div>
      <div class="sd-cta__tile"><strong>Free estimates</strong>Written, with photos of what we found</div>
    </div>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section sd-related" aria-label="Other exterior services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow-label">What We Do</span>
      <h2>What other <span class="text-accent">exterior services</span> pair with siding and trim work?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark); max-width:64ch; margin-inline:auto;">Fascia rarely rots on its own. Triple G Roofing &amp; Construction hangs the gutters that keep water off it, repairs the roof leaks that feed it, and builds the patio covers, pergolas and decks that share the same trim and paint, all on one written estimate.</p>
      <span class="section-subtitle">Roofing, siding, gutters and more, one call</span>
    </div>
    <div class="services-grid">
      <?php foreach ($relatedServices as $i => $s):
        $tint = ($i % 3) + 1;
        $set = [];
        foreach ($s['variants'] as $v) { $set[] = '/assets/images/' . $s['img'] . '-' . $v . '.webp ' . $v . 'w'; }
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-delay-<?php echo $tint; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $s['img']; ?>.jpg"
               srcset="<?php echo implode(', ', $set); ?>"
               sizes="(max-width: 640px) 100vw, (max-width: 900px) 50vw, 380px"
               alt="<?php echo htmlspecialchars($s['alt']); ?>" width="<?php echo $s['w']; ?>" height="<?php echo $s['h']; ?>" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo $s['icon']; ?></div>
          <h3><?php echo htmlspecialchars($s['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($s['desc']); ?></p>
          <ul>
            <?php foreach ($s['bullets'] as $b): ?>
            <li><?php echo htmlspecialchars($b); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo $s['slug']; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</div><!-- /.sd-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
