<?php
declare(strict_types=1);

/**
 * Сохраняет информацию о посещенной странице в сессии.
 *
 * @return void
 */
function saveCurrentPage(): void {
    // Добавляем путь к текущей странице в сессию
    if (!isset($_SESSION['visited_pages'])) {
        // Создаем массив для хранения страниц
        $_SESSION['visited_pages'] = [];
    }

    // Добавляем текущую страницу
    $_SESSION['visited_pages'][] = htmlspecialchars(trim($_SERVER['PHP_SELF']));
}

// Вызов функции
saveCurrentPage();
?>