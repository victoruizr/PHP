<?php

    function datos($curso, $nTable){
    
    // creamos la conexion
    $mbd = new PDO('mysql:host=localhost;dbname=instituto', 'root', '123456');

    //creamos la tabla con el nombre pasado como prametro
    $crear = $mbd->prepare("create table $nTable (alumno varchar(99))");
    $crear->execute();

    //Insertamos en la tabla creada anteriormente todos los alumnos cuyo curso sea el pasado como parametro
    $sentencia = "INSERT INTO  $nTable (alumno)
        (SELECT (numMatricula) FROM alumno WHERE alumno.curso = :mat)";
    $res_enc = $mbd->prepare($sentencia);
    $res_enc->bindParam(':mat', $curso);   
    $res_enc->execute();
   

    }

    datos("02","pepe");

?>