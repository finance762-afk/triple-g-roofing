<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Homepage — Triple G Roofing & Construction
   Rev 2026-08-20: owner feedback pass. Every claim traces to
   references/CLIENT-FACTS.md (see its BANNED CLAIMS list). Trust
   language = since 1973, father/son, owner on every job, Nextdoor
   2022-24, free inspections, real reviews. City framing = Greater
   Houston / Humble-based; individual cities only in the area list.
   ============================================================ */

$currentPage     = 'home';
$pageTitle       = 'Triple G Roofing & Construction | Roofing & Exteriors, Greater Houston — Since 1973';
$pageDescription = 'Father-and-son roofing, siding, gutter, patio cover & fence contractor based in Humble, TX, serving Greater Houston since 1973. Free inspections & estimates.';
$canonicalUrl    = $siteUrl . '/';

/* --- Small local helpers (guarded so includes can never collide) --- */
if (!function_exists('tg_srcset')) {
    /** Build a srcset string from ONLY the variants that exist on disk (per photo-manifest.json). */
    function tg_srcset($name, array $variants) {
        $parts = [];
        foreach ($variants as $w) {
            $parts[] = '/assets/images/' . $name . '-' . $w . '.webp ' . $w . 'w';
        }
        return implode(', ', $parts);
    }
}
if (!function_exists('tg_excerpt')) {
    /** Trim a review to whole sentences (~min chars) without altering the customer's words. */
    function tg_excerpt($text, $min = 230) {
        $sentences = preg_split('/(?<=[.!?])\s+/', trim($text));
        $out = '';
        foreach ($sentences as $s) {
            $out .= ($out === '' ? '' : ' ') . $s;
            if (strlen($out) >= $min) { break; }
        }
        return (strlen($out) < strlen(trim($text))) ? $out . ' …' : $out;
    }
}

/* --- Homepage service cards: first 8 of 10 (required-components) — photo variants per manifest --- */
$homeServices = [
    [
        'name'     => 'Roof Replacement',
        'slug'     => 'roof-replacement',
        'img'      => 'roof-replacement', 'variants' => [480, 960],
        'alt'      => 'Triple G crew replacing the roof on a two-story brick home',
        'desc'     => 'Architectural-shingle and metal roof replacements, tear-off through final cleanup.',
        'bullets'  => ['Architectural shingle or metal', 'Decking & wood rot repaired', 'Magnet nail sweep & cleanup'],
        'icon'     => 'home',
    ],
    [
        'name'     => 'Roof Repair',
        'slug'     => 'roof-repair',
        'img'      => 'roof-repair-v2', 'variants' => [480, 960],
        'alt'      => 'New step flashing sealed against a brick chimney during a roof repair',
        'desc'     => 'Leak, flashing, pipe-boot, shingle and rotted-decking repairs.',
        'bullets'  => ['Leaks traced to the source', 'Flashing & pipe-boot fixes', 'Photos of what we find'],
        'icon'     => 'wrench',
    ],
    [
        'name'     => 'Storm & Wind Damage Roof Repair',
        'slug'     => 'storm-damage-repair',
        'img'      => 'storm-damage-repair-v2', 'variants' => [480, 960],
        'alt'      => 'Tarped roof with a Triple G crew starting storm damage repairs',
        'desc'     => 'Hail, wind and hurricane damage repair with experienced claims help.',
        'bullets'  => ['Hail, wind & hurricane damage', 'We meet your adjuster', 'Ask about temporary tarping'],
        'icon'     => 'wind',
    ],
    [
        'name'     => 'Roof Inspection',
        'slug'     => 'roof-inspection',
        'img'      => 'roof-inspection-v2', 'variants' => [480, 960],
        'alt'      => 'Close-up of cracked and lifted shingles found during a roof inspection',
        'desc'     => 'Free, photo-documented inspections that end in a clear written estimate.',
        'bullets'  => ['Free, no-obligation inspection', 'Photo-documented findings', 'Clear written estimate'],
        'icon'     => 'search',
    ],
    [
        'name'     => 'Siding, Fascia & Soffit',
        'slug'     => 'siding-fascia-soffit',
        'img'      => 'siding-fascia-soffit', 'variants' => [480, 960],
        'alt'      => 'Crew member replacing siding on a dormer above a shingle roof',
        'desc'     => 'Siding, fascia, soffit and wood-rot repair, finished with exterior paint.',
        'bullets'  => ['Hardie, fiber-cement & vinyl', 'Fascia, soffit & wood rot', 'Exterior paint to finish'],
        'icon'     => 'layers',
    ],
    [
        'name'     => 'Gutter Installation',
        'slug'     => 'gutter-installation',
        'img'      => 'gutter-installation-v2', 'variants' => [480],
        'alt'      => 'New downspout and gutter on a brick covered patio',
        'desc'     => 'New gutters and downspouts that move water away from your foundation.',
        'bullets'  => ['New gutters & downspouts', 'Protects fascia & foundation', 'Matched to your trim'],
        'icon'     => 'droplets',
    ],
    [
        'name'     => 'Patio Covers, Pergolas & Decks',
        'slug'     => 'patio-covers-decks',
        'img'      => 'patio-covers-decks', 'variants' => [480, 960],
        'alt'      => 'Finished covered patio with ceiling fans and a concrete slab',
        'desc'     => 'Custom patio covers, enclosed and screened patios, pergolas and wood decks.',
        'bullets'  => ['Covered & screened patios', 'Cedar pergolas', 'Wood decks built to match'],
        'icon'     => 'umbrella',
    ],
    [
        'name'     => 'Fences & Gates',
        'slug'     => 'fences-gates',
        'img'      => 'fences-gates', 'variants' => [480, 960],
        'alt'      => 'New pine privacy fence with a Triple G Roofing yard sign',
        'desc'     => 'Cedar and pine privacy fences, ranch rail and custom gates.',
        'bullets'  => ['Cedar & pine privacy fences', 'Ranch rail & custom gates', 'Repairs & full replacements'],
        'icon'     => 'fence',
    ],
];

/* Inline Lucide SVGs not in functions.php icon() (v6.2 — no runtime injection) */
$extraIcons = [
    'layers'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"/><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"/><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"/></svg>',
    'umbrella' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 12a10.06 10.06 1 0 0-20 0Z"/><path d="M12 12v8a2 2 0 0 0 4 0"/><path d="M12 2v1"/></svg>',
    'fence'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 3 2 5v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"/><path d="M6 8h4"/><path d="M6 18h4"/><path d="m12 3-2 2v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"/><path d="M14 8h4"/><path d="M14 18h4"/><path d="m20 3-2 2v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"/></svg>',
];
$svgIcon = function ($name) use ($extraIcons) {
    $i = icon($name, 26);
    return $i !== '' ? $i : ($extraIcons[$name] ?? '');
};

/* --- Project gallery teaser (6 real job photos, variants per manifest) --- */
$galleryTeaser = [
    ['img' => 'roof-finished-brick', 'variants' => [480, 960], 'alt' => 'Completed shingle roof replacement on a brick ranch home', 'label' => 'Roof Replacement'],
    ['img' => 'metal-roof-barn',     'variants' => [480, 960], 'alt' => 'New corrugated metal roof on a barn with white ranch-rail fencing', 'label' => 'Metal Roofing'],
    ['img' => 'pergola-cedar',       'variants' => [480, 960], 'alt' => 'Custom cedar pergola over a back patio on a brick home', 'label' => 'Cedar Pergola'],
    ['img' => 'deck-new',            'variants' => [480],      'alt' => 'New pressure-treated wood deck wrapping a backyard', 'label' => 'Wood Deck'],
    ['img' => 'fence-gate-cedar',    'variants' => [480, 960], 'alt' => 'New cedar fence and double gate beside a brick home', 'label' => 'Cedar Fence & Gate'],
    ['img' => 'patio-cover-fans',    'variants' => [480, 960], 'alt' => 'Covered patio with beadboard ceiling and fans', 'label' => 'Patio Cover'],
];

/* --- Featured reviews: first 3 flagged featured === true in testimonials-data.php --- */
$featuredReviews = array_slice(array_values(array_filter($testimonials, fn($t) => !empty($t['featured']))), 0, 3);

/* --- Homepage FAQs (fact-safe; mirrored into FAQPage schema below) --- */
$faqs = [
    [
        'q' => 'Does Triple G Roofing help with roof insurance claims?',
        'a' => 'Yes. Triple G Roofing & Construction brings more than 50 years of claims-handling and adjuster experience to every storm job. We document the damage with photos, meet your adjuster on site, and explain your policy in plain English so you know what to expect. Coverage decisions always belong to your insurance carrier — our job is to make sure the damage is documented properly and to walk you through the process from start to finish.',
    ],
    [
        'q' => 'Who actually shows up to do the work?',
        'a' => 'The owner. Tim Menn is on every job personally to oversee the work and make sure everything is done as agreed. Triple G Roofing & Construction is a small, family-owned, father-and-son team based in Humble, TX — you deal with the same people from the free inspection through the final cleanup.',
    ],
    [
        'q' => 'Can poor attic ventilation really affect my shingle warranty?',
        'a' => 'It can. Shingle manufacturers can void or limit the shingle warranty when an attic is not properly ventilated with balanced intake and exhaust. That is why Triple G Roofing & Construction checks intake and exhaust on every roof we inspect or replace, and why attic venting is one of our standalone services.',
    ],
    [
        'q' => 'What does a free roof inspection and estimate include?',
        'a' => 'Triple G Roofing & Construction climbs the roof, takes exact measurements, photographs anything we find, and gives you a written estimate for the work — at no charge and with no obligation. If the roof is in good shape, we tell you that too. No job is too big or small.',
    ],
    [
        'q' => 'Which areas does Triple G Roofing serve?',
        'a' => 'Triple G Roofing & Construction is based in Humble, TX and serves 50 communities across the Greater Houston area — from Orange to Galveston and sometimes beyond. The full list is on our service-areas page, and if your town is not on it, call and ask.',
    ],
    [
        'q' => 'Do you do more than roofing?',
        'a' => 'Yes. Besides roof replacement, repair and inspections, Triple G Roofing & Construction builds and repairs siding, fascia and soffit, gutters, patio covers, pergolas, wood decks, and fences and gates. One call covers the roof and the rest of the exterior.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Homepage page-specific styles (Premium tier)
   All colors / shadows / spacing use var() tokens.
   ============================================================ */
:root {
  --color-primary-dark: color-mix(in srgb, var(--color-primary) 78%, #000);
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --white-strong: rgba(255,255,255,0.9);
  --white-soft: rgba(255,255,255,0.72);
  --white-line: rgba(255,255,255,0.16);
  --white-tint: rgba(255,255,255,0.08);
  --noise: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
}

/* Balanced headings everywhere on this page */
main h1, main h2, main h3 { text-wrap: balance; }

/* ---- Screen-reader-only utility (associated form labels) ---- */
.sr-only {
  position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
  overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;
}

/* ---- Reveal stagger helpers (works with framework [data-animate]) ---- */
[data-animate].reveal-delay-1 { transition-delay: 0.05s; }
[data-animate].reveal-delay-2 { transition-delay: 0.13s; }
[data-animate].reveal-delay-3 { transition-delay: 0.21s; }

/* ---- Numbered section watermark (signature detail) ---- */
.numbered-section { position: relative; }
.numbered-section .section-num {
  position: absolute; top: var(--space-6); right: 5%;
  font-family: var(--font-heading); font-weight: 800;
  font-size: clamp(5rem, 14vw, 11rem); line-height: 1;
  color: color-mix(in srgb, var(--color-primary) 8%, transparent);
  pointer-events: none; z-index: 0; user-select: none;
}
.numbered-section .container { position: relative; z-index: 1; }

/* ---- Fixed-aspect photo frames: portrait phone photos never stretch ---- */
.frame { position: relative; overflow: hidden; border-radius: var(--radius-lg); }
.frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.frame--3-4 { aspect-ratio: 3 / 4; }
.frame--4-5 { aspect-ratio: 4 / 5; }
.frame--4-3 { aspect-ratio: 4 / 3; }

/* =====================================================
   HERO — layered photo + gradient overlay, 60/40 split
   ===================================================== */
.home-hero {
  min-height: 100vh; min-height: 100svh; display: flex; align-items: center;
  text-align: left; padding-top: 150px; padding-bottom: var(--space-16);
  overflow: hidden;
}
.home-hero__bg {
  position: absolute; inset: 0; width: 100%; height: 100%;
  object-fit: cover; object-position: center 40%; z-index: 0;
}
/* C1 layered hero: ::before gradient + ::after noise texture */
.home-hero::before {
  content: ''; position: absolute; inset: 0; z-index: 1;
  background:
    linear-gradient(105deg,
      rgba(var(--color-secondary-rgb), 0.94) 0%,
      rgba(var(--color-secondary-rgb), 0.82) 42%,
      rgba(var(--color-secondary-rgb), 0.5) 100%);
}
.home-hero::after {
  content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background-image: var(--noise); opacity: 0.05;
}
.home-hero__inner {
  position: relative; z-index: 2;
  display: grid; grid-template-columns: 1.5fr 1fr;
  gap: var(--space-12); align-items: center; width: 100%;
}
.home-hero__eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600;
  text-transform: uppercase; letter-spacing: 2px; color: var(--color-accent);
  background: rgba(var(--color-primary-rgb), 0.16);
  border: 1px solid var(--white-line);
  padding: var(--space-2) var(--space-4); border-radius: var(--radius-full);
  margin-bottom: var(--space-5);
}
.home-hero__eyebrow svg { width: 16px; height: 16px; }
.home-hero h1 {
  color: var(--color-white); font-size: clamp(2.4rem, 5.2vw, 4rem);
  line-height: 1.05; margin-bottom: var(--space-5);
}
.home-hero h1 .text-accent { display: inline-block; font-size: 1.05em; }
.home-hero__subtitle {
  color: var(--white-strong); font-size: var(--font-size-lg);
  line-height: 1.65; max-width: 46ch; margin-bottom: var(--space-6);
}
.home-hero__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.home-hero__actions .btn svg { width: 18px; height: 18px; }
.home-hero__trust {
  display: grid; grid-template-columns: repeat(2, auto);
  gap: var(--space-3) var(--space-6); justify-content: start;
}
.home-hero__trust-item {
  display: flex; align-items: center; gap: var(--space-2);
  color: var(--white-strong); font-size: var(--font-size-sm); font-weight: 500;
}
.home-hero__trust-item svg { width: 18px; height: 18px; color: var(--color-accent); flex-shrink: 0; }

/* ---- Hero lead-capture form card (glassmorphism) ---- */
.hero-form-card {
  background: rgba(255,255,255,0.97);
  backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(255,255,255,0.4);
  border-radius: var(--radius-xl); box-shadow: var(--shadow-xl);
  padding: var(--space-8);
}
.hero-form-card h2 { font-size: var(--font-size-2xl); margin-bottom: var(--space-1); color: var(--color-dark); }
.hero-form-tagline { font-size: var(--font-size-sm); color: var(--color-primary); font-weight: 600; margin-bottom: var(--space-5); }
.hero-form .form-row { margin-bottom: var(--space-3); }
.hero-form input,
.hero-form select {
  width: 100%; padding: var(--space-4); font-family: var(--font-body); font-size: var(--font-size-base);
  color: var(--color-dark); background: var(--color-light);
  border: 1px solid var(--color-gray-light); border-radius: var(--radius-md);
  transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}
.hero-form input:focus,
.hero-form select:focus {
  outline: none; border-color: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.15);
}
.hero-form .btn-block { width: 100%; margin-top: var(--space-2); }
.hero-form .form-footnote { font-size: var(--font-size-xs); color: var(--color-gray); margin: var(--space-3) 0 0; line-height: 1.5; }
.hero-form .form-footnote a { color: var(--color-primary); text-decoration: underline; }

/* =====================================================
   SVG SECTION DIVIDERS (4 styles on this page)
   ===================================================== */
.svg-divider { display: block; overflow: hidden; line-height: 0; }
.svg-divider svg { display: block; width: 100%; height: 100%; }
.svg-divider--wave { height: 70px; }
.svg-divider--double { height: 90px; background: var(--color-dark); }
.svg-divider--diagonal { height: 60px; }
.svg-divider--torn { height: 48px; background: var(--color-light); }

/* =====================================================
   TICKER STRIP items
   ===================================================== */
.ticker-strip .ticker-track span {
  display: inline-flex; align-items: center; gap: var(--space-2);
}
.ticker-dot { color: rgba(255,255,255,0.6); font-weight: 700; }

/* =====================================================
   SERVICES (required-components tinted image cards)
   ===================================================== */
.services-section { background: var(--color-white); }
.services-section .section-header { max-width: 780px; margin-inline: auto; padding-inline: var(--space-4); }
.services-section .section-subtitle {
  display: block; font-family: var(--font-accent); font-size: var(--font-size-2xl);
  color: var(--color-accent); margin-top: var(--space-4); line-height: 1.2;
}
.services-section .section-header .prose { color: var(--color-gray); max-width: 60ch; margin: var(--space-3) auto 0; }
.hero-answer {
  font-size: var(--font-size-lg); color: var(--color-gray-dark);
  line-height: 1.7; max-width: 64ch; margin: var(--space-4) auto 0;
}
.services-grid {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: var(--space-6); margin-top: var(--space-12);
}
.service-card-with-image {
  background: var(--color-card-tint-neutral);
  border-radius: var(--radius-lg); overflow: hidden;
  display: flex; flex-direction: column;
  box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.service-card-with-image:hover { transform: translateY(-6px); box-shadow: var(--shadow-xl); }
.card-tint-1 { background: var(--color-card-tint-1); }
.card-tint-2 { background: var(--color-card-tint-2); }
.card-tint-3 { background: var(--color-card-tint-3); }
.service-card__image { position: relative; aspect-ratio: 4 / 3; overflow: hidden; }
.service-card__image img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform var(--transition-slow);
}
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body {
  padding: var(--space-6) var(--space-5) var(--space-5);
  text-align: center; display: flex; flex-direction: column;
  align-items: center; gap: var(--space-3); flex: 1;
}
.service-card__icon {
  width: 60px; height: 60px; border-radius: var(--radius-full);
  background: var(--color-white); box-shadow: var(--shadow-md);
  display: flex; align-items: center; justify-content: center;
  margin-top: calc(-1 * var(--space-10)); margin-bottom: var(--space-1);
  color: var(--color-primary); position: relative; z-index: 1;
  border: 3px solid var(--color-white);
}
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { color: var(--color-dark); font-size: var(--font-size-lg); margin: 0; line-height: 1.25; }
.service-card__desc { color: var(--color-gray-dark); font-size: var(--font-size-sm); margin: 0; line-height: 1.55; }
.service-card-with-image ul {
  list-style: none; padding: var(--space-4) 0 0; margin: var(--space-2) 0 0;
  width: 100%; text-align: left; display: flex; flex-direction: column; gap: var(--space-2);
  border-top: 1px solid rgba(var(--color-secondary-rgb), 0.08);
}
.service-card-with-image ul li {
  font-size: var(--font-size-sm); color: var(--color-gray-dark);
  padding-left: var(--space-6); position: relative;
}
.service-card-with-image ul li::before {
  content: "✓"; color: var(--color-primary); font-weight: 700;
  position: absolute; left: 0; top: 0;
}
.service-card__cta {
  margin-top: auto; padding-top: var(--space-4); width: 100%;
  color: var(--color-primary); font-family: var(--font-heading);
  font-weight: 600; font-size: var(--font-size-sm);
  border-top: 1px solid rgba(var(--color-secondary-rgb), 0.08);
  transition: color var(--transition-base);
}
.service-card__cta::after { content: " →"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--color-accent); }
.service-card__cta:hover::after { transform: translateX(4px); }
.services-cta-row { text-align: center; margin-top: var(--space-12); }

/* =====================================================
   STATS BAND (radial glow on brand color)
   ===================================================== */
.stats-band { position: relative; background: var(--color-primary); overflow: hidden; padding: var(--space-16) 0; }
.stats-band::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(ellipse at 50% 0%, var(--white-line) 0%, transparent 65%);
}
.stats-band .container { position: relative; z-index: 1; }
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-8); text-align: center; }
.stat-item { color: var(--color-white); }
.stat-number-wrap { display: flex; align-items: baseline; justify-content: center; gap: 2px; }
.stat-item .stat-number { font-family: var(--font-heading); font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; line-height: 1; color: var(--color-white); }
.stat-item .stat-suffix { font-family: var(--font-heading); font-size: var(--font-size-2xl); font-weight: 800; color: rgba(255,255,255,0.85); }
.stat-item .stat-label { font-size: var(--font-size-sm); color: var(--white-strong); margin-top: var(--space-3); text-transform: uppercase; letter-spacing: 1px; }

/* =====================================================
   ABOUT + PROCESS (asymmetric split, overlapping badge)
   ===================================================== */
.about-process { background: var(--color-light); }
.about-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: var(--space-16); align-items: start; }
.about-copy .eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 700; text-transform: uppercase; letter-spacing: 2px;
  color: var(--color-primary); margin-bottom: var(--space-3);
}
.about-copy h2 { font-size: clamp(1.9rem, 4vw, 2.75rem); margin-bottom: var(--space-5); }
.about-copy > p { color: var(--color-gray-dark); margin-bottom: var(--space-4); line-height: 1.75; max-width: 60ch; }
.process-steps { margin-top: var(--space-8); display: flex; flex-direction: column; gap: var(--space-5); }
.process-step { display: flex; gap: var(--space-5); align-items: flex-start; position: relative; }
.process-step__num {
  flex-shrink: 0; width: 48px; height: 48px; border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white); font-family: var(--font-heading); font-weight: 800;
  font-size: var(--font-size-lg); display: flex; align-items: center; justify-content: center;
  box-shadow: var(--shadow-md);
}
.process-step__body h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-1); color: var(--color-dark); }
.process-step__body p { font-size: var(--font-size-sm); color: var(--color-gray-dark); margin: 0; line-height: 1.6; }

/* Ventilation callout (owner-requested talking point) */
.vent-callout {
  margin-top: var(--space-8); display: flex; gap: var(--space-4); align-items: flex-start;
  background: var(--color-white); border-left: 4px solid var(--color-accent);
  border-radius: var(--radius-md); padding: var(--space-5) var(--space-6);
  box-shadow: var(--shadow-card); max-width: 62ch;
}
.vent-callout svg { width: 28px; height: 28px; color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.vent-callout p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; }
.vent-callout strong { color: var(--color-dark); display: block; margin-bottom: var(--space-1); font-family: var(--font-heading); }
.vent-callout a { color: var(--color-primary); font-weight: 600; white-space: nowrap; }

/* Portrait owner photo in a fixed 3:4 frame — never stretched */
.about-figure { position: relative; }
.about-figure .frame { box-shadow: var(--shadow-lg); }
.about-figure .frame::after {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(to top, rgba(var(--color-secondary-rgb), 0.35) 0%, transparent 55%);
  pointer-events: none;
}
.about-badge {
  position: absolute; bottom: calc(-1 * var(--space-6)); left: calc(-1 * var(--space-6)); z-index: 2;
  background: var(--color-white); border-radius: var(--radius-lg);
  box-shadow: var(--shadow-xl); padding: var(--space-6) var(--space-8); text-align: center;
  border-top: 4px solid var(--color-primary); max-width: 220px;
}
.about-badge .big { font-family: var(--font-heading); font-size: var(--font-size-4xl); font-weight: 800; color: var(--color-primary); line-height: 1; }
.about-badge .label { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1px; color: var(--color-gray-dark); margin-top: var(--space-2); }

/* Awards strip — three Nextdoor badges */
.awards-strip { margin-top: var(--space-16); text-align: center; }
.awards-strip__label {
  display: inline-block; font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-gray);
  margin-bottom: var(--space-5);
}
.awards-strip__row { display: flex; justify-content: center; align-items: flex-end; gap: var(--space-8); flex-wrap: wrap; }
.awards-strip__row img {
  height: 150px; width: auto; display: block;
  filter: drop-shadow(var(--shadow-md));
  transition: transform var(--transition-base);
}
.awards-strip__row img:hover { transform: translateY(-4px); }

/* =====================================================
   MID-PAGE CTA BANNER (3-stop diagonal gradient + noise)
   ===================================================== */
.cta-mid { position: relative; overflow: hidden; padding: var(--space-16) 0; text-align: center;
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.cta-mid::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background-image: var(--noise); opacity: 0.06;
}
.cta-mid .container { position: relative; z-index: 1; }
.cta-mid h2 { color: var(--color-white); font-size: clamp(1.8rem, 4vw, 2.75rem); margin-bottom: var(--space-4); }
.cta-mid p { color: var(--white-strong); max-width: 62ch; margin: 0 auto var(--space-8); font-size: var(--font-size-lg); }
.cta-mid .cta-mid__actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.cta-mid .btn svg { width: 18px; height: 18px; }

/* =====================================================
   PROJECT GALLERY TEASER (broken grid — middle column offset)
   ===================================================== */
.gallery-teaser { background: var(--color-white); position: relative; overflow: hidden; }
.gallery-teaser .floating-accent {
  position: absolute; width: 420px; height: 420px; border-radius: var(--radius-full);
  background: radial-gradient(circle, rgba(var(--color-accent-rgb), 0.18), transparent 70%);
  top: -140px; left: -120px; pointer-events: none; z-index: 0;
}
.gallery-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6); align-items: start;
}
.gallery-tile { position: relative; display: block; box-shadow: var(--shadow-card); }
.gallery-tile:nth-child(3n+2) { margin-top: var(--space-10); }
.gallery-tile img { transition: transform var(--transition-slow); }
.gallery-tile:hover img { transform: scale(1.05); }
.gallery-tile__label {
  position: absolute; left: var(--space-4); bottom: var(--space-4); z-index: 1;
  background: rgba(var(--color-secondary-rgb), 0.78); color: var(--color-white);
  font-family: var(--font-heading); font-size: var(--font-size-xs); font-weight: 600;
  letter-spacing: 1px; text-transform: uppercase;
  padding: var(--space-2) var(--space-3); border-radius: var(--radius-sm);
  backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);
}
.gallery-cta-row { text-align: center; margin-top: var(--space-12); }

/* =====================================================
   REVIEWS (dark section — real customer reviews)
   ===================================================== */
.reviews-section { position: relative; background: var(--color-dark); overflow: hidden; }
.reviews-section::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(ellipse at 20% 100%, rgba(var(--color-primary-rgb), 0.18) 0%, transparent 60%);
}
.reviews-section .container { position: relative; z-index: 1; }
.reviews-section .section-header h2 { color: var(--color-white); }
.reviews-section .section-header .eyebrow { color: var(--color-accent); }
.reviews-section .section-header p { color: var(--white-soft); }
.reviews-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); }
.review-tile {
  position: relative; display: flex; flex-direction: column; gap: var(--space-4);
  background: var(--white-tint); border: 1px solid var(--white-line);
  border-radius: var(--radius-lg); padding: var(--space-8) var(--space-6) var(--space-6);
  color: var(--white-strong);
  transition: transform var(--transition-base), background var(--transition-base);
}
.review-tile:hover { transform: translateY(-4px); background: rgba(255,255,255,0.12); }
.review-tile__mark {
  position: absolute; top: var(--space-3); right: var(--space-5);
  font-family: var(--font-heading); font-size: 5rem; line-height: 1; font-weight: 800;
  color: rgba(var(--color-accent-rgb), 0.28); pointer-events: none; user-select: none;
}
.review-tile blockquote { margin: 0; font-size: var(--font-size-base); line-height: 1.7; flex: 1; }
.review-tile footer { display: flex; align-items: center; gap: var(--space-3); padding-top: var(--space-4); border-top: 1px solid var(--white-line); }
.review-tile__avatar {
  width: 42px; height: 42px; border-radius: var(--radius-full); flex-shrink: 0;
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white); font-family: var(--font-heading); font-weight: 800;
  display: flex; align-items: center; justify-content: center;
}
.review-tile__name { font-family: var(--font-heading); font-weight: 700; color: var(--color-white); display: block; }
.review-tile__city { font-size: var(--font-size-sm); color: var(--white-soft); }
.reviews-embed { margin-top: var(--space-10); min-height: 120px; }
.reviews-badge-strip {
  display: flex; flex-wrap: wrap; gap: var(--space-4); justify-content: center;
  margin-top: var(--space-10);
}
.reviews-badge-strip a {
  display: inline-flex; align-items: center; gap: var(--space-2);
  background: rgba(255,255,255,0.06); border: 1px solid var(--white-line);
  color: var(--color-white); font-size: var(--font-size-sm); font-weight: 600;
  padding: var(--space-3) var(--space-5); border-radius: var(--radius-full);
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.reviews-badge-strip a:hover { background: rgba(var(--color-primary-rgb), 0.2); border-color: var(--color-primary); color: var(--color-white); }
.reviews-badge-strip svg { width: 18px; height: 18px; color: var(--color-star); }

/* =====================================================
   SERVICE AREAS (50-community multi-column list)
   ===================================================== */
.areas-section { background: var(--color-light); position: relative; overflow: hidden; }
.areas-section .bg-blob {
  position: absolute; right: -160px; bottom: -160px; width: 520px; height: 520px;
  border-radius: var(--radius-full); pointer-events: none; z-index: 0;
  background: radial-gradient(circle, rgba(var(--color-primary-rgb), 0.10), transparent 70%);
}
.areas-intro { display: grid; grid-template-columns: 1.1fr 1fr; gap: var(--space-12); align-items: end; margin-bottom: var(--space-10); }
.areas-intro .eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 700; text-transform: uppercase; letter-spacing: 2px;
  color: var(--color-primary); margin-bottom: var(--space-3);
}
.areas-intro h2 { font-size: clamp(1.9rem, 4vw, 2.75rem); margin-bottom: var(--space-3); }
.areas-intro p { color: var(--color-gray-dark); line-height: 1.7; max-width: 58ch; margin: 0; }
.areas-intro__aside {
  background: var(--color-white); border-radius: var(--radius-lg); box-shadow: var(--shadow-card);
  padding: var(--space-6); border-top: 4px solid var(--color-accent);
}
.areas-intro__aside p { font-size: var(--font-size-sm); color: var(--color-gray-dark); margin: 0 0 var(--space-4); }
.areas-list {
  list-style: none; padding: 0; margin: 0;
  columns: 5; column-gap: var(--space-8);
  background: var(--color-white); border-radius: var(--radius-lg);
  padding: var(--space-8); box-shadow: var(--shadow-card);
}
.areas-list li {
  break-inside: avoid; padding: var(--space-2) 0; font-size: var(--font-size-sm);
  color: var(--color-gray-dark); border-bottom: 1px dashed var(--color-gray-light);
  display: flex; align-items: center; gap: var(--space-2);
}
.areas-list li::before {
  content: ''; width: 6px; height: 6px; border-radius: var(--radius-full);
  background: var(--color-accent); flex-shrink: 0;
}
.areas-list li a { color: var(--color-primary); font-weight: 600; }
.areas-list li a:hover { color: var(--color-primary-dark); text-decoration: underline; }
.areas-cta-row { text-align: center; margin-top: var(--space-10); }

/* =====================================================
   FAQ (accordion)
   ===================================================== */
.faq-section { background: var(--color-white); }
.faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); align-items: start; }
.faq-item {
  display: block; padding: 0; gap: 0; /* reset framework flex card → accordion */
  background: var(--color-light); border-radius: var(--radius-lg);
  border: 1px solid var(--color-gray-light); overflow: hidden;
  transition: box-shadow var(--transition-base);
}
.faq-item[open] { box-shadow: var(--shadow-md); }
.faq-item summary {
  list-style: none; cursor: pointer; display: flex; align-items: center; gap: var(--space-3);
  padding: var(--space-5) var(--space-6); font-family: var(--font-heading);
  font-weight: 600; font-size: var(--font-size-base); color: var(--color-dark);
}
.faq-item summary::-webkit-details-marker { display: none; }
.faq-icon {
  flex-shrink: 0; width: 32px; height: 32px; border-radius: var(--radius-full);
  background: var(--color-primary); color: var(--color-white);
  display: flex; align-items: center; justify-content: center; font-weight: 800;
  transition: transform var(--transition-base);
}
.faq-icon svg { width: 18px; height: 18px; }
.faq-item[open] .faq-icon { transform: rotate(45deg); }
.faq-item .faq-answer { padding: 0 var(--space-6) var(--space-6) calc(var(--space-6) + var(--space-8)); }
.faq-item .faq-answer p { color: var(--color-gray-dark); font-size: var(--font-size-sm); margin: 0; line-height: 1.7; }

/* =====================================================
   BLOG PREVIEW (tinted so it never matches the FAQ above)
   ===================================================== */
.blog-preview { background: linear-gradient(180deg, var(--color-card-tint-3) 0%, var(--color-white) 100%); }
.blog-preview .blog-grid { grid-template-columns: minmax(0, 640px); justify-content: center; }
.blog-preview .blog-cta-row { text-align: center; margin-top: var(--space-8); }

/* =====================================================
   CLOSING CTA
   ===================================================== */
.closing-cta { position: relative; background: var(--color-secondary); overflow: hidden; text-align: center; padding: var(--space-16) 0; }
.closing-cta::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(ellipse at 50% 0%, rgba(var(--color-primary-rgb), 0.28) 0%, transparent 60%);
}
.closing-cta .container { position: relative; z-index: 1; }
.closing-cta h2 { color: var(--color-white); font-size: clamp(2rem, 4.5vw, 3rem); margin-bottom: var(--space-4); }
.closing-cta p { color: rgba(255,255,255,0.85); max-width: 58ch; margin: 0 auto var(--space-8); font-size: var(--font-size-lg); }
.closing-cta .closing-cta__actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.closing-cta .phone-line { margin-top: var(--space-6); color: rgba(255,255,255,0.8); font-size: var(--font-size-base); }
.closing-cta .phone-line a { color: var(--color-accent); font-weight: 700; }

/* =====================================================
   ACCESSIBILITY & MICRO-INTERACTIONS
   ===================================================== */
.home-hero a:focus-visible,
.hero-form input:focus-visible,
.hero-form select:focus-visible,
.hero-form button:focus-visible,
.service-card__cta:focus-visible,
.services-cta-row a:focus-visible,
.gallery-tile:focus-visible,
.gallery-cta-row a:focus-visible,
.reviews-badge-strip a:focus-visible,
.areas-list a:focus-visible,
.areas-cta-row a:focus-visible,
.vent-callout a:focus-visible,
.faq-item summary:focus-visible,
.cta-mid a:focus-visible,
.closing-cta a:focus-visible {
  outline: 3px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: var(--radius-sm);
}
::selection { background: rgba(var(--color-primary-rgb), 0.85); color: var(--color-white); }

/* Button press feedback (3D-ish) */
.home-hero__actions .btn:active,
.cta-mid .btn:active,
.closing-cta .btn:active,
.hero-form .btn:active { transform: translateY(1px); box-shadow: var(--shadow-sm); }

/* Service-card CTA whole-card affordance */
.service-card-with-image:focus-within { box-shadow: var(--shadow-xl); }

/* Ticker: pause when a visitor hovers so they can read it */
.ticker-strip:hover .ticker-track { animation-play-state: paused; }

/* FAQ summary hover */
.faq-item summary:hover { color: var(--color-primary); }

/* Respect reduced-motion for every homepage animation */
@media (prefers-reduced-motion: reduce) {
  .ticker-track { animation: none; }
  .service-card-with-image:hover,
  .review-tile:hover,
  .awards-strip__row img:hover { transform: none; }
  .service-card-with-image:hover .service-card__image img,
  .gallery-tile:hover img { transform: none; }
  .home-hero__actions .btn:hover,
  .cta-mid .btn:hover,
  .closing-cta .btn:hover { transform: none; }
}

/* =====================================================
   RESPONSIVE
   ===================================================== */
@media (max-width: 1199px) {
  .services-grid { grid-template-columns: repeat(2, 1fr); }
  .areas-list { columns: 4; }
}
@media (max-width: 1024px) {
  .reviews-grid { grid-template-columns: 1fr; max-width: 680px; margin-inline: auto; }
  .areas-intro { grid-template-columns: 1fr; gap: var(--space-8); }
}
@media (max-width: 900px) {
  .home-hero__inner { grid-template-columns: 1fr; gap: var(--space-8); }
  .hero-form-card { max-width: 480px; }
  .about-grid { grid-template-columns: 1fr; gap: var(--space-16); }
  .about-figure { max-width: 480px; margin-inline: auto; }
  .about-badge { left: auto; right: var(--space-6); }
  .areas-list { columns: 3; }
}
@media (max-width: 768px) {
  .home-hero { padding-top: 112px; text-align: left; }
  .home-hero__trust { grid-template-columns: 1fr; }
  .stats-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-10) var(--space-6); }
  .faq-grid { grid-template-columns: 1fr; }
  .gallery-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-4); }
  .gallery-tile:nth-child(3n+2) { margin-top: 0; }
  .gallery-tile:nth-child(even) { margin-top: var(--space-8); }
  .awards-strip__row { gap: var(--space-5); }
  .awards-strip__row img { height: 110px; }
}
@media (max-width: 600px) {
  .services-grid { grid-template-columns: 1fr; }
  .home-hero h1 { font-size: clamp(2rem, 8vw, 2.6rem); }
  .areas-list { columns: 2; padding: var(--space-5); }
  .numbered-section .section-num { display: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="hero home-hero" aria-label="Triple G Roofing &amp; Construction — Greater Houston roofing and exterior contractor">
  <img class="home-hero__bg"
       src="/assets/images/hero-roof-home-v2.jpg"
       srcset="<?php echo tg_srcset('hero-roof-home-v2', [480, 960, 1600]); ?>"
       sizes="100vw"
       alt="Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing &amp; Construction"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container home-hero__inner">
    <div class="home-hero__text">
      <span class="home-hero__eyebrow"><?php echo icon('home', 16); ?> Family Owned · Father &amp; Son · Based in Humble, TX</span>
      <h1>Roofing &amp; Exteriors for Greater Houston <span class="text-accent">since 1973</span></h1>
      <p class="home-hero__subtitle">
        <?php echo htmlspecialchars($siteName); ?> is a small, family-owned, father-and-son team. Roof replacement and
        repair, storm damage, siding, gutters, patio covers, decks and fences — one call, and the owner is on every job.
      </p>
      <div class="home-hero__actions">
        <a href="#estimate-form" class="btn btn-primary btn-lg">Get a Free Inspection</a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>
      <div class="home-hero__trust">
        <span class="home-hero__trust-item"><?php echo icon('check-circle', 18); ?> Serving Greater Houston Since <?php echo $yearEstablished; ?></span>
        <span class="home-hero__trust-item"><?php echo icon('home', 18); ?> Family Owned &amp; Operated</span>
        <span class="home-hero__trust-item"><?php echo icon('award', 18); ?> Nextdoor Neighborhood Favorite 2022–2024</span>
        <span class="home-hero__trust-item"><?php echo icon('search', 18); ?> Free Inspections &amp; Estimates</span>
      </div>
    </div>

    <aside class="hero-form-card" id="estimate-form" aria-label="Request a free inspection">
      <h2>Get Your Free Inspection</h2>
      <p class="hero-form-tagline">Free inspection. Free written estimate. No pressure.</p>
      <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
        <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_subject" value="New estimate request — Triple G Roofing website">
        <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
        <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
        <input type="hidden" name="form_location" value="hero">
        <input type="hidden" name="consent_version" value="v2.1">
        <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/'); ?>">
        <div class="form-row">
          <label for="hero-name" class="sr-only">Full name</label>
          <input type="text" id="hero-name" name="name" placeholder="Full name" required>
        </div>
        <div class="form-row">
          <label for="hero-phone" class="sr-only">Phone number</label>
          <input type="tel" id="hero-phone" name="phone" placeholder="Phone number" required>
        </div>
        <div class="form-row">
          <label for="hero-zip" class="sr-only">ZIP code</label>
          <input type="text" id="hero-zip" name="zip" placeholder="ZIP code" pattern="\d{5}" inputmode="numeric" required>
        </div>
        <div class="form-row">
          <label for="hero-service" class="sr-only">Service needed</label>
          <select id="hero-service" name="service_requested">
            <option value="">What do you need?</option>
            <?php foreach ($services as $s): ?>
            <option value="<?php echo htmlspecialchars($s['name']); ?>"><?php echo htmlspecialchars($s['name']); ?></option>
            <?php endforeach; ?>
            <option value="Other / Not Sure">Other / Not sure</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Request My Free Inspection</button>
        <p class="form-footnote">By submitting, you agree to our <a href="/terms/">Terms</a> and <a href="/privacy-policy/">Privacy Policy</a>.</p>
      </form>
    </aside>
  </div>
</section>

<!-- ===================== TICKER STRIP ===================== -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <?php for ($loop = 0; $loop < 2; $loop++): /* duplicated for seamless loop */ ?>
    <span>Serving Greater Houston Since <?php echo $yearEstablished; ?><span class="ticker-dot">•</span></span>
    <span>Family Owned · Father &amp; Son<span class="ticker-dot">•</span></span>
    <span>Free Inspections &amp; Estimates<span class="ticker-dot">•</span></span>
    <span>The Owner Is On Every Job<span class="ticker-dot">•</span></span>
    <span>Nextdoor Neighborhood Favorite 2022 · 2023 · 2024<span class="ticker-dot">•</span></span>
    <span>Roofing · Siding · Gutters · Patio Covers · Fences<span class="ticker-dot">•</span></span>
    <span>Storm Damage &amp; Claims Help<span class="ticker-dot">•</span></span>
    <?php endfor; ?>
  </div>
</div>

<!-- ===================== SERVICES ===================== -->
<section class="services-section numbered-section" data-num="01" aria-label="Roofing and exterior services">
  <span class="section-num" aria-hidden="true">01</span>
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">What We Do</span>
      <h2>What <span class="text-accent">roofing and exterior</span> services does Triple G handle across Greater Houston?</h2>
      <p class="hero-answer">
        <?php echo htmlspecialchars($siteName); ?> is a family-owned, father-and-son contractor based in Humble, TX that has
        handled roof replacement, roof repair, storm damage repair, inspections, attic venting, gutters, siding, patio covers,
        decks and fences across the Greater Houston area since <?php echo $yearEstablished; ?>. Every project starts with a
        free inspection and a written estimate.
      </p>
      <span class="section-subtitle">Roofing, siding, gutters, patio covers, decks and fences — one call.</span>
      <p class="prose">Architectural shingle and metal roofs, Hardie and vinyl siding, cedar pergolas and privacy fences — built by the same small crew, with the owner on site.</p>
    </div>

    <div class="services-grid">
      <?php foreach ($homeServices as $i => $s):
        $tint  = ($i % 3) + 1;
        $delay = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-delay-<?php echo $delay; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $s['img']; ?>.jpg"
               srcset="<?php echo tg_srcset($s['img'], $s['variants']); ?>"
               sizes="(max-width: 600px) 100vw, (max-width: 1199px) 50vw, 300px"
               alt="<?php echo htmlspecialchars($s['alt']); ?>" width="600" height="450" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo $svgIcon($s['icon']); ?></div>
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

    <div class="services-cta-row" data-animate>
      <a href="/services/" class="btn btn-primary btn-lg">View All <?php echo count($services); ?> Services →</a>
    </div>
  </div>
</section>

<!-- divider: diagonal (into brand stats band) -->
<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-primary)" points="0,60 1200,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== STATS BAND (fact-safe numbers only) ===================== -->
<section class="stats-band" aria-label="Triple G Roofing at a glance">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item" data-animate>
        <div class="stat-number-wrap"><span class="stat-number"><?php echo $yearEstablished; ?></span></div>
        <div class="stat-label">Serving Greater Houston Since</div>
      </div>
      <div class="stat-item reveal-delay-1" data-animate>
        <?php $decades = (int) floor($yearsInBusiness / 10) * 10; ?>
        <div class="stat-number-wrap"><span class="stat-number" data-target="<?php echo $decades; ?>"><?php echo $decades; ?></span><span class="stat-suffix">+</span></div>
        <div class="stat-label">Years in Business</div>
      </div>
      <div class="stat-item reveal-delay-2" data-animate>
        <div class="stat-number-wrap"><span class="stat-number" data-target="<?php echo count($serviceAreaCities); ?>"><?php echo count($serviceAreaCities); ?></span></div>
        <div class="stat-label">Communities Served</div>
      </div>
      <div class="stat-item reveal-delay-3" data-animate>
        <div class="stat-number-wrap"><span class="stat-number" data-target="<?php echo count($awards); ?>"><?php echo count($awards); ?></span><span class="stat-suffix">×</span></div>
        <div class="stat-label">Nextdoor Neighborhood Favorite</div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== ABOUT + PROCESS ===================== -->
<section class="about-process numbered-section" data-num="02" aria-label="About Triple G Roofing and how we work">
  <span class="section-num" aria-hidden="true">02</span>
  <div class="container">
    <div class="about-grid">
      <div class="about-copy">
        <span class="eyebrow">The Men Behind the Business</span>
        <h2 data-animate><?php echo htmlspecialchars($founderName); ?> &amp; <?php echo htmlspecialchars($ownerName); ?> — a father-and-son team serving Greater Houston since <?php echo $yearEstablished; ?></h2>
        <p data-animate>
          <?php echo htmlspecialchars($siteName); ?> is a small, local, family-owned and operated business based in Humble, TX.
          Father and son <?php echo htmlspecialchars($founderName); ?> and <?php echo htmlspecialchars($ownerName); ?> have been
          putting roofs on Greater Houston homes since <?php echo $yearEstablished; ?> — long enough to have re-roofed houses
          they roofed the first time.
        </p>
        <p data-animate>
          The owner is on every job personally to oversee the work and make sure everything is done as agreed. No call
          center, no rotating sales reps: the person who inspects your roof is the person who stands on it with the crew.
          No job is too big or small, and your neighbors have voted us a Nextdoor Neighborhood Favorite three years running.
        </p>

        <div class="process-steps">
          <div class="process-step" data-animate>
            <div class="process-step__num">1</div>
            <div class="process-step__body">
              <h3>Free Inspection</h3>
              <p>Tim climbs the roof, takes exact measurements and photographs what he finds — at no charge and with no obligation.</p>
            </div>
          </div>
          <div class="process-step reveal-delay-1" data-animate>
            <div class="process-step__num">2</div>
            <div class="process-step__body">
              <h3>Written Estimate &amp; Claim Help</h3>
              <p>A clear written estimate. If storm damage is involved, we explain your policy in plain English and meet your adjuster on site.</p>
            </div>
          </div>
          <div class="process-step reveal-delay-2" data-animate>
            <div class="process-step__num">3</div>
            <div class="process-step__body">
              <h3>Build It Right</h3>
              <p>Landscaping, gardens and pools covered before tear-off, and the owner on site overseeing the crew from start to finish.</p>
            </div>
          </div>
          <div class="process-step reveal-delay-3" data-animate>
            <div class="process-step__num">4</div>
            <div class="process-step__body">
              <h3>Clean Finish &amp; Walkthrough</h3>
              <p>Daily cleanup, a magnet sweep for nails, and a walk through the finished work with you before we leave.</p>
            </div>
          </div>
        </div>

        <div class="vent-callout" data-animate>
          <?php echo icon('wind', 28); ?>
          <p>
            <strong>We check attic ventilation on every roof.</strong>
            Shingle manufacturers can void the shingle warranty when an attic isn&rsquo;t properly ventilated — so we check
            intake and exhaust on every roof we inspect or replace. <a href="/services/attic-venting/">About attic venting →</a>
          </p>
        </div>
      </div>

      <div class="about-figure" data-animate>
        <div class="frame frame--3-4">
          <img src="/assets/images/owner-father-v2.jpg"
               srcset="<?php echo tg_srcset('owner-father-v2', [480, 960]); ?>"
               sizes="(max-width: 900px) 100vw, 420px"
               alt="Glenn and Tim Menn, the father-and-son team behind Triple G Roofing &amp; Construction"
               width="1152" height="1536" loading="lazy">
        </div>
        <div class="about-badge">
          <div class="big"><?php echo $yearEstablished; ?></div>
          <div class="label">Family Owned &amp; Operated · Humble, TX</div>
        </div>
      </div>
    </div>

    <div class="awards-strip" data-animate>
      <span class="awards-strip__label">Voted a Nextdoor Neighborhood Favorite in 2022, 2023 and 2024</span>
      <div class="awards-strip__row">
        <img src="/assets/images/nextdoor-2022.png" alt="Nextdoor Neighborhood Favorite 2022 award badge" width="391" height="600" loading="lazy">
        <img src="/assets/images/nextdoor-2023.png" alt="Nextdoor Neighborhood Faves 2023 award badge" width="390" height="600" loading="lazy">
        <img src="/assets/images/nextdoor-2024.png" alt="Nextdoor Neighborhood Faves 2024 winner badge" width="338" height="600" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ===================== MID-PAGE CTA (storm / insurance, re-framed) ===================== -->
<section class="cta-mid" aria-label="Storm damage call to action">
  <div class="container">
    <h2 data-animate>Storm rolled through? Let&rsquo;s look before the next rain does.</h2>
    <p data-animate>
      Hail and Gulf Coast wind damage often hides until the next hard rain. <?php echo htmlspecialchars($shortName); ?>
      inspects and photographs the damage for free, and brings more than 50 years of claims-handling and adjuster experience
      to the insurance process — we walk you through it from start to finish. Coverage decisions belong to your carrier;
      making sure the damage is properly documented is our job.
    </p>
    <div class="cta-mid__actions" data-animate>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      <a href="#estimate-form" class="btn btn-accent btn-lg">Get a Free Inspection</a>
    </div>
  </div>
</section>

<!-- ===================== PROJECT GALLERY TEASER ===================== -->
<section class="gallery-teaser numbered-section" data-num="03" aria-label="Recent projects">
  <span class="section-num" aria-hidden="true">03</span>
  <div class="floating-accent" aria-hidden="true"></div>
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">Recent Work</span>
      <h2>Our own job photos — roofs, pergolas, decks and fences across Greater Houston</h2>
      <p>Every photo here is a <?php echo htmlspecialchars($shortName); ?> project. No stock imagery, no borrowed before-and-afters.</p>
    </div>

    <div class="gallery-grid">
      <?php foreach ($galleryTeaser as $i => $g): ?>
      <a href="/gallery/" class="gallery-tile frame frame--4-5 reveal-delay-<?php echo ($i % 3) + 1; ?>" data-animate aria-label="<?php echo htmlspecialchars($g['label']); ?> — view project gallery">
        <img src="/assets/images/<?php echo $g['img']; ?>.jpg"
             srcset="<?php echo tg_srcset($g['img'], $g['variants']); ?>"
             sizes="(max-width: 768px) 50vw, (max-width: 1200px) 33vw, 380px"
             alt="<?php echo htmlspecialchars($g['alt']); ?>" width="480" height="600" loading="lazy">
        <span class="gallery-tile__label"><?php echo htmlspecialchars($g['label']); ?></span>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="gallery-cta-row" data-animate>
      <a href="/gallery/" class="btn btn-primary btn-lg">See the Project Gallery →</a>
    </div>
  </div>
</section>

<!-- divider: curved wave (into dark reviews) -->
<div class="svg-divider svg-divider--wave" aria-hidden="true">
  <svg viewBox="0 0 1200 80" preserveAspectRatio="none"><path d="M0,40 C300,80 900,0 1200,40 L1200,80 L0,80 Z" fill="var(--color-dark)"/></svg>
</div>

<!-- ===================== REVIEWS (real customer reviews) ===================== -->
<section class="reviews-section numbered-section" data-num="04" aria-label="Customer reviews">
  <span class="section-num" aria-hidden="true">04</span>
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">What Neighbors Say</span>
      <h2>In our customers&rsquo; <span class="text-accent">own words</span></h2>
      <p>Real reviews from homeowners across the Greater Houston area, published exactly as they wrote them.</p>
    </div>

    <div class="reviews-grid">
      <?php foreach ($featuredReviews as $i => $r): ?>
      <article class="review-tile reveal-delay-<?php echo $i + 1; ?>" data-animate>
        <span class="review-tile__mark" aria-hidden="true">&ldquo;</span>
        <blockquote><?php echo htmlspecialchars(tg_excerpt($r['text'])); ?></blockquote>
        <footer>
          <span class="review-tile__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></span>
          <div>
            <span class="review-tile__name"><?php echo htmlspecialchars($r['name']); ?></span>
            <span class="review-tile__city"><?php echo htmlspecialchars($r['city']); ?></span>
          </div>
        </footer>
      </article>
      <?php endforeach; ?>
    </div>

    <!-- Elfsight Google reviews widget (real GBP reviews — pasted verbatim, deferred; never wrapped in reveal classes) -->
    <div class="reviews-embed" aria-label="Google reviews">
      <?php echo $elfsightEmbed; ?>
    </div>

    <div class="reviews-badge-strip" data-animate>
      <a href="/testimonials/"><?php echo icon('star', 18); ?> Read all <?php echo count($testimonials); ?> customer reviews</a>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('external-link', 18); ?> Find us on Google</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- divider: double wave (dark reviews into light service areas) -->
<div class="svg-divider svg-divider--double" aria-hidden="true">
  <svg viewBox="0 0 1200 100" preserveAspectRatio="none">
    <path d="M0,30 C300,70 900,10 1200,40 L1200,100 L0,100 Z" fill="var(--color-light)" opacity="0.4"/>
    <path d="M0,50 C300,90 900,20 1200,60 L1200,100 L0,100 Z" fill="var(--color-light)"/>
  </svg>
</div>

<!-- ===================== SERVICE AREAS ===================== -->
<section class="areas-section numbered-section" data-num="05" aria-label="Communities we serve">
  <span class="section-num" aria-hidden="true">05</span>
  <div class="bg-blob" aria-hidden="true"></div>
  <div class="container">
    <div class="areas-intro">
      <div data-animate>
        <span class="eyebrow">Where We Work</span>
        <h2>Proudly serving <?php echo count($serviceAreaCities); ?> communities across Greater Houston</h2>
        <p>
          From Orange to Galveston and sometimes beyond — <?php echo htmlspecialchars($shortName); ?> is based in Humble, TX and
          works across the whole Greater Houston area. Dedicated pages for Humble, Kingwood, Atascocita, Huffman and Crosby
          are linked below; every other community on the list gets the same crew and the same free inspection.
        </p>
      </div>
      <div class="areas-intro__aside" data-animate>
        <p>Don&rsquo;t see your town? If you are anywhere in the Greater Houston region, call and ask — we&rsquo;ll tell you straight whether we can get to you.</p>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
      </div>
    </div>

    <ul class="areas-list" data-animate>
      <?php foreach ($serviceAreaCities as $city): ?>
      <li><?php if (in_array($city, $serviceAreas, true)): ?><a href="/service-areas/<?php echo getAreaSlug($city); ?>/"><?php echo htmlspecialchars($city); ?></a><?php else: ?><?php echo htmlspecialchars($city); ?><?php endif; ?></li>
      <?php endforeach; ?>
    </ul>

    <div class="areas-cta-row" data-animate>
      <a href="/service-areas/" class="btn btn-primary btn-lg">Explore Our Service Areas →</a>
    </div>
  </div>
</section>

<!-- divider: torn edge (light areas into white FAQ) -->
<div class="svg-divider svg-divider--torn" aria-hidden="true">
  <svg viewBox="0 0 1200 48" preserveAspectRatio="none"><path d="M0,48 L0,24 L60,30 L130,14 L210,28 L290,10 L360,26 L440,16 L520,30 L600,12 L690,28 L760,14 L840,26 L920,10 L1000,24 L1080,12 L1140,26 L1200,16 L1200,48 Z" fill="var(--color-white)"/></svg>
</div>

<!-- ===================== FAQ ===================== -->
<section class="faq-section numbered-section" data-num="06" aria-label="Frequently asked roofing questions">
  <span class="section-num" aria-hidden="true">06</span>
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">Good Questions</span>
      <h2>Questions Greater Houston homeowners ask us</h2>
      <p class="hero-answer">Straight answers on insurance claims, who does the work, ventilation, and what a free inspection actually includes.</p>
    </div>

    <div class="faq-grid">
      <?php foreach ($faqs as $i => $f): ?>
      <details class="faq-item"<?php echo $i === 0 ? ' open' : ''; ?> data-animate>
        <summary>
          <span class="faq-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg></span>
          <?php echo htmlspecialchars($f['q']); ?>
        </summary>
        <div class="faq-answer"><p><?php echo htmlspecialchars($f['a']); ?></p></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== FROM THE BLOG (registry-driven) ===================== -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php'; $latestPost = $blogPosts[0]; ?>
<section class="blog-preview numbered-section" data-num="07" aria-label="From the blog">
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">From the Blog</span>
      <h2>Roofing answers for <span class="text-accent">Greater Houston</span> homeowners</h2>
    </div>
    <div class="blog-grid" data-p1-dynamic>
      <a href="/blog/<?php echo $latestPost['slug']; ?>/" class="blog-card">
        <div class="blog-card__image">
          <img src="<?php echo $latestPost['image']; ?>" alt="<?php echo htmlspecialchars($latestPost['alt']); ?>" width="960" height="600" loading="lazy">
        </div>
        <div class="blog-card__body">
          <span class="blog-card__category"><?php echo htmlspecialchars($latestPost['category']); ?></span>
          <h3 class="blog-card__title"><?php echo htmlspecialchars($latestPost['title']); ?></h3>
          <p class="blog-card__excerpt"><?php echo htmlspecialchars($latestPost['excerpt']); ?></p>
          <div class="blog-card__meta">
            <time datetime="<?php echo $latestPost['dateISO']; ?>"><?php echo $latestPost['date']; ?></time>
            <span>•</span>
            <span><?php echo $latestPost['readtime']; ?></span>
          </div>
          <span class="blog-card__cta">Read Article →</span>
        </div>
      </a>
    </div>
    <p class="blog-cta-row">
      <a href="/blog/" class="btn btn-primary">View All Articles</a>
    </p>
  </div>
</section>

<!-- ===================== CLOSING CTA ===================== -->
<section class="closing-cta" aria-label="Get your free roofing inspection">
  <div class="container">
    <h2 data-animate>Ready for a roof — and an exterior — you don&rsquo;t have to think about?</h2>
    <p data-animate>
      Get a free inspection and written estimate from the family that has served Greater Houston since
      <?php echo $yearEstablished; ?>. Tim shows up, climbs the roof, explains your options in plain English, and
      stands behind the work.
    </p>
    <div class="closing-cta__actions" data-animate>
      <a href="#estimate-form" class="btn btn-primary btn-lg">Get a Free Inspection</a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Contact Triple G</a>
    </div>
    <p class="phone-line" data-animate>Prefer to talk? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — <?php echo htmlspecialchars($businessHours); ?>.</p>
  </div>
</section>

<!-- FAQPage schema (AI comprehension aid — mirrors the visible FAQ above) -->
<script type="application/ld+json">
<?php echo generateFAQSchema($faqs); ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
