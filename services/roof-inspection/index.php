<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Service — Roof Inspection · Triple G Roofing (Phase 4)
   Premium editorial service page (8-section structure)
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Roof Inspection';
$serviceSlug     = 'roof-inspection';
$pageTitle       = 'Roof Inspection Huffman TX | Triple G Roofing';
$pageDescription = 'Same-day, photo-documented roof inspections in Huffman, TX from Triple G Roofing. Storm-damage assessments that back up your insurance claim. Free & honest. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';

/* --- FAQs specific to roof inspection in Huffman --- */
$faqs = [
    [
        'q' => 'How much does a roof inspection cost in Huffman, TX?',
        'a' => 'Triple G Roofing provides free, no-obligation roof inspections for Huffman-area homeowners. There is no charge to have us climb your roof, photograph any damage, and give you an honest assessment — whether the work turns into a repair, a claim, or nothing at all.',
    ],
    [
        'q' => 'How long does a roof inspection take?',
        'a' => 'Most residential roof inspections in Huffman take 45 minutes to about an hour. Larger or steeper roofs take a little longer. You get a photo-documented report the same day, so you are never left waiting to find out what is going on above your ceiling.',
    ],
    [
        'q' => 'Do I need a roof inspection after a Huffman hailstorm?',
        'a' => 'Yes. Hail and Gulf Coast wind often bruise shingles and loosen granules without an obvious leak, and insurers frequently deny claims filed months later. A prompt, documented inspection after a storm protects both your roof and your ability to file a valid claim.',
    ],
    [
        'q' => 'Will you help me file an insurance claim?',
        'a' => 'Absolutely. When our inspection finds storm damage, Triple G Roofing builds a claim-ready report, meets your adjuster on site, and communicates directly with your insurer — so the paperwork does not land on your kitchen table.',
    ],
    [
        'q' => 'How often should I have my roof inspected?',
        'a' => 'Plan on an annual inspection and an extra look after any major North Harris County storm. Catching a lifted shingle or failing flashing early is far cheaper than repairing the water damage it causes once it reaches your decking and ceilings.',
    ],
    [
        'q' => 'Can you inspect my roof if I am buying or selling a Huffman home?',
        'a' => 'Yes. We provide clear, unbiased condition reports for buyers and sellers across Huffman, Humble, Atascocita, Kingwood, and Crosby, so everyone at the closing table knows exactly what shape the roof is in before money changes hands.',
    ],
];

/* --- Related services (3 cards) --- */
$relatedServices = [
    [
        'name' => 'Roof Repair', 'slug' => 'roof-repair', 'img' => 'roof-repair',
        'alt' => 'Roof decking exposed during a repair on a Huffman home',
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
    "description" => 'Same-day, photo-documented roof inspections in Huffman, TX that assess storm damage, catch early wear, and support insurance claims.',
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
   Roof Inspection — page-specific styles (Premium tier)
   Tokens only (var()); page accent + signature checklist section
   are unique to this page.
   ============================================================ */
:root {
  --svc-accent: var(--color-primary);
  --svc-accent-soft: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --svc-grad-angle: 105deg;
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --color-card-tint-neutral: var(--color-white);
}
.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
[data-animate].reveal-delay-1 { transition-delay:.06s; }
[data-animate].reveal-delay-2 { transition-delay:.14s; }
[data-animate].reveal-delay-3 { transition-delay:.22s; }
.ri-page h2 { text-wrap:balance; }

/* ---- Breadcrumb ---- */
.ri-breadcrumb { background:var(--color-light); border-bottom:1px solid var(--color-gray-light); }
.ri-breadcrumb ol { list-style:none; display:flex; flex-wrap:wrap; gap:var(--space-2); align-items:center; padding:var(--space-3) 0; margin:0; font-size:var(--font-size-sm); color:var(--color-gray); }
.ri-breadcrumb a { color:var(--color-gray-dark); }
.ri-breadcrumb a:hover { color:var(--svc-accent); }
.ri-breadcrumb [aria-current] { color:var(--svc-accent); font-weight:600; }
.ri-breadcrumb-sep { color:var(--color-gray-light); }

/* =====================================================
   1 · HERO — layered photo + gradient overlay + noise
   ===================================================== */
.ri-hero { position:relative; min-height:60vh; display:flex; align-items:center; padding:104px 0 var(--space-16); overflow:hidden; }
.ri-hero__bg { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
.ri-hero::before { content:''; position:absolute; inset:0; z-index:1;
  background:linear-gradient(var(--svc-grad-angle), rgba(var(--color-secondary-rgb),.95) 0%, rgba(var(--color-secondary-rgb),.83) 46%, rgba(var(--color-secondary-rgb),.58) 100%); }
.ri-hero::after { content:''; position:absolute; inset:0; z-index:1; pointer-events:none; opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.ri-hero__inner { position:relative; z-index:2; max-width:840px; }
.ri-hero__eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-sm); font-weight:600; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(255,255,255,.16); padding:var(--space-2) var(--space-4); border-radius:var(--radius-full); margin-bottom:var(--space-5); }
.ri-hero__eyebrow svg { width:16px; height:16px; }
.ri-hero h1 { color:var(--color-white); font-size:clamp(2.3rem,5vw,3.9rem); line-height:1.04; margin-bottom:var(--space-5); }
.ri-hero h1 .text-accent { font-size:1.06em; }
.hero-answer { color:rgba(255,255,255,.9); font-size:var(--font-size-lg); line-height:1.7; max-width:60ch; margin-bottom:var(--space-6); }
.ri-hero__actions { display:flex; flex-wrap:wrap; gap:var(--space-4); margin-bottom:var(--space-8); }
.ri-hero__actions .btn svg { width:18px; height:18px; }
.ri-hero__trust { display:flex; flex-wrap:wrap; gap:var(--space-3) var(--space-6); }
.ri-hero__trust-item { display:flex; align-items:center; gap:var(--space-2); color:rgba(255,255,255,.92); font-size:var(--font-size-sm); font-weight:500; }
.ri-hero__trust-item svg { width:18px; height:18px; color:var(--color-accent); flex-shrink:0; }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background:var(--svc-accent-soft); border-left:4px solid var(--svc-accent); border-radius:var(--radius-md); padding:var(--space-5) var(--space-6); color:var(--color-gray-dark); line-height:1.7; font-size:var(--font-size-lg); max-width:72ch; margin:0 auto; }
.section-header .answer-block { margin-top:var(--space-4); text-align:left; }

/* =====================================================
   2 · PROBLEM — pull-quote + telltale-sign bento
   ===================================================== */
.ri-problem { background:var(--color-white); }
.ri-pullquote { font-family:var(--font-heading); font-weight:800; font-size:clamp(1.6rem,3.4vw,2.5rem); line-height:1.25; color:var(--color-dark); max-width:22ch; margin:var(--space-8) 0 var(--space-4); }
.ri-pullquote span { color:var(--svc-accent); }
.signs-bento { display:grid; grid-template-columns:repeat(4,1fr); gap:var(--space-5); margin-top:var(--space-10); }
.sign-card { background:var(--color-light); border:1px solid var(--color-gray-light); border-radius:var(--radius-lg); padding:var(--space-6); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.sign-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.sign-card:first-child { grid-column:span 2; background:linear-gradient(135deg, var(--svc-accent-soft), var(--color-white)); }
.sign-card__ico { width:48px; height:48px; border-radius:var(--radius-md); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-4); }
.sign-card__ico svg { width:24px; height:24px; }
.sign-card h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.sign-card p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   3 · EXPERT POSITIONING — asymmetric stat + copy + photo
   ===================================================== */
.ri-expert { background:var(--color-secondary); position:relative; overflow:hidden; }
.ri-expert::before { content:''; position:absolute; inset:0; pointer-events:none;
  background:radial-gradient(ellipse at 85% 0%, rgba(var(--color-primary-rgb),.22) 0%, transparent 60%); }
.ri-expert .container { position:relative; z-index:1; }
.expert-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-16); align-items:center; }
.expert-copy .eyebrow { display:inline-block; font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-3); }
.expert-copy h2 { color:var(--color-white); margin-bottom:var(--space-4); }
.expert-copy .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.9); margin:0 0 var(--space-6); }
.expert-stats { display:flex; gap:var(--space-8); margin:var(--space-6) 0; flex-wrap:wrap; }
.expert-stat .num { font-family:var(--font-heading); font-weight:800; font-size:clamp(2.4rem,5vw,3.25rem); line-height:1; color:var(--color-accent); }
.expert-stat .lbl { font-size:var(--font-size-sm); color:rgba(255,255,255,.75); margin-top:var(--space-2); text-transform:uppercase; letter-spacing:1px; }
.expert-diffs { list-style:none; margin:var(--space-6) 0 0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.expert-diffs li { display:flex; gap:var(--space-3); color:rgba(255,255,255,.88); font-size:var(--font-size-base); line-height:1.55; }
.expert-diffs svg { width:22px; height:22px; color:var(--color-accent); flex-shrink:0; margin-top:2px; }
.expert-figure { position:relative; }
.expert-figure img { width:100%; border-radius:var(--radius-lg); box-shadow:var(--shadow-xl); object-fit:cover; }
.expert-figure::after { content:''; position:absolute; inset:0; border-radius:var(--radius-lg); background:linear-gradient(to top, rgba(var(--color-secondary-rgb),.4) 0%, transparent 55%); pointer-events:none; }

/* =====================================================
   4 · SIGNATURE — the inspection checklist (unique)
   ===================================================== */
.ri-checklist { background:var(--color-white); position:relative; }
.ri-float { position:absolute; top:8%; right:4%; width:180px; height:180px; border-radius:50%; background:radial-gradient(circle, rgba(var(--color-primary-rgb),.06), transparent 70%); pointer-events:none; }
.checklist-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-5) var(--space-8); margin-top:var(--space-12); counter-reset:chk; }
.checklist-item { position:relative; padding:var(--space-5) var(--space-5) var(--space-5) var(--space-16); background:var(--color-light); border-radius:var(--radius-md); border:1px solid var(--color-gray-light); }
.checklist-item::before { counter-increment:chk; content:counter(chk,decimal-leading-zero); position:absolute; left:var(--space-5); top:var(--space-5); font-family:var(--font-heading); font-weight:800; font-size:var(--font-size-lg); color:var(--svc-accent); }
.checklist-item h3 { font-size:var(--font-size-base); color:var(--color-dark); margin-bottom:var(--space-1); }
.checklist-item p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; margin:0; }

/* =====================================================
   5 · PROCESS TIMELINE
   ===================================================== */
.ri-process { background:var(--color-light); }
.timeline { max-width:820px; margin:var(--space-12) auto 0; position:relative; }
.timeline::before { content:''; position:absolute; left:23px; top:8px; bottom:8px; width:2px; background:linear-gradient(to bottom, var(--svc-accent), var(--color-accent)); }
.timeline-step { position:relative; padding:0 0 var(--space-8) var(--space-16); }
.timeline-step:last-child { padding-bottom:0; }
.timeline-step__num { position:absolute; left:0; top:0; width:48px; height:48px; border-radius:var(--radius-full); background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); font-family:var(--font-heading); font-weight:800; display:flex; align-items:center; justify-content:center; box-shadow:var(--shadow-md); z-index:1; }
.timeline-step h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-1); }
.timeline-step p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   6 · PROOF — reviews + project photos
   ===================================================== */
.ri-proof { background:var(--color-dark); position:relative; overflow:hidden; }
.ri-proof::before { content:''; position:absolute; inset:0; pointer-events:none; background:radial-gradient(ellipse at 15% 100%, rgba(var(--color-primary-rgb),.2) 0%, transparent 60%); }
.ri-proof .container { position:relative; z-index:1; }
.ri-proof .section-header h2 { color:var(--color-white); }
.ri-proof .section-header .eyebrow { color:var(--color-accent); }
.ri-proof .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.88); }
.proof-photos { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); margin-top:var(--space-10); }
.proof-photos figure { margin:0; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl); }
.proof-photos img { width:100%; height:100%; object-fit:cover; aspect-ratio:4/3; }
.reviews-embed { margin-top:var(--space-8); min-height:100px; }
.proof-badges { display:flex; flex-wrap:wrap; gap:var(--space-4); justify-content:center; margin-top:var(--space-8); }
.proof-badges a { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); color:var(--color-white); font-size:var(--font-size-sm); font-weight:600; padding:var(--space-3) var(--space-5); border-radius:var(--radius-full); transition:background var(--transition-fast), border-color var(--transition-fast); }
.proof-badges a:hover { background:rgba(var(--color-primary-rgb),.2); border-color:var(--svc-accent); color:var(--color-white); }
.proof-badges svg { width:18px; height:18px; color:var(--color-star); }

/* =====================================================
   7 · COMPARISON — two column vs
   ===================================================== */
.ri-compare { background:var(--color-white); }
.compare-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-8); margin-top:var(--space-12); }
.compare-col { border-radius:var(--radius-lg); padding:var(--space-8); border:1px solid var(--color-gray-light); }
.compare-col--them { background:var(--color-light); }
.compare-col--us { background:linear-gradient(160deg, var(--svc-accent-soft), var(--color-white)); border-color:color-mix(in srgb, var(--svc-accent) 30%, #fff); box-shadow:var(--shadow-lg); }
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
.ri-faq { background:var(--color-light); }
.faq-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); align-items:start; margin-top:var(--space-10); }
.faq-item { background:var(--color-white); border-radius:var(--radius-lg); border:1px solid var(--color-gray-light); overflow:hidden; transition:box-shadow var(--transition-base); }
.faq-item[open] { box-shadow:var(--shadow-md); }
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
.ri-related { background:var(--color-white); }
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
.ri-cta { position:relative; overflow:hidden; text-align:center; padding:var(--space-16) 0;
  background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 82%, #000) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.ri-cta::before { content:''; position:absolute; inset:0; pointer-events:none; opacity:.06;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.ri-cta .container { position:relative; z-index:1; }
.ri-cta h2 { color:var(--color-white); font-size:clamp(1.9rem,4vw,2.75rem); margin-bottom:var(--space-4); }
.ri-cta p { color:rgba(255,255,255,.92); max-width:60ch; margin:0 auto var(--space-8); font-size:var(--font-size-lg); }
.ri-cta__actions { display:flex; gap:var(--space-4); justify-content:center; flex-wrap:wrap; }
.ri-cta .btn svg { width:18px; height:18px; }
.ri-cta .phone-line { margin-top:var(--space-6); color:rgba(255,255,255,.82); }
.ri-cta .phone-line a { color:var(--color-accent); font-weight:700; }

/* ---- SVG dividers ---- */
.svg-divider { display:block; overflow:hidden; line-height:0; }
.svg-divider svg { display:block; width:100%; height:100%; }
.svg-divider--diagonal { height:60px; }
.svg-divider--wave { height:72px; }

/* ---- Focus visibility (WCAG AA) ---- */
.ri-hero a:focus-visible, .service-card__cta:focus-visible, .ri-cta a:focus-visible, .proof-badges a:focus-visible, .faq-item summary:focus-visible, .sign-card:focus-within { outline:3px solid var(--color-accent); outline-offset:2px; border-radius:var(--radius-sm); }
::selection { background:rgba(var(--color-primary-rgb),.85); color:var(--color-white); }

@media (prefers-reduced-motion: reduce) {
  .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img, .sign-card:hover { transform:none; }
}
@media (max-width:1024px) {
  .expert-grid { grid-template-columns:1fr; gap:var(--space-10); }
  .signs-bento { grid-template-columns:1fr 1fr; }
  .sign-card:first-child { grid-column:span 2; }
  .checklist-grid { grid-template-columns:1fr 1fr; }
  .services-grid { grid-template-columns:repeat(2,1fr); }
}
@media (max-width:768px) {
  .compare-grid { grid-template-columns:1fr; }
  .faq-grid { grid-template-columns:1fr; }
}
@media (max-width:600px) {
  .signs-bento { grid-template-columns:1fr; }
  .sign-card:first-child { grid-column:auto; }
  .checklist-grid { grid-template-columns:1fr; }
  .proof-photos { grid-template-columns:1fr; }
  .services-grid { grid-template-columns:1fr; }
  .ri-hero h1 { font-size:clamp(2rem,8vw,2.6rem); }
}

/* =====================================================
   MULTI-DIRECTIONAL REVEALS
   framework.css defines the default [data-animate] entrance as
   translateY(30px). These modifiers vary the vector so the page
   does not reveal every block from the same direction.
   ===================================================== */
[data-animate].ri-rv-left {
  transform: translateX(-36px);
}
[data-animate].ri-rv-right {
  transform: translateX(36px);
}
[data-animate].ri-rv-down {
  transform: translateY(-30px);
}
[data-animate].ri-rv-scale {
  transform: scale(0.93);
}
[data-animate].ri-rv-left.animated,
[data-animate].ri-rv-right.animated,
[data-animate].ri-rv-down.animated,
[data-animate].ri-rv-scale.animated {
  transform: none;
}

/* =====================================================
   HERO EYEBROW ICON — subtle pulse to draw the eye
   ===================================================== */
.ri-hero__eyebrow svg {
  animation: ri-pulse 2.6s ease-in-out infinite;
}
@keyframes ri-pulse {
  0%, 100% { opacity: 1; }
  50%      { opacity: 0.55; }
}

/* =====================================================
   HERO TRUST ITEMS — hairline separators on wide screens
   ===================================================== */
.ri-hero__trust-item {
  position: relative;
}
.ri-hero__trust-item + .ri-hero__trust-item::before {
  content: '';
  position: absolute;
  left: calc(-1 * var(--space-3));
  top: 50%;
  width: 1px;
  height: 16px;
  transform: translateY(-50%);
  background: rgba(255, 255, 255, 0.22);
}

/* =====================================================
   SIGN CARD — animated accent spine on hover
   ===================================================== */
.sign-card {
  position: relative;
  overflow: hidden;
}
.sign-card::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 4px;
  height: 0;
  background: var(--svc-accent);
  transition: height var(--transition-base);
}
.sign-card:hover::after {
  height: 100%;
}

/* =====================================================
   EXPERT STAT — accent baseline flourish
   ===================================================== */
.expert-stat {
  position: relative;
  padding-bottom: var(--space-3);
}
.expert-stat::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 32px;
  height: 3px;
  border-radius: var(--radius-full);
  background: var(--color-accent);
}
.expert-figure img {
  transition: transform var(--transition-slow);
}
.expert-figure:hover img {
  transform: scale(1.03);
}

/* =====================================================
   CHECKLIST ITEM — lift + accent border on hover
   ===================================================== */
.checklist-item {
  transition: transform var(--transition-fast),
              box-shadow var(--transition-fast),
              border-color var(--transition-fast);
}
.checklist-item:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-md);
  border-color: color-mix(in srgb, var(--svc-accent) 35%, var(--color-gray-light));
}

/* =====================================================
   TIMELINE STEP — number scale on hover
   ===================================================== */
.timeline-step__num {
  transition: transform var(--transition-base),
              box-shadow var(--transition-base);
}
.timeline-step:hover .timeline-step__num {
  transform: scale(1.08);
  box-shadow: var(--shadow-lg);
}

/* =====================================================
   PROOF FIGURE — Ken Burns style slow zoom on hover
   ===================================================== */
.proof-photos figure {
  position: relative;
}
.proof-photos img {
  transition: transform var(--transition-slow);
}
.proof-photos figure:hover img {
  transform: scale(1.05);
}

/* =====================================================
   FAQ — hover affordance on closed items
   ===================================================== */
.faq-item:not([open]):hover {
  box-shadow: var(--shadow-sm);
  border-color: color-mix(in srgb, var(--svc-accent) 30%, var(--color-gray-light));
}
.faq-item:not([open]):hover summary {
  color: var(--svc-accent);
}

/* =====================================================
   COMPARE COLUMN — the recommended side lifts forward
   ===================================================== */
.compare-col {
  transition: transform var(--transition-base),
              box-shadow var(--transition-base);
}
.compare-col--us:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-xl);
}

/* =====================================================
   SECTION-HEADER EYEBROW — underline flourish
   ===================================================== */
.section-header .eyebrow {
  position: relative;
}

/* =====================================================
   EXTRA MOTION SAFETY
   ===================================================== */
@media (prefers-reduced-motion: reduce) {
  .ri-hero__eyebrow svg {
    animation: none;
  }
  .checklist-item:hover,
  .timeline-step:hover .timeline-step__num,
  .compare-col--us:hover,
  .expert-figure:hover img,
  .proof-photos figure:hover img {
    transform: none;
  }
  [data-animate].ri-rv-left,
  [data-animate].ri-rv-right,
  [data-animate].ri-rv-down,
  [data-animate].ri-rv-scale {
    transform: none;
  }
}

/* =====================================================
   FINE-GRAINED RESPONSIVE TUNING
   ===================================================== */
@media (max-width:900px) {
  .expert-stats {
    gap: var(--space-6);
  }
  .ri-pullquote {
    max-width: none;
  }
}
@media (max-width:768px) {
  .section-header {
    margin-bottom: var(--space-8);
  }
  .timeline::before {
    left: 19px;
  }
  .timeline-step {
    padding-left: var(--space-12);
  }
  .timeline-step__num {
    width: 40px;
    height: 40px;
  }
}
@media (max-width:480px) {
  .ri-hero__actions .btn,
  .ri-cta__actions .btn {
    width: 100%;
    justify-content: center;
  }
  .compare-col {
    padding: var(--space-6);
  }
  .proof-badges a {
    width: 100%;
    justify-content: center;
  }
}

/* =====================================================
   PRINT — ink-friendly, animation-free fallback
   ===================================================== */
@media print {
  .ri-hero,
  .ri-cta,
  .ri-expert,
  .ri-proof {
    background: none !important;
    color: var(--color-dark) !important;
  }
  .ri-hero__bg,
  .ri-float,
  .svg-divider {
    display: none !important;
  }
  .ri-hero h1,
  .hero-answer,
  .expert-copy h2,
  .ri-proof .section-header h2 {
    color: var(--color-dark) !important;
  }
  .faq-item,
  .sign-card,
  .checklist-item {
    break-inside: avoid;
  }
  [data-animate] {
    opacity: 1 !important;
    transform: none !important;
  }
}
</style>

<div class="ri-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="ri-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="ri-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="ri-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Roof Inspection</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="ri-hero" aria-label="Roof inspection in Huffman, TX">
  <img class="ri-hero__bg"
       src="/assets/images/roof-inspection.jpg"
       srcset="/assets/images/roof-inspection-480.webp 480w, /assets/images/roof-inspection-960.webp 960w, /assets/images/roof-inspection-1600.webp 1600w"
       sizes="100vw"
       alt="Triple G Roofing inspector examining shingles on a Huffman, TX roof"
       width="1600" height="900" loading="eager" fetchpriority="high">
  <div class="container ri-hero__inner">
    <span class="ri-hero__eyebrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.34-4.34"/></svg> Roof Inspection · Huffman, TX</span>
    <h1>Roof Inspections in <span class="text-accent">Huffman</span>, TX</h1>
    <p class="hero-answer">
      Triple G Roofing provides free, photo-documented roof inspections for Huffman, TX homeowners — usually the
      same day you call. As a licensed, insured local roofing contractor, we check shingles, flashing, decking, and
      ventilation, then hand you an honest report you can use for a repair or an insurance claim.
    </p>
    <div class="ri-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Inspection</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="ri-hero__trust">
      <span class="ri-hero__trust-item"><?php echo icon('clock', 18); ?> Same-day inspections</span>
      <span class="ri-hero__trust-item"><?php echo icon('shield', 18); ?> Licensed &amp; insured</span>
      <span class="ri-hero__trust-item"><?php echo icon('check-circle', 18); ?> Photo-documented reports</span>
      <span class="ri-hero__trust-item"><?php echo icon('award', 18); ?> Insurance claims handled</span>
    </div>
  </div>
</section>

<!-- ===================== 2 · PROBLEM ===================== -->
<section class="section ri-problem" aria-label="When your roof needs an inspection">
  <div class="container">
    <div class="section-header" style="text-align:left; max-width:820px; margin-inline:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Why It Matters</span>
      <h2>How do you know your Huffman roof needs an inspection?</h2>
      <p class="answer-block">
        Book a roof inspection any time you spot ceiling stains, missing or curling shingles, grit in your gutters,
        or after a hail or windstorm passes through North Harris County. Most roof damage in Huffman stays hidden
        until the next hard rain — an inspection finds it while repairs are still small and claims still valid.
      </p>
    </div>
    <p class="ri-pullquote">A small leak in Huffman rarely stays small — <span>it just moves somewhere you can&rsquo;t see it.</span></p>
    <div class="signs-bento">
      <div class="sign-card ri-rv-left" data-animate>
        <div class="sign-card__ico"><?php echo icon('clock', 24); ?></div>
        <h3>You just weathered a storm</h3>
        <p>Hail and Gulf Coast wind bruise shingles and strip protective granules without leaving an obvious hole. After any severe Huffman storm, a documented inspection is the only way to know — and the only way to keep a claim valid.</p>
      </div>
      <div class="sign-card ri-rv-scale" data-animate>
        <div class="sign-card__ico"><?php echo icon('map-pin', 24); ?></div>
        <h3>Ceiling or wall stains</h3>
        <p>Brown rings or soft spots mean water is already inside your home.</p>
      </div>
      <div class="sign-card ri-rv-scale" data-animate>
        <div class="sign-card__ico"><?php echo icon('check-circle', 24); ?></div>
        <h3>Granules in the gutters</h3>
        <p>Sandy grit washing out of downspouts is a sign your shingles are wearing thin.</p>
      </div>
      <div class="sign-card ri-rv-right" data-animate>
        <div class="sign-card__ico"><?php echo icon('shield', 24); ?></div>
        <h3>Your roof is 10+ years old</h3>
        <p>Older Huffman roofs deserve a yearly check before small problems become expensive ones.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-secondary)" points="0,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== 3 · EXPERT POSITIONING ===================== -->
<section class="section ri-expert" aria-label="Why our inspections are different">
  <div class="container">
    <div class="expert-grid">
      <div class="expert-copy">
        <span class="eyebrow">The Triple G Standard</span>
        <h2>What makes a Triple G Roofing inspection different?</h2>
        <p class="answer-block">
          Triple G Roofing inspects every Huffman roof top-to-bottom and photographs each issue, then explains it in
          plain English — no pressure and no vague verbal quotes. Because owner Tim Menn&rsquo;s crew knows Gulf Coast
          weather and local building codes, we document damage the way adjusters actually need to see it.
        </p>
        <div class="expert-stats">
          <div class="expert-stat"><div class="num">Same&nbsp;day</div><div class="lbl">Storm inspections</div></div>
          <div class="expert-stat"><div class="num">10&nbsp;yr</div><div class="lbl">Workmanship warranty</div></div>
          <div class="expert-stat"><div class="num">25&nbsp;mi</div><div class="lbl">Service radius</div></div>
        </div>
        <ul class="expert-diffs">
          <li><?php echo icon('check-circle', 22); ?> Every finding photographed and captioned, not just described</li>
          <li><?php echo icon('check-circle', 22); ?> Honest verdict — including &ldquo;your roof is fine&rdquo; when it is</li>
          <li><?php echo icon('check-circle', 22); ?> The same local Huffman crew from inspection to final walkthrough</li>
        </ul>
      </div>
      <div class="expert-figure ri-rv-right" data-animate>
        <img src="/assets/images/owner-customer.jpg"
             srcset="/assets/images/owner-customer-480.webp 480w, /assets/images/owner-customer-960.webp 960w, /assets/images/owner-customer-1600.webp 1600w"
             sizes="(max-width: 1024px) 100vw, 520px"
             alt="Triple G Roofing owner reviewing an inspection report with a Huffman homeowner"
             width="600" height="700" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE CHECKLIST ===================== -->
<section class="section ri-checklist" aria-label="What is included in a roof inspection">
  <span class="ri-float" aria-hidden="true"></span>
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">On Every Inspection</span>
      <h2>What&rsquo;s included in a Triple G Roofing roof inspection?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">A Triple G Roofing inspection covers the whole roof system — not just the shingles. Here is what our roofer checks on your Huffman home, from ridge to gutter line.</p>
    </div>
    <div class="checklist-grid">
      <div class="checklist-item"><h3>Shingles &amp; granule loss</h3><p>Cracked, curled, bruised, or missing shingles and thinning granule coverage.</p></div>
      <div class="checklist-item"><h3>Flashing &amp; penetrations</h3><p>Chimneys, vents, and valleys — the spots where Huffman leaks almost always start.</p></div>
      <div class="checklist-item"><h3>Decking &amp; soft spots</h3><p>Signs of rot or sagging that mean water has already reached the wood beneath.</p></div>
      <div class="checklist-item"><h3>Attic ventilation</h3><p>Whether intake and exhaust are balanced for the Texas heat and humidity.</p></div>
      <div class="checklist-item"><h3>Gutters &amp; drainage</h3><p>Where roof water is going and whether it is being routed away from your foundation.</p></div>
      <div class="checklist-item"><h3>Storm &amp; hail damage</h3><p>Impact marks and wind lift, documented the way an insurance adjuster needs.</p></div>
    </div>
  </div>
</section>

<!-- ===================== 5 · PROCESS ===================== -->
<section class="section ri-process" aria-label="How a roof inspection works">
  <div class="container">
    <div class="section-header" style="max-width:720px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Simple &amp; Fast</span>
      <h2>How long does a roof inspection take?</h2>
      <p class="answer-block">
        Most Huffman roof inspections take about 45 minutes to an hour, and you get your photo report the same day.
        Triple G Roofing keeps the process short and clear: we look, we document, we explain, and we put your options
        in writing — no surprise bills and no obligation to hire us.
      </p>
    </div>
    <div class="timeline">
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">1</div>
        <h3>Book same-day</h3>
        <p>Call or request online and we schedule your Huffman inspection fast — often the same day after a storm.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">2</div>
        <h3>Full roof walk</h3>
        <p>Our roofer inspects shingles, flashing, decking, ventilation, and gutters, photographing every issue.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">3</div>
        <h3>Plain-English report</h3>
        <p>You get a captioned photo report and a straight verdict — repair, claim, or nothing needed right now.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">4</div>
        <h3>Written next steps</h3>
        <p>If work is needed, we hand you a clear estimate and, for storm damage, coordinate directly with your adjuster.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROOF ===================== -->
<section class="section ri-proof" aria-label="Reviews and recent work">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Trusted Locally</span>
      <h2>What do Huffman homeowners say about our inspections?</h2>
      <p class="answer-block">
        Triple G Roofing has earned its reputation across Huffman, Humble, Atascocita, Kingwood, and Crosby the
        old-fashioned way — by showing up, telling the truth, and standing behind the work. Read our verified Google
        reviews below and see recent roofs from around North Harris County.
      </p>
    </div>

    <div class="proof-photos" data-animate>
      <figure>
        <img src="/assets/images/roof-damage-repair.jpg"
             srcset="/assets/images/roof-damage-repair-480.webp 480w, /assets/images/roof-damage-repair-960.webp 960w, /assets/images/roof-damage-repair-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Recent Triple G Roofing inspection and tear-off project on a Huffman home"
             width="600" height="450" loading="lazy">
      </figure>
      <figure>
        <img src="/assets/images/hero-roof-home.jpg"
             srcset="/assets/images/hero-roof-home-480.webp 480w, /assets/images/hero-roof-home-960.webp 960w, /assets/images/hero-roof-home-1600.webp 1600w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Completed architectural shingle roof after a Triple G Roofing inspection in Huffman, TX"
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
<section class="section ri-compare" aria-label="Local roofer versus national inspection service">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Know The Difference</span>
      <h2>Local roofer or national inspection service — which is better?</h2>
      <p class="answer-block">
        For a Huffman roof, a local roofer beats a national inspection service almost every time. Triple G Roofing
        lives in the same weather you do, answers the phone directly, and stays on the job through the repair — while
        national outfits hand you a PDF and disappear. Here is the honest comparison.
      </p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them">
        <h3><?php echo icon('external-link', 22); ?> National inspection service</h3>
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> A contractor you&rsquo;ll never see again after the report</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Little sense of Gulf Coast heat, humidity, and hail patterns</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Call centers and scheduling windows, not a same-day roofer</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> You&rsquo;re on your own to find someone for the actual repair</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us">
        <h3><?php echo icon('shield', 22); ?> Triple G Roofing</h3>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> The same local Huffman crew inspects and repairs your roof</li>
          <li><?php echo icon('check-circle', 20); ?> Built around Texas weather and North Harris County codes</li>
          <li><?php echo icon('check-circle', 20); ?> Same-day storm response, 8am&ndash;8pm, seven days a week</li>
          <li><?php echo icon('check-circle', 20); ?> We handle the insurance claim and the repair, start to finish</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,72 900,0 1200,36 L1200,72 L0,72 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section ri-faq" aria-label="Roof inspection FAQs">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Good Questions</span>
      <h2>What else do Huffman homeowners ask about roof inspections?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on cost, timing, storms, and insurance — before you ever schedule a roof inspection near you in Huffman.</p>
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
<section class="ri-cta" aria-label="Book a free roof inspection">
  <div class="container">
    <h2>Ready for a free, no-obligation roof inspection in Huffman?</h2>
    <p>Whether a storm just passed or you just want peace of mind, Triple G Roofing will climb up, document what we
      find, and tell you the truth — same-day response across Huffman and North Harris County.</p>
    <div class="ri-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Book My Free Inspection</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <p class="phone-line">Prefer to talk? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — 8am to 8pm, 7 days a week.</p>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section ri-related" aria-label="Other roofing services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Keep Exploring</span>
      <h2>What other roofing services might your Huffman home need?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">If our inspection turns up a problem, here&rsquo;s how Triple G Roofing fixes it.</p>
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

</div><!-- /.ri-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
