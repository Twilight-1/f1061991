<?php
declare(strict_types=1);

/**
 * Устанавливает куки для подсчета количества посещений и последнего визита.
 *
 * @return void
 */
function setVisitCookies(): void {
    // Инициализируем переменные для подсчета посещений и хранения даты последнего посещения
    $visitCount = isset($_COOKIE['visit_count']) ? (int)$_COOKIE['visit_count'] : 0;
    $lastVisit = isset($_COOKIE['last_visit']) ? htmlspecialchars(trim($_COOKIE['last_visit'])) : '';

    // Увеличиваем счетчик посещений
    $visitCount++;

    // Устанавливаем куки с данными
    setcookie('visit_count', (string)$visitCount, time() + 86400); // 1 день
    setcookie('last_visit', date('d-m-Y H:i:s'), time() + 86400);   // Текущая дата и время

    // Выводим результаты
    if ($visitCount === 1) {
        echo "Добро пожаловать!";
    } else {
        echo "Вы зашли на страницу {$visitCount} раз(а).<br>";
        echo "Последнее посещение: {$lastVisit}.";
    }
}

setVisitCookies();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Последний визит</title>
</head>
<body>

<h1>Последний визит</h1>

</body>
</html>