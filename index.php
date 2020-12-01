<?php

$errores='';
$enviado='';
$mensaje='';
//setear si es que existe el envio de datos
if(isset($_POST["submit"]))
{
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    //comprobacion del nombre
    //si no hay nombre 
    if(!empty($nombre))
    {
        //quita el espaciado 
        $nombre = trim($nombre);
        //sanea el nombre
        $nombre = filter_var($nombre,FILTER_SANITIZE_STRING);
    }
    else
    {
        $errores .= 'Por favor ingresa un nombre <br/>';
    }

    //comprobacion del correo
    //si no hay correo
    if(!empty($correo))
    {
        $correo = filter_var($correo,FILTER_SANITIZE_EMAIL);
        if( filter_var($correo,FILTER_VALIDATE_EMAIL))
        {
            $errores .= 'Por favor ingresa un correo valido <br/>';
    
        }
    else{
            $errores .= 'Por favor ingresa un correo <br/>';
        }
   
    }
     //comprobacion de mensaje
    //si no hay mensajes
    if(!empty($mensaje))
    {
        //quitar caracteres de html
        $mensaje = htmlspecialchars($mensaje);
        //quitar espaciados
        $mensaje = trim($mensaje);
        //quitar / cuando lo ingresa el usuario 
        $mensaje = stripslashes($mensaje);

    }
    else
    {
        $errores .= 'Por favor ingresa el mensaje';
    }

    //si no hay errores 
    if(!$errores)
    {
        //preparando los mensaje de cada variable
        $enviar_a='tunombre@tuempresa.com';
        $asunto = 'Correo enviado desde miPagina.com';
        $mensaje_preparado = "De:$nombre \n";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje:" . $mensaje;

        //se tieene que subir en un hosting el proyecto
        //para que funcione la funcion
       // mail($enviar_a,$asunto,$mensaje_preparado);
        $enviado='true';

    }

}

require 'index.view.php';

?>