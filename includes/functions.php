<?php
/**
 * ============================================================
 * functions.php — Helper functions for Triple G Roofing
 * ============================================================
 */

/**
 * Check if the current page matches the given page identifier
 */
function isActivePage($page) {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Format phone number for display
 */
function formatPhone($phone) {
    $cleaned = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($cleaned) === 10) {
        return sprintf('(%s) %s-%s',
            substr($cleaned, 0, 3),
            substr($cleaned, 3, 3),
            substr($cleaned, 6)
        );
    }
    return $phone;
}

/**
 * Convert service name to URL-friendly slug
 */
function getServiceSlug($name) {
    return strtolower(str_replace([' ', '&', '/'], ['-', 'and', '-'], $name));
}

/**
 * Convert city name to URL-friendly slug
 */
function getAreaSlug($city) {
    return strtolower(str_replace([' ', '&'], ['-', 'and'], $city));
}

/**
 * Generate Service schema markup
 */
function generateServiceSchema($service) {
    global $siteName, $siteUrl, $address;

    return [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'serviceType' => $service['name'],
        'description' => $service['description'],
        'provider' => [
            '@type' => 'RoofingContractor',
            'name' => $siteName,
            '@id' => $siteUrl . '#organization'
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $address['city'],
            'containedInPlace' => [
                '@type' => 'State',
                'name' => $address['state']
            ]
        ]
    ];
}

/**
 * Generate FAQPage schema markup
 */
function generateFAQSchema($faqs) {
    $faqItems = [];
    foreach ($faqs as $faq) {
        $faqItems[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faqItems
    ];
}

/**
 * Generate BreadcrumbList schema
 */
function generateBreadcrumbSchema($items) {
    global $siteUrl;

    $listItems = [];
    foreach ($items as $index => $item) {
        $listItems[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => $siteUrl . $item['url']
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $listItems
    ];
}

/**
 * Output schema as JSON-LD script tag
 */
function outputSchema($schema) {
    echo '<script type="application/ld+json">' . "\n";
    echo json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    echo "\n</script>\n";
}

/**
 * Get current page URL
 */
function getCurrentUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

/**
 * Escape HTML for safe output
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
