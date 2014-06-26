<?php
include("globales.php");
include("tratarImagen.php");
$titulo=utf8_decode($_GET['titulo']);
$descripcion=utf8_decode($_GET['descripcion']);
$imagen_articulo=$_GET['imagen'];
$imagen_articulo2=explode('.',$imagen_articulo);
$imagen_articulo2=$imagen_articulo2[0]."2.".$imagen_articulo2[1];
tratarImagen("imagenes/".$imagen_articulo);
if ($_GET['imagen2']!="") {
	$imagen_articulo=$_GET['imagen2'];
}
$tipo=$_GET['tipo'];
$fecha=date('Y-m-d');
if ($titulo!="" && $descripcion!="" && $imagen_articulo!="") {
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$sql = "insert into articulo values('','".$titulo."','".$descripcion."','".$imagen_articulo2."','".$imagen_articulo."',".$tipo.",'".$fecha."')";
	$res = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
	header("Location:index.php");
}
else{
	echo "Falta ingresar algun dato";
	header("Location:administracion.php?error=si");
}

 ?>