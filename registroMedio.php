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
            $direccion = $_POST['direccion'];
            $visitas = $_POST['visitas'];
            $url = $_POST['url'];
            $seguidores = $_POST['seguidores'];
            $bd = new BD();
            $correosPeticion = $bd->listarCorreoPeticionMedio();
            $correosRegistrados = $bd->listarCorreoMedio();
            $correosGeneral = array_merge($correosPeticion, $correosRegistrados);
            $urlsRegistrados = $bd->listarURLMedio();
            $urlsPeticion = $bd->listarURLPeticionMedio();
            $urlsGeneral = array_merge($urlsRegistrados, $urlsPeticion);
            $existe = false;
            $existe2 = false;
            foreach ($correosGeneral as $correoBueno) {
                if ($correoBueno['correo'] === $_POST['correo']) {
                    $existe = true;
                }
            }
            foreach ($urlsGeneral as $urlBuena) {
                if ($urlBuena['url'] === $_POST['url']) {
                    $existe2 = true;
                }
            }
            // $urls = $bd ->listarURLPeticionMedio();
            if ($existe === false) {
                if ($existe2 === false) {
                    $bd2 = $bd->peticionMedio($nombre, $correo, $pass, $direccion, $visitas, $url, $seguidores);
                    if ($bd2 != null) {
                        $frase = "La petición se ha realizado con éxito. Recibirás respuesta con la mayor brevedad posible";
                    } else {
                        $frase = "Error en el registro.";
                    }
                } else {
                    $frase = "Ya existe esta url como registrado.";
                }
            } else {
                $frase .= "Ya existe este correo como registrado.";
            }
        }
        $smarty->assign("frase", $frase);
        $smarty->display('registroMedio.tpl');
        ?>


    </body>
</html>
