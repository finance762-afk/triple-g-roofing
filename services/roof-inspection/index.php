<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Service — Roof Inspection · Triple G Roofing & Construction
   Premium editorial service page (8-section structure)
   Facts: references/CLIENT-FACTS.md (revised 2026-08-20)
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Roof Inspection';
$serviceSlug     = 'roof-inspection';
$pageTitle       = 'Roof Inspection Houston TX | Triple G Roofing & Construction';
$pageDescription = 'Free, photo-documented roof inspections across the Greater Houston area from Triple G Roofing & Construction, family-owned since 1973. Honest findings, written estimate. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';
$ogImage         = 'roof-inspection-v2-960.webp';
$pageReviews     = getTestimonialsFor($serviceSlug, 3);

/* --- Review excerpt helper (verbatim text, cut at a sentence boundary) --- */
if (!function_exists('tg_review_excerpt')) {
    function tg_review_excerpt($text, $max = 400) {
        if (mb_strlen($text) <= $max) { return $text; }
        $cut = mb_substr($text, 0, $max);
        $end = max((int) mb_strrpos($cut, '. '), (int) mb_strrpos($cut, '! '));
        if ($end < 120) {
            $sp = mb_strrpos($cut, ' ');
            return rtrim(mb_substr($cut, 0, $sp ?: $max), ',;:') . '…';
        }
        return mb_substr($cut, 0, $end + 1);
    }
}

/* --- FAQs — roof inspection, Greater Houston (fact-safe) --- */
$faqs = [
    [
        'q' => 'How much does a roof inspection cost in the Houston area?',
        'a' => 'Nothing. Triple G Roofing & Construction provides free, no-obligation roof inspections across the Greater Houston area. There is no charge to have us climb your roof, photograph what we find, and give you an honest assessment — whether that turns into a repair, an insurance claim, or nothing at all.',
    ],
    [
        'q' => 'What do you actually check during a roof inspection?',
        'a' => 'Shingles and granule loss, flashing at chimneys, walls and valleys, pipe boots and vent penetrations, decking for soft spots, attic intake and exhaust ventilation, and gutters and drainage. After hail or wind we also document impact marks and lifted shingles. Everything we find is photographed so you can see it for yourself.',
    ],
    [
        'q' => 'Do I need a roof inspection after a hail or wind storm?',
        'a' => 'Yes. Hail and Gulf Coast wind often bruise shingles and loosen granules without an obvious leak, and damage that goes undocumented is harder to explain to an insurer later. A prompt, photo-documented inspection gives you a clear record of your roof\'s condition while the evidence is fresh.',
    ],
    [
        'q' => 'Will you help me with an insurance claim if you find storm damage?',
        'a' => 'We will. Triple G Roofing & Construction has more than 50 years of claims-handling and adjuster experience. We document the damage with photos, meet your adjuster on site, and explain your policy in plain English so you understand what is being decided. The coverage decision itself is always the carrier\'s.',
    ],
    [
        'q' => 'How often should I have my roof inspected?',
        'a' => 'Plan on a look every year or two and an extra inspection after any major storm. Catching a lifted shingle, a cracked pipe boot, or failing flashing early is far cheaper than repairing the water damage it causes once it reaches your decking and ceilings.',
    ],
    [
        'q' => 'Can you inspect a roof if I am buying or selling a home?',
        'a' => 'Yes. We provide clear, plain-English condition reports for buyers and sellers across the Greater Houston area — Humble, Kingwood, Cypress, Baytown, The Woodlands and dozens of other communities — so everyone at the closing table knows what shape the roof is in before money changes hands.',
    ],
];

/* --- Related services (3 cards) — fact-safe bullets, manifest alt text --- */
$relatedServices = [
    [
        'name' => 'Roof Repair', 'slug' => 'roof-repair', 'img' => 'roof-repair-v2', 'w' => 1200, 'h' => 1600,
        'srcset' => '/assets/images/roof-repair-v2-480.webp 480w, /assets/images/roof-repair-v2-960.webp 960w',
        'alt' => 'New step flashing sealed against a brick chimney during a roof repair',
        'desc' => 'Leak, flashing, pipe-boot, and decking repairs that stop water at the source.',
        'bullets' => ['Leaks traced to the source', 'Flashing and pipe boots', 'Free written estimate'],
        'icon' => icon('wrench', 26),
    ],
    [
        'name' => 'Storm & Wind Damage Roof Repair', 'slug' => 'storm-damage-repair', 'img' => 'storm-damage-repair-v2', 'w' => 1200, 'h' => 1600,
        'srcset' => '/assets/images/storm-damage-repair-v2-480.webp 480w, /assets/images/storm-damage-repair-v2-960.webp 960w',
        'alt' => 'Tarped roof with a Triple G crew starting storm damage repairs',
        'desc' => 'Hail, wind, and hurricane damage repair with claims help from start to finish.',
        'bullets' => ['Hail, wind and hurricane damage', 'We meet your adjuster', 'Ask about temporary tarping'],
        'icon' => icon('shield', 26),
    ],
    [
        'name' => 'Roof Replacement', 'slug' => 'roof-replacement', 'img' => 'roof-replacement', 'w' => 1200, 'h' => 1600,
        'srcset' => '/assets/images/roof-replacement-480.webp 480w, /assets/images/roof-replacement-960.webp 960w',
        'alt' => 'Triple G crew replacing the roof on a two-story brick home',
        'desc' => 'Architectural-shingle and metal roof replacements, tear-off to clean-up.',
        'bullets' => ['Shingle and metal roofs', 'Major brands such as GAF', 'Magnet nail sweep after'],
        'icon' => icon('home', 26),
    ],
];

/* --- Schema: Service + FAQPage + BreadcrumbList (all 50 communities as areaServed) --- */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type"    => "Service",
    "@id"      => $canonicalUrl . '#service-' . $serviceSlug,
    "serviceType" => $serviceName,
    "name"     => $serviceName . ' — Greater Houston, ' . $address['state'],
    "description" => 'Free, photo-documented roof inspections across the Greater Houston area from Triple G Roofing & Construction, a family-owned father-and-son company based in Humble, TX since 1973 — shingles, flashing, decking, ventilation, and storm-damage documentation with a written estimate.',
    "provider" => ["@id" => $siteUrl . '#organization'],
    "areaServed" => array_map(function ($c) use ($address) {
        return ["@type" => "City", "name" => $c . ', ' . $address['state']];
    }, $serviceAreaCities),
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
.signs-bento { display:grid; grid-template-columns:repeat(5,1fr); gap:var(--space-5); margin-top:var(--space-10); }
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
.faq-item { display:block; padding:0; background:var(--color-white); border-radius:var(--radius-lg); border:1px solid var(--color-gray-light); overflow:hidden; transition:box-shadow var(--transition-base); }
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
  .sign-card:first-child, .sign-card:last-child { grid-column:span 2; }
  .checklist-grid { grid-template-columns:1fr 1fr; }
  .services-grid { grid-template-columns:repeat(2,1fr); }
}
@media (max-width:768px) {
  .compare-grid { grid-template-columns:1fr; }
  .faq-grid { grid-template-columns:1fr; }
}
@media (max-width:600px) {
  .signs-bento { grid-template-columns:1fr; }
  .sign-card:first-child, .sign-card:last-child { grid-column:auto; }
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

/* =====================================================
   REAL REVIEWS — client-published quotes (name + city)
   Dark proof-section cards with oversized opening quote mark,
   accent-on-hover border, and a 3→2→1 responsive grid.
   ===================================================== */
.ri-review-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-10);
}
.ri-review {
  position: relative;
  margin: 0;
  padding: var(--space-8) var(--space-6) var(--space-6);
  background: rgba(255, 255, 255, .05);
  border: 1px solid rgba(255, 255, 255, .12);
  border-radius: var(--radius-lg);
  display: flex;
  flex-direction: column;
  gap: var(--space-4);
  transition: transform var(--transition-base),
              border-color var(--transition-base),
              background var(--transition-base);
}
.ri-review:hover {
  transform: translateY(-4px);
  border-color: color-mix(in srgb, var(--svc-accent) 55%, transparent);
  background: rgba(var(--color-primary-rgb), .08);
}
.ri-review::before {
  content: '\201C';
  position: absolute;
  top: var(--space-1);
  left: var(--space-5);
  font-family: var(--font-heading);
  font-size: var(--font-size-5xl);
  line-height: 1;
  color: rgba(var(--color-primary-rgb), .4);
  pointer-events: none;
}
.ri-review:first-child {
  background: linear-gradient(160deg, rgba(var(--color-primary-rgb), .14), rgba(255, 255, 255, .04));
}
.ri-review p {
  position: relative;
  color: rgba(255, 255, 255, .86);
  font-size: var(--font-size-sm);
  line-height: 1.7;
  margin: 0;
  flex: 1;
}
.ri-review footer {
  display: flex;
  flex-direction: column;
  gap: var(--space-1);
  padding-top: var(--space-4);
  border-top: 1px solid rgba(255, 255, 255, .1);
}
.ri-review cite {
  font-style: normal;
  font-family: var(--font-heading);
  font-weight: 700;
  color: var(--color-white);
}
.ri-review footer span {
  font-size: var(--font-size-xs);
  color: var(--color-accent);
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* =====================================================
   LAST-UPDATED STAMP — lives in the breadcrumb bar
   ===================================================== */
.ri-breadcrumb .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: var(--space-2);
}
.ri-updated {
  font-size: var(--font-size-xs);
  color: var(--color-gray);
  white-space: nowrap;
  padding: var(--space-3) 0;
  letter-spacing: .5px;
}

/* =====================================================
   PORTRAIT JOB PHOTOS — aspect-ratio frames + object-fit
   so the 1200×1600 client photos never stretch.
   ===================================================== */
.ri-portrait {
  aspect-ratio: 4 / 5;
  overflow: hidden;
  border-radius: var(--radius-lg);
}
.ri-portrait img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 40%;
}
.ri-square img {
  aspect-ratio: 1 / 1;
  object-position: center 45%;
}
.ri-hero__bg {
  object-position: center 38%;
}

/* ---- Responsive + motion + print for the additions ---- */
@media (max-width: 1024px) {
  .ri-review-grid {
    grid-template-columns: 1fr 1fr;
  }
}
@media (max-width: 700px) {
  .ri-review-grid {
    grid-template-columns: 1fr;
  }
  .ri-updated {
    width: 100%;
    padding-top: 0;
  }
}
@media (max-width: 600px) {
  .ri-portrait {
    aspect-ratio: 4 / 5;
    max-height: 70vh;
  }
}
@media (prefers-reduced-motion: reduce) {
  .ri-review:hover {
    transform: none;
  }
}
@media print {
  .ri-review {
    border-color: var(--color-gray-light);
    break-inside: avoid;
  }
  .ri-review p,
  .ri-review cite {
    color: var(--color-dark) !important;
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
    <span class="ri-updated">Last Updated: <?php echo date('F Y'); ?></span>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="ri-hero" aria-label="Roof inspection across the Greater Houston area">
  <img class="ri-hero__bg"
       src="/assets/images/roof-inspection-v2.jpg"
       srcset="/assets/images/roof-inspection-v2-480.webp 480w, /assets/images/roof-inspection-v2-960.webp 960w"
       sizes="100vw"
       alt="Close-up of cracked and lifted shingles found during a roof inspection"
       width="1200" height="1600" loading="eager" fetchpriority="high">
  <div class="container ri-hero__inner">
    <span class="ri-hero__eyebrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.34-4.34"/></svg> Roof Inspection · Humble, TX &amp; Greater Houston</span>
    <h1>Free Roof Inspections in the <span class="text-accent">Greater Houston</span> Area</h1>
    <p class="hero-answer">
      Triple G Roofing &amp; Construction is a family-owned roofing and exterior contractor based in Humble, TX, serving
      the Greater Houston area since 1973. Our roof inspections are free and photo-documented: we check shingles,
      flashing, pipe boots, decking, and attic ventilation, then hand you an honest report you can use for a repair,
      an insurance claim — or simple peace of mind.
    </p>
    <div class="ri-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Inspection</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="ri-hero__trust">
      <span class="ri-hero__trust-item"><?php echo icon('check-circle', 18); ?> Free, no-obligation inspections</span>
      <span class="ri-hero__trust-item"><?php echo icon('award', 18); ?> Serving Greater Houston since 1973</span>
      <span class="ri-hero__trust-item"><?php echo icon('search', 18); ?> Every finding photographed</span>
      <span class="ri-hero__trust-item"><?php echo icon('hard-hat', 18); ?> Owner on every job</span>
    </div>
  </div>
</section>

<!-- ===================== 2 · PROBLEM ===================== -->
<section class="section ri-problem" aria-label="When your roof needs an inspection">
  <div class="container">
    <div class="section-header" style="text-align:left; max-width:820px; margin-inline:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Why It Matters</span>
      <h2>How do you know your roof needs an inspection?</h2>
      <p class="answer-block">
        Book a roof inspection any time you spot ceiling stains, missing or curling shingles, grit in your gutters,
        or after hail or a windstorm passes through your part of Greater Houston. Most roof damage stays hidden until
        the next hard rain — an inspection finds it while repairs are still small.
      </p>
    </div>
    <p class="ri-pullquote">A small leak rarely stays small — <span>it just moves somewhere you can&rsquo;t see it.</span></p>
    <div class="signs-bento">
      <div class="sign-card ri-rv-left" data-animate>
        <div class="sign-card__ico"><?php echo icon('clock', 24); ?></div>
        <h3>You just weathered a storm</h3>
        <p>Hail and Gulf Coast wind bruise shingles and strip protective granules without leaving an obvious hole. After any severe storm around Houston, a documented inspection is the only way to know what happened up there — and the only way to have a clear record if you decide to file a claim.</p>
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
        <h3>Your roof is getting older</h3>
        <p>Older roofs deserve a regular check before small problems become expensive ones.</p>
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
          Triple G Roofing &amp; Construction is a father-and-son team — Glenn and Tim Menn — that has looked at Greater
          Houston roofs since 1973. The owner inspects your roof personally, photographs each issue, and explains it in
          plain English with no pressure. With more than 50 years of claims-handling and adjuster experience, we also
          document storm damage the way adjusters actually need to see it.
        </p>
        <div class="expert-stats">
          <div class="expert-stat"><div class="num">Free</div><div class="lbl">Every inspection</div></div>
          <div class="expert-stat"><div class="num">1973</div><div class="lbl">Serving Greater Houston since</div></div>
          <div class="expert-stat"><div class="num">50+</div><div class="lbl">Years claims experience</div></div>
        </div>
        <ul class="expert-diffs">
          <li><?php echo icon('check-circle', 22); ?> Every finding photographed and explained, not just described</li>
          <li><?php echo icon('check-circle', 22); ?> Honest verdict — including &ldquo;your roof is fine&rdquo; when it is</li>
          <li><?php echo icon('check-circle', 22); ?> The owner on site from the inspection to any work that follows</li>
        </ul>
      </div>
      <div class="expert-figure ri-portrait ri-rv-right" data-animate>
        <img src="/assets/images/owner-father-v2.jpg"
             srcset="/assets/images/owner-father-v2-480.webp 480w, /assets/images/owner-father-v2-960.webp 960w"
             sizes="(max-width: 1024px) 100vw, 520px"
             alt="Glenn and Tim Menn, the father-and-son team behind Triple G Roofing &amp; Construction"
             width="1152" height="1536" loading="lazy">
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
      <p class="hero-answer" style="color:var(--color-gray-dark);">A Triple G Roofing &amp; Construction inspection covers the whole roof system — not just the shingles. Here is what we check on your home, from ridge to gutter line.</p>
    </div>
    <div class="checklist-grid">
      <div class="checklist-item"><h3>Shingles &amp; granule loss</h3><p>Cracked, curled, bruised, or missing shingles and thinning granule coverage.</p></div>
      <div class="checklist-item"><h3>Flashing &amp; penetrations</h3><p>Chimneys, sidewalls, pipe boots, and valleys — the spots where leaks almost always start.</p></div>
      <div class="checklist-item"><h3>Decking &amp; soft spots</h3><p>Signs of rot or sagging that mean water has already reached the wood beneath.</p></div>
      <div class="checklist-item"><h3>Attic ventilation</h3><p>Whether intake and exhaust are balanced — shingle manufacturers can limit warranties when they are not.</p></div>
      <div class="checklist-item"><h3>Gutters &amp; drainage</h3><p>Where roof water is going and whether fascia and soffit are staying dry.</p></div>
      <div class="checklist-item"><h3>Storm &amp; hail damage</h3><p>Impact marks and wind lift, photographed and documented for your records or your adjuster.</p></div>
    </div>
  </div>
</section>

<!-- ===================== 5 · PROCESS ===================== -->
<section class="section ri-process" aria-label="How a roof inspection works">
  <div class="container">
    <div class="section-header" style="max-width:720px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Simple &amp; Clear</span>
      <h2>How does a free roof inspection work?</h2>
      <p class="answer-block">
        Call, and we come take a look. Triple G Roofing &amp; Construction keeps the process short and clear: we walk the
        roof, photograph what we find, explain it in plain English, and put any recommended work in writing — no
        pressure and no obligation to hire us.
      </p>
    </div>
    <div class="timeline">
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">1</div>
        <h3>Call or request online</h3>
        <p>Reach us at <?php echo $phone; ?> or through the contact form and we will get your inspection on the schedule quickly.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">2</div>
        <h3>Full roof walk</h3>
        <p>The owner inspects shingles, flashing, decking, ventilation, and gutters, photographing every issue — and takes real measurements while up there.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">3</div>
        <h3>Plain-English report</h3>
        <p>You see the photos and get a straight verdict — repair, possible claim, or nothing needed right now.</p>
      </div>
      <div class="timeline-step" data-animate>
        <div class="timeline-step__num">4</div>
        <h3>Written next steps</h3>
        <p>If work is needed, we hand you a free written estimate and, for storm damage, walk you through the claims process and meet your adjuster.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROOF ===================== -->
<section class="section ri-proof" aria-label="Reviews and recent work">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Real Reviews</span>
      <h2>What do Greater Houston homeowners say about Triple G Roofing?</h2>
      <p class="answer-block">
        Triple G Roofing &amp; Construction has earned its reputation across Humble, Kingwood, Spring, Jersey Village, and
        the rest of the Greater Houston area the old-fashioned way — by showing up, telling the truth about what the roof
        needs, and standing behind the work. These are real reviews our customers published, name and city as written.
      </p>
    </div>

    <div class="ri-review-grid">
      <?php foreach ($pageReviews as $i => $r): ?>
      <blockquote class="ri-review ri-rv-up reveal-delay-<?php echo ($i % 3) + 1; ?>" data-animate>
        <p><?php echo htmlspecialchars(tg_review_excerpt($r['text'])); ?></p>
        <footer><cite><?php echo htmlspecialchars($r['name']); ?></cite><span><?php echo htmlspecialchars($r['city']); ?></span></footer>
      </blockquote>
      <?php endforeach; ?>
    </div>

    <div class="proof-photos ri-square" data-animate>
      <figure>
        <img src="/assets/images/roof-decking-rot.jpg"
             srcset="/assets/images/roof-decking-rot-480.webp 480w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Rotted roof decking exposed during tear-off"
             width="739" height="1600" loading="lazy">
      </figure>
      <figure>
        <img src="/assets/images/roof-overhead.jpg"
             srcset="/assets/images/roof-overhead-480.webp 480w, /assets/images/roof-overhead-960.webp 960w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Overhead view of a completed architectural shingle roof"
             width="1200" height="1600" loading="lazy">
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
        For a Greater Houston roof, a local roofer beats a national inspection service almost every time. Triple G
        Roofing &amp; Construction lives in the same weather you do, the owner answers for the work personally, and we stay
        on the job through the repair — while national outfits hand you a PDF and disappear. Here is the honest comparison.
      </p>
    </div>
    <div class="compare-grid">
      <div class="compare-col compare-col--them">
        <h3><?php echo icon('external-link', 22); ?> National inspection service</h3>
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> A contractor you&rsquo;ll never see again after the report</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Little sense of Gulf Coast heat, humidity, and hail patterns</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Call centers and scheduling windows, not the person doing the work</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> You&rsquo;re on your own to find someone for the actual repair</li>
        </ul>
      </div>
      <div class="compare-col compare-col--us">
        <h3><?php echo icon('shield', 22); ?> Triple G Roofing &amp; Construction</h3>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> The same family company inspects and repairs your roof — since 1973</li>
          <li><?php echo icon('check-circle', 20); ?> Built around Texas weather and the way Houston-area roofs actually fail</li>
          <li><?php echo icon('check-circle', 20); ?> Free inspection, free written estimate, owner on every job</li>
          <li><?php echo icon('check-circle', 20); ?> We walk you through the insurance claim process from start to finish</li>
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
      <h2>What else do Houston-area homeowners ask about roof inspections?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on cost, storms, and insurance — before you search for a roof inspection near me in Humble, Cypress, Baytown, or anywhere else around Greater Houston.</p>
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
    <h2>Ready for a free, no-obligation roof inspection?</h2>
    <p>Whether a storm just passed or you just want peace of mind, Triple G Roofing &amp; Construction will climb up,
      photograph what we find, and tell you the truth — across Humble, Kingwood, The Woodlands, Pasadena and the whole
      Greater Houston area.</p>
    <div class="ri-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Book My Free Inspection</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <p class="phone-line">Prefer to talk? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — <?php echo $businessHours; ?>.</p>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section ri-related" aria-label="Other services you may need">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">What We Do</span>
      <h2>What other roofing services might your home need?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">If our inspection turns up a problem, here&rsquo;s how Triple G Roofing &amp; Construction fixes it across Greater Houston.</p>
    </div>
    <div class="services-grid">
      <?php foreach ($relatedServices as $i => $s):
        $tint = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-delay-<?php echo $tint; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $s['img']; ?>.jpg"
               srcset="<?php echo $s['srcset']; ?>"
               sizes="(max-width: 600px) 100vw, (max-width: 1024px) 50vw, 380px"
               alt="<?php echo htmlspecialchars($s['alt']); ?>" width="<?php echo $s['w']; ?>" height="<?php echo $s['h']; ?>" loading="lazy">
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
