<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends MY_Model
{
    public function __construct(){
        parent:: __construct();    
    }

    public function list_orders(){
        $query = $this->db->query("SELECT orders.*, customers.cus_address, customers.cus_phone FROM orders INNER JOIN customers ON orders.cus_id = customers.cus_id");
        return $query->result_array();
    }

    public function delete_order($order_id){
        $timSP = array(
            'order_id' => $order_id
        );

        $this->db->where($timSP)->delete('orders');

        $query = $this->db->where($timSP)->delete('orderdetails');
        return $query;
   }

    public function orderdetail($order_id){
        $query = $this->db->query("SELECT products.img_thumbnail, orderdetails.* FROM orderdetails INNER JOIN products ON orderdetails.pro_id = products.pro_id WHERE orderdetails.order_id = $order_id");
        return $query->result_array();
    }

    public function get_order_id($cus_id){
        $query = $this->db->query("SELECT orders.order_id FROM orders WHERE cus_id = $cus_id");
        return $query->row_array();
    }
}