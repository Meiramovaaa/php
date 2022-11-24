<?php
// Файлы phpmailer
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';
require 'phpMailer/Exception.php';
include "config/db.php";
include "config/base_url.php";

// Переменные, которые отправляет пользователь
$phone = $_POST['number'];
// $email = $_POST["email"];
// $full_name = $_POST["full_name"];
session_start();
$queryTosellerInfo = mysqli_query($con, "SELECT k.*, u.full_name, u.email, b.* FROM basket k LEFT OUTER JOIN u users ON k.bookId = b.id LEFT OUTER JOIN blogs b ON k.userId = u.id WHERE k.userId =".$_SESSION["user_id"]);
if(mysqli_fetch_assoc($queryTosellerInfo) > 0){
    while($info = mysqli_fetch_assoc($queryTosellerInfo)){
        $full_name = $info["full_name"];
        $email = $info["email"];
        $body = `
        <h2>New message</h2>
        <b>Name:</b> $full_name <br>
        <b>Email:</b> $email<br><br>
        <b>Phone number:</b> $phone<br><br>
        `;
    }
}


// Формирование самого письма
$title = "The title of the message";


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
    $mail->Username   = 'book.marketplace13@gmail.com'; // Логин на почте
    $mail->Password   = 'jblbprvzkhpbewdn'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('book.marketplace13@gmail.com', 'Market-place'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress($email);  
    // $mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "The message was not sent. The reason for the error: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);