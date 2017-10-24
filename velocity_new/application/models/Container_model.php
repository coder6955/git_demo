<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Container_model extends CI_Model
{	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getContainer()
	{
		 $query1 = $this->db->query("SELECT * FROM `ph_master_service` ORDER BY `service_id` ASC");
		 return $query1->result();
	}
}