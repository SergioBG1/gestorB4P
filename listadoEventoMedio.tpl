<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script language="javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.js"></script>

   <!-- Bootstrap Core CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>

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
        <h1>Prodcutos disponibles para el medio {$nombre}</h1>

<table id="tabla_de_miembros" class="dataTables_wrapper no-footer">
		<thead>
			<tr style="height: 18px; border: 2px solid #000000; background-color: #e3e3e3; ">
				<th style="text-align: left;">Nombre del Evento</th>
				<th style="text-align: left;">Ciudad</th>
				<th style="text-align: left;">Plazas</th>
				<th style="text-align: left;">Empresa</th>
			</tr>
		</thead>
		<tbody>
			{foreach $array as $item}
<tr>
    <td>{$item["nombre"]}</td>
    <td>{$item["ciudad"]}</td>
    <td>{$item["plazas"]}</td>
    <td>{$empresa[{$num}]}</td>
</tr>
 <input type='hidden' value='{$num++}'>
{/foreach}

			
		</tbody>
	</table>
                 <form method="POST" action="perfilMedio.php">
            <input type="submit" name="volver" value="Volver a Medio">         
        </form>  <script language="javascript">
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
        //Le damos funcion de recoger datos con un clicks
            $('#tabla_de_miembros tbody').on('click', 'tr', function () {
        var pelicula = $('td', this).eq(0).text();
 
        var estreno = $('td', this).eq(1).text();
                var compania = $('td', this).eq(2).text();
                var ingresos = $('td', this).eq(3).text();
        alert( 'Nombre de la película: '+pelicula+' '+"\nEstreno: " +estreno + ' \nCompañía: ' + compania + ' \nIngresos: '+ ingresos);
                
 
    } );
        
         
	</script>
  
    </body>
</html>
