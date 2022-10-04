<div class="uk-grid uk-container-center">
    <div class="uk-width-2-4 uk-container-center">
        <H2>&nbsp;<i class="uk-icon uk-icon-small uk-icon-user" style="color: #ffffff; opacity: 0.7;"></i>&nbsp;&nbsp;<?php echo $apellido.', '.$nombre; if($dni){ echo ' ('.$dni.')'; } ?></H2>
        <HR>
        <?php
            $attributes = array('class' => 'uk-form uk-width-1-1');
            $hidden = array('id_cliente' => $id_cliente, 'nombre' => $nombre, 'apellido' => $apellido, 'url' => site_url('clientes/'.$id_cliente));
            echo form_open('clientes/editar/'.$id_cliente, $attributes, $hidden);
        ?>
            <fieldset>

                <!-- DOMICILIO -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('domicilio'); ?>
                    <input id="domicilio" name="domicilio" type="text" class="uk-form-large uk-width-1-1" placeholder="Domicilio" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Domicilio</b>" value="<?= $domicilio ?>" />
                </div>

                <!-- TELEFONO -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('telefono'); ?>
                    <input id="telefono" name="telefono" type="text" class="uk-form-large uk-width-1-1" placeholder="Tel&eacute;fono" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Tel&eacute;fono</b>" value="<?= $telefono ?>" />
                </div>

                <!-- CELULAR -->
                <div class="uk-form-row uk-width-1-1">
                    <?php echo form_error('cel'); ?>
                    <input id="cel" name="cel" type="text" class="uk-form-large uk-width-1-1" placeholder="Celular" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Celular</b>" value="<?= $cel ?>" />
                </div>

                <?php if(!$dni){ ?>
                    <!-- EDIT DNI -->
                    <div class="uk-form-row uk-width-1-1">
                        <input id="dni" name="dni" type="text" class="uk-form-large uk-width-1-1" minlength="8" maxlength="8" placeholder="DNI (opcional)"  data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>DNI</b>" /> 
                    </div>
                <?php }else{ ?>
                    <!-- HIDDEN DNI -->
                    <input id="dni" name="dni" type="hidden" value="<?= $dni ?>" />
                    <br>
                <?php } ?>

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