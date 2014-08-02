<?php 
include("globales.php");
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
				<td><a href='articulo-$fecha[0]-$fecha[1]_$titulo-$id'>$fila[1]</a></td>
				<td>$fila[7]</td>
			 </tr>";
		$contador++;
	}
echo "</table>";
if ($contador==0) {
	echo "No se encontraron resultados";
}
 ?>