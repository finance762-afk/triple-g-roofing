<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   FAQ — Triple G Roofing (Phase 5)
   ============================================================ */

$currentPage     = 'faq';
$pageTitle       = 'Roofing FAQs | Triple G Roofing Huffman TX';
$pageDescription = 'Frequently asked questions about roof repairs, inspections, materials, insurance claims, and warranties. Get straight answers from a licensed Huffman, TX roofer.';
$canonicalUrl    = $siteUrl . '/faq/';

/* --- Comprehensive FAQ organized by category --- */
$faqCategories = [
    'General' => [
        [
            'q' => 'Does Triple G Roofing offer free estimates?',
            'a' => 'Yes. We provide free, no-obligation estimates across Huffman, Humble, Atascocita, Kingwood, and Crosby. Call (281) 570-3325 or request an estimate online and we will respond the same day.',
        ],
        [
            'q' => 'What areas do you serve?',
            'a' => 'We serve homeowners throughout North Harris County, including Huffman, Humble, Atascocita, Kingwood, Crosby, and surrounding communities within a 25-mile radius of Huffman.',
        ],
        [
            'q' => 'Are you licensed and insured?',
            'a' => 'Yes. Triple G Roofing is a licensed Texas roofing contractor with full general liability insurance and workers\' compensation coverage for all crew members, so you are never liable for on-site injuries.',
        ],
        [
            'q' => 'Do you offer financing?',
            'a' => 'We work with approved third-party financing providers for qualified homeowners. Payment plans and terms vary based on the project scope and credit approval. Ask about financing options when you request your estimate.',
        ],
    ],
    'Services' => [
        [
            'q' => 'What roofing services do you offer?',
            'a' => 'Triple G Roofing provides roof inspections, roof repairs, attic venting, gutter installation, roof damage repair, and storm and wind damage roof repair across North Harris County.',
        ],
        [
            'q' => 'How long does a typical roof replacement take?',
            'a' => 'Most residential roof replacements in Huffman take 1–3 days depending on roof size, complexity, and weather. Steep or multi-story homes may take longer. We provide a clear timeline in your written estimate.',
        ],
        [
            'q' => 'Do you handle emergency roof repairs?',
            'a' => 'Yes. We offer same-day emergency inspections for storm damage and can provide tarping services to prevent further water intrusion while we work with your insurance adjuster to approve the full repair.',
        ],
        [
            'q' => 'Can you repair just part of my roof, or do I need a full replacement?',
            'a' => 'It depends on the extent of the damage, the age of your roof, and whether the shingles can still be matched. We provide an honest assessment — if a repair will hold, we recommend a repair. If the damage is widespread or the roof is near the end of its service life, replacement is the smarter long-term investment.',
        ],
    ],
    'Pricing & Timeline' => [
        [
            'q' => 'How much does a new roof cost in Huffman, TX?',
            'a' => 'Residential roof replacement costs typically range from $5,000–$15,000+ depending on roof size, pitch, material choice, and removal/disposal needs. Impact-resistant shingles and metal roofing cost more up front but last longer. We provide itemized written estimates so you know exactly what you\'re paying for.',
        ],
        [
            'q' => 'Do you require a deposit?',
            'a' => 'Yes. We typically require a deposit at contract signing to order materials and schedule your project. Payment terms are detailed in your written contract, and final balance is due upon project completion.',
        ],
        [
            'q' => 'How long will my new roof last?',
            'a' => 'Architectural asphalt shingles typically last 25–30 years, impact-resistant shingles 30+ years, and metal roofing 40–50 years. Lifespan depends on material quality, installation, attic ventilation, and Gulf Coast weather exposure. Proper maintenance and annual inspections extend roof life.',
        ],
    ],
    'Insurance Claims' => [
        [
            'q' => 'How quickly can you repair storm damage?',
            'a' => 'We offer same-day inspections for storm damage and work directly with insurance adjusters. Most repairs begin within 48 hours of approval. During severe weather season, we have emergency crews standing by for Huffman-area homeowners.',
        ],
        [
            'q' => 'Do you handle insurance claims?',
            'a' => 'Yes. Triple G Roofing provides detailed estimates that meet insurance requirements, communicates directly with your adjuster, and bills your insurance company whenever possible — so you are not paying out of pocket for covered storm damage.',
        ],
        [
            'q' => 'What if my insurance claim is denied?',
            'a' => 'We provide documentation to support your claim, but we are not a public adjuster or attorney. If your claim is denied, we can recommend a public adjuster or attorney who specializes in insurance disputes. You still have options.',
        ],
        [
            'q' => 'Will you meet with my insurance adjuster?',
            'a' => 'Absolutely. We meet your adjuster on site, walk through the damage together, and provide any additional documentation needed to support a fair settlement. Our goal is to get your claim approved without you having to become a roofing expert.',
        ],
    ],
    'Materials & Warranties' => [
        [
            'q' => 'What roof materials work best in Huffman\'s heat and humidity?',
            'a' => 'Impact-resistant shingles, architectural asphalt, and metal roofing all perform well in the North Harris County climate. We assess your home\'s specific exposure, budget, and aesthetic preferences to recommend the option that holds up best to Gulf Coast heat, humidity, and wind.',
        ],
        [
            'q' => 'What warranty comes with a new roof?',
            'a' => 'We guarantee 10 years of workmanship on every installation, and shingles carry manufacturer warranties of 25–30 years. As an authorized installer, we make sure your material warranty stays valid long after the job is done.',
        ],
        [
            'q' => 'Do you install metal roofing?',
            'a' => 'Yes. Metal roofing is an excellent choice for Gulf Coast homes — it sheds heat, lasts 40–50 years, and holds up to high winds better than asphalt. We install standing seam and corrugated metal systems with manufacturer-backed warranties.',
        ],
    ],
    'Inspections & Maintenance' => [
        [
            'q' => 'How often should I inspect my roof?',
            'a' => 'Plan on an annual inspection, especially after major storms. Catching problems early protects your investment — and because many claims are denied when damage is not documented quickly, a prompt inspection helps you stay ahead of any dispute.',
        ],
        [
            'q' => 'What does a roof inspection include?',
            'a' => 'Our inspections include a top-to-bottom visual assessment of shingles, flashing, vents, valleys, gutters, and attic ventilation. We photograph any damage, check for lifted or missing shingles, and provide a written report the same day.',
        ],
        [
            'q' => 'Do I need a roof inspection after a Huffman hailstorm?',
            'a' => 'Yes. Hail and Gulf Coast wind often bruise shingles and loosen granules without an obvious leak, and insurers frequently deny claims filed months later. A prompt, documented inspection after a storm protects both your roof and your ability to file a valid claim.',
        ],
    ],
];

/* --- Schema: FAQPage + BreadcrumbList --- */
$allFaqs = [];
foreach ($faqCategories as $category => $catFaqs) {
    $allFaqs = array_merge($allFaqs, $catFaqs);
}
$faqSchema = generateFAQSchema($allFaqs);

$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type"    => "BreadcrumbList",
    "itemListElement" => [
        ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $siteUrl . '/'],
        ["@type" => "ListItem", "position" => 2, "name" => "FAQ", "item" => $canonicalUrl],
    ],
];
$schemaMarkup = '<script type="application/ld+json">' . $faqSchema . '</script>' . "\n"
    . '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   FAQ Page Styles
   ============================================================ */
.faq-hero { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  min-height: 45vh; display: flex; align-items: center; text-align: center;
  padding-top: calc(var(--nav-height) + var(--space-16)); padding-bottom: var(--space-16); }
.faq-hero h1 { color: var(--color-white); font-size: clamp(2rem, 5vw, 3rem); margin-bottom: var(--space-4); }
.faq-hero .text-accent { font-size: 1.05em; }
.faq-hero__subtitle { color: rgba(255,255,255,0.9); font-size: var(--font-size-lg); max-width: 56ch; margin: 0 auto; line-height: 1.65; }

.faq-content { background: var(--color-white); }
.faq-category { margin-bottom: var(--space-16); }
.faq-category h2 { font-size: var(--font-size-2xl); color: var(--color-primary); margin-bottom: var(--space-8);
  padding-bottom: var(--space-3); border-bottom: 3px solid var(--color-accent); }
.faq-grid { display: grid; grid-template-columns: 1fr; gap: var(--space-6); }
.faq-item {
  background: var(--color-light); border-radius: var(--radius-lg);
  border: 1px solid var(--color-gray-light); overflow: hidden;
  transition: box-shadow var(--transition-base);
}
.faq-item[open] { box-shadow: var(--shadow-md); }
.faq-item summary {
  list-style: none; cursor: pointer; display: flex; align-items: center; gap: var(--space-3);
  padding: var(--space-5) var(--space-6); font-family: var(--font-heading);
  font-weight: 600; font-size: var(--font-size-base); color: var(--color-dark);
}
.faq-item summary::-webkit-details-marker { display: none; }
.faq-icon {
  flex-shrink: 0; width: 32px; height: 32px; border-radius: var(--radius-full);
  background: var(--color-primary); color: var(--color-white);
  display: flex; align-items: center; justify-content: center; font-weight: 800;
  transition: transform var(--transition-base);
}
.faq-icon svg { width: 18px; height: 18px; }
.faq-item[open] .faq-icon { transform: rotate(45deg); }
.faq-item .faq-answer { padding: 0 var(--space-6) var(--space-6) calc(var(--space-6) + var(--space-8)); }
.faq-item .faq-answer p { color: var(--color-gray-dark); font-size: var(--font-size-sm); margin: 0; line-height: 1.7; }
.faq-item summary:hover { color: var(--color-primary); }

.faq-cta { position: relative; background: var(--color-secondary); overflow: hidden; text-align: center; padding: var(--space-16) 0; }
.faq-cta::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(ellipse at 50% 0%, rgba(var(--color-primary-rgb), 0.28) 0%, transparent 60%);
}
.faq-cta .container { position: relative; z-index: 1; }
.faq-cta h2 { color: var(--color-white); font-size: clamp(1.8rem, 4.5vw, 2.75rem); margin-bottom: var(--space-4); }
.faq-cta p { color: rgba(255,255,255,0.85); max-width: 60ch; margin: 0 auto var(--space-8); font-size: var(--font-size-lg); }

@media (max-width: 768px) {
  .faq-category { margin-bottom: var(--space-12); }
}
</style>

<!-- ===================== HERO ===================== -->
<section class="faq-hero" aria-label="Roofing FAQs">
  <div class="container">
    <h1>Roofing <span class="text-accent">Questions</span> Answered</h1>
    <p class="faq-hero__subtitle">
      Straight answers on storm repairs, insurance claims, materials, warranties, and what to expect when you hire Triple G Roofing.
    </p>
  </div>
</section>

<!-- ===================== FAQ CONTENT ===================== -->
<main id="main-content" class="faq-content section-padding">
  <div class="container content-narrow">
    <?php foreach ($faqCategories as $category => $catFaqs): ?>
    <section class="faq-category" aria-labelledby="faq-category-<?php echo strtolower(str_replace(' ', '-', $category)); ?>">
      <h2 id="faq-category-<?php echo strtolower(str_replace(' ', '-', $category)); ?>"><?php echo htmlspecialchars($category); ?></h2>
      <div class="faq-grid">
        <?php foreach ($catFaqs as $i => $faq): ?>
        <details class="faq-item"<?php echo $i === 0 && $category === 'General' ? ' open' : ''; ?> data-animate>
          <summary>
            <span class="faq-icon" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"/><path d="M12 5v14"/>
              </svg>
            </span>
            <?php echo htmlspecialchars($faq['q']); ?>
          </summary>
          <div class="faq-answer"><p><?php echo htmlspecialchars($faq['a']); ?></p></div>
        </details>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endforeach; ?>
  </div>
</main>

<!-- ===================== CTA ===================== -->
<section class="faq-cta" aria-label="Still have questions?">
  <div class="container">
    <h2 data-animate>Still have questions? We have answers.</h2>
    <p data-animate>
      Call us at <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-accent); font-weight: 700;"><?php echo $phone; ?></a> or request a free estimate and we'll walk you through every detail of your roofing project.
    </p>
    <div style="display:flex; gap: var(--space-4); justify-content:center; flex-wrap:wrap; margin-top: var(--space-6);" data-animate>
      <a href="/contact/" class="btn btn-primary btn-lg">Get a Free Estimate</a>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> Call Now</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
