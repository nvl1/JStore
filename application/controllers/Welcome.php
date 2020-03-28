<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->model('apps_model');
		//if ($this->session->userdata('logged_in')) {
		if ($this->session->userdata('Creator')){
			redirect('creator_page');
	} else{
	    $this->load->model('Apps_model');
		$data["get_app"] = $this->apps_model->get_app_n_creator();
		$data["get_cat"] = $this->apps_model->get_cat();
		$this->load->view('v_landing_pages', $data);
	}
		//	} else {
		//	redirect('Welcome');
		//}
	}
}
