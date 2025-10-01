<?php
function palabraEspecifica($cadena, $letra)
{
    $cadenaMinusculas = strtolower($cadena);
    $palabraMinuscula = strtolower($letra);

    if (str_starts_with($cadenaMinusculas, $palabraMinuscula)) {
        echo "$cadena empieza con la cadena $letra";
    } else {
        echo "$cadena NO empieza con la cadena $letra";
    }
}
