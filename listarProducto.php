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
    $array = $bd->listarProductos($_SESSION['id']);
    $smarty->assign("array", $array);
    $smarty->assign("nombre", $_SESSION['usuario']);
    if(isset($_POST['eliminar'])){
       $bd->eliminaProducto($_POST['valor']);
       header("Location:listarProducto.php");
    }
    $smarty->display('listarProducto.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "Acceso irregular. Volviendo a Medio.";
    header("Refresh:3,url=inicioMedio.php");
}
?>

