
<?php

$conexion;
function conectar_db()
{
    global $conexion;
    //Conectar con el servidor MySQL
 
    $conexion = mysql_connect("localhost","ilmersa","ilmersa") or die (mysql_error());
     
    //Seleccionar la BD a utilizar
    mysql_select_db("blog",$conexion) or die (mysql_error());
}  
?>