<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php 
/*
$array = array("foo","bar","hello","world");
print_r($array);
var_dump($array);

for ($i=0; $i<3; $i++) { 
	echo ($array[$i]);
}
*/
$array2 = [
  "cero" => 0,
  "uno" => 1,
  "dos" => 2,
  "tres" => 3,
  "cuatro" => 4,      
  "cinco" => 5,
  "seis" => 6,
  "siete" => 7,
];

$array3 = [
  0=>"cero",
  1=>"uno",
  2=>"dos",
  3=>"tres",
  4=>"cuatro",      
  5=>"cinco",
  6=>"seis",
  7=>"siete",
];
//array bidimensional
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);
var_dump($array);
var_dump($array["multi"]["dimensional"]["array"]);


foreach ($array3 as $valor) {
	# code...
	print_r($valor);
}

foreach ($array as $key => $valor) {
	# code...
	echo "La clave es $key y el valor";
	print_r($valor);
}


$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";
$a[2][0] = 1;
$a[2][1] = $array3;

/*foreach ($a as $valor) {
	# code...
	foreach ($valor as $valor2) {
		# code...
		print_r("$valor2\n");
	}
}

foreach ($a as $valor1) {
	# code...
	foreach ($valor1 as $valor2) {
		# code...
		print_r($valor2);
	}
}*/


$array4 = array();
for($i=0;$i<=10;$i++){
	for($x=0;$x<10;$x++){
		print_r($i);
		print_r($x."\n");	
		$array=array[$i][$x];
	}
}


/*foreach ($array4 as $valor){
	# code...
	print_r($valor."\n");
}*/

//print_r($array2["uno"]);
$var1 = "uno";
$var2 = "tres";
echo "La suma de $var1 mas $var2 = ".($array2[$var1]+$array2[$var2])."<br>";

$var3 = 1;
$var4 = 3;
echo "La suma de $var3 mas $var4 = ".$array3[$var3+$var4];






?>



</body>
</html>