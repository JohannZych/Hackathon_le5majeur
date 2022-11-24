<?php

namespace App\Controller;

use App\Model\UserInscriptionManager;

class UserInscriptionController extends AbstractController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = array_map('trim', $_POST);
            $credentials = array_map('htmlentities', $credentials);
            $validateCredentials = $this->validateCredentials($credentials);
            if (empty($validateCredentials)) {
                $userInscription = new UserInscriptionManager();
                $userInscription->register($credentials);
            } else {
                header('Location: /');
            }
        }
    }

    public function validateCredentials($credentials): array
    {
        $inscriptionErrors = [];
        if (empty($credentials['firstname'])) {
            $inscriptionErrors[] = "veuillez entrer votre prénom";
        }
        if (empty($credentials['lastname'])) {
            $inscriptionErrors[] = "veuillez entrer votre nom";
        }
        if (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            $inscriptionErrors[] = "veuillez saisir un email valide";
        }
        if (empty($credentials['password1'])) {
            $inscriptionErrors[] = "veuillez saisir un mot de passe";
        } elseif (empty($credentials['password2'])) {
            $inscriptionErrors[] = "veuillez confirmer votre mot de passe";
        } elseif ($credentials['password1'] !== $credentials['password2']) {
            $inscriptionErrors[] = "Mots de passe differents";
        }
        return $inscriptionErrors;
    }
}
