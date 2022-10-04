<div style="padding-top: -35px; margin-top: 10px;">
	<div class="uk-grid">		
		<?php
			if(count($clientes) == 0){
				echo '<div class="uk-width-1-1">';
				echo $title;

				echo '<p><h4>La b&uacute;squeda no di&oacute; resultados, <a href="'.site_url("clientes/agregar").'">¿agregarlo al sistema como nuevo cliente?</h4></p>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="uk-width-5-10">';
				echo $title;
		?>
	</div>
	<div class="uk-width-5-10">
		<div style="opacity: 0.4; margin-top: 7px; margin-right: -30px; padding-right: -30px;" class="uk-align-right">
			<H4 style="display:inline-block; margin-top: 0px;"><i class="uk-icon-plus uk-icon-small"></i>&nbsp; Nueva Orden &nbsp;&nbsp;&nbsp;&nbsp;</H4>&nbsp;&nbsp;
			<!--<H4 style="display:inline-block; margin-top: 0px;"><i class="uk-icon-folder-open uk-icon-tiny"></i>&nbsp; Ver Historial &nbsp;&nbsp;&nbsp;&nbsp;</H4>&nbsp;&nbsp;-->
			<!--<H4 style="display:inline-block; margin-top: 0px;"><i class="uk-icon-edit uk-icon-tiny"></i>&nbsp; Editar Datos &nbsp;&nbsp;&nbsp;&nbsp;</H4>&nbsp;&nbsp;-->
			<!--<H4 style="display:inline-block; margin-top: 0px;"><i class="uk-icon-search uk-icon-tiny"></i>&nbsp; Ver Perfil &nbsp;&nbsp;&nbsp;&nbsp;</H4>&nbsp;&nbsp;-->
			<H4 style="display:inline-block; margin-top: 0px;"><i class="uk-icon-trash uk-icon-small"></i>&nbsp; Borrar Cliente &nbsp;&nbsp;&nbsp;&nbsp;</H4>&nbsp;&nbsp;
		</div>
	</div>
</div>
	</div>
	<hr>

		<table class="uk-table uk-table-list">
			<thead>
		        <!--<tr>
		            <th>Nombre</th>
		            <th>Acciones</th>
		            <!-- <th>Telefono</th> -->
		            <!-- <th>DNI</th> -->
		        <!--</tr>-->
		    </thead>
		    <tbody>
				<?php foreach ($clientes as $cliente): ?>
					<tr class="uk-animation-fade">
						<td>
							<div class="uk-grid">
								<div class="uk-width-8-10">
									<a href=<?php echo site_url('clientes/'.$cliente['id_cliente']); ?> >
										<div>										
											<h3>
											<!--<a href=<?= site_url().'clientes/'.$cliente['id_cliente'] ?>>-->
									        	<i class="uk-icon uk-icon-user uk-icon-medium" style="margin-left: 15px; opacity: 0.5;">&nbsp;&nbsp;</i><b><?= $cliente['apellido'].'</b>, '.$cliente['nombre']; ?>
									        <!--</a>-->
									        </h3>
								        </div>
								    </a>
						        </div>
						        <div class="uk-width-2-10 uk-text-right">
						        	<!-- <td>
								        <?= $cliente['telefono'] ?>
								    </td> -->
								    <!-- <td>
								        <?php if($cliente['dni']) { echo $cliente['dni']; } ?>
								    </td> -->
								    <!--<td>
								        <?php //echo $cliente['domicilio'] ?>
								    </td>-->
							   	
							   		<div style="margin: auto; display: inline-block;">				   			
										<div class="uk-grid uk-grid-collapse uk-text-right" style="margin-right: 13px;">

											<!-- NUEVA ORDEN -->					   			
											<div class="uk-width-1-2">
									   			<!-- SE LLENAN CAMPOS OCULTOS CON LOS DATOS DE CADA CLIENTE, PARA PASAR POR POST EN CASO DE HACERLE UNA NUEVA ORDEN -->
										   		<form action=<?= site_url().'ordenes/crear '; ?> method="post">
													<input type="hidden" name="nombre_cliente" value="<?= $cliente['apellido'].', '.$cliente['nombre']; ?>">
													<input type="hidden" name="domicilio_cliente" value="<?= $cliente['domicilio'] ?>">
													<input type="hidden" name="telefono_cliente" value="<?= $cliente['telefono'] ?>">
													<input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">

								   					<!-- NUMERO DE ORDEN A CREAR -->
								   					<input type="hidden" name="num_orden" value="<?= $num_orden ?>">

													<button id="submit_<?= $cliente['id_cliente'] ?>" class="uk-button uk-button-large uk-button-primary" style="margin-right: 15px;" type="submit" data-uk-tooltip="{pos:'top', animation:'true', delay:'0'}" title="<b>Nueva orden</b>"><i class="uk-icon-plus uk-icon-tiny"></i></button>
													
												</form>	
											</div>
											<hr style="opacity: 0.4;">

											<!-- HISTORIAL 
											<div class="uk-width-1-4">
										   		<a href=<?php echo site_url('clientes/historial/'.$cliente['id_cliente']); ?> ><button class="uk-button uk-button-primary" data-uk-tooltip="{pos:'top', animation:'true', delay:'0'}" title="<b>Ver Historial</b>"><i class="uk-icon-folder-open"></i></button></a>
									   		</div> -->

									   		<!-- EDITAR 
										   	<div class="uk-width-1-4">
										   		<a href=<?php echo site_url('clientes/edit/'.$cliente['id_cliente']); ?> ><button class="uk-button uk-button-primary" data-uk-tooltip="{pos:'top', animation:'true', delay:'0'}" title="<b>Editar datos</b>"><i class="uk-icon-edit"></i></button></a>
										   	</div>-->

										   	<!-- PERFIL
										   	<div class="uk-width-1-3">
										   		<a href=<?php echo site_url('clientes/'.$cliente['id_cliente']); ?> ><button style="margin-right: 3px;" class="uk-button uk-button-large uk-button-primary" data-uk-tooltip="{pos:'top', animation:'true', delay:'0'}" title="<b>Ver Perfil</b>"><i class="uk-icon-search uk-icon-tiny"></i></button></a>
										   	</div> -->

											<!-- BORRAR CLIENTE -->
											<div class="uk-width-1-2" data-uk-tooltip="{pos:'top', animation:'true', delay:'0'}" title="<b>Borrar cliente</b>">
											  	<button onclick="confirmDelete<?= $cliente['id_cliente'] ?>()" class="uk-button uk-button-large uk-button-primary uk-button-danger"><i class="uk-icon-trash uk-icon-tiny"></i></button>
										    </div>										

										   	<!-- CLIENT DELETE HANDLER (modal) -->
										   	<?php 
										   		echo '<script>' . PHP_EOL;
										   		echo 	'function confirmDelete'.$cliente['id_cliente'].'(){' . PHP_EOL;
										   		echo 		'UIkit.modal.confirm(\'<p style="color: #000000;"><h2 style="color: #000000;"><b>&nbsp;&nbsp;<i class="uk-icon-exclamation-triangle" style="color: #FF9900;"></i>&nbsp;&nbsp;ATENCI&Oacute;N</b></h2><hr style="margin-left: 10px;"><p style="color: #000000; margin-left:10px;">Est&aacute; a punto de borrar un cliente y <b>todos sus registros</b>; &eacutesta operaci&oacute;n no se podr&aacute; deshacer, ¿Confirma la operaci&oacute;n?</p>\', function(){' . PHP_EOL;
												echo 				'window.location.replace("'.site_url().'clientes/borrar/'.$cliente['id_cliente'].'");' . PHP_EOL;
											   	echo 			'}' . PHP_EOL;
										   		echo		');' . PHP_EOL;
										   		echo 	'}';
									        	echo '</script>';
									        ?>
								        </div>
							        </div>
							    </div>
						    </div>
					   	</td>
					</tr>
				</div>
				<?php endforeach ?>

			</div>
		</tbody>
	</table>

<?php
	}
?>
	
<hr>

<!-- VOLVER / SUBMIT -->
<div class="uk-form-row uk-width-1-1">
    <div class="uk-width-1-2">
        <a class="uk-button uk-button-primary" href=<?php echo site_url(""); ?>><i class="uk-icon uk-icon-caret-left"></i>&nbsp; Volver</a> 
    </div>
</div>