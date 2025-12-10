<?php
require_once 'Aeropuerto.php';
require_once 'Avion.php';
require_once 'Helicoptero.php';
require_once 'ElementoVolador.php';
require_once 'Volador.php';

$aeropuerto = new Aeropuerto();

$a1 = new Avion("Oscar",2, 2, "Iberia","02-02-2002",9000);
$a2 = new Avion("Pedro",2, 2, "Iberia","01-11-2000",9000);
$a3 = new Avion("Paco",4, 4, "E-dreams","01-09-2022",9000);

$h1 = new Helicoptero("Angel",4,1,"Pablo",3);
$h2 = new Helicoptero("Rufian",6,2,"Juan",2);
$h3 = new Helicoptero("Quiles",2,2,"David",3);

$aeropuerto->insertar($a1);
$aeropuerto->insertar($a2);
$aeropuerto->insertar($a3);
$aeropuerto->insertar($h1);
$aeropuerto->insertar($h2);
$aeropuerto->insertar($h3);

echo $aeropuerto->buscar("Oscar");
echo "<br>";
echo $aeropuerto->buscar("Hitler");
echo "<br>";

echo $aeropuerto->listarCompania("Iberia");
echo "<br>";
echo $aeropuerto->listarCompania("casa");
echo "<br>";

echo $aeropuerto->rotores(3);
echo "<br>";

// $avion =  $aeropuerto->despegar("Oscar", 8000,200 );
// echo $avion->mostrarInformacion();
$helicoptero = $aeropuerto->despegar("Quiles",200, 200);
echo $helicoptero->mostrarInformacion();