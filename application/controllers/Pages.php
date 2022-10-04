<?php

/****************************
Author: CI Crew
Class:  Pages (Controller)
Date:   18/01/2016 10:11 a.m.
*****************************/

class Pages extends CI_Controller {

		/***********************************************************
    	                    CONSTRUCTOR
    	***********************************************************/

    	public function __construct(){
    		parent::__construct();
    		$this->load->helper('form');
    		$this->load->model('opticas_model');
    	}

        public function view($page = 'home'){
        	if (!$this->ion_auth->logged_in()){
				// If not logged in, redirect them to the login page
				redirect('auth/login', 'refresh');
			}
			
	        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
	            // Whoops, we don't have a page for that!
	            show_404();
	        }

	        if($page == 'home'){
	        	$this->session->home = true;
	        	$this->session->no_menu = true;
	        }


	        //TITULO
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $optica = $this->opticas_model->getOpticDetails();
	        $data['nota'] = $optica['nota'];

	        $this->load->view('templates/header', $data);
	      	$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}

    	/***********************************************************
    	                	FUNCTIONS
    	***********************************************************/
}