<?php
class Profesor extends Persona{
    private string $clase;

    public function __construct($nombre, $edad,$clase){
        parent::__construct($nombre,$edad);
        $this->clase = $clase;
    }

    public function __toString()
    {
        return parent::__toString() . "Clase: ". $this->clase;
    }

}