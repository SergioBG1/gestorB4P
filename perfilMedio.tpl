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
#medio2{
border:2px solid;
border-radius:20px;
width:70%;

background-color:white;
margin-top:20px;
margin-bottom:5px;
}
body{
	color: #000;
	font-family: "Varela Round", Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 1.5em;
                background-image: url("imagenes/readyplayer.jpg");
                 background-size: 100% 100%;
}
div#myCarousel {
    width: 90%;
    margin-bottom:40px;
}
#prueba{
display:inline-block;
margin-right:20px;
margin-top:10px;}
    </style>
    
    <body>
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

     <div id="medio">
         <div id="prueba">
         <a href="listadoProductoMedio.php"><img src='imagenes/imagen1.png' width='150px' heigth='150px'></a>
         <h2>PRODUCTOS</h2>
         </div>
         <div id="prueba">
         <a href="listadoEventoMedio.php"><img src='imagenes/1234.jpg' width='150px' heigth='150px'></a>
         <h2>EVENTOS</h2>
         </div>
         <div id="prueba">
         <a href="editarPerfilMedio.php"><img src='https://png.icons8.com/metro/1600/edit-user-male.png' width='150px' heigth='150px'></a>
         <h2>EDITAR</h2>
         </div><hr><div>
                         <div id="prueba">
         <a href="listadoPeticionesAceptadasProductos.php"><img src='http://localhost/gestorB4P/imagenes/iconoProductoOK.png' width='100px' heigth='100px'></a>
         <h3>PETICIONES PRODUCTOS ACEPTADOS</h3>
         </div>
              <div id="prueba">
         <a href="listadoPeticionesAceptadasEventos.php"><img src='http://localhost/gestorB4P/imagenes/imagenEventoOK.png' width='100px' heigth='100px'></a>
         <h3>PETICIONES EVENTOS ACEPTADOS</h3>
         </div>
         </div>
     </div>
<div class="container">
    <div id="medio2">
        <h2>ÚLTIMOS PRODUCTOS AÑADIDOS</h2>  </div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{$imagenFinales[0]}" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>{$datos[0]['nombre']}</h3>
          <p>{$datos[0]['plataforma']}</p>
        </div>
      </div>

      <div class="item">
        <img src="{$imagenFinales[1]}" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
        <h3>{$datos[1]['nombre']}</h3>
        <p>{$datos[1]['plataforma']}</p></div>
      </div>
    
      <div class="item">
        <img src="{$imagenFinales[2]}" alt="New york" style="width:100%;">
        <div class="carousel-caption">
        <h3>{$datos[2]['nombre']}a</h3>
          <p>{$datos[2]['plataforma']}</p></div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    </body>
</html>
