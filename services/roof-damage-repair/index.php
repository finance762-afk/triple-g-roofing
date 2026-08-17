<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Service — Roof Damage Repair · Triple G Roofing (Phase 4)
   Premium editorial service page (8-section structure)
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Roof Damage Repair';
$serviceSlug     = 'roof-damage-repair';
$pageTitle       = 'Roof Damage Repair Huffman TX | Triple G Roofing';
$metaDescription = 'Roof damage repair in Huffman, TX from Triple G Roofing — hail, wind, leak, and rotted-decking repairs with a 10-year workmanship warranty. Licensed & insured. Call (281) 570-3325.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';

/* --- FAQs specific to roof damage repair in Huffman --- */
$faqs = [
    [
        'q' => 'Should I repair or replace my damaged roof?',
        'a' => 'It comes down to how much of the roof is affected. Triple G Roofing generally recommends a targeted repair when damage is confined to one slope or under about 25 to 30 percent of the roof. Once damage is widespread, the shingles are near end-of-life, or decking rot has spread, a full replacement is the smarter long-term investment.',
    ],
    [
        'q' => 'How much does roof damage repair cost in Huffman, TX?',
        'a' => 'Most Huffman roof damage repairs land between $450 and $2,500, depending on the size of the damaged area, shingle type, and whether decking needs replacing. Minor leak or flashing fixes sit at the low end; storm and multi-slope repairs run higher. Triple G Roofing gives you a written, itemized estimate before any work begins.',
    ],
    [
        'q' => 'What happens if the decking under my shingles is rotted?',
        'a' => 'Rotted decking has to come out — new shingles nailed over soft wood will not hold and the leak returns. Triple G Roofing removes the compromised plywood, inspects the framing beneath, installs fresh decking rated to North Harris County code, then re-felts and re-shingles so the repaired section is as strong as new construction.',
    ],
    [
        'q' => 'How long does a roof damage repair take?',
        'a' => 'Most Huffman roof damage repairs are completed in a single day. Larger multi-slope repairs or jobs that need extensive decking replacement can run one to two days. Triple G Roofing gives you a clear timeline with your estimate and works to keep your home dry and protected from the first hour on site.',
    ],
    [
        'q' => 'Does homeowners insurance cover roof damage repair?',
        'a' => 'If the damage came from a covered event like hail or windstorm, your policy usually covers the repair minus your deductible. Triple G Roofing documents the damage the way adjusters need, meets your inspector on site, and coordinates directly with your insurer so you are not left navigating the claim alone.',
    ],
    [
        'q' => 'Do you warranty roof damage repairs?',
        'a' => 'Yes. Triple G Roofing backs every roof damage repair in Huffman with a 10-year workmanship warranty on top of the manufacturer coverage that protects the materials. If a repaired section fails because of how we installed it, we come back and make it right — that promise is why local homeowners keep calling us.',
    ],
];

/* --- Related services (3 cards) --- */
$relatedServices = [
    [
        'name' => 'Roof Inspection', 'slug' => 'roof-inspection', 'img' => 'roof-inspection',
        'alt' => 'Close-up roof shingle inspection on a Huffman, TX home',
        'desc' => 'Documented inspections that catch damage early and back up insurance claims.',
        'bullets' => ['Same-day storm inspections', 'Photo-documented reports', 'Insurance claim–ready findings'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>',
    ],
    [
        'name' => 'Roof Repair', 'slug' => 'roof-repair', 'img' => 'roof-repair',
        'alt' => 'Roof decking exposed during a repair on a brick Huffman home',
        'desc' => 'Leak, shingle, and flashing repairs that stop water damage fast.',
        'bullets' => ['Leaks stopped at the source', 'Shingle & flashing replacement', 'Most repairs within 48 hours'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z"/></svg>',
    ],
    [
        'name' => 'Storm & Wind Damage Roof Repair', 'slug' => 'storm-damage-repair', 'img' => 'storm-damage-repair',
        'alt' => 'Storm-damaged tree fallen against a Huffman home needing roof repair',
        'desc' => 'Emergency hail, wind, and storm response with direct claims coordination.',
        'bullets' => ['Emergency tarping & response', 'Hail & wind damage experts', 'We bill your insurer directly'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
    ],
];

/* --- Schema: Service + FAQPage + BreadcrumbList --- */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type"    => "Service",
    "@id"      => $canonicalUrl . '#service-' . $serviceSlug,
    "serviceType" => $serviceName,
    "name"     => $serviceName . ' in ' . $address['city'] . ', ' . $address['state'],
    "description" => 'Full roof damage repair in Huffman, TX — hail, wind, leak, flashing, and rotted-decking repairs backed by a 10-year workmanship warranty across North Harris County.',
    "provider" => ["@id" => $siteUrl . '#organization'],
    "areaServed" => array_map(function ($a) use ($address) {
        return ["@type" => "City", "name" => $a . ', ' . $address['state']];
    }, $serviceAreas),
    "url" => $canonicalUrl,
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

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Roof Damage Repair — page-specific styles (Premium tier)
   Tokens only (var()); the damage-type bento (rd-types) is the
   signature section and is unique to this page.
   ============================================================ */
:root {
  --svc-accent: var(--color-primary);
  --svc-accent-soft: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --svc-grad-angle: 110deg;
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --color-card-tint-neutral: var(--color-white);
}
.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
[data-animate].reveal-delay-1 { transition-delay:.06s; }
[data-animate].reveal-delay-2 { transition-delay:.14s; }
[data-animate].reveal-delay-3 { transition-delay:.22s; }
.rd-page h2 { text-wrap:balance; }

/* ---- Breadcrumb ---- */
.rd-breadcrumb { background:var(--color-light); border-bottom:1px solid var(--color-gray-light); }
.rd-breadcrumb ol { list-style:none; display:flex; flex-wrap:wrap; gap:var(--space-2); align-items:center; padding:var(--space-3) 0; margin:0; font-size:var(--font-size-sm); color:var(--color-gray); }
.rd-breadcrumb a { color:var(--color-gray-dark); }
.rd-breadcrumb a:hover { color:var(--svc-accent); }
.rd-breadcrumb [aria-current] { color:var(--svc-accent); font-weight:600; }
.rd-breadcrumb-sep { color:var(--color-gray-light); }

/* =====================================================
   1 · HERO — layered photo + gradient overlay + noise
   ===================================================== */
.rd-hero { position:relative; min-height:60vh; display:flex; align-items:center; padding:104px 0 var(--space-16); overflow:hidden; }
.rd-hero__bg { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
.rd-hero::before { content:''; position:absolute; inset:0; z-index:1;
  background:linear-gradient(var(--svc-grad-angle), rgba(var(--color-secondary-rgb),.95) 0%, rgba(var(--color-secondary-rgb),.83) 46%, rgba(var(--color-secondary-rgb),.58) 100%); }
.rd-hero::after { content:''; position:absolute; inset:0; z-index:1; pointer-events:none; opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.rd-hero__inner { position:relative; z-index:2; max-width:840px; }
.rd-hero__eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-sm); font-weight:600; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(255,255,255,.16); padding:var(--space-2) var(--space-4); border-radius:var(--radius-full); margin-bottom:var(--space-5); }
.rd-hero__eyebrow svg { width:16px; height:16px; }
.rd-hero h1 { color:var(--color-white); font-size:clamp(2.3rem,5vw,3.9rem); line-height:1.04; margin-bottom:var(--space-5); }
.rd-hero h1 .text-accent { font-size:1.06em; }
.hero-answer { color:rgba(255,255,255,.9); font-size:var(--font-size-lg); line-height:1.7; max-width:60ch; margin-bottom:var(--space-6); }
.rd-hero__actions { display:flex; flex-wrap:wrap; gap:var(--space-4); margin-bottom:var(--space-8); }
.rd-hero__actions .btn svg { width:18px; height:18px; }
.rd-hero__trust { display:flex; flex-wrap:wrap; gap:var(--space-3) var(--space-6); }
.rd-hero__trust-item { display:flex; align-items:center; gap:var(--space-2); color:rgba(255,255,255,.92); font-size:var(--font-size-sm); font-weight:500; position:relative; }
.rd-hero__trust-item svg { width:18px; height:18px; color:var(--color-accent); flex-shrink:0; }
.rd-hero__trust-item + .rd-hero__trust-item::before { content:''; position:absolute; left:calc(-1 * var(--space-3)); top:50%; width:1px; height:16px; transform:translateY(-50%); background:rgba(255,255,255,.22); }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background:var(--svc-accent-soft); border-left:4px solid var(--svc-accent); border-radius:var(--radius-md); padding:var(--space-5) var(--space-6); color:var(--color-gray-dark); line-height:1.7; font-size:var(--font-size-lg); max-width:72ch; margin:0 auto; }
.section-header .answer-block { margin-top:var(--space-4); text-align:left; }

/* =====================================================
   2 · PROBLEM — pull-quote + telltale-sign bento
   ===================================================== */
.rd-problem { background:var(--color-white); }
.rd-pullquote { font-family:var(--font-heading); font-weight:800; font-size:clamp(1.6rem,3.4vw,2.5rem); line-height:1.25; color:var(--color-dark); max-width:22ch; margin:var(--space-8) 0 var(--space-4); }
.rd-pullquote span { color:var(--svc-accent); }
.signs-bento { display:grid; grid-template-columns:repeat(4,1fr); gap:var(--space-5); margin-top:var(--space-10); }
.sign-card { background:var(--color-light); border:1px solid var(--color-gray-light); border-radius:var(--radius-lg); padding:var(--space-6); position:relative; overflow:hidden; transition:transform var(--transition-base), box-shadow var(--transition-base); }
.sign-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.sign-card:first-child { grid-column:span 2; background:linear-gradient(135deg, var(--svc-accent-soft), var(--color-white)); }
.sign-card::after { content:''; position:absolute; left:0; top:0; width:4px; height:0; background:var(--svc-accent); transition:height var(--transition-base); }
.sign-card:hover::after { height:100%; }
.sign-card__ico { width:48px; height:48px; border-radius:var(--radius-md); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-4); }
.sign-card__ico svg { width:24px; height:24px; }
.sign-card h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.sign-card p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   3 · EXPERT POSITIONING — asymmetric stat + copy + photo
   ===================================================== */
.rd-expert { background:var(--color-secondary); position:relative; overflow:hidden; }
.rd-expert::before { content:''; position:absolute; inset:0; pointer-events:none;
  background:radial-gradient(ellipse at 85% 0%, rgba(var(--color-primary-rgb),.22) 0%, transparent 60%); }
.rd-expert .container { position:relative; z-index:1; }
.expert-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-16); align-items:center; }
.expert-copy .eyebrow { display:inline-block; font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-3); }
.expert-copy h2 { color:var(--color-white); margin-bottom:var(--space-4); }
.expert-copy .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.9); margin:0 0 var(--space-6); }
.expert-stats { display:flex; gap:var(--space-8); margin:var(--space-6) 0; flex-wrap:wrap; }
.expert-stat { position:relative; padding-bottom:var(--space-3); }
.expert-stat::after { content:''; position:absolute; left:0; bottom:0; width:32px; height:3px; border-radius:var(--radius-full); background:var(--color-accent); }
.expert-stat .num { font-family:var(--font-heading); font-weight:800; font-size:clamp(2.4rem,5vw,3.25rem); line-height:1; color:var(--color-accent); }
.expert-stat .lbl { font-size:var(--font-size-sm); color:rgba(255,255,255,.75); margin-top:var(--space-2); text-transform:uppercase; letter-spacing:1px; }
.expert-diffs { list-style:none; margin:var(--space-6) 0 0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.expert-diffs li { display:flex; gap:var(--space-3); color:rgba(255,255,255,.88); font-size:var(--font-size-base); line-height:1.55; }
.expert-diffs svg { width:22px; height:22px; color:var(--color-accent); flex-shrink:0; margin-top:2px; }
.expert-figure { position:relative; }
.expert-figure img { width:100%; border-radius:var(--radius-lg); box-shadow:var(--shadow-xl); object-fit:cover; transition:transform var(--transition-slow); }
.expert-figure:hover img { transform:scale(1.03); }
.expert-figure::after { content:''; position:absolute; inset:0; border-radius:var(--radius-lg); background:linear-gradient(to top, rgba(var(--color-secondary-rgb),.4) 0%, transparent 55%); pointer-events:none; }

/* =====================================================
   4 · SIGNATURE — damage-type icon bento (UNIQUE)
   A staggered, differently-sized icon grid that appears
   nowhere else on the site.
   ===================================================== */
.rd-types { background:var(--color-white); position:relative; overflow:hidden; }
.rd-types__float { position:absolute; bottom:-60px; left:-40px; width:240px; height:240px; border-radius:50%; background:radial-gradient(circle, rgba(var(--color-accent-rgb),.10), transparent 70%); pointer-events:none; }
.types-bento { display:grid; grid-template-columns:repeat(6,1fr); grid-auto-rows:1fr; gap:var(--space-5); margin-top:var(--space-12); }
.type-tile { grid-column:span 2; position:relative; display:flex; flex-direction:column; gap:var(--space-3); padding:var(--space-7); border-radius:var(--radius-lg); background:var(--color-light); border:1px solid var(--color-gray-light); overflow:hidden; transition:transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base); }
.type-tile:hover { transform:translateY(-5px); box-shadow:var(--shadow-lg); border-color:color-mix(in srgb, var(--svc-accent) 35%, var(--color-gray-light)); }
.type-tile:nth-child(1), .type-tile:nth-child(4) { grid-column:span 3; background:linear-gradient(150deg, var(--svc-accent-soft), var(--color-white)); }
.type-tile::before { content:''; position:absolute; top:0; right:0; width:96px; height:96px; border-radius:50%; transform:translate(38%,-38%); background:radial-gradient(circle, rgba(var(--color-primary-rgb),.12), transparent 70%); pointer-events:none; }
.type-tile__ico { width:54px; height:54px; border-radius:var(--radius-md); display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); box-shadow:var(--shadow-md); }
.type-tile__ico svg { width:26px; height:26px; }
.type-tile h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin:0; }
.type-tile p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; margin:0; }

/* =====================================================
   5 · PROCESS TIMELINE
   ===================================================== */
.rd-process { background:var(--color-light); }
.timeline { max-width:820px; margin:var(--space-12) auto 0; position:relative; }
.timeline::before { content:''; position:absolute; left:23px; top:8px; bottom:8px; width:2px; background:linear-gradient(to bottom, var(--svc-accent), var(--color-accent)); }
.timeline-step { position:relative; padding:0 0 var(--space-8) var(--space-16); }
.timeline-step:last-child { padding-bottom:0; }
.timeline-step__num { position:absolute; left:0; top:0; width:48px; height:48px; border-radius:var(--radius-full); background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); font-family:var(--font-heading); font-weight:800; display:flex; align-items:center; justify-content:center; box-shadow:var(--shadow-md); z-index:1; transition:transform var(--transition-base), box-shadow var(--transition-base); }
.timeline-step:hover .timeline-step__num { transform:scale(1.08); box-shadow:var(--shadow-lg); }
.timeline-step h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-1); }
.timeline-step p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   6 · PROOF — reviews + project photos
   ===================================================== */
.rd-proof { background:var(--color-dark); position:relative; overflow:hidden; }
.rd-proof::before { content:''; position:absolute; inset:0; pointer-events:none; background:radial-gradient(ellipse at 15% 100%, rgba(var(--color-primary-rgb),.2) 0%, transparent 60%); }
.rd-proof .container { position:relative; z-index:1; }
.rd-proof .section-header h2 { color:var(--color-white); }
.rd-proof .section-header .eyebrow { color:var(--color-accent); }
.rd-proof .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.88); }
.proof-photos { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); margin-top:var(--space-10); }
.proof-photos figure { margin:0; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl); position:relative; }
.proof-photos img { width:100%; height:100%; object-fit:cover; aspect-ratio:4/3; transition:transform var(--transition-slow); }
.proof-photos figure:hover img { transform:scale(1.05); }
.reviews-embed { margin-top:var(--space-8); min-height:100px; }
.proof-badges { display:flex; flex-wrap:wrap; gap:var(--space-4); justify-content:center; margin-top:var(--space-8); }
.proof-badges a { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); color:var(--color-white); font-size:var(--font-size-sm); font-weight:600; padding:var(--space-3) var(--space-5); border-radius:var(--radius-full); transition:background var(--transition-fast), border-color var(--transition-fast); }
.proof-badges a:hover { background:rgba(var(--color-primary-rgb),.2); border-color:var(--svc-accent); color:var(--color-white); }
.proof-badges svg { width:18px; height:18px; color:var(--color-star); }

/* =====================================================
   7 · COMPARISON — repair vs replace
   ===================================================== */
.rd-compare { background:var(--color-white); }
.compare-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-8); margin-top:var(--space-12); }
.compare-col { border-radius:var(--radius-lg); padding:var(--space-8); border:1px solid var(--color-gray-light); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.compare-col--them { background:var(--color-light); }
.compare-col--us { background:linear-gradient(160deg, var(--svc-accent-soft), var(--color-white)); border-color:color-mix(in srgb, var(--svc-accent) 30%, #fff); box-shadow:var(--shadow-lg); }
.compare-col--us:hover { transform:translateY(-4px); box-shadow:var(--shadow-xl); }
.compare-col h3 { font-size:var(--font-size-xl); margin-bottom:var(--space-5); display:flex; align-items:center; gap:var(--space-3); }
.compare-col--them h3 { color:var(--color-dark); }
.compare-col--us h3 { color:var(--svc-accent); }
.compare-col > p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0 0 var(--space-5); }
.compare-col ul { list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.compare-col li { display:flex; gap:var(--space-3); font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; }
.compare-col li svg { width:20px; height:20px; flex-shrink:0; margin-top:2px; }
.compare-col--them li svg { color:var(--color-gray); }
.compare-col--us li svg { color:var(--color-success); }

/* =====================================================
   8 · FAQ
   ===================================================== */
.rd-faq { background:var(--color-light); }
.faq-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); align-items:start; margin-top:var(--space-10); }
.faq-item { background:var(--color-white); border-radius:var(--radius-lg); border:1px solid var(--color-gray-light); overflow:hidden; transition:box-shadow var(--transition-base), border-color var(--transition-base); }
.faq-item[open] { box-shadow:var(--shadow-md); }
.faq-item:not([open]):hover { box-shadow:var(--shadow-sm); border-color:color-mix(in srgb, var(--svc-accent) 30%, var(--color-gray-light)); }
.faq-item:not([open]):hover summary { color:var(--svc-accent); }
.faq-item summary { list-style:none; cursor:pointer; display:flex; align-items:center; gap:var(--space-3); padding:var(--space-5) var(--space-6); font-family:var(--font-heading); font-weight:600; font-size:var(--font-size-base); color:var(--color-dark); }
.faq-item summary::-webkit-details-marker { display:none; }
.faq-icon { flex-shrink:0; width:32px; height:32px; border-radius:var(--radius-full); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; transition:transform var(--transition-base); }
.faq-icon svg { width:18px; height:18px; }
.faq-item[open] .faq-icon { transform:rotate(45deg); }
.faq-answer { padding:0 var(--space-6) var(--space-6) calc(var(--space-6) + var(--space-8)); }
.faq-answer p { color:var(--color-gray-dark); font-size:var(--font-size-sm); margin:0; line-height:1.7; }

/* =====================================================
   RELATED SERVICES (required-components cards)
   ===================================================== */
.rd-related { background:var(--color-white); }
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
.service-card__icon { width:60px; height:60px; border-radius:var(--radius-full); background:var(--color-white); box-shadow:var(--shadow-md); display:flex; align-items:center; justify-content:center; margin-top:calc(-1 * var(--space-10)); margin-bottom:var(--space-1); color:var(--svc-accent); position:relative; z-index:1; border:3px solid var(--color-white); }
.service-card__icon svg { width:26px; height:26px; }
.service-card-with-image h3 { color:var(--color-dark); font-size:var(--font-size-xl); margin:0; }
.service-card__desc { color:var(--color-gray-dark); font-size:var(--font-size-sm); margin:0; line-height:1.55; }
.service-card-with-image ul { list-style:none; padding:var(--space-4) 0 0; margin:var(--space-2) 0 0; width:100%; text-align:left; display:flex; flex-direction:column; gap:var(--space-2); border-top:1px solid rgba(var(--color-secondary-rgb),.08); }
.service-card-with-image ul li { font-size:var(--font-size-sm); color:var(--color-gray-dark); padding-left:var(--space-6); position:relative; }
.service-card-with-image ul li::before { content:"✓"; color:var(--svc-accent); font-weight:700; position:absolute; left:0; top:0; }
.service-card__cta { margin-top:var(--space-4); padding-top:var(--space-4); width:100%; color:var(--svc-accent); font-family:var(--font-heading); font-weight:600; font-size:var(--font-size-sm); border-top:1px solid rgba(var(--color-secondary-rgb),.08); transition:color var(--transition-base); }
.service-card__cta::after { content:" →"; display:inline-block; transition:transform var(--transition-base); }
.service-card__cta:hover { color:var(--color-accent); }
.service-card__cta:hover::after { transform:translateX(4px); }

/* =====================================================
   FINAL CTA
   ===================================================== */
.rd-cta { position:relative; overflow:hidden; text-align:center; padding:var(--space-16) 0;
  background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 82%, #000) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.rd-cta::before { content:''; position:absolute; inset:0; pointer-events:none; opacity:.06;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.rd-cta .container { position:relative; z-index:1; }
.rd-cta h2 { color:var(--color-white); font-size:clamp(1.9rem,4vw,2.75rem); margin-bottom:var(--space-4); }
.rd-cta p { color:rgba(255,255,255,.92); max-width:60ch; margin:0 auto var(--space-8); font-size:var(--font-size-lg); }
.rd-cta__actions { display:flex; gap:var(--space-4); justify-content:center; flex-wrap:wrap; }
.rd-cta .btn svg { width:18px; height:18px; }
.rd-cta .phone-line { margin-top:var(--space-6); color:rgba(255,255,255,.82); }
.rd-cta .phone-line a { color:var(--color-accent); font-weight:700; }

/* ---- SVG dividers ---- */
.svg-divider { display:block; overflow:hidden; line-height:0; }
.svg-divider svg { display:block; width:100%; height:100%; }
.svg-divider--diagonal { height:60px; }
.svg-divider--wave { height:72px; }

/* ---- Focus visibility (WCAG AA) ---- */
.rd-hero a:focus-visible, .service-card__cta:focus-visible, .rd-cta a:focus-visible, .proof-badges a:focus-visible, .faq-item summary:focus-visible, .type-tile:focus-within, .sign-card:focus-within { outline:3px solid var(--color-accent); outline-offset:2px; border-radius:var(--radius-sm); }
::selection { background:rgba(var(--color-primary-rgb),.85); color:var(--color-white); }

/* ---- Multi-directional reveals ---- */
[data-animate].rd-rv-left { transform:translateX(-36px); }
[data-animate].rd-rv-right { transform:translateX(36px); }
[data-animate].rd-rv-down { transform:translateY(-30px); }
[data-animate].rd-rv-scale { transform:scale(0.93); }
[data-animate].rd-rv-left.animated,
[data-animate].rd-rv-right.animated,
[data-animate].rd-rv-down.animated,
[data-animate].rd-rv-scale.animated { transform:none; }

/* ---- Hero eyebrow pulse ---- */
.rd-hero__eyebrow svg { animation:rd-pulse 2.6s ease-in-out infinite; }
@keyframes rd-pulse { 0%,100% { opacity:1; } 50% { opacity:.55; } }

@media (prefers-reduced-motion: reduce) {
  .rd-hero__eyebrow svg { animation:none; }
  .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img,
  .sign-card:hover, .type-tile:hover, .timeline-step:hover .timeline-step__num,
  .compare-col--us:hover, .expert-figure:hover img, .proof-photos figure:hover img { transform:none; }
  [data-animate].rd-rv-left, [data-animate].rd-rv-right,
  [data-animate].rd-rv-down, [data-animate].rd-rv-scale { transform:none; }
}
@media (max-width:1024px) {
  .expert-grid { grid-template-columns:1fr; gap:var(--space-10); }
  .signs-bento { grid-template-columns:1fr 1fr; }
  .sign-card:first-child { grid-column:span 2; }
  .types-bento { grid-template-columns:repeat(4,1fr); }
  .type-tile { grid-column:span 2; }
  .type-tile:nth-child(1), .type-tile:nth-child(4) { grid-column:span 2; }
  .services-grid { grid-template-columns:repeat(2,1fr); }
}
@media (max-width:900px) {
  .expert-stats { gap:var(--space-6); }
  .rd-pullquote { max-width:none; }
}
@media (max-width:768px) {
  .compare-grid { grid-template-columns:1fr; }
  .faq-grid { grid-template-columns:1fr; }
  .section-header { margin-bottom:var(--space-8); }
  .timeline::before { left:19px; }
  .timeline-step { padding-left:var(--space-12); }
  .timeline-step__num { width:40px; height:40px; }
}
@media (max-width:600px) {
  .signs-bento { grid-template-columns:1fr; }
  .sign-card:first-child { grid-column:auto; }
  .types-bento { grid-template-columns:1fr; }
  .type-tile, .type-tile:nth-child(1), .type-tile:nth-child(4) { grid-column:auto; }
  .proof-photos { grid-template-columns:1fr; }
  .services-grid { grid-template-columns:1fr; }
  .rd-hero h1 { font-size:clamp(2rem,8vw,2.6rem); }
}
@media (max-width:480px) {
  .rd-hero__actions .btn, .rd-cta__actions .btn { width:100%; justify-content:center; }
  .compare-col { padding:var(--space-6); }
  .proof-badges a { width:100%; justify-content:center; }
}
@media print {
  .rd-hero, .rd-cta, .rd-expert, .rd-proof { background:none !important; color:var(--color-dark) !important; }
  .rd-hero__bg, .rd-types__float, .svg-divider { display:none !important; }
  .rd-hero h1, .hero-answer, .expert-copy h2, .rd-proof .section-header h2 { color:var(--color-dark) !important; }
  .faq-item, .sign-card, .type-tile { break-inside:avoid; }
  [data-animate] { opacity:1 !important; transform:none !important; }
}
</style>

<div class="rd-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="rd-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="rd-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="rd-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Roof Damage Repair</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="rd-hero" aria-label="Roof damage repair in Huffman, TX">
  <img class="rd-hero__bg"
       src="/assets/images/roof-damage-repair.jpg"
       srcset="/assets/images/roof-damage-repair-480.webp 480w, /assets/images/roof-damage-repair-960.webp 960w, /assets/images/roof-damage-repair-1600.webp 1600w"
       sizes="100vw"
       alt="Triple G Roofing crew repairing storm-damaged shingles on a Huffman, TX home"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container rd-hero__inner">
    <span class="rd-hero__eyebrow"><?php echo icon('hammer', 16); ?> Roof Damage Repair · Huffman, TX</span>
    <h1>Roof Damage Repair in <span class="text-accent">Huffman</span>, TX</h1>
    <p class="hero-answer">
      Triple G Roofing is a licensed, insured Texas roofing contractor based in Huffman serving North Harris County.
      We repair hail bruising, wind-torn shingles, leaks, failed flashing, and rotted decking — then back the work
      with a 10-year workmanship warranty so your damaged roof is solid again, not just patched.
    </p>
    <div class="rd-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Repair Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="rd-hero__trust">
      <span class="rd-hero__trust-item"><?php echo icon('shield', 18); ?> Licensed &amp; insured</span>
      <span class="rd-hero__trust-item"><?php echo icon('award', 18); ?> 10-year workmanship warranty</span>
      <span class="rd-hero__trust-item"><?php echo icon('clock', 18); ?> Most repairs in one day</span>
      <span class="rd-hero__trust-item"><?php echo icon('check-circle', 18); ?> Insurance claims handled</span>
    </div>
  </div>
</section>

<!-- ===================== 2 · PROBLEM ===================== -->
<section class="section rd-problem" aria-label="Signs your roof is damaged">
  <div class="container">
    <div class="section-header" style="text-align:left; max-width:820px; margin-inline:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Spot The Damage</span>
      <h2>How do you know if your Huffman roof is damaged?</h2>
      <p class="answer-block">
        Look for interior water stains, missing or cracked shingles, a sagging or spongy roofline, and daylight or
        drafts in the attic. Any one of these means your Huffman roof has already been compromised. Triple G Roofing
        finds the source, documents it, and repairs it before the next Gulf Coast storm makes it worse.
      </p>
    </div>
    <p class="rd-pullquote">Roof damage in Huffman rarely announces itself — <span>it shows up as a ceiling stain months after the storm that caused it.</span></p>
    <div class="signs-bento">
      <div class="sign-card rd-rv-left" data-animate>
        <div class="sign-card__ico"><?php echo icon('droplets', 24); ?></div>
        <h3>Interior leaks &amp; water stains</h3>
        <p>Brown rings on ceilings or walls, damp insulation, or a musty smell mean water is already getting past your roof and into your Huffman home. The longer it sits, the more decking, drywall, and framing it ruins — which is exactly why a fast, documented repair costs far less than waiting.</p>
      </div>
      <div class="sign-card rd-rv-scale" data-animate>
        <div class="sign-card__ico"><?php echo icon('wind', 24); ?></div>
        <h3>Missing or cracked shingles</h3>
        <p>Bare spots, curled edges, and cracked tabs after a windstorm leave the felt and decking exposed.</p>
      </div>
      <div class="sign-card rd-rv-scale" data-animate>
        <div class="sign-card__ico"><?php echo icon('home', 24); ?></div>
        <h3>Sagging or soft decking</h3>
        <p>A dipping roofline or a spongy feel underfoot signals the wood beneath your shingles is rotting.</p>
      </div>
      <div class="sign-card rd-rv-right" data-animate>
        <div class="sign-card__ico"><?php echo icon('shield', 24); ?></div>
        <h3>Daylight or drafts in the attic</h3>
        <p>Light coming through the roof deck means gaps a repair should close before the next rain.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-secondary)" points="0,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== 3 · EXPERT POSITIONING ===================== -->
<section class="section rd-expert" aria-label="Why trust Triple G Roofing">
  <div class="container">
    <div class="expert-grid">
      <div class="expert-copy">
        <span class="eyebrow">The Triple G Standard</span>
        <h2>Why trust Triple G Roofing with roof damage repair?</h2>
        <p class="answer-block">
          Triple G Roofing repairs damaged roofs the right way — we trace the real source, replace rotted decking
          instead of hiding it, and match your existing shingles. Because owner Tim Menn&rsquo;s crew works Gulf Coast
          weather every week, we know how Huffman roofs fail and how to make a repair that actually lasts.
        </p>
        <div class="expert-stats">
          <div class="expert-stat"><div class="num">10&nbsp;yr</div><div class="lbl">Workmanship warranty</div></div>
          <div class="expert-stat"><div class="num">1&nbsp;day</div><div class="lbl">Most repairs finished</div></div>
          <div class="expert-stat"><div class="num">25&nbsp;mi</div><div class="lbl">Service radius</div></div>
        </div>
        <ul class="expert-diffs">
          <li><?php echo icon('check-circle', 22); ?> Rotted decking replaced, not shingled over and hidden</li>
          <li><?php echo icon('check-circle', 22); ?> Repairs built to North Harris County code and Gulf Coast wind</li>
          <li><?php echo icon('check-circle', 22); ?> The same local Huffman crew from estimate to final walkthrough</li>
        </ul>
      </div>
      <div class="expert-figure rd-rv-right" data-animate>
        <img src="/assets/images/roof-repair.jpg"
             srcset="/assets/images/roof-repair-480.webp 480w, /assets/images/roof-repair-960.webp 960w, /assets/images/roof-repair-1600.webp 1600w"
             sizes="(max-width: 1024px) 100vw, 520px"
             alt="Triple G Roofing crew replacing damaged decking and shingles on a Huffman home"
             width="600" height="700" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE — DAMAGE TYPES BENTO ===================== -->
<section class="section rd-types" aria-label="Types of roof damage we repair">
  <span class="rd-types__float" aria-hidden="true"></span>
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">What We Fix</span>
      <h2>What types of roof damage does Triple G Roofing fix?</h2>
      <p class="answer-block">
        Triple G Roofing repairs the full range of roof damage Huffman homes take on: hail impact, wind-lifted
        shingles, fallen-limb strikes, water-rotted decking, failed flashing, and ordinary age and granule wear.
        Whatever the cause, we scope the real extent of it and repair back to a watertight, code-built roof.
      </p>
    </div>
    <div class="types-bento">
      <div class="type-tile rd-rv-up" data-animate>
        <div class="type-tile__ico"><?php echo icon('droplets', 26); ?></div>
        <h3>Hail impact &amp; bruising</h3>
        <p>Soft bruises and knocked-off granules from Gulf Coast hail that shorten shingle life and open leaks.</p>
      </div>
      <div class="type-tile rd-rv-scale" data-animate>
        <div class="type-tile__ico"><?php echo icon('wind', 26); ?></div>
        <h3>Wind-lifted &amp; torn shingles</h3>
        <p>Shingles creased, lifted, or blown off entirely by North Harris County windstorms.</p>
      </div>
      <div class="type-tile rd-rv-scale" data-animate>
        <div class="type-tile__ico"><?php echo icon('x', 26); ?></div>
        <h3>Fallen limb &amp; impact damage</h3>
        <p>Punctures and crushed sections from limbs and debris after a Huffman storm.</p>
      </div>
      <div class="type-tile rd-rv-up" data-animate>
        <div class="type-tile__ico"><?php echo icon('home', 26); ?></div>
        <h3>Rotted or water-damaged decking</h3>
        <p>Soft, spongy plywood beneath the shingles removed and rebuilt to code so the repair holds.</p>
      </div>
      <div class="type-tile rd-rv-scale" data-animate>
        <div class="type-tile__ico"><?php echo icon('wrench', 26); ?></div>
        <h3>Failed flashing &amp; leaks</h3>
        <p>Chimneys, valleys, and vents re-flashed and sealed — the spots where most Huffman leaks begin.</p>
      </div>
      <div class="type-tile rd-rv-scale" data-animate>
        <div class="type-tile__ico"><?php echo icon('clock', 26); ?></div>
        <h3>Age &amp; granule wear</h3>
        <p>Thinning, brittle shingles nearing end of life repaired or flagged before they fail outright.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-light);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,0 900,72 1200,36 L1200,72 L0,72 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 5 · PROCESS ===================== -->
<section class="section rd-process" aria-label="How a roof damage repair works">
  <div class="container">
    <div class="section-header" style="max-width:720px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Step By Step</span>
      <h2>What happens during a Triple G Roofing roof damage repair?</h2>
      <p class="answer-block">
        Triple G Roofing follows the same four steps on every Huffman repair: we inspect and document the damage,
        scope it into a written estimate, replace the decking and shingles that failed, then walk the finished roof
        with you. No guesswork, no surprise charges — just a repair you can see and understand.
      </p>
    </div>
    <div class="timeline">
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">1</div>
        <h3>Inspect &amp; document</h3>
        <p>We climb the roof, photograph every damaged area, and trace each leak to its true source — not just where the stain appears inside.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">2</div>
        <h3>Scope &amp; estimate</h3>
        <p>You get a clear, itemized written estimate covering materials, decking, and labor — and, for storm damage, claim-ready documentation for your insurer.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">3</div>
        <h3>Repair decking &amp; shingles</h3>
        <p>We remove rotted decking, rebuild it to North Harris County code, then re-felt and re-shingle to match your existing roof.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">4</div>
        <h3>Final walkthrough</h3>
        <p>We clean up every nail, walk the repaired roof with you, and hand over your 10-year workmanship warranty in writing.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROOF ===================== -->
<section class="section rd-proof" aria-label="Reviews and recent work">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Trusted Locally</span>
      <h2>What do Huffman homeowners say about our damage repairs?</h2>
      <p class="answer-block">
        Triple G Roofing has earned its reputation across Huffman, Humble, Atascocita, Kingwood, and Crosby the
        old-fashioned way — by finding the real damage, fixing it once, and standing behind it. Read our verified
        Google reviews below and see recent repairs from around North Harris County.
      </p>
    </div>

    <div class="proof-photos" data-animate>
      <figure>
        <img src="/assets/images/storm-damage-repair.jpg"
             srcset="/assets/images/storm-damage-repair-480.webp 480w, /assets/images/storm-damage-repair-960.webp 960w, /assets/images/storm-damage-repair-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Storm and wind roof damage repaired by Triple G Roofing on a Huffman home"
             width="600" height="450" loading="lazy">
      </figure>
      <figure>
        <img src="/assets/images/hero-roof-home.jpg"
             srcset="/assets/images/hero-roof-home-480.webp 480w, /assets/images/hero-roof-home-960.webp 960w, /assets/images/hero-roof-home-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Completed architectural shingle roof after a Triple G Roofing damage repair in Huffman, TX"
             width="600" height="450" loading="lazy">
      </figure>
    </div>

    <div class="reviews-embed">
      <?php echo $elfsightEmbed; ?>
    </div>

    <div class="proof-badges" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- ===================== 7 · COMPARISON ===================== -->
<section class="section rd-compare" aria-label="Repair the damage or replace the whole roof">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Honest Guidance</span>
      <h2>Should you repair the damage or replace the whole roof?</h2>
      <p class="answer-block">
        A targeted repair is the right call when damage is localized and your shingles have life left; a full
        replacement wins when damage is widespread, decking rot has spread, or the roof is near end-of-life. Triple G
        Roofing tells you honestly which one your Huffman home actually needs — even when repair is the cheaper answer.
      </p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--us">
        <h3><?php echo icon('wrench', 22); ?> Targeted repair makes sense when&hellip;</h3>
        <p>Damage is confined and the rest of the roof is sound. We fix what failed and leave the good roof alone.</p>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> Damage covers one slope or under about 25&ndash;30% of the roof</li>
          <li><?php echo icon('check-circle', 20); ?> Shingles still have years of service life remaining</li>
          <li><?php echo icon('check-circle', 20); ?> Leaks trace to flashing, a few shingles, or a single section</li>
          <li><?php echo icon('check-circle', 20); ?> You want the lowest sound fix, not a full tear-off</li>
        </ul>
      </div>
      <div class="compare-col compare-col--them">
        <h3><?php echo icon('home', 22); ?> Full replacement is smarter when&hellip;</h3>
        <p>The damage is everywhere or the roof is aging out. Repairing it piece by piece just delays the inevitable.</p>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> Damage spans multiple slopes or most of the roof</li>
          <li><?php echo icon('check-circle', 20); ?> Decking rot has spread beyond a contained area</li>
          <li><?php echo icon('check-circle', 20); ?> Shingles are brittle, curling, and near end-of-life</li>
          <li><?php echo icon('check-circle', 20); ?> A covered claim makes replacement the better value</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,72 900,0 1200,36 L1200,72 L0,72 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section rd-faq" aria-label="Roof damage repair FAQs">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Good Questions</span>
      <h2>What else do Huffman homeowners ask about roof damage repair?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on cost, timelines, rotted decking, insurance, and warranty — before you schedule your roof damage repair near me in Huffman.</p>
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

<!-- ===================== FINAL CTA ===================== -->
<section class="rd-cta" aria-label="Get a free roof damage repair estimate">
  <div class="container">
    <h2>Ready to get your damaged Huffman roof repaired right?</h2>
    <p>Whether it&rsquo;s a fresh storm hit or wear you&rsquo;ve watched for months, Triple G Roofing will find the real
      damage, give you an honest estimate, and repair it to last — backed by our 10-year workmanship warranty.</p>
    <div class="rd-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get My Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <p class="phone-line">Prefer to talk? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — 8am to 8pm, 7 days a week.</p>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section rd-related" aria-label="Other roofing services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Keep Exploring</span>
      <h2>What other roofing services might your Huffman home need?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">From the first inspection to full storm response, here&rsquo;s how Triple G Roofing keeps your Huffman roof sound.</p>
    </div>
    <div class="services-grid">
      <?php foreach ($relatedServices as $i => $s):
        $tint = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?>" data-animate>
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

</div><!-- /.rd-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
