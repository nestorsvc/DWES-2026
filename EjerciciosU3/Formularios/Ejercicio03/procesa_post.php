<?php 
if (isset($_POST['modulo'])){
    $modulo = htmlspecialchars($_POST['modulo']);

    $mensaje = "<p>Seleccionaste la opcion<b style='color: green;'> $modulo</b></p>";
}else{
    $mensaje = "<p style='color: red;'>Debes seleccionar UNA opcion</p>";
}
echo "<h1>$mensaje</h1>";