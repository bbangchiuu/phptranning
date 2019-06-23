
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersAdmin_model extends MY_Model{
    
    public function __construct(){
        parent:: __construct();
        
    }

    public function setSignUp($newUser){       
        return $this->db->insert('users', $newUser);
    }

    public function getlogin($email, $password){
        $timUser = array(
            'email' => $email,
            'password' => $password,
            // 'quyenAdmin' => '1'
        );
        $query = $this->db->select('*')->from('users')->where($timUser)->get();
        return $query;
    }

    public function layEmail($email){       
        $timEmail = array(
            'email' => $email
        );
        $query = $this->db->select('*')->from('users')->where($timEmail)->get()->row_array();
        return $query;
    }

    public function krTrungEmail($email){
        $timSP = array(
            'email' => $email
        );
        $query = $this->db->select('email')->from('users')->where($timSP)->get()->row_array();
        return $query;
    }

    public function layID($id){       
        $timUser = array(
            'userID' => $id
        );
        $query = $this->db->select('*')->from('users')->where($timUser)->get()->row_array();
        return $query;
    }
}