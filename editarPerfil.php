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
       $datos= $bd->consigueDatos($_SESSION['usuario']);
      $correo= $datos[0]['correo'];
      $direccion= $datos[0]['direccion'];
          $frases='';
   // $objetos = $bd->obtieneDatosEmpresas($_SESSION['usuario']);
     if (isset($_POST['cambiar'])) {
         $correoNuevo=$_POST['mail'];
         $correo = $correoNuevo;
         $direccionNueva=$_POST['direccion'];
         $direccion = $direccionNueva;
         $bd2=$bd->actualizaPefilEmpresa($correoNuevo, $direccionNueva, $_SESSION['usuario']);
            if($bd2 != null){
            $frases = "Se han realizado los cambios correctamente.";
        }else{
             $frases = "Error durante los cambios.";
        }
        } 
        $smarty->assign("frases", $frases);
      $smarty->assign("correo", $correo);
      $smarty->assign("direccion", $direccion);
    $smarty->display('editarPerfil.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "No puedes acceder sin loguear. ERROR";
    header("Refresh:3,url=login.php");
}
?>

