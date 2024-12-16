<?php
declare(strict_types=1);

/*
ЗАДАНИЕ
- Проверьте, отправлялся ли файл на сервер
- В случае, если файл был отправлен, выведите: имя файла, размер, имя временного файла, тип, код ошибки
- Для проверки типа файла используйте функцию mime_content_type() из модуля Fileinfo
- Если загружен файл типа "image/jpeg", то с помощью функции move_uploaded_file() переместите его в каталог upload. В качестве имени файла используйте его MD5-хеш.
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload'])) {
    $file = $_FILES['fupload'];

    // Проверяем, есть ли ошибка загрузки
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Получаем информацию о файле
        $filename = $file['name'];
        $filesize = $file['size'];
        $tmp_name = $file['tmp_name'];
        $filetype = mime_content_type($tmp_name);

        // Выводим информацию о загруженном файле
        echo "<h2>Информация о загруженном файле:</h2>";
        echo "<p>Имя файла: " . htmlspecialchars($filename) . "</p>";
        echo "<p>Размер файла: " . htmlspecialchars((string)$filesize) . " байт</p>";
        echo "<p>Временное имя файла: " . htmlspecialchars($tmp_name) . "</p>";
        echo "<p>Тип файла: " . htmlspecialchars($filetype) . "</p>";
        echo "<p>Код ошибки: " . htmlspecialchars((string)$file['error']) . "</p>";

        // Проверяем, является ли файл изображением JPEG
        if ($filetype === 'image/jpeg') {
            // Генерируем MD5-хеш для имени файла
            $newFilename = md5_file($tmp_name) . '.jpg';
            // Путь к директории для загрузки
            $uploadDir = 'upload/';

            // Перемещаем загруженный файл в каталог upload
            if (move_uploaded_file($tmp_name, $uploadDir . $newFilename)) {
                echo "<p>Файл успешно загружен в каталог <strong>upload</strong> с именем: " . htmlspecialchars($newFilename) . "</p>";
                
                // Выводим изображение на экран
                echo "<h3>Загруженное изображение:</h3>";
                echo "<img src='" . htmlspecialchars($uploadDir . $newFilename) . "' alt='Загруженное изображение' style='max-width: 500px; border: 1px solid #ccc;'>";
            } else {
                echo "<p>Ошибка при перемещении файла!</p>";
            }
        } else {
            echo "<p>Ошибка: загружен неверный тип файла. Допустим только JPEG изображения.</p>";
        }
    } else {
        echo "<p>Ошибка загрузки файла: " . htmlspecialchars((string)$file['error']) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файла на сервер</title>
</head>
<body>
<div>
    <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
            <input type="file" name="fupload" required><br>
            <button type="submit">Загрузить</button>
        </p>
    </form>
</div>
</body>
</html>