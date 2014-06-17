<?php 
include('../../globales.php');
$descripcion=explode("/", $_SERVER['PHP_SELF']);
$descripcion2=$descripcion[4];
$descripcion3=str_replace("-"," ",$descripcion2);
$contenido=str_replace(".php","",$descripcion3);
$conexion=mysqli_connect($servidor,$usuarioBD,$passwordBD,$base_datos);
$consulta="select * from articulo where titulo='".$contenido."'";
$resultado=mysqli_query($conexion,$consulta);
$fila = mysqli_fetch_array($resultado);				
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Videos virales</title>
<link rel="stylesheet" type="text/css" media="all" href="../../style.css" />
<link rel="stylesheet" type="text/css" href="../../style/css/media-queries.css" />
<link rel="stylesheet" type="text/css" href="../../style/js/player/mediaelementplayer.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700,700italic|Open+Sans+Condensed:300,700' rel="stylesheet" type='text/css'>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script src="../../style/js/jquery-1.7.2.min.js"></script>
<script src="../../style/js/ddsmoothmenu.js"></script>
<script src="../../style/js/retina.js"></script>
<script src="../../style/js/selectnav.js"></script>
<script src="../../style/js/jquery.masonry.min.js"></script>
<script src="../../style/js/jquery.fitvids.js"></script>
<script src="../../style/js/jquery.backstretch.min.js"></script>
<script src="../../style/js/mediaelement.min.js"></script>
<script src="../../style/js/mediaelementplayer.min.js"></script>
<script src="../../style/js/jquery.dcflickr.1.0.js"></script>
<script src="../../style/js/twitter.min.js"></script>
<script>
	$.backstretch("../../style/images/bg/1.jpg");
</script>
</head>
<!--COMENTARIOS DE FACEBOOK-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--FIN DE COMENTARIOS DE FACEBOOK-->
<body class="single">
<?php include("../../menu.php") ?>
<!-- Begin Wrapper -->
<div class="wrapper"><!-- Begin Intro -->
<div class="intro"><?php echo $frase_semana; ?></div>
<ul class="social">
<li><a class="rss" href="#"></a></li><li><a class="facebook" href="#"></a></li><li><a class="twitter" href="#"></a></li><li><a class="pinterest" href="#"></a></li><li><a class="dribbble" href="#"></a></li><li><a class="flickr" href="#"></a></li><li><a class="linkedin" href="#"></a></li></ul><!-- End Intro --> 

	<!-- Begin Main Image -->
	<div class="main-image">
		<div class="outer">
			<span class="inset">
			<?php 
			if ($fila[5]==2) {
				echo $fila[4]; 
			}
			else{
				echo "<image src='../../imagenes/".$fila[4]."'>"; 
			}
			
			?>
			</span>
		</div>
	</div>
	<!-- End Main Image --> 

<!-- Begin Container -->
<div class="content">

		<!-- Begin Post -->
		<div class="post format-image box"> 

			<div class="details">
				<span class="icon-image">September 26, 2012</span>
				<span class="likes"><a href="#" class="likeThis">44</a></span>
				<span class="comments"><a href="#">3</a></span>
			</div>
		
			<h1 class="title"><?php echo $fila[1]; ?></h1>
			<p>
			<?php 
				echo $fila[2];
			 ?>
			</p>
		
			<div class="tags"><a href="#">journal</a>, <a href="#">photography</a> </div>	
			
			<div class="post-nav">
				<span class="nav-prev"><a href="#">&larr; Rock Paper Scissors Lizard Spock</a></span>
				<span class="nav-next"><a href="#">Charming Winter &rarr;</a></span>
				<div class="clear"></div>
			</div>

		</div>
		<!-- End Post --> 	
	
		<!-- Begin Comment Wrapper -->
		<div id="comment-wrapper" class="box">		
		<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fmasvistos.com%2F2014%2F04%2FLa-huelga-esta-causando-un-gran-perjuicio-al-publico-que-requiere-del-servicio-judicial..php%2F&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
		<div class="fb-comments" data-href="http://alt1040.com/2014/04/pelea-fan-star-wars-harry-potter" data-width="600" data-numposts="5" data-colorscheme="dark"></div>
		</div>	

		<!-- End Comment Wrapper -->

</div>
<!-- End Container -->

<!-- Begin Sidebar -->
<div class="sidebar box">
  <div class="sidebox widget">
			<h3 class="widget-title">Popular Posts</h3>
			<ul class="post-list">
			  	<li> 
			  		<div class="frame">
			  			<a href="#"><img src="../../style/images/art/s1.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Charming Winter</a></h6>
					    <em>28th Sep 2012</em>
				    </div>
				</li>
				<li> 
			  		<div class="frame">
			  			<a href="#"><img src="../../style/images/art/s2.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Trickling Stream</a></h6>
					    <em>5th Sep 2012</em>
				    </div>
				</li>
				<li> 
			  		<div class="frame">
			  			<a href="#"><img src="../../style/images/art/s3.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Morning Glory</a></h6>
					    <em>26th Sep 2012</em>
				    </div>
				</li>
			</ul>
			
	</div>
	
	<div class="sidebox widget">
		<h3 class="widget-title">Search</h3>
		<form class="searchform" method="get" action="#">
			<input type="text" name="s" value="type and hit enter" onFocus="this.value=''" onBlur="this.value='type and hit enter'"/>
		</form>
	</div>
	
	<div class="sidebox widget">
		<h3 class="widget-title">Custom Text</h3>
		<div>Suspendisse eu odio quis elit ultrice commodo tempor eget arcu. Sedur aliquet posuere lectus aliquam iaculi. Curabitur a risus metus. In ut lorem nisl, et adipiscing sapien. Donec sed risus tristiq scelerisque. </div>
	</div>
	
	<div class="sidebox widget">
		<h3 class="widget-title">Categories</h3>
			<ul>
				<li><a href="#">Detektivbyrån</a></li>
				<li><a href="#">Flowers</a></li>
				<li><a href="#">Funny</a></li>
				<li><a href="#">Journal</a></li>
				<li><a href="#">Landscape</a></li>
				<li><a href="#">Nature</a></li>
				<li><a href="#">Photography</a></li>
				<li><a href="#">Video</a>
			</li>
		</ul>
</div></div>
<!--End Sidebar -->
<div class="clear"></div>

</div>
<!-- End Wrapper -->

<!-- Begin Footer -->
<?php 
include("../../includes/footer.php");
 ?>
<!-- End Footer --> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>