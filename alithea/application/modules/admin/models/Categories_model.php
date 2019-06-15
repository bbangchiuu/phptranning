<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends MY_Model{
    public function __construct(){
        parent:: __construct();
        
    }

    public function list_pag_cat($limit_per_page, $start_index){
        $query = $this->db->query("SELECT * FROM categories LIMIT $start_index, $limit_per_page");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }

    public function get_total(){
        $query = $this->db->query("SELECT * FROM categories");
        return $query->num_rows();
    }

    public function get_categories(){

        $query = $this->db->query("SELECT * FROM categories");
        return $query->result_array();
     }

    public function insert_cat($data){
        return $this->db->insert('categories', $data);
    }

    public function kr_cat_name($cat_name){
        $timSP = array(
            'cat_name' => $cat_name
        );
        $query = $this->db->select('cat_name')->from('categories')->where($timSP)->get()->row_array();
        return $query;
    }

    public function get_cat($cat_id){

        $query = $this->db->query("SELECT * FROM categories WHERE cat_id = $cat_id");
        return $query->row_array();
    }

    public function delete($cat_id){
        $timSP = array(
            'cat_id' => $cat_id
        );

        $query = $this->db->where($timSP)->delete('categories');
        return $query;
   }

    public function update_cat($cat_id, $data){
        $timSP = array(
            'cat_id' => $cat_id
        );
        $query = $this->db->where($timSP)->update('categories', $data);
        return $query;
    }
}