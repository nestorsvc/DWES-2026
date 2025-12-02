<?php
namespace ProyectoBiblioteca\Biblioteca\Enums;

enum TipoDocumento: string{
    case Libro = 'libro';
    case Revista = 'magazine';
    case Tesis = 'tesis';

    public function nivelAcceso(){
        return match($this){
            TipoDocumento::Libro => 'Acceso General',
            TipoDocumento::Revista => 'Acceso General',
            TipoDocumento::Tesis => 'Acceso Restringido',
        };
    }
}

