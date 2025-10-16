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

    $persona = new Persona("Persona",45);
    $alumno = new Alumno("Alumnos",32,'Lengua');
    $profesor = new Profesor("Profesor",21,"2B");

    if($alumno instanceof Persona){
        echo "El objeto $alumno pertenece al objeto Persona";
    } else{
        echo "No pertenece";
    }
    echo "<br>";
    echo "Clase del objeto persona". get_class($alumno);
    echo $profesor->__toString();
    echo "<br>";
    echo get_declared_classes();
    echo "<br>";
    echo $alumno->__toString();

    ?>
</body>
</html>