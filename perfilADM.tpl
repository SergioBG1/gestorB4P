<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
         
#medio{
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
        background-size: 50% 50%;
}
#prueba{
display:inline-block;
margin-right:20px;
margin-top:10px;}
    </style>
    <body>

        <form method="POST" action="login.php">
    <input type="submit" class="btn btn-danger" name="vuelve" value="Salir"> 
        </form>
 <div id="medio">
         <div id="prueba">
         <a href="listarProductoADM.php"><img src='imagenes/imagen1.png' width='150px' heigth='150px'></a>
         <h2>PRODUCTOS</h2>
         </div>
         <div id="prueba">
         <a href="listarEventoADM.php"><img src='imagenes/1234.jpg' width='150px' heigth='150px'></a>
         <h2>EVENTOS</h2>
         </div>
         <div id="prueba">
         <a href="editarPerfil.php"><img src='https://png.icons8.com/metro/1600/edit-user-male.png' width='150px' heigth='150px'></a>
         <h2>EDITAR</h2>
         </div>
 </div><br>
        <div id="medio">
            <a href="anadirADM.php">Añadir ADM</a><br>
             <a href="listadoMediosADM.php">Gestionar Medios</a><br>
         <form method="POST" action="login.php">
             <input type="hidden" name="usuario" value="{$usuario}">
    <input type="submit" class="btn btn-danger" name="bajar" value="Dar de baja"> 
        </form>
        </div>
    </body>
</html>
