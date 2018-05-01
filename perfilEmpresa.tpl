<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        table{
        border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  text-align: left;
  border-collapse: collapse;
        margin-left:10px;
        margin-bottom:10px;
}
td,th{
 border: 1px solid #AAAAAA;
  padding: 3px 2px;}
        div{
        border:1px solid black;
        width:50%;
         margin-bottom:20px;
        }
tr:nth-child(even) {
  background: #D0E4F5;
}
th{
 background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;}
#cesta{
    margin-top:8px;
    margin-left:8px;
width:70px;
height:70px;
}
#letra{
font-size:60px;
font-style:bold;
}
#borra2{
    background:url("./imagenes/boton-x(1).png") left center no-repeat;padding-left:16px;width:23px;height:24px;border-radius:10px;
}
#su{
    background:url("./imagenes/carro-de-la-compra(1).png") left center no-repeat;padding-left:16px;width:40px;height:40px;border-radius:10px;
    margin-left:9px;
}
#cestita{
margin-top: 20px;
float:right;
width:400px;
margin-right:5px;
border-radius:20px;
padding:10px;}
#contenedor{
width:95%;
margin:20px;}
#encabezado{
    width:100%;
}
#formTa{
height:1px;
table{
margin-left: 25px;

}

    </style>
    <body>

        <form method="POST" action="login.php">
    <input type="submit" class="btn btn-info" name="vuelve" value="Volver a inicio"> 
        </form>
     <div id="contenedor">
         <img src='imagenes/imagen1.png' width='150px' heigth='150px'>
         <a href="inicioEmpresa.php"><img src='imagenes/1234.jpg' width='150px' heigth='150px'></a>
         <h2>JUEGOS   EVENTOS</h2>
         <form method="POST" action="listarEvento.php">
            <input type="submit" name="listar" value="Listar Eventos">         
        </form>
     </div>
    </body>
</html>
