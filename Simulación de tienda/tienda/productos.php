<?php
// Recuperamos la información de la sesión
session_start();


if ($_SESSION['estado'] == "conectado") {
    if (!isset($_SESSION['cesta'])) {
        $_SESSION['cesta'] = array();
    }
    /*$x = <<<SQL
        SELECT producto.cod,producto.nombre_corto,producto.pvp FROM producto 

        INNER JOIN stock on producto.cod = stock.producto

        WHERE tienda = 1
    SQL;*/
    function conexion()//Con esta funcion creamos la conexion
    {
        try{

            $mbd = new PDO('mysql:host=localhost;dbname=dwes', 'root', 123456);
            return $mbd; 

        }catch(PDOException $Exception){};
    }
    function listaDesplegable($dwes){
        
        // Rellenamos el desplegable con los datos de todos los productos
        $sql = "SELECT cod, nombre FROM tienda";
        $resultado = $dwes->query($sql);
        if ($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $x =$row['cod'];
                $y = $row['nombre'];
                $_SESSION['cod']=$x;
                echo "<option value='$x'>$y</option>";
                $row = $resultado->fetch();
            }
        }
    

    }

    function actualizar($dwes,$tienda){
        if (isset($_POST['enviarT'])){
            
            $sql = <<<SQL
            SELECT producto.cod,producto.nombre_corto,producto.PVP FROM producto 
            INNER JOIN stock on producto.cod = stock.producto
            WHERE tienda = $tienda
            SQL;
            try{
                $resultado = $dwes->query($sql);
                if ($resultado) {
                    // Creamos un formulario por cada producto obtenido
                    $row = $resultado->fetch();
                    while ($row != null) {
                        echo "<p><form id='${row['cod']}' action='productos.php' method='post'>";
                        // Metemos ocultos los datos de los productos
                        echo "<input type='hidden' name='producto' value='" . $row['cod'] . "'/>";
                        echo "<input type='hidden' name='nombre' value='" . $row['nombre_corto'] . "'/>";
                        echo "<input type='hidden' name='precio' value='" . $row['PVP'] . "'/>";
                        echo "<input type='submit' name='enviar' value='Añadir'/>";
                        echo " ${row['nombre_corto']}: ";
                        echo $row['PVP'] . " euros.";
                        echo "</form>";
                        echo "</p>";
                        $row = $resultado->fetch();
                    }
            }
        }catch(PDOException $e){}
        }
    }
    $conexion = conexion();
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


    <html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: Listado de Productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>

    <body class="pagproductos">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Listado de productos</h1>
                <form id="form_seleccion" action=<?php echo $_SERVER['PHP_SELF'];?> method="post">
                <span>Tienda: </span>
                <select name="tienda">
                    <?=listaDesplegable($conexion);?>
                </select>
                <input type="submit" value="Mostrar stock" name="enviarT"/>
            </form>
            </div>
            <div id="cesta">
                <h3><img src="cesta.png" alt="Cesta" width="24" height="21"> Cesta</h3>
                <hr />
                <?php
                // Comprobamos si se ha enviado el formulario de vaciar la cesta
                if (isset($_POST['vaciar'])) {
                    unset($_SESSION['cesta']);
                    
                }
                // Comprobamos si se ha enviado el formulario de añadir
                if (isset($_POST['vaciar'])) {
                    unset($_SESSION['cesta']);
                    
                }
                // Comprobamos si se ha enviado el formulario de añadir
                if (isset($_POST['enviar'])) {
                    // Creamos un array con los datos del nuevo producto
                    $producto['nombre'] = $_POST['nombre'];
                    $producto['precio'] = $_POST['precio'];
                    $producto['producto'] = $_POST['producto'];
                    // y lo añadimos

                    $_SESSION['cesta'][$_POST['producto']] = $producto;
                }

                // Si la cesta está vacía, mostramos un mensaje
                $cesta_vacia = true;
                if (!isset($_SESSION['cesta'])) {
                    print "<p>Cesta vacía</p>";
                }

                // Si no está vacía, mostrar su contenido
                else {
                    foreach ($_SESSION['cesta'] as $codigo => $producto)
                        print "<p>${producto['nombre']}</p>";
                    $cesta_vacia = false;
                }

                // Si la cesta está vacía, mostramos un mensaje
                $cesta_vacia = true;
                if (!isset($_SESSION['cesta'])) {
                    //print "<p>Cesta vacía</p>";
                }

                // Si no está vacía, mostrar su contenido
                else {
                    foreach ($_SESSION['cesta'] as $codigo => $producto)
                        //print "<p>$codigo</p>";
                        $cesta_vacia = false;
                }
                ?>
                <form id='vaciar' action='productos.php' method='post'>
                    <input type='submit' name='vaciar' value='Vaciar Cesta' <?php if ($cesta_vacia) print "disabled='true'"; ?> />
                </form>
                <form id='comprar' action='cesta.php' method='post'>
                    <input type='submit' name='comprar' value='Comprar' <?php if ($cesta_vacia) print "disabled='true'"; ?> />
                </form>
            </div>
            <div id="productos">
                <?php
                    
                    if(!isset($_POST["enviarT"]) )
                    {
                        echo "<h2>Seleccione una tienda</h2>";
                       
                    }else{
                        
                        actualizar($conexion,$_POST['tienda']);
                    }
    

                ?>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action='	ejercicioSessiones.html	' method='post'>
                    <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_SESSION['usuario']; ?>' />
                </form>
                <?php
                    if (isset($error)) {
                    print "<p class='error'>Error $error: $mensaje</p>";
                    }
                ?>
            </div>
        </div>
    </body>

    </html>


<?php
    } else {
        header("Location: ejercicioSessiones.html");
    }

?>