<?php
/**
 * Theme functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Force a 404 for every request
function force_404_for_all() {
    // Skip admin and AJAX requests
    if (is_admin() || wp_doing_ajax()) {
        return;
    }
    
    // Set 404 for all front-end requests
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
}
add_action('template_redirect', 'force_404_for_all', 1);

// Disable WordPress features that could interfere
function disable_wp_features() {
    // Disable search
    if (is_search()) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}
add_action('parse_query', 'disable_wp_features');

// Remove extra meta tags
function remove_wp_meta_tags() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_resource_hints', 2);
}
add_action('init', 'remove_wp_meta_tags');

// Block the REST API: uncomment if needed
//function disable_rest_api($access) {
//    if (!is_user_logged_in()) {
//        return new WP_Error('rest_disabled', 'REST API disabled', array('status' => 404));
//   }
//    return $access;
//}
//add_filter('rest_authentication_errors', 'disable_rest_api');
?>