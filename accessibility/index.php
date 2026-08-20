<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$currentPage     = 'accessibility';
$pageTitle       = 'Accessibility Statement | Triple G Roofing';
$pageDescription = 'Triple G Roofing is committed to digital accessibility for all visitors. Learn about our WCAG 2.1 AA conformance efforts and how to report issues.';
$canonicalUrl    = $siteUrl . '/accessibility/';
$lastUpdated     = date('F j, Y');

$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        ['@type' => 'WebPage', '@id' => $canonicalUrl . '#webpage', 'url' => $canonicalUrl, 'name' => $pageTitle, 'description' => $pageDescription],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Accessibility', 'item' => $canonicalUrl]
        ]]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<div class="page-body">
<section class="hero hero--legal"><div class="hero__copy">
  <span class="eyebrow-label">Commitment</span>
  <h1>Accessibility Statement</h1>
  <span class="section-subtitle">building for everyone</span>
  <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
</div></section>

<nav class="breadcrumb"><div class="container"><ol>
  <li><a href="/">Home</a></li><li class="breadcrumb-sep">›</li>
  <li aria-current="page">Accessibility</li>
</ol></div></nav>

<article class="legal-prose">
  <h2>1. Our Commitment</h2>
  <p><?php echo $siteName; ?> is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards to <?php echo $domain; ?>.</p>

  <h2>2. Conformance Status</h2>
  <p>This site is designed to conform with Web Content Accessibility Guidelines (WCAG) 2.1 Level AA. WCAG defines requirements for designers and developers to improve accessibility for people with disabilities. Our site partially conforms with WCAG 2.1 Level AA, meaning some content does not yet fully meet the standard. We are working to address all known issues.</p>

  <h2>3. Accessibility Features</h2>
  <ul>
    <li>Semantic HTML5 markup with proper landmark regions (header, nav, main, footer)</li>
    <li>Skip-to-content link at the top of every page</li>
    <li>Visible keyboard focus indicators on all interactive elements</li>
    <li>Alt text on all meaningful images</li>
    <li>Sufficient color contrast for body text and interactive elements</li>
    <li>Responsive design that works across screen sizes and zoom levels</li>
    <li>prefers-reduced-motion support — animations disabled for users who request reduced motion</li>
    <li>ARIA labels on navigation and form elements</li>
    <li>Form field labels associated with inputs</li>
  </ul>

  <h2>4. Known Issues</h2>
  <p>We are aware of these areas needing improvement:</p>
  <ul>
    <li>Some third-party embeds may not fully meet WCAG standards. We provide alternative ways to access this information (call us, email us).</li>
    <li>Some PDF documents may not be fully accessible. Contact us for alternative formats.</li>
  </ul>

  <h2>5. Feedback and Reporting Issues</h2>
  <p>If you encounter an accessibility barrier on this site, please tell us. We aim to respond to accessibility feedback within 5 business days.</p>

  <h2>6. Alternative Contact Methods</h2>
  <p>If our website is not accessible to you, you can reach us by phone or mail. We will provide service information in alternative formats on request.</p>

  <h2>7. Changes to This Statement</h2>
  <p>We may update this Accessibility Statement from time to time. The "Last Updated" date will reflect the most recent change.</p>

  <h2>8. Contact Us</h2>
  <p><strong><?php echo $siteName; ?></strong><br>
  Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
  Phone: <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a><br>
  Based in: <?php echo $address["city"]; ?>, <?php echo $address["state"]; ?> <?php echo $address["zip"]; ?> (service-area business — we come to you)</p>

  <div class="legal-disclaimer">
    General template; recommend attorney review.
  </div>
</article>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
