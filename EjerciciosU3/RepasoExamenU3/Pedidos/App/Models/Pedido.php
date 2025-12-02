<?php
namespace App\Models;

use App\Enums\EstadoPedido;
use Utils\Formatter as TextFormatter;
class Pedido{

    public int $id;
    public EstadoPedido $estadoPedido;

    public function __construct(int $id) {
        $this->id = $id;
        $this->estadoPedido = EstadoPedido::Pendiente;
    }

    public function actualizarEstado(EstadoPedido $nuevoEstado){
        if($nuevoEstado instanceof EstadoPedido){
            $this->estadoPedido = $nuevoEstado;
            return 'Estado cambiado con éxito';
        }
        return "Algo fue mal";
    }

    public function obtenerInfo(){
        return TextFormatter::aMayusculas('pedido id: '.$this->id.' |estado: '.$this->estadoPedido->descripcion());
    }


}