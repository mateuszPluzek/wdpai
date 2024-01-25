<?php

namespace repository;

use models\Train;
use PDO;

require_once "Repository.php";
require_once __DIR__."/../models/Train.php";

class TrainRepository extends Repository{

    public function addTrain(int $id_operator, string $name, int $number) {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO trains (id_operator, name, number) VALUES (?, ?, ?)'
        );
        $stmt->execute([
            $id_operator,
            $name,
            $number
        ]);
    }

    public function getTrains() {
        $results = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM trains ORDER BY name ASC'
        );
        $stmt->execute();
        $trains = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($trains as $train) {
            $results[] = new Train($train['id_operator'], $train['name'], $train['number']);
        }

        return $results;
    }

    public function deleteTrain($number) {
        $stmt = $this->database->connect()->prepare(
            'DELETE FROM trains WHERE number = :number'
        );
        $stmt->bindParam(':number', $number, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getTrainId($number) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM trains WHERE number = :number'
        );
        $stmt->bindParam(':number', $number, PDO::PARAM_INT);
        $stmt->execute();

        $train = $stmt->fetch(PDO::FETCH_ASSOC);

        return $train['id_train'];
    }

}