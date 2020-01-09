<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php 

$nombre = "pepito";

echo "Hola $nombre \n";

echo "Hola $nombre \$ \n";

echo "Hola $nombre \\";

echo 'Hola $nombre\n';

echo "Esto es una comilla doble \"\n";

$str = <<<EOD
Ejemplo de una cadena
expandida en varias líneas
empleando la sintaxis heredoc.
EOD;

//NOWDOC
$str2 = <<<'Espa'
echo 'Tambien se puedn incluir nuevas lineas\n
un string de esta forma, ya que es\n 
correcto hacerlo así';
Espa;

echo $str2;

$nombre = "Víctor";
echo <<<EOT
\nMi nombre es "$nombre". 
Estoy escribendo esto
EOT;


echo $str;
echo "\nEsto es una cadena sencilla\n";

echo 'Tambien se puedn incluir nuevas lineas\n
un string de esta forma, ya que es\n 
correcto hacerlo así';

?>



</body>
</html>