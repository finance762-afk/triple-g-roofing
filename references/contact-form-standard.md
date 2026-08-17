# Contact Form Standard — Full Spec (Formsubmit.co, 2026-07-11)

> Loaded on demand. CLAUDE.md → "Contact Form Submission" carries the hard rules; this file carries the full copy-verbatim form markup, field rules, and submission flow. Read this file BEFORE writing any contact form.

New builds submit contact forms via **Formsubmit.co** to the client's email. Use the exact `form_action` URL from `build-plan.json` — it is `https://formsubmit.co/{client email}`. Customer Service is CC'd on every submission via the `_cc` field.

> **Legacy note:** sites migrated in June 2026 post to a Page One lead endpoint (`db.pageone.cloud/functions/v1/leads/{slug}` or `design.pageone.cloud/api/leads/{slug}`). Those are still valid — do NOT rewrite an existing site's form action in either direction unless explicitly instructed.

### Form action URL

```
https://formsubmit.co/{client email}    ← use form_action from build-plan.json verbatim
```

### Required form markup

```html
<form action="https://formsubmit.co/owner@example-client.com" method="POST">

  <!-- Honeypot — MUST be hidden from users, bots fill it out -->
  <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">

  <!-- Formsubmit.co directives -->
  <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
  <input type="hidden" name="_captcha" value="false">
  <input type="hidden" name="_template" value="table">
  <input type="hidden" name="_subject" value="New lead from <?php echo htmlspecialchars($siteName); ?>">
  <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">

  <!-- Consent tracking (plain names — Formsubmit forwards them in the email) -->
  <input type="hidden" name="consent_version" value="v2.1">
  <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

  <!-- Required fields (names MUST match exactly) -->
  <label>
    <span>Your Name</span>
    <input type="text" name="name" required>
  </label>

  <label>
    <span>Email</span>
    <input type="email" name="email" required>
  </label>

  <label>
    <span>Phone</span>
    <input type="tel" name="phone" required>
  </label>

  <!-- Optional but strongly recommended -->
  <label>
    <span>Service Needed</span>
    <select name="service">
      <option value="">Select a service</option>
      <!-- Populate with client-specific service options from intake data -->
    </select>
  </label>

  <label>
    <span>Message</span>
    <textarea name="message" rows="4"></textarea>
  </label>

  <!-- ═══ SEPARATE CONSENT CHECKBOXES (TCPA 2025/2026 + Texas TCPA) ═══ -->

  <fieldset class="form-consent-fieldset">
    <legend class="form-consent-legend">Communication Consent</legend>

    <label class="form-consent-item">
      <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
      <span class="consent-label">
        <strong>Email updates (optional):</strong> I agree to receive emails from
        <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, promotions, and news. I understand I can unsubscribe anytime via the link in any email
        or by emailing <?php echo htmlspecialchars($contactEmail); ?>. Message frequency varies.
      </span>
    </label>

    <label class="form-consent-item">
      <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
      <span class="consent-label">
        <strong>SMS/Text messages (optional):</strong> I agree to receive text messages from
        <?php echo htmlspecialchars($siteName); ?> at the phone number I provided. Message types may include appointment reminders, service updates, and promotional
        offers. Message frequency varies. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.
        <strong>Consent is not a condition of purchase.</strong>
      </span>
    </label>

    <label class="form-consent-item form-consent-required">
      <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
      <span class="consent-label">
        I have read and agree to the
        <a href="/privacy-policy/">Privacy Policy</a>
        and
        <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
      </span>
    </label>

  </fieldset>

  <button type="submit">Send Message</button>
</form>
```

### Field name rules

- `name`, `email`, `phone` — REQUIRED on every form. Field `name` attributes must match these strings exactly (lowercase).
- `service` — OPTIONAL but strongly recommended (dropdown of the client's services).
- `message` — OPTIONAL. Free-text field.
- `_honey` — REQUIRED. Spam protection. Must be visually hidden AND have `tabindex="-1"` and `autocomplete="off"`. Do NOT use `display:none` alone without `!important` — bots that parse CSS will skip it.
- `_next` — REQUIRED. ABSOLUTE URL (`$siteUrl . '/thank-you'`) — Formsubmit.co requires a full URL for the redirect.
- `_captcha` = `false`, `_template` = `table`, `_subject`, `_cc` = `CustomerService@pageoneinsights.com` — REQUIRED Formsubmit.co directives on every form.

### What happens on submission

1. Formsubmit.co emails the lead to the client's email (table format)
2. Customer Service receives a CC copy (internal visibility + consent record)
3. User is redirected to `_next` (the thank-you page)

Note: the first submission to a new client email triggers Formsubmit.co's one-time activation email — the client (or CS via the _cc copy) must click to activate. Submit a test lead at launch and confirm activation.

### What NOT to include

- **NO** JavaScript for submission — native HTML form submit works and is more reliable
- **NO** external spam libraries (reCAPTCHA, hCaptcha) — honeypot is sufficient
- **NO** mailto: action links

### Thank-you page

Every build includes `/thank-you.php` with:
- `<meta name="robots" content="noindex,nofollow">` in head.php (via page-specific `$noindex = true`)
- Branded success message
- Phone number + CTA to call now
- Link back to home

