<?php

// Namespace correspodiente para poder trabajar facilmente con esta clase
namespace App\Enums;

// Declaramos el enum normal, con los cases
enum EstadoPedido{
    case Pendiente;
    case Enviado;
    case Entregado;
    case Cancelado;

    // Funcion que usaremos para conocer el estado del envío
    public function descripcion():string{

        // Para asignarle un valor a cada case, con un match ($this) apuntamos al enum correspondiente
        return match($this){
            EstadoPedido::Pendiente => "El pedido está pendiente de envío",
            EstadoPedido::Cancelado => "El pedido ha sido cancelado",
            EstadoPedido::Entregado => "El pedido ha sido entregado",
            EstadoPedido::Enviado => "El pedido ha sido enviado"
        };
    }
}
