<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php
$a = null;
$b = null;
$c = 3;

print_r($a??$b??$c);
print_r("<br>");
var_dump("php" == 0);



?>
</body>
</html>