<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
              #contenedor{
border:2px solid;
border-radius:20px;
width:70%;
text-align:center;
margin-left:10%;
background-color:white;
}
body{
	color: #000;
	font-family: "Varela Round", Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 1.5em;
        background-image: url("imagenes/5153.jpg");
        background-size: 50% 50%;
}
body.videojuegos{
background-image: url("imagenes/fondoWeb.jpg");
}
form#linea{
display:inline-block;}
    </style>
      <body {if {$rol[0]['rolVideojuegos']}=='si'}class="videojuegos"{/if}>   
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="color:white";>
      <img src="http://localhost/gestorB4P/imagenes/logo.png" style="width:20%;"/>GESTOR B4P
    </div>
    <ul class="nav navbar-nav navbar-right">
                            <li>  <div style="margin-top:10px;margin-right:5px;"> <form method="POST" action="login.php">
             <input type="hidden" name="usuario" value="{$usuario}">
    <input type="submit" class="btn btn-danger" name="bajar2" value="Dar de baja"> 
        </form></div></li>
      <li>   <div style="margin-top:10px;margin-right:5px;">  <form method="POST" action="avisarProblema.php" target="_blank">
             <input type="hidden" name="usuario" value="{$usuario}">
    <input type="submit" class="btn btn-danger" name="problema" value="Avisar de problema"> 
              </form></div></li>
      <li>  <div style="margin-top:10px;margin-right:5px;"><form method="POST" action="login.php">
    <input type="submit" class="btn btn-danger" name="vuelve" value="Salir"> 
              </form></div></li>
    </ul>
  </div>
</nav>
     <div id="contenedor">
         <div id="encabezado"><h2>Editar Evento:</h2></div>
                   {$frases}<br>
         <form method="POST" action="editarEvento.php">
             Nombre del evento:  <input type="text" name="nombre" value="{$evento}"><br><br>
            Ciudad:  <input type="text" name="ciudad" value="{$ciudad}"><br><br>
            Plazas:  <input type="text" name="plazas" value="{$plazas}"><br><br>
                 Congelado:  <select name="congelado">    
       <option value="SI" {if $congelado == 'SI'}selected{/if}>SI</option>
       <option value="NO" {if $congelado == 'NO'}selected{/if}>NO</option>
   </select><br><br>
                <input type="hidden" id="valor" name="valor" value="{$id}"}>
            <input type="submit" class="btn btn-success" name="cambiar" value="Cambiar Evento">         
        </form>
         <form method="POST"  action="listarEvento.php">
            <input type="submit" class="btn btn-success" name="volver" value="Volver a listar">         
        </form>
     </div>
    </body>
</html>
