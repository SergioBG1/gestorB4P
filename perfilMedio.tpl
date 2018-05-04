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
    background-color: #C0C0C0;
	color: #000;
	font-family: "Varela Round", Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 1.5em;
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

        <form method="POST" action="login.php">
    <input type="submit" class="btn btn-info" name="vuelve" value="Volver a inicio"> 
        </form>
     <div id="medio">
         <div id="prueba">
         <a href="listadoProductoMedio.php"><img src='imagenes/imagen1.png' width='150px' heigth='150px'></a>
         <h2>JUEGOS</h2>
         </div>
         <div id="prueba">
         <a href="listadoEventoMedio.php"><img src='imagenes/1234.jpg' width='150px' heigth='150px'></a>
         <h2>EVENTOS</h2>
         </div>
         <div id="prueba">
         <a href="editarPerfilMedio.php"><img src='https://png.icons8.com/metro/1600/edit-user-male.png' width='150px' heigth='150px'></a>
         <h2>EDITAR</h2>
         </div>
     </div>
<div class="container">
  <h2>Últimos productos añadidos</h2>  
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
