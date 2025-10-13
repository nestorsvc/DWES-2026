<?php

class Alumno extends Persona{

    private string $asignaturas;

    public function __construct($nombre, $edad, $asignaturas){
        parent::__construct($nombre, $edad);
        $this->asignaturas = $asignaturas;
    }


    public function __toString()
    {
        return parent::__toString() . "Asignaturas: " . $this->asignaturas;
    }
    
}   