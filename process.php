<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message']) ) {
        header('Location: index.php?errorField=All fields are required');
    }else{
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'receivejeloramos10092001@gmail.com';                     //SMTP username
            $mail->Password   = 'ljpv hqmt ozwq afww';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('receivejeloramos10092001@gmail.com');     //Add a recipient

            //Content                                //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage: $message\n";

            if ($mail->send()) {
                header('Location:index.php?success="Message has been sent!"');
            }else{
                header('Location:index.php?error="Message has not been sent!"');
            }

        } catch (Exception $e) {
            echo "Message could not be sent: {$mail->ErrorInfo}";
        }
            }
        }


 ?>