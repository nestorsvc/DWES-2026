<?php

namespace App\Classes;
// Clase que solamente que se basa en los valores del formulario
class PasswordGenerator
{
    // Tiene como propiedades los campos
    private $mayusculas;
    private $minusculas;
    private $numeros;
    private $simbolos;
    private $longitud;

    // Un constructor para poder inicializar la clase 
    public function __construct($mayusculas, $minusculas, $numeros, $simbolos, $longitud)
    {
        $this->mayusculas = $mayusculas;
        $this->minusculas = $minusculas;
        $this->numeros = $numeros;
        $this->simbolos = $simbolos;
        $this->longitud = $longitud;
    }

    // Getteers que nos harán falta para poder acceder en el adaptador a cada propiedad
    public function getMayusculas()
    {
        return $this->mayusculas;
    }

    public function getMinusculas()
    {
        return $this->minusculas;
    }

    public function getNumeros()
    {
        return $this->numeros;
    }

    public function getSimbolos()
    {
        return $this->simbolos;
    }

    public function getLongitud()
    {
        return $this->longitud;
    }
}
