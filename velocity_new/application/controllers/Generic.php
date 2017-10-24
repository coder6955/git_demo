<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generic extends CI_Controller {
	
	public function __construct() { 
		
	 	parent::__construct();
   		$this->load->model( array('generic_model', 'menus') );
   		$this->load->helper(array('form','my_helper'));
		if (	empty($this->session->userdata('admin_id'))	) 
		{
			redirect('login');
		}
		$this->user_id = $this->session->userdata('admin_id');
		$this->user_email_id = $this->session->userdata('email_id');
	}

	public function index($id)
	{
		$router = array( "1" => "container" );
		$this->generic_model->select_list($router[$id]);
	}
}