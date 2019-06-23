<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/EmployeeAdmin_model');
        $this->load->model('admin/ProjectsAdmin_model');
    }

    public function checksession(){
        if(!$this->session->has_userdata('userEmail')){
            redirect(site_url('page_signin.html'));
        }
        // if($this->session->userdata('quyenAdmin') != 1){
        //     redirect(site_url('page_signin.html'));
        // }
    }

    public function index(){
        $this->checksession();
        $this->load->view('admin/index');
    }

    public function dashboards(){
        $this->checksession();
        $this->load->view('admin/dashboards');
    }

    public function mails(){
        $this->checksession();
        $this->load->view('admin/mails');
    }

    //Layout
    public function layout_app(){
        $this->checksession();
        $this->load->view('admin/layout_app');
    }

    public function layout_fullwidth(){
        $this->checksession();
        $this->load->view('admin/layout_fullwidth');
    }

    public function layout_boxed(){
        $this->checksession();
        $this->load->view('admin/layout_boxed');
    }

    //UI Kits
    public function ui_button(){
        $this->checksession();
        $this->load->view('admin/ui_button');
    }

    public function ui_icon(){
        $this->checksession();
        $this->load->view('admin/ui_icon');
    }

    public function ui_grid(){
        $this->checksession();
        $this->load->view('admin/ui_grid');
    }

    public function ui_widget(){
        $this->checksession();
        $this->load->view('admin/ui_widget');
    }

    public function ui_sortable(){
        $this->checksession();
        $this->load->view('admin/ui_sortable');
    }

    public function ui_portlet(){
        $this->checksession();
        $this->load->view('admin/ui_portlet');
    }

    public function ui_timeline(){
        $this->load->view('admin/ui_timeline');
    }

    public function ui_jvectormap(){
        $this->checksession();
        $this->load->view('admin/ui_jvectormap');
    }

    //Table
    public function table_static($list = NULL){
        $this->checksession();

        if($this->input->post('SearchName')){
            $nameProject = $this->input->post('nameProject');

            if($nameProject == ""){
                redirect(site_url('table_static.html'));
            }
            
            $data['ListProject'] = $this->ProjectsAdmin_model->searchProject($nameProject, $this->session->userdata('id'));
            if(count($data['ListProject']) > 0){

                $data['nameProject'] = $nameProject;
                $this->load->view('table_static',$data);
            }else{
                $data['thieu'] = 'khong co project nao';
                $this->load->view('admin/table_static',$data);
            }
        }else if($this->input->post('newProjecOfUser')){

            $NewNameProject = $this->input->post('NewNameProject');
            $newTask = $this->input->post('newTask');
      
            if($NewNameProject == "" && $newTask == ""){
                redirect(site_url('table_static.html'));
            }
            $this->ProjectsAdmin_model->addProject($NewNameProject, $newTask, $this->session->userdata('id'));
            redirect(site_url('table_static.html'));
        }else if($this->input->post('deleteCheckbox')){
            $checkboxMang = $this->input->post('post[]');
            for($i = 0; $i < count($checkboxMang); $i++){
                //echo($checkboxMang[$i])."<br>";
                $this->ProjectsAdmin_model->deleteProject($checkboxMang[$i]);
            }
            redirect(site_url('table_static.html'));
        }else{
            $limit_per_page = 3; 
            if($list == NULL ){
                $start_index = 0;
            }else{
                $start_index = $list * 3 - 3 ;
            }
            
            $this->config->load('pagination', TRUE);
            $config = $this->config->item('case2', 'pagination_conf');

            $config['base_url'] = base_url('table_static.html'); //Đường dẫn của từng đoạn phân trang
            $config['total_rows'] = $this->ProjectsAdmin_model->get_total_user($this->session->userdata('id')); //tổng số bản ghi
            $config['use_page_numbers'] = TRUE;

            $this->pagination->initialize($config); //khởi tạo phân trang
            $pagination = $this->pagination->create_links(); //sinh ra các nút phân trang
            $data['pagination'] = $pagination;

            
            if($this->ProjectsAdmin_model->ListProjects($limit_per_page, $start_index, $this->session->userdata('id')) === FALSE){
                $data['thieu'] = '<p class="danghoatdong">Not Project</p>';
            }else{
                $data['ListProject'] = $this->ProjectsAdmin_model->ListProjects($limit_per_page, $start_index, $this->session->userdata('id'));
            }
            
    
            $this->load->view('admin/table_static',$data);
        }
    }

    public function table_datatable(){
        $this->checksession();
        $this->load->view('admin/table_datatable');
    }

    public function table_footable(){
        $this->checksession();
        $data['ListEmployee'] =  $this->EmployeeAdmin_model->ListEmployee();
        $this->load->view('admin/table_footable',$data);
    }

    //Form
    public function form_element(){
        $this->checksession();
        $this->load->model('client/Baiviet_model');
        if($this->input->post('newBaiviet')){

            if (!empty($_FILES['anhBaiviet']['name'])) {//kiểm tra xem file có đc chọn ko

                $config['upload_path'] = 'img/'; //đường dẫn để upload file vào
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; //file đc chọn
                $config['file_name'] = $_FILES['anhBaiviet']['name'];
        
                $this->load->library('upload', $config); // tải thư viện
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('anhBaiviet')){
                    $uploadData = $this->upload->data();
                    $anhBaiviet = $uploadData['file_name'];
                }else{
                    echo "file bi loi"; die;
                }
                //print_r($anhBaiviet);die;
                $newBaiviet = array(
                    'tieude' => $this->input->post('tieude'),
                    'conntent' => $this->input->post('conntent'),
                    'tieude2' => $this->input->post('tieude2'),
                    'conntent2' => $this->input->post('conntent2'),
                    'ngaytao' => date('Y-m-d H:i:s'),
                    'userID' => $this->session->userdata('id'),
                    'anhBaiviet' => $anhBaiviet,
                    'idCategory' => $this->input->post('category')
                );
                $this->Baiviet_model->insert_baiviet($newBaiviet);
               
            }else{
            
                $newBaiviet = array(
                    'tieude' => $this->input->post('tieude'),
                    'conntent' => $this->input->post('conntent'),
                    'tieude2' => $this->input->post('tieude2'),
                    'conntent2' => $this->input->post('conntent2'),
                    'ngaytao' => date('Y-m-d H:i:s'),
                    'userID' => $this->session->userdata('id'),
                    'idCategory' => $this->input->post('category')
                );
                $this->Baiviet_model->insert_baiviet($newBaiviet);
            }

            header('location: http://localhost:8080/telesale/page_post.html');
        }else{
            $data['listCategory'] = $this->Baiviet_model->listCategory();
            $this->load->view('admin/form_element', $data);
        }
            
    }

    //Chart
    public function ui_chart(){
        $this->checksession();
        $this->load->view('admin/ui_chart');
    }

    //Pages
    public function page_profile(){
        $this->checksession();
        $this->load->view('admin/page_profile');
    }

    public function page_post($list = NULL){
        $this->checksession();
        $this->load->model('client/Baiviet_model');
        if($this->input->post('SearchName')){
            $nameProject = $this->input->post('nameProject');

            if($nameProject == ""){
                redirect(site_url('page_post.html'));
            }
            
            $data['baiviet'] = $this->Baiviet_model->searchBaiviet($nameProject);
            if(count($data['baiviet']) > 0){

                $data['nameProject'] = $nameProject;
                $this->load->view('page_post',$data);
            }else{
                $data['thieu'] = 'khong co bai viet nao nao';
                $this->load->view('admin/page_post',$data);
            }
        }else{
            $limit_per_page = 3; 
            if($list == NULL ){
                $start_index = 0;
            }else{
                $start_index = $list * 3 - 3 ;
            }

            $this->config->load('pagination', TRUE);
            $config = $this->config->item('case2', 'pagination_conf');

            $config['base_url'] = base_url('page_post.html'); //Đường dẫn của từng đoạn phân trang
            $config['total_rows'] = $this->Baiviet_model->get_total(); //tổng số bản ghi           
            $config['use_page_numbers'] = TRUE;
            
            $this->pagination->initialize($config); //khởi tạo phân trang
            $pagination = $this->pagination->create_links(); //sinh ra các nút phân trang
            $data['pagination'] = $pagination;

            if($this->Baiviet_model->listBaiviet($limit_per_page, $start_index) === FALSE){

            }else{
                $data['baiviet'] = $this->Baiviet_model->listBaiviet($limit_per_page, $start_index);
            }

            $data['commnetbaiveit'] = $this->ProjectsAdmin_model->commnetbaiveit();
            $this->load->view('admin/page_post', $data);
        }       
    }

    public function page_search(){
        $this->checksession();
        $this->load->view('admin/page_search');
    }

    public function page_invoice(){
        $this->checksession();
        $this->load->view('admin/page_invoice');
    }

    public function page_price(){
        $this->checksession();
        $this->load->view('admin/page_price');
    }

    public function page_lockme(){
        $this->checksession();
        $this->load->view('admin/page_lockme');
    }

    // public function page_signin(){
    //     $this->load->view('page_signin');
    // }

    // public function page_signup(){
    //     $this->load->view('page_signup');
    // }

    public function page_forgotpwd(){
        $this->checksession();
        $this->load->view('admin/page_forgotpwd');
    }

    public function page_404(){
        $this->load->view('admin/page_404');
    }

    public function editBaiviet($idBaiviet){
        $this->load->model('client/Baiviet_model');
        if($this->input->post('editBaiviet')){
            if (!empty($_FILES['anhBaiviet']['name'])) {//kiểm tra xem file có đc chọn ko

                $config['upload_path'] = 'img/'; //đường dẫn để upload file vào
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; //file đc chọn
                $config['file_name'] = $_FILES['anhBaiviet']['name'];
        
                $this->load->library('upload', $config); // tải thư viện
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('anhBaiviet')){
                    $uploadData = $this->upload->data();
                    $anhBaiviet = $uploadData['file_name'];
                }else{
                    echo "file bi loi"; die;
                }

                
                $editBaiviet = array(
                    'tieude' => $this->input->post('tieude'),
                    'conntent' => $this->input->post('conntent'),
                    'tieude2' => $this->input->post('tieude2'),
                    'conntent2' => $this->input->post('conntent2'),
                    'ngaytao' => date("Y-m-d"),
                    'userID' => $this->session->userdata('id'),
                    'anhBaiviet' => $anhBaiviet,
                    'idCategory' => $this->input->post('category')
                );
                $this->Baiviet_model->edit_baiviet($idBaiviet, $editBaiviet);
               
            }else{
            
                $editBaiviet = array(
                    'tieude' => $this->input->post('tieude'),
                    'conntent' => $this->input->post('conntent'),
                    'tieude2' => $this->input->post('tieude2'),
                    'conntent2' => $this->input->post('conntent2'),
                    'ngaytao' => date("Y-m-d"),
                    'userID' => $this->session->userdata('id'),
                    'idCategory' => $this->input->post('category')
                );
                $this->Baiviet_model->edit_baiviet($idBaiviet, $editBaiviet);
            }

            header('location: http://localhost:8080/telesale/page_post.html');
        }else{
            $data['listCategory'] = $this->Baiviet_model->listCategory();
            $data['layBaiviet'] = $this->Baiviet_model->layBaiviet($idBaiviet);     
            $this->load->view('admin/editBaiviet', $data);
        }
    }

    public function xoaBaiviet($idBaiviet){
        $this->load->model('client/Baiviet_model');
        $this->Baiviet_model->xoaBaiviet($idBaiviet);
        header('location: http://localhost:8080/telesale/page_post.html');
    }
}