<?php defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH.'modules/api/libraries/REST_Controller.php';
require APPPATH.'libraries/REST_Controller.php';
class Example extends REST_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('api/user_model');
    }

    function user_get()  
    {  
        if(!$this->get('id'))  
        {  
            $this->response(NULL, 400);  
        }  
        
        $user = $this->user_model->get( $this->get('id') );  
        if($user)  
        {  
            $this->response($user, 200); // 200 being the HTTP response code  
        }  
        else 
        {  
            $this->response(NULL, 404);  
        }  
    }

    //get list user
    public function users_get(){
        $r = $this->user_model->read();
        $this->response($r); 
    }

    //update user
    public function user_put(){
        $id = $this->uri->segment(4);

        $data = array(
            'name' => $this->input->get('name'),
          //  'pass' => $this->input->get('pass'),
            'type' => $this->input->get('type')
        );

        //$id = $this->input->get('id');
        // $data = array(
        //     'name' => $this->input->post('name'),
        //     'type' => $this->input->post('type')
        // );
        // print_r($data);die;
        $r = $this->user_model->update($id,$data);
        $this->response($r); 
    }

    //add user
    public function user_post(){    
        $data = array(
            'name' => $this->input->post('name'),
            'pass' => $this->input->post('pass'),
            'type' => $this->input->post('type')
        );

        $r = $this->user_model->insert($data);
        if($r === FALSE)  
        {  
            $this->response(array('status' => 'failed'));  
        }  
        else 
        {  
            $this->response(array('status' => 'success'));  
        }  
    }

    //delete user
    public function user_delete(){
        $id = $this->uri->segment(4);
        //$id = $this->input->post('id');
        $r = $this->user_model->delete($id);
        $this->response($r); 
    }
}