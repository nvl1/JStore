<?php
defined('BASEPATH') or exit('No direct script access allowed');

class register_model extends CI_Model
{


    public function set_user($nama, $username, $password, $foto, $tanggal, $email)
    {
        $this->db->set('nama', $nama);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('foto', $foto);
        $this->db->set('tgl_lahir', $tanggal);
        $this->db->set('email', $email);
        $this->db->insert('user');
    }
    public function user_exist_user($username)
    {
        $this->db->select('username');
        $this->db->from('user');
        $this->db->where('username', $username);

        return $this->db->get()->result();
    }
    public function set_creator($id, $nama, $username, $password, $foto, $tanggal, $email)
    {
        $this->db->set('id', $id);
        $this->db->set('nama', $nama);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('foto', $foto);
        $this->db->set('tgl_lahir', $tanggal);
        $this->db->set('email', $email);
        $this->db->insert('creator');
    }

    public function user_exist_creator($id)
    {
        $this->db->select('id');
        $this->db->from('creator');
        $this->db->where('id', $id);

        return $this->db->get()->result();
    }
}
