<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Service — Gutter Installation · Triple G Roofing & Construction
   Premium editorial service page (8-section structure)
   Facts: references/CLIENT-FACTS.md (revised 2026-08-20)
   ============================================================ */

$currentPage     = 'services';
$serviceName     = 'Gutter Installation';
$serviceSlug     = 'gutter-installation';
$pageTitle       = 'Gutter Installation Houston TX | Triple G Roofing & Construction';
$pageDescription = 'New gutters and downspouts across the Greater Houston area from Triple G Roofing & Construction, family-owned since 1973. Fascia and soffit repair too. Free inspection. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';
$ogImage         = 'gutter-installation-v2-480.webp';
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

/* --- FAQs — gutter installation, Greater Houston (fact-safe) --- */
$faqs = [
    [
        'q' => 'How much does gutter installation cost in the Houston area?',
        'a' => 'It depends on the length of your roofline, the number of corners and downspouts, how many stories the home has, and whether any fascia behind the gutter needs repair first. Triple G Roofing & Construction measures your home for free and gives you a written estimate before any work begins.',
    ],
    [
        'q' => 'Can you fix the rotted fascia behind my old gutters at the same time?',
        'a' => 'Yes — and you should. Gutters hang from the fascia board, so new gutters on rotted wood will sag and pull loose. Triple G Roofing & Construction repairs or replaces fascia and soffit, handles the wood rot, and paints to match before the new gutters go up. One call covers the whole edge of the roof.',
    ],
    [
        'q' => 'Are gutter guards worth it around Houston?',
        'a' => 'For homes shaded by pines and oaks — common across Humble, Atascocita, Kingwood and The Woodlands — gutter guards are often worth it. They keep leaves and pine needles out so water flows freely and you climb the ladder far less often. We will tell you honestly whether your tree cover justifies the added cost.',
    ],
    [
        'q' => 'Should I get bigger gutters for Gulf Coast downpours?',
        'a' => 'Often, yes. Larger gutters and downspouts move noticeably more water than standard sizes, which matters when a Gulf Coast storm dumps inches of rain in an hour. Triple G Roofing & Construction sizes the system to your roof area and pitch so it overflows less and protects your fascia and foundation better.',
    ],
    [
        'q' => 'How often do gutters need cleaning or maintenance?',
        'a' => 'Plan to clean gutters at least twice a year — spring and late fall — and after major storms. Homes with heavy tree cover may need more frequent cleaning unless guards are installed. Clogged gutters overflow, rot the fascia, and dump water at your foundation, undoing the whole point of the system.',
    ],
    [
        'q' => 'Do gutters really protect my foundation?',
        'a' => 'Yes. Gutters catch roof runoff and route it through downspouts away from the slab. Without them, rain sheets straight off the eaves and pools against your foundation, where Houston-area clay soils swell and shrink and can stress a slab. Properly pitched gutters are one of the simplest forms of foundation protection you can buy.',
    ],
];

/* --- Related services (3 cards) — fact-safe bullets, manifest alt text --- */
$relatedServices = [
    [
        'name' => 'Siding, Fascia & Soffit', 'slug' => 'siding-fascia-soffit', 'img' => 'siding-fascia-soffit', 'w' => 1200, 'h' => 1600,
        'srcset' => '/assets/images/siding-fascia-soffit-480.webp 480w, /assets/images/siding-fascia-soffit-960.webp 960w',
        'alt' => 'Crew member replacing siding on a dormer above a shingle roof',
        'desc' => 'Siding, fascia, soffit, and wood-rot repair with exterior paint to finish.',
        'bullets' => ['Hardie and vinyl siding', 'Wood-rot repair', 'Matched trim and paint'],
        'icon' => icon('ruler', 26),
    ],
    [
        'name' => 'Roof Repair', 'slug' => 'roof-repair', 'img' => 'roof-repair-v2', 'w' => 1200, 'h' => 1600,
        'srcset' => '/assets/images/roof-repair-v2-480.webp 480w, /assets/images/roof-repair-v2-960.webp 960w',
        'alt' => 'New step flashing sealed against a brick chimney during a roof repair',
        'desc' => 'Leak, flashing, pipe-boot, and decking repairs that stop water at the source.',
        'bullets' => ['Leaks traced to the source', 'Flashing and pipe boots', 'Free written estimate'],
        'icon' => icon('wrench', 26),
    ],
    [
        'name' => 'Roof Inspection', 'slug' => 'roof-inspection', 'img' => 'roof-inspection-v2', 'w' => 1200, 'h' => 1600,
        'srcset' => '/assets/images/roof-inspection-v2-480.webp 480w, /assets/images/roof-inspection-v2-960.webp 960w',
        'alt' => 'Close-up of cracked and lifted shingles found during a roof inspection',
        'desc' => 'Free, photo-documented inspections that show you exactly what your roof needs.',
        'bullets' => ['Free, no-obligation inspections', 'Photos of every finding', 'Owner on every job'],
        'icon' => icon('search', 26),
    ],
];

/* --- Schema: Service + FAQPage + BreadcrumbList (all 50 communities as areaServed) --- */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type"    => "Service",
    "@id"      => $canonicalUrl . '#service-' . $serviceSlug,
    "serviceType" => $serviceName,
    "name"     => $serviceName . ' — Greater Houston, ' . $address['state'],
    "description" => 'New gutters and downspouts across the Greater Houston area from Triple G Roofing & Construction, a family-owned father-and-son company based in Humble, TX since 1973 — measured and pitched to your roofline, with fascia and soffit repair available in the same visit and free written estimates.',
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
   Gutter Installation — page-specific styles (Premium tier)
   Tokens only (var()); the water-path flow (gi-path) signature
   section is unique to this page.
   ============================================================ */
:root {
  --svc-accent: var(--color-primary);
  --svc-accent-soft: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --svc-grad-angle: 115deg;
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, #fff);
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, #fff);
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, #fff);
  --color-card-tint-neutral: var(--color-white);
}
.sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
[data-animate].reveal-delay-1 { transition-delay:.06s; }
[data-animate].reveal-delay-2 { transition-delay:.14s; }
[data-animate].reveal-delay-3 { transition-delay:.22s; }
.gi-page h2 { text-wrap:balance; }

/* ---- Breadcrumb ---- */
.gi-breadcrumb { background:var(--color-light); border-bottom:1px solid var(--color-gray-light); }
.gi-breadcrumb ol { list-style:none; display:flex; flex-wrap:wrap; gap:var(--space-2); align-items:center; padding:var(--space-3) 0; margin:0; font-size:var(--font-size-sm); color:var(--color-gray); }
.gi-breadcrumb a { color:var(--color-gray-dark); }
.gi-breadcrumb a:hover { color:var(--svc-accent); }
.gi-breadcrumb [aria-current] { color:var(--svc-accent); font-weight:600; }
.gi-breadcrumb-sep { color:var(--color-gray-light); }

/* =====================================================
   1 · HERO — layered photo + gradient overlay + noise
   ===================================================== */
.gi-hero { position:relative; min-height:60vh; display:flex; align-items:center; padding:104px 0 var(--space-16); overflow:hidden; }
.gi-hero__bg { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
.gi-hero::before { content:''; position:absolute; inset:0; z-index:1;
  background:linear-gradient(var(--svc-grad-angle), rgba(var(--color-secondary-rgb),.95) 0%, rgba(var(--color-secondary-rgb),.83) 46%, rgba(var(--color-secondary-rgb),.58) 100%); }
.gi-hero::after { content:''; position:absolute; inset:0; z-index:1; pointer-events:none; opacity:.05;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.gi-hero__inner { position:relative; z-index:2; max-width:840px; }
.gi-hero__eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); font-family:var(--font-heading); font-size:var(--font-size-sm); font-weight:600; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); background:rgba(var(--color-primary-rgb),.16); border:1px solid rgba(255,255,255,.16); padding:var(--space-2) var(--space-4); border-radius:var(--radius-full); margin-bottom:var(--space-5); }
.gi-hero__eyebrow svg { width:16px; height:16px; }
.gi-hero h1 { color:var(--color-white); font-size:clamp(2.3rem,5vw,3.9rem); line-height:1.04; margin-bottom:var(--space-5); }
.gi-hero h1 .text-accent { font-size:1.06em; }
.hero-answer { color:rgba(255,255,255,.9); font-size:var(--font-size-lg); line-height:1.7; max-width:60ch; margin-bottom:var(--space-6); }
.gi-hero__actions { display:flex; flex-wrap:wrap; gap:var(--space-4); margin-bottom:var(--space-8); }
.gi-hero__actions .btn svg { width:18px; height:18px; }
.gi-hero__trust { display:flex; flex-wrap:wrap; gap:var(--space-3) var(--space-6); }
.gi-hero__trust-item { display:flex; align-items:center; gap:var(--space-2); color:rgba(255,255,255,.92); font-size:var(--font-size-sm); font-weight:500; position:relative; }
.gi-hero__trust-item svg { width:18px; height:18px; color:var(--color-accent); flex-shrink:0; }
.gi-hero__trust-item + .gi-hero__trust-item::before { content:''; position:absolute; left:calc(-1 * var(--space-3)); top:50%; width:1px; height:16px; transform:translateY(-50%); background:rgba(255,255,255,.22); }

/* ---- Answer blocks (AEO) ---- */
.answer-block { background:var(--svc-accent-soft); border-left:4px solid var(--svc-accent); border-radius:var(--radius-md); padding:var(--space-5) var(--space-6); color:var(--color-gray-dark); line-height:1.7; font-size:var(--font-size-lg); max-width:72ch; margin:0 auto; }
.section-header .answer-block { margin-top:var(--space-4); text-align:left; }

/* =====================================================
   2 · PROBLEM — pull-quote + damage bento
   ===================================================== */
.gi-problem { background:var(--color-white); }
.gi-pullquote { font-family:var(--font-heading); font-weight:800; font-size:clamp(1.6rem,3.4vw,2.5rem); line-height:1.25; color:var(--color-dark); max-width:22ch; margin:var(--space-8) 0 var(--space-4); }
.gi-pullquote span { color:var(--svc-accent); }
.gi-bento { display:grid; grid-template-columns:repeat(5,1fr); gap:var(--space-5); margin-top:var(--space-10); }
.gi-harm-card { background:var(--color-light); border:1px solid var(--color-gray-light); border-radius:var(--radius-lg); padding:var(--space-6); position:relative; overflow:hidden; transition:transform var(--transition-base), box-shadow var(--transition-base); }
.gi-harm-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.gi-harm-card:first-child { grid-column:span 2; background:linear-gradient(135deg, var(--svc-accent-soft), var(--color-white)); }
.gi-harm-card::after { content:''; position:absolute; left:0; top:0; width:4px; height:0; background:var(--svc-accent); transition:height var(--transition-base); }
.gi-harm-card:hover::after { height:100%; }
.gi-harm-card__ico { width:48px; height:48px; border-radius:var(--radius-md); background:var(--svc-accent); color:var(--color-white); display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-4); }
.gi-harm-card__ico svg { width:24px; height:24px; }
.gi-harm-card h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-2); }
.gi-harm-card p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   3 · EXPERT POSITIONING — asymmetric stat + copy + photo
   ===================================================== */
.gi-expert { background:var(--color-secondary); position:relative; overflow:hidden; }
.gi-expert::before { content:''; position:absolute; inset:0; pointer-events:none;
  background:radial-gradient(ellipse at 85% 0%, rgba(var(--color-primary-rgb),.22) 0%, transparent 60%); }
.gi-expert .container { position:relative; z-index:1; }
.gi-expert-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-16); align-items:center; }
.gi-expert-copy .eyebrow { display:inline-block; font-family:var(--font-heading); font-size:var(--font-size-xs); font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-3); }
.gi-expert-copy h2 { color:var(--color-white); margin-bottom:var(--space-4); }
.gi-expert-copy .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.9); margin:0 0 var(--space-6); }
.gi-expert-stats { display:flex; gap:var(--space-8); margin:var(--space-6) 0; flex-wrap:wrap; }
.gi-expert-stat { position:relative; padding-bottom:var(--space-3); }
.gi-expert-stat::after { content:''; position:absolute; left:0; bottom:0; width:32px; height:3px; border-radius:var(--radius-full); background:var(--color-accent); }
.gi-expert-stat .num { font-family:var(--font-heading); font-weight:800; font-size:clamp(2.4rem,5vw,3.25rem); line-height:1; color:var(--color-accent); }
.gi-expert-stat .lbl { font-size:var(--font-size-sm); color:rgba(255,255,255,.75); margin-top:var(--space-2); text-transform:uppercase; letter-spacing:1px; }
.gi-expert-diffs { list-style:none; margin:var(--space-6) 0 0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.gi-expert-diffs li { display:flex; gap:var(--space-3); color:rgba(255,255,255,.88); font-size:var(--font-size-base); line-height:1.55; }
.gi-expert-diffs svg { width:22px; height:22px; color:var(--color-accent); flex-shrink:0; margin-top:2px; }
.gi-expert-figure { position:relative; }
.gi-expert-figure img { width:100%; border-radius:var(--radius-lg); box-shadow:var(--shadow-xl); object-fit:cover; transition:transform var(--transition-slow); }
.gi-expert-figure:hover img { transform:scale(1.03); }
.gi-expert-figure::after { content:''; position:absolute; inset:0; border-radius:var(--radius-lg); background:linear-gradient(to top, rgba(var(--color-secondary-rgb),.4) 0%, transparent 55%); pointer-events:none; }

/* =====================================================
   4 · SIGNATURE — the water path (unique horizontal flow)
   ===================================================== */
.gi-path { background:var(--color-white); position:relative; overflow:hidden; }
.gi-path__float { position:absolute; top:10%; right:3%; width:200px; height:200px; border-radius:50%; background:radial-gradient(circle, rgba(var(--color-primary-rgb),.06), transparent 70%); pointer-events:none; }
.gi-flow { display:flex; align-items:stretch; margin-top:var(--space-12); }
.gi-flow-step { flex:1; display:flex; flex-direction:column; align-items:center; text-align:center; padding:var(--space-5) var(--space-4); position:relative; }
.gi-flow-step__ico { width:72px; height:72px; border-radius:var(--radius-full); background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); display:flex; align-items:center; justify-content:center; box-shadow:var(--shadow-md); margin-bottom:var(--space-4); position:relative; z-index:1; }
.gi-flow-step__ico svg { width:30px; height:30px; }
.gi-flow-step__num { position:absolute; top:0; left:50%; transform:translateX(-50%); font-family:var(--font-heading); font-weight:800; font-size:var(--font-size-sm); color:var(--svc-accent); background:var(--svc-accent-soft); border-radius:var(--radius-full); width:26px; height:26px; display:flex; align-items:center; justify-content:center; }
.gi-flow-step h3 { font-size:var(--font-size-base); color:var(--color-dark); margin-bottom:var(--space-2); }
.gi-flow-step p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; margin:0; max-width:24ch; }
.gi-flow-arrow { display:flex; align-items:center; justify-content:center; color:var(--svc-accent); flex-shrink:0; padding-top:36px; }
.gi-flow-arrow svg { width:34px; height:34px; }
.gi-flow-arrow--v { display:none; }

/* =====================================================
   5 · BREAKDOWN — what's included install timeline
   ===================================================== */
.gi-breakdown { background:var(--color-light); }
.gi-timeline { max-width:820px; margin:var(--space-12) auto 0; position:relative; }
.gi-timeline::before { content:''; position:absolute; left:23px; top:8px; bottom:8px; width:2px; background:linear-gradient(to bottom, var(--svc-accent), var(--color-accent)); }
.gi-timeline-step { position:relative; padding:0 0 var(--space-8) var(--space-16); }
.gi-timeline-step:last-child { padding-bottom:0; }
.gi-timeline-step__num { position:absolute; left:0; top:0; width:48px; height:48px; border-radius:var(--radius-full); background:linear-gradient(135deg, var(--svc-accent), var(--color-accent)); color:var(--color-white); display:flex; align-items:center; justify-content:center; box-shadow:var(--shadow-md); z-index:1; transition:transform var(--transition-base), box-shadow var(--transition-base); }
.gi-timeline-step__num svg { width:22px; height:22px; }
.gi-timeline-step:hover .gi-timeline-step__num { transform:scale(1.08); box-shadow:var(--shadow-lg); }
.gi-timeline-step h3 { font-size:var(--font-size-lg); color:var(--color-dark); margin-bottom:var(--space-1); }
.gi-timeline-step p { font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.6; margin:0; }

/* =====================================================
   6 · PROOF — reviews + project photos
   ===================================================== */
.gi-proof { background:var(--color-dark); position:relative; overflow:hidden; }
.gi-proof::before { content:''; position:absolute; inset:0; pointer-events:none; background:radial-gradient(ellipse at 15% 100%, rgba(var(--color-primary-rgb),.2) 0%, transparent 60%); }
.gi-proof .container { position:relative; z-index:1; }
.gi-proof .section-header h2 { color:var(--color-white); }
.gi-proof .section-header .eyebrow { color:var(--color-accent); }
.gi-proof .answer-block { background:rgba(255,255,255,.06); border-left-color:var(--color-accent); color:rgba(255,255,255,.88); }
.gi-proof-photos { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); margin-top:var(--space-10); }
.gi-proof-photos figure { margin:0; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl); position:relative; }
.gi-proof-photos img { width:100%; height:100%; object-fit:cover; aspect-ratio:4/3; transition:transform var(--transition-slow); }
.gi-proof-photos figure:hover img { transform:scale(1.05); }
.reviews-embed { margin-top:var(--space-8); min-height:100px; }
.gi-proof-badges { display:flex; flex-wrap:wrap; gap:var(--space-4); justify-content:center; margin-top:var(--space-8); }
.gi-proof-badges a { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); color:var(--color-white); font-size:var(--font-size-sm); font-weight:600; padding:var(--space-3) var(--space-5); border-radius:var(--radius-full); transition:background var(--transition-fast), border-color var(--transition-fast); }
.gi-proof-badges a:hover { background:rgba(var(--color-primary-rgb),.2); border-color:var(--svc-accent); color:var(--color-white); }
.gi-proof-badges svg { width:18px; height:18px; color:var(--color-star); }

/* =====================================================
   7 · COMPARISON — seamless vs sectional
   ===================================================== */
.gi-compare { background:var(--color-white); }
.gi-compare-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-8); margin-top:var(--space-12); }
.gi-compare-col { border-radius:var(--radius-lg); padding:var(--space-8); border:1px solid var(--color-gray-light); transition:transform var(--transition-base), box-shadow var(--transition-base); }
.gi-compare-col--them { background:var(--color-light); }
.gi-compare-col--us { background:linear-gradient(160deg, var(--svc-accent-soft), var(--color-white)); border-color:color-mix(in srgb, var(--svc-accent) 30%, #fff); box-shadow:var(--shadow-lg); }
.gi-compare-col--us:hover { transform:translateY(-4px); box-shadow:var(--shadow-xl); }
.gi-compare-col h3 { font-size:var(--font-size-xl); margin-bottom:var(--space-5); display:flex; align-items:center; gap:var(--space-3); }
.gi-compare-col--us h3 { color:var(--svc-accent); }
.gi-compare-col ul { list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:var(--space-4); }
.gi-compare-col li { display:flex; gap:var(--space-3); font-size:var(--font-size-sm); color:var(--color-gray-dark); line-height:1.55; }
.gi-compare-col li svg { width:20px; height:20px; flex-shrink:0; margin-top:2px; }
.gi-compare-col--them li svg { color:var(--color-gray); }
.gi-compare-col--us li svg { color:var(--color-success); }

/* =====================================================
   8 · FAQ
   ===================================================== */
.gi-faq { background:var(--color-light); }
.gi-faq-grid { display:grid; grid-template-columns:1fr 1fr; gap:var(--space-6); align-items:start; margin-top:var(--space-10); }
.faq-item { display:block; padding:0; background:var(--color-white); border-radius:var(--radius-lg); border:1px solid var(--color-gray-light); overflow:hidden; transition:box-shadow var(--transition-base); }
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
.gi-related { background:var(--color-white); }
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
.gi-cta { position:relative; overflow:hidden; text-align:center; padding:var(--space-16) 0;
  background:linear-gradient(135deg, color-mix(in srgb, var(--color-primary) 82%, #000) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); }
.gi-cta::before { content:''; position:absolute; inset:0; pointer-events:none; opacity:.06;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.gi-cta .container { position:relative; z-index:1; }
.gi-cta h2 { color:var(--color-white); font-size:clamp(1.9rem,4vw,2.75rem); margin-bottom:var(--space-4); }
.gi-cta p { color:rgba(255,255,255,.92); max-width:60ch; margin:0 auto var(--space-8); font-size:var(--font-size-lg); }
.gi-cta__actions { display:flex; gap:var(--space-4); justify-content:center; flex-wrap:wrap; }
.gi-cta .btn svg { width:18px; height:18px; }
.gi-cta .phone-line { margin-top:var(--space-6); color:rgba(255,255,255,.82); }
.gi-cta .phone-line a { color:var(--color-accent); font-weight:700; }

/* ---- SVG dividers ---- */
.svg-divider { display:block; overflow:hidden; line-height:0; }
.svg-divider svg { display:block; width:100%; height:100%; }
.svg-divider--diagonal { height:60px; }
.svg-divider--wave { height:72px; }

/* ---- Focus visibility (WCAG AA) ---- */
.gi-hero a:focus-visible, .service-card__cta:focus-visible, .gi-cta a:focus-visible, .gi-proof-badges a:focus-visible, .faq-item summary:focus-visible, .gi-harm-card:focus-within { outline:3px solid var(--color-accent); outline-offset:2px; border-radius:var(--radius-sm); }
::selection { background:rgba(var(--color-primary-rgb),.85); color:var(--color-white); }

/* ---- Multi-directional reveals ---- */
[data-animate].gi-rv-left { transform:translateX(-36px); }
[data-animate].gi-rv-right { transform:translateX(36px); }
[data-animate].gi-rv-down { transform:translateY(-30px); }
[data-animate].gi-rv-scale { transform:scale(0.93); }
[data-animate].gi-rv-left.animated,
[data-animate].gi-rv-right.animated,
[data-animate].gi-rv-down.animated,
[data-animate].gi-rv-scale.animated { transform:none; }

/* ---- Hero eyebrow pulse ---- */
.gi-hero__eyebrow svg { animation:gi-pulse 2.6s ease-in-out infinite; }
@keyframes gi-pulse { 0%, 100% { opacity:1; } 50% { opacity:0.55; } }

@media (prefers-reduced-motion: reduce) {
  .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img, .gi-harm-card:hover,
  .gi-expert-figure:hover img, .gi-proof-photos figure:hover img, .gi-compare-col--us:hover,
  .gi-timeline-step:hover .gi-timeline-step__num { transform:none; }
  .gi-hero__eyebrow svg { animation:none; }
  [data-animate].gi-rv-left, [data-animate].gi-rv-right, [data-animate].gi-rv-down, [data-animate].gi-rv-scale { transform:none; }
}
@media (max-width:1024px) {
  .gi-expert-grid { grid-template-columns:1fr; gap:var(--space-10); }
  .gi-bento { grid-template-columns:1fr 1fr; }
  .gi-harm-card:first-child, .gi-harm-card:last-child { grid-column:span 2; }
  .services-grid { grid-template-columns:repeat(2,1fr); }
}
@media (max-width:900px) {
  .gi-expert-stats { gap:var(--space-6); }
  .gi-pullquote { max-width:none; }
  .gi-flow { flex-direction:column; align-items:center; gap:var(--space-2); }
  .gi-flow-arrow { padding-top:0; transform:rotate(90deg); }
}
@media (max-width:768px) {
  .gi-compare-grid { grid-template-columns:1fr; }
  .gi-faq-grid { grid-template-columns:1fr; }
  .gi-timeline::before { left:19px; }
  .gi-timeline-step { padding-left:var(--space-12); }
  .gi-timeline-step__num { width:40px; height:40px; }
}
@media (max-width:600px) {
  .gi-bento { grid-template-columns:1fr; }
  .gi-harm-card:first-child, .gi-harm-card:last-child { grid-column:auto; }
  .gi-proof-photos { grid-template-columns:1fr; }
  .services-grid { grid-template-columns:1fr; }
  .gi-hero h1 { font-size:clamp(2rem,8vw,2.6rem); }
}
@media (max-width:480px) {
  .gi-hero__actions .btn, .gi-cta__actions .btn { width:100%; justify-content:center; }
  .gi-compare-col { padding:var(--space-6); }
  .gi-proof-badges a { width:100%; justify-content:center; }
}
@media print {
  .gi-hero, .gi-cta, .gi-expert, .gi-proof { background:none !important; color:var(--color-dark) !important; }
  .gi-hero__bg, .gi-path__float, .svg-divider { display:none !important; }
  .gi-hero h1, .hero-answer, .gi-expert-copy h2, .gi-proof .section-header h2 { color:var(--color-dark) !important; }
  .faq-item, .gi-harm-card, .gi-timeline-step { break-inside:avoid; }
  [data-animate] { opacity:1 !important; transform:none !important; }
}

/* =====================================================
   REAL REVIEWS — client-published quotes (name + city)
   Dark proof-section cards with oversized opening quote mark,
   accent-on-hover border, and a 3→2→1 responsive grid.
   ===================================================== */
.gi-review-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-10);
}
.gi-review {
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
.gi-review:hover {
  transform: translateY(-4px);
  border-color: color-mix(in srgb, var(--svc-accent) 55%, transparent);
  background: rgba(var(--color-primary-rgb), .08);
}
.gi-review::before {
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
.gi-review:first-child {
  background: linear-gradient(160deg, rgba(var(--color-primary-rgb), .14), rgba(255, 255, 255, .04));
}
.gi-review p {
  position: relative;
  color: rgba(255, 255, 255, .86);
  font-size: var(--font-size-sm);
  line-height: 1.7;
  margin: 0;
  flex: 1;
}
.gi-review footer {
  display: flex;
  flex-direction: column;
  gap: var(--space-1);
  padding-top: var(--space-4);
  border-top: 1px solid rgba(255, 255, 255, .1);
}
.gi-review cite {
  font-style: normal;
  font-family: var(--font-heading);
  font-weight: 700;
  color: var(--color-white);
}
.gi-review footer span {
  font-size: var(--font-size-xs);
  color: var(--color-accent);
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* =====================================================
   LAST-UPDATED STAMP — lives in the breadcrumb bar
   ===================================================== */
.gi-breadcrumb .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: var(--space-2);
}
.gi-updated {
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
.gi-portrait {
  aspect-ratio: 4 / 5;
  overflow: hidden;
  border-radius: var(--radius-lg);
}
.gi-portrait img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 40%;
}
.gi-square img {
  aspect-ratio: 1 / 1;
  object-position: center 45%;
}
.gi-hero__bg {
  object-position: center 38%;
}

/* ---- Responsive + motion + print for the additions ---- */
@media (max-width: 1024px) {
  .gi-review-grid {
    grid-template-columns: 1fr 1fr;
  }
}
@media (max-width: 700px) {
  .gi-review-grid {
    grid-template-columns: 1fr;
  }
  .gi-updated {
    width: 100%;
    padding-top: 0;
  }
}
@media (max-width: 600px) {
  .gi-portrait {
    aspect-ratio: 4 / 5;
    max-height: 70vh;
  }
}
@media (prefers-reduced-motion: reduce) {
  .gi-review:hover {
    transform: none;
  }
}
@media print {
  .gi-review {
    border-color: var(--color-gray-light);
    break-inside: avoid;
  }
  .gi-review p,
  .gi-review cite {
    color: var(--color-dark) !important;
  }
}
</style>

<div class="gi-page">

<!-- ===================== BREADCRUMB ===================== -->
<nav class="gi-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="gi-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="gi-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page">Gutter Installation</a></li>
    </ol>
    <span class="gi-updated">Last Updated: <?php echo date('F Y'); ?></span>
  </div>
</nav>

<!-- ===================== 1 · HERO ===================== -->
<section class="gi-hero" aria-label="Gutter installation across the Greater Houston area">
  <img class="gi-hero__bg"
       src="/assets/images/hero-roof-home-v2.jpg"
       srcset="/assets/images/hero-roof-home-v2-480.webp 480w, /assets/images/hero-roof-home-v2-960.webp 960w, /assets/images/hero-roof-home-v2-1600.webp 1600w"
       sizes="100vw"
       alt="Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing &amp; Construction"
       width="1600" height="1333" loading="eager" fetchpriority="high">
  <div class="container gi-hero__inner">
    <span class="gi-hero__eyebrow"><?php echo icon('droplets', 16); ?> Gutter Installation · Humble, TX &amp; Greater Houston</span>
    <h1>New <span class="text-accent">Gutters</span> &amp; Downspouts in the Greater Houston Area</h1>
    <p class="hero-answer">
      Triple G Roofing &amp; Construction is a family-owned roofing and exterior contractor based in Humble, TX, serving
      the Greater Houston area since 1973. We install new gutters and downspouts measured to your roofline, set the
      right pitch, route every downspout so Gulf Coast downpours drain away from your foundation — and repair the
      fascia and soffit behind them in the same visit. Free inspection and written estimate.
    </p>
    <div class="gi-hero__actions">
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Gutter Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
    <div class="gi-hero__trust">
      <span class="gi-hero__trust-item"><?php echo icon('ruler', 18); ?> Measured to your roofline</span>
      <span class="gi-hero__trust-item"><?php echo icon('hammer', 18); ?> Fascia &amp; soffit repair, one call</span>
      <span class="gi-hero__trust-item"><?php echo icon('award', 18); ?> Serving Greater Houston since 1973</span>
      <span class="gi-hero__trust-item"><?php echo icon('home', 18); ?> Foundation protection</span>
    </div>
  </div>
</section>

<!-- ===================== 2 · PROBLEM ===================== -->
<section class="section gi-problem" aria-label="Why properly installed gutters matter">
  <div class="container">
    <div class="section-header" style="text-align:left; max-width:820px; margin-inline:0;">
      <span class="eyebrow" style="color:var(--color-primary);">Why It Matters</span>
      <h2>Why do Houston-area homes need properly installed gutters?</h2>
      <p class="answer-block">
        Without gutters, roof runoff sheets straight off your eaves and pools against the slab, where Houston-area clay
        soils swell, shrink, and stress foundations. Properly installed gutters catch that water and carry it away,
        protecting your fascia, soffits, siding, and foundation from the heavy Gulf Coast rain that rolls through
        Greater Houston.
      </p>
    </div>
    <p class="gi-pullquote">Every inch of rain on your roof has to go somewhere — <span>gutters decide whether it&rsquo;s away from your house or into it.</span></p>
    <div class="gi-bento">
      <div class="gi-harm-card gi-rv-left" data-animate>
        <div class="gi-harm-card__ico"><?php echo icon('home', 24); ?></div>
        <h3>Foundation erosion &amp; slab cracks</h3>
        <p>When rain dumps at the base of your home, the clay soil swells, shrinks, and shifts. Over a few seasons that movement erodes the grade and stresses the slab — one of the most expensive repairs a homeowner can face, whether you are in Humble, Deer Park, or Cypress.</p>
      </div>
      <div class="gi-harm-card gi-rv-scale" data-animate>
        <div class="gi-harm-card__ico"><?php echo icon('droplets', 24); ?></div>
        <h3>Fascia &amp; soffit rot</h3>
        <p>Water running off the roof edge soaks the fascia board and soffit until the wood rots and paint peels — we <a href="/services/siding-fascia-soffit/">repair that too</a>.</p>
      </div>
      <div class="gi-harm-card gi-rv-scale" data-animate>
        <div class="gi-harm-card__ico"><?php echo icon('wind', 24); ?></div>
        <h3>Pooling &amp; seepage</h3>
        <p>Standing water beside the foundation finds its way into garages, crawl spaces, and low-slab living areas.</p>
      </div>
      <div class="gi-harm-card gi-rv-right" data-animate>
        <div class="gi-harm-card__ico"><?php echo icon('minus', 24); ?></div>
        <h3>Overflowing, sagging gutters</h3>
        <p>Old gutters leak at the seams, pull loose from rotted fascia, and overflow exactly when a Gulf Coast storm hits hardest.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--diagonal" aria-hidden="true">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-secondary)" points="0,0 1200,60 0,60"/></svg>
</div>

<!-- ===================== 3 · EXPERT POSITIONING ===================== -->
<section class="section gi-expert" aria-label="Why choose Triple G Roofing for gutters">
  <div class="container">
    <div class="gi-expert-grid">
      <div class="gi-expert-copy">
        <span class="eyebrow">The Triple G Standard</span>
        <h2>Why choose Triple G Roofing for new gutters?</h2>
        <p class="answer-block">
          Triple G Roofing &amp; Construction installs gutters as part of a complete roof-and-drainage system, not a bolt-on
          afterthought. Because we also do roofing, fascia, soffit, and wood-rot repair, the whole edge of your roof gets
          fixed in one visit — by a father-and-son team serving Greater Houston since 1973, with the owner on every job.
        </p>
        <div class="gi-expert-stats">
          <div class="gi-expert-stat"><div class="num">1973</div><div class="lbl">Serving Greater Houston since</div></div>
          <div class="gi-expert-stat"><div class="num">Free</div><div class="lbl">Measure &amp; estimate</div></div>
          <div class="gi-expert-stat"><div class="num">1 call</div><div class="lbl">Gutters, fascia &amp; soffit</div></div>
        </div>
        <ul class="gi-expert-diffs">
          <li><?php echo icon('check-circle', 22); ?> Gutters measured and pitched to your roofline, not guessed from the ground</li>
          <li><?php echo icon('check-circle', 22); ?> Downspouts routed to discharge water well clear of the foundation</li>
          <li><?php echo icon('check-circle', 22); ?> Rotted fascia and soffit replaced and painted to match before the gutters go up</li>
        </ul>
      </div>
      <div class="gi-expert-figure gi-portrait gi-rv-right" data-animate>
        <img src="/assets/images/gutter-installation-v2.jpg"
             srcset="/assets/images/gutter-installation-v2-480.webp 480w"
             sizes="(max-width: 1024px) 100vw, 520px"
             alt="New downspout and gutter on a brick covered patio"
             width="720" height="960" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE — WATER PATH ===================== -->
<section class="section gi-path" aria-label="Where your roof water goes">
  <span class="gi-path__float" aria-hidden="true"></span>
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Follow The Water</span>
      <h2>Where does your roof water actually go?</h2>
      <p class="answer-block">
        On a home with a working gutter system, rain travels a simple, deliberate path: off the roof surface, into the
        gutter channel, down the downspout, and out away from the foundation. Break any link in that chain and the water
        ends up against your slab — or inside your fascia — instead.
      </p>
    </div>
    <div class="gi-flow">
      <div class="gi-flow-step gi-rv-scale" data-animate>
        <span class="gi-flow-step__num">1</span>
        <span class="gi-flow-step__ico"><?php echo icon('home', 30); ?></span>
        <h3>Roof surface</h3>
        <p>Rain sheets down the shingles toward the eaves during a Gulf Coast storm.</p>
      </div>
      <div class="gi-flow-arrow" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
      </div>
      <div class="gi-flow-step gi-rv-scale reveal-delay-1" data-animate>
        <span class="gi-flow-step__num">2</span>
        <span class="gi-flow-step__ico"><?php echo icon('droplets', 30); ?></span>
        <h3>Gutter channel</h3>
        <p>The pitched trough catches the water and steers it toward the corners and outlets.</p>
      </div>
      <div class="gi-flow-arrow" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
      </div>
      <div class="gi-flow-step gi-rv-scale reveal-delay-2" data-animate>
        <span class="gi-flow-step__num">3</span>
        <span class="gi-flow-step__ico"><?php echo icon('wind', 30); ?></span>
        <h3>Downspout</h3>
        <p>Downspouts carry the water straight down the wall without backing up.</p>
      </div>
      <div class="gi-flow-arrow" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
      </div>
      <div class="gi-flow-step gi-rv-scale reveal-delay-3" data-animate>
        <span class="gi-flow-step__num">4</span>
        <span class="gi-flow-step__ico"><?php echo icon('check-circle', 30); ?></span>
        <h3>Away from the foundation</h3>
        <p>Extensions release the water out past the slab and the soil that moves with it.</p>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-light);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,72 900,0 1200,36 L1200,72 L0,72 Z" fill="var(--color-white)"/></svg>
</div>

<!-- ===================== 5 · BREAKDOWN ===================== -->
<section class="section gi-breakdown" aria-label="What is included in a gutter installation">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">On Every Install</span>
      <h2>What&rsquo;s included in a Triple G Roofing gutter installation?</h2>
      <p class="answer-block">
        A Triple G Roofing &amp; Construction gutter installation includes careful measurement, a check of the fascia and
        soffit behind the old gutters, proper drainage pitch, secure hangers, and complete downspout routing. We finish
        with sealed corners and a walkthrough, so you see the whole system before we pack up.
      </p>
    </div>
    <div class="gi-timeline">
      <div class="gi-timeline-step" data-animate>
        <div class="gi-timeline-step__num"><?php echo icon('ruler', 22); ?></div>
        <h3>Measure &amp; plan your roofline</h3>
        <p>We measure every run, count the corners, and map downspout locations so the finished system fits your home exactly and drains where it should.</p>
      </div>
      <div class="gi-timeline-step" data-animate>
        <div class="gi-timeline-step__num"><?php echo icon('hammer', 22); ?></div>
        <h3>Repair the fascia &amp; soffit first</h3>
        <p>Rotted fascia or soffit gets replaced and painted to match before anything hangs from it — see our <a href="/services/siding-fascia-soffit/">siding, fascia &amp; soffit</a> work.</p>
      </div>
      <div class="gi-timeline-step" data-animate>
        <div class="gi-timeline-step__num"><?php echo icon('wrench', 22); ?></div>
        <h3>Set the pitch &amp; hangers</h3>
        <p>We hang each run with a slight, deliberate slope toward the downspouts for fast, quiet drainage and a clean look.</p>
      </div>
      <div class="gi-timeline-step" data-animate>
        <div class="gi-timeline-step__num"><?php echo icon('droplets', 22); ?></div>
        <h3>Route downspouts &amp; walk through</h3>
        <p>Downspouts and extensions carry water clear of the foundation; we seal every corner, clean up, and walk the finished system with you.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 6 · PROOF ===================== -->
<section class="section gi-proof" aria-label="Reviews and recent gutter work">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow">Real Reviews</span>
      <h2>What do Greater Houston homeowners say about Triple G Roofing?</h2>
      <p class="answer-block">
        Triple G Roofing &amp; Construction has earned its reputation across Humble, Kingwood, Atascocita, Spring, and the
        rest of the Greater Houston area the old-fashioned way — by showing up, doing clean work, and standing behind it.
        These are real reviews our customers published, name and city as written.
      </p>
    </div>

    <div class="gi-review-grid">
      <?php foreach ($pageReviews as $i => $r): ?>
      <blockquote class="gi-review gi-rv-up reveal-delay-<?php echo ($i % 3) + 1; ?>" data-animate>
        <p><?php echo htmlspecialchars(tg_review_excerpt($r['text'])); ?></p>
        <footer><cite><?php echo htmlspecialchars($r['name']); ?></cite><span><?php echo htmlspecialchars($r['city']); ?></span></footer>
      </blockquote>
      <?php endforeach; ?>
    </div>

    <div class="gi-proof-photos gi-square" data-animate>
      <figure>
        <img src="/assets/images/roof-finished-brick.jpg"
             srcset="/assets/images/roof-finished-brick-480.webp 480w, /assets/images/roof-finished-brick-960.webp 960w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Completed shingle roof replacement on a brick ranch home"
             width="1200" height="1600" loading="lazy">
      </figure>
      <figure>
        <img src="/assets/images/roof-large-home.jpg"
             srcset="/assets/images/roof-large-home-480.webp 480w, /assets/images/roof-large-home-960.webp 960w"
             sizes="(max-width: 600px) 100vw, 560px"
             alt="Large two-story brick home with a completed roof replacement"
             width="1200" height="1600" loading="lazy">
      </figure>
    </div>

    <div class="reviews-embed">
      <?php echo $elfsightEmbed; ?>
    </div>

    <div class="gi-proof-badges" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- ===================== 7 · COMPARISON ===================== -->
<section class="section gi-compare" aria-label="New gutters alone versus gutters with fascia repair">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Know The Difference</span>
      <h2>New gutters alone, or gutters with the fascia fixed too?</h2>
      <p class="answer-block">
        Gutters are only as good as the board they hang from. A gutter-only installer screws new gutters into rotted
        fascia and leaves; a roofing and exterior contractor fixes the wood first. On a Houston-area home facing heavy
        Gulf Coast rain, that difference decides whether the system stays tight for years or sags within a few seasons.
      </p>
    </div>
    <div class="gi-compare-grid">
      <div class="gi-compare-col gi-compare-col--them">
        <h3><?php echo icon('minus', 22); ?> Gutter-only installer</h3>
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> New gutters screwed into soft, rotted fascia that cannot hold them</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Nobody looks at the drip edge, shingles, or soffit while they are up there</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> A second contractor — and a second bill — for the wood rot and paint</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/></svg> Sagging and pulled hangers within a few seasons</li>
        </ul>
      </div>
      <div class="gi-compare-col gi-compare-col--us">
        <h3><?php echo icon('droplets', 22); ?> Gutters by Triple G Roofing &amp; Construction</h3>
        <ul>
          <li><?php echo icon('check-circle', 20); ?> Fascia and soffit repaired, replaced, and painted to match before the gutters go up</li>
          <li><?php echo icon('check-circle', 20); ?> The roof edge, drip edge, and shingles checked in the same visit — free</li>
          <li><?php echo icon('check-circle', 20); ?> Roofing, siding, gutters, patio covers, decks and fences — one call since 1973</li>
          <li><?php echo icon('check-circle', 20); ?> Owner on every job; ask about the workmanship guarantee for your project</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="svg-divider svg-divider--wave" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 72" preserveAspectRatio="none"><path d="M0,36 C300,72 900,0 1200,36 L1200,72 L0,72 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 8 · FAQ ===================== -->
<section class="section gi-faq" aria-label="Gutter installation FAQs">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow" style="color:var(--color-primary);">Good Questions</span>
      <h2>What else do Houston-area homeowners ask about gutters?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on cost, fascia rot, guards, sizing, and upkeep — before you search for gutter installation near me in Humble, Atascocita, Deer Park, or anywhere else around Greater Houston.</p>
    </div>
    <div class="gi-faq-grid">
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
<section class="gi-cta" aria-label="Get a free gutter installation estimate">
  <div class="container">
    <h2>Ready for gutters that protect your home — fascia included?</h2>
    <p>Stop letting rain pound your foundation. Triple G Roofing &amp; Construction will measure your roofline, fix the
      fascia and soffit behind the old gutters, and route every downspout away from the slab — free written estimates
      across Humble, Kingwood, Pasadena, La Porte and the whole Greater Houston area.</p>
    <div class="gi-cta__actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get My Free Gutter Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
    </div>
    <p class="phone-line">Prefer to talk? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — <?php echo $businessHours; ?>.</p>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section gi-related" aria-label="Other services you may need">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">What We Do</span>
      <h2>What other exterior services might your home need?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Gutters work best as part of a healthy roof edge — here&rsquo;s how Triple G Roofing &amp; Construction keeps the rest in shape across Greater Houston.</p>
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

</div><!-- /.gi-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
