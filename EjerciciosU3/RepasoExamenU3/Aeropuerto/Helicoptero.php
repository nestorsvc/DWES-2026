<?php
class Helicoptero extends ElementoVolador
{


    private string $propietario;
    private int $nRotor;

    public function __construct(string $nombre, int $numAlas, $numRotores, string $propietario, int $nRotor)
    {
        parent::__construct($nombre, $numAlas, $numRotores);
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;
    }

    public function getPropietario()
    {
        return $this->propietario;
    }

    public function getNRotor()
    {
        return $this->nRotor;
    }

    public function setNRotor(int $nuevoNRotor)
    {
        $this->nRotor = $nuevoNRotor;
        return $this->nRotor;
    }

    public function volar(int $altitud)
    {
        $altitudMaxima = $this->nRotor * 100;

        if ($altitud > $altitudMaxima) {
            return "La altura no puede ser superior a $altitudMaxima";
        }
        
        echo "Empieza el despegue...";
        while ($altitud > $this->getAltitud()) {
            $this->setAltitud($this->getAltitud() + 20);
            echo "Subiendo... Altitud actual: {$this->getAltitud()} metros<br>";
        }
        echo "Altura máxima alcanzada";
    }

    public function mostrarInformacion(): string
    {
        return "Datos del ".$this->getNombre()."|Propietario:".$this->propietario."|Numero de rotores:".$this->nRotor."<br>";
    }
}
