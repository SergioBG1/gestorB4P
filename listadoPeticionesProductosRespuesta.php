<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();
//Librerías requeridas una vez
require_once("libs/SmartyBC.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass']) != null && isset($_POST['peticion'])) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new SmartyBC();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
    $numero=0;
    $texto='';
    //guardamos los datos que vamos a usar en variable
    $id_empresa=$bd->consigueID($_SESSION['usuario']);
    $array = $bd->listarPeticionProducto($id_empresa[0]['id_empresa']);
       if (isset($_POST['aceptar'])) {
      $bd->aceptaPeticionProducto($_POST['peticion']);
    }
    if(isset($_POST['proporcionar'])){
        $bd->proporcionaSegumientoPeticionProducto($_POST['peticion'], $_POST['seguimiento']);
        if($bd!=null){
        $texto='El seguimiento se ha actualizado';
        }
    }

    //Enviamos las variables al .tpl.php
    $smarty->assign("array", $array);
            $smarty->assign("texto",$texto);
     $smarty->assign("peticion", $_POST['peticion']);
    $smarty->display('listadoPeticionesProductosRespuesta.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Acceso irregular. Volviendo a anterior apartado.</div></body>";
    header("Refresh:3,url=listadoPeticionesProductos2.php");
}
?>

