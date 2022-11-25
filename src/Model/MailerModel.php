<?php

namespace App\Model;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class MailerModel
{
    /**
     * @throws Exception
     */
    public function createMailer(): PHPMailer
    {
        $email = new PHPMailer(true);

        $email->SMTPDebug = SMTP::DEBUG_SERVER;
        $email->isSMTP();
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth = true;
        $email->Username = 'hackathon.cinqmajeur@gmail.com';
        $email->Password = 'jjbyk5m@';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $email->Port = 465;

        $email->isHTML(true);

        $email->setFrom('hackathon.cinqmajeur@gmail.com');

        return $email;
    }

    /**
     * @throws Exception
     */
    public function sendTravelConfirmation($email)
    {
        $mail = $this->createMailer();
        //$travelModel = new TripManager();
//        $travel = $travelModel->
        try {
            $mail->addAddress("$email");
            $mail->Subject = 'Un cadeau de la part de ...';
            $text = "<html>
<head>
<style>
body * {width: 100%}
.email-title {text-align: center; margin: 16px}
.email-text {font-family: Verdana, sans-serif; }
</style>
</head>
<body>
<h1 class='email-title'>Vous avez reçu un cadeau de la part</h1>
<h3 class='email-text'></h3>
</body>
</html>";
            $mail->Body = $text;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
