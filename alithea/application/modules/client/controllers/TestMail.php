<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TestMail extends MY_Controller
{
    function __construct(){
        parent::__construct();
  
    }

    function index(){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'yourusername@gmail.com',
            'smtp_pass' => 'yourmailpass',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('nguyenhaibangbkn@gmail.com', 'Nguyen Hai Bang');
        $this->email->to('bangchiu123456@gmail.com');
        
        //cau hinh nguoi nhan
         

        $this->email->subject('Tiêu đề gửi mail');
        $this->email->message('Nội dung gửi mail.');    
       
        //file dinh kem
        //$this->email->attach(base_url('public/images/nen.jpg'));

        //thuc hien gui
        if ( ! $this->email->send())
        {
            echo $this->email->print_debugger();
        }else{
            echo 'Gửi email thành công';
        }
    }
}