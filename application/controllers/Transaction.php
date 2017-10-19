<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AccountModel');
		$this->load->model('TransactionModel');
	}
	
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='admin'){
			$data['transaction']=$this->TransactionModel->getAll();
			$this->parser->parse('Transaction/View_Transaction',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function details($accountNo)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype){
			$data['accountNo']=$accountNo;
			$data['transaction']=$this->TransactionModel->get($accountNo);
			$data['balance']=$this->TransactionModel->getBalance($accountNo);
			$this->parser->parse('Transaction/View_AccountTransaction',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function deposit()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='admin'){
			$data['accounts']=$this->AccountModel->getAll();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Transaction/View_Deposit',$data);
			}
			else{
				if(!$this->form_validation->run('transaction')){
					$data['message']=validation_errors();
					$this->parser->parse('Transaction/View_Deposit',$data);
				}
				else{
					$transaction['accountNo']=$this->input->post('accountNo');
					$transaction['deposit']=$this->input->post('amount');
					$transaction['withdraw']=0;
					$transaction['date']=date('Y-m-d');
					$this->TransactionModel->transaction($transaction);
					redirect(base_url()."Transaction/");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function withdraw()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='admin'){
			$data['accounts']=$this->AccountModel->getAll();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Transaction/View_Withdraw',$data);
			}
			else{
				if(!$this->form_validation->run('transaction')){
					$data['message']=validation_errors();
					$this->parser->parse('Transaction/View_Withdraw',$data);
				}
				else{
					$transaction['accountNo']=$this->input->post('accountNo');
					$transaction['withdraw']=$this->input->post('amount');
					$transaction['deposit']=0;
					$transaction['date']=date('Y-m-d');
					$this->TransactionModel->transaction($transaction);
					redirect(base_url()."Transaction/");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
}