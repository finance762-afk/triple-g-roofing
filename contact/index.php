<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Contact — Triple G Roofing & Construction
   Service-area business: based in Humble, TX — NO street address.
   Form markup / field names / consent checkboxes are the v6.1
   standard and must not change.
   ============================================================ */

$currentPage     = 'contact';
$pageTitle       = 'Contact Triple G Roofing & Construction | Free Estimates, Humble TX';
$pageDescription = 'Call (281) 824-5463 or send a message for a free inspection and free written estimate. Based in Humble, TX and serving 50 communities across the Greater Houston area since 1973.';
$canonicalUrl    = $siteUrl . '/contact/';

/* --- Schema: ContactPage + BreadcrumbList --- */
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type'       => 'ContactPage',
            '@id'         => $canonicalUrl . '#webpage',
            'url'         => $canonicalUrl,
            'name'        => $pageTitle,
            'description' => $pageDescription,
            'about'       => ['@id' => $siteUrl . '/#organization'],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $canonicalUrl],
            ],
        ],
    ],
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ============================================================
   Contact page — page-specific styles (Premium tier)
   Tokens only. Prefix: .ct-
   ============================================================ */
[data-animate].ct-delay-1 { transition-delay: .06s; }
[data-animate].ct-delay-2 { transition-delay: .14s; }
[data-animate].ct-delay-3 { transition-delay: .22s; }

/* ---------- Breadcrumb ---------- */
.ct-breadcrumb {
  background: var(--color-light);
  border-bottom: 1px solid var(--color-gray-light);
}
.ct-breadcrumb ol {
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
.ct-breadcrumb a { color: var(--color-gray-dark); }
.ct-breadcrumb a:hover { color: var(--color-primary); }
.ct-breadcrumb [aria-current] {
  color: var(--color-primary);
  font-weight: 600;
}
.ct-breadcrumb-sep { color: var(--color-gray-light); }

/* ---------- Hero: layered photo + gradient + noise ---------- */
.ct-hero {
  position: relative;
  min-height: 48vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + var(--space-6)) 0 var(--space-16);
  overflow: hidden;
  isolation: isolate;
}
.ct-hero__bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 30%;
  z-index: 0;
}
.ct-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  background: linear-gradient(160deg,
    color-mix(in srgb, var(--color-secondary) 94%, transparent) 0%,
    color-mix(in srgb, var(--color-secondary) 80%, transparent) 60%,
    color-mix(in srgb, var(--color-primary) 45%, var(--color-secondary)) 100%);
}
.ct-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
  opacity: .05;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.ct-hero__inner {
  position: relative;
  z-index: 2;
  max-width: 800px;
  margin-inline: auto;
  text-align: center;
}
.ct-hero__eyebrow {
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
.ct-hero__eyebrow svg { width: 16px; height: 16px; }
.ct-hero h1 {
  color: var(--color-white);
  font-size: clamp(2.2rem, 4.8vw, 3.6rem);
  line-height: 1.08;
  margin-bottom: var(--space-5);
  text-wrap: balance;
}
.ct-hero h1 .text-accent { font-size: 1.04em; }
.ct-hero__lede {
  color: color-mix(in srgb, var(--color-white) 90%, transparent);
  font-size: var(--font-size-lg);
  line-height: 1.7;
  max-width: 60ch;
  margin: 0 auto var(--space-8);
}
.ct-hero__phone {
  display: inline-flex;
  align-items: center;
  gap: var(--space-3);
  background: var(--color-white);
  color: var(--color-secondary);
  border-radius: var(--radius-full);
  padding: var(--space-3) var(--space-6) var(--space-3) var(--space-3);
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: var(--font-size-xl);
  box-shadow: var(--shadow-xl);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.ct-hero__phone:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-lg);
}
.ct-hero__phone .ct-hero__phone-ico {
  width: 44px;
  height: 44px;
  border-radius: var(--radius-full);
  background: var(--color-primary);
  color: var(--color-white);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.ct-hero__phone svg { width: 20px; height: 20px; }
.ct-hero__phone small {
  display: block;
  font-family: var(--font-body);
  font-weight: 500;
  font-size: var(--font-size-xs);
  color: var(--color-gray);
  letter-spacing: .5px;
  text-transform: uppercase;
}

/* ---------- Main grid ---------- */
.ct-main { background: var(--color-white); }
.ct-grid {
  display: grid;
  grid-template-columns: minmax(0, 7fr) minmax(0, 5fr);
  gap: var(--space-12);
  align-items: start;
}
.ct-form-card {
  background: var(--color-white);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-xl);
  padding: var(--space-10);
  box-shadow: var(--shadow-card);
  position: relative;
  overflow: hidden;
}
.ct-form-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 5px;
  background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
}
.ct-form-card h2 {
  font-size: clamp(1.6rem, 3vw, 2.1rem);
  color: var(--color-dark);
  margin-bottom: var(--space-2);
  text-wrap: balance;
}
.ct-form-card > p {
  color: var(--color-gray-dark);
  line-height: 1.65;
  margin-bottom: var(--space-8);
  max-width: 60ch;
}
.ct-form-card .btn[type="submit"] { box-shadow: var(--shadow-md); }

/* ---------- Info column ---------- */
.ct-aside {
  display: flex;
  flex-direction: column;
  gap: var(--space-6);
  position: sticky;
  top: calc(var(--nav-height) + var(--space-4));
}
.ct-info {
  background: var(--color-secondary);
  color: var(--color-white);
  border-radius: var(--radius-xl);
  padding: var(--space-8);
  position: relative;
  overflow: hidden;
}
.ct-info::after {
  content: '';
  position: absolute;
  width: 220px;
  height: 220px;
  right: -80px;
  bottom: -80px;
  border-radius: var(--radius-full);
  background: radial-gradient(circle, color-mix(in srgb, var(--color-primary) 45%, transparent) 0%, transparent 70%);
  pointer-events: none;
}
.ct-info h2 {
  color: var(--color-white);
  font-size: var(--font-size-2xl);
  margin-bottom: var(--space-2);
  text-wrap: balance;
}
.ct-info > p {
  color: color-mix(in srgb, var(--color-white) 78%, transparent);
  font-size: var(--font-size-sm);
  line-height: 1.6;
  margin-bottom: var(--space-6);
}
.ct-info__list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  gap: var(--space-4);
  position: relative;
  z-index: 1;
}
.ct-info__item {
  display: grid;
  grid-template-columns: 44px 1fr;
  gap: var(--space-4);
  align-items: start;
}
.ct-info__ico {
  width: 44px;
  height: 44px;
  border-radius: var(--radius-md);
  background: color-mix(in srgb, var(--color-white) 10%, transparent);
  border: 1px solid color-mix(in srgb, var(--color-white) 14%, transparent);
  color: var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.ct-info__ico svg { width: 22px; height: 22px; }
.ct-info__item strong {
  display: block;
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  color: var(--color-accent);
  margin-bottom: var(--space-1);
}
.ct-info__item a {
  color: var(--color-white);
  font-weight: 600;
  word-break: break-word;
}
.ct-info__item a:hover { color: var(--color-accent); }
.ct-info__item a.ct-info__tel {
  font-family: var(--font-heading);
  font-size: var(--font-size-xl);
  font-weight: 800;
}
.ct-info__item span {
  color: color-mix(in srgb, var(--color-white) 88%, transparent);
  line-height: 1.5;
}
.ct-info__item small {
  display: block;
  color: color-mix(in srgb, var(--color-white) 62%, transparent);
  font-size: var(--font-size-xs);
  margin-top: var(--space-1);
}

/* ---------- Map card ---------- */
.ct-map {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-card);
  border: 1px solid var(--color-gray-light);
  background: var(--color-light);
}
.ct-map__embed {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 10;
}
.ct-map__embed iframe {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
.ct-map__foot {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--space-4);
  padding: var(--space-4) var(--space-5);
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
}
.ct-map__foot .btn { white-space: nowrap; }
.ct-map__foot .btn svg { width: 16px; height: 16px; }

/* ---------- What to expect ---------- */
.ct-steps { background: var(--color-light); }
.ct-steps__head {
  max-width: 720px;
  margin-inline: auto;
  text-align: center;
}
.ct-steps__head h2 {
  font-size: clamp(1.8rem, 3.4vw, 2.5rem);
  color: var(--color-dark);
  margin: var(--space-3) 0 var(--space-4);
  text-wrap: balance;
}
.ct-steps__head p {
  color: var(--color-gray-dark);
  line-height: 1.7;
}
.ct-steps__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
  margin-top: var(--space-10);
  counter-reset: ctstep;
}
.ct-step {
  position: relative;
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8) var(--space-6) var(--space-6);
  box-shadow: var(--shadow-card);
  counter-increment: ctstep;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.ct-step:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.ct-step::before {
  content: counter(ctstep, decimal-leading-zero);
  position: absolute;
  top: calc(-1 * var(--space-4));
  left: var(--space-6);
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: var(--font-size-sm);
  letter-spacing: 1px;
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: var(--radius-full);
  padding: var(--space-1) var(--space-4);
  box-shadow: var(--shadow-md);
}
.ct-step__ico {
  width: 48px;
  height: 48px;
  border-radius: var(--radius-md);
  background: color-mix(in srgb, var(--color-primary) 10%, var(--color-white));
  color: var(--color-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: var(--space-4);
}
.ct-step__ico svg { width: 24px; height: 24px; }
.ct-step h3 {
  font-size: var(--font-size-lg);
  color: var(--color-dark);
  margin-bottom: var(--space-2);
  text-wrap: balance;
}
.ct-step p {
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
  line-height: 1.65;
  margin: 0;
}

/* ---------- Service area ---------- */
.ct-area { background: var(--color-white); }
.ct-area__grid {
  display: grid;
  grid-template-columns: minmax(0, 4fr) minmax(0, 8fr);
  gap: var(--space-12);
  align-items: start;
}
.ct-area__intro h2 {
  font-size: clamp(1.8rem, 3.4vw, 2.5rem);
  color: var(--color-dark);
  margin: var(--space-3) 0 var(--space-4);
  text-wrap: balance;
}
.ct-area__intro p {
  color: var(--color-gray-dark);
  line-height: 1.7;
  margin-bottom: var(--space-4);
}
.ct-area__intro .btn { margin-top: var(--space-2); }
.ct-area__cities {
  columns: 3;
  column-gap: var(--space-8);
  list-style: none;
  padding: var(--space-6) var(--space-8);
  margin: 0;
  background: var(--color-light);
  border-radius: var(--radius-lg);
  border: 1px solid var(--color-gray-light);
}
.ct-area__cities li {
  break-inside: avoid;
  padding: var(--space-1) 0 var(--space-1) var(--space-5);
  position: relative;
  font-size: var(--font-size-sm);
  color: var(--color-gray-dark);
}
.ct-area__cities li::before {
  content: '';
  position: absolute;
  left: 0;
  top: .75em;
  width: 8px;
  height: 8px;
  border-radius: var(--radius-full);
  background: var(--color-accent);
}
.ct-area__cities a {
  color: var(--color-primary);
  font-weight: 600;
}
.ct-area__cities a:hover { text-decoration: underline; }

/* ---------- CTA ---------- */
.ct-cta {
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: var(--space-16) 0;
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
}
.ct-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: .06;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}
.ct-cta .container { position: relative; z-index: 1; }
.ct-cta h2 {
  color: var(--color-white);
  font-size: clamp(1.9rem, 4vw, 2.75rem);
  margin-bottom: var(--space-4);
  text-wrap: balance;
}
.ct-cta p {
  color: color-mix(in srgb, var(--color-white) 92%, transparent);
  max-width: 58ch;
  margin: 0 auto var(--space-8);
  font-size: var(--font-size-lg);
}
.ct-cta .btn svg { width: 20px; height: 20px; }

/* ---------- Dividers ---------- */
.ct-divider {
  display: block;
  overflow: hidden;
  line-height: 0;
}
.ct-divider svg {
  display: block;
  width: 100%;
  height: 100%;
}
.ct-divider--slant { height: 56px; }
.ct-divider--curve { height: 64px; }

/* ---------- Focus + motion ---------- */
.ct-hero a:focus-visible,
.ct-cta a:focus-visible,
.ct-area__cities a:focus-visible {
  outline: 3px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: var(--radius-sm);
}
@media (prefers-reduced-motion: reduce) {
  .ct-hero__phone:hover,
  .ct-step:hover { transform: none; }
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
  .ct-grid { grid-template-columns: 1fr; gap: var(--space-10); }
  .ct-aside { position: static; }
  .ct-area__grid { grid-template-columns: 1fr; gap: var(--space-8); }
  .ct-area__cities { columns: 3; }
}
@media (max-width: 768px) {
  .ct-steps__grid { grid-template-columns: 1fr; gap: var(--space-8); }
  .ct-form-card { padding: var(--space-6); }
  .ct-area__cities { columns: 2; padding: var(--space-5); }
}
@media (max-width: 520px) {
  .ct-hero { min-height: 0; }
  .ct-hero__phone { font-size: var(--font-size-lg); }
  .ct-map__foot { flex-direction: column; align-items: stretch; text-align: center; }
  .ct-area__cities { columns: 1; }
}
</style>


<!-- ===================== BREADCRUMB ===================== -->
<nav class="ct-breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="ct-breadcrumb-sep" aria-hidden="true">/</li>
      <li><a href="/contact/" aria-current="page">Contact</a></li>
    </ol>
  </div>
</nav>

<!-- ===================== HERO ===================== -->
<section class="ct-hero" aria-label="Contact <?php echo htmlspecialchars($siteName); ?>">
  <img class="ct-hero__bg"
       src="/assets/images/crew-underlayment.jpg"
       srcset="/assets/images/crew-underlayment-480.webp 480w, /assets/images/crew-underlayment-960.webp 960w"
       sizes="100vw"
       alt="Triple G roofers installing synthetic underlayment on a steep roof"
       width="1200" height="1600" loading="eager" fetchpriority="high">
  <div class="container ct-hero__inner">
    <span class="ct-hero__eyebrow"><?php echo icon('mail', 16); ?> Get in Touch</span>
    <h1>Request your free inspection and <span class="text-accent">written estimate</span></h1>
    <p class="ct-hero__lede">
      Tell us what you're seeing — a leak, storm damage, tired siding, a fence that's leaning, a patio that needs a
      cover — and we'll come take a look. Free inspections, free written estimates, no pressure. Family owned and
      serving the Greater Houston area since 1973.
    </p>
    <a href="tel:+<?php echo $phoneRaw; ?>" class="ct-hero__phone">
      <span class="ct-hero__phone-ico" aria-hidden="true"><?php echo icon('phone', 20); ?></span>
      <span><?php echo $phone; ?><small>Call or text · <?php echo htmlspecialchars($businessHours); ?></small></span>
    </a>
  </div>
</section>

<!-- ===================== FORM + INFO ===================== -->
<section class="section ct-main" aria-label="Send a message or find our contact details">
  <div class="container">
    <div class="ct-grid">

      <!-- Contact Form -->
      <div class="ct-form-card" data-animate>
        <h2>Send us a message</h2>
        <p>Tell us a little about your project and the best way to reach you. We'll call or text to set up a time to come take a look.</p>

                <form action="<?php echo $formAction; ?>" method="POST">
                    <!-- Formsubmit Hidden Fields -->
                    <input type="hidden" name="_next" value="<?php echo $siteUrl; ?>/thank-you/">
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_template" value="table">
                    <input type="hidden" name="_subject" value="New Contact Request from <?php echo $siteName; ?>">
                    <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
                    <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">

                    <!-- Consent Fields (v6.1 requirement — no underscore prefix for Formsubmit.co) -->
                    <input type="hidden" name="consent_version" value="v2.1">
                    <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? ''); ?>">

                    <!-- Form Fields -->
                    <div class="form-field">
                        <input type="text" name="name" id="contact-name" placeholder=" " required>
                        <label for="contact-name">Your Name *</label>
                    </div>

                    <div class="form-field">
                        <input type="tel" name="phone" id="contact-phone" placeholder=" " required>
                        <label for="contact-phone">Phone Number *</label>
                    </div>

                    <div class="form-field">
                        <input type="email" name="email" id="contact-email" placeholder=" " required>
                        <label for="contact-email">Email Address *</label>
                    </div>

                    <div class="form-field">
                        <select name="service_requested" id="contact-service" required>
                            <option value="">Select a service...</option>
                            <?php foreach ($services as $service): ?>
                            <option value="<?php echo htmlspecialchars($service['name']); ?>"><?php echo htmlspecialchars($service['name']); ?></option>
                            <?php endforeach; ?>
                            <option value="Not Sure">Not Sure</option>
                        </select>
                    </div>

                    <div class="form-field">
                        <textarea name="message" id="contact-message" rows="5" placeholder=" " required></textarea>
                        <label for="contact-message">Tell us about your project *</label>
                    </div>

                    <!-- THREE CONSENT CHECKBOXES (v6.1 TCPA 2025/2026 requirement) -->
                    <fieldset class="p1-consent-set" style="border: 1px solid var(--color-border); padding: var(--space-md); border-radius: var(--radius); margin-bottom: var(--space-md);">
                        <legend class="p1-consent-legend" style="font-weight: 700; font-size: var(--font-size-sm); color: var(--color-primary); padding: 0 var(--space-xs);">Communication Consent</legend>

                        <label class="p1-consent-item" style="display: flex; align-items: flex-start; gap: var(--space-sm); margin-bottom: var(--space-md); cursor: pointer;">
                            <input type="checkbox" name="email_opt_in" value="yes" style="margin-top: 3px; flex-shrink: 0; accent-color: var(--color-primary);">
                            <span style="font-size: var(--font-size-sm); line-height: 1.5;"><strong>Email updates (optional):</strong> Receive project updates and occasional service reminders via email. You can unsubscribe any time.</span>
                        </label>

                        <label class="p1-consent-item" style="display: flex; align-items: flex-start; gap: var(--space-sm); margin-bottom: var(--space-md); cursor: pointer;">
                            <input type="checkbox" name="sms_opt_in" value="yes" style="margin-top: 3px; flex-shrink: 0; accent-color: var(--color-primary);">
                            <span style="font-size: var(--font-size-sm); line-height: 1.5;"><strong>SMS/Text (optional):</strong> Receive text messages about your project. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong></span>
                        </label>

                        <label class="p1-consent-item" style="display: flex; align-items: flex-start; gap: var(--space-sm); cursor: pointer;">
                            <input type="checkbox" name="terms_accepted" value="yes" required style="margin-top: 3px; flex-shrink: 0; accent-color: var(--color-primary);">
                            <span style="font-size: var(--font-size-sm); line-height: 1.5;">I have read and agree to the <a href="/terms/" style="color: var(--color-primary); text-decoration: underline;">Terms of Service</a> and <a href="/privacy-policy/" style="color: var(--color-primary); text-decoration: underline;">Privacy Policy</a> *</span>
                        </label>
                    </fieldset>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Send Message
                    </button>

                    <p class="form-disclaimer" style="font-size: var(--font-size-xs); color: var(--color-text-light); margin-top: var(--space-sm); text-align: center;">
                        * Required field. We respect your privacy and will never share your information.
                    </p>
                </form>
      </div>

      <!-- Contact Info & Map -->
      <aside class="ct-aside" aria-label="Contact details">
        <div class="ct-info ct-delay-1" data-animate>
          <h2>Contact information</h2>
          <p>A small, family-owned father-and-son team. When you call, you reach the people who'll do the work.</p>
          <ul class="ct-info__list">
            <li class="ct-info__item">
              <span class="ct-info__ico" aria-hidden="true"><?php echo icon('phone', 22); ?></span>
              <div>
                <strong>Phone</strong>
                <a href="tel:+<?php echo $phoneRaw; ?>" class="ct-info__tel"><?php echo $phone; ?></a>
              </div>
            </li>
            <li class="ct-info__item">
              <span class="ct-info__ico" aria-hidden="true"><?php echo icon('mail', 22); ?></span>
              <div>
                <strong>Email</strong>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
              </div>
            </li>
            <li class="ct-info__item">
              <span class="ct-info__ico" aria-hidden="true"><?php echo icon('map-pin', 22); ?></span>
              <div>
                <strong>Based in</strong>
                <span><?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?></span>
                <small>We come to you — serving <?php echo count($serviceAreaCities); ?> communities across the Greater Houston area.</small>
              </div>
            </li>
            <li class="ct-info__item">
              <span class="ct-info__ico" aria-hidden="true"><?php echo icon('clock', 22); ?></span>
              <div>
                <strong>Hours</strong>
                <span><?php echo htmlspecialchars($businessHours); ?></span>
              </div>
            </li>
          </ul>
        </div>

        <div class="ct-map ct-delay-2" data-animate>
          <div class="ct-map__embed">
            <?php echo str_replace(
                ['<iframe', 'style="'],
                ['<iframe title="Triple G Roofing &amp; Construction on Google Maps"', 'data-orig-style="'],
                $gbpMapEmbed
            ); ?>
          </div>
          <div class="ct-map__foot">
            <span>Our Google Business Profile — reviews, photos and updates.</span>
            <a href="<?php echo htmlspecialchars($directionsUrl); ?>" class="btn btn-secondary" target="_blank" rel="noopener"><?php echo icon('external-link', 16); ?> Open in Maps</a>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<div class="ct-divider ct-divider--slant" aria-hidden="true">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none"><polygon fill="var(--color-light)" points="0,56 1200,0 1200,56"/></svg>
</div>

<!-- ===================== WHAT TO EXPECT ===================== -->
<section class="section ct-steps" aria-labelledby="ct-steps-title" style="padding-top: var(--space-8);">
  <div class="container">
    <div class="ct-steps__head">
      <span class="eyebrow-label">What Happens Next</span>
      <h2 id="ct-steps-title">What should you expect after you <span class="text-accent">reach out</span>?</h2>
      <p>The same simple process we've followed since 1973 — no high-pressure sales, no surprises.</p>
    </div>
    <div class="ct-steps__grid">
      <article class="ct-step" data-animate>
        <div class="ct-step__ico"><?php echo icon('phone', 24); ?></div>
        <h3>We call or text you back</h3>
        <p>We'll confirm the details, answer your first questions, and set up a time that works for you to come take a look.</p>
      </article>
      <article class="ct-step ct-delay-1" data-animate>
        <div class="ct-step__ico"><?php echo icon('search', 24); ?></div>
        <h3>We inspect and photograph</h3>
        <p>A free inspection of the roof or project area, with photos of what we find so you can see exactly what we're talking about.</p>
      </article>
      <article class="ct-step ct-delay-2" data-animate>
        <div class="ct-step__ico"><?php echo icon('check-circle', 24); ?></div>
        <h3>You get a written estimate</h3>
        <p>A free written estimate with the scope spelled out. Take your time with it — if it involves an insurance claim, we'll walk you through that process too.</p>
      </article>
    </div>
  </div>
</section>

<div class="ct-divider ct-divider--curve" aria-hidden="true">
  <svg viewBox="0 0 1200 64" preserveAspectRatio="none"><path fill="var(--color-light)" d="M0,0 C300,64 900,64 1200,0 L1200,0 L0,0 Z"/></svg>
</div>

<!-- ===================== SERVICE AREA ===================== -->
<section class="section ct-area" aria-labelledby="ct-area-title" style="padding-top: var(--space-6);">
  <div class="container">
    <div class="ct-area__grid">
      <div class="ct-area__intro" data-animate>
        <span class="eyebrow-label">Where We Work</span>
        <h2 id="ct-area-title">Serving <span class="text-accent"><?php echo count($serviceAreaCities); ?> communities</span> across Greater Houston</h2>
        <p><?php echo htmlspecialchars($serviceAreaSummary); ?></p>
        <p>We're based in <?php echo htmlspecialchars($address['city']); ?>, Texas, and we travel to every community on this list. Don't see your neighborhood? Call us — no job is too big or too small, and we're happy to take a look.</p>
        <a href="/service-areas/" class="btn btn-primary">Explore our service areas</a>
      </div>
      <ul class="ct-area__cities ct-delay-1" data-animate aria-label="Communities we serve">
        <?php foreach ($serviceAreaCities as $city): ?>
        <li>
          <?php if (in_array($city, $serviceAreas, true)): ?>
          <a href="/service-areas/<?php echo getAreaSlug($city); ?>/"><?php echo htmlspecialchars($city); ?></a>
          <?php else: ?>
          <?php echo htmlspecialchars($city); ?>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="ct-cta" aria-label="Prefer to call?">
  <div class="container">
    <h2>Prefer to talk it through?</h2>
    <p>Call <?php echo htmlspecialchars($shortName); ?> and tell us what's going on. We'll answer your questions and get your free inspection on the schedule.</p>
    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg"><?php echo icon('phone', 20); ?> <?php echo $phone; ?></a>
  </div>
</section>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
