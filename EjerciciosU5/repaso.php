<?php 
// Que va a entrar seguramente en el examen
// funcion flash =>
function flash($clave, $mensaje = null){
    // esto es solamente para guardar el mensaje dentro del sub array $_SESSION['flash'] con key o valor $clave
    if($mensaje !== null){
        $_SESSION['flash'][$clave] = $mensaje;
        return;
    }
     // ahora accedemos a ese mensaje, para ello primero comprobamos si existe la clave del mensaje
     if($_SESSION['flash'][$clave]){
        // lo guardamos en un mensaje
        $msg = $_SESSION['flash'][$clave];//=> accedemos al valor del mensaje
        return $msg;
     }
}
// Sesiones
// funcion generica para iniciar sesion 
function iniciar_sesion(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
}





