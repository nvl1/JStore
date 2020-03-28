<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_ss extends CI_Controller
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
        $id = $this->input->get('id');
        $this->load->model('apps_model');        
        $data["get_app"] = $this->apps_model->get_Creatorapp($id);              
        $this->load->view('v_tambah_ss',$data);
        }  else {
			    redirect('Welcome');
			}
    }

    public function tambah()

    {
        $this->load->model("Aplikasi_model");
        $idcreator=$this->session->userdata('username');
        $idapps = $this->input->post('id');
        $nama = $this->input->post('nama');
        $stripped = str_replace(' ', '', $nama);
        $ss = "assets/screenshots/$idcreator/$idapps/$stripped.png";
        $date = date("Y/m/d h:i:s");
        $nama_folder =  "assets/screenshots/$idcreator/$idapps/";
        $count_ss = $this->Aplikasi_model->count_ss($idapps); 
        $nama_ss = $this->Aplikasi_model->ss_exist($ss);       

        if ($nama_ss == $ss){
            if((file_exists($nama_folder))&&(is_dir($nama_folder))){            
            } else{
            mkdir($nama_folder, 0777, true);            
            }
                $config['upload_path']          = "./assets/screenshots/$idcreator/$idapps/";
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $stripped;
                $config['overwrite']            = TRUE;  

                $this->load->library('upload', $config);            
                $this->upload->do_upload('userfile');
                $this->Aplikasi_model->update_ss($idapps,$ss,$date);
                redirect(base_url().'creatorapp?id='.$idapps); 
        } else{
            if ($count_ss == 5){
                $this->session->set_flashdata('err_message', 'Tidak bisa lebih dari 3');
                redirect('Creator_page');
            } else{
                if((file_exists($nama_folder))&&(is_dir($nama_folder))){                
                } else{
                mkdir($nama_folder, 0777, true);            
                }
                    $config['upload_path']          = "./assets/screenshots/$idcreator/$idapps/";
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['file_name']            = $stripped;
                    $config['overwrite']            = TRUE;
                    $this->load->library('upload', $config);            
                    $this->upload->do_upload('userfile');
                    $this->Aplikasi_model->set_ss($idapps,$ss,$date);
                    redirect(base_url().'creatorapp?id='.$idapps);                                  
            }
        }   
    }
}

