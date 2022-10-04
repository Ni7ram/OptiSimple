<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>OptiSimple Backup, (&Oacute;ptica '.$this->session->nombre_optica.')</title>
	</head>
	<body>
		<h3>OptiSimple Backup, (&Oacute;ptica <?php echo $this->session->nombre_optica.') - '.date('d / m / Y')?></h3>
		<h3>
			<a href="<?php echo site_url("api/backup")?>"> [ Descargar ] </a>
		</h3>
		<hr>
		
		<h4>Clientes (<?php echo count($clientes)?>)</h4>
		<?php echo json_encode($clientes, JSON_UNESCAPED_UNICODE); ?>
		<br>

		<h4>&Oacute;rdenes (<?php echo count($ordenes)?>)</h4>
		<?php echo json_encode($ordenes, JSON_UNESCAPED_UNICODE); ?>
		<br>

		<H3>
			<a href="<?php echo site_url()?>"> << Volver </a>
		</h3>
	</body>
</html>