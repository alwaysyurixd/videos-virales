<?php 
include("globales.php");
	$usuario=addslashes($_POST['usuario']);
	$password=addslashes($_POST['password']);
	$password=sha1($password);
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$consulta="select * from usuario where usuario='".$usuario."' and password='".$password."'";
	$resultado=mysqli_query($conexion,$consulta);
	$contador=0;
	while ( $fila=mysqli_fetch_array($resultado)) {
		$contador++;
	}
	if ($contador>0) {
		session_start();
		$_SESSION['autentificado']="SI";
		$_SESSION['usuario']=$usuario;
		header("Location:administracion.php");
	}
	else{
		header("Location:index.php?error=si");
	}
 ?>
 