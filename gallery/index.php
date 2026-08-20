<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Project Gallery — Triple G Roofing & Construction
   Every photo is the client's own job photo (references/photo-manifest.json).
   Captions describe what is in the frame — never a city, name or date.
   Schema: ImageGallery + BreadcrumbList (no ratings of any kind).
   ============================================================ */

$currentPage     = 'about';
$pageTitle       = 'Project Gallery — Roofing, Siding, Patios, Decks & Fences';
$pageDescription = 'Real photos from Triple G Roofing & Construction jobs: roof replacements, metal roofs, storm repairs, siding, patio covers, decks and fences in Greater Houston.';
$canonicalUrl    = $siteUrl . '/gallery/';
$ogImage         = 'hero-roof-home-v2-1600.webp';

/* ---- Photo registry: name => [w, h, variants, alt, caption] (dims + variants from the manifest) ---- */
$photos = [
    'hero-roof-home-v2'       => [1600, 900,  [480, 960, 1600], 'Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing & Construction', 'Architectural shingle roof on a brick home'],
    'roof-replacement'     => [1200, 1600, [480, 960], 'Triple G crew replacing the roof on a two-story brick home', 'Crew replacing the roof on a two-story brick home'],
    'roof-tearoff'         => [1200, 1600, [480, 960], 'Roof tear-off in progress with a dump trailer staged in the driveway', 'Tear-off in progress, dump trailer staged in the driveway'],
    'roof-decking-rot'     => [739,  1600, [480],      'Rotted roof decking exposed during tear-off', 'Rotted decking exposed once the old shingles are off'],
    'roof-underlayment'    => [1200, 1600, [480, 960], 'Synthetic underlayment laid across a roof before shingles', 'Synthetic underlayment laid before the shingles go down'],
    'crew-underlayment'    => [1200, 1600, [480, 960], 'Triple G roofers installing synthetic underlayment on a steep roof', 'Crew fastening underlayment on a steep pitch'],
    'crew-shingles'        => [1200, 1600, [480, 960], 'Roofer carrying shingles across a roof covered in new underlayment', 'Carrying shingle bundles across the prepared deck'],
    'roof-overhead'        => [1200, 1600, [480, 960], 'Overhead view of a completed architectural shingle roof', 'Overhead view of a finished architectural shingle roof'],
    'roof-finished-brick'  => [1200, 1600, [480, 960], 'Completed shingle roof replacement on a brick ranch home', 'Completed shingle roof on a brick ranch home'],
    'roof-large-home'      => [1200, 1600, [480, 960], 'Large two-story brick home with a completed roof replacement', 'Large two-story brick home after roof replacement'],
    'roof-two-story'       => [1200, 1600, [480, 960], 'Two-story brick home during a roof replacement', 'Two-story brick home mid-replacement'],
    'roof-home-trees'      => [1200, 1600, [480, 960], 'Brick home with a new dark shingle roof under mature trees', 'New dark shingle roof under mature trees'],
    'metal-roof-barn'      => [1200, 1600, [480, 960], 'New corrugated metal roof on a barn with white ranch-rail fencing', 'Corrugated metal roof on a barn with ranch-rail fencing'],
    'roof-metal-shop'      => [1200, 1600, [480, 960], 'Crew installing a new metal roof on a metal shop building', 'Crew installing a metal roof on a shop building'],
    'palapa-before'        => [1000, 1000, [480, 960], 'Thatched poolside palapa before conversion to a metal roof', 'Before: thatched poolside palapa'],
    'palapa-metal'         => [896,  1600, [480],      'Poolside palapa converted from thatch to a metal roof', 'After: the same palapa with a metal roof'],
    'roof-repair-v2'          => [1200, 1600, [480, 960], 'New step flashing sealed against a brick chimney during a roof repair', 'New step flashing sealed against a brick chimney'],
    'roof-inspection-v2'      => [1200, 1600, [480, 960], 'Close-up of cracked and lifted shingles found during a roof inspection', 'Cracked, lifted shingles found during an inspection'],
    'roof-damage-repair-v2'   => [1200, 1600, [480, 960], 'Roof stripped to the decking showing holes and rotted wood before repair', 'Decking stripped back to expose holes and rot'],
    'storm-damage-repair-v2'  => [1200, 1600, [480, 960], 'Tarped roof with a Triple G crew starting storm damage repairs', 'Tarped roof as storm repairs begin'],
    'attic-venting-v2'        => [1200, 1600, [480, 960], 'Freshly shingled roof with box vents installed for attic ventilation', 'Box vents on a freshly shingled roof'],
    'gutter-installation-v2'  => [720,  960,  [480],      'New downspout and gutter on a brick covered patio', 'New gutter and downspout on a brick covered patio'],
    'siding-fascia-soffit' => [1200, 1600, [480, 960], 'Crew member replacing siding on a dormer above a shingle roof', 'Replacing siding on a dormer above the roofline'],
    'siding-dormer'        => [1000, 1333, [480, 960], 'Dormer siding replaced with new fiber-cement panels', 'Dormer re-clad in fiber-cement panels'],
    'screened-porch'       => [491,  919,  [480],      'Screened porch with fresh exterior paint and new screens', 'Screened porch with fresh exterior paint and new screens'],
    'patio-covers-decks'   => [1000, 1333, [480, 960], 'Finished covered patio with ceiling fans and a concrete slab', 'Covered patio with ceiling fans over a concrete slab'],
    'patio-cover-fans'     => [1200, 1600, [480, 960], 'Covered patio with beadboard ceiling and fans', 'Beadboard ceiling and fans under a patio cover'],
    'patio-enclosed'       => [760,  1013, [480],      'Enclosed patio framed with new windows and a solid roof', 'Enclosed patio with new windows and a solid roof'],
    'pergola-cedar'        => [1200, 1600, [480, 960], 'Custom cedar pergola over a back patio on a brick home', 'Cedar pergola over a back patio'],
    'pergola-detail'       => [1200, 1600, [480, 960], 'Cedar pergola with decorative rafter tails over a side patio', 'Decorative rafter tails on a cedar pergola'],
    'deck-new'             => [896,  1600, [480],      'New pressure-treated wood deck wrapping a backyard', 'Pressure-treated deck wrapping a backyard'],
    'deck-railing'         => [896,  1600, [480],      'Wood deck built around a mature tree with custom railing', 'Deck built around a mature tree, with custom railing'],
    'deck-framing'         => [896,  1600, [480],      'New deck framing laid out in a backyard', 'Deck framing laid out before the boards go down'],
    'fences-gates'         => [1200, 1600, [480, 960], 'New pine privacy fence with a Triple G Roofing yard sign', 'Pine privacy fence with a Triple G yard sign'],
    'fence-gate-cedar'     => [1200, 1600, [480, 960], 'New cedar fence and double gate beside a brick home', 'Cedar fence and double gate beside a brick home'],
];

/* ---- Category blocks ---- */
$roofSteps    = ['roof-tearoff', 'roof-decking-rot', 'roof-underlayment', 'crew-underlayment', 'crew-shingles'];
$roofFinished = ['roof-overhead', 'roof-finished-brick', 'roof-large-home', 'roof-replacement', 'roof-two-story', 'roof-home-trees', 'hero-roof-home-v2'];
$metalPhotos  = ['metal-roof-barn', 'roof-metal-shop'];
$repairPhotos = ['roof-repair-v2', 'roof-inspection-v2', 'roof-damage-repair-v2', 'storm-damage-repair-v2', 'attic-venting-v2'];
$sidingPhotos = ['gutter-installation-v2', 'siding-fascia-soffit', 'siding-dormer', 'screened-porch'];
$patioPhotos  = ['patio-covers-decks', 'patio-cover-fans', 'patio-enclosed', 'pergola-cedar', 'pergola-detail', 'deck-new', 'deck-railing', 'deck-framing'];
$fencePhotos  = ['fences-gates', 'fence-gate-cedar'];

$categories = [
    ['id' => 'roof-replacement', 'label' => 'Roof Replacement'],
    ['id' => 'metal-roofing',    'label' => 'Metal Roofing'],
    ['id' => 'roof-repair',      'label' => 'Repair & Storm Damage'],
    ['id' => 'siding-gutters',   'label' => 'Gutters, Siding & Paint'],
    ['id' => 'patios-decks',     'label' => 'Patio Covers, Pergolas & Decks'],
    ['id' => 'fences',           'label' => 'Fences & Gates'],
];

/* ---- Helpers ---- */
function gal_srcset($name, $variants) {
    $parts = [];
    foreach ($variants as $v) {
        $parts[] = '/assets/images/' . $name . '-' . $v . '.webp ' . $v . 'w';
    }
    return implode(', ', $parts);
}
function gal_src($name, $variants) {
    return '/assets/images/' . $name . '-' . max($variants) . '.webp';
}
/** Render one <img> for a registry photo. */
function gal_img($name, $sizes, $extraClass = '', $eager = false) {
    global $photos;
    [$w, $h, $variants, $alt] = $photos[$name];
    $loading = $eager ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"';
    return '<img src="' . gal_src($name, $variants) . '" srcset="' . gal_srcset($name, $variants) . '" sizes="' . htmlspecialchars($sizes) . '" alt="' . htmlspecialchars($alt) . '" width="' . $w . '" height="' . $h . '" ' . $loading . ($extraClass ? ' class="' . $extraClass . '"' : '') . '>';
}
/** Figure + caption + lightbox link. $dirs rotates reveal direction. */
function gal_figure($name, $sizes, $dir = 'fade-up', $backId = 'gallery', $delay = 0) {
    global $photos;
    $cap   = $photos[$name][4];
    $style = $delay ? ' style="transition-delay: ' . $delay . 's;"' : '';
    $html  = '<figure class="gal-item" data-animate="' . $dir . '"' . $style . '>';
    $html .= '<a class="gal-item__link" href="#lb-' . $name . '" aria-label="Enlarge: ' . htmlspecialchars($cap) . '">';
    $html .= gal_img($name, $sizes);
    $html .= '<span class="gal-item__zoom" aria-hidden="true">' . icon('plus', 18) . '</span>';
    $html .= '</a>';
    $html .= '<figcaption>' . htmlspecialchars($cap) . '</figcaption>';
    $html .= '</figure>';
    return $html;
}
/** Matching CSS-only lightbox (:target). Rendered at the bottom of the page. */
function gal_lightbox($name, $backId) {
    global $photos;
    $cap   = $photos[$name][4];
    $html  = '<div class="gal-lb" id="lb-' . $name . '" role="dialog" aria-modal="true" aria-label="' . htmlspecialchars($cap) . '">';
    $html .= '<a class="gal-lb__backdrop" href="#' . $backId . '" aria-label="Close enlarged photo"></a>';
    $html .= '<figure class="gal-lb__figure">';
    $html .= gal_img($name, '(max-width: 900px) 96vw, 1100px', 'gal-lb__img');
    $html .= '<figcaption>' . htmlspecialchars($cap) . ' <a class="gal-lb__close" href="#' . $backId . '">Close ' . icon('x', 16) . '</a></figcaption>';
    $html .= '</figure>';
    $html .= '</div>';
    return $html;
}

/* every photo placed in a section + which section it closes back to */
$lightboxMap = [];
foreach (array_merge($roofSteps, $roofFinished) as $n) { $lightboxMap[$n] = 'roof-replacement'; }
foreach (array_merge($metalPhotos, ['palapa-before', 'palapa-metal']) as $n) { $lightboxMap[$n] = 'metal-roofing'; }
foreach ($repairPhotos as $n) { $lightboxMap[$n] = 'roof-repair'; }
foreach ($sidingPhotos as $n) { $lightboxMap[$n] = 'siding-gutters'; }
foreach ($patioPhotos as $n) { $lightboxMap[$n] = 'patios-decks'; }
foreach ($fencePhotos as $n) { $lightboxMap[$n] = 'fences'; }

/* ---- Schema: WebPage + ImageGallery (12 key photos) + BreadcrumbList ---- */
$keyPhotos = ['hero-roof-home-v2', 'roof-overhead', 'roof-finished-brick', 'crew-underlayment', 'metal-roof-barn', 'palapa-metal', 'roof-repair-v2', 'storm-damage-repair-v2', 'siding-dormer', 'patio-cover-fans', 'pergola-cedar', 'fence-gate-cedar'];
$imageObjects = [];
foreach ($keyPhotos as $n) {
    [$w, $h, $variants, $alt, $cap] = $photos[$n];
    $imageObjects[] = [
        '@type'       => 'ImageObject',
        'contentUrl'  => $siteUrl . gal_src($n, $variants),
        'url'         => $siteUrl . gal_src($n, $variants),
        'caption'     => $cap,
        'description' => $alt,
        'width'       => $w,
        'height'      => $h,
        'creditText'  => $siteName,
    ];
}
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type'           => 'ImageGallery',
            '@id'             => $canonicalUrl . '#gallery',
            'url'             => $canonicalUrl,
            'name'            => 'Project Gallery — ' . $siteName,
            'description'     => $pageDescription,
            'isPartOf'        => ['@id' => $siteUrl . '/#website'],
            'about'           => ['@id' => $siteUrl . '#organization'],
            'associatedMedia' => $imageObjects,
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',            'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About',           'item' => $siteUrl . '/about/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Project Gallery', 'item' => $canonicalUrl],
            ],
        ],
    ],
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   /gallery/ — page-specific styles (tokens only)
   ============================================================ */

/* ---------- Reveal directions (page-level, none above the fold) ---------- */
[data-animate="fade-left"] {
    transform: translateX(-40px);
}
[data-animate="fade-right"] {
    transform: translateX(40px);
}
[data-animate="zoom"] {
    transform: scale(0.94);
}
[data-animate="fade-down"] {
    transform: translateY(-30px);
}
[data-animate="fade-left"].animated,
[data-animate="fade-right"].animated,
[data-animate="fade-down"].animated {
    transform: translate(0, 0);
}
[data-animate="zoom"].animated {
    transform: scale(1);
}

/* ---------- Hero: photo + gradient overlay + noise ---------- */
.gal-hero {
    position: relative;
    overflow: hidden;
    isolation: isolate;
    padding-bottom: var(--space-16);
    text-align: left;
}
.gal-hero__bg {
    position: absolute;
    inset: 0;
    z-index: -3;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 35%;
}
.gal-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -2;
    background: linear-gradient(100deg,
        color-mix(in srgb, var(--color-secondary) 94%, transparent) 0%,
        color-mix(in srgb, var(--color-secondary) 82%, transparent) 50%,
        color-mix(in srgb, var(--color-secondary) 48%, transparent) 100%);
}
.gal-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.28;
    pointer-events: none;
    background-image:
        repeating-radial-gradient(circle at 0 0, transparent 0, rgba(var(--color-secondary-rgb), 0.85) 2px, transparent 3px),
        repeating-linear-gradient(-45deg, rgba(var(--color-accent-rgb), 0.06) 0, rgba(var(--color-accent-rgb), 0.06) 1px, transparent 1px, transparent 7px);
    mix-blend-mode: soft-light;
}
.gal-hero .hero__content {
    max-width: 820px;
    margin: 0;
    text-align: left;
}
.gal-hero h1 {
    text-wrap: balance;
    font-size: clamp(var(--font-size-4xl), 5vw, var(--font-size-6xl));
    line-height: 1.05;
}
.gal-hero__intro {
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    font-size: var(--font-size-lg);
    line-height: 1.7;
    max-width: 60ch;
    margin: var(--space-5) 0 0;
    text-wrap: pretty;
}
.gal-hero__intro strong {
    color: var(--color-white);
    font-weight: 600;
}
.gal-hero__actions {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    margin-top: var(--space-8);
}
.gal-hero__actions .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
}

/* Category jump pills */
.gal-jump {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    margin-top: var(--space-10);
    padding-top: var(--space-6);
    border-top: 1px solid color-mix(in srgb, var(--color-white) 15%, transparent);
}
.gal-jump a {
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-white);
    background: color-mix(in srgb, var(--color-white) 10%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 22%, transparent);
    border-radius: var(--radius-full);
    padding: var(--space-2) var(--space-4);
    transition: background var(--transition-fast), border-color var(--transition-fast), transform var(--transition-fast);
}
.gal-jump a:hover,
.gal-jump a:focus-visible {
    background: var(--color-primary);
    border-color: var(--color-primary);
    transform: translateY(-1px);
}
.gal-jump a:focus-visible {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
}

/* ---------- Divider 1: stepped "shingle" edge ---------- */
.gal-divider-shingle {
    height: var(--space-10);
    background:
        linear-gradient(135deg, var(--color-white) 50%, transparent 50%) 0 0 / var(--space-10) var(--space-10) repeat-x,
        linear-gradient(-135deg, var(--color-white) 50%, transparent 50%) 0 0 / var(--space-10) var(--space-10) repeat-x;
    background-color: var(--color-secondary);
    margin-top: calc(-1 * var(--space-10));
    position: relative;
    z-index: 1;
}

/* ---------- Shared category section scaffolding ---------- */
.gal-section {
    padding: var(--space-16) 0;
    scroll-margin-top: var(--nav-height);
}
.gal-section--light {
    background: var(--color-light);
}
.gal-section--dark {
    background: linear-gradient(180deg, var(--color-secondary), var(--color-dark-alt));
    color: var(--color-white);
}
.gal-section--dark h2,
.gal-section--dark h3 {
    color: var(--color-white);
}
.gal-section--dark .gal-head p,
.gal-section--dark figcaption {
    color: color-mix(in srgb, var(--color-white) 78%, transparent);
}
.gal-head {
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: end;
    gap: var(--space-8);
    margin-bottom: var(--space-10);
}
.gal-head__num {
    font-family: var(--font-heading);
    font-size: var(--font-size-5xl);
    font-weight: 800;
    line-height: 0.9;
    color: rgba(var(--color-primary-rgb), 0.25);
}
.gal-section--dark .gal-head__num {
    color: rgba(var(--color-accent-rgb), 0.4);
}
.gal-head h2 {
    text-wrap: balance;
    font-size: clamp(var(--font-size-3xl), 3.6vw, var(--font-size-5xl));
    line-height: 1.1;
    margin-bottom: var(--space-2);
}
.gal-head p {
    color: var(--color-gray-dark);
    max-width: 60ch;
    line-height: 1.7;
    margin: 0;
}
.gal-head__count {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-primary);
    white-space: nowrap;
}
.gal-section--dark .gal-head__count {
    color: var(--color-accent);
}

/* Figure */
.gal-item {
    margin: 0;
    break-inside: avoid;
}
.gal-item__link {
    position: relative;
    display: block;
    overflow: hidden;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    background: var(--color-gray-light);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.gal-item__link img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}
.gal-item__link:hover,
.gal-item__link:focus-visible {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}
.gal-item__link:hover img {
    transform: scale(1.04);
}
.gal-item__link:focus-visible {
    outline: 2px solid var(--color-accent);
    outline-offset: 3px;
}
.gal-item__link::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 60%, rgba(var(--color-secondary-rgb), 0.55));
    opacity: 0;
    transition: opacity var(--transition-base);
}
.gal-item__link:hover::after {
    opacity: 1;
}
.gal-item__zoom {
    position: absolute;
    right: var(--space-3);
    bottom: var(--space-3);
    z-index: 1;
    display: grid;
    place-items: center;
    width: 36px;
    height: 36px;
    border-radius: var(--radius-full);
    background: var(--color-primary);
    color: var(--color-white);
    opacity: 0;
    transform: translateY(6px);
    transition: opacity var(--transition-base), transform var(--transition-base);
}
.gal-item__link:hover .gal-item__zoom,
.gal-item__link:focus-visible .gal-item__zoom {
    opacity: 1;
    transform: translateY(0);
}
.gal-item figcaption {
    margin-top: var(--space-3);
    font-size: var(--font-size-sm);
    color: var(--color-gray-dark);
    line-height: 1.5;
    padding-left: var(--space-3);
    border-left: 2px solid var(--color-accent);
}

/* Aspect frames */
.gal-item--portrait .gal-item__link {
    aspect-ratio: 3 / 4;
}
.gal-item--square .gal-item__link {
    aspect-ratio: 1;
}
.gal-item--wide .gal-item__link {
    aspect-ratio: 16 / 10;
}
.gal-item--tall .gal-item__link {
    aspect-ratio: 9 / 14;
}

/* ---------- Signature: roof replacement process strip ---------- */
.gal-steps {
    position: relative;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: var(--space-5);
    margin-bottom: var(--space-12);
    padding-top: var(--space-8);
}
.gal-steps::before {
    content: "";
    position: absolute;
    top: calc(var(--space-8) + 18px);
    left: 6%;
    right: 6%;
    height: 2px;
    background: repeating-linear-gradient(90deg, var(--color-accent) 0, var(--color-accent) 10px, transparent 10px, transparent 18px);
    z-index: 0;
}
.gal-step {
    position: relative;
    display: grid;
    gap: var(--space-3);
}
.gal-step__num {
    position: relative;
    z-index: 1;
    justify-self: start;
    display: grid;
    place-items: center;
    width: 38px;
    height: 38px;
    border-radius: var(--radius-full);
    background: var(--color-secondary);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: var(--font-size-sm);
    border: 4px solid var(--color-light);
}
.gal-step:nth-child(odd) .gal-step__num {
    background: var(--color-primary);
    color: var(--color-white);
}
.gal-step .gal-item__link {
    aspect-ratio: 3 / 4;
}
.gal-step__title {
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: var(--font-size-base);
    color: var(--color-secondary);
}
.gal-step:nth-child(even) {
    transform: translateY(var(--space-6));
}
.gal-step:nth-child(even)[data-animate] {
    transform: translateY(calc(var(--space-6) + 30px));
}
.gal-step:nth-child(even)[data-animate].animated {
    transform: translateY(var(--space-6));
}
.gal-steps__label {
    grid-column: 1 / -1;
    display: flex;
    align-items: center;
    gap: var(--space-4);
    margin-bottom: calc(-1 * var(--space-4));
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--color-primary);
}
.gal-steps__label::after {
    content: "";
    flex: 1;
    height: 1px;
    background: var(--color-gray-light);
}

/* Finished-roof masonry */
.gal-masonry {
    column-count: 4;
    column-gap: var(--space-5);
}
.gal-masonry .gal-item {
    display: inline-block;
    width: 100%;
    margin: 0 0 var(--space-5);
}
.gal-masonry .gal-item:nth-child(3n+1) .gal-item__link {
    aspect-ratio: 3 / 4;
}
.gal-masonry .gal-item:nth-child(3n+2) .gal-item__link {
    aspect-ratio: 4 / 5;
}
.gal-masonry .gal-item:nth-child(3n) .gal-item__link {
    aspect-ratio: 1;
}
.gal-masonry .gal-item--wide .gal-item__link {
    aspect-ratio: 16 / 10;
}

/* Section footer link */
.gal-more {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-4);
    margin-top: var(--space-10);
    padding-top: var(--space-6);
    border-top: 1px dashed var(--color-gray-light);
}
.gal-section--dark .gal-more {
    border-top-color: color-mix(in srgb, var(--color-white) 18%, transparent);
}
.gal-more p {
    margin: 0;
    color: var(--color-gray-dark);
    max-width: 60ch;
}
.gal-section--dark .gal-more p {
    color: color-mix(in srgb, var(--color-white) 78%, transparent);
}
.gal-more__links {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3);
}
.gal-more .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
}

/* ---------- Metal roofing: before/after pair + side grid ---------- */
.gal-metal {
    display: grid;
    grid-template-columns: 1.3fr 1fr;
    gap: var(--space-8);
    align-items: start;
}
.gal-ba {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4);
    padding: var(--space-5);
    border-radius: var(--radius-xl);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
    position: relative;
}
.gal-ba::before {
    content: "Thatch to metal";
    position: absolute;
    top: calc(-1 * var(--space-3));
    left: var(--space-5);
    background: var(--color-primary);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-sm);
}
.gal-ba .gal-item__link {
    aspect-ratio: 4 / 5;
}
.gal-ba .gal-item figcaption {
    border-left-color: var(--color-accent);
}
.gal-ba .gal-item:first-child figcaption {
    border-left-color: var(--color-gray);
}
.gal-metal__side {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4);
}
.gal-metal__side .gal-item__link {
    aspect-ratio: 3 / 4;
}

/* ---------- Repair & storm: 5-up with a featured tall first ---------- */
.gal-repair {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: auto;
    gap: var(--space-5);
}
.gal-repair .gal-item:first-child {
    grid-row: span 2;
}
.gal-repair .gal-item:first-child .gal-item__link {
    aspect-ratio: 3 / 4;
    height: 100%;
}
.gal-repair .gal-item:not(:first-child) .gal-item__link {
    aspect-ratio: 1;
}

/* ---------- Gutters, siding & paint: 4 across ---------- */
.gal-four {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-5);
}
.gal-four .gal-item__link {
    aspect-ratio: 3 / 4;
}
.gal-four .gal-item:nth-child(even) {
    transform: translateY(var(--space-8));
}
.gal-four .gal-item:nth-child(even)[data-animate] {
    transform: translateY(calc(var(--space-8) + 30px));
}
.gal-four .gal-item:nth-child(even)[data-animate].animated {
    transform: translateY(var(--space-8));
}
.gal-four--spaced {
    padding-bottom: var(--space-8);
}

/* ---------- Patios, pergolas & decks: masonry 3 col ---------- */
.gal-masonry--3 {
    column-count: 3;
}

/* ---------- Fences & gates: 2-up with copy ---------- */
.gal-fence {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: var(--space-8);
    align-items: center;
}
.gal-fence .gal-item__link {
    aspect-ratio: 3 / 4;
}
.gal-fence__copy {
    padding: var(--space-8);
    border-radius: var(--radius-xl);
    background: var(--color-white);
    border: 1px solid var(--color-gray-light);
    box-shadow: var(--shadow-card);
}
.gal-fence__copy h3 {
    text-wrap: balance;
    font-size: var(--font-size-2xl);
    margin-bottom: var(--space-3);
}
.gal-fence__copy p {
    color: var(--color-gray-dark);
    line-height: 1.7;
    margin-bottom: var(--space-5);
}
.gal-fence__copy .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
}

/* ---------- Divider 2: curved notch ---------- */
.gal-divider-curve {
    position: relative;
    height: var(--space-16);
    background: var(--color-light);
    overflow: hidden;
}
.gal-divider-curve::after {
    content: "";
    position: absolute;
    left: -10%;
    right: -10%;
    bottom: 0;
    height: 200%;
    border-radius: 50% 50% 0 0 / 100% 100% 0 0;
    background: var(--color-white);
}

/* ---------- Divider 3: dotted rule ---------- */
.gal-divider-dots {
    height: 1px;
    background-image: radial-gradient(circle, var(--color-accent) 1px, transparent 1.5px);
    background-size: 12px 1px;
    background-repeat: repeat-x;
    max-width: 1200px;
    margin: 0 auto;
}

/* ---------- CTA band ---------- */
.gal-cta {
    padding: var(--space-16) 0;
    background:
        radial-gradient(ellipse at 80% 20%, rgba(var(--color-primary-rgb), 0.12), transparent 50%),
        var(--color-white);
}
.gal-cta__card {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: var(--space-8);
    align-items: center;
    padding: var(--space-10);
    border-radius: var(--radius-xl);
    background: var(--color-secondary);
    color: var(--color-white);
    box-shadow: var(--shadow-xl);
    position: relative;
    overflow: hidden;
}
.gal-cta__card::after {
    content: "";
    position: absolute;
    left: -8%;
    bottom: -50%;
    width: 45%;
    aspect-ratio: 1;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, rgba(var(--color-accent-rgb), 0.28), transparent 65%);
    pointer-events: none;
}
.gal-cta__card h2 {
    color: var(--color-white);
    text-wrap: balance;
    font-size: clamp(var(--font-size-2xl), 3vw, var(--font-size-4xl));
    margin-bottom: var(--space-3);
}
.gal-cta__card p {
    color: color-mix(in srgb, var(--color-white) 80%, transparent);
    max-width: 58ch;
    line-height: 1.7;
    margin: 0;
}
.gal-cta__actions {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    position: relative;
    z-index: 1;
}
.gal-cta__actions .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    white-space: nowrap;
}
.gal-cta__actions .btn-outline-white:hover {
    background: var(--color-white);
    color: var(--color-secondary);
}

/* ---------- Final CTA banner ---------- */
.gal-final h2 {
    text-wrap: balance;
}
.gal-final .cta-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    justify-content: center;
}
.gal-final .cta-buttons .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
}

/* ---------- CSS-only lightbox (:target) ---------- */
.gal-lb {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: var(--space-6);
}
.gal-lb:target {
    display: flex;
}
.gal-lb__backdrop {
    position: absolute;
    inset: 0;
    background: color-mix(in srgb, var(--color-secondary) 92%, transparent);
    cursor: zoom-out;
}
.gal-lb__figure {
    position: relative;
    z-index: 1;
    margin: 0;
    max-width: 1100px;
    max-height: 100%;
    display: grid;
    gap: var(--space-3);
}
.gal-lb__img {
    display: block;
    max-width: 100%;
    max-height: 80vh;
    width: auto;
    height: auto;
    margin: 0 auto;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
}
.gal-lb__figure figcaption {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: var(--space-4);
    color: var(--color-white);
    font-size: var(--font-size-sm);
    text-align: center;
}
.gal-lb__close {
    display: inline-flex;
    align-items: center;
    gap: var(--space-1);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-weight: 600;
    border: 1px solid var(--color-accent);
    border-radius: var(--radius-full);
    padding: var(--space-1) var(--space-3);
}
.gal-lb__close:hover,
.gal-lb__close:focus-visible {
    background: var(--color-accent);
    color: var(--color-secondary);
}

/* ---------- Responsive ---------- */
@media (max-width: 1100px) {
    .gal-steps {
        grid-template-columns: repeat(3, 1fr);
    }
    .gal-steps::before {
        display: none;
    }
    .gal-step:nth-child(even),
    .gal-step:nth-child(even)[data-animate],
    .gal-step:nth-child(even)[data-animate].animated {
        transform: none;
    }
    .gal-masonry {
        column-count: 3;
    }
    .gal-repair,
    .gal-four {
        grid-template-columns: repeat(3, 1fr);
    }
    .gal-repair .gal-item:first-child {
        grid-row: span 1;
    }
    .gal-repair .gal-item:first-child .gal-item__link {
        aspect-ratio: 1;
    }
}
@media (max-width: 900px) {
    .gal-head {
        grid-template-columns: auto 1fr;
    }
    .gal-head__count {
        grid-column: 2;
    }
    .gal-metal {
        grid-template-columns: 1fr;
    }
    .gal-fence {
        grid-template-columns: 1fr 1fr;
    }
    .gal-fence__copy {
        grid-column: 1 / -1;
    }
    .gal-cta__card {
        grid-template-columns: 1fr;
        padding: var(--space-8);
    }
    .gal-cta__actions {
        flex-direction: row;
        flex-wrap: wrap;
    }
    .gal-masonry,
    .gal-masonry--3 {
        column-count: 2;
    }
}
@media (max-width: 640px) {
    .gal-steps {
        grid-template-columns: repeat(2, 1fr);
    }
    .gal-repair,
    .gal-four {
        grid-template-columns: repeat(2, 1fr);
    }
    .gal-four .gal-item:nth-child(even),
    .gal-four .gal-item:nth-child(even)[data-animate],
    .gal-four .gal-item:nth-child(even)[data-animate].animated {
        transform: none;
    }
    .gal-four--spaced {
        padding-bottom: 0;
    }
    .gal-fence {
        grid-template-columns: 1fr;
    }
    .gal-metal__side {
        grid-template-columns: 1fr 1fr;
    }
    .gal-head__num {
        font-size: var(--font-size-4xl);
    }
    .gal-hero__actions .btn {
        width: 100%;
        justify-content: center;
    }
}
@media (max-width: 480px) {
    .gal-masonry,
    .gal-masonry--3 {
        column-count: 1;
    }
    .gal-ba {
        grid-template-columns: 1fr;
    }
}
@media (prefers-reduced-motion: reduce) {
    .gal-item__link,
    .gal-item__link img,
    .gal-item__zoom,
    .gal-jump a {
        transition: none;
    }
    .gal-item__link:hover,
    .gal-item__link:hover img,
    .gal-jump a:hover {
        transform: none;
    }
}
</style>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li><a href="/about/">About</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">Project Gallery</li>
        </ol>
    </div>
</nav>

<!-- Hero -->
<section class="hero hero--interior gal-hero" id="gallery">
    <?php echo gal_img('hero-roof-home-v2', '100vw', 'gal-hero__bg', true); ?>
    <div class="container">
        <div class="hero__content">
            <span class="eyebrow-label">Project Gallery</span>
            <h1>Our Work, Photographed <span class="text-accent">on the Job</span></h1>
            <p class="gal-hero__intro">Every photo on this page was taken on a <?php echo htmlspecialchars($shortName); ?> job site — <strong>no stock images</strong>. Tear-offs, decking, underlayment, finished shingle and metal roofs, storm repairs, gutters, siding, patio covers, pergolas, decks and fences, built by a <strong>family-owned, father-and-son team</strong> that has served the Greater Houston area <strong>since <?php echo $yearEstablished; ?></strong>.</p>
            <div class="gal-hero__actions">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white">Get a Free Estimate</a>
            </div>
        </div>
        <nav class="gal-jump" aria-label="Jump to a gallery section">
            <?php foreach ($categories as $c): ?>
            <a href="#<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['label']); ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</section>
<div class="gal-divider-shingle" aria-hidden="true"></div>

<!-- 01 Roof Replacement (signature: step strip + finished masonry) -->
<section class="gal-section gal-section--light" id="roof-replacement">
    <div class="container">
        <div class="gal-head">
            <span class="gal-head__num" aria-hidden="true">01</span>
            <div data-animate="fade-left">
                <span class="eyebrow-label">Roof Replacement</span>
                <h2>From Tear-Off to <span class="text-accent">Finished Roof</span></h2>
                <p>The same sequence on every replacement: strip the old roof, replace rotted decking, lay synthetic underlayment, shingle, then clean up. The photos below show each stage as it happened.</p>
            </div>
            <span class="gal-head__count"><?php echo count($roofSteps) + count($roofFinished); ?> photos</span>
        </div>

        <div class="gal-steps">
            <span class="gal-steps__label">The process, in order</span>
            <?php
            $stepTitles = ['Tear-off', 'Decking check', 'Underlayment', 'Steep-pitch work', 'Shingles go on'];
            $stepDirs   = ['fade-up', 'fade-down', 'fade-up', 'fade-down', 'fade-up'];
            foreach ($roofSteps as $i => $name): ?>
            <div class="gal-step" data-animate="<?php echo $stepDirs[$i]; ?>" style="transition-delay: <?php echo $i * 0.08; ?>s;">
                <span class="gal-step__num" aria-hidden="true"><?php echo $i + 1; ?></span>
                <span class="gal-step__title"><?php echo $stepTitles[$i]; ?></span>
                <?php echo gal_figure($name, '(max-width: 640px) 50vw, (max-width: 1100px) 33vw, 20vw', $stepDirs[$i]); ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="gal-masonry">
            <?php
            $dirs = ['zoom', 'fade-up', 'fade-left', 'fade-right'];
            foreach ($roofFinished as $i => $name):
                echo str_replace('class="gal-item"', 'class="gal-item' . ($name === 'hero-roof-home-v2' ? ' gal-item--wide' : '') . '"', gal_figure($name, '(max-width: 480px) 100vw, (max-width: 900px) 50vw, (max-width: 1100px) 33vw, 25vw', $dirs[$i % 4]));
            endforeach; ?>
        </div>

        <div class="gal-more">
            <p>Architectural shingle and metal roof replacements across the Greater Houston area, with the owner on the roof and a magnet sweep for nails before the crew leaves.</p>
            <div class="gal-more__links">
                <a href="/services/roof-replacement/" class="btn btn-primary">Roof Replacement <?php echo icon('external-link', 16); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- 02 Metal Roofing (dark) -->
<section class="gal-section gal-section--dark" id="metal-roofing">
    <div class="container">
        <div class="gal-head">
            <span class="gal-head__num" aria-hidden="true">02</span>
            <div data-animate="fade-right">
                <span class="eyebrow-label">Metal Roofing</span>
                <h2>Barns, Shops and a <span class="text-accent">Poolside Palapa</span></h2>
                <p>Standing-seam and corrugated metal for outbuildings and homes — plus a thatch-to-metal palapa conversion, shown before and after.</p>
            </div>
            <span class="gal-head__count">4 photos</span>
        </div>

        <div class="gal-metal">
            <div class="gal-ba" data-animate="zoom">
                <?php echo str_replace('class="gal-item"', 'class="gal-item gal-item--square"', gal_figure('palapa-before', '(max-width: 480px) 100vw, (max-width: 900px) 45vw, 30vw', 'fade-left')); ?>
                <?php echo gal_figure('palapa-metal', '(max-width: 480px) 100vw, (max-width: 900px) 45vw, 30vw', 'fade-right'); ?>
            </div>
            <div class="gal-metal__side">
                <?php echo gal_figure('metal-roof-barn', '(max-width: 900px) 45vw, 20vw', 'fade-up'); ?>
                <?php echo gal_figure('roof-metal-shop', '(max-width: 900px) 45vw, 20vw', 'fade-up', 'metal-roofing', 0.1); ?>
            </div>
        </div>

        <div class="gal-more">
            <p>Metal roofs are quoted and installed under the same roof replacement service — ask for a metal option on your free written estimate.</p>
            <div class="gal-more__links">
                <a href="/services/roof-replacement/" class="btn btn-primary">Metal &amp; Shingle Replacement <?php echo icon('external-link', 16); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- 03 Repair & Storm Damage -->
<section class="gal-section" id="roof-repair">
    <div class="container">
        <div class="gal-head">
            <span class="gal-head__num" aria-hidden="true">03</span>
            <div data-animate="fade-left">
                <span class="eyebrow-label">Roof Repair &amp; Storm Damage</span>
                <h2>What We Find, <span class="text-accent">and What We Fix</span></h2>
                <p>Inspection photos go to the homeowner before work starts. Flashing, rotted decking, wind-lifted shingles, tarps after a storm, and the vents that keep an attic breathing.</p>
            </div>
            <span class="gal-head__count"><?php echo count($repairPhotos); ?> photos</span>
        </div>

        <div class="gal-repair">
            <?php
            $dirs = ['zoom', 'fade-up', 'fade-down', 'fade-up', 'fade-down'];
            foreach ($repairPhotos as $i => $name):
                echo gal_figure($name, '(max-width: 640px) 50vw, (max-width: 1100px) 33vw, 25vw', $dirs[$i], 'roof-repair', $i * 0.06);
            endforeach; ?>
        </div>

        <div class="gal-more">
            <p>Leak, flashing and decking repairs; hail, wind and hurricane damage with help through the insurance claim process; balanced attic ventilation.</p>
            <div class="gal-more__links">
                <a href="/services/roof-repair/" class="btn btn-primary">Roof Repair <?php echo icon('external-link', 16); ?></a>
                <a href="/services/storm-damage-repair/" class="btn btn-secondary">Storm Damage</a>
                <a href="/services/attic-venting/" class="btn btn-secondary">Attic Venting</a>
            </div>
        </div>
    </div>
</section>
<div class="gal-divider-curve" aria-hidden="true" style="background: var(--color-white);"></div>

<!-- 04 Gutters, Siding & Paint -->
<section class="gal-section gal-section--light" id="siding-gutters">
    <div class="container">
        <div class="gal-head">
            <span class="gal-head__num" aria-hidden="true">04</span>
            <div data-animate="fade-right">
                <span class="eyebrow-label">Gutters, Siding &amp; Paint</span>
                <h2>The Exterior Work <span class="text-accent">Around the Roof</span></h2>
                <p>Gutters and downspouts, dormer and wall siding, fascia and soffit, and exterior paint — usually finished in the same visit as the roof.</p>
            </div>
            <span class="gal-head__count"><?php echo count($sidingPhotos); ?> photos</span>
        </div>

        <div class="gal-four gal-four--spaced">
            <?php
            $dirs = ['fade-up', 'fade-down', 'fade-up', 'fade-down'];
            foreach ($sidingPhotos as $i => $name):
                echo gal_figure($name, '(max-width: 640px) 50vw, (max-width: 1100px) 33vw, 25vw', $dirs[$i], 'siding-gutters', $i * 0.07);
            endforeach; ?>
        </div>

        <div class="gal-more">
            <p>Hardie and vinyl siding, fascia and soffit, wood-rot repair, window re-sealing and exterior paint, plus new gutters that move water away from the foundation.</p>
            <div class="gal-more__links">
                <a href="/services/siding-fascia-soffit/" class="btn btn-primary">Siding, Fascia &amp; Soffit <?php echo icon('external-link', 16); ?></a>
                <a href="/services/gutter-installation/" class="btn btn-secondary">Gutters</a>
            </div>
        </div>
    </div>
</section>
<div class="gal-divider-dots" aria-hidden="true"></div>

<!-- 05 Patio Covers, Pergolas & Decks -->
<section class="gal-section" id="patios-decks">
    <div class="container">
        <div class="gal-head">
            <span class="gal-head__num" aria-hidden="true">05</span>
            <div data-animate="fade-left">
                <span class="eyebrow-label">Patio Covers, Pergolas &amp; Decks</span>
                <h2>Shade, Screens and <span class="text-accent">Backyard Decks</span></h2>
                <p>Covered and enclosed patios with beadboard ceilings and fans, cedar pergolas, and pressure-treated decks — from framing to railing.</p>
            </div>
            <span class="gal-head__count"><?php echo count($patioPhotos); ?> photos</span>
        </div>

        <div class="gal-masonry gal-masonry--3">
            <?php
            $dirs = ['fade-up', 'zoom', 'fade-right', 'fade-left'];
            foreach ($patioPhotos as $i => $name):
                echo gal_figure($name, '(max-width: 480px) 100vw, (max-width: 900px) 50vw, 33vw', $dirs[$i % 4], 'patios-decks');
            endforeach; ?>
        </div>

        <div class="gal-more">
            <p>Patio covers, screened and enclosed patios, pergolas and wood decks, built to match the trim and roofline of the house they attach to.</p>
            <div class="gal-more__links">
                <a href="/services/patio-covers-decks/" class="btn btn-primary">Patio Covers, Pergolas &amp; Decks <?php echo icon('external-link', 16); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- 06 Fences & Gates -->
<section class="gal-section gal-section--light" id="fences">
    <div class="container">
        <div class="gal-head">
            <span class="gal-head__num" aria-hidden="true">06</span>
            <div data-animate="fade-right">
                <span class="eyebrow-label">Fences &amp; Gates</span>
                <h2>Privacy Fences and <span class="text-accent">Custom Gates</span></h2>
                <p>Cedar and pine privacy fencing, double gates, and ranch rail — new builds, sections replaced, and gates rehung.</p>
            </div>
            <span class="gal-head__count"><?php echo count($fencePhotos); ?> photos</span>
        </div>

        <div class="gal-fence">
            <?php echo gal_figure('fences-gates', '(max-width: 640px) 100vw, (max-width: 900px) 50vw, 33vw', 'fade-left', 'fences'); ?>
            <?php echo gal_figure('fence-gate-cedar', '(max-width: 640px) 100vw, (max-width: 900px) 50vw, 33vw', 'zoom', 'fences', 0.08); ?>
            <div class="gal-fence__copy" data-animate="fade-right">
                <span class="eyebrow-label">Same Crew, Same Cleanup</span>
                <h3>Fences get the same treatment as roofs</h3>
                <p>Homeowners who had us replace a roof often call back for a fence or gate. The crew shows up on time, keeps you posted as the build progresses, and walks the work with you before they leave.</p>
                <a href="/services/fences-gates/" class="btn btn-primary">Fences &amp; Gates <?php echo icon('external-link', 16); ?></a>
            </div>
        </div>
    </div>
</section>
<div class="gal-divider-curve" aria-hidden="true"></div>

<!-- Have a project like these? -->
<section class="gal-cta">
    <div class="container">
        <div class="gal-cta__card" data-animate="fade-up">
            <div>
                <span class="eyebrow-label">Have a Project Like These?</span>
                <h2>Let's Look at Yours — Free Inspection, Free Written Estimate</h2>
                <p><?php echo htmlspecialchars($ownerName); ?> comes out in person, photographs what he finds, and puts the scope in writing. Roofing, siding, gutters, patio covers, decks and fences — one call covers all of it.</p>
            </div>
            <div class="gal-cta__actions">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
                <a href="/testimonials/" class="btn btn-outline-white"><?php echo icon('star', 16); ?> Read the Reviews</a>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="section cta-banner gal-final" data-animate="fade-up">
    <div class="container text-center">
        <span class="eyebrow-label">Get Started</span>
        <h2>Ready When You Are</h2>
        <p style="font-size: var(--font-size-lg); margin-bottom: var(--space-lg);">Voted a Nextdoor Neighborhood Favorite in 2022, 2023 and 2024. Serving Humble, Kingwood, Atascocita, Spring, Baytown, The Woodlands and <?php echo count($serviceAreaCities); ?> communities across the Greater Houston area.</p>
        <div class="cta-buttons">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            <a href="/contact/" class="btn btn-secondary">Request an Estimate Online</a>
        </div>
    </div>
</section>

<!-- Lightboxes (CSS-only, :target) -->
<?php foreach ($lightboxMap as $name => $backId) { echo gal_lightbox($name, $backId) . "\n"; } ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
