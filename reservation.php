<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $time = $_POST['time'];
    $subject = $_POST['subject'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp-relay.brevo.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = '';
        $mail->Password = '';
        $mail->Port = 587;
        $mail->setFrom('aashil@aashil.site', 'Aashil Singhal');
        $mail->addAddress($email, $name);
        $mail->Subject = "Your appoitment is confirmed at";
        $mail->Body = "Hello, Your reservation is reserver \n";
        $mail->send();
        echo "appoitment is successful";

    } catch (Exception $e){
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else {
  echo "Use a post method";
}
?>

