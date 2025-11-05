<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>
<body>
    <?php 
    //* Primero las definimos fuera de la funcion, luego las usamos dentro llamandolas con global
    $a = 1;
    $b = 2;
    function sumar(){
        global $a, $b;
        $c = $a + $b;
        echo $c;
    }
    sumar();
    ?>
</body>
</html>