<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeAdmin_model extends MY_Model{
    
    public function __construct(){
        parent:: __construct();
        
    }

    public function ListEmployee(){
        return $this->db->select('*')->from('employee')->get()->result_array();
    }
}