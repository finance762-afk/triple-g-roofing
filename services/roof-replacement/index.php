<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Service — Roof Replacement · Triple G Roofing & Construction
   Premium editorial service page (8-section structure)
   Facts: references/CLIENT-FACTS.md only. Photos: photo-manifest.
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Roof Replacement';
$serviceSlug     = 'roof-replacement';
$pageTitle       = 'Roof Replacement Greater Houston | Triple G Roofing';
$pageDescription = 'Shingle and metal roof replacement across Greater Houston from Triple G Roofing. Family-owned since 1973, free written estimates. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';
$ogImage         = 'roof-replacement-960.webp';

/* Service record from config (drives schema description) */
$service = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $service = $s; break; } }

/* Real reviews tagged for this service */
$reviews = getTestimonialsFor('roof-replacement', 3);

/* --- FAQs (fact-safe; mirrored in FAQPage JSON-LD) --- */
$faqs = [
    [
        'q' => 'How do I know if I need a roof replacement instead of a repair?',
        'a' => 'Replacement usually makes more sense than repair when leaks show up in more than one area, when the decking feels soft or sags between rafters, or when an asphalt roof has been through 20 or more years of Gulf Coast heat and storms. Triple G Roofing & Construction inspects the roof for free, photographs what we find, and tells you plainly whether a repair will hold or whether you are better off replacing.',
    ],
    [
        'q' => 'How long does a roof replacement take?',
        'a' => 'Most residential roof replacements are completed in one to two days depending on the size of the roof, its pitch, the condition of the decking, and the weather. Materials are delivered ahead of time, the crew works from sun-up to sun-down, and your landscaping and pool are covered with tarps before the first shingle comes off.',
    ],
    [
        'q' => 'What does a roof replacement cost in the Greater Houston area?',
        'a' => 'The cost depends on the roof\'s square footage and pitch, how much decking needs to be replaced, the number of penetrations and vents, and the material you choose. Triple G Roofing & Construction does not quote a roof over the phone. We inspect it, measure it on the roof, and give you a free written estimate with no obligation.',
    ],
    [
        'q' => 'Can you help with my insurance claim if the roof was damaged in a storm?',
        'a' => 'Yes. Triple G Roofing & Construction brings more than 50 years of claims-handling and adjuster experience to the table. We document the damage with photos, meet your adjuster on the roof, and explain your policy in plain English. Whether a claim is approved is always the carrier\'s decision, but you will understand the process from start to finish.',
    ],
    [
        'q' => 'Do you install metal roofs as well as shingles?',
        'a' => 'Yes. Triple G Roofing & Construction installs architectural shingle roofs and metal roofs, including corrugated and standing-seam panels. Our metal work covers homes, barns, shops and outbuildings, and we also convert thatched poolside palapas to metal roofing.',
    ],
    [
        'q' => 'Does attic ventilation really matter on a new roof?',
        'a' => 'It matters more than most homeowners realize. Shingle manufacturers can void or limit the shingle warranty when the attic is not ventilated to their specification, and a hot, trapped attic cooks shingles from underneath. Triple G Roofing & Construction checks intake and exhaust on every replacement and will recommend ridge or box vents when the balance is off.',
    ],
];

/* --- Related services (3 cards — required services-grid markup) --- */
$relatedServices = [
    [
        'name' => 'Roof Repair', 'slug' => 'roof-repair', 'img' => 'roof-repair-v2', 'variants' => [480, 960],
        'alt' => 'New step flashing sealed against a brick chimney during a roof repair',
        'desc' => 'Leak repairs, flashing and pipe-boot fixes, and rotted-decking repair.',
        'bullets' => ['Leak traced to its source', 'Photos of every finding', 'Free written estimate'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z"/></svg>',
    ],
    [
        'name' => 'Storm & Wind Damage Roof Repair', 'slug' => 'storm-damage-repair', 'img' => 'storm-damage-repair-v2', 'variants' => [480, 960],
        'alt' => 'Tarped roof with a Triple G crew starting storm damage repairs',
        'desc' => 'Hail, wind and hurricane damage repair with claims-process help.',
        'bullets' => ['Damage documented with photos', 'We meet your adjuster', 'Ask about temporary tarping'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>',
    ],
    [
        'name' => 'Attic Venting', 'slug' => 'attic-venting', 'img' => 'attic-venting-v2', 'variants' => [480, 960],
        'alt' => 'Freshly shingled roof with box vents installed for attic ventilation',
        'desc' => 'Balanced intake and exhaust that protects shingles and cools the attic.',
        'bullets' => ['Protects your shingle warranty', 'Ridge and box vents', 'Lower attic temperatures'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"/><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"/><path d="M9.8 4.4A2 2 0 1 1 11 8H2"/></svg>',
    ],
];

/* --- Schema: Service + BreadcrumbList + FAQPage --- */
$serviceSchema = [
    "@context"    => "https://schema.org",
    "@type"       => "Service",
    "@id"         => $canonicalUrl . '#service-' . $serviceSlug,
    "serviceType" => $serviceName,
    "name"        => $serviceName . ' in the Greater Houston Area',
    "description" => $service ? $service['description'] : 'Architectural shingle and metal roof replacement across the Greater Houston area.',
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
function rpImg($name, $alt, $w, $h, $variants, $sizes, $eager = false) {
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
   Roof Replacement — page-specific styles (Premium tier)
   Tokens only. Signature section: "Anatomy of a Triple G roof"
   layered cut-away stack. Prefix: rp-
   ============================================================ */
:root {
  --rp-ink: var(--color-dark);
  --rp-accent: var(--color-primary);
  --rp-accent-soft: color-mix(in srgb, var(--color-primary) 9%, var(--color-white));
  --rp-gold-soft: color-mix(in srgb, var(--color-accent) 14%, var(--color-white));
  --rp-line: color-mix(in srgb, var(--color-secondary) 12%, var(--color-white));
  --rp-line-dark: color-mix(in srgb, var(--color-white) 12%, transparent);
  --rp-white-90: color-mix(in srgb, var(--color-white) 90%, transparent);
  --rp-white-72: color-mix(in srgb, var(--color-white) 72%, transparent);
  --rp-white-06: color-mix(in srgb, var(--color-white) 6%, transparent);
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, var(--color-white));
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, var(--color-white));
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, var(--color-white));
  --color-card-tint-neutral: var(--color-white);
}
.rp-page h1, .rp-page h2, .rp-page h3 { text-wrap: balance; }
.rp-page .section-header p.answer-block { max-width: 72ch; }
[data-animate].reveal-delay-1 { transition-delay: .08s; }
[data-animate].reveal-delay-2 { transition-delay: .16s; }
[data-animate].reveal-delay-3 { transition-delay: .24s; }
[data-animate].reveal-delay-4 { transition-delay: .32s; }

/* ---- Breadcrumb (strip with hairline + accent tick) ---- */
.rp-crumbs { background: var(--color-white); border-bottom: 1px solid var(--rp-line); }
.rp-crumbs ol { list-style: none; display: flex; flex-wrap: wrap; align-items: center; gap: var(--space-2); margin: 0; padding: var(--space-3) 0; font-size: var(--font-size-sm); color: var(--color-gray); }
.rp-crumbs li { display: inline-flex; align-items: center; gap: var(--space-2); }
.rp-crumbs a { color: var(--color-gray-dark); transition: color var(--transition-fast); }
.rp-crumbs a:hover { color: var(--rp-accent); }
.rp-crumbs [aria-current] { color: var(--rp-accent); font-weight: 600; }
.rp-crumbs__sep { width: 6px; height: 6px; border-radius: var(--radius-full); background: var(--color-gray-light); display: inline-block; }

/* =====================================================
   1 · HERO — layered photo + gradient + noise,
   split with a "what you get" ledger (no reveals above fold)
   ===================================================== */
.rp-hero {
  position: relative;
  min-height: 64vh;
  display: flex;
  align-items: center;
  padding: var(--space-16) 0 var(--space-16);
  overflow: hidden;
  background: var(--color-secondary);
  isolation: isolate;
}
.rp-hero__bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 35%; z-index: 0; }
.rp-hero::before { content: ''; position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(100deg, rgba(var(--color-secondary-rgb), .96) 0%, rgba(var(--color-secondary-rgb), .86) 42%, rgba(var(--color-secondary-rgb), .5) 100%); }
.rp-hero::after { content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none; opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.rp-hero__grid { position: relative; z-index: 2; display: grid; grid-template-columns: minmax(0, 1.25fr) minmax(280px, .75fr); gap: var(--space-12); align-items: end; }
.rp-hero__kicker { display: inline-flex; align-items: center; gap: var(--space-2); font-family: var(--font-heading); font-size: var(--font-size-xs); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--color-accent); margin-bottom: var(--space-5); }
.rp-hero__kicker::before { content: ''; width: 28px; height: 2px; background: var(--color-accent); border-radius: var(--radius-full); }
.rp-hero h1 { color: var(--color-white); font-size: clamp(2.3rem, 5vw, 3.9rem); line-height: 1.04; margin-bottom: var(--space-5); }
.rp-hero h1 .text-accent { font-size: 1.06em; }
.rp-hero .hero-answer { color: var(--rp-white-90); font-size: var(--font-size-lg); line-height: 1.7; max-width: 62ch; margin-bottom: var(--space-6); }
.rp-hero__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.rp-hero__actions .btn svg { width: 18px; height: 18px; }
.rp-hero__ledger { background: var(--rp-white-06); border: 1px solid var(--rp-line-dark); border-radius: var(--radius-lg); padding: var(--space-6); backdrop-filter: blur(6px); }
.rp-hero__ledger h2 { color: var(--color-white); font-size: var(--font-size-base); letter-spacing: 1px; text-transform: uppercase; margin-bottom: var(--space-4); padding-bottom: var(--space-3); border-bottom: 1px solid var(--rp-line-dark); }
.rp-hero__ledger ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-3); }
.rp-hero__ledger li { display: flex; gap: var(--space-3); align-items: flex-start; color: var(--rp-white-90); font-size: var(--font-size-sm); line-height: 1.5; }
.rp-hero__ledger li svg { width: 18px; height: 18px; color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.rp-hero__stamp { margin-top: var(--space-5); font-family: var(--font-accent); font-size: var(--font-size-xl); color: var(--color-accent); line-height: 1.2; }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background: var(--rp-accent-soft); border-left: 4px solid var(--rp-accent); border-radius: var(--radius-md); padding: var(--space-5) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-lg); margin: var(--space-4) auto 0; text-align: left; }
.rp-updated { display: inline-block; margin-top: var(--space-4); font-size: var(--font-size-xs); letter-spacing: 1px; text-transform: uppercase; color: var(--color-gray); }

/* =====================================================
   2 · REPAIR VS REPLACE — decision rail + tall photo
   ===================================================== */
.rp-decide { background: var(--color-white); position: relative; }
.rp-decide__grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(280px, 420px); gap: var(--space-12); align-items: start; }
.rp-decide__rail { counter-reset: decide; display: grid; gap: var(--space-5); margin-top: var(--space-8); }
.rp-decide__item { position: relative; display: grid; grid-template-columns: var(--space-16) 1fr; gap: var(--space-4); padding: var(--space-5) 0; border-top: 1px solid var(--rp-line); }
.rp-decide__item:last-child { border-bottom: 1px solid var(--rp-line); }
.rp-decide__item::before { counter-increment: decide; content: counter(decide, decimal-leading-zero); font-family: var(--font-heading); font-weight: 800; font-size: clamp(2rem, 4vw, 2.8rem); line-height: 1; color: var(--rp-accent); opacity: .85; }
.rp-decide__item h3 { font-size: var(--font-size-lg); color: var(--rp-ink); margin-bottom: var(--space-2); }
.rp-decide__item p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }
.rp-decide__verdict { margin-top: var(--space-6); display: flex; gap: var(--space-3); align-items: flex-start; background: var(--rp-gold-soft); border-radius: var(--radius-md); padding: var(--space-4) var(--space-5); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }
.rp-decide__verdict svg { width: 20px; height: 20px; color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.rp-decide__figure { position: relative; margin: 0; }
.rp-decide__frame { position: relative; aspect-ratio: 3 / 4; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); }
.rp-decide__frame img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.rp-decide__figure:hover .rp-decide__frame img { transform: scale(1.04); }
.rp-decide__figure::before { content: ''; position: absolute; inset: var(--space-4) calc(-1 * var(--space-4)) calc(-1 * var(--space-4)) var(--space-4); border: 2px solid var(--rp-accent); border-radius: var(--radius-lg); z-index: -1; }
.rp-decide__figure figcaption { position: absolute; left: var(--space-4); bottom: var(--space-4); right: var(--space-4); background: rgba(var(--color-secondary-rgb), .82); color: var(--color-white); font-size: var(--font-size-xs); padding: var(--space-2) var(--space-3); border-radius: var(--radius-sm); backdrop-filter: blur(4px); }

/* =====================================================
   3 · SIGNATURE — ANATOMY OF A TRIPLE G ROOF
   Layered cut-away stack: each install layer is a plane
   offset and tilted to read as a roof cross-section.
   ===================================================== */
.rp-anatomy { background: var(--color-light); position: relative; overflow: hidden; }
.rp-anatomy::before { content: ''; position: absolute; right: -10%; top: -20%; width: 48vw; height: 48vw; border-radius: var(--radius-full); pointer-events: none;
  background: radial-gradient(circle, rgba(var(--color-primary-rgb), .08) 0%, transparent 65%); }
.rp-anatomy .container { position: relative; z-index: 1; }
.rp-anatomy__grid { display: grid; grid-template-columns: minmax(0, 1.15fr) minmax(260px, .85fr); gap: var(--space-12); align-items: center; margin-top: var(--space-10); }
.rp-layers { list-style: none; margin: 0; padding: 0; counter-reset: layer; display: grid; gap: var(--space-3); perspective: 1200px; }
.rp-layer {
  --i: 0;
  position: relative;
  display: grid;
  grid-template-columns: var(--space-12) 1fr;
  gap: var(--space-4);
  align-items: center;
  background: var(--color-white);
  border: 1px solid var(--rp-line);
  border-radius: var(--radius-md);
  padding: var(--space-4) var(--space-5);
  margin-left: calc(var(--i) * var(--space-4));
  box-shadow: var(--shadow-sm);
  transform: rotateX(0) translateZ(0);
  transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
}
.rp-layer:nth-child(1) { --i: 5; }
.rp-layer:nth-child(2) { --i: 4; }
.rp-layer:nth-child(3) { --i: 3; }
.rp-layer:nth-child(4) { --i: 2; }
.rp-layer:nth-child(5) { --i: 1; }
.rp-layer:nth-child(6) { --i: 0; }
.rp-layer::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 5px; border-radius: var(--radius-md) 0 0 var(--radius-md); background: linear-gradient(to bottom, var(--rp-accent), var(--color-accent)); opacity: .35; transition: opacity var(--transition-base); }
.rp-layer:hover, .rp-layer:focus-within { transform: translateX(var(--space-2)) rotateX(-2deg); box-shadow: var(--shadow-lg); border-color: color-mix(in srgb, var(--rp-accent) 35%, var(--rp-line)); }
.rp-layer:hover::before { opacity: 1; }
.rp-layer__num { counter-increment: layer; width: var(--space-10); height: var(--space-10); border-radius: var(--radius-full); background: var(--color-secondary); color: var(--color-white); display: flex; align-items: center; justify-content: center; font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-sm); }
.rp-layer__num::before { content: counter(layer); }
.rp-layer h3 { font-size: var(--font-size-base); color: var(--rp-ink); margin: 0 0 var(--space-1); }
.rp-layer p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; }
.rp-layer__tag { display: inline-block; margin-left: var(--space-2); font-size: var(--font-size-xs); font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: var(--rp-accent); }
.rp-filmstrip { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-4); align-content: start; }
.rp-filmstrip figure { margin: 0; position: relative; border-radius: var(--radius-md); overflow: hidden; aspect-ratio: 3 / 4; box-shadow: var(--shadow-md); }
.rp-filmstrip figure:nth-child(1) { grid-column: span 2; aspect-ratio: 4 / 3; }
.rp-filmstrip figure:nth-child(3) { transform: translateY(var(--space-6)); }
.rp-filmstrip img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.rp-filmstrip figure:hover img { transform: scale(1.05); }
.rp-filmstrip figcaption { position: absolute; left: 0; right: 0; bottom: 0; padding: var(--space-6) var(--space-3) var(--space-3); font-size: var(--font-size-xs); color: var(--color-white); background: linear-gradient(to top, rgba(var(--color-secondary-rgb), .85), transparent); }

/* =====================================================
   4 · METAL ROOFING — dark, before/after diptych
   ===================================================== */
.rp-metal { background: var(--color-secondary); position: relative; overflow: hidden; }
.rp-metal::before { content: ''; position: absolute; inset: 0; pointer-events: none;
  background: repeating-linear-gradient(115deg, transparent 0 38px, var(--rp-white-06) 38px 39px); mask-image: linear-gradient(to right, transparent 0%, var(--color-secondary) 35%, var(--color-secondary) 100%); opacity: .7; }
.rp-metal .container { position: relative; z-index: 1; }
.rp-metal__grid { display: grid; grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr); gap: var(--space-12); align-items: center; }
.rp-metal .eyebrow { color: var(--color-accent); }
.rp-metal h2 { color: var(--color-white); margin-bottom: var(--space-4); }
.rp-metal .answer-block { background: var(--rp-white-06); border-left-color: var(--color-accent); color: var(--rp-white-90); margin: 0 0 var(--space-6); }
.rp-metal__uses { list-style: none; margin: 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3); }
.rp-metal__uses li { display: flex; gap: var(--space-2); align-items: center; color: var(--rp-white-90); font-size: var(--font-size-sm); padding: var(--space-3) var(--space-4); border: 1px solid var(--rp-line-dark); border-radius: var(--radius-sm); transition: background var(--transition-fast), border-color var(--transition-fast); }
.rp-metal__uses li:hover { background: rgba(var(--color-primary-rgb), .12); border-color: rgba(var(--color-primary-rgb), .5); }
.rp-metal__uses svg { width: 16px; height: 16px; color: var(--color-accent); flex-shrink: 0; }
.rp-diptych { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); position: relative; }
.rp-diptych figure { margin: 0; position: relative; aspect-ratio: 4 / 5; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); }
.rp-diptych img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.rp-diptych figure:hover img { transform: scale(1.04); }
.rp-diptych figcaption { position: absolute; top: var(--space-3); left: var(--space-3); font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-xs); letter-spacing: 1.5px; text-transform: uppercase; padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); }
.rp-diptych figure:first-child figcaption { background: var(--color-white); color: var(--color-secondary); }
.rp-diptych figure:last-child figcaption { background: var(--rp-accent); color: var(--color-white); }
.rp-diptych__arrow { position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: var(--space-12); height: var(--space-12); border-radius: var(--radius-full); background: var(--color-accent); color: var(--color-secondary); display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-lg); z-index: 2; }
.rp-diptych__arrow svg { width: 22px; height: 22px; }
.rp-metal__more { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); margin-top: var(--space-4); }
.rp-metal__more figure { margin: 0; position: relative; aspect-ratio: 16 / 9; border-radius: var(--radius-md); overflow: hidden; }
.rp-metal__more img { width: 100%; height: 100%; object-fit: cover; }
.rp-metal__more figcaption { position: absolute; bottom: 0; left: 0; right: 0; padding: var(--space-2) var(--space-3); font-size: var(--font-size-xs); color: var(--color-white); background: linear-gradient(to top, rgba(var(--color-secondary-rgb), .9), transparent); }

/* =====================================================
   5 · PROCESS — six-step ribbon grid with a running rule
   ===================================================== */
.rp-process { background: var(--color-white); }
.rp-steps { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-8) var(--space-6); margin-top: var(--space-12); position: relative; counter-reset: step; }
.rp-step { position: relative; padding-top: var(--space-8); }
.rp-step::before { content: ''; position: absolute; left: 0; right: calc(-1 * var(--space-6)); top: var(--space-3); height: 2px; background: var(--rp-line); }
.rp-step:nth-child(3n)::before { right: 0; }
.rp-step::after { counter-increment: step; content: counter(step); position: absolute; left: 0; top: 0; transform: translateY(-25%); width: var(--space-8); height: var(--space-8); border-radius: var(--radius-full); background: var(--color-white); border: 2px solid var(--rp-accent); color: var(--rp-accent); font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-sm); display: flex; align-items: center; justify-content: center; transition: background var(--transition-base), color var(--transition-base), transform var(--transition-base); }
.rp-step:hover::after { background: var(--rp-accent); color: var(--color-white); transform: translateY(-25%) scale(1.1); }
.rp-step__ico { width: var(--space-10); height: var(--space-10); border-radius: var(--radius-md); background: var(--rp-accent-soft); color: var(--rp-accent); display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-3); }
.rp-step__ico svg { width: 20px; height: 20px; }
.rp-step h3 { font-size: var(--font-size-lg); color: var(--rp-ink); margin-bottom: var(--space-2); }
.rp-step p { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; margin: 0; }
.rp-step__quote { margin-top: var(--space-3); padding-left: var(--space-3); border-left: 2px solid var(--color-accent); font-size: var(--font-size-xs); color: var(--color-gray); font-style: italic; line-height: 1.5; }

/* =====================================================
   6 · VENTILATION — tinted split with warranty note
   ===================================================== */
.rp-vent { background: var(--rp-gold-soft); position: relative; overflow: hidden; }
.rp-vent::after { content: ''; position: absolute; left: -6%; bottom: -30%; width: 36vw; height: 36vw; border-radius: var(--radius-full); background: radial-gradient(circle, rgba(var(--color-accent-rgb), .18), transparent 65%); pointer-events: none; }
.rp-vent .container { position: relative; z-index: 1; }
.rp-vent__grid { display: grid; grid-template-columns: minmax(260px, 400px) minmax(0, 1fr); gap: var(--space-12); align-items: center; }
.rp-vent__figure { margin: 0; position: relative; }
.rp-vent__figure .frame { aspect-ratio: 3 / 4; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-lg); clip-path: polygon(0 0, 100% 0, 100% 92%, 88% 100%, 0 100%); }
.rp-vent__figure img { width: 100%; height: 100%; object-fit: cover; }
.rp-vent__figure::before { content: ''; position: absolute; inset: auto auto calc(-1 * var(--space-4)) calc(-1 * var(--space-4)); width: 45%; height: 45%; background: repeating-linear-gradient(45deg, rgba(var(--color-accent-rgb), .35) 0 2px, transparent 2px 10px); border-radius: var(--radius-lg); z-index: -1; }
.rp-vent .eyebrow { color: var(--rp-accent); }
.rp-vent p { color: var(--color-gray-dark); line-height: 1.7; }
.rp-vent__note { margin-top: var(--space-6); display: grid; grid-template-columns: var(--space-12) 1fr; gap: var(--space-4); background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-5) var(--space-6); box-shadow: var(--shadow-card); border-left: 5px solid var(--color-accent); }
.rp-vent__note svg { width: 28px; height: 28px; color: var(--color-accent); }
.rp-vent__note strong { display: block; font-family: var(--font-heading); color: var(--rp-ink); margin-bottom: var(--space-1); }
.rp-vent__note p { margin: 0; font-size: var(--font-size-sm); }
.rp-vent__link { display: inline-flex; align-items: center; gap: var(--space-2); margin-top: var(--space-5); font-family: var(--font-heading); font-weight: 700; color: var(--rp-accent); }
.rp-vent__link svg { width: 18px; height: 18px; transition: transform var(--transition-fast); }
.rp-vent__link:hover svg { transform: translateX(4px); }

/* =====================================================
   7 · PROOF — real reviews + finished-roof gallery
   ===================================================== */
.rp-proof { background: var(--color-dark); position: relative; overflow: hidden; }
.rp-proof::before { content: ''; position: absolute; inset: 0; pointer-events: none; background: radial-gradient(ellipse at 80% 110%, rgba(var(--color-primary-rgb), .22) 0%, transparent 55%); }
.rp-proof .container { position: relative; z-index: 1; }
.rp-proof .section-header h2 { color: var(--color-white); }
.rp-proof .section-header .eyebrow { color: var(--color-accent); }
.rp-proof .answer-block { background: var(--rp-white-06); border-left-color: var(--color-accent); color: var(--rp-white-90); }
.rp-reviews { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); margin-top: var(--space-10); }
.rp-review { position: relative; background: var(--rp-white-06); border: 1px solid var(--rp-line-dark); border-radius: var(--radius-lg); padding: var(--space-8) var(--space-6) var(--space-6); display: flex; flex-direction: column; transition: transform var(--transition-base), border-color var(--transition-base); }
.rp-review:hover { transform: translateY(-4px); border-color: rgba(var(--color-primary-rgb), .5); }
.rp-review::before { content: '\201C'; position: absolute; top: calc(-1 * var(--space-2)); left: var(--space-5); font-family: var(--font-heading); font-size: clamp(4rem, 7vw, 5.5rem); line-height: 1; color: var(--color-accent); opacity: .9; }
.rp-review blockquote { margin: 0; color: var(--rp-white-90); font-size: var(--font-size-sm); line-height: 1.7; flex: 1; }
.rp-review blockquote p { margin: 0; }
.rp-review footer { margin-top: var(--space-5); padding-top: var(--space-4); border-top: 1px solid var(--rp-line-dark); display: flex; align-items: center; gap: var(--space-3); }
.rp-review__avatar { width: var(--space-10); height: var(--space-10); border-radius: var(--radius-full); background: linear-gradient(135deg, var(--rp-accent), var(--color-accent)); color: var(--color-white); font-family: var(--font-heading); font-weight: 800; display: flex; align-items: center; justify-content: center; }
.rp-review footer cite { font-style: normal; color: var(--color-white); font-weight: 600; font-size: var(--font-size-sm); display: block; }
.rp-review footer span { color: var(--rp-white-72); font-size: var(--font-size-xs); }
.rp-gallery { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-4); margin-top: var(--space-10); }
.rp-gallery figure { margin: 0; position: relative; aspect-ratio: 3 / 4; border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-lg); }
.rp-gallery figure:nth-child(even) { transform: translateY(var(--space-6)); }
.rp-gallery img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow), filter var(--transition-slow); filter: saturate(.92); }
.rp-gallery figure:hover img { transform: scale(1.06); filter: saturate(1.05); }
.rp-gallery figcaption { position: absolute; left: 0; right: 0; bottom: 0; padding: var(--space-5) var(--space-3) var(--space-3); font-size: var(--font-size-xs); color: var(--color-white); background: linear-gradient(to top, rgba(var(--color-secondary-rgb), .9), transparent); opacity: 0; transform: translateY(6px); transition: opacity var(--transition-base), transform var(--transition-base); }
.rp-gallery figure:hover figcaption, .rp-gallery figure:focus-within figcaption { opacity: 1; transform: none; }
.rp-proof__links { display: flex; flex-wrap: wrap; gap: var(--space-4); justify-content: center; margin-top: var(--space-12); }
.rp-proof__links a { display: inline-flex; align-items: center; gap: var(--space-2); color: var(--color-white); font-size: var(--font-size-sm); font-weight: 600; padding: var(--space-3) var(--space-5); border: 1px solid var(--rp-line-dark); border-radius: var(--radius-full); transition: background var(--transition-fast), border-color var(--transition-fast); }
.rp-proof__links a:hover { background: rgba(var(--color-primary-rgb), .2); border-color: var(--rp-accent); }
.rp-proof__links svg { width: 18px; height: 18px; color: var(--color-star); }

/* =====================================================
   8 · FAQ — single column, numbered left rail
   ===================================================== */
.rp-faq { background: var(--color-white); }
.rp-faq__list { max-width: 860px; margin: var(--space-10) auto 0; counter-reset: faq; }
.faq-item { position: relative; border-bottom: 1px solid var(--rp-line); transition: background var(--transition-fast); }
.faq-item:first-child { border-top: 1px solid var(--rp-line); }
.faq-item summary { list-style: none; cursor: pointer; display: grid; grid-template-columns: var(--space-12) 1fr var(--space-8); gap: var(--space-4); align-items: center; padding: var(--space-5) var(--space-3); font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-base); color: var(--rp-ink); }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary::before { counter-increment: faq; content: counter(faq, decimal-leading-zero); font-family: var(--font-heading); font-weight: 800; color: var(--rp-accent); font-size: var(--font-size-lg); }
.faq-item summary:hover { color: var(--rp-accent); }
.rp-faq__chev { width: var(--space-8); height: var(--space-8); border-radius: var(--radius-full); border: 1px solid var(--rp-line); display: flex; align-items: center; justify-content: center; color: var(--color-gray-dark); transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base); }
.rp-faq__chev svg { width: 16px; height: 16px; }
.faq-item[open] .rp-faq__chev { transform: rotate(180deg); background: var(--rp-accent); color: var(--color-white); border-color: var(--rp-accent); }
.faq-item[open] { background: var(--rp-accent-soft); }
.faq-answer { padding: 0 var(--space-3) var(--space-6) calc(var(--space-12) + var(--space-4) + var(--space-3)); }
.faq-answer p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.75; max-width: 65ch; }

/* =====================================================
   FINAL CTA — split band with phone tile
   ===================================================== */
.rp-cta { position: relative; overflow: hidden; padding: var(--space-16) 0;
  background: linear-gradient(120deg, var(--color-primary-dark) 0%, var(--color-primary) 48%, var(--color-secondary) 100%); }
.rp-cta::before { content: ''; position: absolute; inset: 0; pointer-events: none; opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.rp-cta__grid { position: relative; z-index: 1; display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(260px, .6fr); gap: var(--space-10); align-items: center; }
.rp-cta h2 { color: var(--color-white); font-size: clamp(1.9rem, 4vw, 2.75rem); margin-bottom: var(--space-4); }
.rp-cta p { color: var(--rp-white-90); max-width: 60ch; font-size: var(--font-size-lg); margin: 0 0 var(--space-6); }
.rp-cta__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.rp-cta .btn svg { width: 18px; height: 18px; }
.rp-cta__tile { background: var(--rp-white-06); border: 1px solid var(--rp-line-dark); border-radius: var(--radius-lg); padding: var(--space-6); text-align: center; backdrop-filter: blur(6px); }
.rp-cta__tile span { display: block; font-size: var(--font-size-xs); letter-spacing: 2px; text-transform: uppercase; color: var(--rp-white-72); margin-bottom: var(--space-2); }
.rp-cta__tile a { font-family: var(--font-heading); font-weight: 800; font-size: clamp(1.4rem, 3vw, 1.9rem); color: var(--color-white); display: inline-flex; align-items: center; gap: var(--space-2); }
.rp-cta__tile a svg { width: 24px; height: 24px; color: var(--color-accent); }
.rp-cta__tile small { display: block; margin-top: var(--space-3); color: var(--rp-white-72); font-size: var(--font-size-xs); }

/* =====================================================
   RELATED SERVICES (required services-grid markup)
   ===================================================== */
.rp-related { background: var(--color-light); }
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
.service-card__icon { width: 60px; height: 60px; border-radius: var(--radius-full); background: var(--color-white); box-shadow: var(--shadow-md); display: flex; align-items: center; justify-content: center; margin-top: calc(-1 * var(--space-10)); margin-bottom: var(--space-1); color: var(--rp-accent); position: relative; z-index: 1; border: 3px solid var(--color-white); }
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { color: var(--rp-ink); font-size: var(--font-size-xl); margin: 0; }
.service-card__desc { color: var(--color-gray-dark); font-size: var(--font-size-sm); margin: 0; line-height: 1.55; }
.service-card-with-image ul { list-style: none; padding: var(--space-4) 0 0; margin: var(--space-2) 0 0; width: 100%; text-align: left; display: flex; flex-direction: column; gap: var(--space-2); border-top: 1px solid rgba(var(--color-secondary-rgb), .08); }
.service-card-with-image ul li { font-size: var(--font-size-sm); color: var(--color-gray-dark); padding-left: var(--space-6); position: relative; }
.service-card-with-image ul li::before { content: "\2713"; color: var(--rp-accent); font-weight: 700; position: absolute; left: 0; top: 0; }
.service-card__cta { margin-top: var(--space-4); padding-top: var(--space-4); width: 100%; color: var(--rp-accent); font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-sm); border-top: 1px solid rgba(var(--color-secondary-rgb), .08); transition: color var(--transition-base); }
.service-card__cta::after { content: " \2192"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--color-accent); }
.service-card__cta:hover::after { transform: translateX(4px); }

/* ---- SVG dividers (3 styles) ---- */
.rp-divider { display: block; overflow: hidden; line-height: 0; }
.rp-divider svg { display: block; width: 100%; height: 100%; }
.rp-divider--tilt { height: 56px; }
.rp-divider--curve { height: 80px; }
.rp-divider--notch { height: 48px; }

/* ---- Focus visibility (WCAG AA) ---- */
.rp-page a:focus-visible, .rp-page summary:focus-visible { outline: 3px solid var(--color-accent); outline-offset: 2px; border-radius: var(--radius-sm); }
.rp-page ::selection { background: rgba(var(--color-primary-rgb), .85); color: var(--color-white); }

/* ---- Multi-directional reveals (gated by data-animate) ---- */
[data-animate].rp-rv-left { transform: translateX(-36px); }
[data-animate].rp-rv-right { transform: translateX(36px); }
[data-animate].rp-rv-down { transform: translateY(-30px); }
[data-animate].rp-rv-scale { transform: scale(.93); }
[data-animate].rp-rv-left.animated, [data-animate].rp-rv-right.animated,
[data-animate].rp-rv-down.animated, [data-animate].rp-rv-scale.animated { transform: none; }

@media (prefers-reduced-motion: reduce) {
  [data-animate].rp-rv-left, [data-animate].rp-rv-right, [data-animate].rp-rv-down, [data-animate].rp-rv-scale { transform: none; }
  .rp-layer:hover, .rp-step:hover::after, .rp-review:hover, .service-card-with-image:hover,
  .rp-decide__figure:hover .rp-decide__frame img, .rp-filmstrip figure:hover img, .rp-diptych figure:hover img,
  .rp-gallery figure:hover img, .service-card-with-image:hover .service-card__image img { transform: none; }
}
@media (max-width: 1100px) {
  .rp-hero__grid { grid-template-columns: 1fr; }
  .rp-hero__ledger { max-width: 560px; }
  .rp-anatomy__grid { grid-template-columns: 1fr; }
  .rp-filmstrip { grid-template-columns: repeat(3, 1fr); }
  .rp-filmstrip figure:nth-child(1) { grid-column: auto; aspect-ratio: 3 / 4; }
  .rp-filmstrip figure:nth-child(3) { transform: none; }
  .rp-reviews { grid-template-columns: 1fr; }
  .rp-gallery { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .rp-decide__grid { grid-template-columns: 1fr; }
  .rp-decide__figure { max-width: 420px; }
  .rp-metal__grid { grid-template-columns: 1fr; }
  .rp-vent__grid { grid-template-columns: 1fr; }
  .rp-vent__figure { max-width: 380px; }
  .rp-steps { grid-template-columns: 1fr 1fr; }
  .rp-step:nth-child(3n)::before { right: calc(-1 * var(--space-6)); }
  .rp-step:nth-child(2n)::before { right: 0; }
  .rp-cta__grid { grid-template-columns: 1fr; }
  .services-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .rp-hero { min-height: auto; padding-top: var(--space-12); }
  .rp-hero h1 { font-size: clamp(2rem, 8vw, 2.6rem); }
  .rp-steps { grid-template-columns: 1fr; }
  .rp-step::before { right: 0; }
  .rp-layer { margin-left: calc(var(--i) * var(--space-1)); grid-template-columns: var(--space-10) 1fr; }
  .rp-filmstrip { grid-template-columns: 1fr 1fr; }
  .rp-gallery figure:nth-child(even) { transform: none; }
  .rp-metal__uses { grid-template-columns: 1fr; }
  .services-grid { grid-template-columns: 1fr; }
  .faq-item summary { grid-template-columns: var(--space-10) 1fr var(--space-8); }
  .faq-answer { padding-left: var(--space-3); }
}
@media (max-width: 480px) {
  .rp-hero__actions .btn, .rp-cta__actions .btn { width: 100%; justify-content: center; }
  .rp-diptych { grid-template-columns: 1fr; }
  .rp-diptych__arrow { transform: translate(-50%, -50%) rotate(90deg); }
  .rp-proof__links a { width: 100%; justify-content: center; }
}

/* ---- color-mix() fallbacks for older engines ---- */
@supports not (background: color-mix(in srgb, red 50%, blue)) {
  :root {
    --rp-accent-soft: rgba(var(--color-primary-rgb), .09);
    --rp-gold-soft: rgba(var(--color-accent-rgb), .14);
    --rp-line: rgba(var(--color-secondary-rgb), .12);
    --rp-line-dark: var(--color-gray-dark);
    --rp-white-90: var(--color-light);
    --rp-white-72: var(--color-gray-light);
    --rp-white-06: transparent;
    --color-card-tint-1: rgba(var(--color-primary-rgb), .08);
    --color-card-tint-2: rgba(var(--color-secondary-rgb), .06);
    --color-card-tint-3: rgba(var(--color-accent-rgb), .12);
  }
  .rp-layer:hover, .rp-layer:focus-within { border-color: var(--rp-accent); }
  .rp-review { background: var(--color-secondary); }
}

/* ---- Touch devices: no hover lifts, captions always visible ---- */
@media (hover: none) {
  .rp-gallery figcaption { opacity: 1; transform: none; }
  .rp-layer:hover, .rp-review:hover, .service-card-with-image:hover { transform: none; box-shadow: var(--shadow-sm); }
  .rp-step:hover::after { transform: translateY(-25%); background: var(--color-white); color: var(--rp-accent); }
  .rp-decide__figure:hover .rp-decide__frame img, .rp-filmstrip figure:hover img, .rp-diptych figure:hover img { transform: none; }
}

/* ---- Forced colors / Windows high contrast ---- */
@media (forced-colors: active) {
  .rp-layer, .rp-review, .rp-step::after, .faq-item, .service-card-with-image, .rp-hero__ledger, .rp-cta__tile { border: 1px solid CanvasText; }
  .rp-hero::before, .rp-hero::after, .rp-cta::before, .rp-anatomy::before, .rp-metal::before, .rp-vent::after, .rp-proof::before { display: none; }
  .rp-layer::before, .rp-decide__figure::before { forced-color-adjust: none; }
}

/* ---- Wide screens ---- */
@media (min-width: 1440px) {
  .rp-hero { min-height: 58vh; }
  .rp-hero h1 { font-size: var(--font-size-6xl); }
  .rp-anatomy__grid { gap: var(--space-16); }
  .rp-gallery { gap: var(--space-6); }
  .rp-steps { gap: var(--space-10) var(--space-8); }
}

/* ---- FAQ open motion ---- */
.faq-item[open] .faq-answer { animation: rp-fade .28s ease both; }
@keyframes rp-fade {
  from { opacity: 0; transform: translateY(-4px); }
  to   { opacity: 1; transform: none; }
}

/* ---- Micro-interactions ---- */
.rp-hero__ledger li { transition: transform var(--transition-fast); }
.rp-hero__ledger li:hover { transform: translateX(var(--space-1)); }
.rp-cta__tile a:hover { color: var(--color-accent); }
.rp-cta__tile a:hover svg { color: var(--color-white); }
.rp-proof__links a:focus-visible, .rp-vent__link:focus-visible, .rp-cta__tile a:focus-visible { outline-color: var(--color-white); }
.rp-decide__item a, .rp-vent p a { color: var(--rp-accent); text-decoration: underline; text-underline-offset: 3px; }
.rp-decide__item a:hover, .rp-vent p a:hover { color: var(--color-accent); }

/* ---- Skeleton tint while lazy images load ---- */
.rp-filmstrip figure, .rp-gallery figure, .rp-diptych figure, .rp-metal__more figure, .rp-decide__frame, .rp-vent__figure .frame { background: var(--rp-line); }
.service-card__image { background: var(--color-card-tint-neutral); }

/* ---- Print ---- */
@media print {
  .rp-hero, .rp-metal, .rp-proof, .rp-cta { background: none !important; color: var(--rp-ink) !important; }
  .rp-hero__bg, .rp-divider { display: none !important; }
  .rp-hero h1, .rp-metal h2, .rp-proof .section-header h2, .rp-cta h2 { color: var(--rp-ink) !important; }
  .faq-item, .rp-layer, .rp-step, .rp-review { break-inside: avoid; }
  [data-animate] { opacity: 1 !important; transform: none !important; }
}
</style>

<div class="rp-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="rp-crumbs" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li aria-hidden="true"><span class="rp-crumbs__sep"></span></li>
      <li><a href="/services/">Services</a></li>
      <li aria-hidden="true"><span class="rp-crumbs__sep"></span></li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Roof Replacement</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="rp-hero hero--interior" aria-label="Roof replacement in the Greater Houston area">
  <img class="rp-hero__bg"
       src="/assets/images/roof-replacement.jpg"
       srcset="/assets/images/roof-replacement-480.webp 480w, /assets/images/roof-replacement-960.webp 960w"
       sizes="100vw"
       alt="Triple G crew replacing the roof on a two-story brick home"
       width="1200" height="1600" loading="eager" fetchpriority="high">
  <div class="container rp-hero__grid">
    <div>
      <span class="rp-hero__kicker">Roof Replacement · Shingle &amp; Metal</span>
      <h1>Roof Replacement in the <span class="text-accent">Greater Houston</span> Area</h1>
      <p class="hero-answer">
        Triple G Roofing &amp; Construction is a family-owned roofing and exterior contractor based in Humble, TX,
        serving the Greater Houston area since 1973. We replace worn-out shingle and metal roofs from the decking up:
        full tear-off, rot repair, synthetic underlayment, new flashing and vents, and a clean yard when we leave.
        The inspection and written estimate are free, and owner Tim Menn is on every job.
      </p>
      <div class="rp-hero__actions">
        <a href="/contact/" class="btn btn-primary btn-lg">Get My Free Written Estimate</a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
      </div>
    </div>
    <aside class="rp-hero__ledger" aria-label="What every Triple G roof replacement includes">
      <h2>Every replacement includes</h2>
      <ul>
        <li><?php echo icon('check-circle', 18); ?> Free inspection with photos of what we find</li>
        <li><?php echo icon('check-circle', 18); ?> Full tear-off and decking inspection</li>
        <li><?php echo icon('check-circle', 18); ?> Synthetic underlayment, drip edge and new flashing</li>
        <li><?php echo icon('check-circle', 18); ?> Architectural shingles or metal panels</li>
        <li><?php echo icon('check-circle', 18); ?> Tarped landscaping, magnet sweep for nails</li>
      </ul>
      <p class="rp-hero__stamp">Father &amp; son. On your roof, not in an office.</p>
    </aside>
  </div>
</section>

<!-- ===================== 2 · REPAIR VS REPLACE ===================== -->
<section class="section rp-decide" aria-label="When roof replacement beats repair">
  <div class="container">
    <div class="rp-decide__grid">
      <div>
        <div class="section-header" style="text-align:left; margin-inline:0; margin-bottom:0; max-width:none;">
          <span class="eyebrow" style="color:var(--color-primary);">Repair or Replace?</span>
          <h2>When does a roof replacement make more sense than another repair?</h2>
          <p class="answer-block">
            Replace the roof when leaks show up in more than one spot, when the decking sags or feels soft underfoot,
            or when an asphalt roof has already spent 20 or more years in Gulf Coast heat, humidity and wind. A single
            failed pipe boot or a patch of wind-lifted shingles is a <a href="/services/roof-repair/">repair</a>; a roof
            that is failing everywhere at once is money better spent on replacement.
          </p>
          <span class="rp-updated">Last Updated: <?php echo date('F Y'); ?></span>
        </div>
        <div class="rp-decide__rail">
          <div class="rp-decide__item rp-rv-left" data-animate>
            <div>
              <h3>Leaks in more than one place</h3>
              <p>One leak has one cause. Stains in two or three rooms, or a leak that comes back after a repair, usually mean the shingles, sealant and underlayment are wearing out together rather than failing at a single seam.</p>
            </div>
          </div>
          <div class="rp-decide__item rp-rv-left reveal-delay-1" data-animate>
            <div>
              <h3>Sagging or soft decking</h3>
              <p>A dip between rafters, or plywood that gives when a roofer walks it, means water has been getting through for a while. Rotted decking has to come out before any new roofing goes on, and we photograph every sheet we replace.</p>
            </div>
          </div>
          <div class="rp-decide__item rp-rv-left reveal-delay-2" data-animate>
            <div>
              <h3>Twenty-plus years of Houston weather</h3>
              <p>Gulf Coast summers bake the oils out of asphalt shingles, and every hurricane season loosens what is left. Granules in the gutters, bald patches and curled edges across the whole roof are age, not damage, and age is not repairable.</p>
            </div>
          </div>
          <div class="rp-decide__item rp-rv-left reveal-delay-3" data-animate>
            <div>
              <h3>Storm damage across most of the roof</h3>
              <p>When hail or wind has hit every slope, an adjuster will often look at the roof as a whole. Our <a href="/services/storm-damage-repair/">storm damage</a> team documents it the same way, so you and your carrier are looking at the same photos.</p>
            </div>
          </div>
        </div>
        <div class="rp-decide__verdict rp-rv-scale" data-animate>
          <?php echo icon('search', 20); ?>
          <div>If you are searching for roof replacement near me in Houston and are not sure which side of that line your roof is on, the inspection is free. We will tell you if a repair will hold, and we will tell you if it will not.</div>
        </div>
      </div>
      <figure class="rp-decide__figure rp-rv-right" data-animate>
        <div class="rp-decide__frame">
          <?php echo rpImg('roof-decking-rot', 'Rotted roof decking exposed during tear-off', 739, 1600, [480], '(max-width: 900px) 90vw, 420px'); ?>
        </div>
        <figcaption>What a soft spot looks like once the shingles come off: rotted decking found during a Triple G tear-off.</figcaption>
      </figure>
    </div>
  </div>
</section>

<div class="rp-divider rp-divider--tilt" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none"><polygon fill="var(--color-light)" points="0,56 1200,0 1200,56"/></svg>
</div>

<!-- ===================== 3 · SIGNATURE — ANATOMY ===================== -->
<section class="section rp-anatomy" aria-label="What a Triple G roof replacement includes">
  <div class="container">
    <div class="section-header" style="max-width:800px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Anatomy of a Triple G Roof</span>
      <h2>What does a Triple G roof replacement actually include?</h2>
      <p class="answer-block">
        A Triple G Roofing &amp; Construction replacement is six layers of work, not a shingle swap: tear-off to bare
        decking, rot inspection and replacement, synthetic underlayment, drip edge and flashing, architectural shingles
        from major brands such as GAF (or metal panels), and balanced ridge or box vents. These are the same steps you
        can see in our own job photos.
      </p>
    </div>
    <div class="rp-anatomy__grid">
      <ol class="rp-layers rp-rv-left" data-animate>
        <li class="rp-layer">
          <span class="rp-layer__num" aria-hidden="true"></span>
          <div>
            <h3>Tear-off to bare decking <span class="rp-layer__tag">Day one, first thing</span></h3>
            <p>Old shingles, felt and nails come off completely. A dump trailer is staged in the driveway so debris goes straight in, not into your flower beds.</p>
          </div>
        </li>
        <li class="rp-layer">
          <span class="rp-layer__num" aria-hidden="true"></span>
          <div>
            <h3>Decking inspection and rot replacement</h3>
            <p>With the deck exposed we walk every sheet. Soft, delaminated or rotted plywood is cut out and replaced, and we photograph it so you see exactly what was under your old roof.</p>
          </div>
        </li>
        <li class="rp-layer">
          <span class="rp-layer__num" aria-hidden="true"></span>
          <div>
            <h3>Synthetic underlayment</h3>
            <p>A tear-resistant synthetic membrane goes down over the whole deck as the roof&rsquo;s second line of defense against wind-driven rain.</p>
          </div>
        </li>
        <li class="rp-layer">
          <span class="rp-layer__num" aria-hidden="true"></span>
          <div>
            <h3>Drip edge and flashing</h3>
            <p>New metal drip edge along the eaves and rakes, plus fresh step and counter-flashing at chimneys, walls and pipe penetrations, where most leaks start.</p>
          </div>
        </li>
        <li class="rp-layer">
          <span class="rp-layer__num" aria-hidden="true"></span>
          <div>
            <h3>Architectural shingles <span class="rp-layer__tag">or metal panels</span></h3>
            <p>Dimensional shingles from major brands such as GAF, installed to the manufacturer&rsquo;s nailing pattern, in a color Tim helps you choose to suit the brick and trim.</p>
          </div>
        </li>
        <li class="rp-layer">
          <span class="rp-layer__num" aria-hidden="true"></span>
          <div>
            <h3>Ridge and box vents</h3>
            <p>Exhaust ventilation sized to the attic, balanced with soffit intake, so heat and moisture leave the attic instead of cooking the new shingles from below.</p>
          </div>
        </li>
      </ol>
      <div class="rp-filmstrip rp-rv-right" data-animate>
        <figure>
          <?php echo rpImg('roof-tearoff', 'Roof tear-off in progress with a dump trailer staged in the driveway', 1200, 1600, [480, 960], '(max-width: 640px) 50vw, 360px'); ?>
          <figcaption>Layer 1: tear-off, dump trailer in the driveway</figcaption>
        </figure>
        <figure>
          <?php echo rpImg('roof-underlayment', 'Synthetic underlayment laid across a roof before shingles', 1200, 1600, [480, 960], '(max-width: 640px) 50vw, 180px'); ?>
          <figcaption>Layer 3: synthetic underlayment</figcaption>
        </figure>
        <figure>
          <?php echo rpImg('crew-shingles', 'Roofer carrying shingles across a roof covered in new underlayment', 1200, 1600, [480, 960], '(max-width: 640px) 50vw, 180px'); ?>
          <figcaption>Layer 5: shingles going on</figcaption>
        </figure>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 4 · METAL ROOFING ===================== -->
<section class="section rp-metal" aria-label="Metal roofing option">
  <div class="container">
    <div class="rp-metal__grid">
      <div class="rp-rv-down" data-animate>
        <span class="eyebrow">Metal Roofing Option</span>
        <h2>Does Triple G install metal roofs too?</h2>
        <p class="answer-block">
          Yes. Triple G Roofing &amp; Construction installs corrugated and standing-seam metal roofing on homes, barns,
          shops and outbuildings across the Greater Houston area, and we convert thatched poolside palapas to metal.
          Metal sheds rain fast, stands up to wind and does not shed granules, which makes it a practical choice for
          ranch and acreage properties from Dayton to Cypress.
        </p>
        <ul class="rp-metal__uses">
          <li><?php echo icon('home', 16); ?> Homes and additions</li>
          <li><?php echo icon('home', 16); ?> Barns and ranch buildings</li>
          <li><?php echo icon('hammer', 16); ?> Metal shops and garages</li>
          <li><?php echo icon('wind', 16); ?> Thatch-to-metal palapas</li>
        </ul>
      </div>
      <div class="rp-rv-scale" data-animate>
        <div class="rp-diptych">
          <figure>
            <?php echo rpImg('palapa-before', 'Thatched poolside palapa before conversion to a metal roof', 1000, 1000, [480, 960], '(max-width: 480px) 90vw, 300px'); ?>
            <figcaption>Before · thatch</figcaption>
          </figure>
          <span class="rp-diptych__arrow" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
          <figure>
            <?php echo rpImg('palapa-metal', 'Poolside palapa converted from thatch to a metal roof', 896, 1600, [480], '(max-width: 480px) 90vw, 300px'); ?>
            <figcaption>After · metal</figcaption>
          </figure>
        </div>
        <div class="rp-metal__more">
          <figure>
            <?php echo rpImg('metal-roof-barn', 'New corrugated metal roof on a barn with white ranch-rail fencing', 1200, 1600, [480, 960], '(max-width: 900px) 50vw, 300px'); ?>
            <figcaption>Corrugated metal on a barn</figcaption>
          </figure>
          <figure>
            <?php echo rpImg('roof-metal-shop', 'Crew installing a new metal roof on a metal shop building', 1200, 1600, [480, 960], '(max-width: 900px) 50vw, 300px'); ?>
            <figcaption>Metal shop re-roof in progress</figcaption>
          </figure>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="rp-divider rp-divider--curve" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 80" preserveAspectRatio="none"><path d="M0,0 L1200,0 L1200,24 C900,88 300,88 0,24 Z" fill="var(--color-secondary)"/></svg>
</div>

<!-- ===================== 5 · PROCESS ===================== -->
<section class="section rp-process" aria-label="How a roof replacement works">
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Start to Finish</span>
      <h2>How does the roof replacement process work with Triple G?</h2>
      <p class="answer-block">
        Triple G Roofing &amp; Construction runs every replacement the same way: a free inspection with photos, a written
        estimate, help with the insurance claim if a storm caused the damage, materials delivered ahead of the crew, an
        install day that starts at first light, and a cleanup that ends with a magnet sweep for nails. The owner is on
        the job personally from the first ladder to the final walkthrough.
      </p>
    </div>
    <div class="rp-steps">
      <div class="rp-step rp-rv-down" data-animate>
        <div class="rp-step__ico"><?php echo icon('search', 20); ?></div>
        <h3>Free inspection, with photos</h3>
        <p>Tim climbs the roof, measures it himself and photographs the decking, flashing and wear so you see what he sees.</p>
        <p class="rp-step__quote">&ldquo;He was the only roofer we contacted who climbed up on the roof and took exact measurements.&rdquo; &mdash; James, Spring</p>
      </div>
      <div class="rp-step rp-rv-down reveal-delay-1" data-animate>
        <div class="rp-step__ico"><?php echo icon('ruler', 20); ?></div>
        <h3>Written estimate and color choice</h3>
        <p>A free written estimate that spells out the scope, plus help picking a shingle color that suits your brick, trim and neighborhood.</p>
      </div>
      <div class="rp-step rp-rv-down reveal-delay-2" data-animate>
        <div class="rp-step__ico"><?php echo icon('shield', 20); ?></div>
        <h3>Insurance help if a storm caused it</h3>
        <p>With more than 50 years of claims-handling and adjuster experience, we document the damage and meet your adjuster. Approval is always the carrier&rsquo;s decision.</p>
      </div>
      <div class="rp-step rp-rv-down" data-animate>
        <div class="rp-step__ico"><?php echo icon('home', 20); ?></div>
        <h3>Materials delivered</h3>
        <p>Shingles, underlayment, drip edge and vents arrive before the crew so install day is spent roofing, not waiting on a truck.</p>
      </div>
      <div class="rp-step rp-rv-down reveal-delay-1" data-animate>
        <div class="rp-step__ico"><?php echo icon('hard-hat', 20); ?></div>
        <h3>Install day, sun-up to sun-down</h3>
        <p>Landscaping, pools and gardens are tarped first. The crew works through the day, and Tim is on site overseeing the work.</p>
        <p class="rp-step__quote">&ldquo;They covered the landscaping, vegetable garden and pool to protect them from falling debris.&rdquo; &mdash; James, Spring</p>
      </div>
      <div class="rp-step rp-rv-down reveal-delay-2" data-animate>
        <div class="rp-step__ico"><?php echo icon('check-circle', 20); ?></div>
        <h3>Cleanup, magnet sweep, walkthrough</h3>
        <p>Debris hauled off, gutters cleared, a rolling magnet run over the lawn and driveway for nails, and a walkthrough with you before we leave.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · VENTILATION ===================== -->
<section class="section rp-vent" aria-label="Attic ventilation and your shingle warranty">
  <div class="container">
    <div class="rp-vent__grid">
      <figure class="rp-vent__figure rp-rv-left" data-animate>
        <div class="frame">
          <?php echo rpImg('roof-overhead', 'Overhead view of a completed architectural shingle roof', 1200, 1600, [480, 960], '(max-width: 900px) 80vw, 400px'); ?>
        </div>
      </figure>
      <div class="rp-rv-right" data-animate>
        <span class="eyebrow">Ventilation Check</span>
        <h2>Why does Triple G check attic ventilation on every roof replacement?</h2>
        <p>
          Triple G Roofing &amp; Construction checks intake and exhaust ventilation on every roof we replace because a new
          roof over a starved attic does not last. In a Houston summer, an under-vented attic traps heat and moisture
          against the underside of the decking, which ages shingles from below and pushes your cooling bills up.
        </p>
        <div class="rp-vent__note">
          <?php echo icon('award', 28); ?>
          <div>
            <strong>Your shingle warranty may depend on it</strong>
            <p>Shingle manufacturers can void or limit the shingle warranty when the attic is not ventilated to their specification. We balance soffit intake with ridge or box vent exhaust so the new roof qualifies for the coverage it came with.</p>
          </div>
        </div>
        <a class="rp-vent__link" href="/services/attic-venting/">Learn more about attic venting <?php echo icon('external-link', 18); ?></a>
      </div>
    </div>
  </div>
</section>

<div class="rp-divider rp-divider--notch" aria-hidden="true" style="background:var(--color-dark);">
  <svg viewBox="0 0 1200 48" preserveAspectRatio="none"><polygon fill="var(--rp-gold-soft)" points="540,0 660,0 600,48"/></svg>
</div>

<!-- ===================== 7 · PROOF ===================== -->
<section class="section rp-proof" aria-label="Reviews and finished roofs">
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow">In Their Words</span>
      <h2>What do Greater Houston homeowners say about their Triple G roof?</h2>
      <p class="answer-block">
        These are real reviews from Triple G Roofing &amp; Construction customers, published on our own site with first
        name and city. Voted a Nextdoor Neighborhood Favorite in 2022, 2023 and 2024, we earn that the slow way: one
        roof, one family, one clean yard at a time.
      </p>
    </div>
    <div class="rp-reviews">
      <?php foreach ($reviews as $i => $r): ?>
      <article class="rp-review rp-rv-scale reveal-delay-<?php echo ($i % 3) + 1; ?>" data-animate>
        <blockquote><p><?php echo htmlspecialchars($r['text']); ?></p></blockquote>
        <footer>
          <span class="rp-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></span>
          <div>
            <cite><?php echo htmlspecialchars($r['name']); ?></cite>
            <span><?php echo htmlspecialchars($r['city']); ?> · Roof replacement</span>
          </div>
        </footer>
      </article>
      <?php endforeach; ?>
    </div>
    <div class="rp-gallery">
      <figure class="rp-rv-down" data-animate>
        <?php echo rpImg('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, [480, 960], '(max-width: 1100px) 50vw, 280px'); ?>
        <figcaption>Brick ranch, architectural shingle</figcaption>
      </figure>
      <figure class="rp-rv-down reveal-delay-1" data-animate>
        <?php echo rpImg('roof-large-home', 'Large two-story brick home with a completed roof replacement', 1200, 1600, [480, 960], '(max-width: 1100px) 50vw, 280px'); ?>
        <figcaption>Large two-story, multiple slopes</figcaption>
      </figure>
      <figure class="rp-rv-down reveal-delay-2" data-animate>
        <?php echo rpImg('roof-two-story', 'Two-story brick home during a roof replacement', 1200, 1600, [480, 960], '(max-width: 1100px) 50vw, 280px'); ?>
        <figcaption>Two-story replacement in progress</figcaption>
      </figure>
      <figure class="rp-rv-down reveal-delay-3" data-animate>
        <?php echo rpImg('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, [480, 960], '(max-width: 1100px) 50vw, 280px'); ?>
        <figcaption>Dark shingle under mature trees</figcaption>
      </figure>
    </div>
    <div class="rp-proof__links" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section rp-faq" aria-label="Roof replacement FAQs">
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto; margin-bottom:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Good Questions</span>
      <h2>What do homeowners ask before replacing a roof?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on timing, cost, insurance, metal and ventilation, before you book your free inspection.</p>
    </div>
    <div class="rp-faq__list">
      <?php foreach ($faqs as $i => $f): ?>
      <details class="faq-item"<?php echo $i === 0 ? ' open' : ''; ?> data-animate>
        <summary>
          <?php echo htmlspecialchars($f['q']); ?>
          <span class="rp-faq__chev" aria-hidden="true"><?php echo icon('chevron-down', 16); ?></span>
        </summary>
        <div class="faq-answer"><p><?php echo htmlspecialchars($f['a']); ?></p></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== FINAL CTA ===================== -->
<section class="rp-cta" aria-label="Schedule a free roof inspection">
  <div class="container rp-cta__grid">
    <div>
      <h2>Ready for a roof that is done right, from the decking up?</h2>
      <p>Book a free inspection and written estimate with Triple G Roofing &amp; Construction. We will photograph what we find, tell you honestly whether to repair or replace, and put the owner on your roof for the whole job.</p>
      <div class="rp-cta__actions">
        <a href="/contact/" class="btn btn-accent btn-lg">Schedule My Free Inspection</a>
        <a href="/services/" class="btn btn-outline-white btn-lg">See All Services</a>
      </div>
    </div>
    <div class="rp-cta__tile">
      <span>Questions? Call us at</span>
      <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo icon('phone', 24); ?> <?php echo $phone; ?></a>
      <small>Serving Humble, Kingwood, Atascocita, Spring, The Woodlands, Baytown and the Greater Houston area</small>
    </div>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section rp-related" aria-label="Other roofing services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow-label">What We Do</span>
      <h2>What other <span class="text-accent">roofing services</span> go hand in hand with a new roof?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark); max-width:64ch; margin-inline:auto;">Not every roof needs replacing. Triple G Roofing &amp; Construction repairs leaks and flashing, handles hail and wind damage with the claims process, and balances attic ventilation so whichever roof you have lasts longer in Houston heat.</p>
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
               alt="<?php echo htmlspecialchars($s['alt']); ?>" width="1200" height="1600" loading="lazy">
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

</div><!-- /.rp-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
