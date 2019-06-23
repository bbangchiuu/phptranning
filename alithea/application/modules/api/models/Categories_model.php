<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends MY_Model
{

    public function read(){

       $query = $this->db->query("select * from `categories`");
       return $query->result_array();
   }

}