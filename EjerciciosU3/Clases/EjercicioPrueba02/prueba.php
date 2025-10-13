<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Herencia</title>
</head>
<body>
    <?php
    require_once 'Persona.php';
    require_once 'Alumno.php';
    require_once 'Profesor.php';

    $persona = new Persona("Paco",45);
    $alumno = new Alumno("Saul",32,'Lengua');
    $profesor = new Profesor("Reve",21,"2B");

    echo $profesor->__toString();
    echo "<br>";
    echo $alumno->__toString();

    ?>
</body>
</html>