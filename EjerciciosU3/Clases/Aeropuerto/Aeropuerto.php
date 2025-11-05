<?php
class Aeropuerto{
    private $elementosVoladores;

    public function __construct($elementosVoladores = []){
        $this->elementosVoladores = $elementosVoladores;
    }

    public function insertar($elementoVolador){
        array_push($this->elementosVoladores,$elementoVolador);
    }
    public function buscar($nombre){
        $resultado = ' ';
        foreach ($this->elementosVoladores as $elemento){
            if($elemento->getNombre() == $nombre){
                $resultado = $elemento->mostrarInformacion();
                return $resultado;
            }
        }
        return 'No se encuentra el nombre especificado';
    }
    public function listarCompania($nombreCompania){
        $resultado = ' ';
        foreach ($this->elementosVoladores as $elemento){
            if($elemento instanceof Avion){
                if($elemento->getCompania() == $nombreCompania){
                    $resultado .= $elemento->mostrarInformacion();
                }
            }
        }
        return $resultado;
    }

    public function rotores($numeroRotores){
        $resultado = ' ';
        foreach ($this->elementosVoladores as $elemento){
            if($elemento instanceof Helicoptero){
                if($elemento->getnRotor() == $numeroRotores){
                    $resultado = $elemento->mostrarInformacion();
                    return $resultado;
                }
            }
        }
    }

    public function despegar($nombre, $altitud, $velocidad){
         foreach ($this->elementosVoladores as $elemento){
            if($elemento->getNombre() === $nombre){
                $elemento->acelerar($velocidad);
                return $elemento->volar($altitud);
            }
        }
        return null;
    }

}