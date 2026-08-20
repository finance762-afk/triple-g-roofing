<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Deer Park';
$pageTitle = 'Shingle & Metal Roofing in Deer Park, TX | ' . $shortName;
$pageDescription = 'Shingle and metal roofing, repair and siding in Deer Park, TX from a father-and-son team serving Greater Houston since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/deer-park/';

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

/* No review is tagged with this city yet — show real roof-replacement reviews from across Greater Houston */
$cityReviews = getTestimonialsFor('roof-replacement', 3);

/* Nearby communities — linked only when that area page exists on disk, otherwise shown as a plain chip */
$nearbyCities = ['Pasadena', 'La Porte', 'Baytown', 'Channelview', 'Highlands', 'Galena Park'];

$areaFaqs = [
    [
        'q' => 'Is a metal roof a better choice than shingles this close to the Ship Channel?',
        'a' => 'It depends on the house. The humid, salt-tinged air off the bay and the industrial neighbors along Highway 225 are hard on exposed steel, so on any Deer Park roof we pay close attention to fastener and flashing corrosion. A properly specified metal roof with coated fasteners handles it well, and so does an architectural shingle roof with new flashing and balanced ventilation. We install both and will give you a written estimate for each if you want to compare.',
    ],
    [
        'q' => 'Do you replace roofs on the older single-story brick homes in Deer Park?',
        'a' => 'Yes — that is most of the housing stock here. The post-war ranch homes around Dow Park, Center Street and the older streets near San Jacinto College typically have low-slope hip roofs, original decking and little or no attic ventilation. We tear off to the decking, replace what has rotted, install new underlayment and flashing, and add balanced intake and exhaust so the new shingles last and their manufacturer warranty holds.',
    ],
    [
        'q' => 'Can you help with a wind or hail claim?',
        'a' => 'We walk it with you from the first photo to the last shingle. Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience: we document the damage, meet the adjuster on the roof and explain the policy in plain English. Whether a claim is approved, and for how much, is always the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix dp-
   Tokens only. Centered hero with overlapping three-photo
   filmstrip, local-context split with fact strip, services
   ledger, corrosion spec-sheet signature section, claims
   with owner photo, reviews, FAQ, nearby, CTA.
   ========================================================== */

/* ---------- Reveal direction modifiers (scoped to this page) ---------- */
[data-animate][data-dir="left"] { transform: translateX(-32px); }
[data-animate][data-dir="right"] { transform: translateX(32px); }
[data-animate][data-dir="down"] { transform: translateY(-28px); }
[data-animate][data-dir="scale"] { transform: scale(0.94); }
[data-animate][data-dir].animated { transform: none; }

/* ---------- Hero: centered copy + filmstrip ---------- */
.dp-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    background: var(--color-dark-alt);
    text-align: center;
    padding: calc(var(--nav-height) + var(--space-12)) 0 calc(var(--space-16) + var(--space-16));
}

.dp-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--color-primary) 18%, transparent) 0%, transparent 50%),
        linear-gradient(180deg, var(--color-dark-alt) 0%, var(--color-dark) 100%);
}

.dp-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.06;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.dp-hero__grid {
    position: absolute;
    inset: 0;
    z-index: -1;
    pointer-events: none;
    background-image:
        linear-gradient(color-mix(in srgb, var(--color-white) 4%, transparent) 1px, transparent 1px),
        linear-gradient(90deg, color-mix(in srgb, var(--color-white) 4%, transparent) 1px, transparent 1px);
    background-size: 64px 64px;
    mask-image: radial-gradient(ellipse at center, black 30%, transparent 75%);
}

.dp-hero__inner { max-width: 820px; margin: 0 auto; }

.dp-crumb {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.dp-crumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.dp-crumb a:hover { color: var(--color-accent); }
.dp-crumb [aria-current] { color: var(--color-white); font-weight: 600; }

.dp-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-3);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: var(--space-4);
}

.dp-hero__eyebrow::before,
.dp-hero__eyebrow::after { content: ''; width: 24px; height: 2px; background: var(--color-accent); }

.dp-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 4.8vw, 3.75rem);
    line-height: 1.06;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.dp-hero h1 span { color: var(--color-accent); }

.dp-hero__lead {
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.15rem);
    line-height: 1.7;
    max-width: 62ch;
    margin: 0 auto var(--space-7);
}

.dp-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); justify-content: center; }
.dp-ctas .btn-lg { font-size: var(--font-size-base); }

/* Filmstrip overlapping hero bottom */
.dp-strip { position: relative; z-index: 2; margin-top: calc(-1 * var(--space-16)); }

.dp-strip__row { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-5); }

.dp-strip__item {
    position: relative;
    border-radius: var(--radius-xl);
    overflow: hidden;
    aspect-ratio: 4 / 3;
    box-shadow: var(--shadow-lg);
    border: 4px solid var(--color-white);
    background: var(--color-white);
}

.dp-strip__item:nth-child(2) { transform: translateY(var(--space-6)); }
.dp-strip__item img { width: 100%; height: 100%; object-fit: cover; }

.dp-strip__item figcaption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: var(--space-5) var(--space-4) var(--space-3);
    background: linear-gradient(180deg, transparent, color-mix(in srgb, var(--color-dark) 85%, transparent));
    color: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
}

.dp-trust { margin-top: calc(var(--space-12) + var(--space-6)); }

.dp-trust ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-3);
}

.dp-trust li {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    background: var(--color-light);
    border: 1px solid var(--color-border);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-dark);
}

.dp-trust li svg { color: var(--color-primary); }

/* ---------- Section scaffolding ---------- */
.dp-section { padding: var(--space-16) 0; }
.dp-section--alt { background: var(--color-light); }
.dp-section--dark { background: var(--color-dark); color: var(--color-white); }

.dp-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-white);
    background: var(--color-primary);
    padding: 2px var(--space-3);
    border-radius: var(--radius-sm);
    margin-bottom: var(--space-4);
}

.dp-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.dp-section--dark h2 { color: var(--color-white); }
.dp-section h3 { text-wrap: balance; }
.dp-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.dp-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.dp-prose a { color: var(--color-primary); font-weight: 600; }
.dp-prose a:hover { text-decoration: underline; }
.dp-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.dp-section--dark .dp-lead { color: color-mix(in srgb, var(--color-white) 80%, transparent); }

/* ---------- Local context + fact strip ---------- */
.dp-local { display: grid; grid-template-columns: minmax(0, 3fr) minmax(0, 2fr); gap: var(--space-12); align-items: start; }

.dp-facts { display: grid; gap: var(--space-4); position: sticky; top: calc(var(--nav-height) + var(--space-4)); }

.dp-fact {
    display: grid;
    grid-template-columns: 96px 1fr;
    gap: var(--space-4);
    align-items: center;
    padding: var(--space-4) var(--space-5);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}

.dp-fact:hover { transform: translateX(4px); box-shadow: var(--shadow-md); }
.dp-fact:nth-child(1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.dp-fact:nth-child(2) { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); }
.dp-fact:nth-child(3) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }
.dp-fact:nth-child(4) { background: var(--color-white); }

.dp-fact__num { font-family: var(--font-heading); font-size: var(--font-size-3xl); font-weight: 800; line-height: 1; color: var(--color-primary); letter-spacing: -0.02em; }
.dp-fact:nth-child(even) .dp-fact__num { color: var(--color-dark); }
.dp-fact p { margin: 0; font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; }
.dp-fact strong { display: block; color: var(--color-dark); font-family: var(--font-heading); margin-bottom: 2px; }

.dp-local__photo { border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 4 / 5; box-shadow: var(--shadow-card); }
.dp-local__photo img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.dp-local__photo:hover img { transform: scale(1.04); }

/* ---------- Services ledger ---------- */
.dp-ledger { margin-top: var(--space-8); border: 1px solid var(--color-border); border-radius: var(--radius-xl); overflow: hidden; background: var(--color-white); }

.dp-ledger a {
    display: grid;
    grid-template-columns: 56px minmax(0, 260px) 1fr auto;
    gap: var(--space-5);
    align-items: center;
    padding: var(--space-4) var(--space-6);
    border-bottom: 1px solid var(--color-border);
    color: var(--color-dark);
    transition: background var(--transition-fast), padding-left var(--transition-fast);
}

.dp-ledger a:last-child { border-bottom: 0; }
.dp-ledger a:nth-child(even) { background: color-mix(in srgb, var(--color-light) 70%, var(--color-white)); }
.dp-ledger a:hover { background: color-mix(in srgb, var(--color-accent) 14%, var(--color-white)); padding-left: var(--space-8); }

.dp-ledger__icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white)); color: var(--color-primary); }
.dp-ledger a:nth-child(3n) .dp-ledger__icon { background: color-mix(in srgb, var(--color-accent) 24%, var(--color-white)); color: var(--color-primary-dark); }
.dp-ledger strong { font-family: var(--font-heading); font-size: var(--font-size-lg); }
.dp-ledger span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5; }
.dp-ledger em { font-style: normal; color: var(--color-primary); display: inline-flex; align-items: center; gap: var(--space-1); font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600; white-space: nowrap; }

/* ---------- Signature: corrosion spec sheet ---------- */
.dp-spec { display: grid; grid-template-columns: minmax(0, 5fr) minmax(0, 7fr); gap: var(--space-12); align-items: start; }

.dp-spec__media { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }
.dp-spec__photo { border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 3 / 4; box-shadow: var(--shadow-lg); border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent); }
.dp-spec__photo:nth-child(2) { transform: translateY(var(--space-8)); }
.dp-spec__photo img { width: 100%; height: 100%; object-fit: cover; }

.dp-spec__sheet {
    border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: color-mix(in srgb, var(--color-white) 4%, transparent);
}

.dp-spec__head {
    display: grid;
    grid-template-columns: 64px 1fr 1fr;
    gap: var(--space-5);
    padding: var(--space-3) var(--space-6);
    background: var(--color-accent);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.dp-spec dl { margin: 0; counter-reset: dprow; }

.dp-spec__row {
    counter-increment: dprow;
    display: grid;
    grid-template-columns: 64px 1fr 1fr;
    gap: var(--space-5);
    padding: var(--space-5) var(--space-6);
    border-top: 1px solid color-mix(in srgb, var(--color-white) 10%, transparent);
    transition: background var(--transition-fast);
}

.dp-spec__row:hover { background: color-mix(in srgb, var(--color-white) 6%, transparent); }

.dp-spec__row::before {
    content: '0' counter(dprow);
    font-family: var(--font-heading);
    font-size: var(--font-size-2xl);
    font-weight: 800;
    color: var(--color-accent);
    line-height: 1;
}

.dp-spec dt { font-family: var(--font-heading); font-weight: 700; color: var(--color-white); font-size: var(--font-size-base); margin-bottom: var(--space-1); }
.dp-spec dt small { display: block; font-weight: 400; color: color-mix(in srgb, var(--color-white) 65%, transparent); font-size: var(--font-size-xs); margin-top: 2px; }
.dp-spec dd { margin: 0; color: color-mix(in srgb, var(--color-white) 82%, transparent); font-size: var(--font-size-sm); line-height: 1.6; }
.dp-spec dd a { color: var(--color-accent); font-weight: 600; }
.dp-spec dd a:hover { text-decoration: underline; }

.dp-spec__foot {
    margin-top: var(--space-6);
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-lg);
    border-left: 4px solid var(--color-accent);
    background: color-mix(in srgb, var(--color-white) 5%, transparent);
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    line-height: 1.7;
    max-width: 70ch;
}

.dp-spec__foot a { color: var(--color-accent); font-weight: 600; }

/* ---------- Claims with owner photo ---------- */
.dp-claims { display: grid; grid-template-columns: minmax(0, 2fr) minmax(0, 3fr); gap: var(--space-12); align-items: center; }

.dp-claims__photo { border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 3 / 4; box-shadow: var(--shadow-lg); position: relative; max-width: 420px; }
.dp-claims__photo img { width: 100%; height: 100%; object-fit: cover; object-position: top; }

.dp-claims__photo figcaption {
    position: absolute;
    left: var(--space-4);
    right: var(--space-4);
    bottom: var(--space-4);
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-md);
    background: color-mix(in srgb, var(--color-dark) 80%, transparent);
    backdrop-filter: blur(8px);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
}

.dp-claims__photo figcaption span { display: block; font-weight: 400; color: color-mix(in srgb, var(--color-white) 70%, transparent); font-size: var(--font-size-xs); }
.dp-claims p { color: var(--color-gray-dark); line-height: 1.8; max-width: 58ch; margin-bottom: var(--space-4); }

.dp-steps { list-style: none; margin: var(--space-6) 0 0; padding: 0; counter-reset: dpstep; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }

.dp-steps li {
    counter-increment: dpstep;
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
    font-size: var(--font-size-sm);
    line-height: 1.6;
    color: var(--color-gray-dark);
    position: relative;
    overflow: hidden;
}

.dp-steps li::before {
    content: counter(dpstep);
    position: absolute;
    right: var(--space-3);
    top: 0;
    font-family: var(--font-heading);
    font-size: var(--font-size-5xl);
    font-weight: 800;
    line-height: 1;
    color: color-mix(in srgb, var(--color-primary) 10%, transparent);
}

.dp-steps strong { display: block; color: var(--color-dark); font-family: var(--font-heading); margin-bottom: 2px; }
.dp-claims__note { font-size: var(--font-size-sm); color: var(--color-gray-dark); border-left: 3px solid var(--color-primary); padding-left: var(--space-4); }

/* ---------- Reviews ---------- */
.dp-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.dp-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    display: grid;
    grid-template-columns: 48px 1fr;
    gap: var(--space-4);
}

.dp-review__avatar { width: 48px; height: 48px; border-radius: var(--radius-full); display: grid; place-items: center; background: var(--color-accent); color: var(--color-dark); font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-lg); }
.dp-review:nth-child(2) .dp-review__avatar { background: var(--color-primary); color: var(--color-white); }
.dp-review:nth-child(3) .dp-review__avatar { background: var(--color-dark); color: var(--color-accent); }
.dp-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-2); }
.dp-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-3); }
.dp-review footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-dark); }
.dp-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.dp-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.dp-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.dp-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.dp-faq summary {
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

.dp-faq summary::-webkit-details-marker { display: none; }
.dp-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.dp-faq details[open] summary svg { transform: rotate(45deg); }
.dp-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.dp-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.dp-nearby a,
.dp-nearby span {
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
}

.dp-nearby a { transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast); }
.dp-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.dp-nearby a svg { color: var(--color-primary); }
.dp-nearby span { color: var(--color-gray-dark); font-weight: 500; }

.dp-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.dp-chips span, .dp-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.dp-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.dp-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.dp-divider { line-height: 0; display: block; }
.dp-divider svg { width: 100%; height: 60px; display: block; }
.dp-divider--peak { background: var(--color-light); }
.dp-divider--peak svg { fill: var(--color-dark); }
.dp-divider--notch { background: var(--color-dark); }
.dp-divider--notch svg { fill: var(--color-white); }

/* ---------- CTA ---------- */
.dp-cta { position: relative; overflow: hidden; background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 60%, var(--color-accent) 140%); padding: var(--space-16) 0; }

.dp-cta::before {
    content: '';
    position: absolute;
    right: -120px;
    top: -120px;
    width: 420px;
    height: 420px;
    border-radius: var(--radius-full);
    border: 60px solid color-mix(in srgb, var(--color-white) 6%, transparent);
    pointer-events: none;
}

.dp-cta__inner { position: relative; display: grid; grid-template-columns: minmax(0, 3fr) minmax(0, 2fr); gap: var(--space-10); align-items: center; }
.dp-cta h2 { color: var(--color-white); font-size: clamp(1.75rem, 3.4vw, 2.5rem); margin-bottom: var(--space-3); text-wrap: balance; }
.dp-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); max-width: 58ch; line-height: 1.7; margin: 0; }
.dp-cta .dp-ctas { justify-content: flex-end; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .dp-local { grid-template-columns: 1fr; }
    .dp-facts { position: static; }
    .dp-ledger a { grid-template-columns: 44px 1fr auto; }
    .dp-ledger span { grid-column: 2 / -1; }
    .dp-spec { grid-template-columns: 1fr; }
    .dp-spec__media { max-width: 520px; }
    .dp-claims { grid-template-columns: 1fr; }
    .dp-cta__inner { grid-template-columns: 1fr; }
    .dp-cta .dp-ctas { justify-content: flex-start; }
}

@media (max-width: 640px) {
    .dp-hero { padding-top: calc(var(--nav-height) + var(--space-8)); padding-bottom: calc(var(--space-12) + var(--space-16)); }
    .dp-ctas .btn { width: 100%; justify-content: center; }
    .dp-strip__row { grid-template-columns: 1fr; }
    .dp-strip__item:nth-child(2) { transform: none; }
    .dp-strip__item { aspect-ratio: 16 / 10; }
    .dp-trust { margin-top: var(--space-8); }
    .dp-ledger a { grid-template-columns: 1fr; gap: var(--space-2); }
    .dp-ledger span { grid-column: auto; }
    .dp-spec__head { display: none; }
    .dp-spec__row { grid-template-columns: 1fr; gap: var(--space-2); }
    .dp-spec__media { grid-template-columns: 1fr; }
    .dp-spec__photo:nth-child(2) { transform: none; }
    .dp-steps { grid-template-columns: 1fr; }
    .dp-review { grid-template-columns: 1fr; }
    .dp-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .dp-local__photo img, .dp-fact, .dp-ledger a, .dp-spec__row, .dp-nearby a { transition: none; }
    [data-animate][data-dir] { transform: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="dp-hero" aria-labelledby="dp-title">
    <div class="dp-hero__grid" aria-hidden="true"></div>
    <div class="container">
        <div class="dp-hero__inner">
            <nav class="dp-crumb" aria-label="Breadcrumb">
                <a href="/">Home</a><span>/</span>
                <a href="/service-areas/">Service Areas</a><span>/</span>
                <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
            </nav>

            <span class="dp-hero__eyebrow">Birthplace of Texas · one of 50+ communities we serve</span>

            <h1 id="dp-title">Roofing, Metal Roofs &amp; Repair in <span>Deer Park</span>, TX</h1>

            <p class="dp-hero__lead">
                Deer Park is one of more than 50 Greater Houston communities served by <?php echo htmlspecialchars($siteName); ?>,
                a family-owned father-and-son team based in Humble, TX, in business since 1973. Shingle and metal roofs built
                for salt air and refinery-row wind, plus siding, gutters, patio covers, decks and fences — with a free
                inspection and written estimate first.
            </p>

            <div class="dp-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
            </div>
        </div>
    </div>
</section>

<div class="dp-strip">
    <div class="container">
        <div class="dp-strip__row">
            <figure class="dp-strip__item">
                <?php echo areaPhoto('roof-finished-brick', 'Completed shingle roof replacement on a brick ranch home', 1200, 1600, '(max-width: 640px) 100vw, 33vw', true); ?>
                <figcaption>Architectural shingle on a brick ranch</figcaption>
            </figure>
            <figure class="dp-strip__item">
                <?php echo areaPhoto('roof-metal-shop', 'Crew installing a new metal roof on a metal shop building', 1200, 1600, '(max-width: 640px) 100vw, 33vw', true); ?>
                <figcaption>Metal roofing, homes and shops</figcaption>
            </figure>
            <figure class="dp-strip__item">
                <?php echo areaPhoto('fence-gate-cedar', 'New cedar fence and double gate beside a brick home', 1200, 1600, '(max-width: 640px) 100vw, 33vw', true); ?>
                <figcaption>Cedar fences and gates</figcaption>
            </figure>
        </div>
        <div class="dp-trust">
            <ul>
                <li><?php echo icon('award', 16); ?> Nextdoor Neighborhood Favorite 2022–2024</li>
                <li><?php echo icon('hard-hat', 16); ?> The owner is on every job</li>
                <li><?php echo icon('home', 16); ?> Father-and-son team since 1973</li>
                <li><?php echo icon('check-circle', 16); ?> Free inspections &amp; written estimates</li>
            </ul>
        </div>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="dp-section" aria-labelledby="dp-local-title">
    <div class="container">
        <div class="dp-local">
            <div class="dp-prose">
                <span class="dp-eyebrow">Between the Battleground and refinery row</span>
                <h2 id="dp-local-title">Single-story brick, salt air and a lot of history</h2>
                <p class="dp-subtitle">Post-war ranch homes that have stood up to the Ship Channel for sixty years.</p>

                <p>
                    Deer Park calls itself the Birthplace of Texas, and it has the paperwork: the Battle of San Jacinto was fought
                    next door in April 1836, and the treaty that followed was drafted at Dr. George Patrick's cabin on Buffalo Bayou —
                    a replica stands on Center Street today. The San Jacinto Monument rises over the east side of town, and the city's
                    own Battleground Golf Course names every one of its 18 holes for someone or something from the battle.
                </p>
                <p>
                    The houses are more modest than the history. Most of Deer Park was built after the Second World War — modest,
                    single-story brick ranch homes on the streets radiating out from Dow Park and the public library, the older stock
                    near San Jacinto College, and two-story homes from the 1990s and 2000s in Meadowcreek and the subdivisions further
                    south. Center Street and Spencer Highway carry most of the traffic; State Highway 225 and the refineries and chemical
                    plants along it form the northern edge. Deer Park ISD runs its own schools, with the high school split between the
                    ninth-grade North Campus on Ivy Avenue and the South Campus on West San Augustine.
                </p>
                <p>
                    What that means on a roof: low-slope hips with aging decking, short overhangs, brick-to-roof flashing that was last
                    touched decades ago, and the humid, salt-tinged air off the bay working on every exposed nail head and vent. We see
                    more fastener and flashing corrosion here than almost anywhere else we work, which is why the inspection matters more
                    than the sales pitch. Searching for <strong>roof repair near me in Deer Park</strong>? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> — Tim comes out himself, the inspection is free,
                    and you get photos and a written estimate.
                </p>
            </div>

            <div class="dp-facts" data-animate data-dir="right">
                <div class="dp-fact"><span class="dp-fact__num">1836</span><p><strong>The Battleground next door</strong>San Jacinto, the treaty cabin on Buffalo Bayou and the Monument on the east side of town.</p></div>
                <div class="dp-fact"><span class="dp-fact__num">1922</span><p><strong>First school on Center Street</strong>Deer Park ISD traces back to a single elementary on Center Street along Highway 225.</p></div>
                <div class="dp-fact"><span class="dp-fact__num">18</span><p><strong>Holes at Battleground Golf Course</strong>Every tee box carries a granite marker for a person, place or event from the battle.</p></div>
                <figure class="dp-local__photo">
                    <?php echo areaPhoto('patio-cover-fans', 'Covered patio with beadboard ceiling and fans', 1200, 1600, '(max-width: 1024px) 100vw, 30vw'); ?>
                </figure>
            </div>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="dp-section dp-section--alt" aria-labelledby="dp-svc-title">
    <div class="container">
        <span class="dp-eyebrow">One call for the whole exterior</span>
        <h2 id="dp-svc-title">Roofing, siding, gutters, patio covers and fences for Deer Park homes</h2>
        <p class="dp-lead"><?php echo htmlspecialchars($shortName); ?> roofs the house and builds the rest of the outside — so the gutters, the fascia and the back fence can go on the same written estimate as the roof.</p>

        <div class="dp-ledger" data-animate data-dir="scale">
            <a href="/services/roof-replacement/"><span class="dp-ledger__icon"><?php echo icon('home', 22); ?></span><strong>Roof Replacement</strong><span>Architectural shingle and metal. Tear-off, decking, underlayment, flashing, cleanup.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/roof-repair/"><span class="dp-ledger__icon"><?php echo icon('wrench', 22); ?></span><strong>Roof Repair</strong><span>Leaks, corroded flashing, pipe boots and wood rot — fixed at the source.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/roof-inspection/"><span class="dp-ledger__icon"><?php echo icon('search', 22); ?></span><strong>Roof Inspection</strong><span>Free, photo-documented, with a written estimate you can keep.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/storm-damage-repair/"><span class="dp-ledger__icon"><?php echo icon('wind', 22); ?></span><strong>Storm &amp; Wind Damage</strong><span>Hurricane, wind and hail repair, documented for your claim. Ask about temporary tarping.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/roof-damage-repair/"><span class="dp-ledger__icon"><?php echo icon('hammer', 22); ?></span><strong>Roof Damage Repair</strong><span>Aging decking, failed flashing and worn shingles on older homes.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/attic-venting/"><span class="dp-ledger__icon"><?php echo icon('wind', 22); ?></span><strong>Attic Venting</strong><span>Balanced intake and exhaust for ranch homes that were never vented properly.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/gutter-installation/"><span class="dp-ledger__icon"><?php echo icon('droplets', 22); ?></span><strong>Gutters</strong><span>New gutters and downspouts that carry hard Gulf rain off the slab.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/siding-fascia-soffit/"><span class="dp-ledger__icon"><?php echo icon('ruler', 22); ?></span><strong>Siding, Fascia &amp; Soffit</strong><span>Hardie and vinyl siding, wood-rot repair, window re-sealing, exterior paint.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/patio-covers-decks/"><span class="dp-ledger__icon"><?php echo icon('hammer', 22); ?></span><strong>Patio Covers, Pergolas &amp; Decks</strong><span>Covered, screened and enclosed patios, pergolas, wood decks.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a href="/services/fences-gates/"><span class="dp-ledger__icon"><?php echo icon('shield', 22); ?></span><strong>Fences &amp; Gates</strong><span>Cedar and pine privacy fences and custom gates, new builds and repairs.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
        </div>
    </div>
</section>

<div class="dp-divider dp-divider--peak" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,60 720,0 1440,60"/></svg>
</div>

<!-- ===================== SIGNATURE: CORROSION SPEC SHEET ===================== -->
<section class="dp-section dp-section--dark" aria-labelledby="dp-spec-title">
    <div class="container">
        <div class="dp-spec">
            <div>
                <span class="dp-eyebrow">Salt air and refinery row</span>
                <h2 id="dp-spec-title">What we check for on a Deer Park roof that we might not check elsewhere</h2>
                <p class="dp-lead">Being this close to the Ship Channel and Galveston Bay is hard on metal. Here is the spec sheet we work from on every inspection in town — and how shingle and metal each handle it.</p>
                <div class="dp-spec__media" data-animate data-dir="left">
                    <figure class="dp-spec__photo">
                        <?php echo areaPhoto('roof-repair-v2', 'New step flashing sealed against a brick chimney during a roof repair', 1200, 1600, '(max-width: 1024px) 50vw, 20vw'); ?>
                    </figure>
                    <figure class="dp-spec__photo">
                        <?php echo areaPhoto('roof-overhead', 'Overhead view of a completed architectural shingle roof', 1200, 1600, '(max-width: 1024px) 50vw, 20vw'); ?>
                    </figure>
                </div>
            </div>

            <div data-animate data-dir="right">
                <div class="dp-spec__sheet">
                    <div class="dp-spec__head" aria-hidden="true"><span></span><span>Component</span><span>What we do about it</span></div>
                    <dl>
                        <div class="dp-spec__row">
                            <dt>Nail heads and fasteners<small>Shingle and metal</small></dt>
                            <dd>Rusting fasteners back out and lift shingles or loosen panels. We use coated or galvanized fasteners throughout and check exposed heads on every slope.</dd>
                        </div>
                        <div class="dp-spec__row">
                            <dt>Step and counter flashing<small>Brick chimneys and walls</small></dt>
                            <dd>Brick ranch homes depend on flashing that corrodes from the back side first. We replace it rather than caulk over it — see <a href="/services/roof-repair/">roof repair</a>.</dd>
                        </div>
                        <div class="dp-spec__row">
                            <dt>Pipe boots and vents<small>Every penetration</small></dt>
                            <dd>Metal boots and turbine vents pit and seize in salt air. New boots, new <a href="/services/attic-venting/">box or ridge vents</a>, properly sealed.</dd>
                        </div>
                        <div class="dp-spec__row">
                            <dt>Metal panels and trim<small>Metal roofs</small></dt>
                            <dd>Panel coating, cut edges and trim laps are where corrosion starts. We specify the panel and the fasteners for this environment, not a generic one.</dd>
                        </div>
                        <div class="dp-spec__row">
                            <dt>Gutters and hangers<small>All homes</small></dt>
                            <dd>Hangers fail before the gutter does. <a href="/services/gutter-installation/">New gutters</a> get hangers and screws that match the environment.</dd>
                        </div>
                        <div class="dp-spec__row">
                            <dt>Patio cover and fence hardware<small>The rest of the exterior</small></dt>
                            <dd>Post bases, brackets and gate hinges rust the same way. <a href="/services/patio-covers-decks/">Patio covers</a> and <a href="/services/fences-gates/">fences</a> get hardware that lasts.</dd>
                        </div>
                    </dl>
                </div>
                <p class="dp-spec__foot">And one rule that applies to every shingle roof: manufacturers can void or limit the shingle warranty when the attic is not properly ventilated. Balanced intake and exhaust is part of every replacement we write — see <a href="/services/attic-venting/">attic venting</a>.</p>
            </div>
        </div>
    </div>
</section>

<div class="dp-divider dp-divider--notch" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,60 600,60 720,0 840,60 1440,60 1440,60 0,60"/><rect x="0" y="58" width="1440" height="2"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="dp-section" aria-labelledby="dp-claims-title">
    <div class="container">
        <div class="dp-claims">
            <figure class="dp-claims__photo" data-animate data-dir="left">
                <?php echo areaPhoto('owner-father-v2', 'Glenn and Tim Menn, the father-and-son team behind Triple G Roofing & Construction', 1152, 1536, '(max-width: 1024px) 100vw, 40vw'); ?>
                <figcaption>Glenn &amp; Tim Menn <span>The father-and-son team behind Triple G</span></figcaption>
            </figure>
            <div data-animate data-dir="right">
                <span class="dp-eyebrow">Wind &amp; hail claims</span>
                <h2 id="dp-claims-title">More than 50 years of claims experience, on your side of the roof</h2>
                <p>
                    Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience to every storm job.
                    We know what an adjuster needs to see, we know what the policy language means, and we take the stress of the
                    process off your plate and put it on ours.
                </p>
                <p class="dp-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. We make sure the damage is documented properly and that you understand your options before you sign anything.</p>
                <ol class="dp-steps">
                    <li><strong>Document</strong>Photos of every slope and every strike before anything is touched.</li>
                    <li><strong>Meet the adjuster</strong>At your home, on the roof, together.</li>
                    <li><strong>Explain the policy</strong>Deductible, depreciation and scope, in plain English.</li>
                    <li><strong>Do the work as agreed</strong>Owner on site, property protected, full cleanup and magnet sweep.</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="dp-section dp-section--alt" aria-labelledby="dp-reviews-title">
    <div class="container">
        <span class="dp-eyebrow">From our customers</span>
        <h2 id="dp-reviews-title">What homeowners across Greater Houston say about Triple G</h2>
        <p class="dp-lead">Real reviews from homeowners across Greater Houston, published by the client with first name and city.</p>
        <div class="dp-reviews">
            <?php foreach ($cityReviews as $i => $r): ?>
            <article class="dp-review" data-animate data-dir="<?php echo ['scale', 'down', 'scale'][$i % 3]; ?>">
                <div class="dp-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                <div>
                    <div class="dp-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                    <p><?php echo htmlspecialchars($r['text']); ?></p>
                    <footer><?php echo htmlspecialchars($r['name']); ?> · <span><?php echo htmlspecialchars($r['city']); ?></span></footer>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="dp-section" aria-labelledby="dp-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="dp-eyebrow">Common questions</span>
            <h2 id="dp-faq-title">Straight answers before you call</h2>
        </div>
        <div class="dp-faq" data-animate data-dir="down">
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
<section class="dp-section dp-section--alt" aria-labelledby="dp-nearby-title">
    <div class="container">
        <span class="dp-eyebrow">Nearby communities</span>
        <h2 id="dp-nearby-title">Pasadena and La Porte next door, Baytown across the channel</h2>
        <p class="dp-lead">Deer Park sits between Pasadena and La Porte along Highway 225, with Baytown across the Fred Hartman Bridge and Channelview and Highlands up the other side of the Ship Channel. We cover more than 50 Greater Houston communities in all.</p>
        <div class="dp-nearby">
            <?php foreach ($nearbyCities as $c):
                $slug = getAreaSlug($c);
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/service-areas/' . $slug . '/index.php')): ?>
            <a href="/service-areas/<?php echo $slug; ?>/"><?php echo htmlspecialchars($c); ?>, TX <?php echo icon('arrow-up', 18); ?></a>
            <?php else: ?>
            <span><?php echo htmlspecialchars($c); ?>, TX</span>
            <?php endif; endforeach; ?>
        </div>
        <div class="dp-chips">
            <?php foreach (['South Houston', 'Jacinto City', 'Cloverleaf', 'Mont Belvieu', 'Old River-Winfree', 'Crosby', 'Humble'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="dp-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="dp-cta" aria-labelledby="dp-cta-title">
    <div class="container">
        <div class="dp-cta__inner">
            <div>
                <h2 id="dp-cta-title">Shingle or metal — get a free roof inspection in Deer Park</h2>
                <p>Call and we'll come take a look at the roof, the flashing and the fasteners. Photos of what we find, a written estimate, and no pressure — the way this father-and-son team has worked since 1973.</p>
            </div>
            <div class="dp-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
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
    "name": "Roofing, Metal Roofs & Repair in <?php echo htmlspecialchars($areaName); ?>, TX",
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
