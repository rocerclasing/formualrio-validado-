<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios Contactos</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrap">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
                                                                                                 <!--si la variable enviado es falsa -->    
                                                                                                 <!--si la variable nombre esta seteada se muestra por pantalla -->       
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>"></input>
        <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo:" value="<?php if(!$enviado && isset($correo)) echo $correo ?>"></input>
        
        <textarea name="mensaje" placeholder="Mensaje:" class="form.control" id="mensaje" ><?php if(!$enviado && isset($mensaje)) echo $mensaje ?></textarea>
            
            <!--Si no esta vacia la variable $errores-->
            <?php if(!empty($errores)): ?>
                <div class="alert error">
                    <?php echo $errores; ?>
                </div>
                <!--si enviado es verdadero-->
                <?php elseif($enviado):?>
                    <div class="alert success">
                    <p>Enviado correctamente</p>
                </div>
            <?php endif ?>   
        
        <input type="submit" name="submit" class="btn btn-primary" value="EnviarCorreo">
        </form>
    
    </div>
</body>
</html>