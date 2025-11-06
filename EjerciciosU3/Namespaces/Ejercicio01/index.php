<?php
use App\Enums\EstadoPedido;
use App\Models\Pedido;
use Utils\Formatter;


$pedido = new Pedido(101);
echo $pedido->obtenerInfo();

