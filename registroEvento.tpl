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

        <form method="POST" action="login.php">
    <input type="submit" class="btn btn-danger" name="vuelve" value="Salir"> 
        </form>
     <div id="contenedor">
         <div id="encabezado"><h2>Crear Evento:</h2></div>
           {$frases}<br>
         <form method="POST" action="registroEvento.php">
             Nombre del evento:  <input type="text" name="event"><br><br>
            Ciudad:  <input type="text" name="city"><br><br>
            Plazas:  <input type="text" name="plazas"><br><br>
            <input type="submit" class="btn btn-success" name="anadir" value="Añadir Evento">         
        </form>
         <form method="POST" id="linea" action="listarEvento.php">
            <input type="submit" class="btn btn-success" name="listar" value="Listar Eventos">         
        </form>
             <form method="POST" id="linea" action="perfilEmpresa.php">
            <input type="submit" class="btn btn-success" name="volver" value="Volver a Empresa">         
        </form>
     </div>
    </body>
</html>
