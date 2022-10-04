<div>
<!-- COMPONENTES DE UIKIT  AL FINAL DEL ARCHIVO -->
<H2>&nbsp;<i class="uk-icon uk-icon-small uk-icon-list-alt" style="color: #ffffff; opacity: 0.7;"></i>&nbsp;&nbsp;Detalles Orden</H2>
<?php
    $attributes = array('class' => 'uk-form uk-container-center');
    echo form_open('ordenes/crear', $attributes); 
?>
    <fieldset>
        <div class="uk-grid">
            <div class="uk-width-1-1">

                <!-- DATOS GENERALES -->
                <div class="uk-panel uk-panel-box">
                    <div class="uk-grid">
                        <div class="uk-width-1-2">&nbsp;<i class="uk-icon-user uk-icon-medium"></i>&nbsp;<a href=<?php echo site_url("clientes/".$cliente['id_cliente']) ?>> <?= $cliente['apellido'].', '.$cliente['nombre']; ?></a></div>
                        <div class="uk-width-1-2"><h3 style="opacity: 0.6; margin-right: 10px;" class="uk-align-right"><b>Orden N&deg; <?= $orden['num_orden'] ?></b></h3></div>
                    </div>

                    <hr>

                    <!-- FECHA PROMETIDO / RECIBIDO -->                    
                    <div class="uk-form-row">
                        <i class="uk-icon-calendar-o uk-icon-medium"></i>
                        &nbsp;
                        <label class="uk-form-label" for="fecha_recibido"><b>Fecha recibido: </b></label>
                        &nbsp;
                        <div class="uk-form-icon">
                            <i class="uk-icon-calendar-o" id="icon-disabled"></i>
                            <input name="fecha_recibido" type="text" disabled="disabled" readonly="true" value="<?php echo date("d-m-Y", strtotime($orden['fecha_recibido'])); ?>" />
                        </div>
                        &nbsp;&nbsp;
                        <label class="uk-form-label" for="fecha_prometido"><b>Fecha prometido: </b></label>
                        &nbsp;
                        <div class="uk-form-icon">
                            <i class="uk-icon-calendar-o" id="icon-disabled"></i>
                            <input name="fecha_prometido" type="text" disabled="disabled" readonly="true" value="<?php echo date("d-m-Y", strtotime($orden['fecha_prometido'])); ?>"  />
                        </div>
                    </div>
                </div>

                <?php
                    if(!empty($orden['armazon']) || !empty($orden['tarjeta'])) { ?>
                        <br>
                        <div class="uk-panel uk-panel-box">
                            <div class="uk-form-row">
                                <?php if(!empty($orden['tarjeta'])) { ?>
                                    <i class="uk-icon-credit-card uk-icon-medium"></i>
                                    &nbsp;
                                    &nbsp;
                                    <input id="tarjeta" type="text" name="tarjeta" disabled="disabled" readonly="true" placeholder="Tarjeta" value="<?= $orden['tarjeta']; ?>" />
                                    &nbsp;
                                    &nbsp;
                                <?php } ?>
                                <?php if(!empty($orden['armazon'])) { ?>
                                    <i class="uk-icon-eye uk-icon-medium"></i>
                                    &nbsp;
                                    <input id="armazon" type="text" name="armazon" disabled="disabled" readonly="true" value="<?= $orden['armazon']; ?>" />
                                <?php } ?>
                            </div>
                        </div>
                <?php } ?>          

                <br>

                <!-- LEJOS -->
                <?php 
                    if($orden['lejos_usado']){ // ES PARA NO MOSTRAR TODOS LOS PANELES SI NO SE USAN
                        // RENDER LEJOS PANEL
                        ?>   
                        <div class="uk-grid uk-grid-collapse">
                            <div class="uk-width-8-10"> 
                                <div class="uk-panel uk-panel-box">
                                    <h2 class="uk-panel-title"><b>Lejos</b></h2>
                                    
                                    <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-condensed">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Esf&eacute;rico</th>
                                                <th>Cil&iacute;ndrico</th>
                                                <th>Eje</th>
                                                <th>Distancia</th>
                                                <th>Altura</th>
                                                <th>Mineral</th>
                                                <th>Org&aacute;nico</th>
                                                <th>Policarb.</th>
                                                <th>Otros - Tratamientos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    O.D.
                                                </td>
                                                <td>                                            
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_od_esferico" value="<?= $orden['lejos_od_esferico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_od_cilindrico" value="<?= $orden['lejos_od_cilindrico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_od_eje" value="<?= $orden['lejos_od_eje']; ?>" />
                                                </td>
                                                <td>                        
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_od_di" value="<?= $orden['lejos_od_di']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_od_alt" value="<?= $orden['lejos_od_alt']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_material" <?php if($orden['lejos_material'] == 1) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>                                                
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_material" <?php if($orden['lejos_material'] == 2) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>                                        
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_material" <?php if($orden['lejos_material'] == 3) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-small" name="lejos_otros" maxlength="100" value="<?= $orden['lejos_otros'] ?>" data-uk-tooltip="{pos:'bottom', animation:'true', delay:'0'}" title="<b><?= $orden['lejos_otros'] ?></b>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    O.I.
                                                </td>
                                                <td>                                            
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_oi_esferico" value="<?= $orden['lejos_oi_esferico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_oi_cilindrico" value="<?= $orden['lejos_oi_cilindrico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_oi_eje" value="<?= $orden['lejos_oi_eje']; ?>" />
                                                </td>
                                                <td>                        
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_oi_di" value="<?= $orden['lejos_oi_di']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="lejos_oi_alt" value="<?= $orden['lejos_oi_alt']; ?>" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-2-10"> 
                            <div class="uk-panel uk-panel-box uk-panel-box-primary" style="height: 148px;">
                                <h3 class="uk-panel-title"><b>Pago</b></h3>
                                <table class="uk-table uk-table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <!-- SALDO / TOTAL / SENHA LEJOS -->
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input type="text" readonly disabled="disabled" name="lejos_total" class="uk-form-width-small" placeholder="Total" value="<?= $orden['lejos_total']; ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Total</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input type="text" readonly disabled="disabled" name="lejos_senha" class="uk-form-width-small" placeholder="Se&ntilde;a" value="<?= $orden['lejos_senha']; ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Se&ntilde;a</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input type="text" readonly disabled="disabled" name="lejos_saldo" class="uk-form-width-small" placeholder="Saldo" value="<?= $orden['lejos_saldo']; ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Saldo</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                            
                            </div>
                        </div>
                    </div>       
                <?php } ?> <!-- CIERRE IF PANEL LEJOS -->

                

                <!-- CERCA -->
                <?php 
                    if($orden['cerca_usado']){ // ES PARA NO MOSTRAR TODOS LOS PANELES SI NO SE USAN
                        // RENDER CERCA PANEL
                        ?>   
                        <div class="uk-grid uk-grid-collapse">
                            <div class="uk-width-8-10"> 
                                <div class="uk-panel uk-panel-box">
                                    <h2 class="uk-panel-title"><b>Cerca</b></h2>
                                    
                                    <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-condensed">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Esf&eacute;rico</th>
                                                <th>Cil&iacute;ndrico</th>
                                                <th>Eje</th>
                                                <th>Distancia</th>
                                                <th>Altura</th>
                                                <th>Mineral</th>
                                                <th>Org&aacute;nico</th>
                                                <th>Policarb.</th>
                                                <th>Otros - Tratamientos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    O.D.
                                                </td>
                                                <td>                                            
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_od_esferico" value="<?php echo $orden['cerca_od_esferico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_od_cilindrico" value="<?php echo $orden['cerca_od_cilindrico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_od_eje" value="<?php echo $orden['cerca_od_eje']; ?>" />
                                                </td>
                                                <td>                        
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_od_di" value="<?php echo $orden['cerca_od_di']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_od_alt" value="<?php echo $orden['cerca_od_alt']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_material" <?php if($orden['cerca_material'] == 1) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>                                                
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_material" <?php if($orden['cerca_material'] == 2) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>                                        
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_material" <?php if($orden['cerca_material'] == 3) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-small" name="cerca_otros" maxlength="100" value="<?= $orden['cerca_otros'] ?>" data-uk-tooltip="{pos:'bottom', animation:'true', delay:'0'}" title="<b><?= $orden['cerca_otros'] ?></b>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    O.I.
                                                </td>
                                                <td>                                            
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_oi_esferico" value="<?= $orden['cerca_oi_esferico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_oi_cilindrico" value="<?= $orden['cerca_oi_cilindrico']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_oi_eje" value="<?= $orden['cerca_oi_eje']; ?>" />
                                                </td>
                                                <td>                        
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_oi_di" value="<?= $orden['cerca_oi_di']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_oi_alt" value="<?= $orden['cerca_oi_alt']; ?>" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-2-10"> 
                            <div class="uk-panel uk-panel-box uk-panel-box-primary" style="height: 148px;">
                                <h4 class="uk-panel-title"><b>Pago</b></h4>
                                <table class="uk-table uk-table-condensed">
                                    <tbody>
                                        <tr>    
                                            <td>           
                                                <!-- SALDO / TOTAL / SENHA LEJOS -->
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input type="text" readonly disabled="disabled" name="cerca_total"  class="uk-form-width-small" placeholder="Total" value="<?= $orden['cerca_total']; ?>"  data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Total</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input type="text" readonly disabled="disabled" name="cerca_senha"  class="uk-form-width-small" placeholder="Se&ntilde;a" value="<?= $orden['cerca_senha']; ?>"  data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Se&ntilde;a</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input type="text" readonly disabled="disabled" name="cerca_saldo"  class="uk-form-width-small" placeholder="Saldo" value="<?= $orden['cerca_saldo']; ?>"  data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Saldo</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                            
                            </div>
                        </div>
                    </div>         
                <?php } ?> <!-- CIERRE IF PANEL CERCA -->



                <!-- BI / MULTI -->
                <?php 
                    if($orden['bi_multi_usado']){ // ES PARA NO MOSTRAR TODOS LOS PANELES SI NO SE USAN        
                ?>
                        <h3><b>&nbsp;&nbsp;Cristales de Laboratorio</b></h3>
                        <div class="uk-grid uk-grid-collapse">
                            <div class="uk-width-8-10"> 
                                <div class="uk-panel uk-panel-box">
                                    <h2 class="uk-panel-title">
                                        <div class="uk-grid">
                                            <div class="uk-width-2-10">                                        
                                                <?php 
                                                    if(isset($orden['bi_multi_tipo'])){
                                                        if($orden['bi_multi_tipo']){
                                                            echo '<h2 class="uk-panel-title"><b>Multifocal</b></h2>';
                                                        } else {
                                                            echo '<h2 class="uk-panel-title"><b>Bifocal</b></h2>';
                                                        }
                                                    }else{
                                                        echo '<h2 class="uk-panel-title"><b>Monofocal</b></h2>';
                                                    }
                                                ?>
                                            </div>
                                            <div class="uk-width-8-10">
                                                <?php if(!empty($orden['bi_multi_anotaciones'])) { ?>
                                                    <input id="bi_multi_anotaciones" reaonly disabled="disabled" type="text" class="uk-form-small uk-width-1-1" name="bi_multi_anotaciones" value="<?= $orden['bi_multi_anotaciones']; ?>" />
                                                    <?php } ?>
                                            </div>
                                        </div>
                                    </h2>

                                    <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-condensed">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Distancia</th>
                                                <th>Altura</th>
                                                <th>Mineral</th>
                                                <th>Org&aacute;nico</th>
                                                <th>Policarb.</th>
                                                <th>Otros - Tratamientos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    O.D.
                                                </td>
                                                <td>                        
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="bi_multi_od_di" value="<?= $orden['bi_multi_od_di']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="bi_multi_od_alt" value="<?= $orden['bi_multi_od_alt']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="bi_multi_material" <?php if($orden['bi_multi_material'] == 1) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>                                                
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="bi_multi_material" <?php if($orden['bi_multi_material'] == 2) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>                                        
                                                    <input type="radio" readonly disabled="disabled" class="uk-form-width-mini" name="bi_multi_material" <?php if($orden['bi_multi_material'] == 3) { echo 'checked="checked"'; } ?> />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-medium" name="bi_multi_otros" maxlength="100" value="<?= $orden['bi_multi_otros'] ?>"  data-uk-tooltip="{pos:'bottom', animation:'true', delay:'0'}" title="<b><?= $orden['bi_multi_otros'] ?></b>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    O.I.
                                                </td>
                                                <td>                        
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_oi_di" placeholder="" value="<?= $orden['bi_multi_oi_di']; ?>" />
                                                </td>
                                                <td>
                                                    <input type="text" readonly disabled="disabled" class="uk-form-width-mini" name="cerca_oi_alt" placeholder="" value="<?= $orden['bi_multi_oi_alt']; ?>" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-2-10"> 
                            <div class="uk-panel uk-panel-box uk-panel-box-primary" style="height: 148px;">
                                <h3 class="uk-panel-title"><b>Pago</b></h3>
                                <table class="uk-table uk-table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>    
                                                <!-- SALDO / TOTAL / SENHA BI - MULTI -->
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input name="bi_multi_total" type="text" disabled="disabled" readonly class="uk-form-width-small" placeholder="Total" value="<?= $orden['bi_multi_total']; ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Total</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon" >
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input name="bi_multi_senha" type="text" disabled="disabled" readonly class="uk-form-width-small" placeholder="Se&ntilde;a" value="<?= $orden['bi_multi_senha']; ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Se&ntilde;a</b>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon" >
                                                    <i class="uk-icon-dollar" id="icon-disabled"></i>
                                                    <input name="bi_multi_saldo" type="text" disabled="disabled" readonly class="uk-form-width-small" placeholder="Saldo" value="<?= $orden['bi_multi_saldo']; ?>" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Saldo</b>" />
											    </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                            
                            </div>
                        </div>
                    </div>        
                <?php } ?> <!-- CIERRE IF PANEL BI / MULTI --> 



                <?php
                    if(!empty($orden['fecha_receta']) || !empty($orden['doctor']) || !empty($orden['laboratorio']) || !empty($orden['anotaciones'])){
                ?>
                <!-- RECETA / DOCTOR / LAB / ANOT. --> 
                <br>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="uk-form-row">
                                &nbsp;
                                <?php if(!empty($orden['fecha_receta'])) { ?>
                                    <i class="uk-icon-calendar uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;
                                    <input name="fecha_receta" disabled="disabled" readonly type="text" class="uk-form-width-small" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Distanciaiembre'], weekdays: ['Dom', 'Lun','Mar','Mie','Jue','Vie','Sab','Dom']}}" value="<?php echo date("d-m-Y", strtotime($orden['fecha_receta'])); ?>"   data-uk-tooltip="{pos:'bottom', animation:'true', delay:'0'}" title="<b>Fecha de la receta</b>" />
                                    &nbsp;
                                    &nbsp;
                                <?php } ?> 
                                <?php if(!empty($orden['doctor'])) { ?>
                                    <i class="uk-icon-user-md uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;                                
                                    <input id="doctor" disabled="disabled" readonly type="text" name="doctor" class="uk-form-width-small" value="<?= $orden['doctor']; ?>" />
                                    &nbsp;
                                    &nbsp;
                                <?php } ?> 
                                <?php if(!empty($orden['laboratorio'])) { ?>
                                    <i class="uk-icon-eye uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;  
                                    <input id="laboratorio" disabled="disabled" readonly type="text" name="laboratorio" class="uk-form-width-small" value="<?= $orden['laboratorio']; ?>" />
                                    &nbsp;
                                    &nbsp;
                                <?php } ?> 
                                <?php if(!empty($orden['anotaciones'])) { ?>
                                    <i class="uk-icon-edit uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;
                                    <input id="anotaciones" disabled="disabled" readonly type="text" name="anotaciones" class="uk-form-width-medium" value="<?= $orden['anotaciones']; ?>"   data-uk-tooltip="{pos:'bottom', animation:'true', delay:'0'}" title="<b><?= $orden['anotaciones'] ?></b>" />
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- /RECETA / DOCTOR / LAB / ANOT. --> 

            </div>
        </div>
    </fieldset>
</form>

<br>
<br>
<a class="uk-button uk-button-primary" href=<?php echo site_url('clientes/'.$cliente['id_cliente']); ?> ><i class="uk-icon uk-icon-caret-left"></i>&nbsp; Volver</a>
<br>

</div>

<!-- UKit -->           
        <!-- Components CSS -->
            <link href=<?php echo site_url("assets/css/components/datepicker.css"); ?> rel="stylesheet" type="text/css">
        <!-- Components Javascript -->
            <script src=<?php echo site_url("assets/js/components/datepicker.js"); ?> ></script>

