<?php
abstract class Cuenta
{

    private int $numero;
    private string $titular;
    private float $saldo;
    public function __construct($numero, $titular, $saldo)
    {
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function ingreso($cantidad)
    {
        $this->saldo += $cantidad;
    }
    public function reintegro($cantidad)
    {
        $this->saldo -= $cantidad;
    }

    public function esPreferencial($cantidad)
    {
        if ($this->saldo >= $cantidad) {
            return true;
        }
        return false;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function getTitular()
    {
        return $this->titular;
    }
    public function getSaldo()
    {
        return $this->saldo;
    }
    public function setSaldo($nuevoSaldo){
        $this->saldo = $nuevoSaldo;
    }
    public function mostrar()
    {
        $html =  "
        <p>Numero: " . $this->getNumero() . "</p>
        <p>Titular: " . $this->getTitular() . "</p>
        <p>Saldo: " . $this->getSaldo() . "</p>
                ";
        return $html;
    }
}
