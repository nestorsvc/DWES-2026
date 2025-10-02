<?php
function mayusMinus($cadena){
    $txt = "";
    $minusculas = strtolower($cadena);
    $mayusculas = strtoupper($cadena);

    $txt = "$minusculas y $mayusculas";
    return $txt;
}