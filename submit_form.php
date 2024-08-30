<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'jchavezflores368@gmail.com'; // Replace with your email address
    $subject = 'Contact Form Submission from ' . $name;
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your message. We will get back to you soon.";
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
}
?>
