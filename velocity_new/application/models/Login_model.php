<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	function __Construct(){
		   parent::__Construct (); 
		}

	function authentication($username, $password){
		

		//$query = $this->db->query("SELECT contact_id,first_name FROM ph_master_contact WHERE username='$uname' and password='$pass' and is_active='1'");

		return $this->db->select('*')->from('ph_master_contact')
					->where('username',$username)
					->where('password',$password)
					->where('is_active','1')
					->get()->row_array();
		
	}
	
	
}	