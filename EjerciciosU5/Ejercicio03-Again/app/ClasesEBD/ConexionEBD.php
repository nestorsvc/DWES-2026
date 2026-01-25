<?php
namespace App\ClassesEBD;
require_once __DIR__ . '/../../vendor/autoload.php';
use PDO;
use PDOException;
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();


class ConexionEBD
{
   private static ?PDO $connection = null;

   final private function __construct() {}

    final public static function getConnection(){
        try{
            if(!self::$connection){
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                self::$connection = new PDO(
                    dsn: $_ENV['DB_DSN'],
                    username: $_ENV['DB_USERNAME'],
                    password: $_ENV['DB_PASSWORD'],
                    options:$opciones
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }catch(PDOException $e){
            echo match ($e->getCode()){
            1049 => 'Base de datos no encontrada',
            1045 => 'Acceso denegado',
            2002 => 'Conexión rechazada',
            default => 'Error desconocido',
            };
        }
        return self::$connection;
    }
    private function __clone(){}
}

$connection = ConexionEBD::getConnection();

