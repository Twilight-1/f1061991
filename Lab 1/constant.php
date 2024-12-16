<?php
/*
ЗАДАНИЕ 1
- Создайте константу и присвойте ей значение.
*/
define('MY_CONSTANT', 'Это значение моей константы');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы</title>
</head>
<body>
	<h1>Константы</h1>
	<?php
	/*
	ЗАДАНИЕ 2
	- Проверьте, существует ли константа, которую Вы хотите использовать.
	- Выведите значение созданной константы.
	*/
	if (defined('MY_CONSTANT')) {
	    echo "Значение константы MY_CONSTANT: " . MY_CONSTANT . "<br>";
	} else {
	    echo "Константа MY_CONSTANT не определена.<br>";
	}

	/*
	ЗАДАНИЕ 3
	- Используя предопределённые в ядре константы выведите текущую версию PHP.
	- Используя магические константы выведите директорию скрипта.
	*/
	echo "Текущая версия PHP: " . PHP_VERSION . "<br>";
	echo "Директория текущего скрипта: " . __DIR__ . "<br>";
	?>
</body>
</html>