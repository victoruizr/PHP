<?php
// Recuperamos la información de la sesión
session_start();

if ($_SESSION['estado'] == "conectado") {

    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) {
        header("Location:ejercicioSessiones.html");
    }

    function total(){
        
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: Cesta de la Compra</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>

    <body class="pagcesta">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Cesta de la compra</h1>
            </div>
            <div id="productos">
                <?php
                $total = 0;
                foreach ($_SESSION['cesta'] as $codigo => $producto) {
                    echo "<p><span class='codigo'>$codigo</span>";
                    echo "<span class='nombre'>${producto['nombre']}</span>";
                    echo "<span class='precio'>${producto['precio']}</span></p>";
                    $total += $producto['precio'];
                }
                ?>
                <hr />
                <p><span class='pagar'>Precio total: <?php print $total; ?> €</span></p>
                <form action='pagar.php' method='post'>
                    <p>
                        <span class='pagar'>
                            <input type='submit' name='pagar' value='Pagar' />
                        </span>
                    </p>
                </form>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action='ejercicioSessiones.html' method='post'>
                    <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_SESSION['usuario']; ?>' />
                </form>
            </div>
        </div>
    </body>

    </html>

<?php
    } else {
        header("Location: ejercicioSessiones.html");
    }

?>