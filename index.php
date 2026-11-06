<?php
/**
 * Main theme file: sends everything to the 404 page
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Set the 404 status
status_header(404);
nocache_headers();

// Load the 404 page
get_template_part('404');
exit;
?>