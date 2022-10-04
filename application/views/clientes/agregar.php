<div class="uk-grid uk-container-center">
    <div class="uk-width-2-4  uk-container-center">
        <H2>&nbsp;<i class="uk-icon uk-icon-small uk-icon-user-plus" style="color: #ffffff; opacity: 0.7;"></i>&nbsp;&nbsp;Nuevo Cliente</H2>
        <HR>
        <?php
            $attributes = array('class' => 'uk-form uk-width-1-1 uk-container-center', 'id_cliente' => '');
            echo form_open('clientes/agregar', $attributes);
        ?>
            <fieldset>
                <!-- APELLIDO -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('apellido'); ?>
                    <input id="apellido" type="text" name="apellido" class="uk-form-large uk-width-1-1" placeholder="Apellido" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Apellido</b>" value="<?php echo set_value('apellido'); ?>"  />
                </div>

                <!-- NOMBRE -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('nombre'); ?>
                    <input id="nombre" type="text" name="nombre" class="uk-form-large uk-width-1-1" placeholder="Nombre" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Nombre</b>" value="<?php echo set_value('nombre'); ?>"  />     
                </div>

                <!-- DNI -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('dni'); ?>
                    <input id="dni" type="text" name="dni" class="uk-form-large uk-width-1-1" placeholder="DNI (opcional)" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>DNI</b>" value="<?php echo set_value('dni'); ?>"  />
                </div>

                <!-- DOMICILIO -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('domicilio'); ?>
                    <input id="domicilio" type="text" name="domicilio" class="uk-form-large uk-width-1-1" placeholder="Domicilio" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Domicilio</b>" value="<?php echo set_value('domicilio'); ?>"  />
                </div>

                <!-- TELEFONO -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('telefono'); ?>
                    <input id="telefono" type="text" name="telefono" class="uk-form-large uk-width-1-1" placeholder="Tel&eacute;fono" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Tel&eacute;fono</b>" value="<?php echo set_value('telefono'); ?>"  />
                </div>

                <!-- CELULAR -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('cel'); ?>
                    <input id="cel" type="text" name="cel" class="uk-form-large uk-width-1-1" placeholder="Celular" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Celular</b>" value="<?php echo set_value('cel'); ?>"  />
                </div>

                <!-- VOLVER / SUBMIT -->
                <div class="uk-form-row uk-width-1-1">
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <a class="uk-button uk-button-primary" href=<?php echo site_url(""); ?>><i class="uk-icon uk-icon-caret-left"></i>&nbsp; Volver</a> 
                        </div>
                        <div class="uk-width-1-2">
                            <button class="uk-button uk-button-primary uk-align-right" type="submit" name="submit"><i class="uk-icon uk-icon-check" style="color: #00AC00;"></i>&nbsp; Agregar</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>