<?php

    //INICIO DE SESION
    session_start();

    function leerTipoVivienda(){
        //Obtengo el tipodeVivienda y en funcion del tipo digo si es un piso, casa o vivienda
        if(isset($_POST["tipoVivienda"])){
            if($_POST["tipoVivienda"]=="piso"){
                return "piso";
            }elseif($_POST["tipoVivienda"]=="casa"){
                return "casa";
            }elseif($_POST["tipoVivienda"]=="chalet"){
                return "chalet";
            }
            else
            {
                return false;
            }
        }
    }

    function leerZona(){
        //Obtengo la zona 
        if(isset($_POST["zona"])){
            if($_POST["zona"]=="centro"){
                return "centro";
            }elseif($_POST["zona"]=="periferia"){
                return "periferia";
            }
            else
            {
                return false;
            }
        }
    }



    function leerDireccion(){
        if(isset($_POST["direccion"])){
            $direccion = ($_POST["direccion"]);
            return "direccion";
        }
        else
        {
            return false;
        }
    }



    function leerDormitorios(){
        if(isset($_POST["dormitorios"])){
            $dormitorios = ($_POST["dormitorios"]);
            return "$dormitorios";
        }
        else
        {
            return false;
        }
    }



    function leerPrecio(){
        if(isset($_POST["precio"]) && (is_numeric($_POST["precio"]) || is_numeric(str_replace(",",".",$_POST["precio"])))){
            $precio = ($_POST["precio"]);
            return $precio;
        }
        else
        {
            return false;
        }
    }



    function leerSuperficie(){
        if(isset($_POST["superficie"]) && (is_numeric($_POST["superficie"]) || is_numeric(str_replace(",",".",$_POST["superficie"])))){
            $superficie = ($_POST["superficie"]);
            return $superficie;
        }
        else
        {
            return false;
        }
    }



    function leerExtras(){
        if(isset($_POST["piscina"])){
            return "piscina";
        }
        elseif(isset($_POST["jardin"])){
            return "jardin";
        }
        elseif(isset($_POST["garaje"])){
            return "garaje";
        }
        else
        {
            return false;
        }
    }



    function leerObservaciones(){
        if(isset($_POST["observaciones"])){
            $observaciones = ($_POST["observaciones"]);
            return $observaciones;
        }
        else
        {
            return false;
        }
    }



    function leerFoto(){
    $target_dir = "C:\uploads/";
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Cheque si la imagen actual es real o no
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["archivo"]["tmp_name"]);
        if($check !== false) {
            //echo "El archivo es una imagen - " . $check["mime"] . ".<br>";
            return false;
            $uploadOk = 1;
        } else {
            //echo "El archivo no es una imagen.<br>";
            $uploadOk = 0;
        }
    }
    // Chequeo si el archivo existe o no
    if (file_exists($target_file)) {
        //echo "<br>Lo siento tu archivo ya existe.<br>";
        return false;
        $uploadOk = 0;
    }
    // Chequeo el tamaño del archivo
    if ($_FILES["archivo"]["size"] > 500000) {
        //echo "Lo siento tu archivo es demasiado largo.<br>";
        return false;
        $uploadOk = 0;
    }
    // Permito todos los formatos de imagenes
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Lo siento eso solo admite JPG, JPEG, PNG & GIF.<br>";
        return false;
        $uploadOk = 0;
    }
    // Chequeo si la varible $uploadok = 1
    if ($uploadOk == 0) {
        //echo "Lo siento no se pudo subir tu archivo.<br>";
        return false;
    // So todo esta bien se subira el archivo
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            //echo "El archivo ". basename( $_FILES["archivo"]["name"]). " ha sido subido<br>";
            return basename( $_FILES["archivo"]["name"]);
        } else {
           //echo "Lo siento, se producio un error al subir el archivo.<br>";
           return false;
        }
    }
}

   function obtencionVariables()
    {   
        $num = 1;
        $vivienda=leerTipoVivienda();
        $zona=leerZona();
        $direccion=leerDireccion();
        $dormitorio=leerDormitorios();
        $pre=leerPrecio();
        $super=leerSuperficie();
        $extra=leerExtras();
        $foto=leerFoto();
        $observar=leerObservaciones();
        if($vivienda!=false && $zona!=false && $direccion!=false && $direccion!=false&&$dormitorio!=false&&$pre!=false&&$super!=false&&$extra!=false&&$foto!=false&&$observar!=false)
        {
            if(!isset($_SESSION['cosas'])){
                $_SESSION['cosas'] = array();
                $primera = array("$vivienda","$zona","$direccion","$dormitorio","$pre","$super","$extra","$foto","$observar");
                $_SESSION['cosas'][]=$primera;
            }
            else
            {
                $siguiente =  array("$vivienda","$zona","$direccion","$dormitorio","$pre","$super","$extra","$foto","$observar");
                $_SESSION['cosas'][]=$siguiente;
            }

            foreach($_SESSION['cosas']as $i)
            {
                echo "<h1>El usuario ".$num." ha introducido los datos:</h1><br>";
                foreach($i as $fila)
                {
                    echo $fila."<br/>";
                }
                $num++;
                echo "<hr>";
            }
            echo "<A href=vivienda.php>Volver</A>";
        }
        else
        {
            echo "Campos vacios <A href=vivienda.php>Volver</A>";
        }
    }
    obtencionVariables();
?>