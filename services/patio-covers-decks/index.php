<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Service — Patio Covers, Pergolas & Decks · Triple G Roofing
   Premium editorial service page (8-section structure)
   Facts: references/CLIENT-FACTS.md — nothing else is claimed.
   ============================================================ */

$currentPage = 'services';
$serviceSlug = 'patio-covers-decks';
$service     = null;
foreach ($services as $s) {
    if ($s['slug'] === $serviceSlug) { $service = $s; break; }
}
$serviceName     = $service['name'];
$pageTitle       = 'Patio Covers, Pergolas & Decks Houston | Triple G Roofing';
$pageDescription = 'Patio covers, pergolas and wood decks built by Triple G Roofing & Construction, a father-and-son team serving Greater Houston since 1973. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';
$ogImage         = 'patio-covers-decks-960.webp';

/* --- Real customer reviews tagged for this service (verbatim, sentence-trimmed) --- */
$reviews = getTestimonialsFor($serviceSlug, 3);
function pc_excerpt($text, $max = 480, $stopAt = null) {
    if ($stopAt !== null && ($p = mb_strpos($text, $stopAt)) !== false) { $text = rtrim(mb_substr($text, 0, $p)); }
    if (mb_strlen($text) <= $max) { return $text; }
    $cut = mb_substr($text, 0, $max);
    $pos = max((int) mb_strrpos($cut, '. '), (int) mb_strrpos($cut, '! '), (int) mb_strrpos($cut, '? '));
    return $pos > 80 ? mb_substr($cut, 0, $pos + 1) : rtrim($cut) . '…';
}
$pcStops = ['Leana' => 'Pricing is great'];

/* --- FAQs (fact-safe: no prices, no timelines, no permit promises) --- */
$faqs = [
    [
        'q' => 'Do I need a permit or HOA approval for a patio cover, pergola or deck?',
        'a' => 'It depends on where you live and what you are building. Some Greater Houston cities and many HOAs want to see plans for a solid-roof cover or an attached deck, while a freestanding pergola is often simpler. When Tim comes out for your free estimate he will tell you whether your project needs a permit, and we can help with the HOA paperwork so you are not chasing it alone.',
    ],
    [
        'q' => 'Should I build a pergola or a solid patio cover?',
        'a' => 'Choose a pergola if you want filtered shade, an open look and the least structure over your head. Choose a solid cover if you want a dry patio during Gulf Coast downpours, a ceiling for fans and lights, and real relief from the afternoon sun. Enclosed and screened versions add bug and weather protection on top of that. We walk you through all three on-site before you decide.',
    ],
    [
        'q' => 'Will the new cover leak where it meets my house?',
        'a' => 'Not when it is tied in correctly. That joint is where most patio covers fail, because it is a roofing detail, not a carpentry detail. Triple G Roofing & Construction is a roofing company first, so we flash the cover into your existing roof and wall the same way we flash a roof, and we tell you if the shingles in that area need attention before we build.',
    ],
    [
        'q' => 'Can you match the cover to my existing roof and trim?',
        'a' => 'Yes. Matching is most of the job. We carry the same shingle or metal onto the new cover, match the fascia, trim and paint, and shape the roofline so the addition looks like it was part of the original house. One Porter customer told us we matched the trim and everything perfectly.',
    ],
    [
        'q' => 'Can you build a deck around a tree or on uneven ground?',
        'a' => 'Yes. We frame decks to the yard you have, including wrapping a mature tree with a clearance ring and custom railing, stepping the deck down a slope, and tying new framing to an existing slab or porch. Every deck starts with pressure-treated framing on proper footings so it stays level and solid underfoot.',
    ],
    [
        'q' => 'How much does a patio cover or deck cost?',
        'a' => 'Every cover and deck is built to the house, so there is no honest flat price. Size, roof type, ceiling finish, fans and lighting, and how the structure ties into your home all change the number. Tim measures on-site and hands you a free written estimate with the options spelled out, so you can decide what fits your budget.',
    ],
];

/* --- Related services (3 cards, required-components markup) --- */
$relatedServices = [
    [
        'name' => 'Roof Replacement', 'slug' => 'roof-replacement', 'img' => 'roof-replacement', 'variants' => [480, 960],
        'alt' => 'Triple G crew replacing the roof on a two-story brick home',
        'desc' => 'Full architectural-shingle and metal roof replacements across the Greater Houston area.',
        'bullets' => ['Architectural shingle or metal', 'Decking and underlayment handled', 'Owner on every job'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>',
    ],
    [
        'name' => 'Fences & Gates', 'slug' => 'fences-gates', 'img' => 'fences-gates', 'variants' => [480, 960],
        'alt' => 'New pine privacy fence with a Triple G Roofing yard sign',
        'desc' => 'Cedar and pine privacy fences, ranch rail and custom gates.',
        'bullets' => ['Cedar or pine privacy', 'Single and double gates', 'Repairs and partial replacement'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9"/><path d="m18 15 4-4"/><path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"/></svg>',
    ],
    [
        'name' => 'Siding, Fascia & Soffit', 'slug' => 'siding-fascia-soffit', 'img' => 'siding-fascia-soffit', 'variants' => [480, 960],
        'alt' => 'Crew member replacing siding on a dormer above a shingle roof',
        'desc' => 'Siding, fascia, soffit, wood-rot repair and exterior paint.',
        'bullets' => ['Hardie and vinyl siding', 'Wood-rot repair included', 'Trim and paint matched'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 7 6 2"/><path d="M18.992 12H2.041"/><path d="M21.145 18.38A3.34 3.34 0 0 1 20 16.5a3.3 3.3 0 0 1-1.145 1.88c-.575.46-.855 1.02-.855 1.595A2 2 0 0 0 20 22a2 2 0 0 0 2-2.025c0-.58-.285-1.13-.855-1.595"/><path d="m8.5 4.5 2.148-2.148a1.205 1.205 0 0 1 1.704 0l7.296 7.296a1.205 1.205 0 0 1 0 1.704l-7.592 7.592a3.615 3.615 0 0 1-5.112 0l-3.888-3.888a3.615 3.615 0 0 1 0-5.112L5.67 7.33"/></svg>',
    ],
];

/* --- Schema: Service (generateServiceSchema) + BreadcrumbList + FAQPage --- */
$serviceSchema = json_decode(generateServiceSchema($service), true);
$serviceSchema = ['@context' => 'https://schema.org', '@id' => $canonicalUrl . '#service'] + $serviceSchema;
$serviceSchema['url']   = $canonicalUrl;
$serviceSchema['image'] = $siteUrl . '/assets/images/patio-covers-decks-960.webp';
$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',      'item' => $siteUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',  'item' => $siteUrl . '/services/'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $serviceName, 'item' => $canonicalUrl],
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
   Patio Covers, Pergolas & Decks — page styles (Premium tier)
   Tokens only. Signature section: the roofline tie-in diagram
   (.pc-tiein) — a roofer's detail, unique to this page.
   ============================================================ */
:root {
  --pc-ink: var(--color-secondary);
  --pc-ink-rgb: var(--color-secondary-rgb);
  --pc-ember: var(--color-primary);
  --pc-ember-rgb: var(--color-primary-rgb);
  --pc-sand: var(--color-accent);
  --pc-sand-rgb: var(--color-accent-rgb);
  --pc-ember-soft: color-mix(in srgb, var(--color-primary) 9%, var(--color-white));
  --pc-sand-soft: color-mix(in srgb, var(--color-accent) 16%, var(--color-white));
  --pc-cedar: color-mix(in srgb, var(--color-accent) 55%, var(--color-primary));
  --pc-line: var(--color-gray-light);
  --pc-white-90: color-mix(in srgb, var(--color-white) 90%, transparent);
  --pc-white-75: color-mix(in srgb, var(--color-white) 75%, transparent);
  --pc-white-12: color-mix(in srgb, var(--color-white) 12%, transparent);
  --pc-white-06: color-mix(in srgb, var(--color-white) 6%, transparent);
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, var(--color-white));
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, var(--color-white));
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, var(--color-white));
  --color-card-tint-neutral: var(--color-white);
}

/* ---- Page-wide ---- */
.pc-page h1, .pc-page h2, .pc-page h3 { text-wrap: balance; }
.pc-page .eyebrow-label { margin-bottom: var(--space-3); }
.pc-page .eyebrow-label--ember { color: var(--pc-ember); }
.pc-kicker { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--pc-ember); line-height: 1; display: block; margin-bottom: var(--space-2); }
.sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0; }
[data-animate].reveal-delay-1 { transition-delay: .08s; }
[data-animate].reveal-delay-2 { transition-delay: .16s; }
[data-animate].reveal-delay-3 { transition-delay: .24s; }
.pc-page .answer-block { background: var(--pc-ember-soft); border-left: 4px solid var(--pc-ember); border-radius: var(--radius-md); padding: var(--space-5) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-lg); margin: 0; max-width: 68ch; }

/* =====================================================
   1 · HERO — photo + gradient + noise, copy left, fact card right
   ===================================================== */
.pc-hero { position: relative; overflow: hidden; padding-bottom: var(--space-16); }
.pc-hero__bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 40%; z-index: 0; }
.pc-hero::before { content: ''; position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(100deg, rgba(var(--pc-ink-rgb), .96) 0%, rgba(var(--pc-ink-rgb), .86) 48%, rgba(var(--pc-ink-rgb), .45) 100%); }
.pc-hero::after { content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none; opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.pc-hero__inner { position: relative; z-index: 2; width: 100%; display: grid; grid-template-columns: minmax(0, 1.35fr) minmax(260px, .65fr); gap: var(--space-12); align-items: end; }
.pc-hero__eyebrow { display: inline-flex; align-items: center; gap: var(--space-2); background: rgba(var(--pc-ember-rgb), .18); border: 1px solid var(--pc-white-12); padding: var(--space-2) var(--space-4); border-radius: var(--radius-full); }
.pc-hero__eyebrow::before { content: ''; width: 8px; height: 8px; border-radius: var(--radius-full); background: var(--pc-sand); box-shadow: 0 0 0 4px rgba(var(--pc-sand-rgb), .25); }
.pc-hero h1 { font-size: clamp(2.3rem, 4.8vw, 3.8rem); line-height: 1.04; margin: var(--space-3) 0 var(--space-5); text-align: left; }
.pc-hero .hero__subtitle { margin: 0 0 var(--space-6); max-width: 62ch; color: var(--pc-white-90); }
.pc-hero__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.pc-hero__actions .btn svg { width: 18px; height: 18px; }
.pc-hero__facts { list-style: none; margin: 0; padding: 0; display: flex; flex-wrap: wrap; gap: var(--space-3) var(--space-6); }
.pc-hero__facts li { display: flex; align-items: center; gap: var(--space-2); color: var(--pc-white-90); font-size: var(--font-size-sm); font-weight: 500; }
.pc-hero__facts svg { width: 18px; height: 18px; color: var(--pc-sand); flex-shrink: 0; }
.pc-hero__card { background: var(--pc-white-06); border: 1px solid var(--pc-white-12); backdrop-filter: blur(8px); border-radius: var(--radius-xl); padding: var(--space-6); color: var(--color-white); }
.pc-hero__card-title { font-family: var(--font-heading); font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 2px; color: var(--pc-sand); margin-bottom: var(--space-4); }
.pc-hero__card ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-3); }
.pc-hero__card li { display: flex; gap: var(--space-3); align-items: baseline; font-size: var(--font-size-sm); line-height: 1.5; color: var(--pc-white-90); }
.pc-hero__card li::before { content: ''; flex-shrink: 0; width: 14px; height: 2px; background: var(--pc-ember); transform: translateY(-3px); }
.pc-hero__award { margin-top: var(--space-5); padding-top: var(--space-5); border-top: 1px solid var(--pc-white-12); font-size: var(--font-size-sm); color: var(--pc-white-75); display: flex; gap: var(--space-3); align-items: center; }
.pc-hero__award svg { width: 20px; height: 20px; color: var(--color-star); flex-shrink: 0; }

/* ---- Breadcrumb (below the hero — the header is fixed) ---- */
.pc-crumbs { background: var(--color-white); border-bottom: 1px solid var(--pc-line); }
.pc-crumbs ol { list-style: none; display: flex; flex-wrap: wrap; gap: var(--space-2); align-items: center; padding: var(--space-3) 0; margin: 0; font-size: var(--font-size-sm); color: var(--color-gray); }
.pc-crumbs a { color: var(--color-gray-dark); }
.pc-crumbs a:hover { color: var(--pc-ember); }
.pc-crumbs [aria-current] { color: var(--pc-ember); font-weight: 600; }
.pc-crumbs__sep { color: var(--pc-line); }

/* =====================================================
   2 · INTRO — answer + at-a-glance rail
   ===================================================== */
.pc-intro { background: var(--color-white); }
.pc-intro__grid { display: grid; grid-template-columns: minmax(0, 1.5fr) minmax(0, 1fr); gap: var(--space-12); align-items: start; }
.pc-intro h2 { margin-bottom: var(--space-4); }
.pc-intro .answer-block { margin-bottom: var(--space-6); }
.pc-intro__prose { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.75; }
.pc-intro__prose p + p { margin-top: var(--space-4); }
.pc-updated { display: inline-flex; align-items: center; gap: var(--space-2); font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.5px; color: var(--color-gray); margin-top: var(--space-6); }
.pc-updated::before { content: ''; width: 24px; height: 1px; background: var(--pc-sand); }
.pc-glance { position: sticky; top: calc(var(--nav-height) + var(--space-4)); background: var(--color-light); border-radius: var(--radius-lg); padding: var(--space-6); border-top: 4px solid var(--pc-ember); }
.pc-glance h3 { font-size: var(--font-size-base); text-transform: uppercase; letter-spacing: 1.5px; color: var(--pc-ink); margin-bottom: var(--space-4); }
.pc-glance dl { margin: 0; display: grid; grid-template-columns: auto 1fr; gap: var(--space-3) var(--space-4); font-size: var(--font-size-sm); }
.pc-glance dt { color: var(--color-gray); font-weight: 500; }
.pc-glance dd { margin: 0; color: var(--color-gray-dark); font-weight: 600; }
.pc-glance__cta { margin-top: var(--space-5); display: flex; flex-direction: column; gap: var(--space-2); }
.pc-glance__cta a { color: var(--pc-ember); font-weight: 700; font-family: var(--font-heading); font-size: var(--font-size-lg); }
.pc-glance__cta small { color: var(--color-gray); font-size: var(--font-size-xs); }

/* =====================================================
   3 · WHAT WE BUILD — portrait-photo mosaic
   ===================================================== */
.pc-types { background: var(--color-light); position: relative; }
.pc-types::before { content: ''; position: absolute; left: 0; right: 0; top: 0; height: 1px; background: linear-gradient(90deg, transparent, var(--pc-sand), transparent); }
.pc-mosaic { display: grid; grid-template-columns: repeat(6, 1fr); grid-auto-rows: minmax(180px, auto); gap: var(--space-5); margin-top: var(--space-10); }
.pc-tile { position: relative; border-radius: var(--radius-lg); overflow: hidden; background: var(--pc-ink); box-shadow: var(--shadow-card); min-height: 300px; }
.pc-tile--wide { grid-column: span 4; grid-row: span 2; }
.pc-tile--tall { grid-column: span 2; grid-row: span 2; }
.pc-tile--std { grid-column: span 2; }
.pc-tile img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.pc-tile:hover img { transform: scale(1.05); }
.pc-tile::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(var(--pc-ink-rgb), .92) 0%, rgba(var(--pc-ink-rgb), .35) 45%, transparent 70%); }
.pc-tile__cap { position: absolute; left: 0; right: 0; bottom: 0; z-index: 1; padding: var(--space-5); color: var(--color-white); }
.pc-tile__cap span { display: block; font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 2px; color: var(--pc-sand); margin-bottom: var(--space-1); }
.pc-tile__cap h3 { color: var(--color-white); font-size: var(--font-size-xl); margin: 0 0 var(--space-2); }
.pc-tile__cap p { margin: 0; font-size: var(--font-size-sm); color: var(--pc-white-90); line-height: 1.5; max-width: 40ch; }
.pc-tile--wide .pc-tile__cap h3 { font-size: var(--font-size-2xl); }
.pc-tile__ribbon { position: absolute; top: var(--space-4); left: var(--space-4); z-index: 1; background: var(--pc-ember); color: var(--color-white); font-size: var(--font-size-xs); font-weight: 700; letter-spacing: 1px; text-transform: uppercase; padding: var(--space-1) var(--space-3); border-radius: var(--radius-sm); }

/* =====================================================
   4 · SIGNATURE — roofline tie-in diagram
   ===================================================== */
.pc-tiein { background: var(--pc-ink); color: var(--color-white); position: relative; overflow: hidden; }
.pc-tiein::before { content: ''; position: absolute; inset: 0; pointer-events: none; background: radial-gradient(ellipse at 10% 10%, rgba(var(--pc-ember-rgb), .22), transparent 55%); }
.pc-tiein .container { position: relative; z-index: 1; }
.pc-tiein h2 { color: var(--color-white); }
.pc-tiein .answer-block { background: var(--pc-white-06); border-left-color: var(--pc-sand); color: var(--pc-white-90); }
.pc-tiein__grid { display: grid; grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr); gap: var(--space-12); align-items: center; margin-top: var(--space-10); }
.pc-diagram { background: var(--pc-white-06); border: 1px solid var(--pc-white-12); border-radius: var(--radius-xl); padding: var(--space-6); }
.pc-diagram svg { width: 100%; height: auto; display: block; }
.pc-diagram__legend { display: flex; flex-wrap: wrap; gap: var(--space-3) var(--space-5); margin-top: var(--space-4); font-size: var(--font-size-xs); color: var(--pc-white-75); }
.pc-diagram__legend span { display: inline-flex; align-items: center; gap: var(--space-2); }
.pc-diagram__legend i { width: 14px; height: 14px; border-radius: var(--radius-sm); display: inline-block; }
.pc-diagram__legend i.is-roof { background: var(--pc-sand); }
.pc-diagram__legend i.is-flash { background: var(--pc-ember); }
.pc-diagram__legend i.is-wood { background: var(--pc-cedar); }
.pc-callouts { list-style: none; margin: 0; padding: 0; counter-reset: pc-call; display: grid; gap: var(--space-5); }
.pc-callouts li { position: relative; padding-left: calc(var(--space-10) + var(--space-3)); }
.pc-callouts li::before { counter-increment: pc-call; content: counter(pc-call); position: absolute; left: 0; top: 0; width: var(--space-10); height: var(--space-10); border-radius: var(--radius-full); background: var(--pc-ember); color: var(--color-white); font-family: var(--font-heading); font-weight: 800; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 0 6px rgba(var(--pc-ember-rgb), .18); }
.pc-callouts h3 { color: var(--color-white); font-size: var(--font-size-lg); margin: 0 0 var(--space-1); }
.pc-callouts p { margin: 0; color: var(--pc-white-75); font-size: var(--font-size-sm); line-height: 1.6; }
.pc-tiein__note { margin-top: var(--space-8); display: flex; gap: var(--space-4); align-items: flex-start; background: rgba(var(--pc-ember-rgb), .14); border: 1px solid rgba(var(--pc-ember-rgb), .35); border-radius: var(--radius-lg); padding: var(--space-5) var(--space-6); }
.pc-tiein__note svg { width: 26px; height: 26px; color: var(--pc-sand); flex-shrink: 0; }
.pc-tiein__note p { margin: 0; color: var(--pc-white-90); line-height: 1.6; }
.pc-tiein__note strong { color: var(--color-white); }

/* =====================================================
   5 · DESIGN HELP — pull quote + considerations
   ===================================================== */
.pc-design { background: var(--color-white); }
.pc-design__grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.2fr); gap: var(--space-12); align-items: start; }
.pc-quote { position: relative; padding: var(--space-8) var(--space-8) var(--space-8) var(--space-10); background: var(--pc-sand-soft); border-radius: var(--radius-xl); }
.pc-quote::before { content: '\201C'; position: absolute; top: var(--space-2); left: var(--space-5); font-family: var(--font-heading); font-size: var(--font-size-6xl); line-height: 1; color: var(--pc-ember); opacity: .55; }
.pc-quote blockquote { margin: 0; font-family: var(--font-heading); font-weight: 700; font-size: clamp(1.25rem, 2.2vw, 1.6rem); line-height: 1.35; color: var(--pc-ink); }
.pc-quote cite { display: block; margin-top: var(--space-5); font-style: normal; font-size: var(--font-size-sm); color: var(--color-gray-dark); }
.pc-quote cite strong { color: var(--pc-ember); }
.pc-quote__photo { margin-top: var(--space-6); border-radius: var(--radius-lg); overflow: hidden; aspect-ratio: 4 / 3; }
.pc-quote__photo img { width: 100%; height: 100%; object-fit: cover; object-position: center 35%; display: block; }
.pc-design__list { list-style: none; margin: var(--space-6) 0 0; padding: 0; display: grid; gap: var(--space-4); }
.pc-design__list li { display: grid; grid-template-columns: 52px 1fr; gap: var(--space-4); padding: var(--space-4); border: 1px solid var(--pc-line); border-radius: var(--radius-lg); transition: border-color var(--transition-base), transform var(--transition-base), box-shadow var(--transition-base); }
.pc-design__list li:hover { border-color: rgba(var(--pc-ember-rgb), .45); transform: translateX(4px); box-shadow: var(--shadow-md); }
.pc-design__ico { width: 52px; height: 52px; border-radius: var(--radius-md); background: var(--pc-ember-soft); color: var(--pc-ember); display: flex; align-items: center; justify-content: center; }
.pc-design__ico svg { width: 24px; height: 24px; }
.pc-design__list h3 { font-size: var(--font-size-base); margin: 0 0 var(--space-1); color: var(--pc-ink); }
.pc-design__list p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; }

/* =====================================================
   6 · PROCESS — four big-numeral panels
   ===================================================== */
.pc-steps { background: var(--color-light); }
.pc-steps__grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-6); margin-top: var(--space-10); }
.pc-step { position: relative; background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-8) var(--space-8) var(--space-8) var(--space-16); border: 1px solid var(--pc-line); overflow: hidden; transition: box-shadow var(--transition-base), transform var(--transition-base); }
.pc-step:hover { box-shadow: var(--shadow-lg); transform: translateY(-3px); }
.pc-step__num { position: absolute; left: var(--space-4); top: var(--space-5); font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-5xl); line-height: 1; color: var(--pc-ember); opacity: .22; }
.pc-step::after { content: ''; position: absolute; right: -40px; bottom: -40px; width: 120px; height: 120px; border-radius: var(--radius-full); background: radial-gradient(circle, rgba(var(--pc-sand-rgb), .35), transparent 70%); }
.pc-step h3 { font-size: var(--font-size-xl); margin: 0 0 var(--space-2); color: var(--pc-ink); }
.pc-step p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; }
.pc-step__tag { display: inline-block; margin-bottom: var(--space-3); font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.5px; color: var(--pc-ember); font-weight: 700; }

/* =====================================================
   7 · HOUSTON CONDITIONS — horizontal strip of four
   ===================================================== */
.pc-climate { background: var(--color-white); }
.pc-climate__strip { display: grid; grid-template-columns: repeat(4, 1fr); margin-top: var(--space-10); border: 1px solid var(--pc-line); border-radius: var(--radius-xl); overflow: hidden; }
.pc-climate__cell { padding: var(--space-8) var(--space-6); position: relative; border-right: 1px solid var(--pc-line); transition: background var(--transition-base); }
.pc-climate__cell:last-child { border-right: 0; }
.pc-climate__cell:hover { background: var(--pc-ember-soft); }
.pc-climate__cell::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--pc-sand); transform: scaleX(0); transform-origin: left; transition: transform var(--transition-base); }
.pc-climate__cell:hover::before { transform: scaleX(1); }
.pc-climate__ico { width: 56px; height: 56px; border-radius: var(--radius-full); background: var(--pc-ink); color: var(--pc-sand); display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-5); }
.pc-climate__ico svg { width: 26px; height: 26px; }
.pc-climate__cell h3 { font-size: var(--font-size-lg); margin: 0 0 var(--space-2); color: var(--pc-ink); }
.pc-climate__cell p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

/* ---- Mid-page CTA band ---- */
.pc-band { background: linear-gradient(90deg, var(--pc-ember) 0%, color-mix(in srgb, var(--pc-ember) 70%, var(--pc-ink)) 100%); color: var(--color-white); padding: var(--space-10) 0; }
.pc-band__inner { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: var(--space-6); }
.pc-band h2 { color: var(--color-white); font-size: clamp(1.5rem, 3vw, 2.1rem); margin: 0 0 var(--space-2); }
.pc-band p { margin: 0; color: var(--pc-white-90); max-width: 56ch; }
.pc-band__actions { display: flex; flex-wrap: wrap; gap: var(--space-3); }
.pc-band .btn-outline-white:hover { color: var(--pc-ember); }
.pc-band .btn svg { width: 18px; height: 18px; }

/* =====================================================
   8 · REVIEWS — staggered cards
   ===================================================== */
.pc-reviews { background: var(--color-light); position: relative; overflow: hidden; }
.pc-reviews__bg { position: absolute; right: -120px; top: -120px; width: 420px; height: 420px; border-radius: var(--radius-full); background: radial-gradient(circle, rgba(var(--pc-sand-rgb), .28), transparent 70%); pointer-events: none; }
.pc-reviews .container { position: relative; z-index: 1; }
.pc-reviews__grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); margin-top: var(--space-10); align-items: start; }
.pc-review { background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-8); box-shadow: var(--shadow-card); border-top: 3px solid var(--pc-sand); display: flex; flex-direction: column; gap: var(--space-4); }
.pc-review:nth-child(2) { margin-top: var(--space-10); border-top-color: var(--pc-ember); }
.pc-review__job { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.5px; color: var(--pc-ember); font-weight: 700; }
.pc-review blockquote { margin: 0; color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); }
.pc-review footer { display: flex; align-items: center; gap: var(--space-3); margin-top: auto; padding-top: var(--space-4); border-top: 1px solid var(--pc-line); }
.pc-review__avatar { width: 42px; height: 42px; border-radius: var(--radius-full); background: var(--pc-ink); color: var(--color-white); font-family: var(--font-heading); font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.pc-review__name { font-weight: 700; color: var(--pc-ink); font-size: var(--font-size-sm); display: block; }
.pc-review__city { color: var(--color-gray); font-size: var(--font-size-xs); }
.pc-reviews__links { display: flex; flex-wrap: wrap; justify-content: center; gap: var(--space-4); margin-top: var(--space-8); }
.pc-reviews__links a { display: inline-flex; align-items: center; gap: var(--space-2); padding: var(--space-3) var(--space-5); border-radius: var(--radius-full); border: 1px solid var(--pc-line); background: var(--color-white); color: var(--pc-ink); font-size: var(--font-size-sm); font-weight: 600; transition: border-color var(--transition-fast), color var(--transition-fast); }
.pc-reviews__links a:hover { border-color: var(--pc-ember); color: var(--pc-ember); }
.pc-reviews__links svg { width: 18px; height: 18px; color: var(--color-star); }

/* =====================================================
   FAQ — single column, numbered rail
   ===================================================== */
.pc-faq { background: var(--color-white); }
.pc-faq__wrap { display: grid; grid-template-columns: minmax(0, .8fr) minmax(0, 1.4fr); gap: var(--space-12); align-items: start; }
.pc-faq__intro { position: sticky; top: calc(var(--nav-height) + var(--space-4)); }
.pc-faq__intro p { color: var(--color-gray-dark); line-height: 1.7; }
.pc-faq__list { counter-reset: pc-faq; display: grid; gap: var(--space-3); }
.faq-item { background: var(--color-light); border: 1px solid transparent; border-radius: var(--radius-lg); overflow: hidden; transition: border-color var(--transition-base), background var(--transition-base); }
.faq-item[open] { background: var(--color-white); border-color: rgba(var(--pc-ember-rgb), .4); box-shadow: var(--shadow-md); }
.faq-item summary { list-style: none; cursor: pointer; display: grid; grid-template-columns: var(--space-10) 1fr 32px; align-items: center; gap: var(--space-3); padding: var(--space-5) var(--space-6); font-family: var(--font-heading); font-weight: 600; color: var(--pc-ink); }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary::before { counter-increment: pc-faq; content: counter(pc-faq, decimal-leading-zero); font-size: var(--font-size-sm); color: var(--pc-ember); font-weight: 800; letter-spacing: 1px; }
.faq-icon { width: 32px; height: 32px; border-radius: var(--radius-full); border: 2px solid var(--pc-ember); color: var(--pc-ember); display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base); }
.faq-icon svg { width: 16px; height: 16px; }
.faq-item[open] .faq-icon { transform: rotate(45deg); background: var(--pc-ember); color: var(--color-white); }
.faq-answer { padding: 0 var(--space-6) var(--space-6) calc(var(--space-6) + var(--space-10) + var(--space-3)); }
.faq-answer p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; }

/* =====================================================
   RELATED SERVICES — required-components grid
   ===================================================== */
.pc-related { background: var(--color-light); }
.pc-related .section-title { text-align: center; max-width: 780px; margin: 0 auto var(--space-10); }
.pc-related .section-title .hero-answer { color: var(--color-gray-dark); font-size: var(--font-size-lg); line-height: 1.7; margin: var(--space-4) auto var(--space-3); }
.pc-related .section-subtitle { display: block; font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--pc-ember); }
.pc-related .prose { color: var(--color-gray); max-width: 60ch; margin: var(--space-2) auto 0; }
.services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-8); }
.service-card-with-image { background: var(--color-card-tint-neutral); border-radius: var(--radius-lg); overflow: hidden; display: flex; flex-direction: column; box-shadow: var(--shadow-card); transition: transform var(--transition-base), box-shadow var(--transition-base); }
.service-card-with-image:hover { transform: translateY(-6px); box-shadow: var(--shadow-xl); }
.card-tint-1 { background: var(--color-card-tint-1); }
.card-tint-2 { background: var(--color-card-tint-2); }
.card-tint-3 { background: var(--color-card-tint-3); }
.service-card__image { position: relative; aspect-ratio: 5 / 3; overflow: hidden; }
.service-card__image img { width: 100%; height: 100%; object-fit: cover; object-position: center 30%; display: block; transition: transform var(--transition-slow); }
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body { padding: var(--space-6); text-align: center; display: flex; flex-direction: column; align-items: center; gap: var(--space-3); flex: 1; }
.service-card__icon { width: 60px; height: 60px; border-radius: var(--radius-full); background: var(--color-white); box-shadow: var(--shadow-md); display: flex; align-items: center; justify-content: center; margin-top: calc(-1 * var(--space-10)); margin-bottom: var(--space-1); color: var(--pc-ember); position: relative; z-index: 1; border: 3px solid var(--color-white); }
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { color: var(--pc-ink); font-size: var(--font-size-xl); margin: 0; }
.service-card__desc { color: var(--color-gray-dark); font-size: var(--font-size-sm); margin: 0; line-height: 1.55; }
.service-card-with-image ul { list-style: none; padding: var(--space-4) 0 0; margin: var(--space-2) 0 0; width: 100%; text-align: left; display: flex; flex-direction: column; gap: var(--space-2); border-top: 1px solid rgba(var(--pc-ink-rgb), .08); }
.service-card-with-image ul li { font-size: var(--font-size-sm); color: var(--color-gray-dark); padding-left: var(--space-6); position: relative; }
.service-card-with-image ul li::before { content: "\2713"; color: var(--pc-ember); font-weight: 700; position: absolute; left: 0; top: 0; }
.service-card__cta { margin-top: auto; padding-top: var(--space-4); width: 100%; color: var(--pc-ember); font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-sm); border-top: 1px solid rgba(var(--pc-ink-rgb), .08); transition: color var(--transition-base); }
.service-card__cta::after { content: " \2192"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--pc-sand); }
.service-card__cta:hover::after { transform: translateX(4px); }

/* =====================================================
   FINAL CTA — split panel with photo
   ===================================================== */
.pc-cta { background: var(--pc-ink); position: relative; overflow: hidden; }
.pc-cta::after { content: ''; position: absolute; inset: 0; pointer-events: none; opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.pc-cta__grid { position: relative; z-index: 1; display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(0, .8fr); gap: var(--space-12); align-items: center; padding: var(--space-16) 0; }
.pc-cta h2 { color: var(--color-white); font-size: clamp(1.9rem, 3.8vw, 2.8rem); margin-bottom: var(--space-4); }
.pc-cta p { color: var(--pc-white-90); font-size: var(--font-size-lg); line-height: 1.7; max-width: 58ch; margin-bottom: var(--space-8); }
.pc-cta__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.pc-cta .btn svg { width: 18px; height: 18px; }
.pc-cta__phone { margin-top: var(--space-6); color: var(--pc-white-75); font-size: var(--font-size-sm); }
.pc-cta__phone a { color: var(--pc-sand); font-weight: 700; }
.pc-cta__photo { position: relative; border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 3 / 4; max-height: 460px; justify-self: end; width: 100%; box-shadow: var(--shadow-xl); }
.pc-cta__photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
.pc-cta__photo::before { content: ''; position: absolute; inset: 0; border: 1px solid var(--pc-white-12); border-radius: var(--radius-xl); z-index: 1; pointer-events: none; }
.pc-cta__photo figcaption { position: absolute; left: var(--space-4); bottom: var(--space-4); z-index: 1; background: rgba(var(--pc-ink-rgb), .8); color: var(--color-white); font-size: var(--font-size-xs); padding: var(--space-2) var(--space-3); border-radius: var(--radius-sm); }

/* ---- Dividers (three styles) ---- */
.pc-divider { display: block; line-height: 0; overflow: hidden; }
.pc-divider svg { display: block; width: 100%; height: 100%; }
.pc-divider--slope { height: 64px; }
.pc-divider--rafters { height: 22px; background: repeating-linear-gradient(90deg, var(--pc-cedar) 0 18px, transparent 18px 40px); opacity: .9; }
.pc-divider--arch { height: 56px; }

/* ---- Micro-interactions ---- */
.pc-tile__cap { transform: translateY(6px); transition: transform var(--transition-base); }
.pc-tile:hover .pc-tile__cap { transform: none; }
.pc-tile__cap p { opacity: .85; transition: opacity var(--transition-base); }
.pc-tile:hover .pc-tile__cap p { opacity: 1; }
.pc-hero__card { transition: border-color var(--transition-base), background var(--transition-base); }
.pc-hero__card:hover { border-color: rgba(var(--pc-sand-rgb), .5); background: rgba(var(--pc-ember-rgb), .12); }
.pc-callouts li { padding-top: var(--space-1); padding-bottom: var(--space-1); border-radius: var(--radius-md); transition: background var(--transition-fast); }
.pc-callouts li:hover { background: var(--pc-white-06); }
.pc-callouts li:hover::before { box-shadow: 0 0 0 8px rgba(var(--pc-ember-rgb), .3); }
.pc-step__num { transition: opacity var(--transition-base), transform var(--transition-base); }
.pc-step:hover .pc-step__num { opacity: .4; transform: scale(1.08); }
.pc-climate__ico { transition: background var(--transition-base), color var(--transition-base); }
.pc-climate__cell:hover .pc-climate__ico { background: var(--pc-ember); color: var(--color-white); }
.pc-review { transition: transform var(--transition-base), box-shadow var(--transition-base); }
.pc-review:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.faq-item summary { transition: color var(--transition-fast); }
.faq-item:not([open]) summary:hover { color: var(--pc-ember); }
.faq-item[open] .faq-answer { animation: pc-faq-in .3s ease; }
@keyframes pc-faq-in { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: none; } }
.pc-glance dd { transition: color var(--transition-fast); }
.pc-glance:hover dd { color: var(--pc-ink); }
.pc-cta__photo img { transition: transform var(--transition-slow); }
.pc-cta__photo:hover img { transform: scale(1.04); }
.pc-band .btn-accent:hover { background: var(--color-white); color: var(--pc-ember); border-color: var(--color-white); }
.pc-reviews__links a svg { transition: transform var(--transition-fast); }
.pc-reviews__links a:hover svg { transform: rotate(18deg); }

/* ---- Fallbacks for browsers without color-mix() ---- */
@supports not (color: color-mix(in srgb, red, blue)) {
  :root {
    --pc-ember-soft: rgba(var(--pc-ember-rgb), .09);
    --pc-sand-soft: rgba(var(--pc-sand-rgb), .16);
    --pc-cedar: var(--color-accent);
    --pc-white-90: rgba(255, 255, 255, .9);
    --pc-white-75: rgba(255, 255, 255, .75);
    --pc-white-12: rgba(255, 255, 255, .12);
    --pc-white-06: rgba(255, 255, 255, .06);
    --color-card-tint-1: rgba(var(--pc-ember-rgb), .08);
    --color-card-tint-2: rgba(var(--pc-ink-rgb), .06);
    --color-card-tint-3: rgba(var(--pc-sand-rgb), .12);
  }
  .pc-band { background: var(--pc-ember); }
  .pc-cta { background: var(--pc-ink); }
}

/* ---- Forced-colors (Windows high contrast) ---- */
@media (forced-colors: active) {
  .pc-hero::before, .pc-hero::after, .pc-tile::after, .pc-cta::after { display: none; }
  .pc-tile, .pc-step, .pc-review, .faq-item, .pc-climate__cell, .pc-design__list li, .service-card-with-image { border: 1px solid CanvasText; }
  .pc-callouts li::before, .pc-review__avatar, .pc-climate__ico, .faq-icon { forced-color-adjust: none; background: Highlight; color: HighlightText; }
  .pc-diagram svg { forced-color-adjust: auto; }
}

/* ---- Wide screens ---- */
@media (min-width: 1400px) {
  .pc-hero__inner { gap: var(--space-16); }
  .pc-mosaic { grid-auto-rows: minmax(210px, auto); }
  .pc-tile { min-height: 340px; }
  .pc-climate__cell { padding: var(--space-10) var(--space-8); }
}

/* ---- Focus & selection ---- */
.pc-page a:focus-visible, .pc-page summary:focus-visible, .pc-page .btn:focus-visible { outline: 3px solid var(--pc-sand); outline-offset: 2px; border-radius: var(--radius-sm); }
.pc-page ::selection { background: var(--pc-ember); color: var(--color-white); }

/* ---- Reveal directions (none used above the fold) ---- */
[data-animate].pc-rv-left { transform: translateX(-40px); }
[data-animate].pc-rv-right { transform: translateX(40px); }
[data-animate].pc-rv-down { transform: translateY(-28px); }
[data-animate].pc-rv-scale { transform: scale(.94); }
[data-animate].pc-rv-left.animated, [data-animate].pc-rv-right.animated,
[data-animate].pc-rv-down.animated, [data-animate].pc-rv-scale.animated { transform: none; }

/* ---- Motion preferences ---- */
@media (prefers-reduced-motion: reduce) {
  .pc-tile:hover img, .service-card-with-image:hover, .service-card-with-image:hover .service-card__image img,
  .pc-step:hover, .pc-design__list li:hover { transform: none; }
  [data-animate].pc-rv-left, [data-animate].pc-rv-right, [data-animate].pc-rv-down, [data-animate].pc-rv-scale { transform: none; }
}

/* ---- Responsive ---- */
@media (max-width: 1100px) {
  .pc-hero__inner { grid-template-columns: 1fr; align-items: start; }
  .pc-hero__card { max-width: 520px; }
  .pc-climate__strip { grid-template-columns: repeat(2, 1fr); }
  .pc-climate__cell:nth-child(2) { border-right: 0; }
  .pc-climate__cell:nth-child(-n+2) { border-bottom: 1px solid var(--pc-line); }
}
@media (max-width: 1024px) {
  .pc-intro__grid, .pc-tiein__grid, .pc-design__grid, .pc-faq__wrap, .pc-cta__grid { grid-template-columns: 1fr; }
  .pc-glance, .pc-faq__intro { position: static; }
  .pc-mosaic { grid-template-columns: repeat(2, 1fr); grid-auto-rows: auto; }
  .pc-tile--wide, .pc-tile--tall, .pc-tile--std { grid-column: span 1; grid-row: span 1; min-height: 300px; }
  .pc-tile--wide { grid-column: span 2; }
  .pc-reviews__grid { grid-template-columns: 1fr 1fr; }
  .pc-review:nth-child(2) { margin-top: 0; }
  .pc-cta__photo { justify-self: start; max-height: 380px; }
  .services-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .pc-steps__grid { grid-template-columns: 1fr; }
  .pc-reviews__grid { grid-template-columns: 1fr; }
  .pc-step { padding-left: var(--space-12); }
  .pc-hero h1 { font-size: clamp(2rem, 8vw, 2.6rem); }
  .pc-band__inner { flex-direction: column; align-items: flex-start; }
}
@media (max-width: 600px) {
  .pc-mosaic { grid-template-columns: 1fr; }
  .pc-tile--wide { grid-column: span 1; }
  .pc-climate__strip { grid-template-columns: 1fr; }
  .pc-climate__cell { border-right: 0; border-bottom: 1px solid var(--pc-line); }
  .pc-climate__cell:last-child { border-bottom: 0; }
  .services-grid { grid-template-columns: 1fr; }
  .faq-item summary { grid-template-columns: var(--space-8) 1fr 28px; padding: var(--space-4); }
  .faq-answer { padding-left: var(--space-4); padding-right: var(--space-4); }
}
@media (max-width: 480px) {
  .pc-hero__actions .btn, .pc-cta__actions .btn, .pc-band__actions .btn { width: 100%; justify-content: center; }
  .pc-quote { padding: var(--space-6) var(--space-5) var(--space-6) var(--space-6); }
  .pc-glance dl { grid-template-columns: 1fr; }
}
@media print {
  .pc-hero, .pc-tiein, .pc-cta, .pc-band { background: none !important; color: var(--color-dark) !important; }
  .pc-hero__bg, .pc-divider, .pc-reviews__bg { display: none !important; }
  .pc-hero h1, .pc-tiein h2, .pc-cta h2, .pc-callouts h3 { color: var(--color-dark) !important; }
  .faq-item, .pc-step, .pc-review { break-inside: avoid; }
  [data-animate] { opacity: 1 !important; transform: none !important; }
}
</style>

<div class="pc-page">

<!-- ===================== 1 · HERO ===================== -->
<section class="hero hero--interior pc-hero" aria-label="Patio covers, pergolas and decks in the Greater Houston area">
  <img class="pc-hero__bg"
       src="/assets/images/patio-covers-decks.jpg"
       srcset="/assets/images/patio-covers-decks-480.webp 480w, /assets/images/patio-covers-decks-960.webp 960w"
       sizes="100vw"
       alt="Finished covered patio with ceiling fans and a concrete slab"
       width="1000" height="1333" loading="eager" fetchpriority="high">
  <div class="container pc-hero__inner">
    <div class="pc-hero__copy">
      <span class="eyebrow-label pc-hero__eyebrow">Patio Covers &middot; Pergolas &middot; Decks</span>
      <h1>Patio Covers, Pergolas &amp; Decks in the <span class="text-accent">Greater Houston</span> Area</h1>
      <p class="hero__subtitle">
        <?php echo $siteName; ?> is a family-owned roofing and exterior contractor based in Humble, TX, serving the
        Greater Houston area since <?php echo $yearEstablished; ?>. We build solid-roof patio covers, enclosed and screened
        patios, cedar pergolas, metal-roof covers and pressure-treated wood decks &mdash; and because we are roofers first,
        the cover is flashed into your roofline so it stays dry where most covers leak.
      </p>
      <div class="pc-hero__actions">
        <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Written Estimate</a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
      </div>
      <ul class="pc-hero__facts" aria-label="Why homeowners call Triple G">
        <li><?php echo icon('check-circle', 18); ?> Serving Greater Houston since <?php echo $yearEstablished; ?></li>
        <li><?php echo icon('check-circle', 18); ?> Father-and-son team</li>
        <li><?php echo icon('check-circle', 18); ?> The owner is on every job</li>
        <li><?php echo icon('check-circle', 18); ?> Free inspections &amp; written estimates</li>
      </ul>
    </div>
    <aside class="pc-hero__card" aria-label="What we build">
      <div class="pc-hero__card-title">What we build</div>
      <ul>
        <li>Solid-roof covered patios tied into the house</li>
        <li>Enclosed and screened patios</li>
        <li>Cedar pergolas with decorative rafter tails</li>
        <li>Metal-roof covers and poolside palapas</li>
        <li>Wood decks, framing and custom railings</li>
      </ul>
      <div class="pc-hero__award"><?php echo icon('award', 20); ?> Voted a Nextdoor Neighborhood Favorite in 2022, 2023 and 2024</div>
    </aside>
  </div>
</section>

<!-- ===================== BREADCRUMB ===================== -->
<nav class="pc-crumbs breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="pc-crumbs__sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="pc-crumbs__sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page"><?php echo htmlspecialchars($serviceName); ?></a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 2 · INTRO / ANSWER ===================== -->
<section class="section pc-intro" aria-label="Patio cover, pergola and deck overview">
  <div class="container">
    <div class="pc-intro__grid">
      <div class="pc-rv-left" data-animate>
        <span class="eyebrow-label eyebrow-label--ember">Outdoor Living, Built by Roofers</span>
        <h2>Who builds patio covers, pergolas and decks in the Greater Houston area?</h2>
        <p class="answer-block">
          <?php echo $shortName; ?> builds patio covers, pergolas and wood decks for homeowners across the Greater Houston
          area &mdash; Humble, Kingwood, Atascocita, Spring, Porter, The Woodlands, Baytown and the communities between.
          Owner Tim Menn designs each one on-site with you, ties it into your roof and trim so it looks original to the
          house, and hands you a free written estimate before a single post goes in.
        </p>
        <div class="pc-intro__prose">
          <p>
            If you have been searching for a patio cover builder near me in Houston, here is the short version of how we are
            different: a patio cover is a roof. It has rafters, decking, flashing and a pitch, and it meets your house at
            the one spot water loves to find. A carpenter builds the structure; a roofer makes it stay dry. Tim and his
            father Glenn have been roofing in this area since <?php echo $yearEstablished; ?>, and every cover we build gets the
            same flashing detail as a roof replacement.
          </p>
          <p>
            That roofing background also shows up in the finish. We match your existing shingle or metal, carry the fascia
            and trim around the new structure, and set beadboard ceilings ready for fans and lights, so the covered patio
            reads as part of the home rather than something bolted to the back of it.
          </p>
        </div>
        <span class="pc-updated">Last Updated: <?php echo date('F Y'); ?></span>
      </div>
      <aside class="pc-glance pc-rv-right" data-animate aria-label="At a glance">
        <h3>At a glance</h3>
        <dl>
          <dt>Builder</dt><dd><?php echo $siteName; ?></dd>
          <dt>Based in</dt><dd>Humble, TX</dd>
          <dt>Serving</dt><dd>The Greater Houston area</dd>
          <dt>Since</dt><dd><?php echo $yearEstablished; ?></dd>
          <dt>On site</dt><dd>Owner Tim Menn, every job</dd>
          <dt>Estimates</dt><dd>Free, in writing</dd>
        </dl>
        <div class="pc-glance__cta">
          <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>
          <small><?php echo $businessHours; ?></small>
        </div>
      </aside>
    </div>
  </div>
</section>

<div class="pc-divider pc-divider--slope" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 64" preserveAspectRatio="none"><polygon fill="var(--color-light)" points="0,64 1200,0 1200,64"/></svg>
</div>

<!-- ===================== 3 · WHAT WE BUILD ===================== -->
<section class="section pc-types" aria-label="Types of patio covers, pergolas and decks we build">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">From Our Own Job Photos</span>
      <h2>What kinds of patio covers and decks does <?php echo $shortName; ?> build?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        We build six things well: solid-roof covered patios, enclosed patios, screened porches, cedar pergolas,
        metal-roof covers including poolside palapas, and pressure-treated wood decks. Every photo below is one of our
        own projects in the Greater Houston area.
      </p>
    </div>
    <div class="pc-mosaic">
      <article class="pc-tile pc-tile--wide pc-rv-scale" data-animate>
        <img src="/assets/images/patio-cover-fans.jpg"
             srcset="/assets/images/patio-cover-fans-480.webp 480w, /assets/images/patio-cover-fans-960.webp 960w"
             sizes="(max-width: 1024px) 100vw, 800px"
             alt="Covered patio with beadboard ceiling and fans" width="1200" height="1600" loading="lazy">
        <span class="pc-tile__ribbon">Most requested</span>
        <div class="pc-tile__cap">
          <span>Solid-roof covered patio</span>
          <h3>Tied into the house roofline</h3>
          <p>Shingle or metal roof to match the home, beadboard ceiling, fans and lights, and flashing that makes it part of the roof system.</p>
        </div>
      </article>
      <article class="pc-tile pc-tile--tall pc-rv-right reveal-delay-1" data-animate>
        <img src="/assets/images/pergola-cedar.jpg"
             srcset="/assets/images/pergola-cedar-480.webp 480w, /assets/images/pergola-cedar-960.webp 960w"
             sizes="(max-width: 1024px) 50vw, 400px"
             alt="Custom cedar pergola over a back patio on a brick home" width="1200" height="1600" loading="lazy">
        <div class="pc-tile__cap">
          <span>Cedar pergola</span>
          <h3>Open shade, clean lines</h3>
          <p>Cedar posts and beams with decorative rafter tails for filtered shade over a patio or walkway.</p>
        </div>
      </article>
      <article class="pc-tile pc-tile--std pc-rv-left reveal-delay-1" data-animate>
        <img src="/assets/images/patio-enclosed.jpg"
             srcset="/assets/images/patio-enclosed-480.webp 480w"
             sizes="(max-width: 1024px) 50vw, 400px"
             alt="Enclosed patio framed with new windows and a solid roof" width="760" height="1013" loading="lazy">
        <div class="pc-tile__cap">
          <span>Enclosed patio</span>
          <h3>Windows, walls and a real roof</h3>
        </div>
      </article>
      <article class="pc-tile pc-tile--std pc-rv-down reveal-delay-2" data-animate>
        <img src="/assets/images/screened-porch.jpg"
             srcset="/assets/images/screened-porch-480.webp 480w"
             sizes="(max-width: 1024px) 50vw, 400px"
             alt="Screened porch with fresh exterior paint and new screens" width="491" height="919" loading="lazy">
        <div class="pc-tile__cap">
          <span>Screened porch</span>
          <h3>Breeze in, mosquitoes out</h3>
        </div>
      </article>
      <article class="pc-tile pc-tile--std pc-rv-scale reveal-delay-2" data-animate>
        <img src="/assets/images/palapa-metal.jpg"
             srcset="/assets/images/palapa-metal-480.webp 480w"
             sizes="(max-width: 1024px) 50vw, 400px"
             alt="Poolside palapa converted from thatch to a metal roof" width="896" height="1600" loading="lazy">
        <div class="pc-tile__cap">
          <span>Metal-roof cover</span>
          <h3>Poolside palapa, thatch to metal</h3>
        </div>
      </article>
      <article class="pc-tile pc-tile--std pc-rv-right reveal-delay-3" data-animate>
        <img src="/assets/images/deck-railing.jpg"
             srcset="/assets/images/deck-railing-480.webp 480w"
             sizes="(max-width: 1024px) 50vw, 400px"
             alt="Wood deck built around a mature tree with custom railing" width="896" height="1600" loading="lazy">
        <div class="pc-tile__cap">
          <span>Wood deck</span>
          <h3>Built around the tree, railing to match</h3>
        </div>
      </article>
      <article class="pc-tile pc-tile--std pc-rv-left reveal-delay-3" data-animate>
        <img src="/assets/images/deck-framing.jpg"
             srcset="/assets/images/deck-framing-480.webp 480w"
             sizes="(max-width: 1024px) 50vw, 400px"
             alt="New deck framing laid out in a backyard" width="896" height="1600" loading="lazy">
        <div class="pc-tile__cap">
          <span>Deck framing</span>
          <h3>Pressure-treated frame on proper footings</h3>
        </div>
      </article>
    </div>
  </div>
</section>

<div class="pc-divider pc-divider--rafters" aria-hidden="true"></div>

<!-- ===================== 4 · SIGNATURE — ROOFLINE TIE-IN ===================== -->
<section class="section pc-tiein" aria-label="How we tie a patio cover into your roof">
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto;">
      <span class="eyebrow-label">The Roofer's Detail</span>
      <h2>Why should a roofer build your patio cover?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Because the joint where a patio cover meets the house is a roofing joint. A roofer flashes it the same way a roof
        is flashed &mdash; ledger lagged into framing, flashing tucked under the existing shingles or behind the siding,
        and the new roof pitched to carry water away from the wall &mdash; so the cover stays dry instead of soaking the
        fascia and the ceiling below it.
      </p>
    </div>
    <div class="pc-tiein__grid">
      <figure class="pc-diagram pc-rv-left" data-animate aria-label="Cross-section of a patio cover tied into an existing roof">
        <svg viewBox="0 0 640 400" role="img" aria-labelledby="pc-diagram-title">
          <title id="pc-diagram-title">Cross-section: house wall, existing roof, flashing, ledger and the new patio cover roof sloping away to a post</title>
          <!-- ground -->
          <rect x="0" y="352" width="640" height="48" fill="var(--pc-white-12)"/>
          <!-- house wall -->
          <rect x="40" y="120" width="150" height="232" fill="var(--pc-white-12)" stroke="var(--pc-white-75)" stroke-width="2"/>
          <!-- existing roof -->
          <polygon points="20,130 190,40 215,40 215,60 190,62 40,142" fill="var(--pc-sand)"/>
          <!-- existing shingles lines -->
          <line x1="60" y1="132" x2="185" y2="66" stroke="var(--pc-ink)" stroke-width="2" stroke-dasharray="10 8"/>
          <!-- ledger -->
          <rect x="190" y="150" width="14" height="26" fill="var(--pc-cedar)"/>
          <!-- flashing -->
          <polyline points="190,128 190,150 212,150 212,158" fill="none" stroke="var(--pc-ember)" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
          <!-- new cover roof sloping away -->
          <polygon points="204,148 560,206 560,222 204,166" fill="var(--pc-sand)"/>
          <!-- beadboard ceiling -->
          <line x1="206" y1="176" x2="556" y2="232" stroke="var(--pc-white-75)" stroke-width="2"/>
          <!-- rafters -->
          <line x1="260" y1="158" x2="260" y2="185" stroke="var(--pc-cedar)" stroke-width="6"/>
          <line x1="340" y1="171" x2="340" y2="198" stroke="var(--pc-cedar)" stroke-width="6"/>
          <line x1="420" y1="184" x2="420" y2="211" stroke="var(--pc-cedar)" stroke-width="6"/>
          <line x1="500" y1="197" x2="500" y2="224" stroke="var(--pc-cedar)" stroke-width="6"/>
          <!-- beam + post -->
          <rect x="536" y="222" width="28" height="16" fill="var(--pc-cedar)"/>
          <rect x="544" y="238" width="14" height="114" fill="var(--pc-cedar)"/>
          <!-- footing -->
          <rect x="528" y="352" width="46" height="26" fill="var(--pc-white-75)"/>
          <!-- gutter + water arrow -->
          <path d="M560 226 q14 0 14 14 q0 10 -10 10" fill="none" stroke="var(--pc-white-90)" stroke-width="4"/>
          <path d="M588 248 l0 90" stroke="var(--pc-sand)" stroke-width="3" stroke-dasharray="6 6"/>
          <polygon points="582,336 594,336 588,348" fill="var(--pc-sand)"/>
          <!-- callout markers -->
          <g font-family="var(--font-heading)" font-weight="800" font-size="16" text-anchor="middle">
            <circle cx="204" cy="118" r="15" fill="var(--pc-ember)"/><text x="204" y="124" fill="var(--color-white)">1</text>
            <circle cx="150" cy="180" r="15" fill="var(--pc-ember)"/><text x="150" y="186" fill="var(--color-white)">2</text>
            <circle cx="380" cy="140" r="15" fill="var(--pc-ember)"/><text x="380" y="146" fill="var(--color-white)">3</text>
            <circle cx="600" cy="300" r="15" fill="var(--pc-ember)"/><text x="600" y="306" fill="var(--color-white)">4</text>
          </g>
        </svg>
        <figcaption class="pc-diagram__legend">
          <span><i class="is-roof"></i> Roofing (shingle or metal)</span>
          <span><i class="is-flash"></i> Flashing</span>
          <span><i class="is-wood"></i> Ledger, rafters, beam and post</span>
        </figcaption>
      </figure>
      <ol class="pc-callouts pc-rv-right" data-animate>
        <li>
          <h3>Flash it like a roof</h3>
          <p>Flashing runs up the wall and under the existing shingles or behind the siding, not caulked to the surface. Caulk is a maintenance item; flashing is a system.</p>
        </li>
        <li>
          <h3>Ledger into framing, not siding</h3>
          <p>The ledger board carries the cover, so it is lagged through to the house framing and sealed, never screwed to siding or trim.</p>
        </li>
        <li>
          <h3>Pitch away from the house</h3>
          <p>The new roof slopes toward the yard with the same shingle or metal as your home, so water moves off the outer edge instead of pooling against the wall.</p>
        </li>
        <li>
          <h3>Carry the water off</h3>
          <p>A gutter and downspout on the outer beam drops water clear of the slab and the footings, which matters on Houston clay.</p>
        </li>
      </ol>
    </div>
    <div class="pc-tiein__note pc-rv-down" data-animate>
      <?php echo icon('shield', 26); ?>
      <p><strong>We look at your roof before we build on it.</strong> If the shingles or decking where the cover ties in are worn, you will hear it from us first, with photos, so you can fix it while the area is open instead of after the ceiling is finished.</p>
    </div>
  </div>
</section>

<!-- ===================== 5 · DESIGN HELP ===================== -->
<section class="section pc-design" aria-label="Design help for your patio cover or deck">
  <div class="container">
    <div class="pc-design__grid">
      <div class="pc-quote pc-rv-left" data-animate>
        <blockquote>I had a concept in mind, Tim expanded on it and gave me some great advice on how to do it right. It turned out great. They matched the trim and everything perfectly.</blockquote>
        <cite><strong>Ralph</strong> &middot; Porter, TX &middot; patio roof extension</cite>
        <div class="pc-quote__photo">
          <img src="/assets/images/pergola-detail.jpg"
               srcset="/assets/images/pergola-detail-480.webp 480w, /assets/images/pergola-detail-960.webp 960w"
               sizes="(max-width: 1024px) 100vw, 480px"
               alt="Cedar pergola with decorative rafter tails over a side patio" width="1200" height="1600" loading="lazy">
        </div>
      </div>
      <div class="pc-rv-right" data-animate>
        <span class="eyebrow-label eyebrow-label--ember">Design On Site</span>
        <h2>How do we help you design a cover that fits the house?</h2>
        <p class="answer-block">
          You bring the idea; Tim brings the tape measure and the roofing judgment. On the free on-site consult we
          stand on your patio, talk through how you actually use it, and settle the decisions that make or break a
          cover before anyone draws a line.
        </p>
        <ul class="pc-design__list">
          <li>
            <span class="pc-design__ico"><?php echo icon('ruler', 24); ?></span>
            <div><h3>Roofline and pitch</h3><p>Where the cover ties in, how much headroom you keep, and whether it should read as a gable, a shed roof or an extension of the existing slope.</p></div>
          </li>
          <li>
            <span class="pc-design__ico"><?php echo icon('home', 24); ?></span>
            <div><h3>Matching the house</h3><p>Same shingle or metal, same fascia and trim profile, paint matched &mdash; so the addition looks like it was always there.</p></div>
          </li>
          <li>
            <span class="pc-design__ico"><?php echo icon('wind', 24); ?></span>
            <div><h3>Ceiling, fans and light</h3><p>Beadboard or open rafters, fan placement, and where lighting goes, planned before the ceiling closes up.</p></div>
          </li>
          <li>
            <span class="pc-design__ico"><?php echo icon('hammer', 24); ?></span>
            <div><h3>Open, enclosed or screened</h3><p>We will tell you honestly which one fits how you use the space, and what each means for the structure and the budget.</p></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="pc-divider pc-divider--arch" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none"><path d="M0,56 C400,-10 800,-10 1200,56 L1200,56 L0,56 Z" fill="var(--color-light)"/></svg>
</div>

<!-- ===================== 6 · PROCESS ===================== -->
<section class="section pc-steps" aria-label="Our patio cover and deck process">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">Start To Finish</span>
      <h2>What happens after you call about a patio cover or deck?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Four steps, all with the owner involved: a free on-site consult, a free written estimate, the build, and a
        clean-up you will not have to redo. We will tell you up front if your project needs a permit.
      </p>
    </div>
    <div class="pc-steps__grid">
      <article class="pc-step pc-rv-left" data-animate>
        <span class="pc-step__num" aria-hidden="true">1</span>
        <span class="pc-step__tag">Free consult</span>
        <h3>We come out and look</h3>
        <p>Tim walks the patio or yard with you, measures, checks the roof where the cover will tie in, and talks through the options. No charge, no pressure.</p>
      </article>
      <article class="pc-step pc-rv-right reveal-delay-1" data-animate>
        <span class="pc-step__num" aria-hidden="true">2</span>
        <span class="pc-step__tag">In writing</span>
        <h3>Written estimate with options</h3>
        <p>You get a free written estimate that spells out the structure, roofing, ceiling and finishes, with the choices priced separately so you can decide what fits.</p>
      </article>
      <article class="pc-step pc-rv-left reveal-delay-2" data-animate>
        <span class="pc-step__num" aria-hidden="true">3</span>
        <span class="pc-step__tag">The build</span>
        <h3>Owner on site, every day</h3>
        <p>Footings and posts, framing, roofing and flashing, ceiling and trim &mdash; built in that order, with Tim on the job to make sure it is done as agreed.</p>
      </article>
      <article class="pc-step pc-rv-right reveal-delay-3" data-animate>
        <span class="pc-step__num" aria-hidden="true">4</span>
        <span class="pc-step__tag">Walk-through</span>
        <h3>Clean-up and final look</h3>
        <p>Landscaping protected, debris hauled, nails swept with a magnet, and a walk-through with you before we call it finished.</p>
      </article>
    </div>
  </div>
</section>

<!-- ===================== MID CTA ===================== -->
<section class="pc-band" aria-label="Schedule a free design consult">
  <div class="container pc-band__inner">
    <div>
      <h2>Have a patio in mind? Start with a free on-site consult.</h2>
      <p>Tim will measure, look at the roof tie-in and talk through open, solid, enclosed or screened &mdash; then put it in writing.</p>
    </div>
    <div class="pc-band__actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      <a href="/contact/" class="btn btn-accent btn-lg">Request an Estimate</a>
    </div>
  </div>
</section>

<!-- ===================== 7 · HOUSTON CONDITIONS ===================== -->
<section class="section pc-climate" aria-label="Houston considerations for patio covers and decks">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">Built For Here</span>
      <h2>What does a Houston patio cover have to handle?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Heat, a low western sun, sideways rain and clay that moves. A cover built for the Gulf Coast is oriented for the
        afternoon sun, pitched and guttered for downpours, set on footings that respect the soil, and cleared with the
        HOA before the first post goes in.
      </p>
    </div>
    <div class="pc-climate__strip">
      <div class="pc-climate__cell pc-rv-down" data-animate>
        <span class="pc-climate__ico"><?php echo icon('wind', 26); ?></span>
        <h3>Heat and airflow</h3>
        <p>A solid roof with a ceiling and fans drops the felt temperature on the patio; an open pergola trades some shade for airflow. We help you pick.</p>
      </div>
      <div class="pc-climate__cell pc-rv-down reveal-delay-1" data-animate>
        <span class="pc-climate__ico"><?php echo icon('clock', 26); ?></span>
        <h3>Afternoon sun</h3>
        <p>West-facing patios bake from mid-afternoon on. Cover depth, a lower outer edge or a screened wall can block that low sun without closing in the space.</p>
      </div>
      <div class="pc-climate__cell pc-rv-down reveal-delay-2" data-animate>
        <span class="pc-climate__ico"><?php echo icon('droplets', 26); ?></span>
        <h3>Drainage</h3>
        <p>Gulf Coast storms dump inches in an hour. Pitch, gutters and downspouts are designed in so water leaves the cover and the slab, not your foundation.</p>
      </div>
      <div class="pc-climate__cell pc-rv-down reveal-delay-3" data-animate>
        <span class="pc-climate__ico"><?php echo icon('check-circle', 26); ?></span>
        <h3>HOA and permits</h3>
        <p>Many neighborhoods want to approve structures. We will tell you if your project needs a permit, and we can help with the HOA paperwork.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== 8 · REVIEWS ===================== -->
<section class="section pc-reviews" aria-label="Patio cover and pergola customer reviews">
  <span class="pc-reviews__bg" aria-hidden="true"></span>
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">In Their Words</span>
      <h2>What do homeowners say about their <?php echo $shortName; ?> patio cover or pergola?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        These are real reviews from our own customers, quoted as they wrote them. Voted a Nextdoor Neighborhood Favorite
        in 2022, 2023 and 2024.
      </p>
    </div>
    <div class="pc-reviews__grid">
      <?php
      $pcJobs = ['Ralph' => 'Patio roof extension', 'Randy & Charlene' => 'Pergola, fence and gutters', 'Leana' => 'Metal patio cover'];
      $pcDirs = ['pc-rv-left', 'pc-rv-scale', 'pc-rv-right'];
      foreach ($reviews as $i => $r):
        $initial = mb_substr($r['name'], 0, 1);
        $quote   = pc_excerpt($r['text'], 480, $pcStops[$r['name']] ?? null);
      ?>
      <article class="pc-review <?php echo $pcDirs[$i % 3]; ?> reveal-delay-<?php echo ($i % 3) + 1; ?>" data-animate>
        <span class="pc-review__job"><?php echo htmlspecialchars($pcJobs[$r['name']] ?? 'Outdoor living project'); ?></span>
        <blockquote>&ldquo;<?php echo htmlspecialchars($quote); ?>&rdquo;</blockquote>
        <footer>
          <span class="pc-review__avatar" aria-hidden="true"><?php echo htmlspecialchars($initial); ?></span>
          <div>
            <span class="pc-review__name"><?php echo htmlspecialchars($r['name']); ?></span>
            <span class="pc-review__city"><?php echo htmlspecialchars($r['city']); ?></span>
          </div>
        </footer>
      </article>
      <?php endforeach; ?>
    </div>
    <div class="pc-reviews__links pc-rv-scale" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<div class="pc-divider pc-divider--slope" aria-hidden="true" style="background:var(--color-light);">
  <svg viewBox="0 0 1200 64" preserveAspectRatio="none"><polygon fill="var(--color-white)" points="0,0 1200,64 0,64"/></svg>
</div>

<!-- ===================== FAQ ===================== -->
<section class="section pc-faq" aria-label="Patio cover, pergola and deck FAQs">
  <div class="container">
    <div class="pc-faq__wrap">
      <div class="pc-faq__intro pc-rv-left" data-animate>
        <span class="eyebrow-label eyebrow-label--ember">Good Questions</span>
        <h2>What do Greater Houston homeowners ask before building a cover or deck?</h2>
        <p>Straight answers on permits, pergola versus solid cover, leaks, matching, trees and cost. Anything we have not covered, call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> and ask Tim directly.</p>
      </div>
      <div class="pc-faq__list">
        <?php foreach ($faqs as $i => $f): ?>
        <details class="faq-item"<?php echo $i === 0 ? ' open' : ''; ?> data-animate>
          <summary>
            <span class="sr-only">Question <?php echo $i + 1; ?>:</span>
            <span><?php echo htmlspecialchars($f['q']); ?></span>
            <span class="faq-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg></span>
          </summary>
          <div class="faq-answer"><p><?php echo htmlspecialchars($f['a']); ?></p></div>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section pc-related" aria-label="Roofing and exterior services">
  <div class="container">
    <div class="section-title" data-animate>
      <span class="eyebrow-label eyebrow-label--ember">What We Do</span>
      <h2>What else can <?php echo $shortName; ?> handle while we are at your <span class="text-accent">house</span>?</h2>
      <p class="hero-answer">A patio cover ties into your roof, sits beside your fence and meets your siding and trim. Triple G Roofing &amp; Construction handles all of those as one crew, with the owner on site, so the finished yard matches from the roofline down. These three services most often pair with a cover or deck.</p>
      <span class="section-subtitle">Roofing, siding, gutters, patio covers, decks and fences &mdash; one call</span>
      <p class="prose">Family owned and operated, serving the Greater Houston area since <?php echo $yearEstablished; ?>.</p>
    </div>
    <div class="services-grid">
      <?php foreach ($relatedServices as $i => $s):
        $tint = ($i % 3) + 1;
        $set  = [];
        foreach ($s['variants'] as $w) { $set[] = '/assets/images/' . $s['img'] . '-' . $w . '.webp ' . $w . 'w'; }
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $tint; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo $s['img']; ?>.jpg"
               srcset="<?php echo implode(', ', $set); ?>"
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

<!-- ===================== FINAL CTA ===================== -->
<section class="pc-cta" aria-label="Get a free patio cover or deck estimate">
  <div class="container">
    <div class="pc-cta__grid">
      <div class="pc-rv-left" data-animate>
        <span class="pc-kicker">Let's build it right</span>
        <h2>Ready for a patio cover, pergola or deck that looks like it came with the house?</h2>
        <p>Call <?php echo $shortName; ?> for a free on-site consult and written estimate anywhere in the Greater Houston area. Tim will measure, check the roof tie-in and help you land on the right design &mdash; and he will be on the job when it is built.</p>
        <div class="pc-cta__actions">
          <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
          <a href="/contact/" class="btn btn-outline-white btn-lg">Request a Free Estimate</a>
        </div>
        <p class="pc-cta__phone">Prefer to text the details first? Send photos of your patio through the <a href="/contact/">contact form</a> and we will call you back. Hours: <?php echo $businessHours; ?>.</p>
      </div>
      <figure class="pc-cta__photo pc-rv-right" data-animate>
        <img src="/assets/images/deck-new.jpg"
             srcset="/assets/images/deck-new-480.webp 480w"
             sizes="(max-width: 1024px) 100vw, 420px"
             alt="New pressure-treated wood deck wrapping a backyard" width="896" height="1600" loading="lazy">
        <figcaption>Our work: new pressure-treated deck</figcaption>
      </figure>
    </div>
  </div>
</section>

</div><!-- /.pc-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
