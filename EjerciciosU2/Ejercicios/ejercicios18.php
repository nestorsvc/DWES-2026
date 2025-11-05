<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 18</title>
</head>
<body>
    <?php
    //* Lo mismo pero usando el array global
    $a = 6;
    $b = 8;
    function sumar(){
        $GLOBALS['a'] +=  $GLOBALS['b'];
        echo $GLOBALS['a'];
    }
    sumar();
    ?>
</body>
</html>