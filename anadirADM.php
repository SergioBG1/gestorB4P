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
        $frase = '';

        //Comprobación de usuarios

        if (isset($_POST['enviar'])) {
            $nombre = $_POST['user'];
            $correo = $_POST['correo'];
            $pass = $_POST['pass'];
            $bd = new BD();
            $correosRegistrados = $bd->listarCorreoADM();
            $existe = false;
            foreach ($correosRegistrados as $correoBueno) {
                if ($correoBueno['correo'] === $_POST['correo']) {
                    $existe = true;
                }
            }
            // $urls = $bd ->listarURLPeticionMedio();
            if ($existe === false) {
                    $bd2 = $bd->anadeADM($nombre, $correo, md5($pass));
                    if ($bd2 != null) {
                        $frase = "Se ha añadido un nuevo ADMINISTRADOR";
                    } else {
                        $frase = "Error en el registro.";
                    }
            } else {
                $frase .= "Ya existe este correo como registrado.";
            }
        }
        $smarty->assign("frase", $frase);
        $smarty->display('anadirADM.tpl');
        ?>


    </body>
</html>
