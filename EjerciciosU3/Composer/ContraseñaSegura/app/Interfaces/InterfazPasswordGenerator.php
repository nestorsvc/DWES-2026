<?php
namespace App\Interfaces;
use App\Classes\PasswordGenerator;
interface InterfazPasswordGenerator{
    public function generar(PasswordGenerator $propiedad):string;

}