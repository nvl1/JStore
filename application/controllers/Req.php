<?php

defined('BASEPATH') or exit('No direct script access allowed');



class req extends CI_Controller

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
			    
        $this->load->model('apps_model');
        $data["get_cat"] = $this->apps_model->get_cat();
        $this->load->view('v_request', $data);
			}
			
    }

    public function tambah()
    {
        $this->load->model("Aplikasi_model");
        $iduser = $this->session->userdata('iduser');
        $subjek = $this->input->post('subject');
        $request = $this->input->post('reqtext');
        $tanggal = date("Y/m/d");
        $idkategori = $this->input->post('kategori');    

                      
        $this->Aplikasi_model->set_request($iduser,$idkategori,$subjek,$request,$tanggal);
        redirect('Welcome');
        
    }

}

