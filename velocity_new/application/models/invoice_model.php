<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getAllInvoice()
	{
		 $query1 = $this->db->query("SELECT * FROM `ag_invoice_details` ORDER BY `invoice_id` DESC limit 15");
		 return $query1->result();
	}
	function getinvoiceNum()
	{
		 $query = $this->db->query("select `invoice_id` from `ag_invoice_details`");
		 return $num   = $query->num_rows();
	}
	function getAllInvoiceformat()
	{
		 $query1 = $this->db->query("SELECT * FROM `ag_invoice_format_master` limit 15");
		 return $query1->result();
	}
	function getAllcompany()
	{
		 $query1 = $this->db->query("SELECT consignee_id,consignee_name FROM `ag_master_consignee` limit 15");
		 return $query1->result();
	}
	function getAllsupplier()
	{
		 $query1 = $this->db->query("SELECT state_id,state_name FROM `ag_master_state`");
		 return $query1->result();
	}
	function getAllportload()
	{
		$query1 = $this->db->query("SELECT port_of_load_id,port_of_load_name FROM `ag_master_port_of_load`");
		 return $query1->result();
	}
	function getAllportdelivery()
	{
		$query1 = $this->db->query("SELECT port_of_delivery_id,port_of_delivery_name FROM `ag_master_port_of_delivery`");
		 return $query1->result();
	}
	function getAllVolume()
	{
		$query1 = $this->db->query("SELECT volume_id,volume_name FROM `ag_master_volume`");
		return $query1->result();
	}
	function getAllContainer()
	{
		$query1 = $this->db->query("SELECT container_id,container_name FROM `ag_master_container`");
		return $query1->result();
	}
	function getAllCharges($id)
	{
		$query1 = $this->db->query("SELECT * FROM `ag_invoice_format_charge_master` where invoice_format_id='".$id."'");
		return $query1->result();
	}
	function getenqno($id)
	{
		
	}
	
	
	
	
}	