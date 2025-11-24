<?php
/**
 * Функции темы
 */

// Предотвращаем прямой доступ
if (!defined('ABSPATH')) {
    exit;
}

// Принудительно перенаправляем все запросы на 404
function force_404_for_all() {
    // Исключаем админку и ajax запросы
    if (is_admin() || wp_doing_ajax()) {
        return;
    }
    
    // Устанавливаем 404 для всех фронтенд запросов
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
}
add_action('template_redirect', 'force_404_for_all', 1);

// Отключаем WordPress функции которые могут мешать
function disable_wp_features() {
    // Отключаем поиск
    if (is_search()) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}
add_action('parse_query', 'disable_wp_features');

// Удаляем лишние мета теги
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

// Блокируем REST API если надо раскоментить
//function disable_rest_api($access) {
//    if (!is_user_logged_in()) {
//        return new WP_Error('rest_disabled', 'REST API disabled', array('status' => 404));
//   }
//    return $access;
//}
//add_filter('rest_authentication_errors', 'disable_rest_api');
?>