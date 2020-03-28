<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Register_select extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        // $this->load->library('upload');
    }

    public function index()
    {
         if ($this->session->userdata('logged_in')){
        redirect('Welcome');
        } else {
        $this->load->view('v_register_select');
        }
    }

}

