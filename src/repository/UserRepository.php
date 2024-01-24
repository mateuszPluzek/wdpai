<?php

namespace repository;

use models\User;
use PDO;

require_once "Repository.php";
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM users WHERE email = :email'
        );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['id_user'],
            $user['email'],
            $user['password'],
            $user['salt'],
            $user['user_type'],
            $user['id_user_detail']
        );
    }


}