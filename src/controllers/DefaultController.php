<?php
require_once 'AppController.php';


class DefaultController extends AppController {


    public function index() {
        echo 'what the fuck!';
        $this->render('login');
    }

    public function menu() {
        $this->render('menu');
    }
}

?>