<?php 
include('../globales.php');
	$idArticulo=$_GET['id'];
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$sql = "delete from articulo where idArticulo=".$idArticulo;
	$res = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
	header("Location:mantenimiento.php");
 ?>