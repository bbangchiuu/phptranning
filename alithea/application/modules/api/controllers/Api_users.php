<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Api_users extends REST_Controller
{ 
    public function __construct() {
        parent::__construct();
        $this->load->model('api/users_model');
    }

    function user_get()  
    {  
        //var_dump($_GET['id']);die;
        if(!$this->get('user_id'))  
        {  
            $this->response(NULL, 400);  
        }  
        
        $user = $this->users_model->get( $this->get('user_id') );  
        if($user)  
        {  
            $this->response($user, 200); // 200 being the HTTP response code  
        }  
        else 
        {  
            $this->response(NULL, 404);  
        }  
    }

    function userResgiter_get()  
    {  
        //var_dump($_GET['id']);die;
        if(!$this->get('username'))  
        {  
            $this->response(NULL, 400);  
        }  
        
        if(!$this->get('email'))  
        {  
            $this->response(NULL, 400);  
        }

        $user = $this->users_model->getResgiter( $this->get('username'), $this->get('email') );  
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
        $r = $this->users_model->read();
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
        $r = $this->users_model->update($id,$data);
        $this->response($r); 
    }

    //add user
    public function user_admin_post(){    

        $new_user = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'telephone' => $this->input->post('telephone'),
            'address' => $this->input->post('address'),
            'quyenAdmin' => '1'
        );
        //var_dump($new_user);die;
        $r = $this->users_model->insert($new_user);
        if($r === FALSE)  
        {  
            $this->response(array('status' => 'failed'));  
        }  
        else 
        {  
            $this->response(array('status' => 'success'));  
        }  
    }

    public function user_post(){    

        $new_user = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'telephone' => $this->input->post('telephone'),
            'address' => $this->input->post('address'),
            'quyenAdmin' => '0'
        );
        //var_dump($new_user);die;
        $r = $this->users_model->insert($new_user);
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
        $r = $this->users_model->delete($id);
        
        $this->response($r); 
    }
}