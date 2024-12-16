<?php
require_once 'inc/lib.inc.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
        <span class="slogan">приходите к нам учиться</span>
    </header>

    <section>
        <h1>Таблица умножения</h1>
        <!-- Таблица -->
        <?php
        // Вызов функции getTable для отрисовки таблицы умножения с произвольными параметрами
        getTable(10, 10, 'lightblue');
        ?>
        <!-- Таблица -->
    </section>

    <nav>
        <h2>Навигация по сайту</h2>
        <!-- Меню -->
        <ul>
            <li><a href='index.php'>Домой</a></li>
            <li><a href='about.php'>О нас</a></li>
            <li><a href='contact.php'>Контакты</a></li>
            <li><a href='table.php'>Таблица умножения</a></li>
            <li><a href='calc.php'>Калькулятор</a></li>
        </ul>
        <!-- Меню -->
    </nav>

    <footer>
        <p>&copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx</p>
    </footer>
</body>
</html>