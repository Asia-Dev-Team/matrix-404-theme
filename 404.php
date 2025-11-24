<?php
/**
 * Шаблон 404 страницы
 */

// Предотвращаем прямой доступ
if (!defined('ABSPATH')) {
    exit;
}

// Устанавливаем правильные заголовки
status_header(404);
nocache_headers();

// Выводим содержимое 404.html
$html_file = get_template_directory() . '/404.html';

if (file_exists($html_file)) {
    // Читаем и выводим содержимое HTML файла
    echo file_get_contents($html_file);
} else {
    // Запасной вариант если файл не найден
    echo '<!DOCTYPE html>';
    echo '<html><head><title>404 Not Found</title></head>';
    echo '<body><h1>404 - Page Not Found</h1></body></html>';
}

exit;
?>