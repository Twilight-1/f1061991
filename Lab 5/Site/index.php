<?php
// Подключаем файлы lib.inc.php и data.inc.php из папки inc
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

// Переменная для приветствия в зависимости от времени суток
$hour = (int)date('G');
if ($hour >= 5 && $hour < 12) {
    $welcome = 'Доброе утро';
} elseif ($hour >= 12 && $hour < 18) {
    $welcome = 'Добрый день';
} elseif ($hour >= 18 && $hour < 24) {
    $welcome = 'Добрый вечер';
} else {
    $welcome = 'Доброй ночи';
}

// Инициализация заголовков страницы
$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));
switch ($id) {
    case 'about':
        $title = 'О сайте';
        $header = 'О нашем сайте';
        break;
    case 'contact':
        $title = 'Контакты';
        $header = 'Обратная связь';
        break;
    case 'table':
        $title = 'Таблица умножения';
        $header = 'Таблица умножения';
        break;
    case 'calc':
        $title = 'Он-лайн калькулятор';
        $header = 'Калькулятор';
        break;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php include 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>

  <section>
    <!-- Заголовок -->
    <h1><?=$header?></h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php
    switch ($id) {
        case 'about':
            include 'about.php';
            break;
        case 'contact':
            include 'contact.php';
            break;
        case 'table':
            include 'table.php';
            break;
        case 'calc':
            include 'calc.php';
            break;
        default:
            include 'inc/index.inc.php';
    }
    ?>
    <!-- Область основного контента -->
  </section>
  <nav>
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <?php getMenu($leftMenu); ?>
    <!-- Меню -->
    <!-- Навигация -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    <p>&copy; Супер Мега Веб-мастер, 2000 &ndash; <?=date('Y')?></p>
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>