<?php
    require "Routing.php";

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('login', 'SecurityController');
    Routing::get('menu', 'DefaultController');
    Routing::get('register', 'DefaultController');
    Routing::get('show_fav_station', 'StationController');
    Routing::get('show_station', 'StationController');
    Routing::get('my_data', 'UserDataController');
    Routing::get('admin_input', 'AdminController');

    Routing::post('loginUser', 'SecurityController');
    Routing::post('addFavouriteStation', 'StationController');
    Routing::post('registerUser', 'SecurityController');
    Routing::post('removeFavouriteStation', 'StationController');
    Routing::post('logOut', 'SecurityController');
    Routing::post('alterUser', 'UserDataController');
    Routing::post('addStation', 'AdminController');
    Routing::post('delStation', 'AdminController');
    Routing::post('addTrain', 'AdminController');
    Routing::post('delTrain', 'AdminController');
    Routing::post('addRoute', 'AdminController');
    Routing::post('delRoute', 'AdminController');


    Routing::run($path);
?>