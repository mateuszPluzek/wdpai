<?php

namespace repository;

use models\User;
use PDO;

require_once "Repository.php";
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM users NATURAL JOIN user_details WHERE email = :email'
        );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['user_type'],
            $user['name'],
            $user['surname']
        );
    }

    public function getUserWithId(int $id) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM users NATURAL JOIN user_details WHERE id_user = :id_user'
        );
        $stmt->bindParam(':id_user', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['user_type'],
            $user['name'],
            $user['surname']
        );
    }

    public function getUserDetailsId(User $user) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM user_details WHERE name = :name AND surname = :surname'
        );
        $name = $user->getName();
        $surname = $user->getSurname();

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_user_detail'];

    }

    public function addUser(User $user) {
        $pdo = $this->database->connect();
        $pdo->beginTransaction();

        $stmt = $pdo->prepare(
            'INSERT INTO user_details (name, surname) VALUES (?, ?)'
        );

        $stmt->execute([
            $user->getName(),
            $user->getSurname()
        ]);

        $stmt = $pdo->prepare(
            'INSERT INTO users (email, password, id_user_detail) VALUES (?, ?, ?)'
        );

        $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        $stmt->execute([
            $user->getEmail(),
            $hashedPassword,
            $this->getUserDetailsId($user)
        ]);

        $pdo->commit();
    }

    public function getUserId(User $user) {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM users NATURAL JOIN user_details WHERE email = :email'
        );
        $email = $user->getEmail();
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user['id_user'];

    }

    public function alterDetails( int $id, string $name = "", string $surname = "") {
        $stmt = $this->database->connect()->prepare(
            'UPDATE user_details SET name = :name, surname = :surname WHERE id_user_detail = :id_user'
        );

        $stmt->bindParam(':id_user', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->execute();
    }

    public function isAdmin(int $id) {
        $user = $this->getUserWithId($id);
        if($user->getUserType() === 'admin') {
            return true;
        }
        return false;
    }

}