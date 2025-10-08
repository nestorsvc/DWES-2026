<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
</head>

<body>
    <?php
    require_once 'funcionCalcularDni.php';
    $resultado = calcularLetraDNI(72222290);
    echo $resultado == false ? 'El DNI no es valido' : "La letra del dni es: ". $resultado;
    
    

    ?>
</body>

</html>