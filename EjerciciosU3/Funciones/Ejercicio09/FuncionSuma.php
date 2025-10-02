<?php

function suma($num, $num1, $num2)
{
    $suma = 0;
    if (is_int($num) && is_int($num1) && is_int($num2)) {
        $suma = $num + $num1 + $num2;
        return $suma;
    } else {
        return 'alguno de los numeros no es un entero';
    }
}
