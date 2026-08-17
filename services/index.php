<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Services Listing — Triple G Roofing (Phase 4)
   ============================================================ */

$currentPage     = 'services';
$pageTitle       = 'Roofing Services in Huffman, TX | Triple G Roofing';
$pageDescription = 'Explore Triple G Roofing services in Huffman, TX — roof inspections, repairs, attic venting, seamless gutters, and storm & wind damage restoration across North Harris County. Call (281) 570-3325.';
$canonicalUrl    = $siteUrl . '/services/';

/* --- Enriched service data (img + icon + 3 benefit bullets) — canonical source shared with home + service pages --- */
$serviceCards = [
    [
        'name'    => 'Roof Inspection',
        'slug'    => 'roof-inspection',
        'img'     => 'roof-inspection',
        'alt'     => 'Close-up roof shingle inspection on a Huffman, TX home',
        'desc'    => 'Documented inspections that catch damage early and back up insurance claims.',
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
        'name'    => 'Storm & Wind Damage Roof Repair',
        'slug'    => 'storm-damage-repair',
        'img'     => 'storm-damage-repair',
        'alt'     => 'Storm-damaged tree fallen against a Huffman home needing roof repair',
        'desc'    => 'Emergency hail, wind, and storm response with direct claims coordination.',
        'bullets' => ['Emergency tarping & response', 'Hail & wind damage experts', 'We bill your insurer directly'],
        'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
    ],
];

/* --- Schema: BreadcrumbList + ItemList of services --- */
$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type"    => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $siteUrl . '/'],
        ["@type" => "ListItem", "position" => 2, "name" => "Services", "item" => $canonicalUrl],
    ],
];
$itemListSchema = [
    "@context" => "https://schema.org",
    "@type"    => "ItemList",
    "name"     => "Roofing Services — Triple G Roofing",
    "itemListElement" => array_map(function ($i, $s) use ($siteUrl) {
        return [
            "@type"    => "ListItem",
            "position" => $i + 1,
            "name"     => $s['name'],
            "url"      => $siteUrl . '/services/' . $s['slug'] . '/',
        ];
    }, array_keys($serviceCards), $serviceCards),
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n"
    . '<script type="application/ld+json">' . json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Services listing — page-specific styles (Premium tier)
   Tokens only (var()); distinct from other pages' <style>.
   ============================================================ */
:root {
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --color-card-tint-neutral: color-mix(in srgb, var(--color-light) 100%, #fff);
}
.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
[data-animate].reveal-delay-1 { transition-delay: .06s; }
[data-animate].reveal-delay-2 { transition-delay: .14s; }
[data-animate].reveal-delay-3 { transition-delay: .22s; }

/* ---- Breadcrumb ---- */
.svc-breadcrumb { background: var(--color-light); border-bottom: 1px solid var(--color-gray-light); }
.svc-breadcrumb ol { list-style:none; display:flex; flex-wrap:wrap; gap:var(--space-2); align-items:center; padding:var(--space-3) 0; margin:0; font-size:var(--font-size-sm); color:var(--color-gray); }
.svc-breadcrumb a { color:var(--color-gray-dark); }
.svc-breadcrumb a:hover { color:var(--color-primary); }
.svc-breadcrumb [aria-current] { color:var(--color-primary); font-weight:600; }
.svc-breadcrumb-sep { color:var(--color-gray-light); }

/* =====================================================
   HERO — compact, layered photo + gradient + noise
   ===================================================== */
.svc-hero { position:relative; min-height:52vh; display:flex; align-items:center; padding:96px 0 var(--space-16); overflow:hidden; }
.svc-hero__bg { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
.svc-hero::before { content:''; position:absolute; inset:0; z-index:1;
  background: linear-gradient(105deg, rgba(var(--color-secondary-rgb),.95) 0%, rgba(var(--color-secondary-rgb),.82) 46%, rgba(var(--color-secondary-rgb),.6) 100%); }
.svc-hero::after { content:''; position:absolute; inset:0; z-index:1; pointer-events:none; opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.svc-hero__inner { position:relative; z-index:2; max-width:820px; }
.svc-hero__eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-sm); font-weight:600; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(255,255,255,.16); padding:var(--space-2) var(--space-4); border-radius:var(--radius-full); margin-bottom:var(--space-5); }
.svc-hero__eyebrow svg { width:16px; height:16px; }
.svc-hero h1 { color:var(--color-white); font-size:clamp(2.3rem,5vw,3.75rem); line-height:1.05; margin-bottom:var(--space-5); text-wrap:balance; }
.svc-hero h1 .text-accent { font-size:1.05em; }
.svc-hero__answer { color:rgba(255,255,255,.9); font-size:var(--font-size-lg); line-height:1.7; max-width:60ch; margin-bottom:var(--space-6); }
.svc-hero__actions { display:flex; flex-wrap:wrap; gap:var(--space-4); }
.svc-hero__actions .btn svg { width:18px; height:18px; }

/* =====================================================
   INTRO STRIP (answer-first)
   ===================================================== */
.svc-intro { background:var(--color-white); }
.svc-intro .section-header { max-width:820px; margin-inline:auto; }
.answer-block { background:color-mix(in srgb, var(--color-primary) 6%, #fff); border-left:4px solid var(--color-primary); border-radius:var(--radius-md); padding:var(--space-5) var(--space-6); color:var(--color-gray-dark); line-height:1.7; font-size:var(--font-size-lg); max-width:70ch; margin:var(--space-4) auto 0; text-align:left; }
.hero-answer { font-size:var(--font-size-lg); color:var(--color-gray-dark); line-height:1.7; max-width:64ch; margin:var(--space-4) auto 0; }

/* =====================================================
   SERVICES GRID (required-components card component)
   ===================================================== */
.svc-list { background:var(--color-light); }
.services-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-8); margin-top:var(--space-12); }
.service-card-with-image { background:var(--color-card-tint-neutral); border-radius:var(--radius-lg); overflow:hidden; display:flex; flex-direction:column; box-shadow:var(--shadow-card); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.service-card-with-image:hover { transform:translateY(-6px); box-shadow:var(--shadow-xl); }
.card-tint-1 { background:var(--color-card-tint-1); }
.card-tint-2 { background:var(--color-card-tint-2); }
.card-tint-3 { background:var(--color-card-tint-3); }
.service-card__image { position:relative; aspect-ratio:5/3; overflow:hidden; }
.service-card__image img { width:100%; height:100%; object-fit:cover; display:block; transition:transform var(--transition-slow); }
.service-card-with-image:hover .service-card__image img { transform:scale(1.06); }
.service-card__body { padding:var(--space-6); text-align:center; display:flex; flex-direction:column; align-items:center; gap:var(--space-3); flex:1; }
.service-card__icon { width:60px; height:60px; border-radius:var(--radius-full); background:var(--color-white); box-shadow:var(--shadow-md); display:flex; align-items:center; justify-content:center; margin-top:calc(-1 * var(--space-10)); margin-bottom:var(--space-1); color:var(--color-primary); position:relative; z-index:1; border:3px solid var(--color-white); }
.service-card__icon svg { width:26px; height:26px; }
.service-card-with-image h3 { color:var(--color-dark); font-size:var(--font-size-xl); margin:0; }
.service-card__desc { color:var(--color-gray-dark); font-size:var(--font-size-sm); margin:0; line-height:1.55; }
.service-card-with-image ul { list-style:none; padding:var(--space-4) 0 0; margin:var(--space-2) 0 0; width:100%; text-align:left; display:flex; flex-direction:column; gap:var(--space-2); border-top:1px solid rgba(var(--color-secondary-rgb),.08); }
.service-card-with-image ul li { font-size:var(--font-size-sm); color:var(--color-gray-dark); padding-left:var(--space-6); position:relative; }
.service-card-with-image ul li::before { content:"✓"; color:var(--color-primary); font-weight:700; position:absolute; left:0; top:0; }
.service-card__cta { margin-top:var(--space-4); padding-top:var(--space-4); width:100%; color:var(--color-primary); font-family:var(--font-heading); font-weight:600; font-size:var(--font-size-sm); border-top:1px solid rgba(var(--color-secondary-rgb),.08); transition:color var(--transition-base); }
.service-card__cta::after { content:" →"; display:inline-block; transition:transform var(--transition-base); }
.service-card__cta:hover { color:var(--color-accent); }
.service-card__cta:hover::after { transform:translateX(4px); }

/* =====================================================
   WHY-CHOOSE BAND (bento) — signature section
   ===================================================== */
.svc-why { background:var(--color-white); }
.why-bento { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-6); margin-top:var(--space-12); }
.why-card { position:relative; background:var(--color-light); border:1px solid var(--color-gray-light); border-radius:var(--radius-lg); padding:var(--space-8); overflow:hidden; transition:transform var(--transition-base), box-shadow var(--transition-base); }
.why-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.why-card:nth-child(1) { grid-column:span 2; background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 10%, #fff), var(--color-white)); }
.why-card__ico { width:52px; height:52px; border-radius:var(--radius-md); background:var(--color-primary); color:var(--color-white); display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-4); }
.why-card__ico svg { width:26px; height:26px; }
.why-card h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.why-card p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.65; margin:0; }

/* =====================================================
   AREAS STRIP
   ===================================================== */
.svc-areas { background:var(--color-light); text-align:center; }
.area-chips { display:flex; flex-wrap:wrap; gap:var(--space-3); justify-content:center; margin-top:var(--space-8); }
.area-chips span { background:var(--color-white); border:1px solid var(--color-gray-light); border-radius:var(--radius-full); padding:var(--space-3) var(--space-6); font-weight:600; color:var(--color-gray-dark); box-shadow:var(--shadow-sm); }

/* =====================================================
   CLOSING CTA
   ===================================================== */
.svc-cta { position:relative; overflow:hidden; text-align:center; padding:var(--space-16) 0;
  background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 82%, #000) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.svc-cta::before { content:''; position:absolute; inset:0; pointer-events:none; opacity:.06;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.svc-cta .container { position:relative; z-index:1; }
.svc-cta h2 { color:var(--color-white); font-size:clamp(1.9rem,4vw,2.75rem); margin-bottom:var(--space-4); text-wrap:balance; }
.svc-cta p { color:rgba(255,255,255,.92); max-width:60ch; margin:0 auto var(--space-8); font-size:var(--font-size-lg); }
.svc-cta__actions { display:flex; gap:var(--space-4); justify-content:center; flex-wrap:wrap; }
.svc-cta .btn svg { width:18px; height:18px; }

/* ---- SVG divider ---- */
.svg-divider { display:block; overflow:hidden; line-height:0; }
.svg-divider svg { display:block; width:100%; height:100%; }
.svg-divider--diagonal { height:60px; }
.svg-divider--wave { height:70px; }

/* ---- Focus visibility ---- */
.svc-hero a:focus-visible, .service-card__cta:focus-visible, .svc-cta a:focus-visible, .why-card:focus-within { outline:3px solid var(--color-accent); outline-offset:2px; border-radius:var(--radius-sm); }

@media (prefers-reduced-motion: reduce) {
  .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img, .why-card:hover { transform:none; }
}
@media (max-width:1024px) { .services-grid { grid-template-columns:repeat(2,1fr); } .why-bento { grid-template-columns:1fr 1fr; } .why-card:nth-child(1){ grid-column:span 2; } }
@media (max-width:600px) { .services-grid { grid-template-columns:1fr; } .why-bento { grid-template-columns:1fr; } .why-card:nth-child(1){ grid-column:auto; } }
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
<section class="svc-hero" aria-label="Roofing services in Huffman, TX">
  <img class="svc-hero__bg"
       src="/assets/images/hero-roof-home.jpg"
       srcset="/assets/images/hero-roof-home-480.webp 480w, /assets/images/hero-roof-home-960.webp 960w, /assets/images/hero-roof-home-1600.webp 1600w"
       sizes="100vw"
       alt="Freshly installed architectural shingle roof on a Huffman, TX home"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container svc-hero__inner">
    <span class="svc-hero__eyebrow"><?php echo icon('shield', 16); ?> Roofing Services · Huffman, TX</span>
    <h1>Complete <span class="text-accent">roofing services</span> for North Harris County homes</h1>
    <p class="svc-hero__answer">
      Triple G Roofing is a licensed, insured, family-owned roofing contractor in Huffman, TX. We inspect, repair,
      ventilate, and re-gutter roofs — and lead storm and wind damage restoration with same-day inspections and
      direct insurance-claim support for homeowners across Huffman, Humble, Atascocita, Kingwood, and Crosby.
    </p>
    <div class="svc-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<!-- ===================== INTRO / ANSWER-FIRST ===================== -->
<section class="section svc-intro" aria-label="Overview of Triple G Roofing services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">What We Do</span>
      <h2>Which <span class="text-accent">roofing services</span> does Triple G Roofing offer in Huffman?</h2>
      <p class="answer-block">
        Triple G Roofing offers six core services for Huffman-area homeowners: roof inspection, roof repair, attic
        venting, gutter installation, roof damage repair, and storm &amp; wind damage roof repair. Every job is
        documented, code-compliant, and backed by a 10-year workmanship guarantee — with direct insurance billing
        whenever storm damage is covered.
      </p>
    </div>
  </div>
</section>

<!-- ===================== SERVICES GRID ===================== -->
<section class="section svc-list" aria-label="Roofing service options">
  <div class="container">
    <div class="services-grid">
      <?php foreach ($serviceCards as $i => $s):
        $tint  = ($i % 3) + 1;
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
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-white)" points="0,60 1200,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== WHY CHOOSE (bento) ===================== -->
<section class="section svc-why numbered-section" aria-label="Why homeowners choose Triple G Roofing">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">The Triple G Difference</span>
      <h2>Why do Huffman homeowners hire <span class="text-accent">Triple G Roofing</span>?</h2>
      <p class="hero-answer">Homeowners choose Triple G Roofing for same-day storm response, honest documentation, and a local crew that handles the insurance paperwork most contractors leave to you.</p>
    </div>
    <div class="why-bento">
      <div class="why-card" data-animate>
        <div class="why-card__ico"><?php echo icon('clock', 26); ?></div>
        <h3>Same-day storm inspections</h3>
        <p>When hail or Gulf Coast wind rolls through North Harris County, we get a roofer on your Huffman home the same day, photograph every issue, and document it before the next hard rain — so nothing gets denied for lack of proof.</p>
      </div>
      <div class="why-card" data-animate>
        <div class="why-card__ico"><?php echo icon('award', 26); ?></div>
        <h3>Insurance handled for you</h3>
        <p>We meet your adjuster on site, build claim-ready estimates, and bill your insurer directly whenever damage is covered.</p>
      </div>
      <div class="why-card" data-animate>
        <div class="why-card__ico"><?php echo icon('shield', 26); ?></div>
        <h3>Licensed &amp; insured, locally</h3>
        <p>Triple G Roofing is a family-owned Huffman contractor — the same team from first inspection to final walkthrough, backed by a 10-year workmanship guarantee.</p>
      </div>
      <div class="why-card" data-animate>
        <div class="why-card__ico"><?php echo icon('check-circle', 26); ?></div>
        <h3>Built for the Texas climate</h3>
        <p>Impact-resistant materials, balanced attic ventilation, and code-compliant installs chosen for Huffman heat, humidity, and wind — not a one-size template.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== SERVICE AREAS ===================== -->
<section class="section svc-areas" aria-label="Service areas">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Where We Work</span>
      <h2>Where can you get Triple G Roofing service near you?</h2>
      <p class="hero-answer">Triple G Roofing serves homeowners within about 25 miles of Huffman, TX, including these North Harris County communities.</p>
    </div>
    <div class="area-chips">
      <?php foreach ($serviceAreas as $area): ?>
      <span><?php echo htmlspecialchars($area); ?>, TX</span>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== CLOSING CTA ===================== -->
<section class="svc-cta" aria-label="Request a free roofing estimate">
  <div class="container">
    <h2>Not sure which roofing service your Huffman home needs?</h2>
    <p>We&rsquo;ll take a look — free. Tell us what you&rsquo;re seeing and Triple G Roofing will inspect it, explain your options in plain English, and put it in writing. Same-day response across Huffman and North Harris County.</p>
    <div class="svc-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get My Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
