<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Baiviet_model extends MY_Model{
    
    public function __construct(){
        parent:: __construct();
        
    }

    public function listBaiviet($limit_per_page, $start_index){
        $query = $this->db->query("SELECT * FROM baiviet ORDER BY ngaytao DESC LIMIT $start_index, $limit_per_page");

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
    }

    public function searchBaiviet($nameProject){
        $query =  $this->db->query("SELECT * FROM baiviet WHERE tieude LIKE '%$nameProject%'");
        
        return $query->result_array();
       
    }

    public function get_total(){
        $query = $this->db->query("SELECT * FROM baiviet");
        return $query->num_rows();
    }

    public function insert_baiviet($newBaiviet){
        return $this->db->insert('baiviet', $newBaiviet);
    }

    public function layBaiviet($idBaiviet){
        $query = $this->db->query("SELECT * FROM baiviet WHERE baivietID = $idBaiviet");
        return $query->row_array();
    }

    public function edit_baiviet($idBaiviet, $editBaiviet){
        $timBV = array(
            'baivietID' => $idBaiviet
        );
        $query = $this->db->where($timBV)->update('baiviet', $editBaiviet);
        return $query;
    }

    public function xoaBaiviet($idBaiviet){
        $timBV = array(
            'baivietID' => $idBaiviet
        );
        $query = $this->db->where($timBV)->delete('baiviet');
        return $query;
    }

    public function commentBaiviet($idBaiviet){
        $query =  $this->db->query("SELECT * FROM usercomment WHERE baivietID = $idBaiviet");  
        return $query->result_array();
    }

    public function insetCommnet($Comment, $userID, $userName, $userEmail, $avatars, $idBaiviet){
        $query =  $this->db->query("INSERT INTO usercomment (Comment, userID, userName, email, avatars, baivietID) VALUES ('$Comment', '$userID', '$userName', '$userEmail', '$avatars', '$idBaiviet')");
        return $query;
    }

    public function listCategory(){
        $query =  $this->db->query("SELECT * FROM category");  
        return $query->result_array();
    }

    public function categoryChung($idCategory){
        $query =  $this->db->query("SELECT * FROM baiviet WHERE idCategory = $idCategory");  
        return $query->result_array();
    }

    // public function get_total_categoryChung($idCategory){
    //     $query =  $this->db->query("SELECT * FROM baiviet WHERE idCategory = $idCategory");  
    //     return $query->num_rows();
    // }

    // public function listBaivietcategoryChung($limit_per_page, $start_index, $idCategory){
    //     $query =  $this->db->query("SELECT * FROM baiviet WHERE idCategory = $idCategory ORDER BY ngaytao DESC LIMIT $start_index, $limit_per_page");  
    //     if($query->num_rows() > 0){
    //         return $query->result_array();
    //     }else{
    //         return false;
    //     }   
    // }
}