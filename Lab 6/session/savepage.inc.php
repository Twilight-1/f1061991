<?php
// Код для всех страниц - сохранение информации о посещенных страницах
/*
ЗАДАНИЕ 1
- Создайте в сессии
	- массив для хранения всех посещенных страниц и сохраните в качестве его очередного элемента путь к текущей странице. 

*/
if (!isset($_SESSION['visited_pages'])) {
    $_SESSION['visited_pages'] = [];
}
$current_page = $_SERVER['PHP_SELF'];

$_SESSION['visited_pages'][] = $current_page;
?>
