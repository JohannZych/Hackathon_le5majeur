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
        try {
            $mail->addAddress("$email");
            $mail->Subject = 'Un cadeau de la part de ...';
            $text = "<h1>Vous avez reçu un cadeau de la part de ... !</h1>";
            $mail->Body = $text;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
