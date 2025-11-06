<?php
namespace App\Models;

use App\Enums\EstadoPedido;
use Utils\Formatter as TextFormatter;

class Pedido{
    public int $id;
    public EstadoPedido $estado;

    public function __construct(int $id,) {
    $this->id = $id;
    $this->estado = EstadoPedido::Pendiente;
    }

    public function actualizarEstado(EstadoPedido $nuevoEstado){
        $this->estado = $nuevoEstado;
    }

    public function obtenerInfo(){
        $estado = $this->estado->descripcion();
        return TextFormatter::aMayusculas("PEDIDO ID: $this->id | ESTADO : $estado");
    }
}

