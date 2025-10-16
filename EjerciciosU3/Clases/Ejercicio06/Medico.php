<?php
abstract class Medico{

    protected string $nombre;
    protected int $edad;

    protected string $turno;

    public function __construct($nombre, $edad, $turno){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getTurno(){
        return $this->turno;
    }

    public function __toString()
    {
        return "Nombre: " . $this->nombre . " Edad: " . $this->edad . " Turno: " . $this->turno;
    }


}