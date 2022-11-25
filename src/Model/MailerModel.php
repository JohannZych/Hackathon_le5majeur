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
//        $travelId = $_POST['travelId'];
        $mail = $this->createMailer();
//        $travelModel = new TripManager();
//        $travel = $travelModel->getTripById($travelId);
        try {
            $mail->addAddress("$email");
            $mail->Subject = 'Un cadeau de la part de ...';
            $text = "<html>
<head>
<style>
body * {width: 100%}
.email-title {text-align: center; margin: 16px; margin-bottom: 24px}
.email-text {font-family: Verdana, sans-serif; }
</style>
</head>
<body>
<h1 class='email-title'>Vous avez reçu un cadeau</h1>
<h3 class='email-text'>Vous aller partir en voyage, j'espère que celui-ci vous plaira !</h3>
<img alt='billet d`avion' src='https://previews.123rf.com/images/orelphoto/orelphoto1404/orelphoto140400062/27788700-variante-du-billet-d-avion-isol%C3%A9-sur-blanc-illustration.jpg'>
</body>
</html>";
            $mail->Body = $text;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
