<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	a{
		text-decoration: none;
	}
	h2{
		font-size: 21px;
		font-family: cursive;
		color: #FF3333;
	}
	</style>
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
	echo "<table>";
	while ($fila = mysqli_fetch_array($resultado)){
			$fecha=explode('-', $fila['fecha']);
			$titulo=$fila['titulo'];
			$id=$fila[0];
			echo "<tr>
					<td><a href='articulo-$fecha[0]-$fecha[1]_$titulo-$id'><img src='Imagenes/$fila[5]'></a></td>
					<td><a href='articulo-$fecha[0]-$fecha[1]_$titulo-$id'><h2>$fila[1]</h2></a><p>$fecha[2]-$fecha[1]-$fecha[0]</p></td>
				 </tr>";
			$contador++;
		}
	echo "</table>";
	if ($contador==0) {
		echo "No se encontraron resultados";
	}
	 ?>
</body>
</html>
