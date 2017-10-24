<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {
	
	public function __construct()
	{ 
		
		 parent::__construct();
		 $this->load->model('menus');
		 $this->load->model('checklist_model');
		 if (!$this->session->userdata('admin_id')) 
		{
			redirect('login');
		}
	}

	public function index()
	{
		if ($this->session->userdata('admin_id') != '') 
		{
			$data['menu'] = $this -> menus->getAllMenus();
			$this->load->view('header',$data);
			$data['checklist'] = $this -> checklist_model->getchecklist();
			$data['getNum'] = $this -> checklist_model->getAllchecklistNum();
			$this->load->view('master/checklist/checklist',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	public function add()
	{
		$this -> checklist_model->save_checklist();
		redirect('checklist');
	}
	public function delete($id)
	{
		 $this -> checklist_model ->delete_checklist($id);
		 	redirect('checklist');
	}
	public function edit($id)
	{
		if ($this->session->userdata('admin_id') != '') 
		{
			$data['menu'] = $this -> menus->getAllMenus();
			$this->load->view('header',$data);
			$data['checklist'] = $this ->checklist_model ->get_checklist_data($id);
			$this->load->view('master/checklist/checklist-edit',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	public function update()
	{
		 $this -> checklist_model ->update_checklist();
		 redirect('checklist');
	}
	
	/*
	public function view()
	{
		    if ($this->session->userdata('admin_id') != '') {
				
				$client_id =  $this->uri->segment(3);
				
				$datam['menu'] = $this -> menus->getAllMenus();
				$this->load->view('header',$datam);
				
				$data['client_details'] = $this -> clients1->getClientDetail($client_id);
				
				//print_r($data['client_details']);
				$data['client_id'] = $client_id;
				$this->load->view('view-client',$data);
				$this->load->view('footer');
		}else {
			redirect('login');
		}
	}
	
	public function add()
	{
		  if ($this->session->userdata('admin_id') != '') {
				$data['back'] =  $this->uri->segment(3);
				
				$datam['menu'] = $this -> menus->getAllMenus();
				$this->load->view('header',$datam);
				
				$this->load->model('all_masters1');
				$data['maritalStatus'] = $this -> all_masters1->getMaritalStatus();
				$data['client_types']  = $this -> clients1->getclientTypes();
				
				$this->load->view('add-client',$data);
				$this->load->view('footer');
		}else {
			redirect('login');
		}
	}

	
	public function save()
	{
		$fileName1 = '';
			if(!empty($_FILES['userfile']['name'])){
			$config['upload_path'] = './uploads/client_img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = $_FILES['userfile']['name'];
			
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('userfile')){
				$uploadData = $this->upload->data();
				$data = array('upload_data' => $this->upload->data());
				$fileName1 = $data['upload_data']['file_name'];
		    }
		}
		
		$this->load->model('clients1');		
		$status = $this -> clients1 -> save_client($fileName1);
		$back = $_POST['back'];
		
		//redirect('clients/send_email/'.$status.'/'.$back);
		redirect('clients');
	}
	
	
	public function edit()
	{
		if ($this->session->userdata('admin_id') != '') {
			
			$client_id =  $this->uri->segment(3);
			
			$datam['menu'] = $this -> menus->getAllMenus();
			$this->load->view('header',$datam);
			
			$this->load->model('all_masters1');
			$data['maritalStatus'] = $this -> all_masters1->getMaritalStatus();
			$data['client_types']  = $this -> clients1->getclientTypes();
				
			$data['client_details'] = $this -> clients1->getClientDetail($client_id);
			$data['client_id'] = $client_id;
			//print_r($data['client_details']);
			$this->load->view('edit-client',$data);
			$this->load->view('footer');
		
		}else {
			redirect('login');
		}
	}
	
	public function update()
	{
		$fileName1 = '';
		if(!empty($_FILES['userfile']['name'])){
			$config['upload_path'] = './uploads/client_img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = $_FILES['userfile']['name'];
			
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('userfile')){
				$uploadData = $this->upload->data();
				$data = array('upload_data' => $this->upload->data());
				$fileName1 = $data['upload_data']['file_name'];
		    }
		}
		
		$this->load->model('clients1');		
		$status = $this -> clients1 -> update_client($fileName1);
		
		redirect('clients');
	}
	
	public function delete()
	{
		$id =  $this->input->post('id');
		$this -> clients1->deleteClient($id);
		echo "1";
	}

	public function exportToExcel()
	{
		if ($this->session->userdata('admin_id') != '') {
				$data['details'] = $this -> clients1->exportToExcel();
				$this->load->view('client-export-to-excel',$data);
		}else {
			redirect('login');
	   }
	}
	function checkEmail() {
		$id =  $this->input->post('val');
		echo $this -> clients1->checkEmail($id);
	}
	
	function checkMobile() {
		$id =  $this->input->post('val');
		echo $this -> clients1->checkMobile($id);
	}
	*/
}