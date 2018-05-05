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
         $producto=$_POST['product'];
         $cantidad=$_POST['cantidad'];
         $plataforma=$_POST['plataforma'];
         $bd->creaProducto($producto, $cantidad, $plataforma, $_SESSION['id']);
        }                    
    $smarty->display('registroProducto.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
                        echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>No puedes acceder sin loguear. ERROR.</div></body>";
    header("Refresh:3,url=login.php");
}
?>

