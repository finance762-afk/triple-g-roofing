<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';
?>
<?php
/* ============================================================
   Service — Fences & Gates · Triple G Roofing
   Premium editorial service page (8-section structure)
   Facts: references/CLIENT-FACTS.md — nothing else is claimed.
   ============================================================ */

$currentPage = 'services';
$serviceSlug = 'fences-gates';
$service     = null;
foreach ($services as $s) {
    if ($s['slug'] === $serviceSlug) { $service = $s; break; }
}
$serviceName     = $service['name'];
$pageTitle       = 'Fence & Gate Builders Houston TX | Triple G Roofing';
$pageDescription = 'Cedar and pine privacy fences, ranch rail and gates by Triple G Roofing & Construction, a family team serving Greater Houston since 1973. Call (281) 824-5463.';
$canonicalUrl    = $siteUrl . '/services/' . $serviceSlug . '/';
$ogImage         = 'fences-gates-960.webp';

/* --- Real customer reviews: the two tagged fences-gates + Clint (cedar fence & gate, tagged siding) --- */
$reviews = getTestimonialsFor($serviceSlug, 2);
foreach ($testimonials as $t) {
    if ($t['name'] === 'Clint') { $reviews[] = $t; break; }
}
function fg_excerpt($text, $max = 560) {
    if (mb_strlen($text) <= $max) { return $text; }
    $cut = mb_substr($text, 0, $max);
    $pos = max((int) mb_strrpos($cut, '. '), (int) mb_strrpos($cut, '! '), (int) mb_strrpos($cut, '? '));
    return $pos > 80 ? mb_substr($cut, 0, $pos + 1) : rtrim($cut) . '…';
}

/* --- FAQs (fact-safe: no prices, no timelines, no permit promises) --- */
$faqs = [
    [
        'q' => 'Cedar or pine: which fence should I build?',
        'a' => 'Cedar costs more up front but resists rot and insects on its own and takes a stain beautifully, so it is the pick when the fence faces the street or you want it to look good for a long time. Pressure-treated pine is the budget-friendly workhorse for long backyard runs. We build both across the Greater Houston area and will show you samples of each at your free estimate.',
    ],
    [
        'q' => 'Can you replace just part of my fence?',
        'a' => 'Yes. Plenty of our fence jobs are partial: one boundary line, a blown-down section, a rotted run of posts, or a gate that has sagged past fixing. We match the height and board style of what is staying so the repair blends in, and we will tell you honestly when a fence has reached the point where replacing it all is the better value.',
    ],
    [
        'q' => 'What about my neighbor\'s side of the fence?',
        'a' => 'Shared fences take a little coordination. If we need access to the neighbor\'s side to set posts or pull old panels, we ask first and we treat their yard like yours. One Atascocita customer told us Tim handled getting permission from her neighbor graciously. Who pays for a shared fence is between neighbors, but we are glad to give both households the same written estimate.',
    ],
    [
        'q' => 'How do you keep fence posts from leaning in Houston clay?',
        'a' => 'By setting them below the layer of clay that swells and shrinks with our wet and dry seasons, in concrete that is crowned at the top so water sheds away from the post instead of sitting against it. Gulf Coast gumbo moves, and a post set shallow will lean within a couple of seasons. Solid privacy fences also catch a lot of wind, so post depth, spacing and rail count all matter more here than in drier parts of Texas.',
    ],
    [
        'q' => 'How much does a new fence or gate cost?',
        'a' => 'It depends on the length and height, cedar or pine, the style, how many gates you need and how much old fence we haul away. Rather than guess, Tim walks the line with you, measures it and hands you a free written estimate that shows each of those choices, so you can decide what fits your budget before anything is ordered.',
    ],
    [
        'q' => 'Do I need a permit or HOA approval for a new fence?',
        'a' => 'Many Greater Houston HOAs have rules on fence height, style and which way the finished side faces, and some cities require a permit for fences above a certain height or along a street. We will tell you if your project needs one, and we can help with the HOA paperwork so approval does not hold up the build.',
    ],
];

/* --- Related services (3 cards, required-components markup) --- */
$relatedServices = [
    [
        'name' => 'Patio Covers, Pergolas & Decks', 'slug' => 'patio-covers-decks', 'img' => 'patio-covers-decks', 'variants' => [480, 960],
        'alt' => 'Finished covered patio with ceiling fans and a concrete slab',
        'desc' => 'Custom patio covers, enclosed patios, pergolas and wood decks.',
        'bullets' => ['Tied into your roofline', 'Cedar pergolas and covers', 'Pressure-treated wood decks'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>',
    ],
    [
        'name' => 'Siding, Fascia & Soffit', 'slug' => 'siding-fascia-soffit', 'img' => 'siding-fascia-soffit', 'variants' => [480, 960],
        'alt' => 'Crew member replacing siding on a dormer above a shingle roof',
        'desc' => 'Siding, fascia, soffit, wood-rot repair and exterior paint.',
        'bullets' => ['Hardie and vinyl siding', 'Wood-rot repair included', 'Trim and paint matched'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 7 6 2"/><path d="M18.992 12H2.041"/><path d="M21.145 18.38A3.34 3.34 0 0 1 20 16.5a3.3 3.3 0 0 1-1.145 1.88c-.575.46-.855 1.02-.855 1.595A2 2 0 0 0 20 22a2 2 0 0 0 2-2.025c0-.58-.285-1.13-.855-1.595"/><path d="m8.5 4.5 2.148-2.148a1.205 1.205 0 0 1 1.704 0l7.296 7.296a1.205 1.205 0 0 1 0 1.704l-7.592 7.592a3.615 3.615 0 0 1-5.112 0l-3.888-3.888a3.615 3.615 0 0 1 0-5.112L5.67 7.33"/></svg>',
    ],
    [
        'name' => 'Gutter Installation', 'slug' => 'gutter-installation', 'img' => 'gutter-installation-v2', 'variants' => [480],
        'alt' => 'New downspout and gutter on a brick covered patio',
        'desc' => 'New gutters and downspouts that move water away from your foundation.',
        'bullets' => ['Protects fascia and soffit', 'Downspouts routed away', 'Pairs with any roof job'],
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2"/><path d="m11.5 9.5 2-2"/><path d="m8.5 6.5 2-2"/><path d="m17.5 15.5 2-2"/></svg>',
    ],
];

/* --- Schema: Service (generateServiceSchema) + BreadcrumbList + FAQPage --- */
$serviceSchema = json_decode(generateServiceSchema($service), true);
$serviceSchema = ['@context' => 'https://schema.org', '@id' => $canonicalUrl . '#service'] + $serviceSchema;
$serviceSchema['url']   = $canonicalUrl;
$serviceSchema['image'] = $siteUrl . '/assets/images/fences-gates-960.webp';
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
   Fences & Gates — page styles (Premium tier)
   Tokens only. Signature section: the CSS-only fence-style
   chooser (.fg-chooser) — radio inputs, no JavaScript.
   ============================================================ */
:root {
  --fg-ink: var(--color-secondary);
  --fg-ink-rgb: var(--color-secondary-rgb);
  --fg-ember: var(--color-primary);
  --fg-ember-rgb: var(--color-primary-rgb);
  --fg-sand: var(--color-accent);
  --fg-sand-rgb: var(--color-accent-rgb);
  --fg-ember-soft: color-mix(in srgb, var(--color-primary) 9%, var(--color-white));
  --fg-sand-soft: color-mix(in srgb, var(--color-accent) 18%, var(--color-white));
  --fg-cedar: color-mix(in srgb, var(--color-accent) 60%, var(--color-primary));
  --fg-cedar-dark: color-mix(in srgb, var(--fg-cedar) 70%, var(--color-secondary));
  --fg-pine: color-mix(in srgb, var(--color-accent) 45%, var(--color-white));
  --fg-line: var(--color-gray-light);
  --fg-white-90: color-mix(in srgb, var(--color-white) 90%, transparent);
  --fg-white-75: color-mix(in srgb, var(--color-white) 75%, transparent);
  --fg-white-14: color-mix(in srgb, var(--color-white) 14%, transparent);
  --fg-white-07: color-mix(in srgb, var(--color-white) 7%, transparent);
  --color-card-tint-1: color-mix(in srgb, var(--color-primary) 8%, var(--color-white));
  --color-card-tint-2: color-mix(in srgb, var(--color-secondary) 6%, var(--color-white));
  --color-card-tint-3: color-mix(in srgb, var(--color-accent) 12%, var(--color-white));
  --color-card-tint-neutral: var(--color-white);
}

/* ---- Page-wide ---- */
.fg-page h1, .fg-page h2, .fg-page h3 { text-wrap: balance; }
.fg-page .eyebrow-label { margin-bottom: var(--space-3); }
.fg-page .eyebrow-label--ember { color: var(--fg-ember); }
.sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0; }
[data-animate].reveal-delay-1 { transition-delay: .08s; }
[data-animate].reveal-delay-2 { transition-delay: .16s; }
[data-animate].reveal-delay-3 { transition-delay: .24s; }
.fg-page .answer-block { background: var(--fg-sand-soft); border-left: 4px solid var(--fg-ember); border-radius: var(--radius-md); padding: var(--space-5) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-lg); margin: 0; max-width: 68ch; }
.fg-tag { display: inline-block; font-size: var(--font-size-xs); font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: var(--fg-ember); }

/* =====================================================
   1 · HERO — split: photo panel left, copy right
   ===================================================== */
.fg-hero { position: relative; overflow: hidden; padding-bottom: 0; align-items: stretch; }
.fg-hero::before { content: ''; position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(to right, rgba(var(--fg-ink-rgb), .2) 0%, rgba(var(--fg-ink-rgb), .85) 42%, rgba(var(--fg-ink-rgb), .98) 60%); }
.fg-hero::after { content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none; opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.fg-hero__bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: 20% center; z-index: 0; }
.fg-hero__inner { position: relative; z-index: 2; width: 100%; display: grid; grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr); gap: var(--space-10); align-items: end; padding-bottom: var(--space-16); }
.fg-hero__spacer { min-height: 220px; }
.fg-hero__copy { max-width: 640px; }
.fg-hero__eyebrow { display: inline-flex; align-items: center; gap: var(--space-2); padding: var(--space-2) var(--space-4); border: 1px solid var(--fg-white-14); border-radius: var(--radius-sm); background: var(--fg-white-07); }
.fg-hero__eyebrow svg { width: 16px; height: 16px; }
.fg-hero h1 { font-size: clamp(2.3rem, 4.6vw, 3.6rem); line-height: 1.05; margin: var(--space-3) 0 var(--space-5); text-align: left; }
.fg-hero .hero__subtitle { margin: 0 0 var(--space-6); max-width: 60ch; color: var(--fg-white-90); }
.fg-hero__actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.fg-hero__actions .btn svg { width: 18px; height: 18px; }
.fg-hero__proof { display: grid; grid-template-columns: repeat(4, auto); gap: var(--space-6); justify-content: start; }
.fg-hero__proof div { border-left: 2px solid var(--fg-sand); padding-left: var(--space-3); }
.fg-hero__proof strong { display: block; font-family: var(--font-heading); font-size: var(--font-size-xl); color: var(--color-white); line-height: 1.1; }
.fg-hero__proof span { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.2px; color: var(--fg-white-75); }
.fg-hero__badge { position: absolute; left: 5%; bottom: var(--space-8); z-index: 2; display: inline-flex; align-items: center; gap: var(--space-3); background: var(--color-white); color: var(--fg-ink); border-radius: var(--radius-full); padding: var(--space-3) var(--space-5); font-size: var(--font-size-sm); font-weight: 600; box-shadow: var(--shadow-lg); }
.fg-hero__badge svg { width: 20px; height: 20px; color: var(--color-star); }

/* ---- Breadcrumb (below hero — header is fixed) ---- */
.fg-crumbs { background: var(--color-white); border-bottom: 1px solid var(--fg-line); }
.fg-crumbs ol { list-style: none; display: flex; flex-wrap: wrap; gap: var(--space-2); align-items: center; padding: var(--space-3) 0; margin: 0; font-size: var(--font-size-sm); color: var(--color-gray); }
.fg-crumbs a { color: var(--color-gray-dark); }
.fg-crumbs a:hover { color: var(--fg-ember); }
.fg-crumbs [aria-current] { color: var(--fg-ember); font-weight: 600; }
.fg-crumbs__sep { color: var(--fg-line); }

/* =====================================================
   2 · INTRO — answer block + style chip strip
   ===================================================== */
.fg-intro { background: var(--color-white); }
.fg-intro__head { max-width: 820px; }
.fg-intro__head h2 { margin-bottom: var(--space-4); }
.fg-intro__body { display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(0, 1fr); gap: var(--space-12); margin-top: var(--space-8); align-items: start; }
.fg-intro__prose { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.75; }
.fg-intro__prose p + p { margin-top: var(--space-4); }
.fg-updated { display: inline-flex; align-items: center; gap: var(--space-2); font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.5px; color: var(--color-gray); margin-top: var(--space-6); }
.fg-updated::after { content: ''; width: 24px; height: 1px; background: var(--fg-ember); }
.fg-chips { list-style: none; margin: 0; padding: var(--space-6); background: var(--color-light); border-radius: var(--radius-lg); display: grid; gap: var(--space-3); }
.fg-chips__title { font-family: var(--font-heading); font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 2px; color: var(--fg-ink); margin-bottom: var(--space-2); }
.fg-chips li { display: flex; align-items: center; gap: var(--space-3); background: var(--color-white); border: 1px solid var(--fg-line); border-radius: var(--radius-md); padding: var(--space-3) var(--space-4); font-size: var(--font-size-sm); color: var(--color-gray-dark); font-weight: 500; transition: border-color var(--transition-fast), transform var(--transition-fast); }
.fg-chips li:hover { border-color: var(--fg-ember); transform: translateX(3px); }
.fg-chips i { width: 28px; height: 18px; border-radius: var(--radius-sm); flex-shrink: 0; }
.fg-chips i.is-cedar { background: repeating-linear-gradient(90deg, var(--fg-cedar) 0 5px, var(--fg-cedar-dark) 5px 6px); }
.fg-chips i.is-pine { background: repeating-linear-gradient(90deg, var(--fg-pine) 0 5px, var(--fg-cedar) 5px 6px); }
.fg-chips i.is-bob { background: repeating-linear-gradient(90deg, var(--fg-cedar-dark) 0 4px, var(--fg-cedar) 4px 8px); }
.fg-chips i.is-rail { background: repeating-linear-gradient(180deg, var(--color-white) 0 3px, var(--fg-ink) 3px 5px, var(--color-white) 5px 9px); border: 1px solid var(--fg-ink); }
.fg-chips i.is-gate { background: linear-gradient(135deg, transparent 46%, var(--fg-ink) 46% 54%, transparent 54%), var(--fg-cedar); }
.fg-chips i.is-repair { background: linear-gradient(90deg, var(--fg-cedar) 50%, var(--fg-pine) 50%); }

/* =====================================================
   3 · STYLES — horizontal scroll-snap board
   ===================================================== */
.fg-styles { background: var(--color-light); overflow: hidden; }
.fg-board { display: grid; grid-auto-flow: column; grid-auto-columns: minmax(280px, 1fr); gap: var(--space-6); margin-top: var(--space-10); overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: var(--space-4); scrollbar-width: thin; scrollbar-color: var(--fg-ember) var(--fg-line); }
.fg-style { scroll-snap-align: start; background: var(--color-white); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-card); display: flex; flex-direction: column; transition: transform var(--transition-base), box-shadow var(--transition-base); }
.fg-style:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.fg-style__media { aspect-ratio: 4 / 3; position: relative; overflow: hidden; background: var(--fg-ink); }
.fg-style__media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.fg-style:hover .fg-style__media img { transform: scale(1.05); }
.fg-style__media--bob { background: repeating-linear-gradient(90deg, var(--fg-cedar-dark) 0 28px, var(--fg-cedar) 28px 56px); }
.fg-style__media--bob::after { content: ''; position: absolute; inset: 0; background: repeating-linear-gradient(90deg, transparent 0 14px, rgba(var(--fg-ink-rgb), .22) 14px 28px, transparent 28px 42px, rgba(var(--fg-ink-rgb), .12) 42px 56px); }
.fg-style__media--gate { background: linear-gradient(180deg, var(--fg-cedar) 0 100%); }
.fg-style__media--gate::before { content: ''; position: absolute; left: 12%; right: 12%; top: 14%; bottom: 14%; border: 10px solid var(--fg-cedar-dark); border-radius: var(--radius-sm); background: linear-gradient(135deg, transparent 47%, var(--fg-cedar-dark) 47% 53%, transparent 53%); }
.fg-style__media--gate::after { content: ''; position: absolute; left: 50%; top: 14%; bottom: 14%; width: 10px; margin-left: -5px; background: var(--fg-cedar-dark); }
.fg-style__body { padding: var(--space-6); display: flex; flex-direction: column; gap: var(--space-3); flex: 1; }
.fg-style__body h3 { font-size: var(--font-size-xl); margin: 0; color: var(--fg-ink); }
.fg-style__body p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }
.fg-style__meta { margin-top: auto; padding-top: var(--space-4); border-top: 1px solid var(--fg-line); display: flex; flex-wrap: wrap; gap: var(--space-2); }
.fg-style__meta span { font-size: var(--font-size-xs); background: var(--fg-ember-soft); color: var(--fg-ember); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); font-weight: 600; }
.fg-board__hint { display: flex; align-items: center; gap: var(--space-2); margin-top: var(--space-3); font-size: var(--font-size-xs); color: var(--color-gray); text-transform: uppercase; letter-spacing: 1.2px; }
.fg-board__hint svg { width: 16px; height: 16px; }

/* =====================================================
   4 · SIGNATURE — CSS-only fence-style chooser
   ===================================================== */
.fg-chooser-section { background: var(--fg-ink); color: var(--color-white); position: relative; overflow: hidden; }
.fg-chooser-section::before { content: ''; position: absolute; inset: 0; pointer-events: none; background: radial-gradient(ellipse at 90% 10%, rgba(var(--fg-ember-rgb), .25), transparent 55%); }
.fg-chooser-section .container { position: relative; z-index: 1; }
.fg-chooser-section h2 { color: var(--color-white); }
.fg-chooser-section .answer-block { background: var(--fg-white-07); border-left-color: var(--fg-sand); color: var(--fg-white-90); }
.fg-chooser { margin-top: var(--space-10); background: var(--fg-white-07); border: 1px solid var(--fg-white-14); border-radius: var(--radius-xl); padding: var(--space-8); }
.fg-chooser__legend { font-family: var(--font-heading); font-weight: 700; font-size: var(--font-size-lg); color: var(--color-white); margin-bottom: var(--space-5); }
.fg-chooser input[type="radio"] { position: absolute; opacity: 0; pointer-events: none; }
.fg-chooser__tabs { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-3); }
.fg-chooser__tab { display: flex; align-items: center; gap: var(--space-3); padding: var(--space-4) var(--space-5); border-radius: var(--radius-lg); border: 1px solid var(--fg-white-14); background: transparent; color: var(--fg-white-90); cursor: pointer; font-weight: 600; font-size: var(--font-size-sm); transition: background var(--transition-fast), border-color var(--transition-fast), transform var(--transition-fast); }
.fg-chooser__tab:hover { border-color: var(--fg-sand); transform: translateY(-2px); }
.fg-chooser__tab svg { width: 22px; height: 22px; color: var(--fg-sand); flex-shrink: 0; }
.fg-chooser input:focus-visible + .fg-chooser__tab { outline: 3px solid var(--fg-sand); outline-offset: 2px; }
.fg-chooser__panels { position: relative; margin-top: var(--space-6); }
.fg-panel { display: none; grid-template-columns: minmax(0, 1fr) minmax(0, 1.4fr); gap: var(--space-8); align-items: center; background: var(--color-white); color: var(--fg-ink); border-radius: var(--radius-lg); padding: var(--space-8); }
.fg-panel__pick { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.5px; color: var(--fg-ember); font-weight: 700; }
.fg-panel h3 { font-size: var(--font-size-2xl); margin: var(--space-2) 0 var(--space-3); color: var(--fg-ink); }
.fg-panel p { margin: 0; color: var(--color-gray-dark); line-height: 1.65; }
.fg-panel ul { list-style: none; margin: var(--space-5) 0 0; padding: 0; display: grid; gap: var(--space-2); }
.fg-panel li { display: flex; gap: var(--space-2); font-size: var(--font-size-sm); color: var(--color-gray-dark); }
.fg-panel li svg { width: 18px; height: 18px; color: var(--color-success); flex-shrink: 0; margin-top: 2px; }
.fg-panel__swatch { aspect-ratio: 4 / 3; border-radius: var(--radius-lg); position: relative; overflow: hidden; box-shadow: var(--shadow-md); }
.fg-panel__swatch--privacy { background: repeating-linear-gradient(90deg, var(--fg-cedar) 0 26px, var(--fg-cedar-dark) 26px 28px); }
.fg-panel__swatch--privacy::after { content: ''; position: absolute; left: 0; right: 0; top: 22%; height: 12px; background: var(--fg-cedar-dark); box-shadow: 0 var(--space-16) 0 var(--fg-cedar-dark), 0 calc(var(--space-16) * 2) 0 var(--fg-cedar-dark); opacity: .6; }
.fg-panel__swatch--curb { background: repeating-linear-gradient(90deg, var(--fg-cedar-dark) 0 24px, var(--fg-cedar) 24px 48px); }
.fg-panel__swatch--curb::after { content: ''; position: absolute; left: 0; right: 0; top: 0; height: 14%; background: linear-gradient(to bottom, var(--fg-cedar-dark), transparent); }
.fg-panel__swatch--rail { background: linear-gradient(to bottom, var(--fg-sand-soft), var(--color-light)); }
.fg-panel__swatch--rail::before { content: ''; position: absolute; left: 0; right: 0; top: 30%; height: 9px; background: var(--color-white); box-shadow: 0 var(--space-10) 0 var(--color-white), 0 calc(var(--space-10) * 2) 0 var(--color-white); border-top: 1px solid var(--fg-line); }
.fg-panel__swatch--rail::after { content: ''; position: absolute; top: 18%; bottom: 0; width: 12px; left: 14%; background: var(--color-white); box-shadow: calc(var(--space-16) * 2) 0 0 var(--color-white), calc(var(--space-16) * 4) 0 0 var(--color-white); border-inline: 1px solid var(--fg-line); }
.fg-panel__swatch--gate { background: repeating-linear-gradient(90deg, var(--fg-pine) 0 24px, var(--fg-cedar) 24px 26px); }
.fg-panel__swatch--gate::before { content: ''; position: absolute; left: 20%; right: 20%; top: 12%; bottom: 12%; border: 9px solid var(--fg-cedar-dark); background: linear-gradient(135deg, transparent 47%, var(--fg-cedar-dark) 47% 53%, transparent 53%); }
.fg-panel__swatch--gate::after { content: ''; position: absolute; left: 50%; top: 12%; bottom: 12%; width: 9px; margin-left: -4px; background: var(--fg-cedar-dark); }
#fg-goal-privacy:checked ~ .fg-chooser__tabs label[for="fg-goal-privacy"],
#fg-goal-curb:checked ~ .fg-chooser__tabs label[for="fg-goal-curb"],
#fg-goal-open:checked ~ .fg-chooser__tabs label[for="fg-goal-open"],
#fg-goal-gate:checked ~ .fg-chooser__tabs label[for="fg-goal-gate"] { background: var(--fg-ember); border-color: var(--fg-ember); color: var(--color-white); }
#fg-goal-privacy:checked ~ .fg-chooser__tabs label[for="fg-goal-privacy"] svg,
#fg-goal-curb:checked ~ .fg-chooser__tabs label[for="fg-goal-curb"] svg,
#fg-goal-open:checked ~ .fg-chooser__tabs label[for="fg-goal-open"] svg,
#fg-goal-gate:checked ~ .fg-chooser__tabs label[for="fg-goal-gate"] svg { color: var(--color-white); }
#fg-goal-privacy:checked ~ .fg-chooser__panels .fg-panel--privacy,
#fg-goal-curb:checked ~ .fg-chooser__panels .fg-panel--curb,
#fg-goal-open:checked ~ .fg-chooser__panels .fg-panel--open,
#fg-goal-gate:checked ~ .fg-chooser__panels .fg-panel--gate { display: grid; animation: fg-fade .35s ease; }
@keyframes fg-fade { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: none; } }
.fg-chooser__foot { margin-top: var(--space-5); font-size: var(--font-size-sm); color: var(--fg-white-75); }
.fg-chooser__foot a { color: var(--fg-sand); font-weight: 700; }

/* =====================================================
   5 · GATES — photo + hardware spec list
   ===================================================== */
.fg-gates { background: var(--color-white); }
.fg-gates__grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.1fr); gap: var(--space-12); align-items: center; }
.fg-gates__figure { position: relative; }
.fg-gates__figure img { width: 100%; aspect-ratio: 3 / 4; object-fit: cover; display: block; border-radius: var(--radius-xl); box-shadow: var(--shadow-xl); }
.fg-gates__figure::before { content: ''; position: absolute; inset: var(--space-4) auto auto var(--space-4); right: calc(-1 * var(--space-4)); bottom: calc(-1 * var(--space-4)); border: 2px solid var(--fg-sand); border-radius: var(--radius-xl); z-index: -1; }
.fg-gates__caption { position: absolute; left: var(--space-4); bottom: var(--space-4); background: rgba(var(--fg-ink-rgb), .82); color: var(--color-white); font-size: var(--font-size-xs); padding: var(--space-2) var(--space-3); border-radius: var(--radius-sm); }
.fg-spec { list-style: none; margin: var(--space-6) 0 0; padding: 0; border-top: 1px solid var(--fg-line); }
.fg-spec li { display: grid; grid-template-columns: 140px 1fr; gap: var(--space-4); padding: var(--space-4) 0; border-bottom: 1px solid var(--fg-line); align-items: baseline; }
.fg-spec .k { font-family: var(--font-heading); font-weight: 700; color: var(--fg-ember); font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 1px; }
.fg-spec .v { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; }

/* =====================================================
   6 · GROUND — post cross-section + soil points
   ===================================================== */
.fg-ground { background: var(--color-light); position: relative; }
.fg-ground__grid { display: grid; grid-template-columns: minmax(0, .8fr) minmax(0, 1.2fr); gap: var(--space-12); align-items: center; margin-top: var(--space-10); }
.fg-post { position: relative; height: 420px; border-radius: var(--radius-xl); overflow: hidden; background: linear-gradient(to bottom, var(--fg-sand-soft) 0 34%, color-mix(in srgb, var(--fg-cedar) 35%, var(--color-light)) 34% 60%, color-mix(in srgb, var(--fg-cedar-dark) 45%, var(--color-gray-dark)) 60% 100%); box-shadow: var(--shadow-card); }
.fg-post__label { position: absolute; right: var(--space-4); font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.2px; font-weight: 700; color: var(--fg-ink); }
.fg-post__label--air { top: var(--space-4); }
.fg-post__label--clay { top: 38%; }
.fg-post__label--deep { top: 64%; color: var(--color-white); }
.fg-post__timber { position: absolute; left: 50%; top: var(--space-6); bottom: 14%; width: 34px; margin-left: -17px; background: linear-gradient(90deg, var(--fg-cedar-dark), var(--fg-cedar) 40%, var(--fg-cedar-dark)); border-radius: var(--radius-sm) var(--radius-sm) 0 0; }
.fg-post__concrete { position: absolute; left: 50%; top: 38%; bottom: 8%; width: 92px; margin-left: -46px; background: var(--color-gray-light); border-radius: 0 0 var(--radius-lg) var(--radius-lg); z-index: 0; }
.fg-post__concrete::before { content: ''; position: absolute; left: -4px; right: -4px; top: -10px; height: 14px; background: var(--color-gray-light); border-radius: var(--radius-full); }
.fg-post__timber { z-index: 1; }
.fg-post__rails { position: absolute; left: 0; right: 0; height: 10px; background: var(--fg-cedar); }
.fg-post__rails--1 { top: 12%; }
.fg-post__rails--2 { top: 24%; }
.fg-post__water { position: absolute; left: 50%; top: 33%; width: 6px; height: 22px; margin-left: 60px; border-radius: var(--radius-full); background: var(--fg-ember); transform: rotate(35deg); }
.fg-post__water::after { content: ''; position: absolute; left: -130px; top: 0; width: 6px; height: 22px; border-radius: var(--radius-full); background: var(--fg-ember); transform: rotate(-70deg); }
.fg-ground__points { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-4); }
.fg-ground__points li { background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-5) var(--space-6); border-left: 4px solid var(--fg-sand); box-shadow: var(--shadow-sm); transition: border-color var(--transition-base), box-shadow var(--transition-base); }
.fg-ground__points li:hover { border-left-color: var(--fg-ember); box-shadow: var(--shadow-md); }
.fg-ground__points h3 { font-size: var(--font-size-base); margin: 0 0 var(--space-1); color: var(--fg-ink); }
.fg-ground__points p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

/* =====================================================
   7 · CARE — repair / neighbors / staining tickets
   ===================================================== */
.fg-care { background: var(--color-white); }
.fg-tickets { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); margin-top: var(--space-10); }
.fg-ticket { position: relative; background: var(--color-light); border-radius: var(--radius-lg); padding: var(--space-8) var(--space-6) var(--space-6); overflow: hidden; }
.fg-ticket::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: repeating-linear-gradient(90deg, var(--fg-ember) 0 14px, transparent 14px 22px); }
.fg-ticket__no { font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-xs); letter-spacing: 2px; text-transform: uppercase; color: var(--fg-ember); }
.fg-ticket h3 { font-size: var(--font-size-xl); margin: var(--space-2) 0 var(--space-3); color: var(--fg-ink); }
.fg-ticket p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; }
.fg-ticket blockquote { margin: var(--space-4) 0 0; padding: var(--space-3) var(--space-4); background: var(--color-white); border-left: 3px solid var(--fg-sand); font-size: var(--font-size-sm); font-style: italic; color: var(--color-gray-dark); border-radius: var(--radius-sm); }
.fg-ticket cite { display: block; margin-top: var(--space-2); font-style: normal; font-size: var(--font-size-xs); color: var(--color-gray); }

/* =====================================================
   8 · PROCESS — zigzag timeline
   ===================================================== */
.fg-process { background: var(--fg-ink); color: var(--color-white); position: relative; overflow: hidden; }
.fg-process h2 { color: var(--color-white); }
.fg-process .answer-block { background: var(--fg-white-07); border-left-color: var(--fg-sand); color: var(--fg-white-90); }
.fg-zig { position: relative; margin-top: var(--space-12); display: grid; gap: var(--space-8); }
.fg-zig::before { content: ''; position: absolute; left: 50%; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--fg-sand), var(--fg-ember)); transform: translateX(-50%); }
.fg-zig__item { display: grid; grid-template-columns: 1fr var(--space-16) 1fr; align-items: center; }
.fg-zig__dot { justify-self: center; width: 44px; height: 44px; border-radius: var(--radius-full); background: var(--fg-ember); color: var(--color-white); font-family: var(--font-heading); font-weight: 800; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 0 8px rgba(var(--fg-ember-rgb), .2); position: relative; z-index: 1; }
.fg-zig__card { background: var(--fg-white-07); border: 1px solid var(--fg-white-14); border-radius: var(--radius-lg); padding: var(--space-6); transition: background var(--transition-base), transform var(--transition-base); }
.fg-zig__card:hover { background: var(--fg-white-14); transform: translateY(-3px); }
.fg-zig__card h3 { color: var(--color-white); font-size: var(--font-size-lg); margin: 0 0 var(--space-2); }
.fg-zig__card p { margin: 0; color: var(--fg-white-75); font-size: var(--font-size-sm); line-height: 1.6; }
.fg-zig__item:nth-child(odd) .fg-zig__card { grid-column: 1; text-align: right; }
.fg-zig__item:nth-child(odd) .fg-zig__dot { grid-column: 2; }
.fg-zig__item:nth-child(even) .fg-zig__card { grid-column: 3; }
.fg-zig__item:nth-child(even) .fg-zig__dot { grid-column: 2; grid-row: 1; }

/* ---- Mid-page CTA band ---- */
.fg-band { background: linear-gradient(100deg, var(--fg-sand) 0%, var(--fg-ember) 100%); color: var(--color-white); padding: var(--space-10) 0; }
.fg-band__inner { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: var(--space-6); }
.fg-band h2 { color: var(--color-white); font-size: clamp(1.5rem, 3vw, 2.1rem); margin: 0 0 var(--space-2); }
.fg-band p { margin: 0; color: var(--fg-white-90); max-width: 56ch; }
.fg-band__actions { display: flex; flex-wrap: wrap; gap: var(--space-3); }
.fg-band .btn-outline-white:hover { color: var(--fg-ember); }
.fg-band .btn svg { width: 18px; height: 18px; }

/* =====================================================
   REVIEWS — one featured + two stacked
   ===================================================== */
.fg-reviews { background: var(--color-light); }
.fg-reviews__grid { display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr); gap: var(--space-6); margin-top: var(--space-10); }
.fg-review { background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-8); box-shadow: var(--shadow-card); display: flex; flex-direction: column; gap: var(--space-4); position: relative; }
.fg-review--feature { border-top: 4px solid var(--fg-ember); }
.fg-review--feature blockquote { font-size: var(--font-size-base); }
.fg-review__stack { display: grid; gap: var(--space-6); }
.fg-review__job { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1.5px; color: var(--fg-ember); font-weight: 700; }
.fg-review blockquote { margin: 0; color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); }
.fg-review footer { display: flex; align-items: center; gap: var(--space-3); margin-top: auto; padding-top: var(--space-4); border-top: 1px solid var(--fg-line); }
.fg-review__avatar { width: 42px; height: 42px; border-radius: var(--radius-full); background: var(--fg-sand-soft); color: var(--fg-ember); font-family: var(--font-heading); font-weight: 800; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.fg-review__name { font-weight: 700; color: var(--fg-ink); font-size: var(--font-size-sm); display: block; }
.fg-review__city { color: var(--color-gray); font-size: var(--font-size-xs); }
.fg-reviews__links { display: flex; flex-wrap: wrap; justify-content: center; gap: var(--space-4); margin-top: var(--space-8); }
.fg-reviews__links a { display: inline-flex; align-items: center; gap: var(--space-2); padding: var(--space-3) var(--space-5); border-radius: var(--radius-full); border: 1px solid var(--fg-line); background: var(--color-white); color: var(--fg-ink); font-size: var(--font-size-sm); font-weight: 600; transition: border-color var(--transition-fast), color var(--transition-fast); }
.fg-reviews__links a:hover { border-color: var(--fg-ember); color: var(--fg-ember); }
.fg-reviews__links svg { width: 18px; height: 18px; color: var(--color-star); }

/* =====================================================
   FAQ — two columns of cards
   ===================================================== */
.fg-faq { background: var(--color-white); }
.fg-faq__grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-5); margin-top: var(--space-10); align-items: start; }
.faq-item { background: var(--color-white); border: 1px solid var(--fg-line); border-radius: var(--radius-lg); overflow: hidden; transition: border-color var(--transition-base), box-shadow var(--transition-base); }
.faq-item[open] { border-color: rgba(var(--fg-ember-rgb), .5); box-shadow: var(--shadow-md); }
.faq-item:not([open]):hover { border-color: var(--fg-sand); }
.faq-item summary { list-style: none; cursor: pointer; display: flex; align-items: center; gap: var(--space-3); padding: var(--space-5) var(--space-6); font-family: var(--font-heading); font-weight: 600; color: var(--fg-ink); }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-icon { flex-shrink: 0; width: 30px; height: 30px; border-radius: var(--radius-sm); background: var(--fg-sand-soft); color: var(--fg-ember); display: flex; align-items: center; justify-content: center; transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base); margin-left: auto; }
.faq-icon svg { width: 16px; height: 16px; }
.faq-item[open] .faq-icon { transform: rotate(135deg); background: var(--fg-ember); color: var(--color-white); }
.faq-answer { padding: 0 var(--space-6) var(--space-6); }
.faq-answer p { margin: 0; color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.7; }

/* =====================================================
   RELATED SERVICES — required-components grid
   ===================================================== */
.fg-related { background: var(--color-light); }
.fg-related .section-title { text-align: center; max-width: 780px; margin: 0 auto var(--space-10); }
.fg-related .section-title .hero-answer { color: var(--color-gray-dark); font-size: var(--font-size-lg); line-height: 1.7; margin: var(--space-4) auto var(--space-3); }
.fg-related .section-subtitle { display: block; font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--fg-ember); }
.fg-related .prose { color: var(--color-gray); max-width: 60ch; margin: var(--space-2) auto 0; }
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
.service-card__icon { width: 60px; height: 60px; border-radius: var(--radius-full); background: var(--color-white); box-shadow: var(--shadow-md); display: flex; align-items: center; justify-content: center; margin-top: calc(-1 * var(--space-10)); margin-bottom: var(--space-1); color: var(--fg-ember); position: relative; z-index: 1; border: 3px solid var(--color-white); }
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { color: var(--fg-ink); font-size: var(--font-size-xl); margin: 0; }
.service-card__desc { color: var(--color-gray-dark); font-size: var(--font-size-sm); margin: 0; line-height: 1.55; }
.service-card-with-image ul { list-style: none; padding: var(--space-4) 0 0; margin: var(--space-2) 0 0; width: 100%; text-align: left; display: flex; flex-direction: column; gap: var(--space-2); border-top: 1px solid rgba(var(--fg-ink-rgb), .08); }
.service-card-with-image ul li { font-size: var(--font-size-sm); color: var(--color-gray-dark); padding-left: var(--space-6); position: relative; }
.service-card-with-image ul li::before { content: "\2713"; color: var(--fg-ember); font-weight: 700; position: absolute; left: 0; top: 0; }
.service-card__cta { margin-top: auto; padding-top: var(--space-4); width: 100%; color: var(--fg-ember); font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-sm); border-top: 1px solid rgba(var(--fg-ink-rgb), .08); transition: color var(--transition-base); }
.service-card__cta::after { content: " \2192"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--fg-sand); }
.service-card__cta:hover::after { transform: translateX(4px); }

/* =====================================================
   FINAL CTA — centered over a board-pattern field
   ===================================================== */
.fg-cta { position: relative; overflow: hidden; text-align: center; padding: var(--space-16) 0;
  background: linear-gradient(135deg, color-mix(in srgb, var(--fg-ember) 85%, var(--fg-ink)) 0%, var(--fg-ember) 55%, var(--fg-cedar) 100%); }
.fg-cta::before { content: ''; position: absolute; inset: 0; pointer-events: none; opacity: .08; background: repeating-linear-gradient(90deg, var(--color-white) 0 2px, transparent 2px 48px); }
.fg-cta::after { content: ''; position: absolute; inset: 0; pointer-events: none; opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.fg-cta .container { position: relative; z-index: 1; }
.fg-cta h2 { color: var(--color-white); font-size: clamp(1.9rem, 3.8vw, 2.8rem); margin-bottom: var(--space-4); }
.fg-cta p { color: var(--fg-white-90); max-width: 60ch; margin: 0 auto var(--space-8); font-size: var(--font-size-lg); line-height: 1.7; }
.fg-cta__actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
.fg-cta .btn svg { width: 18px; height: 18px; }
.fg-cta .btn-accent { background: var(--color-white); border-color: var(--color-white); color: var(--fg-ember); }
.fg-cta .btn-accent:hover { background: var(--fg-ink); border-color: var(--fg-ink); color: var(--color-white); }
.fg-cta__phone { margin-top: var(--space-6); color: var(--fg-white-90); font-size: var(--font-size-sm); }
.fg-cta__phone a { color: var(--color-white); font-weight: 700; text-decoration: underline; }

/* ---- Dividers (three styles) ---- */
.fg-divider { display: block; line-height: 0; overflow: hidden; }
.fg-divider svg { display: block; width: 100%; height: 100%; }
.fg-divider--pickets { height: 26px; background: repeating-linear-gradient(90deg, var(--fg-cedar) 0 14px, transparent 14px 22px); opacity: .85; }
.fg-divider--angle { height: 60px; }
.fg-divider--wave { height: 64px; }

/* ---- Micro-interactions ---- */
.fg-style__meta span { transition: background var(--transition-fast), color var(--transition-fast); }
.fg-style:hover .fg-style__meta span { background: var(--fg-ember); color: var(--color-white); }
.fg-panel__swatch { transition: transform var(--transition-slow); }
.fg-panel:hover .fg-panel__swatch { transform: scale(1.02); }
.fg-spec li { transition: background var(--transition-fast); }
.fg-spec li:hover { background: var(--fg-sand-soft); }
.fg-spec li:hover .k { color: var(--fg-ink); }
.fg-ticket { transition: transform var(--transition-base), box-shadow var(--transition-base); }
.fg-ticket:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.fg-review { transition: transform var(--transition-base), box-shadow var(--transition-base); }
.fg-review:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.fg-zig__dot { transition: transform var(--transition-base), box-shadow var(--transition-base); }
.fg-zig__item:hover .fg-zig__dot { transform: scale(1.1); box-shadow: 0 0 0 12px rgba(var(--fg-ember-rgb), .25); }
.fg-gates__figure img { transition: transform var(--transition-slow); }
.fg-gates__figure:hover img { transform: translate(-4px, -4px); }
.faq-item summary { transition: color var(--transition-fast); }
.faq-item:not([open]) summary:hover { color: var(--fg-ember); }
.faq-item[open] .faq-answer { animation: fg-faq-in .3s ease; }
@keyframes fg-faq-in { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: none; } }
.fg-reviews__links a svg { transition: transform var(--transition-fast); }
.fg-reviews__links a:hover svg { transform: rotate(18deg); }
.fg-hero__badge { transition: transform var(--transition-base); }
.fg-hero__badge:hover { transform: translateY(-2px); }

/* ---- Fallbacks for browsers without color-mix() ---- */
@supports not (color: color-mix(in srgb, red, blue)) {
  :root {
    --fg-ember-soft: rgba(var(--fg-ember-rgb), .09);
    --fg-sand-soft: rgba(var(--fg-sand-rgb), .18);
    --fg-cedar: var(--color-accent);
    --fg-cedar-dark: var(--color-primary-dark);
    --fg-pine: var(--color-light);
    --fg-white-90: rgba(255, 255, 255, .9);
    --fg-white-75: rgba(255, 255, 255, .75);
    --fg-white-14: rgba(255, 255, 255, .14);
    --fg-white-07: rgba(255, 255, 255, .07);
    --color-card-tint-1: rgba(var(--fg-ember-rgb), .08);
    --color-card-tint-2: rgba(var(--fg-ink-rgb), .06);
    --color-card-tint-3: rgba(var(--fg-sand-rgb), .12);
  }
  .fg-post { background: linear-gradient(to bottom, var(--color-light) 0 34%, var(--color-gray-light) 34% 60%, var(--color-gray-dark) 60% 100%); }
  .fg-cta { background: var(--fg-ember); }
}

/* ---- Forced-colors (Windows high contrast) ---- */
@media (forced-colors: active) {
  .fg-hero::before, .fg-hero::after, .fg-cta::before, .fg-cta::after { display: none; }
  .fg-style, .fg-ticket, .fg-review, .faq-item, .fg-zig__card, .fg-panel, .fg-chips li, .service-card-with-image { border: 1px solid CanvasText; }
  .fg-zig__dot, .fg-review__avatar, .faq-icon, .fg-chooser__tab { forced-color-adjust: none; background: Highlight; color: HighlightText; }
  .fg-post, .fg-panel__swatch, .fg-style__media--bob, .fg-style__media--gate { forced-color-adjust: none; }
}

/* ---- Wide screens ---- */
@media (min-width: 1400px) {
  .fg-hero__inner { gap: var(--space-16); }
  .fg-board { grid-auto-columns: minmax(300px, 1fr); }
  .fg-post { height: 460px; }
}

/* ---- Focus & selection ---- */
.fg-page a:focus-visible, .fg-page summary:focus-visible, .fg-page .btn:focus-visible { outline: 3px solid var(--fg-sand); outline-offset: 2px; border-radius: var(--radius-sm); }
.fg-page ::selection { background: var(--fg-ember); color: var(--color-white); }

/* ---- Reveal directions (none used above the fold) ---- */
[data-animate].fg-rv-left { transform: translateX(-40px); }
[data-animate].fg-rv-right { transform: translateX(40px); }
[data-animate].fg-rv-down { transform: translateY(-28px); }
[data-animate].fg-rv-scale { transform: scale(.94); }
[data-animate].fg-rv-left.animated, [data-animate].fg-rv-right.animated,
[data-animate].fg-rv-down.animated, [data-animate].fg-rv-scale.animated { transform: none; }

/* ---- Motion preferences ---- */
@media (prefers-reduced-motion: reduce) {
  .fg-style:hover, .fg-style:hover .fg-style__media img, .service-card-with-image:hover,
  .service-card-with-image:hover .service-card__image img, .fg-zig__card:hover, .fg-chooser__tab:hover, .fg-chips li:hover { transform: none; }
  .fg-panel { animation: none !important; }
  [data-animate].fg-rv-left, [data-animate].fg-rv-right, [data-animate].fg-rv-down, [data-animate].fg-rv-scale { transform: none; }
}

/* ---- Responsive ---- */
@media (max-width: 1100px) {
  .fg-hero__inner { grid-template-columns: 1fr; }
  .fg-hero__spacer { display: none; }
  .fg-hero::before { background: linear-gradient(to bottom, rgba(var(--fg-ink-rgb), .55) 0%, rgba(var(--fg-ink-rgb), .92) 45%, rgba(var(--fg-ink-rgb), .98) 100%); }
  .fg-hero { flex-direction: column; align-items: stretch; }
  .fg-hero__inner { padding-bottom: var(--space-10); }
  .fg-hero__badge { position: static; align-self: flex-start; margin: 0 5% var(--space-10); }
  .fg-chooser__tabs { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 1024px) {
  .fg-intro__body, .fg-gates__grid, .fg-ground__grid, .fg-reviews__grid { grid-template-columns: 1fr; }
  .fg-panel { grid-template-columns: 1fr; }
  .fg-tickets { grid-template-columns: 1fr; }
  .fg-hero__proof { grid-template-columns: repeat(2, auto); }
  .services-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .fg-zig::before { left: 22px; transform: none; }
  .fg-zig__item { grid-template-columns: 44px 1fr; gap: var(--space-4); }
  .fg-zig__item:nth-child(odd) .fg-zig__card, .fg-zig__item:nth-child(even) .fg-zig__card { grid-column: 2; text-align: left; }
  .fg-zig__item:nth-child(odd) .fg-zig__dot, .fg-zig__item:nth-child(even) .fg-zig__dot { grid-column: 1; grid-row: 1; }
  .fg-faq__grid { grid-template-columns: 1fr; }
  .fg-spec li { grid-template-columns: 1fr; gap: var(--space-1); }
  .fg-hero h1 { font-size: clamp(2rem, 8vw, 2.6rem); }
  .fg-band__inner { flex-direction: column; align-items: flex-start; }
  .fg-post { height: 340px; }
}
@media (max-width: 600px) {
  .fg-board { grid-auto-columns: minmax(82vw, 1fr); }
  .fg-chooser { padding: var(--space-5); }
  .fg-chooser__tabs { grid-template-columns: 1fr; }
  .fg-panel { padding: var(--space-5); }
  .services-grid { grid-template-columns: 1fr; }
  .fg-hero__proof { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 480px) {
  .fg-hero__actions .btn, .fg-cta__actions .btn, .fg-band__actions .btn { width: 100%; justify-content: center; }
  .fg-gates__figure::before { display: none; }
}
@media print {
  .fg-hero, .fg-chooser-section, .fg-process, .fg-cta, .fg-band { background: none !important; color: var(--color-dark) !important; }
  .fg-hero__bg, .fg-divider, .fg-post { display: none !important; }
  .fg-hero h1, .fg-chooser-section h2, .fg-process h2, .fg-cta h2, .fg-zig__card h3 { color: var(--color-dark) !important; }
  .fg-panel { display: grid !important; }
  .faq-item, .fg-ticket, .fg-review, .fg-style { break-inside: avoid; }
  [data-animate] { opacity: 1 !important; transform: none !important; }
}
</style>

<div class="fg-page">

<!-- ===================== 1 · HERO ===================== -->
<section class="hero hero--interior fg-hero" aria-label="Fence and gate builders in the Greater Houston area">
  <img class="fg-hero__bg"
       src="/assets/images/fences-gates.jpg"
       srcset="/assets/images/fences-gates-480.webp 480w, /assets/images/fences-gates-960.webp 960w"
       sizes="100vw"
       alt="New pine privacy fence with a Triple G Roofing yard sign"
       width="1200" height="1600" loading="eager" fetchpriority="high">
  <div class="container fg-hero__inner">
    <div class="fg-hero__spacer" aria-hidden="true"></div>
    <div class="fg-hero__copy">
      <span class="eyebrow-label fg-hero__eyebrow"><?php echo icon('hammer', 16); ?> Fences &middot; Gates &middot; Repairs</span>
      <h1>Fence &amp; Gate Builders in the <span class="text-accent">Greater Houston</span> Area</h1>
      <p class="hero__subtitle">
        <?php echo $siteName; ?> is a family-owned roofing and exterior contractor based in Humble, TX, serving the
        Greater Houston area since <?php echo $yearEstablished; ?>. We build cedar and pine privacy fences, board-on-board,
        ranch rail and custom single and double gates, and we repair or replace the sections that have given up &mdash;
        with the owner on the job and a free written estimate before we start.
      </p>
      <div class="fg-hero__actions">
        <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Fence Estimate</a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
      </div>
      <div class="fg-hero__proof" aria-label="Why homeowners call Triple G">
        <div><strong><?php echo $yearEstablished; ?></strong><span>Serving Houston since</span></div>
        <div><strong>Father &amp; son</strong><span>Family owned</span></div>
        <div><strong>Owner</strong><span>On every job</span></div>
        <div><strong>Free</strong><span>Written estimates</span></div>
      </div>
    </div>
  </div>
  <span class="fg-hero__badge"><?php echo icon('award', 20); ?> Nextdoor Neighborhood Favorite 2022 &middot; 2023 &middot; 2024</span>
</section>

<!-- ===================== BREADCRUMB ===================== -->
<nav class="fg-crumbs breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="fg-crumbs__sep" aria-hidden="true">/</li>
      <li><a href="/services/">Services</a></li>
      <li class="fg-crumbs__sep" aria-hidden="true">/</li>
      <li><a href="<?php echo $canonicalUrl; ?>" aria-current="page"><?php echo htmlspecialchars($serviceName); ?></a></li>
    </ol>
  </div>
</nav>

<!-- ===================== 2 · INTRO / ANSWER ===================== -->
<section class="section fg-intro" aria-label="Fence and gate overview">
  <div class="container">
    <div class="fg-intro__head fg-rv-left" data-animate>
      <span class="eyebrow-label eyebrow-label--ember">Fences Built To Stay Straight</span>
      <h2>Who builds and repairs fences and gates in the Greater Houston area?</h2>
      <p class="answer-block">
        <?php echo $shortName; ?> builds new cedar and pine fences, ranch rail and custom gates, and repairs or replaces
        sections of existing fence for homeowners across the Greater Houston area &mdash; Humble, Atascocita, Kingwood,
        Spring, Crosby, Porter, Baytown and the communities between. Owner Tim Menn walks your fence line with you,
        sets posts for Gulf Coast clay and wind, and hands you a free written estimate first.
      </p>
    </div>
    <div class="fg-intro__body">
      <div class="fg-intro__prose fg-rv-left reveal-delay-1" data-animate>
        <p>
          If you have been searching for a fence builder near me in Houston, here is what you are really shopping for:
          posts that stay plumb, gates that still latch a few summers from now, and a crew that leaves your yard and
          your neighbor's yard the way they found them. A fence is the one project where the shortcuts stay hidden
          underground until the first long wet spell, which is why we spend most of our effort below grade.
        </p>
        <p>
          Fences are a large share of what homeowners call us back for after a roof. Several of the reviews on this
          page started as roofing customers who had us return for a gate, a boundary line or a full privacy fence,
          because the same father-and-son team shows up and the same owner stands behind the work.
        </p>
        <span class="fg-updated">Last Updated: <?php echo date('F Y'); ?></span>
      </div>
      <ul class="fg-chips fg-rv-right reveal-delay-2" data-animate aria-label="Fence and gate styles we build">
        <li class="fg-chips__title" aria-hidden="true">Styles we build</li>
        <li><i class="is-cedar"></i> Cedar privacy fence</li>
        <li><i class="is-pine"></i> Pressure-treated pine privacy fence</li>
        <li><i class="is-bob"></i> Board-on-board (shadowbox and overlap)</li>
        <li><i class="is-rail"></i> Ranch rail and post-and-rail</li>
        <li><i class="is-gate"></i> Single and double gates with heavy hinges</li>
        <li><i class="is-repair"></i> Repairs and partial replacement</li>
      </ul>
    </div>
  </div>
</section>

<div class="fg-divider fg-divider--pickets" aria-hidden="true"></div>

<!-- ===================== 3 · STYLES BOARD ===================== -->
<section class="section fg-styles" aria-label="Fence styles we build">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">Pick A Style</span>
      <h2>What fence styles does <?php echo $shortName; ?> build?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Five, mostly: cedar privacy, pressure-treated pine privacy, board-on-board, ranch rail, and gates to match any
        of them. The photos are our own jobs; the two illustrated cards show styles we build that are not in the
        current gallery.
      </p>
    </div>
    <div class="fg-board" data-animate>
      <article class="fg-style">
        <div class="fg-style__media">
          <img src="/assets/images/fence-gate-cedar.jpg"
               srcset="/assets/images/fence-gate-cedar-480.webp 480w, /assets/images/fence-gate-cedar-960.webp 960w"
               sizes="(max-width: 600px) 82vw, 380px"
               alt="New cedar fence and double gate beside a brick home" width="1200" height="1600" loading="lazy">
        </div>
        <div class="fg-style__body">
          <h3>Cedar privacy</h3>
          <p>Naturally rot- and insect-resistant, tight grain, takes stain beautifully. The pick for street-facing runs and anyone who wants the fence to look good for years.</p>
          <div class="fg-style__meta"><span>Longest-lasting wood</span><span>Best for staining</span></div>
        </div>
      </article>
      <article class="fg-style">
        <div class="fg-style__media">
          <img src="/assets/images/fences-gates.jpg"
               srcset="/assets/images/fences-gates-480.webp 480w, /assets/images/fences-gates-960.webp 960w"
               sizes="(max-width: 600px) 82vw, 380px"
               alt="New pine privacy fence with a Triple G Roofing yard sign" width="1200" height="1600" loading="lazy">
        </div>
        <div class="fg-style__body">
          <h3>Pine privacy</h3>
          <p>Pressure-treated pine is the budget-friendly workhorse for long backyard lines. Built on treated posts and rails, it gives you full privacy without the cedar cost.</p>
          <div class="fg-style__meta"><span>Budget-friendly</span><span>Full privacy</span></div>
        </div>
      </article>
      <article class="fg-style">
        <div class="fg-style__media fg-style__media--bob" role="img" aria-label="Illustration of an overlapping board-on-board fence pattern"></div>
        <div class="fg-style__body">
          <h3>Board-on-board</h3>
          <p>Pickets overlap on alternating sides of the rails, so there are no gaps when the boards shrink and both neighbors get a finished side.</p>
          <div class="fg-style__meta"><span>No see-through gaps</span><span>Good-neighbor style</span></div>
        </div>
      </article>
      <article class="fg-style">
        <div class="fg-style__media">
          <img src="/assets/images/metal-roof-barn.jpg"
               srcset="/assets/images/metal-roof-barn-480.webp 480w, /assets/images/metal-roof-barn-960.webp 960w"
               sizes="(max-width: 600px) 82vw, 380px"
               alt="New corrugated metal roof on a barn with white ranch-rail fencing" width="1200" height="1600" loading="lazy">
        </div>
        <div class="fg-style__body">
          <h3>Ranch rail</h3>
          <p>Two-, three- or four-rail post-and-rail for acreage, front yards and pasture lines. Open sightlines, low wind load, easy to pair with wire mesh for pets.</p>
          <div class="fg-style__meta"><span>Acreage and front yards</span><span>Low wind load</span></div>
        </div>
      </article>
      <article class="fg-style">
        <div class="fg-style__media fg-style__media--gate" role="img" aria-label="Illustration of a braced wood gate"></div>
        <div class="fg-style__body">
          <h3>Gates</h3>
          <p>Single walk gates and double drive gates built to match the fence, hung on heavy hinges with diagonal bracing so they swing and latch for years.</p>
          <div class="fg-style__meta"><span>Single and double</span><span>Heavy-duty hardware</span></div>
        </div>
      </article>
    </div>
    <p class="fg-board__hint"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg> Scroll sideways for all five</p>
  </div>
</section>

<!-- ===================== 4 · SIGNATURE — STYLE CHOOSER ===================== -->
<section class="section fg-chooser-section" aria-label="Fence style chooser">
  <div class="container">
    <div class="section-header" style="max-width:780px; margin-inline:auto;">
      <span class="eyebrow-label">Fence Style Chooser</span>
      <h2>Which fence is right for your yard?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Start with what matters most &mdash; privacy, curb appeal, an open look, or a gate that works &mdash; and the
        right style mostly picks itself. Tap a goal below. Then call and Tim will confirm it on your actual fence line.
      </p>
    </div>
    <div class="fg-chooser fg-rv-scale" data-animate>
      <p class="fg-chooser__legend">What matters most to you?</p>
      <input type="radio" name="fg-goal" id="fg-goal-privacy" checked>
      <input type="radio" name="fg-goal" id="fg-goal-curb">
      <input type="radio" name="fg-goal" id="fg-goal-open">
      <input type="radio" name="fg-goal" id="fg-goal-gate">
      <div class="fg-chooser__tabs">
        <label class="fg-chooser__tab" for="fg-goal-privacy"><?php echo icon('shield', 22); ?> Total privacy</label>
        <label class="fg-chooser__tab" for="fg-goal-curb"><?php echo icon('star', 22); ?> Curb appeal</label>
        <label class="fg-chooser__tab" for="fg-goal-open"><?php echo icon('wind', 22); ?> Open sightlines</label>
        <label class="fg-chooser__tab" for="fg-goal-gate"><?php echo icon('wrench', 22); ?> A gate that works</label>
      </div>
      <div class="fg-chooser__panels">
        <div class="fg-panel fg-panel--privacy">
          <div class="fg-panel__swatch fg-panel__swatch--privacy" role="img" aria-label="Illustration of a solid privacy fence"></div>
          <div>
            <span class="fg-panel__pick">Our pick</span>
            <h3>Six-foot privacy fence, cedar or pine</h3>
            <p>Solid pickets, three rails for stiffness, posts set deep for wind. Cedar if it faces the street or you plan to stain; pressure-treated pine for long backyard runs on a budget.</p>
            <ul>
              <li><?php echo icon('check-circle', 18); ?> Blocks sightlines from the street and neighbors</li>
              <li><?php echo icon('check-circle', 18); ?> Catches the most wind, so post setting matters most</li>
              <li><?php echo icon('check-circle', 18); ?> Check HOA rules on height and finished side</li>
            </ul>
          </div>
        </div>
        <div class="fg-panel fg-panel--curb">
          <div class="fg-panel__swatch fg-panel__swatch--curb" role="img" aria-label="Illustration of a board-on-board fence with a top cap"></div>
          <div>
            <span class="fg-panel__pick">Our pick</span>
            <h3>Cedar board-on-board with a cap rail</h3>
            <p>Overlapping cedar pickets give a finished look from both sides, a cap and trim rail along the top dresses it up, and a stain locks in the color.</p>
            <ul>
              <li><?php echo icon('check-circle', 18); ?> No gaps when the boards dry and shrink</li>
              <li><?php echo icon('check-circle', 18); ?> Both neighbors see a finished side</li>
              <li><?php echo icon('check-circle', 18); ?> Stain or seal once the wood has dried</li>
            </ul>
          </div>
        </div>
        <div class="fg-panel fg-panel--open">
          <div class="fg-panel__swatch fg-panel__swatch--rail" role="img" aria-label="Illustration of a white ranch-rail fence"></div>
          <div>
            <span class="fg-panel__pick">Our pick</span>
            <h3>Ranch rail, two to four rails</h3>
            <p>Post-and-rail keeps the view and the breeze, marks the line, and stands up to wind better than any solid fence. Add welded-wire mesh behind the rails if you have dogs.</p>
            <ul>
              <li><?php echo icon('check-circle', 18); ?> Acreage, front yards and pasture lines</li>
              <li><?php echo icon('check-circle', 18); ?> Low wind load and fewer boards to maintain</li>
              <li><?php echo icon('check-circle', 18); ?> Paint, stain or leave natural</li>
            </ul>
          </div>
        </div>
        <div class="fg-panel fg-panel--gate">
          <div class="fg-panel__swatch fg-panel__swatch--gate" role="img" aria-label="Illustration of a braced double gate"></div>
          <div>
            <span class="fg-panel__pick">Our pick</span>
            <h3>Framed gate on heavy hinges</h3>
            <p>A gate that still latches is about the frame, the bracing and the posts. We build the gate as a braced frame, hang it on heavy-duty hinges from a well-set post, and add a drop rod on double gates.</p>
            <ul>
              <li><?php echo icon('check-circle', 18); ?> Diagonal brace from bottom hinge to top latch side</li>
              <li><?php echo icon('check-circle', 18); ?> Double drive gates sized for mowers and trailers</li>
              <li><?php echo icon('check-circle', 18); ?> Matches the fence it lives in</li>
            </ul>
          </div>
        </div>
      </div>
      <p class="fg-chooser__foot">Not sure? Tell Tim how you use the yard and he will tell you what he would build. <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a></p>
    </div>
  </div>
</section>

<!-- ===================== 5 · GATES ===================== -->
<section class="section fg-gates" aria-label="Custom gates">
  <div class="container">
    <div class="fg-gates__grid">
      <figure class="fg-gates__figure fg-rv-left" data-animate>
        <img src="/assets/images/fence-gate-cedar.jpg"
             srcset="/assets/images/fence-gate-cedar-480.webp 480w, /assets/images/fence-gate-cedar-960.webp 960w"
             sizes="(max-width: 1024px) 100vw, 480px"
             alt="New cedar fence and double gate beside a brick home" width="1200" height="1600" loading="lazy">
        <figcaption class="fg-gates__caption">Our work: cedar fence and double gate</figcaption>
      </figure>
      <div class="fg-rv-right" data-animate>
        <span class="eyebrow-label eyebrow-label--ember">Gates That Still Latch</span>
        <h2>What makes a wood gate last in Houston?</h2>
        <p class="answer-block">
          A gate fails at three places: a post that leans, a frame that racks, and hinges that were too light for the
          weight. We build every gate as a braced frame on heavy-duty hardware, hung from a post set for the job, so it
          swings and latches for years instead of dragging after the first wet season.
        </p>
        <ul class="fg-spec">
          <li><span class="k">Posts</span><span class="v">Gate posts carry the whole load, so they are set deeper and heavier than line posts and allowed to cure before the gate is hung.</span></li>
          <li><span class="k">Frame</span><span class="v">A full perimeter frame with a diagonal brace running from the bottom hinge corner up to the latch side, which is what stops sag.</span></li>
          <li><span class="k">Hinges</span><span class="v">Heavy-duty strap or T-hinges sized to the gate's weight, through-bolted where the wood allows rather than screwed into end grain.</span></li>
          <li><span class="k">Latches</span><span class="v">Gravity or lockable latches set at a comfortable height, with a drop rod or cane bolt on double gates so one leaf stays put.</span></li>
          <li><span class="k">Width</span><span class="v">Walk gates for people and trash cans; double drive gates sized so a mower, trailer or small vehicle fits through without scraping.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="fg-divider fg-divider--angle" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 60" preserveAspectRatio="none"><polygon fill="var(--color-light)" points="0,60 1200,0 1200,60"/></svg>
</div>

<!-- ===================== 6 · GROUND ===================== -->
<section class="section fg-ground" aria-label="Setting fence posts in Gulf Coast soil">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">Below Grade</span>
      <h2>Why do fence posts lean in Houston, and how do we set them so they don't?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Gulf Coast clay swells when it is wet and shrinks when it is dry, and a solid privacy fence is a sail in a
        thunderstorm. Posts that stay straight are set below the active clay, in concrete crowned to shed water, with
        spacing and rail count sized for wind rather than for the cheapest bid.
      </p>
    </div>
    <div class="fg-ground__grid">
      <div class="fg-post fg-rv-left" data-animate role="img" aria-label="Illustration of a fence post set in crowned concrete below the active clay layer">
        <span class="fg-post__label fg-post__label--air">Above grade</span>
        <span class="fg-post__label fg-post__label--clay">Active clay</span>
        <span class="fg-post__label fg-post__label--deep">Below the swell zone</span>
        <span class="fg-post__rails fg-post__rails--1"></span>
        <span class="fg-post__rails fg-post__rails--2"></span>
        <span class="fg-post__concrete"></span>
        <span class="fg-post__timber"></span>
        <span class="fg-post__water"></span>
      </div>
      <ul class="fg-ground__points fg-rv-right" data-animate>
        <li>
          <h3>Set below the active clay</h3>
          <p>The top layer of gumbo moves the most. Posts that stop in it get lifted and tilted every wet-dry cycle; posts that go below it stay put.</p>
        </li>
        <li>
          <h3>Concrete crowned at the top</h3>
          <p>A flat or dished concrete collar holds water against the post and rots it at grade. We crown the top so water sheds away from the wood.</p>
        </li>
        <li>
          <h3>Spacing and rails sized for wind</h3>
          <p>Solid fences take real wind load. Closer post spacing and a third rail on a six-foot fence keep pickets from bowing and rails from snapping in a storm.</p>
        </li>
        <li>
          <h3>Treated posts, or steel where it earns it</h3>
          <p>Ground-contact treated posts are the standard. Where a line takes heavy wind or sits in wet ground, we will talk through steel posts with wood fencing on the face.</p>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- ===================== MID CTA ===================== -->
<section class="fg-band" aria-label="Schedule a free fence estimate">
  <div class="container fg-band__inner">
    <div>
      <h2>Fence leaning, gate dragging, or ready for a new line?</h2>
      <p>Tim will walk the fence with you, tell you what can be repaired and what should be replaced, and put it in writing &mdash; free.</p>
    </div>
    <div class="fg-band__actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      <a href="/contact/" class="btn btn-primary btn-lg">Request an Estimate</a>
    </div>
  </div>
</section>

<!-- ===================== 7 · CARE ===================== -->
<section class="section fg-care" aria-label="Fence repair, neighbor coordination and staining">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">Repairs, Neighbors, Finish</span>
      <h2>Do you repair fences, handle shared lines, and stain?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Yes to all three. We replace single sections or one whole boundary line, we coordinate access with your neighbor
        before we set foot on their side, and we can stain or seal the finished fence once the wood has dried out.
      </p>
    </div>
    <div class="fg-tickets">
      <article class="fg-ticket fg-rv-down" data-animate>
        <span class="fg-ticket__no">Job ticket 01</span>
        <h3>Repair and partial replacement</h3>
        <p>A blown-down panel, a run of rotted posts, a gate past saving, or one side of the yard that is older than the rest. We match the height and board style of what is staying so the new section blends in, and we tell you when replacing the whole line is the better value.</p>
        <blockquote>&ldquo;They replaced about half of the privacy fence along our East boundary line.&rdquo;<cite>Randy &amp; Charlene, after their roof and gutters</cite></blockquote>
      </article>
      <article class="fg-ticket fg-rv-down reveal-delay-1" data-animate>
        <span class="fg-ticket__no">Job ticket 02</span>
        <h3>Shared fences and neighbors</h3>
        <p>Most fence lines are shared. If we need to work from the neighbor's side to pull old panels or set posts, we ask first, protect their beds and grass, and clean up both sides. Who pays is between neighbors, but we will give both households the same written estimate.</p>
        <blockquote>&ldquo;He had to get permission from my neighbor to get on her side of the property line and handled it graciously.&rdquo;<cite>Barbara, Atascocita, TX</cite></blockquote>
      </article>
      <article class="fg-ticket fg-rv-down reveal-delay-2" data-animate>
        <span class="fg-ticket__no">Job ticket 03</span>
        <h3>Staining and sealing</h3>
        <p>Cedar and pine both gray and check in the Houston sun without protection. Once the wood has dried out, a penetrating stain or clear sealer blocks UV and water and keeps the color. We can include it in your estimate or tell you when the fence is ready if you would rather do it yourself.</p>
        <blockquote>&ldquo;Tim gave me a fair estimate which was below my budget, his crew started on time every day, cleaned up the work-space at the end of each day.&rdquo;<cite>Clint, Humble, TX &mdash; cedar fence and gate</cite></blockquote>
      </article>
    </div>
  </div>
</section>

<div class="fg-divider fg-divider--wave" aria-hidden="true" style="background:var(--color-white);">
  <svg viewBox="0 0 1200 64" preserveAspectRatio="none"><path d="M0,32 C300,64 900,0 1200,32 L1200,64 L0,64 Z" fill="var(--color-secondary)"/></svg>
</div>

<!-- ===================== 8 · PROCESS ===================== -->
<section class="section fg-process" aria-label="Our fence building process">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label">Start To Finish</span>
      <h2>What happens after you call about a fence?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        We walk the line, put the price in writing, build it with the owner on site, and have you inspect the work
        before we leave. We will tell you up front if your fence needs a permit or HOA approval.
      </p>
    </div>
    <div class="fg-zig">
      <div class="fg-zig__item fg-rv-left" data-animate>
        <div class="fg-zig__card">
          <h3>Walk the line</h3>
          <p>Tim comes out, measures the run, locates the corners and gates, checks what is salvageable, and talks through cedar versus pine, height and style. Free, no pressure.</p>
        </div>
        <span class="fg-zig__dot" aria-hidden="true">1</span>
      </div>
      <div class="fg-zig__item fg-rv-right" data-animate>
        <span class="fg-zig__dot" aria-hidden="true">2</span>
        <div class="fg-zig__card">
          <h3>Written estimate</h3>
          <p>You get a free written estimate that spells out footage, height, material, gates, haul-off of the old fence and staining as an option, so nothing is a surprise.</p>
        </div>
      </div>
      <div class="fg-zig__item fg-rv-left" data-animate>
        <div class="fg-zig__card">
          <h3>Build it right</h3>
          <p>Old fence out, posts set in concrete and allowed to cure, rails and pickets hung straight, gates framed and hung last. Tim is on the job to see it is done as agreed.</p>
        </div>
        <span class="fg-zig__dot" aria-hidden="true">3</span>
      </div>
      <div class="fg-zig__item fg-rv-right" data-animate>
        <span class="fg-zig__dot" aria-hidden="true">4</span>
        <div class="fg-zig__card">
          <h3>You inspect before we leave</h3>
          <p>Both sides cleaned up, debris hauled, and a walk-through with you at the end. As one Spring customer put it, we have you inspect the work before we leave.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<section class="section fg-reviews" aria-label="Fence and gate customer reviews">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">In Their Words</span>
      <h2>What do homeowners say about their <?php echo $shortName; ?> fence or gate?</h2>
      <p class="answer-block" style="margin-inline:auto; text-align:left;">
        Real reviews from our own customers, quoted as they wrote them. Voted a Nextdoor Neighborhood Favorite in 2022,
        2023 and 2024.
      </p>
    </div>
    <?php
    $fgJobs = ['Donna S.' => 'New backyard gate and fence repair', 'Barbara' => 'New fence', 'Clint' => 'Cedar fence, gate and exterior work'];
    $feature = $reviews[0] ?? null;
    $rest    = array_slice($reviews, 1);
    ?>
    <div class="fg-reviews__grid">
      <?php if ($feature): ?>
      <article class="fg-review fg-review--feature fg-rv-left" data-animate>
        <span class="fg-review__job"><?php echo htmlspecialchars($fgJobs[$feature['name']] ?? 'Fence project'); ?></span>
        <blockquote>&ldquo;<?php echo htmlspecialchars(fg_excerpt($feature['text'])); ?>&rdquo;</blockquote>
        <footer>
          <span class="fg-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($feature['name'], 0, 1)); ?></span>
          <div>
            <span class="fg-review__name"><?php echo htmlspecialchars($feature['name']); ?></span>
            <span class="fg-review__city"><?php echo htmlspecialchars($feature['city']); ?></span>
          </div>
        </footer>
      </article>
      <?php endif; ?>
      <div class="fg-review__stack">
        <?php foreach ($rest as $i => $r): ?>
        <article class="fg-review fg-rv-right reveal-delay-<?php echo $i + 1; ?>" data-animate>
          <span class="fg-review__job"><?php echo htmlspecialchars($fgJobs[$r['name']] ?? 'Fence project'); ?></span>
          <blockquote>&ldquo;<?php echo htmlspecialchars(fg_excerpt($r['text'])); ?>&rdquo;</blockquote>
          <footer>
            <span class="fg-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></span>
            <div>
              <span class="fg-review__name"><?php echo htmlspecialchars($r['name']); ?></span>
              <span class="fg-review__city"><?php echo htmlspecialchars($r['city']); ?></span>
            </div>
          </footer>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="fg-reviews__links fg-rv-scale" data-animate>
      <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Read our Google reviews</a>
      <a href="<?php echo htmlspecialchars($reviewRequestUrl); ?>" target="_blank" rel="noopener"><?php echo icon('star', 18); ?> Leave us a review</a>
    </div>
  </div>
</section>

<!-- ===================== FAQ ===================== -->
<section class="section fg-faq" aria-label="Fence and gate FAQs">
  <div class="container">
    <div class="section-header" style="max-width:760px; margin-inline:auto;">
      <span class="eyebrow-label eyebrow-label--ember">Good Questions</span>
      <h2>What do Greater Houston homeowners ask before building a fence?</h2>
      <p class="hero-answer" style="color:var(--color-gray-dark);">Straight answers on cedar versus pine, partial replacement, neighbors, posts in clay, cost and HOA rules. Anything else, call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> and ask Tim.</p>
    </div>
    <div class="fg-faq__grid">
      <?php foreach ($faqs as $i => $f): ?>
      <details class="faq-item"<?php echo $i === 0 ? ' open' : ''; ?> data-animate>
        <summary>
          <span><?php echo htmlspecialchars($f['q']); ?></span>
          <span class="faq-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg></span>
        </summary>
        <div class="faq-answer"><p><?php echo htmlspecialchars($f['a']); ?></p></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== RELATED SERVICES ===================== -->
<section class="section fg-related" aria-label="Roofing and exterior services">
  <div class="container">
    <div class="section-title" data-animate>
      <span class="eyebrow-label eyebrow-label--ember">What We Do</span>
      <h2>What else does <?php echo $shortName; ?> build and fix <span class="text-accent">outside your home</span>?</h2>
      <p class="hero-answer">A new fence usually comes up alongside the rest of the exterior: a patio cover to go with it, siding and trim that need paint, gutters that have been dumping water on the fence line. Triple G Roofing &amp; Construction handles all of it with one crew and the owner on site, so the yard matches from the roofline to the back gate.</p>
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
<section class="fg-cta" aria-label="Get a free fence or gate estimate">
  <div class="container">
    <h2>Ready for a fence that stays straight and a gate that still latches?</h2>
    <p>Call <?php echo $shortName; ?> for a free on-site estimate anywhere in the Greater Houston area. Tim will walk the line, tell you what to repair and what to replace, and put it in writing &mdash; then be on the job when it is built.</p>
    <div class="fg-cta__actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Request a Free Estimate</a>
    </div>
    <p class="fg-cta__phone">Hours: <?php echo $businessHours; ?>. Or send photos of the fence through the <a href="/contact/">contact form</a> and we will call you back.</p>
  </div>
</section>

</div><!-- /.fg-page -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
