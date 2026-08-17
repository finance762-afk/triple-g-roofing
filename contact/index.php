<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ============================================================
   Contact — Triple G Roofing (Phase 5)
   ============================================================ */

$currentPage     = 'contact';
$pageTitle       = 'Contact Triple G Roofing | Free Roof Estimates in Huffman, TX';
$pageDescription = 'Contact Triple G Roofing for a free roof inspection and estimate. Serving Huffman and North Harris County. Call (281) 570-3325 or request an estimate online.';
$canonicalUrl    = $siteUrl . '/contact/';

/* --- BreadcrumbList Schema --- */
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $pageDescription,
            'provider' => [
                '@id' => $siteUrl . '/#organization'
            ]
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $siteUrl . '/'
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Contact',
                    'item' => $canonicalUrl
                ]
            ]
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li class="breadcrumb-sep" aria-hidden="true">›</li>
            <li aria-current="page">Contact</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero hero--interior" data-animate="fade-up">
    <div class="container">
        <div class="hero__content text-center">
            <span class="eyebrow-label">Get in Touch</span>
            <h1>Request Your Free <span class="text-accent">Roof Estimate</span></h1>
            <p class="hero__subtitle">Same-day response. No-pressure consultation. Honest pricing you can trust.</p>
        </div>
    </div>
</section>

<!-- Contact Grid Section -->
<section class="section">
    <div class="container">
        <div class="grid-2" style="gap: var(--space-2xl);">

            <!-- Contact Form -->
            <div data-animate="fade-up">
                <h2>Send Us a Message</h2>
                <p style="margin-bottom: var(--space-lg);">Tell us about your project and we'll get back to you within 1 business day.</p>

                <form action="<?php echo $formAction; ?>" method="POST">
                    <!-- Formsubmit Hidden Fields -->
                    <input type="hidden" name="_next" value="<?php echo $siteUrl; ?>/thank-you/">
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_template" value="table">
                    <input type="hidden" name="_subject" value="New Contact Request from <?php echo $siteName; ?>">
                    <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
                    <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">

                    <!-- Consent Fields (v6.1 requirement) -->
                    <input type="hidden" name="_consent_version" value="v2.1">
                    <input type="hidden" name="_consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? ''); ?>">

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
            <div data-animate="fade-up" style="animation-delay: 0.1s;">
                <h2>Contact Information</h2>
                <p style="margin-bottom: var(--space-lg);">Reach out by phone, email, or stop by our office in Huffman.</p>

                <div class="contact-info-card" style="background: var(--color-bg-alt); padding: var(--space-lg); border-radius: var(--radius); margin-bottom: var(--space-lg);">
                    <div class="contact-item" style="display: flex; align-items: flex-start; gap: var(--space-md); margin-bottom: var(--space-md);">
                        <?php echo icon('phone', 24); ?>
                        <div>
                            <strong style="display: block; margin-bottom: 4px;">Phone</strong>
                            <a href="tel:+<?php echo $phoneRaw; ?>" style="font-size: var(--font-size-lg); color: var(--color-primary); font-weight: 700;"><?php echo $phone; ?></a>
                        </div>
                    </div>

                    <div class="contact-item" style="display: flex; align-items: flex-start; gap: var(--space-md); margin-bottom: var(--space-md);">
                        <?php echo icon('mail', 24); ?>
                        <div>
                            <strong style="display: block; margin-bottom: 4px;">Email</strong>
                            <a href="mailto:<?php echo $email; ?>" style="color: var(--color-primary);"><?php echo $email; ?></a>
                        </div>
                    </div>

                    <div class="contact-item" style="display: flex; align-items: flex-start; gap: var(--space-md); margin-bottom: var(--space-md);">
                        <?php echo icon('map-pin', 24); ?>
                        <div>
                            <strong style="display: block; margin-bottom: 4px;">Address</strong>
                            <span><?php echo $address['street']; ?><br><?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></span>
                        </div>
                    </div>

                    <div class="contact-item" style="display: flex; align-items: flex-start; gap: var(--space-md);">
                        <?php echo icon('clock', 24); ?>
                        <div>
                            <strong style="display: block; margin-bottom: 4px;">Hours</strong>
                            <span><?php echo $businessHours; ?></span>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Embed -->
                <div class="map-embed" style="position: relative; width: 100%; padding-bottom: 56.25%; border-radius: var(--radius); overflow: hidden; margin-bottom: var(--space-md);">
                    <?php echo str_replace(
                        ['<iframe', 'style="'],
                        ['<iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"', 'data-orig-style="'],
                        $gbpMapEmbed
                    ); ?>
                </div>

                <a href="<?php echo $directionsUrl; ?>" class="btn btn-secondary" style="width: 100%;" target="_blank" rel="noopener">
                    <?php echo icon('external-link', 18); ?> Get Directions
                </a>
            </div>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section section--light cta-banner" data-animate="fade-up">
    <div class="container text-center">
        <h2>Prefer to Call?</h2>
        <p style="font-size: var(--font-size-lg); margin-bottom: var(--space-lg);">We're here to answer your questions and schedule your free roof inspection.</p>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg">
            <?php echo icon('phone', 20); ?> <?php echo $phone; ?>
        </a>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
