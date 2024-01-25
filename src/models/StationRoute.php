<?php

namespace models;

class StationRoute
{
    private $id_station;
    private $id_next_station;
    private $id_route;
    private $route_order;
    private $arrival_time;
    private $departure_time;

    public function __construct($id_station, $id_next_station, $id_route, $route_order, $arrival_time, $departure_time)
    {
        $this->id_station = $id_station;
        $this->id_next_station = $id_next_station;
        $this->id_route = $id_route;
        $this->route_order = $route_order;
        $this->arrival_time = $arrival_time;
        $this->departure_time = $departure_time;
    }

    public function getIdStation()
    {
        return $this->id_station;
    }

    public function getIdNextStation()
    {
        return $this->id_next_station;
    }

    public function getIdRoute()
    {
        return $this->id_route;
    }

    public function getRouteOrder()
    {
        return $this->route_order;
    }

    public function getArrivalTime()
    {
        return $this->arrival_time;
    }

    public function getDepartureTime()
    {
        return $this->departure_time;
    }




}