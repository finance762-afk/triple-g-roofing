<?php
// Temporary hold page — served by the config.php guard while .site-locked
// exists. 503 keeps search engines treating this as a temporary outage.
if (http_response_code() !== 503) { http_response_code(503); header('Retry-After: 86400'); header('Cache-Control: no-store'); }
$siteName = isset($siteName) && $siteName !== '' ? $siteName : 'This website';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<title>Temporarily Unavailable</title>
<style>
  body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;background:#f5f6f8;color:#1e293b;display:flex;min-height:100vh;align-items:center;justify-content:center;padding:24px;box-sizing:border-box}
  .card{max-width:480px;width:100%;background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:40px 36px;text-align:center;box-shadow:0 4px 24px rgba(15,23,42,.06)}
  h1{font-size:20px;margin:0 0 12px;color:#0f172a}
  p{font-size:15px;line-height:1.6;margin:0 0 8px;color:#475569}
  .owner{margin-top:28px;padding-top:20px;border-top:1px solid #e2e8f0;font-size:13px;color:#64748b}
  .owner a{color:#2563eb;text-decoration:none}
</style>
</head>
<body>
  <div class="card">
    <h1><?php echo htmlspecialchars($siteName); ?> is temporarily unavailable</h1>
    <p>We apologize for the inconvenience. Please check back soon.</p>
    <div class="owner">
      Site owner? Please contact your website provider to restore service:<br>
      <a href="mailto:Finance@PageOneInsights.com">Finance@PageOneInsights.com</a> &middot; (888)&nbsp;272-1940
    </div>
  </div>
</body>
</html>
