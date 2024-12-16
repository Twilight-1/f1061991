<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cols = abs((int) $_POST['cols']);
    $rows = abs((int) $_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
}
$cols = ($cols) ? $cols : 10;
$rows = ($rows) ? $rows : 10;
$color = ($color) ? $color : '#ffff00';
?>

<section>
    <h1>Таблица умножения</h1>
    <!-- Форма для ввода параметров таблицы -->
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
        <label for="cols">Количество колонок:</label>
        <input type="number" id="cols" name="cols" value="<?=$cols?>" min="1">

        <label for="rows">Количество строк:</label>
        <input type="number" id="rows" name="rows" value="<?=$rows?>" min="1">

        <label for="color">Цвет заголовков:</label>
        <input type="text" id="color" name="color" value="<?=$color?>">

        <input type="submit" value="Сгенерировать таблицу">
    </form>
    <!-- Таблица -->
    <?php
    // Вызов функции drawTable для отрисовки таблицы умножения с произвольными параметрами
    drawTable($cols, $rows, $color);
    ?>
    <!-- Таблица -->
</section>