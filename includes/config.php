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
$siteName = 'Triple G Roofing & Construction';
$tagline  = 'Roofing & Exterior Renovations — Serving the Greater Houston Area Since 1973';
$industry = 'Roofing contractor';
$shortName = 'Triple G Roofing';

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

/* Service-area business — street is NEVER published (matches hidden-address GBP). Based in Humble, TX. */
$address = [
    'street' => '',
    'city'   => 'Humble',
    'state'  => 'TX',
    'zip'    => '77396',
];

$businessHours = 'Mon–Sat 8:00 AM – 7:00 PM · Sun Closed';   // GBP hours
$businessHoursSchema = 'Mo-Sa 08:00-19:00';
$ownerName     = 'Tim Menn';
$founderName   = 'Glenn Menn';            // Tim's father — father/son team
$regionName    = 'Greater Houston';

/* --- Geo / Google Business Profile --- */
$geo = [
    'lat' => 29.9988,   // Humble, TX (approximate — SAB, no published street)
    'lng' => -95.2622,
];
$gbpPlaceId       = 'ChIJ1WdM8uOqQIYRrFB0WTaw1JI';
$gbpUrl           = 'https://maps.google.com/?cid=10580275172075655340';
$gbpMapEmbed      = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4313.28287342969!2d-95.0968133!3d30.030417999999987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640aae3f24c67d5%3A0x92d4b036597450ac!2sTriple%20G%20Roofing!5e1!3m2!1sen!2sus!4v1786995133311!5m2!1sen!2sus" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>';
$directionsUrl    = 'https://www.google.com/maps/dir/?api=1&destination=place_id:ChIJ1WdM8uOqQIYRrFB0WTaw1JI';
$reviewRequestUrl = 'https://search.google.com/local/writereview?placeid=ChIJ1WdM8uOqQIYRrFB0WTaw1JI';

/* --- SEO keywords --- */
$primaryKeyword    = 'Roofing Contractor';
$secondaryKeywords = ['roof replacement', 'roof repair', 'storm damage roof repair', 'siding', 'gutters', 'patio covers', 'fences'];

/* --- Services (client's real service list — Wix site + GBP service items + gallery) --- */
$services = [
    [
        'name'        => 'Roof Replacement',
        'slug'        => 'roof-replacement',
        'description' => 'Full architectural-shingle and metal roof replacements across the Greater Houston area — tear-off, decking repair, underlayment, and a clean job site when we leave.',
        'keywords'    => ['roof replacement', 'roof replacement Houston TX', 'new roof', 'metal roof replacement'],
    ],
    [
        'name'        => 'Roof Repair',
        'slug'        => 'roof-repair',
        'description' => 'Leak repairs, flashing and pipe-boot fixes, shingle replacement, and rotted-decking repair that stop water damage before it spreads.',
        'keywords'    => ['roof repair', 'roof leak repair Houston', 'flashing repair'],
    ],
    [
        'name'        => 'Roof Inspection',
        'slug'        => 'roof-inspection',
        'description' => 'Free, photo-documented roof inspections that catch early wear, record storm damage, and give you a clear written estimate.',
        'keywords'    => ['roof inspection', 'free roof inspection Houston', 'storm damage inspection'],
    ],
    [
        'name'        => 'Storm & Wind Damage Roof Repair',
        'slug'        => 'storm-damage-repair',
        'description' => 'Hail, wind, and hurricane damage repair with more than 50 years of claims-handling experience to help you through the insurance process.',
        'keywords'    => ['storm damage roof repair', 'wind damage roof repair Houston', 'hail damage roofing', 'hurricane roof damage'],
    ],
    [
        'name'        => 'Roof Damage Repair',
        'slug'        => 'roof-damage-repair',
        'description' => 'Assessment and repair for aging, worn, or compromised roofs — wood rot, failed flashing, damaged decking, and worn shingles.',
        'keywords'    => ['roof damage repair', 'damaged roof repair Houston', 'wood rot roof repair'],
    ],
    [
        'name'        => 'Attic Venting',
        'slug'        => 'attic-venting',
        'description' => 'Balanced intake and exhaust ventilation that lowers attic heat, protects shingles, and helps cut cooling costs in the Texas climate.',
        'keywords'    => ['attic venting', 'attic ventilation Houston TX', 'ridge vent installation'],
    ],
    [
        'name'        => 'Gutter Installation',
        'slug'        => 'gutter-installation',
        'description' => 'New gutters and downspouts that move water away from your foundation and protect fascia and soffit from rot.',
        'keywords'    => ['gutter installation', 'gutters Houston TX', 'new gutters and downspouts'],
    ],
    [
        'name'        => 'Siding, Fascia & Soffit',
        'slug'        => 'siding-fascia-soffit',
        'description' => 'Siding repair and replacement, fascia and soffit, wood-rot repair, window re-sealing, and exterior paint to finish the job.',
        'keywords'    => ['siding replacement', 'fascia and soffit repair Houston', 'Hardie siding', 'exterior paint'],
    ],
    [
        'name'        => 'Patio Covers, Pergolas & Decks',
        'slug'        => 'patio-covers-decks',
        'description' => 'Custom patio covers, enclosed and screened patios, pergolas, and wood decks built to match your home.',
        'keywords'    => ['patio cover builder Houston', 'pergola', 'wood deck builder', 'covered patio'],
    ],
    [
        'name'        => 'Fences & Gates',
        'slug'        => 'fences-gates',
        'description' => 'Cedar and pine privacy fences, ranch rail, and custom gates — new builds, repairs, and replacements.',
        'keywords'    => ['fence builder Houston', 'cedar privacy fence', 'fence repair', 'custom gates'],
    ],
];

/* --- Service areas ---
   $serviceAreas      = cities with a dedicated page under /service-areas/<slug>/
   $serviceAreaCities = the FULL owner-supplied list (2026-08-20). Show ALL of these wherever
                        the service area is described (home, footer, /service-areas/, schema). */
$serviceAreas = [
    'Humble',
    'Kingwood',
    'Atascocita',
    'Huffman',
    'Crosby',
];
$serviceAreaCities = [
    'Humble', 'Kingwood', 'Atascocita', 'Porter', 'Porter Heights', 'Spring', 'Aldine', 'Huffman',
    'Crosby', 'New Caney', 'Woodbranch', 'Roman Forest', 'Sheldon', 'Barrett', 'Splendora', 'Houston',
    'Jacinto City', 'Cloverleaf', 'Channelview', 'Galena Park', 'Highlands', 'Shenandoah',
    'The Woodlands', 'Oak Ridge North', 'Jersey Village', 'Spring Valley Village',
    'Hunters Creek Village', 'Hedwig Village', 'Bunker Hill Village', 'Piney Point Village',
    'West University Place', 'Southside Place', 'Bellaire', 'Pasadena', 'South Houston', 'Deer Park',
    'La Porte', 'Baytown', 'Mont Belvieu', 'Old River-Winfree', 'Dayton', 'Liberty', 'Kenefick',
    'Cleveland', 'Cut and Shoot', 'Conroe', 'Pinehurst', 'Panorama Village', 'Brookside Village', 'Cypress',
];
$serviceAreaSummary = 'Serving the Greater Houston area — from Orange to Galveston and sometimes beyond.';

/* --- Awards (verified: badges on the client\'s own site) --- */
$awards = [
    'Nextdoor Neighborhood Favorite 2022',
    'Nextdoor Neighborhood Favorite 2023',
    'Nextdoor Neighborhood Favorite 2024',
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
$googleAnalyticsId = '';                   // not yet provided — GA snippet stays commented out until launch

/* --- Brand colors (mirror framework.css :root, extracted from logo) --- */
$colors = [
    'primary'   => '#EE5816',
    'secondary' => '#1a1a2e',
    'accent'    => '#DD9F5D',
];

/* --- Business timeline --- */
$yearEstablished = 1973;                  // client's own site: "serving the Greater Houston area since 1973"
$yearsInBusiness = (int) date('Y') - 1973;

/* --- Tier --- */
$tier = 'premium';

/* --- CSS cache-bust — SINGLE source of truth. Bump on every framework.css change. --- */
$cssVersion = '6';                        // pages must NEVER set their own $cssVersion

/* --- Forms --- */
$formAction = 'https://formsubmit.co/tmenn013@gmail.com';
