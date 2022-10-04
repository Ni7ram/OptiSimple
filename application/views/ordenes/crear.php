<script src=" <?php echo site_url('/assets/js/crearOrdenForm.js'); ?> "></script>

<?php
    // IF NOT COMING FROM lista.php (hand written url maybe? or wrong refresh.. solves many bugs)
    if(!isset($_POST['num_orden'])){
        header("Location: ".site_url());
        die();
    }
?>

<div>
    <!-- COMPONENTES DE UIKIT  AL FINAL DEL ARCHIVO -->
    <div class="uk-grid">
        <div class="uk-width-1-2">
            <H2>&nbsp;<i class="uk-icon uk-icon-small uk-icon-sticky-note" style="color: #ffffff; opacity: 0.7;"></i>&nbsp;&nbsp;Nueva Orden</H2>
        </div>
        <div class="uk-width-1-2">
            <h2 class="uk-align-right" style="margin-top: 4px;">N&deg; <?= $_POST['num_orden'] ?></h2>
        </div>
    </div>


    <?php
        $attributes = array('class' => 'uk-form uk-container-center');
        echo form_open('ordenes/crear', $attributes); 
    ?>
    <HR>
    <fieldset>
        <div class="uk-grid">
            <div class="uk-width-1-1">

                <!-- DATOS GENERALES -->
                <div class="uk-panel">

                    <!-- DATOS CLIENTE -->
                    <div class="uk-form-row">                
                        &nbsp;&nbsp;
                        <i class="uk-icon-user uk-icon-large uk-icon-justify"></i>
                        <input name="id_cliente" type="hidden" class="uk-form-width-mini" value="<?php echo $_POST['id_cliente']; ?>" /> 
                        <input name="num_orden" type="hidden" class="uk-form-width-mini" value="<?php echo $_POST['num_orden']; ?>" /> 
                        &nbsp;
                        <label class="uk-form-label" for="nombre_cliente"><b>Nombre: </b></label>
                        &nbsp;
                        <input name="nombre_cliente" class="uk-form-width-medium" readonly type="text" value="<?php echo $_POST['nombre_cliente']; ?>" />
                        &nbsp;
                        <label class="uk-form-label" for="domicilio_cliente"><b> Domicilio: </b></label>
                        &nbsp;
                        <input name="domicilio_cliente" class="uk-form-width-small" readonly type="text" value="<?php echo $_POST['domicilio_cliente']; ?>" />
                        &nbsp;                    
                        <label class="uk-form-label" for="telefono_cliente"><b> Tel&eacute;fono: </b></label>
                        &nbsp;
                        <input name="telefono_cliente" class="uk-form-width-small" readonly type="text" value="<?php echo $_POST['telefono_cliente']; ?>" />
                        &nbsp;
                    </div>
                </div>

                <br>

                <?php
                    if(isset($_POST["submit"])) {
                        echo form_error('fecha_recibido'); 
                        echo form_error('fecha_prometido'); 
                    }
                ?>

                <div class="uk-panel uk-panel-box">
                    <!-- FECHA PROMETIDO / RECIBIDO -->
                    <div class="uk-form-row">
                        <i class="uk-icon-calendar-o uk-icon-medium uk-icon-justify"></i>
                        &nbsp;&nbsp;&nbsp;
                        <label class="uk-form-label" for="fecha_recibido"><b> Fecha recibido: </b></label>
                        <div class="uk-form-icon">
                            &nbsp;
                            <i class="uk-icon-calendar-o"></i>
                            <input name="fecha_recibido" class="uk-form-success uk-form-width-medium" type="text" placeholder="<?php echo date("d-m-Y"); ?>" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'], weekdays: ['Dom', 'Lun','Mar','Mie','Jue','Vie','Sab','Dom']}}" value="<?php echo set_value('fecha_recibido'); ?>" />
                        </div>
                        &nbsp;
                        &nbsp;
                        <label class="uk-form-label" for="fecha_prometido"><b>Fecha prometido: </b></label>
                        <div class="uk-form-icon">
                            &nbsp;
                            <i class="uk-icon-calendar-o"></i>
                            <input name="fecha_prometido" class="uk-form-success uk-form-width-medium" type="text" placeholder="DD-MM-AAAA" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'], weekdays: ['Dom', 'Lun','Mar','Mie','Jue','Vie','Sab','Dom']}}" value="<?php echo set_value('fecha_prometido'); ?>" />
                        </div> 
                    </div>
                
                    <HR>

                    <div class="uk-form-row">
                        <i class="uk-icon-credit-card uk-icon-medium  uk-icon-justify"></i>
                        &nbsp;
                        &nbsp;
                        <input id="tarjeta" type="text" name="tarjeta" placeholder="Tarjeta" value="<?php echo set_value('tarjeta'); ?>" />
                        &nbsp;
                        &nbsp;
                        <i class="uk-icon-eye uk-icon-medium  uk-icon-justify"></i>
                        &nbsp;
                        <input id="armazon" type="text" name="armazon" placeholder="Armaz&oacute;n" value="<?php echo set_value('armazon'); ?>" />
                    </div>
                </Div>

                <br>


                <?php echo form_error('lejos_material'); ?>
                <?php echo form_error('lejos_total'); ?>
                <?php echo form_error('lejos_senha'); ?>
                <?php echo form_error('lejos_saldo'); ?>


                <!-- LEJOS -->
                        <div class="uk-grid uk-grid-collapse">
                            <div class="uk-width-8-10"> 
                                <div class="uk-panel uk-panel-box">
                                    <h2 class="uk-panel-title"><b>Lejos</b></h2>
                                    
                                    <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-condensed uk-table-hover">
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
                                                    <?php echo form_error('lejos_od_esferico'); ?>
                                                    <input id="lejos_od_esferico" type="text" class="uk-form-width-mini" name="lejos_od_esferico" value="<?php echo set_value('lejos_od_esferico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('lejos_od_cilindrico'); ?>
                                                    <input id="lejos_od_cilindrico" type="text" class="uk-form-width-mini" name="lejos_od_cilindrico" value="<?php echo set_value('lejos_od_cilindrico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('lejos_od_eje'); ?>
                                                    <input id="lejos_od_eje" type="text" class="uk-form-width-mini" name="lejos_od_eje" value="<?php echo set_value('lejos_od_eje'); ?>" />
                                                </td>
                                                <td>                        
                                                    <?php echo form_error('lejos_od_di'); ?>
                                                    <input id="lejos_od_di" type="text" class="uk-form-width-mini" name="lejos_od_di" value="<?php echo set_value('lejos_od_di'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('lejos_od_alt'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="lejos_od_alt" value="<?php echo set_value('lejos_od_alt'); ?>" />
                                                </td>
                                                <td>
                                                    <input type="radio" class="uk-form-width-mini" name="lejos_material" value="1" <?php echo set_radio('lejos_material', '1');?> />
                                                </td>
                                                <td>                                                
                                                    <input type="radio" class="uk-form-width-mini" name="lejos_material" value="2" <?php echo set_radio('lejos_material', '2');?> />
                                                </td>
                                                <td>                                        
                                                    <input type="radio" class="uk-form-width-mini" name="lejos_material" value="3" <?php echo set_radio('lejos_material', '3');?> />
                                                </td>
                                                <td>
                                                    <input type="text" class="uk-form-width-small" name="lejos_otros" maxlength="100" placeholder="Otros" value="<?php echo set_value('lejos_otros'); ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    O.I.
                                                </td>
                                                <td>                                            
                                                    <?php echo form_error('lejos_oi_esferico'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="lejos_oi_esferico" value="<?php echo set_value('lejos_oi_esferico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('lejos_oi_cilindrico'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="lejos_oi_cilindrico" value="<?php echo set_value('lejos_oi_cilindrico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('lejos_oi_eje'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="lejos_oi_eje" value="<?php echo set_value('lejos_oi_eje'); ?>" />
                                                </td>
                                                <td>                        
                                                    <?php echo form_error('lejos_oi_di'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="lejos_oi_di" value="<?php echo set_value('lejos_oi_di'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('lejos_oi_alt'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="lejos_oi_alt" value="<?php echo set_value('lejos_oi_alt'); ?>" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-2-10"> 
                            <div class="uk-panel uk-panel-box uk-panel-box-primary uk-grid-match" style="height: 148px;">
                                <h3 class="uk-panel-title"><b>Pago</b></h3>
                                <table class="uk-table uk-table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>           
                                                <!-- SALDO / TOTAL / SENHA LEJOS -->
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar"></i>
                                                    <input type="text" id="lejos_total" onkeyup="checkForm()" name="lejos_total" class="uk-form-width-small" placeholder="Total" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Total</b>" value="<?php echo set_value('lejos_total'); ?>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar"></i>
                                                    <input type="text" id="lejos_senha" onkeyup="checkForm()" name="lejos_senha" class="uk-form-width-small" placeholder="Se&ntilde;a" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Se&ntilde;a</b>" value="<?php echo set_value('lejos_senha'); ?>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" style="color: white;"></i>
                                                    <input type="text" id="lejos_saldo" readonly name="lejos_saldo" class="uk-form-width-small saldo" placeholder="Saldo" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="El <b>saldo</b> se calcula autom&aacute;ticamente" value="<?php echo set_value('lejos_saldo'); ?>" />  
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                            
                            </div>
                        </div>
                    </div>               
                    <!-- /LEJOS -->


                    <?php echo form_error('cerca_material'); ?>
                    <?php echo form_error('cerca_total'); ?>
                    <?php echo form_error('cerca_senha'); ?>
                    <?php echo form_error('cerca_saldo'); ?>


                    <!-- CERCA -->
                        <div class="uk-grid uk-grid-collapse">
                            <div class="uk-width-8-10"> 
                                <div class="uk-panel uk-panel-box">
                                    <h2 class="uk-panel-title"><b>Cerca</b></h2>
                                    
                                    <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-condensed uk-table-hover">
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
                                                    <?php echo form_error('cerca_od_esferico'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_od_esferico" value="<?php echo set_value('cerca_od_esferico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('cerca_od_cilindrico'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_od_cilindrico" value="<?php echo set_value('cerca_od_cilindrico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('cerca_od_eje'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_od_eje" value="<?php echo set_value('cerca_od_eje'); ?>" />
                                                </td>
                                                <td>                        
                                                    <?php echo form_error('cerca_od_di'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_od_di" value="<?php echo set_value('cerca_od_di'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('cerca_od_alt'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_od_alt" value="<?php echo set_value('cerca_od_alt'); ?>" />
                                                </td>
                                                <td>
                                                    <input type="radio" class="uk-form-width-mini" name="cerca_material" value="1" <?php echo set_radio('cerca_material', '1');?> />
                                                </td>
                                                <td>                                                
                                                    <input type="radio" class="uk-form-width-mini" name="cerca_material" value="2" <?php echo set_radio('cerca_material', '2');?> />
                                                </td>
                                                <td>                                        
                                                    <input type="radio" class="uk-form-width-mini" name="cerca_material" value="3" <?php echo set_radio('cerca_material', '3');?> />
                                                </td>
                                                <td>
                                                    <?php echo form_error('cerca_od_otros'); ?>
                                                    <input type="text" class="uk-form-width-small" name="cerca_otros" placeholder="Otros" maxlength="100" value="<?php echo set_value('cerca_otros'); ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    O.I.
                                                </td>
                                                <td>                                            
                                                    <?php echo form_error('cerca_oi_esferico'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_oi_esferico" value="<?php echo set_value('cerca_oi_esferico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('cerca_oi_cilindrico'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_oi_cilindrico" value="<?php echo set_value('cerca_oi_cilindrico'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('cerca_oi_eje'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_oi_eje" value="<?php echo set_value('cerca_oi_eje'); ?>" />
                                                </td>
                                                <td>                        
                                                    <?php echo form_error('cerca_oi_di'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_oi_di" value="<?php echo set_value('cerca_oi_di'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('cerca_oi_alt'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="cerca_oi_alt" value="<?php echo set_value('cerca_oi_alt'); ?>" />
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
                                                    <i class="uk-icon-dollar"></i>
                                                    <input type="text" id="cerca_total" name="cerca_total" id="lcercatotal" onkeyup="checkForm()" class="uk-form-width-small" placeholder="Total" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Total</b>" value="<?php echo set_value('cerca_total'); ?>"  />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar"></i>
                                                    <input type="text" id="cerca_senha" name="cerca_senha" id="lcercatotal" onkeyup="checkForm()" class="uk-form-width-small" placeholder="Se&ntilde;a" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Se&ntilde;a</b>" value="<?php echo set_value('cerca_senha'); ?>"  />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" style="color: white;"></i>
                                                    <input type="text" id="cerca_saldo" name="cerca_saldo" readonly id="cerca_total" class="uk-form-width-small saldo" placeholder="Saldo" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="El <b>saldo</b> se calcula autom&aacute;ticamente" value="<?php echo set_value('cerca_saldo'); ?>" />
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                            
                            </div>
                        </div>
                    </div>               
                    <!-- /CERCA -->

                    <h2>&nbsp;&nbsp;Cristales de Laboratorio</h2>

                    <?php echo form_error('bi_multi_tipo'); ?>
                    <?php echo form_error('bi_multi_material'); ?>
                    <?php echo form_error('bi_multi_total'); ?>
                    <?php echo form_error('bi_multi_senha'); ?>
                    <?php echo form_error('bi_multi_saldo'); ?>

                    <!-- BI / MULTI -->
                    <div class="uk-grid  uk-grid-collapse">
                        <div class="uk-width-8-10"> 
                            <div class="uk-panel uk-panel-box">
                                <h2 class="uk-panel-title">
                                    <div class="uk-grid">
                                        <div class="uk-width-3-10">
                                            <b>Bifocal</b>&nbsp;&nbsp;&nbsp;<input type="radio" class="uk-form-radio" name="bi_multi_tipo" value="bifocal" <?php echo set_radio('bi_multi_tipo', 'bifocal');?> />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Multifocal&nbsp;&nbsp;&nbsp;<input type="radio" class="uk-form-radio" name="bi_multi_tipo" value="multifocal" <?php echo set_radio('bi_multi_tipo', 'multifocal');?> /></b>
                                        </div>
                                        <div class="uk-width-7-10">
                                            <input id="bi_multi_anot" type="text" class="uk-form-small uk-width-1-1" placeholder="" name="bi_multi_anotaciones" value="<?php echo set_value('bi_multi_anotaciones'); ?>" />
                                        </div>
                                    </div>
                                </h2>
                                <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-condensed uk-table-hover">
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
                                                    <?php echo form_error('bi_multi_od_di'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="bi_multi_od_di" value="<?php echo set_value('bi_multi_od_di'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('bi_multi_od_alt'); ?>
                                                    <input type="text" class="uk-form-width-mini" name="bi_multi_od_alt" value="<?php echo set_value('bi_multi_od_alt'); ?>" />
                                                </td>
                                                <td>
                                                    <input type="radio" class="uk-form-width-mini" name="bi_multi_material" value="1" <?php echo set_radio('bi_multi_material', '1');?> />
                                                </td>
                                                <td>                                                
                                                    <input type="radio" class="uk-form-width-mini" name="bi_multi_material" value="2" <?php echo set_radio('bi_multi_material', '2');?> />
                                                </td>
                                                <td>                                        
                                                    <input type="radio" class="uk-form-width-mini" name="bi_multi_material" value="3" <?php echo set_radio('bi_multi_material', '3');?> />
                                                </td>
                                                <td>
                                                    <input type="text" class="uk-form-width-medium" name="bi_multi_otros" placeholder="Otros" maxlength="100" value="<?php echo set_value('bi_multi_otros'); ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    O.I.
                                                </td>
                                                <td>                        
                                                    <?php echo form_error('bi_multi_oi_di'); ?>
                                                    <input name="bi_multi_oi_di" type="text" class="uk-form-width-mini" placeholder="" value="<?php echo set_value('bi_multi_oi_di'); ?>" />
                                                </td>
                                                <td>
                                                    <?php echo form_error('bi_multi_oi_alt'); ?>
                                                    <input name="bi_multi_oi_alt" type="text" class="uk-form-width-mini" placeholder="" value="<?php echo set_value('bi_multi_oi_alt'); ?>" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-2-10"> 
                            <div class="uk-panel uk-panel-box uk-panel-box-primary" style="height: 150px;">
                                <h3 class="uk-panel-title"><b>Pago</b></h3>
                                <table class="uk-table uk-table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>           
                                                <!-- SALDO / TOTAL / SENHA BI - MULTI -->
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar"></i>
                                                    <input id="bi_multi_total" name="bi_multi_total" onkeyup="checkForm()" type="text" class="uk-form-width-small" placeholder="Total" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Total</b>" value="<?php echo set_value('bi_multi_total'); ?>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar"></i>
                                                    <input id="bi_multi_senha" name="bi_multi_senha" onkeyup="checkForm()" type="text" class="uk-form-width-small" placeholder="Se&ntilde;a" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Se&ntilde;a</b>" value="<?php echo set_value('bi_multi_senha'); ?>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="uk-form-icon">
                                                    <i class="uk-icon-dollar" style="color: white;"></i>
                                                    <input id="bi_multi_saldo" name="bi_multi_saldo" type="text" readonly class="uk-form-width-small saldo" placeholder="Saldo" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="El <b>saldo</b> se calcula autom&aacute;ticamente" value="<?php echo set_value('bi_multi_saldo'); ?>" />
                                                </div>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                            
                            </div>
                        </div>
                    </div>               
                    <!-- /BI / MULTI --> 


                    <br>


                    <!-- RECETA / DOCTOR / LAB / ANOT --> 

                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-panel">
                                <div class="uk-form-row">
                                    &nbsp;
                                    <i class="uk-icon-calendar uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;
                                    <input name="fecha_receta" type="text" class="uk-form-width-small" placeholder="Fecha receta" data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'], weekdays: ['Dom', 'Lun','Mar','Mie','Jue','Vie','Sab','Dom']}}" value="<?php echo set_value('fecha_receta'); ?>" />
                                    &nbsp;
                                    &nbsp;
                                    <i class="uk-icon-user-md uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;                                
                                    <input id="doctor" type="text" name="doctor" class="uk-form-width-small" placeholder="Doctor" value="<?php echo set_value('doctor'); ?>" />
                                    &nbsp;
                                    &nbsp;
                                    <i class="uk-icon-eye uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;  
                                    <input id="laboratorio" type="text" name="laboratorio" class="uk-form-width-small" placeholder="Laboratorio" value="<?php echo set_value('laboratorio'); ?>" />
                                    &nbsp;
                                    &nbsp;
                                    <i class="uk-icon-edit uk-icon-medium uk-icon-justify"></i>
                                    &nbsp;
                                    <input id="anotaciones" type="text" name="anotaciones" class="uk-form-width-medium" placeholder="Anotaciones varias" value="<?php echo set_value('anotaciones'); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /RECETA / DOCTOR / LAB --> 

                    <br>
                    <hr>
                        <button class="uk-button uk-button-primary uk-align-right" type="submit" name="submit" value="create"><i class="uk-icon uk-icon-check" style="color: #00AC00;"></i>&nbsp; Guardar orden</button>
                        <button class="uk-button uk-button-primary uk-align-left" onClick="event.preventDefault(); window.location='<?php echo site_url()?>';"><i class="uk-icon uk-icon-remove" style="color: #AC0000;"></i>&nbsp; Cancelar</button></a>
                    <br>
                    <br>
                </div>
            </div>
        </fieldset>
    </form>
</div>


<!-- UKit -->           
        <!-- Components CSS -->
            <link href=<?php echo site_url("assets/css/components/datepicker.css"); ?> rel="stylesheet" type="text/css">
        <!-- Components Javascript -->
            <script src=<?php echo site_url("assets/js/components/datepicker.js"); ?> ></script>