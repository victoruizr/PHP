<html>
<head>
	<title>	Prueba de PHP</title>
</head>
<body>
<?php

$array=array(TRUE,FALSE,1,0,-1,"1","0","-1",NULL,array(),"php","");
print_r("<table border=0>");
for ($i=0;$i<12;$i++){
    print_r("<tr>".$array[$i]);
    for($j=0;$j<12;$j++){
        print_r("<td>".($array[$i]===$array[$j])."</td>");
    }
print_r("</tr>");
}
print_r("</table>");

?>
</body>
</html>