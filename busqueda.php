<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="style/css/busqueda.css">
	<link rel="stylesheet" type="text/css" media="all" href="style.css" />
	<script src="style/js/jquery-1.7.2.min.js"></script>
	<script src="style/js/ddsmoothmenu.js"></script>
	<script src="style/js/jquery.backstretch.min.js"></script>
	<script src="style/js/mediaelement.min.js"></script>
	<script src="style/js/mediaelementplayer.min.js"></script>
	<script>
	$.backstretch("style/images/bg/1.jpg");
	</script>
</head>
<body>
	<?php 
	include("globales.php");
	include("includes/menu.php");
	$keyworks=addslashes($_GET['busqueda']);
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$consulta="select * from articulo WHERE titulo like '%".$keyworks."%' ORDER BY fecha DESC";
	$resultado=mysqli_query($conexion,$consulta);
	$contador=0;
	echo "<div class='resultado'><table>";
	while ($fila = mysqli_fetch_array($resultado)){
			$fecha=explode('-', $fila['fecha']);
			$titulo=$fila['titulo'];
			$id=$fila[0];
			echo "<tr class='articulo'>
					<td><a href='articulo-$fecha[0]-$fecha[1]_$titulo-$id'><img src='Imagenes/$fila[5]'></a></td>
					<td><a href='articulo-$fecha[0]-$fecha[1]_$titulo-$id'><h3>$fila[1]</h3></a><p>$fecha[2]-$fecha[1]-$fecha[0]</p></td>
				 </tr>";
			$contador++;
		}
	echo "</table></div>";
	if ($contador==0) {
		echo "No se encontraron resultados";
	}
	 ?>
</body>
</html>
