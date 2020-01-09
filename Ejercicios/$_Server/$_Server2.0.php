<?php

$i=0;

//Con esta funcion mostramos los datos del formulario que hace la variable $_SERVER['PHP_AUTH_USER']
function mostrarDatos(){
    $usuario=$_SERVER['PHP_AUTH_USER'];
    $contrasena=md5($_SERVER['PHP_AUTH_PW']);
    echo "USUARIO: <b>".$usuario."</b><br>";
    echo "CONTRASEÑA: <b>".$contrasena."</b><br>";
}


//Con esta funcion creamos la conexion
function conexion(){
    $mbd = new PDO('mysql:host=localhost;dbname=instituto', 'root', '123456');
    return $mbd; 
}

//Con esta funcion encriptamos la cadena contraseña que es la password introducida en el nombre $_Server
function encriptar(){
    $contrasena=md5($_SERVER['PHP_AUTH_PW']);
    return $contrasena;
}

function redireccionOk(){
    header("Location: ./Location.php");
    exit; 
}




function ComprobarDatos(){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="Contenido restringido"');
        header("HTTP/1.0 401 Unauthorized");
    exit;
    }else{
        $usuario=$_SERVER['PHP_AUTH_USER'];
        $contrasena=encriptar();
        $mbd = conexion();
        $gsent = $mbd->prepare("SELECT * from alumno where nombre=$usuario and contrasena=$contrasena");
        $gsent->execute();
        $cuenta_col = $gsent->rowCount();
        if($cuenta_col==0){
            mostrarDatos();
            echo "Puedes acceder $usuario";
            //Con esto redirigimos a una página, en caso de que este sea verdadero
            redireccionOk();
        }else{echo "No puede acceder $usuario";}
    
    }
}

ComprobarDatos();





?>