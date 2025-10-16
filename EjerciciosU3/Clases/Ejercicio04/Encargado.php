<?php
class Encargado extends Empleado{
    private string $oficina;

    public function __construct($nombre, $edad, $sueldo, $oficina){
        parent::__construct($nombre,$edad,$sueldo);
        $this->oficina = $oficina;
    }

    public function getSueldo(){
        $extra = parent::getSueldo() * 0.15;
        return parent::getSueldo() + $extra;
    }


    public function __toString(){
        return parent::__toString() . " Oficina: " . $this->oficina;
    }
}