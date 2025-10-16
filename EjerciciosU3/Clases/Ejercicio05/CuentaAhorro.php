<?php

class CuentaAhorro extends Cuenta
{

    private int $comision_apertura;
    private int $intereses;

    public function __construct($numero, $titular, $saldo, $comision_apertura, $intereses)
    {
        parent::__construct($numero, $titular, $saldo - $comision_apertura);
        $this->comision_apertura = $comision_apertura;
        $this->intereses = $intereses;
    }

    public function aplicaInteres()
    {
        $intereses = $this->getSaldo() * ($this->intereses / 100);
        $this->setSaldo($this->getSaldo() + $intereses);
    }
    public function getComision()
    {
        return $this->comision_apertura;
    }
    public function getInteres()
    {
        return $this->intereses;
    }
    public function mostrar()
    {
        return "<h1>Cuenta Ahorro</h1><hr>" . parent::mostrar() . "<p>Comision: " . $this->getComision() . "€</p>"  . "<p>Intereses: " . $this->getInteres() . " %</p>";
    }
}
