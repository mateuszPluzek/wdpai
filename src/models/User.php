<?php

namespace models;

class User
{
    private $email;
    private $password;
    private $user_type;
    private $name;
    private $surname;

    public function __construct(string $email, string $password, string $user_type, string $name, string $surname) {
        $this->email = $email;
        $this->password = $password;
        $this->user_type = $user_type;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getSalt(): string
    {
        return $this->salt;
    }
    public function getUserType(): string
    {
        return $this->user_type;
    }
    public function getName(): string
    {
    return $this->name;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
}