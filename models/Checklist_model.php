<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checklist_model extends CI_Model
{	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getchecklist()
	{
		$this->db->select("*");
		$this->db->from("ag_master_checklist");
		$query = $this->db->get();
		return $num =$query->result();
	}
	function getAllchecklistNum()
	{ 
		 $query = $this->db->query("select `checklist_id` from `ag_master_checklist`");
		 return $num   = $query->num_rows();
	}
	public function save_checklist()
	{
		$name = $_POST['txtname'];
		return $add=$this->db->query("insert into ag_master_checklist set `checklist_name`='".$name."',`checklist_description`='".$name."',`added_on`=now()");	
	}
	function delete_checklist($id)
	{ 
		 return $query1 = $this->db->query("delete FROM `ag_master_checklist` WHERE `checklist_id`='$id'");
		
	}
	function get_checklist_data($id)
	{ 
		 $query1 = $this->db->query("select * from `ag_master_checklist` WHERE `checklist_id`='$id'");
		 return $query1->result();
	}
	public function update_checklist()
	{
		$name = $_POST['txtname'];
		$id = $_POST['txtid'];
		return $add=$this->db->query("update ag_master_checklist set `checklist_name`='".$name."',`checklist_description`='".$name."',`added_on`=now() where `checklist_id`='".$id."'");	
		
	}
}
	