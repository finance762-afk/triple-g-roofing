<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Service — Roof Repair · Triple G Roofing (Phase 4)
   Premium editorial service page (8-section structure)
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Roof Repair';
$serviceSlug     = 'roof-repair';
$pageTitle       = 'Roof Repair Huffman TX | Triple G Roofing';
$pageDescription = 'Fast, honest roof repair in Huffman, TX from Triple G Roofing. Leaks stopped at the source, most repairs within 48 hours, 10-year workmanship warranty. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';

/* --- FAQs specific to roof repair in Huffman --- */
$faqs = [
    [
        'q' => 'How much does a roof repair cost in Huffman, TX?',
        'a' => 'Most roof repairs in Huffman run between about $350 and $1,500, depending on the size of the damage, the roof pitch, and whether decking underneath is rotted. Triple G Roofing gives you a written, itemized price after we inspect — never a vague verbal number, and never a surprise bill once the work is done.',
    ],
    [
        'q' => 'How fast can you repair my roof — do you do emergency work?',
        'a' => 'Yes. Triple G Roofing completes most Huffman roof repairs within 48 hours of approval, and we offer same-day emergency tarping to stop active leaks before they soak your ceilings. After a storm rolls through North Harris County, we answer the phone 8am to 8pm, seven days a week.',
    ],
    [
        'q' => 'Should I repair my roof or just replace it?',
        'a' => 'If your Huffman roof is under 15 years old and the damage is limited to one area, a repair is usually the smarter spend. Once you have widespread leaks, sagging decking, or a roof past 20 years, replacement often costs less over time. Triple G Roofing gives you the honest call, not the expensive one.',
    ],
    [
        'q' => 'Does insurance cover roof repair in Texas?',
        'a' => 'Often, yes — when the damage comes from a covered event like hail or Gulf Coast wind. Triple G Roofing documents the damage with captioned photos, meets your adjuster on site, and communicates directly with your insurer, so the paperwork does not land on your kitchen table and valid Huffman claims do not get denied.',
    ],
    [
        'q' => 'Do you warranty your roof repairs?',
        'a' => 'Every Triple G Roofing repair carries a 10-year workmanship warranty on top of any manufacturer coverage on the materials. If a repair we made leaks because of how we did the work, we come back and fix it — a promise we can keep because the same local Huffman crew stands behind every job.',
    ],
    [
        'q' => 'Can you stop a leak during Texas storm season?',
        'a' => 'Absolutely. When it is too wet or dangerous for a permanent fix, Triple G Roofing installs a professional temporary tarp the same day to keep water out of your Huffman home. Once the weather clears, we return and complete the permanent repair — you are never left with a bucket under the ceiling.',
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
        'name' => 'Roof Damage Repair', 'slug' => 'roof-damage-repair', 'img' => 'roof-damage-repair',
        'alt' => 'Roof tear-off job with a loaded dumpster at a Huffman home',
        'desc' => 'Full assessment and repair for aging, worn, or compromised roofs.',
        'bullets' => ['Complete damage assessment', 'Rotted decking replaced', 'Built to North Harris County code'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9"/><path d="m18 15 4-4"/><path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"/></svg>',
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
    "description" => 'Fast, honest roof repair in Huffman, TX — leak repairs, shingle and flashing replacement, and same-day emergency tarping backed by a 10-year workmanship warranty.',
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
   Roof Repair — page-specific styles (Premium tier)
   Tokens only (var()); page accent + signature leak-source
   section are unique to this page.
   ============================================================ */
:root {
  --svc-accent: var(--color-primary);
  --svc-accent-soft: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --svc-grad-angle: 120deg;
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --color-card-tint-neutral: var(--color-white);
}
.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
[data-animate].reveal-delay-1 { transition-delay:.06s; }
[data-animate].reveal-delay-2 { transition-delay:.14s; }
[data-animate].reveal-delay-3 { transition-delay:.22s; }
.rr-page h2 { text-wrap:balance; }

/* ---- Breadcrumb ---- */
.rr-breadcrumb { background:var(--color-light); border-bottom:1px solid var(--color-gray-light); }
.rr-breadcrumb ol { list-style:none; display:flex; flex-wrap:wrap; gap:var(--space-2); align-items:center; padding:var(--space-3) 0; margin:0; font-size:var(--font-size-sm); color:var(--color-gray); }
.rr-breadcrumb a { color:var(--color-gray-dark); }
.rr-breadcrumb a:hover { color:var(--svc-accent); }
.rr-breadcrumb [aria-current] { color:var(--svc-accent); font-weight:600; }
.rr-breadcrumb-sep { color:var(--color-gray-light); }

/* =====================================================
   1 · HERO — layered photo + gradient overlay + noise
   ===================================================== */
.rr-hero { position:relative; min-height:60vh; display:flex; align-items:center; padding:104px 0 var(--space-16); overflow:hidden; }
.rr-hero__bg { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
.rr-hero::before { content:''; position:absolute; inset:0; z-index:1;
  background:linear-gradient(var(--svc-grad-angle), rgba(var(--color-secondary-rgb),.95) 0%, rgba(var(--color-secondary-rgb),.83) 46%, rgba(var(--color-secondary-rgb),.58) 100%); }
.rr-hero::after { content:''; position:absolute; inset:0; z-index:1; pointer-events:none; opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.rr-hero__inner { position:relative; z-index:2; max-width:840px; }
.rr-hero__eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-sm); font-weight:600; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(255,255,255,.16); padding:var(--space-2) var(--space-4); border-radius:var(--radius-full); margin-bottom:var(--space-5); }
.rr-hero__eyebrow svg { width:16px; height:16px; }
.rr-hero h1 { color:var(--color-white); font-size:clamp(2.3rem,5vw,3.9rem); line-height:1.04; margin-bottom:var(--space-5); }
.rr-hero h1 .text-accent { font-size:1.06em; }
.hero-answer { color:rgba(255,255,255,.9); font-size:var(--font-size-lg); line-height:1.7; max-width:60ch; margin-bottom:var(--space-6); }
.rr-hero__actions { display:flex; flex-wrap:wrap; gap:var(--space-4); margin-bottom:var(--space-8); }
.rr-hero__actions .btn svg { width:18px; height:18px; }
.rr-hero__trust { display:flex; flex-wrap:wrap; gap:var(--space-3) var(--space-6); }
.rr-hero__trust-item { display:flex; align-items:center; gap:var(--space-2); color:rgba(255,255,255,.92); font-size:var(--font-size-sm); font-weight:500; position:relative; }
.rr-hero__trust-item svg { width:18px; height:18px; color:var(--color-accent); flex-shrink:0; }
.rr-hero__trust-item + .rr-hero__trust-item::before { content:''; position:absolute; left:calc(-1 * var(--space-3)); top:50%; width:1px; height:16px; transform:translateY(-50%); background:rgba(255,255,255,.22); }
.rr-hero__eyebrow svg { animation:rr-pulse 2.6s ease-in-out infinite; }
@keyframes rr-pulse { 0%,100% { opacity:1; } 50% { opacity:.55; } }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background:var(--svc-accent-soft); border-left:4px solid var(--svc-accent); border-radius:var(--radius-md); padding:var(--space-5) var(--space-6); color:var(--color-gray-dark); line-height:1.7; font-size:var(--font-size-lg); max-width:72ch; margin:0 auto; }
.section-header .answer-block { margin-top:var(--space-4); text-align:left; }

/* =====================================================
   2 · PROBLEM — pull-quote + telltale-sign bento
   ===================================================== */
.rr-problem { background:var(--color-white); }
.rr-pullquote { font-family:var(--font-heading); font-weight:800; font-size:clamp(1.6rem,3.4vw,2.5rem); line-height:1.25; color:var(--color-dark); max-width:22ch; margin:var(--space-8) 0 var(--space-4); }
.rr-pullquote span { color:var(--svc-accent); }
.rr-signs { display:grid; grid-template-columns:repeat(4,1fr); gap:var(--space-5); margin-top:var(--space-10); }
.rr-sign { position:relative; overflow:hidden; background:var(--color-light); border:1px solid var(--color-gray-light); border-radius:var(--radius-lg); padding:var(--space-6); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.rr-sign:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.rr-sign:first-child { grid-column:span 2; background:linear-gradient(135deg, var(--svc-accent-soft), var(--color-white)); }
.rr-sign::after { content:''; position:absolute; left:0; top:0; width:4px; height:0; background:var(--svc-accent); transition:height var(--transition-base); }
.rr-sign:hover::after { height:100%; }
.rr-sign__ico { width:48px; height:48px; border-radius:var(--radius-md); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-4); }
.rr-sign__ico svg { width:24px; height:24px; }
.rr-sign h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.rr-sign p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   3 · EXPERT POSITIONING — asymmetric stat + copy + photo
   ===================================================== */
.rr-expert { background:var(--color-secondary); position:relative; overflow:hidden; }
.rr-expert::before { content:''; position:absolute; inset:0; pointer-events:none;
  background:radial-gradient(ellipse at 85% 0%, rgba(var(--color-primary-rgb),.22) 0%, transparent 60%); }
.rr-expert .container { position:relative; z-index:1; }
.rr-expert-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-16); align-items:center; }
.rr-expert-copy .eyebrow { display:inline-block; font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-3); }
.rr-expert-copy h2 { color:var(--color-white); margin-bottom:var(--space-4); }
.rr-expert-copy .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.9); margin:0 0 var(--space-6); }
.rr-expert-stats { display:flex; gap:var(--space-8); margin:var(--space-6) 0; flex-wrap:wrap; }
.rr-expert-stat { position:relative; padding-bottom:var(--space-3); }
.rr-expert-stat::after { content:''; position:absolute; left:0; bottom:0; width:32px; height:3px; border-radius:var(--radius-full); background:var(--color-accent); }
.rr-expert-stat .num { font-family:var(--font-heading); font-weight:800; font-size:clamp(2.4rem,5vw,3.25rem); line-height:1; color:var(--color-accent); }
.rr-expert-stat .lbl { font-size:var(--font-size-sm); color:rgba(255,255,255,.75); margin-top:var(--space-2); text-transform:uppercase; letter-spacing:1px; }
.rr-expert-diffs { list-style:none; margin:var(--space-6) 0 0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.rr-expert-diffs li { display:flex; gap:var(--space-3); color:rgba(255,255,255,.88); font-size:var(--font-size-base); line-height:1.55; }
.rr-expert-diffs svg { width:22px; height:22px; color:var(--color-accent); flex-shrink:0; margin-top:2px; }
.rr-expert-figure { position:relative; }
.rr-expert-figure img { width:100%; border-radius:var(--radius-lg); box-shadow:var(--shadow-xl); object-fit:cover; transition:transform var(--transition-slow); }
.rr-expert-figure:hover img { transform:scale(1.03); }
.rr-expert-figure::after { content:''; position:absolute; inset:0; border-radius:var(--radius-lg); background:linear-gradient(to top, rgba(var(--color-secondary-rgb),.4) 0%, transparent 55%); pointer-events:none; }

/* =====================================================
   4 · SIGNATURE — where Huffman leaks start (unique)
   Distinct treatment: dark diagnostic board with
   oversized index numerals and hairline connective grid.
   ===================================================== */
.rr-leaks { background:var(--color-dark); position:relative; overflow:hidden; }
.rr-leaks::before { content:''; position:absolute; inset:0; pointer-events:none;
  background:
    linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px),
    linear-gradient(0deg, rgba(255,255,255,.04) 1px, transparent 1px);
  background-size:64px 64px; mask-image:radial-gradient(ellipse at 50% 30%, rgba(var(--color-secondary-rgb),1) 0%, transparent 80%); }
.rr-leaks .container { position:relative; z-index:1; }
.rr-leaks .section-header h2 { color:var(--color-white); }
.rr-leaks .section-header .eyebrow { color:var(--color-accent); }
.rr-leaks .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.88); }
.rr-leaks-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-6); margin-top:var(--space-12); counter-reset:leak; }
.rr-leak { position:relative; padding:var(--space-8) var(--space-6) var(--space-6); background:rgba(255,255,255,.03); border:1px solid rgba(255,255,255,.1); border-radius:var(--radius-lg); overflow:hidden; transition:transform var(--transition-base), border-color var(--transition-base), background var(--transition-base); }
.rr-leak:hover { transform:translateY(-5px); border-color:color-mix(in srgb, var(--svc-accent) 55%, transparent); background:rgba(var(--color-primary-rgb),.08); }
.rr-leak::before { counter-increment:leak; content:counter(leak,decimal-leading-zero); position:absolute; top:calc(-1 * var(--space-4)); right:var(--space-3); font-family:var(--font-heading); font-weight:800; font-size:clamp(3.4rem,7vw,5rem); line-height:1; color:rgba(var(--color-primary-rgb),.18); pointer-events:none; }
.rr-leak__ico { width:44px; height:44px; border-radius:var(--radius-md); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(var(--color-primary-rgb),.4); color:var(--color-accent); display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-4); }
.rr-leak__ico svg { width:22px; height:22px; }
.rr-leak h3 { position:relative; z-index:1; font-size:var(--font-size-lg); color:var(--color-white); margin-bottom:var(--space-2); }
.rr-leak p { position:relative; z-index:1; font-size:var(--font-size-sm); color:rgba(255,255,255,.72); line-height:1.6; margin:0; }

/* =====================================================
   5 · PROCESS TIMELINE
   ===================================================== */
.rr-process { background:var(--color-light); }
.rr-timeline { max-width:820px; margin:var(--space-12) auto 0; position:relative; }
.rr-timeline::before { content:''; position:absolute; left:23px; top:8px; bottom:8px; width:2px; background:linear-gradient(to bottom, var(--svc-accent), var(--color-accent)); }
.rr-tl-step { position:relative; padding:0 0 var(--space-8) var(--space-16); }
.rr-tl-step:last-child { padding-bottom:0; }
.rr-tl-step__num { position:absolute; left:0; top:0; width:48px; height:48px; border-radius:var(--radius-full); background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); font-family:var(--font-heading); font-weight:800; display:flex; align-items:center; justify-content:center; box-shadow:var(--shadow-md); z-index:1; transition:transform var(--transition-base), box-shadow var(--transition-base); }
.rr-tl-step:hover .rr-tl-step__num { transform:scale(1.08); box-shadow:var(--shadow-lg); }
.rr-tl-step h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-1); }
.rr-tl-step p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   6 · PROOF — reviews + project photos
   ===================================================== */
.rr-proof { background:var(--color-dark); position:relative; overflow:hidden; }
.rr-proof::before { content:''; position:absolute; inset:0; pointer-events:none; background:radial-gradient(ellipse at 15% 100%, rgba(var(--color-primary-rgb),.2) 0%, transparent 60%); }
.rr-proof .container { position:relative; z-index:1; }
.rr-proof .section-header h2 { color:var(--color-white); }
.rr-proof .section-header .eyebrow { color:var(--color-accent); }
.rr-proof .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.88); }
.rr-proof-photos { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); margin-top:var(--space-10); }
.rr-proof-photos figure { position:relative; margin:0; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl); }
.rr-proof-photos img { width:100%; height:100%; object-fit:cover; aspect-ratio:4/3; transition:transform var(--transition-slow); }
.rr-proof-photos figure:hover img { transform:scale(1.05); }
.rr-reviews-embed { margin-top:var(--space-8); min-height:100px; }
.rr-proof-badges { display:flex; flex-wrap:wrap; gap:var(--space-4); justify-content:center; margin-top:var(--space-8); }
.rr-proof-badges a { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); color:var(--color-white); font-size:var(--font-size-sm); font-weight:600; padding:var(--space-3) var(--space-5); border-radius:var(--radius-full); transition:background var(--transition-fast), border-color var(--transition-fast); }
.rr-proof-badges a:hover { background:rgba(var(--color-primary-rgb),.2); border-color:var(--svc-accent); color:var(--color-white); }
.rr-proof-badges svg { width:18px; height:18px; color:var(--color-star); }

/* =====================================================
   7 · COMPARISON — two column vs
   ===================================================== */
.rr-compare { background:var(--color-white); }
.rr-compare-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-8); margin-top:var(--space-12); }
.rr-compare-col { border-radius:var(--radius-lg); padding:var(--space-8); border:1px solid var(--color-gray-light); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.rr-compare-col--them { background:var(--color-light); }
.rr-compare-col--us { background:linear-gradient(160deg, var(--svc-accent-soft), var(--color-white)); border-color:color-mix(in srgb, var(--svc-accent) 30%, #fff); box-shadow:var(--shadow-lg); }
.rr-compare-col--us:hover { transform:translateY(-4px); box-shadow:var(--shadow-xl); }
.rr-compare-col h3 { font-size:var(--font-size-xl); margin-bottom:var(--space-5); display:flex; align-items:center; gap:var(--space-3); }
.rr-compare-col--us h3 { color:var(--svc-accent); }
.rr-compare-col ul { list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.rr-compare-col li { display:flex; gap:var(--space-3); font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; }
.rr-compare-col li svg { width:20px; height:20px; flex-shrink:0; margin-top:2px; }
.rr-compare-col--them li svg { color:var(--color-gray); }
.rr-compare-col--us li svg { color:var(--color-success); }

/* =====================================================
   8 · FAQ
   ===================================================== */
.rr-faq { background:var(--color-light); }
.rr-faq-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); align-items:start; margin-top:var(--space-10); }
.faq-item { background:var(--color-white); border-radius:var(--radius-lg); border:1px solid var(--color-gray-light); overflow:hidden; transition:box-shadow var(--transition-base); }
.faq-item[open] { box-shadow:var(--shadow-md); }
.faq-item:not([open]):hover { box-shadow:var(--shadow-sm); border-color:color-mix(in srgb, var(--svc-accent) 30%, var(--color-gray-light)); }
.faq-item:not([open]):hover summary { color:var(--svc-accent); }
.faq-item summary { list-style:none; cursor:pointer; display:flex; align-items:center; gap:var(--space-3); padding:var(--space-5) var(--space-6); font-family:var(--font-heading); font-weight:600; font-size:var(--font-size-base); color:var(--color-dark); }
.faq-item summary::-webkit-details-marker { display:none; }
.rr-faq-icon { flex-shrink:0; width:32px; height:32px; border-radius:var(--radius-full); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; transition:transform var(--transition-base); }
.rr-faq-icon svg { width:18px; height:18px; }
.faq-item[open] .rr-faq-icon { transform:rotate(45deg); }
.faq-answer { padding:0 var(--space-6) var(--space-6) calc(var(--space-6) + var(--space-8)); }
.faq-answer p { color:var(--color-gray-dark); font-size:var(--font-size-sm); margin:0; line-height:1.7; }

/* =====================================================
   RELATED SERVICES (required-components cards)
   ===================================================== */
.rr-related { background:var(--color-white); }
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
.rr-cta { position:relative; overflow:hidden; text-align:center; padding:var(--space-16) 0;
  background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 82%, #000) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.rr-cta::before { content:''; position:absolute; inset:0; pointer-events:none; opacity:.06;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.rr-cta .container { position:relative; z-index:1; }
.rr-cta h2 { color:var(--color-white); font-size:clamp(1.9rem,4vw,2.75rem); margin-bottom:var(--space-4); }
.rr-cta p { color:rgba(255,255,255,.92); max-width:60ch; margin:0 auto var(--space-8); font-size:var(--font-size-lg); }
.rr-cta__actions { display:flex; gap:var(--space-4); justify-content:center; flex-wrap:wrap; }
.rr-cta .btn svg { width:18px; height:18px; }
.rr-cta .phone-line { margin-top:var(--space-6); color:rgba(255,255,255,.82); }
.rr-cta .phone-line a { color:var(--color-accent); font-weight:700; }

/* ---- SVG dividers ---- */
.svg-divider { display:block; overflow:hidden; line-height:0; }
.svg-divider svg { display:block; width:100%; height:100%; }
.svg-divider--diagonal { height:60px; }
.svg-divider--wave { height:72px; }

/* ---- Focus visibility (WCAG AA) ---- */
.rr-hero a:focus-visible, .service-card__cta:focus-visible, .rr-cta a:focus-visible, .rr-proof-badges a:focus-visible, .faq-item summary:focus-visible, .rr-sign:focus-within, .rr-leak:focus-within { outline:3px solid var(--color-accent); outline-offset:2px; border-radius:var(--radius-sm); }
::selection { background:rgba(var(--color-primary-rgb),.85); color:var(--color-white); }

@media (prefers-reduced-motion: reduce) {
  .rr-hero__eyebrow svg { animation:none; }
  .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img, .rr-sign:hover,
  .rr-leak:hover, .rr-tl-step:hover .rr-tl-step__num, .rr-compare-col--us:hover,
  .rr-expert-figure:hover img, .rr-proof-photos figure:hover img { transform:none; }
}
@media (max-width:1024px) {
  .rr-expert-grid { grid-template-columns:1fr; gap:var(--space-10); }
  .rr-signs { grid-template-columns:1fr 1fr; }
  .rr-sign:first-child { grid-column:span 2; }
  .rr-leaks-grid { grid-template-columns:1fr 1fr; }
  .services-grid { grid-template-columns:repeat(2,1fr); }
}
@media (max-width:900px) {
  .rr-expert-stats { gap:var(--space-6); }
  .rr-pullquote { max-width:none; }
}
@media (max-width:768px) {
  .rr-compare-grid { grid-template-columns:1fr; }
  .rr-faq-grid { grid-template-columns:1fr; }
  .section-header { margin-bottom:var(--space-8); }
  .rr-timeline::before { left:19px; }
  .rr-tl-step { padding-left:var(--space-12); }
  .rr-tl-step__num { width:40px; height:40px; }
}
@media (max-width:600px) {
  .rr-signs { grid-template-columns:1fr; }
  .rr-sign:first-child { grid-column:auto; }
  .rr-leaks-grid { grid-template-columns:1fr; }
  .rr-proof-photos { grid-template-columns:1fr; }
  .services-grid { grid-template-columns:1fr; }
  .rr-hero h1 { font-size:clamp(2rem,8vw,2.6rem); }
}
@media (max-width:480px) {
  .rr-hero__actions .btn, .rr-cta__actions .btn { width:100%; justify-content:center; }
  .rr-compare-col { padding:var(--space-6); }
  .rr-proof-badges a { width:100%; justify-content:center; }
}

/* ---- Multi-directional reveals ---- */
[data-animate].rr-rv-left { transform:translateX(-36px); }
[data-animate].rr-rv-right { transform:translateX(36px); }
[data-animate].rr-rv-down { transform:translateY(-30px); }
[data-animate].rr-rv-scale { transform:scale(0.93); }
[data-animate].rr-rv-left.animated, [data-animate].rr-rv-right.animated,
[data-animate].rr-rv-down.animated, [data-animate].rr-rv-scale.animated { transform:none; }
@media (prefers-reduced-motion: reduce) {
  [data-animate].rr-rv-left, [data-animate].rr-rv-right,
  [data-animate].rr-rv-down, [data-animate].rr-rv-scale { transform:none; }
}

/* ---- Print ---- */
@media print {
  .rr-hero, .rr-cta, .rr-expert, .rr-proof, .rr-leaks { background:none !important; color:var(--color-dark) !important; }
  .rr-hero__bg, .svg-divider { display:none !important; }
  .rr-hero h1, .hero-answer, .rr-expert-copy h2, .rr-proof .section-header h2, .rr-leaks .section-header h2 { color:var(--color-dark) !important; }
  .faq-item, .rr-sign, .rr-leak { break-inside:avoid; }
  [data-animate] { opacity:1 !important; transform:none !important; }
}
</style>

<div class="rr-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="rr-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="rr-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="rr-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Roof Repair</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="rr-hero" aria-label="Roof repair in Huffman, TX">
  <img class="rr-hero__bg"
       src="/assets/images/roof-repair.jpg"
       srcset="/assets/images/roof-repair-480.webp 480w, /assets/images/roof-repair-960.webp 960w, /assets/images/roof-repair-1600.webp 1600w"
       sizes="100vw"
       alt="Triple G Roofing crew repairing exposed decking on a Huffman, TX roof"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container rr-hero__inner">
    <span class="rr-hero__eyebrow"><?php echo icon('wrench', 16); ?> Roof Repair · Huffman, TX</span>
    <h1>Roof Repair in <span class="text-accent">Huffman</span>, TX</h1>
    <p class="hero-answer">
      Triple G Roofing is a licensed, insured Texas roofing contractor based in Huffman serving North Harris County.
      We stop leaks at the source, replace damaged shingles and flashing, and finish most Huffman roof repairs within
      48 hours — with same-day emergency tarping and a 10-year workmanship warranty behind every job.
    </p>
    <div class="rr-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Repair Quote</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="rr-hero__trust">
      <span class="rr-hero__trust-item"><?php echo icon('clock', 18); ?> Most repairs within 48 hours</span>
      <span class="rr-hero__trust-item"><?php echo icon('shield', 18); ?> Licensed &amp; insured</span>
      <span class="rr-hero__trust-item"><?php echo icon('award', 18); ?> 10-year workmanship warranty</span>
      <span class="rr-hero__trust-item"><?php echo icon('droplets', 18); ?> Same-day emergency tarping</span>
    </div>
  </div>
</section>

<!-- ===================== 2 · PROBLEM ===================== -->
<section class="section rr-problem" aria-label="Signs your roof needs repair">
  <div class="container">
    <div class="section-header" style="text-align:left; max-width:820px; margin-inline:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Catch It Early</span>
      <h2>What are the signs your Huffman roof needs repair?</h2>
      <p class="answer-block">
        Call for roof repair the moment you see water stains on a ceiling, shingles that are cracked, curled, or gone,
        grit collecting in your gutters, or daylight in the attic. Most Huffman roof damage hides until the next hard
        rain, so acting on these early warnings keeps a small fix from becoming a full replacement.
      </p>
    </div>
    <p class="rr-pullquote">A small leak in Huffman rarely stays small — <span>it just travels to somewhere you can&rsquo;t see it.</span></p>
    <div class="rr-signs">
      <div class="rr-sign rr-rv-left" data-animate>
        <div class="rr-sign__ico"><?php echo icon('droplets', 24); ?></div>
        <h3>Ceiling stains &amp; active drips</h3>
        <p>Brown rings, bubbling paint, or a drip during rain mean water is already past your shingles and into the home. This is the repair that cannot wait — every hour it spreads across drywall, insulation, and framing in your Huffman house.</p>
      </div>
      <div class="rr-sign rr-rv-scale" data-animate>
        <div class="rr-sign__ico"><?php echo icon('wind', 24); ?></div>
        <h3>Missing or lifted shingles</h3>
        <p>Gulf Coast wind peels shingles back and tears them off, leaving the underlayment exposed to the next storm.</p>
      </div>
      <div class="rr-sign rr-rv-scale" data-animate>
        <div class="rr-sign__ico"><?php echo icon('droplets', 24); ?></div>
        <h3>Granules in the gutters</h3>
        <p>Sandy grit washing out of downspouts is a sign your Huffman shingles are wearing thin and failing.</p>
      </div>
      <div class="rr-sign rr-rv-right" data-animate>
        <div class="rr-sign__ico"><?php echo icon('home', 24); ?></div>
        <h3>Rusted or lifted flashing</h3>
        <p>Failed flashing around chimneys and vents is the number-one hidden source of leaks on older Huffman roofs.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-secondary)" points="0,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== 3 · EXPERT POSITIONING ===================== -->
<section class="section rr-expert" aria-label="Why trust Triple G Roofing with your repair">
  <div class="container">
    <div class="rr-expert-grid">
      <div class="rr-expert-copy">
        <span class="eyebrow">The Triple G Standard</span>
        <h2>Why trust Triple G Roofing with your roof repair?</h2>
        <p class="answer-block">
          Triple G Roofing repairs every Huffman roof the right way — we find the true source of the leak, fix it, and
          document the work with photos. Because owner Tim Menn&rsquo;s crew knows Gulf Coast weather and North Harris
          County codes, your repair holds up through the next Texas storm season, not just the next dry week.
        </p>
        <div class="rr-expert-stats">
          <div class="rr-expert-stat"><div class="num">48&nbsp;hr</div><div class="lbl">Most repairs done</div></div>
          <div class="rr-expert-stat"><div class="num">10&nbsp;yr</div><div class="lbl">Workmanship warranty</div></div>
          <div class="rr-expert-stat"><div class="num">Same&nbsp;day</div><div class="lbl">Emergency tarping</div></div>
        </div>
        <ul class="rr-expert-diffs">
          <li><?php echo icon('check-circle', 22); ?> We chase the leak to its real source, not just the wet spot</li>
          <li><?php echo icon('check-circle', 22); ?> Written, itemized pricing before we start — no surprise bills</li>
          <li><?php echo icon('check-circle', 22); ?> The same local Huffman crew from first call to final walkthrough</li>
        </ul>
      </div>
      <div class="rr-expert-figure rr-rv-right" data-animate>
        <img src="/assets/images/roof-damage-repair.jpg"
             srcset="/assets/images/roof-damage-repair-480.webp 480w, /assets/images/roof-damage-repair-960.webp 960w, /assets/images/roof-damage-repair-1600.webp 1600w"
             sizes="(max-width: 1024px) 100vw, 520px"
             alt="Triple G Roofing crew replacing damaged decking during a roof repair on a Huffman home"
             width="600" height="700" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE — WHERE LEAKS START ===================== -->
<section class="section rr-leaks" aria-label="Where Huffman roof leaks start">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Leak Diagnostics</span>
      <h2>Where do most Huffman roof leaks start?</h2>
      <p class="answer-block">
        Most Huffman roof leaks do not start in the middle of the shingles — they start at the seams and penetrations.
        Triple G Roofing traces water back to one of six usual suspects, because fixing the true entry point is the
        only repair that actually stops the drip in your ceiling for good.
      </p>
    </div>
    <div class="rr-leaks-grid">
      <div class="rr-leak rr-rv-up" data-animate>
        <div class="rr-leak__ico"><?php echo icon('droplets', 22); ?></div>
        <h3>Roof valleys</h3>
        <p>The V-shaped channels where two roof planes meet carry the most water — and leak first when the valley metal or shingles fail.</p>
      </div>
      <div class="rr-leak rr-rv-up" data-animate>
        <div class="rr-leak__ico"><?php echo icon('home', 22); ?></div>
        <h3>Chimney &amp; wall flashing</h3>
        <p>Rusted, loose, or poorly sealed flashing around chimneys and sidewalls is the single most common leak source on Huffman roofs.</p>
      </div>
      <div class="rr-leak rr-rv-up" data-animate>
        <div class="rr-leak__ico"><?php echo icon('ruler', 22); ?></div>
        <h3>Pipe boots &amp; vent penetrations</h3>
        <p>The rubber collars around plumbing vents dry-rot and crack in the Texas sun, letting water run straight down the pipe.</p>
      </div>
      <div class="rr-leak rr-rv-up" data-animate>
        <div class="rr-leak__ico"><?php echo icon('hammer', 22); ?></div>
        <h3>Popped or backed-out nails</h3>
        <p>Nails that work loose over time push up through the shingle, creating a pinhole path for water into the decking below.</p>
      </div>
      <div class="rr-leak rr-rv-up" data-animate>
        <div class="rr-leak__ico"><?php echo icon('wind', 22); ?></div>
        <h3>Wind-lifted or missing shingles</h3>
        <p>Gulf Coast gusts break the seal and tear shingles away, exposing the felt and nail line to the next Huffman downpour.</p>
      </div>
      <div class="rr-leak rr-rv-up" data-animate>
        <div class="rr-leak__ico"><?php echo icon('droplets', 22); ?></div>
        <h3>Clogged gutters &amp; rotted fascia</h3>
        <p>When gutters overflow, water backs up under the shingle edge and rots the fascia and roof deck along the eaves.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-light);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,0 900,72 1200,36 L1200,0 L0,0 Z" fill="var(--color-dark)"/></svg>
</div>

<!-- ===================== 5 · PROCESS ===================== -->
<section class="section rr-process" aria-label="How fast a roof repair works">
  <div class="container">
    <div class="section-header" style="max-width:720px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Fast &amp; Clear</span>
      <h2>How fast can Triple G Roofing repair my roof?</h2>
      <p class="answer-block">
        Triple G Roofing completes most Huffman roof repairs within 48 hours of your approval, and active leaks get a
        same-day emergency tarp so water stays out tonight. We keep the process simple: inspect, quote in writing,
        repair, and clean up — with the same crew on your roof from start to finish.
      </p>
    </div>
    <div class="rr-timeline">
      <div class="rr-tl-step" data-animate>
        <div class="rr-tl-step__num">1</div>
        <h3>Same-day emergency tarp</h3>
        <p>If your Huffman roof is actively leaking, we tarp it the same day to stop water before it reaches more of your home.</p>
      </div>
      <div class="rr-tl-step" data-animate>
        <div class="rr-tl-step__num">2</div>
        <h3>Find the true source</h3>
        <p>Our roofer traces the leak to its real entry point — valley, flashing, boot, or shingle — and photographs the damage.</p>
      </div>
      <div class="rr-tl-step" data-animate>
        <div class="rr-tl-step__num">3</div>
        <h3>Written, itemized quote</h3>
        <p>You get a clear price in writing before any repair work begins — no vague verbal numbers and no surprise bills.</p>
      </div>
      <div class="rr-tl-step" data-animate>
        <div class="rr-tl-step__num">4</div>
        <h3>Repair within 48 hours</h3>
        <p>Once approved, most repairs are finished within 48 hours, cleaned up, and backed by our 10-year workmanship warranty.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROOF ===================== -->
<section class="section rr-proof" aria-label="Reviews and recent work">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Trusted Locally</span>
      <h2>What do Huffman homeowners say about our roof repairs?</h2>
      <p class="answer-block">
        Triple G Roofing has earned its reputation across Huffman, Humble, Atascocita, Kingwood, and Crosby the
        old-fashioned way — by stopping leaks the first time and standing behind the work. Read our verified Google
        reviews below and see recent repairs from around North Harris County.
      </p>
    </div>

    <div class="rr-proof-photos" data-animate>
      <figure>
        <img src="/assets/images/roof-damage-repair.jpg"
             srcset="/assets/images/roof-damage-repair-480.webp 480w, /assets/images/roof-damage-repair-960.webp 960w, /assets/images/roof-damage-repair-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Recent Triple G Roofing repair and decking replacement on a Huffman home"
             width="600" height="450" loading="lazy">
      </figure>
      <figure>
        <img src="/assets/images/hero-roof-home.jpg"
             srcset="/assets/images/hero-roof-home-480.webp 480w, /assets/images/hero-roof-home-960.webp 960w, /assets/images/hero-roof-home-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Completed architectural shingle roof after a Triple G Roofing repair in Huffman, TX"
             width="600" height="450" loading="lazy">
      </figure>
    </div>

    <div class="rr-reviews-embed">
      <?php echo $elfsightEmbed; ?>
    </div>

    <div class="rr-proof-badges" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- ===================== 7 · COMPARISON ===================== -->
<section class="section rr-compare" aria-label="Quick-fix contractor versus a done-right repair">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Repair It Once</span>
      <h2>Should you repair or replace your Huffman roof?</h2>
      <p class="answer-block">
        Repair when your Huffman roof is under 15 years old and the damage is localized; replace when leaks are
        widespread, the decking sags, or the roof is past 20 years. The bigger risk is a patch-and-pray contractor who
        chases the wet spot instead of the source. Here is the honest comparison.
      </p>
    </div>
    <div class="rr-compare-grid">
      <div class="rr-compare-col rr-compare-col--them">
        <h3><?php echo icon('x', 22); ?> Patch-and-pray quick fix</h3>
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Smears tar over the wet spot instead of finding the real source</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Verbal price that grows once the crew is on your roof</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> No warranty — you call again the next Huffman storm</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> A different crew, or no-show, every time you call back</li>
        </ul>
      </div>
      <div class="rr-compare-col rr-compare-col--us">
        <h3><?php echo icon('shield', 22); ?> Triple G Roofing done right</h3>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> We trace and fix the true leak source so it stays fixed</li>
          <li><?php echo icon('check-circle', 20); ?> Written, itemized pricing before a single shingle moves</li>
          <li><?php echo icon('check-circle', 20); ?> 10-year workmanship warranty on every repair we make</li>
          <li><?php echo icon('check-circle', 20); ?> The same local Huffman crew, answering the phone 8am&ndash;8pm</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,72 900,0 1200,36 L1200,72 L0,72 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section rr-faq" aria-label="Roof repair FAQs">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Good Questions</span>
      <h2>What else do Huffman homeowners ask about roof repair?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on cost, timing, insurance, and warranties — before you ever schedule roof repair near me in Huffman.</p>
    </div>
    <div class="rr-faq-grid">
      <?php foreach ($faqs as $i => $f): ?>
      <details class="faq-item"<?php echo $i === 0 ? ' open' : ''; ?> data-animate>
        <summary>
          <span class="rr-faq-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg></span>
          <?php echo htmlspecialchars($f['q']); ?>
        </summary>
        <div class="faq-answer"><p><?php echo htmlspecialchars($f['a']); ?></p></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== FINAL CTA ===================== -->
<section class="rr-cta" aria-label="Book a roof repair">
  <div class="container">
    <h2>Ready to get your Huffman roof repaired the right way?</h2>
    <p>Whether a storm just tore off shingles or you spotted a stain on the ceiling, Triple G Roofing will find the
      source, fix it fast, and back it with a 10-year workmanship warranty — same-day response across Huffman and
      North Harris County.</p>
    <div class="rr-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get My Free Repair Quote</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <p class="phone-line">Active leak right now? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — 8am to 8pm, 7 days a week.</p>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section rr-related" aria-label="Other roofing services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Keep Exploring</span>
      <h2>What other roofing services might your Huffman home need?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">If your repair points to a bigger issue, here&rsquo;s how Triple G Roofing handles the rest.</p>
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

</div><!-- /.rr-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
