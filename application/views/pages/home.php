<div>
	<!--<div class="uk-grid">
		<div class="uk-width-6-10">
			<?php
				//echo '<h2>Bienvenido al sistema, '.$this->session->name.'</h2>';
			?>
		</div>
	</div>	-->

	<!--<hr style="opacity: 0.5;">-->

	<div class="uk-grid">
		<!--<div class="uk-width-5-10">
			<div class="uk-panel-box">
				<table class="uk-table uk-table-condensed" style="margin-bottom: -10px;">
					<thead>
						<tr>
							<th><h3><i class="uk-icon-exclamation-circle uk-icon-small uk-icon-justify"></i>&nbsp; <b>Novedades</b></h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>	
								<p><i class="uk-icon-caret-right uk-icon-small uk-icon-justify"></i>&nbsp; Nueva funci&oacute;n de Backup</p>
						    </td>
						</tr>
						<tr>
							<td>	
								<p><i class="uk-icon-caret-right uk-icon-small uk-icon-justify"></i>&nbsp; Nueva versión: OptiSimple 1.0 (Beta terminada)</p>
						    </td>
						</tr>
						<tr>
							<td>	
								<p><i class="uk-icon-caret-right uk-icon-small uk-icon-justify"></i>&nbsp; Nueva interfaz</p>
						    </td>
						</tr>
						<!--<tr>
						    <td>
						        <p><i class="uk-icon-caret-right uk-icon-small uk-icon-justify"></i>&nbsp; Lista de proveedores</p>
						    </td>
						</tr>
						<tr>
						    <td>
						        <p><i class="uk-icon-caret-right uk-icon-small uk-icon-justify"></i>&nbsp; Feliz año nuevo!</p>
						    </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		-->

		
		<div class="uk-width-3-10">
			<h1 class="uk-align-left" style="margin-top: -8px; padding-top: -30px;">Men&uacute;</h1>
			<hr style="opacity: 1;">
			<br>
			<div style="margin-top: -6px;">
				<!-- <a href="ordenes/crear" style="padding-right: 30px;"><i class="uk-icon-edit uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Nueva Orden </a> -->
				<a href="clientes/agregar">
					<div class="menu-item">
						<i class="uk-icon-user-plus uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Nuevo cliente 
					</div>
				</a>

				<!-- <a href="clientes">
					<div class="menu-item">
						<i class="uk-icon-users uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Ver clientes
					</div>
				</a>-->



				<!--<div>
					<h3>Buscar cliente:</h3>
					
					    <!-- SEARCH
                        <form class="uk-form uk-search" onsubmit="handleSearchHome()">
                            <div class="uk-form-icon uk-width-3-5">
                                <i class="uk-icon-search"></i>
                                <input class="uk-search-field uk-form-large uk-width-1-1" id="search_input_home" type="search" placeholder="Buscar cliente..">
                            </div>
                            &nbsp;
                            <button id="search_button_home" type="button" class="uk-button uk-button-primary uk-button-large" onclick="handleSearchHome()" data-uk-tooltip="{pos:'bottom', animation:'true', delay:'400'}" title="<b>Buscar</b>"><i class="uk-icon-search uk-icon-tiny"></i></button>
                        </form>
                        <script>
                            function handleSearchHome(){
                                <?php
                                    echo 'window.location.assign("'.site_url('clientes/buscar/" + document.getElementById("search_input_home").value);');
                                ?>
                            }
                        </script>
                        <br>
				</div>-->


				<!--<hr style="opacity: 0.3;">-->


				<a data-uk-modal="{target:'#modal-help-home', center:true}">
					<div class="menu-item">
						<i class="uk-icon-file uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Nueva orden 
					</div>
				</a>

				<div class="uk-modal" id="modal-help-home">
                    <div class="uk-modal-dialog uk-modal-dialog-large uk-dialog-centered" aria-hidden="true">
                        <div class="uk-grid">
                            <div class="uk-width-1-1"></div>
                            <div class="uk-width-10-10" style="padding-left: 55px; padding-right: 23px;">
                                <p><h1><i class="uk-icon-file uk-icon-small" style="opacity: 0.3;"></i>&nbsp;&nbsp;Cree una orden en 3 pasos</h1></p>                                                
                                <hr>    
                                <br>                  
                                <div class="uk-grid">
                                    <div class="uk-width-1-3">
                                        <h3><b>1. </b> Si la orden es para un cliente nuevo, reg&iacute;strelo con el bot&oacute;n <b>Nuevo Cliente</b>; si ya est&aacute; registrado, salte al paso 2.</h3>
                                        <div class="uk-width-1-1 uk-container-center">
                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/1.png") ?>" >
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <h3><b>2. </b> Encuentre al cliente con ayuda del <b>buscador</b> situado en la esquina superior derecha.</h3>
                                        <div class="uk-width-1-1 uk-container-center">
                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/2.png") ?>" >
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <h3><b>3. </b> Por &uacute;ltimo, presione el bot&oacute;n de <b>Nueva orden</b> ( <button class="uk-button uk-button-primary" type="submit" data-uk-tooltip="{pos:'top', animation:'true', delay:'0'}" title="<b>Nueva orden</b>"><i class="uk-icon-plus"></i></button> ) en el cliente deseado. Eso es todo!</h3>
                                        <div class="uk-width-1-1 uk-container-center">
                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/3.png") ?>" >                                                       
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <br>
                                <br>
                                <hr>
                                <div class="uk-align-right"><i>De esta forma, cuando tenga a los clientes registrados, usted hará todo en 2 pasos como mucho. Las posibles acciones son crearle una <b>nueva orden</b>, ver su <b>historial</b>, <b>editar</b> sus datos personales y <b>borrar</b> al cliente.</b></i></div>
                            	-->
                            </div>
                            <br>
                        </div>
                        <br>
                    </div>
                </div>


				<!--<a href="api/backup">
					<div class="menu-item">
						<i class="uk-icon-download uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Copia de seguridad 
					</div>
				</a>-->				


				<a data-uk-modal="{target:'#modal-help', center:true}">
					<div class="menu-item">
						<i class="uk-icon-question-circle uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Ayuda 
					</div>
				</a>
				

				<!--<a href="logout">
					<div class="menu-item">
						<i class="uk-icon-sign-out uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Salir 
					</div>
				</a>-->

				<!--<a href="logout" style="padding-right: -100px;"><i class="uk-icon-sign-out uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Cerrar sesion </a>-->
			</div>
		</div>

		<div class="uk-width-7-10">
			<?php 

				$attributes = array('class' => 'uk-form uk-width-1-1 uk-container-center');
				echo form_open('api/save_note', $attributes);
			?>


				<div class="uk-form-row uk-width-1-1">
					<h2 class="uk-align-right" style="opacity: 0.7;">Mis notas</h2>
					<hr style="opacity: 0.5;">
					<textarea name="note" id="note" class="uk-form-input uk-width-1-1" style="border-radius: 4px;" rows="14" placeholder="Tus anotaciones.."><?php echo $nota ?></textarea>
				</div>
				<div class="uk-form-row uk-width-1-1">
					<button type="submit" class="uk-button uk-button-primary uk-align-right" style="margin-top: 3px;" name="submit">Guardar</button>
				</div>
			</form>
		</div>
	</div>

	<!--<BR>
	<hr style="opacity: 0.3;">

	<div class="sugerencias">
		<H5 style="display: inline-block;"><i class="uk-icon-commenting uk-icon-small"></i><b>&nbsp;&nbsp;¿Ten&eacute;s alguna sugerencia, o tuviste alg&uacute;n problema?</b></H5>
		<H5 style="margin-top: -10px;">&nbsp;&nbsp;Somos los primeros en querer saber.</H5>
		<form class="uk-form">
			<div class="uk-form-row">
				<div class="uk-form-controls">
					<div class="uk-form-row">
						<textarea class="uk-width-1-1" rows="3" placeholder="Contanos ac&aacute;..."></textarea>
					</div>
					<div class="uk-form-row">
                        <input class="uk-button uk-button-primary uk-align-right" type="submit" value="Enviar"/>
                    </div>
				</div>					
			</div>
		</form>		
	</div>-->

	<?php
		$this->session->home = false;
	?>

	<script src=<?php echo site_url("assets/js/uikit.min.js"); ?> ></script>   
	<link href=<?php echo site_url("assets/css/components/notify.css"); ?> rel="stylesheet" type="text/css">
	<script src=<?php echo site_url("assets/js/components/notify.js"); ?> ></script>
</div>