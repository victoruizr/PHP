<?php

// Create connection
$conexion = new mysqli("localhost" ,"root", "123456", "instituto");
// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$resultado = $conexion->query("SELECT id,descripcion FROM curso ORDER BY id DESC");


//Mostrando los datos de la consulta Select id,descripcion from curso;
echo "<table border=1>";
if ($resultado->num_rows > 0) {
    // output data of each row
    //A traves de este mostramos el contenido por nombre
     while($row = $resultado->fetch_assoc()) {
        echo "<tr><td> ID: " . $row["id"]. " - Descripcion: " . $row["descripcion"]. "</td></tr>";
    }

    //A traves de este mostramos el contenido por numero
   while($row = $resultado->fetch_array(MYSQLI_NUM)) {
        echo "<tr><td> ID: " . $row[0]. " - Descripcion: " . $row[1]. "</td></tr>";
    }

} else {
    echo "0 results";
}
echo "</table>" ; 

$resultado->free();
$conexion->close();





?>