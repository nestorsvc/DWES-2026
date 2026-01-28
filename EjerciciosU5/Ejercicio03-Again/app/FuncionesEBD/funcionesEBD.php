<?php

namespace App\FuncionesEBD;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\ClasesEBD\ConexionEBD;
use Error;
use Exception;
use PDOException;
use PDO;

function llegadaEBD()
{

    $pdo = ConexionEBD::getConnection();

    try {
        $pdo->beginTransaction();
        $pdo->exec("DELETE FROM pasajeros");
        $pdo->exec("UPDATE plazas SET reservada = 0");
        $pdo->commit();
        return "BD Actualizada correctamente";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

function obtenerNumeroPrecioPlaza()
{
    $pdo = ConexionEBD::getConnection();

    $stmt = $pdo->query("SELECT precio, numero FROM plazas WHERE reservada = 0");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}

function reservarEBD($nombre, $dni, $numero)
{
    try {
        $pdo = ConexionEBD::getConnection();

        $stmt = $pdo->prepare("CALL sp_reservar (:dni, :nombre, :numero)");
        $stmt->execute([":dni" => $dni, ":nombre" => $nombre, ":numero" => $numero]);
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), "DNI ya existe")) {
            return "Error: El dni YA existe";
        } else {
            return "Error: " . $e->getMessage();
        }
    }
}

function obtenerNumeroReservasPrecio()
{
    $pdo = ConexionEBD::getConnection();

    $stmt = $pdo->query("SELECT numero, reservada, precio FROM plazas");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}

function actualizarPreciosEBD($precios)
{
    try {
        $pdo = ConexionEBD::getConnection();

        foreach ($precios as $numero => $precio) {

            $stmt = $pdo->prepare("UPDATE plazas SET precio = ? WHERE numero = ?");
            $stmt->execute([$precio, $numero]);
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function registrarUsuario($usuario, $password, $password2)
{

    $pdo = ConexionEBD::getConnection();

    try {
        if ($password !== $password2) {
            throw new Exception("Las contraseñas deben ser iguales");
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        $stmt->execute([$usuario, $hash]);

        if ($stmt->rowCount() !== 0) {
            echo "Usuario registrado correctamente";
        } else {
            echo "No se pudo registrar el usuario";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
function loginUsuario($usuario, $password){

    $pdo = ConexionEBD::getConnection();

    try{
        $stmt = $pdo->prepare("SELECT id, usuario, password FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$usuario){
            throw new Exception("Usuario no encontrado");
        }
        
        if(!password_verify($password, $usuario['password'])){
            throw new Exception("Contraseña incorrecta");
        }
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: ../public/index.php");
        exit;
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    } catch(Exception $e){
        echo "Errror: " . $e->getMessage();
    }

}

function logout(){
    // Asegurarse de que la sesión esté activa
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    
    unset($_SESSION['usuario']);
    session_destroy();
    header("Location: index.php");
    exit;
}
