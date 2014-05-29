<?php 
$password="carranza";
$password2="chumpitazi";
$encriptado1=sha1($password);
$encriptado2=sha1($password2);
echo $password;
echo "<br>";
echo $password2;
echo "<br>";
echo $encriptado1;
echo "<br>";
echo $encriptado2;
echo "<br>";
 ?>