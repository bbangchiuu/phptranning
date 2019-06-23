<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends MY_Model
{

    public function product_new(){

       $query = $this->db->query("SELECT * FROM `products` ORDER BY uploaded_on DESC LIMIT 4");
       return $query->result_array();
   }

    public function product_hot(){

        $query = $this->db->query("SELECT * FROM `products` LIMIT 4");
        return $query->result_array();
    }

    public function get($pro_id){

        $query = $this->db->query("select * from `products` where pro_id = $pro_id");
        return $query->row_array();
    }

    public function sp_cung_theloai($cat_id){

        $query = $this->db->query("SELECT * FROM `products` WHERE cat_id = $cat_id LIMIT 4");
        return $query->result_array();
    }

}