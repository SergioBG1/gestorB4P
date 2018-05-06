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
    background-color: #C0C0C0;
	color: #000;
	font-family: "Varela Round", Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 1.5em;
}
form#linea{
display:inline-block;}
    </style>
    <body>

        <form method="POST" action="login.php">
    <input type="submit" class="btn btn-danger" name="vuelve" value="Salir"> 
        </form>
     <div id="contenedor">
         <div id="encabezado"><h2>Editar Evento:</h2></div>
         <form method="POST" action="editarEvento.php">
             Nombre del evento:  <input type="text" name="nombre" value="{$evento}"><br><br>
            Ciudad:  <input type="text" name="ciudad" value="{$ciudad}"><br><br>
            Plazas:  <input type="text" name="plazas" value="{$plazas}"><br><br>
                <input type="hidden" id="valor" name="valor" value="{$id}"}>
            <input type="submit" class="btn btn-success" name="cambiar" value="Cambiar Evento">         
        </form>
         <form method="POST"  action="listarEvento.php">
            <input type="submit" class="btn btn-success" name="volver" value="Volver a listar">         
        </form>
     </div>
    </body>
</html>
