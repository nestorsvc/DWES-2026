<?php
require_once "ElementoVolador.php";
class Helicoptero extends ElementoVolador
{
    private string $propietario;
    private int $nRotor;

    public function __construct(string $nombre, int $numAlas, int $numMotores, string $propietario, int $nRotor)
    {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;
    }

    public function getPropietario()
    {
        return $this->propietario;
    }
    public function getnRotor()
    {
        return $this->nRotor;
    }

    public function volar(float $altitud)
    {
        $resultado = '';
        $altitudMax = 100 * $this->nRotor;
        if ($altitud > $altitudMax) {
            return "Altitud demasiada alta para este helicóptero<br>";
        }

        while ($this->getAltitud() < $altitud) {
            $this->setAltitud($this->getAltitud() + 20);
            $resultado .= 'Altitud incrementada (+20m) altitud actual: ' . $this->getAltitud() . '<br>';
        }
        return $resultado . "Altitud objetivo alcanzada<br>";
    }

   public function mostrarInformacion(){
        return "Helicóptero → Nombre: ".$this->getNombre() .
               ", Propietario: " . $this->propietario .
               ", Nº Rotores: " . $this->nRotor .
               ", Altitud actual: " . $this->getAltitud() . " m" .
               ", Velocidad: " . $this->getVelocidad() . " km/h<br>";
    }
}
