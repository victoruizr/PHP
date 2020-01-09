<?php

/* Iniciar una transacción, desactivando 'autocommit' */
$gbd->beginTransaction();

/* Cambiar el esquema y datos de la base de datos */
try {
    $gsent = $gbd->exec("DROP TABLE fruit");
    $gsent = $gbd->exec("UPDATE dessert
    SET name = 'hamburger'");
/* Reconocer un error y revertir los cambios */
    }catch(PDOException $e){
        $gbd->rollBack();
    }

/* La conexión a la base de datos ahora vuelve al modo 'autocommit' */
?>