<?php

function conectar(){ //Función para conectar con la base de datos
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=instituto', 'root', '123456');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }  
    return $conexion;
}

function transaccion(){
    try {
        // First of all, let's begin a transaction
        $conexion=conectar();
        $conexion->beginTransaction();
    
        // A set of queries; if one fails, an exception should be thrown
        $conexion->query("INSERT INTO alumno VALUES('12','El primo de','Zidane','777','04')");
        
        // If we arrive here, it means that no exception was thrown
        // i.e. no query has failed, and we can commit the transaction
        $conexion->commit();
    } catch (PDOException $e) {
        // An exception has been thrown
        // We must rollback the transaction
        $conexion->rollback();
        echo('Error al insertar');
    }
}


transaccion();

?>