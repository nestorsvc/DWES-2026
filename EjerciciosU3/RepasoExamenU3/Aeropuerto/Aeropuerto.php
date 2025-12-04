<?php
require_once 'ElementoVolador.php';
require_once 'Avion.php';
class Aeropuerto
{
    private $elementosVoladores = [];

    public function __construct()
    {
        $this->elementosVoladores = [];
    }

    public function insertar(ElementoVolador $elementoVolador)
    {
        array_push($this->elementosVoladores, $elementoVolador);
    }

    public function buscar(string $nombre)
    {
        foreach ($this->elementosVoladores as $elementoVolador) {
            if ($elementoVolador->getNombre() === $nombre) {
                return $elementoVolador->mostrarInformacion();
            }
            return "El elemento no se encuentra en la lista";
        }
    }

    public function listarCompania(string $nombre)
    {
        $aviones = [];

        foreach ($this->elementosVoladores as $elementoVolador) {
            if ($elementoVolador instanceof Avion) {
                if ($elementoVolador->getCompaniaAerea() === $nombre) {
                    $aviones[] = $elementoVolador;
                }
            }
        }

        $resultado = "";
        foreach ($aviones as $avion) {
            $resultado .= $avion->mostrarInformacion();
        }
        return $resultado;
    }

    public function rotores(int $rotores)
    {
        $helicopteros = [];
        foreach ($this->elementosVoladores as $elementoVolador) {
            if ($elementoVolador instanceof Helicoptero) {
                if($elementoVolador->getNRotor() === $rotores){
                    $helicopteros[] = $elementoVolador;
                }
            }
        }

        $resultado = "";
        foreach ($helicopteros as $helicoptero){
            $resultado .= $helicoptero->mostrarInformacion();
        }
        return $resultado;
    }

    public function despegar(string $nombre, int $altitud, float $velocidad ){
        foreach ($this->elementosVoladores as $elementoVolador){
            if ($elementoVolador->getNombre() === $nombre){
                $elementoVolador->acelerar($velocidad);
                $elementoVolador->volar($altitud);
                return $elementoVolador;
            }
        }
    }
}
