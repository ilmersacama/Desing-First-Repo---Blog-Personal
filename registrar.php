<?php

//Recibo las variables de formulario

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$mensaje = $_POST['obs'];

//Te muestro las variables

echo "<h3>El mensaje que has enviado es:</h3>";
echo "<br />";
echo "<p>Nombre: ";
echo $nombre;
echo "<br />";
echo "Email: ";
echo $mail;
echo "<br />";
echo "Mensaje: ";
echo $mensaje;
echo "</p>";

    //Conectar con el servidor MySQL
 
    $conexion = mysql_connect("localhost","ilmersa","ilmersa");
	if(!$conexion){
die('No he podido conectar: '.mysql_error());
}
     
    //Seleccionar la BD a utilizar
    mysql_select_db("blog",$conexion) or die (mysql_error());
	
	     
    //Insertar datos de form en la BD
mysql_query("
INSERT INTO miblog(nombre,mail,obs)
VALUES('$_REQUEST[nombre]','$_REQUEST[email]','$_REQUEST[obs]')",$conexion)or die("problemas al insertar registro".mysql_error());
 
    // Le  Envio  un correo electronico  de bienvenida
    $destinatario = "ilmer_sa@hotmail.com";      //A quien se envia
	$asunto = "Has recibido un correo del Blog"; //asunto
    $nom = $nombre;      						 //Quien envia
    $mail = $mail;       						 //Mail de quien envia
    $mensaje = $mensaje;						 //comentarios
	$urlAccess = "http://localhost/registro";       //Url de la pantalla de registro
    /*$cuerpomsg ="
    <p>Su mensaje ha sido enviado con exito.</p>
        <table border="0">
		 <tr>
           <td colspan="2" align="center" >Sus datos de acceso para <a href="'.$urlAccess.'">'.$urlAccess.'</a><br></td>
        </tr>
        <tr>
            <td> Nombre </td>
            <td> <b>'.$nom.'</b> </td>
        </tr>
        <tr>
            <td> Email </td>
            <td> <b>'.$mail.'</b> </td>
        </tr>
        <tr>
            <td> Comentarios </td>
            <td> <b>'.$mensaje.'</b> </td>
        </tr>
        </table> <br/><br/>
    <p><b>Gracias por su preferencia, hasta pronto.</b></p> <br><br>";
 
    date_default_timezone_set('America/Mexico_City');
 
    //Establecer cabeceras para la funcion mail()
    //version MIME
    $cabeceras = "MIME-Version: 1.0\r\n";
    //Tipo de info
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //direccion del remitente
    $cabeceras .= "From: ".$nom." <".$mail.">";
    $i_EmailEnviado = 0;*/
    $mensajemail = $nombre." con el email ".$mail." te ha enviado un mensaje que dice ".$mensaje;
    //Si se envio el email
    if(mail($destinatario,$asunto,$cuerpomsg,$mensajemail))
	{
		echo "Tu email se ha enviado correctamente";
		$i_EmailEnviado = 1;
	}
	else{
		echo "El envio del mail ha fallado";
		}
   //Cerrrar conexion a la BD
    mysql_close($conexion);
 
    // Mostrar resultado del registro
    ?>
   <form id="form_registro_status" name="form_registro_status" method="post" action="welcome.html">
        <input type="hidden" name="status_registro" value="1" />
        <input type="hidden" name="i_EmailEnviado" value='<?php echo $i_EmailEnviado ?>' />
    </form>
    <script type="text/javascript">
        //Redireccionar con el formulario creado
        document.form_registro_status.submit();
    </script>
</body>
</html>