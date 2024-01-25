<?php

use models\Station;
use models\Operator;
use models\StationRoute;
use models\Train;
use repository\OperatorRepository;
use repository\RouteRepository;
use repository\StationRepository;
use repository\StationRouteRepository;
use repository\TrainRepository;
use repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__.'/../repository/TrainRepository.php';
require_once __DIR__.'/../repository/OperatorRepository.php';
require_once __DIR__.'/../repository/RouteRepository.php';
require_once __DIR__.'/../repository/StationRouteRepository.php';
require_once __DIR__.'/../models/Train.php';
require_once __DIR__.'/../models/Route.php';
require_once __DIR__.'/../models/StationRoute.php';


class AdminController extends AppController {

    private $stationRepository;
    private $trainRepository;
    private $operatorRepository;
    private $routeRepository;
    private $stationRouteRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stationRepository = new StationRepository();
        $this->trainRepository = new TrainRepository();
        $this->operatorRepository = new OperatorRepository();
        $this->routeRepository = new RouteRepository();
        $this->stationRouteRepository = new StationRouteRepository();
    }
    public function admin_input() {
        $tester = new UserRepository();
        if(!$tester->isAdmin($_COOKIE['session_id'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/menu");
            exit();
        }
        else
            $this->rend();
    }
    private function rend() {
        $stations = $this->stationRepository->getStations();
        $operators = $this->operatorRepository->getOperators();
        $trains = $this->trainRepository->getTrains();
        $routes = $this->routeRepository->getRoutes();
        $this->render('admin_input', [
            'stations' => $stations,
            'operators' => $operators,
            'trains' => $trains,
            'routes' => $routes
        ]);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/admin_input");
        exit();
    }

    public function addStation() {
        if(!$this->isPost()) {
            return $this->render('admin_input');
        }
        $name = $_POST['stationName'];
        $code = $_POST['stationCode'];

        $this->stationRepository->addStation(new Station($name, $code));

        $this->rend();
    }

    public function delStation() {
        $code = $_POST['code'];
        $this->stationRepository->deleteStation($code);

        $this->rend();
    }

    public function addTrain() {
        $id_operator = $_POST['operator_id'];
        $name = $_POST['trainName'];
        $number = $_POST['trainNumber'];

        $this->trainRepository->addTrain($id_operator, $name, $number);

        $this->rend();
    }

    public function delTrain() {
        $code = $_POST['number'];
        $this->trainRepository->deleteTrain($code);

        $this->rend();
    }

    public function addRoute() {
        $number = $_POST['number'];
        $code = $_POST['routeCode'];

        $id_train = $this->trainRepository->getTrainId($number);

        $this->routeRepository->addRoute($id_train, $code);

        $this->rend();
    }
    public function delRoute() {
        $code = $_POST['routeCode'];
        $this->routeRepository->deleteRoute($code);

        $this->rend();
    }

    public function addStationRoute() {
        $code = $_POST['code'];
        $codeNext = $_POST['codeNext'];
        $routeCode = $_POST['routeCode'];
        $id_station = $this->stationRepository->getStationIdWithCode($code);
        $id_next_station = $this->stationRepository->getStationIdWithCode($codeNext);
        $id_route = $this->routeRepository->getRouteId($routeCode);
        $route_order = $_POST['order'];
        $arrival = $_POST['arr'];
        $departure = $_POST['dep'];


        $stationRoute = new StationRoute($id_station, $id_next_station, $id_route, $route_order, $arrival, $departure);

        $this->stationRouteRepository->addStationRoute($stationRoute);

        $this->rend();
    }

}