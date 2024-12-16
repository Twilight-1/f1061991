<?php
declare(strict_types=1);

namespace Classes;

require_once 'User.php';

/**
 * Класс SuperUser, расширяющий функциональность класса User
 */
class SuperUser extends User {
    public string $role;

    /**
     * Конструктор класса SuperUser
     *
     * @param string $name Имя пользователя
     * @param string $login Логин пользователя
     * @param string $password Пароль пользователя
     * @param string $role Роль пользователя
     */
    public function __construct(string $name, string $login, string $password, string $role) {
        // Вызов конструктора родительского класса
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    /**
     * Перегруженный метод showInfo()
     *
     * @return void
     */
    public function showInfo(): void {
        // Вывод информации о пользователе, включая его роль
        parent::showInfo();
        echo "Роль: {$this->role}" . PHP_EOL;
    }
}