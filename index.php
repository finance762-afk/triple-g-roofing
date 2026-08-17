<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Homepage — Triple G Roofing (Phase 3)
   ============================================================ */

$currentPage     = 'home';
$pageTitle       = 'Triple G Roofing | Roofing Contractor in Huffman, TX';
$pageDescription = 'Triple G Roofing is a licensed, family-owned roofing contractor in Huffman, TX. Storm damage repair, roof replacement, inspections & insurance-claim help across North Harris County. Call (281) 824-5463.';
$pageDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/';

/* --- Homepage service data (image + icon + 3 benefit bullets per required-components) --- */
$homeServices = [
    [
        'name'    => 'Roof Inspection',
        'slug'    => 'roof-inspection',
        'img'     => 'roof-inspection',
        'alt'     => 'Close-up roof shingle inspection on a Huffman, TX home',
        'desc'    => 'Detailed inspections that document damage and back up insurance claims.',
        'bullets' => ['Same-day storm inspections', 'Photo-documented reports', 'Insurance claim–ready findings'],
        'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>',
    ],
    [
        'name'    => 'Roof Repair',
        'slug'    => 'roof-repair',
        'img'     => 'roof-repair',
        'alt'     => 'Roof decking exposed during a repair on a brick Huffman home',
        'desc'    => 'Leak, shingle, and flashing repairs that stop water damage fast.',
        'bullets' => ['Leaks stopped at the source', 'Shingle & flashing replacement', 'Most repairs within 48 hours'],
        'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z"/></svg>',
    ],
    [
        'name'    => 'Attic Venting',
        'slug'    => 'attic-venting',
        'img'     => 'attic-venting',
        'alt'     => 'New roof framing and ridge line during an attic ventilation upgrade',
        'desc'    => 'Balanced intake-and-exhaust venting that cools your attic and saves shingles.',
        'bullets' => ['Lower attic heat & energy bills', 'Ridge and soffit vent systems', 'Longer shingle service life'],
        'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 12h4"/><path d="M10 8h4"/><path d="M14 21v-3a2 2 0 0 0-4 0v3"/><path d="M6 10H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2"/><path d="M6 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"/></svg>',
    ],
    [
        'name'    => 'Gutter Installation',
        'slug'    => 'gutter-installation',
        'img'     => 'gutter-installation',
        'alt'     => 'Finished architectural shingle roofline on a Huffman neighborhood home',
        'desc'    => 'Seamless gutters that route rainwater away from your foundation.',
        'bullets' => ['Custom seamless gutter runs', 'Protects fascia & foundation', 'Clean, low-maintenance finish'],
        'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2"/><path d="m11.5 9.5 2-2"/><path d="m8.5 6.5 2-2"/><path d="m17.5 15.5 2-2"/></svg>',
    ],
    [
        'name'    => 'Roof Damage Repair',
        'slug'    => 'roof-damage-repair',
        'img'     => 'roof-damage-repair',
        'alt'     => 'Roof tear-off job with a loaded dumpster at a Huffman home',
        'desc'    => 'Full assessment and repair for aging, worn, or compromised roofs.',
        'bullets' => ['Complete damage assessment', 'Rotted decking replaced', 'Built to North Harris County code'],
        'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9"/><path d="m18 15 4-4"/><path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"/></svg>',
    ],
    [
        'name'    => 'Storm & Wind Damage Repair',
        'slug'    => 'storm-damage-repair',
        'img'     => 'storm-damage-repair',
        'alt'     => 'Storm-damaged tree fallen against a Huffman home needing roof repair',
        'desc'    => 'Emergency hail, wind, and storm response with direct claims coordination.',
        'bullets' => ['Emergency tarping & response', 'Hail & wind damage experts', 'We bill your insurer directly'],
        'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
    ],
];

/* --- Homepage FAQs (from research brief + one local/estimate question) --- */
$faqs = [
    [
        'q' => 'How quickly can Triple G Roofing repair storm damage?',
        'a' => 'Triple G Roofing offers same-day inspections for storm damage and works directly with insurance adjusters. Most repairs begin within 48 hours of approval, and during severe weather season we keep emergency crews on standby for Huffman-area homeowners.',
    ],
    [
        'q' => "What roof materials work best in Huffman's heat and humidity?",
        'a' => 'Impact-resistant shingles, architectural asphalt, and metal roofing all perform well in the North Harris County climate. We assess your home\'s specific exposure, budget, and look to recommend the option that holds up best to Gulf Coast heat, humidity, and wind.',
    ],
    [
        'q' => 'Do you handle insurance claims?',
        'a' => 'Yes. Triple G Roofing provides detailed estimates that meet insurance requirements, communicates directly with your adjuster, and bills your insurance company whenever possible—so you are not paying out of pocket for covered storm damage.',
    ],
    [
        'q' => 'What warranty comes with a new roof?',
        'a' => 'We guarantee 10 years of workmanship on every installation, and shingles carry manufacturer warranties of 25–30 years. As an authorized installer, we make sure your material warranty stays valid long after the job is done.',
    ],
    [
        'q' => 'How often should I inspect my roof?',
        'a' => 'Plan on an annual inspection, especially after major storms. Catching problems early protects your investment—and because many claims are denied when damage is not documented quickly, a prompt inspection helps you stay ahead of any dispute.',
    ],
    [
        'q' => 'Do you offer free roof estimates near me in Huffman?',
        'a' => 'Yes. Triple G Roofing provides free, no-obligation estimates across Huffman, Humble, Atascocita, Kingwood, and Crosby. Call (281) 824-5463 or request an estimate online and we will respond the same day.',
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
}

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

/* =====================================================
   HERO — layered photo + gradient overlay, 60/40 split
   ===================================================== */
.home-hero {
  min-height: 100vh; min-height: 100svh; display: flex; align-items: center;
  text-align: left; padding-top: 96px; padding-bottom: var(--space-16);
  overflow: hidden;
}
.home-hero__bg {
  position: absolute; inset: 0; width: 100%; height: 100%;
  object-fit: cover; z-index: 0;
}
/* C1 layered hero: ::before gradient + ::after noise texture */
.home-hero::before {
  content: ''; position: absolute; inset: 0; z-index: 1;
  background:
    linear-gradient(105deg,
      rgba(var(--color-secondary-rgb), 0.94) 0%,
      rgba(var(--color-secondary-rgb), 0.82) 42%,
      rgba(var(--color-secondary-rgb), 0.55) 100%);
}
.home-hero::after {
  content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.05;
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
  border: 1px solid rgba(255,255,255,0.16);
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
  color: rgba(255,255,255,0.9); font-size: var(--font-size-lg);
  line-height: 1.65; max-width: 44ch; margin-bottom: var(--space-6);
}
.home-hero__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.home-hero__actions .btn svg { width: 18px; height: 18px; }
.home-hero__trust {
  display: grid; grid-template-columns: repeat(2, auto);
  gap: var(--space-3) var(--space-6); justify-content: start;
}
.home-hero__trust-item {
  display: flex; align-items: center; gap: var(--space-2);
  color: rgba(255,255,255,0.92); font-size: var(--font-size-sm); font-weight: 500;
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
   SVG SECTION DIVIDERS (3+ styles per homepage)
   ===================================================== */
.svg-divider { display: block; overflow: hidden; line-height: 0; }
.svg-divider svg { display: block; width: 100%; height: 100%; }
.svg-divider--wave { height: 70px; }
.svg-divider--double { height: 90px; }
.svg-divider--diagonal { height: 60px; }
.svg-divider--torn { height: 56px; }

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
/* logical properties keep centering correct in any writing mode */
.services-section .section-header { max-width: 760px; margin-inline: auto; padding-inline: var(--space-4); }
.hero-answer {
  font-size: var(--font-size-lg); color: var(--color-gray-dark);
  line-height: 1.7; max-width: 64ch; margin: var(--space-4) auto 0;
}
.services-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: var(--space-8); margin-top: var(--space-12);
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
.service-card__image { position: relative; aspect-ratio: 5 / 3; overflow: hidden; }
.service-card__image img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform var(--transition-slow);
}
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body {
  padding: var(--space-6) var(--space-6) var(--space-6);
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
.service-card-with-image h3 { color: var(--color-dark); font-size: var(--font-size-xl); margin: 0; }
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
  margin-top: var(--space-4); padding-top: var(--space-4); width: 100%;
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
  background: radial-gradient(ellipse at 50% 0%, rgba(255,255,255,0.16) 0%, transparent 65%);
}
.stats-band .container { position: relative; z-index: 1; }
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-8); text-align: center; }
.stat-item { color: var(--color-white); }
.stat-number-wrap { display: flex; align-items: baseline; justify-content: center; gap: 2px; }
.stat-item .stat-number { font-family: var(--font-heading); font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; line-height: 1; color: var(--color-white); }
.stat-item .stat-suffix { font-family: var(--font-heading); font-size: var(--font-size-2xl); font-weight: 800; color: rgba(255,255,255,0.85); }
.stat-item .stat-label { font-size: var(--font-size-sm); color: rgba(255,255,255,0.9); margin-top: var(--space-3); text-transform: uppercase; letter-spacing: 1px; }

/* =====================================================
   MID-PAGE CTA BANNER (3-stop diagonal gradient + noise)
   ===================================================== */
.cta-mid { position: relative; overflow: hidden; padding: var(--space-16) 0; text-align: center;
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.cta-mid::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.06;
}
.cta-mid .container { position: relative; z-index: 1; }
.cta-mid h2 { color: var(--color-white); font-size: clamp(1.8rem, 4vw, 2.75rem); margin-bottom: var(--space-4); }
.cta-mid p { color: rgba(255,255,255,0.92); max-width: 60ch; margin: 0 auto var(--space-8); font-size: var(--font-size-lg); }
.cta-mid .cta-mid__actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.cta-mid .btn svg { width: 18px; height: 18px; }

/* =====================================================
   ABOUT + PROCESS (asymmetric split, overlapping badge)
   ===================================================== */
.about-process { background: var(--color-light); }
.about-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: var(--space-16); align-items: center; }
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

.about-figure { position: relative; }
.about-figure img { width: 100%; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); object-fit: cover; }
.about-figure::after {
  content: ''; position: absolute; inset: 0; border-radius: var(--radius-lg);
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

/* =====================================================
   REVIEWS (dark section — real GBP via Elfsight)
   ===================================================== */
.reviews-section { position: relative; background: var(--color-dark); overflow: hidden; }
.reviews-section::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(ellipse at 20% 100%, rgba(var(--color-primary-rgb), 0.18) 0%, transparent 60%);
}
.reviews-section .container { position: relative; z-index: 1; }
.reviews-section .section-header h2 { color: var(--color-white); }
.reviews-section .section-header .eyebrow { color: var(--color-accent); }
.reviews-section .section-header p { color: rgba(255,255,255,0.72); }
.reviews-embed { margin-top: var(--space-8); min-height: 120px; }
.reviews-badge-strip {
  display: flex; flex-wrap: wrap; gap: var(--space-4); justify-content: center;
  margin-top: var(--space-8);
}
.reviews-badge-strip a {
  display: inline-flex; align-items: center; gap: var(--space-2);
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
  color: var(--color-white); font-size: var(--font-size-sm); font-weight: 600;
  padding: var(--space-3) var(--space-5); border-radius: var(--radius-full);
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.reviews-badge-strip a:hover { background: rgba(var(--color-primary-rgb), 0.2); border-color: var(--color-primary); color: var(--color-white); }
.reviews-badge-strip svg { width: 18px; height: 18px; color: var(--color-star); }

/* =====================================================
   FAQ (accordion)
   ===================================================== */
.faq-section { background: var(--color-white); }
.faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); align-items: start; }
.faq-item {
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
.closing-cta .phone-line { margin-top: var(--space-6); color: rgba(255,255,255,0.8); font-size: var(--font-size-base); }
.closing-cta .phone-line a { color: var(--color-accent); font-weight: 700; }

/* =====================================================
   ACCESSIBILITY & MICRO-INTERACTIONS
   ===================================================== */
/* Visible keyboard focus (WCAG 2.1 AA) */
.home-hero a:focus-visible,
.hero-form input:focus-visible,
.hero-form select:focus-visible,
.hero-form button:focus-visible,
.service-card__cta:focus-visible,
.services-cta-row a:focus-visible,
.reviews-badge-strip a:focus-visible,
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
  .service-card-with-image:hover { transform: none; }
  .service-card-with-image:hover .service-card__image img { transform: none; }
  .home-hero__actions .btn:hover,
  .cta-mid .btn:hover,
  .closing-cta .btn:hover { transform: none; }
}

/* =====================================================
   RESPONSIVE
   ===================================================== */
@media (max-width: 1024px) {
  .services-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .home-hero__inner { grid-template-columns: 1fr; gap: var(--space-8); }
  .hero-form-card { max-width: 480px; }
  .about-grid { grid-template-columns: 1fr; gap: var(--space-16); }
  .about-badge { left: auto; right: var(--space-6); }
}
@media (max-width: 768px) {
  .home-hero { padding-top: 88px; text-align: left; }
  .home-hero__trust { grid-template-columns: 1fr; }
  .stats-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-10) var(--space-6); }
  .faq-grid { grid-template-columns: 1fr; }
}
@media (max-width: 600px) {
  .services-grid { grid-template-columns: 1fr; }
  .home-hero h1 { font-size: clamp(2rem, 8vw, 2.6rem); }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="hero home-hero" aria-label="Triple G Roofing — Huffman, TX roofing contractor">
  <img class="home-hero__bg"
       src="/assets/images/hero-roof-home.jpg"
       srcset="/assets/images/hero-roof-home-480.webp 480w, /assets/images/hero-roof-home-960.webp 960w, /assets/images/hero-roof-home-1600.webp 1600w"
       sizes="100vw"
       alt="Architectural shingle roof on a two-story home in Huffman, TX"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container home-hero__inner">
    <div class="home-hero__text">
      <span class="home-hero__eyebrow"><?php echo icon('shield', 16); ?> Serving Huffman &amp; North Harris County</span>
      <h1>Trusted Roofing for <span class="text-accent">Huffman</span> Families</h1>
      <p class="home-hero__subtitle">
        Triple G Roofing is a licensed, insured, family-owned roofing contractor built for Texas weather —
        storm damage repair, new installations, and honest inspections from a local roofer who answers the phone
        and stands behind the work.
      </p>
      <div class="home-hero__actions">
        <a href="#estimate-form" class="btn btn-primary btn-lg">Get a Free Estimate</a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
      </div>
      <div class="home-hero__trust">
        <span class="home-hero__trust-item"><?php echo icon('shield', 18); ?> Licensed &amp; Insured</span>
        <span class="home-hero__trust-item"><?php echo icon('check-circle', 18); ?> Family-Owned &amp; Local</span>
        <span class="home-hero__trust-item"><?php echo icon('clock', 18); ?> Same-Day Storm Inspections</span>
        <span class="home-hero__trust-item"><?php echo icon('award', 18); ?> Insurance Claims Handled</span>
      </div>
    </div>

    <aside class="hero-form-card" id="estimate-form" aria-label="Request a free estimate">
      <h2>Get Your Free Estimate</h2>
      <p class="hero-form-tagline">No obligation. Same-day response.</p>
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
          <input type="text" id="hero-zip" name="zip" placeholder="ZIP code" pattern="[0-9]{5}" inputmode="numeric" required>
        </div>
        <div class="form-row">
          <label for="hero-service" class="sr-only">Service needed</label>
          <select id="hero-service" name="service_requested">
            <option value="">What do you need?</option>
            <?php foreach ($homeServices as $s): ?>
            <option value="<?php echo htmlspecialchars($s['name']); ?>"><?php echo htmlspecialchars($s['name']); ?></option>
            <?php endforeach; ?>
            <option value="Other / Not Sure">Other / Not sure</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Get My Free Estimate</button>
        <p class="form-footnote">By submitting, you agree to our <a href="/terms/">Terms</a> and <a href="/privacy-policy/">Privacy Policy</a>.</p>
      </form>
    </aside>
  </div>
</section>

<!-- ===================== TICKER STRIP ===================== -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <span>Licensed &amp; Insured<span class="ticker-dot">•</span></span>
    <span>Storm &amp; Hail Damage Experts<span class="ticker-dot">•</span></span>
    <span>Same-Day Inspections<span class="ticker-dot">•</span></span>
    <span>Insurance Claims Handled<span class="ticker-dot">•</span></span>
    <span>Free Estimates<span class="ticker-dot">•</span></span>
    <span>10-Year Workmanship Warranty<span class="ticker-dot">•</span></span>
    <span>Family-Owned in Huffman<span class="ticker-dot">•</span></span>
    <span>Serving North Harris County<span class="ticker-dot">•</span></span>
    <!-- duplicate for seamless loop -->
    <span>Licensed &amp; Insured<span class="ticker-dot">•</span></span>
    <span>Storm &amp; Hail Damage Experts<span class="ticker-dot">•</span></span>
    <span>Same-Day Inspections<span class="ticker-dot">•</span></span>
    <span>Insurance Claims Handled<span class="ticker-dot">•</span></span>
    <span>Free Estimates<span class="ticker-dot">•</span></span>
    <span>10-Year Workmanship Warranty<span class="ticker-dot">•</span></span>
    <span>Family-Owned in Huffman<span class="ticker-dot">•</span></span>
    <span>Serving North Harris County<span class="ticker-dot">•</span></span>
  </div>
</div>

<!-- ===================== SERVICES ===================== -->
<section class="services-section numbered-section" data-num="01" aria-label="Roofing services in Huffman, TX">
  <span class="section-num" aria-hidden="true">01</span>
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">What We Do</span>
      <h2>What <span class="text-accent">roofing services</span> can Huffman homeowners count on?</h2>
      <p class="hero-answer">
        Triple G Roofing is a licensed, insured, family-owned roofing contractor in Huffman, TX, offering roof
        inspections, repairs, attic venting, seamless gutters, and storm and wind damage restoration. We serve
        homeowners across North Harris County with same-day storm inspections and direct insurance-claim support.
      </p>
    </div>

    <div class="services-grid">
      <?php foreach ($homeServices as $i => $s):
        $tint = ($i % 3) + 1;
        $delay = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-delay-<?php echo $delay; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $s['img']; ?>.jpg"
               srcset="/assets/images/<?php echo $s['img']; ?>-480.webp 480w, /assets/images/<?php echo $s['img']; ?>-960.webp 960w, /assets/images/<?php echo $s['img']; ?>-1600.webp 1600w"
               sizes="(max-width: 600px) 100vw, (max-width: 1024px) 50vw, 380px"
               alt="<?php echo htmlspecialchars($s['alt']); ?>" width="600" height="360" loading="lazy">
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

    <div class="services-cta-row" data-animate>
      <a href="/services/" class="btn btn-primary btn-lg">View All Roofing Services</a>
    </div>
  </div>
</section>

<!-- divider: diagonal (into brand stats band) -->
<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-primary)" points="0,60 1200,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== STATS BAND ===================== -->
<section class="stats-band" aria-label="Triple G Roofing at a glance">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item" data-animate>
        <div class="stat-number-wrap"><span class="stat-number" data-counter="25">0</span><span class="stat-suffix">mi</span></div>
        <div class="stat-label">Service Radius from Huffman</div>
      </div>
      <div class="stat-item reveal-delay-1" data-animate>
        <div class="stat-number-wrap"><span class="stat-number" data-counter="10">0</span><span class="stat-suffix">yr</span></div>
        <div class="stat-label">Workmanship Warranty</div>
      </div>
      <div class="stat-item" data-animate>
        <div class="stat-number-wrap"><span class="stat-number" data-counter="5">0</span><span class="stat-suffix">+</span></div>
        <div class="stat-label">Communities Served</div>
      </div>
      <div class="stat-item" data-animate>
        <div class="stat-number-wrap"><span class="stat-number" data-counter="7">0</span><span class="stat-suffix">/wk</span></div>
        <div class="stat-label">Days a Week, 8am–8pm</div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== MID-PAGE CTA ===================== -->
<section class="cta-mid" aria-label="Storm damage call to action">
  <div class="container">
    <h2 data-animate>Storm rolled through? Don&rsquo;t wait for the leak to spread.</h2>
    <p data-animate>
      Hail and Gulf Coast wind damage often hides until the next hard rain — and insurers deny claims when
      damage isn&rsquo;t documented fast. Triple G Roofing gets a roofer on your Huffman home the same day,
      photographs everything, and works your claim directly with the adjuster.
    </p>
    <div class="cta-mid__actions" data-animate>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      <a href="#estimate-form" class="btn btn-accent btn-lg">Book a Free Inspection</a>
    </div>
  </div>
</section>

<!-- ===================== ABOUT + PROCESS ===================== -->
<section class="about-process numbered-section" data-num="02" aria-label="About Triple G Roofing and how we work">
  <span class="section-num" aria-hidden="true">02</span>
  <div class="container">
    <div class="about-grid">
      <div class="about-copy">
        <span class="eyebrow">Your Neighborhood Roofer</span>
        <h2 data-animate>A Huffman family business protecting Huffman homes</h2>
        <p data-animate>
          Triple G Roofing was started by the Menn family for one reason: homeowners deserve a roofer who treats
          their house like his own. Owner Tim Menn is hands-on from the first inspection to the final nail, and
          you deal with the same local team the whole way through — not a call center three states away.
        </p>
        <p data-animate>
          When a North Harris County storm hits, we&rsquo;re the crew neighbors call first. We know the building
          codes, the humidity, and how fast a small leak turns into a ceiling stain here on the Gulf Coast — so we
          fix it right, document it for your insurer, and back it with a 10-year workmanship guarantee.
        </p>

        <div class="process-steps">
          <div class="process-step" data-animate>
            <div class="process-step__num">1</div>
            <div class="process-step__body">
              <h3>Inspect &amp; Document</h3>
              <p>Same-day, top-to-bottom inspection with photos of every issue — sized up for repair or an insurance claim.</p>
            </div>
          </div>
          <div class="process-step reveal-delay-1" data-animate>
            <div class="process-step__num">2</div>
            <div class="process-step__body">
              <h3>Clear Quote &amp; Claim Help</h3>
              <p>A written, no-surprise estimate. If it&rsquo;s a claim, we meet your adjuster and handle the paperwork.</p>
            </div>
          </div>
          <div class="process-step" data-animate>
            <div class="process-step__num">3</div>
            <div class="process-step__body">
              <h3>Install With Care</h3>
              <p>Clean, code-compliant workmanship, quality materials, and a job site we leave tidier than we found it.</p>
            </div>
          </div>
          <div class="process-step" data-animate>
            <div class="process-step__num">4</div>
            <div class="process-step__body">
              <h3>Final Walkthrough</h3>
              <p>We walk the finished roof with you, confirm the details, and register your manufacturer warranty.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="about-figure" data-animate>
        <img src="/assets/images/owner-father.jpg"
             srcset="/assets/images/owner-father-480.webp 480w, /assets/images/owner-father-960.webp 960w"
             sizes="(max-width: 900px) 100vw, 420px"
             alt="Owner Tim Menn and his father with the Triple G Roofing sign at a Huffman job site"
             width="600" height="800" loading="lazy">
        <div class="about-badge">
          <div class="big">Local</div>
          <div class="label">Family-Owned &amp; Operated in Huffman, TX</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- divider: curved wave (into dark reviews) -->
<div class="svg-divider svg-divider--wave" aria-hidden="true">
  <svg viewBox="0 0 1200 80" preserveAspectRatio="none"><path d="M0,40 C300,80 900,0 1200,40 L1200,80 L0,80 Z" fill="var(--color-dark)"/></svg>
</div>

<!-- ===================== REVIEWS ===================== -->
<section class="reviews-section numbered-section" data-num="03" aria-label="Customer reviews">
  <span class="section-num" aria-hidden="true">03</span>
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">What Neighbors Say</span>
      <h2>Reviewed by Huffman homeowners</h2>
      <p>Real Google reviews from families across Huffman, Humble, Atascocita, Kingwood, and Crosby.</p>
    </div>

    <!-- Elfsight Google reviews widget (real reviews — pasted verbatim, deferred) -->
    <div class="reviews-embed">
      <?php echo $elfsightEmbed; ?>
    </div>

    <div class="reviews-badge-strip" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- divider: double wave (into white FAQ) -->
<div class="svg-divider svg-divider--double" aria-hidden="true" style="background: var(--color-dark);">
  <svg viewBox="0 0 1200 100" preserveAspectRatio="none">
    <path d="M0,30 C300,70 900,10 1200,40 L1200,100 L0,100 Z" fill="var(--color-white)" opacity="0.4"/>
    <path d="M0,50 C300,90 900,20 1200,60 L1200,100 L0,100 Z" fill="var(--color-white)"/>
  </svg>
</div>

<!-- ===================== FAQ ===================== -->
<section class="faq-section numbered-section" data-num="04" aria-label="Frequently asked roofing questions">
  <span class="section-num" aria-hidden="true">04</span>
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">Good Questions</span>
      <h2>Roofing questions Huffman homeowners ask us</h2>
      <p class="hero-answer">Straight answers on storm repairs, insurance claims, materials, and warranties — before you ever sign anything.</p>
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

<!-- ===================== FROM THE BLOG ===================== -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php'; $latestPost = $blogPosts[0]; ?>
<section class="blog-preview numbered-section" data-num="05" aria-label="From the blog">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">From the Blog</span>
      <h2>Roofing answers for <span class="text-accent">North Harris County</span> homeowners</h2>
    </div>
    <div class="blog-grid" style="grid-template-columns: minmax(0, 640px); justify-content: center;" data-p1-dynamic>
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
    <p style="text-align:center; margin-top: var(--space-8);">
      <a href="/blog/" class="btn btn-primary">View All Articles</a>
    </p>
  </div>
</section>

<!-- ===================== CLOSING CTA ===================== -->
<section class="closing-cta" aria-label="Get your free roofing estimate">
  <div class="container">
    <h2 data-animate>Ready for a roof you don&rsquo;t have to think about?</h2>
    <p data-animate>
      Get a free, no-obligation estimate from a licensed Huffman roofer who shows up, explains your options in
      plain English, and stands behind every shingle. Same-day response across North Harris County.
    </p>
    <div class="cta-mid__actions" style="display:flex; gap: var(--space-4); justify-content:center; flex-wrap:wrap;" data-animate>
      <a href="#estimate-form" class="btn btn-primary btn-lg">Get My Free Estimate</a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Contact Triple G</a>
    </div>
    <p class="phone-line" data-animate>Prefer to talk? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — 8am to 8pm, 7 days a week.</p>
  </div>
</section>

<!-- FAQPage schema (AI comprehension aid) -->
<script type="application/ld+json">
<?php echo generateFAQSchema($faqs); ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
