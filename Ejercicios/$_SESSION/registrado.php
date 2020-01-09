<?php
session_start();
    if(!$_SESSION['nombre']){
        header("Location: login.php");
    }else{
        echo "Bienvenido <b>".$_SESSION['nombre']."</b><br>";
        echo "Su contraseña es <b>".$_SESSION['contrasena']."</b>";
    }
?>