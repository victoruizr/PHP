<?php
    // Recuperamos la información de la sesión
    session_start();
    if ($_SESSION['estado']=="conectado") 
    {
        function conexion()//Con esta funcion creamos la conexion
        {
            try{

                $mbd = new PDO('mysql:host=localhost;dbname=dwes', 'root', 123456);
                return $mbd; 

            }catch(PDOException $Exception){};
        }


        function insertarPedido()
        {
            try{
                $conexion = conexion();
                $conexion->beginTransaction();
                $conexion->query("insert into pedido(tienda,fecha,usuario) values ('".$_SESSION["cod"]."','".date("d-M-Y")."','".$_SESSION["usuario"]."')"); 
                foreach ($conexion->query("SELECT MAX(idpedido) AS idpedido from pedido;") as $row) {
                    $maximo= $row['idpedido'];
                }
                foreach ($_SESSION['cesta'] as $value) {
                    $sql="insert into lineapedidos(idpedido,tienda,codproducto,cantidad) values ('".$maximo."','".$_SESSION['cod']."','".$value['producto']."',1)";
                    $conexion->query($sql); 
                }
           $conexion->commit();
           unset($_SESSION['cesta']);
            }catch(PDOException $e){$conexion->rollBack();};
        }

        insertarPedido();
        die("Gracias por su compra.<br />Quiere <a href='productos.php'>comenzar de nuevo una compra</a>?");
    }else{
        header("Location: ejercicioSessiones.html");

    }
?>
