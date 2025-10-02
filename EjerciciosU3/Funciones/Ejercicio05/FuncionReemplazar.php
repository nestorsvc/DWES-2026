<?php
function reemplazar($quecambiar, $conque, $dondebuscar){
    $nuevaCadena = str_replace($quecambiar,$conque,subject: $dondebuscar);
    $txt = "La cadena originial es $dondebuscar y la modificada es $nuevaCadena";
    return $txt;
}