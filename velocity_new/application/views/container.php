<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Container extends CI_Controller {
	
	public function __construct() 
	{ 	
		parent::__construct();
		$this->load->model('menus');
		$this->load->model('container_model');
		if (!$this->session->userdata('admin_id')) 
		{
			redirect('login');
		}
	}
	
	