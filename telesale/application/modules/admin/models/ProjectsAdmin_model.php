<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectsAdmin_model extends MY_Model{
    
    public function __construct(){
        parent:: __construct();
        
    }

    public function ListProjects($limit_per_page, $start_index, $userID){
        $query = $this->db->query("SELECT project.* FROM project INNER JOIN users ON users.userID = project.userID WHERE project.userID = $userID LIMIT $start_index, $limit_per_page");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
        // $query = $this->db->select('*')->from('project')->limit($limit_per_page, $start_index)->get()->result_array();
        // return $query;
        
    }

    public function get_total(){
        
        return $this->db->count_all("project");
    }

    public function get_total_user($userID){
        $query = $this->db->query("SELECT project.* FROM project INNER JOIN users ON users.userID = project.userID WHERE project.userID = $userID");
        return $query->num_rows();
    }

    public function searchProject($nameProject, $userID){
        $query =  $this->db->query("SELECT project.* FROM project INNER JOIN users ON users.userID = project.userID WHERE project.userID = $userID AND project.nameProject LIKE '%$nameProject%'");
        
        return $query->result_array();
       
    }

    public function addProject($NewNameProject, $newTask, $userID){
        $curdate = date("Y-m-d");
        $query =  $this->db->query("INSERT INTO project (nameProject, Task, Date, userID) VALUES ('$NewNameProject', '$newTask', '$curdate', '$userID')");
        return $query;  
    }

    public function insetCommnet($Comment, $userID, $userName, $userEmail, $avatars){
        
        $query =  $this->db->query("INSERT INTO usercomment (Comment, userID, userName, email, avatars, baivietID) VALUES ('$Comment', '$userID', '$userName', '$userEmail', '$avatars', '1')");
        return $query;  
    }

    public function commnetbaiveit(){
        
        $query =  $this->db->query("SELECT usercomment.* FROM baiviet INNER JOIN usercomment ON baiviet.baivietID = usercomment.baivietID WHERE usercomment.baivietID = '1'");
        return $query->result_array();  
    }

    public function deleteProject($id){        
        $query =  $this->db->query("DELETE FROM project WHERE ID = $id");
        return $query;
    }
}