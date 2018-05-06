<?php

//Iniciamiamos sesion para usar variables de SESSION
session_start();

require_once("libs/Smarty.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass']) != null && (isset($_POST['cambiar']) || (isset($_POST['editar'])))){
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new Smarty;
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
   // $objetos = $bd->obtieneDatosEmpresas($_SESSION['usuario']);
         $evento=$_POST['nombre'];
         $ciudad=$_POST['ciudad'];
         $plazas=$_POST['plazas'];
         $id = $_POST['valor'];
         if(isset($_POST['cambiar'])){
             $bd= new BD();
             $bd->actualizaEvento($evento, $ciudad, $plazas, $id);
         }
         $smarty->assign('evento',$evento);
         $smarty->assign('ciudad',$ciudad);
         $smarty->assign('plazas',$plazas);
         $smarty->assign('id',$id);
    $smarty->display('editarEvento.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
                        echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Accesso irregular.</div></body>";
    header("Refresh:3,url=listarEvento.php");
}
?>

