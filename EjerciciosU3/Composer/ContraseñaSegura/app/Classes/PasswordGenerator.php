<?php

namespace App\Classes;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class PasswordGenerator
{

    private $mayusculas;
    private $minusculas;
    private $numeros;
    private $simbolos;
    private $longitud;

    public function __construct($mayusculas, $minusculas, $numeros, $simbolos, $longitud)
    {
        $this->mayusculas = $mayusculas;
        $this->minusculas = $minusculas;
        $this->numeros = $numeros;
        $this->simbolos = $simbolos;
        $this->longitud = $longitud;
    }
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
