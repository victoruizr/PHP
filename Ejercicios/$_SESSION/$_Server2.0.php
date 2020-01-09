<?php


session_start();
//Con esta funcion creamos la conexion
function conexion($dbname,$user,$pass)
{
    $conexion = new PDO("mysql:host=localhost;dbname=$dbname", "$user", "$pass");
    return $conexion;
}

function redirigir($url)
{
    header("Location:$url");
}



function intentos()
{
    //Con esta funcion lo que hace es comprobar si las sesiones existen y en caso de no existir las crea
    if (!isset($_SESSION['Contadores']) && (!isset($_SESSION['MINUTOS']))) {
        $_SESSION['Contadores'] = 0;
    } else {
        $_SESSION['Contadores']++;
    }
    if ($_SESSION['Contadores'] == 2) {
        redirigir('noRegistrado.php');
    }else if($_SESSION['Contadores']>2){
        $_SESSION['Contadores']=0;
    }
}

function consultar()
{
    /* En esta función obtengo el nombre y la contraseña y lo convierto a md5 para posteriormente enviarlo, 
    en caso de que estos datos sean correctos en la consulta, se redigiran a una página */
    $nombre = md5($_POST['nombre']);
    $contrasena = md5($_POST['contrasena']);
    $conexion=conexion('dwes','root',123456);
    $consulta = "SELECT usuario from `usuarios` where md5(usuario)='$nombre' and contrasena='$contrasena';";
    $resultado = $conexion->query($consulta);
    if ($resultado->rowCount() == 1) {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['contrasena'] = $contrasena;
        redirigir('registrado.php');
    } else {
        intentos();
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
    <form action=$_Server2.0.php Method="POST">
        USUARIO<input type="text" name="nombre">
        CONTRASEÑA<input type="password" name="contrasena">
        <input type="submit" name="Enviar" value="Enviar">
    </form>
</body>

</html>