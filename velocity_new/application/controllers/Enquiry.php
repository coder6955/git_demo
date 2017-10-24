<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {
	
	public function __construct() { 
		
	 	parent::__construct();
   		$this->load->model( array('enquiry_model', 'menus') );
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
		$data['enquiry'] = $this ->enquiry_model->getenquiry();
		$data['booking_formats'] =  $this ->enquiry_model->get_booking_formats();
		load_view('enquiry/enquiry',$data);
	}

	public function add_enquiry($enquiry_id=0){

		$data['all_orgs'] = $this ->enquiry_model->get_orgs();
		$data['all_services'] = $this->enquiry_model->get_services();
		$data['all_conversation'] = $this->enquiry_model->get_conversion();
		$data['all_peripherals'] = $this->enquiry_model->get_peripherals();
		$data['all_enquiry_source'] = $this->enquiry_model->get_enquiry_source();
		$data['title']="Add Enquiry";

		if(!empty($enquiry_id)){
			$data['title']="Update Enquiry";
			$data['enquiry_details'] = $this ->enquiry_model->getenquiry($enquiry_id);
			$data['enquiry_details']['temp_checklist'] = $this ->enquiry_model->get_master_chklist($enquiry_id);
			$data['enquiry_id']=$enquiry_id;
			//echo "<pre>";print_r($data['enquiry_details']);exit;
		}

		load_view('enquiry/add_enquiry',$data);
	}

	public function get_enquiry_contacts($contact_id){
		$contacts = $this ->enquiry_model->get_enquiry_contacts($contact_id);
		echo json_encode($contacts);
		exit;
	}

	public function get_checklist($service_id){
		$check_list = $this ->enquiry_model->get_checklist($service_id);
		echo json_encode($check_list);
		exit;
	}

	public function get_enquiry_mails($contact_id=0){
		$email_list = $this ->enquiry_model->get_enquiry_mails($contact_id);
		echo json_encode($email_list);
		exit;
	}

	public function save_enquiry($enquiry_id=0){
		extract($this->input->post());
		if( empty($org) || empty($service_type) || empty($email) || empty($contact_name) ){
			$this->add_enquiry($enquiry_id);
		}else{	
			$this->enquiry_model->save_enquiry($this->input->post(), $enquiry_id);
			redirect('enquiry/', 'refresh');
		}
	}

	public function get_temp_filled_checklist($enquiry_id){
		echo json_encode( $this ->enquiry_model->get_master_chklist($enquiry_id));
		exit;
	}

	public function ask_quotation($enquiry_id=0, $msg=""){
		if(empty($enquiry_id))
			$this->index();

		$data['enquiry_id'] = $enquiry_id;
		$data['agent_list'] = $this->enquiry_model->ask_quotation();
		$data['email_send_result']=$msg;
		///echo "<pre>";print_r($data['agent_list']);exit;
		$data['title']="ASK QUOTATION";
		load_view('enquiry/ask_quotation', $data);
		
	}

	public function display_ask_email($contact_id=0, $enquiry_id){
		$data['title']="Mail To Ask Quotation";
		$data['email_to']=$this->enquiry_model->get_enquiry_mails($contact_id);
		$data['email_list_for_cc']=$this ->enquiry_model->get_enquiry_mails(0);
		$data['email_from']=$this->user_email_id;
		$data['msg_body']='Dear Sir/Madam,&#13;&#10;Please Quote The Best Rate For The Below Enquiry';
		$data['mail_type']=0;
		$cld=$this ->enquiry_model->get_master_chklist($enquiry_id);
		$data['chk_fields_empty']=array();
		$data['chk_fields_filled']=array();
		if(!empty($cld)){
			foreach ($cld as $key => $chk) {
				if(empty($chk['check_description'])){
					$data['chk_fields_empty'][$chk['checklist_id']]=$chk['checklist_name'];
					continue;
				}
					$data['chk_fields_filled'][$chk['checklist_id']][0]=$chk['checklist_name'];
					$data['chk_fields_filled'][$chk['checklist_id']][1]=$chk['check_description'];
			}
			$data['chk_fields_empty']=json_encode($data['chk_fields_empty']);
		}
		//echo "<pre>";print_r($data);exit;
		$data['enquiry_id']=$enquiry_id;
		
		load_view('enquiry/ask_quote_mail', $data);
	}

	//mail_types: {0 : "ASK QUOTATION", 1 : "SEND QUOTATION", 2:"Booking_CONF", 3:"send_agent_details"}
  	public function send_mail($enquiry_id, $mail_type) { 
  	//echo "<pre>";print_r($_POST);print_r($_FILES);exit;
		extract($this->input->post());

		$file_path=realpath(APPPATH . '../email_attachments');
		$config['upload_path']   = $file_path;
		$config['allowed_types'] = '*';
		$config['max_size']	= '500'; 
		$this->load->library('upload', $config);

	 	if ( $this->upload->do_upload('up_file')) {
	 		$data = array('upload_data' => $this->upload->data()); 
     	}

 		$config_email['protocol'] = 'smtp';
		$config_email['smtp_host'] = 'smtp.bluehands.in'; //change this
		$config_email['smtp_port'] = '587';
		$config_email['smtp_user'] = 'bluetest1@bluehands.in'; //change this
		$config_email['smtp_pass'] = 'blue@4321'; //change this
		$config_email['mailtype'] = 'html';
		$config_email['smtp_crypto'] = 'tls';
		$config_email['charset'] = 'iso-8859-1';
		$config_email['wordwrap'] = TRUE;
		$config_email['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard

		//$email_from="bluetest1@bluehands.in";
        $this->load->library('email', $config_email); 
        	$this->email->from($email_from); 

    	if($mail_type==2){
        	$email_arr = explode('#', $email_to);
        	$email_to=$email_arr[2];
        	$contact_id_email_to=$email_arr[1];
        	$company_id_email_to=$email_arr[0];
    	}

    	$this->email->to($email_to);
    	$contact_ids_cc=array();
    	$email_to_cc=array();
        if(!empty($email_cc)){
        	foreach ($email_cc as $key => $email_contacts) {
        		$email_contacts_arr=explode("#", $email_contacts);
        		$email_ids[]=$email_contacts_arr[1];
        		$contact_ids_cc[]=$email_contacts_arr[0];
        	}
        	$email_to_cc=implode(",",$email_ids);
        	$contact_ids_cc=implode(",",$contact_ids_cc);
        	$this->email->cc($email_to_cc);
        }

        if(empty($sub)){
        	$sub_default=array("Ask Quotation Details", "Send Quotation Details", "Booking Confirmation Details", "Agent information");
			$sub=$sub_default[$mail_type];
		}
        	$this->email->subject($sub); 
        	$this->email->set_mailtype("html");
        if(!empty(@$data['upload_data']['file_name'])){
   			$this->email->attach($data['upload_data']['full_path']);
        }
        $mail_html="";
       	$service_id = $this->enquiry_model->get_service_id($enquiry_id);
        $category_id=$this->enquiry_model->get_orgs($company_id_email_to);

        if(!empty($checklist_name) && !empty($checklist_val)){
			$all_data['chk_name']=$checklist_name;
			$all_data['chk_desc']=$checklist_val;
			$all_data['terms_service'] = $this ->enquiry_model->get_terms_and_services($service_id);
			$mail_html=$this->load->view("enquiry/email_format",$all_data,true);

		}
        
    	$redirect_page="enquiry/index";
        if($mail_type==0){
        	$redirect_page="enquiry/ask_quotation/".$enquiry_id;
        	$this->enquiry_model->store_ask_quote_mail_info($enquiry_id, $service_id, $contact_ids_cc, $email_to_cc,  $category_id);
        }elseif($mail_type==1){
        	$this->enquiry_model->store_send_quote_mail_info($enquiry_id, $service_id, $contact_ids_cc, $email_to_cc, $category_id);
        }elseif($mail_type==2){
        	$booking=array();
        	$check_col=array();
        	$booking=array_combine($bkng1, $bkng);
        	$all_data['bkng']=$booking;
        	$mail_html=$this->load->view("enquiry/email_format",$all_data,true);
        	$this->enquiry_model->store_booking_mail_info($enquiry_id, $service_id, $contact_ids_cc, $email_to_cc, $category_id, $email_to, $booking);
        }
        elseif($mail_type==3){
        	$data['company_name'] = $company_name;
		    $data['first_name'] = $first_name;
		    $data['mob_no'] = $mob_no;
		    $data['tel_no'] = $tel_no;
		   	$data['addr'] = $addr;
		   	$data['agent_data']=1;
        	$mail_html=$this->load->view("enquiry/email_format",$data,true);
        	$this->enquiry_model->agent_details_sent($enquiry_id);
        }
        $this->email->message($msg.$mail_html.@$remark); 
        //Send mail 
        if($this->email->send()) {
         	$this->session->set_flashdata("msg","Email sent successfully."); 
         	
        }else {
         	$this->session->set_flashdata("msg","Error in sending Email."); 
         	//$x=show_error($this->email->print_debugger());
        }
        redirect($redirect_page,"refresh");
  	} 


  	public function send_quotation($enquiry_id, $contact_id){

  		$data['title']="Mail To Send Quotation";
		$data['email_to']=$this->enquiry_model->get_enquiry_mails($contact_id);
		$data['subject']="OCEAN FREIGHT QUOTATION";
		$data['email_list_for_cc']=$this ->enquiry_model->get_enquiry_mails(0);
		$data['email_from']=$this->user_email_id;
		$data['msg_body']='Dear Sir/Madam,&#13;&#10;PLEASE NOTE THE BEST RATES FOR YOUR VALUABLE INQUIRY AS BELOW';
		$data['mail_type']=1;
		$cld=$this ->enquiry_model->get_master_chklist($enquiry_id);
		$data['chk_fields_empty']=array();
		$data['chk_fields_filled']=array();
		if(!empty($cld)){
			foreach ($cld as $key => $chk) {
				if(empty($chk['check_description'])){
					$data['chk_fields_empty'][$chk['checklist_id']]=$chk['checklist_name'];
					continue;
				}
					$data['chk_fields_filled'][$chk['checklist_id']][0]=$chk['checklist_name'];
					$data['chk_fields_filled'][$chk['checklist_id']][1]=$chk['check_description'];
			}
			$data['chk_fields_empty']=json_encode($data['chk_fields_empty']);
		}

		$service_id = $this->enquiry_model->get_service_id($enquiry_id);
		$data['terms_service'] = $this ->enquiry_model->get_terms_and_services($service_id);
		//echo "<pre>";print_r($terms_service);exit;
		$data['enquiry_id']=$enquiry_id;
		
		load_view('enquiry/ask_quote_mail', $data);
  	}

  	public function booking_confirmation(){
  		$data['booking_format_id'] = $this->input->post('booking_format');
  		$data['enquiry_id'] = $this->input->post('enquiry_id');

  		$data['title']="Booking Confirmation Mail";
  		$data['mail_type']=2;
  		$data['subject']="New Booking";
		$data['email_to'] =  $this->enquiry_model->get_emails_of_agents();
		$data['email_list_for_cc']=$this->enquiry_model->get_enquiry_mails(0);
		$data['email_from'] = $this->user_email_id;
		$data['container_types'] = json_encode($this->enquiry_model->get_container_types());
		$data['container_volumes'] = json_encode($this->enquiry_model->get_container_volumes());
		$data['booking_chklist'] = $this->enquiry_model->get_booking_checklist($data['booking_format_id']);

		load_view('enquiry/ask_quote_mail', $data);
		//echo "<pre>";print_r($data);exit;
  	}

  	public function send_agent_details($enquiry_id, $contact_id){
  		$data['enquiry_id'] = $enquiry_id;
  		$data['mail_type'] = 3;
  		$data['subject'] = "AGENT DETAILS";
  		$data['title'] = "Agent Details To Client";
  		$data['email_to']=$this->enquiry_model->get_enquiry_mails($contact_id);
  		$data['email_list_for_cc']=$this->enquiry_model->get_enquiry_mails(0);
  		$data['email_from'] = $this->user_email_id;
  		$data['msg_body']='Dear Sir/Madam,&#13;&#10;PLEASE NOTE THE AGENT FOR THIS SHIPMENT IS AS BELOW';
  		$data['list_of_agent'] =  $this->enquiry_model->get_emails_of_agents();

  		load_view('enquiry/ask_quote_mail', $data);
  		//echo "<pre>";print_r($data);exit;
  	}

  	public function get_agent_info($agent_id){
  		$data = $this->enquiry_model->ask_quotation($agent_id);
  		echo json_encode($data);
  	}

  	public function approve_enquiry($enquiry_id){
	 	$this->enquiry_model->approve_enquiry($enquiry_id);
  	}

  	public function lost_enquiry(){
  		$lost_reason = $this->input->post('lost_reason');
  		$enquiry_id  = $this->input->post('enquiry_id');
  		$this->enquiry_model->lost_enquiry($enquiry_id, $lost_reason);


  	}

}