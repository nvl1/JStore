<?php

defined('BASEPATH') or exit('No direct script access allowed');



class favorit extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        // $this->load->library('upload');
    }

    public function index()

    {
        if ($this->session->userdata('Creator')){
            redirect('Welcome');
        }  else {
	    $idapp = $this->input->get('id');
        $this->load->model('Aplikasi_model');
        $iduser=$this->session->userdata('iduser');
        $data["get_app"] = $this->Aplikasi_model->get_favorit($iduser);
        $this->load->view('v_favorit', $data);
			}
			
    }
    
    	    public function tambah($id)
    {
        $this->load->model("Aplikasi_model");
        $iduser = $this->session->userdata('iduser');
        $tanggal = date("Y/m/d");
        $idkategori = $this->input->post('kategori');    

                      
        $this->Aplikasi_model->set_favorit($id,$iduser,$tanggal);
        redirect(base_url().'Desc_page?id='.$id);
        
    }
    
    public function batal($id){
        $this->load->model('Aplikasi_model');	

		$iduser=$this->session->userdata('iduser');
		
		$this->Aplikasi_model->btl($id,$iduser);

		redirect(base_url().'Desc_page?id='.$id);
    }

}

