<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersClient_model extends MY_Model{
    
    public function __construct(){
        parent:: __construct();
        
    }

    public function getUser($id){
        $query = $this->db->query("SELECT * FROM users WHERE userID = $id ");
        return $query->row_array();
    }

    public function editUser($id ,$updateUser){
        $timSP = array(
            'userID' => $id
        );
        $query = $query = $this->db->where($timSP)->update('users', $updateUser);
        return $query;
    }
}