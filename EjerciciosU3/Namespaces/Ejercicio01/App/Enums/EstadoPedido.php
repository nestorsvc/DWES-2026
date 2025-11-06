<?php
namespace App\Enums;
enum EstadoPedido
{
    case Pendiente;
    case Enviado;
    case Entregado;
    case Cancelado;

    public function descripcion(): string
    {
        match ($this) {
            self::Pendiente => 'El pedido está pendiente de ser procesado.',
            self::Enviado => 'El pedido ha sido enviado.',
            self::Entregado => 'El pedido ha sido entregado al cliente.',
            self::Cancelado => 'El pedido ha sido cancelado.',
        };
    }
}
