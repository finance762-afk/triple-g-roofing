<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    // Each page sets its own $pageTitle, $pageDescription, $canonicalUrl before including head.php
    // Default fallback if not set
    if (!isset($pageTitle)) {
        $pageTitle = $siteName . ' | ' . $primaryKeyword . ' | ' . $address['city'] . ', ' . $address['state'];
    }
    if (!isset($pageDescription)) {
        $pageDescription = $siteName . ' provides professional ' . strtolower($primaryKeyword) . ' services in ' . $address['city'] . ', ' . $address['state'] . '. Licensed, insured, and trusted by homeowners across North Harris County.';
    }
    if (!isset($canonicalUrl)) {
        $canonicalUrl = $siteUrl . '/';
    }
    ?>

    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <?php if (isset($noindex) && $noindex === true): ?>
    <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <meta property="og:image" content="<?php echo $siteUrl; ?>/assets/images/logo.png">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
    <meta property="og:locale" content="en_US">

    <!-- Self-hosted fonts (v6.2 — NO Google Fonts CDN) -->
    <!-- Preload the above-the-fold heading font -->
    <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">

    <!-- Stylesheet with cache-bust -->
    <link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>">

    <!-- Google Analytics (placeholder — replace at launch) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo $googleAnalyticsId; ?>');
    </script> -->

    <!-- JSON-LD LocalBusiness Schema (no aggregateRating — forbidden v6.2) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "RoofingContractor",
        "@id": "<?php echo $siteUrl; ?>#organization",
        "name": "<?php echo htmlspecialchars($siteName); ?>",
        "url": "<?php echo $siteUrl; ?>",
        "logo": "<?php echo $siteUrl; ?>/assets/images/logo.png",
        "image": "<?php echo $siteUrl; ?>/assets/images/logo.png",
        "description": "<?php echo htmlspecialchars($pageDescription); ?>",
        "telephone": "<?php echo $phone; ?>",
        "email": "<?php echo $email; ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",
            "addressLocality": "<?php echo htmlspecialchars($address['city']); ?>",
            "addressRegion": "<?php echo htmlspecialchars($address['state']); ?>",
            "postalCode": "<?php echo htmlspecialchars($address['zip']); ?>"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": <?php echo $geo['lat']; ?>,
            "longitude": <?php echo $geo['lng']; ?>
        },
        "hasMap": "<?php echo $gbpUrl; ?>",
        "openingHours": "Mo-Su 08:00-20:00",
        "priceRange": "$$",
        "areaServed": [
            <?php foreach ($serviceAreas as $index => $area): ?>
            {
                "@type": "City",
                "name": "<?php echo htmlspecialchars($area); ?>, <?php echo $address['state']; ?>"
            }<?php if ($index < count($serviceAreas) - 1): ?>,<?php endif; ?>
            <?php endforeach; ?>
        ],
        "serviceOffered": [
            <?php foreach ($services as $index => $service): ?>
            {
                "@type": "Service",
                "serviceType": "<?php echo htmlspecialchars($service['name']); ?>",
                "description": "<?php echo htmlspecialchars($service['description']); ?>"
            }<?php if ($index < count($services) - 1): ?>,<?php endif; ?>
            <?php endforeach; ?>
        ]
    }
    </script>
</head>
<body>
