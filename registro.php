<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Librerías requeridas una vez
        require_once("libs/Smarty.class.php");
        require_once ('BD.php');
//Iniciamos sesion para usar variables de SESSION y eliminamos los restos que pueda haber
        session_start();
        session_unset();
//Configuramos SMARTY
        $smarty = new Smarty;
        $smarty->template_dir = 'templates';
        $smarty->compile_dir = 'templates_c';
        $smarty->config_dir = 'configs';
        $smarty->cache_dir = 'cache';
     
        //Comprobación de usuarios
      
        
        $smarty->display('registro.tpl');
        ?>


    </body>
</html>
