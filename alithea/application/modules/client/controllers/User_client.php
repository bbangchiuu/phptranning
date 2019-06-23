<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_client extends MY_Controller
{
    
    function __construct(){
        parent::__construct();
        $this->load->model('client/User_client_model');
        $this->load->model('client/Product_model');
     
        $this->load->library('rest', array(  
            'server' => 'http://localhost:8080/alithea/api/',  
            'http_user' => 'admin',  
            'http_pass' => '1234',  
            'http_auth' => 'basic' // or 'digest'  
        ));
    }

    function data_category(){

        $result = $this->rest->get('Api_category/categoryies');  
        //var_dump($result);die; 
        foreach($result as $val){
            $data['hot_cate'][] = (array) $val;
        }
        return $data['hot_cate'];
    }

    function data_pro_new(){
     
        $result = $this->rest->get('Api_products/product_new'); 
        //var_dump($result);die; 
        foreach($result as $val){
            $data['new_pro_update'][] = (array) $val;
        }
        return $data['new_pro_update'];
    }

    function data_pro_hot(){
     
        $result = $this->rest->get('Api_products/product_hot'); 
        //var_dump($result);die; 
        foreach($result as $val){
            $data['hot_pro'][] = (array) $val;
        }
        return $data['hot_pro'];
    }

    function home(){

        $data['hot_cate'] = $this->data_category();
        $data['new_pro_update'] = $this->data_pro_new();
        $data['hot_pro'] = $this->data_pro_hot();
       
        $data['title'] = "Home";

        $this->load->view("client/home", $data);
    }

    function index(){
        redirect(site_url('home'));
        
        $data['hot_cate'] = $this->data_category();
        $data['new_pro_update'] = $this->data_pro_new();
        $data['hot_pro'] = $this->data_pro_hot();
       
        $data['title'] = "Home";
        //$data['new_pro_update'] = $this->Product_model->get_new_update();
        //$data['hot_cate'] = $this->Product_model->hot_cate();
        //$data['hot_pro'] = $this->Product_model->hot_pro();
        $this->load->view("client/home", $data);
    }
   
    function edit_profile(){
        if(isset($_SESSION['userlogin']['username'])){
            if(isset($_POST['update_user'])){
                $user_update = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'telephone' => $_POST['telephone'],
                    'address' => $_POST['address'],
                );

                if($this->User_client_model->user_update($_SESSION['userlogin']['user_id'], $user_update) == true){
                    $_SESSION['userlogin']['firstname'] =  $_POST['firstname'];
                    $_SESSION['userlogin']['lastname'] = $_POST['lastname'];
                    $_SESSION['userlogin']['telephone'] = $_POST['telephone'];
                    $_SESSION['userlogin']['address'] = $_POST['address'];

                    $this->session->set_flashdata('success','Update thanh cong');
                }
            }
            $data['title'] = "Edit Profile";  
            $this->load->view("client/edit-profile", $data);
        }else{
            redirect(site_url(''));
        }
        
    }

    public function service(){
        $data['title'] = "Service";
        $this->load->view("client/service", $data);
    }

    public function contact(){
        $data['title'] = "Contact";
        $this->load->view("client/contact", $data);
    }

    public function about_us(){
        $data['title'] = "About Us";
        $this->load->view("client/about-us", $data);
    }
    public function logout(){
        unset($_SESSION['userlogin']);
        
        redirect(site_url(''));
    }

    function login(){
        $this->load->library('rest', array(  
            'server' => 'http://localhost:8080/alithea/api/Api_users/',  
            'http_user' => 'admin',  
            'http_pass' => '1234',  
            'http_auth' => 'basic' // or 'digest'  
        ));

        if(isset($_POST['login'])){
            $kt_login = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            
            //var_dump($kt_login);die;

            if($this->User_client_model->ktLogin($kt_login)){
                $data['nguoidung'] = $this->User_client_model->ktLogin($kt_login);
                $userlogin = array(
                    'user_id' => $data['nguoidung']['user_id'],
                    'firstname' => $data['nguoidung']['firstname'],
                    'lastname' => $data['nguoidung']['lastname'],
                    'email' => $data['nguoidung']['email'],
                    'username' => $data['nguoidung']['username'],
                    'telephone' => $data['nguoidung']['telephone'],
                    'address' => $data['nguoidung']['address'],
                    'quyenAdmin' => $data['nguoidung']['quyenAdmin']
                );
                $_SESSION['userlogin'] = $userlogin;
                
                if(isset($_SESSION['cus_commnet'])){
                    unset($_SESSION['cus_commnet']);
                }
                
                //$this->session->set_userdata($userlogin);
                redirect(site_url(''));
            }else{
                $data['error'] = "username or password is not correct";
            }
        }
        $data['title'] = 'Login';
        $this->load->view("client/login", $data);
    }

    function testRes(){

    }
    
    function register(){

        if(isset($_POST['register'])){
            $kt_username = $this->User_client_model->kt_username($this->input->post('username'));
            $kt_email = $this->User_client_model->kt_email($this->input->post('email'));

            if($kt_email != NULL || $kt_username != NULL){
                if($kt_email != NULL){
                    $data['err_email'] = "email nay da dc su dung";
                }
                if($kt_username != NULL){
                    $data['err_username'] = "username already exist";
                }
            }else{
                $new_user = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'telephone' => $this->input->post('telephone'),
                    'address' => $this->input->post('address'),
                    'quyenAdmin' => '0'
                );
                      
                //var_dump($new_user);die;
                if($this->rest->post('Api_users/user', $new_user) == FALSE){
                    $data['err_insert'] = "Error";
                }else{
                    $kt_login = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                    );

                    //var_dump($kt_login);die;
                    $data['nguoidung'] = $this->User_client_model->ktLogin($kt_login);

                    //var_dump($data['nguoidung']);die;
                    $userlogin = array(
                        'user_id' => $data['nguoidung']['user_id'],
                        'firstname' => $data['nguoidung']['firstname'],
                        'lastname' => $data['nguoidung']['lastname'],
                        'email' => $data['nguoidung']['email'],
                        'username' => $data['nguoidung']['username'],
                        'telephone' => $data['nguoidung']['telephone'],
                        'address' => $data['nguoidung']['address'],
                        'quyenAdmin' => $data['nguoidung']['quyenAdmin']
                    );
                    $_SESSION['userlogin'] = $userlogin;
                    redirect(site_url(''));
                }

                // if($this->User_client_model->insert($new_user) == FALSE){
                //     $data['err_insert'] = "Error";
                // }else{
                //     $kt_login = array(
                //         'username' => $this->input->post('username'),
                //         'email' => $this->input->post('email'),
                //     );
                //     $data['nguoidung'] = $this->User_client_model->ktLogin($kt_login);
                //     $userlogin = array(
                //         'user_id' => $data['nguoidung']['user_id'],
                //         'firstname' => $data['nguoidung']['firstname'],
                //         'lastname' => $data['nguoidung']['lastname'],
                //         'email' => $data['nguoidung']['email'],
                //         'telephone' => $data['nguoidung']['telephone'],
                //         'username' => $data['nguoidung']['username'],
                //         'address' => $data['nguoidung']['address'],
                //         'quyenAdmin' => $data['nguoidung']['quyenAdmin']
                //     );
                //     $_SESSION['userlogin'] = $userlogin;
                //     redirect(site_url(''));
                // }
            }           
        }
        $data['title'] = 'Register';
        $this->load->view("client/register", $data);
    }
}