<?php
/**
 * 404 page template
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Send the correct headers
status_header(404);
nocache_headers();

// Output the contents of 404.html
$html_file = get_template_directory() . '/404.html';

if (file_exists($html_file)) {
    // Read and output the HTML file
    echo file_get_contents($html_file);
} else {
    // Fallback if the file is missing
    echo '<!DOCTYPE html>';
    echo '<html><head><title>404 Not Found</title></head>';
    echo '<body><h1>404 - Page Not Found</h1></body></html>';
}

exit;
?>