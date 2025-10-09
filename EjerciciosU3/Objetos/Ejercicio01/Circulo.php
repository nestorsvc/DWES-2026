<?php
class Circulo{
    private int $radio;

    public function __construct(int $radio) {
        $this->radio = $radio;
    }

    public function setRadio(int $nuevoRadio){
        
        $this->radio = $nuevoRadio;
    }
    public function getRadio (){
        return $this->radio;
    }

    public function __set($name, $value){
        if($name == 'radio'){
            $this->radio = $value;
        }
    }
    public function __get($name){
        if($name == 'radio'){
            return $this->radio;
        }
        return null;
    }


}