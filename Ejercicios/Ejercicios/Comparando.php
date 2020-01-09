<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php 

$var1 = False;
$var2 = 0;
$var3 = '';

$d1 = 1234; 
$d2 = -123;
$d3 = 0123;
$d4 = 0x1A;
$d5 = 0b1111111;

$f1 = 1.234;
$f2 = 1.2e3;
$f3 = 1E3;
$f4 = 7E10;




if ($var1==true){
	echo "Hola<br>";
}
else{
	echo "Adios<br>";
}

if($var2==0){
	echo "Hola 0<br>";

}
else{
	echo "Adios 1<br>";	
}

if ($var3=='Si'){
	echo "Hola<br>";
}
else{
	echo "Adios<br>";
}

echo $f3;
echo $f4;

?>



</body>
</html>