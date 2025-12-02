<?php
namespace ProyectoBiblioteca\Almacenamiento;

class BaseDatos{
    public static function guardar(string $tabla, array $datos){
        $resultado = 'Guradando en tabla '.$tabla;
        foreach ($datos as $clave => $valor){
            $resultado.="$clave=$valor, ";
        }

        $resultado = rtrim($resultado, ", ");

        echo $resultado;
    }
}