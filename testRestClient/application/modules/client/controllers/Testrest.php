<?php

class Testrest extends MY_Controller{
    public function __construct() {
        parent::__construct();
        //$this->load->model('api/user_model');
           
    }

    public function post_data($username, $userpass, $type){    
        $this->load->library('rest', array(  
            'server' => 'http://localhost:8080/testRestClient/',  
            'http_user' => 'admin',  
            'http_pass' => '1234',  
            'http_auth' => 'basic' // or 'digest'  
        ));  

        $data = array(
            'name' => $username,
            'pass' => $userpass,
            'type' => $type
        );

        $this->rest->post('api/example/user', $data);  
        $this->rest->debug();
        
    }

    function rest_client_example($id)  {  
        $this->load->library('rest', array(  
            'server' => 'http://localhost:8080/testRestClient/',  
            'http_user' => 'admin',  
            'http_pass' => '1234',  
            'http_auth' => 'basic' // or 'digest'  
        ));  
        $user = $this->rest->get('api/example/user', array('id' => $id), 'json');  
        $this->rest->debug();
        print_r($user);
    }

    //get api
    function ci_curl()  { 
         
        $username = 'admin';  
        $password = '1234';  
        $this->load->library('curl');  
        $this->curl->create('http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=b395666f8871c3556e37db58569eb2e2'); 

        // Optional, delete this line if your API is open  
        // $this->curl->http_login($username, $password);  
        // $this->curl->post(array(  
        //     'name' => $new_name,  
        //     'email' => $new_email 
        // )); 

        $result = json_decode($this->curl->execute());  

        $this->curl->debug();
        print_r($result);

    }

    function list_users(){
        $this->load->library('rest', array(  
            'server' => 'http://localhost:8080/testRestClient/api/example/',  
            'http_user' => 'admin',  
            'http_pass' => '1234',  
            'http_auth' => 'basic' // or 'digest'  
        ));  
        $result = $this->rest->get('users');  
        //$this->rest->debug();
       var_dump($result);
    }

}