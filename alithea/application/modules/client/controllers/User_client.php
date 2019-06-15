<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_client extends MY_Controller
{
    
    function __construct(){
        parent::__construct();
        $this->load->model('client/User_client_model');
        $this->load->model('client/Product_model');
     
    }

    function index(){
        $data['title'] = "Home";
        $data['new_pro_update'] = $this->Product_model->get_new_update();
        $data['hot_cate'] = $this->Product_model->hot_cate();
        $data['hot_pro'] = $this->Product_model->hot_pro();
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
        if(isset($_POST['login'])){
            $kt_login = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            
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
                //$this->session->set_userdata($userlogin);
                redirect(site_url(''));
            }else{
                $data['error'] = "username or password is not correct";
            }
        }
        $data['title'] = 'Login';
        $this->load->view("client/login", $data);
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
                    'password' => md5($this->input->post('password')),
                    'telephone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                );
                
                if($this->User_client_model->insert($new_user) == FALSE){
                    $data['err_insert'] = "Error";
                }else{
                    $kt_login = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                    );
                    $data['nguoidung'] = $this->User_client_model->ktLogin($kt_login);
                    $userlogin = array(
                        'user_id' => $data['nguoidung']['user_id'],
                        'firstname' => $data['nguoidung']['firstname'],
                        'lastname' => $data['nguoidung']['lastname'],
                        'email' => $data['nguoidung']['email'],
                        'username' => $data['nguoidung']['username'],
                        'quyenAdmin' => $data['nguoidung']['quyenAdmin']
                    );
                    $_SESSION['userlogin'] = $userlogin;
                    redirect(site_url(''));
                }
            }           
        }
        $data['title'] = 'Register';
        $this->load->view("client/register", $data);
    }
}