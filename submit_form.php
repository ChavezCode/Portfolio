<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "C:\Program Files\PHP\PHPMailer\PHPMailer-master\src\Exception.php";
require "C:\Program Files\PHP\PHPMailer\PHPMailer-master\src\PHPMailer.php";
require "C:\Program Files\PHP\PHPMailer\PHPMailer-master\src\SMTP.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = htmlspecialchars($_POST['fname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Set PHPMailer to use SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use Gmail's SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'jchavezflores368@gmail.com'; // Your Gmail address
        $mail->Password = 'B00rito5';  // Your Gmail password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient info
        $mail->setFrom($email, $fname);  // Sender's email and name
        $mail->addAddress('jchavezflores368@gmail.com', 'Jorge');  // where the email is going to

        // Set email format to HTML
        $mail->isHTML(true);

        // Set email subject and body
        $mail->Subject = 'Contact Form Submission from ' . $fname;
        $mail->Body    = "Name: $fname<br>
                        Email: $email<br><br>
                        Message:<br>$message";

        // Send the email
        if ($mail->send()) {
            echo "Thank you for your message. I'll get back to you soon!";
        } else {
            echo "Ohh no! There was a problem sending your message. Please try again.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
