<?php 
include('../globales.php');
	$idArticulo=$_POST['idArticulo'];
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];
	//$imagen_portada=$_POST['imagen_portada'];
	//$imagen_articulo=$_POST['imagen_articulo'];
	$tag=$_POST['tag'];
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$sql = "update articulo set titulo='".$titulo."',descripcion='".$descripcion."' where idArticulo=".$idArticulo;
	echo $sql;
	$res = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
	header("Location:mantenimiento.php");

 ?>