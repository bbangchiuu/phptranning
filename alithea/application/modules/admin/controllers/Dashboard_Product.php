<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Product extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('admin/Product_model');
        $this->load->model('admin/Categories_model');
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

    function list_product(){
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

        $config['base_url'] = base_url('admin/list-product'); //Đường dẫn của từng đoạn phân trang
        $config['total_rows'] = $this->Product_model->get_total(); //tổng số bản ghi
        //$config['uri_segment'] = 2; //thực hiện việc lấy tham số trên đường dẫn url       

        $config['use_page_numbers'] = TRUE;//su dung nut link dung voi url
        
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'trang';

        $this->pagination->initialize($config); //khởi tạo phân trang
        $pagination = $this->pagination->create_links(); //sinh ra các nút phân trang
        $data['pagination'] = $pagination;

        if($this->Product_model->list_pag_pro($limit_per_page, $start_index) === FALSE){
            $data['error_pro'] = "products not found";
        }else{
            $data['list_product'] = $this->Product_model->list_pag_pro($limit_per_page, $start_index);
        }

        $data['title'] ='List products';

        $this->load->view('admin/list-product', $data);
    }

    function deleted_pro($pro_id){
        $this->checkAdmin();
        if($this->Product_model->delete($pro_id)){
            redirect(site_url('admin/list-product'));
        }else{
            echo "Fail delete";
        }
    }

    function edit_product($pro_id){
        $this->checkAdmin();
        $data['img_detail'] = $this->Product_model->get_img($pro_id);
        
        if(isset($_POST['edit_pro'])){

            $filesCount = count($data['img_detail']);
            $img_id = array();
            for($i = 0; $i < $filesCount; $i++){
                $img_id[$i] = $data['img_detail'][$i]['img_id'];
            }


            $data['error'] = $this->upload_data_product(2, $pro_id, $img_id);
        }

        $data['thongsokithuat'] = $this->Product_model->thongsokithuat($pro_id);
        $data['title'] ='Edit products';
        $data['list_cat'] = $this->Categories_model->get_categories();
        $data['pro_detail'] = $this->Product_model->get_pro($pro_id);

        $this->load->view('admin/edit-product', $data);
    }

    function add_new_product(){
        $this->checkAdmin();
        if($this->input->post('add_product')){
            $data['error'] = $this->upload_data_product(1);// 1: add product
        }

        $data['title'] ='Add product';
        $data['list_cat'] = $this->Categories_model->get_categories();
        $this->load->view('admin/add-product', $data);
    }

    function upload_data_product($method, $pro_id = NULL, $img_id = NULL){
            $pro_status = 0;
        
            if($this->input->post('pro_quantity') != '0'){
                $pro_status = 1;
            }

            if (!empty($_FILES['img_thumbnail']['name']) || $method != 1 ) {//kiểm tra xem file có đc chọn ko

                $config['upload_path'] = 'public/imageproducts/'; //đường dẫn để upload file vào
                $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif'; //file đc chọn
                $config['file_name'] = $_FILES['img_thumbnail']['name'];
        
                $this->load->library('upload', $config); // tải thư viện
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('img_thumbnail')){
                    $uploadData = $this->upload->data();
                    $img_thumbnail = $uploadData['file_name'];
                }else if($method != 1){
                    
                }
                else{
                    echo "file bi loi"; die;
                }
                
                if($method == 1){
                    $pro_name = $this->input->post('pro_name');
                    
                }else{
                    $pro_name = $this->input->post('pro_name_new');
                }
                
                $sqltrung = $this->Product_model->kr_pr_name($pro_name);

                //var_dump($sqltrung);die;
                if($sqltrung != NULL){
                    $data['error'] = 'Tên sản phẩm này đã tồn tại';
                    return $data['error'];
                }else{
                    if($method != 1 && $this->input->post('pro_name_new') == ""){
                        $pro_name = $this->input->post('pro_name');
                    }

                    if(!empty($_FILES['img_thumbnail']['name']) || $method == 1 ){
                        $new_pro = array(
                            'pro_name' => $pro_name,
                            'pro_quantity' => $this->input->post('pro_quantity'),
                            'pro_price' => $this->input->post('pro_price'),
                            'pro_status' => $pro_status,
                            'uploaded_on' => date('Y-m-d H:i:s'),                   
                            'img_thumbnail' => $img_thumbnail,
                            'description'   => $_POST['pro_desc'],
                            'cat_id' => $this->input->post('cat_id')
                        );
                    }else{
                        $new_pro = array(
                            'pro_name' => $pro_name,
                            'pro_quantity' => $this->input->post('pro_quantity'),
                            'pro_price' => $this->input->post('pro_price'),
                            'pro_status' => $pro_status,
                            'uploaded_on' => date('Y-m-d H:i:s'),                   
                            'description'   => $_POST['pro_desc'],
                            'cat_id' => $this->input->post('cat_id')
                        );
                    }
                    
                    
                    if($method == 1){
                        if($this->Product_model->insert_pro($new_pro) == FALSE){
                            echo "that bai";die;
                        }
                        //$pro_sp = $this->Product_model->get_id($this->input->post('pro_name'));
                        $pro_sp = $this->Product_model->get_id_sp($new_pro);
                        // var_dump($new_pro);
                        // var_dump($pro_sp);die;
                    }else{
                        if($this->Product_model->update_pro($pro_id, $new_pro) == FALSE){
                            echo "that bai";die;
                        }
                    }                                    

                    if($method == 1){
                        $thongsokithuat = array(
                            'pro_id' => $pro_sp['pro_id'],
                            'screen' => $_POST['screen'],
                            'operating_system' => $_POST['operating_system'],
                            'RAM' => $_POST['RAM'],
                            'memory' => $_POST['memory'],
                            'CPU' => $_POST['CPU'],
                            'memory_stick' => $_POST['memory_stick'],
                            'SIM' => $_POST['SIM'],
                            'battery_capacity' => $_POST['battery_capacity'],
                        );
                        $this->Product_model->insert_thongsokithuat($thongsokithuat);
                    }else{
                        $thongsokithuat = array(
                            'pro_id' => $pro_id,
                            'screen' => $_POST['screen'],
                            'operating_system' => $_POST['operating_system'],
                            'RAM' => $_POST['RAM'],
                            'memory' => $_POST['memory'],
                            'CPU' => $_POST['CPU'],
                            'memory_stick' => $_POST['memory_stick'],
                            'SIM' => $_POST['SIM'],
                            'battery_capacity' => $_POST['battery_capacity'],
                        );
                        //$this->Product_model->insert_thongsokithuat($thongsokithuat);
                        $this->Product_model->update_thongsokithuat($pro_id, $thongsokithuat);
                    }
                    

                    //upload img detail
                    if(!empty($_FILES['images_detail']['name'])){
                        $filesCount = count($_FILES['images_detail']['name']);
                        for($i = 0; $i < $filesCount; $i++){
                            $_FILES['img_detail']['name']     = $_FILES['images_detail']['name'][$i];
                            $_FILES['img_detail']['type']     = $_FILES['images_detail']['type'][$i];
                            $_FILES['img_detail']['tmp_name'] = $_FILES['images_detail']['tmp_name'][$i];
                            $_FILES['img_detail']['error']     = $_FILES['images_detail']['error'][$i];
                            $_FILES['img_detail']['size']     = $_FILES['images_detail']['size'][$i];
                            
                            // File upload configuration
                            $config['upload_path'] = 'public/imageproducts/';
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            
                            // Load and initialize upload library
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            
                            // Upload file to server
                            if($this->upload->do_upload('img_detail')){
                                // Uploaded file data
                                $fileData = $this->upload->data();
                                $uploadImg_detail[$i]['image_detail'] = $fileData['file_name'];

                                if($method == 1){
                                    $uploadImg_detail[$i]['pro_id'] = $pro_sp['pro_id'];
                                }else{
                                    //update từng ảnh 1
                                    $uploadImg_detail[$i]['img_id'] = $img_id[$i];

                                    $this->Product_model->update_img($img_id[$i], $uploadImg_detail[$i]);
                                }
                                

                            }
                        }

                        if($method == 1){
                            if(!empty($uploadImg_detail)){                           
                                $this->Product_model->insert_img($uploadImg_detail);
                            }                 
                        }
                    }

                    redirect(site_url('admin/list-product'));
                }
               
            }           
    }
}