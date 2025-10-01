<?php
function fragmento($cadena, $posicionInicial, $longitud){
    $fragmento = substr($cadena, $posicionInicial, $longitud);  
    $txt = '';
    if($fragmento == ''){
        $txt = "El fragmento seleccionado no se encuentra en $cadena";
    } else {
        $txt = "El fragmento seleccionado es: $fragmento";
    }
    return $txt;
}