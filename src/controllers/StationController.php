<?php

use models\FavStation;
use repository\StationRepository;
use repository\FavStationRepository;
use models\Station;

require_once 'AppController.php';
require_once __DIR__.'/../models/Station.php';
require_once __DIR__.'/../models/FavStation.php';
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
    public function show_fav_station() {
        $favStations = $this->favStationRepository->getFavStations($_COOKIE['session_id']);
        $this->render('show_fav_station', ['favStations' => $favStations]);
    }

    public function addFavouriteStation() {

        list($code, $name) = explode('|', $_POST['code']);
        $id = $this->stationRepository->getStationId(new Station($name, $code));
        $this->favStationRepository->addFavStation(new FavStation($id, $_COOKIE['session_id']));

        if($this->isPost()) {
            return $this->render('show_station', ['messages' => ["Added station to favourites"],
                'stations' => $this->stationRepository->getStations()]);
        }

        exit();
    }

    public function removeFavouriteStation() {
        if(!$_POST['code']) {
            return $this->render('show_fav_station', ['messages' => ["Removed station"],
                'favStations' => $this->favStationRepository->getFavStations($_COOKIE['session_id'])]);
        }

        list($code, $name) = explode('|', $_POST['code']);
        $id = $this->stationRepository->getStationId(new Station($name, $code));
        $this->favStationRepository->removeFavStation(new FavStation($id, $_COOKIE['session_id']));

        if($this->isPost()) {
            return $this->render('show_fav_station', ['messages' => ["Removed station"],
                'favStations' => $this->favStationRepository->getFavStations($_COOKIE['session_id'])]);
        }

        exit();

    }


}
?>