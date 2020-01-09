
<?php
function comprobar($pwd)
{
    try {
        $a = true;
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "root", "123456", $opciones);
        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT contrasena FROM usuarios where usuario=\"paco\"";
        $resultado = $dwes->query($sql);
        $row = $resultado->fetch();
        $password="((${row['contrasena']})";
        $md = (md5("$pwd"));
        if ($password == $md) {
            return print_r($a);
        } else {
            $a = false;
            return print_r($a);
        }
    } catch (PDOException $e) {
        $error = $e->getCode();
        $mensaje = $e->getMessage();
    }
}

print_r(md5("paco"));
print_r("-------------------1311020666a5776c57d265ace682dc46");

/* print_r(comprobar("paco")); */



?>