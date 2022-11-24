<?php

namespace App\Model;

class UserInscriptionManager extends AbstractManager
{
    public function register($userInfos): void
    {
        $query = "INSERT INTO user (lastname, firstname, email, password)
                VALUES (:lastname, :firstname, :email, :password)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':lastname', $userInfos['lastname']);
        $statement->bindValue(':firstname', $userInfos['firstname']);
        $statement->bindValue(':email', $userInfos['email']);
        $statement->bindValue(':password', password_hash($userInfos['password1'], PASSWORD_DEFAULT));
        $statement->execute();
    }
}
