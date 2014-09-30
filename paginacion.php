<?php 
include('globales.php');
$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
$sql = "SELECT COUNT(*) AS total
        FROM articulo";
$resultado = mysqli_query($conexion,$sql);
$fila = mysqli_fetch_array($resultado);
$articulosTotales = $fila['total'];
mysqli_close($conexion);
$articulosPorPagina = 8;
$paginasTotales = ceil($articulosTotales / $articulosPorPagina);
$paginaActual = 0;
if(isset($_GET['pagina'])){

    // en caso que haya datos, los casteamos a int
    $paginaActual = (int)$_GET['pagina'];
}
// el número de la página actual no puede ser menor a 0
if($paginaActual < 1){
    $paginaActual = 1;
}
else if($paginaActual > $paginasTotales){ // tampoco mayor la cantidad de páginas totales
    $paginaActual = $paginasTotales;
}
// obtenemos cuál es el artículo inicial para la consulta
$articuloInicial = ($paginaActual - 1) * $articulosPorPagina;

// buscamos en la base de datos todos los artículos que correspondan a la página
// la sentencia LIMIT hace que se limite la cantidad de registros devueltos
// hay que indicarle el dato inicial y la cantidad de registros que debe devolver
$db = mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
$sql2 = 'SELECT * 
        FROM `articulo` 
        ORDER BY `idArticulo`
        LIMIT ' . $articuloInicial . ', ' . $articulosPorPagina;
$articulos = mysqli_query($db, $sql2);
 ?>