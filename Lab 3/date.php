<?php
// Получаем текущее время
$now = time();

// Задаем дату рождения 
$birthdayMonth = 12; // Февраль
$birthdayDay = 29;   // 1-е число
$birthdayYear = 2003; // Год рождения

// Получаем текущую дату
$currentYear = date('Y');
$currentMonth = date('n');
$currentDay = date('j');

// Рассчитываем дату следующего дня рождения
if (($currentMonth > $birthdayMonth) || ($currentMonth == $birthdayMonth && $currentDay > $birthdayDay)) {
    // Если день рождения уже прошел в этом году, устанавливаем следующий год
    $nextBirthday = mktime(0, 0, 0, $birthdayMonth, $birthdayDay, $currentYear + 1);
} else {
    // Если день рождения еще не был, устанавливаем текущий год
    $nextBirthday = mktime(0, 0, 0, $birthdayMonth, $birthdayDay, $currentYear);
}

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
	// Определяем приветствие в зависимости от текущего часа
	if ($hour >= 0 && $hour < 6) {
	    $welcome = 'Доброй ночи';
	} elseif ($hour >= 6 && $hour < 12) {
	    $welcome = 'Доброе утро';
	} elseif ($hour >= 12 && $hour < 18) {
	    $welcome = 'Добрый день';
	} elseif ($hour >= 18 && $hour < 24) {
	    $welcome = 'Добрый вечер';
	}

	// Выводим приветствие
	echo "<p>$welcome</p>";

	// Устанавливаем локаль для русскоязычного формата
	setlocale(LC_TIME, 'ru_RU.UTF-8');

	// Создаем форматтер для даты и времени
	$dateFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::SHORT);
	// Форматируем текущую дату, месяц, год, день недели и время
	$dateString = $dateFormatter->format($now);

	// Выводим текущую дату и время
	echo "<p>Сегодня {$dateString}</p>";

	// Рассчитываем оставшееся время до дня рождения
	$diff = $nextBirthday - $now;

	// Рассчитываем время до следующего дня рождения
	$days = floor($diff / (60 * 60 * 24));
	$hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
	$minutes = floor(($diff % (60 * 60)) / 60);
	$seconds = $diff % 60;

	echo "<p>До моего дня рождения осталось $days дней, $hours часов, $minutes минут и $seconds секунд.</p>";
	?>
</body>
</html>
