<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$to = "rajkishore7414@gmail.com";   // ⚠️ PUT YOUR REAL EMAIL
$subject = "Test Mail From XAMPP";
$message = "If you receive this, PHP mail is working!";
$headers = "From: test@studentapp.com";

if(mail($to, $subject, $message, $headers)){
    echo "✅ Mail Sent Successfully!";
}else{
    echo "❌ Mail Failed!";
}

?>

