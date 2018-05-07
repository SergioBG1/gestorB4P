<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();
//Librerías requeridas una vez
require_once("libs/Smarty.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña o desde lugar desconocido
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass']) != null && (isset($_POST['cambiar']) || (isset($_POST['editar'])))) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new Smarty;
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $frases = '';
    $bd = new BD();
    //guardamos los datos que vamos a usar en variables
    $nombre = $_POST['nombre'];
    $plataforma = $_POST['plataforma'];
    $cantidad = $_POST['cantidad'];
    $id = $_POST['valor'];
    $congelado = $_POST['congelado'];
    //Comprobamos que se haya pulsado cambiar
    if (isset($_POST['cambiar'])) {
        $bd = new BD();
        $bd2 = $bd->actualizaProducto($nombre, $cantidad, $plataforma, $id, $congelado);
        if ($bd2 != null) {
            $frases = "Se ha cambiado correctamente";
        } else {
            $frases = "Error durante la edición.";
        }
    }

    //Enviamos las variables al .tpl.php
    $smarty->assign('nombre', $nombre);
    $smarty->assign('plataforma', $plataforma);
    $smarty->assign('cantidad', $cantidad);
    $smarty->assign('id', $id);
    $smarty->assign('congelado', $congelado);
    $smarty->assign('frases', $frases);

    $smarty->display('editarProducto.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Accesso irregular.</div></body>";
    header("Refresh:3,url=listarProducto.php");
}
?>

