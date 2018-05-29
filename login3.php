<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
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
        $frase = '';
        $smarty->assign("frase", $frase);
        //Comprobación de usuarios
        if (isset($_POST['enviar'])) {
            $user = $_POST['user'];
            $contrasena = md5($_POST['pass']);
            $bd = new BD();
            $a = $bd->verificarMedio($user, $contrasena);
            if ($a === true) {
                $_SESSION['medio'] = $user;
                $_SESSION['pass'] = $contrasena;
                header("Location:perfilMedio.php");
            } else {
                $frase = "Usuario introducido incorrecto<br>";
                $smarty->assign("frase", $frase);
            }
        }

        $smarty->display('login3.tpl');
        ?>


    </body>
</html>
