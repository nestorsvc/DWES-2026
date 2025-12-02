<?php

use App\Enums\EstadoPedido;
use App\Models\Pedido;

require_once './App/Enums/EstadoPedido.php';
require_once './App/Models/Pedido.php';
require_once './Utils/Formatter.php';

$pedido = new Pedido(56);

echo $pedido->obtenerInfo();
echo "<br>";
echo $pedido->actualizarEstado(EstadoPedido::Enviado);
echo "<br>";


echo "<hr>";
echo $pedido->obtenerInfo();
echo "<br>";
echo $pedido->actualizarEstado(EstadoPedido::Entregado);
echo "<br>";
echo "<hr>";
echo $pedido->obtenerInfo();
