<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model
{
    public function __construct(){
        parent:: __construct();    
    }

    public function thongsokithuat($pro_id){
        $query = $this->db->query("SELECT * FROM specifications_pro WHERE pro_id = $pro_id");
        return $query->row_array();
    }
    
    public function sp_cung_theloai($cat_id){
        $query = $this->db->query("SELECT * FROM products WHERE cat_id = $cat_id LIMIT 4");
        return $query->result_array();
    }

    public function insert_orderdetail($data = array()){
        return $this->db->insert_batch('orderdetails',$data);
    }

    public function edit_pro_late_order($id, $data){
        $timSP = array(
            'pro_id' => $id
        );
        $query = $this->db->where($timSP)->update('products', $data);
        return $query;
    }

    public function search_product($pro_name){
        $query = $this->db->query("SELECT * FROM products WHERE pro_name LIKE '%$pro_name%'");
        return $query->result_array();
    }

    public function filter_pro($pro_price){
        $query = $this->db->query("SELECT * FROM products WHERE pro_price >= $pro_price");
        return $query->result_array();
    }

    public function insert_order($data){
        return $this->db->insert('orders', $data);
    }

    public function get_order($data){
        $query = $this->db->select('order_id')->from('orders')->where($data)->get()->row_array();
        return $query;
    }

    public function get_categories(){
        $query = $this->db->query("SELECT * FROM categories");
        return $query->result_array();
    }

    public function get_img($pro_id){

        $query = $this->db->query("SELECT * FROM image_detail WHERE pro_id = $pro_id");
        return $query->result_array();
    }

    public function pro_detail($pro_id){
        $query = $this->db->query("SELECT * FROM products WHERE pro_id = $pro_id");
        return $query->row_array();
    }

    public function cat_pro_detail($cat_id){
        $query = $this->db->query("SELECT * FROM products WHERE cat_id = $cat_id");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }

    public function hot_pro(){
        $query = $this->db->query("SELECT * FROM products LIMIT 4");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }

    public function get_new_update(){
        $query = $this->db->query("SELECT * FROM products ORDER BY uploaded_on DESC LIMIT 4");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }

    public function hot_cate(){
        $query = $this->db->query("SELECT * FROM categories LIMIT 4");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }
}