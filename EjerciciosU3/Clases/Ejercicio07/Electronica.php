<?php 

class Electronica extends Productos{
    private int $plazo_garantia;

    public function __construct($codigo, $precio, $nombre, $plazo_garantia){
        parent::__construct($codigo, $precio, $nombre);
        $this->plazo_garantia = $plazo_garantia;
    }

    public function getPlazoGarantia(){
        return $this->plazo_garantia;
    }
    public function setPlazoGarantia($nuevoPlazo){
        $this->plazo_garantia = $nuevoPlazo;
    }

    public function mostrar(){
        return parent::mostrar() . " Plazo de Garantía: " .$this->getPlazoGarantia();
    }
}