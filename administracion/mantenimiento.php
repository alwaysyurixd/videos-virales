<!DOCTYPE html>
<html>
<head>
	<title>Mantenimiento</title>
	<script src="../style/js/jquery-1.7.2.min.js"></script>
	<script>
	
	</script>
</head>
<body>
<table border="1">
<tr>
 	<td>Id articulo</td><td>Titulo</td><td>Descripcion</td><td>Imagen de portada</td><td>Imagen de articulo</td><td>Fecha</td><td>Editar</td>
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
	$numero=1;
	echo " 	
 		<tr>
 	<td><input type='text' value='$fila[0]' disabled='' class='$numero'></td><td><input type='text' value='$fila[1]' disabled='' class='$numero'></td><td></td><td></td><td></td><td></td><td><button id='boton'>Editar</button></td>
 </tr>
 	";
 	
}
 ?>
 </table>
 <!--
 <table border="1">
 	<tr>
 		<td>Muestra</td><td>Editar</td>
 	</tr>
 	<tr>
 		<td><input type="text" disabled="" id="textbox"></td><td><button id="boton">Editar</button></td>
 	</tr>
 </table>
 !-->
 <tr>
 	<td><input type="text" value="<?php ?>" disabled=""></td><td></td><td></td><td></td><td></td><td></td><td></td>
 </tr>
</body>
</html>
