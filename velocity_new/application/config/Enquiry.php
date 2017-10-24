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
		//echo "<pre>";print_r($cld);exit;
		$data['enquiry_id']=$enquiry_id;
		
		load_view('enquiry/ask_quote_mail', $data);
	}


  	public function send_mail($enquiry_id) { 
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

 		//$from_email = $email_from; 
		$from_email = "bluetest1@bluehands.in"; 
 		//$to_email = $email_to; 
		$to_email = "harshad@bluehands.in";
		
		$config1['protocol'] = 'smtp';
		$config1['smtp_host'] = 'smtp.bluehands.in'; //change this
		$config1['smtp_port'] = '587';
		$config1['smtp_user'] = 'bluetest1@bluehands.in'; //change this
		$config1['smtp_pass'] = 'blue@4321'; //change this
		$config1['mailtype'] = 'html';
		$config1['smtp_crypto'] = 'tls';
		$config1['charset'] = 'iso-8859-1';
		$config1['wordwrap'] = TRUE;
		$config1['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
        $this->load->library('email',$config1); 
        $this->email->from($from_email); 
        $this->email->to($to_email);
        if(!empty($email_cc)){
        	$this->email->cc(implode(",",$email_cc));
        }
		if(empty($sub)){
			$sub="Quotation details";
		}
		
        $this->email->subject($sub); 
        $this->email->set_mailtype("html");
        if(!empty(@$data['upload_data']['file_name'])){
   			$this->email->attach($data['upload_data']['full_path']);
        }
        $mail_html="";
        if(!empty($checklist_name) && !empty($checklist_val)){
			$all_data['chk_name']=$checklist_name;
			$all_data['chk_desc']=$checklist_val;
			$mail_html=$this->load->view("enquiry/email_format",$all_data,true);
		}
        $this->email->message($msg.$mail_html.@$remark); 
        $service_id = $this->enquiry_model->get_service_id($enquiry_id);
        $this->enquiry_model->store_ask_quote_mail_info($enquiry_id, $service_id);


        //Send mail 
        if($this->email->send()) {
         	//$this->session->set_flashdata("email_sent","Email sent successfully."); 
			echo "Email sent successfully.";exit;
//$this->ask_quotation($enquiry_id,"Email sent successfully.");
        }else {
				print_r(show_error($this->email->print_debugger()));exit;
         	//$this->session->set_flashdata("email_sent","Error in sending Email."); 
         	//$this->ask_quotation($enquiry_id, "Error in sending Email.");
        } 
  	} 
}