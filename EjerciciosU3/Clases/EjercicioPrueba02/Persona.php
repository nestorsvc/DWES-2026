<?php
class Persona{
    private string $nombre;
    private string $edad;

    public function __construct($nombre, $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function __toString()
    {
        return "Nombre:" . $this->nombre . "Edad: " . $this->edad;
    }
}