<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Atascocita';
$pageTitle = 'Roof Repair, Replacement & Fences in Atascocita, TX | ' . $siteName;
$pageDescription = 'Roof repair and replacement, storm damage, siding, gutters, patio covers and fences in Atascocita, TX from a family-owned contractor based in nearby Humble, in business since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/atascocita/';

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
$cityReviews = array_slice(array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Atascocita, TX')), 0, 3);

$areaFaqs = [
    [
        'q' => 'Can you find a roof leak that other roofers could not?',
        'a' => 'We start every leak call the same way: a free inspection where we trace the water path from where it shows up inside back to where it actually enters — which is often several feet away at a chimney, a pipe boot, a valley or a nail pop. We photograph what we find and show you before we fix anything. One Atascocita homeowner had paid two other companies before we found the source.',
    ],
    [
        'q' => 'Do you build fences and gates in Atascocita?',
        'a' => 'Yes. Triple G Roofing & Construction builds cedar and pine privacy fences, ranch rail and custom gates, and repairs or replaces existing fences. We handle the neighbor coordination when a shared line is involved. Like every project, the written estimate is free.',
    ],
    [
        'q' => 'Will you help with my insurance claim after hail or wind damage?',
        'a' => 'We help you through the whole process. With more than 50 years of roofing, claims-handling and adjuster experience, we document the damage, meet the adjuster at your home and explain your policy in plain English. Whether a claim is approved, and for how much, is the carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix at-
   Tokens only. Gradient hero with overlapping photo duo,
   leak-path signature section, service cards, reviews, FAQ.
   ========================================================== */

/* ---------- Hero ---------- */
.at-hero {
    position: relative;
    overflow: hidden;
    background:
        radial-gradient(ellipse at 80% 10%, color-mix(in srgb, var(--color-accent) 30%, transparent) 0%, transparent 45%),
        linear-gradient(160deg, var(--color-primary-dark) 0%, var(--color-dark) 60%, var(--color-dark-alt) 100%);
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
    isolation: isolate;
}

.at-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.06;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.at-hero::after {
    content: '';
    position: absolute;
    z-index: -1;
    width: 640px;
    height: 640px;
    border-radius: var(--radius-full);
    border: 1px solid color-mix(in srgb, var(--color-white) 10%, transparent);
    right: -200px;
    bottom: -320px;
    pointer-events: none;
}

.at-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
    gap: var(--space-12);
    align-items: center;
}

.at-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 55%, transparent);
}

.at-breadcrumb a { color: color-mix(in srgb, var(--color-white) 85%, transparent); transition: color var(--transition-fast); }
.at-breadcrumb a:hover { color: var(--color-white); }
.at-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.at-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: var(--space-4);
}

.at-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 4.6vw, 3.6rem);
    line-height: 1.08;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.at-hero h1 .text-accent { color: var(--color-accent); }

.at-hero__answer {
    background: color-mix(in srgb, var(--color-white) 9%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 16%, transparent);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    margin-bottom: var(--space-6);
    position: relative;
}

.at-hero__answer::before {
    content: '';
    position: absolute;
    left: 0;
    top: var(--space-6);
    bottom: var(--space-6);
    width: 4px;
    border-radius: 0 var(--radius-full) var(--radius-full) 0;
    background: var(--color-accent);
}

.at-hero__answer p {
    color: color-mix(in srgb, var(--color-white) 92%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.15rem);
    line-height: 1.7;
    margin: 0;
}

.at-ctas { display: flex; flex-wrap: wrap; gap: var(--space-4); }
.at-ctas .btn-lg { font-size: var(--font-size-base); }

/* Overlapping photo duo */
.at-duo {
    position: relative;
    height: 520px;
    justify-self: end;
    width: min(100%, 440px);
}

.at-duo__frame {
    position: absolute;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    border: 5px solid color-mix(in srgb, var(--color-white) 12%, transparent);
}

.at-duo__frame img { width: 100%; height: 100%; object-fit: cover; }

.at-duo__frame--a { width: 68%; aspect-ratio: 4 / 5; top: 0; left: 0; z-index: 1; }
.at-duo__frame--b { width: 52%; aspect-ratio: 4 / 5; right: 0; bottom: 0; z-index: 2; transform: rotate(2deg); }

.at-duo__tag {
    position: absolute;
    z-index: 3;
    left: 0;
    bottom: var(--space-6);
    background: var(--color-accent);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: var(--font-size-sm);
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-lg);
}

/* ---------- Trust strip ---------- */
.at-trust { background: var(--color-white); border-bottom: 1px solid var(--color-border); }

.at-trust ul {
    list-style: none;
    margin: 0;
    padding: var(--space-5) 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: var(--space-4) var(--space-8);
}

.at-trust li {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-dark);
}

.at-trust li svg { color: var(--color-primary); flex-shrink: 0; }

/* ---------- Section scaffolding ---------- */
.at-section { padding: var(--space-16) 0; }
.at-section--alt { background: var(--color-light); }
.at-section--dark { background: var(--color-dark); color: var(--color-white); }

.at-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.at-section h2 { font-size: clamp(1.75rem, 3.4vw, 2.5rem); line-height: 1.15; margin-bottom: var(--space-4); text-wrap: balance; }
.at-section--dark h2 { color: var(--color-white); }

.at-subtitle { font-family: var(--font-accent); font-size: var(--font-size-2xl); color: var(--color-accent); margin-bottom: var(--space-6); }

.at-prose p { color: var(--color-gray-dark); line-height: 1.8; margin-bottom: var(--space-5); max-width: 65ch; }
.at-prose a { color: var(--color-primary); font-weight: 600; }
.at-prose a:hover { text-decoration: underline; }
.at-lead { max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8; }

/* ---------- Local context: reversed split ---------- */
.at-local {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(0, 3fr);
    gap: var(--space-12);
    align-items: start;
}

.at-local__media { display: grid; gap: var(--space-5); position: sticky; top: calc(var(--nav-height) + var(--space-4)); }

.at-figure { overflow: hidden; border-radius: var(--radius-xl); box-shadow: var(--shadow-card); aspect-ratio: 4 / 5; }
.at-figure--squat { aspect-ratio: 5 / 4; }
.at-figure img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.at-figure:hover img { transform: scale(1.04); }

.at-stat {
    background: var(--color-dark);
    color: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    display: grid;
    gap: var(--space-1);
}

.at-stat strong { font-family: var(--font-heading); font-size: var(--font-size-4xl); line-height: 1; color: var(--color-accent); }
.at-stat span { font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); }

.at-places { list-style: none; margin: var(--space-6) 0; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }

.at-places li {
    padding: var(--space-5);
    border-radius: var(--radius-lg);
    background: var(--color-white);
    border: 1px solid var(--color-border);
    line-height: 1.6;
    color: var(--color-gray-dark);
    font-size: var(--font-size-sm);
    position: relative;
    overflow: hidden;
}

.at-places li::after {
    content: '';
    position: absolute;
    right: -24px;
    top: -24px;
    width: 72px;
    height: 72px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-accent) 18%, transparent);
}

.at-places li:nth-child(even)::after { background: color-mix(in srgb, var(--color-primary) 12%, transparent); }

.at-places strong { display: flex; align-items: center; gap: var(--space-2); color: var(--color-dark); font-family: var(--font-heading); margin-bottom: var(--space-2); }
.at-places strong svg { color: var(--color-primary); }

/* ---------- Signature: leak path ---------- */
.at-leak { position: relative; overflow: hidden; }

.at-leak::before {
    content: '';
    position: absolute;
    left: -120px;
    bottom: -120px;
    width: 420px;
    height: 420px;
    border-radius: var(--radius-full);
    background: var(--color-primary);
    opacity: 0.05;
    pointer-events: none;
}

.at-leak__grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: var(--space-12);
    align-items: center;
    margin-top: var(--space-8);
}

.at-path { list-style: none; margin: 0; padding: 0; position: relative; display: grid; gap: var(--space-4); }

.at-path::before {
    content: '';
    position: absolute;
    left: 22px;
    top: 24px;
    bottom: 24px;
    width: 2px;
    background: linear-gradient(180deg, var(--color-accent), var(--color-primary));
}

.at-path li {
    position: relative;
    display: grid;
    grid-template-columns: 46px 1fr;
    gap: var(--space-4);
    align-items: start;
}

.at-path__dot {
    width: 46px;
    height: 46px;
    border-radius: var(--radius-full);
    background: var(--color-white);
    border: 2px solid var(--color-primary);
    display: grid;
    place-items: center;
    color: var(--color-primary);
    box-shadow: var(--shadow-sm);
    position: relative;
    z-index: 1;
}

.at-path__body {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-4) var(--space-5);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.at-path li:hover .at-path__body { transform: translateX(4px); box-shadow: var(--shadow-md); }
.at-path__body strong { display: block; font-family: var(--font-heading); color: var(--color-dark); margin-bottom: var(--space-1); }
.at-path__body span { font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6; }

.at-quote {
    background: var(--color-dark);
    color: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-8);
    position: relative;
}

.at-quote::before {
    content: '\201C';
    position: absolute;
    top: var(--space-2);
    left: var(--space-6);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    color: color-mix(in srgb, var(--color-accent) 60%, transparent);
    line-height: 1;
}

.at-quote p { color: color-mix(in srgb, var(--color-white) 90%, transparent); line-height: 1.75; margin: var(--space-4) 0 var(--space-4); font-style: italic; }
.at-quote footer { font-family: var(--font-heading); font-size: var(--font-size-sm); color: var(--color-accent); }

/* ---------- Service cards ---------- */
.at-services { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-5); margin-top: var(--space-8); }

.at-svc {
    position: relative;
    display: flex;
    flex-direction: column;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--color-border);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.at-svc:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.at-svc--tint-1 { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.at-svc--tint-2 { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.at-svc--tint-3 { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.at-svc__img { aspect-ratio: 3 / 2; overflow: hidden; }
.at-svc__img img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.at-svc:hover .at-svc__img img { transform: scale(1.05); }

.at-svc__body { padding: var(--space-5) var(--space-6) var(--space-6); display: flex; flex-direction: column; gap: var(--space-3); flex: 1; }
.at-svc__body h3 { font-size: var(--font-size-xl); }
.at-svc__body p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; flex: 1; }

.at-svc__link { display: inline-flex; align-items: center; gap: var(--space-2); color: var(--color-primary); font-family: var(--font-heading); font-weight: 600; font-size: var(--font-size-sm); }
.at-svc__link svg { transition: transform var(--transition-fast); }
.at-svc:hover .at-svc__link svg { transform: translateX(4px); }

.at-more { margin-top: var(--space-6); display: flex; flex-wrap: wrap; gap: var(--space-2); align-items: center; }
.at-more > span { font-family: var(--font-heading); font-weight: 600; color: var(--color-dark); margin-right: var(--space-2); }

.at-more a {
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    border: 1px solid var(--color-border);
    background: var(--color-white);
    font-size: var(--font-size-sm);
    color: var(--color-dark);
    transition: background var(--transition-fast), color var(--transition-fast), border-color var(--transition-fast);
}

.at-more a:hover { background: var(--color-primary); border-color: var(--color-primary); color: var(--color-white); }

/* ---------- Claims ---------- */
.at-claims { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: var(--space-12); align-items: center; }
.at-claims p { color: color-mix(in srgb, var(--color-white) 82%, transparent); line-height: 1.8; max-width: 58ch; }

.at-claims__steps { list-style: none; margin: 0; padding: 0; counter-reset: atstep; display: grid; gap: var(--space-3); }

.at-claims__steps li {
    counter-increment: atstep;
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

.at-claims__steps li::before {
    content: counter(atstep);
    width: 40px;
    height: 40px;
    border-radius: var(--radius-md);
    display: grid;
    place-items: center;
    background: var(--color-accent);
    color: var(--color-dark);
    font-family: var(--font-heading);
    font-weight: 800;
}

.at-claims__note { margin-top: var(--space-5); font-size: var(--font-size-sm); color: color-mix(in srgb, var(--color-white) 75%, transparent); border-left: 3px solid var(--color-accent); padding-left: var(--space-4); }

/* ---------- Reviews ---------- */
.at-reviews { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 320px), 1fr)); gap: var(--space-6); margin-top: var(--space-8); }

.at-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-6) var(--space-6) var(--space-6) var(--space-8);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
}

.at-review::before {
    content: '';
    position: absolute;
    left: 0;
    top: var(--space-6);
    bottom: var(--space-6);
    width: 4px;
    border-radius: 0 var(--radius-full) var(--radius-full) 0;
    background: var(--color-accent);
}

.at-review:nth-child(even)::before { background: var(--color-primary); }
.at-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.at-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); }
.at-review footer { display: flex; align-items: center; gap: var(--space-3); font-family: var(--font-heading); font-size: var(--font-size-sm); }
.at-review__avatar { width: 40px; height: 40px; border-radius: var(--radius-full); display: grid; place-items: center; background: var(--color-primary); color: var(--color-white); font-weight: 700; }
.at-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.at-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }
.at-faq details { background: var(--color-white); border: 1px solid var(--color-border); border-radius: var(--radius-lg); overflow: hidden; }
.at-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.at-faq summary {
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

.at-faq summary::-webkit-details-marker { display: none; }
.at-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.at-faq details[open] summary svg { transform: rotate(45deg); }
.at-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby ---------- */
.at-nearby { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-4); margin-top: var(--space-8); }

.at-nearby a {
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

.at-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.at-nearby a svg { color: var(--color-primary); }

.at-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }
.at-chips span, .at-chips a { font-size: var(--font-size-xs); padding: var(--space-1) var(--space-3); border-radius: var(--radius-full); background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white)); color: var(--color-gray-dark); }
.at-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }
.at-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- Dividers ---------- */
.at-divider { line-height: 0; display: block; }
.at-divider svg { width: 100%; height: 60px; display: block; }
.at-divider--wave { background: var(--color-white); }
.at-divider--wave svg { fill: var(--color-light); }
.at-divider--peak { background: var(--color-white); }
.at-divider--peak svg { fill: var(--color-dark); }

/* ---------- CTA ---------- */
.at-cta { position: relative; overflow: hidden; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); padding: var(--space-16) 0; text-align: center; }

.at-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 120%, color-mix(in srgb, var(--color-white) 12%, transparent) 0%, transparent 60%);
    pointer-events: none;
}

.at-cta h2 { color: var(--color-white); font-size: clamp(1.75rem, 3.4vw, 2.5rem); margin-bottom: var(--space-3); text-wrap: balance; position: relative; }
.at-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); max-width: 60ch; margin: 0 auto var(--space-8); line-height: 1.7; position: relative; }
.at-cta .at-ctas { justify-content: center; position: relative; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .at-hero__grid { grid-template-columns: 1fr; }
    .at-duo { justify-self: start; height: 420px; width: min(100%, 380px); }
    .at-local { grid-template-columns: 1fr; }
    .at-local__media { position: static; grid-template-columns: 1fr 1fr; }
    .at-leak__grid { grid-template-columns: 1fr; }
    .at-claims { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .at-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .at-ctas .btn { width: 100%; justify-content: center; }
    .at-duo { display: none; }
    .at-local__media { grid-template-columns: 1fr; }
    .at-places { grid-template-columns: 1fr; }
    .at-section { padding: var(--space-12) 0; }
    .at-trust ul { justify-content: flex-start; }
}

@media (prefers-reduced-motion: reduce) {
    .at-figure img, .at-svc, .at-svc__img img, .at-path__body, .at-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="at-hero" aria-labelledby="at-title">
    <div class="container">
        <div class="at-hero__grid">
            <div>
                <nav class="at-breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="at-hero__eyebrow"><?php echo icon('map-pin', 14); ?> West shore of Lake Houston · one of 50+ communities we serve</span>

                <h1 id="at-title">Roof Repair, Replacement &amp; Storm Damage in <span class="text-accent">Atascocita</span>, TX</h1>

                <div class="at-hero__answer">
                    <p>
                        <strong><?php echo htmlspecialchars($siteName); ?> serves Atascocita, TX</strong> — one of more than 50 Greater Houston
                        communities covered by our family-owned, father-and-son team based in neighboring Humble, in business since 1973.
                        Leak repair, roof replacement, storm damage, siding, gutters, patio covers and fences, with a free inspection and
                        written estimate on every project.
                    </p>
                </div>

                <div class="at-ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
                </div>
            </div>

            <div class="at-duo" aria-hidden="false">
                <div class="at-duo__frame at-duo__frame--a">
                    <?php echo areaPhoto('roof-large-home', 'Large two-story brick home with a completed roof replacement', 1200, 1600, '(max-width: 1024px) 260px, 300px', true); ?>
                </div>
                <div class="at-duo__frame at-duo__frame--b">
                    <?php echo areaPhoto('fences-gates', 'New pine privacy fence with a Triple G Roofing yard sign', 1200, 1600, '(max-width: 1024px) 200px, 230px'); ?>
                </div>
                <span class="at-duo__tag">Roofing · Siding · Fences</span>
            </div>
        </div>
    </div>
</section>

<!-- ===================== TRUST STRIP ===================== -->
<div class="at-trust" aria-label="Why homeowners call Triple G">
    <div class="container">
        <ul>
            <li><?php echo icon('award', 20); ?> Nextdoor Neighborhood Favorite 2022–2024</li>
            <li><?php echo icon('hard-hat', 20); ?> The owner is on every job</li>
            <li><?php echo icon('home', 20); ?> Family owned since 1973</li>
            <li><?php echo icon('check-circle', 20); ?> Free inspections &amp; written estimates</li>
        </ul>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="at-section" aria-labelledby="at-local-title">
    <div class="container">
        <div class="at-local">
            <div class="at-local__media">
                <figure class="at-figure">
                    <?php echo areaPhoto('roof-repair-v2', 'New step flashing sealed against a brick chimney during a roof repair', 1200, 1600, '(max-width: 1024px) 50vw, 26vw'); ?>
                </figure>
                <div>
                    <div class="at-stat" style="margin-bottom: var(--space-5);">
                        <strong>1973</strong>
                        <span>Serving the Greater Houston area since</span>
                    </div>
                    <figure class="at-figure at-figure--squat">
                        <?php echo areaPhoto('roof-overhead', 'Overhead view of a completed architectural shingle roof', 1200, 1600, '(max-width: 1024px) 50vw, 26vw'); ?>
                    </figure>
                </div>
            </div>

            <div class="at-prose">
                <span class="at-eyebrow">West shore of Lake Houston</span>
                <h2 id="at-local-title">Lakeside wind, Gulf humidity and two generations of subdivisions</h2>
                <p class="at-subtitle">The lake makes it beautiful. It also makes roofs work harder.</p>

                <p>
                    Atascocita is an unincorporated Harris County community wedged between Humble and the west shore of Lake Houston,
                    strung along FM 1960 and West Lake Houston Parkway. The older half dates to the 1970s and '80s — Walden on Lake
                    Houston around the golf course, Atascocita Shores and the Oaks of Atascocita — while the newer half, Eagle Springs and
                    Lakeshore along the parkway, went up through the 2000s and 2010s. Kids go to Humble ISD schools, including Atascocita
                    High School on Will Clayton Parkway.
                </p>
                <p>
                    Two things shape roofing here. First, the lake: homes on the water side take unbroken southerly wind, which is why
                    we see so many lifted hip and ridge caps and wind-creased shingles after a front. Second, the humidity that comes
                    with it — black algae streaking on north slopes, and attics that run hot and damp when ventilation is undersized.
                    Here we look at the edges and the ridges first, because that's where the wind starts the damage.
                </p>

                <ul class="at-places">
                    <li><strong><?php echo icon('map-pin', 16); ?> Walden on Lake Houston</strong> 1970s–80s homes with complex roof lines and dormers; original roofs long replaced, many second roofs now aging out.</li>
                    <li><strong><?php echo icon('map-pin', 16); ?> Atascocita Shores &amp; the Oaks</strong> Mature trees, shaded slopes, and fences that have reached the end of their life — we replaced one on a shared line with the neighbor's blessing.</li>
                    <li><strong><?php echo icon('map-pin', 16); ?> Eagle Springs &amp; Lakeshore</strong> 2000s–2010s builds with steep, cut-up roofs, HOA color palettes, and builder-grade shingles meeting their first hail.</li>
                    <li><strong><?php echo icon('map-pin', 16); ?> FM 1960 &amp; West Lake Houston Parkway</strong> The commercial spine — and the homes just behind it, where we get a lot of leak-repair calls.</li>
                </ul>

                <p>
                    Searching for <strong>roof leak repair near me in Atascocita</strong>? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>. The inspection is free, and we show you photos
                    of what we find before we recommend anything.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="at-divider at-divider--wave" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,60 C240,0 480,0 720,30 C960,60 1200,60 1440,10 L1440,60 Z"/></svg>
</div>

<!-- ===================== SIGNATURE: WHERE THE LEAK REALLY IS ===================== -->
<section class="at-section at-section--alt at-leak" aria-labelledby="at-leak-title">
    <div class="container">
        <span class="at-eyebrow">The leak is rarely where the stain is</span>
        <h2 id="at-leak-title">How we trace a roof leak back to its source</h2>
        <p class="at-lead">Water runs downhill along rafters and decking before it shows up on a ceiling. These are the five places we check first, in order, before anyone talks about a new roof.</p>

        <div class="at-leak__grid">
            <ol class="at-path">
                <li><span class="at-path__dot"><?php echo icon('home', 20); ?></span><div class="at-path__body"><strong>Chimney step &amp; counter flashing</strong><span>Sealant fails long before shingles do. We reseal or replace the flashing rather than smearing tar over it.</span></div></li>
                <li><span class="at-path__dot"><?php echo icon('droplets', 20); ?></span><div class="at-path__body"><strong>Pipe boots &amp; vents</strong><span>Rubber boots crack in Texas sun. A small split can run water down the pipe for years.</span></div></li>
                <li><span class="at-path__dot"><?php echo icon('wind', 20); ?></span><div class="at-path__body"><strong>Valleys &amp; dead valleys</strong><span>Where two slopes meet — and where lake-side homes with cut-up roofs concentrate the most water.</span></div></li>
                <li><span class="at-path__dot"><?php echo icon('wrench', 20); ?></span><div class="at-path__body"><strong>Nail pops &amp; old mounts</strong><span>Satellite dishes, old antenna brackets and backed-out nails leave holes you can't see from the ground.</span></div></li>
                <li><span class="at-path__dot"><?php echo icon('search', 20); ?></span><div class="at-path__body"><strong>Attic, from the inside</strong><span>Water stains on the decking tell us exactly where to look on top. We photograph it so you can see it too.</span></div></li>
            </ol>

            <?php $va = array_values(array_filter($cityReviews, fn($t) => $t['name'] === 'Virginia')); if (!empty($va)): ?>
            <blockquote class="at-quote" data-animate>
                <p><?php echo htmlspecialchars($va[0]['text']); ?></p>
                <footer>— <?php echo htmlspecialchars($va[0]['name']); ?>, <?php echo htmlspecialchars($va[0]['city']); ?></footer>
            </blockquote>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="at-section" aria-labelledby="at-svc-title">
    <div class="container">
        <span class="at-eyebrow">What we do here</span>
        <h2 id="at-svc-title">Roofing first — then siding, gutters, patios and fences</h2>
        <p class="at-lead"><?php echo htmlspecialchars($shortName); ?> handles the whole exterior, so the crew that fixed your roof can come back for the fence, the gutters or the patio cover.</p>

        <div class="at-services">
            <article class="at-svc at-svc--tint-1" data-animate>
                <div class="at-svc__img"><?php echo areaPhoto('roof-inspection-v2', 'Close-up of cracked and lifted shingles found during a roof inspection', 1200, 1600, '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 380px'); ?></div>
                <div class="at-svc__body">
                    <h3>Roof Repair &amp; Inspection</h3>
                    <p>Leak tracing, flashing, pipe boots, wind-lifted shingles and wood rot. Every inspection is free and comes with photos of what we found.</p>
                    <a class="at-svc__link" href="/services/roof-repair/">Roof repair <?php echo icon('arrow-up', 16); ?></a>
                </div>
            </article>
            <article class="at-svc at-svc--tint-2" data-animate>
                <div class="at-svc__img"><?php echo areaPhoto('roof-replacement', 'Triple G crew replacing the roof on a two-story brick home', 1200, 1600, '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 380px'); ?></div>
                <div class="at-svc__body">
                    <h3>Roof Replacement</h3>
                    <p>Architectural shingle and metal roofs with full tear-off, decking repair, new underlayment and flashing. Landscaping and pools covered; magnet sweep when we leave.</p>
                    <a class="at-svc__link" href="/services/roof-replacement/">Roof replacement <?php echo icon('arrow-up', 16); ?></a>
                </div>
            </article>
            <article class="at-svc at-svc--tint-3" data-animate>
                <div class="at-svc__img"><?php echo areaPhoto('fence-gate-cedar', 'New cedar fence and double gate beside a brick home', 1200, 1600, '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 380px'); ?></div>
                <div class="at-svc__body">
                    <h3>Fences &amp; Gates</h3>
                    <p>Cedar and pine privacy fences, ranch rail and custom gates — new builds, repairs and replacements, including the neighbor conversation on a shared line.</p>
                    <a class="at-svc__link" href="/services/fences-gates/">Fences &amp; gates <?php echo icon('arrow-up', 16); ?></a>
                </div>
            </article>
        </div>

        <div class="at-more">
            <span>Also:</span>
            <a href="/services/storm-damage-repair/">Storm &amp; Wind Damage</a>
            <a href="/services/siding-fascia-soffit/">Siding, Fascia &amp; Soffit</a>
            <a href="/services/gutter-installation/">Gutters</a>
            <a href="/services/patio-covers-decks/">Patio Covers, Pergolas &amp; Decks</a>
            <a href="/services/attic-venting/">Attic Venting</a>
        </div>
    </div>
</section>

<div class="at-divider at-divider--peak" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><polygon points="0,60 720,0 1440,60"/></svg>
</div>

<!-- ===================== CLAIMS ===================== -->
<section class="at-section at-section--dark" aria-labelledby="at-claims-title">
    <div class="container">
        <div class="at-claims">
            <div>
                <span class="at-eyebrow">Hail, wind &amp; hurricane damage</span>
                <h2 id="at-claims-title">We handle the claim paperwork so you don't have to learn it</h2>
                <p>
                    Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster experience to every storm job
                    here. We take the stress of the process off your plate and put it on ours — from the first photo to the
                    final walk-through.
                </p>
                <p class="at-claims__note">Whether a claim is approved, and for how much, is your insurance carrier's decision. Our job is to document the damage properly and make sure you understand your options.</p>
            </div>
            <ol class="at-claims__steps">
                <li>Photograph and document every slope before anything is disturbed</li>
                <li>Meet the adjuster at your home and walk the roof together</li>
                <li>Explain your policy — deductible, depreciation, scope — in plain English</li>
                <li>Do the work as agreed, with the owner on site</li>
            </ol>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="at-section at-section--alt" aria-labelledby="at-reviews-title">
    <div class="container">
        <span class="at-eyebrow">From our customers</span>
        <h2 id="at-reviews-title">What Atascocita homeowners say about Triple G</h2>
        <p class="at-lead">Real reviews, published by the client with first name and city.</p>
        <div class="at-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="at-review" data-animate>
                <div class="at-review__stars" aria-label="Five star review"><?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?></div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="at-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="at-section" aria-labelledby="at-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="at-eyebrow">Common questions</span>
            <h2 id="at-faq-title">Straight answers before you call</h2>
        </div>
        <div class="at-faq">
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
<section class="at-section at-section--alt" aria-labelledby="at-nearby-title">
    <div class="container">
        <span class="at-eyebrow">Nearby communities</span>
        <h2 id="at-nearby-title">Around the lake and back toward town</h2>
        <p class="at-lead">Humble is next door, Kingwood is just across the San Jacinto, and the east side of the lake is a short drive over the FM 1960 bridge. We cover more than 50 Greater Houston communities in all.</p>
        <div class="at-nearby">
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/huffman/">Huffman, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/crosby/">Crosby, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="at-chips">
            <?php foreach (['Houston', 'Sheldon', 'Spring', 'Porter', 'Highlands', 'Cloverleaf', 'Channelview'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="at-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="at-cta" aria-labelledby="at-cta-title">
    <div class="container">
        <h2 id="at-cta-title">Got a leak, a storm-beaten roof or a tired fence?</h2>
        <p>Call and we'll come take a look. Free inspection, photos of what we find, written estimate — no pressure, the same way we've done it since 1973.</p>
        <div class="at-ctas">
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
    "name": "Roof Repair, Replacement & Fences in <?php echo htmlspecialchars($areaName); ?>, TX",
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
