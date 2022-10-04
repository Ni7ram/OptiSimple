<div class="uk-width-6-10">


	<div>
	    <!-- COMPONENTES DE UIKIT  AL FINAL DEL ARCHIVO -->

	    <H3>&nbsp;<i class="uk-icon uk-icon-small uk-icon-archive" style="color: #ffffff; opacity: 0.7;"></i>&nbsp;&nbsp;Ordenes hechas <!--de <b><a href=<?= site_url("/clientes/".$id_cliente) ?>><?=$nombre ?></a></b>--></H3>
	    
	    <div class="uk-grid" style="margin-top: -15px;">
	        <div class="uk-width-1-1">
	        	<hr style="opacity: 0.5;">
	            <?php
	                foreach ($ordenes as $orden):       
	            ?>                
	            <div class="uk-grid">                        
	                <div class="uk-width-9-10">
	                    <a href=<?php echo site_url('ordenes/'.$orden['id_orden']); ?> >
	                        <div class="uk-panel uk-panel-box list-panel">
	                            
	                            <?php
	                                $attributes = array('class' => 'uk-form');
	                                echo form_open('ordenes/crear', $attributes);
	                            ?>

	                            <!-- FECHA PROMETIDO / RECIBIDO -->   

	                            <i class="uk-icon-calendar-o uk-icon-medium uk-icon-justify"></i>
	                            &nbsp;
	                            <input name="fecha_recibido" class="uk-form-width-small" disabled="disabled" type="text" readonly value="<?php echo date("d-m-Y", strtotime($orden['fecha_recibido'])); ?>"  />
	                            &nbsp;&nbsp;&nbsp;
	                            <div style="padding: 0px; padding-right: 19px; display: inline-block;">
	                                <div class="uk-panel uk-panel-box uk-panel-box-primary pago-final" style="width: 90px; padding: 7px;">
	                                    <div class="uk-form-row" style="color: white;">
	                                        <i class="uk-icon-dollar"></i>
	                                        <b><?php echo $orden['lejos_total']+$orden['cerca_total']+$orden['bi_multi_total']; ?></b>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <?php 
	                                if($orden['lejos_usado']){echo '<i class="uk-icon uk-icon-mini uk-icon-circle"></i>&nbsp; <b>Lejos</b> &nbsp;';}
	                                if($orden['cerca_usado']){echo '<i class="uk-icon uk-icon-mini uk-icon-circle"></i>&nbsp; <b>Cerca</b> &nbsp;';} 
	                                if($orden['bi_multi_usado']){
	                                    if(isset($orden['bi_multi_tipo'])){
	                                        if($orden['bi_multi_tipo']){                                        
	                                            echo '<i class="uk-icon uk-icon-mini uk-icon-circle"></i>&nbsp; <b>Multifocal</b>';
	                                        }else{
	                                            echo '<i class="uk-icon uk-icon-mini uk-icon-circle"></i>&nbsp; <b>Bifocal</b>';
	                                        }
	                                    }else{
	                                        echo '<i class="uk-icon uk-icon-mini uk-icon-circle"></i>&nbsp; <b>Monofocal</b>';
	                                    }
	                                }
	                            ?>      
	                            
	                            <?php echo form_close(); ?>                                   
	                        </div>
	                    </a> 
	                </div>           
	                <div class="uk-width-1-10 uk-panel uk-panel-box" style="background-color: rgba(0,0,0,0); box-shadow: 0px 0px 0px rgba(0,0,0,0); border: 0px;">
	                    <!-- BORRAR ORDEN -->                            
	                    <a onclick="confirmDelete<?= $orden['id_orden'] ?>()"><button class="uk-button uk-button-danger uk-button-large uk-align-center delete-button" data-uk-tooltip="{pos:'right', animation:'true', delay:'0'}" title="<b>Borrar orden</b>"><i class="uk-icon-trash uk-icon-small"></i></button></a>                        
	                </div>   

	                <br>  

	            </div> 

	            <!-- ORDER DELETE HANDLER (modal) -->
	                <?php 
	                    echo '<script>' . PHP_EOL;
	                    echo    'function confirmDelete'.$orden['id_orden'].'(){' . PHP_EOL;
	                    echo        'UIkit.modal.confirm(\'<h3><p style="color: #000000;"><br><b>&nbsp;&nbsp;&nbsp;¿Confirma la operaci&oacute;n?</b></p></h3>\', function(){' . PHP_EOL;
	                    echo                'window.location.replace("'.site_url().'ordenes/borrar/'.$orden['id_orden'].'");' . PHP_EOL;
	                    echo            '}' . PHP_EOL;
	                    echo        ');' . PHP_EOL;
	                    echo    '}';
	                    echo '</script>';
	                ?>                     

	                <?php
	                    endforeach;

	                    if(count($ordenes) == 0){
	                        echo 'No se encontraron ordenes.<br>';
	                    }
	                ?>
	            </div>
	        </div>
	    </div>

	<!-- BOTON VOLVER -->
	<!--<a class="uk-button uk-button-primary" href=<?php echo site_url('clientes'); ?> ><i class="uk-icon uk-icon-caret-left"></i>&nbsp; Volver</a>-->

	<!-- UKit -->           
	        <!-- Components CSS -->
	            <link href=<?php echo site_url("assets/css/components/datepicker.css"); ?> rel="stylesheet" type="text/css">
	        <!-- Components Javascript -->
	            <script src=<?php echo site_url("assets/js/components/datepicker.js"); ?> ></script>




	</div>
</div>
</div>

<hr style="opacity: 0.5;">
<div class="uk-form-row uk-width-1-1">
			                    <div class="uk-grid">
			                        <div class="uk-width-1-2">
			                            <a class="uk-button uk-button-primary" href=<?php echo site_url("clientes"); ?>><i class="uk-icon uk-icon-caret-left"></i>&nbsp; Volver</a> 
			                        </div>
			                        <div class="uk-width-1-2">
			                            
			                        </div>
			                    </div>
			                </div>