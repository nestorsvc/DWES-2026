<?php

namespace Again\Clases;

use Again\Clases\ConexionBD;
use PDOException;
use PDO;

require_once __DIR__ . '/../Funciones/helper.php';
class Autenticarse
{

    public static function inicializar()
    {
        iniciar_sesion();
    }

    public static function configurar()
    {

        $pdo = ConexionBD::getConnection();

        try {
            $pdo->query("CREATE TABLE IF NOT EXISTS usuarios (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(190) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            // Autenticarse::CrearDatosUsuario("nestor@gmail.com", "password");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private static function CrearDatosUsuario($usuario, $password)
    {
        $pdo = ConexionBD::getConnection();
        try {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (user,password ) VALUES (?, ?)");
            $stmt->execute([$usuario, $hash]);

            // if($stmt->columnCount() !== 0){
            //     return true;
            // }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function autenticar()
    {
        if (!esPost()) {
            flash("error", "Método HTTP no permitido");
            redireccionar("index.php?accion=paginaLogin");
            return;
        }

        if (estaLogueado()) {
            redireccionar("index.php?accion=paginaConectado");
            return;
        }

        $usuarioPOST = $_POST['usuario'] ?? "";
        $password = $_POST['password'] ?? "";

        $pdo = ConexionBD::getConnection();
        try {
            $stmt = $pdo->prepare("SELECT id, user, password FROM usuarios WHERE user = ?");
            $stmt->execute([$usuarioPOST]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$usuario) {
                flash("error", "El usuario no se encuentra en la base de datos");
                $_SESSION['email'] = $usuarioPOST;;
                redireccionar("index.php?accion=paginaLogin");
                return;
            }

            if (!password_verify($password, $usuario['password'])) {
                flash("error", "Credenciales incorrectas");
                $_SESSION['email'] = $_POST['usuario'];
                redireccionar("index.php?accion=paginaLogin");
                return;
            }

            $_SESSION['usuario'] = $usuario;
            redireccionar("index.php?accion=paginaConectado");
            return;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function paginaConectado()
    {
        if (!estaLogueado()) {
            flash("error", "No tienes acceso a esta página");
            redireccionar("index.php?accion=paginaLogin");
            return;
        }
        require __DIR__ . "/../../public/PaginaConectado.php";
    }

    public static function desconectarse()
    {
        unset($_SESSION['usuario']);
        session_destroy();
        redireccionar("index.php?accion=paginaLogin");
    }

    public static function paginaLogin()
    {
        if (estaLogueado()) {
            redireccionar("index.php?accion=paginaConectado");
            return;
        }
        require __DIR__ . '/../../public/PaginaLogin.php';
    }

    public static function runAccion()
    {
        $accion = $_GET['accion'] ?? "paginaLogin";

        switch ($accion) {
            case "paginaLogin":
                Autenticarse::paginaLogin();
                break;
            case "paginaConectado":
                Autenticarse::paginaConectado();
                break;
            case "autenticar":
                Autenticarse::autenticar();
                break;
            case "desconectarse":
                Autenticarse::desconectarse();
                break;
        }
    }
}
