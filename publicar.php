<?php
include("globales.php");
$nombre_imagen=$_FILES['imagen']['name'];
echo $nombre_imagen;
include("tratarImagen.php");
$titulo=utf8_decode($_POST['titulo']);
$descripcion=utf8_decode($_POST['descripcion']);
$imagen_articulo=$_FILES['imagen']['name'];
$tmp_imagen=$_FILES['imagen']['tmp_name'];
$imagen_articulo2=explode('.',$imagen_articulo);
$imagen_articulo2=$imagen_articulo2[0]."2.".$imagen_articulo2[1];
if ($_POST['imagen2']!="") {
	$imagen_articulo=$_POST['imagen2'];
}
$tipo=$_POST['tipo'];
$fecha=date('Y-m-d');
$url_nueva="Imagenes/".$imagen_articulo;
if ($titulo!="" && $descripcion!="" && $imagen_articulo!="") {
	copy($tmp_imagen, $url_nueva);
	tratarImagen("Imagenes/".$imagen_articulo);
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