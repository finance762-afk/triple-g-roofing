<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Service — Attic Venting · Triple G Roofing (Phase 4)
   Premium editorial service page (8-section structure)
   Signature section: balanced-airflow intake/exhaust diagram
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Attic Venting';
$serviceSlug     = 'attic-venting';
$pageTitle       = 'Attic Venting & Roof Ventilation Huffman TX | Triple G Roofing';
$pageDescription = 'Balanced attic ventilation in Huffman, TX from Triple G Roofing — soffit intake and ridge exhaust that cool your attic, protect shingles, and cut cooling bills. Call (281) 570-3325.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';

/* --- FAQs specific to attic venting in Huffman --- */
$faqs = [
    [
        'q' => 'How much does attic ventilation cost in Huffman, TX?',
        'a' => 'Most attic ventilation upgrades in Huffman run from a few hundred to a couple thousand dollars, depending on your roof size and whether you are adding ridge vents, soffit intake, or both. Triple G Roofing gives you a firm, itemized quote after inspecting your attic — no vague estimates and no obligation.',
    ],
    [
        'q' => 'Does better attic ventilation lower my summer energy bills?',
        'a' => 'Yes. When hot air is trapped in your attic, it radiates down into your living space and forces your AC to run longer. A balanced intake-and-exhaust system lets that heat escape, easing the load on your cooling system through long Gulf Coast summers and often trimming your monthly bill.',
    ],
    [
        'q' => 'What is the difference between ridge, soffit, and box vents?',
        'a' => 'Soffit vents sit under your eaves and pull cool air in; ridge vents run along the peak and let hot air out; box vents are individual exhaust units set near the ridge. A balanced system always pairs intake with exhaust — Triple G Roofing sizes the mix to your specific Huffman roof.',
    ],
    [
        'q' => 'What are the signs of poor attic ventilation?',
        'a' => 'Telltale signs include a scorching-hot attic, rising cooling bills, curling or blistering shingles, and a musty, mildew smell upstairs. You may also spot rusted nail heads or damp insulation. If you are searching for attic ventilation near me in Huffman, any of these means it is worth a free attic check.',
    ],
    [
        'q' => 'Does attic ventilation extend shingle life or protect my warranty?',
        'a' => 'It does both. Excess attic heat cooks shingles from below and can void the manufacturer warranty, which usually requires adequate ventilation. Keeping your attic cool and dry helps your Huffman roof reach its full service life and keeps that warranty intact for years to come.',
    ],
    [
        'q' => 'Does venting help with attic moisture and mildew in our humid climate?',
        'a' => 'Absolutely. Gulf Coast humidity drives warm, moist air into your attic, where it condenses on cool framing and feeds mildew and wood rot. Balanced ventilation flushes that damp air out continuously, protecting your decking, insulation, and indoor air quality across North Harris County.',
    ],
];

/* --- Related services (3 cards) — pulled from services/index.php $serviceCards --- */
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
    "description" => 'Balanced attic ventilation in Huffman, TX — soffit intake and ridge exhaust that lower attic heat, protect shingles, and cut cooling costs in the Gulf Coast climate.',
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
   Attic Venting — page-specific styles (Premium tier)
   Tokens only (var()); signature airflow diagram is unique.
   ============================================================ */
:root {
  --svc-accent: var(--color-primary);
  --svc-accent-soft: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --svc-grad-angle: 100deg;
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --color-card-tint-neutral: var(--color-white);
}
.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
[data-animate].reveal-delay-1 { transition-delay:.06s; }
[data-animate].reveal-delay-2 { transition-delay:.14s; }
[data-animate].reveal-delay-3 { transition-delay:.22s; }
.av-page h2 { text-wrap:balance; }

/* ---- Breadcrumb ---- */
.av-breadcrumb { background:var(--color-light); border-bottom:1px solid var(--color-gray-light); }
.av-breadcrumb ol { list-style:none; display:flex; flex-wrap:wrap; gap:var(--space-2); align-items:center; padding:var(--space-3) 0; margin:0; font-size:var(--font-size-sm); color:var(--color-gray); }
.av-breadcrumb a { color:var(--color-gray-dark); }
.av-breadcrumb a:hover { color:var(--svc-accent); }
.av-breadcrumb [aria-current] { color:var(--svc-accent); font-weight:600; }
.av-breadcrumb-sep { color:var(--color-gray-light); }

/* =====================================================
   1 · HERO — layered photo + gradient overlay + noise
   ===================================================== */
.av-hero { position:relative; min-height:60vh; display:flex; align-items:center; padding:104px 0 var(--space-16); overflow:hidden; }
.av-hero__bg { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
.av-hero::before { content:''; position:absolute; inset:0; z-index:1;
  background:linear-gradient(var(--svc-grad-angle), rgba(var(--color-secondary-rgb),.95) 0%, rgba(var(--color-secondary-rgb),.83) 46%, rgba(var(--color-secondary-rgb),.58) 100%); }
.av-hero::after { content:''; position:absolute; inset:0; z-index:1; pointer-events:none; opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.av-hero__inner { position:relative; z-index:2; max-width:840px; }
.av-hero__eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-sm); font-weight:600; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(255,255,255,.16); padding:var(--space-2) var(--space-4); border-radius:var(--radius-full); margin-bottom:var(--space-5); }
.av-hero__eyebrow svg { width:16px; height:16px; }
.av-hero h1 { color:var(--color-white); font-size:clamp(2.3rem,5vw,3.9rem); line-height:1.04; margin-bottom:var(--space-5); }
.av-hero h1 .text-accent { font-size:1.06em; }
.hero-answer { color:rgba(255,255,255,.9); font-size:var(--font-size-lg); line-height:1.7; max-width:60ch; margin-bottom:var(--space-6); }
.av-hero__actions { display:flex; flex-wrap:wrap; gap:var(--space-4); margin-bottom:var(--space-8); }
.av-hero__actions .btn svg { width:18px; height:18px; }
.av-hero__trust { display:flex; flex-wrap:wrap; gap:var(--space-3) var(--space-6); }
.av-hero__trust-item { position:relative; display:flex; align-items:center; gap:var(--space-2); color:rgba(255,255,255,.92); font-size:var(--font-size-sm); font-weight:500; }
.av-hero__trust-item svg { width:18px; height:18px; color:var(--color-accent); flex-shrink:0; }
.av-hero__trust-item + .av-hero__trust-item::before { content:''; position:absolute; left:calc(-1 * var(--space-3)); top:50%; width:1px; height:16px; transform:translateY(-50%); background:rgba(255,255,255,.22); }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background:var(--svc-accent-soft); border-left:4px solid var(--svc-accent); border-radius:var(--radius-md); padding:var(--space-5) var(--space-6); color:var(--color-gray-dark); line-height:1.7; font-size:var(--font-size-lg); max-width:72ch; margin:0 auto; }
.section-header .answer-block { margin-top:var(--space-4); text-align:left; }

/* =====================================================
   2 · PROBLEM — pull-quote + warning-sign bento
   ===================================================== */
.av-problem { background:var(--color-white); }
.av-pullquote { font-family:var(--font-heading); font-weight:800; font-size:clamp(1.6rem,3.4vw,2.5rem); line-height:1.25; color:var(--color-dark); max-width:24ch; margin:var(--space-8) 0 var(--space-4); }
.av-pullquote span { color:var(--svc-accent); }
.av-signs { display:grid; grid-template-columns:repeat(4,1fr); gap:var(--space-5); margin-top:var(--space-10); }
.av-sign { position:relative; overflow:hidden; background:var(--color-light); border:1px solid var(--color-gray-light); border-radius:var(--radius-lg); padding:var(--space-6); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.av-sign:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.av-sign:first-child { grid-column:span 2; background:linear-gradient(135deg, var(--svc-accent-soft), var(--color-white)); }
.av-sign::after { content:''; position:absolute; left:0; top:0; width:4px; height:0; background:var(--svc-accent); transition:height var(--transition-base); }
.av-sign:hover::after { height:100%; }
.av-sign__ico { width:48px; height:48px; border-radius:var(--radius-md); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-4); }
.av-sign__ico svg { width:24px; height:24px; }
.av-sign h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.av-sign p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   3 · EXPERT POSITIONING — asymmetric stat + copy + photo
   ===================================================== */
.av-expert { background:var(--color-secondary); position:relative; overflow:hidden; }
.av-expert::before { content:''; position:absolute; inset:0; pointer-events:none;
  background:radial-gradient(ellipse at 85% 0%, rgba(var(--color-primary-rgb),.22) 0%, transparent 60%); }
.av-expert .container { position:relative; z-index:1; }
.av-expert-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-16); align-items:center; }
.av-expert-copy .eyebrow { display:inline-block; font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-3); }
.av-expert-copy h2 { color:var(--color-white); margin-bottom:var(--space-4); }
.av-expert-copy .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.9); margin:0 0 var(--space-6); }
.av-expert-stats { display:flex; gap:var(--space-8); margin:var(--space-6) 0; flex-wrap:wrap; }
.av-expert-stat { position:relative; padding-bottom:var(--space-3); }
.av-expert-stat .num { font-family:var(--font-heading); font-weight:800; font-size:clamp(2.4rem,5vw,3.25rem); line-height:1; color:var(--color-accent); }
.av-expert-stat .lbl { font-size:var(--font-size-sm); color:rgba(255,255,255,.75); margin-top:var(--space-2); text-transform:uppercase; letter-spacing:1px; }
.av-expert-stat::after { content:''; position:absolute; left:0; bottom:0; width:32px; height:3px; border-radius:var(--radius-full); background:var(--color-accent); }
.av-expert-diffs { list-style:none; margin:var(--space-6) 0 0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.av-expert-diffs li { display:flex; gap:var(--space-3); color:rgba(255,255,255,.88); font-size:var(--font-size-base); line-height:1.55; }
.av-expert-diffs svg { width:22px; height:22px; color:var(--color-accent); flex-shrink:0; margin-top:2px; }
.av-expert-figure { position:relative; }
.av-expert-figure img { width:100%; border-radius:var(--radius-lg); box-shadow:var(--shadow-xl); object-fit:cover; transition:transform var(--transition-slow); }
.av-expert-figure:hover img { transform:scale(1.03); }
.av-expert-figure::after { content:''; position:absolute; inset:0; border-radius:var(--radius-lg); background:linear-gradient(to top, rgba(var(--color-secondary-rgb),.4) 0%, transparent 55%); pointer-events:none; }

/* =====================================================
   4 · SIGNATURE — balanced airflow intake/exhaust diagram
   (unique to this page)
   ===================================================== */
.av-airflow { background:var(--color-light); position:relative; overflow:hidden; }
.av-airflow__float { position:absolute; top:10%; left:3%; width:200px; height:200px; border-radius:50%; background:radial-gradient(circle, rgba(var(--color-primary-rgb),.06), transparent 70%); pointer-events:none; }
.av-airflow__stage { display:grid; grid-template-columns:1fr auto 1fr; gap:var(--space-6); align-items:center; margin-top:var(--space-12); }
.av-flow { position:relative; border-radius:var(--radius-lg); padding:var(--space-8); border:1px solid var(--color-gray-light); background:var(--color-white); box-shadow:var(--shadow-md); }
.av-flow--intake { background:linear-gradient(160deg, color-mix(in srgb, var(--color-secondary) 12%, #fff), var(--color-white)); }
.av-flow--exhaust { background:linear-gradient(160deg, color-mix(in srgb, var(--color-primary) 14%, #fff), var(--color-white)); }
.av-flow__badge { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:2px; padding:var(--space-1) var(--space-3); border-radius:var(--radius-full); margin-bottom:var(--space-4); }
.av-flow--intake .av-flow__badge { color:var(--color-secondary); background:color-mix(in srgb, var(--color-secondary) 12%, #fff); }
.av-flow--exhaust .av-flow__badge { color:var(--svc-accent); background:color-mix(in srgb, var(--color-primary) 14%, #fff); }
.av-flow__ico { width:52px; height:52px; border-radius:var(--radius-md); display:flex; align-items:center; justify-content:center; color:var(--color-white); margin-bottom:var(--space-4); }
.av-flow--intake .av-flow__ico { background:var(--color-secondary); }
.av-flow--exhaust .av-flow__ico { background:var(--svc-accent); }
.av-flow__ico svg { width:26px; height:26px; }
.av-flow h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.av-flow p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }
.av-flow__arrows { display:flex; gap:var(--space-1); margin-top:var(--space-5); color:var(--svc-accent); }
.av-flow--intake .av-flow__arrows { color:var(--color-secondary); }
.av-flow__arrows span { display:inline-block; width:10px; height:10px; border-top:3px solid currentColor; border-right:3px solid currentColor; transform:rotate(45deg); animation:av-drift 1.8s ease-in-out infinite; }
.av-flow__arrows span:nth-child(2) { animation-delay:.2s; }
.av-flow__arrows span:nth-child(3) { animation-delay:.4s; }
.av-flow--exhaust .av-flow__arrows { justify-content:flex-end; }
@keyframes av-drift { 0%,100% { opacity:.35; } 50% { opacity:1; } }
.av-roof { display:flex; flex-direction:column; align-items:center; justify-content:flex-end; gap:var(--space-3); min-width:180px; }
.av-roof__exhaust { display:flex; flex-direction:column; align-items:center; color:var(--svc-accent); }
.av-roof__exhaust svg { width:30px; height:30px; animation:av-rise 2.4s ease-in-out infinite; }
.av-roof__exhaust-label { font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:1px; color:var(--svc-accent); }
@keyframes av-rise { 0%,100% { transform:translateY(0); opacity:.7; } 50% { transform:translateY(-8px); opacity:1; } }
.av-roof__house { width:180px; height:120px; background:linear-gradient(180deg, color-mix(in srgb, var(--color-secondary) 88%, #000), var(--color-secondary)); clip-path:polygon(50% 0, 100% 46%, 100% 100%, 0 100%, 0 46%); box-shadow:var(--shadow-lg); position:relative; }
.av-roof__house::after { content:''; position:absolute; left:50%; bottom:14%; width:34%; height:44%; transform:translateX(-50%); border-radius:var(--radius-sm) var(--radius-sm) 0 0; background:color-mix(in srgb, var(--color-accent) 70%, #fff); }
.av-roof__intake-label { font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:1px; color:var(--color-secondary); }

/* =====================================================
   5 · BREAKDOWN — signature checklist + install timeline
   ===================================================== */
.av-breakdown { background:var(--color-white); position:relative; }
.av-check-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-5) var(--space-8); margin-top:var(--space-12); counter-reset:chk; }
.av-check { position:relative; padding:var(--space-5) var(--space-5) var(--space-5) var(--space-16); background:var(--color-light); border-radius:var(--radius-md); border:1px solid var(--color-gray-light); transition:transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast); }
.av-check:hover { transform:translateY(-3px); box-shadow:var(--shadow-md); border-color:color-mix(in srgb, var(--svc-accent) 35%, var(--color-gray-light)); }
.av-check::before { counter-increment:chk; content:counter(chk,decimal-leading-zero); position:absolute; left:var(--space-5); top:var(--space-5); font-family:var(--font-heading); font-weight:800; font-size:var(--font-size-lg); color:var(--svc-accent); }
.av-check h3 { font-size:var(--font-size-base); color:var(--color-dark); margin-bottom:var(--space-1); }
.av-check p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; margin:0; }
.av-timeline { max-width:820px; margin:var(--space-12) auto 0; position:relative; }
.av-timeline::before { content:''; position:absolute; left:23px; top:8px; bottom:8px; width:2px; background:linear-gradient(to bottom, var(--svc-accent), var(--color-accent)); }
.av-tl-step { position:relative; padding:0 0 var(--space-8) var(--space-16); }
.av-tl-step:last-child { padding-bottom:0; }
.av-tl-step__num { position:absolute; left:0; top:0; width:48px; height:48px; border-radius:var(--radius-full); background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); font-family:var(--font-heading); font-weight:800; display:flex; align-items:center; justify-content:center; box-shadow:var(--shadow-md); z-index:1; transition:transform var(--transition-base), box-shadow var(--transition-base); }
.av-tl-step:hover .av-tl-step__num { transform:scale(1.08); box-shadow:var(--shadow-lg); }
.av-tl-step h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-1); }
.av-tl-step p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   6 · PROOF — reviews + project photos
   ===================================================== */
.av-proof { background:var(--color-dark); position:relative; overflow:hidden; }
.av-proof::before { content:''; position:absolute; inset:0; pointer-events:none; background:radial-gradient(ellipse at 15% 100%, rgba(var(--color-primary-rgb),.2) 0%, transparent 60%); }
.av-proof .container { position:relative; z-index:1; }
.av-proof .section-header h2 { color:var(--color-white); }
.av-proof .section-header .eyebrow { color:var(--color-accent); }
.av-proof .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.88); }
.av-proof-photos { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); margin-top:var(--space-10); }
.av-proof-photos figure { position:relative; margin:0; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl); }
.av-proof-photos img { width:100%; height:100%; object-fit:cover; aspect-ratio:4/3; transition:transform var(--transition-slow); }
.av-proof-photos figure:hover img { transform:scale(1.05); }
.av-reviews { margin-top:var(--space-8); min-height:100px; }
.av-proof-badges { display:flex; flex-wrap:wrap; gap:var(--space-4); justify-content:center; margin-top:var(--space-8); }
.av-proof-badges a { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); color:var(--color-white); font-size:var(--font-size-sm); font-weight:600; padding:var(--space-3) var(--space-5); border-radius:var(--radius-full); transition:background var(--transition-fast), border-color var(--transition-fast); }
.av-proof-badges a:hover { background:rgba(var(--color-primary-rgb),.2); border-color:var(--svc-accent); color:var(--color-white); }
.av-proof-badges svg { width:18px; height:18px; color:var(--color-star); }

/* =====================================================
   7 · COMPARISON — ridge vs box, two column
   ===================================================== */
.av-compare { background:var(--color-white); }
.av-compare-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-8); margin-top:var(--space-12); }
.av-compare-col { border-radius:var(--radius-lg); padding:var(--space-8); border:1px solid var(--color-gray-light); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.av-compare-col--alt { background:var(--color-light); }
.av-compare-col--primary { background:linear-gradient(160deg, var(--svc-accent-soft), var(--color-white)); border-color:color-mix(in srgb, var(--svc-accent) 30%, #fff); box-shadow:var(--shadow-lg); }
.av-compare-col--primary:hover { transform:translateY(-4px); box-shadow:var(--shadow-xl); }
.av-compare-col h3 { font-size:var(--font-size-xl); margin-bottom:var(--space-5); display:flex; align-items:center; gap:var(--space-3); }
.av-compare-col--primary h3 { color:var(--svc-accent); }
.av-compare-col ul { list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.av-compare-col li { display:flex; gap:var(--space-3); font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; }
.av-compare-col li svg { width:20px; height:20px; flex-shrink:0; margin-top:2px; }
.av-compare-col--alt li svg { color:var(--color-gray); }
.av-compare-col--primary li svg { color:var(--color-success); }

/* =====================================================
   8 · FAQ
   ===================================================== */
.av-faq { background:var(--color-light); }
.av-faq-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); align-items:start; margin-top:var(--space-10); }
.faq-item { background:var(--color-white); border-radius:var(--radius-lg); border:1px solid var(--color-gray-light); overflow:hidden; transition:box-shadow var(--transition-base), border-color var(--transition-base); }
.faq-item[open] { box-shadow:var(--shadow-md); }
.faq-item:not([open]):hover { box-shadow:var(--shadow-sm); border-color:color-mix(in srgb, var(--svc-accent) 30%, var(--color-gray-light)); }
.faq-item:not([open]):hover summary { color:var(--svc-accent); }
.faq-item summary { list-style:none; cursor:pointer; display:flex; align-items:center; gap:var(--space-3); padding:var(--space-5) var(--space-6); font-family:var(--font-heading); font-weight:600; font-size:var(--font-size-base); color:var(--color-dark); }
.faq-item summary::-webkit-details-marker { display:none; }
.av-faq-icon { flex-shrink:0; width:32px; height:32px; border-radius:var(--radius-full); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; transition:transform var(--transition-base); }
.av-faq-icon svg { width:18px; height:18px; }
.faq-item[open] .av-faq-icon { transform:rotate(45deg); }
.faq-answer { padding:0 var(--space-6) var(--space-6) calc(var(--space-6) + var(--space-8)); }
.faq-answer p { color:var(--color-gray-dark); font-size:var(--font-size-sm); margin:0; line-height:1.7; }

/* =====================================================
   RELATED SERVICES (required-components cards)
   ===================================================== */
.av-related { background:var(--color-white); }
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
.av-cta { position:relative; overflow:hidden; text-align:center; padding:var(--space-16) 0;
  background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 82%, #000) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.av-cta::before { content:''; position:absolute; inset:0; pointer-events:none; opacity:.06;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.av-cta .container { position:relative; z-index:1; }
.av-cta h2 { color:var(--color-white); font-size:clamp(1.9rem,4vw,2.75rem); margin-bottom:var(--space-4); }
.av-cta .answer-block { background:rgba(255,255,255,.1); border-left-color:var(--color-white); color:rgba(255,255,255,.92); max-width:60ch; margin:0 auto var(--space-8); }
.av-cta__actions { display:flex; gap:var(--space-4); justify-content:center; flex-wrap:wrap; }
.av-cta .btn svg { width:18px; height:18px; }
.av-cta .phone-line { margin-top:var(--space-6); color:rgba(255,255,255,.82); }
.av-cta .phone-line a { color:var(--color-accent); font-weight:700; }

/* ---- SVG dividers ---- */
.svg-divider { display:block; overflow:hidden; line-height:0; }
.svg-divider svg { display:block; width:100%; height:100%; }
.svg-divider--diagonal { height:60px; }
.svg-divider--wave { height:72px; }

/* ---- Focus visibility (WCAG AA) ---- */
.av-hero a:focus-visible, .service-card__cta:focus-visible, .av-cta a:focus-visible, .av-proof-badges a:focus-visible, .faq-item summary:focus-visible, .av-sign:focus-within { outline:3px solid var(--color-accent); outline-offset:2px; border-radius:var(--radius-sm); }
::selection { background:rgba(var(--color-primary-rgb),.85); color:var(--color-white); }

/* =====================================================
   MULTI-DIRECTIONAL REVEALS
   ===================================================== */
[data-animate].av-rv-left { transform:translateX(-36px); }
[data-animate].av-rv-right { transform:translateX(36px); }
[data-animate].av-rv-down { transform:translateY(-30px); }
[data-animate].av-rv-scale { transform:scale(0.93); }
[data-animate].av-rv-left.animated,
[data-animate].av-rv-right.animated,
[data-animate].av-rv-down.animated,
[data-animate].av-rv-scale.animated { transform:none; }

/* ---- Hero eyebrow pulse ---- */
.av-hero__eyebrow svg { animation:av-pulse 2.6s ease-in-out infinite; }
@keyframes av-pulse { 0%,100% { opacity:1; } 50% { opacity:.55; } }

@media (prefers-reduced-motion: reduce) {
  .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img, .av-sign:hover { transform:none; }
  .av-hero__eyebrow svg, .av-flow__arrows span, .av-roof__exhaust svg { animation:none; }
  .av-check:hover, .av-tl-step:hover .av-tl-step__num, .av-compare-col--primary:hover, .av-expert-figure:hover img, .av-proof-photos figure:hover img { transform:none; }
  [data-animate].av-rv-left, [data-animate].av-rv-right, [data-animate].av-rv-down, [data-animate].av-rv-scale { transform:none; }
}
@media (max-width:1024px) {
  .av-expert-grid { grid-template-columns:1fr; gap:var(--space-10); }
  .av-signs { grid-template-columns:1fr 1fr; }
  .av-sign:first-child { grid-column:span 2; }
  .av-check-grid { grid-template-columns:1fr 1fr; }
  .services-grid { grid-template-columns:repeat(2,1fr); }
}
@media (max-width:900px) {
  .av-expert-stats { gap:var(--space-6); }
  .av-pullquote { max-width:none; }
  .av-airflow__stage { grid-template-columns:1fr; gap:var(--space-8); }
  .av-roof { order:-1; margin:0 auto; }
}
@media (max-width:768px) {
  .av-compare-grid { grid-template-columns:1fr; }
  .av-faq-grid { grid-template-columns:1fr; }
  .av-timeline::before { left:19px; }
  .av-tl-step { padding-left:var(--space-12); }
  .av-tl-step__num { width:40px; height:40px; }
}
@media (max-width:600px) {
  .av-signs { grid-template-columns:1fr; }
  .av-sign:first-child { grid-column:auto; }
  .av-check-grid { grid-template-columns:1fr; }
  .av-proof-photos { grid-template-columns:1fr; }
  .services-grid { grid-template-columns:1fr; }
  .av-hero h1 { font-size:clamp(2rem,8vw,2.6rem); }
}
@media (max-width:480px) {
  .av-hero__actions .btn, .av-cta__actions .btn { width:100%; justify-content:center; }
  .av-compare-col { padding:var(--space-6); }
  .av-proof-badges a { width:100%; justify-content:center; }
}

/* ---- Print — ink-friendly fallback ---- */
@media print {
  .av-hero, .av-cta, .av-expert, .av-proof { background:none !important; color:var(--color-dark) !important; }
  .av-hero__bg, .av-airflow__float, .svg-divider { display:none !important; }
  .av-hero h1, .hero-answer, .av-expert-copy h2, .av-proof .section-header h2 { color:var(--color-dark) !important; }
  .faq-item, .av-sign, .av-check { break-inside:avoid; }
  [data-animate] { opacity:1 !important; transform:none !important; }
}
</style>

<div class="av-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="av-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="av-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="av-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Attic Venting</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="av-hero" aria-label="Attic venting in Huffman, TX">
  <img class="av-hero__bg"
       src="/assets/images/attic-venting.jpg"
       srcset="/assets/images/attic-venting-480.webp 480w, /assets/images/attic-venting-960.webp 960w, /assets/images/attic-venting-1600.webp 1600w"
       sizes="100vw"
       alt="Ridge line and fresh framing during an attic ventilation upgrade on a Huffman, TX roof"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container av-hero__inner">
    <span class="av-hero__eyebrow"><?php echo icon('wind', 16); ?> Attic Venting · Huffman, TX</span>
    <h1>Attic Venting &amp; Roof Ventilation in <span class="text-accent">Huffman</span>, TX</h1>
    <p class="hero-answer">
      Triple G Roofing is a licensed, insured Texas roofing contractor based in Huffman serving North Harris County.
      We install balanced attic ventilation — soffit intake paired with ridge exhaust — that pulls Gulf Coast heat out
      of your attic, protects your shingles, and trims summer cooling bills for Huffman homeowners.
    </p>
    <div class="av-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Ventilation Quote</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="av-hero__trust">
      <span class="av-hero__trust-item"><?php echo icon('wind', 18); ?> Balanced intake &amp; exhaust</span>
      <span class="av-hero__trust-item"><?php echo icon('shield', 18); ?> Licensed &amp; insured</span>
      <span class="av-hero__trust-item"><?php echo icon('check-circle', 18); ?> Protects your shingle warranty</span>
      <span class="av-hero__trust-item"><?php echo icon('clock', 18); ?> 8am&ndash;8pm, 7 days</span>
    </div>
  </div>
</section>

<!-- ===================== 2 · PROBLEM ===================== -->
<section class="section av-problem" aria-label="Signs your attic needs better ventilation">
  <div class="container">
    <div class="section-header" style="text-align:left; max-width:820px; margin-inline:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Why It Matters</span>
      <h2>Is your Huffman attic telling you it needs better ventilation?</h2>
      <p class="answer-block">
        If your upstairs rooms feel like an oven, your summer energy bills keep climbing, or your shingles are curling
        early, your Huffman attic is likely trapping heat and moisture. Poor ventilation bakes the underside of your
        roof — and in the Gulf Coast climate, that trapped heat shortens shingle life fast.
      </p>
    </div>
    <p class="av-pullquote">A hot, stuffy attic doesn&rsquo;t stay in the attic — <span>it drives up your bills and ages your roof from the inside out.</span></p>
    <div class="av-signs">
      <div class="av-sign av-rv-left" data-animate>
        <div class="av-sign__ico"><?php echo icon('wind', 24); ?></div>
        <h3>Your attic feels like an oven</h3>
        <p>Step into your attic on a summer afternoon and it feels like a furnace. In a poorly vented Huffman home, that trapped heat radiates straight down into your living space — and your air conditioner never catches up.</p>
      </div>
      <div class="av-sign av-rv-scale" data-animate>
        <div class="av-sign__ico"><?php echo icon('arrow-up', 24); ?></div>
        <h3>Summer energy bills keep climbing</h3>
        <p>When hot air has nowhere to escape, your AC runs longer and harder — and you feel it every month.</p>
      </div>
      <div class="av-sign av-rv-scale" data-animate>
        <div class="av-sign__ico"><?php echo icon('shield', 24); ?></div>
        <h3>Shingles curling or aging early</h3>
        <p>Heat baking the underside of your roof deck cooks shingles from below, curling edges and cutting years off their life.</p>
      </div>
      <div class="av-sign av-rv-right" data-animate>
        <div class="av-sign__ico"><?php echo icon('droplets', 24); ?></div>
        <h3>A musty, mildew smell upstairs</h3>
        <p>Trapped humid Gulf Coast air condenses on cool framing, feeding mildew, wood rot, and that damp smell in your upstairs rooms.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-secondary)" points="0,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== 3 · EXPERT POSITIONING ===================== -->
<section class="section av-expert" aria-label="Why our attic venting is different">
  <div class="container">
    <div class="av-expert-grid">
      <div class="av-expert-copy">
        <span class="eyebrow">The Triple G Standard</span>
        <h2>What makes Triple G Roofing&rsquo;s attic venting different?</h2>
        <p class="answer-block">
          Triple G Roofing treats ventilation as a system, not an afterthought. We size intake and exhaust to your
          roof&rsquo;s square footage, clear the blocked soffits most crews ignore, and verify real airflow before we
          leave. Because owner Tim Menn&rsquo;s team works in this Gulf Coast heat daily, we build for how Huffman
          summers actually behave.
        </p>
        <div class="av-expert-stats">
          <div class="av-expert-stat"><div class="num">Balanced</div><div class="lbl">Intake + exhaust</div></div>
          <div class="av-expert-stat"><div class="num">10&nbsp;yr</div><div class="lbl">Workmanship warranty</div></div>
          <div class="av-expert-stat"><div class="num">25&nbsp;mi</div><div class="lbl">Service radius</div></div>
        </div>
        <ul class="av-expert-diffs">
          <li><?php echo icon('check-circle', 22); ?> Every system sized to your roof&rsquo;s square footage, not a one-size guess</li>
          <li><?php echo icon('check-circle', 22); ?> Soffits cleared and sealed so intake actually flows, not just added exhaust</li>
          <li><?php echo icon('check-circle', 22); ?> The same local Huffman crew from attic assessment to final airflow check</li>
        </ul>
      </div>
      <div class="av-expert-figure av-rv-right" data-animate>
        <img src="/assets/images/roof-inspection.jpg"
             srcset="/assets/images/roof-inspection-480.webp 480w, /assets/images/roof-inspection-960.webp 960w, /assets/images/roof-inspection-1600.webp 1600w"
             sizes="(max-width: 1024px) 100vw, 520px"
             alt="Triple G Roofing inspecting the ridge and vents on a Huffman, TX roof"
             width="600" height="700" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE — AIRFLOW DIAGRAM ===================== -->
<section class="section av-airflow" aria-label="How balanced attic ventilation works">
  <span class="av-airflow__float" aria-hidden="true"></span>
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">The Science, Simply</span>
      <h2>How does balanced attic ventilation work?</h2>
      <p class="answer-block">
        Balanced attic ventilation pairs low intake with high exhaust. Cool outside air enters through soffit and eave
        vents near the roof&rsquo;s edge, then rises as it warms and pushes hot, humid air out through ridge vents at the
        peak. That continuous loop keeps your Huffman attic cooler and drier all year.
      </p>
    </div>
    <div class="av-airflow__stage">
      <div class="av-flow av-flow--intake av-rv-left" data-animate>
        <span class="av-flow__badge">Intake</span>
        <div class="av-flow__ico"><?php echo icon('wind', 26); ?></div>
        <h3>Soffit &amp; eave vents</h3>
        <p>Placed low along the eaves, intake vents draw cool outside air into the attic and feed the whole system. Without enough intake, even the best ridge vent can only starve for air.</p>
        <div class="av-flow__arrows" aria-hidden="true"><span></span><span></span><span></span></div>
      </div>
      <div class="av-roof" aria-hidden="true">
        <div class="av-roof__exhaust">
          <?php echo icon('arrow-up', 30); ?>
          <span class="av-roof__exhaust-label">Hot air out</span>
        </div>
        <div class="av-roof__house"></div>
        <span class="av-roof__intake-label">Cool air in</span>
      </div>
      <div class="av-flow av-flow--exhaust av-rv-right" data-animate>
        <span class="av-flow__badge">Exhaust</span>
        <div class="av-flow__ico"><?php echo icon('arrow-up', 26); ?></div>
        <h3>Ridge vents</h3>
        <p>Running the length of the peak, ridge vents let the hottest, most humid air escape naturally as it rises. Paired with soffit intake, they create the steady convection loop your Huffman attic needs.</p>
        <div class="av-flow__arrows" aria-hidden="true"><span></span><span></span><span></span></div>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,72 900,0 1200,36 L1200,72 L0,72 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 5 · BREAKDOWN ===================== -->
<section class="section av-breakdown" aria-label="What is included in an attic ventilation upgrade">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">On Every Job</span>
      <h2>What&rsquo;s included in a Triple G Roofing attic ventilation upgrade?</h2>
      <p class="answer-block">
        Every Triple G Roofing ventilation upgrade starts with a full attic assessment, then a right-sized mix of intake
        and exhaust matched to your roof&rsquo;s square footage. We seal gaps, clear blocked soffits, install ridge or
        box vents, and verify real airflow before we leave your Huffman home.
      </p>
    </div>
    <div class="av-check-grid">
      <div class="av-check"><h3>Attic assessment</h3><p>We measure your attic square footage and check what intake and exhaust already exist.</p></div>
      <div class="av-check"><h3>Balanced venting plan</h3><p>A right-sized mix of intake and exhaust matched to your roof and built to code.</p></div>
      <div class="av-check"><h3>Ridge or box exhaust</h3><p>Continuous ridge vents or box vents installed near the peak to release trapped hot air.</p></div>
      <div class="av-check"><h3>Soffit &amp; eave intake</h3><p>Blocked or missing soffit vents opened and added so cool air can actually enter.</p></div>
      <div class="av-check"><h3>Air sealing &amp; baffles</h3><p>Gaps sealed and baffles set so insulation never chokes the airflow path.</p></div>
      <div class="av-check"><h3>Final airflow check</h3><p>We confirm the system draws properly, then clean up and leave your attic breathing.</p></div>
    </div>
    <div class="av-timeline">
      <div class="av-tl-step" data-animate>
        <div class="av-tl-step__num">1</div>
        <h3>Free attic evaluation</h3>
        <p>We inspect your attic and roofline across Huffman and North Harris County, then explain what your venting is doing today.</p>
      </div>
      <div class="av-tl-step" data-animate>
        <div class="av-tl-step__num">2</div>
        <h3>Right-sized vent plan</h3>
        <p>You get a clear, itemized quote with the exact intake and exhaust your roof needs — no upsells, no guesswork.</p>
      </div>
      <div class="av-tl-step" data-animate>
        <div class="av-tl-step__num">3</div>
        <h3>Clean, code-built install</h3>
        <p>Our crew installs soffit intake and ridge or box exhaust, seals gaps, and sets baffles to protect your insulation.</p>
      </div>
      <div class="av-tl-step" data-animate>
        <div class="av-tl-step__num">4</div>
        <h3>Airflow verified</h3>
        <p>We confirm the system pulls cool air in and hot air out, then walk you through everything before we pack up.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROOF ===================== -->
<section class="section av-proof" aria-label="Reviews and recent work">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Trusted Locally</span>
      <h2>What do Huffman homeowners say about Triple G Roofing?</h2>
      <p class="answer-block">
        Triple G Roofing has earned its reputation across Huffman, Humble, Atascocita, Kingwood, and Crosby the
        old-fashioned way — by showing up, doing the work right, and standing behind it. Read our verified Google
        reviews below and see recent roofing projects from around North Harris County.
      </p>
    </div>

    <div class="av-proof-photos" data-animate>
      <figure>
        <img src="/assets/images/roof-repair.jpg"
             srcset="/assets/images/roof-repair-480.webp 480w, /assets/images/roof-repair-960.webp 960w, /assets/images/roof-repair-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Triple G Roofing crew reworking the roof deck and vents on a Huffman home"
             width="600" height="450" loading="lazy">
      </figure>
      <figure>
        <img src="/assets/images/hero-roof-home.jpg"
             srcset="/assets/images/hero-roof-home-480.webp 480w, /assets/images/hero-roof-home-960.webp 960w, /assets/images/hero-roof-home-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Completed architectural shingle roof with balanced ridge ventilation in Huffman, TX"
             width="600" height="450" loading="lazy">
      </figure>
    </div>

    <div class="av-reviews">
      <?php echo $elfsightEmbed; ?>
    </div>

    <div class="av-proof-badges" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- ===================== 7 · COMPARISON ===================== -->
<section class="section av-compare" aria-label="Ridge vents versus box vents">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Know The Difference</span>
      <h2>Ridge vents or box vents &mdash; which is right for your Huffman roof?</h2>
      <p class="answer-block">
        For most Huffman homes, continuous ridge vents move more hot air more evenly than scattered box vents, because
        they exhaust along the entire peak. Box vents still make sense on complex or short-ridge roofs. Triple G Roofing
        recommends whichever design actually fits your roofline and airflow needs.
      </p>
    </div>
    <div class="av-compare-grid">
      <div class="av-compare-col av-compare-col--primary">
        <h3><?php echo icon('check-circle', 22); ?> Ridge vents</h3>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> Exhaust hot air evenly along the entire peak</li>
          <li><?php echo icon('check-circle', 20); ?> Low profile that blends cleanly into the roofline</li>
          <li><?php echo icon('check-circle', 20); ?> Ideal for homes with long, continuous ridge lines</li>
          <li><?php echo icon('check-circle', 20); ?> Pairs perfectly with soffit intake for balanced flow</li>
        </ul>
      </div>
      <div class="av-compare-col av-compare-col--alt">
        <h3><?php echo icon('wind', 22); ?> Box vents</h3>
        <ul>
          <li><?php echo icon('minus', 20); ?> Individual exhaust units set near the ridge</li>
          <li><?php echo icon('minus', 20); ?> A fit for complex roofs with short or broken ridges</li>
          <li><?php echo icon('minus', 20); ?> More units needed to match a ridge vent&rsquo;s airflow</li>
          <li><?php echo icon('minus', 20); ?> Still effective when a continuous ridge isn&rsquo;t possible</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,72 900,0 1200,36 L1200,72 L0,72 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section av-faq" aria-label="Attic ventilation FAQs">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Good Questions</span>
      <h2>What else do Huffman homeowners ask about attic ventilation?</h2>
      <p class="answer-block">
        Straight answers on cost, energy savings, vent types, and Gulf Coast humidity — everything Huffman homeowners
        want to know before they upgrade the ventilation on their roof.
      </p>
    </div>
    <div class="av-faq-grid">
      <?php foreach ($faqs as $i => $f): ?>
      <details class="faq-item"<?php echo $i === 0 ? ' open' : ''; ?> data-animate>
        <summary>
          <span class="av-faq-icon" aria-hidden="true"><?php echo icon('plus', 18); ?></span>
          <?php echo htmlspecialchars($f['q']); ?>
        </summary>
        <div class="faq-answer"><p><?php echo htmlspecialchars($f['a']); ?></p></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== FINAL CTA ===================== -->
<section class="av-cta" aria-label="Book an attic ventilation quote">
  <div class="container">
    <h2>Ready to cool down your Huffman attic for good?</h2>
    <p class="answer-block">
      Triple G Roofing will inspect your attic, size the right intake-and-exhaust system for your roof, and give you a
      firm quote — same-day response across Huffman and North Harris County, 8am to 8pm, seven days a week.
    </p>
    <div class="av-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get My Free Ventilation Quote</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <p class="phone-line">Prefer to talk? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — 8am to 8pm, 7 days a week.</p>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section av-related" aria-label="Other roofing services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Keep Exploring</span>
      <h2>What other roofing services might your Huffman home need?</h2>
      <p class="answer-block" style="margin-inline:auto;">
        Ventilation works best as part of a healthy roof system. If Triple G Roofing spots wear or damage while we are
        up there, here is how we handle the rest for Huffman homeowners.
      </p>
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

</div><!-- /.av-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
