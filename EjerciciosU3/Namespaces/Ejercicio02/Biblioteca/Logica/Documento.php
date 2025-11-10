<?php

namespace Biblioteca\Logica;

use Biblioteca\Enums\TipoDocumento;
use Almacentamiento\BaseDatos as GestorBD;

class Documento
{
    private string $titulo;
    private TipoDocumento $tipo;


    public function __construct(string $titulo, TipoDocumento $tipo)
    {
        $this->titulo = $titulo;
        $this->tipo = $tipo;
    }

    public function guardar()
    {
        GestorBD::guardar($this->titulo, $this->tipo->value);
    }

    public function obtenerInfoDetallada():string{
        return "$this->titulo " ."(". $this->tipo->name.")" . " - " . $this->tipo->nivelAcceso()."<br>";
    }
}
