<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/testimonials-data.php';

$currentPage = 'service-areas';
$areaName = 'Huffman';
$pageTitle = 'Roofing, Siding & Storm Damage Repair in Huffman, TX | ' . $siteName;
$pageDescription = 'Roof replacement, storm repair, siding, gutters, patio covers and fences in Huffman, TX from a family-owned contractor serving Greater Houston since 1973. Free inspection: ' . $phone . '.';
$canonicalUrl = $siteUrl . '/service-areas/huffman/';
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

/* Real reviews from this community (names + cities exactly as the client published them) */
$cityReviews = array_slice(array_values(array_filter($testimonials, fn($t) => $t['city'] === 'Huffman, TX')), 0, 3);

$areaFaqs = [
    [
        'q' => 'Does Triple G Roofing & Construction work in Huffman, TX?',
        'a' => 'Yes. It is one of more than 50 Greater Houston communities Triple G Roofing & Construction serves from its base in Humble, TX. The company is a family-owned father-and-son team that has been in business since 1973, and the owner is on every job. Inspections and written estimates are free.',
    ],
    [
        'q' => 'What does a roof inspection on a wooded lot include?',
        'a' => 'We walk the roof, photograph what we find, and check the points that fail most often on wooded lots around Lake Houston: valleys packed with pine straw, shaded slopes that hold moisture, flashing around chimneys and pipe boots, and attic ventilation. You get the photos and a written estimate at no charge, with no obligation.',
    ],
    [
        'q' => 'Can you help with an insurance claim after storm damage?',
        'a' => 'We can help you through the process. With more than 50 years of roofing, claims-handling and adjuster experience, we document the damage, meet the adjuster at your home and explain your policy in plain English. Whether a claim is approved is always the insurance carrier\'s decision.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ==========================================================
   Area page — prefix hf-
   Tokens only. Layered split hero, wooded-lot signature
   section, real-review grid, FAQ, nearby communities.
   ========================================================== */

/* ---------- Hero (C1: layered, gradient + noise) ---------- */
.hf-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-dark-alt) 55%, var(--color-primary-dark) 100%);
    padding: calc(var(--nav-height) + var(--space-12)) 0 var(--space-16);
    isolation: isolate;
}

.hf-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -2;
    background:
        radial-gradient(ellipse at 15% 30%, color-mix(in srgb, var(--color-accent) 22%, transparent) 0%, transparent 55%),
        radial-gradient(ellipse at 85% 80%, color-mix(in srgb, var(--color-primary) 35%, transparent) 0%, transparent 50%);
}

.hf-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: -1;
    opacity: 0.07;
    pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.hf-hero__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
    gap: var(--space-12);
    align-items: center;
}

.hf-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--space-2);
    margin-bottom: var(--space-5);
    font-size: var(--font-size-sm);
    color: color-mix(in srgb, var(--color-white) 60%, transparent);
}

.hf-breadcrumb a {
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    transition: color var(--transition-fast);
}

.hf-breadcrumb a:hover { color: var(--color-white); }

.hf-breadcrumb [aria-current] { color: var(--color-white); font-weight: 600; }

.hf-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    border: 1px solid color-mix(in srgb, var(--color-accent) 55%, transparent);
    background: color-mix(in srgb, var(--color-accent) 14%, transparent);
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: var(--space-5);
}

.hf-hero h1 {
    color: var(--color-white);
    font-size: clamp(2.25rem, 4.6vw, 3.6rem);
    line-height: 1.08;
    margin-bottom: var(--space-5);
    text-wrap: balance;
}

.hf-hero h1 .text-accent {
    color: var(--color-accent);
}

.hf-hero__answer {
    background: color-mix(in srgb, var(--color-white) 10%, transparent);
    border: 1px solid color-mix(in srgb, var(--color-white) 18%, transparent);
    border-left: 4px solid var(--color-accent);
    backdrop-filter: blur(8px);
    border-radius: var(--radius-lg);
    padding: var(--space-5) var(--space-6);
    margin-bottom: var(--space-6);
}

.hf-hero__answer p {
    color: color-mix(in srgb, var(--color-white) 92%, transparent);
    font-size: clamp(1rem, 1.6vw, 1.15rem);
    line-height: 1.7;
    margin: 0;
}

.hf-hero__ctas {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
}

.hf-hero__ctas .btn-lg { font-size: var(--font-size-base); }

/* Hero photo card (portrait frame) */
.hf-hero__visual {
    position: relative;
    justify-self: end;
    width: min(100%, 420px);
}

.hf-hero__frame {
    aspect-ratio: 4 / 5;
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    transform: rotate(-1.5deg);
    border: 6px solid color-mix(in srgb, var(--color-white) 12%, transparent);
}

.hf-hero__frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hf-hero__badge {
    position: absolute;
    left: calc(-1 * var(--space-8));
    bottom: var(--space-8);
    background: var(--color-white);
    color: var(--color-dark);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
    padding: var(--space-4) var(--space-5);
    display: grid;
    gap: 2px;
    min-width: 150px;
}

.hf-hero__badge strong {
    font-family: var(--font-heading);
    font-size: var(--font-size-3xl);
    line-height: 1;
    color: var(--color-primary);
}

.hf-hero__badge span {
    font-size: var(--font-size-xs);
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--color-gray);
}

/* ---------- Trust strip ---------- */
.hf-trust {
    background: var(--color-white);
    border-bottom: 1px solid var(--color-border);
}

.hf-trust ul {
    list-style: none;
    margin: 0;
    padding: var(--space-5) 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: var(--space-4);
}

.hf-trust li {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-dark);
}

.hf-trust li svg { color: var(--color-primary); flex-shrink: 0; }

/* ---------- Section scaffolding ---------- */
.hf-section { padding: var(--space-16) 0; }
.hf-section--alt { background: var(--color-light); }
.hf-section--dark { background: var(--color-dark); color: var(--color-white); }

.hf-eyebrow {
    display: inline-block;
    font-family: var(--font-heading);
    font-size: var(--font-size-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: var(--space-3);
}

.hf-section h2 {
    font-size: clamp(1.75rem, 3.4vw, 2.5rem);
    line-height: 1.15;
    margin-bottom: var(--space-4);
    text-wrap: balance;
}

.hf-section--dark h2 { color: var(--color-white); }

.hf-subtitle {
    font-family: var(--font-accent);
    font-size: var(--font-size-2xl);
    color: var(--color-accent);
    margin-bottom: var(--space-6);
}

.hf-prose p {
    color: var(--color-gray-dark);
    line-height: 1.8;
    margin-bottom: var(--space-5);
    max-width: 65ch;
}

.hf-prose a { color: var(--color-primary); font-weight: 600; }
.hf-prose a:hover { text-decoration: underline; }

/* ---------- Local context (asymmetric split) ---------- */
.hf-local {
    display: grid;
    grid-template-columns: minmax(0, 3fr) minmax(0, 2fr);
    gap: var(--space-12);
    align-items: start;
}

.hf-local__aside {
    position: sticky;
    top: calc(var(--nav-height) + var(--space-4));
    display: grid;
    gap: var(--space-5);
}

.hf-figure {
    overflow: hidden;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-card);
    aspect-ratio: 4 / 5;
}

.hf-figure--wide { aspect-ratio: 4 / 3; }

.hf-figure img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}

.hf-figure:hover img { transform: scale(1.04); }

.hf-highlights {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    box-shadow: var(--shadow-sm);
    margin: var(--space-6) 0;
}

.hf-highlights h3 {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--font-size-xl);
    margin-bottom: var(--space-4);
}

.hf-highlights h3 svg { color: var(--color-primary); }

.hf-highlights ul { list-style: none; margin: 0; padding: 0; display: grid; gap: var(--space-4); }

.hf-highlights li {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-3);
    color: var(--color-gray-dark);
    line-height: 1.6;
}

.hf-highlights li svg { color: var(--color-accent); margin-top: 3px; }
.hf-highlights li strong { color: var(--color-dark); }

/* ---------- Signature: wooded-lot checklist ---------- */
.hf-wooded {
    position: relative;
    overflow: hidden;
}

.hf-wooded::before {
    content: '';
    position: absolute;
    width: 520px;
    height: 520px;
    border-radius: var(--radius-full);
    background: var(--color-accent);
    opacity: 0.06;
    top: -200px;
    right: -160px;
    pointer-events: none;
}

.hf-wooded__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: var(--space-5);
    margin-top: var(--space-8);
}

.hf-check {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    border-top: 4px solid var(--color-primary);
    box-shadow: var(--shadow-card);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.hf-check:nth-child(2) { border-top-color: var(--color-accent); }
.hf-check:nth-child(3) { border-top-color: var(--color-dark); }
.hf-check:nth-child(4) { border-top-color: var(--color-primary-dark); }

.hf-check:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }

.hf-check__num {
    font-family: var(--font-heading);
    font-size: var(--font-size-4xl);
    font-weight: 800;
    line-height: 1;
    color: color-mix(in srgb, var(--color-primary) 18%, transparent);
    margin-bottom: var(--space-3);
}

.hf-check h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.hf-check p { color: var(--color-gray); font-size: var(--font-size-sm); line-height: 1.65; margin: 0; }

/* ---------- Services ---------- */
.hf-services {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: var(--space-5);
    margin-top: var(--space-8);
}

.hf-svc {
    display: flex;
    flex-direction: column;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--color-border);
    background: var(--color-white);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.hf-svc:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }

.hf-svc--tint-1 { background: color-mix(in srgb, var(--color-primary) 6%, var(--color-white)); }
.hf-svc--tint-2 { background: color-mix(in srgb, var(--color-accent) 10%, var(--color-white)); }
.hf-svc--tint-3 { background: color-mix(in srgb, var(--color-dark) 5%, var(--color-white)); }

.hf-svc__img {
    aspect-ratio: 3 / 2;
    overflow: hidden;
}

.hf-svc__img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}

.hf-svc:hover .hf-svc__img img { transform: scale(1.05); }

.hf-svc__body { padding: var(--space-5) var(--space-6) var(--space-6); display: flex; flex-direction: column; gap: var(--space-3); flex: 1; }
.hf-svc__body h3 { font-size: var(--font-size-xl); }
.hf-svc__body p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.65; flex: 1; }

.hf-svc__link {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-primary);
    font-family: var(--font-heading);
    font-weight: 600;
    font-size: var(--font-size-sm);
}

.hf-svc__link svg { transition: transform var(--transition-fast); }
.hf-svc:hover .hf-svc__link svg { transform: translateX(4px); }

.hf-more {
    margin-top: var(--space-8);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    background: var(--color-dark);
    color: var(--color-white);
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    gap: var(--space-6);
    align-items: center;
}

.hf-more h3 { color: var(--color-white); font-size: var(--font-size-xl); margin-bottom: var(--space-2); }
.hf-more p { color: color-mix(in srgb, var(--color-white) 75%, transparent); font-size: var(--font-size-sm); margin: 0; }

.hf-more__links {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
}

.hf-more__links a {
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    border: 1px solid color-mix(in srgb, var(--color-white) 25%, transparent);
    font-size: var(--font-size-sm);
    transition: background var(--transition-fast), border-color var(--transition-fast);
}

.hf-more__links a:hover { background: var(--color-primary); border-color: var(--color-primary); }

/* ---------- Insurance / claims ---------- */
.hf-claims {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(0, 3fr);
    gap: var(--space-12);
    align-items: center;
}

.hf-claims__steps { list-style: none; margin: 0; padding: 0; counter-reset: hfstep; display: grid; gap: var(--space-4); }

.hf-claims__steps li {
    counter-increment: hfstep;
    display: grid;
    grid-template-columns: 44px 1fr;
    gap: var(--space-4);
    align-items: start;
    color: color-mix(in srgb, var(--color-white) 85%, transparent);
    line-height: 1.65;
}

.hf-claims__steps li::before {
    content: counter(hfstep);
    width: 44px;
    height: 44px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
    font-family: var(--font-heading);
    font-weight: 800;
}

.hf-claims__steps strong { color: var(--color-white); display: block; }

.hf-claims__note {
    margin-top: var(--space-6);
    padding: var(--space-4) var(--space-5);
    border-left: 3px solid var(--color-accent);
    background: color-mix(in srgb, var(--color-white) 6%, transparent);
    color: color-mix(in srgb, var(--color-white) 80%, transparent);
    font-size: var(--font-size-sm);
    border-radius: var(--radius-sm);
}

/* ---------- Reviews ---------- */
.hf-reviews {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 320px), 1fr));
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.hf-review {
    position: relative;
    background: var(--color-white);
    border-radius: var(--radius-xl);
    padding: var(--space-8) var(--space-6) var(--space-6);
    box-shadow: var(--shadow-card);
    border: 1px solid var(--color-border);
}

.hf-review::before {
    content: '\201C';
    position: absolute;
    top: var(--space-2);
    left: var(--space-5);
    font-family: var(--font-heading);
    font-size: var(--font-size-6xl);
    line-height: 1;
    color: color-mix(in srgb, var(--color-accent) 45%, transparent);
}

.hf-review__stars { display: flex; gap: 2px; color: var(--color-star); margin-bottom: var(--space-3); }
.hf-review p { color: var(--color-gray-dark); line-height: 1.7; font-size: var(--font-size-sm); margin-bottom: var(--space-4); }

.hf-review footer {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    font-family: var(--font-heading);
    font-size: var(--font-size-sm);
}

.hf-review__avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: grid;
    place-items: center;
    background: var(--color-primary);
    color: var(--color-white);
    font-weight: 700;
}

.hf-review footer span { color: var(--color-gray); font-weight: 400; }

/* ---------- FAQ ---------- */
.hf-faq { max-width: 820px; margin: var(--space-8) auto 0; display: grid; gap: var(--space-3); }

.hf-faq details {
    background: var(--color-white);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    transition: box-shadow var(--transition-fast);
}

.hf-faq details[open] { box-shadow: var(--shadow-md); border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-border)); }

.hf-faq summary {
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

.hf-faq summary::-webkit-details-marker { display: none; }
.hf-faq summary svg { flex-shrink: 0; color: var(--color-primary); transition: transform var(--transition-fast); }
.hf-faq details[open] summary svg { transform: rotate(45deg); }
.hf-faq details p { padding: 0 var(--space-6) var(--space-6); color: var(--color-gray-dark); line-height: 1.7; margin: 0; }

/* ---------- Nearby communities ---------- */
.hf-nearby {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-4);
    margin-top: var(--space-8);
}

.hf-nearby a {
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

.hf-nearby a:hover { border-color: var(--color-primary); transform: translateY(-3px); box-shadow: var(--shadow-md); color: var(--color-primary); }
.hf-nearby a svg { color: var(--color-primary); }

.hf-chips { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-top: var(--space-6); }

.hf-chips span, .hf-chips a {
    font-size: var(--font-size-xs);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-dark) 6%, var(--color-white));
    color: var(--color-gray-dark);
}

.hf-chips a { background: var(--color-primary); color: var(--color-white); font-weight: 600; }

/* ---------- Dividers (C3: two styles) ---------- */
.hf-divider { line-height: 0; display: block; }
.hf-divider svg { width: 100%; height: 64px; display: block; }
.hf-divider--wave { background: var(--color-light); }
.hf-divider--wave svg { fill: var(--color-white); }
.hf-divider--angle { background: var(--color-white); }
.hf-divider--angle svg { fill: var(--color-dark); }

.hf-updated { font-size: var(--font-size-xs); color: var(--color-gray); margin-top: var(--space-8); }

/* ---------- CTA banner ---------- */
.hf-cta {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    padding: var(--space-16) 0;
    text-align: center;
}

.hf-cta::after {
    content: '';
    position: absolute;
    inset: auto -10% -60% -10%;
    height: 260px;
    border-radius: var(--radius-full);
    background: color-mix(in srgb, var(--color-white) 8%, transparent);
    pointer-events: none;
}

.hf-cta h2 { color: var(--color-white); font-size: clamp(1.75rem, 3.4vw, 2.5rem); margin-bottom: var(--space-3); text-wrap: balance; }
.hf-cta p { color: color-mix(in srgb, var(--color-white) 88%, transparent); max-width: 60ch; margin: 0 auto var(--space-8); line-height: 1.7; }
.hf-cta .hf-hero__ctas { justify-content: center; position: relative; z-index: 1; }

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .hf-hero__grid { grid-template-columns: 1fr; }
    .hf-hero__visual { justify-self: start; width: min(100%, 360px); }
    .hf-hero__badge { left: auto; right: calc(-1 * var(--space-4)); }
    .hf-local { grid-template-columns: 1fr; }
    .hf-local__aside { position: static; grid-template-columns: 1fr 1fr; }
    .hf-claims { grid-template-columns: 1fr; }
    .hf-more { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .hf-hero { padding-top: calc(var(--nav-height) + var(--space-8)); }
    .hf-hero__ctas .btn { width: 100%; justify-content: center; }
    .hf-hero__visual { display: none; }
    .hf-local__aside { grid-template-columns: 1fr; }
    .hf-section { padding: var(--space-12) 0; }
    .hf-trust ul { grid-template-columns: 1fr 1fr; }
}

@media (prefers-reduced-motion: reduce) {
    .hf-figure img, .hf-svc__img img, .hf-check, .hf-svc, .hf-nearby a { transition: none; }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="hf-hero" aria-labelledby="hf-title">
    <div class="container">
        <div class="hf-hero__grid">
            <div>
                <nav class="hf-breadcrumb" aria-label="Breadcrumb">
                    <a href="/">Home</a><span>/</span>
                    <a href="/service-areas/">Service Areas</a><span>/</span>
                    <span aria-current="page"><?php echo htmlspecialchars($areaName); ?>, TX</span>
                </nav>

                <span class="hf-hero__eyebrow"><?php echo icon('map-pin', 14); ?> One of 50+ Greater Houston communities we serve</span>

                <h1 id="hf-title">Roofing, Siding &amp; Storm Damage Repair in <span class="text-accent">Huffman</span>, TX</h1>

                <div class="hf-hero__answer">
                    <p>
                        <strong><?php echo htmlspecialchars($siteName); ?> serves Huffman, TX</strong> — one of more than 50 Greater Houston
                        communities covered by our family-owned, father-and-son team based in Humble, TX, in business since 1973.
                        Roof replacement and repair, storm damage, siding, gutters, patio covers, decks and fences, with a free
                        inspection and written estimate on every project.
                    </p>
                </div>

                <div class="hf-hero__ctas">
                    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
                    <a href="/contact/" class="btn btn-outline-white btn-lg">Get a Free Inspection</a>
                </div>
            </div>

            <div class="hf-hero__visual">
                <div class="hf-hero__frame">
                    <?php echo areaPhoto('roof-home-trees', 'Brick home with a new dark shingle roof under mature trees', 1200, 1600, '(max-width: 1024px) 360px, 420px', true); ?>
                </div>
                <div class="hf-hero__badge">
                    <strong>1973</strong>
                    <span>Serving Greater Houston since</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== TRUST STRIP ===================== -->
<div class="hf-trust" aria-label="Why homeowners call Triple G">
    <div class="container">
        <ul>
            <li><?php echo icon('award', 20); ?> Nextdoor Neighborhood Favorite 2022, 2023 &amp; 2024</li>
            <li><?php echo icon('hard-hat', 20); ?> The owner is on every job</li>
            <li><?php echo icon('home', 20); ?> Family owned — a father-and-son team</li>
            <li><?php echo icon('check-circle', 20); ?> Free inspections &amp; written estimates</li>
        </ul>
    </div>
</div>

<!-- ===================== LOCAL CONTEXT ===================== -->
<section class="hf-section" aria-labelledby="hf-local-title">
    <div class="container">
        <div class="hf-local">
            <div class="hf-prose">
                <span class="hf-eyebrow">Northeast shore of Lake Houston</span>
                <h2 id="hf-local-title">Roofs on the wooded northeast shore of Lake Houston</h2>
                <p class="hf-subtitle">Pine straw, shade and lake wind — that's what we plan for here.</p>

                <p>
                    Huffman is an unincorporated community strung along FM 2100 (the Huffman–Cleveland Road) and the east end of
                    FM 1960, where the road crosses the upper reaches of Lake Houston. Most of the housing stock is either acreage
                    homesteads on heavily wooded lots or 1980s-to-2000s subdivisions such as the Commons of Lake Houston and
                    Lochshire, with waterfront homes tucked along the lake and Luce Bayou. Students here attend Huffman ISD, and the
                    whole area sits under a thick canopy of loblolly pine and hardwoods.
                </p>
                <p>
                    That canopy is the roofing story in Huffman. Pine straw packs valleys and gutters, shaded north-facing slopes
                    stay damp long after a storm, and limbs come down in every strong southerly wind that rolls up off the lake.
                    The result is a roof that wears unevenly: one slope fine, the other growing algae and losing granules years
                    early. When we inspect a roof here we photograph every slope separately and look hard at valleys,
                    chimney flashing and pipe boots before we say a word about replacement.
                </p>

                <div class="hf-highlights">
                    <h3><?php echo icon('map-pin', 20); ?> Where we work around the lake</h3>
                    <ul>
                        <li><?php echo icon('check-circle', 18); ?><span><strong>Commons of Lake Houston &amp; Lochshire</strong> — subdivision homes on wooded lots where valleys and gutters fill with pine straw every season</span></li>
                        <li><?php echo icon('check-circle', 18); ?><span><strong>FM 2100 and Wolf Road acreage</strong> — older homesteads, metal and shingle roofs, barns and shop buildings that need a contractor comfortable on rural properties</span></li>
                        <li><?php echo icon('check-circle', 18); ?><span><strong>Lake Houston &amp; Luce Bayou waterfront</strong> — open wind exposure on the lake side of the house and low, sandy lots where downspout drainage matters</span></li>
                        <li><?php echo icon('check-circle', 18); ?><span><strong>Homes near Hargrave High School</strong> — established streets off FM 2100 where many original roofs are well past their expected service life</span></li>
                    </ul>
                </div>

                <p>
                    Searching for <strong>roof repair near me in Huffman</strong>? Call
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> and we'll come take a look. The inspection
                    and the written estimate are free, and the owner — not a salesperson — is the one who climbs the ladder.
                </p>
            </div>

            <aside class="hf-local__aside">
                <figure class="hf-figure">
                    <?php echo areaPhoto('pergola-cedar', 'Custom cedar pergola over a back patio on a brick home', 1200, 1600, '(max-width: 1024px) 50vw, 32vw'); ?>
                </figure>
                <figure class="hf-figure hf-figure--wide">
                    <?php echo areaPhoto('fence-gate-cedar', 'New cedar fence and double gate beside a brick home', 1200, 1600, '(max-width: 1024px) 50vw, 32vw'); ?>
                </figure>
            </aside>
        </div>
    </div>
</section>

<div class="hf-divider hf-divider--wave" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><path d="M0,0 C360,64 1080,64 1440,0 L1440,0 L0,0 Z"/></svg>
</div>

<!-- ===================== SIGNATURE: WOODED-LOT CHECKLIST ===================== -->
<section class="hf-section hf-section--alt hf-wooded" aria-labelledby="hf-wooded-title">
    <div class="container">
        <span class="hf-eyebrow">What we check on a wooded lot</span>
        <h2 id="hf-wooded-title">Four things that shorten a roof's life under Huffman's pines</h2>
        <p class="hf-prose" style="max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8;">
            Tree cover is why people move out here, and it's also why roofs here age differently than the same roof in an open
            subdivision. These are the four items we look at on every inspection before we talk about repair versus replacement.
        </p>

        <div class="hf-wooded__grid">
            <article class="hf-check" data-animate>
                <div class="hf-check__num">01</div>
                <h3>Valleys &amp; gutters</h3>
                <p>Pine straw dams water in valleys and gutters, pushing it under shingles and behind fascia. We clear, photograph and check for soft decking underneath.</p>
            </article>
            <article class="hf-check" data-animate>
                <div class="hf-check__num">02</div>
                <h3>Shaded slopes</h3>
                <p>North- and east-facing slopes under canopy stay damp, grow algae and lose granules early. One bad slope does not always mean a whole-roof replacement.</p>
            </article>
            <article class="hf-check" data-animate>
                <div class="hf-check__num">03</div>
                <h3>Limb strikes &amp; punctures</h3>
                <p>After a wind event we look for small punctures and cracked shingles hidden under debris — the leaks that show up inside months later.</p>
            </article>
            <article class="hf-check" data-animate>
                <div class="hf-check__num">04</div>
                <h3>Attic ventilation</h3>
                <p>Shade keeps a roof cooler, but a stuffy attic still cooks shingles from below. Balanced intake and exhaust protect the roof and the manufacturer's shingle warranty.</p>
            </article>
        </div>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="hf-section" aria-labelledby="hf-svc-title">
    <div class="container">
        <span class="hf-eyebrow">What we do here</span>
        <h2 id="hf-svc-title">More than a roofer — roofing, siding and outdoor living from one crew</h2>
        <p class="hf-prose" style="max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8;">
            <?php echo htmlspecialchars($shortName); ?> handles the whole exterior. Homeowners here have had us back for
            gutters, fences and a pergola after the roof was done, and that's the kind of relationship we're after.
        </p>

        <div class="hf-services">
            <article class="hf-svc hf-svc--tint-1" data-animate>
                <div class="hf-svc__img">
                    <?php echo areaPhoto('roof-replacement', 'Triple G crew replacing the roof on a two-story brick home', 1200, 1600, '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 380px'); ?>
                </div>
                <div class="hf-svc__body">
                    <h3>Roof Replacement</h3>
                    <p>Architectural shingle and metal roofs — full tear-off, decking repair where it's rotted, new underlayment and flashing, and a magnet sweep of the yard when we're done.</p>
                    <a class="hf-svc__link" href="/services/roof-replacement/">Roof replacement <?php echo icon('arrow-up', 16); ?></a>
                </div>
            </article>
            <article class="hf-svc hf-svc--tint-2" data-animate>
                <div class="hf-svc__img">
                    <?php echo areaPhoto('storm-damage-repair-v2', 'Tarped roof with a Triple G crew starting storm damage repairs', 1200, 1600, '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 380px'); ?>
                </div>
                <div class="hf-svc__body">
                    <h3>Storm &amp; Wind Damage</h3>
                    <p>Hail, wind and hurricane damage repair, documented with photos for your claim. Ask about temporary tarping if water is getting in.</p>
                    <a class="hf-svc__link" href="/services/storm-damage-repair/">Storm damage repair <?php echo icon('arrow-up', 16); ?></a>
                </div>
            </article>
            <article class="hf-svc hf-svc--tint-3" data-animate>
                <div class="hf-svc__img">
                    <?php echo areaPhoto('roof-repair-v2', 'New step flashing sealed against a brick chimney during a roof repair', 1200, 1600, '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 380px'); ?>
                </div>
                <div class="hf-svc__body">
                    <h3>Roof Repair &amp; Inspection</h3>
                    <p>Leaks, flashing, pipe boots and wood rot. Free, photo-documented inspections so you can see exactly what we see before deciding anything.</p>
                    <a class="hf-svc__link" href="/services/roof-repair/">Roof repair <?php echo icon('arrow-up', 16); ?></a>
                </div>
            </article>
        </div>

        <div class="hf-more" data-animate>
            <div>
                <h3>Siding, gutters, patio covers, decks and fences too</h3>
                <p>Our yard signs say "Roofing / Siding" for a reason. Fascia and soffit, wood-rot repair, exterior paint, gutters, covered and screened patios, pergolas, wood decks and cedar or pine privacy fences — one call.</p>
            </div>
            <div class="hf-more__links">
                <a href="/services/siding-fascia-soffit/">Siding, Fascia &amp; Soffit</a>
                <a href="/services/gutter-installation/">Gutters</a>
                <a href="/services/patio-covers-decks/">Patio Covers &amp; Decks</a>
                <a href="/services/fences-gates/">Fences &amp; Gates</a>
                <a href="/services/attic-venting/">Attic Venting</a>
            </div>
        </div>
    </div>
</section>

<div class="hf-divider hf-divider--angle" aria-hidden="true">
    <svg viewBox="0 0 1440 64" preserveAspectRatio="none"><polygon points="0,64 1440,0 1440,64"/></svg>
</div>

<!-- ===================== INSURANCE / CLAIMS ===================== -->
<section class="hf-section hf-section--dark" aria-labelledby="hf-claims-title">
    <div class="container">
        <div class="hf-claims">
            <div>
                <span class="hf-eyebrow">Storm damage &amp; insurance</span>
                <h2 id="hf-claims-title">We walk homeowners through the claim, start to finish</h2>
                <p style="color: color-mix(in srgb, var(--color-white) 80%, transparent); line-height: 1.8; max-width: 55ch;">
                    Between the two of us, Glenn and Tim Menn bring more than 50 years of roofing, claims-handling and adjuster
                    experience to every storm job. We take the paperwork and the phone calls off your plate and put them on ours.
                </p>
            </div>
            <div>
                <ol class="hf-claims__steps">
                    <li><span><strong>Document the damage</strong> Photos of every slope, every hail strike, every lifted shingle — the record your adjuster needs to see.</span></li>
                    <li><span><strong>Meet the adjuster at your home</strong> We walk the roof with the adjuster so nothing gets missed or misunderstood.</span></li>
                    <li><span><strong>Explain your policy in plain English</strong> Deductibles, depreciation, what the scope covers — you'll understand every line before you sign anything.</span></li>
                    <li><span><strong>Do the work as agreed</strong> Owner on site, landscaping covered, daily cleanup, magnet sweep.</span></li>
                </ol>
                <p class="hf-claims__note">Whether a claim is approved, and for how much, is always your insurance carrier's decision. Our job is to make sure the damage is documented properly and you understand your options.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<?php if (!empty($cityReviews)): ?>
<section class="hf-section hf-section--alt" aria-labelledby="hf-reviews-title">
    <div class="container">
        <span class="hf-eyebrow">From our customers</span>
        <h2 id="hf-reviews-title">What Huffman homeowners say about Triple G</h2>
        <p class="hf-prose" style="max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8;">
            Real reviews from customers in this community, published by the client on their own site with first name and city.
        </p>
        <div class="hf-reviews">
            <?php foreach ($cityReviews as $r): ?>
            <article class="hf-review" data-animate>
                <div class="hf-review__stars" aria-label="Five star review">
                    <?php for ($i = 0; $i < 5; $i++) { echo icon('star', 16); } ?>
                </div>
                <p><?php echo htmlspecialchars($r['text']); ?></p>
                <footer>
                    <div class="hf-review__avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($r['name'], 0, 1)); ?></div>
                    <div><?php echo htmlspecialchars($r['name']); ?><br><span><?php echo htmlspecialchars($r['city']); ?></span></div>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================== FAQ ===================== -->
<section class="hf-section" aria-labelledby="hf-faq-title">
    <div class="container">
        <div style="text-align: center;">
            <span class="hf-eyebrow">Common questions</span>
            <h2 id="hf-faq-title">Straight answers before you call</h2>
        </div>
        <div class="hf-faq">
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
<section class="hf-section hf-section--alt" aria-labelledby="hf-nearby-title">
    <div class="container">
        <span class="hf-eyebrow">Nearby communities</span>
        <h2 id="hf-nearby-title">Also serving the neighbors around the lake</h2>
        <p class="hf-prose" style="max-width: 65ch; color: var(--color-gray-dark); line-height: 1.8;">
            From here it's a short drive down FM 2100 to Crosby, or across the FM 1960 bridge to Atascocita, Humble and Kingwood.
            We cover all of them — and more than 50 Greater Houston communities in total.
        </p>
        <div class="hf-nearby">
            <a href="/service-areas/crosby/">Crosby, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/atascocita/">Atascocita, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/humble/">Humble, TX <?php echo icon('arrow-up', 18); ?></a>
            <a href="/service-areas/kingwood/">Kingwood, TX <?php echo icon('arrow-up', 18); ?></a>
        </div>
        <div class="hf-chips">
            <?php foreach (['Highlands', 'Dayton', 'New Caney', 'Cleveland', 'Porter', 'Liberty', 'Splendora'] as $c): ?>
            <span><?php echo htmlspecialchars($c); ?></span>
            <?php endforeach; ?>
            <a href="/service-areas/">See all <?php echo count($serviceAreaCities); ?> communities</a>
        </div>
        <p class="hf-updated">Last Updated: <?php echo date('F Y'); ?></p>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="hf-cta" aria-labelledby="hf-cta-title">
    <div class="container">
        <h2 id="hf-cta-title">Ready for a free roof inspection in Huffman?</h2>
        <p>Call and we'll come take a look. Photos of what we find, a written estimate, and no pressure — the same way we've done it since 1973.</p>
        <div class="hf-hero__ctas">
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
    "name": "Roofing, Siding & Storm Damage Repair in <?php echo htmlspecialchars($areaName); ?>, TX",
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
