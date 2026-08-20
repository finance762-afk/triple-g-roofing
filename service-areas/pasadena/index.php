<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Pasadena';
$pageTitle = 'Roofing & Storm Repair in Pasadena, TX | ' . $shortName;
$pageDescription = 'Roof replacement and storm damage repair in Pasadena, TX from a father-and-son team serving Greater Houston since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/pasadena/';

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

/* No review is tagged with this city yet — show real storm-damage reviews from across Greater Houston */
$cityReviews = getTestimonialsFor('storm-damage-repair', 3);

/* Nearby communities — linked only when that area page exists on disk, otherwise shown as a plain chip */
$nearbyCities = ['Deer Park', 'South Houston', 'La Porte', 'Houston', 'Galena Park', 'Channelview'];

$areaFaqs = [
    [
        'q' => 'How soon after a hurricane should I have my roof in Pasadena looked at?',
        'a' => 'As soon as it is safe to be outside. Wind damage is often invisible from the street — lifted shingles reseal themselves poorly, creased tabs tear off in the next front, and small openings let water into the decking for months. Call us, ask about temporary tarping if you have an active leak, and we will schedule a free photo-documented inspection so you have a record before you talk to your carrier.',
    ],
    [
        'q' => 'Do you work on the older 1950s and 1960s homes on the north side of Pasadena?',
        'a' => 'Yes. A large share of the housing here dates from the post-war boom, and those low-slope ranch roofs have their own issues: original decking, short overhangs, minimal attic ventilation and decades of layered repairs. We strip to the decking, replace what is rotted, install new underlayment and flashing, and add balanced ventilation so the new shingles last and their manufacturer warranty holds.',
    ],
    [
        'q' => 'Will you handle the insurance claim for me?',
        'a' => 'We walk it with you from start to finish. Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience: we photograph the damage, meet the adjuster on the roof and explain the policy in plain English. Whether a claim is approved, and for how much, is the insurance carrier\'s decision — we make sure nothing is missed.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix pa-
   Tokens only. Full-bleed photo hero with glass trust card,
   hurricane-season checklist signature section, north/south
   local context, scroll-snap services rail, claims, reviews,
   FAQ, nearby, CTA.
   ========================================================== */

/* ---------- Reveal direction modifiers (scoped to this page) ---------- */
[data-animate][data-dir="left"] { transform: translateX(-32px); }
[data-animate][data-dir="right"] { transform: translateX(32px); }
[data-animate][data-dir="down"] { transform: translateY(-28px); }
[data-animate][data-dir="scale"] { transform: scale(0.94); }
[data-animate][data-dir].animated { transform: none; }

/* ---------- Hero: full-bleed photo ---------- */
.pa-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    min-height: min(78vh, 820px);
    display: flex;
    align-items: flex-end;
    background: var(--color-dark);
}

.pa-hero__bg { position: absolute; inset: 0; z-index: -2; }
.pa-hero__bg img { width: 100%; height: 100%; object-fit: cover; object-position: center 40%; }

.pa-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--color-dark) 55%, transparent) 0%, color-mix(in srgb, var(--color-dark) 30%, transparent) 40%, color-mix(in srgb, var(--color-dark) 92%, transparent) 100%),
        linear-gradient(90deg, color-mix(in srgb, var(--color-dark) 70%, transparent) 0%, transparent 70%);
}

.pa-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.05;
    pointer-events: none;
    mix-blend-mode: overlay;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.pa-hero__inner { padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16); max-width: 720px; }

.pa-crumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 60%, transparent);
}

.pa-crumb a { color: color-mix(in srgb, var(--color-white) 88%, transparent); transition: color var(--transition-fast); }
.pa-crumb a:hover { color: var(--color-accent); }
.pa-crumb [aria-current] { color: var(--color-white); font-weight: 600; }

.pa-hero__kicker {
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

.pa-hero__kicker::after { content: ''; width: 40px; height: 2px; background: var(--color-accent); }

.pa-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.3rem, 5vw, 3.9rem);
    line-height: 1.05;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.pa-hero h1 mark { background: none; color: var(--color-accent); }

.pa-hero__lead {
    color: color-mix(in srgb, var(--color-white) 90%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.15rem);
    line-height: 1.7;
    max-width: 60ch;
    margin-bottom: var(--space-7);
}

.pa-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.pa-ctas .btn-lg { font-size: var(--font-size-base); }

/* Glass trust card overlapping the hero bottom edge */
.pa-trust { position: relative; z-index: 2; margin-top: calc(-1 * var(--space-10)); }

.pa-trust__card {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
}

.pa-trust__item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-5) var(--space-6);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-dark);
    border-right: 1px solid var(--color-border);
}

.pa-trust__item:last-child { border-right: 0; }
.pa-trust__item:nth-child(odd) { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }

.pa-trust__item svg {
    flex-shrink: 0;
    width: 36px;
    height: 36px;
    padding: 8px;
    border-radius: var(--radius-full);
    background: var(--color-primary);
    color: var(--color-white);
}

/* ---------- Section scaffolding ---------- */
.pa-section { padding: var(--space-16) 0; }
.pa-section--alt { background: var(--color-light); }
.pa-section--dark { background: var(--color-dark-alt); color: var(--color-white); }
.pa-section--check { padding-top: calc(var(--space-16) + var(--space-6)); }

.pa-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
    padding-bottom: var(--space-1);
    border-bottom: 2px solid var(--color-accent);
}

.pa-section--dark .pa-eyebrow { color: var(--color-accent); }
.pa-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.pa-section--dark h2 { color: var(--color-white); }
.pa-section h3 { text-wrap: balance; }
.pa-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }
.pa-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.pa-prose a { color: var(--color-primary); font-weight: 600; }
.pa-prose a:hover { text-decoration: underline; }
.pa-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }
.pa-section--dark .pa-lead { color: color-mix(in srgb, var(--color-white) 80%, transparent); }

/* ---------- Signature: hurricane-season checklist ---------- */
.pa-check { display: grid; grid-template-columns: minmax(0, 2fr) minmax(0, 3fr); gap: var(--space-12); align-items: start; }

.pa-check__intro { position: sticky; top: calc(var(--nav-height) + var(--space-4)); }
.pa-check__intro p { color: color-mix(in srgb, var(--color-white) 80%, transparent); line-height: 1.8; max-width: 50ch; margin-bottom: var(--space-5); }

.pa-check__photo {
    margin-top: var(--space-6);
    border-radius: var(--radius-xl);
    overflow: hidden;
    aspect-ratio: 4 / 5;
    max-width: 380px;
    box-shadow: var(--shadow-lg);
    position: relative;
}

.pa-check__photo img { width: 100%; height: 100%; object-fit: cover; }

.pa-check__photo::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 60%, color-mix(in srgb, var(--color-dark) 70%, transparent) 100%);
    pointer-events: none;
}

.pa-check__list { list-style: none; margin: 0; padding: 0; counter-reset: pastep; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }

.pa-check__item {
    counter-increment: pastep;
    position: relative;
    padding: var(--space-6) var(--space-5) var(--space-5);
    border-radius: var(--radius-xl);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 12%, transparent);
    transition: transform var(--transition-base), background var(--transition-base), border-color var(--transition-base);
}

.pa-check__item:hover { transform: translateY(-4px); background: color-mix(in srgb, var(--color-white) 10%, transparent); border-color: color-mix(in srgb, var(--color-accent) 50%, transparent); }

.pa-check__item::before {
    content: '0' counter(pastep);
    position: absolute;
    top: calc(-1 * var(--space-3));
    left: var(--space-5);
    padding: 2px var(--space-3);
    border-radius: var(--radius-full);
    background: var(--color-accent);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 800;
    letter-spacing: 0.08em;
}

.pa-check__item:nth-child(even)::before { background: var(--color-primary); color: var(--color-white); }
.pa-check__item h3 { color: var(--color-white); font-size: var(--font-size-lg); margin-bottom: var(--space-2); display: flex; align-items: center; gap: var(--space-2); }
.pa-check__item h3 svg { color: var(--color-accent); flex-shrink: 0; }
.pa-check__item p { color: color-mix(in srgb, var(--color-white) 78%, transparent); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }
.pa-check__item a { color: var(--color-accent); font-weight: 600; }
.pa-check__item a:hover { text-decoration: underline; }

/* ---------- Local context: north / south split ---------- */
.pa-local { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: var(--space-12); align-items: start; }

.pa-sides { display: grid; gap: var(--space-5); }

.pa-side {
    position: relative;
    padding: var(--space-6);
    border-radius: var(--radius-xl);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    box-shadow: var(--shadow-card);
    overflow: hidden;
}

.pa-side:nth-child(1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.pa-side:nth-child(2) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }

.pa-side::before {
    content: attr(data-label);
    position: absolute;
    right: var(--space-4);
    top: var(--space-3);
    font-family: var(--font-heading);
    font-size: var(--font-size-5xl);
    font-weight: 800;
    line-height: 1;
    color: color-mix(in srgb, var(--color-dark) 6%, transparent);
    letter-spacing: -0.04em;
    pointer-events: none;
}

.pa-side h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-2); position: relative; }
.pa-side p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin: 0 0 var(--space-3); position: relative; }
.pa-side ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-2); position: relative; }
.pa-side li { display: flex; gap: var(--space-2); font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5; }
.pa-side li svg { color: var(--color-primary); flex-shrink: 0; margin-top: 3px; }

.pa-local__photos { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); margin-top: var(--space-6); }
.pa-figure { border-radius: var(--radius-lg); overflow: hidden; aspect-ratio: 3 / 4; box-shadow: var(--shadow-card); }
.pa-figure:nth-child(2) { transform: translateY(var(--space-6)); }
.pa-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.pa-figure:hover img { transform: scale(1.04); }

/* ---------- Services: scroll-snap rail ---------- */
.pa-rail {
    margin-top: var(--space-8);
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: minmax(260px, 1fr);
    gap: var(--space-4);
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding-bottom: var(--space-4);
    scrollbar-width: thin;
    scrollbar-color: var(--color-primary) var(--color-light);
}

.pa-card {
    scroll-snap-align: start;
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    min-height: 100%;
    transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
}

.pa-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--color-primary); }
.pa-card:nth-child(3n+1) { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.pa-card:nth-child(3n+2) { background: color-mix(in srgb, var(--color-accent) 12%, var(--color-white)); }
.pa-card:nth-child(3n) { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.pa-card__icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; background: var(--color-white); color: var(--color-primary); box-shadow: var(--shadow-sm); }
.pa-card strong { font-family: var(--font-heading); color: var(--color-dark); font-size: var(--font-size-lg); }
.pa-card span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.55; flex: 1; }
.pa-card em { font-style: normal; color: var(--color-primary); font-family: var(--font-heading); font-size: var(--font-size-sm); font-weight: 600; display: inline-flex; align-items: center; gap: var(--space-1); }

.pa-rail__hint { margin-top: var(--space-2); font-size: var(--font-size-xs); color: var(--color-gray); display: flex; align-items: center; gap: var(--space-2); }
.pa-rail__hint svg { transform: rotate(90deg); color: var(--color-primary); }

.pa-vent {
    margin-top: var(--space-8);
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-5);
    align-items: center;
    padding: var(--space-5) var(--space-6);
    border-radius: var(--radius-xl);
    background: var(--color-dark);
    color: color-mix(in srgb, var(--color-white) 88%, transparent);
    line-height: 1.7;
}

.pa-vent svg { color: var(--color-accent); }
.pa-vent a { color: var(--color-accent); font-weight: 600; }

/* ---------- Claims: accent panel ---------- */
.pa-claims {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.pa-claims__copy { padding: var(--space-10); background: var(--color-white); }
.pa-claims__copy p { color: var(--color-gray-dark); line-height: 1.8; max-width: 55ch; margin-bottom: var(--space-4); }
.pa-claims__note { font-size: var(--font-size-sm); color: var(--color-gray-dark); border-left: 3px solid var(--color-primary); padding-left: var(--space-4); }

.pa-claims__steps {
    padding: var(--space-10);
    background: linear-gradient(160deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
    color: var(--color-white);
    list-style: none;
    margin: 0;
    counter-reset: paclaim;
    display: grid;
    gap: var(--space-4);
    align-content: center;
}

.pa-claims__steps li { counter-increment: paclaim; display: grid; grid-template-columns: 40px 1fr; gap: var(--space-4); align-items: start; line-height: 1.6; font-size: var(--font-size-sm); }

.pa-claims__steps li::before {
    content: counter(paclaim);
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: color-mix(in srgb, var(--color-white) 18%, transparent);
    border: 2px solid color-mix(in srgb, var(--color-white) 60%, transparent);
    font-family: var(--font-heading);
    font-weight: 800;
}

.pa-claims__steps strong { display: block; font-family: var(--font-heading); margin-bottom: 2px; }

/* ---------- Reviews ---------- */
.pa-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.pa-review {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
}

.pa-review__head { display: flex; align-items: center; justify-content: space-between; gap: var(--space-3); }
.pa-review__stars { display: flex; gap: 2px; color: var(--color-star); }
.pa-review__city { font-size: var(--font-size-xs); font-family: var(--font-heading); font-weight: 600; color: var(--color-primary); background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white)); padding: 2px var(--space-3); border-radius: var(--radius-full); }
.pa-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin: 0; flex: 1; }
.pa-review footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-dark); padding-top: var(--space-3); border-top: 1px solid var(--color-border); }

/* ---------- FAQ ---------- */
.pa-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.pa-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.pa-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.pa-faq summary {
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

.pa-faq summary::-webkit-details-marker { display: none; }
.pa-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.pa-faq details[open] summary svg { transform: rotate(45deg); }
.pa-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.pa-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.pa-nearby a,
.pa-nearby span {
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

.pa-nearby a { transition: border-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast); }
.pa-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.pa-nearby a svg { color: var(--color-primary); }
.pa-nearby span { color: var(--color-gray-dark); font-weight: 500; }

.pa-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.pa-chips span, .pa-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.pa-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.pa-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.pa-divider { line-height: 0; display: block; }
.pa-divider svg { width: 100%; height: 60px; display: block; }
.pa-divider--wave { background: var(--color-dark-alt); }
.pa-divider--wave svg { fill: var(--color-white); }
.pa-divider--tilt { background: var(--color-light); }
.pa-divider--tilt svg { fill: var(--color-white); }

/* ---------- CTA ---------- */
.pa-cta { position: relative; overflow: hidden; background: var(--color-dark); padding: var(--space-16) 0; text-align: center; }

.pa-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(90deg, transparent 0 48px, color-mix(in srgb, var(--color-white) 3%, transparent) 48px 49px);
    pointer-events: none;
}

.pa-cta::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    width: 60vw;
    height: 100%;
    transform: translateX(-50%);
    background: radial-gradient(ellipse at center top, color-mix(in srgb, var(--color-primary) 40%, transparent) 0%, transparent 65%);
    pointer-events: none;
}

.pa-cta .container { position: relative; z-index: 1; }
.pa-cta h2 { color: var(--color-white); font-size: clamp(1.75rem, 3.4vw, 2.5rem); margin-bottom: var(--space-3); text-wrap: balance; }
.pa-cta p { color: color-mix(in srgb, var(--color-white) 85%, transparent); max-width: 60ch; margin: 0 auto var(--space-8); line-height: 1.7; }
.pa-cta .pa-ctas { justify-content: center; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .pa-hero { min-height: 0; }
    .pa-trust__card { grid-template-columns: 1fr 1fr; }
    .pa-trust__item:nth-child(2) { border-right: 0; }
    .pa-trust__item:nth-child(-n+2) { border-bottom: 1px solid var(--color-border); }
    .pa-check { grid-template-columns: 1fr; }
    .pa-check__intro { position: static; }
    .pa-check__photo { max-width: 320px; }
    .pa-local { grid-template-columns: 1fr; }
    .pa-claims { grid-template-columns: 1fr; }
    .pa-vent { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .pa-hero__inner { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .pa-ctas .btn { width: 100%; justify-content: center; }
    .pa-trust__card { grid-template-columns: 1fr; }
    .pa-trust__item { border-right: 0; border-bottom: 1px solid var(--color-border); }
    .pa-trust__item:last-child { border-bottom: 0; }
    .pa-check__list { grid-template-columns: 1fr; }
    .pa-local__photos { grid-template-columns: 1fr; }
    .pa-figure:nth-child(2) { transform: none; }
    .pa-claims__copy, .pa-claims__steps { padding: var(--space-6); }
    .pa-section { padding: var(--space-12) 0; }
}

@media (prefers-reduced-motion: reduce) {
    .pa-figure img, .pa-check__item, .pa-card, .pa-nearby a { transition: none; }
    .pa-rail { scroll-behavior: auto; }
    [data-animate][data-dir] { transform: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="pa-hero" aria-labelledby="pa-title">
    <div class="pa-hero__bg" aria-hidden="true">
        <?php echo areaPhoto('hero-roof-home-v2', 'Brick home in the Greater Houston area with a new architectural shingle roof installed by Triple G Roofing & Construction', 1600, 900, '100vw', true); ?>
    </div>
    <div class="container">
        <div class="pa-hero__inner">
            <nav class="pa-crumb" aria-label="Breadcrumb">
                <a href="/">Home</a><span>/</span>
                <a href="/service-areas/">Service Areas</a><span>/</span>
                <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
            </nav>

            <span class="pa-hero__kicker">Southeast Harris County · one of 50+ communities we serve</span>

            <h1 id="pa-title">Roofing &amp; <mark>Storm Damage Repair</mark> in Pasadena, TX</h1>

            <p class="pa-hero__lead">
                Pasadena is one of more than 50 Greater Houston communities served by <?php echo htmlspecialchars($siteName); ?>,
                a family-owned father-and-son team based in Humble, TX, in business since 1973. Hurricane, wind and hail repair,
                shingle and metal roof replacement, siding, gutters, patio covers and fences — with a free inspection and a written
                estimate on every project.
            </p>

            <div class="pa-ctas">
                <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
            </div>
        </div>
    </div>
</section>

<div class="pa-trust">
    <div class="container">
        <div class="pa-trust__card">
            <div class="pa-trust__item"><?php echo icon('award', 20); ?> Nextdoor Neighborhood Favorite 2022–2024</div>
            <div class="pa-trust__item"><?php echo icon('hard-hat', 20); ?> The owner is on every job</div>
            <div class="pa-trust__item"><?php echo icon('home', 20); ?> Father-and-son team since 1973</div>
            <div class="pa-trust__item"><?php echo icon('check-circle', 20); ?> Free inspections &amp; written estimates</div>
        </div>
    </div>
</div>

<!-- ===================== SIGNATURE: HURRICANE-SEASON CHECKLIST ===================== -->
<section class="pa-section pa-section--dark pa-section--check" aria-labelledby="pa-check-title">
    <div class="container">
        <div class="pa-check">
            <div class="pa-check__intro">
                <span class="pa-eyebrow">Gulf wind, every season</span>
                <h2 id="pa-check-title">Six things we check on every Pasadena roof before and after a storm</h2>
                <p>
                    Pasadena sits on the south bank of the Houston Ship Channel with nothing between it and Galveston Bay but flat
                    coastal prairie. Ike came ashore in 2008 with sustained winds well over a hundred miles an hour, and Beryl
                    reminded everyone in 2024 that a "minor" hurricane still strips ridge caps and creases shingles. This is the
                    list we work through on every inspection here.
                </p>
                <div class="pa-ctas">
                    <a href="/services/storm-damage-repair/" class="btn btn-accent">Storm Damage Repair</a>
                </div>
                <figure class="pa-check__photo">
                    <?php echo areaPhoto('storm-damage-repair-v2', 'Tarped roof with a Triple G crew starting storm damage repairs', 1200, 1600, '(max-width: 1024px) 320px, 380px'); ?>
                </figure>
            </div>

            <ol class="pa-check__list">
                <li class="pa-check__item" data-animate data-dir="left">
                    <h3><?php echo icon('wind', 18); ?> Ridge caps and hips</h3>
                    <p>The first thing to go in straight-line wind. Lifted or missing caps open the highest point of the roof to rain.</p>
                </li>
                <li class="pa-check__item" data-animate data-dir="right">
                    <h3><?php echo icon('search', 18); ?> Creased and lifted tabs</h3>
                    <p>A shingle that folded back and lay flat again looks fine from the driveway and fails in the next front. We find them up close, on the roof.</p>
                </li>
                <li class="pa-check__item" data-animate data-dir="left">
                    <h3><?php echo icon('wrench', 18); ?> Flashing, boots and vents</h3>
                    <p>Chimney and wall flashing, pipe boots and turbine vents loosen in wind long before shingles do. Sealed or replaced, not caulked over.</p>
                </li>
                <li class="pa-check__item" data-animate data-dir="right">
                    <h3><?php echo icon('droplets', 18); ?> Gutters and downspouts</h3>
                    <p>Wind-bent gutters dump water at the slab. We straighten, re-hang or <a href="/services/gutter-installation/">replace gutters</a> so the ground around the foundation stays dry.</p>
                </li>
                <li class="pa-check__item" data-animate data-dir="left">
                    <h3><?php echo icon('home', 18); ?> Decking from the attic</h3>
                    <p>Daylight, stains and soft spots show up from below first. On older homes here we also check whether the attic is <a href="/services/attic-venting/">ventilated</a> at all.</p>
                </li>
                <li class="pa-check__item" data-animate data-dir="right">
                    <h3><?php echo icon('ruler', 18); ?> Siding, fascia and patio covers</h3>
                    <p>Wind peels <a href="/services/siding-fascia-soffit/">siding and fascia</a> and racks <a href="/services/patio-covers-decks/">patio covers</a>. One inspection covers the roof and everything attached to it.</p>
                </li>
            </ol>
        </div>
    </div>
</section>

<div class="pa-divider pa-divider--wave" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 L0,60 Z"/></svg>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="pa-section" aria-labelledby="pa-local-title">
    <div class="container">
        <div class="pa-local">
            <div class="pa-prose" data-animate data-dir="left">
                <span class="pa-eyebrow">Refinery row to the Fairmont corridor</span>
                <h2 id="pa-local-title">A working city with two generations of rooftops</h2>
                <p class="pa-subtitle">Post-war ranches up north, newer subdivisions down south.</p>

                <p>
                    Pasadena was laid out in 1893 and spent its first decades as a farm town — after the 1900 storm, Clara Barton's
                    Red Cross shipped in strawberry plants and the city became the strawberry capital of the Gulf Coast, which is
                    why the Strawberry Festival still fills the municipal fairgrounds on Fairmont Parkway every May. Then the Ship
                    Channel opened, the refineries and chemical plants lined up along State Highway 225, and the city grew into
                    one of the largest in Harris County.
                </p>
                <p>
                    Roughly a third of the homes here were built between 1940 and 1969, most of them in the older neighborhoods north
                    of Spencer Highway near Sam Rayburn High School and the original downtown. South of there, toward Fairmont
                    Parkway, Beltway 8, Pasadena Memorial High School and Armand Bayou, the subdivisions are newer and the roofs are
                    bigger. We work both halves of the city, and they need different things.
                </p>
                <p>
                    Looking for <strong>storm damage roof repair near me in Pasadena</strong>, or a straight answer on whether a
                    tired roof needs replacing? Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. Tim comes out
                    himself, the inspection is free, and you get photos and a written estimate before deciding anything.
                </p>

                <div class="pa-local__photos">
                    <figure class="pa-figure">
                        <?php echo areaPhoto('crew-underlayment', 'Triple G roofers installing synthetic underlayment on a steep roof', 1200, 1600, '(max-width: 640px) 100vw, 24vw'); ?>
                    </figure>
                    <figure class="pa-figure">
                        <?php echo areaPhoto('attic-venting-v2', 'Freshly shingled roof with box vents installed for attic ventilation', 1200, 1600, '(max-width: 640px) 100vw, 24vw'); ?>
                    </figure>
                </div>
            </div>

            <div class="pa-sides" data-animate data-dir="right">
                <article class="pa-side" data-label="N">
                    <h3>North of Spencer Highway</h3>
                    <p>Mid-century ranch homes along the SH 225 corridor, many with their original decking and decades of patch repairs. Industrial neighbors mean grit and humidity settle on every slope.</p>
                    <ul>
                        <li><?php echo icon('check-circle', 16); ?> Full tear-off and decking replacement where the wood has gone soft</li>
                        <li><?php echo icon('check-circle', 16); ?> New flashing at brick chimneys and short overhangs</li>
                        <li><?php echo icon('check-circle', 16); ?> Balanced attic ventilation added where there was none</li>
                        <li><?php echo icon('check-circle', 16); ?> Wood-rot, fascia and soffit repair to finish the job</li>
                    </ul>
                </article>
                <article class="pa-side" data-label="S">
                    <h3>South toward Fairmont and the Beltway</h3>
                    <p>Newer two-story homes with larger, steeper roofs, more valleys and more surface facing the wind off the bay. Hail and wind claims are the common call.</p>
                    <ul>
                        <li><?php echo icon('check-circle', 16); ?> Photo-documented storm inspections after every named system</li>
                        <li><?php echo icon('check-circle', 16); ?> Architectural shingle or standing-seam metal replacement</li>
                        <li><?php echo icon('check-circle', 16); ?> Gutters sized for big roof planes and hard Gulf rain</li>
                        <li><?php echo icon('check-circle', 16); ?> Patio covers, pergolas and fences that match the house</li>
                    </ul>
                </article>
            </div>
        </div>
    </div>
</section>

<div class="pa-divider pa-divider--tilt" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,0 1440,0 1440,60"/></svg>
</div>

<!-- ===================== SERVICES ===================== -->
<section class="pa-section pa-section--alt" aria-labelledby="pa-svc-title">
    <div class="container">
        <span class="pa-eyebrow">Everything on the outside of the house</span>
        <h2 id="pa-svc-title">Roofing, siding, gutters, patio covers and fences in Pasadena</h2>
        <p class="pa-lead"><?php echo htmlspecialchars($shortName); ?> is a roofing company that also builds the rest of the exterior — so a storm job can cover the fence that blew down and the patio cover that racked, in one written estimate.</p>

        <div class="pa-rail" tabindex="0" aria-label="Services — scroll sideways">
            <a class="pa-card" href="/services/roof-replacement/"><span class="pa-card__icon"><?php echo icon('home', 22); ?></span><strong>Roof Replacement</strong><span>Architectural shingle and metal. Full tear-off, decking repair, underlayment, flashing.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/storm-damage-repair/"><span class="pa-card__icon"><?php echo icon('wind', 22); ?></span><strong>Storm &amp; Wind Damage</strong><span>Hurricane, wind and hail repair, documented for your claim. Ask about temporary tarping.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/roof-repair/"><span class="pa-card__icon"><?php echo icon('wrench', 22); ?></span><strong>Roof Repair</strong><span>Leaks, flashing, pipe boots, wood rot — fixed at the source.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/roof-inspection/"><span class="pa-card__icon"><?php echo icon('search', 22); ?></span><strong>Roof Inspection</strong><span>Free, photo-documented, with a written estimate.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/roof-damage-repair/"><span class="pa-card__icon"><?php echo icon('hammer', 22); ?></span><strong>Roof Damage Repair</strong><span>Aging decking, failed flashing and worn shingles on older homes.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/attic-venting/"><span class="pa-card__icon"><?php echo icon('wind', 22); ?></span><strong>Attic Venting</strong><span>Balanced intake and exhaust that protects shingles in the Gulf heat.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/gutter-installation/"><span class="pa-card__icon"><?php echo icon('droplets', 22); ?></span><strong>Gutters</strong><span>New gutters and downspouts that move hard rain away from the slab.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/siding-fascia-soffit/"><span class="pa-card__icon"><?php echo icon('ruler', 22); ?></span><strong>Siding, Fascia &amp; Soffit</strong><span>Hardie and vinyl siding, wood-rot repair, window re-sealing, exterior paint.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/patio-covers-decks/"><span class="pa-card__icon"><?php echo icon('hammer', 22); ?></span><strong>Patio Covers, Pergolas &amp; Decks</strong><span>Covered, screened and enclosed patios, pergolas, wood decks.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
            <a class="pa-card" href="/services/fences-gates/"><span class="pa-card__icon"><?php echo icon('shield', 22); ?></span><strong>Fences &amp; Gates</strong><span>Cedar and pine privacy fences and custom gates, new or storm-replaced.</span><em>Learn more <?php echo icon('arrow-up', 14); ?></em></a>
        </div>
        <p class="pa-rail__hint"><?php echo icon('arrow-up', 14); ?> Scroll sideways to see all ten services</p>

        <div class="pa-vent" data-animate data-dir="scale">
            <?php echo icon('shield', 32); ?>
            <p>Worth knowing before any roof goes on: shingle manufacturers can void or limit the shingle warranty when the attic is not properly ventilated. We size balanced intake and exhaust on every replacement — see <a href="/services/attic-venting/">attic venting</a> for how it works.</p>
        </div>
    </div>
</section>

<!-- ===================== CLAIMS ===================== -->
<section class="pa-section" aria-labelledby="pa-claims-title">
    <div class="container">
        <div class="pa-claims" data-animate data-dir="scale">
            <div class="pa-claims__copy">
                <span class="pa-eyebrow">Hurricane, wind &amp; hail claims</span>
                <h2 id="pa-claims-title">Fifty-plus years of claims experience, on your side of the table</h2>
                <p>
                    Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience to every storm job.
                    We know what an adjuster needs to see, we know what the policy language means, and we take the stress of the
                    process off your plate and put it on ours.
                </p>
                <p class="pa-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. We make sure the damage is documented properly and that you understand your options before you sign anything.</p>
            </div>
            <ol class="pa-claims__steps">
                <li><div><strong>Document</strong>Photos of every slope and every strike before anything is touched.</div></li>
                <li><div><strong>Meet the adjuster</strong>At your home, on the roof, together.</div></li>
                <li><div><strong>Explain the policy</strong>Deductible, depreciation and scope, in plain English.</div></li>
                <li><div><strong>Do the work as agreed</strong>Owner on site, property protected, full cleanup and magnet sweep.</div></li>
            </ol>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="pa-section pa-section--alt" aria-labelledby="pa-reviews-title">
    <div class="container">
        <span class="pa-eyebrow">After the storm</span>
        <h2 id="pa-reviews-title">What homeowners across Greater Houston say after a storm claim</h2>
        <p class="pa-lead">Real reviews from homeowners across Greater Houston, published by the client with first name and city.</p>
        <div class="pa-reviews">
            <?php foreach ($cityReviews as $i => $r): ?>
            <article class="pa-review" data-animate data-dir="<?php echo ['down', 'scale', 'down'][$i % 3]; ?>">
                <div class="pa-review__head">
                    <div class="pa-review__stars" aria-label="Five star review"><?php for ($s = 0; $s < 5; $s++) { echo icon('star', 16); } ?></div>
                    <span class="pa-review__city"><?php echo htmlspecialchars($r['city']); ?></span>
                </div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer><?php echo htmlspecialchars($r['name']); ?></footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="pa-section" aria-labelledby="pa-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="pa-eyebrow">Common questions</span>
            <h2 id="pa-faq-title">Straight answers before you call</h2>
        </div>
        <div class="pa-faq" data-animate data-dir="down">
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
<section class="pa-section pa-section--alt" aria-labelledby="pa-nearby-title">
    <div class="container">
        <span class="pa-eyebrow">Nearby communities</span>
        <h2 id="pa-nearby-title">Down SH 225 to Deer Park and La Porte, up the Beltway to Channelview</h2>
        <p class="pa-lead">From here it's a short drive east on 225 to Deer Park and La Porte, west to South Houston, or across the Ship Channel to Galena Park and Channelview. We cover more than 50 Greater Houston communities in all.</p>
        <div class="pa-nearby">
            <?php foreach ($nearbyCities as $c):
                $slug = getAreaSlug($c);
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/service-areas/' . $slug . '/index.php')): ?>
            <a href="/service-areas/<?php echo $slug; ?>/"><?php echo htmlspecialchars($c); ?>, TX <?php echo icon('arrow-up', 18); ?></a>
            <?php else: ?>
            <span><?php echo htmlspecialchars($c); ?>, TX</span>
            <?php endif; endforeach; ?>
        </div>
        <div class="pa-chips">
            <?php foreach (['Jacinto City', 'Cloverleaf', 'Baytown', 'Highlands', 'Brookside Village', 'Bellaire', 'Humble'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="pa-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="pa-cta" aria-labelledby="pa-cta-title">
    <div class="container">
        <h2 id="pa-cta-title">Before the next storm or after the last one — get a free roof inspection in Pasadena</h2>
        <p>Call and we'll come take a look. Photos of what we find, a written estimate, and no pressure — the same way this father-and-son team has worked since 1973.</p>
        <div class="pa-ctas">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
            <a href="/contact/" class="btn btn-outline-white btn-lg">Request an Estimate</a>
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
    "name": "Roofing & Storm Damage Repair in <?php echo htmlspecialchars($areaName); ?>, TX",
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
