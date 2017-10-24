<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	
	public function __construct() { 
		
		 parent::__construct();
		 $this->load->model('menus');
		 $this->load->model('service_model');
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
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			$data['service'] = $this -> service_model->getService();
			$data['serviceNum'] = $this -> service_model->getAllServiceNum();
			$data['prefix'] = $this -> service_model->getAllprefix();
			
			$this->load->view('master/services/all-services',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	public function category($id)
	{
		$menu['data'] = $this -> menus->getAllMenus();
		$this->load->view('header',$menu);	
		
		$data['category'] = $this -> service_model->getCategory($id);
		$data['service'] = $this -> service_model->getService();

		$this->load->view('master/services/all-services-category',$data);
		$this->load->view('footer');
	}
	public function prefixadd()
	{
		$this -> service_model->getPrefixAdd();
		redirect('service');
	}
	public function add()
	{
		$this -> service_model->getAdd();
		redirect('service');
	}
	public function delete($id)
	{
		$this -> service_model->getdelete($id);
		redirect('service');
	}
	public function edit($id)
	{	
		if ($this->session->userdata('admin_id') != '') 
		{
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			$data['edit_service'] = $this -> service_model->getserviceid($id);
		
			$data['prefix'] = $this -> service_model->getAllprefix();
			$this->load->view('master/services/all-services-edit',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
		
	}
	public function update()
	{
		$this -> service_model->update();
		redirect('service');
	}
	public function edit_format($id)
	{
		if ($this->session->userdata('admin_id') != '') 
		{
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			$data['edit_service'] = $this -> service_model->getserviceid($id);
			$data['format'] = $this -> service_model->getformat($id);
			$data['checklist'] = $this -> checklist_model->getchecklist();
			
			$this->load->view('master/services/all-services-design',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	
	/* Design Edit*/
	public function get_design_ID()
	{
		$id='1';
		$sid='3';
		// $id=$_POST['id'];
		// $sid=$_POST['sid'];
		// echo "<pre>";
		// print_r($id);
		// print_r($sid);
		// echo "<pre>";
		// echo $id;
		// echo $sid;
		// $this -> service_model->savechecklistbyid($id,$sid);
		$data['checklist_selected']=$this->service_model->savechecklistbyid($id,$sid);
		
		foreach($format as $data) 
		{	
			if($edit_service[0]->service_id == $data->service_id)
			{		
				echo '<div class="">
						<div class=" col-sm-3 alert dark alert-primary alert-dismissible" role="alert" style="margin:10px 10px" > 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"  onclick="deleteitem('.$id,$quantity,$item.')">×</span>
						</button>';
				foreach($checklist as $checklist1){if($data->checklist_id == $checklist1->checklist_id){ echo $checklist1->checklist_name; } }
				echo '</strong></div></div>';
			}	
		}
		
		
		/*
		foreach($format as $data) 
			{	
			 if($edit_service[0]->service_id == $data->service_id)
					{ ?>
						<div class=" col-sm-3 alert dark alert-primary alert-dismissible" role="alert" style="margin:10px 10px" > 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
							</button>	
							<?php foreach($checklist as $checklist1) 
							{
								if($data->checklist_id == $checklist1->checklist_id)
								{													
									echo $checklist1->checklist_name;
								}
							}
							?>
						</div>
			<?php 	}
			}
			*/
			
		
		
	}
			
	
	
	/* 
	public function left($id)
	{
			$data['test']=$this -> service_model->leftdesign($id);
	}
	public function right($id)
	{
			$data['test']=$this -> service_model->rightdesign($id);
	}
	
	
	
	/* Service Desgin Format */
	
	
	
	/*
	public function edit($id)
	{
		if ($this->session->userdata('admin_id') != '') 
		{
			$menu['data'] = $this -> menus->getAllMenus();
			$this->load->view('header',$menu);
			$data['prefix'] = $this -> service_model->getAllprefix();
		
			$this->load->view('all-services-edit',$data);
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
	public function companymember($id)
	{
		$menu['data'] = $this -> menus->getAllMenus();
		$this->load->view('header',$menu);	
		$data['AllCompanyMember'] = $this -> organisation_model->getAllCompanyMember($id);
		$data['Membercategory'] = $this -> organisation_model->getAllMemberCategory();
		
	
		
		$this->load->view('all-organisation-member',$data);
		$this->load->view('footer');
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
			
			$this->load->view('edit-organisation',$data);
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
	*/
	
}