<?php
declare(strict_types=1);

/*
 * @param mixed &$a  Первый аргумент, который будет меняться с вторым.
 * @param mixed &$b  Второй аргумент, который будет менятся с первым.
 */
function swap(&$a, &$b): void {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$a = 5;
$b = 8;
swap($a, $b);

var_dump($a === 8); // true
var_dump($b === 5); // true
?>
