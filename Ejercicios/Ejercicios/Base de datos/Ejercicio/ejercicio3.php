<?php

function conexion()
{
    $conexion = new mysqli("localhost", "root", "123456", "instituto");
    // Check connection
    if ($conexion->connect_error) {
        die("Conexion fallid: " . $conexion->connect_error . "<br>");
    } else {
        return $conexion;
    }
}



function creacionTabla()
{
    conexion();
    $c = "02";
    $resultado = "CREATE TABLE curso_" . $c . " (nombre varchar(99),curso varchar(99))";
    if (conexion()->query($resultado) === TRUE) {
        echo "Creada la tabla con exito.<br>";
    } else {
        echo "Fallo al crear tabla";
    }
    consulta($c);
}

function consulta($c1)
{
    $resultado = conexion()->query("SELECT numMatricula,nombre,apellidos,tlf,curso FROM alumno where curso=".$c1."");
    //Mostrando los datos de la consulta Select id,descripcion from curso;
    echo "<table border=1>";
    if ($resultado->num_rows > 0) {
        // output data of each row
        //A traves de este mostramos el contenido por nombre
        while ($row = $resultado->fetch_assoc()) {
            $resultado2=$resultado = conexion()->query("SELECT numMatricula,nombre,apellidos,tlf,curso FROM alumno where curso=".$c1."");
            echo "<tr><td> numMatricula: " . $row["numMatricula"] . " - nombre: " . $row["nombre"] . " - apellidos: " . $row["apellidos"] .  " - telefono: " . $row["tlf"] . " - curso: " . $row["curso"] . "</td></tr>";
        }
    } else {
        echo "No se pudo insertar";
    }
    echo "</table>";
}


creacionTabla();
