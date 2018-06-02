<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();
//Librerías requeridas una vez
require_once("libs/Smarty.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['adm']) != null && isset($_SESSION['pass']) != null) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new Smarty;
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
    $smarty->assign("nombre", $_SESSION['adm']);
    //guardamos los datos que vamos a usar en variables
    $correo = $datos[0]['correo'];
    $frase = '';
    //Comprobamos que se haya pulsado cambiar
    if (isset($_POST['cambiar'])) {
        $correoNuevo = $_POST['mail'];
        $correo = $correoNuevo;
        $nombreNuevo = $_POST['nombre'];
        $bd2 = $bd->actualizaperfilADM($correo,$_SESSION['adm'],$nombreNuevo);
        if ($bd2 != null) {
            $frase = "Se han realizado los cambios correctamente.";
            $_SESSION['adm'] = $nombreNuevo;
        } else {
            $frase = "Error durante los cambios.";
        }
    }
    //Enviamos las variables al .tpl.php
    $smarty->assign("frase", $frase);
    $smarty->assign("correo", $correo);
    $smarty->assign("nombre", $_SESSION['adm']);
    $smarty->display('editarPerfilADM.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Algo ha ocurrido mal. Volviendo a perfil de ADM</div></body>";
    header("Refresh:3,url=perfilADM.php");
}
?>
