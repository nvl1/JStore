<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Update_apk extends CI_Controller

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
        $this->load->model('Aplikasi_model');
        $data["get_Creatorapp"] = $this->apps_model->get_Creatorapp($id);        
        $data["maxversi"] = $this->Aplikasi_model->max_versi($id);
        $this->load->view('v_Update_APK', $data);
        } else {
			    redirect('Welcome');
			}
    }

    public function update()
    {
        $this->load->model("Aplikasi_model");
        $id = $this->input->post('id');
        $idcreator = $this->session->userdata('username');                
        $deskripsi = $this->input->post('deskripsi');        
        $tanggal = date("Y/m/d h:i:s");                     
        $versi = $this->input->post('versi');
        $stripped = str_replace('.', '', $versi);
        $apk = "assets/apk/$idcreator/$id/$stripped.apk";        
        $nama_folder =  "assets/apk/$idcreator/$id/";                       

        if((file_exists($nama_folder))&&(is_dir($nama_folder))){        
        } else{
        mkdir($nama_folder, 0777, true);            
        }
            $config4['upload_path']          = "./assets/apk/$idcreator/$id/";
            $config4['allowed_types']        = 'apk';
            $config4['file_name']            = $stripped;
            $config4['overwrite']            = TRUE;
            $config4['max_size']             = 102400;
            $this->load->library('upload', $config4);            
            $this->upload->do_upload('APKfile');
            $size=filesize($apk);

            $this->Aplikasi_model->update_apk($id,$deskripsi,$tanggal,$versi,$apk,$size);            

            redirect(base_url().'creatorapp?id='.$id);
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

