<?php

/***********************************
Author: Martin Cardozo
Class:  MY_Controller (Controller)
Date:   30/06/2016 14:38 p.m.
***********************************/

class My_Controller extends CI_Controller{

	/***********************************************************
                        CONSTRUCTOR
    ***********************************************************/

	public function __construct(){
		parent::__construct();

		// CHECK LOGIN
        if (!$this->ion_auth->logged_in()){
            redirect('login', 'refresh');
        }


	}
}