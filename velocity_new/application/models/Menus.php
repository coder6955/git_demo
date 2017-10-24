<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menus extends CI_Model
{
	function __Construct()
	{
	   parent::__Construct (); 
	   $this->admin_id = $this->session->userdata('admin_id');
	}

	function getAllMenus()
	{		 
		 $query1 = $this->db->query("SELECT * FROM `ph_master_menu`");
		 return $query1->result();
		 		 
	}
	
}	