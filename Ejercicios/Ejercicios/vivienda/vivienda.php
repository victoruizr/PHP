<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=stylesheet href="vivienda.css" TYPE="text/css">
    <title>Inserción de vivienda</title>
</head>
<body>
    <h1 id="heading">Inserción de vivienda</h1>
    <p>Introduzca los datos de la vivienda</p>

        <div>

    <form action="resultado.php" enctype="multipart/form-data" method="POST">

        <p>Tipo de vivienda: <select id="tipoVivienda" name="tipoVivienda"> <!-- SELECT que permite escoger el tipo de vivienda -->
            <option value="piso" name="piso" selected>Piso</option> 
            <option value="casa" name="casa">Casa</option>
            <option value="chalet" name="chalet">Chalet</option>
            </select>
        </p>

        <p>Zona: <select id="zona" name="zona">   <!-- SELECT para escoger la zona -->
            <option value="centro" name="centro">Centro</option> 
            <option value="periferia" name="periferia" selected>Periferia</option>
            </select>
        </p>

        <p>Dirección: <input type="text" name="direccion"></p> <!-- INPUT FIELD para la dirección -->

        <p>Número de dormitorios: 
            <label class="radio"><input type="radio" value="1" name="dormitorios">1</label> <!-- RADIO BUTTON para Nº dormitorios -->
            <label class="radio"><input type="radio" value="2" name="dormitorios">2</label> <!-- RADIO BUTTON para Nº dormitorios -->
            <label class="radio"><input type="radio" value="3" name="dormitorios">3</label> <!-- RADIO BUTTON para Nº dormitorios -->
            <label class="radio"><input type="radio" value="4" name="dormitorios">4</label> <!-- RADIO BUTTON para Nº dormitorios -->
            <label class="radio"><input type="radio" value="5" name="dormitorios">5</label> <!-- RADIO BUTTON para Nº dormitorios -->
        </p>

        <p>Precio: <input type="number" step="any" name="precio"> €</p>  <!-- INPUT FIELD para el precio -->
        
        <p>Superficie: <input type="number" step="any" name="superficie"> metros cuadrados</p> <!-- INPUT FIELD para la superficie -->

        <p>Extras (marque los que procedan): 
        <input type="checkbox" name="piscina" value="piscina"> Piscina
        <input type="checkbox" name="jardin" value="jardin"> Jardin
        <input type="checkbox" name="garaje" value="garaje"> Garaje
        </p>

        <p>Foto: <input type="file" name="archivo" value="Examinar..." /></p> <!-- INPUT FIELD de tipo FILE para la foto-->

        <p>Observaciones: <textarea name="observaciones" rows="10" cols="40"></textarea></p>

        <input type="submit" value="Insertar Vivienda"> <!-- INPUT de tipo SUBMIT para insertar la vivienda -->

    </form>
        </div>
    </body>
</html>


