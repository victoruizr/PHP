<?php

function tabla($nTable,$curso){
    $connexion = new mysqli('localhost','root','123456','instituto');
    
    if ($connexion->connect_errno){
        die("Connect Error: ".$connexion->connect_errno);
    }else{
        echo "conectado", "\n";
    }
        $resultado = ("create table $nTable (alumno varchar(99))");
        $insertar = ("INSERT INTO $nTable (alumno)
        (SELECT (numMatricula) FROM alumno WHERE alumno.curso = $curso)");
    
        if ($connexion->query($resultado) === TRUE && $connexion->query($insertar) === TRUE) {
            echo "Creacion de la tabla con exito";
        } else {
            echo "Error: " . $resultado . "<br>" . $connexion->error;
        }
        
}

tabla("franco",02);

?>