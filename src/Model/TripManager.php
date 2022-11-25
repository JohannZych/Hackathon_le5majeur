<?php

namespace App\Model;

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

    public function getExtremeTrips()
    {
        $query = "SELECT * FROM trip WHERE category=3";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }
}
