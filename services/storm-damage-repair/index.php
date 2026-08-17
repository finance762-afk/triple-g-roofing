<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Service — Storm & Wind Damage Roof Repair · Triple G Roofing (Phase 4)
   Premium editorial service page (8-section structure)
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Storm & Wind Damage Roof Repair';
$serviceSlug     = 'storm-damage-repair';
$pageTitle       = 'Storm & Wind Damage Roof Repair Huffman TX | Triple G Roofing';
$pageDescription = 'Storm or wind damage in Huffman, TX? Triple G Roofing offers same-day tarping, hail inspections, and direct insurance billing across North Harris County. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';

/* --- FAQs specific to storm & wind damage in Huffman --- */
$faqs = [
    [
        'q' => 'How fast can you tarp my roof after a Huffman storm?',
        'a' => 'Triple G Roofing runs same-day emergency response across Huffman and North Harris County. When wind or hail opens your roof, call us and we get a weather-tight tarp over the breach fast — usually the same day — so the next Gulf Coast downpour does not soak your insulation, drywall, and belongings.',
    ],
    [
        'q' => 'What does homeowners insurance cover on storm damage, and what about my deductible?',
        'a' => 'Most Texas policies cover sudden storm, wind, and hail damage minus your deductible. Triple G Roofing documents the damage, files a claim-ready report, and meets your adjuster on site. You typically pay only your deductible; we bill the approved repair cost directly to your insurer so there are no surprise invoices.',
    ],
    [
        'q' => 'My storm damage claim was denied — what can I do now?',
        'a' => 'A denial is not always final. Triple G Roofing re-inspects your Huffman roof, photographs missed hail bruising or wind lift the first adjuster overlooked, and provides detailed documentation to support a reinspection or appeal. Many denied claims are reversed once the damage is properly captured and presented to the insurer.',
    ],
    [
        'q' => 'How can I tell if I have hail damage on my roof?',
        'a' => 'Hail damage is often invisible from the ground. Look for dented gutters, granules washing from downspouts, and soft, bruised spots on shingles. A Triple G Roofing inspector climbs your Huffman roof, chalks each impact, and photographs it — the documented proof an insurance adjuster needs to approve a hail claim.',
    ],
    [
        'q' => 'Do you handle full roof replacement storm claims?',
        'a' => 'Yes. When a Huffman storm damages a roof beyond repair, Triple G Roofing manages the entire replacement claim — documentation, adjuster meeting, agreed scope, and direct insurance billing. You get a new, code-compliant roof built for North Harris County weather while we handle the paperwork with your insurer.',
    ],
    [
        'q' => 'Will I pay out of pocket beyond my deductible?',
        'a' => 'In most approved storm claims, your deductible is your only cost. Triple G Roofing works from your insurer\'s agreed scope and bills the balance directly to the carrier. We walk you through the numbers before any work starts, so you always know exactly what you owe — no hidden add-ons.',
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
        'name' => 'Roof Damage Repair', 'slug' => 'roof-damage-repair', 'img' => 'roof-damage-repair',
        'alt' => 'Roof tear-off job with a loaded dumpster at a Huffman home',
        'desc' => 'Full assessment and repair for aging, worn, or compromised roofs.',
        'bullets' => ['Complete damage assessment', 'Rotted decking replaced', 'Built to North Harris County code'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9"/><path d="m18 15 4-4"/><path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"/></svg>',
    ],
];

/* --- Schema: Service + FAQPage + BreadcrumbList --- */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type"    => "Service",
    "@id"      => $canonicalUrl . '#service-' . $serviceSlug,
    "serviceType" => $serviceName,
    "name"     => $serviceName . ' in ' . $address['city'] . ', ' . $address['state'],
    "description" => 'Emergency storm and wind damage roof repair in Huffman, TX — same-day tarping, hail and wind inspections, and direct insurance claim coordination across North Harris County.',
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
   Storm & Wind Damage Roof Repair — page-specific styles (Premium tier)
   Tokens only (var()); the signature claim-timeline section (.st-claim)
   is unique to this page.
   ============================================================ */
:root {
  --svc-accent: var(--color-primary);
  --svc-accent-soft: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --svc-grad-angle: 125deg;
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --color-card-tint-neutral: var(--color-white);
}
.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
[data-animate].reveal-delay-1 { transition-delay:.06s; }
[data-animate].reveal-delay-2 { transition-delay:.14s; }
[data-animate].reveal-delay-3 { transition-delay:.22s; }
.st-page h2 { text-wrap:balance; }

/* ---- Breadcrumb ---- */
.st-breadcrumb { background:var(--color-light); border-bottom:1px solid var(--color-gray-light); }
.st-breadcrumb ol { list-style:none; display:flex; flex-wrap:wrap; gap:var(--space-2); align-items:center; padding:var(--space-3) 0; margin:0; font-size:var(--font-size-sm); color:var(--color-gray); }
.st-breadcrumb a { color:var(--color-gray-dark); }
.st-breadcrumb a:hover { color:var(--svc-accent); }
.st-breadcrumb [aria-current] { color:var(--svc-accent); font-weight:600; }
.st-breadcrumb-sep { color:var(--color-gray-light); }

/* =====================================================
   1 · HERO — layered photo + gradient overlay + noise
   ===================================================== */
.st-hero { position:relative; min-height:62vh; display:flex; align-items:center; padding:104px 0 var(--space-16); overflow:hidden; }
.st-hero__bg { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
.st-hero::before { content:''; position:absolute; inset:0; z-index:1;
  background:linear-gradient(var(--svc-grad-angle), rgba(var(--color-secondary-rgb),.95) 0%, rgba(var(--color-secondary-rgb),.84) 44%, rgba(var(--color-secondary-rgb),.55) 100%); }
.st-hero::after { content:''; position:absolute; inset:0; z-index:1; pointer-events:none; opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.st-hero__inner { position:relative; z-index:2; max-width:860px; }
.st-hero__eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-sm); font-weight:600; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(255,255,255,.16); padding:var(--space-2) var(--space-4); border-radius:var(--radius-full); margin-bottom:var(--space-5); }
.st-hero__eyebrow svg { width:16px; height:16px; }
.st-hero h1 { color:var(--color-white); font-size:clamp(2.2rem,4.9vw,3.8rem); line-height:1.04; margin-bottom:var(--space-5); }
.st-hero h1 .text-accent { font-size:1.06em; }
.hero-answer { color:rgba(255,255,255,.9); font-size:var(--font-size-lg); line-height:1.7; max-width:62ch; margin-bottom:var(--space-6); }
.st-hero__actions { display:flex; flex-wrap:wrap; gap:var(--space-4); margin-bottom:var(--space-8); }
.st-hero__actions .btn svg { width:18px; height:18px; }
.st-hero__trust { display:flex; flex-wrap:wrap; gap:var(--space-3) var(--space-6); }
.st-hero__trust-item { position:relative; display:flex; align-items:center; gap:var(--space-2); color:rgba(255,255,255,.92); font-size:var(--font-size-sm); font-weight:500; }
.st-hero__trust-item svg { width:18px; height:18px; color:var(--color-accent); flex-shrink:0; }
.st-hero__trust-item + .st-hero__trust-item::before { content:''; position:absolute; left:calc(-1 * var(--space-3)); top:50%; width:1px; height:16px; transform:translateY(-50%); background:rgba(255,255,255,.22); }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background:var(--svc-accent-soft); border-left:4px solid var(--svc-accent); border-radius:var(--radius-md); padding:var(--space-5) var(--space-6); color:var(--color-gray-dark); line-height:1.7; font-size:var(--font-size-lg); max-width:72ch; margin:0 auto; }
.section-header .answer-block { margin-top:var(--space-4); text-align:left; }

/* =====================================================
   2 · PROBLEM — pull-quote + telltale-sign bento
   ===================================================== */
.st-problem { background:var(--color-white); }
.st-pullquote { font-family:var(--font-heading); font-weight:800; font-size:clamp(1.6rem,3.4vw,2.5rem); line-height:1.25; color:var(--color-dark); max-width:24ch; margin:var(--space-8) 0 var(--space-4); }
.st-pullquote span { color:var(--svc-accent); }
.signs-bento { display:grid; grid-template-columns:repeat(4,1fr); gap:var(--space-5); margin-top:var(--space-10); }
.sign-card { position:relative; overflow:hidden; background:var(--color-light); border:1px solid var(--color-gray-light); border-radius:var(--radius-lg); padding:var(--space-6); transition:transform var(--transition-base), box-shadow var(--transition-base); }
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
.st-expert { background:var(--color-secondary); position:relative; overflow:hidden; }
.st-expert::before { content:''; position:absolute; inset:0; pointer-events:none;
  background:radial-gradient(ellipse at 85% 0%, rgba(var(--color-primary-rgb),.22) 0%, transparent 60%); }
.st-expert .container { position:relative; z-index:1; }
.expert-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-16); align-items:center; }
.expert-copy .eyebrow { display:inline-block; font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-3); }
.expert-copy h2 { color:var(--color-white); margin-bottom:var(--space-4); }
.expert-copy .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.9); margin:0 0 var(--space-6); }
.expert-stats { display:flex; gap:var(--space-8); margin:var(--space-6) 0; flex-wrap:wrap; }
.expert-stat { position:relative; padding-bottom:var(--space-3); }
.expert-stat .num { font-family:var(--font-heading); font-weight:800; font-size:clamp(2.2rem,4.6vw,3rem); line-height:1; color:var(--color-accent); }
.expert-stat .lbl { font-size:var(--font-size-sm); color:rgba(255,255,255,.75); margin-top:var(--space-2); text-transform:uppercase; letter-spacing:1px; }
.expert-stat::after { content:''; position:absolute; left:0; bottom:0; width:32px; height:3px; border-radius:var(--radius-full); background:var(--color-accent); }
.expert-diffs { list-style:none; margin:var(--space-6) 0 0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.expert-diffs li { display:flex; gap:var(--space-3); color:rgba(255,255,255,.88); font-size:var(--font-size-base); line-height:1.55; }
.expert-diffs svg { width:22px; height:22px; color:var(--color-accent); flex-shrink:0; margin-top:2px; }
.expert-figure { position:relative; }
.expert-figure img { width:100%; border-radius:var(--radius-lg); box-shadow:var(--shadow-xl); object-fit:cover; transition:transform var(--transition-slow); }
.expert-figure:hover img { transform:scale(1.03); }
.expert-figure::after { content:''; position:absolute; inset:0; border-radius:var(--radius-lg); background:linear-gradient(to top, rgba(var(--color-secondary-rgb),.4) 0%, transparent 55%); pointer-events:none; }

/* =====================================================
   4 · SIGNATURE — the storm-claim timeline (unique)
   A vertical connected rail of numbered claim-step cards, distinct
   from the plain process timeline in section 5.
   ===================================================== */
.st-claim { position:relative; background:linear-gradient(180deg, var(--color-white) 0%, var(--svc-accent-soft) 100%); overflow:hidden; }
.st-claim__blob { position:absolute; top:12%; left:-3%; width:220px; height:220px; border-radius:50%; background:radial-gradient(circle, rgba(var(--color-primary-rgb),.08), transparent 70%); pointer-events:none; }
.claim-rail { max-width:780px; margin:var(--space-12) auto 0; position:relative; padding-left:var(--space-4); }
.claim-rail::before { content:''; position:absolute; left:31px; top:var(--space-6); bottom:var(--space-6); width:3px; border-radius:var(--radius-full); background:linear-gradient(to bottom, var(--svc-accent) 0%, var(--color-accent) 100%); }
.claim-step { position:relative; display:grid; grid-template-columns:64px 1fr; gap:var(--space-5); align-items:stretch; padding-bottom:var(--space-6); }
.claim-step:last-child { padding-bottom:0; }
.claim-step__marker { position:relative; z-index:1; width:64px; height:64px; border-radius:var(--radius-full); background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); font-family:var(--font-heading); font-weight:800; font-size:var(--font-size-2xl); display:flex; align-items:center; justify-content:center; box-shadow:var(--shadow-lg); border:4px solid var(--color-white); transition:transform var(--transition-base); }
.claim-step:hover .claim-step__marker { transform:scale(1.07); }
.claim-step__card { background:var(--color-white); border:1px solid var(--color-gray-light); border-left:4px solid var(--svc-accent); border-radius:var(--radius-lg); padding:var(--space-5) var(--space-6); box-shadow:var(--shadow-sm); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.claim-step:hover .claim-step__card { transform:translateX(4px); box-shadow:var(--shadow-md); }
.claim-step__card h3 { display:flex; align-items:center; gap:var(--space-3); font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.claim-step__card h3 svg { width:22px; height:22px; color:var(--svc-accent); flex-shrink:0; }
.claim-step__card p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   5 · PROCESS / EMERGENCY TIMELINE
   ===================================================== */
.st-process { background:var(--color-white); }
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
.st-proof { background:var(--color-dark); position:relative; overflow:hidden; }
.st-proof::before { content:''; position:absolute; inset:0; pointer-events:none; background:radial-gradient(ellipse at 15% 100%, rgba(var(--color-primary-rgb),.2) 0%, transparent 60%); }
.st-proof .container { position:relative; z-index:1; }
.st-proof .section-header h2 { color:var(--color-white); }
.st-proof .section-header .eyebrow { color:var(--color-accent); }
.st-proof .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.88); }
.proof-photos { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); margin-top:var(--space-10); }
.proof-photos figure { position:relative; margin:0; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl); }
.proof-photos img { width:100%; height:100%; object-fit:cover; aspect-ratio:4/3; transition:transform var(--transition-slow); }
.proof-photos figure:hover img { transform:scale(1.05); }
.reviews-embed { margin-top:var(--space-8); min-height:100px; }
.proof-badges { display:flex; flex-wrap:wrap; gap:var(--space-4); justify-content:center; margin-top:var(--space-8); }
.proof-badges a { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); color:var(--color-white); font-size:var(--font-size-sm); font-weight:600; padding:var(--space-3) var(--space-5); border-radius:var(--radius-full); transition:background var(--transition-fast), border-color var(--transition-fast); }
.proof-badges a:hover { background:rgba(var(--color-primary-rgb),.2); border-color:var(--svc-accent); color:var(--color-white); }
.proof-badges svg { width:18px; height:18px; color:var(--color-star); }

/* =====================================================
   7 · COMPARISON — two column vs
   ===================================================== */
.st-compare { background:var(--color-light); }
.compare-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-8); margin-top:var(--space-12); }
.compare-col { border-radius:var(--radius-lg); padding:var(--space-8); border:1px solid var(--color-gray-light); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.compare-col--them { background:var(--color-white); }
.compare-col--us { background:linear-gradient(160deg, var(--svc-accent-soft), var(--color-white)); border-color:color-mix(in srgb, var(--svc-accent) 30%, #fff); box-shadow:var(--shadow-lg); }
.compare-col--us:hover { transform:translateY(-4px); box-shadow:var(--shadow-xl); }
.compare-col h3 { font-size:var(--font-size-xl); margin-bottom:var(--space-5); display:flex; align-items:center; gap:var(--space-3); }
.compare-col--us h3 { color:var(--svc-accent); }
.compare-col ul { list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.compare-col li { display:flex; gap:var(--space-3); font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; }
.compare-col li svg { width:20px; height:20px; flex-shrink:0; margin-top:2px; }
.compare-col--them li svg { color:var(--color-gray); }
.compare-col--us li svg { color:var(--color-success); }

/* =====================================================
   8 · FAQ
   ===================================================== */
.st-faq { background:var(--color-white); }
.faq-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); align-items:start; margin-top:var(--space-10); }
.faq-item { background:var(--color-light); border-radius:var(--radius-lg); border:1px solid var(--color-gray-light); overflow:hidden; transition:box-shadow var(--transition-base), border-color var(--transition-base); }
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
.st-related { background:var(--color-light); }
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
.st-cta { position:relative; overflow:hidden; text-align:center; padding:var(--space-16) 0;
  background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 82%, #000) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.st-cta::before { content:''; position:absolute; inset:0; pointer-events:none; opacity:.06;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.st-cta .container { position:relative; z-index:1; }
.st-cta h2 { color:var(--color-white); font-size:clamp(1.9rem,4vw,2.75rem); margin-bottom:var(--space-4); }
.st-cta p { color:rgba(255,255,255,.92); max-width:60ch; margin:0 auto var(--space-8); font-size:var(--font-size-lg); }
.st-cta__actions { display:flex; gap:var(--space-4); justify-content:center; flex-wrap:wrap; }
.st-cta .btn svg { width:18px; height:18px; }
.st-cta .phone-line { margin-top:var(--space-6); color:rgba(255,255,255,.82); }
.st-cta .phone-line a { color:var(--color-accent); font-weight:700; }

/* ---- SVG dividers ---- */
.svg-divider { display:block; overflow:hidden; line-height:0; }
.svg-divider svg { display:block; width:100%; height:100%; }
.svg-divider--diagonal { height:60px; }
.svg-divider--wave { height:72px; }

/* ---- Focus visibility (WCAG AA) ---- */
.st-hero a:focus-visible, .service-card__cta:focus-visible, .st-cta a:focus-visible, .proof-badges a:focus-visible, .faq-item summary:focus-visible, .sign-card:focus-within { outline:3px solid var(--color-accent); outline-offset:2px; border-radius:var(--radius-sm); }
::selection { background:rgba(var(--color-primary-rgb),.85); color:var(--color-white); }

/* =====================================================
   MULTI-DIRECTIONAL REVEALS
   ===================================================== */
[data-animate].st-rv-left { transform:translateX(-36px); }
[data-animate].st-rv-right { transform:translateX(36px); }
[data-animate].st-rv-down { transform:translateY(-30px); }
[data-animate].st-rv-scale { transform:scale(0.93); }
[data-animate].st-rv-left.animated,
[data-animate].st-rv-right.animated,
[data-animate].st-rv-down.animated,
[data-animate].st-rv-scale.animated { transform:none; }

/* ---- Hero eyebrow subtle pulse ---- */
.st-hero__eyebrow svg { animation:st-pulse 2.6s ease-in-out infinite; }
@keyframes st-pulse { 0%,100% { opacity:1; } 50% { opacity:.55; } }

@media (prefers-reduced-motion: reduce) {
  .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img, .sign-card:hover { transform:none; }
  .st-hero__eyebrow svg { animation:none; }
  .claim-step:hover .claim-step__marker, .claim-step:hover .claim-step__card,
  .timeline-step:hover .timeline-step__num, .compare-col--us:hover,
  .expert-figure:hover img, .proof-photos figure:hover img { transform:none; }
  [data-animate].st-rv-left, [data-animate].st-rv-right,
  [data-animate].st-rv-down, [data-animate].st-rv-scale { transform:none; }
}
@media (max-width:1024px) {
  .expert-grid { grid-template-columns:1fr; gap:var(--space-10); }
  .signs-bento { grid-template-columns:1fr 1fr; }
  .sign-card:first-child { grid-column:span 2; }
  .services-grid { grid-template-columns:repeat(2,1fr); }
}
@media (max-width:900px) {
  .expert-stats { gap:var(--space-6); }
  .st-pullquote { max-width:none; }
}
@media (max-width:768px) {
  .compare-grid { grid-template-columns:1fr; }
  .faq-grid { grid-template-columns:1fr; }
  .timeline::before { left:19px; }
  .timeline-step { padding-left:var(--space-12); }
  .timeline-step__num { width:40px; height:40px; }
  .claim-rail::before { left:27px; }
  .claim-step { grid-template-columns:56px 1fr; gap:var(--space-4); }
  .claim-step__marker { width:56px; height:56px; }
}
@media (max-width:600px) {
  .signs-bento { grid-template-columns:1fr; }
  .sign-card:first-child { grid-column:auto; }
  .proof-photos { grid-template-columns:1fr; }
  .services-grid { grid-template-columns:1fr; }
  .st-hero h1 { font-size:clamp(2rem,8vw,2.6rem); }
}
@media (max-width:480px) {
  .st-hero__actions .btn, .st-cta__actions .btn { width:100%; justify-content:center; }
  .compare-col { padding:var(--space-6); }
  .proof-badges a { width:100%; justify-content:center; }
}
@media print {
  .st-hero, .st-cta, .st-expert, .st-proof { background:none !important; color:var(--color-dark) !important; }
  .st-hero__bg, .st-claim__blob, .svg-divider { display:none !important; }
  .st-hero h1, .hero-answer, .expert-copy h2, .st-proof .section-header h2 { color:var(--color-dark) !important; }
  .faq-item, .sign-card, .claim-step__card { break-inside:avoid; }
  [data-animate] { opacity:1 !important; transform:none !important; }
}
</style>

<div class="st-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="st-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="st-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="st-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Storm &amp; Wind Damage Roof Repair</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="st-hero" aria-label="Storm and wind damage roof repair in Huffman, TX">
  <img class="st-hero__bg"
       src="/assets/images/storm-damage-repair.jpg"
       srcset="/assets/images/storm-damage-repair-480.webp 480w, /assets/images/storm-damage-repair-960.webp 960w, /assets/images/storm-damage-repair-1600.webp 1600w"
       sizes="100vw"
       alt="Storm-damaged tree fallen against a Huffman, TX home needing emergency roof repair"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container st-hero__inner">
    <span class="st-hero__eyebrow"><?php echo icon('shield', 16); ?> Storm &amp; Wind Damage · Huffman, TX</span>
    <h1>Storm &amp; Wind Damage Roof Repair in <span class="text-accent">Huffman</span>, TX</h1>
    <p class="hero-answer">
      Triple G Roofing is a licensed, insured Texas roofing contractor based in Huffman serving North Harris County.
      When hail or Gulf Coast wind hits, we respond the same day — tarping the breach, documenting every impact for
      your adjuster, and billing your insurer directly so repairs start fast and your home stays dry.
    </p>
    <div class="st-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get Same-Day Emergency Help</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="st-hero__trust">
      <span class="st-hero__trust-item"><?php echo icon('clock', 18); ?> Same-day emergency tarping</span>
      <span class="st-hero__trust-item"><?php echo icon('shield', 18); ?> Licensed &amp; insured</span>
      <span class="st-hero__trust-item"><?php echo icon('wind', 18); ?> Hail &amp; wind experts</span>
      <span class="st-hero__trust-item"><?php echo icon('award', 18); ?> We bill your insurer</span>
    </div>
  </div>
</section>

<!-- ===================== 2 · PROBLEM ===================== -->
<section class="section st-problem" aria-label="Spotting storm and wind damage">
  <div class="container">
    <div class="section-header" style="text-align:left; max-width:820px; margin-inline:0;">
      <span class="eyebrow" style="color:var(--color-primary);">After The Storm</span>
      <h2>How do you spot storm and wind damage on a Huffman roof?</h2>
      <p class="answer-block">
        Look for missing or lifted shingles after high wind, dents and bruising from hail, granules collecting in your
        gutters, and limb or debris impact with fresh leaks inside. Much of this damage in Huffman hides from the
        ground, so a documented roof inspection is the only sure way to catch it before the next Gulf Coast rain.
      </p>
    </div>
    <p class="st-pullquote">Wind and hail rarely leave an obvious hole — <span>they leave damage that only shows up when it rains.</span></p>
    <div class="signs-bento">
      <div class="sign-card st-rv-left" data-animate>
        <div class="sign-card__ico"><?php echo icon('wind', 24); ?></div>
        <h3>Missing or lifted shingles after wind</h3>
        <p>Straight-line wind and gusts off the Gulf Coast peel back tabs and tear shingles off entirely. Even shingles that only lifted and reset have broken their seal — leaving your Huffman roof open to wind-driven rain at the next storm.</p>
      </div>
      <div class="sign-card st-rv-scale" data-animate>
        <div class="sign-card__ico"><?php echo icon('droplets', 24); ?></div>
        <h3>Hail dents &amp; bruising</h3>
        <p>Round dents on shingles, gutters, and vents mean hail has knocked loose the protective granules.</p>
      </div>
      <div class="sign-card st-rv-scale" data-animate>
        <div class="sign-card__ico"><?php echo icon('check-circle', 24); ?></div>
        <h3>Granules in the gutters</h3>
        <p>Piles of sandy grit in downspouts after a storm signal hail has stripped your shingle surface.</p>
      </div>
      <div class="sign-card st-rv-right" data-animate>
        <div class="sign-card__ico"><?php echo icon('home', 24); ?></div>
        <h3>Debris impact &amp; leaks</h3>
        <p>Fallen limbs and flying debris puncture decking — and a new ceiling stain is proof water is already inside.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-secondary)" points="0,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== 3 · EXPERT POSITIONING ===================== -->
<section class="section st-expert" aria-label="Why call Triple G Roofing after a storm">
  <div class="container">
    <div class="expert-grid">
      <div class="expert-copy">
        <span class="eyebrow">The Triple G Standard</span>
        <h2>Why call Triple G Roofing after a storm?</h2>
        <p class="answer-block">
          Triple G Roofing answers the phone the day the storm passes, tarps the damage, and documents every impact
          the way an adjuster needs to see it. Because owner Tim Menn&rsquo;s crew lives with Gulf Coast hail and wind,
          we know what real storm damage looks like — and we bill your insurer directly so you are not fronting the cost.
        </p>
        <div class="expert-stats">
          <div class="expert-stat"><div class="num">Same&nbsp;day</div><div class="lbl">Emergency response</div></div>
          <div class="expert-stat"><div class="num">Direct</div><div class="lbl">Insurance billing</div></div>
          <div class="expert-stat"><div class="num">25&nbsp;mi</div><div class="lbl">Service radius</div></div>
        </div>
        <ul class="expert-diffs">
          <li><?php echo icon('check-circle', 22); ?> Emergency tarping to stop the leak before more damage sets in</li>
          <li><?php echo icon('check-circle', 22); ?> Every hail hit and wind lift photographed for your claim file</li>
          <li><?php echo icon('check-circle', 22); ?> We meet your adjuster on site and bill the insurer directly</li>
        </ul>
      </div>
      <div class="expert-figure st-rv-right" data-animate>
        <img src="/assets/images/roof-damage-repair.jpg"
             srcset="/assets/images/roof-damage-repair-480.webp 480w, /assets/images/roof-damage-repair-960.webp 960w, /assets/images/roof-damage-repair-1600.webp 1600w"
             sizes="(max-width: 1024px) 100vw, 520px"
             alt="Triple G Roofing crew repairing storm damage on a Huffman, TX roof"
             width="600" height="700" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE CLAIM TIMELINE ===================== -->
<section class="section st-claim" aria-label="How a storm damage insurance claim works">
  <span class="st-claim__blob" aria-hidden="true"></span>
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">From Damage To Done</span>
      <h2>How does a storm damage insurance claim work?</h2>
      <p class="answer-block">
        Triple G Roofing walks your claim through five clear steps in Huffman: a same-day inspection and emergency tarp,
        claim-ready photo documentation, an on-site meeting with your adjuster, approval of an agreed scope, and the
        repair itself — billed directly to your insurer. You handle your deductible; we handle the rest.
      </p>
    </div>
    <div class="claim-rail">
      <div class="claim-step st-rv-right" data-animate>
        <div class="claim-step__marker">1</div>
        <div class="claim-step__card">
          <h3><?php echo icon('clock', 22); ?> Same-day inspection &amp; emergency tarp</h3>
          <p>We climb your Huffman roof the day you call, stop active leaks with a weather-tight tarp, and assess the full extent of the storm damage before water spreads.</p>
        </div>
      </div>
      <div class="claim-step st-rv-right reveal-delay-1" data-animate>
        <div class="claim-step__marker">2</div>
        <div class="claim-step__card">
          <h3><?php echo icon('search', 22); ?> Claim-ready photo documentation</h3>
          <p>Every hail bruise, wind lift, and debris strike is chalked, photographed, and captioned into a report built the way insurance adjusters need to see it.</p>
        </div>
      </div>
      <div class="claim-step st-rv-right reveal-delay-2" data-animate>
        <div class="claim-step__marker">3</div>
        <div class="claim-step__card">
          <h3><?php echo icon('hard-hat', 22); ?> We meet your adjuster on site</h3>
          <p>Triple G Roofing stands on the roof with your insurance adjuster in Huffman, pointing out every documented impact so nothing legitimate gets missed or denied.</p>
        </div>
      </div>
      <div class="claim-step st-rv-right reveal-delay-3" data-animate>
        <div class="claim-step__marker">4</div>
        <div class="claim-step__card">
          <h3><?php echo icon('check-circle', 22); ?> Approval &amp; agreed scope</h3>
          <p>Once your carrier approves the claim, we review the agreed scope with you line by line — materials, labor, and cost — so you know exactly what is covered.</p>
        </div>
      </div>
      <div class="claim-step st-rv-right reveal-delay-4" data-animate>
        <div class="claim-step__marker">5</div>
        <div class="claim-step__card">
          <h3><?php echo icon('wrench', 22); ?> Repair + direct insurance billing</h3>
          <p>Our crew completes the repair or replacement to North Harris County code and bills the approved amount straight to your insurer — you pay only your deductible.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--svc-accent-soft);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,0 900,72 1200,36 L1200,72 L0,72 Z" fill="var(--color-white)"/></svg>
</div>

<!-- ===================== 5 · PROCESS / EMERGENCY ===================== -->
<section class="section st-process" aria-label="What to do right after a storm">
  <div class="container">
    <div class="section-header" style="max-width:720px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Do This First</span>
      <h2>What should you do right after a storm hits your Huffman home?</h2>
      <p class="answer-block">
        Stay safe first, then document everything and call a local roofer fast. Searching &ldquo;storm damage roof
        repair near me in Huffman&rdquo; after the wind dies down is smart — but avoid out-of-town storm chasers.
        Triple G Roofing offers same-day tarping across North Harris County to protect your home before the next rain.
      </p>
    </div>
    <div class="timeline">
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">1</div>
        <h3>Stay safe &amp; check from the ground</h3>
        <p>Keep off the wet roof and away from downed power lines. Look for missing shingles, dented gutters, and debris from ground level only.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">2</div>
        <h3>Document the damage</h3>
        <p>Photograph fallen limbs, interior leaks, and anything the storm damaged. Timestamped photos strengthen your Huffman insurance claim later.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">3</div>
        <h3>Call Triple G for same-day tarp</h3>
        <p>Reach us and we get a weather-tight tarp over the breach the same day, stopping water damage while your claim is still fresh.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">4</div>
        <h3>Avoid door-knocking storm chasers</h3>
        <p>Skip the out-of-town crews going door to door after every North Harris County storm. Work with a local roofer who will still be here next year.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROOF ===================== -->
<section class="section st-proof" aria-label="Reviews and recent storm work">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Trusted Locally</span>
      <h2>What do Huffman homeowners say after a storm repair?</h2>
      <p class="answer-block">
        Triple G Roofing has earned its reputation across Huffman, Humble, Atascocita, Kingwood, and Crosby the
        old-fashioned way — by showing up fast after the storm, telling the truth, and standing behind the work. Read
        our verified Google reviews below and see recent storm repairs from around North Harris County.
      </p>
    </div>

    <div class="proof-photos" data-animate>
      <figure>
        <img src="/assets/images/roof-repair.jpg"
             srcset="/assets/images/roof-repair-480.webp 480w, /assets/images/roof-repair-960.webp 960w, /assets/images/roof-repair-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Triple G Roofing repairing storm-damaged shingles on a Huffman home"
             width="600" height="450" loading="lazy">
      </figure>
      <figure>
        <img src="/assets/images/hero-roof-home.jpg"
             srcset="/assets/images/hero-roof-home-480.webp 480w, /assets/images/hero-roof-home-960.webp 960w, /assets/images/hero-roof-home-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Completed architectural shingle roof after storm repair by Triple G Roofing in Huffman, TX"
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
<section class="section st-compare" aria-label="Storm chaser versus local roofer">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Know The Difference</span>
      <h2>Storm chaser or local roofer — who should you trust?</h2>
      <p class="answer-block">
        For a Huffman storm repair, trust a local roofer over an out-of-town storm chaser almost every time. Triple G
        Roofing lives in the same Gulf Coast weather you do, answers the phone directly, and honors its warranty long
        after the crews that flood in after a storm have left the county. Here is the honest comparison.
      </p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them">
        <h3><?php echo icon('external-link', 22); ?> Out-of-town storm chasers</h3>
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Here today, gone the moment the next storm hits another town</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> A warranty from a company you can&rsquo;t find in six months</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> High-pressure door-knocking and rushed contracts to sign now</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> No stake in the Huffman community or your long-term roof</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us">
        <h3><?php echo icon('shield', 22); ?> Triple G Roofing</h3>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> A local Huffman crew that answers when you call, year-round</li>
          <li><?php echo icon('check-circle', 20); ?> A workmanship warranty backed by a company that stays put</li>
          <li><?php echo icon('check-circle', 20); ?> Honest documentation and direct billing to your insurer</li>
          <li><?php echo icon('check-circle', 20); ?> Built around Texas weather and North Harris County codes</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true" style="background:var(--color-light);">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-white)" points="0,60 1200,0 1200,60"/></svg>
</div>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section st-faq" aria-label="Storm and wind damage FAQs">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Good Questions</span>
      <h2>What else do Huffman homeowners ask about storm and wind damage?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on emergency tarping, deductibles, denied claims, and insurance — before you file for storm damage in Huffman.</p>
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
<section class="st-cta" aria-label="Get emergency storm damage help">
  <div class="container">
    <h2>Storm just hit your Huffman roof? Need same-day help now?</h2>
    <p>Don&rsquo;t wait for the next rain to find the damage. Triple G Roofing tarps the breach today, documents your
      claim, and bills your insurer directly — same-day emergency response across Huffman and North Harris County.</p>
    <div class="st-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get Emergency Storm Help</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <p class="phone-line">Roof leaking right now? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — 8am to 8pm, 7 days a week.</p>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section st-related" aria-label="Other roofing services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Keep Exploring</span>
      <h2>What other roofing services might your Huffman home need?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Before, during, or after a storm, here&rsquo;s how Triple G Roofing keeps your Huffman roof sound.</p>
    </div>
    <div class="services-grid">
      <?php foreach ($relatedServices as $i => $s):
        $tint = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-delay-<?php echo $tint; ?>" data-animate>
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

</div><!-- /.st-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
