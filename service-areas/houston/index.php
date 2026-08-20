<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Houston';
$pageTitle = 'Roof Repair & Replacement in Houston, TX | ' . $shortName;
$pageDescription = 'Roof repair, replacement, storm damage, siding and fences inside the Houston city limits from a family-owned team since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/houston/';
$ogImage = 'roof-two-story-960.webp';

/* Responsive photo helper — emits only the webp variants (480, 960, 1600) that exist on disk */
if (!function_exists('areaPhoto')) {
    function areaPhoto($name, $alt, $w, $h, $sizes, $eager = false) {
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';
        $set = [];
        foreach ([480, 960, 1600] as $px) {
            if (file_exists($dir . $name . '-' . $px . '.webp')) {
                $set[] = '/assets/images/' . $name . '-' . $px . '.webp ' . $px . 'w';
            }
        }
        $load = $eager ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"';
        return '<img src="/assets/images/' . $name . '.jpg"' . ($set ? ' srcset="' . implode(', ', $set) . '"' : '')
            . ' sizes="' . htmlspecialchars($sizes) . '" alt="' . htmlspecialchars($alt) . '"'
            . ' width="' . (int) $w . '" height="' . (int) $h . '" ' . $load . '>';
    }
}

/* Real reviews from this community — names + cities exactly as the client published them */
$cityReviews = array_slice(array_values(array_filter($testimonials, fn($t) => $t['city'] === $areaName . ', TX')), 0, 3);

/* Regional weather facts — general, public record */
$storms = [
    ['when' => 'Sept. 13, 2008', 'name' => 'Hurricane Ike', 'what' => 'Category 2 landfall at Galveston; hurricane-force winds reached well into the metro. The storm that taught a generation of homeowners what a lifted ridge cap looks like.'],
    ['when' => 'Aug. 2017', 'name' => 'Hurricane Harvey', 'what' => 'Days of record rainfall. Less a wind event than a water one — wind-driven rain found every failed pipe boot and open valley.'],
    ['when' => 'May 16, 2024', 'name' => 'The derecho', 'what' => 'Straight-line winds estimated near 100 mph downtown by post-storm damage surveys. Shingles, fences and patio covers went in one afternoon.'],
    ['when' => 'July 8, 2024', 'name' => 'Hurricane Beryl', 'what' => 'Category 1 landfall at Matagorda Bay, then north across the metro as a weakening storm. Tree-on-roof damage and multi-day power outages across the city.'],
];

$areaFaqs = [
    [
        'q' => 'Do I need a City of Houston permit to replace my roof?',
        'a' => 'The City of Houston issues a residential roofing permit for re-roofs and overlays inside the city limits, and whether your project needs one depends on its scope and on whether your address is actually inside the city — a lot of "Houston" mail goes to unincorporated Harris County. Triple G Roofing & Construction will tell you if your project needs a permit before work starts, and handle it if it does.',
    ],
    [
        'q' => 'Can you replace the roof on an older inner-loop home with a low-slope addition?',
        'a' => 'Yes. Bungalows from the 1920s and ranch homes from the 1940s–60s often carry a near-flat section over a back addition, porch or garage that standard shingles can\'t handle. We spec a low-slope membrane or roll product there and architectural shingles on the steeper slopes, with the transition flashed so the seam isn\'t the next leak. The inspection and written estimate are free.',
    ],
    [
        'q' => 'Will you help with my insurance claim after a storm?',
        'a' => 'We help you through the whole process. With more than 50 years of roofing, claims-handling and adjuster experience, we document the damage, meet the adjuster at your home and explain your policy in plain English. Whether a claim is approved, and for how much, is the carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix ho-  (Houston proper)
   Tokens only. Dark typographic hero with three-frame
   photo strip, "where we work" asymmetric area grid,
   four-storm horizontal timeline (signature), permits +
   deed-restriction split, compact 10-service grid, claims,
   reviews, FAQ, nearby, CTA band with phone rail.
   ========================================================== */

/* ---------- Reveal directions ---------- */
[data-animate="left"]  { transform: translateX(-32px); }
[data-animate="right"] { transform: translateX(32px); }
[data-animate="down"]  { transform: translateY(-28px); }
[data-animate="scale"] { transform: scale(0.94); }
[data-animate].animated { transform: none; }

/* ---------- Hero ---------- */
.ho-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background:
        linear-gradient(115deg, var(--color-dark) 0%, var(--color-dark-alt) 55%, var(--color-primary-dark) 140%);
    padding: calc(var(--nav-height) + var(--space-12)) 0 0;
    color: var(--color-white);
}

.ho-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    background-image:
        linear-gradient(color-mix(in srgb, var(--color-white) 5%, transparent) 1px, transparent 1px),
        linear-gradient(90deg, color-mix(in srgb, var(--color-white) 5%, transparent) 1px, transparent 1px);
    background-size: 56px 56px;
    mask-image: radial-gradient(ellipse at 30% 20%, var(--color-black) 0%, transparent 70%);
    pointer-events: none;
}

.ho-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.06;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.ho-crumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
    margin-bottom: var(--space-6);
}

.ho-crumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); }
.ho-crumb a:hover { color: var(--color-accent); }
.ho-crumb [aria-current] { color: var(--color-white); font-weight: 600; }

.ho-hero__top {
    display: grid;
    grid-template-columns: minmax(0, 1.4fr) minmax(0, 1fr);
    gap: var(--space-10);
    align-items: end;
    padding-bottom: var(--space-10);
}

.ho-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: var(--space-4);
}

.ho-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.5rem, 6vw, 4.6rem);
    line-height: 0.98;
    letter-spacing: -0.02em;
    text-wrap: balance;
    margin-bottom: var(--space-6);
}

.ho-hero h1 .ho-outline {
    color: transparent;
    -webkit-text-stroke: 2px var(--color-accent);
}

.ho-hero__lead { color: color-mix(in srgb, var(--color-white) 88%, transparent); font-size: clamp(1rem, 1.5vw, 1.15rem); line-height: 1.7; max-width: 56ch; }
.ho-hero__lead strong { color: var(--color-white); }

.ho-hero__side { display: grid; gap: var(--space-5); }
.ho-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }

.ho-hero__areas {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 7%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
    backdrop-filter: blur(10px);
}

.ho-hero__areas span { display: block; font-family: var(--font-heading); font-size: var(--font-size-xs); letter-spacing: 0.12em; text-transform: uppercase; color: var(--color-accent); margin-bottom: var(--space-3); }
.ho-hero__areas ul { list-style: none; margin: 0; padding: 0; display: flex; flex-wrap: wrap; gap: var(--space-2); }
.ho-hero__areas li { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); border: 1px solid color-mix(in srgb, var(--color-white) 22%, transparent); color: color-mix(in srgb, var(--color-white) 88%, transparent); }

/* Three-frame photo strip */
.ho-strip {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: var(--space-4);
    align-items: end;
}

.ho-strip figure {
    overflow: hidden;
    border-radius: var(--radius-xl) var(--radius-xl) 0 0;
    box-shadow: var(--shadow-xl);
    aspect-ratio: 4 / 3;
}

.ho-strip figure:nth-child(2) { aspect-ratio: 4 / 3.6; }
.ho-strip figure:nth-child(3) { aspect-ratio: 4 / 2.7; }
.ho-strip img { width: 100%; height: 100%; object-fit: cover; object-position: center 35%; }

/* ---------- Proof bar ---------- */
.ho-proof { background: var(--color-white); border-bottom: 1px solid var(--color-border); }
.ho-proof ul { list-style: none; margin: 0; padding: var(--space-5) 0; display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: var(--space-4); }
.ho-proof li { display: grid; grid-template-columns: auto 1fr; gap: var(--space-3); align-items: center; font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600; color: var(--color-dark); padding-left: var(--space-4); border-left: 2px solid color-mix(in srgb, var(--color-primary) 30%, transparent); }
.ho-proof li:first-child { border-left: 0; padding-left: 0; }
.ho-proof li svg { color: var(--color-primary); }

/* ---------- Section scaffolding ---------- */
.ho-section { padding: var(--space-16) 0; position: relative; }
.ho-section--alt { background: var(--color-light); }
.ho-section--dark { background: var(--color-dark); color: var(--color-white); }

.ho-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.ho-eyebrow::after { content: ''; width: 36px; height: 2px; background: currentColor; opacity: 0.5; }
.ho-section--dark .ho-eyebrow { color: var(--color-accent); }
.ho-section h2 { font-size: clamp(1.8rem, 3.4vw, 2.6rem); line-height: 1.1; text-wrap: balance; margin-bottom: var(--space-4); }
.ho-section--dark h2 { color: var(--color-white); }
.ho-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-primary); margin-bottom: var(--space-5); }
.ho-lead { max-width: 62ch; color: var(--color-gray-dark); line-height: 1.8; }
.ho-section--dark .ho-lead { color: color-mix(in srgb, var(--color-white) 80%, transparent); }
.ho-prose p { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); }
.ho-prose a { color: var(--color-primary); font-weight: 600; }
.ho-prose a:hover { text-decoration: underline; }

/* ---------- Where we work: asymmetric area grid ---------- */
.ho-areas { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); grid-auto-rows: auto; gap: var(--space-5); margin-top: var(--space-8); }

.ho-area {
    position: relative;
    padding: var(--space-6);
    border-radius: var(--radius-xl);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    overflow: hidden;
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.ho-area:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.ho-area--wide { grid-column: span 2; display: grid; grid-template-columns: minmax(0, 1fr) 200px; gap: var(--space-6); align-items: center; background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.ho-area--wide figure { aspect-ratio: 4 / 5; border-radius: var(--radius-lg); overflow: hidden; }
.ho-area--wide img { width: 100%; height: 100%; object-fit: cover; }
.ho-area--tint-2 { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.ho-area--tint-3 { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }
.ho-area--dark { background: var(--color-dark); color: var(--color-white); border-color: var(--color-dark); }
.ho-area--dark h3 { color: var(--color-white); }
.ho-area--dark p { color: color-mix(in srgb, var(--color-white) 80%, transparent); }

.ho-area__tag { display: inline-block; font-family: var(--font-heading); font-size: var(--font-size-xs); letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-primary); margin-bottom: var(--space-2); }
.ho-area--dark .ho-area__tag { color: var(--color-accent); }
.ho-area h3 { font-size: var(--font-size-xl); line-height: 1.25; margin-bottom: var(--space-3); text-wrap: balance; }
.ho-area p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; }

.ho-area::after {
    content: '';
    position: absolute;
    right: -40px;
    bottom: -40px;
    width: 120px;
    height: 120px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-primary) 7%, transparent);
    pointer-events: none;
}

/* ---------- Dividers ---------- */
.ho-divider { line-height: 0; display: block; }
.ho-divider svg { width: 100%; height: 64px; display: block; }
.ho-divider--steps { background: var(--color-white); }
.ho-divider--steps svg { fill: var(--color-dark); }
.ho-divider--arc { background: var(--color-dark); }
.ho-divider--arc svg { fill: var(--color-light); }
.ho-divider--diag { background: var(--color-white); }
.ho-divider--diag svg { fill: var(--color-light); }

/* ---------- Signature: four-storm timeline ---------- */
.ho-storms { position: relative; overflow: hidden; }

.ho-storms::before {
    content: '';
    position: absolute;
    left: -160px;
    top: 40%;
    width: 480px;
    height: 480px;
    border-radius: var(--radius-full);
    background: radial-gradient(circle, color-mix(in srgb, var(--color-primary) 30%, transparent) 0%, transparent 65%);
    pointer-events: none;
}

.ho-timeline { list-style: none; margin: var(--space-10) 0 0; padding: 0; display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: var(--space-6); position: relative; }

.ho-timeline::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    top: 10px;
    height: 2px;
    background: linear-gradient(90deg, color-mix(in srgb, var(--color-accent) 20%, transparent), var(--color-accent), color-mix(in srgb, var(--color-accent) 20%, transparent));
}

.ho-storm { position: relative; padding-top: var(--space-8); }

.ho-storm::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 22px;
    height: 22px;
    border-radius: var(--radius-full);
    background: var(--color-dark);
    border: 4px solid var(--color-accent);
    box-shadow: 0 0 0 6px color-mix(in srgb, var(--color-accent) 18%, transparent);
}

.ho-storm__when { font-family: var(--font-heading); font-size: var(--font-size-xs); letter-spacing: 0.12em; text-transform: uppercase; color: var(--color-accent); margin-bottom: var(--space-2); display: block; }
.ho-storm h3 { color: var(--color-white); font-size: var(--font-size-xl); margin-bottom: var(--space-3); }
.ho-storm p { margin: 0; font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 78%, transparent); line-height: 1.65; }

.ho-storms__foot {
    margin-top: var(--space-10);
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    gap: var(--space-6);
    align-items: center;
    padding: var(--space-6);
    border-radius: var(--radius-xl);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
}

.ho-storms__foot p { margin: 0; color: color-mix(in srgb, var(--color-white) 85%, transparent); line-height: 1.7; max-width: 62ch; }
.ho-storms__foot p a { color: var(--color-accent); font-weight: 600; }

/* ---------- Permits + deed restrictions split ---------- */
.ho-rules { display: grid; grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr); gap: var(--space-12); align-items: center; }

.ho-rules__media { position: relative; }
.ho-rules__media figure { aspect-ratio: 4 / 5; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-xl); clip-path: polygon(0 0, 100% 0, 100% 92%, 0 100%); }
.ho-rules__media img { width: 100%; height: 100%; object-fit: cover; object-position: center 25%; }

.ho-rules__stamp {
    position: absolute;
    right: -16px;
    top: 32px;
    width: 120px;
    height: 120px;
    border-radius: var(--radius-full);
    background: var(--color-accent);
    color: var(--color-dark);
    display: grid;
    place-content: center;
    text-align: center;
    font-family: var(--font-heading);
    font-weight: 800;
    line-height: 1.1;
    box-shadow: var(--shadow-lg);
    transform: rotate(-8deg);
}

.ho-rules__stamp strong { font-size: var(--font-size-3xl); display: block; }
.ho-rules__stamp span { font-size: var(--font-size-xs); letter-spacing: 0.08em; text-transform: uppercase; }

.ho-cards { display: grid; gap: var(--space-4); margin-top: var(--space-6); }

.ho-card {
    display: grid;
    grid-template-columns: 52px 1fr;
    gap: var(--space-5);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}

.ho-card:hover { transform: translateX(6px); box-shadow: var(--shadow-md); }
.ho-card:nth-child(2) { background: color-mix(in srgb, var(--color-primary) 5%, var(--color-white)); }
.ho-card__icon { width: 52px; height: 52px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-dark); color: var(--color-accent); }
.ho-card strong { display: block; font-family: var(--font-heading); font-size: var(--font-size-lg); color: var(--color-dark); margin-bottom: var(--space-2); }
.ho-card p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.65; }

/* ---------- Services: compact 10-grid ---------- */
.ho-services { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.ho-svc {
    display: grid;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    color: var(--color-dark);
    position: relative;
    transition: transform var(--transition-base), box-shadow var(--transition-base), border-color var(--transition-base);
}

.ho-svc:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.ho-svc:nth-child(4n+1) { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.ho-svc:nth-child(4n+3) { background: color-mix(in srgb, var(--color-primary) 5%, var(--color-white)); }
.ho-svc__num { font-family: var(--font-heading); font-size: var(--font-size-xs); letter-spacing: 0.1em; color: var(--color-primary); }
.ho-svc strong { font-family: var(--font-heading); font-size: var(--font-size-base); line-height: 1.3; }
.ho-svc span { font-size: var(--font-size-xs); color: var(--color-gray-dark); line-height: 1.55; }
.ho-svc svg { position: absolute; right: var(--space-4); top: var(--space-4); color: var(--color-primary); transform: rotate(45deg); opacity: 0; transition: opacity var(--transition-fast); }
.ho-svc:hover svg { opacity: 1; }

.ho-services__photo { margin-top: var(--space-6); display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: var(--space-4); }
.ho-services__photo figure { aspect-ratio: 3 / 2; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-card); }
.ho-services__photo img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.ho-services__photo figure:hover img { transform: scale(1.04); }

/* ---------- Claims ---------- */
.ho-claims { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: var(--space-12); align-items: center; }
.ho-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 58ch; }

.ho-claims__steps { list-style: none; margin: 0; padding: 0; counter-reset: hostep; display: grid; gap: var(--space-3); }

.ho-claims__steps li {
    counter-increment: hostep;
    display: grid;
    grid-template-columns: 40px 1fr;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    line-height: 1.55;
}

.ho-claims__steps li::before {
    content: counter(hostep);
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-accent);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-weight: 800;
}

.ho-claims__note { margin-top: var(--space-5); font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); border-left: 3px solid var(--color-accent); padding-left: var(--space-4); }

/* ---------- Reviews ---------- */
.ho-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 340px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.ho-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-card);
    border-top: 4px solid var(--color-primary);
}

.ho-review:nth-child(even) { border-top-color: var(--color-accent); }
.ho-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.ho-review p { color: var(--color-gray-dark); line-height: 1.7; margin-bottom: var(--space-4); }
.ho-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }
.ho-review__avatar { width: 40px; height: 40px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-dark); color: var(--color-accent); font-weight: 800; }
.ho-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.ho-faq { max-width: 840px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.ho-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.ho-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.ho-faq summary {
    cursor: pointer;
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-5) var(--space-6);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
}

.ho-faq summary::-webkit-details-marker { display: none; }
.ho-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.ho-faq details[open] summary svg { transform: rotate(45deg); }
.ho-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.ho-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.ho-nearby a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-3);
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    font-family: var(--font-heading);
    font-weight: 600;
    color: var(--color-dark);
    transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast);
}

.ho-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.ho-nearby a svg { color: var(--color-primary); transform: rotate(45deg); }

.ho-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.ho-chips span, .ho-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.ho-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.ho-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- CTA: band with phone rail ---------- */
.ho-cta { position: relative; overflow: hidden; background: linear-gradient(120deg, var(--color-primary-dark), var(--color-primary)); color: var(--color-white); padding: var(--space-16) 0; }

.ho-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: linear-gradient(color-mix(in srgb, var(--color-white) 8%, transparent) 1px, transparent 1px);
    background-size: 100% 18px;
    mask-image: linear-gradient(180deg, transparent, var(--color-black));
    pointer-events: none;
}

.ho-cta__grid { position: relative; display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 0.8fr); gap: var(--space-10); align-items: center; }
.ho-cta h2 { color: var(--color-white); font-size: clamp(1.8rem, 3.2vw, 2.6rem); text-wrap: balance; margin-bottom: var(--space-3); }
.ho-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); line-height: 1.7; max-width: 56ch; margin: 0; }

.ho-cta__rail { display: grid; gap: var(--space-4); padding: var(--space-6); border-radius: var(--radius-xl); background: color-mix(in srgb, var(--color-dark) 35%, transparent); border: 1px solid color-mix(in srgb, var(--color-white) 15%, transparent); backdrop-filter: blur(8px); }
.ho-cta__rail small { font-size: var(--font-size-xs); color: color-mix(in srgb, var(--color-white) 75%, transparent); text-align: center; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .ho-hero__top { grid-template-columns: 1fr; }
    .ho-proof ul { grid-template-columns: 1fr 1fr; }
    .ho-proof li:nth-child(3) { border-left: 0; padding-left: 0; }
    .ho-areas { grid-template-columns: 1fr 1fr; }
    .ho-area--wide { grid-column: span 2; }
    .ho-timeline { grid-template-columns: 1fr 1fr; }
    .ho-timeline::before { display: none; }
    .ho-rules { grid-template-columns: 1fr; }
    .ho-rules__media { max-width: 420px; }
    .ho-services { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    .ho-claims { grid-template-columns: 1fr; }
    .ho-cta__grid { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .ho-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .ho-ctas .btn { width: 100%; justify-content: center; }
    .ho-strip { grid-template-columns: 1fr 1fr; }
    .ho-strip figure:nth-child(3) { display: none; }
    .ho-proof ul { grid-template-columns: 1fr; }
    .ho-proof li { border-left: 0; padding-left: 0; }
    .ho-areas { grid-template-columns: 1fr; }
    .ho-area--wide { grid-column: span 1; grid-template-columns: 1fr; }
    .ho-area--wide figure { aspect-ratio: 16 / 9; }
    .ho-timeline { grid-template-columns: 1fr; }
    .ho-storms__foot { grid-template-columns: 1fr; }
    .ho-services { grid-template-columns: 1fr 1fr; }
    .ho-services__photo { grid-template-columns: 1fr; }
    .ho-section { padding: var(--space-12) 0; }
    .ho-rules__stamp { right: 0; width: 96px; height: 96px; }
}

@media (prefers-reduced-motion: reduce) {
    .ho-area, .ho-card, .ho-svc, .ho-svc svg, .ho-services__photo img, .ho-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="ho-hero" aria-labelledby="ho-title">
    <div class="container">
        <nav class="ho-crumb" aria-label="Breadcrumb">
            <a href="/">Home</a><span>/</span>
            <a href="/service-areas/">Service Areas</a><span>/</span>
            <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
        </nav>

        <div class="ho-hero__top">
            <div>
                <span class="ho-hero__eyebrow"><?php echo icon('map-pin', 14); ?> Inside the city limits · from the Heights to Lake Houston</span>
                <h1 id="ho-title">Roof Repair &amp; Replacement in <span class="ho-outline">Houston</span>, TX</h1>
                <p class="ho-hero__lead">
                    <strong>Houston proper is one of more than 50 Greater Houston communities served by Triple G Roofing &amp; Construction, a family-owned father-and-son team based in Humble, TX, in business since 1973.</strong>
                    Leak repair, full replacement in shingle or metal, storm damage, siding, gutters, patio covers and fences —
                    free inspection and a free written estimate before any work begins.
                </p>
            </div>
            <div class="ho-hero__side">
                <div class="ho-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Free Inspection</a>
                </div>
                <div class="ho-hero__areas">
                    <span>Parts of the city we work most</span>
                    <ul>
                        <li>Lake Houston &amp; Kingwood</li>
                        <li>Aldine &amp; Greenspoint</li>
                        <li>Spring Branch &amp; Memorial</li>
                        <li>The Heights &amp; Oak Forest</li>
                        <li>Meyerland &amp; Bellaire</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="ho-strip" aria-label="Recent Triple G work">
            <figure><?php echo areaPhoto('roof-two-story', 'Two-story brick home during a roof replacement', 1200, 1600, '(max-width: 640px) 50vw, 33vw', true); ?></figure>
            <figure><?php echo areaPhoto('crew-shingles', 'Roofer carrying shingles across a roof covered in new underlayment', 1200, 1600, '(max-width: 640px) 50vw, 33vw'); ?></figure>
            <figure><?php echo areaPhoto('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, '33vw'); ?></figure>
        </div>
    </div>
</section>

<!-- ===================== PROOF BAR ===================== -->
<div class="ho-proof" aria-label="Why homeowners call Triple G">
    <div class="container">
        <ul>
            <li><?php echo icon('home', 20); ?> Family owned, father &amp; son, since 1973</li>
            <li><?php echo icon('hard-hat', 20); ?> The owner is on every job</li>
            <li><?php echo icon('award', 20); ?> Nextdoor Neighborhood Favorite 2022–2024</li>
            <li><?php echo icon('check-circle', 20); ?> Free inspections &amp; written estimates</li>
        </ul>
    </div>
</div>

<!-- ===================== WHERE WE WORK ===================== -->
<section class="ho-section" aria-labelledby="ho-areas-title">
    <div class="container">
        <span class="ho-eyebrow">Not a generic city page</span>
        <h2 id="ho-areas-title">Where in Houston we actually work</h2>
        <p class="ho-subtitle">The city is 600-plus square miles. Here's the part of it we drive to.</p>
        <p class="ho-lead">
            Based in Humble, we spend most of our in-city time on the north and northeast side and along the Memorial and
            290 corridors — the neighborhoods our reviews come from. Searching for <strong>roof repair near me in Houston</strong>?
            Call <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-primary); font-weight: 600;"><?php echo $phone; ?></a> and we'll tell you honestly whether you're in our lane.
        </p>

        <div class="ho-areas">
            <article class="ho-area ho-area--wide" data-animate="left">
                <div>
                    <span class="ho-area__tag">Northeast · closest to home</span>
                    <h3>Lake Houston, Kingwood &amp; the Beltway 8 east side</h3>
                    <p>Kingwood has been inside the city limits since the 1996 annexation, and it's fifteen minutes from our door. Wooded lots, 1970s–2000s two-stories, and a lot of tree-on-roof damage after Beryl in July 2024. The neighborhoods off Beltway 8 and US-59 fall in the same run.</p>
                </div>
                <figure><?php echo areaPhoto('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, '200px'); ?></figure>
            </article>
            <article class="ho-area ho-area--dark" data-animate="right">
                <span class="ho-area__tag">North</span>
                <h3>Aldine &amp; Greenspoint</h3>
                <p>Between I-45 and US-59 north of the Beltway: 1960s–80s one-stories, many with the original low-slope garage or patio roofs. Straightforward tear-offs — if the decking is sound, and we check.</p>
            </article>
            <article class="ho-area ho-area--tint-2" data-animate="down">
                <span class="ho-area__tag">West · I-10 corridor</span>
                <h3>Spring Branch &amp; the Memorial side</h3>
                <p>1950s–60s ranch homes being rebuilt one lot at a time. The Memorial Villages next door — Spring Valley, Hunters Creek, Hedwig, Bunker Hill, Piney Point — are separate cities on our list too.</p>
            </article>
            <article class="ho-area ho-area--tint-3" data-animate="down">
                <span class="ho-area__tag">Inner Loop</span>
                <h3>The Heights, Oak Forest &amp; Garden Oaks</h3>
                <p>1920s bungalows in the Heights, 1940s–50s ranches in Oak Forest and Garden Oaks. Shallow pitches, back additions, and historic-district rules in parts of the Heights that we check before we write an estimate.</p>
            </article>
            <article class="ho-area" data-animate="down">
                <span class="ho-area__tag">Southwest</span>
                <h3>Meyerland, Bellaire &amp; West U</h3>
                <p>1950s–60s Meyerland ranches and the rebuilds that followed the Brays Bayou floods, plus Bellaire and West University Place — both separate cities we serve.</p>
            </article>
        </div>
    </div>
</section>

<div class="ho-divider ho-divider--steps" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 0,48 360,48 360,32 720,32 720,16 1080,16 1080,0 1440,0 1440,64"/></svg>
</div>

<!-- ===================== SIGNATURE: FOUR STORMS ===================== -->
<section class="ho-section ho-section--dark ho-storms" aria-labelledby="ho-storms-title">
    <div class="container">
        <span class="ho-eyebrow">Regional weather, on the record</span>
        <h2 id="ho-storms-title">Four storms every Houston roof remembers</h2>
        <p class="ho-lead">We've been roofing here through all of them. Each one left a different kind of damage — and a different thing to look for on your roof today.</p>

        <ol class="ho-timeline">
            <?php foreach ($storms as $i => $s): ?>
            <li class="ho-storm" data-animate="<?php echo $i % 2 ? 'down' : ''; ?>">
                <span class="ho-storm__when"><?php echo htmlspecialchars($s['when']); ?></span>
                <h3><?php echo htmlspecialchars($s['name']); ?></h3>
                <p><?php echo htmlspecialchars($s['what']); ?></p>
            </li>
            <?php endforeach; ?>
        </ol>

        <div class="ho-storms__foot" data-animate="scale">
            <p>
                The common thread: wind gets under the edges first, water follows the weakest flashing, and a hot,
                under-ventilated attic shortens the life of whatever is on top. Shingle manufacturers can void or limit a shingle
                warranty when the attic isn't ventilated to their spec, which is why <a href="/services/attic-venting/">attic venting</a>
                is a line on every roof estimate we write — not an add-on.
            </p>
            <a href="/services/storm-damage-repair/" class="btn btn-accent">Storm damage repair</a>
        </div>
    </div>
</section>

<div class="ho-divider ho-divider--arc" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><path d="M0,64 C480,0 960,0 1440,64 Z"/></svg>
</div>

<!-- ===================== PERMITS + DEED RESTRICTIONS ===================== -->
<section class="ho-section ho-section--alt" aria-labelledby="ho-rules-title">
    <div class="container">
        <div class="ho-rules">
            <div class="ho-rules__media" data-animate="left">
                <figure><?php echo areaPhoto('roof-replacement', 'Triple G crew replacing the roof on a two-story brick home', 1200, 1600, '(max-width: 1024px) 420px, 38vw'); ?></figure>
                <div class="ho-rules__stamp"><strong>1973</strong><span>Since</span></div>
            </div>
            <div>
                <span class="ho-eyebrow">Paperwork, handled</span>
                <h2 id="ho-rules-title">Permits and deed restrictions: we'll tell you what applies before we start</h2>
                <p class="ho-lead">Two things make a city roof or fence job different from one in the county. Neither should be your problem to research.</p>
                <div class="ho-cards">
                    <div class="ho-card" data-animate="right">
                        <span class="ho-card__icon"><?php echo icon('check-circle', 22); ?></span>
                        <div>
                            <strong>City permits for re-roofs</strong>
                            <p>The City of Houston issues a residential roofing permit for re-roofs and overlays inside the city limits, and it has to be on site for the inspection. Whether your project needs one depends on scope and on whether you're truly inside the city — we'll tell you, and pull it if it does.</p>
                        </div>
                    </div>
                    <div class="ho-card" data-animate="right">
                        <span class="ho-card__icon"><?php echo icon('shield', 22); ?></span>
                        <div>
                            <strong>Deed restrictions instead of zoning</strong>
                            <p>The city has no zoning ordinance; recorded deed restrictions do that work, and the City's Legal Department enforces them. They can govern fence height and materials, patio-cover setbacks and sometimes roof color — so we read yours before we build a <a href="/services/fences-gates/" style="color: var(--color-primary); font-weight: 600;">fence</a> or a <a href="/services/patio-covers-decks/" style="color: var(--color-primary); font-weight: 600;">patio cover</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="ho-divider ho-divider--diag" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,0 1440,0 0,64"/></svg>
</div>

<!-- ===================== SERVICES ===================== -->
<section class="ho-section" aria-labelledby="ho-svc-title">
    <div class="container">
        <span class="ho-eyebrow">What we do here</span>
        <h2 id="ho-svc-title">Roofing first — then everything else on the outside of the house</h2>
        <p class="ho-lead"><?php echo htmlspecialchars($shortName); ?> installs shingle and metal roofs and handles the siding, gutters, patio covers, decks and fences around them. Ten services, one written estimate, the owner on every job.</p>

        <div class="ho-services">
            <?php foreach ($services as $i => $s): ?>
            <a class="ho-svc" href="/services/<?php echo $s['slug']; ?>/" data-animate="<?php echo ['', 'down', 'scale'][$i % 3]; ?>">
                <span class="ho-svc__num"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
                <strong><?php echo htmlspecialchars($s['name']); ?></strong>
                <span><?php echo htmlspecialchars($s['description']); ?></span>
                <?php echo icon('arrow-up', 16); ?>
            </a>
            <?php endforeach; ?>
        </div>

        <div class="ho-services__photo">
            <figure data-animate="left"><?php echo areaPhoto('siding-fascia-soffit', 'Crew member replacing siding on a dormer above a shingle roof', 1200, 1600, '(max-width: 640px) 100vw, 33vw'); ?></figure>
            <figure data-animate="scale"><?php echo areaPhoto('patio-covers-decks', 'Finished covered patio with ceiling fans and a concrete slab', 1000, 1333, '(max-width: 640px) 100vw, 33vw'); ?></figure>
            <figure data-animate="right"><?php echo areaPhoto('roof-metal-shop', 'Crew installing a new metal roof on a metal shop building', 1200, 1600, '(max-width: 640px) 100vw, 33vw'); ?></figure>
        </div>
    </div>
</section>

<!-- ===================== CLAIMS ===================== -->
<section class="ho-section ho-section--dark" aria-labelledby="ho-claims-title">
    <div class="container">
        <div class="ho-claims">
            <div>
                <span class="ho-eyebrow">Hail, wind &amp; hurricane damage</span>
                <h2 id="ho-claims-title">We handle the claim paperwork so you don't have to learn it</h2>
                <p>
                    Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience to every storm job
                    in the city. We take the stress of the process off your plate and put it on ours — from the first photo to the
                    final walk-through.
                </p>
                <p class="ho-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. Our job is to document the damage properly and make sure you understand your options.</p>
            </div>
            <ol class="ho-claims__steps">
                <li data-animate="right">Photograph and document every slope before anything is disturbed</li>
                <li data-animate="right">Meet the adjuster at your home and walk the roof together</li>
                <li data-animate="right">Explain your policy — deductible, depreciation, scope — in plain English</li>
                <li data-animate="right">Do the work as agreed, with the owner on site</li>
            </ol>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="ho-section ho-section--alt" aria-labelledby="ho-reviews-title">
    <div class="container">
        <span class="ho-eyebrow">From our customers</span>
        <h2 id="ho-reviews-title">What Houston homeowners say about Triple G</h2>
        <p class="ho-lead">Real reviews, published by the client with first name and city.</p>
        <div class="ho-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="ho-review" data-animate="scale">
                <div class="ho-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="ho-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="ho-section" aria-labelledby="ho-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="ho-eyebrow">Common questions</span>
            <h2 id="ho-faq-title">Straight answers before you call</h2>
        </div>
        <div class="ho-faq">
            <?php foreach ($areaFaqs as $i => $faq): ?>
            <details <?php echo $i === 0 ? 'open' : ''; ?>>
                <summary><?php echo htmlspecialchars($faq['q']); ?> <?php echo icon('plus', 20); ?></summary>
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== NEARBY ===================== -->
<section class="ho-section ho-section--alt" aria-labelledby="ho-nearby-title">
    <div class="container">
        <span class="ho-eyebrow">Nearby communities</span>
        <h2 id="ho-nearby-title">The cities inside and around the city</h2>
        <p class="ho-lead">Bellaire and Jersey Village are enclaves surrounded by the city; Humble is where we're based; Pasadena sits across the Ship Channel. We cover more than 50 Greater Houston communities in all.</p>
        <div class="ho-nearby">
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/jersey-village/">Jersey Village, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/bellaire/">Bellaire, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/pasadena/">Pasadena, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="ho-chips">
            <?php foreach (['Kingwood', 'Aldine', 'Jacinto City', 'Galena Park', 'West University Place', 'Southside Place', 'Spring Valley Village', 'Hunters Creek Village'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="ho-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="ho-cta" aria-labelledby="ho-cta-title">
    <div class="container">
        <div class="ho-cta__grid">
            <div>
                <h2 id="ho-cta-title">Leak after the last storm? Let's go look at it.</h2>
                <p>Free inspection, photos of every slope, and a written estimate with the product named — no pressure, the same way we've done it since 1973. If you need a permit, we'll say so up front.</p>
            </div>
            <div class="ho-cta__rail">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
                <small><?php echo htmlspecialchars($businessHours); ?></small>
            </div>
        </div>
    </div>
</section>

<!-- Schema: BreadcrumbList -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Service Areas", "item": "<?php echo $siteUrl; ?>/service-areas/" },
        { "@type": "ListItem", "position": 3, "name": "<?php echo htmlspecialchars($areaName); ?>, TX", "item": "<?php echo $canonicalUrl; ?>" }
    ]
}
</script>

<!-- Schema: Service (provider = homepage organization; no street address published) -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "@id": "<?php echo $canonicalUrl; ?>#service",
    "url": "<?php echo $canonicalUrl; ?>",
    "name": "Roof Repair & Replacement in <?php echo htmlspecialchars($areaName); ?>, TX",
    "serviceType": "Roofing and exterior contractor",
    "description": "<?php echo htmlspecialchars($pageDescription); ?>",
    "provider": { "@id": "<?php echo $siteUrl; ?>#organization" },
    "areaServed": { "@type": "City", "name": "<?php echo htmlspecialchars($areaName); ?>, TX" },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Services offered in <?php echo htmlspecialchars($areaName); ?>, TX",
        "itemListElement": [
            <?php foreach ($services as $i => $s): ?>
            { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "<?php echo htmlspecialchars($s['name']); ?>", "url": "<?php echo $siteUrl; ?>/services/<?php echo $s['slug']; ?>/" } }<?php echo $i < count($services) - 1 ? ',' : ''; ?>

            <?php endforeach; ?>
        ]
    }
}
</script>

<script type="application/ld+json">
<?php echo generateFAQSchema($areaFaqs); ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
