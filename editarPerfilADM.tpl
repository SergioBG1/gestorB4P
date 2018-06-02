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
                background-image: url("imagenes/fondoWeb.jpg");
}

    </style>
    <body>
   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="color:white";>
      <img src="http://localhost/gestorB4P/imagenes/logo.png" style="width:20%;"/>GESTOR B4P
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li>  <div style="margin-top:10px;margin-right:5px;"><form method="POST" action="login.php">
    <input type="submit" class="btn btn-danger" name="vuelve" value="Salir"> 
              </form></div></li>
    </ul>
  </div>
</nav>
     <div id="contenedor">
         <div id="encabezado"> <h1>Edición de perfil de {$nombre}</h1></div>
         <form method="POST" action="editarPerfilADM.php">
             {$frase}<br>
             Nombre:  <input type="text" name="nombre" value="{$nombre}" required><br><br>
                    {literal} 
            <input type="email" id="correo"  pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$"              {/literal} name="mail"  value="{$correo}" placeholder="Correo" required="required"><br><br>

            <input type="submit" class="btn btn-success" name="cambiar" value="Guardar Cambios">         
        </form>
             <form method="POST" action="perfilADM.php">
            <input type="submit" class="btn btn-success" name="volver" value="Volver a ADM">         
        </form>
     </div>
    </body>
</html>
