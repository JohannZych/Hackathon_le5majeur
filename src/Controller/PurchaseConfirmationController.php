<?php

namespace App\Controller;

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
}
