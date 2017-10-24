<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisation extends CI_Controller {
	
	public function __construct() { 
		
		 parent::__construct();
		 $this->load->model('menus');
		 $this->load->model('organisation_model');
		 if (!$this->session->userdata('admin_id')) 
		{
			redirect('login');
		}
	}

	public function index()
	{
		if ($this->session->userdata('admin_id') != '') 
		{
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			$data['company'] = $this -> organisation_model->getCompany();
			$data['companyNum'] = $this -> organisation_model->getAllCompanyNum();
			// $data['AllCompanyMember'] = $this -> organisation_model->getAllCompanyMember();
			
			$data['state'] = $this -> organisation_model->getAllState();
			$data['country'] = $this -> organisation_model->getAllCountry();
			$data['city'] = $this -> organisation_model->getAllcity();
			$data['category'] = $this -> organisation_model->getAllcategory();
			
			$this->load->view('master/organisation/all-organisation',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	public function add()
	{
		$this -> organisation_model->CompanyAdd();
		redirect('organisation');
	}

	
	public function edit($id)
	{
			
			
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			$data['companyNum'] = $this -> organisation_model->getAllCompanyNum();
			// $data['AllCompanyMember'] = $this -> organisation_model->getAllCompanyMember();
			
			$data['state'] = $this -> organisation_model->getAllState();
			$data['country'] = $this -> organisation_model->getAllCountry();
			$data['city'] = $this -> organisation_model->getAllcity();
			$data['category'] = $this -> organisation_model->getAllcategory();
			
			$data['company'] = $this -> organisation_model->getcompanybyID($id);
			
			$this->load->view('master/organisation/all-organisation-edit',$data);
			$this->load->view('footer');
	}
	public function update()
	{
			$data['company'] = $this -> organisation_model->companyupdate();
			redirect('organisation');
	}
	public function delete($id)
	{
		$this -> organisation_model->CompanyDelete($id);
		redirect('organisation');

	}
	
	/*Member*/
	public function companymember($id)
	{
		$menu['data'] = $this -> menus->getAllMenus();
		$this->load->view('header',$menu);	
		$data['AllCompanyMember'] = $this -> organisation_model->getAllCompanyMember($id);
		$data['Membercategory'] = $this -> organisation_model->getAllMemberCategory();
		
	
		
		$this->load->view('master/organisation/all-organisation-member',$data);
		$this->load->view('footer');
	}
	public function addmember()
	{
		$this -> organisation_model->MemberAdd();
		redirect('organisation/companymember');
	}
	public function editmember($id)
	{
			
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			
			$data['AllCompanyMember'] = $this -> organisation_model->getAllCompanyMember($id);
			$data['Membercategory'] = $this -> organisation_model->getAllMemberCategory();
					
			// $data['AllCompanyMember'] = $this -> organisation_model->getAllCompanyMember();

			$data['member'] = $this -> organisation_model->getmemberbyID($id);
			
			$this->load->view('master/organisation/all-member-edit',$data);
			$this->load->view('footer');
	}
	public function updatemember()
	{
			$data['company'] = $this -> organisation_model->memberupdate();
			redirect('organisation');
	}
	public function deletemember($id)
	{
		$this -> organisation_model->CompanyDelete($id);
		redirect('organisation');

	}
}