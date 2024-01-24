<?php
    require "Routing.php";

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('index', 'DefaultController');
    Routing::get('menu', 'DefaultController');
    Routing::get('register', 'DefaultController');
    Routing::get('show_fav_station', 'StationController');
    Routing::get('show_station', 'StationController');

    Routing::post('login', 'SecurityController');
    Routing::post('addFavouriteStation', 'StationController');

    Routing::run($path);
?>