<?php
session_start();
//Se inicia la sesión/

foreach($_SESSION["nuevoPost"] as $i){
    echo $i.("<br>");
}
?>
