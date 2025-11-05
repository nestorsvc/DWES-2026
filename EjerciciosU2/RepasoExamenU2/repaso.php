<?php
$fecha = date("d-m-y");
$hora = date("H:i:s");
date_default_timezone_set('UTC');
// echo $hora;

// Get date devuelve un array con todos los datos del día que se le pase

$hoy = getdate();
// var_dump($hoy);
echo $hoy["weekday"];
echo "<br>";
echo $hoy["wday"];
echo $hoy["month"];
echo $hoy["mon"];
echo "<br>";
echo $hoy["yday"];
echo "<br>";

$ayer = strtotime("tomorrow");
$ayerDate = getdate($ayer);

echo $ayerDate["weekday"];
echo $ayerDate["hours"];
echo "<br>";
echo $ayerDate["wday"];
echo $ayerDate["month"];
echo $ayerDate["mon"];
echo "<br>";
echo $ayerDate["yday"];
echo "<br>";
