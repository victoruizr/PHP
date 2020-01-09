<?php

session_start();
$_SESSION["Nombre"]="pepe";

print_r(session_id());

print_r("<br>".session_name());

print_r("<a href=sesion2.php>Continuar</a>");

?>