<?php

namespace models;

class Route {
    private $id_train;
    private $code;

    public function __construct($id_train, $code)
    {
        $this->id_train = $id_train;
        $this->code = $code;
    }

    public function getIdTrain()
    {
        return $this->id_train;
    }

    public function getCode()
    {
        return $this->code;
    }




}