<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model
{

    public function read(){

       $query = $this->db->query("select * from `users`");
       return $query->result_array();
   }

    public function get($id){

        $query = $this->db->query("select * from `users` where user_id = $id");
        return $query->result_array();
    }

    public function ktLogin($data){
        return $this->db->select('*')->from('users')->where($data)->get()->row_array();
    }

    public function insert($data){

       if($this->db->insert('users', $data))
       {    
           return TRUE;
       }
         else
       {
           return FALSE;
       }
    }

   public function update($id,$data){

      $this->user_name    = $data['name']; // please read the below note

       //$this->user_password  = $data['pass'];

       $this->user_type = $data['type'];

       $result = $this->db->update('users',$this,array('user_id' => $id));

       if($result)
       {
           return "Data is updated successfully";
       }
       else
       {
           return "Error has occurred";
       }
   }

   public function delete($id){
       $result = $this->db->query("delete from `users` where user_id = $id");
       if($result)
       {
           return "Data is deleted successfully";
       }
       else
       {
           return "Error has occurred";
       }
   }
}