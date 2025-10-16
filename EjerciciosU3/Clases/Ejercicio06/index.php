<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 06</title>
</head>

<body>
    <?php
    require_once 'Medico.php';
    require_once 'Familia.php';
    require_once 'Urgencia.php';

    $arrayObjetos = [];

    $medicoFamilia1 = new Familia("Pablo", 45, "tarde", 90);
    $medicoFamilia2 = new Familia("Juan", 31, "tarde", 14);
    $medicoFamilia3 = new Familia("Luis", 55, "mañana", 67);

    $medicoUrgencia1 = new Urgencia("Alberto", 45, "tarde", "Traumatologia");
    $medicoUrgencia2 = new Urgencia("Manolo", 45, "mañana", "Oncologia");
    $medicoUrgencia3 = new Urgencia("Carlos", 70, 'tarde', "Pediatria");
    array_push($arrayObjetos, $medicoFamilia1, $medicoFamilia2, $medicoFamilia3, $medicoUrgencia1, $medicoUrgencia2, $medicoUrgencia3);


    ?>
    <?php foreach ($arrayObjetos as $medico): ?>
        <?php if ($medico instanceof Familia): ?>
            <h3>Medicos de Familia</h3>
            <p><?php echo $medico . "<br>" ?></p>
        <?php endif; ?>
        <?php if ($medico instanceof Urgencia): ?>
            <h3>Medicos de Urgencia</h3>
            <p><?php echo $medico . "<br>" ?></p>
        <?php endif; ?>
    <?php endforeach; ?>

    <h2>Medicos > de 60 años, turno tarde y urgencias</h2>
    <?php foreach ($arrayObjetos as $medico): ?>
        <?php if ($medico instanceof Urgencia && $medico->getTurno() == 'tarde' && $medico->getEdad() > 60): ?>
            <p><?php echo $medico . "<br>" ?></p>
        <?php endif; ?>
    <?php endforeach; ?>

</body>

</html>