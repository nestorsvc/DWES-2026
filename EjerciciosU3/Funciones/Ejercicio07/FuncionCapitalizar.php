<?php
function capitalizar($cadena){
    if (strlen($cadena) > 15){
        $nuevaCadena = ucfirst($cadena);
        return $nuevaCadena;
    }else {
        return 'la cadena no tiene más de 15 caracteres.';
    }
}