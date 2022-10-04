<?php

/****************************
Author: FORMIGNITER.org
Class:  Clientes (Model)
Date:   18/01/2016 10:11 a.m.
*****************************/

class Clientes_model extends CI_Model {

	/***********************************************************
                        CONSTRUCTOR
    ***********************************************************/

	function __construct(){
		parent::__construct();
	}

	/***********************************************************
                        FUNCTIONS
    ***********************************************************/	
	
    public function get_clientes($id = null){
    	// ALL CLIENTS
	    if ($id === null){ 
	    	$this->db->where('id_optica', $this->session->id_optica);	
	    	$this->db->order_by('apellido asc, nombre asc');
	    	$clientsList = $this->db->get('clientes');
        	return $clientsList->result_array();
	    }

	    // SPECIFIC CLIENT
	    $client = $this->db->get_where('clientes', array('id_cliente' => $id));
	    
		if ($client->row_array()['id_optica'] == $this->session->id_optica){ 
        	return $client->row_array();
       	}else{
       		show_404();
       	}
	}

	public function get_clientes_busqueda($userToLookFor){
		//$searchArray = explode(' ', $userToLookFor);

		/*echo 'n'.$nombre;
		echo 'a'.$apellido;

		$where = 'id_optica="'.$this->session->id_optica.'" AND (nombre="'.$nombre.'" OR apellido="'.$apellido.'")';
		$this->db->where($where);
		$this->db->order_by('apellido asc, nombre asc');
		$query = $this->db->get("clientes");
		$res = $query->result_array();
		//$res = $this->db->query($query)->result_array();
		return $res;*/

		/*foreach($searchArray as $searchItem){
			$this->db->or_like('nombre', $searchItem);
			$this->db->or_like('apellido', $searchItem);
			$this->db->where('id_optica', $this->session->id_optica);
		}*/
		
		$query = 'SELECT * FROM clientes WHERE id_optica = \''.$this->session->id_optica.'\' AND (';

		$searchArray = explode(' ', $userToLookFor);
		$last_key = end($searchArray);

		foreach($searchArray as $searchItem){
			if($searchItem != $last_key){
				$query .= 'nombre = \''.$searchItem.'\' OR apellido = \''.$searchItem.'\' OR ';
			}else{
				$query .= 'nombre = \''.$searchItem.'\' OR apellido = \''.$searchItem.'\')';
			}	
		}
		$res = $this->db->query($query)->result_array();
		return $res;

		/*$query = "SELECT * FROM clientes WHERE id_optica = '".$this->session->id_optica."' AND ((CONCAT(nombre, ' ', apellido) LIKE '%".$userToLookFor."%' OR apellido LIKE '%".$userToLookFor."%')";

		echo $query;
		$res = $this->db->query($query)->result_array();
		return $res;*/

		//$res = $this->db->query($query)->result_array();
		//return $res;

		//$this->db->where($query);
		//$this->db->order_by('apellido asc, nombre asc');
		//$res = $this->db->query($query)->result_array();
		//return $res;
		
		/*$this->db->where('id_optica', $this->session->id_optica);
		$this->db->where("(`nombre` LIKE '%$userToLookFor%'");
		$this->db->or_where("`apellido` LIKE '%$userToLookFor%')");*/
    
		//$where = 'id_optica="'.$this->session->id_optica.'" AND (nombre="'.$userToLookFor.'" OR apellido="'.$userToLookFor.'")';
		//$this->db->where($where);
		/*$this->db->order_by('apellido asc, nombre asc');
		$query = $this->db->get("clientes");*/
		//$res = $query->result_array();
		/*foreach ($res as $cliente) {
			if($cliente['id_optica'] !== $this->session->id_optica){
				unset($cliente);
			}
		}*/
		//return $res;
	}

	function SaveForm($form_data){ // TODO: change name to add_client, also DRY (transactions)
		$this->db->trans_begin();		
		$this->db->insert('clientes', $form_data);		
		return $this->checkTransaction();
	}

	function delete($id_cliente){
		$this->db->trans_begin();
		$this->db->delete('clientes', array('id_cliente' => $id_cliente));		
		return $this->checkTransaction();
	}

	function edit($newClientData){
		$this->db->trans_begin();
		$this->db->set('domicilio', $newClientData['domicilio']);
		$this->db->set('telefono', $newClientData['telefono']);
		$this->db->set('dni', $newClientData['dni']);
		$this->db->set('cel', $newClientData['cel']);
		$this->db->where('id_cliente', $newClientData['id_cliente']);
		$this->db->update('clientes');
		
		return $this->checkTransaction();		
	}

	private function checkTransaction(){
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
	}
}
