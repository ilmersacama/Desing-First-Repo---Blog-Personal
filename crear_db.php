<?php

$conexion = mysql_connect("localhost","ilmersa","ilmersa");
if(!$conexion){
die('No he podido conectar: '.mysql_error());
}

if(mysql_query("CREATE DATABASE blog",$conexion))
{
echo "Se ha creado la base de datos";
}
else{
echo "No se ha podido crear la base de datos por el siguiente error: ". mysql_error();
}


//Preparo esta peticion

mysql_select_db("blog",$conexion);
$sql = "CREATE TABLE miblog
(
personaID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(personaID),
nombre varchar(15) Not Null,
mail varchar(100) Not Null,
obs varchar(2000) Not Null
)";

//Ejecuto la peticion
mysql_query($sql,$conexion);

//Cerrar la conexion

mysql_close($conexion);

?>