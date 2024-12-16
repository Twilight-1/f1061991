<?php
declare(strict_types=1);


function printOddNumbers(): void {
    // Цикл для вывода нечётных чисел от 1 до 50
    for ($i = 1; $i <= 50; $i += 2) {
        echo $i . '<br>';
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Цикл для</title>
</head>
<body>
	<h1>Цикл для</h1>
	<?php
		printOddNumbers();
	?>
</body>
</html>