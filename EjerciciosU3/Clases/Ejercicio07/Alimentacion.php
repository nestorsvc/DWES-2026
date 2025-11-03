<?php
require_once 'Productos.php';
class Alimentacion extends Productos{
    private int $mes;
    private int $anioCaducidad;

    public function __construct($codigo, $precio, $nombre, $mes, $anioCaducidad){
        parent::__construct($codigo, $precio, $nombre);
        $this->mes = $mes;
        $this->anioCaducidad = $anioCaducidad;
    }

    public function getMes(){
        return $this->mes;
    }
    public function getAnioCaducidad(){
        return $this->anioCaducidad;
    }
    public function setMes($nuevoMes){
        $this->mes = $nuevoMes;
    }   
    public function setAnioCaducidad($nuevoAnio){
        $this->anioCaducidad = $nuevoAnio;
    }
    public function mostrar(){
        return parent::mostrar() . " Mes: " .$this->getMes(). " Año de Caducidad: " .$this->getAnioCaducidad();
    }

}