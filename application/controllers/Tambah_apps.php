<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Tambah_apps extends CI_Controller

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
        $data["get_cat"] = $this->apps_model->get_cat();
        $this->load->view('v_tambah_Apps', $data);
        }  else {
			    redirect('Welcome');
			}
    }

    public function tambah()
    {
        $this->load->model("Aplikasi_model");
        $idcreator = $this->session->userdata('username');
        $nama = $this->input->post('nama');
        $stripped = str_replace([' ' , '.'], ['_','_'], $nama);
        $deskripsi = $this->input->post('deskripsi');
        $deskripsi2 = "Ini adalah pertama kali aplikasi di deploy";
        $foto = "assets/logos/$idcreator/$stripped.png";
        $tanggal = date("Y/m/d");
        $date = date("Y/m/d h:i:s");
        $idkategori = $this->input->post('kategori');        
        $users_exist = $this->Aplikasi_model->aplikasi_exist($idcreator,$nama);
        $Berhasil = TRUE;
        $versi = $this->input->post('versi');   
        $stripped2 = str_replace('.', '', $versi);                     
        $nama_folder2 =  "assets/logos/$idcreator/";

        if ($users_exist >= 1) {
            $this->session->set_flashdata('err_message', 'Aplikasi Sudah Ada');
            redirect('tambah_apps');
        } else {
            $idapps=$this->Aplikasi_model->set_aplikasi($idcreator, $nama, $deskripsi, $foto, $tanggal, $idkategori);
            if((file_exists($nama_folder2))&&(is_dir($nama_folder2))){

            } else{
            mkdir($nama_folder2, 0777, true);            
            } 

            $config['upload_path']          = "./assets/logos/$idcreator/";
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $stripped;
            $config['overwrite']            = TRUE;
            
            $this->load->library('upload', $config);            
            $this->upload->do_upload('userfile');
            $apk = "assets/apk/$idcreator/$idapps/$stripped2.apk";
            $nama_folder =  "assets/apk/$idcreator/$idapps/";
            if((file_exists($nama_folder))&&(is_dir($nama_folder))){

            } else{
            mkdir($nama_folder, 0777, true);            
            } 

            $config2['upload_path']          = "./assets/apk/$idcreator/$idapps/";
            $config2['allowed_types']        = 'apk';
            $config2['file_name']            = $stripped2;
            $config2['overwrite']            = TRUE;
            $config2['max_size']             = 102400;

            $this->upload->initialize($config2);
            $this->upload->do_upload('APKfile');
            $size=filesize($apk);                                    
            $this->Aplikasi_model->set_updatelog($idapps, $date, $versi, $deskripsi2, $apk, $size);
            redirect('Creator_page');
        }
    }

    public function fsize($file)
    {
        $a = array("B", "KB", "MB", "GB", "TB", "PB");
        $pos = 0;
        $size = filesize($file);
        while ($size >= 1024) {
            $size /= 1024;
            $pos++;
        }
        return round($size, 2) . " " . $a[$pos];
    }
}

