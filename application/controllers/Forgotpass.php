<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Forgotpass extends CI_Controller

{



    public function index()

    {


         if ($this->session->userdata('logged_in')){
        redirect('Welcome');
        } else {
        $this->load->view('v_forgotpass');
        }

    }



   

}

