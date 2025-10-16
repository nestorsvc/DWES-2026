<?php

class Familia extends Medico{
    protected int $numeroPaciente;

    public function __construct($nombre, $edad, $turno,$numeroPaciente){
        parent::__construct($nombre,$edad,$turno);
        $this->numeroPaciente = $numeroPaciente;
    }

    public function getNumeroPaciente(){
        return $this->numeroPaciente;
    }

}