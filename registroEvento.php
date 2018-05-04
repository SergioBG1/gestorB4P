<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();

require_once("libs/Smarty.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass']) != null) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new Smarty;
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
   // $objetos = $bd->obtieneDatosEmpresas($_SESSION['usuario']);
     if (isset($_POST['anadir'])) {
         $evento=$_POST['event'];
         $ciudad=$_POST['city'];
         $plazas=$_POST['plazas'];
         $bd->creaEvento($evento, $ciudad, $plazas, $_SESSION['id']);
        }                    
    $smarty->display('registroEvento.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "No puedes acceder sin loguear. ERROR";
    header("Refresh:3,url=login.php");
}
?>

