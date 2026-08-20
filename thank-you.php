<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Thank You — Triple G Roofing (Phase 5)
   ============================================================ */

$currentPage     = 'thank-you';
$pageTitle       = 'Thank You | Triple G Roofing';
$pageDescription = 'Thank you for contacting Triple G Roofing. We will be in touch soon to set up a time to take a look.';
$canonicalUrl    = $siteUrl . '/thank-you/';
$noindex         = true;  // Thank-you pages should not be indexed

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Thank You Page Styles
   ============================================================ */
.thank-you-hero {
  min-height: 75vh; display: flex; align-items: center; text-align: center;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  padding-top: calc(var(--nav-height) + var(--space-16)); padding-bottom: var(--space-16);
  position: relative; overflow: hidden;
}
.thank-you-hero::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.06;
}
.thank-you-hero .container { position: relative; z-index: 1; }
.thank-you-hero__check {
  width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.2);
  display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-6);
  color: var(--color-white); animation: checkPulse 1.5s ease-in-out infinite;
}
.thank-you-hero__check svg { width: 48px; height: 48px; stroke-width: 3; }
@keyframes checkPulse {
  0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255,255,255,0.5); }
  50% { transform: scale(1.05); box-shadow: 0 0 0 12px rgba(255,255,255,0); }
}
.thank-you-hero h1 { color: var(--color-white); font-size: clamp(2.2rem, 5vw, 3.5rem); margin-bottom: var(--space-4); }
.thank-you-hero .text-accent { font-size: 1.05em; }
.thank-you-hero__subtitle { color: rgba(255,255,255,0.92); font-size: var(--font-size-lg); max-width: 56ch; margin: 0 auto var(--space-8); line-height: 1.7; }
.thank-you-hero__next { background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);
  border-radius: var(--radius-lg); padding: var(--space-8); max-width: 600px; margin: 0 auto; text-align: left; }
.thank-you-hero__next h2 { color: var(--color-white); font-size: var(--font-size-xl); margin-bottom: var(--space-5); text-align: center; }
.thank-you-hero__next ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-4); }
.thank-you-hero__next li { display: flex; align-items: flex-start; gap: var(--space-3); color: rgba(255,255,255,0.92); line-height: 1.6; }
.thank-you-hero__next li svg { width: 20px; height: 20px; flex-shrink: 0; margin-top: 2px; color: var(--color-accent); }
.thank-you-hero__cta { margin-top: var(--space-8); text-align: center; }

.next-steps { background: var(--color-white); }
.next-steps-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-8); }
.next-step-card {
  background: var(--color-light); border-radius: var(--radius-lg); padding: var(--space-8);
  text-align: center; box-shadow: var(--shadow-card);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.next-step-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-xl); }
.next-step-icon {
  width: 64px; height: 64px; border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white); display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-5); box-shadow: var(--shadow-md);
}
.next-step-icon svg { width: 30px; height: 30px; }
.next-step-card h3 { color: var(--color-dark); font-size: var(--font-size-xl); margin-bottom: var(--space-3); }
.next-step-card p { color: var(--color-gray-dark); font-size: var(--font-size-sm); line-height: 1.6; margin: 0 0 var(--space-5); }

@media (max-width: 768px) {
  .next-steps-grid { grid-template-columns: 1fr; }
}
</style>

<div class="page-body">
<!-- ===================== HERO ===================== -->
<section class="thank-you-hero" aria-label="Thank you">
  <div class="container">
    <div class="thank-you-hero__check" aria-hidden="true">
      <?php echo icon('check-circle', 48); ?>
    </div>
    <h1>Thank you for <span class="text-accent">reaching out</span>!</h1>
    <p class="thank-you-hero__subtitle">
      Your message has been received, and a Triple G Roofing team member will be in touch soon — check your email and phone for a call or text from us.
    </p>

    <div class="thank-you-hero__next">
      <h2>What happens next?</h2>
      <ul>
        <li><?php echo icon('mail', 20); ?> <span><strong>We review your request</strong> and match you with the right crew member for your project.</span></li>
        <li><?php echo icon('phone', 20); ?> <span><strong>We call or text you</strong> to confirm details and set up a time for your free estimate.</span></li>
        <li><?php echo icon('clipboard', 20); ?> <span><strong>We inspect your roof</strong> in person, photograph any damage, and put a free written estimate in your hands.</span></li>
      </ul>
    </div>

    <div class="thank-you-hero__cta">
      <p style="color: rgba(255,255,255,0.92); margin-bottom: var(--space-4);">
        <strong>Need help right away?</strong> Call us now at <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-white); font-weight: 700; text-decoration: underline;"><?php echo $phone; ?></a>
      </p>
      <a href="/" class="btn btn-outline-white btn-lg">Return to Homepage</a>
    </div>
  </div>
</section>

<!-- ===================== NEXT STEPS ===================== -->
<section class="next-steps section-padding" aria-label="While you wait">
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">While You Wait</span>
      <h2>Learn more about Triple G Roofing</h2>
    </div>

    <div class="next-steps-grid">
      <article class="next-step-card" data-animate>
        <div class="next-step-icon"><?php echo icon('award', 30); ?></div>
        <h3>About Us</h3>
        <p>Meet Glenn and Tim Menn and learn why Greater Houston families have trusted Triple G Roofing since 1973.</p>
        <a href="/about/" class="btn btn-secondary">Learn More</a>
      </article>

      <article class="next-step-card reveal-delay-1" data-animate>
        <div class="next-step-icon"><?php echo icon('wrench', 30); ?></div>
        <h3>Our Services</h3>
        <p>Explore our full range of roofing services — from inspections to full replacements and everything in between.</p>
        <a href="/services/" class="btn btn-secondary">View Services</a>
      </article>

      <article class="next-step-card reveal-delay-2" data-animate>
        <div class="next-step-icon"><?php echo icon('star', 30); ?></div>
        <h3>Read Reviews</h3>
        <p>See what your Greater Houston neighbors say about working with our crew.</p>
        <a href="<?php echo htmlspecialchars($gbpUrl); ?>" target="_blank" rel="noopener" class="btn btn-secondary">View Reviews</a>
      </article>
    </div>
  </div>
</section>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
