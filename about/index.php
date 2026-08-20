<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   About — Triple G Roofing & Construction
   Facts: references/CLIENT-FACTS.md (since 1973, father/son,
   based in Humble TX, owner on every job, Nextdoor 2022–2024).
   ============================================================ */

$currentPage     = 'about';
$pageTitle       = 'About Us | Triple G Roofing & Construction, Humble TX';
$pageDescription = 'Glenn and Tim Menn — a father-and-son team serving the Greater Houston area since 1973. Based in Humble, TX. Roofing, siding, gutters, patio covers, decks and fences, with the owner on every job.';
$canonicalUrl    = $siteUrl . '/about/';

$aboutReviews = getTestimonialsFor('roof-replacement', 3);

/* What we build — every photo is the client's own (references/photo-manifest.json) */
$aboutBuilds = [
    ['label' => 'Roofs',        'href' => '/services/roof-replacement/',    'img' => 'roof-finished-brick', 'w' => 1200, 'h' => 1600, 'variants' => [480, 960], 'alt' => 'Completed shingle roof replacement on a brick ranch home'],
    ['label' => 'Siding',       'href' => '/services/siding-fascia-soffit/', 'img' => 'siding-dormer',       'w' => 1000, 'h' => 1333, 'variants' => [480, 960], 'alt' => 'Dormer siding replaced with new fiber-cement panels'],
    ['label' => 'Gutters',      'href' => '/services/gutter-installation/',  'img' => 'gutter-installation-v2', 'w' => 720,  'h' => 960,  'variants' => [480],      'alt' => 'New downspout and gutter on a brick covered patio'],
    ['label' => 'Patio Covers', 'href' => '/services/patio-covers-decks/',   'img' => 'patio-cover-fans',    'w' => 1200, 'h' => 1600, 'variants' => [480, 960], 'alt' => 'Covered patio with beadboard ceiling and fans'],
    ['label' => 'Pergolas',     'href' => '/services/patio-covers-decks/',   'img' => 'pergola-cedar',       'w' => 1200, 'h' => 1600, 'variants' => [480, 960], 'alt' => 'Custom cedar pergola over a back patio on a brick home'],
    ['label' => 'Decks',        'href' => '/services/patio-covers-decks/',   'img' => 'deck-new',            'w' => 896,  'h' => 1600, 'variants' => [480],      'alt' => 'New pressure-treated wood deck wrapping a backyard'],
    ['label' => 'Fences',       'href' => '/services/fences-gates/',         'img' => 'fence-gate-cedar',    'w' => 1200, 'h' => 1600, 'variants' => [480, 960], 'alt' => 'New cedar fence and double gate beside a brick home'],
];

/* Nextdoor badges — exact master sizes from the manifest; no webp variants exist for these */
$aboutBadges = [
    ['img' => 'nextdoor-2022', 'w' => 391, 'h' => 600, 'alt' => 'Nextdoor Neighborhood Favorite 2022 award badge', 'year' => '2022'],
    ['img' => 'nextdoor-2023', 'w' => 390, 'h' => 600, 'alt' => 'Nextdoor Neighborhood Faves 2023 award badge',    'year' => '2023'],
    ['img' => 'nextdoor-2024', 'w' => 338, 'h' => 600, 'alt' => 'Nextdoor Neighborhood Faves 2024 winner badge',   'year' => '2024'],
];

function aboutSrcset($img, $variants) {
    $parts = [];
    foreach ($variants as $v) { $parts[] = '/assets/images/' . $img . '-' . $v . '.webp ' . $v . 'w'; }
    return implode(', ', $parts);
}

/* --- Schema: AboutPage + BreadcrumbList --- */
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type'       => 'AboutPage',
            '@id'         => $canonicalUrl . '#webpage',
            'url'         => $canonicalUrl,
            'name'        => $pageTitle,
            'description' => $pageDescription,
            'about'       => ['@id' => $siteUrl . '/#organization'],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => $canonicalUrl],
            ],
        ],
    ],
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   About page — page-specific styles (Premium tier)
   Tokens only. Prefix: .ab-
   ============================================================ */
.ab-sr-only {
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
[data-animate].ab-delay-1 { transition-delay: .06s; }
[data-animate].ab-delay-2 { transition-delay: .14s; }
[data-animate].ab-delay-3 { transition-delay: .22s; }
[data-animate].ab-delay-4 { transition-delay: .30s; }

/* ---------- Breadcrumb ---------- */
.ab-breadcrumb {
  background: var(--color-light);
  border-bottom: 1px solid var(--color-gray-light);
}
.ab-breadcrumb ol {
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
.ab-breadcrumb a { color: var(--color-gray-dark); }
.ab-breadcrumb a:hover { color: var(--color-primary); }
.ab-breadcrumb [aria-current] {
  color: var(--color-primary);
  font-weight: 600;
}
.ab-breadcrumb-sep { color: var(--color-gray-light); }

/* ---------- Hero: layered photo + gradient + noise ---------- */
.ab-hero {
  position: relative;
  min-height: 58vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + var(--space-8)) 0 var(--space-16);
  overflow: hidden;
  isolation: isolate;
}
.ab-hero__bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 40%;
  z-index: 0;
}
.ab-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  background: linear-gradient(100deg,
    color-mix(in srgb, var(--color-secondary) 96%, transparent) 0%,
    color-mix(in srgb, var(--color-secondary) 84%, transparent) 48%,
    color-mix(in srgb, var(--color-secondary) 55%, transparent) 100%);
}
.ab-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
  opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.ab-hero__inner {
  position: relative;
  z-index: 2;
  max-width: 860px;
}
.ab-hero__eyebrow {
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
.ab-hero__eyebrow svg { width: 16px; height: 16px; }
.ab-hero h1 {
  color: var(--color-white);
  font-size: clamp(2.3rem, 5vw, 3.9rem);
  line-height: 1.05;
  margin-bottom: var(--space-5);
  text-wrap: balance;
}
.ab-hero h1 .text-accent { font-size: 1.04em; }
.ab-hero__lede {
  color: color-mix(in srgb, var(--color-white) 90%, transparent);
  font-size: var(--font-size-lg);
  line-height: 1.7;
  max-width: 62ch;
  margin-bottom: var(--space-8);
}
.ab-hero__trust {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-3) var(--space-6);
  list-style: none;
  padding: 0;
  margin: 0 0 var(--space-8);
}
.ab-hero__trust li {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  color: color-mix(in srgb, var(--color-white) 92%, transparent);
  font-size: var(--font-size-sm);
  font-weight: 600;
}
.ab-hero__trust svg {
  width: 18px;
  height: 18px;
  color: var(--color-accent);
  flex-shrink: 0;
}
.ab-hero__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-4);
}
.ab-hero__actions .btn svg { width: 18px; height: 18px; }

/* ---------- Shared section header ---------- */
.ab-head { max-width: 760px; }
.ab-head--center {
  margin-inline: auto;
  text-align: center;
}
.ab-head .eyebrow-label { margin-bottom: var(--space-3); }
.ab-head h2 {
  font-size: clamp(1.9rem, 3.6vw, 2.75rem);
  line-height: 1.12;
  color: var(--color-dark);
  margin-bottom: var(--space-4);
  text-wrap: balance;
}
.ab-head p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-lg);
  line-height: 1.7;
  max-width: 65ch;
}
.ab-head--center p { margin-inline: auto; }

/* ---------- Story split (portrait frame) ---------- */
.ab-story { background: var(--color-white); }
.ab-story__grid {
  display: grid;
  grid-template-columns: minmax(0, 5fr) minmax(0, 6fr);
  gap: var(--space-12);
  align-items: center;
}
.ab-portrait {
  position: relative;
  max-width: 440px;
  margin-inline: auto;
}
.ab-portrait::before {
  content: '';
  position: absolute;
  inset: var(--space-5) calc(-1 * var(--space-5)) calc(-1 * var(--space-5)) var(--space-5);
  border: 2px solid var(--color-accent);
  border-radius: var(--radius-xl);
  z-index: 0;
}
.ab-portrait::after {
  content: '';
  position: absolute;
  top: calc(-1 * var(--space-6));
  left: calc(-1 * var(--space-6));
  width: 120px;
  height: 120px;
  border-radius: var(--radius-full);
  background: radial-gradient(circle, color-mix(in srgb, var(--color-primary) 22%, transparent) 0%, transparent 70%);
  z-index: 0;
}
.ab-portrait__frame {
  position: relative;
  z-index: 1;
  aspect-ratio: 3 / 4;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.ab-portrait__frame img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top;
  display: block;
}
.ab-portrait__caption {
  position: absolute;
  z-index: 2;
  left: var(--space-5);
  right: var(--space-5);
  bottom: var(--space-5);
  background: color-mix(in srgb, var(--color-secondary) 86%, transparent);
  backdrop-filter: blur(6px);
  color: var(--color-white);
  border-radius: var(--radius-md);
  padding: var(--space-3) var(--space-4);
  font-size: var(--font-size-sm);
  line-height: 1.4;
}
.ab-portrait__caption strong {
  display: block;
  font-family: var(--font-heading);
  font-size: var(--font-size-base);
}
.ab-portrait__caption span { color: var(--color-accent); }
.ab-story__copy p {
  color: var(--color-gray-dark);
  line-height: 1.75;
  margin-bottom: var(--space-4);
  max-width: 62ch;
}
.ab-story__copy p:last-child { margin-bottom: 0; }
.ab-story__script {
  font-family: var(--font-accent);
  font-size: var(--font-size-2xl);
  color: var(--color-primary);
  display: block;
  margin-bottom: var(--space-2);
}
.ab-story__quote {
  margin: var(--space-6) 0 0;
  padding: var(--space-4) var(--space-5);
  border-left: 4px solid var(--color-primary);
  background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white));
  border-radius: var(--radius-md);
  font-style: italic;
  color: var(--color-dark);
  line-height: 1.65;
}

/* ---------- Stats strip (facts only) ---------- */
.ab-stats {
  background: var(--color-secondary);
  position: relative;
  overflow: hidden;
}
.ab-stats::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 15% 50%, color-mix(in srgb, var(--color-primary) 30%, transparent) 0%, transparent 55%);
  pointer-events: none;
}
.ab-stats .container { position: relative; z-index: 1; }
.ab-stats__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-6);
}
.ab-stat {
  text-align: center;
  padding: var(--space-6) var(--space-4);
  border-left: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
}
.ab-stat:first-child { border-left: 0; }
.ab-stat__num {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 4.5vw, 3.25rem);
  font-weight: 800;
  line-height: 1;
  color: var(--color-white);
  margin-bottom: var(--space-2);
}
.ab-stat__num span { color: var(--color-accent); }
.ab-stat__label {
  color: color-mix(in srgb, var(--color-white) 80%, transparent);
  font-size: var(--font-size-sm);
  font-weight: 500;
  line-height: 1.4;
}

/* ---------- Values (3 cards) ---------- */
.ab-values { background: var(--color-light); }
.ab-values__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-10);
}
.ab-value {
  position: relative;
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  box-shadow: var(--shadow-card);
  border-top: 4px solid transparent;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.ab-value:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-xl);
}
.ab-value--1 { border-top-color: var(--color-primary); }
.ab-value--2 { border-top-color: var(--color-accent); }
.ab-value--3 { border-top-color: var(--color-secondary); }
.ab-value__ico {
  width: 56px;
  height: 56px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: var(--space-5);
  color: var(--color-white);
  background: var(--color-primary);
  box-shadow: var(--shadow-md);
}
.ab-value--2 .ab-value__ico { background: var(--color-accent); }
.ab-value--3 .ab-value__ico { background: var(--color-secondary); }
.ab-value__ico svg { width: 28px; height: 28px; }
.ab-value h3 {
  font-size: var(--font-size-xl);
  color: var(--color-dark);
  margin-bottom: var(--space-3);
  text-wrap: balance;
}
.ab-value p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  line-height: 1.7;
  margin: 0;
}

/* ---------- What we build (photo tiles) ---------- */
.ab-build { background: var(--color-white); }
.ab-build__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-auto-rows: 1fr;
  gap: var(--space-4);
  margin-top: var(--space-10);
}
.ab-tile {
  position: relative;
  display: block;
  aspect-ratio: 4 / 5;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-md);
  isolation: isolate;
}
.ab-tile:first-child {
  grid-column: span 2;
  aspect-ratio: auto;
}
.ab-tile img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.ab-tile:hover img { transform: scale(1.06); }
.ab-tile::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 45%, color-mix(in srgb, var(--color-secondary) 88%, transparent) 100%);
  z-index: 1;
}
.ab-tile__label {
  position: absolute;
  z-index: 2;
  left: var(--space-4);
  bottom: var(--space-4);
  right: var(--space-4);
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: var(--color-white);
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: var(--font-size-lg);
}
.ab-tile__label svg {
  width: 20px;
  height: 20px;
  color: var(--color-accent);
  transition: transform var(--transition-base);
}
.ab-tile:hover .ab-tile__label svg { transform: translateX(4px); }
.ab-tile:focus-visible {
  outline: 3px solid var(--color-accent);
  outline-offset: 3px;
}

/* ---------- Insurance experience split ---------- */
.ab-claims { background: var(--color-light); }
.ab-claims__grid {
  display: grid;
  grid-template-columns: minmax(0, 6fr) minmax(0, 5fr);
  gap: var(--space-12);
  align-items: center;
}
.ab-claims__copy p {
  color: var(--color-gray-dark);
  line-height: 1.75;
  margin-bottom: var(--space-4);
  max-width: 62ch;
}
.ab-claims__steps {
  list-style: none;
  padding: 0;
  margin: var(--space-6) 0 0;
  display: grid;
  gap: var(--space-3);
  counter-reset: abstep;
}
.ab-claims__steps li {
  counter-increment: abstep;
  display: grid;
  grid-template-columns: 40px 1fr;
  gap: var(--space-4);
  align-items: start;
  background: var(--color-white);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  padding: var(--space-4) var(--space-5);
  color: var(--color-gray-dark);
  line-height: 1.6;
}
.ab-claims__steps li::before {
  content: counter(abstep, decimal-leading-zero);
  font-family: var(--font-heading);
  font-weight: 800;
  color: var(--color-primary);
  font-size: var(--font-size-lg);
  line-height: 1.4;
}
.ab-claims__steps strong { color: var(--color-dark); }
.ab-claims__note {
  margin-top: var(--space-6);
  padding: var(--space-4) var(--space-5);
  background: color-mix(in srgb, var(--color-accent) 16%, var(--color-white));
  border-radius: var(--radius-md);
  font-size: var(--font-size-sm);
  color: var(--color-dark);
  line-height: 1.6;
}
.ab-claims__media {
  position: relative;
  max-width: 460px;
  margin-inline: auto;
}
.ab-claims__frame {
  aspect-ratio: 4 / 5;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  clip-path: polygon(0 0, 100% 0, 100% 94%, 88% 100%, 0 100%);
}
.ab-claims__frame img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.ab-claims__badge {
  position: absolute;
  top: var(--space-6);
  left: calc(-1 * var(--space-6));
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: var(--radius-md);
  padding: var(--space-3) var(--space-5);
  box-shadow: var(--shadow-lg);
  font-family: var(--font-heading);
  line-height: 1.1;
}
.ab-claims__badge strong {
  display: block;
  font-size: var(--font-size-3xl);
  font-weight: 800;
}
.ab-claims__badge span {
  font-size: var(--font-size-xs);
  text-transform: uppercase;
  letter-spacing: 1.5px;
}

/* ---------- Nextdoor badges ---------- */
.ab-awards {
  background: var(--color-white);
  text-align: center;
}
.ab-awards__row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-end;
  gap: var(--space-8);
  margin-top: var(--space-10);
}
.ab-award {
  width: clamp(150px, 18vw, 210px);
  transition: transform var(--transition-base);
}
.ab-award:hover { transform: translateY(-6px); }
.ab-award img {
  width: 100%;
  height: auto;
  display: block;
  filter: drop-shadow(0 12px 18px color-mix(in srgb, var(--color-secondary) 18%, transparent));
}
.ab-award span {
  display: block;
  margin-top: var(--space-3);
  font-family: var(--font-heading);
  font-weight: 700;
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
}

/* ---------- Reviews ---------- */
.ab-reviews { background: var(--color-light); }
.ab-reviews__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-10);
  align-items: start;
}
.ab-review {
  position: relative;
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8) var(--space-6) var(--space-6);
  box-shadow: var(--shadow-card);
  border: 1px solid var(--color-gray-light);
}
.ab-review::before {
  content: '\201C';
  position: absolute;
  top: var(--space-2);
  left: var(--space-5);
  font-family: var(--font-heading);
  font-size: 4.5rem;
  line-height: 1;
  color: color-mix(in srgb, var(--color-primary) 28%, transparent);
}
.ab-review p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  line-height: 1.7;
  margin: 0 0 var(--space-5);
}
.ab-review footer {
  display: flex;
  align-items: center;
  gap: var(--space-3);
  font-size: var(--font-size-sm);
}
.ab-review__avatar {
  width: 40px;
  height: 40px;
  border-radius: var(--radius-full);
  background: var(--color-secondary);
  color: var(--color-white);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-weight: 700;
  flex-shrink: 0;
}
.ab-review footer strong {
  display: block;
  color: var(--color-dark);
}
.ab-review footer span { color: var(--color-gray); }
.ab-reviews__more {
  text-align: center;
  margin-top: var(--space-8);
}

/* ---------- Service area strip ---------- */
.ab-area {
  background: var(--color-white);
  text-align: center;
}
.ab-area__chips {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: var(--space-3);
  margin: var(--space-8) 0 var(--space-6);
}
.ab-area__chips a,
.ab-area__chips span {
  display: inline-block;
  background: var(--color-light);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-full);
  padding: var(--space-2) var(--space-5);
  font-weight: 600;
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
  transition: background var(--transition-base), color var(--transition-base), border-color var(--transition-base);
}
.ab-area__chips a:hover {
  background: var(--color-primary);
  border-color: var(--color-primary);
  color: var(--color-white);
}
.ab-area__chips span { font-style: italic; }

/* ---------- CTA ---------- */
.ab-cta {
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: var(--space-16) 0;
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
}
.ab-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.ab-cta .container { position: relative; z-index: 1; }
.ab-cta h2 {
  color: var(--color-white);
  font-size: clamp(1.9rem, 4vw, 2.75rem);
  margin-bottom: var(--space-4);
  text-wrap: balance;
}
.ab-cta p {
  color: color-mix(in srgb, var(--color-white) 92%, transparent);
  max-width: 60ch;
  margin: 0 auto var(--space-8);
  font-size: var(--font-size-lg);
}
.ab-cta__actions {
  display: flex;
  gap: var(--space-4);
  justify-content: center;
  flex-wrap: wrap;
}
.ab-cta .btn svg { width: 18px; height: 18px; }

/* ---------- Dividers ---------- */
.ab-divider {
  display: block;
  overflow: hidden;
  line-height: 0;
}
.ab-divider svg {
  display: block;
  width: 100%;
  height: 100%;
}
.ab-divider--diagonal { height: 60px; }
.ab-divider--wave { height: 72px; }

/* ---------- Focus + motion ---------- */
.ab-hero a:focus-visible,
.ab-cta a:focus-visible,
.ab-area__chips a:focus-visible {
  outline: 3px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: var(--radius-sm);
}
@media (prefers-reduced-motion: reduce) {
  .ab-value:hover,
  .ab-tile:hover img,
  .ab-award:hover,
  .ab-tile:hover .ab-tile__label svg { transform: none; }
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
  .ab-stats__grid { grid-template-columns: repeat(2, 1fr); }
  .ab-stat:nth-child(3) { border-left: 0; }
  .ab-values__grid { grid-template-columns: 1fr 1fr; }
  .ab-build__grid { grid-template-columns: repeat(3, 1fr); }
  .ab-reviews__grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 860px) {
  .ab-story__grid,
  .ab-claims__grid { grid-template-columns: 1fr; gap: var(--space-10); }
  .ab-claims__media { order: -1; }
  .ab-claims__badge { left: var(--space-4); }
  .ab-portrait { max-width: 360px; }
}
@media (max-width: 640px) {
  .ab-hero { min-height: 0; }
  .ab-values__grid,
  .ab-reviews__grid { grid-template-columns: 1fr; }
  .ab-build__grid { grid-template-columns: 1fr 1fr; }
  .ab-tile:first-child { grid-column: span 2; aspect-ratio: 16 / 10; }
  .ab-stats__grid { grid-template-columns: 1fr 1fr; gap: var(--space-3); }
  .ab-stat { padding: var(--space-4) var(--space-2); }
  .ab-awards__row { gap: var(--space-5); }
  .ab-award { width: 44%; }
}
</style>


<!-- ===================== BREADCRUMB ===================== -->
<nav class="ab-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="ab-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/about/" aria-current="page">About</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== HERO ===================== -->
<section class="ab-hero" aria-label="About <?php echo htmlspecialchars($siteName); ?>">
  <img class="ab-hero__bg"
       src="/assets/images/hero-roof-home-v2.jpg"
       srcset="/assets/images/hero-roof-home-v2-480.webp 480w, /assets/images/hero-roof-home-v2-960.webp 960w, /assets/images/hero-roof-home-v2-1600.webp 1600w"
       sizes="100vw"
       alt="Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing &amp; Construction"
       width="1600" height="1333" loading="eager" fetchpriority="high">
  <div class="container ab-hero__inner">
    <span class="ab-hero__eyebrow"><?php echo icon('home', 16); ?> About Us · Since <?php echo $yearEstablished; ?></span>
    <h1>A father-and-son roofing team serving <span class="text-accent">Greater Houston since 1973</span></h1>
    <p class="ab-hero__lede">
      <?php echo htmlspecialchars($siteName); ?> is a small, local, family-owned and operated business — Glenn and Tim Menn,
      father and son — based in Humble, Texas. Roofs, siding, gutters, patio covers, decks and fences for homeowners
      in 50 communities across the Greater Houston area, with the owner on every job.
    </p>
    <ul class="ab-hero__trust" aria-label="Why homeowners choose us">
      <li><?php echo icon('check-circle', 18); ?> Serving Greater Houston since 1973</li>
      <li><?php echo icon('check-circle', 18); ?> Family owned — father and son</li>
      <li><?php echo icon('check-circle', 18); ?> The owner is on every job</li>
      <li><?php echo icon('check-circle', 18); ?> Nextdoor Neighborhood Favorite 2022, 2023 &amp; 2024</li>
    </ul>
    <div class="ab-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<!-- ===================== STORY ===================== -->
<section class="section ab-story" aria-labelledby="ab-story-title">
  <div class="container">
    <div class="ab-story__grid">
      <div class="ab-portrait" data-animate>
        <div class="ab-portrait__frame">
          <img src="/assets/images/owner-father-v2.jpg"
               srcset="/assets/images/owner-father-v2-480.webp 480w, /assets/images/owner-father-v2-960.webp 960w"
               sizes="(max-width: 860px) 90vw, 440px"
               alt="Glenn and Tim Menn, the father-and-son team behind Triple G Roofing &amp; Construction"
               width="1152" height="1536" loading="lazy">
        </div>
        <div class="ab-portrait__caption">
          <strong>Glenn &amp; Tim Menn</strong>
          <span>The men behind the business</span>
        </div>
      </div>
      <div class="ab-story__copy" data-animate>
        <span class="ab-story__script">Our story</span>
        <span class="eyebrow-label">Family Owned &amp; Operated</span>
        <h2 id="ab-story-title" style="font-size: clamp(1.9rem, 3.6vw, 2.75rem); line-height: 1.12; margin: var(--space-3) 0 var(--space-5); text-wrap: balance;">Two generations, <span class="text-accent">one standard</span></h2>
        <p>
          <?php echo htmlspecialchars($siteName); ?> has been serving the Greater Houston Texas area since 1973. We're a
          father-and-son team — Glenn and Tim Menn — and we've stayed deliberately small: a local, family-run company
          where the owner, <?php echo htmlspecialchars($ownerName); ?>, is on every job personally to oversee the work and
          make sure everything is done exactly as agreed.
        </p>
        <p>
          Today we're based in Humble, Texas, and we work across 50 communities — Kingwood, Atascocita, Spring and
          The Woodlands to Baytown, Pasadena, Dayton and Liberty. As our customers like to put it, we serve clients
          anywhere from Orange to Galveston, and sometimes beyond.
        </p>
        <p>
          No job is too big or too small. Every project starts the same way: a free inspection, photos of what we find,
          and a free written estimate you can take your time with. Nothing pushy.
        </p>
        <blockquote class="ab-story__quote">
          "A higher standard of excellence" isn't a slogan to us — it's what happens when the person whose name is on the
          truck is standing on your roof.
        </blockquote>
      </div>
    </div>
  </div>
</section>

<!-- ===================== STATS ===================== -->
<section class="ab-stats section" aria-label="<?php echo htmlspecialchars($siteName); ?> at a glance">
  <div class="container">
    <div class="ab-stats__grid">
      <div class="ab-stat" data-animate>
        <span class="ab-stat__num">1973</span>
        <span class="ab-stat__label">Serving the Greater Houston area since</span>
      </div>
      <div class="ab-stat ab-delay-1" data-animate>
        <span class="ab-stat__num">2</span>
        <span class="ab-stat__label">Generations — a father-and-son team</span>
      </div>
      <div class="ab-stat ab-delay-2" data-animate>
        <span class="ab-stat__num">50</span>
        <span class="ab-stat__label">Greater Houston communities served</span>
      </div>
      <div class="ab-stat ab-delay-3" data-animate>
        <span class="ab-stat__num">3<span>×</span></span>
        <span class="ab-stat__label">Nextdoor Neighborhood Favorite (2022, 2023, 2024)</span>
      </div>
    </div>
  </div>
</section>

<!-- ===================== VALUES ===================== -->
<section class="section ab-values" aria-labelledby="ab-values-title">
  <div class="container">
    <div class="ab-head ab-head--center">
      <span class="eyebrow-label">How We Work</span>
      <h2 id="ab-values-title">What sets <span class="text-accent">Triple G</span> apart?</h2>
      <p>Three things you'll notice from the first phone call to the final walkthrough.</p>
    </div>
    <div class="ab-values__grid">
      <article class="ab-value ab-value--1" data-animate>
        <div class="ab-value__ico"><?php echo icon('home', 28); ?></div>
        <h3>Family Owned Since 1973</h3>
        <p>Glenn and Tim Menn have kept this a small, local, father-and-son operation for more than 50 years. When you call, you talk to the family that owns the company — not a call center.</p>
      </article>
      <article class="ab-value ab-value--2 ab-delay-1" data-animate>
        <div class="ab-value__ico"><?php echo icon('check-circle', 28); ?></div>
        <h3>Transparent Pricing</h3>
        <p>Free inspections and free written estimates. You see what's included — materials, scope and schedule — before any work starts. No surprise charges.</p>
      </article>
      <article class="ab-value ab-value--3 ab-delay-2" data-animate>
        <div class="ab-value__ico"><?php echo icon('hard-hat', 28); ?></div>
        <h3>Owner on Every Job</h3>
        <p>The owner of the company is on every job personally to oversee the work and make sure everything is done as agreed — from tear-off to the final magnet sweep for nails.</p>
      </article>
    </div>
  </div>
</section>

<div class="ab-divider ab-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-light)" points="0,0 1200,0 0,60"/></svg>
</div>

<!-- ===================== WHAT WE BUILD ===================== -->
<section class="section ab-build" aria-labelledby="ab-build-title" style="padding-top: var(--space-6);">
  <div class="container">
    <div class="ab-head">
      <span class="eyebrow-label">More Than Roofs</span>
      <h2 id="ab-build-title">What does Triple G <span class="text-accent">build and repair</span>?</h2>
      <p>
        Roofing is where we started, and it's still most of what we do. But the same crew that replaces your roof can
        handle the rest of your home's exterior — so you make one call instead of five.
      </p>
    </div>
    <div class="ab-build__grid">
      <?php foreach ($aboutBuilds as $i => $b): ?>
      <a href="<?php echo $b['href']; ?>" class="ab-tile ab-delay-<?php echo ($i % 4) + 1; ?>" data-animate aria-label="<?php echo htmlspecialchars($b['label']); ?>">
        <img src="/assets/images/<?php echo $b['img']; ?>.jpg"
             srcset="<?php echo aboutSrcset($b['img'], $b['variants']); ?>"
             sizes="(max-width: 640px) 50vw, (max-width: 1024px) 33vw, 300px"
             alt="<?php echo htmlspecialchars($b['alt']); ?>"
             width="<?php echo $b['w']; ?>" height="<?php echo $b['h']; ?>" loading="lazy">
        <span class="ab-tile__label"><?php echo htmlspecialchars($b['label']); ?> <?php echo icon('external-link', 20); ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="ab-divider ab-divider--wave" aria-hidden="true">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path fill="var(--color-light)" d="M0,40 C200,80 400,0 600,36 C800,72 1000,8 1200,40 L1200,72 L0,72 Z"/></svg>
</div>

<!-- ===================== INSURANCE EXPERIENCE ===================== -->
<section class="section ab-claims" aria-labelledby="ab-claims-title" style="padding-top: var(--space-8);">
  <div class="container">
    <div class="ab-claims__grid">
      <div class="ab-claims__copy" data-animate>
        <span class="eyebrow-label">Storm Damage &amp; Claims</span>
        <h2 id="ab-claims-title" style="font-size: clamp(1.9rem, 3.6vw, 2.75rem); line-height: 1.12; margin: var(--space-3) 0 var(--space-5); text-wrap: balance;">More than 50 years of roofing, claims-handling and <span class="text-accent">adjuster experience</span></h2>
        <p>
          Hail, wind and hurricanes are part of life on the Gulf Coast. So is the paperwork that follows. We have more
          than 50 years of claims, claims-handling and adjuster experience, and we use it to walk you through the
          insurance claim process from beginning to end — taking the stress off your plate and onto ours.
        </p>
        <ol class="ab-claims__steps">
          <li><span><strong>We document the damage.</strong> A free inspection with photos of everything we find, so the adjuster sees what we see.</span></li>
          <li><span><strong>We meet your adjuster on site.</strong> We walk the roof together and provide the documentation the claim needs.</span></li>
          <li><span><strong>We explain your policy in plain English.</strong> What's in it, what your deductible means, and what happens next.</span></li>
          <li><span><strong>We do the work right.</strong> Once your carrier makes its decision, we complete the approved repairs to our standard.</span></li>
        </ol>
        <p class="ab-claims__note">
          Coverage is always your insurance carrier's decision, based on your policy. We're not a public adjuster or an
          attorney — our job is to make sure your damage is documented properly and your repairs are done right.
        </p>
      </div>
      <div class="ab-claims__media" data-animate>
        <div class="ab-claims__frame">
          <img src="/assets/images/storm-damage-repair-v2.jpg"
               srcset="/assets/images/storm-damage-repair-v2-480.webp 480w, /assets/images/storm-damage-repair-v2-960.webp 960w"
               sizes="(max-width: 860px) 90vw, 460px"
               alt="Tarped roof with a Triple G crew starting storm damage repairs"
               width="1200" height="1600" loading="lazy">
        </div>
        <div class="ab-claims__badge" aria-hidden="true">
          <strong>50+</strong>
          <span>Years of claims experience</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== NEXTDOOR AWARDS ===================== -->
<section class="section ab-awards" aria-labelledby="ab-awards-title">
  <div class="container">
    <div class="ab-head ab-head--center">
      <span class="eyebrow-label">Neighborhood Favorite</span>
      <h2 id="ab-awards-title">Voted a Nextdoor Neighborhood Favorite in <span class="text-accent">2022, 2023 and 2024</span></h2>
      <p>Three years running, neighbors across the Greater Houston area picked Triple G as their favorite roofer on Nextdoor. We don't take that lightly.</p>
    </div>
    <div class="ab-awards__row">
      <?php foreach ($aboutBadges as $i => $badge): ?>
      <figure class="ab-award ab-delay-<?php echo $i + 1; ?>" data-animate>
        <img src="/assets/images/<?php echo $badge['img']; ?>.png"
             alt="<?php echo htmlspecialchars($badge['alt']); ?>"
             width="<?php echo $badge['w']; ?>" height="<?php echo $badge['h']; ?>" loading="lazy">
        <figcaption><span>Neighborhood Favorite <?php echo $badge['year']; ?></span></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<section class="section ab-reviews" aria-labelledby="ab-reviews-title">
  <div class="container">
    <div class="ab-head ab-head--center">
      <span class="eyebrow-label">In Their Words</span>
      <h2 id="ab-reviews-title">What do homeowners say about <span class="text-accent">working with Tim</span>?</h2>
      <p>Real reviews from real customers, quoted exactly as they wrote them.</p>
    </div>
    <div class="ab-reviews__grid">
      <?php foreach ($aboutReviews as $i => $r): ?>
      <article class="ab-review ab-delay-<?php echo $i + 1; ?>" data-animate>
        <p><?php echo htmlspecialchars($r['text']); ?></p>
        <footer>
          <span class="ab-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></span>
          <div>
            <strong><?php echo htmlspecialchars($r['name']); ?></strong>
            <span><?php echo htmlspecialchars($r['city']); ?></span>
          </div>
        </footer>
      </article>
      <?php endforeach; ?>
    </div>
    <div class="ab-reviews__more">
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" class="btn btn-secondary" target="_blank" rel="noopener"><?php echo icon('external-link', 18); ?> Read more reviews on Google</a>
    </div>
  </div>
</section>

<!-- ===================== SERVICE AREA ===================== -->
<section class="section ab-area" aria-labelledby="ab-area-title">
  <div class="container">
    <div class="ab-head ab-head--center">
      <span class="eyebrow-label">Where We Work</span>
      <h2 id="ab-area-title">Based in Humble, serving <span class="text-accent">50 communities</span> across Greater Houston</h2>
      <p><?php echo htmlspecialchars($serviceAreaSummary); ?></p>
    </div>
    <div class="ab-area__chips">
      <?php foreach ($serviceAreas as $area): ?>
      <a href="/service-areas/<?php echo getAreaSlug($area); ?>/"><?php echo htmlspecialchars($area); ?>, TX</a>
      <?php endforeach; ?>
      <span>+ <?php echo count($serviceAreaCities) - count($serviceAreas); ?> more communities</span>
    </div>
    <a href="/service-areas/" class="btn btn-primary">See every community we serve</a>
  </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="ab-cta" aria-label="Request a free estimate">
  <div class="container">
    <h2>Ready to talk to the people who'll actually do the work?</h2>
    <p>Call <?php echo htmlspecialchars($shortName); ?> for a free inspection and written estimate — on a roof, siding, gutters, a patio cover or a fence. <?php echo htmlspecialchars($businessHours); ?>.</p>
    <div class="ab-cta__actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate Online</a>
    </div>
  </div>
</section>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
