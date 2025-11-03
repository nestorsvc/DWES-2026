<?php 
abstract class Productos{
    private string $codigo;
    private float $precio;
    private string $nombre;

    public function __construct($codigo, $precio, $nombre){
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setCodigo($nuevoCodigo){
        $this->codigo = $nuevoCodigo;
    }
    public function setPrecio($nuevoPrecio){
        $this->precio = $nuevoPrecio;
    }
    public function setNombre($nuevoNombre){
        $this->nombre = $nuevoNombre;
    }

    public function mostrar(){
        return "Codigo:" . $this->getCodigo() . " Nombre: " . $this->getNombre() . " Precio: " . $this->getPrecio(); 
    }

}