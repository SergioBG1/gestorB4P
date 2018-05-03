<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    


    </style>
    
    <body>

        <form method="POST" action="login.php">
    <input type="submit" class="btn btn-info" name="vuelve" value="Volver a inicio"> 
        </form>
     <div id="contenedor">
         <a href="listadoProductoMedio.php"><img src='imagenes/imagen1.png' width='150px' heigth='150px'></a>
         <a href="listadoEventoMedio.php"><img src='imagenes/1234.jpg' width='150px' heigth='150px'></a>
         <h2>JUEGOS   EVENTOS</h2>
         <form method="POST" action="editarPerfilMedio.php">
            <input type="submit" name="editar" value="Editar mi perfil">         
        </form>
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
