<div>
	<div class="uk-panel uk-panel-box">
		<H2 style="color: black;">&nbsp;<i class="uk-icon uk-icon-small uk-icon-user" style="color: #000000; opacity: 0.5;"></i>&nbsp;&nbsp;<?php echo $apellido.', '.$nombre; if($dni){ echo ' &nbsp;|&nbsp; DNI: '.$dni; } ?></H2>
	</div>
	<br>

	<div class="uk-grid" style="margin-top: 10px;">
		<div class="uk-width-4-10" style="padding-left: 0px; margin-left: 0px;">

			<div class="uk-grid uk-container-center">
			    <div class="uk-width-4-4 uk-container-center">
			        <H3>&nbsp;<i class="uk-icon uk-icon-small uk-icon-edit" style="color: #ffffff; opacity: 0.7;"></i>&nbsp;&nbsp;Datos personales</H3>
			        <hr style="opacity: 0.5;">
			        <?php
			            $attributes = array('class' => 'uk-form uk-width-1-1');
			            $hidden = array('id_cliente' => $id_cliente, 'nombre' => $nombre, 'dni' => $dni, 'apellido' => $apellido, 'url' => site_url('clientes/editar/'.$id_cliente));
			            echo form_open('clientes/editar/'.$id_cliente, $attributes, $hidden);
			        ?>
			            <fieldset>

			                <!-- NOMBRE 
			                <div class="uk-form-row uk-width-1-1">  
			                    <input type="text" readonly disabled="disabled" class="uk-form-large uk-width-1-1" maxlength="20" placeholder="Nombre" value="<?= $nombre.' '.$apellido ?>" data-uk-tooltip="{pos:'left', animation:'true', delay:'400'}" title="<b>Nombre</b>" />     
			                </div> -->

			                <!-- APELLIDO
			                <div class="uk-form-row uk-width-1-1">    
			                    <input type="text" readonly disabled="disabled" class="uk-form-large uk-width-1-1" maxlength="20" placeholder="Apellido" value="<?= $apellido ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Apellido</b>" />
			                </div>-->

			                <!-- DNI 
			                <div class="uk-form-row uk-width-1-1">
			                    <?php echo form_error('dni'); ?>
			                    <input id="dni" name="dni" <?php if($dni){ echo 'readonly disabled="disabled"'; } ?> type="text" class="uk-form-large uk-width-1-1" maxlength="8" placeholder="DNI (opcional)" <?php if($dni == 0) { echo 'value=""'; }else{ echo 'value="'.$dni.'"'; } ?> data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>DNI</b>" />
			                </div>-->

			                <!-- DOMICILIO -->
			                <div class="uk-form-row uk-width-1-1">
			                    <?php echo form_error('domicilio'); ?>
			                    <input id="domicilio" name="domicilio" type="text" class="uk-form-large uk-width-1-1" placeholder="Domicilio" value="<?= $domicilio ?>" data-uk-tooltip="{pos:'left', animation:'true', delay:'400'}" title="<b>Domicilio</b>" />
			                </div>

			                <!-- TELEFONO -->
			                <div class="uk-form-row uk-width-1-1">
			                    <?php echo form_error('telefono'); ?>
			                    <input id="telefono" name="telefono" type="text" class="uk-form-large uk-width-1-1" placeholder="Tel&eacute;fono" value="<?= $telefono ?>" data-uk-tooltip="{pos:'left', animation:'true', delay:'400'}" title="<b>Tel&eacute;fono</b>"  />
			                </div>

			                <!-- CELULAR -->
			                <div class="uk-form-row uk-width-1-1">
			                    <?php echo form_error('cel'); ?>
			                    <input id="cel" name="cel" type="text" class="uk-form-large uk-width-1-1" placeholder="Celular" value="<?= $cel ?>" data-uk-tooltip="{pos:'left', animation:'true', delay:'400'}" title="<b>Celular</b>"  />
			                </div>

			                <!-- VOLVER / SUBMIT -->
			                <div class="uk-form-row uk-width-1-1">
			                    <div class="uk-grid">
			                        <div class="uk-width-1-2">
			                            
			                        </div>
			                        <div class="uk-width-1-2">
			                            <button class="uk-button uk-button-primary uk-align-right" type="submit" name="submit"><i class="uk-icon uk-icon-save"></i>&nbsp; Guardar</button>
			                        </div>
			                    </div>
			                </div>
			            </fieldset>
		        	</form>
	    </div>
	</div>
</div>
