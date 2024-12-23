<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
- Установите константу для хранения имени файла
- Проверьте, отправлялась ли форма и корректно ли отправлены данные из формы
- В случае, если форма была отправлена, отфильтруйте полученные значения 
  с помощью функций trim(), strip_tags(), htmlspecialchars()
- Сформируйте строку для записи с файл
- Откройте соединение с файлом и запишите в него сформированную строку
- Используя функцию header() выполните перезапрос текущей страницы 
  (чтобы избавиться от данных, отправленных методом POST)
*/

// Определяем константу для имени файла
const FILENAME = 'users.txt';

// Проверяем, отправлялась ли форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Фильтруем полученные данные
    $fname = htmlspecialchars(strip_tags(trim($_POST['fname'])));
    $lname = htmlspecialchars(strip_tags(trim($_POST['lname'])));

    // Формируем строку для записи в файл
    $data = $fname . ' ' . $lname . PHP_EOL;

    // Открываем файл для записи
    file_put_contents(FILENAME, $data, FILE_APPEND | LOCK_EX);

    // Перезапрашиваем текущую страницу
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">

Имя: <input type="text" name="fname" required><br>
Фамилия: <input type="text" name="lname" required><br>

<br>

<input type="submit" value="Отправить!">

</form>

<?php
/*
ЗАДАНИЕ 2
- Проверьте, существует ли файл с информацией о пользователях
- Если файл существует, получите все содержимое файла в виде массива строк 
  с помощью функции file()
- В цикле выведите все строки данного файла с порядковым номером строки
- После этого выведите размер файла в байтах.
*/

if (file_exists(FILENAME)) {
    // Получаем содержимое файла в виде массива строк
    $lines = file(FILENAME);
    
    // Выводим каждую строку с порядковым номером
    foreach ($lines as $index => $line) {
        echo ($index + 1) . ": " . htmlspecialchars($line) . "<br>";
    }
    
    // Выводим размер файла в байтах
    echo "Размер файла: " . filesize(FILENAME) . " байт.";
}
?>

</body>
</html>