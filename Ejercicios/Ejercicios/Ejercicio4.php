<html>

<head>
    <title> Prueba de PHP</title>
</head>

<body>
    <?php
    //si la funcion es vacion decir hola, buenos dias en caso de que 
    function saludo($texto = "Buenos dias", $nombre = "Victor")
    {
        return $texto . " " . $nombre;
    }

    print_r(saludo("Buenas tardes"));
    print_r(saludo());
    print_r(saludo(null));
    //-------------
    //funcion que devuelva el valor de un articulo con iva
    // paso de parametro y devuelve el iva
    function precioconiva(&$precio, $iva = 0.21)
    {
        $total = $precio +($precio*$iva);
        return $total;
    }

print_r("<br>");
    $precio = 100;
    $iva = 0.04;
    print_r(precioconiva($precio,$iva));
    print_r("<br>");

    //funcion que devuelva el menor de los numeros que le pase
    function mayormenor(...$numeros)
    {
        $min = $numeros[0];
        $mayor = $numeros[0];
        foreach ($numeros as $n) {
            if ($n < $min) {
                $min = $n;
            }
            elseif($n > $min){
                $mayor=$n;
            }
        }
        $array = array(
             'Menor' => ($min),
             'Mayor' => ($mayor),
        );
        return $array;
    }

    print_r(mayormenor(1, 3, 5, 7));

    //funcion smatoria
    function sumatorio(&$resultado, ...$numeros)
    {
        $acc = 0;
        foreach ($numeros as $n) {
            $acc += $n;
        }
        $resultado = $n;
    }
    
    print_r("<bR>");
    //---------------
    $resultado=25;
    function acumula(&$suma, ...$numeros)
    {
        //acumula sobre el sumatorio de los parametros
        //y los guarda en el parametro resultado 
        //$suma = 0;
        foreach ($numeros as $n) {
            $suma += $n;
        }
        return $suma;
    }
    print_r($resultado."<br>");
    print_r(acumula($resultado, 1, 2, 3));
    print_r("<br>");
    print_r($resultado);


    print_r("<br>");
    //recorrer un array hasta que se ecuentre el numero 13
    //este tiene que devolver la suma y la posicion del 13
    $array = array(1, 2, 3, 13, 4, 5, 6, 7, 8, 9, 13, 11, 12);
    function sumaHasta($array, $token)
    {
        //duncion que devuelve un array hasta encontrar el token
        // y devuekve array de suma y posicion del token
        $suma = 0;
        while (current($array) != $token) {
            $suma += current($array);
            next($array);
        }
        return array($suma, key($array));
    }

    print_r(sumaHasta($array, 12));







    ?>
</body>

</html>