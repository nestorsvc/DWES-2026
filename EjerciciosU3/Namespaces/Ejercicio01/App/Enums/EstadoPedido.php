<?php
namespace App\Enums;
enum EstadoPedido
{
    case Pendiente;
    case Enviado;
    case Entregado;
    case Cancelado;

    public function descripcion():string
    {
       return match ($this) {
            self::Pendiente => 'El pedido está pendiente de ser procesado.<br>',
            self::Enviado => 'El pedido ha sido enviado.<br>',
            self::Entregado => 'El pedido ha sido entregado al cliente.<br>',
            self::Cancelado => 'El pedido ha sido cancelado.<br>',
        };
    }
}
