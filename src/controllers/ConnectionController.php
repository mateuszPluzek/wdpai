<?php

use repository\FavStationRepository;
use repository\StationRepository;

require_once "AppController.php";

require_once __DIR__."/../repository/StationRepository.php";
require_once __DIR__."/../repository/FavStationRepository.php";
class ConnectionController extends AppController
{

    private $stationRepository;
    private $favStationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stationRepository = new StationRepository();
        $this->favStationRepository = new FavStationRepository();
    }
    public function show_lines() {
        $stations = $this->stationRepository->getStations();
        $favStations = $this->favStationRepository->getFavStations($_COOKIE['session_id']);
        $this->render("show_lines", [
            'stations' => $stations,
            'favStations' => $favStations
        ]);
    }

}