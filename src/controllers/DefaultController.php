<?php
require_once 'AppController.php';


class DefaultController extends AppController {


    public function menu() {
        $this->render('menu');
    }

    public function register() {
        $this->render('register');
    }

    public function my_data() {
        $this->render('my_data');
    }
}

?>