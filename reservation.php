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
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp-relay.brevo.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = '';
        $mail->Password = '';
        $mail->Port = 587;
        $mail->setFrom('aashil@aashil.site', 'Aashil Singhal');
        $mail->addAddress($email, $name);
        $mail->Subject = "Your appointment is confirmed at $time";
        $mail->Body = "Hello $name,\n\nThank you for choosing our services. We are pleased to confirm your appointment scheduled for $time. Your time slot has been reserved, and we are looking forward to assisting you.\n\nIf you have any questions or need to make changes to your appointment, please don't hesitate to contact us.\n\nBest regards,\nThe Akami Hospital";
        $mail->send();
        echo "appoitment is successful";

    } catch (Exception $e){
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else {
  echo "Use a post method";
}
sleep(5);
header("Location: index.html");
exit;
?>

