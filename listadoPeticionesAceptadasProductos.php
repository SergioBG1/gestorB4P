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
    $id=$bd->consigueIDMedio($_SESSION['medio']);
     $numero=0;
     $productos=array();
    //guardamos los datos que vamos a usar en variables
    $array = $bd->listarPeticionMedioAceptadasProducto($id[0]['id_medio']);
     foreach($array as $item){
        $productos[]=$bd->consigueDatosProducto($item['id_producto_u']);
    }

  
    //Enviamos las variables al .tpl.php
    $smarty->assign("array", $array);
     $smarty->assign("numero", $numero);
     $smarty->assign("productos", $productos);
    $smarty->display('listadoPeticionesAceptadasProductos.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Acceso irregular. Volviendo a Medio.</div></body>";
    header("Refresh:3,url=perfilMedio.php");
}
?>

