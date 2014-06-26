<?php 
session_start(); 
$usuario=$_SESSION['usuario'];
include("../globales.php");
$password_antiguo=sha1($_POST['password_antiguo']);
$password_nuevo=sha1($_POST['password_nuevo']);
$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
$consulta1="select password from usuario where usuario='".$usuario."'";
$resultado1=mysqli_query($conexion,$consulta1);
$fila=mysqli_fetch_array($resultado1);
if ($fila[0]==$password_antiguo) {
	$consulta2="update usuario set password = '".$password_nuevo."' where password ='".$password_antiguo."'";
	$resultado2=mysqli_query($conexion,$consulta2);
	session_destroy();
	header("Location:../index.php")
}
else{
	echo "la contrasenia ingresada no es correcta";
}

 ?>