<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class service_model extends CI_Model
{	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getService(){
		  
		 $query1 = $this->db->query("SELECT * FROM `ph_master_service` ORDER BY `service_id` ASC");
		 return $query1->result();
	}
	function getAllServiceNum()
	{ 
		 $query = $this->db->query("select `service_id` from `ph_master_service`");
		 return $num   = $query->num_rows();
	}
	public function getCategory($id)
    {
		$this->db->select("*");
		$this->db->from("ph_service_category");
		$this->db->where("service_id",$id);
		$query = $this->db->get();
		return $num =$query->result();
    }
	public function getPrefixAdd()
    {
		$name = $_POST['txtname'];
		$prefix=$this->db->query("insert into ag_master_prefix set `prefix_name`='".$name."',`added_on`=now()");
    }
	function getAllprefix(){
		  
		 $query1 = $this->db->query("SELECT * FROM `ag_master_prefix`");
		 return $query1->result();
	}
	public function  getAdd()
	{
		$name = $_POST['txtname'];
		$prefix = $_POST['txtprefix'];
		return $add=$this->db->query("insert into ph_master_service set `category`='".$prefix."',`service_name`='".$name."',`added_on`=now()");	
	}
	public function getserviceid($id)
	{
		$this->db->select("*");
		$this->db->from("ph_master_service");
		$this->db->where("service_id",$id);
		$query = $this->db->get();
		return $num =$query->result();
	}
	public function getdelete($id)
	{
		$this->db->where("service_id",$id);
		$this->db->delete("ph_master_service");
		
	}
	public function  update()
	{
		$name = $_POST['txtname'];
		$prefix = $_POST['txtprefix'];
		return $add=$this->db->query("update ph_master_service set `category`='".$prefix."',`service_name`='".$name."',`added_on`=now()");	
	}
	public function getformat($id)
	{
		$this->db->select("*");
		$this->db->from("ag_service_format");
		$this->db->where("service_id",$id);
		$query = $this->db->get();
		return $num =$query->result();
	}

	
	public function savechecklistbyid($id,$sid)
	{
		return  $query= $this->db->query("insert into ag_service_format set `service_id`='".$sid."',`checklist_id`='".$id."',`added_on`=now()");		
	}
	public function deletechecklistbyid($id,$sid)
	{
		$this->db->where("service_id",$sid);
		$this->db->where("checklist_id",$sid);
		$this->db->delete("ag_service_format");
	}

	/*
	public function leftdesign($id)
	{
		
		// $this->db->select('checklist_id');
		// $this->db->from("ag_service_format");
		// $this->db->where('service_id', 1);
		// $query= $this->db->get();
		// $query1 = $query->result();
		
		// $query = $this->db->query("SELECT checklist_id FROM ag_service_format WHERE service_id =1");
		// $query1 = $query->result();
		
		// $arr1 = array();
		// $arr2 = array();
		// foreach($query1 as $item=>$item1){
			// $arr1[]=$item;
		// }
		// $arr2 = implode(",", $arr1);
		// $a = "0,1,2,3,4,5,6,7";
		// $this->db->select("checklist_id, checklist_name ");
		// $this->db->from('ag_master_checklist');
		// $this->db->where_not_in('checklist_id', $arr2);
		// $abc = $this->db->get();
		// $abc1 = $abc->result();
		// print_r($abc1);
		
		$check_sql = $this->db->query("SELECT checklist_id,checklist_name
						  FROM ag_master_checklist WHERE checklist_id NOT IN(SELECT checklist_id FROM ag_service_format WHERE service_id =$id)");
				
		return $abc = $check_sql->result();
		// echo "<pre>";
		// print_r($abc);
			
	}
	public function rightdesign($id)
	{
		$check_sql = $this->db->query("SELECT ag_service_format.service_id,ag_service_format.checklist_id,ag_master_checklist.checklist_name
				FROM ag_service_format
				LEFT JOIN ag_master_checklist
				ON ag_service_format.checklist_id = ag_master_checklist.checklist_id
				WHERE ag_service_format.service_id = $id");		
				
		return $abc = $check_sql->result();
		// echo "<pre>";
		// print_r($abc);
	}
	
	/*
	$check_sql = "SELECT checklist_id,checklist_name
						  FROM ag_master_checklist WHERE checklist_id NOT IN(SELECT checklist_id FROM ag_service_format WHERE  service_id =".$service_id.")";
			$result1  = $result1->custom_query($check_sql);
			
	public function getAllMemberCategory()
    {
		$this->db->select("*");
		$this->db->from("ph_contact_category");
		$query = $this->db->get();
		return $num =$query->result();

    }
	public function getAllState()
    {
		$this->db->select("*");
		$this->db->from("ag_master_state");
		$query = $this->db->get();
		return $num =$query->result();
    }	
	public function getAllCountry()
    {
		$this->db->select("*");
		$this->db->from("ag_master_country");
		$query = $this->db->get();
		return $num =$query->result();
    }
	public function getAllcity()
    {
		$this->db->select("*");
		$this->db->from("ag_master_city");
		$query = $this->db->get();
		return $num =$query->result();

    }
	public function getAllcategory()
    {
		$this->db->select("*");
		$this->db->from("ph_contact_category");
		$query = $this->db->get();
		return $num =$query->result();
    }
	public function CompanyAdd()
	{
		$name = $_POST['txtname'];
		$add = $_POST['txtaddress'];
		$email1 = $_POST['txtemail1'];
		$email2 = $_POST['txtemail2'];
		$branch = $_POST['txtbranch'];
		$phone = $_POST['txtphone'];
		$countery = $_POST['txtcountery'];
		$state = $_POST['txtstate'];
		$city = $_POST['txtcity'];
		$category = $_POST['txtcategory'];
		
		$category = $_POST['txtcategory'];
		

		
		return $company=$this->db->query("insert into ph_master_company set `company_name`='".$name."', 
										`company_address`='".$add."',`company_alternate_email_id1`='".$email1."',
										`company_alternate_email_id2`='".$email2."',`company_branch`='".$branch."',
										`country_id`='".$countery."',`state_id`='".$state."',`company_telephone_no`='".$phone."',
										`city_id`='".$city."',`category_id`='".$category."',`added_on`=now()");
										
							
										
	}
	public function getcompanybyID($id)
	{
		$this->db->select("*");
		$this->db->where("company_id",$id);
		$this->db->from("ph_master_company");
		$query = $this->db->get();
		return $num =$query->result();
	}
	public function companyupdate()
	{
		$id = $_POST['txtid'];
		$name = $_POST['txtname'];
		$add = $_POST['txtaddress'];
		$email1 = $_POST['txtemail1'];
		$email2 = $_POST['txtemail2'];
		$branch = $_POST['txtbranch'];
		$phone = $_POST['txtphone'];
		$countery = $_POST['txtcountery'];
		$state = $_POST['txtstate'];
		$city = $_POST['txtcity'];
		$category = $_POST['txtcategory'];
		
		$category = $_POST['txtcategory'];
		

		
		$company=$this->db->query("update ph_master_company set `company_name`='".$name."', 
										`company_address`='".$add."',`company_alternate_email_id1`='".$email1."',
										`company_alternate_email_id2`='".$email2."',`company_branch`='".$branch."', 
										`country_id`='".$countery."',`state_id`='".$state."',`company_telephone_no`='".$phone."', 
										`city_id`='".$city."',`category_id`='".$category."',`added_on`=now() WHERE `company_id`='".$id."'");
										
		print_r($company);						
										
	}
	public function CompanyDelete($id)
	{
		$this->db->where("company_id",$id);
        $this->db->delete("ph_master_company");
	}
	/*
	function deleteClient($id) 
	{
		 $this->db->query("DELETE FROM `client_master` WHERE client_id = '".$id."'");
	}
	
	function save_client()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];	
		
		$docsimg=null;
		$config['upload_path'] 	 = './assets/user/clients/profile/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['file_name']	 = $_FILES['docsfile']['name'];
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('docsfile'))
		{
			$error = array('error' 	=> $this->upload->display_errors());
			print_r($error);
		}
		$data = array('upload_data' => $this->upload->data());
		$fileName1 = $data['upload_data']['file_name'];	
		$docsimg=$fileName1;
		
	
		return $about=$this->db->query("insert into client_master set `research_image`='".$txtimg."', 
										`research_desc`='".$txtdesc."',`research_title`='".$txttitle."' ");
	
	
	}
		 // $image_file 	 = str_replace(" ","_",$filename);
		 // $name			 = $_POST['name'];
		 // $email      	 = $_POST['email'];
		 // $mobile		 = $_POST['mobile'];
		 // $client_type_id = $_POST['client_type_id'];
		 // $company_name	 = $_POST['company_name'];
		 // $image_docs	 = str_replace(" ","_",$filename);
		 // $marital_status_id	= $_POST['marital_status_id'];
		
		 // $dob  			   = $_POST['dob'];
		
		 
		 // $this->db->query("INSERT INTO `client_master` SET 
							// name = '".$name."',
							// email = '".$email."',
							// mobile = '".$mobile."',
							// dob = '".$dob."',
							// document_type='".$client_type_id."', 
							// image_file = '".$image_file."',
							// docs_image='".$client_type_id."', 
							// added_on = '".$this->now."'
						  // ");
		 // $insert_id = $this->db->insert_id();
		// return  $insert_id;
	
	
	/*
	function getClientDetail($id) {

		 
		 $query1 = $this->db->query("SELECT `client_master`.`name`,`client_master`.`email`,`client_master`.`mobile`,`client_master`.`dob`,`client_master`.`company_name`,`client_master`.`client_type_id`,`client_master`.`aniversary_date`,`client_master`.`image_file`,`marital_status_master`.`marital_status`,client_type.client_type
FROM `client_master` 
LEFT OUTER JOIN `marital_status_master` ON `marital_status_master`.`marital_status_id`=`client_master`.`marital_status_id`
LEFT OUTER JOIN `client_type` ON `client_type`.`client_type_id`=`client_master`.`client_type_id`
WHERE `client_master`.`client_id`='".$id."'");
		 
		 return $query1->result();
	}
	
	function update_client($filename){
		  
		 $image_file 	 = $filename;
		 $client_id   	 = $_POST['client_id'];
		 $name			 = $_POST['name'];
		 $email      	 = $_POST['email'];
		 $mobile		 = $_POST['mobile'];
		 $client_type_id = $_POST['client_type_id'];
		 $company_name	 = $_POST['company_name'];
		 $marital_status_id	 = $_POST['marital_status_id'];
		 $dob  			   = $_POST['dob-dd']."-".$_POST['dob-mm']."-".$_POST['dob-yyyy'];
		 $aniversary_date  = $_POST['dd']."-".$_POST['mm']."-".$_POST['yyyy'];
		 
		 if($image_file == '') {
			 $this->db->query("UPDATE `client_master` SET 
							name = '".$name."',
							email = '".$email."',
							mobile = '".$mobile."',
							client_type_id='".$client_type_id."', 
							company_name='".$company_name."',
							dob = '".$dob."',
							marital_status_id = '".$marital_status_id."',
							aniversary_date = '".$aniversary_date."'
						  WHERE client_id = '".$client_id."'
						  ");
		 }else {
			 $this->db->query("UPDATE `client_master` SET 
							name = '".$name."',
							email = '".$email."',
							mobile = '".$mobile."',
							dob = '".$dob."',
							marital_status_id = '".$marital_status_id."',
							aniversary_date = '".$aniversary_date."',
							image_file = '".$image_file."'
						  WHERE client_id = '".$client_id."'
						  ");
		 }
	}
	
	function deleteClient($id) {
		 //$this->db->query("DELETE FROM `client_master` WHERE client_id = '".$id."'");
		 $this->db->query("update `client_master` set is_active = '0' WHERE client_id = '".$id."'");
	}
	
	function getClientsForEmail($id) 
	{
			 
			 if($id == '') {
			  
				 $this->db->select('client_id,name,email');
				 $this->db->from('client_master');
				 $this->db->where('is_active','1');
				 $this->db->order_by('client_id','desc');
				 $user = $result = $this->db->get();
				 return $user->result();
			 
		 }else {
				 $this->db->select('client_id,name,email');
				 $this->db->from('client_master');
				 $this->db->where('is_active','1');
				 $this->db->where('client_id',$id);
				 $user = $result = $this->db->get();
				 return $user->result();
		 }
	}
	
	function getEmailDetails($id) {
			 
			 $this->db->select('*');
			 $this->db->from('aniversary_bithday_details');
			 $this->db->where('a_or_b',$id);
			 $user = $result = $this->db->get();
			 return $user->result();
	}
	
	function emailLog($id) {
		$this->db->query("INSERT INTO `email_sent_to` SET sent_to = '".$id."',type = 'client',flag = 'New Client',sent_by = '".$this->admin_id."',added_on='".$this->now."'");
	}
	
	function emailLogEvents($id) {
		$this->db->query("INSERT INTO `email_sent_to` SET sent_to = '".$id."',type = 'event',flag = 'Event Email',sent_by = '".$this->admin_id."',added_on='".$this->now."'");
	}
	
	function emailLogProduct($id) {
		$this->db->query("INSERT INTO `email_sent_to` SET sent_to = '".$id."',type = 'product',flag = 'Product Email',sent_by = '".$this->admin_id."',added_on='".$this->now."'");
	}
	
	function getEvents() {
			 $this->db->select('`event_id`,`name`');
			 $this->db->from('event_master');
			 $this->db->where('is_active','1');
			 $this->db->order_by('event_id','desc');
			 $user = $result = $this->db->get();
			 return $user->result();
	}
	
	function getEventDetails($ids) {
		 $query1 = $this->db->query("SELECT `event_id`,`name`,`description` FROM `event_master` WHERE event_id IN (".$ids.")");
		 return $query1->result();
	}
	function getEventImagesEmail($id) {
		 $query1 = $this->db->query("SELECT `image_file` FROM `event_master` WHERE event_id='".$id."' AND is_active = '1' AND image_file!='' UNION SELECT `image_file` FROM `event_images` WHERE event_id='".$id."' AND is_active = '1' AND image_file!=''");
		 return $query1->result();
	}
	
	function getClientForEmail($id) {
		 $query1 = $this->db->query("SELECT `name`,`email` FROM `client_master` WHERE `client_id` = '".$id."'");
		 return $query1->result();
	}
	
	function getProducts() {
			 $this->db->select('`name`,`product_id`');
			 $this->db->from('product_master');
			 $this->db->where('is_active','1');
			 $this->db->order_by('product_id','desc');
			 $user = $result = $this->db->get();
			 return $user->result();
	}
	function getProductDetails($ids) {
		 $query1 = $this->db->query("SELECT `product_id`,`name`,`description` FROM `product_master` WHERE product_id IN (".$ids.")");
		 return $query1->result();
	}
	
	function getProductImagesEmail($id) {
		 $query1 = $this->db->query("SELECT `image_file` FROM `product_master` WHERE product_id='".$id."' AND is_active = '1' AND image_file!='' UNION SELECT `image_file` FROM `product_images` WHERE product_id='".$id."' AND is_active = '1' AND image_file!=''");
		 return $query1->result();
	}
	
	function exportToExcel() {
		 $query1 = $this->db->query("SELECT `client_category_master`.`category_name`,`marital_status_master`.`marital_status`,`client_master`.`company_name`,`reference_master`.`name` AS ref_name, `client_master`.`client_id`,
`client_master`.`name`,`client_master`.`email`,`client_master`.`mobile`,`client_master`.`dob`,`client_master`.`aniversary_date`,`client_master`.`added_on`
FROM `client_master` 
LEFT OUTER JOIN `client_category_master` ON `client_category_master`.`category_id` = `client_master`.`category_id`
LEFT OUTER JOIN `marital_status_master` ON `marital_status_master`.`marital_status_id` = `client_master`.`marital_status_id`
LEFT OUTER JOIN `reference_master` ON `reference_master`.`reference_id` = `client_master`.`reference_id`
WHERE `client_master`.`is_active` = '1'");
		 return $query1->result();
	}
	
	function checkEmail($val) {
		 $query = $this->db->query("select `email` from `client_master` where `email` = '".$val."' and is_active = '1'");
		 $num   = $query->num_rows();
		 if($num != '0') {
			 return 1;
		 }else {
			 return 0;
		 }
	}
	
	function checkMobile($val) {
		 $query = $this->db->query("select `mobile` from `client_master` where `mobile` = '".$val."' and is_active = '1'");
		 $num   = $query->num_rows();
		 if($num != '0') {
			 return 1;
		 }else {
			 return 0;
		 }
	}
	*/
	
}	