<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Apps_model extends CI_Model

{



    public function get_appcreator($idcreator)

    {

        $this->db->select('apps.id as idapps,creator.nama as namadev,apps.nama as appname,apps.icon as appsicon,apps.description as appdesc,apps.date_created as appdate');

        $this->db->from('apps');

        $this->db->join('creator', 'creator.id = apps.id_creator', 'inner');

        $this->db->where('id_creator', $idcreator);





        return $this->db->get();
    }



    public function get_app_n_creator()

    {

        $this->db->select('creator.nama as namadev,apps.nama as appname,apps.icon as appsicon,apps.description as appdesc, apps.id as idapp,apps.date_created as appdate');

        $this->db->from('apps');

        $this->db->join('creator', 'creator.id = apps.id_creator', 'inner');







        return $this->db->get();
    }





    public function get_app_n_creator_where($id)

    {

        $this->db->select('creator.nama as namadev,apps.nama as appname, apps.icon as appsicon, apps.description as appdesc, apps.id as idapp,apps.date_created as appdate');

        $this->db->from('apps');

        $this->db->join('creator', 'creator.id = apps.id_creator', 'inner');

        $this->db->where('apps.id', $id);





        return $this->db->get();
    }



    public function get_app_where($id)

    {

        $this->db->select('*');

        $this->db->from('apps');

        $this->db->where('nama', $id);





        return $this->db->get();
    }



    public function get_Creatorapp($id)

    {

        $this->db->select('*');

        $this->db->from('apps');

        $this->db->where('id', $id);





        return $this->db->get();
    }



    public function get_cat()

    {

        $this->db->select('*');

        $this->db->from('category');





        return $this->db->get();
    }



    public function authdbuser($username, $password)

    {

        $this->db->select('*');

        $this->db->from('user');

        $this->db->where('username', $username);

        $this->db->where('password', $password);



        return $this->db->get()->result();
    }



    public function authdbcreator($username, $password)

    {

        $this->db->select('*');

        $this->db->from('creator');

        $this->db->where('id', $username);

        $this->db->where('password', $password);



        return $this->db->get()->result();
    }



    public function get_creator($username)

    {

        $this->db->select('*');

        $this->db->from('creator');

        $this->db->where('id', $username);





        return $this->db->get()->result();
    }



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

    public function get_version($id)

    {

        $this->db->select_max('versi');

        $this->db->from('update_log');

        $this->db->where('id_apps', $id);





        return $this->db->get();
    }



    public function setrate($idapps, $iduser, $idlog, $tanggal, $rate, $comment)

    {







        $this->db->set('id_apps', $idapps);

        $this->db->set('id_user', $iduser);

        $this->db->set('id_log', $idlog);

        $this->db->set('tanggal', $tanggal);

        $this->db->set('rating', $rate);

        $this->db->set('comment', $comment);

        $this->db->insert('review');
    }

    public function getverisonid($ids)

    {

        $this->db->select_max('id');

        $this->db->from('update_log');

        $this->db->where('id_apps', $ids);





        return $this->db->get();
    }



    public function getrate($id)

    {

        $this->db->select('user.nama as user, review.comment');

        $this->db->from('review');

        $this->db->join('user', 'review.id_user = user.id', 'inner');

        $this->db->where('review.id_apps', $id);

        return $this->db->get();
    }

    public function get_update_info($id)

    {

        $this->db->select('*');

        $this->db->from('update_log');

        $this->db->where('id_apps', $id);

        return $this->db->get();
    }

    public function get_rate_number($id)

    {

        $this->db->select_avg('rating');

        $this->db->from('review');

        $this->db->where('id_apps', $id);

        return $this->db->get();
    }



    public function set_download($id_apps, $id_user, $tanggal)

    {

        $this->db->set('id_apps', $id_apps);

        $this->db->set('id_user', $id_user);

        $this->db->set('tanggal', $tanggal);

        $this->db->insert('unduhan');
    }

    public function get_app_cat($id)

    {

        $this->db->select('category.nama as namacat');

        $this->db->from('category');

        $this->db->join('category_apps', 'category_apps.id_category = category.id', 'inner');

        $this->db->where('category_apps.id_apps', $id);

        return $this->db->get();
    }

    public function get_download_url($id)

    {

        $this->db->select_max('tanggal_log');
        $this->db->where('id_apps',$id);
        $a=$this->db->get('update_log')->row()->tanggal_log;
        $this->db->select('apk');
        $this->db->where('id_apps',$id);
        $this->db->where('tanggal_log',$a);
        return $this->db->get('update_log')->row()->apk;


    }
    public function set_view_log($id, $id_user, $tanggal)

    {

        $this->db->set('id_apps', $id);

        $this->db->set('id_user', $id_user);

        $this->db->set('tanggal', $tanggal);

        $this->db->insert('view_log');
    }
}
