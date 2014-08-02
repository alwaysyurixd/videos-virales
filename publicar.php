<?php
include("globales.php");
include("tratarImagen.php");
$titulo=utf8_decode($_POST['titulo']);
$descripcion=utf8_decode($_POST['descripcion']);
$imagen_capturada=$_FILES['imagen']['name'];
$tmp_imagen=$_FILES['imagen']['tmp_name'];
$imagen_portada=explode('.',$imagen_capturada);
$imagen_portada=$imagen_portada[0]."2.".$imagen_portada[1];
$imagen_miniatura=str_replace('2.', '3.', $imagen_portada);
if ($_POST['imagen2']!="") {
	$imagen_articulo=$_POST['imagen2'];
}
else{
	$imagen_articulo=$imagen_capturada;
}
$tipo=$_POST['tipo'];
$fecha=date('Y-m-d');
$url_nueva="Imagenes/".$imagen_capturada;
if ($titulo!="" && $descripcion!="" && $imagen_capturada!="") {
	copy($tmp_imagen, $url_nueva);
	tratarImagenPortada("Imagenes/".$imagen_capturada);		
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$sql = "insert into articulo values('','".$titulo."','".$descripcion."','".$imagen_portada."','".$imagen_articulo."','".$imagen_miniatura."',".$tipo.",'".$fecha."')";
	$res = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
	header("Location:index.php");
}
else{
	echo "Falta ingresar algun dato";
	header("Location:administracion.php?error=si");
}
tratarImagenMiniatura("Imagenes/".$imagen_capturada);	
 ?>