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
         <div id="encabezado"><h2>Crear Producto:</h2></div>
         <form method="POST" action="registroProducto.php">
             Nombre del producto:  <input type="text" name="product"><br><br>
            Cantidad:  <input type="text" name="cantidad"><br><br>
            Plataforma:  <select name="plataforma">    
       <option value="PS4" selected="selected">PS4</option>
       <option value="ONE">ONE</option>
       <option value="PC">PC</option>
   </select><br><br>
            <input type="submit" class="btn btn-success" name="anadir" value="Añadir Producto">         
        </form>
         <form method="POST" id="linea" action="listarProducto.php">
            <input type="submit" class="btn btn-success" name="listar" value="Listar Productos">         
        </form>
             <form method="POST" id="linea" action="perfilEmpresa.php">
            <input type="submit" class="btn btn-success" name="volver" value="Volver a Empresa">         
        </form>
     </div>
    </body>
</html>
