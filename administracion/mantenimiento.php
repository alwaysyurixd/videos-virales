<?php 
	session_start();
	if(!isset($_SESSION["usuario"])) 
	{ 	
		header('Location:../index.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mantenimiento</title>
	<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style/css/jquery-ui-1.10.4.custom.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="../style/js/jquery-1.7.2.min.js"></script>
	<script src="../style/js/jquery-ui-1.10.3.min.js"></script>
	<script src="../style/js/ajax.js"></script>
	<script>
	$(function(){
		$('body').on('click','#columna a',function (e){
			e.preventDefault();

			// alert($(this).attr('data-accion'));

			// Id Usuario
			idUser_ok = $(this).attr('href');
			accion_ok = $(this).attr('data-accion');

			$('#id_user').val(idUser_ok);

			if( accion_ok == 'editar'){
				// Valor de la acción
				$('#accion').val('editUser');

				// Llenar el formulario con los datos del registro seleccionado
				$('#idArticulo').val($(this).parent().parent().children('td:eq(0)').text());
				$('#titulo').val($(this).parent().parent().children('td:eq(1)').text());
				$('#descripcion').val($(this).parent().parent().children('td:eq(2)').text());
				// Abrimos el Formulario
				$('#ventana').dialog({
					title:'Editar Usuario',
					width:'445',
					autoOpen:true,
					modal:true
				});

			}//else if($(this).attr('data-accion') == 'eliminar'){

				//$('#dialog-borrar').dialog('open');
			//}
		});
	});
	</script>
	<style>
	.fa{
		display: none;
	}
	</style>
</head>
<body>
	<h2 align="center">Ultimos articulos publicados</h2>
	<table align="center" class="table-condensed table-striped table-bordered">
	<tr>
	 	<th>Id articulo</th>
	 	<th>Titulo</th>
	 	<th>Descripcion</th>
	 	<th>Imagen de portada</th>
	 	<th>Imagen de articulo</th>
	 	<th>Fecha</th>
	 	<th>Editar</th>
	 	<th>Eliminar</th>
	</tr>

	<?php 
	include("../globales.php");
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$consulta="select * from articulo order by fecha desc";
	$resultado=mysqli_query($conexion,$consulta);

	while ($fila = mysqli_fetch_array($resultado)){
		if ($fila[5]==2) {
			$fila[4]="video";
		}
		echo " 	
	 		<tr id='fila'>
	 			<td>$fila[0]</td>
	 			<td>$fila[1]</td>
	 			<td>$fila[2]</td>
	 			<td>$fila[3]</td>
	 			<td>$fila[4]</td>
	 			<td>$fila[6]</td>
	 			<td id='columna'><a data-accion='editar'><button id='boton_editar' class='btn btn-primary'>Editar</button></a></td>
	 			<td><a href='eliminar_articulo.php?id=".$fila[0]."'><button id='boton_eliminar' class='btn btn-danger'>Eliminar</button></a></td>
	 		</tr>
	 	";
	}
	 ?>
	</table>
	<br>
	<div align="center"><a href="../administracion.php"><button style="width:120px" class="btn btn-success">Regresar</button></a></div>
	<div id="ventana" style="display:none">
		<form action="editarArticulo.php" method="post">
			<input type="text" name="idArticulo" id="idArticulo" style="display:none"><br>
			<label>Articulo</label><br>
			<input type="text" name="titulo" id="titulo"><br>
			<label>Descripción</label><br>
			<input type="text" name="descripcion" id="descripcion"><br>
			<label>Imagen de Portada</label>
			<input type="file" accept="image/*" name="imagen_portada" id="imagen_portada"><br>
			<label>Imagen de Articulo</label><br>
			<input type="file" accept="image/*" name="imagen_articulo"><br>
			<input type="submit" value="Modificar">
			<i class="fa fa-refresh fa-spin"></i>
		</form>
		<span></span>
	</div>

</body>
</html>