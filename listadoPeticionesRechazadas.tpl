<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script language="javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.js"></script>

   <!-- Bootstrap Core CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>

    <style>
               
   #contenedor{
border:2px solid;
border-radius:20px;
width:70%;
text-align:center;
margin-left:10%;
background-color:white;
margin-top:20px;
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
    </style>
    <body {if {$rol[0]['rolVideojuegos']}=='si'}class="videojuegos"{/if}>       <nav class="navbar navbar-inverse">
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
</nav><div id="contenedor">
        <h1>Listado de Peticiones Rechazadas en la plataforma</h1><br>
        <table id="tabla_de_miembros" class="dataTables_wrapper no-footer">
		<thead>
                    {{$texto}}
			<tr style="height: 18px; border: 2px solid #000000; background-color: #e3e3e3; ">
				<th style="text-align: left;">Nombre del Medio</th>
				<th style="text-align: left;">Dirección</th>
				<th style="text-align: left;">Visitas</th>
				<th style="text-align: left;">URL</th>
                                <th style="text-align: left;">Seguidores</th>
                                <th style="text-align: left;">Correo</th>
                                <th style="text-align: left;"></th>
                                
			</tr>
		</thead>
		<tbody>
			 {foreach $array as $item}
<tr>
    <td>{$item["nombre"]}</td>
    <td>{$item["direccion"]}</td>
    <td>{$item["visitas"]}</td>
    <td>{$item["url"]}</td>
     <td>{$item["seguidores"]}</td>
      <td>{$item["correo"]}</td>
       <td><form method="POST" action="listadoPeticionesRechazadas.php">
                          <input type="hidden" name="correo" value={$item["correo"]}>
            <input type="submit" name="aceptar" value="Aceptar">
        </form></td>
</tr>
{/foreach}
			
		</tbody>
	</table>
                 <form method="POST" action="perfilEmpresa.php">
            <input type="submit"  class="btn btn-success" name="volver" value="Volver a Inicio">         
                 </form></div>
        <script language="javascript">
        //Usamos DataTable y lo traducimos a nuestro idioma
		$('#tabla_de_miembros').DataTable( {
 
        "language": {
 
    "sProcessing":     "Procesando...",
 
    "sLengthMenu":     "Mostrar _MENU_ resultados",
 
    "sZeroRecords":    "No se encontraron resultados",
 
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
 
    "sInfo":           "Mostrando resultados del _START_ al _END_ de un total de _TOTAL_ resultados",
 
    "sInfoEmpty":      "Mostrando resultados del 0 al 0 de un total de 0 resultados",
 
    "sInfoFiltered":   "(filtrado de un total de _MAX_ resultados)",
 
    "sInfoPostFix":    "",
 
    "sSearch":         "Buscar:",
 
    "sUrl":            "",
 
    "sInfoThousands":  ",",
 
    "sLoadingRecords": "Cargando...",
 
    "oPaginate": {
 
        "sFirst":    "Primero",
 
        "sLast":     "Último",
 
        "sNext":     "Siguiente",
 
        "sPrevious": "Anterior"
 
    },
 
    "oAria": {
 
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
 
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
 
    }
 
}
 
    
 
    });
        /**
            $('#tabla_de_miembros tbody').on('click', 'tr', function () {
        var pelicula = $('td', this).eq(0).text();
 
        var estreno = $('td', this).eq(1).text();
                var compania = $('td', this).eq(2).text();
                var ingresos = $('td', this).eq(3).text();
        alert( 'Nombre de la película: '+pelicula+' '+"\nEstreno: " +estreno + ' \nCompañía: ' + compania + ' \nIngresos: '+ ingresos);
                
 
    } );**/
         
	</script>
  
    </body>
</html>
