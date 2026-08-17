  </main>

  <!-- Site Footer -->
  <footer class="site-footer">
    <div class="container">
      <!-- Footer Grid -->
      <div class="footer-grid">
        <!-- Column 1: Company Info -->
        <div class="footer-col">
          <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" style="height: 48px; width: auto; margin-bottom: 1rem;">
          <p><?php echo htmlspecialchars($siteName); ?> is a licensed roofing contractor serving <?php echo $address['city']; ?> and the North Harris County area with expert storm damage repair, new installations, and inspections.</p>
          <div class="footer-trust">
            <span class="trust-badge">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
              Licensed & Insured
            </span>
            <span class="trust-badge">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
              24/7 Emergency
            </span>
            <span class="trust-badge">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              Locally Owned
            </span>
          </div>
        </div>

        <!-- Column 2: Services -->
        <div class="footer-col">
          <h4>Our Services</h4>
          <ul>
            <?php
            $halfServices = ceil(count($services) / 2);
            foreach (array_slice($services, 0, $halfServices) as $service):
            ?>
            <li><a href="/services/<?php echo htmlspecialchars($service['slug']); ?>/"><?php echo htmlspecialchars($service['name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Column 3: More Services -->
        <div class="footer-col">
          <h4>Service Areas</h4>
          <ul>
            <?php foreach ($serviceAreas as $area): ?>
            <li><a href="/service-areas/<?php echo strtolower(str_replace(' ', '-', $area)); ?>/"><?php echo htmlspecialchars($area); ?>, TX</a></li>
            <?php endforeach; ?>
            <li><a href="/service-areas/">View All Areas</a></li>
          </ul>
        </div>

        <!-- Column 4: Contact Info -->
        <div class="footer-col">
          <h4>Get In Touch</h4>
          <div class="contact-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>
          </div>
          <div class="contact-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
          </div>
          <div class="contact-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span><?php echo htmlspecialchars($address['street']); ?><br><?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?></span>
          </div>
          <div class="contact-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <circle cx="12" cy="12" r="10"></circle>
              <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            <span><?php echo htmlspecialchars($businessHours); ?></span>
          </div>
          <a href="/contact/" class="btn btn-primary" style="margin-top: 1rem;">Get Free Estimate</a>
        </div>
      </div>

      <!-- AEO Entity Block -->
      <div class="aeo-entity" itemscope itemtype="https://schema.org/LocalBusiness">
        <h4><?php echo htmlspecialchars($siteName); ?> — Licensed Roofing Contractor in <?php echo $address['city']; ?>, Texas</h4>
        <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
        <meta itemprop="url" content="<?php echo $siteUrl; ?>">
        <meta itemprop="telephone" content="+<?php echo $phoneRaw; ?>">
        <p><?php echo htmlspecialchars($siteName); ?> is a trusted roofing contractor based in <?php echo $address['city']; ?>, Texas, serving North Harris County with expert roof repair, storm damage assessment, new installations, and emergency services. Our team specializes in insurance claim coordination and same-day inspections for hail and wind damage across <?php echo implode(', ', array_slice($serviceAreas, 0, 3)); ?>, and surrounding areas.</p>
      </div>

      <!-- Footer Legal Row (MANDATORY v6.1) -->
      <div class="footer-legal-row" style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.1); text-align: center; font-size: 0.875rem;">
        <a href="/privacy-policy/" style="color: rgba(255,255,255,0.7); margin: 0 0.5rem;">Privacy Policy</a>
        <span style="color: rgba(255,255,255,0.3);">|</span>
        <a href="/terms/" style="color: rgba(255,255,255,0.7); margin: 0 0.5rem;">Terms of Service</a>
        <span style="color: rgba(255,255,255,0.3);">|</span>
        <a href="/cookie-policy/" style="color: rgba(255,255,255,0.7); margin: 0 0.5rem;">Cookie Policy</a>
        <span style="color: rgba(255,255,255,0.3);">|</span>
        <a href="/accessibility/" style="color: rgba(255,255,255,0.7); margin: 0 0.5rem;">Accessibility</a>
        <span style="color: rgba(255,255,255,0.3);">|</span>
        <a href="/privacy-policy/#ccpa-rights" style="color: rgba(255,255,255,0.7); margin: 0 0.5rem;">Do Not Sell or Share My Personal Information</a>
        <span style="color: rgba(255,255,255,0.3);">|</span>
        <a href="/sitemap.xml" style="color: rgba(255,255,255,0.7); margin: 0 0.5rem;">Sitemap</a>
      </div>

      <!-- Footer Bottom Bar -->
      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.</p>
        <p class="footer-credit">
          <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design & Hosting by Page One Insights, LLC</a>
        </p>
      </div>
    </div>
  </footer>

  <!-- Mobile Floating CTA Bar -->
  <div class="mobile-cta-bar">
    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
      </svg>
      Call Now
    </a>
  </div>

  <!-- Back to Top Button -->
  <button class="back-to-top" aria-label="Back to top">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
      <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
  </button>

  <!-- Scripts -->
  <script src="/assets/js/main.js" defer></script>
  <script src="/assets/js/animations.js" defer></script>
  <script src="/assets/js/effects.js" defer></script>

  <!-- Back to Top Inline Script -->
  <script>
    const backToTop = document.querySelector('.back-to-top');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    });
    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  </script>
</body>
</html>
