<?php

use repository\StationRepository;
use repository\FavStationRepository;

require_once 'AppController.php';
require_once __DIR__.'/../models/Station.php';
require_once __DIR__."/../repository/StationRepository.php";
require_once __DIR__."/../repository/FavStationRepository.php";

class StationController extends AppController {

    private $message = [];
    private $stationRepository;
    private $favStationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stationRepository = new StationRepository();
        $this->favStationRepository = new FavStationRepository();
    }

    public function show_station() {
        $stations = $this->stationRepository->getStations();
        $this->render('show_station', ['stations' => $stations]);
    }
//TODO current logged user
    public function show_fav_station() {
        $favStations = $this->favStationRepository->getFavStations(4);
        $this->render('show_fav_station', ['favStations' => $favStations]);
    }

//    public function addStation() {
//        if($this->isPost());
//    }
//TODO current logged user
//
    public function addFavouriteStation() {

        if($this->isPost()) {
            return $this->render('show_station', ['messages' => ["Added station to favourites"],
                'stations' => $this->stationRepository->getStations()]);
        }

        $id_station = $_POST["station_id"];
        $this->favStationRepository->addFavStation(4, $id_station);
    }


}






?>

