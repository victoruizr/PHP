<?php
$connexion = new mysqli('localhost','root','123456','instituto');

if ($connexion->connect_errno){
    die("Connect Error: ".$connexion->connect_errno);
}else{
    echo "conectado", "\n";
}
    
    $matricula=$_POST['numMatricula'];
    
    $resultado = "update curso set id";

    if ($connexion->query($resultado) === TRUE) {
        echo "Borrado en la tabla sin problema.";
    } else {
        echo "Error: " . $resultado . "<br>" . $connexion->error;
    }

ECHO "<br><A href=formularioactualizar.php>Volver</A>";

/* header("location:formularioborrar.php"); */

?>
