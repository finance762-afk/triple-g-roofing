<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Services Listing — Triple G Roofing & Construction
   All 10 services render here (required-components.md). Facts
   per references/CLIENT-FACTS.md — no credential, warranty-year,
   response-time or coverage claims. Photos = client's own.
   ============================================================ */

$currentPage     = 'services';
$pageTitle       = 'Roofing & Exterior Services | Triple G Roofing & Construction';
$pageDescription = 'Roof replacement, roof repair, free inspections, storm damage repair, attic venting, gutters, siding, patio covers, decks and fences across the Greater Houston area. Family owned since 1973, owner on every job. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/';

/* Inline lucide SVGs not covered by icon() */
$svgPaintBucket = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" width="26" height="26"><path d="M11 7 6 2"/><path d="M18.992 12H2.041"/><path d="M21.145 18.38A3.34 3.34 0 0 1 20 16.5a3.3 3.3 0 0 1-1.145 1.88c-.575.46-.855 1.02-.855 1.595A2 2 0 0 0 20 22a2 2 0 0 0 2-2.025c0-.58-.285-1.13-.855-1.595"/><path d="m8.5 4.5 2.148-2.148a1.205 1.205 0 0 1 1.704 0l7.296 7.296a1.205 1.205 0 0 1 0 1.704l-7.592 7.592a3.615 3.615 0 0 1-5.112 0l-3.888-3.888a3.615 3.615 0 0 1 0-5.112L5.67 7.33"/></svg>';
$svgBuilding2   = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" width="26" height="26"><path d="M10 12h4"/><path d="M10 8h4"/><path d="M14 21v-3a2 2 0 0 0-4 0v3"/><path d="M6 10H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2"/><path d="M6 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"/></svg>';

/* --- Enriched card data: order mirrors $services in config.php. 'variants' = webp sizes that exist on disk. --- */
$serviceCards = [
    [
        'name' => 'Roof Replacement', 'slug' => 'roof-replacement', 'img' => 'roof-replacement', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'Triple G crew replacing the roof on a two-story brick home',
        'desc' => 'Full tear-off and replacement in architectural shingle or metal.',
        'bullets' => ['Architectural shingle or metal', 'Decking repaired before shingles', 'Free written estimate first'],
        'icon' => icon('home', 26),
    ],
    [
        'name' => 'Roof Repair', 'slug' => 'roof-repair', 'img' => 'roof-repair-v2', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'New step flashing sealed against a brick chimney during a roof repair',
        'desc' => 'Leak, flashing, pipe-boot and shingle repairs that stop water at the source.',
        'bullets' => ['Leaks traced to the source', 'Flashing and pipe-boot fixes', 'Photos of what we find'],
        'icon' => icon('wrench', 26),
    ],
    [
        'name' => 'Roof Inspection', 'slug' => 'roof-inspection', 'img' => 'roof-inspection-v2', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'Close-up of cracked and lifted shingles found during a roof inspection',
        'desc' => 'Free, photo-documented inspections that catch wear and storm damage early.',
        'bullets' => ['Free, no-obligation inspection', 'Photo-documented findings', 'Written estimate, no pressure'],
        'icon' => icon('search', 26),
    ],
    [
        'name' => 'Storm & Wind Damage Roof Repair', 'slug' => 'storm-damage-repair', 'img' => 'storm-damage-repair-v2', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'Tarped roof with a Triple G crew starting storm damage repairs',
        'desc' => 'Hail, wind and hurricane damage repair with help through the claims process.',
        'bullets' => ['Hail, wind and hurricane damage', 'Claims help, start to finish', 'Ask about temporary tarping'],
        'icon' => icon('shield', 26),
    ],
    [
        'name' => 'Roof Damage Repair', 'slug' => 'roof-damage-repair', 'img' => 'roof-damage-repair-v2', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'Roof stripped to the decking showing holes and rotted wood before repair',
        'desc' => 'Repair for aging or compromised roofs — rot, failed flashing, damaged decking.',
        'bullets' => ['Rotted decking replaced', 'Worn shingles and failed flashing', 'Honest repair-or-replace advice'],
        'icon' => icon('hammer', 26),
    ],
    [
        'name' => 'Attic Venting', 'slug' => 'attic-venting', 'img' => 'attic-venting-v2', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'Freshly shingled roof with box vents installed for attic ventilation',
        'desc' => 'Balanced intake and exhaust that cools the attic and protects your shingles.',
        'bullets' => ['Balanced intake and exhaust', 'Protects your shingle warranty', 'Helps cut cooling costs'],
        'icon' => icon('wind', 26),
    ],
    [
        'name' => 'Gutter Installation', 'slug' => 'gutter-installation', 'img' => 'gutter-installation-v2', 'w' => 720, 'h' => 960, 'variants' => [480],
        'alt'  => 'New downspout and gutter on a brick covered patio',
        'desc' => 'New gutters and downspouts that move water away from your foundation.',
        'bullets' => ['New gutters and downspouts', 'Protects fascia and foundation', 'Pairs with your new roof'],
        'icon' => icon('droplets', 26),
    ],
    [
        'name' => 'Siding, Fascia & Soffit', 'slug' => 'siding-fascia-soffit', 'img' => 'siding-fascia-soffit', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'Crew member replacing siding on a dormer above a shingle roof',
        'desc' => 'Siding, fascia, soffit and wood-rot repair, finished with exterior paint.',
        'bullets' => ['Hardie, fiber-cement and vinyl', 'Wood-rot repair and re-seal', 'Exterior paint to finish'],
        'icon' => $svgPaintBucket,
    ],
    [
        'name' => 'Patio Covers, Pergolas & Decks', 'slug' => 'patio-covers-decks', 'img' => 'patio-covers-decks', 'w' => 1000, 'h' => 1333, 'variants' => [480, 960],
        'alt'  => 'Finished covered patio with ceiling fans and a concrete slab',
        'desc' => 'Custom patio covers, screened and enclosed patios, pergolas and wood decks.',
        'bullets' => ['Covered and screened patios', 'Custom cedar pergolas', 'Wood decks built to match'],
        'icon' => $svgBuilding2,
    ],
    [
        'name' => 'Fences & Gates', 'slug' => 'fences-gates', 'img' => 'fences-gates', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960],
        'alt'  => 'New pine privacy fence with a Triple G Roofing yard sign',
        'desc' => 'Cedar and pine privacy fences, ranch rail and custom gates.',
        'bullets' => ['Cedar and pine privacy fences', 'Ranch rail and custom gates', 'Repairs and full replacements'],
        'icon' => icon('ruler', 26),
    ],
];

function svcSrcset($img, $variants) {
    $parts = [];
    foreach ($variants as $v) { $parts[] = '/assets/images/' . $img . '-' . $v . '.webp ' . $v . 'w'; }
    return implode(', ', $parts);
}

/* Representative communities for the areas strip (full list lives on /service-areas/) */
$svcAreaSample = ['Humble', 'Kingwood', 'Atascocita', 'Spring', 'The Woodlands', 'Conroe', 'Cypress', 'Houston', 'Pasadena', 'Baytown', 'Dayton', 'Liberty'];

/* --- Schema: BreadcrumbList + ItemList of all services --- */
$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type"    => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home",     "item" => $siteUrl . '/'],
        ["@type" => "ListItem", "position" => 2, "name" => "Services", "item" => $canonicalUrl],
    ],
];
$itemListSchema = [
    "@context" => "https://schema.org",
    "@type"    => "ItemList",
    "name"     => "Roofing & Exterior Services — " . $siteName,
    "itemListElement" => array_map(function ($i, $s) use ($siteUrl) {
        return [
            "@type"    => "ListItem",
            "position" => $i + 1,
            "name"     => $s['name'],
            "url"      => $siteUrl . '/services/' . $s['slug'] . '/',
        ];
    }, array_keys($serviceCards), $serviceCards),
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n"
    . '<script type="application/ld+json">' . json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Services listing — page-specific styles (Premium tier)
   Tokens only (var()). Prefix: .svc-
   ============================================================ */
:root {
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, var(--color-white));
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, var(--color-white));
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, var(--color-white));
}
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}
[data-animate].reveal-delay-1 { transition-delay: .06s; }
[data-animate].reveal-delay-2 { transition-delay: .14s; }
[data-animate].reveal-delay-3 { transition-delay: .22s; }

/* ---------- Breadcrumb ---------- */
.svc-breadcrumb {
  background: var(--color-light);
  border-bottom: 1px solid var(--color-gray-light);
}
.svc-breadcrumb ol {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-2);
  align-items: center;
  padding: var(--space-3) 0;
  margin: 0;
  font-size: var(--font-size-sm);
  color: var(--color-gray);
}
.svc-breadcrumb a { color: var(--color-gray-dark); }
.svc-breadcrumb a:hover { color: var(--color-primary); }
.svc-breadcrumb [aria-current] {
  color: var(--color-primary);
  font-weight: 600;
}
.svc-breadcrumb-sep { color: var(--color-gray-light); }

/* ---------- Hero: layered photo + gradient + noise ---------- */
.svc-hero {
  position: relative;
  min-height: 54vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + var(--space-6)) 0 var(--space-16);
  overflow: hidden;
  isolation: isolate;
}
.svc-hero__bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0;
}
.svc-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  background: linear-gradient(105deg,
    color-mix(in srgb, var(--color-secondary) 95%, transparent) 0%,
    color-mix(in srgb, var(--color-secondary) 82%, transparent) 46%,
    color-mix(in srgb, var(--color-secondary) 58%, transparent) 100%);
}
.svc-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
  opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.svc-hero__inner {
  position: relative;
  z-index: 2;
  max-width: 840px;
}
.svc-hero__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  font-family: var(--font-heading);
  font-size: var(--font-size-sm);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--color-accent);
  background: color-mix(in srgb, var(--color-primary) 16%, transparent);
  border: 1px solid color-mix(in srgb, var(--color-white) 16%, transparent);
  padding: var(--space-2) var(--space-4);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-5);
}
.svc-hero__eyebrow svg { width: 16px; height: 16px; }
.svc-hero h1 {
  color: var(--color-white);
  font-size: clamp(2.3rem, 5vw, 3.75rem);
  line-height: 1.05;
  margin-bottom: var(--space-5);
  text-wrap: balance;
}
.svc-hero h1 .text-accent { font-size: 1.05em; }
.svc-hero__answer {
  color: color-mix(in srgb, var(--color-white) 90%, transparent);
  font-size: var(--font-size-lg);
  line-height: 1.7;
  max-width: 60ch;
  margin-bottom: var(--space-6);
}
.svc-hero__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-4);
}
.svc-hero__actions .btn svg { width: 18px; height: 18px; }

/* ---------- Intro (answer-first; the required services section header) ---------- */
.svc-intro { background: var(--color-white); }
.svc-intro .section-header {
  max-width: 840px;
  margin-inline: auto;
  text-align: center;
}
.svc-intro .section-header h2 {
  font-size: clamp(1.9rem, 3.6vw, 2.75rem);
  line-height: 1.12;
  color: var(--color-dark);
  margin: var(--space-3) 0 var(--space-4);
  text-wrap: balance;
}
.hero-answer {
  font-size: var(--font-size-lg);
  color: var(--color-gray-dark);
  line-height: 1.7;
  max-width: 64ch;
  margin: var(--space-4) auto 0;
}
.svc-intro .section-subtitle {
  display: block;
  font-family: var(--font-accent);
  font-size: var(--font-size-2xl);
  color: var(--color-primary);
  margin-top: var(--space-5);
}
.svc-intro .prose {
  color: var(--color-gray-dark);
  line-height: 1.7;
  max-width: 65ch;
  margin: var(--space-2) auto 0;
}

/* ---------- Services grid (required component) ---------- */
.svc-list { background: var(--color-light); }
.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-8);
}
.service-card-with-image {
  background: var(--color-card-tint-neutral);
  border-radius: var(--radius-lg);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.service-card-with-image:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-xl);
}
.card-tint-1 { background: var(--color-card-tint-1); }
.card-tint-2 { background: var(--color-card-tint-2); }
.card-tint-3 { background: var(--color-card-tint-3); }
.service-card__image {
  position: relative;
  aspect-ratio: 5 / 3;
  overflow: hidden;
}
.service-card__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 35%;
  display: block;
  transition: transform var(--transition-slow);
}
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body {
  padding: var(--space-6);
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-3);
  flex: 1;
}
.service-card__icon {
  width: 60px;
  height: 60px;
  border-radius: var(--radius-full);
  background: var(--color-white);
  box-shadow: var(--shadow-md);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: calc(-1 * var(--space-10));
  margin-bottom: var(--space-1);
  color: var(--color-primary);
  position: relative;
  z-index: 1;
  border: 3px solid var(--color-white);
}
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 {
  color: var(--color-dark);
  font-size: var(--font-size-xl);
  margin: 0;
  text-wrap: balance;
}
.service-card__desc {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  margin: 0;
  line-height: 1.55;
}
.service-card-with-image ul {
  list-style: none;
  padding: var(--space-4) 0 0;
  margin: var(--space-2) 0 0;
  width: 100%;
  text-align: left;
  display: flex;
  flex-direction: column;
  gap: var(--space-2);
  border-top: 1px solid color-mix(in srgb, var(--color-secondary) 8%, transparent);
}
.service-card-with-image ul li {
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
  padding-left: var(--space-6);
  position: relative;
}
.service-card-with-image ul li::before {
  content: "✓";
  color: var(--color-primary);
  font-weight: 700;
  position: absolute;
  left: 0;
  top: 0;
}
.service-card__cta {
  margin-top: auto;
  padding-top: var(--space-4);
  width: 100%;
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-weight: 600;
  font-size: var(--font-size-sm);
  border-top: 1px solid color-mix(in srgb, var(--color-secondary) 8%, transparent);
  transition: color var(--transition-base);
}
.service-card__cta::after {
  content: " →";
  display: inline-block;
  transition: transform var(--transition-base);
}
.service-card__cta:hover { color: var(--color-accent); }
.service-card__cta:hover::after { transform: translateX(4px); }

/* ---------- Ventilation ribbon (under the grid) ---------- */
.svc-vent {
  margin-top: var(--space-10);
  display: grid;
  grid-template-columns: 56px minmax(0, 1fr) auto;
  gap: var(--space-5);
  align-items: center;
  background: var(--color-white);
  border: 1px solid var(--color-gray-light);
  border-left: 6px solid var(--color-primary);
  border-radius: var(--radius-lg);
  padding: var(--space-5) var(--space-6);
  box-shadow: var(--shadow-sm);
}
.svc-vent__ico {
  width: 56px;
  height: 56px;
  border-radius: var(--radius-md);
  background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white));
  color: var(--color-primary);
  display: flex;
  align-items: center;
  justify-content: center;
}
.svc-vent__ico svg { width: 28px; height: 28px; }
.svc-vent h3 {
  font-size: var(--font-size-lg);
  color: var(--color-dark);
  margin-bottom: var(--space-1);
  text-wrap: balance;
}
.svc-vent p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  line-height: 1.6;
  margin: 0;
  max-width: 70ch;
}
.svc-vent .btn { white-space: nowrap; }

/* ---------- Why one contractor (bento) — signature ---------- */
.svc-why { background: var(--color-white); }
.svc-why .section-header {
  max-width: 800px;
  margin-inline: auto;
  text-align: center;
}
.svc-why .section-header h2 {
  font-size: clamp(1.9rem, 3.6vw, 2.75rem);
  line-height: 1.12;
  color: var(--color-dark);
  margin: var(--space-3) 0 var(--space-4);
  text-wrap: balance;
}
.why-bento {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-12);
}
.why-card {
  position: relative;
  background: var(--color-light);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  overflow: hidden;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.why-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.why-card--wide {
  grid-column: span 2;
  background: linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 10%, var(--color-white)), var(--color-white));
}
.why-card--photo {
  grid-row: span 2;
  padding: 0;
  display: flex;
  flex-direction: column;
  background: var(--color-secondary);
  border: 0;
}
.why-card--photo .why-card__img {
  position: relative;
  aspect-ratio: 4 / 3;
  overflow: hidden;
  flex: 1;
}
.why-card--photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top;
  display: block;
}
.why-card--photo .why-card__img::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 50%, color-mix(in srgb, var(--color-secondary) 90%, transparent) 100%);
}
.why-card--photo .why-card__txt {
  padding: var(--space-6);
  color: var(--color-white);
}
.why-card--photo h3 { color: var(--color-white); }
.why-card--photo p { color: color-mix(in srgb, var(--color-white) 80%, transparent); }
.why-card__ico {
  width: 52px;
  height: 52px;
  border-radius: var(--radius-md);
  background: var(--color-primary);
  color: var(--color-white);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: var(--space-4);
}
.why-card__ico svg { width: 26px; height: 26px; }
.why-card h3 {
  font-size: var(--font-size-lg);
  color: var(--color-dark);
  margin-bottom: var(--space-2);
  text-wrap: balance;
}
.why-card p {
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
  line-height: 1.65;
  margin: 0;
}

/* ---------- Areas strip ---------- */
.svc-areas {
  background: var(--color-light);
  text-align: center;
}
.svc-areas .section-header {
  max-width: 760px;
  margin-inline: auto;
}
.svc-areas .section-header h2 {
  font-size: clamp(1.8rem, 3.4vw, 2.5rem);
  line-height: 1.12;
  color: var(--color-dark);
  margin: var(--space-3) 0 var(--space-4);
  text-wrap: balance;
}
.area-chips {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-3);
  justify-content: center;
  margin-top: var(--space-8);
}
.area-chips span,
.area-chips a {
  display: inline-block;
  background: var(--color-white);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-full);
  padding: var(--space-2) var(--space-5);
  font-weight: 600;
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
  box-shadow: var(--shadow-sm);
}
.area-chips a.area-chips__more {
  background: var(--color-primary);
  border-color: var(--color-primary);
  color: var(--color-white);
  transition: background var(--transition-base);
}
.area-chips a.area-chips__more:hover { background: var(--color-primary-dark); }

/* ---------- Closing CTA ---------- */
.svc-cta {
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: var(--space-16) 0;
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
}
.svc-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.svc-cta .container { position: relative; z-index: 1; }
.svc-cta h2 {
  color: var(--color-white);
  font-size: clamp(1.9rem, 4vw, 2.75rem);
  margin-bottom: var(--space-4);
  text-wrap: balance;
}
.svc-cta p {
  color: color-mix(in srgb, var(--color-white) 92%, transparent);
  max-width: 60ch;
  margin: 0 auto var(--space-8);
  font-size: var(--font-size-lg);
}
.svc-cta__actions {
  display: flex;
  gap: var(--space-4);
  justify-content: center;
  flex-wrap: wrap;
}
.svc-cta .btn svg { width: 18px; height: 18px; }

/* ---------- Dividers ---------- */
.svg-divider {
  display: block;
  overflow: hidden;
  line-height: 0;
}
.svg-divider svg {
  display: block;
  width: 100%;
  height: 100%;
}
.svg-divider--diagonal { height: 60px; }
.svg-divider--wave { height: 70px; }

/* ---------- Focus + motion ---------- */
.svc-hero a:focus-visible,
.service-card__cta:focus-visible,
.svc-cta a:focus-visible,
.area-chips a:focus-visible {
  outline: 3px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: var(--radius-sm);
}
@media (prefers-reduced-motion: reduce) {
  .service-card-with-image:hover,
  .service-card-with-image:hover .service-card__image img,
  .why-card:hover { transform: none; }
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
  .services-grid { grid-template-columns: repeat(2, 1fr); }
  .why-bento { grid-template-columns: 1fr 1fr; }
  .why-card--wide { grid-column: span 2; }
  .why-card--photo { grid-row: auto; grid-column: span 2; }
  .why-card--photo .why-card__img { aspect-ratio: 16 / 7; }
  .svc-vent { grid-template-columns: 56px 1fr; }
  .svc-vent .btn { grid-column: 2; justify-self: start; }
}
@media (max-width: 600px) {
  .svc-hero { min-height: 0; }
  .services-grid { grid-template-columns: 1fr; }
  .why-bento { grid-template-columns: 1fr; }
  .why-card--wide,
  .why-card--photo { grid-column: auto; }
  .svc-vent { grid-template-columns: 1fr; }
  .svc-vent .btn { grid-column: 1; }
}
</style>


<!-- ===================== BREADCRUMB ===================== -->
<nav class="svc-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="svc-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/" aria-current="page">Services</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== HERO ===================== -->
<section class="svc-hero" aria-label="Roofing and exterior services across Greater Houston">
  <img class="svc-hero__bg"
       src="/assets/images/hero-roof-home-v2.jpg"
       srcset="/assets/images/hero-roof-home-v2-480.webp 480w, /assets/images/hero-roof-home-v2-960.webp 960w, /assets/images/hero-roof-home-v2-1600.webp 1600w"
       sizes="100vw"
       alt="Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing &amp; Construction"
       width="1600" height="1333" loading="eager" fetchpriority="high">
  <div class="container svc-hero__inner">
    <span class="svc-hero__eyebrow"><?php echo icon('hard-hat', 16); ?> Roofing &amp; Exterior Services · Since 1973</span>
    <h1>Roofing, siding, gutters, patio covers and fences — <span class="text-accent">one call</span> for the whole exterior</h1>
    <p class="svc-hero__answer">
      <?php echo htmlspecialchars($siteName); ?> is a family-owned, father-and-son team based in Humble, Texas, serving
      the Greater Houston area since 1973. We replace and repair roofs, handle storm damage and the insurance claim
      process, and build the rest of your exterior — with the owner on every job and a free written estimate first.
    </p>
    <div class="svc-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<!-- ===================== SERVICES (required component) ===================== -->
<section class="section svc-intro" aria-label="Roofing and exterior services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow-label">What We Do</span>
      <h2>Which <span class="text-accent">roofing and exterior services</span> does Triple G offer across Greater Houston?</h2>
      <p class="hero-answer">
        Triple G offers ten services: roof replacement in shingle or metal, roof repair, free roof inspections, storm
        and wind damage repair with claims-process help, roof damage repair, attic venting, gutter installation,
        siding with fascia and soffit, patio covers with pergolas and decks, and fences and gates — every job
        overseen personally by the owner.
      </p>
      <span class="section-subtitle">A higher standard of excellence</span>
      <p class="prose">Roofing is where we started in 1973 and it's still most of what we do. The same crew finishes the siding, gutters, patio and fence so the details match and you make one call.</p>
    </div>
  </div>
</section>

<section class="section svc-list" aria-label="Service options">
  <div class="container">
    <div class="services-grid">
      <?php foreach ($serviceCards as $i => $s):
        $tint  = ($i % 3) + 1;
        $delay = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-delay-<?php echo $delay; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $s['img']; ?>.jpg"
               srcset="<?php echo svcSrcset($s['img'], $s['variants']); ?>"
               sizes="(max-width: 600px) 100vw, (max-width: 1024px) 50vw, 380px"
               alt="<?php echo htmlspecialchars($s['alt']); ?>"
               width="<?php echo $s['w']; ?>" height="<?php echo $s['h']; ?>" loading="lazy">
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
          <a href="/services/<?php echo $s['slug']; ?>/" class="service-card__cta">Learn more<span class="sr-only"> about <?php echo htmlspecialchars($s['name']); ?></span></a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <aside class="svc-vent" data-animate aria-label="Ventilation and your shingle warranty">
      <div class="svc-vent__ico"><?php echo icon('wind', 28); ?></div>
      <div>
        <h3>Attic ventilation protects the roof — and the warranty</h3>
        <p>Shingle manufacturers can void or limit their warranties when the attic isn't properly ventilated with balanced intake and exhaust. We check both on every roof we replace, and we can correct ventilation on a roof that isn't due for replacement yet.</p>
      </div>
      <a href="/services/attic-venting/" class="btn btn-secondary">Attic Venting</a>
    </aside>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-light)" points="0,0 1200,0 0,60"/></svg>
</div>

<!-- ===================== WHY ONE CONTRACTOR ===================== -->
<section class="section svc-why" aria-label="Why hire one contractor for the whole exterior" style="padding-top: var(--space-6);">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow-label">The Triple G Difference</span>
      <h2>Why hire <span class="text-accent">one contractor</span> for the whole exterior?</h2>
      <p class="hero-answer">Because a roof, its gutters, the fascia behind them and the siding below are one system. When the same family-run crew handles all of it, the flashing, trim, paint and drainage actually line up — and there's one person answering for the whole job.</p>
    </div>
    <div class="why-bento">
      <div class="why-card why-card--wide" data-animate>
        <div class="why-card__ico"><?php echo icon('hard-hat', 26); ?></div>
        <h3>The owner is on every job</h3>
        <p>Tim Menn is on site personally to oversee the work and make sure everything is done as agreed — from the first inspection to the final magnet sweep for nails. You're not handed off to a crew you've never met.</p>
      </div>
      <div class="why-card why-card--photo" data-animate>
        <div class="why-card__img">
          <img src="/assets/images/owner-father-v2.jpg"
               srcset="/assets/images/owner-father-v2-480.webp 480w, /assets/images/owner-father-v2-960.webp 960w"
               sizes="(max-width: 1024px) 100vw, 380px"
               alt="Glenn and Tim Menn, the father-and-son team behind Triple G Roofing &amp; Construction"
               width="1152" height="1536" loading="lazy">
        </div>
        <div class="why-card__txt">
          <h3>Glenn &amp; Tim Menn</h3>
          <p>A father-and-son team serving the Greater Houston area since 1973. Voted a Nextdoor Neighborhood Favorite in 2022, 2023 and 2024.</p>
        </div>
      </div>
      <div class="why-card" data-animate>
        <div class="why-card__ico"><?php echo icon('award', 26); ?></div>
        <h3>Claims experience you can lean on</h3>
        <p>More than 50 years of claims, claims-handling and adjuster experience. We document the damage, meet your adjuster and explain your policy in plain English. Coverage is your carrier's decision — we make sure the facts are clear.</p>
      </div>
      <div class="why-card" data-animate>
        <div class="why-card__ico"><?php echo icon('check-circle', 26); ?></div>
        <h3>Details that match</h3>
        <p>Trim profiles, siding texture, paint and gutter color matched to the house — customers regularly tell us the finished work is hard to tell from the original.</p>
      </div>
      <div class="why-card why-card--wide" data-animate>
        <div class="why-card__ico"><?php echo icon('home', 26); ?></div>
        <h3>Built for Gulf Coast heat, humidity and wind</h3>
        <p>Balanced attic ventilation, sound decking, proper flashing and materials chosen for Houston weather — not a one-size template. No job is too big or too small, and every one starts with a free inspection and a free written estimate.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true">
  <svg viewBox="0 0 1200 70" preserveAspectRatio="none"><path fill="var(--color-light)" d="M0,40 C200,80 400,0 600,36 C800,72 1000,8 1200,40 L1200,70 L0,70 Z"/></svg>
</div>

<!-- ===================== SERVICE AREAS ===================== -->
<section class="section svc-areas" aria-label="Service areas" style="padding-top: var(--space-6);">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow-label">Where We Work</span>
      <h2>Where can you get Triple G service <span class="text-accent">near you</span>?</h2>
      <p class="hero-answer">We're based in Humble, Texas, and serve <?php echo count($serviceAreaCities); ?> communities across the Greater Houston area. <?php echo htmlspecialchars($serviceAreaSummary); ?></p>
    </div>
    <div class="area-chips">
      <?php foreach ($svcAreaSample as $area): ?>
      <span><?php echo htmlspecialchars($area); ?>, TX</span>
      <?php endforeach; ?>
      <a href="/service-areas/" class="area-chips__more">+ <?php echo count($serviceAreaCities) - count($svcAreaSample); ?> more communities →</a>
    </div>
  </div>
</section>

<!-- ===================== CLOSING CTA ===================== -->
<section class="svc-cta" aria-label="Request a free estimate">
  <div class="container">
    <h2>Not sure which service your home needs?</h2>
    <p>We'll take a look — free. Tell us what you're seeing and <?php echo htmlspecialchars($shortName); ?> will inspect it, explain your options in plain English, and put it in writing. <?php echo htmlspecialchars($businessHours); ?>.</p>
    <div class="svc-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get My Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
