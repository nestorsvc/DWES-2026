<?php
function funcionDevuelve($cadena){
    $longitud = strlen($cadena);
    $palabra = ucwords($cadena);

    $txt = "Numero de caracteres: $longitud<br>Cadena modificada: $palabra";
    return $txt;
}