<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Orders_model');

        $this->load->library('rest', array(  
            'server' => 'http://localhost:8080/alithea/api/Api_users/',  
            'http_user' => 'admin',  
            'http_pass' => '1234',  
            'http_auth' => 'basic' // or 'digest'  
        ));  
    }

    function checkAdmin(){
        
        if($_SESSION['userlogin']['quyenAdmin'] != '1'){    
            redirect(site_url(''));
        }
    }

    function index(){
        $this->checkAdmin();
        $data['title'] ='Dashboard';
        $this->load->view('admin/admin', $data);
    }

    function register_admin(){
        $this->checkAdmin();
        $data['title'] ='Register Admin';
        if(isset($_POST['register'])){

            $kt_username = $this->Users_model->kt_username($this->input->post('username'));
            $kt_email = $this->Users_model->kt_email($this->input->post('email'));

            if($kt_email != NULL || $kt_username != NULL){
                if($kt_email != NULL){
                    $data['err_email'] = "email already exist";
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
                    'quyenAdmin' => '1'
                );

                // if($this->Users_model->insert($new_user) == FALSE){
                //     $data['err_insert'] = "Error";
                // }else{
                    
                //     redirect(site_url('admin/Dashboard'));
                // }
                
                if($this->rest->post('user_admin', $new_user) == FALSE){
                    $data['err_insert'] = "Error";
                }else{                  
                    redirect(site_url('admin/list-users'));
                };
                
            }           
        }

        $data['title'] = 'Register';
        $this->load->view('admin/register-admin', $data);
    }

    function list_users(){
        $this->checkAdmin();

        $result = $this->rest->get('users');  

        foreach($result as $val){
            $data['list_users'][] = (array) $val;
        }
        
        $data['title'] ='List users';
        //$data['list_users'] = $this->Users_model->list_users();

        $this->load->view('admin/list-users', $data);
    }
    
    function detail_user(){
        $this->checkAdmin();

        $user_id = $_GET['id'];
        //var_dump($this->rest->get('user'));die;
        $result = $this->rest->get("user?user_id=$user_id");  
        var_dump($result);
    }

    function delete_user($user_id){
        $this->checkAdmin();

        if($this->rest->delete("user/$user_id")){
            redirect(site_url('admin/list-users'));
        }
        
        print_r($this->rest->delete("user/$user_id"));       
        
    }

    function orders(){
        $this->checkAdmin();

        $data['title'] ='Manage orders';

        $data['list_orders'] = $this->Orders_model->list_orders();
        $this->load->view('admin/orders', $data);
    }

    function delete_order($order_id){
        $this->checkAdmin();

        $this->Orders_model->delete_order($order_id);
        redirect(site_url('admin/orders'));
    }

    function orderdetail($order_id){
        $this->checkAdmin();

        $data['title'] ='Manage order detail';
        $data['orderdetail'] = $this->Orders_model->orderdetail($order_id);
        //print_r($data['orderdetail']);die;
        $this->load->view('admin/orderdetail', $data);
    }

    function list_customer(){
        $this->checkAdmin();
        $data['title'] ='List Customer';
        $data['list_customer'] = $this->Users_model->list_customer();
        $this->load->view('admin/list-customer', $data);
    }

    function delete_cus($cus_id){
        $this->checkAdmin();
        $order_id = $this->Orders_model->get_order_id($cus_id);
        //var_dump($order_id);die;
        $this->Users_model->delete_cus($cus_id, $order_id['order_id']);
        redirect(site_url('admin/list-customer'));
    }
}