<?php

$connexion = new mysqli('localhost','clase','clase','instituto');

if ($connexion->connect_errno){
    die("Connect Error: ".$connexion->connect_errno);
}else{
    echo "conectado", "\n";
}

if (isset($_POST["insertar"]) && !empty($_POST["insertar"]) && !empty($_POST["nombre"]) && !empty($_POST["apellidos"])){
    
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $curso = $_POST['curso'];
    
    $resultado = "INSERT INTO alumno (num_matricula, nombre, apellidos, telf, curso) 
    VALUES ('$matricula', '$nombre', '$apellidos', '$telefono', '$curso')";

    if ($connexion->query($resultado) === TRUE) {
        echo "Introducido en la tabla sin problema.";
    } else {
        echo "Error: " . $resultado . "<br>" . $connexion->error;
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos</title>
</head>
<body>
    <form method="POST">
    Numero de Matricula del alumno: <input type="text" name="matricula"><br>
    Nombre del Alumno:<input type="text" name="nombre"><br>
    Apellidos del Alumno:<input type="text" name="apellidos"><br>
    Telefono del Alumno: <input type="number" name="telefono"><br>
    Curso del alumno: <select name="curso">
   			<option value="01">Primer curso de Desarrollo de Aplicaciones Web</option>
    		<option value="02">Primer curso de Desarrollo de Aplicaciones Multiplataforma</option>
    		<option value="03">Segundo curso de Desarrollo de Aplicaciones Web</option>
            <option value="04">Segundo curso de Desarrollo de Aplicaciones Multiplataforma</option>
  			</select><br>
    <input type="submit" name="insertar" value="Insertar Alumno">
    </form>
</body>
</html>