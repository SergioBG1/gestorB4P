<?php
function enviaCorreo($correo,$nombre,$textoBody){
require 'PHPMailerAutoload.php';
if (empty($errors)) {
    $mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch
try {                              // Enable verbose debug output
    $mail->isSMTP();                                    // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                             // Enable SMTP authentication
    $mail->Username = 'gestordistribucionb4p@gmail.com';           // SMTP username
    $mail->Password = 'gestorB11';                       // SMTP password                        // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                  // TCP port to connect, tls=587, ssl=465
    $mail->From = 'gestordistribucionb4p@gmail.com';
    $mail->FromName = 'Gestor Distribución B4P';
    $bd2 =new BD();
    $array =  $bd2->listarCorreoADM();
    foreach($array as $item){
         $mail->addAddress($item['correo']); 
    }
    $mail->isHTML(true);   
    $mail->AddReplyTo($correo);
    $mail->CharSet = 'UTF-8';// Set email format to HTML
    $mail->Subject ="$nombre ha avisado de un problema";
    $mail->Body    = $textoBody;
    if(!$mail->send()) {
        return 'Error al enviar mensaje de dado de alta. Revisa que el destinatario ha recibido el correo.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        return 'Se ha enviado un mensaje avisando del problema.Serás respondido en la mayor brevedad posible.';
    }
    $errors[] = "Send mail sucsessfully";
} catch (phpmailerException $e) {
    $errors[] = $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    $errors[] = $e->getMessage(); //Boring error messages from anything else!
}
}
}
//Iniciamiamos sesion para usar variables de SESSION
session_start();
//Librerías requeridas una vez
require_once("libs/SmartyBC.class.php");
require_once ('BD.php');
//Comprobamos que no intentan entrar sin contar con usuario y contraseña
if (isset($_SESSION['usuario']) != null && isset($_SESSION['pass'])) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new SmartyBC();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
    $numero=0;
    $textoCorreo='';
    //guardamos los datos que vamos a usar en variable


    if(isset($_POST['proporcionar'])){
   $correo=$bd->consigueDatosEmpresaCorreo($_SESSION['usuario']);
    $textoCorreo= enviaCorreo($correo[0]['correo'],$_SESSION['usuario'],$_POST['proble']);
        }
    

    //Enviamos las variables al .tpl.php

     $smarty->assign("texto", $textoCorreo);
    $smarty->display('avisarProblemaEmpresa.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Acceso irregular. Volviendo al anterior apartado.</div></body>";
    header("Refresh:3,url=listadoPeticionesProductos2.php");
}
?>

