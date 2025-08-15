<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные формы
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Кому отправляем
    $to = "ТВОЙ_EMAIL@domain.com"; // замените на свой email
    $subject = "Новая заявка с сайта";
    
    // Формируем текст письма
    $body = "Имя: $name\nТелефон: $phone\nСообщение:\n$message";
    
    // Заголовки письма
    $headers = "From: no-reply@" . $_SERVER['SERVER_NAME'] . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Отправляем
    if (mail($to, $subject, $body, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
}
?>