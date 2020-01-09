<?php
session_start();

//Con esta funcion creamos la conexion

function conexion($dbname, $user, $pass)
{
    $conexion = new PDO("mysql:host=localhost;dbname=$dbname", "$user", "$pass");
    return $conexion;
}

function redirigir($url)
{
    header("Location:$url");
}

function consultar()
{
    define("tiempoExpiracion", time() + 60);
    if (!isset($_COOKIE["intentos"])) {
        setcookie("intentos", 0, tiempoExpiracion);
        setcookie("intentos", (int) $_COOKIE["intentos"] + 1, tiempoExpiracion);
        echo $_COOKIE["intentos"];
    }
    /* En esta función obtengo el nombre y la contraseña y lo convierto a md5 para posteriormente enviarlo, 
    en caso de que estos datos sean correctos en la consulta, se redigiran a una página */
    $nombre = md5($_POST['nombre']);
    $contrasena = md5($_POST['contrasena']);
    $conexion = conexion('dwes', 'root', 123456);
    $consulta = "SELECT usuario from `usuarios` where md5(usuario)='$nombre' and contrasena='$contrasena';";
    $resultado = $conexion->query($consulta);
    if (($resultado->rowCount() == 1) && (int) $_COOKIE["intentos"] < 3) {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['contrasena'] = $contrasena;
        redirigir('registrado.php');
    } else if ($_COOKIE["intentos"] >= 2) {
        echo "Ha fallado demasiadas veces en unos minutos podra intentarlo de nuevo";
        setcookie("intentos", (int) $_COOKIE["intentos"] + 1, tiempoExpiracion);
    } else {
        setcookie("intentos", (int) $_COOKIE["intentos"] + 1, tiempoExpiracion);
        echo "no puede acceder" . $_POST['nombre'];
        echo ($_COOKIE["intentos"]);
        redirigir("login.php");
    }
}


if (isset($_POST['Enviar'])) {
    consultar();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action=login.php Method="POST">
        USUARIO<input type="text" name="nombre">
        CONTRASEÑA<input type="password" name="contrasena">
        <input type="submit" name="Enviar" value="Enviar">
    </form>
</body>

</html>