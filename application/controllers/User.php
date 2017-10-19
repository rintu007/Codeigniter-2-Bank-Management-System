<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}
	
	public function index()
	{
		$data['message']='';
		$data['username']='';
		$this->load->view('User/View_Index',$data);
	}
	public function login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$data['username']=$username;
		if($username=="" || $password==""){
			
			$data['message']="Please Enter Username & Password<br/>";
			$this->load->view('User/View_Index',$data);
		}
		else{
			if(!$user=$this->UserModel->get($username)){
				
				$data['message']="Incorrect Username or Password<br/>";
				$this->load->view('User/View_Index',$data);
			}
			else{
				if($user['password']==$password){
					if($user['status']=='active'){
						
						$this->session->set_userdata('username',$user['username']);
						$this->session->set_userdata('usertype',$user['type']);
						
						
						if($user['type']=='admin'){
							redirect(base_url().'Admin/');
						}
						else if($user['type']=='account'){
							redirect(base_url().'Account/');
						}
					}
					else{						
						$data['message']="Your Account is blocked<br/>";
						$this->load->view('User/View_Index',$data);
					}
				}
				else{
					$data['message']="Incorrect Username or Password<br/>";
					$this->load->view('User/View_Index',$data);
				}
			}
		}
	}
	
	
	public function changepassword()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype){
			$data['username']=$this->session->userdata('username'); 
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$this->parser->parse('User/View_ChangePassword',$data);
			}
			else{
				if(!$this->form_validation->run('password')){
					$data['message']=validation_errors();
					$this->parser->parse('User/View_ChangePassword',$data);
				}
				else{
					$username=$this->input->post('username');
					$password['password']=$this->input->post('np');
					$this->UserModel->changePassword($password,$username);
					redirect(base_url()."User/changepassword");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	} 
	
	public function oldpass($str)
	{
		$username=$this->session->userdata('username');
		$user=$this->UserModel->get($username);
		if($user['password']==$str){
			return true;
		}
		else
		{
			$this->form_validation->set_message('oldpass', 'Current password is wrong');
			return false;
		}
	}
	public function newpass($str)
	{
		$pattern ="(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$)";
		
		if(preg_match($pattern, $str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('newpass', '**Password should contain 1 uppercase 1 lowercase 1 digit');
			return false;
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'User/');
	}
	public function error(){
		$this->load->view('User/View_Error');
	}
}