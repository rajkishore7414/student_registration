<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // Insert into database
    $sql = "INSERT INTO students (name, email, phone, course)
            VALUES ('$name', '$email', '$phone', '$course')";

    if (mysqli_query($conn, $sql)) {

        // ✅ EMAIL PART STARTS HERE

        $to = $email;
        $subject = "Registration Successful";

        $message = "
        Hello $name,

        Thank you for registering.

        Course: $course

        Regards,
        Admin Team
        ";

        $headers = "From: admin@student.com";

        if(mail($to, $subject, $message, $headers)){
            echo "Registration Successful! Confirmation email sent.";
        } else {
            echo "Registered, but email not sent.";
        }

    } else {
        echo "Error: " . mysqli_error($conn);
    }

}

?>

