<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        $this->load->model('Facebook_model');
    }
 
    function index()
    {
        $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
        //print_r("lala");die;
        // if((!$fb_data['uid']) or (!$fb_data['me']))
        // {
        //     // If this is a protected section that needs user authentication
        //     // you can redirect the user somewhere else
        //     // or take any other action you need
        //     // redirect('login');
        //     $this->load->view('home', $data);
        // }
        // else
        // {
            $data = array(
                    'fb_data' => $fb_data,
                    );
        //print_r($fb_data);die;
            $this->load->view('home', $data);
        // }
    }
}