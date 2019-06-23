<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersAdmin extends MX_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/UsersAdmin_model');
        $this->load->library('session');
    }

    public function checksession(){
        if(!$this->session->has_userdata('userEmail')){    
            redirect(site_url('page_signin.html'));
        }
        if(!$this->session->has_userdata('quyenAdmin')){
            redirect(site_url('page_signin.html'));
        }
        if($this->session->userdata('quyenAdmin') === '0'){
            redirect(site_url(''));
        }
    }

    public function logOut(){
        $this->session->sess_destroy();
        redirect(site_url('page_signin.html'));
    }

    public function page_signup(){
        $this->checksession();
        if($this->input->post('signupUser')){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $newUser = array(
                'name' => $username,
                'email' => $email,
                'password' => $password,
                'avatars' => 'usernull.jpg',
                'quyenAdmin' => '1'
            );
            
            $sqltrung = $this->UsersAdmin_model->krTrungEmail($email);
            if(count($sqltrung) === 1){
                $data['error'] = 'Email đã tồn tại';
                $this->load->view('admin/page_signup', $data);
            }
            else{
                if($this->UsersAdmin_model->setSignUp($newUser) === FALSE){
                    echo "that bai";
                }else{
                    $data['nguoidung'] = $this->UsersAdmin_model->layEmail($email);
                    $userlogin = array(
                        'id' => $data['nguoidung']['userID'],
                        'userEmail' => $data['nguoidung']['email'],
                        'userName' => $data['nguoidung']['name'],
                        'avatars' => $data['nguoidung']['avatars']
                    );
                    $this->session->set_userdata($userlogin);                 
                    header('location: http://localhost:8080/telesale/');
                }
            }
        }else{
            $data['title'] = 'Sign Up';
            $this->load->view('admin/page_signup', $data);
            
        }
    }

    public function editUser($id){
        $data['title'] = 'Edit Users';
        $data['user'] = $this->UsersAdmin_model->layID($id);
        $this->load->view('editProduct_view', $data);
    }
}