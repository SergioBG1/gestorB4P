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
     <body {if {$rol[0]['rolVideojuegos']}=='si'}class="videojuegos"{/if}>
     <div id="contenedor">
         <div id="encabezado"><h2>Crear Producto:</h2></div>
         {$frases}<br>
         <form method="POST" action="registroProducto.php">
             {literal} 
             Nombre del producto:  <input type="text"   name="product" required><br><br>
                  {/literal} 
                   {literal} 
            Cantidad:  <input type="text"  pattern="[0-9]{0,9}" name="cantidad" required><br><br>
                  {/literal} 
            Plataforma:  <select name="plataforma">    
          {if {$rol[0]['rolVideojuegos']}=='si'}
       <option value="PS4" selected="selected">PS4</option>
       <option value="ONE">ONE</option>
       <option value="PC">PC</option>
       {/if}
       {if {$rol[0]['rolVideojuegos']}=='no'}
       <option value="DVD">DVD</option>
       <option value="otros/materialPromocion">Otros/Material Promoción</option>
       {/if}
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
