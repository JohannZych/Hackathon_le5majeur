<?php

namespace App\Model;

class PurchaseConfirmationManager extends AbstractManager
{
    public function getPurchase($id)
    {
        $query = "SELECT category, trip_name, image, continent, type, duration, network_coverage, distance
                FROM trip
                WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }
}
