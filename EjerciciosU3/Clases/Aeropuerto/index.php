<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'Avion.php';
    require_once 'Helicoptero.php';
    require_once 'ElementoVolador.php';
    require_once 'Volador.php';
    require_once 'Aeropuerto.php';

    $elementosVoladores = [];
    
    
    $avion1 = new Avion("avion1",2,4,"Flying","4-09-2020",2000.00);
    $avion2 = new Avion("avion2",4,3,"Flying","1-16-2024",5000.00);
    $avion3 = new Avion("avion3",5,6,"EDreams","2-01-2021",6000.00);
    
    $helicoptero1 = new Helicoptero("helicoptero1",4,1,"Ramon",2);
    $helicoptero2 = new Helicoptero("helicoptero2",2,1,"David",4);
    $helicoptero3 = new Helicoptero("helicoptero3",6,1,"Pedro",1);
    array_push($elementosVoladores,$avion1,$avion2,$avion3,$helicoptero1,$helicoptero2,$helicoptero3);

    $aeropuerto = new Aeropuerto($elementosVoladores);
    
    //Probamos metodo buscar
    // echo $aeropuerto->buscar("avion1");

    //Probamos listar compañia
    // echo $aeropuerto->listarCompania("EDreams");

    //Probamos el metodo numero rotores
    // echo $aeropuerto->rotores(4);

    //Probamos el metodo despegar
    echo $aeropuerto->despegar("avion1",1000.00,160);
    

    ?>
</body>
</html>