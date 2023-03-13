// ActionScript Document
//Función que verifica campos del formulario vacíos
  function validar() {

/* SE OBTIENEN LOS ELEMENTOS NOMBRE, EDAD Y MAIL */
	fnombre = document.getElementById('nombre');
	mail = document.getElementById('mail');
	obser = document.getElementById('obs');

/* SELECCIONA LAS ETIQUETAS DE ERROR Y LAS OCULTA */
  sp_fnombre = document.getElementById('error_'+fnombre.id );
  sp_fnombre.setAttribute('style','display: none');

  sp_mail = document.getElementById('error_'+mail.id);
  sp_mail.setAttribute('style','display: none');

  sp_obser = document.getElementById('error_'+obser.id);
  sp_obser.setAttribute('style','display: none');

continuar = true; /*envio activado por defecto*/

  /*SE EVALUAN LAS EXPRESIONES*/
  /* 1- QUE El CAMPO NOMBRE NO ESTE VACIO*/
if (fnombre.value.length == 0)
	{
    	sp_fnombre.innerHTML = "Por favor digite un nombre válido";
    	sp_fnombre.setAttribute('style','display:inline');
    	continuar = false; /*se desactiva el envio y se muestra el mensaje de error*/
  	}
/*2- SE VALIDA LA EXPRESION REGULAR PARA E-MAIL*/
if (/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test(mail.value))
	{
        /*no hacer nada*/
  	}
  	else
	{
 		sp_mail.innerHTML = "Por favor digite un e-mail válido";
 		sp_mail.setAttribute('style','display:inline');
 		continuar = false; /*se desactiva el envio y se muestra el mensaje de error*/
 	}
 /* 3- QUE El CAMPO DE COMENTARIOS NO ESTE VACIO*/
if (obser.value.length == 0)
	{
    	sp_obser.innerHTML = "Por favor introduzca sus comentarios";
    	sp_obser.setAttribute('style','display:inline');
    	continuar = false; /*se desactiva el envio y se muestra el mensaje de error*/
  	}
  /*CUALQUIERA DE LAS EVALUACIONES ANTERIORES PUEDE ANULAR EL ENVIO*/
  return continuar;
}