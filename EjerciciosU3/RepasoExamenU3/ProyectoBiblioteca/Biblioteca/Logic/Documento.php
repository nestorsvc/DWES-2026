<?php

namespace ProyectoBiblioteca\Biblioteca\Logica;

use ProyectoBiblioteca\Biblioteca\Enums\TipoDocumento;
use ProyectoBiblioteca\Almacenamiento\BaseDatos as GestorBD;

class Docuemnto
{
    private string $titulo;
    private TipoDocumento $tipoDocumento;


    public function __construct(string $titulo, TipoDocumento $tipoDocumento)
    {
        $this->titulo = $titulo;
        $this->tipoDocumento = $tipoDocumento;
    }

    public function guardar()
    {
        GestorBD::guardar('documentos', [
            'titulo' => $this->titulo,
            "tipo_documento" => $this->tipoDocumento->value
        ]);
    }

    public function obtenerInfoDetallada(): string
    {
        return sprintf('%s (%s) - %s', $this->titulo, $this->tipoDocumento->value, $this->tipoDocumento->nivelAcceso());
    }
}
