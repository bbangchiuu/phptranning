<?php

class MY_Controller extends MX_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('url');
    }
}