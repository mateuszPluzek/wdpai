<?php

namespace repository;

use models\StationRoute;
use PDO;

require_once "Repository.php";

class SearchRepository extends Repository
{
    public function findCommonRoute(int $id_station,int $id_final_station)
    {
        $results = [];
        $stmt = $this->database->connect()->prepare('
        SELECT id_route FROM station_routes WHERE id_station IN (:idone, :idtwo) GROUP BY id_route HAVING COUNT(DISTINCT id_station) = 2;
        ');
        $stmt->bindParam(':idone', $id_station, PDO::PARAM_INT);
        $stmt->bindParam(':idtwo', $id_final_station, PDO::PARAM_INT);
        $stmt->execute();
        $routes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($routes as $route) {
            $results[] = $route['id_route'];
        }

        return $results;
    }

}