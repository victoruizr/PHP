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
        if (isset($_POST['producto']))
            $producto = $_POST['producto'];
        try {

        } catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        if (!isset($error)) {
// Comprobamos si tenemos que actualizar los valores
            if (isset($_POST['actualizar'])) {
// Preparamos la consulta
                $tienda = $_POST['tienda'];
                $unidades = $_POST['unidades'];
                $sql = "UPDATE stock SET unidades=:unidades WHERE tienda=:tienda";
                $sql .= " AND producto='$producto'";
                $consulta = $dwes->prepare($sql);
// La ejecutamos dentro de un bucle, tantas veces como tiendas haya
                for ($i = 0; $i < count($tienda); $i++) {
                    $consulta->bindParam(":unidades", $unidades[$i]);
                    $consulta->bindParam(":tienda", $tienda[$i]);
                    $consulta->execute();
                }
                $mensaje = "Se han actualizado los datos.";
            }
        }
        ?>
        <div id="encabezado">
            <h1>Ejercicio: Utilización de excepciones en PDO</h1>
            <form id="form_seleccion" action=<?php echo $_SERVER['PHP_SELF'];?> method="post">
                <span>Producto: </span>
                <select name="producto">
                    <?php
                    if (!isset($error)) {
// Rellenamos el desplegable con los datos de todos los productos
                        $sql = "SELECT cod, nombre_corto FROM producto";
                        $resultado = $dwes->query($sql);
                        if ($resultado) {
                            $row = $resultado->fetch();
                            while ($row != null) {
                                echo "<option value='${row['cod']}'";
// Si se recibió un código de producto lo seleccionamos
// en el desplegable usando selected='true'
                                if (isset($producto) && $producto == $row['cod'])
                                    echo " selected='true'";
                                echo ">${row['nombre_corto']}</option>";
                                $row = $resultado->fetch();
                            }
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Mostrar stock" name="enviar"/>
            </form>
        </div>
        <div id="contenido">
            <h2>Stock del producto en las tiendas:</h2>
            <?php
// Si se recibió un código de producto y no se produjo ningún error
// mostramos el stock de ese producto en las distintas tiendas
            if (!isset($error) && isset($producto)) {
// Ahora necesitamos también el código de tienda
                $sql = <<<SQL
SELECT tienda.cod, tienda.nombre, stock.unidades
FROM tienda INNER JOIN stock ON tienda.cod=stock.tienda
WHERE stock.producto='$producto'
SQL;
                $resultado = $dwes->query($sql);
                if ($resultado) {
// Creamos un formulario con los valores obtenidos
                    echo "<form id='form_actualizar' action=".$_SERVER['PHP_SELF']." method='post'>";
                    $row = $resultado->fetch();
                    while ($row != null) {
// Metemos ocultos el código de producto y los de las tiendas
                        echo "<input type='hidden' name='producto' value='$producto'/>";
                        echo "<input type='hidden' name='tienda[]' value='" . $row['cod'] . "'/>";
                        echo "<p>Tienda ${row['nombre']}: ";
// El número de unidades ahora va en un cuadro de texto
                        echo "tiene ".$row['unidades']." unidades, introduce el nuevo número  ";
                        echo "<input type='text' name='unidades[]' size='4' /></p>";
                        //echo "value='" . $row['unidades'] . "'/> unidades.</p>";
                        $row = $resultado->fetch();
                    }
                    echo "<input type='submit' value='Actualizar' name='actualizar'/>";
                    echo "</form>";
                }
            }
            ?>
        </div>
        <div id="pie">
            <?php
            if (isset($error))
                echo "<p>Se ha producido un error! $mensaje</p>";
            else {
                echo $mensaje;
                unset($dwes);
            }
            ?>
        </div>
    </body>
</html>