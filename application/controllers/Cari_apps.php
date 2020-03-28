<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cari_apps extends CI_Controller

{
    public function index()
    {        
        $this->load->model('Aplikasi_model');
        $cari = $this->input->get('cari');
        if ($this->session->userdata('logged_in')){
            if ($this->session->userdata('Creator')){
                 $idcreator  = $this->session->userdata('username');
                $data["get_cari"] = $this->Aplikasi_model->cari_apps($idcreator,$cari);
        } else {
            $iduser  = $this->session->userdata('iduser');
            $tanggal = date("Y/m/d");
            $data["get_cari"] = $this->Aplikasi_model->cari_apps2($cari);
            $this->Aplikasi_model->set_cari($iduser,$tanggal,$cari);
        }} else {
            
        $data["get_cari"] = $this->Aplikasi_model->cari_apps3($cari);
        }
        $this->load->view('v_cari_apps', $data);
    }
}

