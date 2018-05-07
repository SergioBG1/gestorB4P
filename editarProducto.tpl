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
         <div id="encabezado"><h2>Cambiar Producto:</h2></div>
         <form method="POST" action="editarProducto.php">
             Nombre del producto:  <input type="text" name="nombre" value="{$nombre}"><br><br>
            Cantidad:  <input type="text" name="cantidad" value="{$cantidad}"><br><br>
            Plataforma:  <select name="plataforma">    
       <option value="PS4" {if $plataforma == 'PS4'}selected{/if}>PS4</option>
       <option value="ONE"  {if $plataforma == 'ONE'}selected{/if}>ONE</option>
       <option value="PC"  {if $plataforma == 'PC'}selected{/if}>PC</option>
   </select><br><br>
     Congelado:  <select name="congelado">    
       <option value="SI" {if $congelado == 'SI'}selected{/if}>SI</option>
       <option value="NO" {if $congelado == 'NO'}selected{/if}>NO</option>
   </select><br><br>
    <input type="hidden" id="valor" name="valor" value="{$id}"}>
            <input type="submit" class="btn btn-success" name="cambiar" value="Cambiar Producto">         
        </form>
    <form method="POST" action="listarProducto.php">
            <input type="submit" class="btn btn-success" name="volver" value="Volver a Listado">         
                 </form>
     </div>
    </body>
</html>
