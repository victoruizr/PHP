<?php
//dATOS FORMULARIO
$numMatricula=$_POST['numMatricula'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$telefono=$_POST['telefono'];
$curso=$_POST['curso'];

// Create connection
$conexion = new mysqli("localhost","root","123456","instituto");
// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$resultado = $conexion->query("INSERT INTO alumno values('$numMatricula','$nombre','$apellidos','$telefono','$curso')");

if ($conexion->query($resultado) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $resultado . "<br>" . $conexion->error;
}

$conexion->close();
echo "<A HREF=insert.php>Volver</A>";
?>
