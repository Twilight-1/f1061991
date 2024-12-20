<?php
// Код для всех страниц - вывод информации о посещенных страницах
echo "<pre>";
if (isset($_SESSION['visited_pages'])) {
    foreach ($_SESSION['visited_pages'] as $page) {
        echo $page ?  htmlspecialchars($page) . "\n" : '';
    }
}
else{
    echo "Массив не найден";
}
echo "</pre>";
/*
ЗАДАНИЕ 2
- В случае сохранения данных 
	- в массив, проверьте, существует ли он в сессии
	- в строку, преобразуйте её в массив
- Выводите в цикле список всех посещённых пользователем страниц

*/
?>
