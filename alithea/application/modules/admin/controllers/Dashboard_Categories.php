<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Categories extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Categories_model');

    }

    function checkAdmin(){
        if($_SESSION['userlogin']['quyenAdmin'] != '1'){    
            redirect(site_url(''));
        }
    }

    function list_categories(){
        $this->checkAdmin();
        if(isset($_GET["trang"]) ) 
        {  
            $start_index = $_GET["trang"] * 3 - 3 ;       
        }else{
            $start_index = 0;  
        }

        $limit_per_page = 3; //số bản ghi trên 1 trang
        
        $this->config->load('pagination', TRUE);
        $config = $this->config->item('case1', 'pagination_conf');

        $config['base_url'] = base_url('admin/list-categories'); //Đường dẫn của từng đoạn phân trang
        $config['total_rows'] = $this->Categories_model->get_total(); //tổng số bản ghi
        //$config['uri_segment'] = 2; //thực hiện việc lấy tham số trên đường dẫn url       

        $config['use_page_numbers'] = TRUE;//su dung nut link dung voi url
        
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'trang';

        $this->pagination->initialize($config); //khởi tạo phân trang
        $pagination = $this->pagination->create_links(); //sinh ra các nút phân trang
        $data['pagination'] = $pagination;

        if($this->Categories_model->list_pag_cat($limit_per_page, $start_index) === FALSE){
            $data['error_pro'] = "products not found";
        }else{
            $data['list_cat'] = $this->Categories_model->list_pag_cat($limit_per_page, $start_index);
        }

        $data['title'] ='List categories';
        
        $this->load->view('admin/list-categories', $data);
    }

    function detele_cat($cat_id){
        $this->checkAdmin();
        if($this->Categories_model->delete($cat_id)){
            redirect(site_url('admin/list-categories'));
        }else{
            echo "Fail delete";
        }
    }

    function add_new_cat(){
        $this->checkAdmin();
        if(isset($_POST['add_cat'])){
            $data['error'] = $this->upload_data_cat(1);
        }
        
        
        $data['title'] ='Add new category';
            
        $this->load->view('admin/add-new-cat', $data);     
    }

    function edit_cat($cat_id){
        $this->checkAdmin();
        if(isset($_POST['save_change'])){
            $data['error'] = $this->upload_data_cat(2, $cat_id);
        }

        $data['title'] ='Edit Category';
        $data['cat_detail'] = $this->Categories_model->get_cat($cat_id);
        //print_r($data['cat_detail']);die;
        $this->load->view('admin/edit-cat', $data);
    }

    function upload_data_cat($method, $cat_id = NULL){
        
        if (!empty($_FILES['cat_img']['name']) || $method != 1 ) {//kiểm tra xem file có đc chọn ko

            $config['upload_path'] = 'public/imageproducts/'; //đường dẫn để upload file vào
            $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif'; //file đc chọn
            $config['file_name'] = $_FILES['cat_img']['name'];
    
            $this->load->library('upload', $config); // tải thư viện
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('cat_img')){
                $uploadData = $this->upload->data();
                $cat_img = $uploadData['file_name'];
            }else if($method != 1){
                
            }
            else{
                echo "file bi loi"; die;
            }
            
            if($method == 1){
                $cat_name = $this->input->post('cat_name');
                
            }else{
                $cat_name = $this->input->post('cat_name_new');
            }
            
            $sqltrung = $this->Categories_model->kr_cat_name($cat_name);

            //var_dump($sqltrung);die;
            if($sqltrung != NULL){
                $data['error'] = 'Tên này đã tồn tại';
                return $data['error'];
            }else{
                if($method != 1 && $this->input->post('cat_name_new') == ""){
                    $cat_name = $this->input->post('cat_name');
                }

                if(!empty($_FILES['cat_img']['name']) || $method == 1 ){
                    $new_cat = array(
                        'cat_name' => $cat_name,                
                        'cat_img' => $cat_img,
                        'cat_desc' => $_POST['cat_desc'],
                    );
                }else{
                    $new_cat = array(
                        'cat_name' => $cat_name,
                        'cat_desc' => $_POST['cat_desc'],
                    );
                }
                
                
                if($method == 1){
                    if($this->Categories_model->insert_cat($new_cat) == FALSE){
                        echo "that bai";die;
                    }
                }else{
                    if($this->Categories_model->update_cat($cat_id, $new_cat) == FALSE){
                        echo "that bai";die;
                    }
                }                                    

                redirect(site_url('admin/list-categories'));
            }
           
        }           
    }
}