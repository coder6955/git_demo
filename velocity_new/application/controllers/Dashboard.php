<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() { 
         parent::__construct(); 
         $this->load->model('menus');
		 
		 if (!$this->session->userdata('admin_id')) 
		{
			redirect('login');
		}
	}
	
	
	public function index()
	{
		if ($this->session->userdata('admin_id') != '') {
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			$this->load->view('dashboard');
			$this->load->view('footer');
			
		}
		else
		{
			redirect('login');
		}
	}
}
