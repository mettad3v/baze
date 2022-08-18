<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$register = new Register();
$register->init();

class Register
{

    public function __construct()
    {
    }


    public function init()
    {
        if (isset($_POST)) {
            if (isset($_POST["name"]) && $_POST["email"] && $_POST["message"] && $_POST["subject"]) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $subject = $_POST['subject'];


                $message = htmlspecialchars($message, ENT_QUOTES);
                $subject = htmlspecialchars($subject, ENT_QUOTES);
                $name = htmlspecialchars($name, ENT_QUOTES);
                $email = htmlspecialchars($email, ENT_QUOTES);

                $this->sendMail($email, $name, $message, $subject);
            }
        }
    }




    private function sendMail($email, $name, $message, $subject)
    {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host       = 'tradinghub-fx.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'support@tradinghub-fx.com';                     //SMTP username
            $mail->Password   = 'eY~R1eG#X6XO';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('sixtus402@gmail.com');     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
