<?php

namespace models;

class FavStation {
    private $id_station;
    private $id_user;

    public function __construct(int $id_station, int $id_user)
    {
        $this->id_station = $id_station;
        $this->id_user = $id_user;
    }

    public function getIdStation(): int
    {
        return $this->id_station;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }


}