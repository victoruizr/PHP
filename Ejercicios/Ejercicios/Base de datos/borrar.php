<?php
$connexion = new mysqli('localhost','root','123456','instituto');

if ($connexion->connect_errno){
    die("Connect Error: ".$connexion->connect_errno);
}else{
    echo "conectado", "\n";
}
    
    $matricula=$_POST['numMatricula'];
    
    $resultado = "delete from curso where id='$matricula'";

    if ($connexion->query($resultado) === TRUE) {
        echo "Borrado en la tabla sin problema.";
    } else {
        echo "Error: " . $resultado . "<br>" . $connexion->error;
    }

ECHO "<br><A href=formularioborrar.php>Volver</A>";

/* header("location:formularioborrar.php"); */

?>
