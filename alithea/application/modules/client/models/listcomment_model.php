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
}