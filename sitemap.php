<?php
header("Content-Type: application/xml; charset=utf-8");

$domain = "https://pdf-converter.shop";
$keywordsFile = __DIR__ . '/keywords.txt';

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

$today = date('Y-m-d');

// Homepage
echo "  <url>\n";
echo "    <loc>{$domain}/</loc>\n";
echo "    <lastmod>{$today}</lastmod>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

if (file_exists($keywordsFile)) {
    $keywords = file($keywordsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($keywords as $kw) {
        $kw = trim($kw);
        if ($kw === '') continue;

        // keyword → slug
        $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $kw));
        $slug = trim($slug, '-');

        echo "  <url>\n";
        echo "    <loc>{$domain}/{$slug}</loc>\n";
        echo "    <lastmod>{$today}</lastmod>\n";
        echo "    <changefreq>weekly</changefreq>\n";
        echo "    <priority>0.8</priority>\n";
        echo "  </url>\n";
    }
}

echo "</urlset>";
