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
      $smarty->assign("nombre", $_SESSION['usuario']);
       $datos= $bd->consigueDatosMedio($_SESSION['usuario']);
      $correo= $datos[0]['correo'];
      $seguidores= $datos[0]['seguidores'];
      $direccion= $datos[0]['direccion'];
      $url= $datos[0]['url'];
     $visitas= $datos[0]['visitas'];
$frase='';
   // $objetos = $bd->obtieneDatosEmpresas($_SESSION['usuario']);
     if (isset($_POST['cambiar'])) {
         $correoNuevo=$_POST['mail'];
         $correo = $correoNuevo;
         $direccionNueva=$_POST['direccion'];
         $direccion = $direccionNueva;
         $seguidoresNuevo = $_POST['seguidores'];
         $seguidores = $seguidoresNuevo;
         $urlNueva = $_POST['url'];
         $url = $urlNueva;
         $visitasNuevas = $_POST['visitas'];
         $visitas = $visitasNuevas;
        $bd2=$bd->actualizaPerfilMedio($correoNuevo, $direccionNueva,$visitas,$url,$seguidores, $_SESSION['usuario']);
        if($bd2 != null){
            $frase = "Se han realizado los cambios correctamente.";
        }else{
             $frase = "Error durante los cambios.";
        }
        } 
        $smarty->assign("frase", $frase);
      $smarty->assign("correo", $correo);
      $smarty->assign("direccion", $direccion);
      $smarty->assign("url", $url);
      $smarty->assign("seguidores", $seguidores);
      $smarty->assign("visitas", $visitas);
    $smarty->display('editarPerfilMedio.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "No puedes acceder sin loguear. ERROR";
    header("Refresh:3,url=login.php");
}
?>

