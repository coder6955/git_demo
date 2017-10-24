<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	
	public function __construct() { 
		
		 parent::__construct();
		 $this->load->model('menus');
		 $this->load->model('Invoice_model');
		 if (!$this->session->userdata('admin_id')) 
		{
			redirect('login');
		}
	}

	public function index()
	{
		if ($this->session->userdata('admin_id') != '') 
		{
			// $menu['invoice'] = $this -> menus->getInvoiceDetails();
			$data['menu'] = $this -> menus->getAllMenus();
			$this->load->view('header',$data);
			$data['allinvoice'] = $this -> invoice_model->getAllInvoice();
			$data['invoiceNum']=$this->invoice_model->getinvoiceNum();
			$data['allinvoiceformat'] = $this -> invoice_model->getAllInvoiceformat();
			$this->load->view('invoice/all-invoice',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	
	public function genrate($id)
	{
		if ($this->session->userdata('admin_id') != '') 
		{
			//$data['AllenqbyID']=$this -> menus->getAllenqbyID($id);
			$data['menu'] = $this -> menus->getAllMenus();
			$this->load->view('header',$data);
			$data['Allcompany']=$this->invoice_model->getAllcompany();
			// $data['Enquiry_no']=$this->invoice_model->getenqno($id);
			$data['Allsupplier']=$this->invoice_model->getAllsupplier();
			$data['Allportload']=$this->invoice_model->getAllportload();
			$data['Allportdelivery']=$this->invoice_model->getAllportdelivery();
			$data['Allvolume']=$this->invoice_model->getAllvolume();
			$data['Allcontainer']=$this->invoice_model->getAllContainer();
			$data['Allcharges']=$this->invoice_model->getAllCharges($id);
			$this->load->view('invoice/add-invoice',$data);
			$this->load->view('footer');	
		}
		else
		{
			redirect('login');
		}
	}
	public function save()
	{
		$this -> menus->savedata();
	}
	
	
	
	
}