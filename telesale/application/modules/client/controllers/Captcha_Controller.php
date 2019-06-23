<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Captcha_Controller extends MY_Controller
{
    function __construct() {
        parent::__construct();
        
        // Load session library
        $this->load->library('session');
        $this->load->library('image_lib');
        // Load the captcha helper
        $this->load->helper('captcha');
        
    }
    
    public function index(){

        if($this->input->post('submitCaptcha')){          
            if($this->input->post('antispam') == $this->session->userdata('captchaWord')){
                echo "success";die;
            }else{
                echo "fail";die;
            }
        };

        $data['title'] = 'test';
        
        //tao captcha
        $this->load->config('captcha', TRUE);
        $captcha = $this->config->item('captcha_cus');
        
        //print_r($captcha);die;
        $data['captcha'] = create_captcha($captcha);
        
        $this->session->set_userdata('captchaWord', $data['captcha']['word']);
        
        $this->load->view('client/captcha_view', $data);
    }

    // public function testCaptcha2()
    // {
    //     /* Set form validation rules */
    //     $this->form_validation->set_rules('name', "Name", 'required');
    //     $this->form_validation->set_rules('captcha', "Captcha", 'required');
 
    //     /* Get the user's entered captcha value from the form */
    //     $userCaptcha = $this->input->post('captcha');
 
    //     /* Check if form (and captcha) passed validation*/
    //     if ($this->form_validation->run() == true && strcmp(strtolower($userCaptcha), strtolower($this->session->userdata('captchaWord'))) == 0) {
    //         /** Validation was successful; show the Success view **/
    //         /* Clear the session variable */
    //         $this->session->unset_userdata('captchaWord');
    //         /* Get the user's name from the form */
    //         $name = $this->input->post('name');
    //         /* Pass in the user input to the success view for display */
    //         $data = array('name' => $name);
    //         // do as your requirement
    //         print_r($data);exit;
    //     } else {
    //         /** Validation was not successful - Generate a captcha **/
    //         /* Setup vals to pass into the create_captcha function */
    //         $captcha = $this->_generateCaptcha();
            
    //         /* Store the captcha value (or 'word') in a session to retrieve later */
    //         $this->session->set_userdata('captchaWord', $captcha['word']);
         
    //         /* Load the captcha view containing the form (located under the 'views' folder) */
    //         $this->load->view('client/captcha_view2', $captcha);
    //     }
    // }

    // private function _generateCaptcha()
    // {
    //     $vals = array(
    //         'img_path' => './img/',
    //         'img_url' => base_url('img'),
    //         'img_width' => '150',
    //         'img_height' => 30,
    //         'expiration' => 7200,
    //     );
    //     /* Generate the captcha */
    //     return create_captcha($vals);
    // }
}