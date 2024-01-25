<?php

namespace repository;

use models\StationRoute;

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

}