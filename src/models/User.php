<?php

namespace models;

class User
{
    private $email;
    private $password;
    private $user_type;
    private $salt;
    private $id_user;
    private $id_user_detail;

    public function __construct(string $email, string $password, string $user_type, string $salt, int $id_user, int $id_user_detail) {
        $this->email = $email;
        $this->password = $password;
        $this->user_type = $user_type;
        $this->salt = $salt;
        $this->id_user = $id_user;
        $this->id_user_detail = $id_user_detail;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getIdUser(): int
    {
        return $this->id_user;
    }
    public function getIdUserDetail(): int
    {
        return $this->id_user_detail;
    }
    public function getSalt(): string
    {
        return $this->salt;
    }
    public function getUserType(): string
    {
        return $this->user_type;
    }
}