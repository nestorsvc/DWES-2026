<?php 
require_once 'Volador.php';
abstract class ElementoVolador implements Volador{

    private string $nombre;
    private int $numAlas;
    private int $numMotores;
    private float $altitud;
    private float $velocidad;
    
    public function __construct(string $nombre, int $numAlas, int $numMotores) {
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0;
        $this->velocidad = 0;
    }

    public function getNombre (){
        return $this->nombre;
    }
    public function getNumAlas(){
        return $this->numAlas;
    }
    public function getNumMotores(){
        return $this->numMotores;
    }

    public function getAltitud(){
        return $this->altitud;
    }
    public function setAltitud($nuevaAltitud){
        $this->altitud = $nuevaAltitud;
        return $this->altitud;
    }
    
    public function getVelocidad(){
        return $this->velocidad;
    }

    public function setVelocidad($nuevaVelocidad){
        $this->velocidad = $nuevaVelocidad;
        return $this->velocidad;
    }

    public function volando(){
        if($this->altitud > 0){
            return true;
        }
        return false;
    }

    public function acelerar(float $velocidad){
        if($velocidad > 0){
            $this->velocidad+=$velocidad;
            return $this->velocidad;
        }
        return "no puedes acelerar con un numero negativo";
    }

    abstract public function volar(int $altitud);
    abstract public function mostrarInformacion():string;

}