<?php
require_once 'config.php'; // Подключаем файл конфигурации

// Подключение к серверу MySQL
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Установка кодировки
mysqli_set_charset($conn, DB_CHARSET);

// ЗАДАНИЕ 1: Приём данных от пользователя и вставка новой записи в таблицу
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name'])));
    $email = trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email'])));
    $msg = trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['msg'])));

    // SQL-оператор на вставку данных
    $sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $_SERVER['PHP_SELF']); // Перезапрос страницы
        exit();
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// ЗАДАНИЕ 2: Выборка данных из таблицы и показ результата выборки
$sql = "SELECT * FROM msgs ORDER BY id DESC"; // Выборка всех данных в обратном порядке
$result = mysqli_query($conn, $sql);

// Закрытие соединения с БД
mysqli_close($conn);

// Отображение количества рядов и сообщений
if ($result) {
    $num_rows = mysqli_num_rows($result);
    echo "<p>Всего сообщений: $num_rows</p>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<strong>" . htmlspecialchars($row['name']) . "</strong> (" . htmlspecialchars($row['email']) . ")<br>";
        echo nl2br(htmlspecialchars($row['msg'])) . "<br>";
        echo "<a href='?delete_id=" . $row['id'] . "'>Удалить</a>"; // Ссылка для удаления записи
        echo "</div><hr>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Ваше имя:<br>
    <input type="text" name="name" required><br>
    Ваш E-mail:<br>
    <input type="email" name="email" required><br>
    Сообщение:<br>
    <textarea name="msg" cols="50" rows="5" required></textarea><br>
    <br>
    <input type="submit" value="Добавить!">
</form>

<?php
// ЗАДАНИЕ 3: Приём данных на удаление и удаление записи из таблицы
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    // Проверка соединения
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL-оператор на удаление записи
    $sql = "DELETE FROM msgs WHERE id = $delete_id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $_SERVER['PHP_SELF']); // Перезапрос страницы
        exit();
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

</body>
</html>