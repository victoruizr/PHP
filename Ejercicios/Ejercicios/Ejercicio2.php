<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php

//Array que imprima los tipos
$data = array(1, 1., NULL, new stdClass, 'foo');

foreach ($data as $value) {
    echo gettype($value), "\n";
}

//Isset

$var = null;
if (isset($var)){
	echo "Esta variable está definida : ".$var;
}

$var1 = null;
if (isset($var)){
	echo "Esta variable está definida : ".$va1;
}

$var2='';
echo (empty($var2).'\n');


$var3=array();
echo (empty($var2));

//

$var4=array("",0,0.0,"0",NULL,);

foreach ($var4 as $variable) {
	# code...
	echo "<br>";
	var_dump(empty($variable));
	echo "<br>";
}

$a="hola";
echo ("La variable '\$a'vale $a<br>");

define ("PI",3.14);

echo "La variable pi es ".PI.'<br>';

function a($arg1){
	echo gettype($arg1)."<br>";
}
a("pepe");



//Funcion cabecera
function cabecera($variable){
		# code...
	print '<table border="1">';
			foreach ($variable as $valor) {
				# code...
				print_r("<th>".$valor."</th>");
		}
	}
function horario(){
$base=array(
	//"Dias"=>array("Horario ","Lunes ","Martes ","Miercoles ","Jueves ","Viernes "),
	"As"=> array(
		//"horas"=>array("8:15","9:15","10:15","11:45","12:45","13:45","14:45"),
		"primera" =>array("8:15","HLC","DWES","DWEB","DWEB","DWES"),
		"segunda" => array("9:15","DWES","DWES","DWEB","DWEB","DWES"),
		"tercera" => array("10:15","DWES","DSP","DWEC","DWEC","DWEC"),
		"cuarta" => array("11:45","DWEC","DSP","DWEC","DWEC","DWEC"),
		"quinta" => array("12:45","DWEC","EINEM","HLC","EINEM","DWEB"),
		"sexta" =>	array("13:45","DSP","EINEM","HLC","EINEM","DWEB"),
	),);
	$var = array("Hola ","Adios");	
	print_r(cabecera($var));
	foreach ($base["As"] as $dia=> $Hora) {
		# code...
		echo '<tr>';
		foreach ($Hora as $asignatura) {
			# code...
				echo '<td>'.$asignatura.'</td>';
		}	echo '</tr>';

	}
	echo "</table>";
}

//print_r(cabecera($var));
print_r(horario());


//Crear una funcion que añada una cabecera al horario
/*function horario(){
$base=array(
	"Dias"=>array("Horario ","Lunes ","Martes ","Miercoles ","Jueves ","Viernes "),
	"As"=> array(
		//"horas"=>array("8:15","9:15","10:15","11:45","12:45","13:45","14:45"),
		"primera" =>array("8:15","HLC","DWES","DWEB","DWEB","DWES"),
		"segunda" => array("9:15","DWES","DWES","DWEB","DWEB","DWES"),
		"tercera" => array("10:15","DWES","DSP","DWEC","DWEC","DWEC"),
		"cuarta" => array("11:45","DWEC","DSP","DWEC","DWEC","DWEC"),
		"quinta" => array("12:45","DWEC","EINEM","HLC","EINEM","DWEB"),
		"sexta" =>	array("13:45","DSP","EINEM","HLC","EINEM","DWEB"),
	),);
	{
		print '<table border="1">';
		foreach ($base["Dias"] as $valor) {
			# code...
			print_r("<th>".$valor."</th>");
	}
	foreach ($base["As"] as $dia=> $Hora) {
		# code...
		echo '<tr>';
		foreach ($Hora as $asignatura) {
			# code...
				echo '<td>'.$asignatura.'</td>';
		}	echo '</tr>';

	}
echo "</table>";
}
}

//Comprobar una variable que exista(boolean)si esta vacia,el tipo,existe, valor, todo ello dentro de un arrya y que lo muestre.
//Simple sin array
function estado($var1){
	echo gettype($var1);
	if(empty($var1))
		echo "<br>Esta vacia<br>";
	else
		echo " Esta con contenido ";
	var_dump(isset($var1));
	echo $var1."<br>";
}

function estado2($variable){
	$existe;
	$vacio;
	$tipo;
	$valor;

	$existe = isset($variable);
	$vacio = empty($variable);
	if(isset($variable)){
		$existe = true;
		if(!empty($variable)){
			$vacio = false;
			$valor = $variable;
			$tipo = gettype($variable);
			$datos = array(
				"Existe" => $existe,
				"Vacío" => $vacio,
				"Tipo" => $tipo,
				"Valor" => $valor,
			);
		}
		else{
			$datos = array(
				"Existe" => $existe,
				"Vacío" => true,
			);
		}
	}
	else{
		$datos = array(
				"Existe" => false,
			);
	}
	return $datos;			
}

$minombre = "David";

var_dump(estado2($minombre));
estado("Hola");

horario();*/

?>
</body>
</html>