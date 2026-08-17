<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$currentPage     = 'terms';
$pageTitle       = 'Terms of Service | Triple G Roofing';
$metaDescription = 'Terms and conditions governing use of the Triple G Roofing website and engagement of our roofing services in Huffman, TX.';
$canonicalUrl    = $siteUrl . '/terms/';
$lastUpdated     = date('F j, Y');

$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        ['@type' => 'WebPage', '@id' => $canonicalUrl . '#webpage', 'url' => $canonicalUrl, 'name' => $pageTitle, 'description' => $metaDescription],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Terms of Service', 'item' => $canonicalUrl]
        ]]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<main id="main-content">
<section class="hero hero--legal"><div class="hero__copy">
  <span class="eyebrow-label">Legal</span>
  <h1>Terms of Service</h1>
  <span class="section-subtitle">the fine print, in plain English</span>
  <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
</div></section>

<nav class="breadcrumb"><div class="container"><ol>
  <li><a href="/">Home</a></li><li class="breadcrumb-sep">›</li>
  <li aria-current="page">Terms of Service</li>
</ol></div></nav>

<article class="legal-prose">
  <h2>1. Agreement to Terms</h2>
  <p>By accessing or using <?php echo $domain; ?> or engaging <?php echo $siteName; ?> for services, you agree to these Terms of Service. If you do not agree, do not use this site or our services.</p>

  <h2>2. Use of This Website</h2>
  <p>You may use this Site for personal, non-commercial purposes to learn about our services and contact us. You may not:</p>
  <ul>
    <li>Use the Site for unlawful purposes</li>
    <li>Attempt to access non-public systems or data</li>
    <li>Scrape or copy content without written permission</li>
    <li>Submit false information through our contact form</li>
    <li>Use automated systems to extract data</li>
  </ul>

  <h2>3. Service Estimates and Quotes</h2>
  <p>All estimates are based on information provided and conditions visible at the time of inspection. Final pricing may differ if:</p>
  <ul>
    <li>Project scope changes</li>
    <li>Hidden damage is discovered</li>
    <li>Material costs change between estimate and project start</li>
    <li>Code requirements differ from initial assumptions</li>
  </ul>
  <p>Verbal quotes are non-binding. Only written, signed contracts constitute a final agreement.</p>

  <h2>4. Project Work</h2>
  <ul>
    <li>Work is governed by a written contract specific to each job.</li>
    <li>We comply with applicable Texas state and local building codes.</li>
    <li>Work is performed by <?php echo $siteName; ?> employees and qualified subcontractors.</li>
    <li>All workers carry workers' compensation insurance as required by Texas law.</li>
    <li>We are licensed and insured to operate in the state of Texas.</li>
  </ul>

  <h2>5. Warranties</h2>
  <p>Workmanship warranties are detailed in your project contract. Manufacturer warranties on materials are provided by those manufacturers and pass through to you upon project completion. Warranties exclude:</p>
  <ul>
    <li>Acts of God beyond manufacturer ratings</li>
    <li>Damage from neglect or alteration by others</li>
    <li>Pre-existing conditions disclosed prior to work</li>
  </ul>

  <h2>6. Payment Terms</h2>
  <p>Payment terms are specified in your project contract. Standard terms include:</p>
  <ul>
    <li>A deposit at contract signing</li>
    <li>Progress payments at milestones where applicable</li>
    <li>Final balance due upon project completion</li>
  </ul>
  <p>We accept check, electronic transfer, and financing through approved third-party providers. Past-due balances may accrue interest as permitted by Texas law.</p>

  <h2>7. Cancellation</h2>
  <p>Cancellation terms are specified in your contract. Generally:</p>
  <ul>
    <li>Cancellation prior to materials ordered: deposit refunded minus administrative costs</li>
    <li>Cancellation after materials ordered: deposit forfeited; materials become customer property</li>
    <li>Cancellation after work begins: payment due for work completed plus materials</li>
  </ul>

  <h2>8. Insurance Claim Work</h2>
  <p>For insurance restoration projects, payment terms are typically structured around your insurance carrier's payment schedule. We do NOT serve as a public adjuster or legal representative. We provide repair estimates and complete approved repairs only. Negotiation of claim values and policy interpretation is the homeowner's responsibility.</p>

  <h2>9. Limitation of Liability</h2>
  <p>To the maximum extent permitted by Texas law, <?php echo $siteName; ?>'s total liability for any claim related to the Site or our services shall not exceed the amount you paid for the specific service giving rise to the claim. We are not liable for indirect, incidental, special, or consequential damages.</p>

  <h2>10. Intellectual Property</h2>
  <p>All content on this Site — text, graphics, photographs, logos — is owned by <?php echo $siteName; ?> or used with permission, and is protected by copyright. You may not reproduce, distribute, or create derivative works without written permission.</p>

  <h2>11. Governing Law and Disputes</h2>
  <p>These Terms are governed by the laws of the State of Texas without regard to conflict-of-laws principles. Any disputes shall be resolved in the state or federal courts located in Harris County, Texas.</p>

  <h2>12. Changes to These Terms</h2>
  <p>We may update these Terms at any time. The "Last Updated" date will reflect the most recent version. Continued use of the Site after updates constitutes acceptance of revised Terms.</p>

  <h2>13. Contact Us</h2>
  <p><strong><?php echo $siteName; ?></strong><br>
  Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
  Phone: <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a><br>
  Address: <?php echo $address['street']; ?>, <?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></p>

  <div class="legal-disclaimer">
    This document is provided as a general template. We recommend reviewing with a licensed Texas attorney before publication.
  </div>
</article>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
