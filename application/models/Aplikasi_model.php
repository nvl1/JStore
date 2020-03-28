<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Aplikasi_model extends CI_Model

{

    public function set_aplikasi($idcreator, $nama, $deskripsi, $foto, $tanggal, $idkategori)

    {

        $this->db->set('id_creator', $idcreator);

        $this->db->set('nama', $nama);

        $this->db->set('icon',$foto);

        $this->db->set('description', $deskripsi);        

        $this->db->set('date_created', $tanggal);

        $this->db->insert('apps');

        $idapps = $this->db->insert_id();                    



        $data = array();

            foreach( $idkategori as $key => $value)

            {

            $data[] = array(

            'id_apps' => $idapps,

            'id_category' =>  $_POST['kategori'][$key]);            

            }

        $this->db->insert_batch('category_apps', $data);            



        return $idapps;

    }

    

    public function get_favorit($iduser){
        $this->db->select('apps.id as idapps,creator.nama as namadev,apps.nama as appname,apps.icon as appsicon');
        
        $this->db->from('apps');
         
        $this->db->join('favorit', 'favorit.id_apps = apps.id', 'inner'); 
        
        $this->db->join('creator', 'creator.id = apps.id_creator', 'inner');
        
        $this->db->where('favorit.id_user',$iduser);
        
        $this->db->order_by('favorit.id');
        
        return $this->db->get(); 
    }

    public function set_updatelog($idapps,$date,$versi,$deskripsi2,$apk,$size)

    {

        $this->db->set('id_apps', $idapps);

        $this->db->set('tanggal_log', $date);

        $this->db->set('versi', $versi);
        
        $this->db->set('deskripsi',$deskripsi2);

        $this->db->set('apk', $apk);

        $this->db->set('size', $size);

        $this->db->insert('update_log');

    }
    
       public function set_request($iduser,$idkategori,$subjek,$request,$tanggal)

    {

        $this->db->set('id_user', $iduser);

        $this->db->set('category', $idkategori);

        $this->db->set('subject', $subjek);

        $this->db->set('request_text', $request);

        $this->db->set('time_stamp', $tanggal);

        $this->db->insert('request');

    }



    public function set_ss($idapps, $ss, $date)

    {

        $this->db->set('id_apps', $idapps);

        $this->db->set('screenshot', $ss);

        $this->db->set('date', $date);

        $this->db->insert('screenshot_apps');

    }
    
    public function set_favorit($idapps, $iduser, $date)

    {

        $this->db->set('id_apps', $idapps);

        $this->db->set('id_user', $iduser);

        $this->db->set('tanggal', $date);

        $this->db->insert('favorit');

    }



    public function update_ss($idapps, $ss, $date)

    {        

        $this->db->set('screenshot', $ss);

        $this->db->set('date', $date);

        $this->db->where('screenshot', $ss);

        $this->db->update('screenshot_apps');

    }



    public function update_aplikasi( $id, $nama, $idkategori, $deskripsi, $foto)

    {        

        $this->db->set('nama',$nama);

        $this->db->set('description', $deskripsi);        

        $this->db->set('icon', $foto);

        $this->db->where('id', $id);

        $this->db->update('apps');      

        

        $this->db->where('id_apps', $id);

        $this->db->delete('category_apps');



        $data = array();

        foreach( $idkategori as $key => $value)

        {

        $data[] = array(

        'id_apps' => $id,

        'id_category' =>  $_POST['kategori'][$key]);            

        }

        $this->db->insert_batch('category_apps', $data);        

    }



    public function update_apk($id,$deskripsi,$tanggal,$versi,$apk,$size){

        $this->db->set('id_apps', $id);

        $this->db->set('deskripsi', $deskripsi);

        $this->db->set('tanggal_log', $tanggal);

        $this->db->set('versi', $versi);

        $this->db->set('apk', $apk);

        $this->db->set('size', $size);

        $this->db->insert('update_log');

    }



    public function update_creator($id, $nama, $user, $password, $foto, $tanggal, $email)

    {                  

        $this->db->set('nama', $nama);

        $this->db->set('username', $user);

        $this->db->set('password', $password);

        $this->db->set('foto', $foto);        

        $this->db->set('tgl_lahir', $tanggal);

        $this->db->set('email', $email);        

        $this->db->where('id', $id);

        $this->db->update('creator');      

        

    }    



    public function aplikasi_exist($idcreator,$nama)

    {

        $this->db->select('*');

        $this->db->from('apps');

        $this->db->where('id_creator', $idcreator);

        $this->db->where('nama',$nama);                        

        

         return $this->db->count_all_results();

    }



    public function update_exist2($idcreator,$nama)

    {              

        $this->db->select('nama');        

        $this->db->where('id_creator', $idcreator);

        $this->db->where('nama',$nama);                        

        

        return $this->db->get('apps')->row()->nama;

    }



    public function update_exist($idcreator,$nama)

    {              

        $this->db->select('*');

        $this->db->from('apps');

        $this->db->where('id_creator', $idcreator);

        $this->db->where('nama',$nama);                        

        

         return $this->db->count_all_results();

    }



    public function count_ss($idapps)

    {   

        $this->db->select('*');

        $this->db->from('screenshot_apps');      

        $this->db->where('id_apps', $idapps);                      



        return $this->db->count_all_results();

    }
    
     public function btl($idapps,$iduser)

    {   

        $this->db->where('id_apps', $idapps);  
        
        $this->db->where('id_user', $iduser);

        $this->db->delete('favorit');


        redirect(base_url().'Desc_page?id='.$idapps);;

    }
    
    public function count_favorit($id,$iduser)

    {   

        $this->db->select('*');

        $this->db->from('favorit');      

        $this->db->where('id_apps', $id);  
        
        $this->db->where('id_user', $iduser);



        return $this->db->count_all_results();

    }



    public function ss_exist($ss)

    {

        $this->db->select('screenshot');        

        $this->db->where('screenshot', $ss);



        return $this->db->get('screenshot_apps')->row()->screenshot;

    }





    public function hapus_aplikasi($id)

    {
        $this->db->where('id_apps', $id);

        $this->db->delete('favorit');
        
        $this->db->where('id_apps', $id);

        $this->db->delete('review');
        
        $this->db->where('id_apps', $id);

        $this->db->delete('unduhan');
        
        $this->db->where('id_apps', $id);

        $this->db->delete('view_log');

        $this->db->where('id_apps', $id);

        $this->db->delete('screenshot_apps');

        $this->db->where('id_apps', $id);

        $this->db->delete('category_apps');

        $this->db->where('id_apps', $id);

        $this->db->delete('update_log');

        $this->db->where('id', $id);

        $this->db->delete('apps');

        redirect('Creator_page');

    }



    public function get_kategori($id)

    {

        $this->db->select('*');

        $this->db->from('category');

        $this->db->join('category_apps', 'category_apps.id_category = category.id', 'inner');

        $this->db->where('category_apps.id_apps', $id);



        return $this->db->get();

    }



    public function get_ss($id)

    {

        $this->db->select('*');

        $this->db->from('screenshot_apps');

        $this->db->join('apps','screenshot_apps.id_apps = apps.id','inner');

        $this->db->where('apps.id', $id);        



        return $this->db->get();

    }



    public function get_nama($id)

    {

        $this->db->select('*');

        $this->db->where('id', $id);



        return $this->db->get('apps')->row()->nama;

    }



    Public function get_id($idcreator,$nama)
    {
        $this->db->select('*');
        $this->db->where('id_creator', $idcreator);
        $this->db->where('nama',$nama);
        return $this->db->get('apps')->row()->id;
    }

    Public function delete_files($Path2) {
        if (is_dir($Path2))
        $dir_handle = opendir($Path2);
  if (!$dir_handle)
       return false;
  while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
             if (!is_dir($Path2."/".$file))
                  unlink($Path2."/".$file);
             else
                  delete_directory($Path2.'/'.$file);
        }
  }
  closedir($dir_handle);
  rmdir($Path2);
  return true;
   }



   Public function delete_files2($Path3) {
        if (is_dir($Path3))
        $dir_handle = opendir($Path3);
    if (!$dir_handle)
    return false;

    while($file = readdir($dir_handle)) {

        if ($file != "." && $file != "..") {
            if (!is_dir($Path3."/".$file))
                unlink($Path3."/".$file);
            else
                delete_directory($Path3.'/'.$file);
                }
            }
                closedir($dir_handle);
                rmdir($Path3);
                return true;
            }

    public function get_app_cat($id)

    {        
        $this->db->select('category.nama as namacat');
        $this->db->from('category');
        $this->db->join('category_apps', 'category_apps.id_category = category.id', 'inner');
        $this->db->where('category_apps.id_apps', $id);
        return $this->db->get();
    }



    public function max_versi($id)

    {
        $this->db->select_max('tanggal_log');
        $this->db->where('id_apps',$id);
        $a=$this->db->get('update_log')->row()->tanggal_log;
        $this->db->select_max('versi');
        $this->db->where('id_apps',$id);
        $this->db->where('tanggal_log',$a);
       return $this->db->get('update_log')->row()->versi;

    }



    public function max_size($id)

    {        
        $this->db->select_max('tanggal_log');
        $this->db->where('id_apps',$id);
        $a=$this->db->get('update_log')->row()->tanggal_log;
        $this->db->select_max('size');
        $this->db->where('id_apps',$id);   
        $this->db->where('tanggal_log',$a);
        $c=$this->db->get('update_log')->row()->size;
        return round($c);
    }  

    

    public function avg_rate($id)

    {        
        $this->db->select_avg('rating');
        $this->db->where('id_apps',$id);        
        $c=$this->db->get('review')->row()->rating;
        return $c;
    }



    public function cari_apps($idcreator,$cari)

    {        
        $this->db->select('apps.id as idapps,creator.nama as namadev,apps.nama as appname,apps.icon as appsicon,category.nama as namacat');
        $this->db->from('apps');
        $this->db->join('creator', 'creator.id = apps.id_creator', 'inner');
        $this->db->join('category_apps', 'category_apps.id_apps = apps.id', 'inner');
        $this->db->join('category', 'category_apps.id_category = category.id', 'inner');        
        $this->db->where('id_creator', $idcreator);
        $this->db->like('apps.nama', $cari,'both');
        $this->db->or_like('category.nama', $cari,'both');
        $this->db->where('id_creator', $idcreator);
        $this->db->or_like('creator.nama',$cari,'both');
        $this->db->where('id_creator', $idcreator);
        $this->db->group_by('apps.id');
        return $this->db->get();             
    }
    
    public function cari_apps2($cari)

    {        
        $this->db->select('apps.id as idapps,creator.nama as namadev,apps.nama as appname,apps.icon as appsicon,apps.description as appdesc,apps.date_created as appdate,category.nama as namacat');
        $this->db->from('apps');
        $this->db->join('creator', 'creator.id = apps.id_creator', 'inner');
        $this->db->join('category_apps', 'category_apps.id_apps = apps.id', 'inner');
        $this->db->join('category', 'category_apps.id_category = category.id', 'inner');        
        $this->db->like('apps.nama', $cari,'both');
        $this->db->or_like('category.nama', $cari,'both');
        $this->db->or_like('creator.nama',$cari,'both');
        $this->db->group_by('apps.id');
        return $this->db->get();              
    }
    
    public function set_cari($iduser,$tanggal,$cari){
        $this->db->set('id_user',$iduser);
        $this->db->set('date',$tanggal);
        $this->db->set('keyword',$cari);
        $this->db->insert('search_log');
    }
    
    public function cari_apps3($cari)

    {        
        $this->db->select('apps.id as idapps,creator.nama as namadev,apps.nama as appname,apps.icon as appsicon,category.nama as namacat');
        $this->db->from('apps');
        $this->db->join('creator', 'creator.id = apps.id_creator', 'inner');
        $this->db->join('category_apps', 'category_apps.id_apps = apps.id', 'inner');
        $this->db->join('category', 'category_apps.id_category = category.id', 'inner');        
        $this->db->like('apps.nama', $cari,'both');
        $this->db->or_like('category.nama', $cari,'both');
        $this->db->or_like('creator.nama',$cari,'both');
        $this->db->group_by('apps.id');
        return $this->db->get();             
    }


    

}

