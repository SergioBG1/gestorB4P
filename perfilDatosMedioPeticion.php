<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();
//Librerías requeridas una vez
require_once("libs/Smarty.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass']) != null && isset($_POST['nombre'])) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new Smarty;
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
    $smarty->assign("nombre", $_POST['nombre']);
    //guardamos los datos que vamos a usar en variables
    $datos = $bd->consigueDatosMedio($_POST['nombre']);
    $correo = $datos[0]['correo'];
    $seguidores = $datos[0]['seguidores'];
    $direccion = $datos[0]['direccion'];
    $url = $datos[0]['url'];
    $visitas = $datos[0]['visitas'];
    $frase = '';
    //Comprobamos que se haya pulsado cambiar
    
    //Enviamos las variables al .tpl.php
    $smarty->assign("frase", $frase);
    $smarty->assign("correo", $correo);
      $smarty->assign('rol',$_SESSION['rol']);
    $smarty->assign("direccion", $direccion);
    $smarty->assign("url", $url);
    $smarty->assign("seguidores", $seguidores);
    $smarty->assign("visitas", $visitas);
    $smarty->display('perfilDatosMedioPeticion.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>ERROR.Volviendo a zona anterior</div></body>";
    header("Refresh:3,url=perfilEmpresa.php");
}
?>

