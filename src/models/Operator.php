<?php

namespace models;

class Operator {
    private $id_operator;
    private $name;

    public function __construct(int $id_operator, string $name)
    {
        $this->id_operator = $id_operator;
        $this->name = $name;
    }

    public function getIdOperator(): int
    {
        return $this->id_operator;
    }

    public function getName(): string
    {
        return $this->name;
    }


}