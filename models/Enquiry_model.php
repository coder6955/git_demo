<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry_model extends CI_Model
{	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getenquiry($enquiry_id=0){
		$columns="ame.enquiry_id, ame.enquiry_unique_id, ame.added_on, ame.added_by, pmc.company_name, pms.service_name, pmct.first_name, ame.contact_id";
		if(!empty($enquiry_id)){
			$columns="ame.*,pmc.company_name,pms.service_name,pmc.category_id";
		}

		$this->db->select($columns);
		$this->db->from("ag_master_enquiry ame");
		$this->db->join("ph_master_service pms","ame.service_id=pms.service_id");
		$this->db->join("ph_master_company pmc","ame.company_id=pmc.company_id");
		$this->db->join("ph_master_contact pmct","ame.added_by=pmct.contact_id");
		if(!empty($enquiry_id)){
			$this->db->where("ame.enquiry_id", $enquiry_id);
			return $this->db->get()->result_object();
		}
		$this->db->order_by("enquiry_id","desc");
		$this->db->limit("10","0");
		return $this->db->get()->result_object();
	}

	public function get_service_id($enquiry_id){
		$this->db->select("ame.service_id");
		$this->db->from("ag_master_enquiry ame");
		$this->db->where("ame.enquiry_id", $enquiry_id);
		return $this->db->get()->row()->service_id;
	}

	public function get_orgs($company_id=""){
		$this->db->select("company_id, company_name, category_id");
		$this->db->from("ph_master_company");
		if(!empty($company_id)){
			$this->db->where("company_id", $company_id);
			return $this->db->get()->row('category_id');
		}
		return $this->db->get()->result_array();
	}

	public function get_services(){
		$this->db->select("service_id, service_name");
		$this->db->from("ph_master_service");
		return $this->db->get()->result_array();
	}

	public function get_enquiry_contacts($contact_id){
		return 	$this->db->select('contact_id, first_name')
				->from('ph_master_contact')
				->where('company_id', $contact_id)
				->get()->result_array();
	}

	public function get_conversion(){
		return 	$this->db->select('conversation_id, conversation_name')
				->from('ph_master_conversation')
			 	->get()->result_array();
	}

	public function get_peripherals(){
		return 	$this->db->select('peripheral_id, peripheral_name')
				->from('ag_master_peripheral')
			 	->get()->result_array();
	}

	public function get_enquiry_source(){
		return 	$this->db->select('soe_id, soe_name')
				->from('ph_master_source_of_enquiry')
			 	->get()->result_array();
	}

	public function get_checklist($service_id){
		return $this->db->select('distinct(cl.checklist_id) as checklist_id, cl.checklist_name')
				->from('ag_master_checklist cl')
				->join('ag_service_format sf','cl.checklist_id=sf.checklist_id')
				->where('sf.service_id',$service_id)
			 	->get()->result_array();
	}

	public function get_enquiry_mails($contact_id){
		 	$this->db->select('contact_id, email_id, company_id');
				$this->db->from('ph_master_contact');
				if(!empty($contact_id)){
					$this->db->where('contact_id', $contact_id);
					return $this->db->get()->row_array();
				}
				return $this->db->get()->result_array();
	}

	public function save_enquiry($data, $enquiry_id=0){

		$this->db->trans_start();
			extract($data);
			$data = array (
							'contact_id' => $contact_name,
							'company_id' => $org,
							'service_id' => $service_type,
							'enquiry_email_id'=> $email,
							'alternate_email_id_1' => $email1,
							'enquiry_mobile_no' => $mobile_no,
							'enquiry_alternate_no' => $alt_mobile_no,
							'enquiry_address_line_1' => $address,
							'soe_id' => $soe,
							'modified_on' => date ( "Y-m-d H:i:s" )
						);

			if(empty($enquiry_id)){
				$data['added_on'] = date ( "Y-m-d H:i:s" );
				$data['added_by'] = $this->user_id;
				$this->db->insert ( 'ag_master_enquiry', $data );
				$enquiry_id = $this->db->insert_id();
			}else{
				$this->db->where('enquiry_id', $enquiry_id);
				$this->db->update('ag_master_enquiry',$data);

				$this->db->where('enquiry_id', $enquiry_id);
	  			$this->db->delete('ag_map_enquiry_checklist');

	  			$this->db->where('enquiry_id', $enquiry_id);
	  			$this->db->delete('ag_enquiry_notification');
				
			}

			if(empty($chklist)){
				return true;
			}

			foreach ($chklist as $checklist_id => $desc) {
				if(empty($desc)){
					$desc="";
				}

				$chk[]=array(	
							'checklist_id' => $checklist_id,
							'check_description' => $desc,
							'service_id' => $service_type,
							'added_on' => date ( "Y-m-d H:i:s" ),
							'modified_on'=> date ( "Y-m-d H:i:s" ),
							'enquiry_id' => $enquiry_id
							);
			}
			$this->db->insert_batch('ag_map_enquiry_checklist', $chk); 

			$notification_array = array 
											(
												'enquiry_id'	      => $enquiry_id,
												's_start_time'        => date("Y-m-d h:i:s"),
												'enquiry_unique_id'   => 'VGL/17-18/',  
												'contact_id'          => $contact_name,          
												'company_id'          => $org,       
												'service_id'          => $service_type
											);


			$this->db->insert ( 'ag_enquiry_notification', $notification_array );

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
				$this->session->set_flashdata("msg","Error in savnig enquiry"); 
		        redirect("enquiry/add_enquiry","refresh");
		}
	}

	public function get_master_chklist($enquiry_id){
		return 	$this->db->select('amec.checklist_id, amec.check_description, amec.service_id, amc.checklist_name')
				->from('ag_map_enquiry_checklist amec')
				->join('ag_master_checklist amc', 'amec.checklist_id=amc.checklist_id')
				->where('enquiry_id', $enquiry_id)
				->get()->result_array();
	}

	public function get_temp_chklist($enquiry_id){
		return 	$this->db->select('ataqc.checklist_id, ataqc.check_description, amc.checklist_name')
				->from('ag_temp_ask_quote_checklist ataqc')
				->join('ag_master_checklist amc', 'ataqc.checklist_id=amc.checklist_id')
				->where('enquiry_id', $enquiry_id)
				->get()->result_array();
	}

	public function ask_quotation($agent_id=0){


		$cols='	pmct.company_id, pmct.category_id, pmct.first_name, pmct.contact_id, pmct.email_id, pmct.country_id,pmct.state_id, 											pmct.city_id,pmc.company_name,pcc.category_name,amc.country_name,ams.state_name,amct.city_name';

		if(!empty($agent_id)){
			$cols =	'pmct.company_id,pmct.mobile_no,pmct.first_name,pmct.telephone_no,pmc.company_name,pmc.company_address';
		}

		 		$this->db->select($cols)->from('ph_master_contact pmct')->join('ph_master_company pmc', 'pmct.company_id=pmc.company_id','left');
		 		if(!empty($agent_id)){
					return $this->db->where('contact_id', $agent_id)->get()->row_array();
				}

		return	$this->db->join('ph_contact_category pcc', 'pcc.category_id=pmct.category_id','left')
				->join('ag_master_country amc', 'amc.country_id=pmct.country_id','left')
				->join('ag_master_state ams', 'ams.state_id=pmct.state_id','left')
				->join('ag_master_city amct', 'amct.city_id=pmct.city_id','left')
				->where('pcc.category_name', 'Agent')->or_where('pcc.category_name', 'Shipping Line Agent')->order_by("pmct.contact_id", "asc")->limit("10","0")
				->get()->result_array();
	}

	public function store_ask_quote_mail_info($enquiry_id, $service_id, $contact_ids_cc, $email_to_cc, $category_id){
		//echo "hiii<br><pre>";print_r($_POST);exit;

		$this->db->trans_start();
			extract($this->input->post());
			if(empty($contact_ids_cc)){
				$contact_ids_cc="";
				$email_to_cc='';
			}

			$ask_quote_col = array(
									'enquiry_id'=>$enquiry_id,
									'enquiry_unique_id'=>'',
									'contact_id'=>$contact_id_email_to,
								   	'company_id'=>$company_id_email_to,
								   	'category_id'=> $category_id,
								   	'service_id'=>$service_id,
								   	'ask_quote_by'=>$this->user_id,
								   	'email_id_cc'=>$email_to_cc,
								   	'contact_id_cc'=>$contact_ids_cc,
								   	'from_email_id_cc'=>'',
								   	'from_contact_id_cc'=>'',
								   	'message_box_header'=>$msg,
								   	'message_box_footer'=>$remark,
								   	'added_on'=>date("Y-m-d h:i:s")
							   	);
			$this->db->insert ( 'ag_ask_quote', $ask_quote_col );
			$ask_quote_id = $this->db->insert_id();

			$map_ask_quote_col = array();
			if(!empty($checklist_val)){
				foreach ($checklist_val as $c_id => $c_desc) {
					if($c_desc==""){
						continue;
					}

					$map_ask_quote_col[] = array( 
											'enquiry_id'=>$enquiry_id,
											'enquiry_unique_id'=>'',
											'checklist_id'=>$c_id,
										   	'check_description'=>$c_desc,
										   	'contact_id'=>$contact_id_email_to,
										   	'ask_qoute_id'=>$ask_quote_id
										   	);
				}

				$this->db->insert_batch ( 'ag_map_ask_quote_checklist', $map_ask_quote_col );
			}

			$status=array('ask_quote_status'=>'1');

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_master_enquiry',$status);

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_enquiry_notification',$status);	

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$this->session->set_flashdata("msg","Error in sending  ASK quotation mail"); 
	        redirect("enquiry/ask_quotation/".$enquiry_id,"refresh");
		}
	}

	public function store_send_quote_mail_info($enquiry_id, $service_id, $contact_ids_cc, $email_to_cc, $category_id){

		$this->db->trans_start();
			extract($this->input->post());
			if(empty($contact_ids_cc)){
				$contact_ids_cc="";
				$email_to_cc="";
			}

			$columns_send_quote = array(
										'enquiry_id'=>$enquiry_id,
										'enquiry_unique_id'=>'',
										'contact_id'=>$contact_id_email_to,
										'company_id'=>$company_id_email_to,
										'category_id'=>$category_id,
										'service_id'=>$service_id,
										'email_id_cc'=>$email_to_cc,
										'contact_id_cc'=>$contact_ids_cc,
										'quote_amount'=>'',
										'send_quote_by'=>$this->user_id,
										'message_box_header'=>$msg,
										'message_box_footer'=>$remark,
										'added_on'=>date("Y-m-d h:i:s")
										);
			$this->db->insert ( 'ag_send_quote', $columns_send_quote );
			$send_quote_id = $this->db->insert_id();


			$map_send_quote_col = array();
			if(!empty($checklist_val)){
				foreach ($checklist_val as $c_id => $c_desc) {
					if($c_desc==""){
						continue;
					}
					$map_send_quote_col[] = array(
													'send_quote_id'=>$send_quote_id,
													'enquiry_id'=>$enquiry_id,
													'enquiry_unique_id'=>'',
											   		'checklist_id'=>$c_id,
											   		'check_description'=>$c_desc,
											   		'contact_id'=>$contact_id_email_to
											   		);
				}

				$this->db->insert_batch ( 'ag_map_send_quote_checklist', $map_send_quote_col );
			}

			$status=array('send_quote_status'=>'1');

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_master_enquiry',$status);

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_enquiry_notification',$status);	
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
				$this->session->set_flashdata("msg","Error in sending  ASK quotation mail"); 
		        redirect("enquiry/enquiry","refresh");
		}
	}

	public function get_terms_and_services($service_id){
		return 	$this->db->select('ag_service_term_format.service_format_id, ag_service_term_format.service_id, ag_service_term_format.note_id, ag_service_term_format.added_on, ag_service_term_format.sort_order, ph_master_note.note_name')
							->from('ag_service_term_format')
							->join('ph_master_note','ag_service_term_format.note_id = ph_master_note.note_id','left')	
							->where('ag_service_term_format.service_id', $service_id)->get()->result_array();
	}

	public function get_booking_formats(){
		return 	  $this->db->select('*')->from('ag_booking_format')->get()->result_array();
	}

	public function get_emails_of_agents(){
		return 	$this->db->select('	pmct.contact_id, pmct.email_id, pmct.company_id ')
				->from('ph_master_contact pmct')
				->join('ph_contact_category pcc', 'pcc.category_id=pmct.category_id','left')
				->where('pcc.category_name', 'Agent')->or_where('pcc.category_name', 'Shipping Line Agent')->order_by("pmct.contact_id", "asc")
				->get()->result_array();
	}

	public function get_container_types(){
		return $this->db->select('container_id, container_name')->from ('ag_master_container')->get()->result_array();
	}

	public function get_container_volumes(){
		return $this->db->select('volume_id, volume_name')->from ('ag_master_volume')->get()->result_array();
	}

	public function get_booking_checklist($booking_format_id){
		return $this->db->select('*')->from('ag_map_booking_format')->where('booking_format_id', $booking_format_id)->order_by("booking_checklist_no", "asc")->get()->result_array();
	}

	public function store_booking_mail_info($enquiry_id, $service_id, $contact_ids_cc, $email_to_cc, $category_id, $email_to, $bkng){
		$this->db->trans_start();
			extract($this->input->post());
			if(empty($contact_ids_cc)){
				$contact_ids_cc="";
				$email_to_cc="";
			}

			$col = array( 
							'enquiry_id'=>$enquiry_id,
							'booking_format_id'=>$booking_format_id,
							'format_from'=>$this->user_email_id,
						   	'format_to'=>$email_to,
						   	'format_subject'=>$sub,
						   	'format_message'=>$msg,
						   	'footer_msg'=>$remark,
						   	'format_mail_id'=>$email_to_cc,
						   	'format_contact_id'=>$contact_ids_cc
					   	);

			$this->db->insert ( 'ag_map_booking_format_detail', $col );
			$check_col=array();
			if(!empty($bkng)){
		
				foreach ($bkng as $name => $value) {
					if(empty($value)){
						continue;
					}
					$check_col[] = array(
										'enquiry_id'=>$enquiry_id,
										'booking_format_id'=>$booking_format_id,
										'booking_checklist_name'=>$name,
									   	'booking_checklist_value'=>$value
								   	);
				}
				if(!empty($check_col)){
					$this->db->insert_batch ( 'ag_map_booking_format_checklist', $check_col );
				}
			}

			$status=array('approve_agent_status'=>'1');

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_master_enquiry',$status);

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_enquiry_notification',$status);

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
				$this->session->set_flashdata("msg","Error in sending  ASK quotation mail"); 
		        redirect("enquiry/index","refresh");
		}
	}

	public function agent_details_sent($enquiry_id){
		$status=array('send_agent_detail_to_client'=>'1');

		$this->db->where('enquiry_id', $enquiry_id);
		$this->db->update('ag_master_enquiry',$status);
	}

	public function approve_enquiry($enquiry_id){
		$this->db->trans_start();
			$status=array('approve_client_status'=>'1');

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_master_enquiry',$status);

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_enquiry_notification',$status);

			$this->create_project($enquiry_id);
		$this->db->trans_complete();
		$this->session->set_flashdata("msg","Client Approval failed");
		if ($this->db->trans_status() === TRUE)
		{
				$this->session->set_flashdata("msg","Client Approved Successfully");  
		}
		redirect("enquiry/index","refresh");
	}

	public function create_project($enquiry_id){
		$enquiry_details=$this->getenquiry($enquiry_id);
		foreach ($enquiry_details as $key => $value) {
			$eq=(array)$value;
		}
		//print_r($enquiry_details);exit;
		$project_unique_id="Vel/".$eq['company_name']."/".$eq['service_name'];

		$total_stages = $this->db->select('count(service_id) as total_stages')->from('ph_service_category')->get()->row('total_stages');

		$project_columns = array(
								'project_unique_id'=>$project_unique_id,
								'project_name'=>"",
								'enquiry_id'=>$enquiry_id,
								'enquiry_unique_id'=>"",
								'contact_id'=>$eq['contact_id'],
								'company_id'=>$eq['company_id'],
							 	'category_id'=>$eq['category_id'],
							 	'service_id'=>$eq['service_id'],
							 	'total_stages'=>$total_stages,
							 	'quote_amount'=>"",
							 	'project_status'=>"In-Progress",
							 	'added_on'=>date("Y-m-d h:i:s")
							 	);
		
		$this->db->insert ( 'ag_master_project', $project_columns );
		$project_id = $this->db->insert_id();
		$total_services = $this->db->select('service_cat_id, service_cat_name')->from('ph_service_category')->where('service_id', $eq['service_id'])->get()->result_array();

		$get_service_cat=array();
		foreach ($total_services as $key => $ts) {
			$get_service_cat[] =  array(
										'project_id'=>$project_id,
										'project_unique_id'=>$project_unique_id,
										'enquiry_id'=>$enquiry_id,
										'service_id'=>$eq['service_id'],
										'service_cat_id'=>$ts['service_cat_id'],
										'service_cat_name'=>$ts['service_cat_name']
									);
		}
		$this->db->insert_batch ( 'ag_job_card', $get_service_cat );


		for($st=1; $st<=5; $st++)
		{
			$stage_description = "This Stage Is Skipped";
			$stage_status      = 0;	
			if($st == 1)
			{
				$stage_name = "Ask Quotation";
				if($eq['ask_quote_status'] == 1 )
				{
					$stage_description = "Quotation Already Asked To Agent";
					$stage_status      = 1;
				}		
			}
			if($st == 2)
			{
				$stage_name = "Send Quotation";
				if($eq['send_quote_status'] == 1 )
				{
					$stage_description = "Quotation Sent To Client";
					$stage_status      = 1;
				}	
			}
			if($st == 3)
			{
				$stage_name = "Booking Format Sent To Agent";
				if($eq['approve_agent_status'] == 1 )
				{
					$stage_description = "Booking Format Is Sent To Agent";
					$stage_status      = 1;
				}		
			}
			if($st == 4)
			{
				$stage_name = "Client Approval";
				
				if($eq['approve_client_status'] == 1 )
				{
					$stage_description = "Client Has Approved The Quotation";
					$stage_status      = 1;
				}	
				else
				{
					$stage_description = "Directly Approval Is Done";
					$stage_status      = 0;
				}	
			}
			if($st == 5)
			{
				$stage_name = "Send Agent Details To Client";
				if($eq['send_agent_detail_to_client'] == 1 )
				{
					$stage_description = "Send Agent Details to Client";
					$stage_status      = 1;
				}	
			}

			$columns[] =  array(
								'project_id'=>$project_id,
								'enquiry_id'=>$enquiry_id,
								'stage_no'=>$st,
								'stage_name'=>$stage_name,
								'stage_description'=>$stage_description,
								'stage_status'=>$stage_status
							);
		}
		$this->db->insert_batch ( 'ag_job_card_footer_grid', $columns );
	}

	public function lost_enquiry($enquiry_id, $lost_reason){
		$this->db->trans_start();
			$status=array(
							'is_lost_status'=>'1',
						 	'reason_lost_enquiry' => $lost_reason,
						 	'lost_by' => $this->user_id,
						 	'lost_on' => date("Y-m-d h:i:s")	
						);

			$this->db->where('enquiry_id', $enquiry_id);
			$this->db->update('ag_master_enquiry',$status);
		$this->db->trans_complete();
		$this->session->set_flashdata("msg","Enquiry lost was not able to update..!!");
		if ($this->db->trans_status() === TRUE)
		{
				$this->session->set_flashdata("msg","Enquiry lost updated successfully");  
		}
		redirect("enquiry/index","refresh");
	}

}