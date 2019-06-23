<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Api_category extends REST_Controller
{ 
    public function __construct() {
        parent::__construct();
        $this->load->model('api/Categories_model');
    }

    function category_get()  
    {  
        
    }

    //get list category
    public function categoryies_get(){
        $r = $this->Categories_model->read();
        $this->response($r); 
    }

    //update category
    public function category_put(){
        
    }


    public function category_post(){    

        
    }
    
    //delete category
    public function category_delete(){
        
    }
}