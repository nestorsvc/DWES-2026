<?php
if(isset($_GET['nombre']) && !empty($_GET['nombre'])){
    $nombre = htmlspecialchars($_GET['nombre']);
    echo "¡Hola, $nombre!";
}

