<?php
/*hacer un formulario que tenga un texto de entrada y un boton de enviar 
y la respuesta de ese formulario, el servidor la tiene que capturar
y devolverle un saludo*/
$nombre = $_POST['nombre'];
if (empty($nombre))
    echo "hola nadie";
else
    echo "hola $nombre";
?>