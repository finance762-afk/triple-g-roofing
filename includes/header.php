  <!-- Skip to main content accessibility link -->
  <a href="#main-content" class="skip-link">Skip to main content</a>

  <!-- Site Header -->
  <header class="site-header" data-header>
    <div class="container">
      <div class="header-inner">
        <!-- Logo -->
        <a href="/" class="site-logo" aria-label="<?php echo htmlspecialchars($siteName); ?> Home">
          <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" width="112" height="56">
        </a>

        <!-- Desktop Navigation -->
        <nav class="nav-links" aria-label="Main navigation">
          <ul>
            <li><a href="/" <?php if (isset($currentPage) && $currentPage === 'home') echo 'aria-current="page"'; ?>>Home</a></li>

            <li class="nav-dropdown">
              <a href="/services/" <?php if (isset($currentPage) && $currentPage === 'services') echo 'aria-current="page"'; ?>>
                Services
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" style="display: inline; margin-left: 4px; vertical-align: middle;">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
              </a>
              <ul class="nav-dropdown-menu" role="menu">
                <?php foreach ($services as $service): ?>
                <li role="none">
                  <a href="/services/<?php echo htmlspecialchars($service['slug']); ?>/" role="menuitem">
                    <?php echo htmlspecialchars($service['name']); ?>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </li>

            <li><a href="/service-areas/" <?php if (isset($currentPage) && $currentPage === 'areas') echo 'aria-current="page"'; ?>>Service Areas</a></li>
            <li><a href="/about/" <?php if (isset($currentPage) && $currentPage === 'about') echo 'aria-current="page"'; ?>>About</a></li>
            <li><a href="/contact/" <?php if (isset($currentPage) && $currentPage === 'contact') echo 'aria-current="page"'; ?>>Contact</a></li>
          </ul>

          <!-- Desktop CTA -->
          <div class="header-cta">
            <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent" aria-label="Call us at <?php echo $phone; ?>">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
              <?php echo $phone; ?>
            </a>
          </div>
        </nav>

        <!-- Mobile Hamburger -->
        <button class="hamburger" aria-label="Toggle navigation menu" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main id="main-content">
