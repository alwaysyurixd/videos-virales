<?php 
//logueo del sistema de videos
if (isset($_GET['error'])) {
	echo "<script>alert('Error de inicio de sesion')</script>";
}
include('globales.php');
function normaliza ($cadena){ 
$originales = 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'; 
$modificadas = 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'; 
$cadena = strtr($cadena, utf8_decode($originales), $modificadas); 
$cadena = strtolower($cadena); 
return $cadena;
} 

	$charset='ISO-8859-1'; // o 'UTF-8'
	$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
	$consulta="select * from articulo order by fecha desc";
	$resultado=mysqli_query($conexion,$consulta);
	$array=array();
	$arrayTitulo=array();
	$arrayDescripcion=array();
	$arrayImagen=array();
	$arrayFecha=array();
	$arrayId=array();
	while($fila = mysqli_fetch_array($resultado)){
	$id=$fila['idArticulo'];
    $titulo=$fila['titulo'];
    $descripcion=$fila['descripcion'];
    $imagen=$fila['imagen_portada'];
    $fecha=explode('-', $fila['fecha']); 
   	array_push($array,$titulo);
   	array_push($arrayDescripcion,$descripcion);
   	$titulo2=str_replace(" ","-",$titulo);
   	$titulo2=normaliza($titulo2);
   	array_push($arrayId,$id);
   	array_push($arrayTitulo,$titulo2);
   	array_push($arrayImagen,$imagen);
   	array_push($arrayFecha,$fecha);
  }
  	mysqli_close($conexion);
 ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-1"> 
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Videos virales</title>
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<link rel="stylesheet" type="text/css" href="style/css/media-queries.css" />
<link rel="stylesheet" type="text/css" href="style/js/player/mediaelementplayer.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700,700italic|Open+Sans+Condensed:300,700' rel="stylesheet" type='text/css'>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script src="style/js/jquery-1.7.2.min.js"></script>
<script src="style/js/ddsmoothmenu.js"></script>
<script src="style/js/retina.js"></script>
<script src="style/js/selectnav.js"></script>
<script src="style/js/jquery.masonry.min.js"></script>
<script src="style/js/jquery.fitvids.js"></script>
<script src="style/js/jquery.backstretch.min.js"></script>
<script src="style/js/mediaelement.min.js"></script>
<script src="style/js/mediaelementplayer.min.js"></script>
<script src="style/js/jquery.dcflickr.1.0.js"></script>
<script src="style/js/twitter.min.js"></script>
<script>
	$.backstretch("style/images/bg/1.jpg");
</script>
<script>
	$(document).on('ready',function(){
		$('#login').hide();
		$('#open_close').click(function(){
			$('#login').slideToggle();
		})
	})
</script>
<style>
	#open_close{
		cursor: pointer;
		display: block;
	    text-decoration: none;
	    line-height: 1;
	    font-family: 'Open Sans Condensed', sans-serif;
	    font-size: 14px;
	    letter-spacing: 0.4px;
	    color: #dedede;
	    padding: 0;
	    font-weight: bold;
	}
	#login{
		width: 200px;
		height: 140px;
		background-color: orange;
		border-radius: 2px;
		padding: 10px;
		color: #fff;
		margin-left: 0px;
	}
	#enviar{
		border: none;
		border-radius: 5px;
		margin: 15px;
		margin: 15px 82px;
		width: 70px;
	}
</style>
</head>
<body>
<div class="scanlines"></div>

<!-- Begin Header -->
<div class="header-wrapper opacity">
	<div class="header">
		<!-- Begin Logo -->
		<div class="logo">
		    <a href="index.php">
				<img src="style/images/logo2.png" alt="" />
			</a>
	    </div>
		<!-- End Logo -->
		<!-- Begin Menu -->
		<div id="menu-wrapper">
			<div id="menu" class="menu">
				<ul id="tiny">
					<li class="active"><a href="index.php">Portada</a>
						<ul>
							<li><a href="2014/04/">Mes pasado</a></li>
						</ul>
					</li>
					<li><a href="page-with-sidebar.html">Pages</a>
						<ul>
							<li><a href="page-with-sidebar.html">Page With Sidebar</a></li>
							<li><a href="full-width.html">Full Width</a></li>
						</ul>
					</li>
					<li><a href="contact.php">Contacto</a>
						<ul>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="columns.html">Columns</a></li>
						</ul>
					</li>
					<li><div id="open_close">Login</div>
						<ul>
							<form id="login" action="login.php" method="post">
								<label>Nombre</label>
								<input type="text" id="nombre" placeholder="Nombre" name="usuario" maxlength="15">
								<label>Password</label>
								<input type="password" id="password" placeholder="Password" name="password" maxlength="15">
								<input type="submit" value="Acceder" id="enviar">
							</form>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
		<!-- End Menu -->
	</div>
</div>

	

<!-- End Header -->

<!-- Begin Wrapper -->
<div class="wrapper"><!-- Begin Intro -->
<div class="intro"><?php echo $frase_semana; ?></div>
<ul class="social">
<li><a class="rss" href="#"></a></li><li><a class="facebook" href="https://www.facebook.com/yuri.carranza.73"></a></li><li><a class="twitter" href="https://twitter.com/AlwaysYurixD"></a></li><li><a class="pinterest" href="#"></a></li><li><a class="dribbble" href="#"></a></li><li><a class="flickr" href="#"></a></li><li><a class="linkedin" href="https://pe.linkedin.com/pub/yuri-carranza-quispe/94/251/b87/"></a></li></ul><!-- End Intro --> 

<!-- Begin Blog Grid -->
<div class="blog-wrap">
	<!-- Begin Blog -->
	<div class="blog-grid">
		<!-- Inicio de un artículo -->
		<div class="post format-image box"> 
			<div class="frame">
			<?php echo "<a href='articulo-".$arrayFecha[0][0]."-".$arrayFecha[0][1]."_".$arrayTitulo[0]."-".$arrayId[0]."'>
					<img src='imagenes/".$arrayImagen[0]."' alt='' />
				</a>"; ?>
			
			</div>
			<h2 class="title"><a href="post.php"><?php echo $array[0]; ?></a></h2>
			<blockquote><cite>Yuri Carranza</cite></blockquote>
			<div class="details">
				<span class="icon-image"><a href="#"><?php echo $arrayFecha[0][2]."/".$arrayFecha[0][1]."/".$arrayFecha[0][0]; ?></a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
		<!-- Fin de un artículo -->

 	
		<!-- Inicio de un artículo -->
		<div class="post format-image box"> 
			<div class="frame">
			<?php echo "<a href='articulo-".$arrayFecha[1][0]."-".$arrayFecha[1][1]."_".$arrayTitulo[1]."-".$arrayId[1]."'>
					<img src='imagenes/".$arrayImagen[1]."' alt='' />
				</a>"; ?>
				
			</div>
			<h2 class="title"><a href="post.php"><?php echo $array[1]; ?></a></h2>
			<blockquote><cite>Yuri Carranza</cite></blockquote>
			<div class="details">
				<span class="icon-image"><a href="#"><?php echo $arrayFecha[1][2]."/".$arrayFecha[1][1]."/".$arrayFecha[1][0]; ?></a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
		<!-- Fin de un artículo --> 	


		<!-- Inicio de un artículo -->
		<div class="post format-image box"> 
			<div class="frame">
			<?php echo "<a href='articulo-".$arrayFecha[2][0]."-".$arrayFecha[2][1]."_".$arrayTitulo[2]."-".$arrayId[2]."'>
					<img src='imagenes/".$arrayImagen[2]."' alt='' />
				</a>"; ?>
				
			</div>
			<h2 class="title"><a href="post.php"><?php echo $array[2]; ?></a></h2>
			<blockquote><cite>Yuri Carranza</cite></blockquote>
			<div class="details">
				<span class="icon-image"><a href="#"><?php echo $arrayFecha[2][2]."/".$arrayFecha[2][1]."/".$arrayFecha[2][0]; ?></a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
		<!-- Fin de un artículo --> 					


		<!-- Inicio de un artículo -->
		<div class="post format-image box"> 
			<div class="frame">
			<?php echo "<a href='articulo-".$arrayFecha[3][0]."-".$arrayFecha[3][1]."_".$arrayTitulo[3]."-".$arrayId[3]."'>
					<img src='imagenes/".$arrayImagen[3]."' alt='' />
				</a>"; ?>
				
			</div>
			<h2 class="title"><a href="post.php"><?php echo $array[3]; ?></a></h2>
			<blockquote><cite>Yuri Carranza</cite></blockquote>
			<div class="details">
				<span class="icon-image"><a href="#"><?php echo $arrayFecha[3][2]."/".$arrayFecha[3][1]."/".$arrayFecha[3][0]; ?></a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
		<!-- Fin de un artículo --> 					

			
 		<!-- Inicio de un artículo -->
 		<div class="post format-image box"> 
			<div class="frame">
			<?php echo "<a href='articulo-".$arrayFecha[4][0]."-".$arrayFecha[4][1]."_".$arrayTitulo[4]."-".$arrayId[4]."'>
					<img src='imagenes/".$arrayImagen[4]."' alt='' />
				</a>"; ?>
				
			</div>
			<h2 class="title"><a href="post.php"><?php echo $array[4]; ?></a></h2>
			<blockquote><cite>Yuri Carranza</cite></blockquote>
			<div class="details">
				<span class="icon-image"><a href="#"><?php echo $arrayFecha[4][2]."/".$arrayFecha[4][1]."/".$arrayFecha[4][0]; ?></a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
		<!-- Fin de un artículo --> 					


		<!-- Inicio de un artículo -->
		<div class="post format-image box"> 
			<div class="frame">
			<?php echo "<a href='articulo-".$arrayFecha[5][0]."-".$arrayFecha[5][1]."_".$arrayTitulo[5]."-".$arrayId[5]."'>
					<img src='imagenes/".$arrayImagen[5]."' alt='' />
				</a>"; ?>
				
			</div>
			<h2 class="title"><a href="post.php"><?php echo $array[5]; ?></a></h2>
			<blockquote><cite>Yuri Carranza</cite></blockquote>
			<div class="details">
				<span class="icon-image"><a href="#"><?php echo $arrayFecha[5][2]."/".$arrayFecha[5][1]."/".$arrayFecha[5][0]; ?></a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
		<!-- Fin de un artículo -->  	
 	</div>
	<!-- End Blog -->
</div>
<!-- End Blog Grid -->

<!-- Begin Page-navi -->
    <div id="navigation">
      <div class="nav-previous"><a href="#" ><span class="meta-nav-prev">&larr; Mas antiguos</span></a></div>
      <!-- 
			<div class="nav-next"><a href="#" ><span class="meta-nav-next">Newer posts &rarr;</span></a></div>
			 --> 
    </div>
    <!-- End Page-navi --> 

</div>
<!-- End Wrapper -->

<!-- Begin Footer -->
<?php 
	include("includes/footer.php");
 ?>
<!-- End Footer --> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>