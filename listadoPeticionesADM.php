<?php
function enviaCorreo($correo,$nombre){
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
    $mail->addAddress($correo);     // Add a recipient                                // Set word wrap to 50 characters
    $mail->isHTML(true);   
    $mail->CharSet = 'UTF-8';// Set email format to HTML
    $mail->Subject ="Hola $nombre. Se ha confirmado su cuenta en Gestor B4P.";
    $mail->Body    ='Han confirmado su cuenta en <b>Gestor B4P</b>. Dirijase a login para iniciar sesión con los datos que proporcionaste.';
    if(!$mail->send()) {
        return 'Error al enviar mensaje de dado de alta. Revisa que el destinatario ha recibido el correo.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        return 'Se ha enviado un mensaje avisando del dado de alta.';
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
if (isset($_SESSION['adm']) != null && isset($_SESSION['pass']) != null) {
    //Creamos y asignamos todo lo necesario para usar SMARTY
    $smarty = new SmartyBC();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->config_dir = 'configs';
    $smarty->cache_dir = 'cache';
    $bd = new BD();
$textoCorreo='';

    if (isset($_POST['aceptar'])) {
      $usuarioNuevo = $bd->cogeDatosMedio( $_POST['correo']);
      $bd->anadirMedio($usuarioNuevo[0]['nombre'], $_POST['correo'], md5($usuarioNuevo[0]['pass']), $usuarioNuevo[0]['direccion'], $usuarioNuevo[0]['visitas'], $usuarioNuevo[0]['url'], $usuarioNuevo[0]['seguidores']);
     $textoCorreo= enviaCorreo($_POST['correo'],$usuarioNuevo[0]['nombre']);
      $bd->aceptaPeticionMedio( $_POST['correo']);
    }
    if (isset($_POST['eliminar'])) {
      $bd->eliminaPeticionMedio( $_POST['correo']);
    }
        //guardamos los datos que vamos a usar en variables
    $array = $bd->listarPeticionMedio();
    //Enviamos las variables al .tpl.php
 
    $smarty->assign("array", $array);
    $smarty->assign("nombre", $_SESSION['adm']);
    $smarty->assign("textoCorreo", $textoCorreo);
    $smarty->display('listadoPeticionesADM.tpl');
} else {//en caso de no contar con usuario devolvemos a inicio
    echo "<body style='background-color: #C0C0C0;color: #000;font-family: Varela Round, Arial, Helvetica, sans-serif;font-size: 16px;line-height: 1.5em;'><div style='border:2px solid;border-radius:20px;width:70%;text-align:center;margin-left:10%;background-color:white;
'>Acceso irregular. Volviendo a perfil ADM.</div></body>";
    header("Refresh:3,url=perfilADM.php");
}
?>

