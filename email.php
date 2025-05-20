<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$randomNumber = random_int(100000, 999999);

try {
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';


    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hyeonjaeyu94@gmail.com';
    $mail->Password = 'nyfb iuip mzog ujrg';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('hyeonjaeyu94@gmail.com', '찍어봐요');  
    $mail->addAddress($_POST['email'], '사용자'); 

    $mail->isHTML(true);
    $mail->Subject = '찍어봐요 인증코드';
    $mail->Body    = "찍어봐요 인증코드 : <br> <b>$randomNumber</b> <br> 절대 남에게 노출금지!";

    $mail->send();
    echo json_encode(['success' => true, 'code' => $randomNumber]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
}
?>