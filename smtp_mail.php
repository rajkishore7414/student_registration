<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // ⚠️ PUT YOUR GMAIL HERE
    $mail->Username   = 'rajkishore7414@gmail.com';

    // ⚠️ PUT APP PASSWORD HERE
    $mail->Password   = 'osrn wqwr hgug qfzm';

    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Sender
    $mail->setFrom('rajkishore7414@gmail.com', 'Student Registration');

    // Receiver
    $mail->addAddress('rakishore111894@gmail.com');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'SMTP Test Mail';
    $mail->Body    = '<h2>Email is working using PHPMailer!</h2>';

    $mail->send();

    echo "✅ Mail Sent Successfully via Gmail SMTP!";

} catch (Exception $e) {

    echo "❌ Mail Failed: {$mail->ErrorInfo}";
}

