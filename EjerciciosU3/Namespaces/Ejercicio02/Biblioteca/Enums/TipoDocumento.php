<?php
namespace Biblioteca\Enums;

enum TipoDocumento:string{
    case Libro = "book";
    case Revista = "magazine";
    case Tesis = "thesis";


    public function nivelAcceso():string{
        return match($this){
            self::Libro => 'Acceso general',
            self::Revista => 'Acceso general',
            self::Tesis => 'Acceso restringido' 
        };
    }
}