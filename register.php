<?php

include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, phone, course)
            VALUES ('$name', '$email', '$phone', '$course')";

    if (mysqli_query($conn, $sql)) {

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rajkishore7414@gmail.com';
            $mail->Password = 'osrn wqwr hgug qfzm';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('rajkishore7414@gmail.com', 'Student Registration');

            // 🔥 VERY IMPORTANT
            // Email comes from FORM now
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Registration Successful';
            $mail->Body = "
                Hello $name,<br><br>
                ✅ Your registration is successful!<br>
                Course: <b>$course</b><br><br>
                Thank you.
            ";

            $mail->send();

            echo "✅ Registration successful. Email sent!";

        } catch (Exception $e) {

            echo "Registered but email failed: {$mail->ErrorInfo}";
        }

    } else {

        echo "Database Error!";
    }
}

?>

