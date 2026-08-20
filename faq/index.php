<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   FAQ — Triple G Roofing & Construction
   27 fact-safe Q&As (references/CLIENT-FACTS.md). No prices,
   payment terms, warranty years, response-time or coverage promises.
   The FAQPage JSON-LD is generated from the same array, so the
   schema always mirrors the visible questions.
   ============================================================ */

$currentPage     = 'faq';
$pageTitle       = 'Roofing & Exterior FAQs | Triple G Roofing & Construction';
$pageDescription = 'Straight answers on roof replacement, repairs, storm damage and insurance claims, attic ventilation and shingle warranties, siding, patio covers and fences — from a father-and-son team serving Greater Houston since 1973.';
$canonicalUrl    = $siteUrl . '/faq/';

/* --- FAQ content by category. Optional 'link' => [href, label] renders as a "Related" link under the answer (kept out of schema text). --- */
$faqCategories = [
    'About Triple G' => [
        [
            'q' => 'How long has Triple G Roofing & Construction been in business?',
            'a' => 'We have been serving the Greater Houston Texas area since 1973 — more than 50 years. Triple G is a small, local, family-owned and operated business run by a father-and-son team, Glenn and Tim Menn, and the owner is on every job personally.',
        ],
        [
            'q' => 'Where are you based, and what areas do you serve?',
            'a' => 'We are based in Humble, Texas, and we serve 50 communities across the Greater Houston area — Humble, Kingwood, Atascocita, Spring, Cypress and Houston, north to The Woodlands, Conroe and Cleveland, and east to Baytown, Pasadena, Dayton and Liberty. As our customers say, we work anywhere from Orange to Galveston and sometimes beyond.',
            'link' => ['/service-areas/', 'See every community we serve'],
        ],
        [
            'q' => 'Does Triple G offer free estimates?',
            'a' => 'Yes. Inspections and written estimates are free, with no obligation. Call (281) 824-5463 or send us a message and we will set up a time to come take a look, photograph what we find, and put a written estimate in your hands. Nothing pushy — take your time with it.',
            'link' => ['/contact/', 'Request a free estimate'],
        ],
        [
            'q' => 'Who will actually be on my job?',
            'a' => 'The owner, Tim Menn, is on every job personally to oversee the work and make sure everything is done as agreed. We are a small family company, not a sales office that hands your project to a crew you have never met.',
        ],
        [
            'q' => 'Do you do more than roofs?',
            'a' => 'Yes. Along with roofing we handle siding (including Hardie fiber-cement and vinyl), fascia and soffit, wood-rot repair, gutters, patio covers (including enclosed and screened patios), pergolas, wood decks, fences and gates, exterior paint and window re-sealing. One call covers the whole exterior of your home.',
            'link' => ['/services/', 'Browse all services'],
        ],
    ],
    'Roofing Services' => [
        [
            'q' => 'What roofing services do you offer?',
            'a' => 'Roof replacement in architectural shingle and metal, roof repair (leaks, flashing, pipe boots and rotted decking), free roof inspections, hail, wind and hurricane damage repair with help through the insurance claim process, attic venting, and gutters.',
        ],
        [
            'q' => 'Do you install metal roofs?',
            'a' => 'Yes. We replace roofs with metal on homes, barns and shop buildings, and we have even converted thatched poolside palapas to metal. You can see finished metal roofs in the photos throughout this site. Ask us whether metal or architectural shingle makes more sense for your home and budget.',
            'link' => ['/services/roof-replacement/', 'Roof replacement'],
        ],
        [
            'q' => 'Can you repair just part of my roof, or do I need a full replacement?',
            'a' => 'It depends on the extent of the damage, the age of the roof and whether the shingles can still be matched. We give you an honest assessment with photos: if a repair will hold, we recommend the repair. If damage is widespread or the roof is near the end of its life, we will explain why replacement is the better long-term decision.',
            'link' => ['/services/roof-repair/', 'Roof repair'],
        ],
        [
            'q' => 'How long does a roof replacement take?',
            'a' => 'Timing depends on the size and pitch of the roof, how much decking needs replacing once the old shingles come off, and the weather. Before work starts we tell you what to expect, and our crews work sun-up to sun-down to get your home dried-in and finished without dragging the job out.',
        ],
        [
            'q' => 'Do you handle storm damage and emergency repairs?',
            'a' => 'Yes. After hail, wind or a hurricane, call us and we will come take a look, photograph the damage, and talk you through the next steps. Ask about temporary tarping to limit water intrusion while repairs are scheduled. We will get you on the schedule as quickly as we can.',
            'link' => ['/services/storm-damage-repair/', 'Storm and wind damage repair'],
        ],
        [
            'q' => 'What does a roof inspection include?',
            'a' => 'A top-to-bottom look at shingles, flashing, valleys, pipe boots, vents and ridge, gutters and attic ventilation. We photograph anything we find — lifted or cracked shingles, missing granules, soft decking, failed sealant — and review the photos with you before giving you a free written estimate.',
            'link' => ['/services/roof-inspection/', 'Roof inspection'],
        ],
    ],
    'Insurance Claims' => [
        [
            'q' => 'Do you help with insurance claims?',
            'a' => 'Yes. We have more than 50 years of claims, claims-handling and adjuster experience, and we help you through the entire process from beginning to end: documenting the damage with photos, preparing the estimate, meeting the adjuster on site, and explaining your policy in plain English. The goal is to take the stress off your plate and put it on ours.',
        ],
        [
            'q' => 'Will my insurance cover my roof?',
            'a' => 'That decision belongs to your insurance carrier and depends on your policy, the cause and extent of the damage, and your deductible. We cannot promise an outcome. What we can do is make sure the damage is documented thoroughly so the adjuster sees what we see, and help you understand what your policy actually says.',
        ],
        [
            'q' => 'Will you meet with my insurance adjuster?',
            'a' => 'Yes. We meet your adjuster on site, walk the roof together, and provide the photos and documentation the claim needs. We are not a public adjuster or an attorney, and we do not negotiate claim values on your behalf — we make sure the facts about your roof are clear and complete.',
        ],
        [
            'q' => 'What if my claim is denied?',
            'a' => 'A denial is not always the final word. Carriers can reconsider when additional documentation is provided, and you can request a re-inspection. We will give you everything we have documented on your roof. If you need someone to dispute the policy decision itself, a public adjuster or attorney is the right resource.',
        ],
        [
            'q' => 'Should I file a claim for every roof problem?',
            'a' => 'Not necessarily. Normal wear and aging are not storm damage, and a claim on wear alone is unlikely to go anywhere. Start with a free inspection — we will tell you honestly whether what we find looks like storm damage or ordinary wear, and many homeowners choose to pay for small repairs directly. The decision to file is always yours.',
        ],
    ],
    'Materials, Ventilation & Warranties' => [
        [
            'q' => 'How long will a new roof last in the Houston climate?',
            'a' => 'The packaging on an architectural shingle may say 25 to 30 years, but on the Gulf Coast a realistic service life is closer to 15 to 22 years. Summer heat, humidity, UV exposure, wind and hail all shorten shingle life. Metal roofing generally lasts considerably longer. Proper attic ventilation, quality installation and periodic inspections help any roof reach its full potential.',
        ],
        [
            'q' => 'Can poor attic ventilation void my shingle warranty?',
            'a' => 'Yes. Shingle manufacturers can void or limit their warranties when the attic is not properly ventilated to their specification — balanced intake at the soffits and exhaust at the ridge or roof vents. Trapped heat cooks shingles from below and shortens their life. That is why we check intake and exhaust on every roof we replace.',
            'link' => ['/services/attic-venting/', 'Attic venting'],
        ],
        [
            'q' => 'What warranty comes with a new roof?',
            'a' => 'Shingles and other materials carry a manufacturer warranty that passes to you when the job is complete. Our workmanship is guaranteed as well — ask us about the workmanship guarantee terms for your specific project and we will put them in writing with your estimate.',
        ],
        [
            'q' => 'Which roofing materials hold up best to Gulf Coast heat, humidity and wind?',
            'a' => 'Architectural shingles are the most common choice and come in many colors; impact-resistant shingles and metal roofing both stand up well to wind and hail. We install major brands such as GAF. We walk you through the trade-offs for your home, your budget and how long you plan to stay, then let you decide.',
        ],
        [
            'q' => 'Do you match existing siding, trim and paint?',
            'a' => 'Yes. Whether it is Hardie fiber-cement, vinyl or wood siding, we match profiles and trim so the repair blends in, and we paint to match the rest of the house. Customers regularly mention that the finished work is hard to tell from the original.',
            'link' => ['/services/siding-fascia-soffit/', 'Siding, fascia and soffit'],
        ],
    ],
    'Exterior & Outdoor Projects' => [
        [
            'q' => 'Do you build patio covers, pergolas and decks?',
            'a' => 'Yes. We build custom patio covers — including enclosed and screened patios — cedar pergolas and wood decks, designed to match your home. We have also converted thatched palapas to metal roofs. Bring us your idea and we will help you do it right.',
            'link' => ['/services/patio-covers-decks/', 'Patio covers, pergolas and decks'],
        ],
        [
            'q' => 'What kind of fences and gates do you build?',
            'a' => 'Cedar and pine privacy fences, ranch rail, and custom gates — new builds, repairs and full replacements. If the fence shares a property line we coordinate with your neighbor respectfully.',
            'link' => ['/services/fences-gates/', 'Fences and gates'],
        ],
        [
            'q' => 'Do you install gutters?',
            'a' => 'Yes. New gutters and downspouts move water away from your foundation and protect fascia and soffit from rot. Many homeowners have us install gutters right after a roof replacement so everything matches and works together.',
            'link' => ['/services/gutter-installation/', 'Gutter installation'],
        ],
        [
            'q' => 'Can you repair wood rot, fascia and soffit?',
            'a' => 'Yes. Wood-rot repair, fascia and soffit replacement, window re-sealing, exterior paint, and interior sheetrock repair tied to exterior work are all part of what we do. Fixing the rot and the cause of the water at the same time is what keeps it from coming back.',
        ],
    ],
    'Working With Us' => [
        [
            'q' => 'Will my yard, pool and landscaping be protected during the job?',
            'a' => 'Homeowners consistently mention this in their reviews: our crews cover landscaping, gardens and pools with tarps, clean the work area at the end of each day, and run a magnet across the yard to pick up nails before leaving. Your property is treated like it is ours.',
        ],
        [
            'q' => 'How do I get started?',
            'a' => 'Call (281) 824-5463 or send a message through our contact page. We will set up a time to come take a look, photograph what we find, and give you a free written estimate. We are open Monday through Saturday, 8:00 AM to 7:00 PM, and closed on Sunday.',
            'link' => ['/contact/', 'Contact us'],
        ],
    ],
];

/* --- Schema: FAQPage (auto-synced from the array above) + BreadcrumbList --- */
$allFaqs = [];
foreach ($faqCategories as $category => $catFaqs) {
    foreach ($catFaqs as $f) { $allFaqs[] = ['q' => $f['q'], 'a' => $f['a']]; }
}
$faqSchema = generateFAQSchema($allFaqs);

$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type"    => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $siteUrl . '/'],
        ["@type" => "ListItem", "position" => 2, "name" => "FAQ",  "item" => $canonicalUrl],
    ],
];
$schemaMarkup = '<script type="application/ld+json">' . $faqSchema . '</script>' . "\n"
    . '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

function faqCatId($category) {
    return 'faq-' . strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $category), '-'));
}

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   FAQ page — page-specific styles (Premium tier)
   Tokens only. Prefix: .faq-
   ============================================================ */
[data-animate].faq-delay-1 { transition-delay: .06s; }
[data-animate].faq-delay-2 { transition-delay: .14s; }
[data-animate].faq-delay-3 { transition-delay: .22s; }

/* ---------- Breadcrumb ---------- */
.faq-breadcrumb {
  background: var(--color-light);
  border-bottom: 1px solid var(--color-gray-light);
}
.faq-breadcrumb ol {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-2);
  align-items: center;
  padding: var(--space-3) 0;
  margin: 0;
  font-size: var(--font-size-sm);
  color: var(--color-gray);
}
.faq-breadcrumb a { color: var(--color-gray-dark); }
.faq-breadcrumb a:hover { color: var(--color-primary); }
.faq-breadcrumb [aria-current] {
  color: var(--color-primary);
  font-weight: 600;
}
.faq-breadcrumb-sep { color: var(--color-gray-light); }

/* ---------- Hero: layered photo + gradient + noise ---------- */
.faq-hero {
  position: relative;
  min-height: 50vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + var(--space-6)) 0 var(--space-16);
  overflow: hidden;
  isolation: isolate;
  text-align: center;
}
.faq-hero__bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 35%;
  z-index: 0;
}
.faq-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  background: linear-gradient(180deg,
    color-mix(in srgb, var(--color-secondary) 92%, transparent) 0%,
    color-mix(in srgb, var(--color-secondary) 84%, transparent) 100%);
}
.faq-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
  opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.faq-hero__inner {
  position: relative;
  z-index: 2;
  max-width: 820px;
  margin-inline: auto;
}
.faq-hero__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  font-family: var(--font-heading);
  font-size: var(--font-size-sm);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--color-accent);
  background: color-mix(in srgb, var(--color-primary) 18%, transparent);
  border: 1px solid color-mix(in srgb, var(--color-white) 18%, transparent);
  padding: var(--space-2) var(--space-4);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-5);
}
.faq-hero__eyebrow svg { width: 16px; height: 16px; }
.faq-hero h1 {
  color: var(--color-white);
  font-size: clamp(2.2rem, 5vw, 3.6rem);
  line-height: 1.08;
  margin-bottom: var(--space-5);
  text-wrap: balance;
}
.faq-hero h1 .text-accent { font-size: 1.04em; }
.faq-hero__lede {
  color: color-mix(in srgb, var(--color-white) 90%, transparent);
  font-size: var(--font-size-lg);
  line-height: 1.7;
  max-width: 58ch;
  margin: 0 auto var(--space-8);
}
.faq-hero__facts {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: var(--space-3);
  list-style: none;
  padding: 0;
  margin: 0;
}
.faq-hero__facts li {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  background: color-mix(in srgb, var(--color-white) 10%, transparent);
  border: 1px solid color-mix(in srgb, var(--color-white) 16%, transparent);
  color: var(--color-white);
  font-size: var(--font-size-sm);
  font-weight: 600;
  padding: var(--space-2) var(--space-4);
  border-radius: var(--radius-full);
}
.faq-hero__facts svg {
  width: 16px;
  height: 16px;
  color: var(--color-accent);
}

/* ---------- Layout: sticky category nav + accordion ---------- */
.faq-body { background: var(--color-white); }
.faq-layout {
  display: grid;
  grid-template-columns: 260px minmax(0, 1fr);
  gap: var(--space-12);
  align-items: start;
}
.faq-nav {
  position: sticky;
  top: calc(var(--nav-height) + var(--space-4));
  background: var(--color-light);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-lg);
  padding: var(--space-5);
}
.faq-nav h2 {
  font-size: var(--font-size-xs);
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--color-gray);
  margin-bottom: var(--space-4);
  font-family: var(--font-heading);
}
.faq-nav ol {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  gap: var(--space-1);
  counter-reset: faqcat;
}
.faq-nav li { counter-increment: faqcat; }
.faq-nav a {
  display: flex;
  align-items: center;
  gap: var(--space-3);
  padding: var(--space-2) var(--space-3);
  border-radius: var(--radius-md);
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  font-weight: 600;
  transition: background var(--transition-base), color var(--transition-base);
}
.faq-nav a::before {
  content: counter(faqcat, decimal-leading-zero);
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  color: var(--color-primary);
  font-weight: 800;
  width: 22px;
  flex-shrink: 0;
}
.faq-nav a:hover {
  background: var(--color-white);
  color: var(--color-primary);
}
.faq-nav__cta {
  margin-top: var(--space-5);
  padding-top: var(--space-5);
  border-top: 1px solid var(--color-gray-light);
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
  line-height: 1.55;
}
.faq-nav__cta a.faq-nav__tel {
  display: block;
  margin-top: var(--space-2);
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: var(--font-size-lg);
  color: var(--color-primary);
}

/* ---------- Category blocks ---------- */
.faq-category { margin-bottom: var(--space-12); scroll-margin-top: calc(var(--nav-height) + var(--space-6)); }
.faq-category:last-child { margin-bottom: 0; }
.faq-category__head {
  display: flex;
  align-items: baseline;
  gap: var(--space-4);
  margin-bottom: var(--space-6);
  padding-bottom: var(--space-3);
  border-bottom: 3px solid var(--color-accent);
}
.faq-category__num {
  font-family: var(--font-heading);
  font-size: var(--font-size-sm);
  font-weight: 800;
  color: var(--color-primary);
  letter-spacing: 1px;
}
.faq-category__head h2 {
  font-size: var(--font-size-2xl);
  color: var(--color-dark);
  margin: 0;
  text-wrap: balance;
}
.faq-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: var(--space-4);
}

/* ---------- Accordion item ---------- */
.faq-item {
  background: var(--color-light);
  border-radius: var(--radius-lg);
  border: 1px solid var(--color-gray-light);
  overflow: hidden;
  transition: box-shadow var(--transition-base), border-color var(--transition-base);
}
.faq-item[open] {
  box-shadow: var(--shadow-md);
  border-color: color-mix(in srgb, var(--color-primary) 35%, var(--color-gray-light));
  background: var(--color-white);
}
.faq-item summary {
  list-style: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: var(--space-4);
  padding: var(--space-5) var(--space-6);
  font-family: var(--font-heading);
  font-weight: 600;
  font-size: var(--font-size-base);
  color: var(--color-dark);
  line-height: 1.4;
  text-wrap: balance;
}
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary:hover { color: var(--color-primary); }
.faq-item summary:focus-visible {
  outline: 3px solid var(--color-accent);
  outline-offset: -3px;
  border-radius: var(--radius-lg);
}
.faq-icon {
  flex-shrink: 0;
  width: 32px;
  height: 32px;
  border-radius: var(--radius-full);
  background: var(--color-primary);
  color: var(--color-white);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform var(--transition-base), background var(--transition-base);
}
.faq-icon svg { width: 18px; height: 18px; }
.faq-item[open] .faq-icon {
  transform: rotate(45deg);
  background: var(--color-secondary);
}
.faq-answer {
  padding: 0 var(--space-6) var(--space-6) calc(var(--space-6) + 32px + var(--space-4));
}
.faq-answer p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  margin: 0;
  line-height: 1.75;
  max-width: 68ch;
}
.faq-answer__link {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  margin-top: var(--space-3);
  font-size: var(--font-size-sm);
  font-weight: 700;
  color: var(--color-primary);
}
.faq-answer__link::after {
  content: '→';
  transition: transform var(--transition-base);
}
.faq-answer__link:hover::after { transform: translateX(4px); }

/* ---------- Ventilation callout (signature) ---------- */
.faq-callout {
  margin: var(--space-12) 0 0;
  position: relative;
  background: var(--color-secondary);
  color: var(--color-white);
  border-radius: var(--radius-xl);
  padding: var(--space-8) var(--space-10);
  display: grid;
  grid-template-columns: 64px minmax(0, 1fr) auto;
  gap: var(--space-6);
  align-items: center;
  overflow: hidden;
}
.faq-callout::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 0% 50%, color-mix(in srgb, var(--color-primary) 40%, transparent) 0%, transparent 55%);
  pointer-events: none;
}
.faq-callout > * { position: relative; z-index: 1; }
.faq-callout__ico {
  width: 64px;
  height: 64px;
  border-radius: var(--radius-md);
  background: var(--color-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-white);
}
.faq-callout__ico svg { width: 32px; height: 32px; }
.faq-callout h3 {
  color: var(--color-white);
  font-size: var(--font-size-xl);
  margin-bottom: var(--space-2);
  text-wrap: balance;
}
.faq-callout p {
  color: color-mix(in srgb, var(--color-white) 82%, transparent);
  font-size: var(--font-size-sm);
  line-height: 1.65;
  margin: 0;
  max-width: 64ch;
}
.faq-callout .btn { white-space: nowrap; }

/* ---------- CTA ---------- */
.faq-cta {
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: var(--space-16) 0;
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
}
.faq-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.faq-cta .container { position: relative; z-index: 1; }
.faq-cta h2 {
  color: var(--color-white);
  font-size: clamp(1.9rem, 4vw, 2.75rem);
  margin-bottom: var(--space-4);
  text-wrap: balance;
}
.faq-cta p {
  color: color-mix(in srgb, var(--color-white) 92%, transparent);
  max-width: 60ch;
  margin: 0 auto var(--space-8);
  font-size: var(--font-size-lg);
}
.faq-cta p a {
  color: var(--color-white);
  font-weight: 700;
  text-decoration: underline;
}
.faq-cta__actions {
  display: flex;
  gap: var(--space-4);
  justify-content: center;
  flex-wrap: wrap;
}
.faq-cta .btn svg { width: 18px; height: 18px; }

/* ---------- Dividers ---------- */
.faq-divider {
  display: block;
  overflow: hidden;
  line-height: 0;
}
.faq-divider svg {
  display: block;
  width: 100%;
  height: 100%;
}
.faq-divider--slant { height: 56px; }
.faq-divider--wave { height: 64px; }

/* ---------- Motion ---------- */
@media (prefers-reduced-motion: reduce) {
  .faq-icon,
  .faq-answer__link::after { transition: none; }
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
  .faq-layout { grid-template-columns: 1fr; gap: var(--space-8); }
  .faq-nav { position: static; }
  .faq-nav ol { grid-template-columns: 1fr 1fr; }
  .faq-callout { grid-template-columns: 64px 1fr; }
  .faq-callout .btn { grid-column: 2; justify-self: start; }
}
@media (max-width: 640px) {
  .faq-hero { min-height: 0; }
  .faq-nav ol { grid-template-columns: 1fr; }
  .faq-item summary { padding: var(--space-4) var(--space-5); }
  .faq-answer { padding: 0 var(--space-5) var(--space-5); }
  .faq-callout { grid-template-columns: 1fr; padding: var(--space-6); }
  .faq-callout .btn { grid-column: 1; }
  .faq-category__head { flex-direction: column; gap: var(--space-1); }
}
</style>


<!-- ===================== BREADCRUMB ===================== -->
<nav class="faq-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="faq-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/faq/" aria-current="page">FAQ</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== HERO ===================== -->
<section class="faq-hero" aria-label="Roofing and exterior FAQs">
  <img class="faq-hero__bg"
       src="/assets/images/roof-overhead.jpg"
       srcset="/assets/images/roof-overhead-480.webp 480w, /assets/images/roof-overhead-960.webp 960w"
       sizes="100vw"
       alt="Overhead view of a completed architectural shingle roof"
       width="1200" height="1600" loading="eager" fetchpriority="high">
  <div class="container faq-hero__inner">
    <span class="faq-hero__eyebrow"><?php echo icon('search', 16); ?> Frequently Asked Questions</span>
    <h1>Roofing and exterior <span class="text-accent">questions, answered</span> straight</h1>
    <p class="faq-hero__lede">
      Storm damage and insurance claims, shingle life in the Houston heat, attic ventilation and warranties, siding,
      patio covers, fences — and what it's like to work with a father-and-son team that's been at it since 1973.
    </p>
    <ul class="faq-hero__facts" aria-label="Quick facts">
      <li><?php echo icon('check-circle', 16); ?> Since 1973</li>
      <li><?php echo icon('check-circle', 16); ?> Family owned</li>
      <li><?php echo icon('check-circle', 16); ?> Owner on every job</li>
      <li><?php echo icon('check-circle', 16); ?> Free written estimates</li>
    </ul>
  </div>
</section>

<!-- ===================== FAQ BODY ===================== -->
<section class="section faq-body" aria-label="Questions and answers">
  <div class="container">
    <div class="faq-layout">

      <nav class="faq-nav" aria-label="FAQ categories" data-animate>
        <h2>Jump to</h2>
        <ol>
          <?php foreach ($faqCategories as $category => $catFaqs): ?>
          <li><a href="#<?php echo faqCatId($category); ?>"><?php echo htmlspecialchars($category); ?></a></li>
          <?php endforeach; ?>
        </ol>
        <div class="faq-nav__cta">
          Don't see your question? Call and ask — we're happy to talk it through.
          <a href="tel:+<?php echo $phoneRaw; ?>" class="faq-nav__tel"><?php echo $phone; ?></a>
        </div>
      </nav>

      <div>
        <?php $catIndex = 0; foreach ($faqCategories as $category => $catFaqs): $catIndex++; ?>
        <section class="faq-category" id="<?php echo faqCatId($category); ?>" aria-labelledby="<?php echo faqCatId($category); ?>-title">
          <div class="faq-category__head">
            <span class="faq-category__num"><?php echo str_pad($catIndex, 2, '0', STR_PAD_LEFT); ?></span>
            <h2 id="<?php echo faqCatId($category); ?>-title"><?php echo htmlspecialchars($category); ?></h2>
          </div>
          <div class="faq-grid">
            <?php foreach ($catFaqs as $i => $faq): ?>
            <details class="faq-item faq-delay-<?php echo ($i % 3) + 1; ?>"<?php echo ($catIndex === 1 && $i === 0) ? ' open' : ''; ?> data-animate>
              <summary>
                <span class="faq-icon" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/><path d="M12 5v14"/>
                  </svg>
                </span>
                <?php echo htmlspecialchars($faq['q']); ?>
              </summary>
              <div class="faq-answer">
                <p><?php echo htmlspecialchars($faq['a']); ?></p>
                <?php if (!empty($faq['link'])): ?>
                <a class="faq-answer__link" href="<?php echo htmlspecialchars($faq['link'][0]); ?>"><?php echo htmlspecialchars($faq['link'][1]); ?></a>
                <?php endif; ?>
              </div>
            </details>
            <?php endforeach; ?>
          </div>
        </section>
        <?php endforeach; ?>

        <aside class="faq-callout" data-animate aria-label="Ventilation and your shingle warranty">
          <div class="faq-callout__ico"><?php echo icon('wind', 32); ?></div>
          <div>
            <h3>Your attic ventilation can make or break your shingle warranty</h3>
            <p>Manufacturers can void or limit shingle warranties when intake and exhaust aren't balanced to their spec. We check both on every roof we replace — and we can fix ventilation on a roof that isn't due for replacement yet.</p>
          </div>
          <a href="/services/attic-venting/" class="btn btn-accent">Attic Venting</a>
        </aside>
      </div>

    </div>
  </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="faq-cta" aria-label="Still have questions?">
  <div class="container">
    <h2 data-animate>Still have a question? Ask the people who'll do the work.</h2>
    <p data-animate>
      Call <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a> or request a free estimate and we'll walk you through every detail of your roofing or exterior project — in plain English.
    </p>
    <div class="faq-cta__actions" data-animate>
      <a href="/contact/" class="btn btn-accent btn-lg">Get a Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call Now</a>
    </div>
  </div>
</section>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
