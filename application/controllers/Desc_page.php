<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Desc_page extends CI_Controller

{



	public function __construct()

	{

		parent::__construct();

		$this->load->helper(array('form', 'url'));

		// $this->load->library('upload');

		$this->load->helper('download');
	}

	public function index()

	{
	    
	    if ($this->session->userdata('Creator')){
	        
	        redirect('creator_page');
	        
	    } else {

		$id = $this->input->get('id');

		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$this->session->set_userdata('ids', $id);

		$this->session->set_userdata('urls', $actual_link);

		$this->load->model('apps_model');

		$this->load->model('ss_model');
		
		$this->load->model('Aplikasi_model');

	
		if ($this->session->userdata('logged_in')) {
		    
		    $iduser=$this->session->userdata('iduser');
		    
		    $data["get_fav"] = $this->Aplikasi_model->count_favorit($id,$iduser);
		    	$data["get_app_join_where"] = $this->apps_model->get_app_n_creator_where($id);

		$data["get_ss"] = $this->ss_model->get_ss($id);

		$data["get_version"] = $this->apps_model->get_version($id);

		$data["get_review"] = $this->apps_model->getrate($id);

		$data["getupdateinfo"] = $this->apps_model->get_update_info($id);

		$data["getratenumber"] = $this->apps_model->get_rate_number($id);

		$data["getappcat"] = $this->apps_model->get_app_cat($id);
			$tanggal = date("Y-m-d");
			$id_user = $this->session->userdata('iduser');
			$this->apps_model->set_view_log($id, $id_user, $tanggal);
		$this->load->view('v_desc_page', $data);
		} else {
		    	$data["get_app_join_where"] = $this->apps_model->get_app_n_creator_where($id);

		$data["get_ss"] = $this->ss_model->get_ss($id);

		$data["get_version"] = $this->apps_model->get_version($id);

		$data["get_review"] = $this->apps_model->getrate($id);

		$data["getupdateinfo"] = $this->apps_model->get_update_info($id);

		$data["getratenumber"] = $this->apps_model->get_rate_number($id);

		$data["getappcat"] = $this->apps_model->get_app_cat($id);
			$this->load->view('v_desc_page', $data);
		}}
	}



	public function rate()

	{

		$this->load->model('apps_model');



		$ids = $this->session->userdata('ids');

		$ver = $this->apps_model->getverisonid($ids);

		$idapps = $ids;

		$iduser = $this->session->userdata('iduser');

		$idlog = $ver->row()->id;

		$tanggal = date("Y-m-d");

		$rate = $this->input->post('inlineRadioOptions');

		$comment = $this->input->post('txtcomment');

		$this->apps_model->setrate($idapps, $iduser, $idlog, $tanggal, $rate, $comment);

		redirect($this->session->userdata('urls'));
	}

	public function Download()

	{

		$this->load->model('apps_model');

		$id = $this->session->userdata('ids');

		$id_user = $this->session->userdata('iduser');

		$tanggal = date("Y-m-d");



		$nama_apps = $this->apps_model->get_download_url($id);

		$this->apps_model->set_download($id, $id_user, $tanggal);



		$urls = "./$nama_apps";



		force_download($urls, NULL);
	}

	public function insert_user_view()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->model('apps_model');
			$id = $this->session->userdata('ids');
			$id_user = $this->session->userdata('iduser');
			$tanggal = date("Y-m-d");
			$this->apps_model->set_view_log($id, $id_user, $tanggal);
		} else {
		}
	}
	

}
