<?php

use repository\FavStationRepository;
use repository\OperatorRepository;
use repository\RouteRepository;
use repository\SearchRepository;
use repository\StationRepository;
use repository\StationRouteRepository;
use repository\TrainRepository;

require_once "AppController.php";

require_once __DIR__."/../repository/StationRepository.php";
require_once __DIR__."/../repository/FavStationRepository.php";
require_once __DIR__."/../repository/SearchRepository.php";
require_once __DIR__."/../repository/StationRouteRepository.php";
require_once __DIR__."/../repository/TrainRepository.php";
require_once __DIR__."/../repository/OperatorRepository.php";
require_once __DIR__."/../repository/RouteRepository.php";
class ConnectionController extends AppController
{

    private $stationRepository;
    private $favStationRepository;
    private $searchRepository;
    private $stationRouteRepository;
    private $trainRepository;
    private $operatorRepository;
    private $routeRepository;



    public function __construct()
    {
        parent::__construct();
        $this->stationRepository = new StationRepository();
        $this->favStationRepository = new FavStationRepository();
        $this->searchRepository = new SearchRepository();
        $this->stationRouteRepository = new StationRouteRepository();
        $this->trainRepository = new TrainRepository();
        $this->operatorRepository = new OperatorRepository();
        $this->routeRepository = new RouteRepository();
    }
    public function show_lines() {
        $stations = $this->stationRepository->getStations();
        $favStations = $this->favStationRepository->getFavStations($_COOKIE['session_id']);
        $this->render("show_lines", [
            'stations' => $stations,
            'favStations' => $favStations
        ]);
    }

    public function showConnections() {
        $code = $_POST['code'];
        $id_one = $this->stationRepository->getStationIdWithCode($code);
        $stationName = $this->stationRepository->getStation($code)->getName();

        $codeFinal = $_POST['codeFinal'];
        $id_two = $this->stationRepository->getStationIdWithCode($codeFinal);
        $finalStationName = $this->stationRepository->getStation($codeFinal)->getName();


        $routes = $this->searchRepository->findCommonRoute($id_one, $id_two);
        $routesStart = [];
        $routesEnd = [];
        $distance = [];
        $trains = [];
        $operators = [];

        foreach($routes as $route) {
            $routesStart[] = $this->stationRouteRepository->getStationRoute($route, $id_one);
        }
        foreach($routes as $route) {
            $routesEnd[] = $this->stationRouteRepository->getStationRoute($route, $id_two);
        }
        foreach($routes as $route) {
            $trains[] = $this->trainRepository->getTrain($this->routeRepository->getRoute($route));
        }
        foreach($trains as $train) {
            $operators[] = $this->operatorRepository->getOperator($train->getIdOperator());
        }
        for($i = 0; $i < count($routesStart);$i++) {
            $distance[] = $routesEnd[$i]->getRouteOrder() - $routesStart[$i]->getRouteOrder();
        }


        $stations = $this->stationRepository->getStations();
        $favStations = $this->favStationRepository->getFavStations($_COOKIE['session_id']);
        return $this->render('show_lines', [
            'routesStart' => $routesStart,
            'routesEnd' => $routesEnd,
            'distances' => $distance,
            'trains' => $trains,
            'operators' => $operators,
            'stations' => $stations,
            'favStations' => $favStations,
            'stationNames' => ["$stationName", "$finalStationName"]
        ]);
    }

}