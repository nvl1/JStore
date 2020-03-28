<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ss_model extends CI_Model
{


 
    public function get_ss($id)
    {
        $this->db->select('screenshot');
        $this->db->from('screenshot_apps');
        $this->db->where('id_apps', $id);

        return $this->db->get();
    }
}
