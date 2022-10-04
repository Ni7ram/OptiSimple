<?php

/****************************
Author: Martin Cardozo
Class:  Opticas (Model)
Date:   22/05/16 22:16
*****************************/

class Opticas_model extends CI_Model {

    /***********************************************************
                            CONSTRUCTOR
    ***********************************************************/

    public function __construct() {
        $this->load->database();
    }

    /***********************************************************
                         PUBLIC FUNCTIONS
    ***********************************************************/

    public function updateCantOrdenes() {
        $optica = $this->getOptic();
        $optica['cant_ordenes']++;
        $this->updateOptic($optica);
	}

    public function getNumOrdenForThisOptic() {
        $optica = $this->getOptic();
        return $optica['cant_ordenes'];    // SI HAY PROBLEMAS DE PERFORMANCE ROMPER LAS FUNCIONES PRIVADAS,
                                        // Y TRAER SOLO LO NECESARIO (EN ESTE CASO, SOLO num_orden)
    }

    public function increaseCantClientes() {
        $optica = $this->getOptic();
        $optica['cant_clientes']++;
        $this->updateOptic($optica);
    }

    public function getNumClientesForThisOptic() {
        $optica = $this->getOptic();
        return $optica['cant_clientes']; // SI HAY PROBLEMAS DE PERFORMANCE ROMPER LAS FUNCIONES PRIVADAS,
                                        // Y TRAER SOLO LO NECESARIO (EN ESTE CASO, SOLO num_clientes)
    }
 
    public function getOpticDetails() {
        $optica = $this->getOptic();
        $details['nombre'] = $optica['nombre'];
        $details['direccion'] = $optica['direccion'];
        $details['telefono'] = $optica['telefono'];
        $details['nota'] = $optica['nota'];
        return $details;
    }

    public function save_note($note) {
        $optica = $this->getOptic();
        $optica['nota'] = $note;
        $this->updateOptic($optica);
    }

    /***********************************************************
                        PRIVATE FUNCTIONS
    ***********************************************************/

    private function getOptic() {    
        $this->db->where('id_optica', $this->session->id_optica);
        $opticaQuery = $this->db->get('opticas');
        return $opticaQuery->row_array();
    }

    private function updateOptic($optica) {
        // TRANSACTION
        $this->db->trans_begin();
        $this->db->where('id_optica', $this->session->id_optica);
        $this->db->update('opticas', $optica);
        $this->checkTransaction();
    }

    private function checkTransaction() {
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