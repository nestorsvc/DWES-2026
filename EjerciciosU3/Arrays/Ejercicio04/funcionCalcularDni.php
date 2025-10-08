<?php
function calcularLetraDNI($dni)
{
    if (!validarDNI($dni)){
        return false;
    }
    $letrasDNI = [
        'T',
        'R',
        'W',
        'A',
        'G',
        'M',
        'Y',
        'F',
        'P',
        'D',
        'X',
        'B',
        'N',
        'J',
        'Z',
        'S',
        'Q',
        'V',
        'H',
        'L',
        'C',
        'K',
        'E'
    ];

    $resto = intval($dni % 23);
    $letra = $letrasDNI[$resto];
    return $letra;
}


function validarDNI($dni)
{
    strval($dni);
    if (strlen($dni) != 8) {
        return false;
    }
    if(!is_numeric($dni)){
        return false;
    }

    // for ($i = 0; $i < strlen($dni) - 1; $i++) {
    //     intval($dni[$i]);
    //     if (!is_int([$i])) {
    //         return false;
    //     }
    // }
    return true;
} 
