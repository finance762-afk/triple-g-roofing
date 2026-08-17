<?php
/**
 * ============================================================
 * sitemap.php — Dynamic XML sitemap for Triple G Roofing
 * Phase 5 — SEO, AEO, and Final Polish
 * ============================================================
 * Rewritten by .htaccess: /sitemap.xml → /sitemap.php
 * Builds the <url> list from config.php ($services, $serviceAreas)
 * so new services and areas appear automatically.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';

// Set XML content type
header('Content-Type: application/xml; charset=UTF-8');

// Current date for lastmod
$lastmod = date('Y-m-d');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

    <!-- Homepage -->
    <url>
        <loc><?php echo $siteUrl; ?>/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- About -->
    <url>
        <loc><?php echo $siteUrl; ?>/about/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Contact -->
    <url>
        <loc><?php echo $siteUrl; ?>/contact/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- FAQ -->
    <url>
        <loc><?php echo $siteUrl; ?>/faq/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>

    <!-- Blog Main -->
    <url>
        <loc><?php echo $siteUrl; ?>/blog/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Individual Blog Posts -->
    <?php
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php')) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';
        foreach ($blogPosts as $post):
    ?>
    <url>
        <loc><?php echo $siteUrl; ?>/blog/<?php echo $post['slug']; ?>/</loc>
        <lastmod><?php echo $post['dateISO']; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <?php
        endforeach;
    }
    ?>

    <!-- Services Main -->
    <url>
        <loc><?php echo $siteUrl; ?>/services/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    <!-- Individual Service Pages -->
    <?php foreach ($services as $service): ?>
    <url>
        <loc><?php echo $siteUrl; ?>/services/<?php echo $service['slug']; ?>/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>

    <!-- Service Areas Main -->
    <url>
        <loc><?php echo $siteUrl; ?>/service-areas/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Individual Service Area Pages -->
    <?php foreach ($serviceAreas as $area):
        $areaSlug = strtolower(str_replace(' ', '-', $area));
    ?>
    <url>
        <loc><?php echo $siteUrl; ?>/service-areas/<?php echo $areaSlug; ?>/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <?php endforeach; ?>

    <!-- Legal / Compliance Pages (v6.1 REQUIRED — priority 0.3, changefreq yearly) -->
    <url>
        <loc><?php echo $siteUrl; ?>/privacy-policy/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <url>
        <loc><?php echo $siteUrl; ?>/terms/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <url>
        <loc><?php echo $siteUrl; ?>/cookie-policy/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <url>
        <loc><?php echo $siteUrl; ?>/accessibility/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <!-- Thank You page (noindexed on-page but included here for crawl discovery) -->
    <url>
        <loc><?php echo $siteUrl; ?>/thank-you/</loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.1</priority>
    </url>

</urlset>
