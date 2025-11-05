<?php
require_once "Volador.php";
abstract class ElementoVolador implements Volador
{
    private string $nombre;
    private int $numAlas;
    private int $numMotores;
    private float $altitud;
    private float $velocidad;

    public function __construct(string $nombre, int $numAlas, int $numMotores)
    {
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0;
        $this->velocidad = 0;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getNumAlas()
    {
        return $this->numAlas;
    }
    public function getNumMotores()
    {
        return $this->numMotores;
    }
    public function getAltitud()
    {
        return $this->altitud;
    }
    public function getVelocidad()
    {
        return $this->velocidad;
    }
    public function setNombre(string $nombre)
    {
        return $this->nombre = $nombre;
    }
    public function setNumAlas(int $numAlas)
    {
        return $this->numAlas = $numAlas;
    }
    public function setNumMotores(int $numMotores)
    {
        return $this->numMotores = $numMotores;
    }
    public function setAltitud(float $altitud)
    {
        return $this->altitud = $altitud;
    }
   

    public function volando (){
        return $this->altitud > 0;
    }
    public function acelerar(int $incremento){
        $this->velocidad+=$incremento;
        return $this->velocidad;
    }

    abstract public function volar (float $altitud);
    abstract public function mostrarInformacion();
    
}
