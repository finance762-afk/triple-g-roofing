<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  // Default page variables if not set by the calling page
  if (!isset($pageTitle)) {
      $pageTitle = $siteName . ' | ' . $primaryKeyword . ' | ' . $address['city'] . ', ' . $address['state'];
  }
  if (!isset($metaDescription)) {
      $metaDescription = $siteName . ' provides expert roofing services in ' . $address['city'] . ', TX. Storm damage repair, new installations & inspections. Licensed, insured. Call ' . $phone . ' for a free estimate.';
  }
  if (!isset($canonicalUrl)) {
      $canonicalUrl = $siteUrl . '/';
  }
  if (!isset($ogImage)) {
      $ogImage = $siteUrl . '/assets/images/logo.png';
  }
  ?>

  <!-- Primary SEO -->
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($ogImage); ?>">
  <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
  <meta property="og:locale" content="en_US">

  <!-- Preload heading font (self-hosted) -->
  <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Stylesheet with cache-busting -->
  <link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>">

  <!-- Favicons -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">

  <!-- Google Analytics (placeholder — replace at launch) -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo $googleAnalyticsId; ?>');
  </script> -->

  <!-- JSON-LD LocalBusiness Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "RoofingContractor",
    "@id": "<?php echo $siteUrl; ?>#organization",
    "name": "<?php echo htmlspecialchars($siteName); ?>",
    "url": "<?php echo $siteUrl; ?>",
    "telephone": "+<?php echo $phoneRaw; ?>",
    "email": "<?php echo htmlspecialchars($email); ?>",
    "description": "<?php echo htmlspecialchars($metaDescription); ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",
      "addressLocality": "<?php echo htmlspecialchars($address['city']); ?>",
      "addressRegion": "<?php echo htmlspecialchars($address['state']); ?>",
      "postalCode": "<?php echo htmlspecialchars($address['zip']); ?>",
      "addressCountry": "US"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": <?php echo $geo['lat']; ?>,
      "longitude": <?php echo $geo['lng']; ?>
    },
    "hasMap": "<?php echo $gbpUrl; ?>",
    "openingHours": "Mo-Su 08:00-20:00",
    "image": "<?php echo htmlspecialchars($ogImage); ?>",
    "areaServed": [
      <?php
      $areaCount = count($serviceAreas);
      foreach ($serviceAreas as $index => $area) {
          echo json_encode(['@type' => 'City', 'name' => $area]);
          if ($index < $areaCount - 1) echo ',';
      }
      ?>
    ],
    "priceRange": "$$",
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Roofing Services",
      "itemListElement": [
        <?php
        $serviceCount = count($services);
        foreach ($services as $index => $service) {
            echo json_encode([
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $service['name'],
                    'description' => $service['description']
                ]
            ]);
            if ($index < $serviceCount - 1) echo ',';
        }
        ?>
      ]
    }
  }
  </script>
</head>
<body>
