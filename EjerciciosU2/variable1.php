<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1 = 1;
    $num2 = 2;
    $num3 = 3;

    $txt = "<h1>Informacion sobre las variables...</h1><br><h2>Procedemos con la información...<br>Variable 1: Valor->$num1, Variable 2: Valor-> {$num2}, Variable 3: Valor-> {$num3}</h2>";
    echo ($txt);
    ?>
</body>
</html>