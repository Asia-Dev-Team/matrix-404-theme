<?php
/**
 * Главный файл темы - перенаправляет все на 404
 */

// Предотвращаем прямой доступ
if (!defined('ABSPATH')) {
    exit;
}

// Устанавливаем 404 статус
status_header(404);
nocache_headers();

// Подключаем 404 страницу
get_template_part('404');
exit;
?>