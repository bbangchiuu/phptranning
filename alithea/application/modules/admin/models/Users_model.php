<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model{
    public function __construct(){
        parent:: __construct();
        
    }

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

    public function ktLogin($data){
        return $this->db->select('*')->from('users')->where($data)->get()->row_array();
    }
    
    public function list_users(){
        $query = $this->db->query("SELECT * FROM users");
        return $query->result_array();
    }

    public function list_customer(){
        $query = $this->db->query("SELECT * FROM customers");
        return $query->result_array();
    }

    public function delete_cus($cus_id, $order_id){
        $timCus = array(
            'cus_id' => $cus_id
        );
        if($order_id != NULL){
            $timSP = array(
                'order_id' => $order_id
            );
            $this->db->where($timSP)->delete('orderdetails');
            $this->db->where($timSP)->delete('orders');
        }
        
        $this->db->where($timCus)->delete('customers');
   }

    public function delete_user($user_id){
        $timUser = array(
            'user_id' => $user_id
        );
    
        $this->db->where($timUser)->delete('users');
    }
}