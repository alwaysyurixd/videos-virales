<?php
include("globales.php");
$titulo=utf8_decode($_GET['titulo']);
$descripcion=utf8_decode($_GET['descripcion']);
$imagen_portada=$_GET['imagen'];
$imagen_portada2=explode('.',$imagen_portada);
if ($_GET['imagen2']=="") {
	$imagen_articulo=$imagen_portada2[0]."2.".$imagen_portada2[1];
}
else{
	$imagen_articulo=$_GET['imagen2'];
}
$tipo=$_GET['tipo'];
$fecha=date('Y-m-d');
$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
$sql = "insert into articulo values('','".$titulo."','".$descripcion."','".$imagen_portada."','".$imagen_articulo."',".$tipo.",'".$fecha."')";
$res = mysqli_query($conexion,$sql);
header("Location:index.php");
 ?>