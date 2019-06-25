<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class listcomment_model extends MY_Model
{
    public function comment_of_pro($pro_id){
        $query = $this->db->query("SELECT * FROM comment_of_cus WHERE pro_id = $pro_id ORDER BY uploaded_on DESC");
        return $query->result_array();
    }

    public function insert_Comment($data){
        return $this->db->insert('comment_of_cus', $data);
    }

    public function get_total($pro_id){
        $query = $this->db->query("SELECT * FROM comment_of_cus WHERE pro_id = $pro_id");
        return $query->num_rows();
    }

    public function list_pag_pro_comment($pro_id, $limit_per_page, $start_index){
        $query = $this->db->query("SELECT * FROM comment_of_cus WHERE pro_id = $pro_id ORDER BY uploaded_on DESC LIMIT $start_index, $limit_per_page");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }
}