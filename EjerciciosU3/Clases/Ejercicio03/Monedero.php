<?php
class Monedero{

    private int $dinero;
    public static int $numeroMonederos = 0;

    public function __construct($dinero){
        $this->dinero = $dinero;
        self::$numeroMonederos++;
    }

    public function sacarDinero(int $cantidad){
        if($this->dinero < 0){
            echo "Sin saldo";
        } else if($cantidad > $this->dinero) {
            echo "Saldo insuficiente (no cuenta con ". $cantidad . "€ para poder sacar)";
        } else{
            $this->dinero-=$cantidad;
        }
    }

    public function meterDinero(int $cantidad){
        if ($cantidad > 5000){
            echo "<br>No se puede ingresar más de 5000€ en una sola operación<br>";
        } else{
            $this->dinero+= $cantidad;
        }
    }

    public function __toString()
    {
        return "<br>Numero de monedero:" . self::$numeroMonederos . "<br>Saldo:" . $this->dinero ."€<br>";
    }
}

?>