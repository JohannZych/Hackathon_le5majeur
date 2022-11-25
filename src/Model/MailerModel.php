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

//        $email->SMTPDebug = SMTP::DEBUG_SERVER;
        $email->isSMTP();
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth = true;
        $email->Username = 'hackathon.cinqmajeur@gmail.com';
        $email->Password = 'buyjrbpnvpmqdmli';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $email->Port = 465;

        $email->isHTML(true);

        $email->setFrom('hackathon.cinqmajeur@gmail.com');

        return $email;
    }

    /**
     * @throws Exception
     */
    public function sendTravelConfirmationToStepmom($email)
    {
        $mail = $this->createMailer();
        try {
            $mail->addAddress("$email");
            $mail->Subject = 'Un cadeau de la part de ...';
            $text = "<html>
<head>
<meta charset='utf-8'>
<style>
body * {width: 100%}
.email-title {text-align: center; margin: 16px; margin-bottom: 24px}
.email-text {font-family: Verdana, sans-serif; }
</style>
</head>
<body>
<h1 class='email-title'>Vous avez reçu un cadeau</h1>
<h3 class='email-text'>Vous allez partir en voyage, nous espérons que celui-ci vous plaira !</h3>
<img alt='billet d`avion' src='https://previews.123rf.com/images/orelphoto/orelphoto1404/orelphoto140400062/27788700-variante-du-billet-d-avion-isol%C3%A9-sur-blanc-illustration.jpg'>
</body>
</html>";
            $mail->Body = $text;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendTravelConfirmationToUser($userEmail)
    {
        $mail = $this->createMailer();
        try {
            $mail->addAddress($userEmail);
            $mail->Subject = 'Un cadeau de la part de ...';
            $text2 = "<html>
<head>
<meta charset='utf-8'>
<style>
body * {width: 100%}
.email-title {text-align: center; margin: 16px; margin-bottom: 24px}
.email-text {font-family: Verdana, sans-serif; }
</style>
</head>
<body>
<h1 class='email-title'>Vous avez sélectionné un voyage !</h1>
<h3 class='email-text'>Vous n'avez plus qu'à attendre que votre belle-mère accepte l'invitation,
puis vous pourrez passer au paiement.</h3>
</body>
</html>";
            $mail->Body = $text2;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
