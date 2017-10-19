<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AccountModel');
		$this->load->model('TransactionModel');
		
	}
	
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		$accountNo=$this->session->userdata('username');
		if($usertype=='account'){
			$data['account']=$this->AccountModel->get($accountNo);
			$data['balance']=$this->TransactionModel->getBalance($accountNo);
			$this->parser->parse('Account/View_Home',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function details($accountNo)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='admin'){
			$data['account']=$this->AccountModel->get($accountNo);
			$data['balance']=$this->TransactionModel->getBalance($accountNo);
			$this->parser->parse('Account/View_Details',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function deleteAccount($accountNo)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='admin'){
			if(!$this->input->post('buttonSubmit')){
				$data['account']=$this->AccountModel->get($accountNo);
				$data['balance']=$this->TransactionModel->getBalance($accountNo);
				$this->parser->parse('Account/View_Delete',$data);
			}
			else{
				$accountNo=$this->input->post('accountNo');
				$this->AccountModel->deleteAccount($accountNo);
				redirect(base_url()."Admin/");
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function edit($accountNo)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='admin'){
			$data['account']=$this->AccountModel->get($accountNo);
			$data['balance']=$this->TransactionModel->getBalance($accountNo);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Account/View_Edit',$data);
			}
			else{
				if(!$this->form_validation->run('accountedit')){
					$data['message']=validation_errors();
					$this->parser->parse('Account/View_Edit',$data);
				}
				else{
					$accountNo=$this->input->post('accountNo');
					$account['name']=$this->input->post('name');
					$account['email']=$this->input->post('email');
					$account['phone']=$this->input->post('phone');
					$this->AccountModel->edit($account,$accountNo);
					redirect(base_url()."Admin/");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function create()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='admin'){
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Account/View_Create',$data);
			}
			else{
				if(!$this->form_validation->run('accountadd')){
					$data['message']=validation_errors();
					$this->parser->parse('Account/View_Create',$data);
				}
				else{
					$account['accountNo']=$this->input->post('accountNo');
					$account['name']=$this->input->post('name');
					$account['email']=$this->input->post('email');
					$account['phone']=$this->input->post('phone');
					//$account['date']=date('Y-m-d');
					$accountNo=$account['accountNo'];
					$password=$account['phone'];
					$type="account";
					$status='active';
					$this->AccountModel->insert($account,$accountNo,$password,$type,$status);
					redirect(base_url()."Admin/");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
}