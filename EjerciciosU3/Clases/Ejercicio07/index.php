<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 06</title>
</head>
<body>
    <?php
    require_once 'Alimentacion.php';
    require_once 'Productos.php';
    require_once 'Electronica.php';

    $productos[] = new Electronica("E14124",23.32,"Secador",1);
    $productos[] = new Electronica("E29292",220.10,"Lavaplatos",5);
    $productos[] = new Electronica("E41290",19.99,"Batidora",1);
    $productos[] = new Alimentacion("A88922",3.99,"Frutos Secos",1,2025);
    $productos[] = new Alimentacion("A98321",1.99,"Peras",5,2026);
    $productos[] = new Alimentacion("A93103",2.99,"Barritas",10,2027);

    $totalElectronica = 0; 
    $totalAlimentacion = 0;

    ?>
    <h1>Cesta de la compra</h1>
    <?php foreach ($productos as $producto):?>
        <?php echo $producto->mostrar(); ?>
        <hr>
        <?php endforeach; ?>
    <h2>Importe total de la cesta de la compra</h2>
    
    <?php foreach ($productos as $producto): ?>
        <?php if($producto instanceof Electronica):?>
        <?php $totalElectronica+= $producto->getPrecio();?>
        <?php else:?>
            <?php $totalAlimentacion+=$producto->getPrecio();?>
        <?php endif; ?>
        <?php endforeach; ?>
        <h3><?php echo $totalAlimentacion+$totalElectronica?>€</h3>
        <h3>Se ha gastado más en<?php echo ($totalAlimentacion > $totalElectronica ?  ' Alimentacion' : ' Electronica') ?></h3>

</body>
</html>