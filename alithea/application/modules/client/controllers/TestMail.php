<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TestMail extends MY_Controller
{
    function __construct(){
        parent::__construct();
  
    }

    function index(){
        $this->load->library('email');

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'bangchiu123456@gmail.com',
            'smtp_pass' => 'bang@123456',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'smtp_timeout' => 5,
            'wordwrap' => TRUE,
            'validate' => FALSE,
            'priority' => 3,
            'wrapchars' => 76,
        );

        
        $this->email->initialize($config);

        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        //Email content
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        $this->email->to('nguyenhaibangbkn@gmail.com');
        $this->email->from('bangchiu123456@gmail.com', 'Nguyen Hai Bang');

        //dinh kem file
        //$this->email->attach('/path/to/photo1.jpg');         

        $this->email->subject('Tiêu đề gửi mail');
        $this->email->message($htmlContent);    
       
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

    function index2(){
        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['charset']  = 'utf-8';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        
        $this->email->initialize($config);

        $this->email->to('nguyenhaibangbkn@gmail.com');
        $this->email->from('bangchiu123456@gmail.com', 'Nguyen Hai Bang');

        //dinh kem file
        //$this->email->attach('/path/to/photo1.jpg');         

        $this->email->subject('Tiêu đề gửi mail');
        $this->email->message('Nội dung gửi');   

        $this->email->print_debugger();

        if ( ! $this->email->send())
        {
            // Generate error
            echo $this->email->print_debugger();
        }else{
            echo 'Gửi email thành công';
        } 
    }
}