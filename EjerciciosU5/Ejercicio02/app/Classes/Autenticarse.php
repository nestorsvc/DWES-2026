<?php

namespace App\Classes;


use App\Classes\ConnectionBD;
use PDO;
use PDOException;

class Autenticarse
{

    public static function inicializar()
    {
        iniciar_sesion();
    }

    public static function configurar()
    {
        $pdo = ConnectionBD::getConnection();

        try {
            $pdo->query("CREATE TABLE IF NOT EXISTS usuarios (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user VARCHAR(190) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            // Solo insertar si no existe el usuario
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE user = ?");
            $stmt->execute(["educantabria@exammple.com"]);
            $usuario = $stmt->fetch();

            if (!$usuario) {
                Autenticarse::crearDatosUsuario("educantabria@exammple.com", "password");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function crearDatosUsuario($email, $pass)
    {
        $pdo = ConnectionBD::getConnection();
        try {
            $hash = password_hash($pass, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (user, password) VALUES (?, ?)");
            $stmt->execute([$email, $hash]);
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

        // Aquí solo verificas que exista el email
        $email = $_POST['email'] ?? "";

        $pdo = ConnectionBD::getConnection();
        $stmt = $pdo->prepare("SELECT user FROM usuarios WHERE user = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            flash("error", "El email introducido no existe en la BD");
            redireccionar("index.php?accion=paginaLogin");
            return;
        }

        // Si existe el email, validamos contraseña con login()
        Autenticarse::login();
    }

    public static function login()
    {

        if (estaLogueado()) {
            redireccionar("index.php?accion=paginaConectado");
            exit;
        }

        $email = $_POST['email'] ?? "";
        $pass = $_POST['password'] ?? "";

        $pdo = ConnectionBD::getConnection();

        $stmt = $pdo->prepare("SELECT user, password FROM usuarios WHERE user = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && (password_verify($pass, $usuario['password']))) {
            $_SESSION['usuario'] = $usuario['user'];
            redireccionar("index.php?accion=paginaConectado");
            exit;
        } else {
            $_SESSION['email'] = $email;
            flash("error", "Email o contraseña incorrectas");
            redireccionar("index.php?accion=paginaLogin");
            exit;
        }
    }

    public static function paginaConectado()
    {
        if (!estaLogueado()) {
            flash("error", "No tienes acceso para ver esta página");
            redireccionar("index.php?accion=paginaLogin");
            exit;
        }

        require_once __DIR__ . "/../../public/PaginaConectado.php";
    }

    public static function desconectarse()
    {
        session_unset();
        session_destroy();
        redireccionar("index.php?accion=paginaLogin");
        exit;
    }

    public static function paginaLogin()
    {
        if (estaLogueado()) {
            redireccionar("index.php?accion=paginaConectado");
            exit;
        }

        require_once __DIR__ . "/../../public/PaginaLogin.php";
    }

    public static function runAccion()
    {
        $accion = $_GET['accion'] ?? "paginaLogin";

        switch ($accion) {
            case "paginaLogin":
                Autenticarse::paginaLogin();
                break;
            case "autenticar":
                Autenticarse::autenticar();
                break;
            case "paginaConectado":
                Autenticarse::paginaConectado();
                break;
            case "desconectarse":
                Autenticarse::desconectarse();
                break;
        }
    }
}
