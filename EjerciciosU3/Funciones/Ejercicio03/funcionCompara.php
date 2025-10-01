<?php
function compararCadenas($cadena, $cadena1){
    $comparacion = strcmp($cadena, $cadena1);
    $txt = '';
    if($comparacion == 0){
        $txt = "Las cadenas $cadena y $cadena1 son iguales";
    } else {
        $txt = "Las cadenas $cadena y $cadena1 NO son iguales";
    }
    return $txt;
}