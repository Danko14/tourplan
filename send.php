<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Файлы phpmailer
require 'https://dankoproj.ru/homeworks/lesson-27/phpmailer/PHPMailer.php';
require 'https://dankoproj.ru/homeworks/lesson-27/phpmailer/SMTP.php';
require 'https://dankoproj.ru/homeworks/lesson-27/phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];

// Формирование самого письма
$title = "Новое обращение Best Tour Plan";
$body = "
<h2>Новое обращение</h2>
<b>Имя:</b> '$name' <br>
<b>Телефон:</b> $phone <br><br>
<b>Сообщение:</b><br>$message
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'dankoproj@gmail.com'; // Логин на почте
    $mail->Password   = 'holeblack1415'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('dankoproj@gmail.com', 'Ivan Nekrasov'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('ivan141200@yandex.ru');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('location: https://dankoproj.ru/homeworks/lesson-27/thankyou.html');