<?php
// Получаем текущее время
$now = time();

// Задаем дату рождения (в этом примере 22 февраля 2003 года)
$birthday = mktime(0, 0, 0, 2, 22, 2003);

// Получаем текущий час
$currentDate = getdate();
$hour = $currentDate['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1><?php
/*
ЗАДАНИЕ 1
- Присвойте переменной $now значение метки времени актуальной даты(сегодня)
- Присвойте переменной $birthday значение метки времени Вашего дня рождения
- Создайте переменную $hour
- С помощью функции getdate() присвойте переменной $hour текущий час
*/

// Получаем текущее время
$now = time();

// Задаем дату рождения
$birthday = mktime(0, 0, 0, 22, 02, 2003);

// Получаем текущий час
$currentDate = getdate();
$hour = $currentDate['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	/*
	ЗАДАНИЕ 2
	- Используя управляющую конструкцию if – elseif - else присвойте 
	  переменной $welcome значение, изходя из следующих условий
	  если число в переменной $hour попадает в диапазон:
	  * от 0 до 6 - 'Доброй ночи'
	  * от 6 (включительно) до 12 - 'Доброе утро'
	  * от 12 (включительно) до 18 - 'Добрый день'
	  * от 18 (включительно) до 23 - 'Добрый вечер'
	  * Если число в переменной $hour не попадает ни в один из вышеперечисленных
	    диапазонов, то присвойте переменной $welcome значение 'Доброй ночи'
	- Выведите $welcome на отдельной строке
	- Установите локаль ru_RU.UTF-8
	- С помощью функции datefmt_format() на отдельной строке выведите 
	  текущую дату, месяц, год, день недели и время,
	  например, "Сегодня 1 сентября 2018 года, суббота 09:30:00" 
	- На отдельной строке выведите фразу "До моего дня рождения осталось "
	- Выведите количество дней, часов, минут и секунд оставшееся до Вашего дня рождения
	*/

	// Определяем приветствие в зависимости от текущего часа
	if ($hour >= 0 && $hour < 6) {
	    $welcome = 'Доброй ночи';
	} elseif ($hour >= 6 && $hour < 12) {
	    $welcome = 'Доброе утро';
	} elseif ($hour >= 12 && $hour < 18) {
	    $welcome = 'Добрый день';
	} elseif ($hour >= 18 && $hour < 24) {
	    $welcome = 'Добрый вечер';
	} else {
	    $welcome = 'Доброй ночи';
	}

	// Выводим приветствие
	echo "<p>$welcome</p>";

	// Устанавливаем локаль
	setlocale(LC_TIME, 'ru_RU.UTF-8');

	// Форматируем текущую дату
	$dateFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
	$dateString = $dateFormatter->format($now);
	echo "<p>Сегодня {$dateString}</p>";

	// Рассчитываем оставшееся время до дня рождения
	$diff = $birthday - $now;

	// Если день рождения в этом году еще не был, считаем оставшееся время
	if ($diff > 0) {
	    $days = floor($diff / (60 * 60 * 24));
	    $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
	    $minutes = floor(($diff % (60 * 60)) / 60);
	    $seconds = $diff % 60;
	    echo "<p>До моего дня рождения осталось $days дней, $hours часов, $minutes минут и $seconds секунд.</p>";
	} else {
	    // Если день рождения прошел в этом году, рассчитываем оставшееся время до следующего года
	    // Добавляем 1 год к дате рождения
	    $nextBirthday = mktime(0, 0, 0, 2, 22, date('Y') + 1);
	    $diff = $nextBirthday - $now;

	    // Рассчитываем время до следующего дня рождения
	    $days = floor($diff / (60 * 60 * 24));
	    $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
	    $minutes = floor(($diff % (60 * 60)) / 60);
	    $seconds = $diff % 60;
	    echo "<p>До моего следующего дня рождения осталось $days дней, $hours часов, $minutes минут и $seconds секунд.</p>";
	}
	?>
</body>
</html>
	<?php
	// Определяем приветствие в зависимости от текущего часа
	if ($hour >= 0 && $hour < 6) {
	    $welcome = 'Доброй ночи';
	} elseif ($hour >= 6 && $hour < 12) {
	    $welcome = 'Доброе утро';
	} elseif ($hour >= 12 && $hour < 18) {
	    $welcome = 'Добрый день';
	} elseif ($hour >= 18 && $hour < 24) {
	    $welcome = 'Добрый вечер';
	} else {
	    $welcome = 'Доброй ночи';
	}

	// Выводим приветствие
	echo "<p>$welcome</p>";

	// Устанавливаем локаль
	setlocale(LC_TIME, 'ru_RU.UTF-8');

	// Форматируем текущую дату
	$dateFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
	$dateString = $dateFormatter->format($now);
	echo "<p>Сегодня {$dateString}</p>";

	// Рассчитываем оставшееся время до дня рождения
	$diff = $birthday - $now;

	// Если день рождения в этом году еще не был, считаем оставшееся время
	if ($diff > 0) {
	    $days = floor($diff / (60 * 60 * 24));
	    $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
	    $minutes = floor(($diff % (60 * 60)) / 60);
	    $seconds = $diff % 60;
	    echo "<p>До моего дня рождения осталось $days дней, $hours часов, $minutes минут и $seconds секунд.</p>";
	} else {
	    // Если день рождения прошел в этом году, рассчитываем оставшееся время до следующего года
	    // Добавляем 1 год к дате рождения
	    $nextBirthday = mktime(0, 0, 0, 2, 22, date('Y') + 1);
	    $diff = $nextBirthday - $now;

	    // Рассчитываем время до следующего дня рождения
	    $days = floor($diff / (60 * 60 * 24));
	    $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
	    $minutes = floor(($diff % (60 * 60)) / 60);
	    $seconds = $diff % 60;
	    echo "<p>До моего следующего дня рождения осталось $days дней, $hours часов, $minutes минут и $seconds секунд.</p>";
	}
	?>
</body>
</html>
