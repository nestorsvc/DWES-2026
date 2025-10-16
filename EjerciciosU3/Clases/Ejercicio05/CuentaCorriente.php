<?php
class CuentaCorriente extends Cuenta{
    private int $cuota_mantenimiento;

    public function __construct($numero, $titular, $saldo, $cuota_mantenimiento){
        parent::__construct($numero, $titular, $saldo - $cuota_mantenimiento);
        $this->cuota_mantenimiento = $cuota_mantenimiento;
    }

    public function reintegro($cantidad){
        if ($this->getSaldo() < 20){
            return false;
        }
        return true;
    }

    public function getCuota(){
        return $this->cuota_mantenimiento;
    }
    public function mostrar(){
       return "<h1>Cuenta Corriente</h1><hr>". parent::mostrar() . "<p>Cuota Mantenimiento:".$this->getCuota()."€</p>";
    }
}