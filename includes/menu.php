<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style/css/login.css">
	<link rel="stylesheet" type="text/css" href="style/css/font-awesome.min.css">
</head>
<body>
<div class="scanlines"></div>
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
<script src="style/js/scripts.js"></script>
</body>
</html>