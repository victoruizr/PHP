<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php

function probador(&$a){
	$a=3;
	$a++;
	print_r($a.'<br>');
}
$x=2;
print_r(probador($x));


//dos funciones  una por valor y otra por referencia
$x=2;
function siguiente($n1){
	return ($n1+1);
}
echo $x.'<br>';
function incrementa(&$n2)
	{
		$n2++;
	}
print_r(siguiente(2));
incrementa($x);
print_r('<br>');
print_r($x.'<br>');
echo $x.'<br>';

$a=0;

function recursividad($a)
{
	if($a<20){
		echo "$a\n";
		recursividad($a+1);
	}
}

recursividad($a);

//Factorial de un numero

function factorial($var)
{
	if($var>0)
	{
		return ($var*(Factorial($var-1)));
	}else{
		return 1;
	}
}
print_r(factorial(120));
?>
</body>
</html>