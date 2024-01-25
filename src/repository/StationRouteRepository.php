<?php

namespace repository;

use models\StationRoute;
use PDO;

require_once "Repository.php";
require_once __DIR__."/../models/StationRoute.php";
class StationRouteRepository extends Repository
{
    public function addStationRoute(StationRoute $stationRoute) {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO station_routes (id_station, id_next_station, id_route, route_order, arrival_time, departure_time) VALUES (?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $stationRoute->getIdStation(),
            $stationRoute->getIdNextStation(),
            $stationRoute->getIdRoute(),
            $stationRoute->getRouteOrder(),
            $stationRoute->getArrivalTime(),
            $stationRoute->getDepartureTime()
        ]);
    }

    public function getStationRoute($id_route, $id_station) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM station_routes WHERE id_route = :id_route AND id_station = :id_station
        ');
        $stmt->bindParam(':id_station', $id_station);
        $stmt->bindParam(':id_route', $id_route);
        $stmt->execute();

        $info = $stmt->fetch(PDO::FETCH_ASSOC);

        return new StationRoute($info['id_station'], $info['id_next_station'], $info['id_route'], $info['route_order'], $info['arrival_time'], $info['departure_time']);
}

}