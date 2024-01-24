<?php

use models\User;
use repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    public function login() {

        $userRepo = new UserRepository();

        if($this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepo->getUser($email);

        if(!$user) {
            return $this->render('login', ['messages'=> ['User doesn\'t exist']]);
        }
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