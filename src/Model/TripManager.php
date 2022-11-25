<?php

namespace App\Model;

use PDO;

class TripManager extends AbstractManager
{
    public const TABLE = 'trip';

    public function getGoodTrips($continent, $type, $duration)
    {
        $query = "SELECT * FROM trip WHERE category=1
                      AND continent=:continent
                      AND duration=:duration
                      AND type=:type";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':continent', $continent);
        $statement->bindValue(':duration', $duration);
        $statement->bindValue(':type', $type);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getAwayTrips($distance, $duration, $network)
    {
        $query = "SELECT * FROM trip WHERE category=2
                      AND distance=:distance
                      AND duration=:duration
                      AND network_coverage=:network";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':distance', $distance);
        $statement->bindValue(':duration', $duration);
        $statement->bindValue(':network', $network);
        $statement->execute();
        return $statement->fetchAll();
    }

//    public function getTripById(int $id): array
//    {
//        $statement = $this->pdo->prepare('SELECT * FROM trip WHERE id = :id');
//        $statement->bindValue(':id', $id, PDO::PARAM_INT);
//        $statement->execute();
//        return $statement->fetch();
//    }
}
