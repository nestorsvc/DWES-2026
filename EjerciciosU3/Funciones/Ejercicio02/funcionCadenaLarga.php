<?php
function cadenaLarga($cadenaLarga, $palabra){
    $ultimaAparicion = strrpos($cadenaLarga, $palabra);
    if ($ultimaAparicion !== false){
        return $ultimaAparicion;
    } else {
        return 'No se encontró la letra en la cadena';
    }
}