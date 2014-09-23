<?php 
$time = 3600; // en mili-segundos 

// verificamos si existe la sesión 
session_start();
if(isset($_SESSION["usuario"])) 
{ 
      // verificamos si existe la sesión que se encarga del tiempo 
      // si existe, y el tiempo es mayor que una hora, expiramos la sesión  
      if(isset($_SESSION["expire"]) && time() > $_SESSION["expire"] + $time) 
      { 
           unset($_SESSION["expire"]); 
           unset($_SESSION["usuario"]); 
           header('Location:index.php');
      } 
      // si no existe la creamos 
      else 
      { 
           $_SESSION["expire"] = time();
       } 
}else{
	header("Location:index.php"); 
} 
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Videos Virales</title>
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
<script type="text/javascript" src="style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="style/js/retina.js"></script>
<script type="text/javascript" src="style/js/selectnav.js"></script>
<script type="text/javascript" src="style/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="style/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="style/js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="style/js/mediaelement.min.js"></script>
<script type="text/javascript" src="style/js/mediaelementplayer.min.js"></script>
<script type="text/javascript" src="style/js/jquery.dcflickr.1.0.js"></script>
<script type="text/javascript" src="style/js/twitter.min.js"></script>
<script type="text/javascript">
	$.backstretch("style/images/bg/1.jpg");
</script>
<script>
	$(document).on('ready',function(){
		$('#input_video').hide();
		$('#radio_noticia').click(function(){
			$('#input_video').hide();
		})
		$('#radio_video').click(function(){
			$('#input_video').show();
		})
	})
</script>
<script>
	$(document).on('ready',function(){
		$('#form_cambio').hide();
		$('#cambiar_password').click(function(){
			$('#form_cambio').slideToggle();
		})
	})
</script>
</head>
<body>
<?php include_once("analyticstracking.php"); ?>
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
					<li><a href="administracion/mantenimiento.php">Mantenimiento</a>
					</li>
					<li><a href="page-with-sidebar.html">Pages</a>
						<ul>
							<li><a href="page-with-sidebar.html">Page With Sidebar</a></li>
							<li><a href="full-width.html">Full Width</a></li>
						</ul>
					</li>
					<li><a href="typography.html">Styles</a>
						<ul>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="columns.html">Columns</a></li>
						</ul>
					</li>
					<li class="active"><a href="administracion/salir.php">Salir</a></li>
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
<div class="intro">
	<?php 
		include('globales.php');
		echo $frase_semana;
	 ?>
 </div>
<ul class="social">
<li><a class="rss" href="#"></a></li><li><a class="facebook" href="#"></a></li><li><a class="twitter" href="#"></a></li><li><a class="pinterest" href="#"></a></li><li><a class="dribbble" href="#"></a></li><li><a class="flickr" href="#"></a></li><li><a class="linkedin" href="#"></a></li></ul><!-- End Intro --> 

<!-- Begin Container -->
<div class="content box">

	<h1 class="title">Administración de contenido</h1>
		<div class="map"><image src="Imagenes/publicar-contenido.jpg"></div>
<h3>Feel Free to Drop Me a Line</h3>
<p>Maecenas vehicula condimentum consequat. Ut suscipit ipsum eget leotero convallis feugiat upsoyut fermentum leo auctor consequat turpis aturo nisiper.</p>

<div class="form-container">
	<form class="forms" action="publicar.php" method="POST" enctype="multipart/form-data">
		<fieldset>
			<ol>
				<li class="form-row text-input-row"><label>Titulo</label><input type="text" name="titulo" maxlength="100" class="text-input required" required/></li>
				<li class="form-row text-area-row"><label>Descripcion</label><textarea name="descripcion" class="text-area required" maxlength="5000" required></textarea></li>
				<li class="form-row text-input-row"><label>Tipo de contenido</label>Noticia<input type="radio" name="tipo" value="1" class="text-input required" checked="checked" id="radio_noticia" />Video<input type="radio" name="tipo" value="2" class="text-input required" id="radio_video" /></li>

				<li class="form-row text-input-row"><label>Imagen en portada</label><input type="file" accept="image/*" name="imagen" value="" class="text-input required email"/></li> 
				<li class="form-row text-input-row"><label>Imagen en artículo</label><input type="text" name="imagen2" value="" class="text-input required email" id="input_video" /></li> 				
				
				<li class="button-row"><input type="submit" value="Publicar" name="submit" class="btn-submit" /></li>
			</ol>
		</fieldset>
	</form>
</div>


</div>
<!-- End Container -->

<!-- Begin Sidebar -->
<div class="sidebar box">
  <div class="sidebox widget">
			<h3 class="widget-title"><?php echo "Bienvenido: ".$_SESSION['usuario']; ?></h3>
			<p>Esta es el área de administración de contenido, verifique todas sus acciones.</p>
			<p>
				<span class="lite1">Fax:</span> +555 797 534 01<br />
				<span class="lite1">Tel:</span> +555 636 646 62<br />
				<span class="lite1">E-mail:</span> alwaysyurixd@hotmail.com
			</p>
			
	</div>
	
	<div class="sidebox widget">
		<h3 class="widget-title">Custom Text</h3>
		<p>Suspendisse eu odio quis elit ultrice commodo tempor eget arcu. Sedur aliquet posuere lectus aliquam iaculi. Curabitur a risus metus. In ut lorem nisl, et adipiscing sapien. Donec sed risus tristiq scelerisque. </p>
		<button id="cambiar_password">Cambiar Contraseña</button>
		<p></p>
		<div id="form_cambio">
			<form action="administracion/cambiar_password.php" method="POST">
			<table>
				<tr>
					<td>Contraseña actual:</td><td><input type="text" name="password_antiguo"></td>
				</tr>
				<tr>
					<td>Contraseña nueva:</td><td><input type="text" name="password_nuevo"></td>
				</tr>
				<tr><td></td><td><input type="submit" value="Cambiar"></td></tr>				
			</table>				
			</form>
		</div>
	</div>
	
</div>
<!--End Sidebar -->
<div class="clear"></div>

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