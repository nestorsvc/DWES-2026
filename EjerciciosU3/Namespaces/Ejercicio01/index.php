<?php
require_once 'App/Models/Pedido.php';
require_once 'App/Enums/EstadoPedido.php';
require_once 'Utils/Formatter.php';
use App\Models\Pedido;
use App\Enums\EstadoPedido;
use Utils\Formatter;

$pedido = new Pedido(101);
echo $pedido->obtenerInfo();
$estadoPedido = EstadoPedido::Entregado;
var_dump($estadoPedido->value);
echo $pedido->actualizarEstado($estadoPedido->value);
echo $pedido->obtenerInfo();




