<?php
class Avion extends ElementoVolador
{
    private string $companiaAerea;
    private string $fechaAlta;
    private int $altitudMaxima;

    public function __construct(string $nombre, int $numAlas, int $numMotores, string $companiaAerea, string $fechaAlta, int $altitudMaxima) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = $companiaAerea;
        $this->fechaAlta = $fechaAlta;
        $this->altitudMaxima = $altitudMaxima;
    }

    public function getCompaniaAerea(){
        return $this->companiaAerea;
    }

    public function getFechaAlta(){
        return $this->fechaAlta;
    }

    public function getAltitudMaxima(){
        return $this->altitudMaxima;
    }

    public function volar(int $altitud)
    {
        if($altitud < 0){
            return "la altitud no puede ser menor que 0";
        } else if($altitud > $this->altitudMaxima){
            return "la altitud no puede ser mayor que la máxima del avión";
        }
        if($this->getVelocidad() >= 150){
            while($altitud > $this->getAltitud()){
                echo "Subiendo... Altitud actual: {$this->getAltitud()} metros<br>";
                $this->setAltitud($this->getAltitud()+ 100);
            }

            echo "Altitud alcanzada";
        }
    }
    public function mostrarInformacion(): string
    {
        return "Datos del " . $this->getNombre() . "|Compañia aerea: ".$this->companiaAerea."|Fecha alta: ".$this->fechaAlta."Altitud Máxima: ".$this->altitudMaxima."<br>";
    }
}
