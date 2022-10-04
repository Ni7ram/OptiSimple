<div align="center" class="main"><br>
	<p align="center">
		<h4>Procesando solicitud..</h4>
	</p>

	<!-- SI EXISTE, SALE MENSAJE CUSTOMIZADO, SI NO UNO FIJO -->
	<?php 	
		if(!empty($mensaje) && is_string($mensaje)){
			echo '<h3><span class="label label-success">'.$mensaje.' <span class="glyphicon glyphicon-ok"></span></span></h3>';
		}else{
			echo '<h3><span class="label label-success">Operación realizada con éxito! <span class="glyphicon glyphicon-ok"></span></span></h3>';
		}
		echo '<br> ';
	?>

	<!-- SI HAY URL ANTERIOR PARA REDIRECCIONAR, SE USA. SI NO, VUELVE AL INDEX -->
	<?php	
		if(!empty($url_anterior)){
			echo '<a href="'.$url_anterior.'" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Volver </a>';
			//echo '<a href="'.$url_anterior.'">Volver</a> ';
		}else{
			echo '<a href="/JabadOnline/">Volver</a> ';
		}
		echo '  ';
	?>

	<br>
	<br>
</div>
