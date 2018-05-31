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
        background-image: url("imagenes/5153.jpg");
        background-size: 50% 50%;
}
body.videojuegos{
background-image: url("imagenes/fondoWeb.jpg");
}
#prueba{
display:inline-block;
margin-right:20px;
margin-top:10px;}
footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: white;

}
    </style>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="color:white";>
      <img src="http://localhost/gestorB4P/imagenes/logo.png" style="width:20%;"/>GESTOR B4P
    </div>
    <ul class="nav navbar-nav navbar-right">
                            <li>  <div style="margin-top:10px;margin-right:5px;"> <form method="POST" action="login.php">
             <input type="hidden" name="usuario" value="{$usuario}">
    <input type="submit" class="btn btn-danger" name="bajar" value="Dar de baja"> 
        </form></div></li>
      <li>   <div style="margin-top:10px;margin-right:5px;">  <form method="POST" action="avisarProblemaEmpresa.php" target="_blank">
             <input type="hidden" name="usuario" value="{$usuario}">
    <input type="submit" class="btn btn-danger" name="problema" value="Avisar de problema"> 
              </form></div></li>
      <li>  <div style="margin-top:10px;margin-right:5px;"><form method="POST" action="login.php">
    <input type="submit" class="btn btn-danger" name="vuelve" value="Salir"> 
              </form></div></li>
    </ul>
  </div>
</nav>
    <body {if {$rol[0]['rolVideojuegos']}=='si'}class="videojuegos"{/if}>
 <div id="medio">
         <div id="prueba">
         <a href="registroProducto.php"><img src='imagenes/imagen1.png' width='150px' heigth='150px'></a>
         <h2>{if {$rol[0]['rolVideojuegos']}=='si'}JUEGOS{else}PRODUCTOS{/if}</h2>
         </div>
         <div id="prueba">
         <a href="registroEvento.php"><img src='imagenes/1234.jpg' width='150px' heigth='150px'></a>
         <h2>EVENTOS</h2>
         </div>
         <div id="prueba">
         <a href="editarPerfil.php"><img src='https://png.icons8.com/metro/1600/edit-user-male.png' width='150px' heigth='150px'></a>
         <h2>EDITAR</h2>
         </div>
 </div><br>
        <div id="medio">
            <div id="prueba">
         <a href="listadoPeticionesEventos.php"><img src='http://localhost/gestorB4P/imagenes/imagenEvento.png' width='100px' heigth='100px'></a>
         <h3>PETICIONES EVENTOS</h3>
         </div>
             <div id="prueba">
         <a href="listadoPeticionesEventos2.php"><img src='http://localhost/gestorB4P/imagenes/imagenEventoOK.png' width='100px' heigth='100px'></a>
         <h3>EVENTOS ACEPTADOS</h3>
         </div>
              <div id="prueba">
         <a href="listadoPeticionesProductos.php"><img src='http://localhost/gestorB4P/imagenes/iconoProducto.png' width='100px' heigth='100px'></a>
         <h3>PETICIONES PRODUCTOS</h3>
         </div>
                <div id="prueba">
         <a href="listadoPeticionesProductos2.php"><img src='http://localhost/gestorB4P/imagenes/iconoProductoOK.png' width='100px' heigth='100px'></a>
         <h3>PRODUCTOS ACEPTADOS</h3>
         </div>
               <div id="prueba">
         <a href="listadoPeticiones.php"><img src='http://localhost/gestorB4P/imagenes/imagenMedio.png' width='100px' heigth='100px'></a>
         <h3>PETICIONES MEDIOS</h3>
         </div>
                  <div id="prueba">
         <a href="listadoPeticionesAceptadas.php"><img src='http://localhost/gestorB4P/imagenes/imagenMedioOK.png' width='100px' heigth='100px'></a>
         <h3>MEDIOS ACEPTADOS</h3>
         </div>
                  <div id="prueba">
         <a href="listadoPeticionesRechazadas.php"><img src='http://localhost/gestorB4P/imagenes/imagenMedioNo.png' width='100px' heigth='100px'></a>
         <h3>MEDIOS RECHAZADOS</h3>
                  </div>
        </div><br>
    </body>
</html>
