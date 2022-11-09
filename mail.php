<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_email($emailid, $subject)
{
    $mail = new PHPMailer;
    $mail->isSMTP();
    // $mail->SMTPDebug = 3;
    $mail->Host = 'smtp.mail.me.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kps2706@icloud.com';
    $mail->Password = 'sbup-almz-eeom-rwhx';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->From = 'kps2706@icloud.com';
    $mail->FromName = 'Finance Management System | CASH PRO';
    $mail->addAddress($emailid);
    // $mail->addCC($cc);
    $mail->isHTML(true);


    $mail->Subject = $subject;

    // $message = "Hello";

    $mail->Body = file_get_contents('msg.txt');

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}