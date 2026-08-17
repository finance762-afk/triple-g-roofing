<!-- Skip to Content Accessibility Link -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- Site Header -->
<header class="site-header" data-header>
    <div class="container header-inner">
        <!-- Logo (analyzed: 1774x887 = 2:1 aspect ratio → 96px tall × 192px wide on white nav) -->
        <a href="/" class="site-logo" aria-label="<?php echo htmlspecialchars($siteName); ?> Home">
            <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" width="192" height="96">
        </a>

        <!-- Desktop Navigation -->
        <nav aria-label="Main navigation">
            <ul class="nav-links">
                <li><a href="/" <?php if (isActivePage('home')): ?>aria-current="page"<?php endif; ?>>Home</a></li>

                <!-- Services Dropdown -->
                <li class="nav-dropdown">
                    <a href="/services/" <?php if (isActivePage('services')): ?>aria-current="page"<?php endif; ?>>
                        Services <?php echo icon('chevron-down', 16); ?>
                    </a>
                    <ul class="nav-dropdown-menu" role="menu" style="display:none">
                        <?php foreach ($services as $service): ?>
                        <li role="none">
                            <a href="/services/<?php echo $service['slug']; ?>/" role="menuitem">
                                <?php echo htmlspecialchars($service['name']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <!-- Service Areas Dropdown -->
                <li class="nav-dropdown">
                    <a href="/service-areas/" <?php if (isActivePage('service-areas')): ?>aria-current="page"<?php endif; ?>>
                        Service Areas <?php echo icon('chevron-down', 16); ?>
                    </a>
                    <ul class="nav-dropdown-menu" role="menu" style="display:none">
                        <?php foreach ($serviceAreas as $area): ?>
                        <li role="none">
                            <a href="/service-areas/<?php echo strtolower(str_replace(' ', '-', $area)); ?>/" role="menuitem">
                                <?php echo htmlspecialchars($area); ?> Roofing
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li><a href="/about/" <?php if (isActivePage('about')): ?>aria-current="page"<?php endif; ?>>About</a></li>
                <li><a href="/contact/" <?php if (isActivePage('contact')): ?>aria-current="page"<?php endif; ?>>Contact</a></li>
            </ul>
        </nav>

        <!-- Desktop CTA -->
        <div class="header-cta">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent">
                <?php echo icon('phone', 18); ?> <?php echo $phone; ?>
            </a>
        </div>

        <!-- Mobile Hamburger -->
        <button class="hamburger" aria-label="Toggle navigation" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<!-- Main Content Area -->
<main id="main-content">

<style>
/* Mobile Navigation Overlay (inline for immediate availability) */
@media (max-width: 768px) {
    .nav-links {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(var(--color-secondary-rgb), 0.98);
        backdrop-filter: blur(12px);
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: var(--space-8);
        z-index: 999;
        padding: var(--space-8);
    }

    .nav-links.active {
        display: flex;
    }

    .nav-links a {
        font-size: var(--font-size-xl);
        color: var(--color-white);
    }

    .nav-dropdown-menu {
        position: static;
        background: transparent;
        box-shadow: none;
        padding: var(--space-4) 0;
        display: none !important;
    }

    .nav-dropdown.active .nav-dropdown-menu {
        display: block !important;
    }

    .nav-dropdown-menu a {
        color: rgba(255, 255, 255, 0.8);
        font-size: var(--font-size-base);
        padding: var(--space-2) 0;
    }

    .hamburger {
        display: flex;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
        padding: var(--space-2);
        background: none;
        border: none;
        z-index: 1001;
        position: relative;
    }

    .hamburger span {
        display: block;
        width: 24px;
        height: 2px;
        background: var(--color-white);
        transition: all var(--transition-fast);
    }

    .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -5px);
    }
}
</style>

<script>
// Mobile menu toggle
(function() {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    if (hamburger && navLinks) {
        hamburger.addEventListener('click', function() {
            const isActive = navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
            hamburger.setAttribute('aria-expanded', isActive);
            document.body.style.overflow = isActive ? 'hidden' : '';
        });

        // Close on link click (mobile)
        const links = navLinks.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && !this.closest('.nav-dropdown')) {
                    navLinks.classList.remove('active');
                    hamburger.classList.remove('active');
                    hamburger.setAttribute('aria-expanded', 'false');
                    document.body.style.overflow = '';
                }
            });
        });

        // Mobile dropdown toggle
        const dropdownToggles = document.querySelectorAll('.nav-dropdown > a');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('active');
                }
            });
        });
    }

    // Scroll behavior for header
    let lastScroll = 0;
    const header = document.querySelector('[data-header]');

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 80) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
    });
})();
</script>
