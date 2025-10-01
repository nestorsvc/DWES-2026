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
        "Kiwi" => 6
    ];

    foreach ($productos as $nombre => $precio){
        if ($nombre == 'Manzana'){
            echo "El precio de la manzana es: " . $precio * 2 . "<br>";
        } else if($nombre == 'Plátano'){
            echo "El precio de los plátanos es: " . $precio * 1.5 . "<br>";
        } else if($nombre == 'Naranja'){
            echo "El precio de las naranjas es: " . $precio * 5;
        }
    }
    ?>
</body>

</html>