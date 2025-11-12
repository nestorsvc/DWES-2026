<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="number" name="num1">
        <input type="number" name="num2">
        <button type="submit" id="btnCalcular">Calcular</button>
    </form>
</body>
</html>
<?php

if (isset($_POST['num1'], $_POST['num2']) && !empty($_POST['num1'] && !empty($_POST['num2']))) {
    $num1 = htmlspecialchars($_POST['num1']);
    $num2 = htmlspecialchars($_POST['num2']); 
    $total = $num1 + $num2;
    $mensaje = "<p style='color : green;'>El resultado es $total</p>";
}else{
    $total = 0;
    $mensaje = "<p style='color : red;'>Introduce los dos numeros por favor\nResultado = $total</p>";
}

echo "<pre>$mensaje</pre>";