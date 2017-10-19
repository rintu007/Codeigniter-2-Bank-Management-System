<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (

	'accountadd' => array (
		array(
		        'field' => 'accountNo',
		        'label' => 'Account No',
		        'rules' => 'required|max_length[16]|is_unique[accountInfo.accountNo]'
			),
		array(
		        'field' => 'name',
		        'label' => 'Name',
		        'rules' => 'required'
			),
		array(
		        'field' => 'phone',
		        'label' => 'Phone Number',
		        'rules' => 'required|max_length[11]|is_natural|is_unique[accountInfo.phone]'
			),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'required|valid_email|is_unique[accountInfo.email]'
			),
		
		
	),
	
	'accountedit' => array (
		
		array(
		        'field' => 'name',
		        'label' => 'Name',
		        'rules' => 'required'
			),
		array(
		        'field' => 'phone',
		        'label' => 'Phone Number',
		        'rules' => 'required|max_length[11]|is_natural'
			),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'required|valid_email'
			),
		
		
	),
	
	
	'transaction' => array (
		array(
		        'field' => 'accountNo',
		        'label' => 'Account No',
		        'rules' => 'required'
			),
		
		array(
		        'field' => 'amount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
		
	),
	
	
	
	
	'password' => array (
		array(
		        'field' => 'cp',
		        'label' => 'current password',
		        'rules' => 'required|callback_oldpass'
			),
		array(
		        'field' => 'np',
		        'label' => 'new password',
		        'rules' => 'required|min_length[8]|callback_newpass'
			),
		array(
		        'field' => 'cnp',
		        'label' => 'confirm password',
		        'rules' => 'required|matches[np]'
			),
	),
	
	
	
);
