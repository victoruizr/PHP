<?php
function calculoMonedasDesplegable($cambio, $cantidad, $comision=0.02){
    switch ($cambio) {
        case 0: $calculador= 0; break;
        case 1: $calculador= 0.89; break;
        case 2: $calculador= 1.12; break;
        case 3: $calculador= 0.92; break;
        case 4: $calculador= 1.09; break;
        case 5: $calculador= 1.22; break;
        case 6: $calculador= 0.82; break;
        default: $calculador = 0.89; break;
    }
    
    $resultadoSinComi = $calculador * $cantidad;
    
    if($_POST["comision"]!=""){
        $comision=$_POST["comision"];
    }else{
        $comision=0.02;
    }
        $resultadoConComi = $resultadoSinComi - ($resultadoSinComi * $comision);
        
        return $resultadoConComi;   
}
echo calculoMonedasDesplegable($_POST['desplegable'], $_POST['valor'], $_POST['comision']);
?>
<!-- nombre alumno y asignaturas de las que se matricula en checkBox -->