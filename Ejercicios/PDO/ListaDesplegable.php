<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
    http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Ejemplo: Utilización de excepciones en PDO -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejercicio Tema 3: Excepciones en PDO</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>


        <?php
        $mensaje="";
        $error=null;
        $opciones=null;
        $producto="";
        
    

        function conexion($error,$mensaje,$opciones){
            $mensaje="";
            try {            
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $dwes = new PDO("mysql:host=localhost;dbname=instituto", "root", "123456",$opciones);
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $dwes;
            } catch (PDOException $e) {
                $error = $e->getCode();
                $mensaje = $e->getMessage();
            }

        }

        $dwes = conexion($error,$mensaje,$opciones);

 
        function listaDesplegable($dwes,$producto,$error){
            if (!isset($error)) {
            // Rellenamos el desplegable con los datos de todos los productos
                $sql = "SELECT id,descripcion FROM curso";
                $resultado = $dwes->query($sql);
                if ($resultado) {
                    $row = $resultado->fetch();
                    while ($row != null) {
                        echo "<option value='${row['id']}'";
                // Si se recibió un código de producto lo seleccionamos
                // en el desplegable usando selected='true'
                        if (isset($producto))

                        echo ">${row['descripcion']}</option>";
                        $row = $resultado->fetch();
                    }
                }
            }
        }



        ?>

        <?php
            conexion($error,$mensaje,$opciones);
        ?>
        <div id="encabezado">
            <h1>Ejercicio: Utilización de excepciones en PDO</h1>
            <form id="form_seleccion" action=<?php echo $_SERVER['PHP_SELF'];?> method="post">
                <span>Producto: </span>
                <select name="producto">
                    <?php
                    
                listaDesplegable($dwes,$producto,$error);
                ?>
                </select>
            </form>
        </div>
    </body>
</html>


