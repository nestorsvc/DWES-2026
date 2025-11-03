<?php

use LDAP\Result;
require_once "ElementoVolador.php";
class Avion extends ElementoVolador{

    private string $companiaAerea;

    private string $fechaAlta;
    private float $altitudMaxima;

    public function __construct(string $nombre, int $numAlas, int $numMotores,string $companiaAerea, string $fechaAlta, float $altitudMaxima){
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = $companiaAerea;
        $fecha = new DateTime($fechaAlta);
        $this->fechaAlta = $fecha->format("d-m-y");
        $this->altitudMaxima = $altitudMaxima;
    }

    public function getCompania(){
        return $this->companiaAerea;
    }
    public function getFechaAlta(){
        return $this->fechaAlta;
    }
    public function getAltitudMaxima(){
        return $this->altitudMaxima;
    }
    public function volar(float $altitud){
        $resultado = '';
        if ($this->volando() !== false && $altitud < $this->getAltitudMaxima()){
            if($this->getVelocidad() > 150){
                while($this->getAltitud() < $altitud){
                    $altitudEntero = $this->getAltitud();
                    $this->setAltitud($altitudEntero + 100);
                    $resultado += 'Altitud incrementada (+100m) altitud actual: ' . $this->getAltitud().'<br>';
                }
                $resultado = "Altitud objetivo alcanzada";
            }
            $resultado = "La velocidad debe ser superior a 150km/h";
        }
        $resultado = "Falta de altitud, o sobrepaso de la altitud maxima del avion";
        return $resultado;
    }

    public function mostrarInformacion(){
        return "Nombre Compañia:" .$this->getCompania() . "Fecha Alta: " . $this->getFechaAlta() . "Altitud Maxima" . $this->getAltitudMaxima();
    }
}

$avion = new Avion("paco",2,4,"Flying","3-11-2020",1500);
echo $avion->mostrarInformacion();