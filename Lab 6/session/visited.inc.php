<?php
declare(strict_types=1);

/**
 * Показывает список всех посещенных страниц.
 *
 * @return void
 */
function displayVisitedPages(): void {
    if (isset($_SESSION['visited_pages']) && is_array($_SESSION['visited_pages'])) {
        echo "<h3>Список посещённых страниц:</h3>";
        echo "<ul>";
        foreach ($_SESSION['visited_pages'] as $page) {
            echo "<li>" . htmlspecialchars($page) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Вы еще не посетили никаких страниц.</p>";
    }
}

// Вызов функции
displayVisitedPages();
?>