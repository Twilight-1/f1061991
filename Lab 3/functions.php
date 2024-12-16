<?php
declare(strict_types=1);

/**
 * Функция для получения всех загруженных расширений
 *
 * @return array Массив загруженных расширений
 */
function getLoadedExtensions(): array {
    return get_loaded_extensions();
}

/**
 * Функция для получения всех функций данного расширения
 *
 * @param string $extension Название расширения
 * @return array|null Массив функций расширения или null, если расширение не имеет функций или не существует
 */
function getFunctionsForExtension(string $extension): ?array {
    $functions = get_extension_funcs($extension);
    return $functions === false ? null : $functions;
}

/**
 * Функция для отображения функций каждого загруженного модуля
 *
 * @return void
 */
function displayModuleFunctions(): void {
    $extensions = getLoadedExtensions();
    echo "<h1>Загруженные модули</h1>";

    foreach ($extensions as $extension) {
        echo "<strong>{$extension}</strong><br>";
        $functions = getFunctionsForExtension($extension);

        if ($functions === null) {
            echo "Нет функций для этого модуля.<br><br>";
        } else {
            echo "Array:<br>";
            echo "<ul>";
            foreach ($functions as $function) {
                echo "<li>{$function}</li>"; // Используем список для отображения функций
            }
            echo "</ul><br>";
        }
    }
}

// Вывод функций загруженных модулей
displayModuleFunctions();