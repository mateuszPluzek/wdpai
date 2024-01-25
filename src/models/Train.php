<?php

namespace models;

class Train{
    private $id_operator;
    private $name;
    private $number;

    public function __construct(int $id_operator,string $name,int $number)
    {
        $this->id_operator = $id_operator;
        $this->name = $name;
        $this->number = $number;
    }


    public function getIdOperator(): int
    {
        return $this->id_operator;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }



}