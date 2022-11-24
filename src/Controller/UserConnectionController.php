<?php

namespace App\Controller;

use App\Model\UserConnectionManager;

class UserConnectionController extends AbstractController
{
    public function login(): ?string
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $logs = array_map('trim', $_POST);
            $logs = array_map('htmlentities', $logs);
            // Validate data
            $logsCheckValidation = new UserConnectionManager();
            $errors = $logsCheckValidation->validation($logs);

            // Check the connection
            if (empty($errors)) {
                $accessEmail = $logs['email'];
                $accessPassword = $logs['password'];
                $logsCheck = new UserConnectionManager();
                $authorizationResult = $logsCheck->access($accessEmail, $accessPassword);

                if ($authorizationResult === true) {
                    //setting session
                    $gettingId = new UserConnectionManager();
                    $user = $gettingId->selectOneByEmail($accessEmail);
                    $_SESSION['user_id'] = $user['id'];
                    header('Location:/');
                } else {
                    $errors[] = "Les informations que vous avez saisi ne sont pas associées à un compte";
                }
            }
        }
        return null;
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_id']);
        header('Location:/');
    }
}
