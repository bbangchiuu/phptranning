<?php

class MY_Form_validation extends CI_Form_validation{
    public $CI;
    function __construct()
    {
        parent::__construct();
    }
    
    function get_error_array()
    {
        $errors = array();

        foreach($this->_error_array as $msg) {
            if($msg) $errors[] = $msg;
        }

        return $errors;
    }

    function float_number($str){
        $CI = get_instance();
        $CI->form_validation->set_message('float_number', 'The %s field must contain a valid number');
        return (bool)preg_match('/^[-+]?[0-9]*\.?[0-9]+$/', $str);
    }

    function captcha($verify) {
        if (strtolower(trim($verify)) != strtolower($_SESSION['captcha_val'])) {
        	$CI = get_instance();
        	$CI->form_validation->set_message('captcha', 'The %s field don\'t match');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_login($pass){
    	$CI = get_instance();
		$email		= trim(strip_tags($CI->input->post('email')));
		$login_data['email']	=	$email;
		$login_data['password']	=	$pass;
		if(!login($login_data)) {
			$CI->form_validation->set_message('check_login', 'Email or Password don\'t match');
			return FALSE;
		}
		return TRUE;
    }
}