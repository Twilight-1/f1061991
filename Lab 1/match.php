<?php
/*
ЗАДАНИЕ 1
*/
$day = rand(1, 10);  
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Конструкция match</title>
</head>
<body>
	<h1>Конструкция match</h1>
	<?php
	/*
	ЗАДАНИЕ 3
	*/
	
	// Конструкция match
	match (true) {
		($day >= 1 && $day <= 5) => print("Это рабочий день<br>"),
		($day == 6 || $day == 7) => print("Это выходной день<br>"),
		default => print("Неизвестный день<br>")
	};
	?> 
</body>
</html>