<?php

use repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserDetail.php';

class UserDataController extends AppController {

    private $userRepo;
    public function __construct()
    {
        parent::__construct();
        $this->userRepo = new UserRepository();

    }

    public function my_data() {
        $user = $this->userRepo->getUserWithId($_COOKIE['session_id']);
        $this->render('my_data', ['user_data' => [$user->getName(), $user->getSurname(), $user->getEmail()]]);
    }

    public function alterUser() {
        $newName = $_POST['newName'];
        $newSurname = $_POST['newSurname'];

        $user = $this->userRepo->getUserWithId($_COOKIE['session_id']);
        $id = $this->userRepo->getUserDetailsId($user);

        $this->userRepo->alterDetails($id, $newName, $newSurname);

        $user = $this->userRepo->getUserWithId($_COOKIE['session_id']);
        return $this->render('my_data', ['user_data' => [$user->getName(), $user->getSurname(), $user->getEmail()]]);
    }


}