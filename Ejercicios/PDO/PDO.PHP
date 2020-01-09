<?php
//try {
    $mbd = new PDO('mysql:host=localhost;dbname=instituto', 'root', '123456');
    $gsent = $mbd->prepare("SELECT * from alumno where curso='02'");
    $gsent->execute();
    
    /* Obtener todas las filas restantes del conjunto de resultados */
    print("Obtener todas las filas restantes del conjunto de resultados:\n");
    $resultado = $gsent->fetchAll();
    print_r($resultado);


    $gsent = $mbd->prepare("create table datos (apellidos varchar(99),curso varchar(99),nombre varchar(99),numMatricula varchar(99),tlf varchar(99));");
    $gsent->execute();

    

  /*   echo "<table border=1>";
    foreach($mbd->query("SELECT * from alumno where curso='02'") as $fila) {
        echo("<tr><td>".$fila."</tr></td>");
    }
    echo "</table>";
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}*/


?>