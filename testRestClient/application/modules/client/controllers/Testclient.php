<?php defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH.'modules/api/controllers/Example.php';
require APPPATH.'modules/client/libraries/REST_Controller.php';

class Testclient extends REST_Controller
{
    public $restclient;
    public function __construct() {
        parent::__construct();
        $this->load->model('api/user_model');
        $this->restclient = new REST_Controller();
        
    }

    function list_user_get()
    {
        $users =  $this->user_model->read();

        if($users)
        {
            $this->restclient->response($users, 200);
        }
        else
        {
            $this->restclient->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }

    function user_get($id)
    {
        $users =  $this->user_model->get($id);

        if($users)
        {
            $this->restclient->response($users, 200);
        }
        else
        {
            $this->restclient->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }

    public function user_post(){    
        $data = array(
            'name' => $this->input->post('name'),
            'pass' => $this->input->post('pass'),
            'type' => $this->input->post('type')
        );

        $r = $this->user_model->insert($data);
        if($r === FALSE)  
        {  
            $this->restclient->response(array('status' => 'failed'));  
        }  
        else 
        {  
            $this->response(array('status' => 'success'));  
        }  
    }
}