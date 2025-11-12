<?php 
if (isset($_GET['modulo'])){
    $modulo = htmlspecialchars($_GET['modulo']);

    $mensaje = "<p>Seleccionaste la opcion<b style='color: green;'> $modulo</b></p>";
}else{
    $mensaje = "<p style='color: red;'>Debes seleccionar UNA opcion</p>";
}
echo "<h1>$mensaje</h1>";