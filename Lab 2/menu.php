<?php
declare(strict_types=1);

// ЗАДАНИЕ 1
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

        .menu li {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Меню</h1>
    <ul class="menu">
        <?php
        // ЗАДАНИЕ 2
        foreach ($leftMenu as $menuItem) {
            echo "<li><a href='" . htmlspecialchars($menuItem['href']) . "'>" . htmlspecialchars($menuItem['link']) . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>
