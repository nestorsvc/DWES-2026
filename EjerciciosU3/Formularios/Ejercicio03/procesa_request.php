<?php
if (isset($_REQUEST['modulo'])){
    $modulo = htmlspecialchars($_REQUEST['modulo']);

    $mensaje = "<p>Seleccionaste la opcion<b style='color: green;'> $modulo</b></p>";
}else{
    $mensaje = "<p style='color: red;'>Debes seleccionar UNA opcion</p>";
}
echo "<h1>$mensaje</h1>";