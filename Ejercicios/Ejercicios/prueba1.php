<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php
$v1 = $_GET['nom'];
function saludo(&$nombre,$texto = "Buenos dias"){
    return $texto." ".$nombre;
}
if($v1==null){
    print_r("<A href=\"Ejercicio6.php\">Intentalo de nuevo</A>");
}
else{
    print_r(saludo($v1));
}

?>
</body>
</html>