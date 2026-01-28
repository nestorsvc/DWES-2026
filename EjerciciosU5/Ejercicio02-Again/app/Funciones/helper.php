<?php

function flash($clave, $mensaje = null)
{

    if ($mensaje !== null) {
        $_SESSION['flash'][$clave] = $mensaje;
        return;
    }

    if (isset($_SESSION['flash'][$clave])) {
        $msg = $_SESSION['flash'][$clave];
        unset($_SESSION['flash'][$clave]);
        return $msg;
    }
}


function iniciar_sesion()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function estaLogueado()
{
    if (isset($_SESSION['usuario'])) {
        return true;
    }
    return false;
}

function redireccionar($url)
{
    header("Location: $url");
}

function esPost()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return true;
    }
    return false;
}
