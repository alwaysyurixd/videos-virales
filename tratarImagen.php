<?php
function tratarImagen($ruta_imagen){
	$ruta_imagen = $ruta_imagen;
	$ruta_imagen2 = str_replace('.', '2.', $ruta_imagen);
	$miniatura_ancho_maximo = 490;
	$miniatura_alto_maximo = 242;
	$info_imagen = getimagesize($ruta_imagen);
	$imagen_ancho = $info_imagen[0];
	$imagen_alto = $info_imagen[1];
	$imagen_tipo = $info_imagen['mime'];
	$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
	$imagen = imagecreatefromjpeg( $ruta_imagen );
	imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
	imagejpeg( $lienzo,$ruta_imagen2, 90 );
}

 ?>