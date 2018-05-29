<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();
//Librerías requeridas una vez
require_once("libs/SmartyBC.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['medio']) != null && isset($_SESSION['pass']) != null) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new SmartyBC();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
    //guardamos los datos que vamos a usar en variables
    $array = $bd->listarProductosMedio();
    $empresas = [];
    $num = 0;
    $peticion=0;
    foreach ($array as $valor) {
        $e = $bd->consigueNombre($valor['id_empresa_p']);
        $empresa[] = $e[0]['usuario'];
    }
    if (isset($_POST['solicitar'])) {
      $bd->anadirPeticionProducto($_POST['medio'], $_POST['producto'], $_POST['empresa']);
    }
     $idMedio=$bd->consigueIDMedio($_SESSION['medio']);
     $conjuntoPeticiones = $bd->listarPeticionesProductoMedio($idMedio[0]['id_medio']);
    //Enviamos las variables al .tpl.php
    $smarty->assign("array", $array);
    $smarty->assign("empresa", $empresa);
    $smarty->assign("num", $num);
    $smarty->assign("nombre", $_SESSION['medio']);
    $smarty->assign("idMedio", $idMedio);
    $smarty->assign("conjuntoPeticiones", $conjuntoPeticiones);
    $smarty->assign("peticion", $peticion);
    $smarty->display('listadoProductoMedio.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Acceso irregular. Volviendo a Medio.</div></body>";
    header("Refresh:3,url=perfilMedio.php");
}
?>

