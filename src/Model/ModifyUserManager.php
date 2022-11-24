<?php

namespace App\Model;

use PDO;

class ModifyUserManager extends AbstractManager
{
    public function selectUserById()
    {
        $query = "SELECT *  FROM `user` WHERE id = 1 "; // $_SESSION['user_id']
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetch();
    }

    public function selectStepmomById()
    {
        $query = "SELECT *  FROM `stepmom` WHERE userID = 1 "; // $_SESSION ['user_id']
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetch();
    }

    public function modifyUser(array $infosUser)
    {
        $query = "UPDATE `user` SET firstname = :firstname, lastname = :lastname, email = :email WHERE id = 1"; //$_SESSION['user_id']
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':firstname', $infosUser['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':lastname', $infosUser['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':email', $infosUser['email'], FILTER_VALIDATE_EMAIL);
        //$statement->bindValue(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
        $statement->execute();
    }

    public function modifyStepmom(array $infosUser)
    {
        $query = "UPDATE `stepmom` SET firstname = :firstname, lastname = :lastname WHERE userID = 1"; //$_SESSION['user_id']
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':firstname', $infosUser['stepmomFirstname'], PDO::PARAM_STR);
        $statement->bindValue(':lastname', $infosUser['stepmomLastname'], PDO::PARAM_STR);
        //$statement->bindValue(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
        $statement->execute();
    }

    public function validateModifiedInfos(array $infosUser): array
    {
        $errors = [];
        if (empty($infosUser['firstname'])) {
            $errors[] = 'Prénom obligatoire';
        }
        if (empty($infosUser['lastname'])) {
            $errors[] = 'Nom obligatoire';
        }
        if (empty($infosUser['telephone'])) {
            $errors[] = 'téléphone obligatoire';
        }
        if (empty($infosUser['address'])) {
            $errors[] = 'adresse postale obligatoire';
        }
        return $errors;
    }
}
