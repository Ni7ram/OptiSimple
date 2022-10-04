<div class="uk-grid uk-container-center">
    <div class="uk-width-2-4 uk-container-center">
        <H2>&nbsp;<i class="uk-icon uk-icon-small uk-icon-edit" style="color: #ffffff; opacity: 0.7;"></i>&nbsp;&nbsp;Editar datos</H2>
        <HR>
        <?php
            $attributes = array('class' => 'uk-form uk-width-1-1');
            $hidden = array('id_cliente' => $id_cliente, 'nombre' => $nombre, 'dni' => $dni, 'apellido' => $apellido, 'url' => site_url('clientes/editar/'.$id_cliente));
            echo form_open('clientes/editar/'.$id_cliente, $attributes, $hidden);
        ?>
            <fieldset>

                <!-- NOMBRE -->
                <div class="uk-form-row uk-width-1-1">  
                    <input type="text" readonly disabled="disabled" class="uk-form-large uk-width-1-1" maxlength="20" placeholder="Nombre" value="<?= $nombre ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Nombre</b>" />     
                </div>

                <!-- APELLIDO -->
                <div class="uk-form-row uk-width-1-1">    
                    <input type="text" readonly disabled="disabled" class="uk-form-large uk-width-1-1" maxlength="20" placeholder="Apellido" value="<?= $apellido ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Apellido</b>" />
                </div>

                <!-- DNI -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('dni'); ?>
                    <input id="dni" name="dni" <?php if($dni){ echo 'readonly disabled="disabled"'; } ?> type="text" class="uk-form-large uk-width-1-1" maxlength="8" placeholder="DNI (opcional)" <?php if($dni == 0) { echo 'value=""'; }else{ echo 'value="'.$dni.'"'; } ?> data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>DNI</b>" />
                </div>

                <!-- DOMICILIO -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('domicilio'); ?>
                    <input id="domicilio" name="domicilio" type="text" class="uk-form-large uk-width-1-1" placeholder="Domicilio" value="<?= $domicilio ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Domicilio</b>" />
                </div>

                <!-- TELEFONO -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('telefono'); ?>
                    <input id="telefono" name="telefono" type="text" class="uk-form-large uk-width-1-1" placeholder="Tel&eacute;fono" value="<?= $telefono ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Tel&eacute;fono</b>"  />
                </div>

                <!-- CELULAR -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('cel'); ?>
                    <input id="cel" name="cel" type="text" class="uk-form-large uk-width-1-1" placeholder="Celular" value="<?= $cel ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Celular</b>"  />
                </div>

                <!-- VOLVER / SUBMIT -->
                <div class="uk-form-row uk-width-1-1">
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <a class="uk-button uk-button-primary" href=<?php echo site_url("clientes"); ?>><i class="uk-icon uk-icon-caret-left"></i>&nbsp; Volver</a> 
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
