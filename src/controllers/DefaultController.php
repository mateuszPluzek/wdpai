<?php

use repository\UserRepository;

require_once 'AppController.php';


class DefaultController extends AppController {


    public function menu() {
        $tester = new UserRepository();
        if($tester->isAdmin($_COOKIE['session_id']))
            $this->render('admin_menu');
        else
            $this->render('menu');
    }

    public function register() {
        $this->render('register');
    }
}

?>