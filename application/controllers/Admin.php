<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AccountModel');
	}
	
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		$currentsession=$this->session->userdata('currentsession');
		if($usertype=='admin'){
			$data['accounts']=$this->AccountModel->getAll();
			$this->parser->parse('Admin/View_Home',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
}