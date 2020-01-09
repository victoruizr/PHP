<?php
/* // funcion date que devuelva

function Fecha(){
    print_r(date('m'.' d'.' Y '));
    print_r(date('H'.'i'.'s'.' '));
    print_r(date('W '));
}

function FechaHoy(){
    $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
  
    $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
        'Miercoles', 'Jueves', 'Viernes', 'Sabado');
      
     echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
}

$hoy = getdate();
print_r($hoy);

print_r(Fecha());
print_r(FechaHoy());
echo "Ayer en formato Unix es: " . mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
 */


/* $fecha=mktime(17, 30, 0, 4, 22, 2000);
echo strftime("%A, %d de %B de %Y", $fecha);
echo("<br><br>");
$fecha2=mktime(0, 0, 0, 8, 21, 2019);
echo strftime("%A, %d de %B de %Y", $fecha2);
echo("<br><br>");
echo(calcularDiasTimeStamp($fecha,$fecha2));
function calcularDiasTimeStamp($fecha1,$fecha2){
    $dias=$fecha2-$fecha1;
    $sol=(int)($dias/86400);
    return $sol;
} */

function diasCumple($fecha){
    $fechahoy =  date("Y-m-d");
    $resta = strtotime($fecha)-strtotime($fechahoy);
    $dias = $resta / (24*3600);
    return $dias;  
}
$fecha1 = "2020-04-22";
print_r("Quedan ".diasCumple($fecha1)." dias para tu cumpleaños <br>");

function diasVividos($fecha){
    $fechahoy =  date("Y-m-d");
    $resta = strtotime($fechahoy)-strtotime($fecha);
    $dias = $resta / (24*3600);
    return $dias;  
}
$fecha2 = "2000-04-22";
print_r("Llevas ".diasVividos($fecha2)." dias vividos "."<br>");

print_r(getDate());

?>