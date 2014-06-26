<!DOCTYPE html>
<html>
<head>
	<title>Mantenimiento</title>
	<script src="../style/js/jquery-1.7.2.min.js"></script>
	<script>
	$(document).on('ready',function(){
		$('.tr').click(function(){
			$('input',this).removeAttr('disabled');
		})
	})
	</script>
</head>
<body>
	<h2 align="center">Ultimos articulos publicados</h2>
	<table border="1" align="center">
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
	 		<tr class='tr'>
	 			<td><input type='text' value='$fila[0]' disabled=''></td>
	 			<td><input type='text' value='$fila[1]' disabled=''></td>
	 			<td><input type='text' value='$fila[2]' disabled=''></td>
	 			<td><input type='text' value='$fila[3]' disabled=''></td>
	 			<td><input type='text' value='$fila[4]' disabled=''></td>
	 			<td><input type='text' value='$fila[6]' disabled=''></td>
	 			<td><button id='boton' name='yuri'>Editar</button></td>
	 			<td><button>Eliminar</button></td>
	 		</tr>
	 	";
	}
	 ?>
	</table>
	<br>
	<div align="center"><a href="../administracion.php"><button style="width:120px">Regresar</button></a></div>
</body>
</html>