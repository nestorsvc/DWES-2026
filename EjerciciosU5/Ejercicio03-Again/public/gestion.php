<?php
session_start();
use function App\FuncionesEBD\actualizarPreciosEBD;
use function App\FuncionesEBD\obtenerNumeroReservasPrecio;

require_once '../app/FuncionesEBD/funcionesEBD.php';
$datos = obtenerNumeroReservasPrecio();

if(isset($_POST['btnActualizar'])){
    $precios = $_POST['precios'];
    actualizarPreciosEBD($precios);
}

if (!isset($_SESSION['usuario'])){
    echo "No tienes acceso a esta pagina";
    header("Refresh: 3; url=index.php");
}else{
    $usuario = $_SESSION['usuario'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion</title>
</head>
<body>
    <p>Hola <?= $usuario['usuario'] ?>!</p>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <table border="1">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Reservada</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato):?>
                <tr>
                    <td><?= $dato['numero'] ?></td>
                    <td><?= $dato['reservada'] ? 'Si' : 'No' ?></td>
                    <td><input type="number" name="precios[<?= $dato['numero'] ?>]" value="<?= $dato['precio'] ?>" step="any"></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <button type="submit" name="btnActualizar">Actualizar</button>
    </form>
</body>
</html>