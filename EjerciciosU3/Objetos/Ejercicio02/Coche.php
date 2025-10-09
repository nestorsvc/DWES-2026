<?php

class Coche{
    private string $matricula;
    private int $velocidad;

    public function __construct(string $matricula, int $velocidad){
        $this->matricula = $matricula;
        $this->velocidad = $velocidad;
    }

    public function acelera(int $incremento){
        if ($this->velocidad + $incremento > 120){
            echo '<br>La velocidad no puede ser superior a 120<br>';
        } else {
            return $this->velocidad+=$incremento;
        }
    }

    public function frena(int $decremento){
        if ($this->velocidad - $decremento < 0){
            echo '<br>La velocidad no puede ser inferior a 0<br>';
        } else{
            return $this->velocidad-=$decremento;
        }
    }

    public function __toString()
    {
        return "<br>Datos del Coche:<br>Matricula: " . $this->matricula . "<br>" . "Velocidad:" . $this->velocidad;
    }
}