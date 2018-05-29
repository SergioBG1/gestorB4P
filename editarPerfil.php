<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();
//Librerías requeridas una vez
require_once("libs/Smarty.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña o desde lugar desconocido
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass']) != null) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new Smarty;
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
    //guardamos los datos que vamos a usar en variables
    $smarty->assign("nombre", $_SESSION['usuario']);
    $datos = $bd->consigueDatos($_SESSION['usuario']);
    $correo = $datos[0]['correo'];
    $direccion = $datos[0]['direccion'];
    $frases = '';
    //Comprobamos que se haya pulsado cambiar
    if (isset($_POST['cambiar'])) {
        $correoNuevo = $_POST['mail'];
        $correo = $correoNuevo;
        $direccionNueva = $_POST['direccion'];
        $direccion = $direccionNueva;
        $bd2 = $bd->actualizaPefilEmpresa($correoNuevo, $direccionNueva, $_SESSION['usuario']);
        if ($bd2 != null) {
            $frases = "Se han realizado los cambios correctamente.";
        } else {
            $frases = "Error durante los cambios.";
        }
    }
    //Enviamos las variables al .tpl.php
      $smarty->assign('rol',$_SESSION['rol']);
    $smarty->assign("frases", $frases);
    $smarty->assign("correo", $correo);
    $smarty->assign("direccion", $direccion);
    $smarty->display('editarPerfil.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Acceso irregular. Volviendo a zona anterior.</div></body>";
    header("Refresh:3,url=perfilEmpresa.php");
}
?>

