<!DOCTYPE html>
<html>
    <head>
        <title>OptiSimple</title>

        <!-- JQUERY -->
            <!-- CDN -->
                <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
            <!-- LOCAL -->
                <script src=<?php echo '"'.site_url("assets/js/jquery-2.2.3.min.js").'"' ?>></script>

        <!-- MY JS -->
            <script>
                jQuery(function($){  
                    $("#goodMessage").on("click", function(){  
                        $.UIkit.notify($(this).data(), {status:'success', pos:'bottom-left'});  
                    });  
                    $("#badMessage").on("click", function(){  
                        $.UIkit.notify($(this).data(), {status:'danger', pos:'bottom-left'});  
                    });
                    $("#search_input").keypress(function(event){
                        if(event.keyCode == 13){
                            event.preventDefault();
                            $("#search_button").click();
                        }
                    });
                })
            </script>
            
        <!-- BOOTSTRAP -->
            <!-- CDN -->
                <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
            <!-- LOCAL -->
                <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->

        <!-- UKit -->
            <!-- CSS/JS -->
                <link href=<?php echo site_url("assets/css/uikit.min.css"); ?> rel="stylesheet" type="text/css">
                <script src=<?php echo site_url("assets/js/uikit.min.js"); ?> ></script>            
            <!-- Components CSS -->
                <link href=<?php echo site_url("assets/css/components/accordion.css"); ?> rel="stylesheet" type="text/css">
                <link href=<?php echo site_url("assets/css/components/notify.css"); ?> rel="stylesheet" type="text/css">
                <link href=<?php echo site_url("assets/css/components/autocomplete.css"); ?> rel="stylesheet" type="text/css">
                <link href=<?php echo site_url("assets/css/components/sticky.css"); ?> rel="stylesheet" type="text/css">
                <link href=<?php echo site_url("assets/css/components/tooltip.css"); ?> rel="stylesheet" type="text/css">
            <!-- Components Javascript -->
                <script src=<?php echo site_url("assets/js/components/accordion.js"); ?> ></script>
                <script src=<?php echo site_url("assets/js/components/notify.js"); ?> ></script>
                <script src=<?php echo site_url("assets/js/components/autocomplete.js"); ?> ></script>
                <script src=<?php echo site_url("assets/js/components/sticky.js"); ?> ></script>
                <script src=<?php echo site_url("assets/js/components/tooltip.js"); ?> ></script>

        <!-- CSS PROPIO / NORMALIZE -->
            <link href=<?php echo '"'.site_url("assets/css/mio.css").'"' ?> rel="stylesheet" type="text/css">
            <!-- <link href=<?php echo '"'.site_url("assets/css/normalize.css").'"' ?> rel="stylesheet" type="text/css"> -->

        <!-- CENTRO DE MENSAJES -->
            <?php 

                $testing = false;

                // CLIENTE CREADO (flag en Clientes.php)
                if($this->session->notifyCreateCliente || $testing){                    
                    $this->session->notifyCreateCliente = 0;
                    echo '<script>' . PHP_EOL;
                    echo    'jQuery(function($){' . PHP_EOL;
                    echo        '$("document").ready(function(){' . PHP_EOL;
                    echo            '$.UIkit.notify(\'<div class="uk-grid"><div class="uk-width-1-5"><i class="uk-icon-trophy uk-icon-large uk-icon-justify" style="color: #ffdd22;"></i></div><div class="uk-width-4-5"><b>&nbsp;&nbsp;Nuevo cliente</b><br>&nbsp;&nbsp;'.$this->session->nombreNotifyCliente.'</div></div>\', {status:\'warning\', pos:\'bottom-left\'});' . PHP_EOL;
                    echo        '});' . PHP_EOL;
                    echo    '})' . PHP_EOL;
                    echo '</script>';
                }

                // CLIENTE EDITADO (flag en Clientes.php)
                if($this->session->notifyEditCliente || $testing){ 
                    $this->session->notifyEditCliente = 0;
                    echo '<script>' . PHP_EOL;
                    echo    'jQuery(function($){' . PHP_EOL;
                    echo        '$("document").ready(function(){' . PHP_EOL;
                    echo            '$.UIkit.notify(\'<div class="uk-grid"><div class="uk-width-1-5"><i class="uk-icon-check uk-icon-medium uk-icon-justify"></i></div><div class="uk-width-4-5"><b>Cliente editado con &eacute;xito!</b></div></div>\', {status:\'success\', pos:\'bottom-left\'});' . PHP_EOL;
                    echo        '});' . PHP_EOL;
                    echo    '})' . PHP_EOL;
                    echo '</script>';
                }

                // CLIENTE BORRADO (flag en Clientes.php)
                if($this->session->notifyDeleteCliente || $testing){          
                    $this->session->notifyDeleteCliente = 0;
                    echo '<script>' . PHP_EOL;
                    echo    'jQuery(function($){' . PHP_EOL;
                    echo        '$("document").ready(function(){' . PHP_EOL;
                    echo            '$.UIkit.notify(\'<div class="uk-grid"><div class="uk-width-1-5"><i class="uk-icon-trash uk-icon-medium uk-icon-justify"></i></div><div class="uk-width-4-5"><b>Cliente borrado.</b><br>'.$this->session->nombreNotifyCliente.'</div></div>\', {status:\'warning\', pos:\'bottom-left\'});' . PHP_EOL;
                    echo        '});' . PHP_EOL;
                    echo    '})' . PHP_EOL;
                    echo '</script>';
                }

                // ORDEN BORRADO (flag en Ordenes.php)
                if($this->session->notifyDeleteOrden || $testing){          
                    $this->session->notifyDeleteOrden = 0;
                    echo '<script>' . PHP_EOL;
                    echo    'jQuery(function($){' . PHP_EOL;
                    echo        '$("document").ready(function(){' . PHP_EOL;
                    echo            '$.UIkit.notify(\'<div class="uk-grid"><div class="uk-width-1-5"><i class="uk-icon-trash uk-icon-medium uk-icon-justify"></i></div><div class="uk-width-4-5"><b>Orden borrada.</b><br></div></div>\', {status:\'warning\', pos:\'bottom-left\'});' . PHP_EOL;
                    echo        '});' . PHP_EOL;
                    echo    '})' . PHP_EOL;
                    echo '</script>';
                }

                // NUEVA ORDEN (flag en Ordenes.php)
                if($this->session->notifyCreateOrden || $testing){ 
                    $this->session->notifyCreateOrden = 0;
                    echo '<script>' . PHP_EOL;
                    echo    'jQuery(function($){' . PHP_EOL;
                    echo        '$("document").ready(function(){' . PHP_EOL;
                    echo            '$.UIkit.notify(\'<div class="uk-grid"><div class="uk-width-1-5"><i class="uk-icon-file uk-icon-medium uk-icon-justify"></i></div><div class="uk-width-4-5"><b>Orden creada.</b><br>'.$this->session->nombreNotifyCliente.'</div></div>\', {status:\'success\', pos:\'bottom-left\'});' . PHP_EOL;
                    echo        '});' . PHP_EOL;
                    echo    '})' . PHP_EOL;
                    echo '</script>';
                }

                // USER LOGGED-IN 
                if(!$this->session->alreadyWelcomed || $testing){ 
                    echo '<script>' . PHP_EOL;
                    echo    'jQuery(function($){' . PHP_EOL;
                    echo        '$(document).ready(function(){' . PHP_EOL;
                    echo            '$.UIkit.notify(\'<div class="uk-grid"><div class="uk-width-1-5"><i class="uk-icon-lock uk-icon-large uk-icon-justify"></i></div><div class="uk-width-4-5"><b>Acceso concedido.</b><br> Bienvenido, '.$this->session->name.'!</div></div>\', {status:\'success\', pos:\'bottom-left\'})' . PHP_EOL;
                    echo        '});' . PHP_EOL;
                    echo    '});' . PHP_EOL;
                    echo '</script>' . PHP_EOL;
                    $this->session->alreadyWelcomed = true;
                }

                // NOTA GUARDADA (flag en Api.php)
                if($this->session->notifyNoteSaved || $testing){ 
                    $this->session->notifyNoteSaved = 0;
                    echo '<script>' . PHP_EOL;
                    echo    'jQuery(function($){' . PHP_EOL;
                    echo        '$("document").ready(function(){' . PHP_EOL;
                    echo            '$.UIkit.notify(\'<div class="uk-grid"><div class="uk-width-1-5"><i class="uk-icon-check uk-icon-medium uk-icon-justify"></i></div><div class="uk-width-4-5"><b>Nota guardada</b></div></div>\', {status:\'success\', pos:\'bottom-left\'});' . PHP_EOL;
                    echo        '});' . PHP_EOL;
                    echo    '})' . PHP_EOL;
                    echo '</script>';
                }

            ?>  
        <!-- / CENTRO DE MENSAJES -->
        
    </head>
    <body>

        <!-- BAROMETER (Feedback form) MUY BUENO PERO NO TIENE MUlTILINGUAL SUPPORT NI CUSTOMIZACION DE CAPTION. 
                                       QUEDA DEPRECADO HASTA QUE LE AGREGUEN ESO, ESPERANDO RTA AL MAIL.
            <style type='text/css'>@import url('http://getbarometer.s3.amazonaws.com/assets/barometer/css/barometer.css');</style>
                <script src='http://getbarometer.s3.amazonaws.com/assets/barometer/javascripts/barometer.js' type='text/javascript'></script>
                <script type="text/javascript" charset="utf-8">
                BAROMETER.load('Obmf3LYPgxydttBRehxac');
            </script>
        -->

        <nav class="uk-navbar" data-uk-sticky>
            <div class="uk-grid">
                <div class="uk-width-1-10">
                </div>
                <div class="uk-width-8-10">                            

                    <!-- PRO / IMPORTANTE
                    <div class="uk-navbar-content">
                        <div class="uk-button-group">
                        </div>
                    </div>-->

                    <!-- MODAL PRO -->
                    <div class="uk-modal" id="modal-comprar" aria-hidden="true">
                        <div class="uk-modal-dialog membership" style="padding-top: 20px; padding-left: 20px;">
                            <a class="uk-modal-close uk-close"></a>
                            <h1><i class="uk-icon-credit-card-alt"></i>&nbsp; M&eacute;todos de pago</h1>
                            <p>Estamos trabajando en una versi&oacute;n <i>Premium</i> para que no te falte nada. Con una cuenta 
                               <i>Premium</i> vas a poder acceder al potencial completo de Iris. Por ahora 
                               estamos más que contentos con que uses nuestro sistema, y si ten&eacute;s alguna observaci&oacute;n, pod&eacute;s 
                               envi&aacute;rnosla en la <a href="<?php echo site_url(); ?>" style="color: blue; font-style: underline !important; font-weight: bold">p&aacute;gina principal</a>.
                           </p>
                        </div>
                    </div>

                    <div class="uk-modal" id="modal-help">
                        <div class="uk-modal-dialog uk-modal-dialog-large" aria-hidden="true">
                            <div class="uk-grid">
                                <div class="uk-width-10-10" style="padding-left: 55px; padding-right: 23px;">                                    
                                    <p><h1><i class="uk-icon-question-circle uk-icon-small help-icon"></i>&nbsp;Temas de Ayuda</h1></p>                                                
                                    <hr>
                                    <div class="uk-overflow-container">
                                        <div class="uk-accordion" data-uk-accordion="{showfirst: false}">
                                            <h3 class="uk-accordion-title">
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-10">
                                                        <div class="help-circle">
                                                            <h1 style="display: inline-block;">1</h1>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-9-10">
                                                        <h2 class="help">Nueva orden</h2>
                                                    </div>
                                                </div>
                                            </h3>
                                            <div class="uk-accordion-content"> 
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
                                                <br>
                                            </div>

                                            <h3 class="uk-accordion-title">
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-10">
                                                        <div class="help-circle">
                                                            <h1 style="display: inline-block;">2</h1>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-9-10">
                                                        <h2 class="help">Ver el perfil de un cliente</h2>
                                                    </div>
                                                </div>
                                            </h3>
                                            <div class="uk-accordion-content">
                                                <br>
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-3">
                                                        <h3><b>1. </b> Primero busque al cliente con ayuda del <b>buscador</b> en la esquina superior derecha.</h3>
                                                        <div class="uk-width-1-1 uk-container-center">
                                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/6.png") ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-3">
                                                        <h3><b>2. </b> Luego haga clic sobre el nombre del cliente para acceder a su <b>perfil</b>.</h3>
                                                        <div class="uk-width-1-1 uk-container-center">
                                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/4.png") ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-3">
                                                        <h3><b>3. </b> Desde all&iacute; podr&aacute; ver sus <b>datos personales</b> y un resumen de las <b>ordenes pasadas</b>. Haga clic en cualquiera para ver los detalles.</h3>
                                                        <div class="uk-width-1-1 uk-container-center">
                                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/5.png") ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </div>

                                            <!--<h3 class="uk-accordion-title">
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-10">
                                                        <div class="help-circle">
                                                            <h1 style="display: inline-block;">3</h1>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-9-10">
                                                        <h2 class="help">Editar los datos de un cliente</h2>
                                                    </div>
                                                </div>
                                            </h3>
                                            <div class="uk-accordion-content">
                                                <br>
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-3">
                                                        <h3><b>1. </b> Primero busque al cliente con ayuda del <b>buscador</b> en la esquina superior derecha.</h3>
                                                        <div class="uk-width-1-1 uk-container-center">
                                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/2.png") ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-3">
                                                        <h3><b>2. </b> Luego, presione el bot&oacute;n de <b>Historial</b> ( <button class="uk-button uk-button-primary" type="submit" data-uk-tooltip="{pos:'top', animation:'true', delay:'0'}" title="<b>Historial</b>"><i class="uk-icon-folder"></i></button> ) para acceder a los res&uacute;menes del cliente.</h3>
                                                        <div class="uk-width-1-1 uk-container-center">
                                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/4.png") ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-3">
                                                        <h3><b>3. </b> Finalmente, haga clic en cualquier orden para ver los detalles.</h3>
                                                        <div class="uk-width-1-1 uk-container-center">
                                                            <img class="help-img" src="<?php echo site_url("assets/imgs/help/5.png") ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </div>-->

                                            <h3 class="uk-accordion-title">
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-10">
                                                        <div class="help-circle">
                                                            <h1 style="display: inline-block;">3</h1>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-9-10">
                                                        <h2 class="help">¿Qu&eacute; tan seguro es OptiSimple?</h2>
                                                    </div>
                                                </div>
                                            </h3>
                                            <div class="uk-accordion-content">
                                                
                                                En contraste con su aparente sencillez, <b>OptiSimple</b> cumple con los m&aacute;ximos est&aacute;ndares de seguridad; 
                                                actualmente nuestro sistema usa encriptaci&oacute;n de <b>256 bits</b> en todas sus claves y cookies, y adem&aacute;s 
                                                cuenta con <b>certificado SSL</b>, que asegura su conexi&oacute;n con nuestros servidores. En caso de un ataque 
                                                inform&aacute;tico contra los mismos, la informaci&oacute;n de todos sus clientes estar&aacute; a salvo ya que 
                                                adem&aacute;s hacemos <b>copias semanales autom&aacute;ticas</b>. Para incluso mayor seguridad, con el 
                                                bot&oacute;n de abajo le damos la opci&oacute;n de <b>descargar los datos a su computadora</b>, tantas veces como usted quiera 
                                                y sin l&iacute;mite de frecuencia. 
                                                <br>
                                                <br>
                                                <br>
                                                <div class="uk-width-4-10 uk-container-center">
                                                    <a href="api/backup">                                                            
                                                        <div class="menu-item backup">
                                                            <i class="uk-icon-download uk-icon-medium uk-icon-justify"></i>&nbsp;&nbsp; Descargar copia de seguridad 
                                                        </div>
                                                    </a>    
                                                </div>                                                            
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="uk-align-right" style="margin-top: 0px; opacity: 0.5"><i>Se recomienda usar el sistema en pantalla completa. Presione <b>F11</b> para activar y desactivar esta funci&oacute;n en su navegador.</i></p>
                                </div>
                                <div class="uk-width-1-10"></div>
                            </div>
                            <br>
                        </div>
                    </div>


                    <?php 
                        if($this->session->home){
                    ?>
                        <div id="logo" class="uk-navbar-brand"><i class="uk-icon-small uk-icon-eye"></i><b> OptiSimple</b></div>
                    <?php
                        }else{
                    ?>
                        <div id="logo"><a class="uk-navbar-brand" <?php echo 'href="'.site_url().'" '; ?>><i class="uk-icon-small uk-icon-eye"></i><b> OptiSimple</b></a></div>
                    <?php
                        }
                    
                        if(!$this->session->home){
                    ?>
                    <div id="menu">
                        <ul class="uk-navbar-nav">
                            <li aria-expanded="false" aria-haspoup="true" class="uk-parent uk-active" data-uk-dropdown>
                                <a><b> MEN&Uacute; <i class="uk-icon-justify uk-icon-angle-down uk-icon-medium"></i></b></a>
                                <div style="top: 40px; left: 0px;" class="uk-dropdown uk-dropdown-navbar uk-dropdown-bottom">
                                    <ul class="uk-nav uk-nav-navbar">
                                        <!--<li class="uk-nav-header">Clientes</li>-->
                                        <li><a href=<?php echo site_url() ?>><i class="uk-icon uk-icon-eye uk-icon-justify"></i>&nbsp; Inicio</a></li>
                                        <li><a href=<?php echo site_url().'clientes/agregar' ?>><i class="uk-icon uk-icon-user-plus uk-icon-justify"></i>&nbsp; Nuevo cliente </a></li>
                                        <!--<li><a href=<?php echo site_url().'clientes' ?>><i class="uk-icon-justify uk-icon uk-icon-users"></i> Ver todos los clientes </a></li>-->
                                        <!--<li><a href=<?php echo site_url().'api/backup' ?>><!--<i class="uk-icon-justify uk-icon uk-icon-users"></i> Descargar Backup </a></li>-->
                                        <!-- <li class="uk-nav-divider"></li>
                                        <li class="uk-nav-header">Ordenes</li>                                       
                                        <li class="uk-nav-header" id="pro">Premium</li>
                                        <li><a href=<?php echo site_url().'clientes'; ?> data-uk-modal="{target:'#modal-comprar'}"><i class="uk-icon-user uk-icon-justify"></i>&nbsp; Proveedores</a></li>
                                        <li><a href=<?php echo site_url().'clientes'; ?> data-uk-modal="{target:'#modal-comprar'}" ><i class="uk-icon-print uk-icon-justify"></i>&nbsp; Imprimir</a></li>
                                        <li><a href=<?php echo site_url().'clientes'; ?> data-uk-modal="{target:'#modal-comprar'}"><i class="uk-icon-pie-chart uk-icon-justify"></i>&nbsp; Balance</a></li>
                                        <li><a href=<?php echo site_url().'clientes'; ?> data-uk-modal="{target:'#modal-comprar'}"><i class="uk-icon-book uk-icon-justify"></i>&nbsp; Stock</a></li>
                                        <li><a href=<?php echo site_url().'clientes'; ?> data-uk-modal="{target:'#modal-comprar'}"><i class="uk-icon-dollar uk-icon-justify"></i>&nbsp; Marketing</a></li>
                                        <li><a href=<?php echo site_url().'api/backup'; ?> ><i class="uk-icon-download uk-icon-justify"></i>&nbsp; Backup</a></li>
                                        <li><a href=<?php echo site_url().'clientes'; ?> data-uk-modal="{target:'#modal-comprar'}"><i class="uk-icon-edit uk-icon-justify"></i>&nbsp; Notas</a></li>
                                        <li><a href=<?php echo site_url().'clientes'; ?> data-uk-modal="{target:'#modal-comprar'}"><i class="uk-icon-calendar-o uk-icon-justify"></i>&nbsp; Agenda</a></li> -->
                                        <!--<li class="uk-nav-divider"></li>-->
                                        <li><a data-uk-modal="{target:'#modal-help'}"><i class="uk-icon-question-circle uk-icon-justify"></i>&nbsp;Ayuda</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php
                    }
                ?>


                <!-- SEARCH -->
                <div class="uk-navbar-content uk-navbar-flip uk-hidden-small" style="padding-right: -20px; margin-right: -20px;">
                    <form class="uk-form uk-search uk-display-inline-block" onsubmit="handleSearch()">
                        <div class="uk-form-icon">
                            <i class="uk-icon-search"></i>
                            <input class="uk-search-field uk-form-width-medium" id="search_input" type="search" placeholder="Buscar cliente..">
                        </div>                                
                        <button id="search_button" type="button" class="uk-button uk-button-primary" onclick="handleSearch()" data-uk-tooltip="{pos:'bottom', animation:'true', delay:'400'}" title="<b>Buscar</b>"><i class="uk-icon-search uk-icon-tiny"></i></button>
                    </form>
                    <script>
                        function handleSearch(){
                            <?php
                                echo 'window.location.assign("'.site_url('clientes/buscar/" + document.getElementById("search_input").value);');
                            ?>
                        }
                    </script>                            
                    
                    <!-- LOGOUT -->
                    <a onclick="logoutConfirm()"><button class="uk-button uk-button-justify uk-button-cuadrado uk-button-primary logout" data-uk-tooltip="{pos:'right', animation:'true', delay:'400'}" title="<b>Cerrar sesi&oacute;n</b>"><i class="uk-icon-power-off uk-icon-mini"></i></button></a>
                    <!-- LOGOUT HANDLER (modal) -->
                    <?php 
                        echo '<script>' . PHP_EOL;
                        echo    'function logoutConfirm(){' . PHP_EOL;
                        echo        'UIkit.modal.confirm(\'<p><h3 style="color: #444444 !important;" ><b>&nbsp;&nbsp;&nbsp;&nbsp;<i class="uk-icon uk-icon-power-off uk-icon-small uk-icon-justify" style="color: #00a8e6;"></i>&nbsp;&nbsp;&nbsp;¿Realmente desea salir?</b></h2></p>\', function(){' . PHP_EOL;
                        echo                'window.location.replace("'.site_url().'logout");' . PHP_EOL;
                        echo            '}' . PHP_EOL;
                        echo        ');' . PHP_EOL;
                        echo    '}';
                        echo '</script>' . PHP_EOL;
                    ?>
                    <!-- OFF CANVAS BUTTON -->
                    <!-- <button class="uk-button uk-button-primary uk-button-cuadrado" data-uk-tooltip="{pos:'bottom', animation:'true', delay:'400'}" title="<b>Opciones</b>" data-uk-offcanvas="{target:'#offcanvas'}"><i class="uk-icon-gear uk-icon-small" style="margin-left: -3px;"></i></button> -->
                </div>

                <!-- OFF-CANVAS MENU -->                    
                <div aria-hidden="true" id="offcanvas" class="uk-offcanvas">
                    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
                        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="">
                            <li><a href="#">Item</a></li>
                            <li class="uk-active"><a href="#">Active</a></li>
                            <li aria-expanded="false" class="uk-parent">
                                <a href="#">Parent</a>
                                <div class="uk-hidden" style="overflow:hidden;height:0;position:relative;">
                                    <ul class="uk-nav-sub">
                                        <li><a href="#">Sub item</a></li>
                                        <li><a href="#">Sub item</a>
                                            <ul>
                                                <li><a href="#">Sub item</a></li>
                                                <li><a href="#">Sub item</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li aria-expanded="false" class="uk-parent">
                                <a href="#">Parent</a>
                                <div class="uk-hidden" style="overflow:hidden;height:0;position:relative;"><ul class="uk-nav-sub">
                                    <li><a href="#">Sub item</a></li>
                                    <li><a href="#">Sub item</a></li>
                                </ul></div>
                            </li>
                            <li><a href="#">Item</a></li>
                            <li><a href="#anchor">Anchor link</a></li>
                            <li class="uk-nav-header"><i class="uk-icon-question-circle"></i> Ayuda</li>
                            <li><a href="#"><i class="uk-icon-star"></i> Item</a></li>
                            <li><a href="#"><i class="uk-icon-twitter"></i> Item</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="#"><i class="uk-icon-rss"></i> Item</a></li>
                        </ul>
                        <div class="uk-panel">Lorem ipsum dolor sit amet, <a href="#">consetetur</a> sadipscing elitr.</div>
                        <div class="uk-panel">Lorem ipsum dolor sit amet, <a href="#">consetetur</a> sadipscing elitr.</div>
                    </div>
                </div>
                <!-- /OFF-CANVAS MENU -->
            </div>
            <div class="uk-width-1-10">
            </div>
        </div>
    </nav>
    <div class="uk-grid wrapper">
        <div class="uk-width-1-10"></div>
            <div class="uk-width-8-10">
                <?php 
                    if($this->session->disableFadeInAnim){
                        echo '<div>';
                        $this->session->disableFadeInAnim = false;
                    }else{
                        echo '<div class="uk-animation-fade">';
                        echo $this->session->disableFadeInAnim;
                    }
                ?>
                    <br>
                    <br>