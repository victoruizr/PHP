<?php
    
    //Se inicia la sesión/
    session_start();
    
    if(isset($_POST["nombre"])){
        $valor = $_POST["nombre"];
        $_SESSION["nuevoPost"][]=$valor;
    }
    //Se crea la sesión/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formularioNombre</title>
</head>
<body>
    <div>
        <form action="SESION.php" method="POST">
            <p>¿Como te llamas?: <input type="text" name="nombre"></p>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>