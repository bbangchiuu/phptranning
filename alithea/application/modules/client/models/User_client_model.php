<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_client_model extends MY_Model
{
    public function insert($data){
        return $this->db->insert('users', $data);
    }

    public function kt_username($username){
        $timSP = array(
            'username' => $username
        );
        $query = $this->db->select('username')->from('users')->where($timSP)->get()->row_array();
        return $query;
    }

    public function kt_email($email){
        $timSP = array(
            'email' => $email
        );
        $query = $this->db->select('email')->from('users')->where($timSP)->get()->row_array();
        return $query;
    }

    public function user_update($user_id,$data){
        $timUS = array(
            'user_id' => $user_id
        );
        $query = $this->db->where($timUS)->update('users', $data);
        return $query;
    }

    public function ktLogin($data){
        return $this->db->select('*')->from('users')->where($data)->get()->row_array();
    }

    public function insert_cus($data){
        return $this->db->insert('customers', $data);
    }
    public function get_customer($data){
        $query = $this->db->select('cus_id')->from('customers')->where($data)->get()->row_array();
        return $query;
    }
}