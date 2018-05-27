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
    //Imágenes para el Slider
    $arrayImagenes = ["PS4" => ['http://localhost/gestorB4P/imagenes/ps4.jpg', 'http://localhost/gestorB4P/imagenes/ps4-2.jpg', 'http://d3rb1fnkiuufz4.cloudfront.net/playstation-4-pro-painted/product-details/images/size-1000/1.jpg'],
        "ONE" => ['http://localhost/gestorB4P/imagenes/xbox.jpg', 'http://localhost/gestorB4P/imagenes/xbox2.jpg', 'http://localhost/gestorB4P/imagenes/xbox3.jpg'],
        "PC" => ['http://localhost/gestorB4P/imagenes/pc.jpg', 'http://localhost/gestorB4P/imagenes/pc2.jpg', 'http://localhost/gestorB4P/imagenes/pc3.jpg']];
    $datos = $bd->listarProductosMedioCarousel();
    $imagenFinales = [];
    $i = 0;
    foreach ($datos as $dato) {
        $plataforma = $dato['plataforma'];
        if ($i < 3) {
            $imagenFinales[] = $arrayImagenes[$plataforma][$i];
        }
        $i++;
    }

    //Enviamos variables a tpl.php
        $smarty->assign('usuario',$_SESSION['usuario']);
    $smarty->assign("datos", $datos);
    $smarty->assign("imagenFinales", $imagenFinales);
    $smarty->display('perfilMedio.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>No puedes acceder sin loguear. ERROR.</div></body>";
    header("Refresh:3,url=login.php");
}
?>

