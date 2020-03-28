<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Setting_creator extends CI_Controller

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
        $this->load->model('apps_model');        

        $this->load->view('v_Setting_Creator');
    }  else {
			    redirect('Welcome');
			}

    }



    public function update()

    {

        $this->load->model("Aplikasi_model");  

        $id = $this->session->userdata('username');                

        $password = $this->input->post('password');

        $user = $this->input->post('user');

        $tanggal =  $this->input->post('tanggal'); 

        $email =  $this->input->post('email');

        $nama = $this->input->post('nama');

        $stripped = str_replace(' ', '', $user);

        $foto = "assets/user/$stripped.png";



            $config['upload_path']          = './assets/user/';

            $config['allowed_types']        = 'gif|jpg|png';

            $config['file_name']            = $stripped;

            $config['overwrite']            = TRUE;

            

            $this->load->library('upload', $config);            

            $this->upload->do_upload('userfile');

            

            $this->Aplikasi_model->update_creator($id, $nama, $user, $password, $foto, $tanggal, $email);

            session_unset();

            session_destroy();

            redirect('welcome');

    }



}

