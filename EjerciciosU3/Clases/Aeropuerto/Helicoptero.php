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
        $altitudMax = 100 * $this->getnRotor();
        if ($altitud < $altitudMax) {
            while ($this->getAltitud() < $altitud) {
                $altitudEntero = $this->getAltitud();
                $this->setAltitud($altitudEntero + 100);
                $resultado .= 'Altitud incrementada (+20m) altitud actual: ' . $this->getAltitud() . '<br>';
            }
            return $resultado;
        }
        $resultado = "Falta de altitud, o sobrepaso de la altitud maxima del avion";
        return $resultado;
    }

    public function mostrarInformacion() {
        return "Propietario: " .$this->getPropietario() . "Numero de rotores: " .$this->getnRotor();
    }
}
$h = new Helicoptero("helicoptero",5,1,"mario",2);
echo $h->volar(100);