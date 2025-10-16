<?php
class Empleado {
    private string $nombre;
    private int $edad;
    private float $sueldo;

    public function __construct($nombre, $edad, $sueldo){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sueldo = $sueldo;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getSueldo(){
        return $this->sueldo;
    }

    public function __toString()
    {
        return " Nombre: " . $this->getNombre() . " Edad: " . $this->getEdad() . " Sueldo: " . $this->getSueldo();
    }
}