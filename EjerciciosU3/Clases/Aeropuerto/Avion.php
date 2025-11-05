<?php

use LDAP\Result;

require_once "ElementoVolador.php";
class Avion extends ElementoVolador
{

    private string $companiaAerea;

    private string $fechaAlta;
    private float $altitudMaxima;

    public function __construct(string $nombre, int $numAlas, int $numMotores, string $companiaAerea, string $fechaAlta, float $altitudMaxima)
    {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = $companiaAerea;
        $this->fechaAlta = $fechaAlta;
        $this->altitudMaxima = $altitudMaxima;
    }

    public function getCompania()
    {
        return $this->companiaAerea;
    }
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }
    public function getAltitudMaxima()
    {
        return $this->altitudMaxima;
    }
    public function volar(float $altitud)
    {
        $resultado = '';
        if ($altitud < 0 || $altitud > $this->altitudMaxima) {
            return "Altitud incorrecta<br>";
        }
        if ($this->getVelocidad() < 150) {
            return "La velocidad debe ser superior a 150 km/h<br>";
        }

        while ($this->getAltitud() < $altitud) {
            $this->setAltitud($this->getAltitud() + 100);
            $resultado .= 'Altitud incrementada (+100m) altitud actual: ' . $this->getAltitud() . '<br>';
        }
         return $resultado . "Altitud objetivo alcanzada<br>";

    }

    public function mostrarInformacion()
    {
        return "Avión → Nombre: " . $this->getNombre() .
            ", Compañía: " . $this->getCompania() .
            ", Fecha Alta: " . $this->getFechaAlta() .
            ", Altitud actual: " . $this->getAltitud() . " m" .
            ", Velocidad: " . $this->getVelocidad() . " km/h<br>";
    }
}
