<?php

namespace App\Controller;

use App\Model\TripManager;
use App\Service\FormValidator;

class TripController extends AbstractController
{
    public function searchGoodTrips()
    {
        $errors = [];
        $trips = [];
        $noTripsMessage = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tripSearch = array_map('trim', $_POST);
            if (empty($tripSearch['continent'])) {
                $errors[] = 'Vous devez obligatoirement sélectionner un continent de destination';
            }
            if (empty($tripSearch['type'])) {
                $errors[] = 'Vous devez obligatoirement sélectionner un type de voyage';
            }
            if (empty($tripSearch['duration'])) {
                $errors[] = 'Vous devez obligatoirement sélectionner une durée de voyage';
            }
            if (empty($errors)) {
                $tripManager = new TripManager();
                $trips = $tripManager->getGoodTrips(
                    $tripSearch['continent'],
                    $tripSearch['type'],
                    $tripSearch['duration']
                );
                if (empty($trips)) {
                    $noTripsMessage = 'Aucun voyage ne correspond à votre recherche';
                }
            }
            return $this->twig->render('Trips/goodTrips.html.twig', [
                'trips' => $trips,
                'noTrip' => $noTripsMessage,
                'errors' => $errors,
                'inputs' => $tripSearch
            ]);
        }
        return $this->twig->render('Trips/goodTrips.html.twig');
    }

    public function searchAwayTrips()
    {
        $errors = [];
        $trips = [];
        $noTripsMessage = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tripSearch = array_map('trim', $_POST);
            if (empty($tripSearch['distance'])) {
                $errors[] = 'Vous devez obligatoirement sélectionner une distance';
            }
            if (empty($tripSearch['duration'])) {
                $errors[] = 'Vous devez obligatoirement sélectionner une durée de voyage';
            }
            if (empty($tripSearch['network'])) {
                $errors[] = 'Veuillez sélectionner la couverture réseau de la destination';
            }
            if (empty($errors)) {
                $tripManager = new TripManager();
                $trips = $tripManager->getAwayTrips(
                    $tripSearch['distance'],
                    $tripSearch['duration'],
                    $tripSearch['network']
                );
                if (empty($trips)) {
                    $noTripsMessage = 'Aucun voyage ne correspond à votre recherche';
                }
            }
            return $this->twig->render('Trips/awayTrips.html.twig', [
                'trips' => $trips,
                'noTrip' => $noTripsMessage,
                'errors' => $errors,
                'inputs' => $tripSearch
            ]);
        }
        return $this->twig->render('Trips/awayTrips.html.twig');
    }
}
