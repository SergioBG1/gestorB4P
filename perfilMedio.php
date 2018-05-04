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
    $arrayImagenes=["PS4" => ['https://www.lapulga.com.do/f/6140445-1.jpg','https://cdn2.cnet.com/img/aLzljNB4QhApMkP7YSjLt8tGnlA=/770x433/2016/09/07/26403e2f-3a84-4e7b-a18a-debeac422bb9/sony-playstation-4-pro-03.jpg','http://d3rb1fnkiuufz4.cloudfront.net/playstation-4-pro-painted/product-details/images/size-1000/1.jpg'], 
        "ONE" => ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvAkbXdXCg6a5uwmIV1gWN2eI08EawOimJqrk-sZqAcN8yJpHjHw','https://media.redadn.es/imagenes/xbox-one_312469.jpg','http://www.viax.cl/wp-content/uploads/2017/08/xbox-one.jpg'] , 
        "PC" => ['https://www.muycomputer.com/wp-content/uploads/2017/09/calor-1.jpg','https://www.muycomputer.com/wp-content/uploads/2016/11/OrdenadoresAIO-1.jpg','http://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2018/01/04/15150226205414.jpg']];
    $datos = $bd->listarProductosMedioCarousel();
    $imagenFinales=[];
    $i=0;
    foreach($datos as $dato){
        $plataforma = $dato['plataforma'];
        if($i<3){
            $imagenFinales[]=$arrayImagenes[$plataforma][$i];
        }
        $i++;
    }
    $smarty->assign("datos", $datos);
     $smarty->assign("imagenFinales", $imagenFinales);
        $smarty->display('perfilMedio.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "No puedes acceder sin loguear. ERROR";
    header("Refresh:3,url=login.php");
}
?>

