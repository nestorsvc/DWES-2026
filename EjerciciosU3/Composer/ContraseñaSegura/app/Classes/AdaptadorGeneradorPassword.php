<?php

namespace App\Classes;

use App\Interfaces\InterfazPasswordGenerator;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class AdaptadorGeneradorPassword implements InterfazPasswordGenerator
{

    private $generador;

    public function __construct()
    {
        $this->generador = new ComputerPasswordGenerator();
    }

    public function generar(PasswordGenerator $passwordGenerator):string
    {
        // Configurar según opciones del formulario
        $this->generador->setUppercase($passwordGenerator->getMayusculas());
        $this->generador->setLowercase($passwordGenerator->getMinusculas());
        $this->generador->setNumbers($passwordGenerator->getNumeros());
        $this->generador->setSymbols($passwordGenerator->getSimbolos());
        $this->generador->setLength($passwordGenerator->getLongitud());

        // Generar y devolver contraseña
        return $this->generador->generatePassword();
    }
}
