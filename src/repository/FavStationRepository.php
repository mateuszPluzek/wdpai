<?php

namespace repository;

use models\FavStation;
use models\Station;
use models\User;
use PDO;

require_once "Repository.php";
require_once __DIR__."/../models/Station.php";
require_once __DIR__."/../models/User.php";
class FavStationRepository extends Repository {

    public function getFavStations(int $id_user) {
        $results = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT stations.id_station, stations.name, stations.code FROM stations natural join favourite_stations natural join users where id_user = :id_user ORDER BY stations.name ASC;'
        );
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        $stations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($stations as $station) {
            $results[] = new Station($station['name'], $station['code']);
        }

        return $results;
    }

    public function addFavStation(FavStation $favStation) {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO favourite_stations (id_user, id_station) VALUES (?, ?)'
        );
        $stmt->execute([
            $favStation->getIdUser(),
            $favStation->getIdStation()
        ]);
    }

    public function removeFavStation(FavStation $favStation) {
        $stmt = $this->database->connect()->prepare(
            'DELETE FROM favourite_stations WHERE id_user = :id_user AND id_station = :id_station'
        );
        $id_user = $favStation->getIdUser();
        $id_station = $favStation->getIdStation();
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_station', $id_station, PDO::PARAM_INT);
        $stmt->execute();
    }
}