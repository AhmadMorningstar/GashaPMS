<?php
// Get the URL passed as a query parameter
$url = isset($_GET['url']) ? $_GET['url'] : 'https://gie.gasha.edu.iq/activates-news/';

// Fetch the content of the URL using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification if needed
$html = curl_exec($ch);
curl_close($ch);

// Load the HTML content into DOMDocument
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Prevent HTML parsing errors
$dom->loadHTML($html);
libxml_clear_errors();

// Extract and remove the header
$xpath = new DOMXPath($dom);

// Remove header with class "jupiterx-header"
$header = $xpath->query("//header[contains(@class, 'jupiterx-header')]");
foreach ($header as $node) {
    $node->parentNode->removeChild($node);
}

// Remove footer with class "jupiterx-subfooter"
$footer = $xpath->query("//footer[contains(@class, 'jupiterx-subfooter')]");
foreach ($footer as $node) {
    $node->parentNode->removeChild($node);
}

// Remove footer with class "elementor-widget-wrap elementor-element-populated"
$footer2 = $xpath->query("//footer[contains(@class, 'elementor-widget-wrap elementor-element-populated')]");
foreach ($footer2 as $node) {
    $node->parentNode->removeChild($node);
}

// Remove the "Read More" button by targeting the specific class of the button
$readMoreButton = $xpath->query("//div[contains(@class, 'read-more-div')]//a[contains(@class, 'more-tag')]");
foreach ($readMoreButton as $node) {
    $node->parentNode->removeChild($node); // Remove the "Read More" link
}

// Remove post-footer
$postFooter = $xpath->query("//div[contains(@class, 'post-footer')]");
foreach ($postFooter as $node) {
    $node->parentNode->removeChild($node); // Remove the post-footer element
}

// Remove footer with class "jupiterx-footer"
$footer3 = $xpath->query("//footer[contains(@class, 'jupiterx-footer')]");
foreach ($footer3 as $node) {
    $node->parentNode->removeChild($node); // Remove the footer element
}

// Remove the elementor posts container and its contents
$postsContainer = $xpath->query("//div[contains(@class, 'elementor-posts-container')]");
foreach ($postsContainer as $node) {
    $node->parentNode->removeChild($node); // Remove the entire posts container
}

// Remove the specific section with the share buttons and heading (the one you provided)
$section = $xpath->query("//section[contains(@class, 'elementor-section') and contains(@class, 'elementor-inner-section') and contains(@data-id, '33ee53fe')]");
foreach ($section as $node) {
    $node->parentNode->removeChild($node); // Remove the specific section
}

// Remove the specific post navigation div (the one you provided)
$postNavigation = $xpath->query("//div[contains(@class, 'elementor-element') and contains(@data-id, '43c24d6a')]");
foreach ($postNavigation as $node) {
    $node->parentNode->removeChild($node); // Remove the specific post navigation div
}

// Remove the button wrapper div
$buttonWrapper = $xpath->query("//div[contains(@class, 'elementor-button-wrapper')]");
foreach ($buttonWrapper as $node) {
    $node->parentNode->removeChild($node); // Remove the button wrapper div
}

// Remove the specific heading element
$headingElement = $xpath->query("//div[contains(@class, 'elementor-element') and contains(@class, 'elementor-element-2ceb29c9') and contains(@class, 'elementor-widget-heading')]");
foreach ($headingElement as $node) {
    $node->parentNode->removeChild($node); // Remove the specific heading element
}

// Output the modified HTML
echo $dom->saveHTML();
?>
