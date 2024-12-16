<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
- Создайте строковую переменную $login и присвойте ей значение ' User '
- Создайте строковую переменную $password и присвойте ей значение 'megaP@ssw0rd'
- Создайте строковую переменную $name и присвойте ей значение 'иван'
- Создайте строковую переменную $email и присвойте ей значение 'ivan@petrov.ru'
- Создайте строковую переменную $code и присвойте ей значение '<?=$login?>'
*/

$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';
echo "$login<br>";
echo "$password<br>";
echo "$name<br>";
echo "$email<br>";
echo "$code<br>";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>

<?php
/*
ЗАДАНИЕ 2
- Используя строковые функции, удалите пробельные символы в начале и конце переменной $login, а также сделайте все символы строчными (малыми)
- Проверьте значение переменной $password на сложность: пароль должен содержать минимум одну заглавную латинскую букву, одну строчную и одну цифру, а длина должна быть не меньше 8 символов. Оформите полученный код в виде пользовательской функции.
- Используя строковые функции, сделайте первый символ значения переменной $name прописной (большой)
- Используя функцию фильтрации переменных проверьте корректность значения $email
- Используя строковые функции выведите значение переменной $code в браузер в том же виде как она задана в коде
*/

/**
 * Проверяет сложность пароля.
 *
 * @param string $password Пароль для проверки.
 * @return bool Возвращает true, если пароль соответствует критериям сложности, иначе false.
 */
function checkPasswordComplexity(string $password): bool {
    return preg_match('/[A-Z]/', $password) && // минимум одна заглавная буква
           preg_match('/[a-z]/', $password) && // минимум одна строчная буква
           preg_match('/[0-9]/', $password) && // минимум одна цифра
           strlen($password) >= 8; // длина не менее 8 символов
}

// Удаляем пробелы и приводим к нижнему регистру
$login = strtolower(trim($login));

// Проверка сложности пароля
$isPasswordValid = checkPasswordComplexity($password);
echo $isPasswordValid ? "Пароль соответствует критериям сложности." : "Пароль не соответствует критериям сложности.";

// Делаем первый символ имени прописным
$name = ucfirst($name);

// Проверяем корректность email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email корректен.";
} else {
    echo "Некорректный email.";
}

// Выводим значение переменной $code
echo htmlspecialchars($code);

?>
</body>
</html>