<?php

/*****************************
Author: Martin Cardozo
Class:  Ordenes (Model)
Date:   18/01/2016 10:11 a.m.
*****************************/

class Ordenes_model extends CI_Model {

    /***********************************************************
                            CONSTRUCTOR
    ***********************************************************/

    public function __construct(){
        $this->load->database();
    }

    /***********************************************************
                        PUBLIC FUNCTIONS
    ***********************************************************/

    public function get_orden($id_orden) {
        $orden = $this->db->get_where('ordenes', array('id_orden' => $id_orden));
        return $orden->row_array();
	}

    public function set_orden($new_orden_data) {
        $this->db->trans_begin();
        $this->db->insert('ordenes', $new_orden_data);
        return $this->checkTransaction();   
    }

    public function get_ordenes() { 
        $ordenes = $this->db->get_where('ordenes', array('id_optica' => $this->session->id_optica));
        return $ordenes->result_array();
    }

    public function get_ordenes_por_cliente($id_cliente) { 
        $this->db->select('id_orden, fecha_recibido, lejos_usado, lejos_total, cerca_usado, cerca_total, bi_multi_usado, bi_multi_total, bi_multi_tipo');
        $this->db->where('id_cliente', $id_cliente);
        $this->db->order_by('fecha_recibido','desc');
        $ordenes = $this->db->get('ordenes');
        return $ordenes->result_array();
    }

    public function delete($id_orden){
        $this->db->trans_begin();
        $this->db->delete('ordenes', array('id_orden' => $id_orden));
        return $this->checkTransaction();
    }

    /***********************************************************
                        PRIVATE FUNCTIONS
    ***********************************************************/

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