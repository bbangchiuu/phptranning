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

    public function update_thongsokithuat($pro_id, $data){
        $timSP = array(
            'pro_id' => $pro_id
        );
        $query = $this->db->where($timSP)->update('specifications_pro', $data);
        return $query;
    }

    public function insert_thongsokithuat($data){
        return $this->db->insert('specifications_pro', $data);
    }

    public function list_pag_pro($limit_per_page, $start_index){
        $query = $this->db->query("SELECT * FROM products ORDER BY uploaded_on DESC LIMIT $start_index, $limit_per_page");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }

    public function get_total(){
        $query = $this->db->query("SELECT * FROM products");
        return $query->num_rows();
    }

    public function get_protducts(){

       $query = $this->db->query("SELECT * FROM products");
       return $query->result_array();
    }

    public function get_pro($pro_id){
        $query = $this->db->query("SELECT * FROM products WHERE pro_id = $pro_id");
        return $query->row_array();
    }

    public function get_img($pro_id){

        $query = $this->db->query("SELECT * FROM image_detail WHERE pro_id = $pro_id");
        return $query->result_array();
    }

    public function get_id_sp($data){
        //var_dump($data);die;
        $query = $this->db->select('*')->from('products')->where($data)->get()->row_array();
        return $query;
    }

    public function get_id($pro_name){

        $query = $this->db->query("SELECT pro_id FROM products where pro_name like '$pro_name'");
        return $query->row_array();
    }

    public function insert_pro($data){
        return $this->db->insert('products', $data);
    }

    public function insert_img($data = array()){
        return $this->db->insert_batch('image_detail',$data);
    }

    public function update_pro($id, $data){
        $timSP = array(
            'pro_id' => $id
        );
        $query = $this->db->where($timSP)->update('products', $data);
        return $query;
    }

    public function update_img($id, $data){
        $timSP = array(
            'img_id' => $id
        );
        $query = $this->db->where($timSP)->update('image_detail', $data);
        return $query;
    }

   public function delete($pro_id){
        $timSP = array(
            'pro_id' => $pro_id
        );

        $this->db->where($timSP)->delete('image_detail');

        $query = $this->db->where($timSP)->delete('products');
        return $query;
   }

    public function kr_pr_name($pro_name){
        $timSP = array(
            'pro_name' => $pro_name
        );
        $query = $this->db->select('pro_name')->from('products')->where($timSP)->get()->row_array();
        return $query;
    }
}