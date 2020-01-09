<?php


/* Obtengo la fecha, con el modify añado 3 minutos a la fecha, despues se obtiene la diferencia entre la fecha actual y la que tiene 3 minutos mas
y se inicia un heeader refres de los segundos correspondientes*/

print_r("Lo ha intentado demasiadas veces, en dos minutos podra intentarlo de nuevo");

$datetime1 = new DateTime();
$datetime1->modify('+3 minute');
$datetime2 = new DateTime();
$interval = $datetime2->diff($datetime1);
$tiempo=$interval->format('%i');
function tiempoDeBloqueo($tiempo){
    settype($tiempo,"integer");
    $segundos=($tiempo*60);
    print_r($segundos);
    header("Refresh:".$segundos."; url=login.php");
}
tiempoDeBloqueo($tiempo);


?>