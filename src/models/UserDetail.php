<?php

namespace models;

class UserDetail {
    private $id_user_detail;
    private $name;
    private $surname;

    public function __construct(int $id_user_detail, string $name, string $surname)
    {
        $this->id_user_detail = $id_user_detail;
        $this->name = $name;
        $this->surname = $surname;
    }


    public function getIdUserDetail(): int
    {
        return $this->id_user_detail;
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