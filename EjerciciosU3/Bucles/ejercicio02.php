<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
    <?php 
    $dia = date('d');
    $mes = date('m');
    $anio = date('y');
    for ($i = 1; $i <= $dia; $i++){
        echo "$i/$mes/$anio<br>";
    }
    ?>
</body>
</html>