<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Prueba</title>
</head>
<body>
    <?php 
    require_once 'ConexionBD.php';
    $conexion = new ConexionBD;
    echo $conexion->conectar();
    echo "<br>";
    echo ConexionBD::mysql;
    ?>
</body>
</html>