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
	} else {
	    $welcome = 'Доброй ночи';
	}

	// Выводим приветствие
	echo "<p>$welcome</p>";

	// Устанавливаем локаль для русскоязычного формата
	setlocale(LC_TIME, 'ru_RU.UTF-8');

	// Форматируем текущую дату, время и день недели
	$dateFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
	$timeFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::NONE, IntlDateFormatter::SHORT);
	
	// Форматируем текущую дату с днем недели
	$dateString = $dateFormatter->format($now);
	// Форматируем текущее время
	$timeString = $timeFormatter->format($now);

	// Получаем день недели
	$dayOfWeek = strftime("%A", $now);

	// Выводим текущую дату, время и день недели
	echo "<p>Сегодня {$dateString}, {$dayOfWeek}.</p>";
	echo "<p>Текущее время: {$timeString}</p>";

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
