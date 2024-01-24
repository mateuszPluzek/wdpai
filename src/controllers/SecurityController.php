<?php

use models\User;
use repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {


    public function login() {
        if(isset($_COOKIE["session_id"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/menu");
            exit();
        }
        $this->render('login');
    }

    public function loginUser() {

        $userRepo = new UserRepository();

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepo->getUser($email);

        if(!$user) {
            return $this->render('login', ['messages'=> ['User doesn\'t exist']]);
        }
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email doesn\'t exist!']]);
        }
        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Incorrect password!']]);
        }

        setcookie("session_id", $userRepo->getUserId($user), time() + (86400 * 30), "/");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/menu");
        exit();

    }

    public function registerUser() {

        $userRepo = new UserRepository();

        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if($password !== $password_repeat) {
            return $this->render('register', ['messages' => ['Incorrect passwords']]);
        }
        if($userRepo->getUser($email)) {
            return $this->render('register', ['messages' => ['Email already used']]);
        }

        $user = new User( $email, $password," ", $name, $surname);
        $userRepo->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been registered']]);
    }

    public function logOut() {

        setcookie("session_id", "", time() - 3600, "/");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
        exit();
    }


}