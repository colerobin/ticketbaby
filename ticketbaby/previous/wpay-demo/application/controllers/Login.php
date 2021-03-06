<?php
class Login extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('admin_model2');
                $this->load->library("adminauthex2");
        }

        public function index()
		{		
			$admin_session = $this->session->userdata('admin_session');

			if( isset($admin_session) && !empty($admin_session) )	{ 
				$admin_session = $this->session->userdata('admin_session');	

				if( isset($admin_session) && !empty($admin_session) )	{ 

					$data['title']    = 'Dashboard';
			        $data['username'] = $admin_session['username'];

			        $this->load->view('templates/header', $data);
			        $this->load->view('music/Welcome-login', $data);
			        $this->load->view('templates/footer');
				} else {
					redirect('music', 'music/Login');
				}	
			} else {

				$this->load->helper(array('form'));

				//This method will have the credentials validation
				$this->load->library('form_validation');
						
				$this->form_validation->set_rules('username', 'User Name', 'trim|required');
				$this->form_validation->set_rules('passwords', 'Passwords', 'trim|required|callback_check_database');

				$data['title'] = 'Ticket Baby - Administrator Panel Login';

				if ($this->form_validation->run() === FALSE) {
					 //Field validation failed.  User redirected to login page
					$this->load->view('music/Login', $data);
				} else {
					redirect('music/', 'music/Login');
				}
			}	
		}

		public function check_database($passwords)
		{
			//Field validation succeeded.  Validate against database
			$username = $this->input->post('username');

			if ( $this->adminauthex->login($username, $passwords) ) {
				//
			}else{
				$this->form_validation->set_message('check_database', 'Invalid username or password');
			}
		}

}