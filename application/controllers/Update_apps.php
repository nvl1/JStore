<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Update_apps extends CI_Controller
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
        $data["get_cat"] = $this->apps_model->get_cat();
        $data["get_Creatorapp"] = $this->apps_model->get_Creatorapp($id);                
        $this->load->view('v_Update_Apps', $data);
        } else {
			    redirect('Welcome');
			}
    }

    public function update()
    {
        $this->load->model("Aplikasi_model");
        $id = $this->input->post('id');
        $idcreator = $this->session->userdata('username');
        $nama = $this->input->post('nama');
        $stripped = str_replace(' ', '_', $nama);
        $deskripsi = $this->input->post('deskripsi');
        $foto = "assets/logos/$idcreator/$stripped.png";        
        $idkategori = $this->input->post('kategori');
        $users_exist = $this->Aplikasi_model->update_exist($idcreator,$nama);  
        $users_exist2 = $this->Aplikasi_model->update_exist2($idcreator,$nama);        
        $getnama = $this->Aplikasi_model->get_nama($id);
        $getid = $this->Aplikasi_model->get_id($idcreator,$nama);
        $stripped2 = str_replace(' ', '_', $getnama);
        $nama_folder2 =  "assets/logos/$idcreator/"; 
        if ($users_exist2 == $nama && $getid == $id){
            if((file_exists($nama_folder2))&&(is_dir($nama_folder2))){
            } else{
            mkdir($nama_folder2, 0777, true);            
            } 
                $Path4="./assets/logos/$idcreator/$stripped2.png";
                unlink($Path4);
                $config3['upload_path']          = "./assets/logos/$idcreator/";
                $config3['allowed_types']        = 'gif|jpg|png';
                $config3['file_name']            = $stripped;
                $config3['overwrite']            = TRUE;               
                $this->load->library('upload', $config3);            
                $this->upload->do_upload('userfile');
                $this->Aplikasi_model->update_aplikasi($id, $nama, $idkategori, $deskripsi, $foto);            
               redirect(base_url().'creatorapp?id='.$id);
        } else {
        if ($users_exist >= 1) {
            $this->session->set_flashdata('err_message', 'Aplikasi Sudah Ada');
            redirect(base_url().'update_apps?id='.$id);                       
        } else {
            if((file_exists($nama_folder2))&&(is_dir($nama_folder2))){
            } else{
            mkdir($nama_folder2, 0777, true);
            } 
                $Path4="./assets/logos/$idcreator/$stripped2.png";
                unlink($Path4);
                $config3['upload_path']          = "./assets/logos/$idcreator/";
                $config3['allowed_types']        = 'gif|jpg|png';
                $config3['file_name']            = $stripped;
                $config3['overwrite']            = TRUE;
                $this->load->library('upload', $config3);            
                $this->upload->do_upload('userfile');
                $this->Aplikasi_model->update_aplikasi($id, $nama, $idkategori, $deskripsi, $foto);
                redirect(base_url().'creatorapp?id='.$id);
            }
        }
    }
}

