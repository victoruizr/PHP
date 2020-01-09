<?php

//Con esta funcion mostramos los datos del formulario que hace la variable $_SERVER['PHP_AUTH_USER']
function obtenerDatos(){
        $nombre=$_POST["nombre"];
        $contrasena=$_POST["contrasena"];
        $array=array(0=>$nombre,1=>$contrasena);
        return $array;
}


//Con esta funcion creamos la conexion
function conexion(){
    $mbd = new PDO('mysql:host=localhost;dbname=instituto', 'root', '123456');
    return $mbd; 
}


function ComprobarDatos(){
        $valores=obtenerDatos();
        $nombre=md5($valores[0]);
        $contrasena=md5($valores[1]);
        $mbd = conexion();
        $gsent = $mbd->prepare("SELECT * from usuarios where md5(usuario)=\"$nombre\" and contrasena=\"$contrasena\"");
        print_r($gsent);
        $gsent->execute();
        $cuenta_col = $gsent->rowCount();
        if($gsent->rowCount()==0){
            $valores=obtenerDatos();
            session_start();
            $_SESSION['usuario']=$valores[0];
            $_SESSION['contrasena']=$valores[1];
/*             $_SESSION['Estado']="Okey"; */
            header("Location: registrado.php");
        }else{
            echo "No puede acceder $valores[1]";
        }
    
    }


ComprobarDatos();
