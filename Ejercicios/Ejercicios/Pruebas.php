<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php

//Array que contenga len su primera posicion un array con los dias de la semana y como segunda posicion otro array bidimensional con las horas de nuestro horario. Imprimir el horario en una tabla hml en un formato de estilo distinto

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

//var_dump($base);
//var_dump($base["As"]["primera"]);
/*print '<table border="1">';
	foreach ($base as $pepe=> $Dias) {
		# code...
		echo '<tr>';
		//print_r($claves1);
	foreach ($base as $claves2=> $primera) {
		# code...
		echo '<td>'.$claves2.'</td>';
	}
	echo "</tr>";
}
echo "</table>";*/
?>
</body>
</html>