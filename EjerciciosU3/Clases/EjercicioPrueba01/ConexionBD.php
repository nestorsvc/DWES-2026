<?php

class ConexionBD{
    const mysql = 'mysql';
    const host = 'localhost';
    const port = 3306;
    const dbname = 'db';
    const user = 'manu';
    const pass = 'unam';
    public function conectar(){
        return "Mysql: ". self::mysql . "Host: " . self::host . "Puerto: " . self::port . "Nombre base dato: " .self::dbname;
    }
}