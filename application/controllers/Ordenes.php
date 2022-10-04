<?php

/****************************
Author: Martin Cardozo
Class:  Ordenes (Controller)
Date:   18/01/2016 10:11 a.m.
*****************************/

require('My_Controller.php');

class Ordenes extends My_Controller {

    /***********************************************************
                        CONSTRUCTOR
    ***********************************************************/

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->load->model('ordenes_model');
        $this->load->model('clientes_model');
        $this->load->model('opticas_model');
    }

    /***********************************************************
                        FUNCTIONS
    ***********************************************************/

    public function view($orden){
        $orden = $this->ordenes_model->get_orden($orden);

        if (empty($orden)){
            show_404();
        }

        // GRAB CLIENT's DATA USING THE ID FROM THE ORDER
        $cliente = $this->clientes_model->get_clientes($orden['id_cliente']);

        // Pack and deliver
        $data['cliente'] = $cliente;
        $data['orden'] = $orden;

        $this->load->view('templates/header', $data);
        $this->load->view('ordenes/ver', $data);
        $this->load->view('templates/footer');
    }

    public function create(){

        /************************************  ERROR MESSAGES   ***********************************/

        $this->form_validation->set_error_delimiters('<div class="uk-badge-warning" data-uk-alert><i class="uk-icon-exclamation-circle"></i>&nbsp;<b>',
                                                     ' </b><a class="uk-alert-close uk-close"></a></div>');

        $this->form_validation->set_message('required', 'Debe especificar %s');
        $this->form_validation->set_message('is_numeric', 'Este campo debe ser un n&uacute;mero. %s');

        $errorTotal = 'el total';
        $errorMaterial = 'el material';

        /***********************************  VALIDATION RULES   **********************************/

        //OBLIGATORIOS (id_dr, id_orden y 'num_orden' se llenan cuando se crea el array para el model, mas 
        //              abajo en este mismo metodo)
        $this->form_validation->set_rules('fecha_recibido', 'la fecha de recibido', 'required');
        $this->form_validation->set_rules('fecha_prometido', 'la fecha prometida', 'required');

        //NO OBLIGATORIOS
        $this->form_validation->set_rules('laboratorio', 'laboratorio', 'max_length[40]');       
        $this->form_validation->set_rules('tarjeta', 'tarjeta', 'max_length[15]');          

        //LEJOS
        $this->form_validation->set_rules('lejos_od_esferico', 'lejos_od_esferico', 'is_numeric');
        $this->form_validation->set_rules('lejos_oi_esferico', 'lejos_oi_esferico', 'is_numeric');
        $this->form_validation->set_rules('lejos_od_cilindrico', 'lejos_od_cilindrico', 'is_numeric');
        $this->form_validation->set_rules('lejos_oi_cilindrico', 'lejos_oi_cilindrico', 'is_numeric');
        $this->form_validation->set_rules('lejos_od_eje', 'lejos_od_eje', 'is_numeric');
        $this->form_validation->set_rules('lejos_oi_eje', 'lejos_oi_eje', 'is_numeric');
        $this->form_validation->set_rules('lejos_od_di', 'lejos_od_di', 'is_numeric');
        $this->form_validation->set_rules('lejos_oi_di', 'lejos_oi_di', 'is_numeric');
        $this->form_validation->set_rules('lejos_od_alt', 'lejos_od_alt', 'is_numeric'); 
        $this->form_validation->set_rules('lejos_oi_alt', 'lejos_oi_alt', 'is_numeric'); 
        $this->form_validation->set_rules('lejos_otros', 'lejos_otros', 'max_length[100]'); 
        $this->form_validation->set_rules('lejos_total', $errorTotal, 'is_numeric'); 
        $this->form_validation->set_rules('lejos_senha', 'lejos_senha', 'is_numeric'); 
        $this->form_validation->set_rules('lejos_saldo', 'lejos_saldo', 'is_numeric'); 

        //CERCA
        $this->form_validation->set_rules('cerca_od_esferico', 'cerca_od_esferico', 'is_numeric');
        $this->form_validation->set_rules('cerca_oi_esferico', 'cerca_oi_esferico', 'is_numeric');
        $this->form_validation->set_rules('cerca_od_cilindrico', 'cerca_od_cilindrico', 'is_numeric');
        $this->form_validation->set_rules('cerca_oi_cilindrico', 'cerca_oi_cilindrico', 'is_numeric');
        $this->form_validation->set_rules('cerca_od_eje', 'cerca_od_eje', 'is_numeric');
        $this->form_validation->set_rules('cerca_oi_eje', 'cerca_oi_eje', 'is_numeric');
        $this->form_validation->set_rules('cerca_od_di', 'cerca_od_di', 'is_numeric');
        $this->form_validation->set_rules('cerca_oi_di', 'cerca_oi_di', 'is_numeric');
        $this->form_validation->set_rules('cerca_od_alt', 'cerca_od_alt', 'is_numeric'); 
        $this->form_validation->set_rules('cerca_oi_alt', 'cerca_oi_alt', 'is_numeric'); 
        $this->form_validation->set_rules('cerca_total', $errorTotal, 'is_numeric'); 
        $this->form_validation->set_rules('cerca_senha', 'cerca_senha', 'is_numeric'); 
        $this->form_validation->set_rules('cerca_saldo', 'cerca_saldo', 'is_numeric'); 

        //BIFOCAL / MULTIFOCAL
        $this->form_validation->set_rules('bi_multi_od_di', 'bi_multi_od_di', 'is_numeric');
        $this->form_validation->set_rules('bi_multi_oi_di', 'bi_multi_oi_di', 'is_numeric');
        $this->form_validation->set_rules('bi_multi_od_alt', 'bi_multi_od_alt', 'is_numeric'); 
        $this->form_validation->set_rules('bi_multi_oi_alt', 'bi_multi_oi_alt', 'is_numeric');
        $this->form_validation->set_rules('bi_multi_otros', 'bi_multi_otros', 'max_length[100]');  
        $this->form_validation->set_rules('bi_multi_anotaciones', 'bi_multi_anotaciones', 'max_length[100]'); 
        $this->form_validation->set_rules('bi_multi_total', $errorTotal, 'is_numeric'); 
        $this->form_validation->set_rules('bi_multi_senha', 'bi_multi_senha', 'is_numeric'); 
        $this->form_validation->set_rules('bi_multi_saldo', 'bi_multi_saldo', 'is_numeric'); 


        /****************************   CONDITIONAL VALIDATION RULES   ******************************/

        if (isset($_POST['lejos_material']) && $_POST['lejos_material'] != 0){
            $this->form_validation->set_rules('lejos_total', $errorTotal, 'required');
        } 
        if (isset($_POST['lejos_total']) && $_POST['lejos_total'] != 0){
            $this->form_validation->set_rules('lejos_material', $errorMaterial, 'required');
        } 
        if (isset($_POST['cerca_material']) && $_POST['cerca_material'] != 0){
            $this->form_validation->set_rules('cerca_total', $errorTotal, 'required');
        } 
        if (isset($_POST['cerca_total']) && $_POST['cerca_total'] != 0){
            $this->form_validation->set_rules('cerca_material', $errorMaterial, 'required');
        }
        if ((isset($_POST['bi_multi_material']) && $_POST['bi_multi_material'] != 0)){
            $this->form_validation->set_rules('bi_multi_total', $errorTotal, 'required');
        }
        if (isset($_POST['bi_multi_tipo']) && $_POST['bi_multi_tipo'] != 0){
            $this->form_validation->set_rules('bi_multi_total', $errorTotal, 'required');
        }
        if (isset($_POST['bi_multi_total']) && $_POST['bi_multi_total'] != 0){
            $this->form_validation->set_rules('bi_multi_material', $errorMaterial, 'required');
        } 

        /****************************   / CONDITIONAL VALIDATION RULES   ****************************/

        /****************************   / VALIDATION RULES   ****************************************/



        /****************************************   RUN FORM  ***************************************/

        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('ordenes/crear');
            $this->load->view('templates/footer');
        }else{
            // passed validation proceed to post success logic
            // and build array for the model

            $numOrden = $this->opticas_model->getNumOrdenForThisOptic();

            // BI / MULTI RADIO BUTTON
            $bi_multi_tipo = 0;
            if(isset($_POST['bi_multi_tipo'])) {
                if ($_POST['bi_multi_tipo'] == "bifocal") {
                    $bi_multi_tipo = 0;
                }else{
                    $bi_multi_tipo = 1;
                }
            }else{
                $bi_multi_tipo = NULL;
            }

            // REVERSE FECHA RECETA (dd-mm-yyyy => yyyy-mm-dd)
            if (isset($_POST['fecha_receta']) && $_POST['fecha_receta'] != 0){
                $fechaReceta = date("Y-m-d", strtotime(set_value('fecha_receta')));
            }else{
                $fechaReceta = NULL;
            }

            $form_data = array(

                            /******************* LLENADOS POR EL SISTEMA *******************/

                            'id_orden'  => '',                         // SQL AUTOINCREMENT
                            'id_optica' => $this->session->id_optica, // COOKIE
                            'num_orden' => ++$numOrden,

                            /******************** LEVANTADOS DEL FORM **********************/

                            // DATOS GENERALES
                            'id_cliente'      => set_value('id_cliente'),
                            'fecha_recibido'  => date("Y-m-d", strtotime(set_value('fecha_recibido'))), // Reverse dates for SQL
                            'fecha_prometido' => date("Y-m-d", strtotime(set_value('fecha_prometido'))),
                            'fecha_receta'    => $fechaReceta,

                            'tarjeta' => set_value('tarjeta'),
                            'armazon' => set_value('armazon'),

                            'doctor'      => set_value('doctor'),
                            'laboratorio' => set_value('laboratorio'),
                            'anotaciones' => set_value('anotaciones'),

                            // LEJOS
                            'lejos_od_esferico' => set_value('lejos_od_esferico'),
                            'lejos_oi_esferico' => set_value('lejos_oi_esferico'),
                            'lejos_od_cilindrico' => set_value('lejos_od_cilindrico'),
                            'lejos_oi_cilindrico' => set_value('lejos_oi_cilindrico'),
                            'lejos_oi_eje' => set_value('lejos_oi_eje'),
                            'lejos_od_eje' => set_value('lejos_od_eje'),
                            'lejos_oi_di' => set_value('lejos_oi_di'),
                            'lejos_od_di' => set_value('lejos_od_di'),
                            'lejos_oi_alt' => set_value('lejos_oi_alt'),
                            'lejos_od_alt' => set_value('lejos_od_alt'),
                            'lejos_material' => set_value('lejos_material'),
                            'lejos_otros' => set_value('lejos_otros'),

                            'lejos_total' => set_value('lejos_total'),
                            'lejos_senha' => set_value('lejos_senha'),
                            'lejos_saldo' => set_value('lejos_saldo'),

                            // CERCA
                            'cerca_od_esferico' => set_value('cerca_od_esferico'),
                            'cerca_oi_esferico' => set_value('cerca_oi_esferico'),
                            'cerca_od_cilindrico' => set_value('cerca_od_cilindrico'),
                            'cerca_oi_cilindrico' => set_value('cerca_oi_cilindrico'),
                            'cerca_oi_eje' => set_value('cerca_oi_eje'),
                            'cerca_od_eje' => set_value('cerca_od_eje'),
                            'cerca_oi_di' => set_value('cerca_oi_di'),
                            'cerca_od_di' => set_value('cerca_od_di'),
                            'cerca_oi_alt' => set_value('cerca_oi_alt'),
                            'cerca_od_alt' => set_value('cerca_od_alt'),
                            'cerca_material' => set_value('cerca_material'),
                            'cerca_otros' => set_value('cerca_otros'),

                            'cerca_total' => set_value('cerca_total'),
                            'cerca_senha' => set_value('cerca_senha'),
                            'cerca_saldo' => set_value('cerca_saldo'),

                            // BI / MULTI
                            'bi_multi_usado' => set_value('bi_multi_usado'),
                            'bi_multi_tipo' => $bi_multi_tipo, //DEFINIDO Y EVALUADO ARRIBA DE ESTE CONSTRUCTOR DE ARRAY

                            'bi_multi_oi_di' => set_value('bi_multi_oi_di'),
                            'bi_multi_od_di' => set_value('bi_multi_od_di'),
                            'bi_multi_oi_alt' => set_value('bi_multi_oi_alt'),
                            'bi_multi_od_alt' => set_value('bi_multi_od_alt'),

                            'bi_multi_material' => set_value('bi_multi_material'),
                            'bi_multi_anotaciones' => set_value('bi_multi_anotaciones'),
                            'bi_multi_otros' => set_value('bi_multi_otros'),

                            'bi_multi_total' => set_value('bi_multi_total'),
                            'bi_multi_saldo' => set_value('bi_multi_saldo'),
                            'bi_multi_senha' => set_value('bi_multi_senha')
            );

            // DISABLE UNUSED PANELS
            $form_data = $this->remove_unused_panels($form_data);
                            
            // run insert model to write data to db    
            if ($this->ordenes_model->set_orden($form_data) == TRUE){

                // the information has therefore been successfully saved in the db
                $this->opticas_model->updateCantOrdenes();

                // NOTIFY (front end message)
                $this->session->notifyCreateOrden = true;
                $this->session->nombreNotifyCliente = set_value('nombre_cliente');

                $viewData['url_anterior'] = 'http://www.google.com';
                $viewData['mensaje'] = 'Orden creada!';
                
                redirect('clientes/'.$form_data['id_cliente'], $viewData);
            }else{
                // TODO: display custom error page with back button
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    private function remove_unused_panels($form_data){ // IF PANEL NOT USED, DISABLE VISIBILITY FLAG
        // LEJOS
        if ($form_data['lejos_od_esferico'] == '' && $form_data['lejos_oi_esferico'] == '' &&
            $form_data['lejos_od_cilindrico'] == '' && $form_data['lejos_oi_cilindrico'] == '' && 
            $form_data['lejos_od_eje'] == '' && $form_data['lejos_oi_eje'] == '' && 
            $form_data['lejos_od_di'] == '' && $form_data['lejos_oi_di'] == '' && 
            $form_data['lejos_od_alt'] == '' && $form_data['lejos_oi_alt'] == '' && 
            $form_data['lejos_material'] == '' && $form_data['lejos_otros'] == '')
        {
            $form_data['lejos_usado'] = 0;
        }else{
            $form_data['lejos_usado'] = 1;
        }

        // CERCA
        if ($form_data['cerca_od_esferico'] == '' && $form_data['cerca_oi_esferico'] == '' &&
            $form_data['cerca_od_cilindrico'] == '' && $form_data['cerca_oi_cilindrico'] == '' && 
            $form_data['cerca_od_eje'] == '' && $form_data['cerca_oi_eje'] == '' && 
            $form_data['cerca_od_di'] == '' && $form_data['cerca_oi_di'] == '' && 
            $form_data['cerca_od_alt'] == '' && $form_data['cerca_oi_alt'] == '' && 
            $form_data['cerca_material'] == '' && $form_data['cerca_otros'] == '')
        {
            $form_data['cerca_usado'] = 0;
        }else{
            $form_data['cerca_usado'] = 1;
        }

        // BI / MULTI
        if ($form_data['bi_multi_od_di'] == '' && $form_data['bi_multi_oi_di'] == '' &&
            $form_data['bi_multi_od_alt'] == '' && $form_data['bi_multi_oi_alt'] == '' &&
            $form_data['bi_multi_material'] == '' &&
            $form_data['bi_multi_otros'] == '')
        {
            $form_data['bi_multi_usado'] = 0;
        }else{
            $form_data['bi_multi_usado'] = 1;
        }

        return $form_data;
    }

    public function delete($id_orden){
        // CHECK IF CLIENT IS FROM THIS OPTIC BEFORE DELETING
        $orden = $this->ordenes_model->get_orden($id_orden);
        $id_cliente = $orden['id_cliente'];

        if(!($this->session->id_optica === $orden['id_optica'])){
            show_404();
        }else{
            $this->ordenes_model->delete($id_orden);
        }

        // MENSAJE DE ORDEN BORRADA (front end)
        $this->session->notifyDeleteOrden = true; //FLAG PARA MOSTRAR NOTIFY

        $this->session->disableFadeInAnim = true;    // Porque recarga la misma url (rompe la sensacion de app)
        redirect('clientes/'.$id_cliente); // Reload clients list
    }
}