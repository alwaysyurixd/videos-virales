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
	

 ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-1"> 
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Videos virales</title>
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<link rel="stylesheet" type="text/css" href="style/css/media-queries.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700,700italic|Open+Sans+Condensed:300,700' rel="stylesheet" type='text/css'>
<link rel="stylesheet" type="text/css" href="style/css/login.css">
<link rel="stylesheet" type="text/css" href="style/css/font-awesome.min.css">
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script src="style/js/jquery-1.7.2.min.js"></script>
<script src="style/js/ddsmoothmenu.js"></script>
<script src="style/js/retina.js"></script>
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
</head>
<body>
<?php include_once("includes/analyticstracking.php"); ?>
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
					<li>
						<i class="fa fa-search fa-2x"></i>
					</li>
					<li>
					<form class="searchform" method="get" action="busqueda.php">
					<input type="text" name="busqueda" value="Escriba y presione Enter" onFocus="this.value=''" onBlur="this.value='Escriba y presione Enter'"/>
					</form>
					</li>
					<li><a href="contact.php">Contacto</a>
						<ul>
							<li><a href="#">Typography</a></li>
							<li><a href="#">Columns</a></li>
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
	<?php  
		$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
		$consulta="select * from articulo order by fecha desc limit 8";
		$resultado=mysqli_query($conexion,$consulta);
		$contador=0;
		while($fila = mysqli_fetch_array($resultado)){
		$fecha=explode('-', $fila['fecha']);
		$titulo=$fila[1];
		$id=$fila[0];
	?>
		<div class="post format-image box"> 
			<div class="frame">
			<?php echo "<a href='articulo-$fecha[0]-$fecha[1]_$titulo-$id'>
					<img src='Imagenes/".$fila[3]."' alt='' />
				</a>"; ?>
			
			</div>
			<h2 class="title"><?php echo "<a href='articulo-$fecha[0]-$fecha[1]_$titulo-$id'>
				".$fila[1]."</a>"; ?></h2>
			<blockquote><cite>Yuri Carranza</cite></blockquote>
			<div class="details">
				<span class="icon-image"><a href="#"><?php echo $fecha[2]."/".$fecha[1]."/".$fecha[0]; ?></a></span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		</div>
	<?php  
  	}
  	?>
		<!-- Fin de un artículo -->	
 	</div>
	<!-- End Blog -->
</div>

<!-- End Blog Grid -->

<!-- Begin Page-navi -->
    <div id="navigation">
      <div class="nav-previous"><a href="pagina2.php" ><span class="meta-nav-prev">&larr; Mas antiguos</span></a></div>
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