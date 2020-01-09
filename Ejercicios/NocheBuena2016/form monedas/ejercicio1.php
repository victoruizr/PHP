<?php
// formulario que haga la conversion entre euro y libra
// cuando hacemos el cambio cobra una comision del 2% peeeero que se pueda poner otra comision
function cambiarMoneda($valor, $moneda){
    $cambioMonedas = array(
        'EURGBP' => 0.89,
        'GBPEUR' => 1.12
    );
    if ($moneda == "euro") 
        return intval($valor) * $cambioMonedas['EURGBP'];
    else
        return intval($valor) * $cambioMonedas['GBPEUR'];
}


function comision($cantidad, $comision= 0.02){
    return $cantidad*$comision;
}

function neto($cantidad, $comision){
    return $cantidad-$comision;
}
INCLUDE("pagina.php");
if($_POST["comisiones"]==""){
    print_r( "se te va a pagar " . cambiarMoneda($_POST["valor"],$_POST["moneda"]) . " menos " . comision(cambiarMoneda($_POST["valor"],$_POST["moneda"])) . " en comisiones");
    print_r( "<br/>");
    print_r( "se te ingresa " .  neto(cambiarMoneda($_POST["valor"],$_POST["moneda"]), comision(cambiarMoneda($_POST["valor"],$_POST["moneda"]))));
    
}else{
    print_r( "se te va a pagar " . cambiarMoneda($_POST["valor"],$_POST["moneda"]) . " menos " . comision(cambiarMoneda($_POST["valor"],$_POST["moneda"]), $_POST["comisiones"]) . " en comisiones");
    print_r( "<br/>");
    print_r( "se te ingresa " .  neto(cambiarMoneda($_POST["valor"],$_POST["moneda"]), comision(cambiarMoneda($_POST["valor"],$_POST["moneda"]), $_POST["comisiones"])));
    
}


?>