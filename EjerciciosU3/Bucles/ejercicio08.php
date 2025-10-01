<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 08</title>
</head>

<body>
    <?php
    $productos = [
        "Manzana" => 5,
        "Plátano" => 3,
        "Naranja" => 4,
    ];
    $compra = [
        "Manzana" => 2,
        "Plátano" => 1.5,
        "Naranja" => 5
    ];
    $total = 0;
        foreach($compra as $nombre => $cantidad){
            $precio = $productos[$nombre];
            $precioFinal = $precio * $cantidad;
            echo "El precio de $nombre es: $precioFinal <br>";
        }
    ?>
</body>

</html>