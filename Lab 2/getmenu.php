<?php
declare(strict_types=1);

/**
 * @param array $menu  Массив, содержащий структуру меню.
 * @param bool $vertical  Опциональный параметр, определяющий, будет ли меню отрисовано вертикально (по умолчанию true).
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

// ЗАДАНИЕ 2: 
$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php']
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <style>
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .horizontal li {
            display: inline;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Меню</h1>
    <?php
    getMenu($leftMenu);

    echo '<br><h2>Горизонтальное меню</h2>';
    getMenu($leftMenu, false);
    ?>
</body>
</html>
