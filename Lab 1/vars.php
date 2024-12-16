<?php
/*
ЗАДАНИЕ 1
*/
echo "Тотальна зрада я когда попытался скачать лабы целой папкой, сайт создал сломанный зип архив а то что я делал я удалил и пришлось всё заново делать :(  (((((((<br>";
echo "и многое из того что я добавлял до этого в скрипты сейчас не добавил<br>";  
$name = 'Даниил';
$age = 21;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>
<body>
	<h1>Переменные и вывод</h1>
	<?php
	/*
	ЗАДАНИЕ 2
	*/

	echo "Меня зовут: $name<br>";
	echo "Мне $age лет<br>";
	echo "Тип переменной \$name: " . gettype($name) . "<br>";
	echo "Тип переменной \$age: " . gettype($age) . "<br>";

	unset($name, $age);
	?> 
</body>
</html>