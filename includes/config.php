<?php
/**
 * ============================================================
 * config.php — Central site configuration for Triple G Roofing
 * Auto-generated from build-plan.json (Phase 1 — Scaffold)
 * ============================================================
 * Every page includes this first, then sets its own $canonicalUrl,
 * $pageTitle, $metaDescription, etc. before including head.php.
 */

/* --- Identity / slug --- */
$slug     = 'triple-g-roofing';          // MUST equal this build's directory name
$siteName = 'Triple G Roofing';
$tagline  = 'Trusted Roofing for Huffman Families';
$industry = 'Roofing contractor';

/* --- Domain / URLs --- */
// No production_domain in build-plan.json → default to preview URL. NEVER blank.
$domain  = 'triple-g-roofing.pageone.cloud';
$siteUrl = 'https://' . $domain;         // always a valid absolute URL
// NOTE: $canonicalUrl is NOT set here — each page sets it from $siteUrl + path.

/* --- Contact --- */
$phone          = '(281) 824-5463';      // display format
$phoneRaw       = '12818245463';          // for tel: links → tel:+12818245463
$phoneSecondary = '';
$email          = 'tmenn013@gmail.com';

$address = [
    'street' => '11819 Walraven Dr',
    'city'   => 'Huffman',
    'state'  => 'TX',
    'zip'    => '77336',
];

$businessHours = '8-8 Mon-Sun';
$ownerName     = 'Tim Menn';

/* --- Geo / Google Business Profile --- */
$geo = [
    'lat' => 30.030417999999987,
    'lng' => -95.0968133,
];
$gbpPlaceId       = 'ChIJ1WdM8uOqQIYRrFB0WTaw1JI';
$gbpUrl           = 'https://maps.google.com/?cid=10580275172075655340';
$gbpMapEmbed      = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4313.28287342969!2d-95.0968133!3d30.030417999999987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640aae3f24c67d5%3A0x92d4b036597450ac!2sTriple%20G%20Roofing!5e1!3m2!1sen!2sus!4v1786995133311!5m2!1sen!2sus" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>';
$directionsUrl    = 'https://www.google.com/maps/dir/?api=1&destination=place_id:ChIJ1WdM8uOqQIYRrFB0WTaw1JI';
$reviewRequestUrl = 'https://search.google.com/local/writereview?placeid=ChIJ1WdM8uOqQIYRrFB0WTaw1JI';

/* --- SEO keywords --- */
$primaryKeyword    = 'Roofing';
$secondaryKeywords = [];

/* --- Services (derived from build-plan content.description; services[] was empty) --- */
$services = [
    [
        'name'        => 'Roof Inspection',
        'slug'        => 'roof-inspection',
        'description' => 'Thorough roof inspections that document storm damage, catch early wear, and support insurance claims for Huffman homeowners.',
        'keywords'    => ['roof inspection', 'roof inspection Huffman TX', 'storm damage inspection'],
    ],
    [
        'name'        => 'Roof Repair',
        'slug'        => 'roof-repair',
        'description' => 'Leak repairs, shingle replacement, and flashing fixes that stop water damage before it spreads.',
        'keywords'    => ['roof repair', 'roof repair Huffman TX', 'roof leak repair'],
    ],
    [
        'name'        => 'Attic Venting',
        'slug'        => 'attic-venting',
        'description' => 'Balanced intake and exhaust ventilation that lowers attic heat, protects shingles, and cuts cooling costs in the Texas climate.',
        'keywords'    => ['attic venting', 'attic ventilation Huffman TX', 'ridge vent installation'],
    ],
    [
        'name'        => 'Gutter Installation',
        'slug'        => 'gutter-installation',
        'description' => 'Seamless gutter systems that move water away from your foundation and prevent fascia and soffit rot.',
        'keywords'    => ['gutter installation', 'seamless gutters Huffman TX', 'new gutters'],
    ],
    [
        'name'        => 'Roof Damage Repair',
        'slug'        => 'roof-damage-repair',
        'description' => 'Full damage assessment and repair for aging, worn, or compromised roofs across North Harris County.',
        'keywords'    => ['roof damage repair', 'roof damage repair Huffman TX', 'damaged roof'],
    ],
    [
        'name'        => 'Storm & Wind Damage Roof Repair',
        'slug'        => 'storm-damage-repair',
        'description' => 'Emergency response for hail, wind, and storm damage with same-day inspections and direct insurance claim coordination.',
        'keywords'    => ['storm damage roof repair', 'wind damage roof repair Huffman TX', 'hail damage roofing'],
    ],
];

/* --- Service areas (Premium tier: main + individual city pages) --- */
$serviceAreas = [
    'Huffman',
    'Humble',
    'Atascocita',
    'Kingwood',
    'Crosby',
];

/* --- Social / external profiles --- */
$socialLinks = [
    'google'  => 'https://maps.google.com/?cid=10580275172075655340',
    'website' => 'https://www.triplegroofing.com/',
];

/* --- Conditional integrations --- */
$acceptsSms      = false;
$bbbUrl          = null;
$financing       = null;
$schedulingUrl   = null;
$elfsightEmbed   = '<script src="https://static.elfsight.com/platform/platform.js" defer></script>' . "\n" . '<div class="elfsight-app-5efa8cd2-aca1-4464-badb-d5f058f8ad55" data-elfsight-app-lazy></div>';
$certificationLinks = [];

/* --- Assets --- */
$logoUrl = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/triple-g-roofing/logo/1786991116016-ob2zks-Triple_G_logo.png';

/* --- Analytics --- */
$googleAnalyticsId = 'G-TRIPLEGROOF';      // Triple G Roofing tracking ID

/* --- Brand colors (mirror framework.css :root, extracted from logo) --- */
$colors = [
    'primary'   => '#EE5816',
    'secondary' => '#1a1a2e',
    'accent'    => '#DD9F5D',
];

/* --- Business timeline --- */
$yearEstablished = null;                  // not provided in intake
$yearsInBusiness = null;

/* --- Tier --- */
$tier = 'premium';

/* --- CSS cache-bust — SINGLE source of truth. Bump on every framework.css change. --- */
$cssVersion = '1';                        // pages must NEVER set their own $cssVersion

/* --- Forms --- */
$formAction = 'https://formsubmit.co/tmenn013@gmail.com';
