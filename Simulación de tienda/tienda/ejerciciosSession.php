<?php

function obtenerDatos()//Con esta funcion obtenemos los datos

{
    try{
        $nombre=$_POST["nombre"];
        $contrasena=$_POST["password"];
        $array=array(0=>$nombre,1=>$contrasena);
        return $array;
    }catch(Exception $Exception){};
}


function conexion()//Con esta funcion creamos la conexion
{
    try{

        $mbd = new PDO('mysql:host=localhost;dbname=dwes', 'root', 123456);
        return $mbd; 

    }catch(PDOException $Exception){};
}

function encriptar($pass)//Con esta funcion encriptamos la cadena contraseña 
{
    $contrasena=hash("md5",$pass);
    return $contrasena;
}

function obtenerUsuarioBD()
{
    $valores=obtenerDatos();
    $nombre=$valores[0];


    return $nombre;
}

function obtenerGSENTENT($valores)
{
    $nombre = $valores[0];
    $contrasena=encriptar($valores[1]);

    $mbd = conexion();

    $gsent = $mbd->prepare("SELECT * from usuarios where usuario=\"$nombre\" and contrasena=\"$contrasena\"");
    $gsent->execute();

    return $gsent;
}

function ComprobarDatos()//Con esta funcion verificamos si existe el usuario y si la password es correcta
{
        define("TIEMPOEXPIRACION",time()+2*60);
        //define("TIEMPOEXPIACION",time()+10);

        //$gsent = obtenerGSENTENT(obtenerUsuarioBD());
        //$nombre = obtenerUsuarioBD();

        $valores=obtenerDatos();
        $nombre=$valores[0];
        $contrasena=$valores[1];
        $contrasena=encriptar($contrasena);
        $mbd = conexion();
        $gsent = $mbd->prepare("SELECT * from usuarios where usuario=\"$nombre\" and contrasena=\"$contrasena\"");
        $gsent->execute();
        $cuenta_col = $gsent->rowCount();


/*
        $valores=obtenerDatos();
        $nombre = $valores[0];
        $contrasena=encriptar($valores[1]);
    
        $mbd = conexion();
    
        $gsent = $mbd->prepare("SELECT * from usuarios where usuario=\"$nombre\" and contrasena=\"$contrasena\"");
        $gsent->execute();
        $cuenta_col = $gsent->rowCount();*/

        if (!isset($_COOKIE["intentos"]) ) 
        {
            setcookie("intentos",0,TIEMPOEXPIRACION );
            setcookie("intentos", (int)$_COOKIE["intentos"]+1, TIEMPOEXPIRACION);
            echo "</br>UwU </br>".$_COOKIE["intentos"];
        }


        if($gsent->rowCount()!=0 && (int)$_COOKIE["intentos"]<3)
        {
            echo "Puedes acceder $nombre </br>";
            session_start();
            $_SESSION['estado']="conectado";
            $_SESSION['usuario']=$nombre;


            echo $_SESSION["estado"];
            setcookie("intentos",0,0);
            //header("Location: ejercicioSessionStock.php");
            header("Location: productos.php");


        }else{

            if($_COOKIE["intentos"] >= 2)
            {
                echo'<script type="text/javascript"> alert("Demasiados intentos, vuelva a probar en un rato. (2 minutos)"); window.location.href="ejercicioSessiones.html";</script>';
                setcookie("intentos", (int)$_COOKIE["intentos"]+1, TIEMPOEXPIRACION);
            }
            else{
                setcookie("intentos", (int)$_COOKIE["intentos"]+1, TIEMPOEXPIRACION);
                echo "No puede acceder $nombre </br>";
                echo ($_COOKIE["intentos"]);
                header("Location: ejercicioSessiones.html");

            }
        }

        
    
}


ComprobarDatos();


?>