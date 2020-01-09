<?php

$conexion=mysqli_connect("localhost","root","123456","instituto");

if (mysqli_connect_errno()) {
    die("Connection failed: <br>");
}
else{
    echo "Conectado con exito";
}  

$sql=mysqli_query($conexion,"SELECT numMatricula,nombre,apellidos,tlf,curso FROM alumno");

echo "<table border=1>";
if ($sql->num_rows > 0) {
    // output data of each row
    //A traves de este mostramos el contenido por nombre
     while($row = $sql->fetch_assoc()) {
        echo "<tr><td> numMatricula: " . $row["numMatricula"]. " - nombre: " . $row["nombre"]. " - apellidos: " . $row["apellidos"].  " - telefono: " . $row["tlf"]. " - curso: " . $row["curso"]."</td></tr>";
    }

    //A traves de este mostramos el contenido por numero
   while($row = $sql->fetch_array(MYSQLI_NUM)) {
        echo "<tr><td> ID: " . $row[0]. " - Descripcion: " . $row[1]. "</td></tr>";
    }

} else {
    echo "0 results";
}
echo "</table>" ; 



?>