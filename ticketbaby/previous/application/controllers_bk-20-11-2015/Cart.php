<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				
                $this->load->model('user_details');
        }
		
		public function home(){
		
			$this->check_login();
			$sess = $this->session->userdata('user_cart');
			$ar = unserialize($sess);
			$this->load->view('templates/header', $data);
			$this->load->view('user/welcome', $data);
			$this->load->view('templates/footer', $data);
			//print_r($ar);die('test');
		}	
		
		
		// Check login
		
		public function check_login(){
			$arr_url = explode('/',uri_string());
			$exception_uris  = array('login'); 
			
			if(!(in_array('login',$arr_url))){
					if(in_array(uri_string(), $exception_uris) == FALSE) {	//die('test');
						if($this->user_details->loggedin() == FALSE)
							redirect('user/login');
					}
				}
		} 
      
}