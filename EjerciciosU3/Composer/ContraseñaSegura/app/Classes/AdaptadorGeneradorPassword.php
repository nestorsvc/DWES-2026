<?php

namespace App\Classes;

use App\Interfaces\InterfazPasswordGenerator;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

// El adaptador implementa la interfaz y su método generar. 
class AdaptadorGeneradorPassword implements InterfazPasswordGenerator
{

    // Únicamente aquí es donde se usa la librería de composer
    public static function generar(PasswordGenerator $passwordGenerator):string
    {
        // Creamos una instancia de la clase ComputerPasswordGenerator
        // LLamamos a los métodos estáticos de ComputerPasswordGenerator para pasarle los valores de la clase PasswordGenerator (los valores del formulario)
        $generador = new ComputerPasswordGenerator();

        $generador->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE,$passwordGenerator->getMinusculas());
        $generador->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE,$passwordGenerator->getMayusculas());
        $generador->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS,$passwordGenerator->getNumeros());
        $generador->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS,$passwordGenerator->getSimbolos());
        $generador->setOptionValue(ComputerPasswordGenerator::OPTION_LENGTH,$passwordGenerator->getLongitud());

        // Generamos y devolvemos contraseña
        return $generador->generatePassword();
    }
}
