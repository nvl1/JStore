<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Login extends CI_Controller

{



    public function index()

    {


        if ($this->session->userdata('logged_in')){
        redirect('Welcome');
        } else {
        $this->load->view('v_login');
        }

    }



    public function c_login()

    {

        $this->load->model('apps_model');

        $username = $this->input->post('username');

        $password = $this->input->post('password');

        $users = $this->apps_model->authdbuser($username, $password);

        $creator = $this->apps_model->authdbcreator($username, $password);





        if (count($users) > 0) {



            $logindata = array(

                'iduser' => $users[0]->id,

                'nama'  => $users[0]->username,

                'status' => $users[0]->email,

                'logged_in' => TRUE,

                'foto' => $users[0]->foto





            );



            $this->session->set_userdata($logindata);

            redirect('Welcome');

        } else {

            if (count($creator) > 0) {

                $logindata = array(

                    'username'  => $creator[0]->id,

                    'id' => $creator[0]->username,

                    'password' => $creator[0]->password,

                    'status' => $creator[0]->jabatan,

                    'nama' => $creator[0]->nama,

                    'foto' => $creator[0]->foto,

                    'email' => $creator[0]->email,

                    'tanggal' => $creator[0]->tgl_lahir,

                    'logged_in' => TRUE,                    

                    'Creator' => TRUE





                );

                $this->session->set_userdata($logindata);

                redirect('creator_page');

            } else {



                $this->session->set_flashdata('err_message', 'username doesnt exsist or Wrong');

                redirect('login');

            }

        }

    }





    public function logout()

    {

        session_unset();

        session_destroy();

        redirect('welcome');

    }

}

