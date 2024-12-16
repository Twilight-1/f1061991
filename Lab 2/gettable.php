<?php
declare(strict_types=1);

/*
 * @param int $cols Количество колонок.
 * @param int $rows Количество строк.
 * @param string $color Цвет заголовков таблицы.
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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>
    <?php
    getTable();
    getTable(10);
    getTable(8, 8);
    ?>
    <p>Таблица была отрисована <?= getTable() ?> раз(а).</p>
</body>
</html>
