<?php
namespace Almacentamiento;

class BaseDatos{
    public static function guardar(string $tabla, array $datos){
        $data = "Guardando en tabla '$tabla':";
        foreach ($datos as $dato){
            $data .= $dato;
        }
        return $data;
    }
    
}