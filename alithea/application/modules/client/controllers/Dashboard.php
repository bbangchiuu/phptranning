<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('client/Product_model');
    }

    function test(){
        session_destroy();
    }

    function remove_order(){
        if(isset($_SESSION['products_order']) && isset($_GET['remove_item'])){

            $pro_id = $_GET['remove_item'];//lấy id sản phẩm

            $_SESSION['qty_order'] = 0;
            $_SESSION['total_price'] = 0;

            foreach ($_SESSION['products_order'] as $cart_itm)
            {
                if($cart_itm['pro_id'] != $pro_id){ //Lọc lại giỏ hàng, sản phẩm nào trùng product_id muốn xóa sẽ bị loại bỏ
                    $product[] = array(
                        'pro_id' => $pro_id,
                        'pro_name' => $cart_itm['pro_name'],
                        'pro_quantity' => $cart_itm['pro_quantity'],
                        'img_thumbnail' => $cart_itm['img_thumbnail'],
                        'pro_price' => $cart_itm['pro_price']
                    );

                    $_SESSION['total_price'] += $cart_itm['pro_price'] * $cart_itm['pro_quantity'];
                    $_SESSION['qty_order'] += $cart_itm['pro_quantity'];
                }
            }
            $_SESSION['products_order'] = $product;            
        }

        redirect(site_url('shopping-cart'));
    }

    function cart_update($pro_id, $pro_quantity = NULL){
        $sp_order = $this->Product_model->pro_detail($pro_id);
        

        if($pro_quantity != NULL){
            $pro_qty = $pro_quantity;
        }else{
            $pro_qty = $_POST['qty_inputs'];
        }
        //print_r($pro_qty);die;
        $new_product = array(
            array(
                'pro_id' => $pro_id,
                'pro_name' => $sp_order['pro_name'],
                'pro_quantity' => $pro_qty,
                'img_thumbnail' => $sp_order['img_thumbnail'],
                'pro_price' => $sp_order['pro_price']
            )
        );

        if(isset($_SESSION['products_order'])){

            $found = false; //Thiết lập mặc định ban đầu biến kiểm tra sản phẩm tồn tại thành false
            //print_r($pro_qty);die;
            foreach ($_SESSION['products_order'] as $cart_itm)
            {
                
                if($cart_itm['pro_id'] == $pro_id){ //sản phẩm đã tồn tại trong mảng
                    $product[] = array(
                        'pro_name' => $cart_itm['pro_name'], 
                        'pro_id' => $cart_itm['pro_id'], 
                        'pro_quantity' => $pro_qty, 
                        'pro_price' => $cart_itm['pro_price'],
                        'img_thumbnail' => $cart_itm['img_thumbnail'],
                    );
                    $found = true; // Thiết lập biến kiểm tra sản phẩm tồn tại thành true
                    //print_r($pro_qty);die;
                    //print_r($product);die;
                }else{
                    //item doesn't exist in the list, just retrive old info and prepare array for session var
                    $product[] = array(
                        'pro_name' => $cart_itm['pro_name'], 
                        'pro_id' => $cart_itm['pro_id'], 
                        'pro_quantity' => $cart_itm['pro_quantity'], 
                        'pro_price' => $cart_itm['pro_price'],
                        'img_thumbnail' => $cart_itm['img_thumbnail'],
                    );
                }
            }
            
            //print_r($_SESSION['products_order']);die;
            if($found == false) //Không tìm thấy sản phẩm trong giỏ hàng
            {
                //Thêm mới sản phẩm vào mảng
                $_SESSION['products_order'] = array_merge($product, $new_product);
            }else{
                //Tìm thấy sản phẩm đã có trong mảng SESSION nên chỉ cập nhật lại số lượng(QTY)
                $_SESSION['products_order'] = $product;    
            }
            
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
        
    }

    function shopping_cart(){
        if(isset($_POST['dathang'])){
            for($i = 0; $i < count($_POST['pro_ids']); $i++ ){
                $this->cart_update($_POST['pro_ids'][$i], $_POST['pro_qty'][$i]);            
            };   
            //print_r($product);die; 
            redirect(site_url('thong-tin-khach-hang'));      
        }
        $data['title'] = "Shopping cart";
        $this->load->view("client/shopping-cart", $data);
    }

    function thong_tin_khach_hang(){
        if(isset($_SESSION['products_order'])){
            if(isset($_POST['submitttkh'])){
                $_SESSION['customer'] = array(
                    'cus_name' => $_POST['fullname'],
                    'cus_email' => $_POST['email'],
                    'cus_address' => $_POST['address'],
                    'cus_phone' => $_POST['phone'],
                );
                redirect(site_url('xac-nhan-don-hang')); 
            }
            $data['title'] = "Thông tin khách hàng";
            $this->load->view("client/thong-tin-khach-hang", $data);
        }else{
            redirect(site_url('shopping-cart'));
        }
        
    }

    function xac_nhan_don_hang(){
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
                    'priceEach' => $cart_itm['pro_price']
                );
                
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
        
        $data['title'] = "Detail Product";
          
        $data['pro_detail'] = $this->Product_model->pro_detail($pro_id);
        if(isset($_POST['add_to_cart'])){
           $this->cart_update($pro_id);
        }
        $data['img_detail'] = $this->Product_model->get_img($pro_id);

        $this->load->view("client/product-detail", $data);
    }
}