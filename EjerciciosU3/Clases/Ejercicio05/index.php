<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <?php
    require_once 'Cuenta.php';
    require_once 'CuentaAhorro.php';
    require_once 'CuentaCorriente.php';

    $cuentaAhorro = new CuentaAhorro(1389812,"Juan Paco",20000,50,2);
    $cuentaCorriente = new CuentaCorriente(1237891,"Paco Paquez",90,80);

    echo $cuentaAhorro->mostrar();
    echo "<br>";
    echo $cuentaCorriente->mostrar();
    
    echo "<br>";
    
    
    echo $cuentaAhorro->aplicaInteres();
    echo $cuentaAhorro->mostrar();
    echo "<br>";
    echo $cuentaCorriente->reintegro(5);
    echo $cuentaCorriente->mostrar();
    ?>
</body>
</html>