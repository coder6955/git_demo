<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	
	public function __construct() { 
		
	 	parent::__construct();
   		$this->load->model( array('project_model', 'menus','enquiry_model') );
   		$this->load->helper(array('form','my_helper'));
		if (	empty($this->session->userdata('admin_id'))	) 
		{
			redirect('login');
		}
		$this->user_id = $this->session->userdata('admin_id');
		$this->user_email_id = $this->session->userdata('email_id');
	}

	public function index()
	{
		$data['project_list'] = $this->project_model->project_list();
		load_view('project/project_list',$data);
	}

	public function view_job_order($project_id){
		$data['project_data'] = $this->project_model->project_list($project_id);
		$data['enquiry_details'] = $this ->enquiry_model->getenquiry($data['project_data']['enquiry_id']);
		$data['enquiry_details']=(array)$data['enquiry_details'][0];
		$data['project_stages'] = $this ->project_model->get_project_stages($data['project_data']['project_id'], 'ag_job_card');
		$data['project_stages_enq'] = $this ->project_model->get_project_stages($data['project_data']['project_id'], 'ag_job_card_footer_grid');
		//echo "<pre>";print_r($data['project_stages_enq']);exit;
		load_view('project/job_order',$data);
	}

	public function update_project_data(){
		$this->project_model->update_project_data();
		redirect('Project/view_job_order/'.$this->input->post('project_id'));
	}

	public function complete_stage($project_id, $enquiry_id, $service_cat_id){
		$this->project_model->complete_stage($project_id, $enquiry_id, $service_cat_id);
		redirect('Project/view_job_order/'.$project_id);
	}

}