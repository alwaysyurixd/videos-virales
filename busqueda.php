<?php 
include("globales.php");
$keyworks=$_GET['busqueda'];
$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
$consulta="select titulo from articulo WHERE titulo like '%".$keyworks."%' ORDER BY fecha DESC";
$resultado=mysqli_query($conexion,$consulta);
while ($fila = mysqli_fetch_array($resultado)){
		echo $fila['titulo'];
	}
 ?>