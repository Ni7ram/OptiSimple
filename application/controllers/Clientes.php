<?php

/****************************
Author: FORMIGNITER.org
Class:  Clientes (Controller)
Date:   18/01/2016 10:11 a.m.
*****************************/

require('My_Controller.php');

class Clientes extends My_Controller {
     
    /***********************************************************
                        CONSTRUCTOR
    ***********************************************************/

	public function __construct(){
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('clientes_model');
		$this->load->model('opticas_model');
		$this->load->model('ordenes_model');
	}	

	/***********************************************************
                        FUNCTIONS
    ***********************************************************/

	public function index($id = null){	
		$this->load->view('templates/header');

		//$data['title'] = '<h2>Clientes</h2><hr style="opacity: 0.4;">';//<H4 style="margin-top: 0px;">Para hacer una nueva orden, presione el botón &nbsp;<button class="uk-button uk-button-small"><i class="uk-icon-plus"></i></button>&nbsp; al lado del cliente.</H4>';
		$data['title'] = '<H2>Clientes &nbsp;<a href="'.site_url("clientes/agregar").'"><button class="uk-button" data-uk-tooltip="{pos:\'right\', animation:\'true\', delay:\'500\'}" title="<b>Nuevo cliente</b>"><i class="uk-icon-plus"></i></button></a></H2>';

		if($id === null){
			$data['clientes']  = $this->clientes_model->get_clientes();
			$data['num_orden'] = $this->opticas_model->getNumOrdenForThisOptic() + 1; 
			$this->load->view('clientes/lista', $data);
		}else{

			if($new_view=true){
				// NEW View
				$ordenes = $this->ordenes_model->get_ordenes_por_cliente($id);
				$cliente = $this->clientes_model->get_clientes($id);
				$this->load->view('clientes/ver_nuevo', $cliente);
				$data['ordenes'] = $ordenes;
				$this->load->view('clientes/historial_nuevo', $data);
			}else{
				//OLD View
				$cliente = $this->clientes_model->get_clientes($id);
				$this->load->view('clientes/ver', $cliente);
			}
		}

        $this->load->view('templates/footer');
	}

	public function add(){

        /************************************  ERROR MESSAGES   ***********************************/

        $this->form_validation->set_error_delimiters('<span class="uk-alert uk-alert-warning"><i class="uk-icon-exclamation-circle"></i><b>&nbsp;', '</b></span></br></br>');

		/***********************************  VALIDATION RULES   **********************************/

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[20]');			
		$this->form_validation->set_rules('apellido', 'Apellido', 'required|max_length[20]');			
		$this->form_validation->set_rules('dni', 'DNI', 'max_length[8]|is_numeric');
		$this->form_validation->set_rules('domicilio', 'Domicilio', 'required|max_length[30]');
		$this->form_validation->set_rules('telefono', 'Tel&eacute;fono', 'required|max_length[10]');

		/************************************   RUN FORM  ****************************************/
	
		if ($this->form_validation->run() == FALSE){ // validation hasn't been passed
			$this->load->view('templates/header');
			//$this->load->view('templates/menu');
			$this->load->view('clientes/agregar');
			//$this->load->view('templates/menu_close');
			$this->load->view('templates/footer');
		}else{

			// passed validation proceed to post success logic
		 	// build array for the model
			$numCliente = $this->opticas_model->getNumClientesForThisOptic();
			
			$form_data = array(
							'id_optica' => $this->session->id_optica, 
							'num_cliente' => ++$numCliente, // OPTIC CLIENT NUMBER REGISTRY
					       	'nombre' => set_value('nombre'),
					       	'apellido' => set_value('apellido'),
					       	'dni' => set_value('dni'),
					       	'domicilio' => set_value('domicilio'),
					       	'telefono' => set_value('telefono'),
					       	'cel' => set_value('cel')
						);

			// run insert model to write data to db
			if ($this->clientes_model->SaveForm($form_data) == TRUE){
				// the information has therefore been successfully saved in the db
				$this->session->notifyCreateCliente = true; //FLAG PARA MOSTRAR NOTIFY
				$this->session->nombreNotifyCliente = $form_data['nombre'].' '.$form_data['apellido'];

				$this->opticas_model->increaseCantClientes(); // CLIENTS +1

				redirect('');
			}else{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
			}
		}
	}

	public function edit($id_cliente = NULL){
        if($id_cliente === NULL){
        	show_404();
        }

        $cliente = $this->clientes_model->get_clientes($id_cliente);

        /************************************  ERROR MESSAGES   ***********************************/

        $this->form_validation->set_error_delimiters('<span class="uk-alert uk-alert-warning">', '</span></br></br>');

        /***********************************  VALIDATION RULES   **********************************/

		$this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
		$this->form_validation->set_rules('telefono', 'Tel&eacute;fono', 'required|is_numeric|max_length[30]');
		$this->form_validation->set_rules('dni', 'dni', 'is_numeric|max_length[8]');

		/************************************   RUN FORM  ****************************************/
	
		if ($this->form_validation->run() == FALSE){ // validation hasn't been passed
			$this->load->view('templates/header');
			$this->load->view('clientes/editar', $cliente);
			$this->load->view('templates/footer');
		}else{
			// passed validation proceed to post success logic
		 	// build array for the model			
			$updatedClientData = array(
							'id_cliente' => $cliente['id_cliente'],					       	
					       	'domicilio' => set_value('domicilio'),
					       	'dni' => set_value('dni'),
					       	'telefono' => set_value('telefono'),
					       	'cel' => set_value('cel'),
						);

			// run insert model to write data to db
			if ($this->clientes_model->edit($updatedClientData) == TRUE){ 
				// the information has therefore been successfully saved in the db

				$this->session->notifyEditCliente = true; //FLAG PARA MOSTRAR NOTIFY

				$this->session->disableFadeInAnim = true;
				redirect(site_url('clientes/'.$id_cliente));
			}else{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
			}
		}
	}

	public function delete($id_cliente){
        // CHECK IF CLIENT IF FROM THIS OPTIC BEFORE DELETING
        $cliente = $this->clientes_model->get_clientes($id_cliente);

        if(!($this->session->id_optica === $cliente['id_optica'])){
        	show_404();
        }else{
        	$this->clientes_model->delete($id_cliente);
        }

        // ENVIAR MENSAJE DE USUARIO BORRADO
        $this->session->notifyDeleteCliente = true; //FLAG PARA MOSTRAR NOTIFY
        $this->session->nombreNotifyCliente = $cliente['nombre'].' '.$cliente['apellido'];

        $this->session->disableFadeInAnim = true;
        $this->index(); //Reload clients list
	}

	public function searchClient($clientToLookFor){
		$data['clientes'] = $this->clientes_model->get_clientes_busqueda($clientToLookFor);
	
		$data['title'] = '<H2><i class="uk-icon uk-icon-tiny uk-icon-search" style="color: #ffffff; opacity: 0.7;"></i>&nbsp; B&uacute;squeda: <b>'.$clientToLookFor.'</b></H2>';
		$data['num_orden'] = $this->opticas_model->getNumOrdenForThisOptic() + 1; 

        $this->load->view('templates/header', $data);
        $this->load->view('clientes/lista', $data);
        $this->load->view('templates/footer');
	}

	public function historial($id_cliente){
        $data['ordenes']    = $this->ordenes_model->get_ordenes_por_cliente($id_cliente);
        $data['id_cliente'] = $id_cliente;

        // GRAB CLIENT's NAME TO DISPLAY IN VIEW
        $cliente                = $this->clientes_model->get_clientes($id_cliente);
        $data['nombre_cliente'] = $cliente['nombre'].' '.$cliente['apellido'];

        $this->load->view('templates/header', $data);
        $this->load->view('clientes/historial', $data);
        $this->load->view('templates/footer');
    }
}