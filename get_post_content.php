<?php
// Get the post ID from the query string
$postId = isset($_GET['id']) ? $_GET['id'] : null;

// Set the URL of the activity details page
$url = "https://gie.gasha.edu.iq/activates-news/{$postId}";

// Use cURL to fetch the post content
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$html = curl_exec($ch);
curl_close($ch);

// Load the HTML into a DOM parser
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

// Remove header and footer (same as before)
$xpath = new DOMXPath($dom);
$header = $xpath->query("//header");
foreach ($header as $h) {
    $h->parentNode->removeChild($h);
}
$footer = $xpath->query("//footer");
foreach ($footer as $f) {
    $f->parentNode->removeChild($f);
}

// Output the content of the specific post
$elements = $xpath->query("//div[contains(@class, 'jupiterx-main')]");
if ($elements->length > 0) {
    echo $dom->saveHTML($elements[0]);
} else {
    echo "<p>No content found.</p>";
}
?>
