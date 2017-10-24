<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model
{	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function project_list($project_id=0){
		$this->db->select('*')->from('ag_master_project amp');
		if(!empty($project_id)){
			return $this->db->where('project_id', $project_id)->get()->row_array();
		}
		return $this->db->get()->result_array();
	}

	public function get_project_stages($project_id, $table_name){
		return $this->db->select('*')->from($table_name)->where('project_id', $project_id)->get()->result_array();
	}

	public function update_project_data(){
		extract($this->input->post());
		$status=array(
					'start_date' => $start_date,
					'end_date' => $end_date,
				);

		$this->db->where('project_id', $project_id)->where('service_cat_id', $service_cat_id)->update('ag_job_card',$status);
	}

	public function complete_stage($project_id, $enquiry_id, $service_cat_id){
		$status=array('stage_status' => 1);

		$this->db->where('project_id', $project_id)->where('service_cat_id', $service_cat_id)->where('enquiry_id', $enquiry_id)->update('ag_job_card',$status);
	}

	

}