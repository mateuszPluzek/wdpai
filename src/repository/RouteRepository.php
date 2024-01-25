<?php

namespace repository;

use models\Route;
use PDO;

require_once "Repository.php";
require_once __DIR__."/../models/Route.php";

class RouteRepository extends Repository {
    public function addRoute($id_train, $code) {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO routes (id_train, code) VALUES (?, ?)'
        );
        $stmt->execute([
            $id_train,
            $code
        ]);
    }

    public function getRoutes() {
        $results = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM routes ORDER BY code ASC'
        );
        $stmt->execute();
        $routes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($routes as $route) {
            $results[] = new Route($route['id_train'], $route['code']);
        }

        return $results;
    }

    public function deleteRoute($code) {
        $stmt = $this->database->connect()->prepare(
            'DELETE FROM routes WHERE code = :code'
        );
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getRouteId($code) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM routes WHERE code = :code'
        );
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();

        $train = $stmt->fetch(PDO::FETCH_ASSOC);

        return $train['id_route'];
    }
}