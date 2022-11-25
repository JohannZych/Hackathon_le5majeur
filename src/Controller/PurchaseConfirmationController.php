<?php

namespace App\Controller;

use App\Model\MailerModel;
use App\Model\ModifyUserManager;
use App\Model\PurchaseConfirmationManager;

class PurchaseConfirmationController extends AbstractController
{
    public function showUserPurchase($id): string
    {
        $purchaseManager = new PurchaseConfirmationManager();
        $travelInfos = $purchaseManager->getPurchase($id);
        return $this->twig->render('Home/purchaseConfirmation.html.twig', [
            'travel' => $travelInfos
        ]);
    }

    public function purchaseValidation()
    {
        $mailer = new MailerModel();
        $errors = [];
        $userManager = new ModifyUserManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mailStepmom = trim($_POST['stepmomEmail']);
            if (filter_var($mailStepmom, FILTER_VALIDATE_EMAIL)) {
                $mailer->sendTravelConfirmationToStepmom($mailStepmom);
                $currentUser = $userManager->selectUserById($_SESSION['user_id']);
                $mailer->sendTravelConfirmationToUser($currentUser['email']);
                return $this->twig->render('Home/homeConnected.html.twig');
            } else {
                $errors[] = "L'email renseigné est invalide";
            }
        }
    }
}
