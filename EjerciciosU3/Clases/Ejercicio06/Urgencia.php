<?php
class Urgencia extends Medico{
    protected string $unidad;

    public function __construct($nombre, $edad, $turno,$unidad){
        parent::__construct($nombre,$edad,$turno);
        $this->unidad = $unidad;
    }

    public function getUnidad(){
        return $this->unidad;
    }
}
