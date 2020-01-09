<?php

function conexion()
{
    $conexion = new mysqli("localhost","root","123456","instituto");
    // Check connection
        if ($conexion->connect_error) {
            die("Conexion fallida: " . $conexion->connect_error."<br>");
        }
        else{
            return $conexion;
        }  

}

function comprobarCampos()
{
    if (empty($_POST['numMatricula'])){
        return "No hay matricula";
    }
    else
    {
        return $_POST['numMatricula'];
    }
}

function botonPulsado(){

    $numMatricula=$_POST['numMatricula'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $curso=$_POST['curso']; 

    if (isset($_POST['borrar'])){
        borrar($numMatricula);
    }
    else if (isset($_POST['actualizar'])){
        actualizar($numMatricula,$nombre,$apellidos,$telefono,$curso);
    }   
    else if (isset($_POST['insertar'])){
        insertar($numMatricula,$nombre,$apellidos,$telefono,$curso);
    }
    else if (isset($_POST['enviar'])){
        visualizar($numMatricula);
    }     
}

function borrar($numMatricula){
        //$numMatricula=$_POST['numMatricula'];
        $borrar = "DELETE FROM alumno where numMatricula='$numMatricula'";
        //Borra el registro donde el numero sea igual al que se le introduce
        $row_cnt = $borrar->num_rows;
        if (conexion()->query($borrar) === TRUE &&($row_cnt>0)) {
            echo "Borrado en la tabla sin problema.<br>";
        } else {
            echo "No se puedo borrar";
        }
        conexion()->close();
    }

function actualizar($numMatricula,$nombre,$apellidos,$telefono,$curso){
    $actualizar = "UPDATE alumno set nombre='$nombre',apellidos='$apellidos',tlf='$telefono', curso='$curso' where numMatricula='$numMatricula'";

    //Actualizando lso campos donde el numero de matriculo sea igual al instroducido
        $row_cnt = $actualizar->num_rows;
    if (conexion()->query($actualizar) === TRUE &&($row_cnt>0)) {
        echo "Actualizado en la tabla sin problema.<br>";
    } else {
        echo "No se pudo actualizar";
    }

    conexion()->close();
}

function insertar($numMatricula,$nombre,$apellidos,$telefono,$curso){
    conexion();

// Check connection 
    $insertar = "INSERT INTO alumno VALUES('$numMatricula','$nombre','$apellidos','$telefono','$curso')";

    if (conexion()->query($insertar) === TRUE) {
        echo "Insertado en la tabla sin problema.<br>";
    } else {
        echo "Error al insertar";
    }
    conexion()->close();
}

function visualizar(){
    $resultado = conexion()->query("SELECT numMatricula,nombre,apellidos,tlf,curso FROM alumno where alumno");
    
    
    //Mostrando los datos de la consulta Select id,descripcion from curso;
    echo "<table border=1>";
    if ($resultado->num_rows > 0) {
        // output data of each row
        //A traves de este mostramos el contenido por nombre
         while($row = $resultado->fetch_assoc()) {
            echo "<tr><td> numMatricula: " . $row["numMatricula"]. " - nombre: " . $row["nombre"]. " - apellidos: " . $row["apellidos"].  " - telefono: " . $row["tlf"]. " - curso: " . $row["curso"]."</td></tr>";
        }
    
        //A traves de este mostramos el contenido por numero
       while($row = $resultado->fetch_array(MYSQLI_NUM)) {
            echo "<tr><td> ID: " . $row[0]. " - Descripcion: " . $row[1]. "</td></tr>";
        }
    
    } else {    
        echo "No hay ningun registro";
    }
    echo "</table>" ; 
    
    $resultado->free();
    conexion()->close();

}

botonPulsado();
print_r("<A href=Formulario.php>Volver</A>");

?>