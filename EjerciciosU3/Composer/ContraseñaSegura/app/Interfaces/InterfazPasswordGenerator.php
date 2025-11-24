<?php
namespace App\Interfaces;
use App\Classes\PasswordGenerator;

// Interfaz que utilizará el adaptador para crear la contraseña segura a partir de los parámetros que le pasemos desde el formulario 
interface InterfazPasswordGenerator{

    public static function generar(PasswordGenerator $propiedad):string;

}