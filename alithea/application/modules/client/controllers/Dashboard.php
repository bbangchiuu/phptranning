<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('client/Product_model');
    }

    function test(){
        unset($_SESSION['cus_commnet']);
    }

    function taoCusComment(){
        $data = array(
            'email' => $_POST['email'],
            'fullname' => $_POST['fullname'],
            'telephone' => $_POST['telephone'],
        );

        $_SESSION['cus_commnet'] = $data;

        $result = json_encode($data);

        echo $result;
    }

    function submitComment(){
        $this->load->model('client/listcomment_model');
        $data = array(
            'pro_id' => $_GET['pro_id'],
            'email' => $_POST['email'],
            'fullname' => $_POST['fullname'],
            'telephone' => $_POST['telephone'],
            'conntent_comment' => $_POST['conntent_comment'],
            'uploaded_on' => date('Y-m-d H:i:s')
        );

        $this->listcomment_model->insert_Comment($data);
        
        $result = json_encode($data);

        echo $result;
    }

    function change_qty(){
        if(isset($_POST['qty_pro_order'])){
            $qty_pro_order = $_POST['qty_pro_order'];
            $id_pro_change_qty = $_GET['order_pro_id'];
            $_SESSION['products_order'][$id_pro_change_qty]['pro_quantity'] = $qty_pro_order;

            $_SESSION['qty_order'] = 0;
            $_SESSION['total_price'] = 0;
            foreach ($_SESSION['products_order'] as $cart_itm)
            {
                $_SESSION['total_price'] += $cart_itm['pro_price'] * $cart_itm['pro_quantity'];
                $_SESSION['qty_order'] += $cart_itm['pro_quantity'];
            }

        }else{
            $qty_pro_order = "khong co";
        }

        $data = array(
            "total_price" => $_SESSION['total_price'],
            "qty_order" => $_SESSION['qty_order']
        );

        $result = json_encode($data);
        echo $result;
    }

    function change_color(){
        if(isset($_POST['color_pro_change'])){
            $color_pro_change = $_POST['color_pro_change'];
            $id_pro_change_color = $_GET['order_pro_id'];
            $_SESSION['products_order'][$id_pro_change_color]['color_pro'] = $color_pro_change;
        }else{
            $color_pro_change = "khong co";
        }

        echo $color_pro_change;
    }

    function remove_order(){
        if(isset($_SESSION['products_order']) && isset($_GET['order_pro_id_xoa'])){

            $order_pro_id_xoa = $_GET['order_pro_id_xoa'];//lấy id sản phẩm
            //var_dump($pro_id);var_dump($color_pro);die;
            $_SESSION['qty_order'] = 0;
            $_SESSION['total_price'] = 0;
            $order_pro_id = 0;

            foreach ($_SESSION['products_order'] as $cart_itm)
            {
                if($cart_itm['order_pro_id'] == $order_pro_id_xoa){ //Lọc lại giỏ hàng, sản phẩm nào trùng product_id muốn xóa sẽ bị loại bỏ
                    
                }else{
                    $product[] = array(
                        'order_pro_id' => $order_pro_id,
                        'pro_id' => $cart_itm['pro_id'],
                        'pro_name' => $cart_itm['pro_name'],
                        'pro_quantity' => $cart_itm['pro_quantity'],
                        'img_thumbnail' => $cart_itm['img_thumbnail'],
                        'pro_price' => $cart_itm['pro_price'],
                        'color_pro' => $cart_itm['color_pro']
                    );
                    $order_pro_id++;
                    $_SESSION['total_price'] += $cart_itm['pro_price'] * $cart_itm['pro_quantity'];
                    $_SESSION['qty_order'] += $cart_itm['pro_quantity'];
                }
            }
            $_SESSION['products_order'] = $product;            
        }
        //var_dump($_SESSION['products_order']);die;
        redirect(site_url('shopping-cart'));
    }

    function cart_update($order_pro_id ,$pro_quantity){
        //$sp_order = $this->Product_model->pro_detail($pro_id);       

        if(isset($_SESSION['products_order'])){

            foreach ($_SESSION['products_order'] as $cart_itm)
            {

                if($cart_itm['order_pro_id'] == $order_pro_id){ //sản phẩm đã tồn tại trong mảng
                    //var_dump($pro_quantity);die;
                        $product[] = array(
                            'order_pro_id' => $cart_itm['order_pro_id'],
                            'pro_name' => $cart_itm['pro_name'], 
                            'pro_id' => $cart_itm['pro_id'], 
                            'pro_quantity' => $pro_quantity, //cập nhật lại số lượng
                            'pro_price' => $cart_itm['pro_price'],
                            'img_thumbnail' => $cart_itm['img_thumbnail'],
                            'color_pro' => $cart_itm['color_pro']
                        );
                   
                }else{
                    //item doesn't exist in the list, just retrive old info and prepare array for session var
                    $product[] = array(
                        'order_pro_id' => $cart_itm['order_pro_id'],
                        'pro_name' => $cart_itm['pro_name'], 
                        'pro_id' => $cart_itm['pro_id'], 
                        'pro_quantity' => $cart_itm['pro_quantity'], 
                        'pro_price' => $cart_itm['pro_price'],
                        'img_thumbnail' => $cart_itm['img_thumbnail'],
                        'color_pro' => $cart_itm['color_pro']
                    );
                }
            }

            //Tìm thấy sản phẩm đã có trong mảng SESSION nên chỉ cập nhật lại số lượng(QTY)
            $_SESSION['products_order'] = $product;    
            
            
            //cập nhật lại số lượng sản phẩm và tổng số tiền đã order
            $_SESSION['qty_order'] = 0;
            $_SESSION['total_price'] = 0;
            foreach ($_SESSION['products_order'] as $cart_itm)
            {
                $_SESSION['total_price'] += $cart_itm['pro_price'] * $cart_itm['pro_quantity'];
                $_SESSION['qty_order'] += $cart_itm['pro_quantity'];
            }

        }
        
    }

    function cart_add($pro_id, $color_pro, $pro_qty){
        $sp_order = $this->Product_model->pro_detail($pro_id);     

        $order_pro_id = 0;

        $new_product = array(
            array(
                'order_pro_id' => $order_pro_id,
                'pro_id' => $pro_id,
                'pro_name' => $sp_order['pro_name'],
                'pro_quantity' => $pro_qty,
                'img_thumbnail' => $sp_order['img_thumbnail'],
                'pro_price' => $sp_order['pro_price'],
                'color_pro' => $color_pro
            )
        );

        if(isset($_SESSION['products_order'])){

            foreach ($_SESSION['products_order'] as $cart_itm)
            {                         
                //TẢI LẠI DANH SÁCH SẢN PHẨM ĐÃ CÓ
                $order_pro_id++;
                if($cart_itm['pro_id'] == $pro_id && $cart_itm['color_pro'] == $color_pro){

                }else{
                    $product[] = array(
                        'order_pro_id' => $order_pro_id,
                        'pro_name' => $cart_itm['pro_name'], 
                        'pro_id' => $cart_itm['pro_id'], 
                        'pro_quantity' => $cart_itm['pro_quantity'], 
                        'pro_price' => $cart_itm['pro_price'],
                        'img_thumbnail' => $cart_itm['img_thumbnail'],
                        'color_pro' => $cart_itm['color_pro']
                    );
                }
            }

            //Thêm mới sản phẩm vào mảng
            $_SESSION['products_order'] = array_merge($new_product, $product);
            
            //cập nhật lại số lượng sản phẩm và tổng số tiền đã order
            $_SESSION['qty_order'] = 0;
            $_SESSION['total_price'] = 0;
            foreach ($_SESSION['products_order'] as $cart_itm)
            {
                $_SESSION['total_price'] += $cart_itm['pro_price'] * $cart_itm['pro_quantity'];
                $_SESSION['qty_order'] += $cart_itm['pro_quantity'];
            }

        }else{
            $_SESSION['products_order'] = $new_product;

            $_SESSION['qty_order'] = 0;
            $_SESSION['total_price'] = 0;
            foreach ($_SESSION['products_order'] as $cart_itm)
            {
                $_SESSION['total_price'] += $cart_itm['pro_price'] * $cart_itm['pro_quantity'];
                $_SESSION['qty_order'] += $cart_itm['pro_quantity'];
            }
        }
        
        //var_dump($_SESSION['products_order']);die;
    }

    function shopping_cart(){
        
        if(isset($_POST['dathang'])){     
            //var_dump( $_POST );die;    
            // for($i = 0; $i < count($_POST['order_pro_id_mutli']); $i++ ){
            //     //var_dump($_POST['order_pro_id_mutli'], $_POST['pro_qty']);die;
            //     $this->cart_update($_POST['order_pro_id_mutli'][$i], $_POST['pro_qty'][$i]);            
            // };   
            //print_r($product);die; 
            redirect(site_url('thong-tin-khach-hang'));      
        }
        $data['title'] = "Shopping cart";
        $this->load->view("client/shopping-cart", $data);
    }

    function thong_tin_khach_hang(){
        if(isset($_SESSION['products_order'])){
            if(isset($_POST['submitttkh'])){             

                if($_POST['fullname'] == '' || $_POST['email'] == '' || $_POST['address'] == '' || $_POST['telephone'] == ''){
                    $data['error'] = "Bạn phải nhập đầy đủ thông tin";
                }else{
                    $_SESSION['customer'] = array(
                        'cus_name' => $_POST['fullname'],
                        'cus_email' => $_POST['email'],
                        'cus_address' => $_POST['address'],
                        'cus_phone' => $_POST['telephone'],
                    );
                    redirect(site_url('xac-nhan-don-hang'));
                }
                //var_dump($_SESSION['customer']);die;
                 
            }
            $data['title'] = "Thông tin khách hàng";
            $this->load->view("client/thong-tin-khach-hang", $data);
        }else{
            redirect(site_url('shopping-cart'));
        }
        
    }

    function xac_nhan_don_hang(){
        //var_dump($_SESSION['customer']);die;
        if(isset($_SESSION['products_order']) && isset($_SESSION['customer'])){
            if(isset($_POST['xacnhandonhang'])){
                redirect(site_url('daxacnhan'));
            }
            $data['title'] = "Xác nhận đơn hàng";
            $this->load->view("client/xac-nhan-don-hang", $data);
        }else{
            redirect(site_url('shopping-cart'));
        }
    }

    function daxacnhan(){
        if(isset($_SESSION['products_order']) && isset($_SESSION['customer'])){
            $this->load->model('client/User_client_model');

            $data_cus = array(
                'cus_name' => $_SESSION['customer']['cus_name'],
                'cus_email' => $_SESSION['customer']['cus_email'],
                'cus_address' => $_SESSION['customer']['cus_address'],
                'cus_phone' => $_SESSION['customer']['cus_phone'],
                'cus_order_time' => date('Y-m-d H:i:s')
            );
            $this->User_client_model->insert_cus($data_cus);
            $cus_id = $this->User_client_model->get_customer($data_cus);

            $data_order = array(
                'cus_id' => $cus_id['cus_id'],
                'status' => true,
                'orderDate' => date('Y-m-d H:i:s'),
                'total_price' => $_SESSION['total_price'],
                'total_quantity' => $_SESSION['qty_order']
            );
            $this->Product_model->insert_order($data_order);
            $order_id = $this->Product_model->get_order($data_order);

            $i = 0;
            // print($order_id);die;
            foreach ($_SESSION['products_order'] as $cart_itm){
                $order_detail[] = array(
                    'order_id' => $order_id['order_id'],
                    'pro_id' => $cart_itm['pro_id'],
                    'pro_quantity' => $cart_itm['pro_quantity'],
                    'priceEach' => $cart_itm['pro_price'],
                    'color_pro' => $cart_itm['color_pro']
                );
                //var_dump($cart_itm['pro_id']);die;
                $product_update = $this->Product_model->pro_detail($cart_itm['pro_id']);
                
                $product_update['pro_quantity'] = $product_update['pro_quantity'] - $cart_itm['pro_quantity'];

                $this->Product_model->edit_pro_late_order($cart_itm['pro_id'], $product_update);
            }

            
            if(!empty($order_detail)){                           
                $this->Product_model->insert_orderdetail($order_detail);
            }    
            
            unset($_SESSION['products_order']);
            unset($_SESSION['total_price']);
            unset($_SESSION['qty_order']);

            $this->session->set_flashdata('success','Đặt hàng thành công');
            redirect(site_url(''));
        }else{
            redirect(site_url('shopping-cart'));
        }
    }

    function filter_product(){
        if(isset($_POST['filter_pro'])){
            $_SESSION['filter_product_price'] = $_POST['pro_price'];
        }else{
            $_SESSION['filter_product_price'] = 0;
        }
        $data['title'] = "Filter Product";
        $data['list_cat'] = $this->Product_model->get_categories();
        $data['filter_pro'] = $this->Product_model->filter_pro($_SESSION['filter_product_price']);
        //var_dump($data['filter_pro']);die;
        $this->load->view("client/filter-product", $data);
    }

    function search_product(){
        if(isset($_POST['search_pro'])){
            if($_POST['search_pro_name'] != NULL){
                $data['title'] = "Search product";
                $data['list_cat'] = $this->Product_model->get_categories();
                $data['search_pro'] = $this->Product_model->search_product($_POST['search_pro_name']);
                $this->load->view("client/search-product", $data);
            }else{
                redirect(site_url(''));
            }       
        }else{
            redirect(site_url(''));
        }
        
    }

    function category_detail($cat_id){
        $data['title'] = "Detail Product";

        if(isset($_POST['filter_pro'])){
            $_SESSION['filter_product_price'] = $_POST['pro_price'];
            redirect(site_url('filter-product')); 
        }
        if($this->Product_model->cat_pro_detail($cat_id)){
            $data['cat_pro_detail'] = $this->Product_model->cat_pro_detail($cat_id);

        }else {
            $data['error_pro'] = "Ko co san pham nao";
        }

        $data['list_cat'] = $this->Product_model->get_categories();   
      
        $this->load->view("client/category-detail", $data);
    }

    function product_detail($pro_id){
        //lấy thông tin chi tiết của sản phảm
        $this->load->library('rest', array(  
            'server' => 'http://localhost:8080/alithea/api/',  
            'http_user' => 'admin',  
            'http_pass' => '1234',  
            'http_auth' => 'basic' // or 'digest'  
        ));
        $pro_detail = $this->rest->get("Api_products/product?pro_id=$pro_id");
        $data['pro_detail'] = (array) $pro_detail;

        //lấy sản phẩm cùng thể loại
        $cat_id = $data['pro_detail']['cat_id'];
        $sp_cung_theloai = $this->rest->get("Api_products/sp_cung_theloai?cat_id=$cat_id");
        
        foreach($sp_cung_theloai as $val){
            $data['sp_cung_theloai'][] = (array) $val;
        }
        //var_dump($data['sp_cung_theloai']);die;


        $data['title'] = "Detail Product";
        
        //$data['pro_detail'] = $this->Product_model->pro_detail($pro_id);
        //var_dump($data['pro_detail']);die;
        if(isset($_POST['add_to_cart'])){
            if(isset($_SESSION['products_order']) && count($_SESSION['products_order']) > 4){
                $this->session->set_flashdata('error_order','Giỏ hàng đã đầy');
                
            }else{
                $this->cart_add($pro_id, $_POST['color_pro'], $_POST['qty_inputs']);
            }
       
           //$this->cart_update($pro_id, $_POST['color_pro']);          
           
        }

        //lấy thêm ảnh của sp
        $data['img_detail'] = $this->Product_model->get_img($pro_id);

        //lấy thông số kĩ thuật của sản phẩm
        $data['thongsokithuat'] = $this->Product_model->thongsokithuat($pro_id);
        //$data['sp_cung_theloai'] = $this->Product_model->sp_cung_theloai($data['pro_detail']['cat_id']);
        //var_dump($data['sp_cung_theloai']);die;

        //lấy comment của sp
        $this->load->model('client/listcomment_model');
        $data['listcomment'] = $this->listcomment_model->comment_of_pro($pro_id);
      
        $this->load->view("client/product-detail", $data);
    }
}