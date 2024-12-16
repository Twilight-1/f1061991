<?php
declare(strict_types=1);

/**
 * Функция для получения всех определенных констант
 *
 * @return array Ассоциативный массив с именами и значениями констант
 */
function getDefinedConstants(): array {
    return get_defined_constants(true);
}

/**
 * Функция для вывода констант в табличном виде
 *
 * @param array $constants Массив констант для отображения
 * @return void
 */
function displayConstantsTable(array $constants): void {
    echo '<table border="1">';
    echo '<tr><th>Имя константы</th><th>Значение</th></tr>';

    foreach ($constants as $category => $constArray) {
        foreach ($constArray as $name => $value) {
            echo '<tr>';
            echo "<td>{$name}</td><td>{$value}</td>";
            echo '</tr>';
        }
    }

    echo '</table>';
}

// Получаем все определенные константы
$constants = getDefinedConstants();

// Отображаем их в табличной форме
displayConstantsTable($constants);