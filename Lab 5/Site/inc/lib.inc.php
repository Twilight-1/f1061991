<?php
declare(strict_types=1);

/**
 * Отрисовывает таблицу умножения.
 *
 * @param int $cols Количество колонок (по умолчанию 5).
 * @param int $rows Количество строк (по умолчанию 5).
 * @param string $color Цвет заголовков таблицы (по умолчанию 'yellow').
 * @return int Количество раз, когда таблица была отрисована.
 */
function getTable(int $cols = 5, int $rows = 5, string $color = 'yellow'): int {
    static $count = 0;
    $count++;

    echo '<table border="1" style="border-collapse: collapse; margin-bottom: 20px; width: auto;">';
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            if ($i === 1 || $j === 1) {
                echo "<th style='background-color: $color; padding: 10px; text-align: center;'>" . ($i * $j) . '</th>';
            } else {
                echo '<td style="padding: 10px; text-align: center;">' . ($i * $j) . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table><hr>';

    return $count;
}

/**
 * Отрисовывает меню навигации.
 *
 * @param array $menu Массив, содержащий структуру меню.
 * @param bool $vertical Опциональный параметр, определяющий, будет ли меню отрисовано вертикально (по умолчанию true).
 * @return void
 */
function getMenu(array $menu, bool $vertical = true): void {
    $class = $vertical ? 'menu' : 'menu horizontal';
    $style = $vertical ? '' : 'display: inline; margin-right: 10px;';

    echo "<ul class='$class'>";
    foreach ($menu as $item) {
        echo "<li style='$style'><a href='" . htmlspecialchars($item['href']) . "'>" . htmlspecialchars($item['link']) . "</a></li>";
    }
    echo "</ul>";
}

/**
 * Отрисовывает таблицу умножения с данными, полученными из параметров.
 *
 * @param int $cols Количество колонок (по умолчанию 10).
 * @param int $rows Количество строк (по умолчанию 10).
 * @param string $color Цвет заголовков таблицы (по умолчанию '#ffff00').
 * @return int Количество раз, когда таблица была отрисована.
 */
function drawTable(int $cols = 10, int $rows = 10, string $color = '#ffff00'): int {
    static $count = 0;
    $count++;

    echo '<table border="1" style="border-collapse: collapse; margin-bottom: 20px; width: auto;">';
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            if ($i === 1 || $j === 1) {
                echo "<th style='background-color: $color; padding: 10px; text-align: center;'>" . ($i * $j) . '</th>';
            } else {
                echo '<td style="padding: 10px; text-align: center;">' . ($i * $j) . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table><hr>';

    return $count;
}
?>