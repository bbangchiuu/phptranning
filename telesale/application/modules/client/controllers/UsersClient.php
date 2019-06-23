
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersClient extends MY_Controller{
    
    public function __construct(){
        parent:: __construct();
        $this->load->model('admin/ProjectsAdmin_model');
        $this->load->model('client/Baiviet_model');
        $this->load->model('client/UsersClient_model');
        $this->load->model('admin/UsersAdmin_model');
      
    }

    public function checksession(){
        if(!$this->session->has_userdata('userEmail')){
            redirect(site_url('page_signin.html'));
        }
        
    }

    public function changeroute(){
        
        redirect(site_url('home'));
 
    }

    public function index(){        

        if(isset($_GET["trang"]) ) 
        {  
            $start_index = $_GET["trang"] * 3 - 3 ;       
        }else{
            $start_index = 0;  
        }

        $limit_per_page = 3; 
        
        $this->config->load('pagination', TRUE);
        $config = $this->config->item('case1', 'pagination_conf');

        $config['base_url'] = base_url('home'); //Đường dẫn của từng đoạn phân trang
        $config['total_rows'] = $this->Baiviet_model->get_total(); //tổng số bản ghi
        $config['uri_segment'] = 1; //thực hiện việc lấy tham số trên đường dẫn url       

        $config['use_page_numbers'] = TRUE;//su dung nut link dung voi url

        
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'trang';

        $this->pagination->initialize($config); //khởi tạo phân trang
        $pagination = $this->pagination->create_links(); //sinh ra các nút phân trang
        $data['pagination'] = $pagination;

        if($this->Baiviet_model->listBaiviet($limit_per_page, $start_index) === FALSE){

        }else{
            $data['baiviet'] = $this->Baiviet_model->listBaiviet($limit_per_page, $start_index);
        }
        
        //$data['baiviet'] = $this->Baiviet_model->listBaiviet();

        $data['category'] = $this->Baiviet_model->listCategory();
        $this->load->view('client/page_post', $data);
    }

    public function editUser(){
        $this->checksession();
        if($this->input->post('updateUser')){

            if (!empty($_FILES['avatars']['name'])) {//kiểm tra xem file có đc chọn ko

                $config['upload_path'] = 'img/'; //đường dẫn để upload file vào
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; //file đc chọn
                $config['file_name'] = $_FILES['avatars']['name'];
        
                $this->load->library('upload', $config); // tải thư viện
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('avatars')){
                    $uploadData = $this->upload->data();
                    $avatars = $uploadData['file_name'];
                }else{
                    echo "file bi loi"; die;
                }

                $updateUser = array(
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                    'gender' => $this->input->post('gender'),
                    'avatars' => $avatars
                );

                $this->UsersClient_model->editUser($this->session->userdata('id') ,$updateUser);

                $userlogin = array(
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                    'gender' => $this->input->post('gender'),
                    'avatars' => $avatars
                );

                $this->session->set_userdata($userlogin);
               
            }else{
            
                $updateUser = array(
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                    'gender' => $this->input->post('gender')
                );
                $this->UsersClient_model->editUser($this->session->userdata('id') ,$updateUser);

                $userlogin = array(
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                    'gender' => $this->input->post('gender'),
                );

                $this->session->set_userdata($userlogin);
            }

            $data['thanhcong'] = 'Success';
            //header("location: http://localhost/telesale/editUser.html");
        }

        $data['nguoidung'] = $this->UsersClient_model->getUser($this->session->userdata('id'));
        $this->load->view('client/editUser', $data);
        
    }

    public function detailBaiviet($idBaiviet){
        if($this->input->post('submitCommnet')){
            $Comment = $this->input->post('Comment');
            $userID = $this->session->userdata('id');
            $userName = $this->session->userdata('userName');
            $userEmail = $this->session->userdata('userEmail');
            $avatars = $this->session->userdata('avatars');
            $this->Baiviet_model->insetCommnet($Comment, $userID, $userName, $userEmail, $avatars, $idBaiviet);

        }
        $data['detailBaiviet'] = $this->Baiviet_model->layBaiviet($idBaiviet);

        $data['listBaiviet'] = $this->Baiviet_model->categoryChung($data['detailBaiviet']['idCategory']);

        $data['commentBaiviet'] = $this->Baiviet_model->commentBaiviet($idBaiviet);

        $data['category'] = $this->Baiviet_model->listCategory();

        $this->load->view('client/detailBaiviet', $data);
    }

    public function baivietCategory($idCategory){
        $data['category'] = $this->Baiviet_model->listCategory();
        $data['baiviet'] = $this->Baiviet_model->categoryChung($idCategory);
        $this->load->view('client/baivietCategory', $data);
    }

    public function page_signup(){
        
        if($this->input->post('signupUser')){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $newUser = array(
                'name' => $username,
                'email' => $email,
                'password' => $password,
                'avatars' => 'usernull.jpg',
                'quyenAdmin' => '0'
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
            $this->load->view('client/page_signup', $data);
            
        }
    }

    public function page_signin(){
        
        if($this->input->post('loginUserAdmin')){
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $login = $this->UsersAdmin_model->getlogin($email, $password);
            
            if($login->num_rows() === 1){ 
                $data['nguoidung'] = $this->UsersAdmin_model->getlogin($email, $password)->row_array();        
                $userlogin = array(
                    'id' => $data['nguoidung']['userID'],
                    'userEmail' => $data['nguoidung']['email'],
                    'userName' => $data['nguoidung']['name'],
                    'avatars' => $data['nguoidung']['avatars'],
                    'quyenAdmin' => $data['nguoidung']['quyenAdmin']
                );
                $this->session->set_userdata($userlogin);
                if($data['nguoidung']['quyenAdmin'] == '0'){
                    header('location: http://localhost:8080/telesale/');
                }else{
                    redirect(site_url('index.html')); 
                }
                                            
            }else{
                $data['title'] = 'dang nhap';
                $data['error'] = '<div style="color: red;">Email hoặc mật khẩu không đúng</div>';
                $this->load->view('client/page_signin', $data);
            }
        }else{
            
            $data['title'] = 'Login';
            $this->load->view('client/page_signin', $data);
        }       
    }
}