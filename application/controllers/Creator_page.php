<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creator_page extends CI_Controller {



	 
	public function index()
	{
		$this->load->model('apps_model');
			if ($this->session->userdata('Creator')){
			$idcreator  =$this->session->userdata('username');						
			$data["get_cat"] = $this->apps_model->get_cat();
			$data["get_app"] = $this->apps_model->get_appcreator($idcreator);
			$this->load->view('v_creator_page', $data);
			} else {
			    redirect('Welcome');
			}
	}



}	