</main>

<!-- Site Footer -->
<footer class="site-footer">
    <div class="container">
        <!-- Footer Grid -->
        <div class="footer-grid">
            <!-- Column 1: About & Trust Badges -->
            <div class="footer-col">
                <div class="site-logo" style="margin-bottom: var(--space-4);">
                    <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" width="96" height="48" style="height: 48px; width: auto;">
                </div>
                <p><?php echo htmlspecialchars($tagline); ?></p>
                <p style="font-size: var(--font-size-sm); margin-top: var(--space-3);">
                    <?php echo htmlspecialchars($siteName); ?> is a licensed roofing contractor serving <?php echo $address['city']; ?> and the surrounding North Harris County area. We specialize in storm damage repair, roof replacements, and emergency roofing services.
                </p>
                <div class="footer-trust">
                    <span class="trust-badge"><?php echo icon('shield', 16); ?> Licensed</span>
                    <span class="trust-badge"><?php echo icon('check-circle', 16); ?> Insured</span>
                    <span class="trust-badge"><?php echo icon('award', 16); ?> Trusted</span>
                </div>
            </div>

            <!-- Column 2: Services -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul>
                    <?php
                    $serviceCount = count($services);
                    $displayCount = min(6, $serviceCount);
                    for ($i = 0; $i < $displayCount; $i++):
                        $service = $services[$i];
                    ?>
                    <li>
                        <a href="/services/<?php echo $service['slug']; ?>/">
                            <?php echo htmlspecialchars($service['name']); ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                    <?php if ($serviceCount > 6): ?>
                    <li><a href="/services/">View All <?php echo $serviceCount; ?> Services</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Column 3: Service Areas -->
            <div class="footer-col">
                <h4>Service Areas</h4>
                <ul>
                    <?php foreach (array_slice($serviceAreas, 0, 5) as $area): ?>
                    <li>
                        <a href="/service-areas/<?php echo getAreaSlug($area); ?>/">
                            <?php echo htmlspecialchars($area); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <?php if (count($serviceAreas) > 5): ?>
                    <li><a href="/service-areas/">View All Areas</a></li>
                    <?php endif; ?>
                    <li><a href="/faq/">FAQ</a></li>
                    <li><a href="/blog/">Blog</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact -->
            <div class="footer-col">
                <h4>Contact Us</h4>
                <div class="contact-item">
                    <?php echo icon('phone', 18); ?>
                    <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo $phone; ?></a>
                </div>
                <div class="contact-item">
                    <?php echo icon('mail', 18); ?>
                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                </div>
                <div class="contact-item">
                    <?php echo icon('map-pin', 18); ?>
                    <span><?php /* service-area business — street withheld to match the GBP listing */ ?>
                    <?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></span>
                </div>
                <div class="contact-item">
                    <?php echo icon('clock', 18); ?>
                    <span><?php echo $businessHours; ?></span>
                </div>
                <a href="/contact/" class="btn btn-primary" style="margin-top: var(--space-4); width: 100%;">Get Free Estimate</a>
            </div>
        </div>

        <!-- AEO Entity Block -->
        <div class="aeo-entity" itemscope itemtype="https://schema.org/LocalBusiness">
            <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
            <meta itemprop="url" content="<?php echo $siteUrl; ?>">
            <meta itemprop="telephone" content="<?php echo $phone; ?>">
            <h4>About <?php echo htmlspecialchars($siteName); ?></h4>
            <p style="font-size: var(--font-size-sm); line-height: 1.7;">
                <?php echo htmlspecialchars($siteName); ?> is a licensed roofing contractor based in <?php echo $address['city']; ?>, <?php echo $address['state']; ?>. We serve homeowners across North Harris County with professional roofing services including <?php echo implode(', ', array_slice(array_column($services, 'name'), 0, 3)); ?>, and more. Family-owned and locally operated, we're committed to protecting your home with expert craftsmanship and transparent service.
            </p>
        </div>

        <!-- Footer Legal Row (v6.1 REQUIRED — all tiers) -->
        <div class="footer-legal-row">
            <a href="/privacy-policy/">Privacy Policy</a>
            <span class="footer-legal-divider">|</span>
            <a href="/terms/">Terms of Service</a>
            <span class="footer-legal-divider">|</span>
            <a href="/cookie-policy/">Cookie Policy</a>
            <span class="footer-legal-divider">|</span>
            <a href="/accessibility/">Accessibility</a>
            <span class="footer-legal-divider">|</span>
            <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
            <span class="footer-legal-divider">|</span>
            <a href="/sitemap.xml">Sitemap</a>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.</p>
            <p class="footer-credit">
                <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">
                    Web Design & Hosting by Page One Insights, LLC
                </a>
            </p>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top" aria-label="Back to top">
    <?php echo icon('arrow-up', 20); ?>
</button>

<!-- Mobile Sticky CTA Bar -->
<div class="mobile-cta-bar">
    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary" style="flex: 1; margin-right: var(--space-2);">
        <?php echo icon('phone', 18); ?> Call Now
    </a>
    <a href="/contact/" class="btn btn-accent" style="flex: 1;">
        Free Estimate
    </a>
</div>

<style>
/* Footer Legal Row (v6.1 compliance requirement) */
.footer-legal-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: var(--space-3);
    margin-top: var(--space-8);
    padding-top: var(--space-6);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: var(--font-size-xs);
}

.footer-legal-row a {
    color: rgba(255, 255, 255, 0.7);
    transition: color var(--transition-fast);
}

.footer-legal-row a:hover {
    color: var(--color-accent);
}

.footer-legal-divider {
    color: rgba(255, 255, 255, 0.3);
}

@media (max-width: 768px) {
    .footer-legal-row {
        flex-direction: column;
        text-align: center;
    }

    .footer-legal-divider {
        display: none;
    }
}
</style>

<!-- Scripts (defer for performance; NO third-party CDN scripts v6.2) -->
<script defer>
// Back to Top Button
(function() {
    const backToTop = document.querySelector('.back-to-top');

    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
})();

// Scroll reveal animations (v6.1 fail-open pattern)
(function() {
    // Add js-anim class to enable animations
    document.documentElement.classList.add('js-anim');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        },
        { threshold: 0.1 }
    );

    // Observe all [data-animate] elements
    document.querySelectorAll('[data-animate]').forEach(el => {
        observer.observe(el);
    });

    // Safety-net timeout: force reveal after 2 seconds
    setTimeout(() => {
        document.querySelectorAll('[data-animate]:not(.animated)').forEach(el => {
            el.classList.add('animated');
        });
    }, 2000);
})();

// Stat counter animation
(function() {
    const stats = document.querySelectorAll('.stat-number[data-target]');

    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-target'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const updateCounter = () => {
            current += increment;
            if (current < target) {
                el.textContent = Math.floor(current).toLocaleString();
                requestAnimationFrame(updateCounter);
            } else {
                el.textContent = target.toLocaleString();
            }
        };

        updateCounter();
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    entry.target.classList.add('counted');
                    animateCounter(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );

    stats.forEach(stat => observer.observe(stat));
})();
</script>

</body>
</html>
