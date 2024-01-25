<?php

namespace repository;

use models\Station;
use PDO;

require_once "Repository.php";
require_once __DIR__."/../models/Station.php";
class StationRepository extends Repository {

    public function getStation(string $name) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM stations WHERE name = :name'
        );
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $station = $stmt->fetch(PDO::FETCH_ASSOC);
        if($station == false) {
            return null;
        }
        return new Station (
          $station['name'],
          $station['code']
        );
    }

    public function deleteStation(string $code) {
        $stmt = $this->database->connect()->prepare(
            'DELETE FROM stations WHERE code = :code'
        );
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function addStation(Station $station) {
        try {
            $pdo = $this->database->connect();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare(
                'INSERT INTO stations (name, code) VALUES (?, ?)'
            );
            $stmt->execute([
                $station->getName(),
                $station->getCode()
            ]);
            $pdo->commit();
        } catch(Exception $e) {
//            TODO obsługa błędów
        }
    }

    public function getStations() {
       $results = [];
       $stmt = $this->database->connect()->prepare(
         'SELECT * FROM stations ORDER BY name ASC'
       );
       $stmt->execute();
       $stations = $stmt->fetchAll(PDO::FETCH_ASSOC);

       foreach($stations as $station) {
           $results[] = new Station($station['name'], $station['code']);
       }

       return $results;
    }

    public function getStationId(Station $station) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM stations WHERE code = :code'
        );
        $code = $station->getCode();
        $stmt->bindParam(':code', $code);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_station'];
    }
}