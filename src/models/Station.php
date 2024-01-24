<?php

namespace models;

class Station {
    private $id_station;
    private $name;
    private $code;

    public function __construct($id_station, $name, $code)
    {
        $this->id_station = $id_station;
        $this->name = $name;
        $this->code = $code;
    }

    public function getIdStation()
    {
        return $this->id_station;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

}