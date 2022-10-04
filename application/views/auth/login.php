<!DOCTYPE html>
<html>
    <head>
        <title>OptiSimple - Ingresar al sistema</title>

        <!-- JQuery -->
        <script src=<?php echo site_url("assets/js/jquery-2.2.3.min.js") ?>></script>

        <!-- UKit -->
            <!-- CSS/JS -->
            <link href=<?php echo site_url("assets/css/uikit.css"); ?> rel="stylesheet" type="text/css">
            <script src=<?php echo site_url("assets/js/uikit.min.js"); ?> ></script> 

        <!-- CSS Propio -->
            <link href=<?php echo site_url("assets/css/mio.css"); ?> rel="stylesheet" type="text/css">
    </head>
    <body>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="uk-grid">
            <!-- FORM -->
            <div class="uk-width-2-5 uk-container-center uk-panel-box" style="box-shadow: 4px 8px 30px #000020;">

                <!-- FORM -->
                <form action=<?php echo site_url("login"); ?> class="uk-form" method="post" accept-charset="utf-8">
                    <fieldset>
                        <!-- TITULO FORM -->
                        <legend>
                            <h1 style="color: #444444;"><i class="ik-icon-large uk-icon-eye"></i> OptiSimple</h1>
                            <!-- <p><?php echo lang('login_subheading');?></p> -->
                        </legend>

                        <!-- ERROR -->
                        <?php 
                            if($message){
                                echo '<div id="infoMessage">'.$message.'</div>';
                            }
                        ?>

                        <!-- IDENTITY -->
                        <div class="uk-form-row">
                            <input type="text" name="identity" class="uk-form-large uk-width-1-1" placeholder="Usuario" id="identity" />
                        </div>

                        <!-- PASSWORD -->
                        <div class="uk-form-row">
                            <input type="password" name="password" class="uk-form-large uk-width-1-1" placeholder="Contraseña" id="password"  />
                        </div>

                        <BR>

                        <!-- REMEMBER ME / SUBMIT -->
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <div class="uk-form-row">
                                    <?php echo lang('login_remember_label', 'remember');?>
                                    &nbsp;
                                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <!-- SUBMIT -->
                                <div class="uk-form-row">
                                    <input class="uk-button uk-button-primary uk-align-right" type="submit" name="submit" value="Ingresar"/>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

                <!-- FORGOT PASSWORD 
                <hr>
                <div class="uk-form-row">
                    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                </div>
                -->
            </div>
        </div>
    </body>
</html>
