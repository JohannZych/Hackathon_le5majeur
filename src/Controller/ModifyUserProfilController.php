<?php

namespace App\Controller;

use App\Model\ModifyUserManager;

class ModifyUserProfilController extends AbstractController
{
    public function modifyUserInfos(): string
    {
        $userInfos = new ModifyUserManager();
        $user = $userInfos->selectUserById();
        $stepmom = $userInfos->selectStepmomById();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $infosUser = array_map('trim', $_POST);
            $errors = $userInfos->validateModifiedInfos($infosUser);
            if (empty($errors)) {
                $userInfos->modifyUser($infosUser);
                $userInfos->modifyStepmom($infosUser);
                echo "<script>alert('Vos informations ont bien été modifiées.')</script>";
                header('Refresh:0 /');
            } else {
                return $this->twig->render('User/modifyUser.html.twig', [
                    'user' => $user, 'stepmom' => $stepmom, 'errors' => $errors
                ]);
            }
        }
        return $this->twig->render('User/modifyUser.html.twig', [
            'user' => $user, 'stepmom' => $stepmom
        ]);
    }
}
