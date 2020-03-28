<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Creatorapp extends CI_Controller {



	

	public function index()

	{			
	    if ($this->session->userdata('Creator')){

		$id = $this->input->get('id');

		$this->load->model('apps_model');

		$this->load->model('Aplikasi_model');

		$data["get_ss"] = $this->Aplikasi_model->get_ss($id);		

		$data["get_Creatorapp"] = $this->apps_model->get_Creatorapp($id);

		$data["getappcat"] = $this->Aplikasi_model->get_app_cat($id);

		$data["maxversi"] = $this->Aplikasi_model->max_versi($id);

		$data["maxsize"] = $this->Aplikasi_model->max_size($id);

		$data["avgrate"] = $this->Aplikasi_model->avg_rate($id);

		$this->load->view('v_creator_deskripsi',$data);
} else {
			    redirect('Welcome');
			}
	}



	public function delete ($id) {

		$this->load->model('Aplikasi_model');	

		$idcreator=$this->session->userdata('username');

		$nama=$this->Aplikasi_model->get_nama($id);

		$stripped= str_replace(' ', '_', $nama);

		$Path="./assets/logos/$idcreator/$stripped.png";

		$Path2 =  "./assets/apk/$idcreator/$id/";

		$Path3 =  "./assets/screenshots/$idcreator/$id/";

		unlink($Path);					

		$this->Aplikasi_model->delete_files($Path2);

		$this->Aplikasi_model->delete_files2($Path3);			

		$this->Aplikasi_model->hapus_aplikasi($id);

		redirect('v_creator_page');	

	

		}





}

