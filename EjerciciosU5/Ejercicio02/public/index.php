<?php
require_once __DIR__ . '/../app/Functions/helper.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Classes\Autenticarse;

iniciar_sesion();

Autenticarse::inicializar();
Autenticarse::configurar();
Autenticarse::runAccion();
