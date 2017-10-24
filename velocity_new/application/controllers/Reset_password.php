<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {
	
	public function __construct() { 
         parent::__construct(); 
         $this->load->model('menus');
		 $this->load->model('Reset_password1','Reset_password');
		 if (!$this->session->userdata('admin_id')) 
		{
			redirect('login');
		}
	}

	public function index()
	{
		if ($this->session->userdata('admin_id') != '') {
			
			$datam['menu'] = $this -> menus->getAllMenus();
			$this->load->view('header',$datam);
			$this->load->view('reset-password');
			$this->load->view('footer');
			
		}else {
			redirect('login');
		}
	}
	
	function resetpw() {
		echo $this -> Reset_password->resetPassword($this->input->post());	
	}

	
	

}

