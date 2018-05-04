<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();

        require_once("libs/SmartyBC.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass']) != null) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
$smarty = new SmartyBC();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
    // $objetos = $bd->obtieneDatosEmpresas($_SESSION['usuario']);
    $array = $bd->listarEventosMedio();
    $empresas=[];
    $num=0;
    foreach($array as $valor){
        $e = $bd->consigueNombre($valor['id_empresa_e']);
        $empresa[] = $e[0]['usuario'];
    }
    $smarty->assign("array", $array);
    $smarty->assign("empresa", $empresa);
     $smarty->assign("num", $num);
    $smarty->assign("nombre", $_SESSION['usuario']);
    $smarty->display('listadoEventoMedio.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "Acceso irregular. Volviendo a Medio.";
    header("Refresh:3,url=inicioMedio.php");
}
?>

