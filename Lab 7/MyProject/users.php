<?php
declare(strict_types=1);

use Classes\User;
use Classes\SuperUser;

// Автозагрузка классов
spl_autoload_register(function ($class) {
    // Преобразуем пространство имен в путь к файлу
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    // Проверяем существование файла и подключаем его
    if (file_exists($path)) {
        require_once $path;
    }
});

// Создание объектов класса User
$user1 = new User("Иван", "ivan123", "securepassword1");
$user2 = new User("Мария", "masha456", "securepassword2");
$user3 = new User("Петр", "peter789", "securepassword3");

// Вызов метода showInfo() для каждого пользователя
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

// Создание объекта класса SuperUser
$admin = new SuperUser("Алексей", "admin", "supersecurepassword", "Администратор");

// Вызов метода showInfo() для объекта класса SuperUser
$admin->showInfo();