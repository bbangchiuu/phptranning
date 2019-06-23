<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Api_products extends REST_Controller
{ 
    public function __construct() {
        parent::__construct();
        $this->load->model('api/Products_model');
    }

    function sp_cung_theloai_get()  
    {  
        if(!$this->get('cat_id'))  
        {  
            $this->response(NULL, 400);  
        }  
        
        $product = $this->Products_model->sp_cung_theloai( $this->get('cat_id') );  
        if($product)  
        {  
            $this->response($product, 200); // 200 being the HTTP response code  
        }  
        else 
        {  
            $this->response(NULL, 404);  
        }  
    }

    function product_get()  
    {  
        if(!$this->get('pro_id'))  
        {  
            $this->response(NULL, 400);  
        }  
        
        $product = $this->Products_model->get( $this->get('pro_id') );  
        if($product)  
        {  
            $this->response($product, 200); // 200 being the HTTP response code  
        }  
        else 
        {  
            $this->response(NULL, 404);  
        }  
    }

    //get list category
    public function product_new_get(){
        $r = $this->Products_model->product_new();
        $this->response($r); 
    }


    public function product_hot_get(){
        $r = $this->Products_model->product_hot();
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