<?php
declare(strict_types=1);

/**
 * Обрабатывает отправку письма через форму обратной связи.
 *
 * @return void
 */
function handleContactForm(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Фильтруем полученные значения
        $subject = htmlspecialchars(trim($_POST['subject'] ?? ''), ENT_QUOTES, 'UTF-8');
        $body = htmlspecialchars(trim($_POST['body'] ?? ''), ENT_QUOTES, 'UTF-8');

        // Проверяем, заполнены ли поля
        if (!empty($subject) && !empty($body)) {
            $to = 'Vedima228@mail.ru'; // Ваш рабочий email
            $headers = [
                'From: admin@center.ogu',
                'Reply-To: admin@center.ogu',
                'X-Mailer: PHP/' . phpversion()
            ];

            // Отправляем письмо
            $mail_sent = mail($to, $subject, $body, implode("\r\n", $headers));

            if ($mail_sent) {
                echo "<p>Ваше сообщение успешно отправлено!</p>";
            } else {
                echo "<p>Сообщение не было отправлено.</p>";
            }
        } else {
            echo "<p>Пожалуйста, заполните все поля формы.</p>";
        }
    }
}

// Обработка формы
handleContactForm();
?>

<!-- Область основного контента -->
<h3>Адрес</h3>
<address>123456 Москва, Малый Американский переулок 21</address>
<h3>Задайте вопрос</h3>
<form action='' method='post'>
    <label>Тема письма: </label>
    <br>
    <input name='subject' type='text' size="50" required>
    <br>
    <label>Содержание: </label>
    <br>
    <textarea name='body' cols="50" rows="10" required></textarea>
    <br>
    <br>
    <input type='submit' value='Отправить'>
</form>
<!-- Область основного контента -->