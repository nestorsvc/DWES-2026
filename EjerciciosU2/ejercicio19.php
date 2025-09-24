<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>
<body>
    <?php
    function contadora(){
        static $contador = 0;
        echo $contador++. "<br>";
    }
    contadora();
    contadora();
    contadora();
    contadora();
    ?>
</body>
</html>