<?php

/****************************
Author: Martin Cardozo
Class:  API
Date:   01/07/2016 12:20 a.m.
*****************************/

require('My_Controller.php');

class Api extends My_Controller {
     
    /***********************************************************
                        CONSTRUCTOR
    ***********************************************************/

	public function __construct(){
 		parent::__construct();
		$this->load->model('clientes_model');
		$this->load->model('opticas_model');
		$this->load->model('ordenes_model');
	}	

	/***********************************************************
                        FUNCTIONS
    ***********************************************************/

	public function optica(){	
		$optica = $this->opticas_model->getOpticDetails();
		echo json_encode($optica);
	}

	public function cliente($format, $id){	
		$cliente = $this->clientes_model->get_clientes($id);

		if($format == 'json'){
			echo json_encode($cliente);
		}else if($format == 'html'){
			echo '<html><head><title>'.$cliente['nombre'].' '.$cliente['apellido'].'</title></head><body><table border=1>';
			echo '<tr><td>Id cliente: </td><td>'.$cliente['id_cliente'].'</td></tr>';
			echo '<tr><td>Optica: </td><td>'.$cliente['id_optica'].'</td></tr>';
			echo '<tr><td>N° Cliente: </td><td>'.$cliente['num_cliente'].'</td></tr>';
			echo '<tr><td>Nombre: </td><td>'.$cliente['nombre'].'</td></tr>';
			echo '<tr><td>Apellido: </td><td>'.$cliente['apellido'].'</td></tr>';
			echo '<tr><td>DNI: </td><td>'.$cliente['dni'].'</td></tr>';
			echo '<tr><td>Telefono: </td><td>'.$cliente['telefono'].'</td></tr>';
			echo '<tr><td>Celular: </td><td>'.$cliente['cel'].'</td></tr>';
			echo '<tr><td>Domicilio: </td><td>'.$cliente['domicilio'].'</td></tr>';
			echo '</table></body></html>';
		}else{
			show_404();
		}
	}

	public function backup_html(){
		$backup['clientes'] = $this->clientes_model->get_clientes();
		$backup['ordenes'] = $this->ordenes_model->get_ordenes();

		$this->load->view('api/backup', $backup);
	}

	public function backup_download(){
		$clientes = $this->clientes_model->get_clientes();
		$ordenes = $this->ordenes_model->get_ordenes();

		header('Content-disposition: attachment; filename="OptiSimple Backup - Optica '.$this->session->nombre_optica.' - '.date('d / m / Y').'.osb');
		header('Content-type: application/json');
		$backup['clientes'] = $clientes;
		$backup['ordenes'] = $ordenes;
		echo json_encode($backup);
	}

	public function save_note(){
		//DISPLAY SAVE NOTIFY
		$this->opticas_model->save_note($_POST['note']);

		$this->session->notifyNoteSaved = true; //FLAG PARA MOSTRAR NOTIFY
        $this->session->disableFadeInAnim = true; // Porque recarga la misma url (rompe la sensacion de app)

		redirect('');
	}
}