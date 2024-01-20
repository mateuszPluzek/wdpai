<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function login() {
        $user = new User("ItsMe@gmail.com", "admin", 'its', "me");

        if($this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email doesn\'t exist!']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Incorrect password!']]);
        }

//        return $this->render('menu');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/menu");
        exit();

    }

}