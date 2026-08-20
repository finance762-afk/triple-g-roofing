<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

/* ============================================================
   Service Areas — Triple G Roofing & Construction
   Renders ALL $serviceAreaCities (owner-supplied list), grouped
   by region. Cities in $serviceAreas link to their dedicated page;
   those five are a subset, not the limit.
   ============================================================ */

$currentPage     = 'service-areas';
$pageTitle       = 'Service Areas — 50 Greater Houston Communities | ' . $siteName;
$pageDescription = 'Triple G Roofing & Construction is based in Humble, TX and serves 50 communities across the Greater Houston area — Kingwood, Atascocita, Spring, The Woodlands, Cypress, Houston, Pasadena, Baytown, Dayton, Liberty and more. Family owned since 1973.';
$canonicalUrl    = $siteUrl . '/service-areas/';

/* --- Regional grouping of the owner-supplied list --- */
$areaGroups = [
    'North & Northeast Harris County' => [
        'blurb'  => 'Home base. Humble, the Lake Houston communities and the US-59 / FM 1960 corridor.',
        'cities' => ['Humble', 'Kingwood', 'Atascocita', 'Huffman', 'Crosby', 'Porter', 'Porter Heights', 'New Caney', 'Woodbranch', 'Roman Forest', 'Splendora', 'Cleveland', 'Spring', 'Aldine'],
    ],
    'Montgomery County' => [
        'blurb'  => 'The Woodlands and the I-45 corridor north to Conroe.',
        'cities' => ['The Woodlands', 'Shenandoah', 'Oak Ridge North', 'Conroe', 'Cut and Shoot', 'Panorama Village', 'Pinehurst'],
    ],
    'Inside Houston & the Villages' => [
        'blurb'  => 'The city itself, the Memorial Villages, West U, Bellaire and out to Cypress.',
        'cities' => ['Houston', 'Jersey Village', 'Spring Valley Village', 'Hunters Creek Village', 'Hedwig Village', 'Bunker Hill Village', 'Piney Point Village', 'West University Place', 'Southside Place', 'Bellaire', 'Cypress'],
    ],
    'East & Southeast Harris County' => [
        'blurb'  => 'From Sheldon and Channelview down the Ship Channel to Pasadena, Deer Park, La Porte and Baytown.',
        'cities' => ['Sheldon', 'Barrett', 'Highlands', 'Jacinto City', 'Cloverleaf', 'Channelview', 'Galena Park', 'Pasadena', 'South Houston', 'Deer Park', 'La Porte', 'Baytown', 'Brookside Village'],
    ],
    'Liberty & Chambers Counties' => [
        'blurb'  => 'East along I-10 and US-90 — Mont Belvieu, Dayton and Liberty.',
        'cities' => ['Mont Belvieu', 'Old River-Winfree', 'Dayton', 'Liberty', 'Kenefick'],
    ],
];

/* Defensive: any city in config that isn't grouped above still renders (never silently drop one) */
$grouped = [];
foreach ($areaGroups as $g) { $grouped = array_merge($grouped, $g['cities']); }
$ungrouped = array_values(array_diff($serviceAreaCities, $grouped));
if ($ungrouped) {
    $areaGroups['Also Serving'] = ['blurb' => 'More communities across the Greater Houston area.', 'cities' => $ungrouped];
}
$totalCities = count($serviceAreaCities);

/* --- Schema: BreadcrumbList + ItemList of area pages --- */
$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',          'item' => $siteUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Service Areas', 'item' => $canonicalUrl],
    ],
];
$areaListSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'ItemList',
    'name'     => 'Service area pages — ' . $siteName,
    'itemListElement' => array_map(function ($i, $area) use ($siteUrl) {
        return [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $area . ', TX',
            'url'      => $siteUrl . '/service-areas/' . getAreaSlug($area) . '/',
        ];
    }, array_keys($serviceAreas), $serviceAreas),
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n"
    . '<script type="application/ld+json">' . json_encode($areaListSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Service areas — page-specific styles (Premium tier)
   Tokens only. Prefix: .sa-
   ============================================================ */
[data-animate].sa-delay-1 { transition-delay: .06s; }
[data-animate].sa-delay-2 { transition-delay: .14s; }
[data-animate].sa-delay-3 { transition-delay: .22s; }
[data-animate].sa-delay-4 { transition-delay: .30s; }
[data-animate].sa-delay-5 { transition-delay: .38s; }

/* ---------- Breadcrumb ---------- */
.sa-breadcrumb {
  background: var(--color-light);
  border-bottom: 1px solid var(--color-gray-light);
}
.sa-breadcrumb ol {
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
.sa-breadcrumb a { color: var(--color-gray-dark); }
.sa-breadcrumb a:hover { color: var(--color-primary); }
.sa-breadcrumb [aria-current] {
  color: var(--color-primary);
  font-weight: 600;
}
.sa-breadcrumb-sep { color: var(--color-gray-light); }

/* ---------- Hero: layered photo + gradient + noise ---------- */
.sa-hero {
  position: relative;
  min-height: 54vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + var(--space-6)) 0 var(--space-16);
  overflow: hidden;
  isolation: isolate;
  text-align: center;
}
.sa-hero__bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 40%;
  z-index: 0;
}
.sa-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  background: linear-gradient(180deg,
    color-mix(in srgb, var(--color-secondary) 90%, transparent) 0%,
    color-mix(in srgb, var(--color-primary-dark) 78%, var(--color-secondary)) 100%);
}
.sa-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
  opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.sa-hero__inner {
  position: relative;
  z-index: 2;
  max-width: 860px;
  margin-inline: auto;
}
.sa-hero__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  font-family: var(--font-heading);
  font-size: var(--font-size-sm);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--color-accent);
  background: color-mix(in srgb, var(--color-primary) 18%, transparent);
  border: 1px solid color-mix(in srgb, var(--color-white) 18%, transparent);
  padding: var(--space-2) var(--space-4);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-5);
}
.sa-hero__eyebrow svg { width: 16px; height: 16px; }
.sa-hero h1 {
  color: var(--color-white);
  font-size: clamp(2.2rem, 5vw, 3.75rem);
  line-height: 1.06;
  margin-bottom: var(--space-5);
  text-wrap: balance;
}
.sa-hero h1 .text-accent { font-size: 1.04em; }
.sa-hero__lede {
  color: color-mix(in srgb, var(--color-white) 90%, transparent);
  font-size: var(--font-size-lg);
  line-height: 1.7;
  max-width: 60ch;
  margin: 0 auto var(--space-8);
}
.sa-hero__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-4);
  justify-content: center;
}
.sa-hero__actions .btn svg { width: 18px; height: 18px; }

/* ---------- Facts ribbon (overlapping the hero) ---------- */
.sa-ribbon {
  position: relative;
  z-index: 3;
  margin-top: calc(-1 * var(--space-10));
}
.sa-ribbon__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  background: var(--color-white);
  border-radius: var(--radius-xl);
  box-shadow: var(--shadow-xl);
  overflow: hidden;
}
.sa-ribbon__item {
  padding: var(--space-6) var(--space-5);
  text-align: center;
  border-left: 1px solid var(--color-gray-light);
}
.sa-ribbon__item:first-child { border-left: 0; }
.sa-ribbon__num {
  display: block;
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  line-height: 1;
  color: var(--color-primary);
  margin-bottom: var(--space-2);
}
.sa-ribbon__label {
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
  font-weight: 500;
  line-height: 1.4;
}

/* ---------- Section headers ---------- */
.sa-head {
  max-width: 780px;
  margin-inline: auto;
  text-align: center;
}
.sa-head h2 {
  font-size: clamp(1.9rem, 3.6vw, 2.75rem);
  line-height: 1.12;
  color: var(--color-dark);
  margin: var(--space-3) 0 var(--space-4);
  text-wrap: balance;
}
.sa-head p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-lg);
  line-height: 1.7;
}

/* ---------- Regions (signature section) ---------- */
.sa-regions { background: var(--color-white); }
.sa-region-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-12);
}
.sa-region {
  position: relative;
  background: var(--color-light);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-xl);
  padding: var(--space-8);
  overflow: hidden;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.sa-region:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.sa-region:first-child {
  grid-column: span 2;
  background: linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 10%, var(--color-white)) 0%, var(--color-white) 60%);
}
.sa-region::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 72px;
  height: 6px;
  border-radius: 0 0 var(--radius-full) 0;
  background: var(--color-primary);
}
.sa-region:nth-child(2)::before { background: var(--color-accent); }
.sa-region:nth-child(3)::before { background: var(--color-secondary); }
.sa-region:nth-child(4)::before { background: var(--color-accent); }
.sa-region:nth-child(5)::before { background: var(--color-primary); }
.sa-region__head {
  display: flex;
  align-items: flex-start;
  gap: var(--space-4);
  margin-bottom: var(--space-5);
}
.sa-region__ico {
  width: 48px;
  height: 48px;
  border-radius: var(--radius-md);
  background: var(--color-white);
  box-shadow: var(--shadow-sm);
  color: var(--color-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.sa-region__ico svg { width: 24px; height: 24px; }
.sa-region h3 {
  font-size: var(--font-size-xl);
  color: var(--color-dark);
  margin-bottom: var(--space-1);
  text-wrap: balance;
}
.sa-region__blurb {
  color: var(--color-gray);
  font-size: var(--font-size-sm);
  line-height: 1.5;
  margin: 0;
}
.sa-region__count {
  margin-left: auto;
  flex-shrink: 0;
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: var(--color-gray);
  background: var(--color-white);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-full);
  padding: var(--space-1) var(--space-3);
}
.sa-city-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-2);
}
.sa-city-list li > span,
.sa-city-list li > a {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  background: var(--color-white);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-full);
  padding: var(--space-2) var(--space-4);
  font-size: var(--font-size-sm);
  font-weight: 600;
  color: var(--color-gray-dark);
  transition: background var(--transition-base), color var(--transition-base), border-color var(--transition-base);
}
.sa-city-list li > a {
  color: var(--color-primary);
  border-color: color-mix(in srgb, var(--color-primary) 35%, var(--color-gray-light));
}
.sa-city-list li > a::after {
  content: '→';
  font-size: var(--font-size-xs);
  transition: transform var(--transition-base);
}
.sa-city-list li > a:hover {
  background: var(--color-primary);
  border-color: var(--color-primary);
  color: var(--color-white);
}
.sa-city-list li > a:hover::after { transform: translateX(3px); }
.sa-city-list li > a:focus-visible {
  outline: 3px solid var(--color-accent);
  outline-offset: 2px;
}
.sa-legend {
  margin-top: var(--space-8);
  text-align: center;
  font-size: var(--font-size-sm);
  color: var(--color-gray);
}
.sa-legend a {
  color: var(--color-primary);
  font-weight: 700;
}

/* ---------- Dedicated-page cards ---------- */
.sa-pages { background: var(--color-light); }
.sa-pages__grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: var(--space-5);
  margin-top: var(--space-10);
}
.sa-page-card {
  position: relative;
  display: flex;
  flex-direction: column;
  background: var(--color-white);
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-card);
  border: 1px solid var(--color-gray-light);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.sa-page-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-xl);
}
.sa-page-card__head {
  background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-dark-alt) 100%);
  padding: var(--space-6) var(--space-5);
  position: relative;
  overflow: hidden;
}
.sa-page-card__head::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, color-mix(in srgb, var(--color-primary) 22%, transparent) 0%, transparent 70%);
  pointer-events: none;
}
.sa-page-card__head h3 {
  position: relative;
  z-index: 1;
  color: var(--color-white);
  font-size: var(--font-size-xl);
  margin: 0;
  text-wrap: balance;
}
.sa-page-card__head span {
  position: relative;
  z-index: 1;
  display: block;
  color: var(--color-accent);
  font-size: var(--font-size-xs);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-weight: 700;
  margin-top: var(--space-1);
}
.sa-page-card__body {
  padding: var(--space-5);
  display: flex;
  flex-direction: column;
  flex: 1;
}
.sa-page-card__body p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  line-height: 1.6;
  margin: 0 0 var(--space-5);
}
.sa-page-card .btn {
  margin-top: auto;
  width: 100%;
}

/* ---------- Promise band ---------- */
.sa-promise { background: var(--color-white); }
.sa-promise__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-10);
}
.sa-promise__item {
  display: grid;
  grid-template-columns: 48px 1fr;
  gap: var(--space-4);
  align-items: start;
  padding: var(--space-6);
  border-radius: var(--radius-lg);
  background: var(--color-light);
  border: 1px solid var(--color-gray-light);
}
.sa-promise__ico {
  width: 48px;
  height: 48px;
  border-radius: var(--radius-md);
  background: var(--color-primary);
  color: var(--color-white);
  display: flex;
  align-items: center;
  justify-content: center;
}
.sa-promise__ico svg { width: 24px; height: 24px; }
.sa-promise__item h3 {
  font-size: var(--font-size-lg);
  color: var(--color-dark);
  margin-bottom: var(--space-2);
  text-wrap: balance;
}
.sa-promise__item p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  line-height: 1.65;
  margin: 0;
}

/* ---------- CTA ---------- */
.sa-cta {
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: var(--space-16) 0;
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
}
.sa-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.sa-cta .container { position: relative; z-index: 1; }
.sa-cta h2 {
  color: var(--color-white);
  font-size: clamp(1.9rem, 4vw, 2.75rem);
  margin-bottom: var(--space-4);
  text-wrap: balance;
}
.sa-cta p {
  color: color-mix(in srgb, var(--color-white) 92%, transparent);
  max-width: 58ch;
  margin: 0 auto var(--space-8);
  font-size: var(--font-size-lg);
}
.sa-cta__actions {
  display: flex;
  gap: var(--space-4);
  justify-content: center;
  flex-wrap: wrap;
}
.sa-cta .btn svg { width: 20px; height: 20px; }

/* ---------- Dividers ---------- */
.sa-divider {
  display: block;
  overflow: hidden;
  line-height: 0;
}
.sa-divider svg {
  display: block;
  width: 100%;
  height: 100%;
}
.sa-divider--slant { height: 56px; }
.sa-divider--wave { height: 64px; }

/* ---------- Motion ---------- */
@media (prefers-reduced-motion: reduce) {
  .sa-region:hover,
  .sa-page-card:hover { transform: none; }
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
  .sa-ribbon__grid { grid-template-columns: 1fr 1fr; }
  .sa-ribbon__item:nth-child(3) { border-left: 0; }
  .sa-ribbon__item:nth-child(n+3) { border-top: 1px solid var(--color-gray-light); }
  .sa-pages__grid { grid-template-columns: repeat(3, 1fr); }
  .sa-promise__grid { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
  .sa-region-grid { grid-template-columns: 1fr; }
  .sa-region:first-child { grid-column: auto; }
  .sa-region { padding: var(--space-6); }
  .sa-region__head { flex-wrap: wrap; }
  .sa-region__count { margin-left: 0; }
  .sa-pages__grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 520px) {
  .sa-hero { min-height: 0; }
  .sa-ribbon { margin-top: calc(-1 * var(--space-6)); }
  .sa-ribbon__grid { grid-template-columns: 1fr 1fr; }
  .sa-pages__grid { grid-template-columns: 1fr; }
  .sa-cta__actions { flex-direction: column; align-items: stretch; }
}
</style>


<!-- ===================== BREADCRUMB ===================== -->
<nav class="sa-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="sa-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/service-areas/" aria-current="page">Service Areas</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== HERO ===================== -->
<section class="sa-hero" aria-label="Service areas">
  <img class="sa-hero__bg"
       src="/assets/images/roof-home-trees.jpg"
       srcset="/assets/images/roof-home-trees-480.webp 480w, /assets/images/roof-home-trees-960.webp 960w"
       sizes="100vw"
       alt="Brick home with a new dark shingle roof under mature trees"
       width="1200" height="1600" loading="eager" fetchpriority="high">
  <div class="container sa-hero__inner">
    <span class="sa-hero__eyebrow"><?php echo icon('map-pin', 16); ?> Where We Work</span>
    <h1>Serving <span class="text-accent"><?php echo $totalCities; ?> Communities</span> Across Greater Houston</h1>
    <p class="sa-hero__lede">
      <?php echo htmlspecialchars($serviceAreaSummary); ?> <?php echo htmlspecialchars($siteName); ?> is based in
      Humble, Texas — a father-and-son team that has been on roofs across the Greater Houston area since 1973.
    </p>
    <div class="sa-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<!-- ===================== FACTS RIBBON ===================== -->
<div class="sa-ribbon" aria-label="At a glance">
  <div class="container">
    <div class="sa-ribbon__grid" data-animate>
      <div class="sa-ribbon__item">
        <span class="sa-ribbon__num">1973</span>
        <span class="sa-ribbon__label">Serving Greater Houston since</span>
      </div>
      <div class="sa-ribbon__item">
        <span class="sa-ribbon__num"><?php echo $totalCities; ?></span>
        <span class="sa-ribbon__label">Communities on our service list</span>
      </div>
      <div class="sa-ribbon__item">
        <span class="sa-ribbon__num">Humble</span>
        <span class="sa-ribbon__label">Where we're based — we come to you</span>
      </div>
      <div class="sa-ribbon__item">
        <span class="sa-ribbon__num">3×</span>
        <span class="sa-ribbon__label">Nextdoor Neighborhood Favorite (2022–2024)</span>
      </div>
    </div>
  </div>
</div>

<!-- ===================== REGIONS ===================== -->
<section class="section sa-regions" aria-labelledby="sa-regions-title">
  <div class="container">
    <div class="sa-head">
      <span class="eyebrow-label">Every Community We Serve</span>
      <h2 id="sa-regions-title">Which Greater Houston communities does <span class="text-accent">Triple G</span> serve?</h2>
      <p>All <?php echo $totalCities; ?> communities on our list, grouped by area. Communities with a dedicated page are highlighted — but a highlight isn't a boundary. If you're anywhere near this map, call us.</p>
    </div>
    <div class="sa-region-grid">
      <?php $gi = 0; foreach ($areaGroups as $regionName => $group): $gi++; ?>
      <article class="sa-region sa-delay-<?php echo min($gi, 5); ?>" data-animate>
        <div class="sa-region__head">
          <div class="sa-region__ico" aria-hidden="true"><?php echo icon('map-pin', 24); ?></div>
          <div>
            <h3><?php echo htmlspecialchars($regionName); ?></h3>
            <p class="sa-region__blurb"><?php echo htmlspecialchars($group['blurb']); ?></p>
          </div>
          <span class="sa-region__count"><?php echo count($group['cities']); ?> communities</span>
        </div>
        <ul class="sa-city-list">
          <?php foreach ($group['cities'] as $city): ?>
          <li>
            <?php if (in_array($city, $serviceAreas, true)): ?>
            <a href="/service-areas/<?php echo getAreaSlug($city); ?>/"><?php echo htmlspecialchars($city); ?></a>
            <?php else: ?>
            <span><?php echo htmlspecialchars($city); ?></span>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </article>
      <?php endforeach; ?>
    </div>
    <p class="sa-legend">Highlighted communities link to a dedicated page. Don't see your neighborhood? <a href="tel:+<?php echo $phoneRaw; ?>">Call <?php echo $phone; ?></a> — no job is too big or too small.</p>
  </div>
</section>

<div class="sa-divider sa-divider--slant" aria-hidden="true">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none"><polygon fill="var(--color-light)" points="0,56 1200,0 1200,56"/></svg>
</div>

<!-- ===================== DEDICATED PAGES ===================== -->
<section class="section sa-pages" aria-labelledby="sa-pages-title" style="padding-top: var(--space-8);">
  <div class="container">
    <div class="sa-head">
      <span class="eyebrow-label">Local Pages</span>
      <h2 id="sa-pages-title">Communities with a <span class="text-accent">dedicated page</span></h2>
      <p>These <?php echo count($serviceAreas); ?> pages go deeper on local roofing conditions and the work we've done nearby. They're a starting point — not the limit of where we work.</p>
    </div>
    <div class="sa-pages__grid">
      <?php foreach ($serviceAreas as $i => $area): ?>
      <article class="sa-page-card sa-delay-<?php echo $i + 1; ?>" data-animate>
        <div class="sa-page-card__head">
          <h3><?php echo htmlspecialchars($area); ?></h3>
          <span>Texas</span>
        </div>
        <div class="sa-page-card__body">
          <p>Roofing, storm damage repair, siding, gutters, patio covers and fences for <?php echo htmlspecialchars($area); ?> homeowners — one of the many Greater Houston communities we serve.</p>
          <a href="/service-areas/<?php echo getAreaSlug($area); ?>/" class="btn btn-primary">View <?php echo htmlspecialchars($area); ?> page</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="sa-divider sa-divider--wave" aria-hidden="true">
  <svg viewBox="0 0 1200 64" preserveAspectRatio="none"><path fill="var(--color-light)" d="M0,0 C300,64 900,64 1200,0 L1200,0 L0,0 Z"/></svg>
</div>

<!-- ===================== WHAT YOU GET ANYWHERE ===================== -->
<section class="section sa-promise" aria-labelledby="sa-promise-title" style="padding-top: var(--space-6);">
  <div class="container">
    <div class="sa-head">
      <span class="eyebrow-label">Same Standard Everywhere</span>
      <h2 id="sa-promise-title">What do you get in every community we serve?</h2>
      <p>Whether you're in Kingwood or Baytown, the job runs the same way it has since 1973.</p>
    </div>
    <div class="sa-promise__grid">
      <div class="sa-promise__item" data-animate>
        <div class="sa-promise__ico"><?php echo icon('hard-hat', 24); ?></div>
        <div>
          <h3>The owner on your job</h3>
          <p>Tim Menn is on every job personally to oversee the work and make sure everything is done as agreed.</p>
        </div>
      </div>
      <div class="sa-promise__item sa-delay-1" data-animate>
        <div class="sa-promise__ico"><?php echo icon('search', 24); ?></div>
        <div>
          <h3>Free inspection, free written estimate</h3>
          <p>We come take a look, photograph what we find, and put the scope in writing. No pressure, no surprise charges.</p>
        </div>
      </div>
      <div class="sa-promise__item sa-delay-2" data-animate>
        <div class="sa-promise__ico"><?php echo icon('shield', 24); ?></div>
        <div>
          <h3>Help with the claims process</h3>
          <p>More than 50 years of claims-handling and adjuster experience to walk you through a storm claim from start to finish. Coverage is your carrier's decision; the documentation is ours.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="sa-cta" aria-label="Request a free estimate">
  <div class="container">
    <h2>Need a roofer in your part of Greater Houston?</h2>
    <p>Call <?php echo htmlspecialchars($shortName); ?> and tell us where you are and what you're seeing. We'll get your free inspection on the schedule. <?php echo htmlspecialchars($businessHours); ?>.</p>
    <div class="sa-cta__actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 20); ?> <?php echo $phone; ?></a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Get Your Free Estimate</a>
    </div>
  </div>
</section>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
