<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('url','language','form','html','security','cookie'));
        $this->load->model('login_model');
	}

	public function index()
	{   
			$data['check']	= 0;    
			$this->load->view('login',$data);
	}

	public function user_login()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');

		$data['check']	= 1;  
		if( !empty($username) AND !empty($pass) )
		{	  
			$status = $this -> login_model->authentication($username,$pass);
			if($status){
				
				$user_details = array(
										'admin_id'=>$status['contact_id'],
										'first_name'=>$status['first_name'],
										'last_name'=>$status['last_name'],
										'category_id'=>$status['category_id'],
										'email_id'=>$status['email_id']
									);

				$this->session->set_userdata($user_details);
				redirect('Enquiry','refersh');
			}
		}

		$this->load->view('login',$data);
	}


	public function logout() {
		$this->session->unset_userdata('first_name');
		$this->session->set_userdata('logged_in', FALSE);
        $this->session->sess_destroy();
	    redirect(site_url());
	}
}
