<?php

$tiempoUnix=date("d-m-Y-H-i-s-u");

$cookie_name1 = "user";
$cookie_value1 = "$tiempoUnix";
setcookie($cookie_name1, $cookie_value1);

$cookie_name2 = "contador";
$cookie_value2 = 0;
setcookie($cookie_name2, $cookie_value2+1);

$usuario=$_SERVER['PHP_AUTH_USER'];
$contrasena=md5($_SERVER['PHP_AUTH_PW']);
print_r("Bienvenido usuario ".$usuario."<br>");
print_r("Su contraseña es: ".$contrasena."<br>");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Probando Cookie</title>
</head>
<body>
    <?php echo "Su fecha de conexion es: " . $_COOKIE[$cookie_name1]."<br>";
    echo $_COOKIE[$cookie_name2];
    ?>
</body>
</html>