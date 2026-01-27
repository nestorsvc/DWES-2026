<?php 
use Again\Clases\Autenticarse;

require_once __DIR__ . '/../vendor/autoload.php';

$usuario = $_POST['usuario'] ?? "";
$password = $_POST['password'] ?? "";

Autenticarse::inicializar();
Autenticarse::configurar();
Autenticarse::runAccion();

