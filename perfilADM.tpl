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
         <a href="editarPerfilADM.php"><img src='https://png.icons8.com/metro/1600/edit-user-male.png' width='150px' heigth='150px'></a>
         <h2>EDITAR</h2>
         </div>
 </div><br>
        <div id="medio">
                      <div id="prueba">
         <a href="listadoPeticionesADM.php"><img src='http://localhost/gestorB4P/imagenes/imagenMedio.png' width='100px' heigth='100px'></a>
         <h3>PETICIONES MEDIOS</h3>
         </div>
                  <div id="prueba">
         <a href="listadoPeticionesAceptadasADM.php"><img src='http://localhost/gestorB4P/imagenes/imagenMedioOK.png' width='100px' heigth='100px'></a>
         <h3>MEDIOS ACEPTADOS</h3>
         </div>
                  <div id="prueba">
         <a href="listadoPeticionesRechazadasADM.php"><img src='http://localhost/gestorB4P/imagenes/imagenMedioNo.png' width='100px' heigth='100px'></a>
         <h3>MEDIOS RECHAZADOS</h3>
         </div>
                     <div id="prueba">
         <a href="listadoPeticionesEmpresa.php"><img src='http://localhost/gestorB4P/imagenes/imagenEmpresa.png' width='100px' heigth='100px'></a>
         <h3>PETICIONES EMPRESAS</h3>
         </div>
                        <div id="prueba">
         <a href="listadoPeticionesAceptadasEmpresa.php"><img src='http://localhost/gestorB4P/imagenes/imagenEmpresaAceptada.png' width='100px' heigth='100px'></a>
         <h3>EMPRESAS ACEPTADAS</h3>
         </div>
                                <div id="prueba">
         <a href="listadoPeticionesRechazadasEmpresa.php"><img src='http://localhost/gestorB4P/imagenes/imagenEmpresaRechazada.png' width='100px' heigth='100px'></a>
         <h3>EMPRESAS RECHAZADAS</h3>
         </div>
                                       <div id="prueba">
         <a href="listadoMediosADM.php"><img src='http://localhost/gestorB4P/imagenes/imagenMedioGestion.png' width='100px' heigth='100px'></a>
         <h3>GESTIÓN MEDIOS</h3>
         </div>
                                            <div id="prueba">
         <a href="anadirADM.php" target="_blank"><img src='http://localhost/gestorB4P/imagenes/imagenADM.png' width='100px' heigth='100px'></a>
         <h3>AÑADIR ADM</h3>
         </div>

        </div><br>
    </body>
</html>
