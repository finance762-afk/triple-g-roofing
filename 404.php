<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   404 — Triple G Roofing (Phase 5)
   ============================================================ */

http_response_code(404);

$currentPage     = '404';
$pageTitle       = 'Page Not Found | Triple G Roofing';
$pageDescription = 'The page you are looking for could not be found. Return to the Triple G Roofing homepage or contact us for help.';
$canonicalUrl    = $siteUrl . '/404/';
$noindex         = true;  // Signal to head.php to add noindex meta tag

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   404 Page Styles
   ============================================================ */
.error-404 {
  min-height: 70vh; display: flex; align-items: center; text-align: center;
  padding: var(--space-16) 0; background: linear-gradient(135deg, var(--color-light) 0%, var(--color-white) 100%);
}
.error-404__inner { max-width: 600px; margin: 0 auto; }
.error-404__code {
  font-family: var(--font-heading); font-size: clamp(6rem, 15vw, 10rem);
  font-weight: 800; line-height: 1; color: var(--color-primary); opacity: 0.3; margin-bottom: var(--space-4);
}
.error-404 h1 { font-size: clamp(1.8rem, 4vw, 2.5rem); color: var(--color-dark); margin-bottom: var(--space-4); }
.error-404 p { color: var(--color-gray-dark); font-size: var(--font-size-lg); margin-bottom: var(--space-8); line-height: 1.7; }
.error-404__links { display: flex; flex-wrap: wrap; gap: var(--space-4); justify-content: center; margin-bottom: var(--space-8); }
.error-404__links a { min-width: 180px; }
.error-404__popular {
  background: var(--color-white); border-radius: var(--radius-lg); padding: var(--space-8);
  box-shadow: var(--shadow-card); text-align: left; margin-top: var(--space-12);
}
.error-404__popular h2 { font-size: var(--font-size-xl); color: var(--color-primary); margin-bottom: var(--space-5); text-align: center; }
.error-404__popular ul { list-style: none; padding: 0; margin: 0; display: grid; grid-template-columns: 1fr; gap: var(--space-3); }
.error-404__popular li a {
  display: block; padding: var(--space-3) var(--space-4); border-radius: var(--radius);
  background: var(--color-light); color: var(--color-dark); font-weight: 500;
  transition: background var(--transition-base), color var(--transition-base);
}
.error-404__popular li a:hover { background: var(--color-primary); color: var(--color-white); }
.error-404__popular li a::before { content: '→'; margin-right: var(--space-2); color: var(--color-primary); }
.error-404__popular li a:hover::before { color: var(--color-white); }

@media (max-width: 600px) {
  .error-404__code { font-size: clamp(4rem, 20vw, 8rem); }
  .error-404__links { flex-direction: column; }
  .error-404__links a { width: 100%; }
}
</style>

<main id="main-content" class="error-404" aria-label="Page not found">
  <div class="container">
    <div class="error-404__inner">
      <div class="error-404__code" aria-hidden="true">404</div>
      <h1>This page can't be found</h1>
      <p>
        The page you're looking for doesn't exist or has been moved. You can head back to our homepage, browse our roofing services, or give us a call — we're here to help.
      </p>

      <div class="error-404__links">
        <a href="/" class="btn btn-primary">Go to Homepage</a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-secondary"><?php echo icon('phone', 18); ?> Call <?php echo $phone; ?></a>
      </div>

      <div class="error-404__popular">
        <h2>Popular Pages</h2>
        <ul>
          <li><a href="/services/">Roofing Services</a></li>
          <li><a href="/services/roof-inspection/">Roof Inspection</a></li>
          <li><a href="/services/storm-damage-repair/">Storm & Wind Damage Repair</a></li>
          <li><a href="/contact/">Contact Triple G Roofing</a></li>
          <li><a href="/about/">About Us</a></li>
          <li><a href="/service-areas/">Service Areas</a></li>
        </ul>
      </div>
    </div>
  </div>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
