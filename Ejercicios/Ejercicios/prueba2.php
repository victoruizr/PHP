<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php
$v1 = $_GET['euros'];
$v2 = $_GET['libras'];
$v3 = $_GET['comision'];

$libra=0.89;
$euro=1.12;
$elibra=0;
$leuro=0;

if(empty($v1)){
    print_r("El campo euro esta vacio"."<br>");
}
if(empty ($v2)){
    print_r("El campo libras esta vacio"."<br>");
}


if($v1==1){
    print_r("<br>".$v1." euro = ".$libra."<br>");
}
if($v1>1){
    $elibra=$v1*$libra;
    print_r("<br>".$v1." euro  = ".$elibra."<br>");
}
if($v2==1){
    print_r("<br>".$v2." libra = ".$euro."<br>");
}
if($v2>1){
    $leuro=$v2*$euro;
    print_r("<br>".$v2." libras = ".$leuro."<br>");
}

function ComisionLibras($cantidad,$comision){
    $var1=$comision*$cantidad/100;
    return $var1;
}

function ComisionEuros($cantidad,$comision){
    $var1=$comision*$cantidad/100;
    return $var1;
}

print_r("La comision de libras a euros es: ".ComisionLibras($v1,$v3)."<br>");
print_r("La comision de euros a libras es: ".ComisionEuros($v2,$v3)."<br>");

function netoEuro($cantidad){
    $v1 = $_GET['euros'];
    $v3 = $_GET['comision'];   
    ComisionEuros($v1,$v3);
}
//meter resultados en un array y emplear listas desplegables
$uno = $_GET['conversiones'];
print_r($uno."<br>");   
//nombre del alumno y el nombre de los modulos que se matricul utilizar checkbox

?>
</body>
</html>