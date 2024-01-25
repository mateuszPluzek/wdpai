<?php

namespace repository;

use models\Operator;
use PDO;

require_once "Repository.php";
require_once __DIR__."/../models/Operator.php";

class OperatorRepository extends Repository{

    public function getOperators() {
        $results = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM operators ORDER BY name ASC'
        );
        $stmt->execute();
        $operators = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($operators as $operator) {
            $results[] = new Operator($operator['id_operator'], $operator['name']);
        }

        return $results;
    }

}