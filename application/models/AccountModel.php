<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountModel extends CI_Model {
	
	public function insert($account,$accountNo,$password,$type,$status)
	{
		$sql = "create or replace trigger add_account after insert on accountInfo for each row begin INSERT INTO user VALUES ('$accountNo','$password','$type','$status');end;";
		$this->db->query($sql);
		$this->db->insert('accountInfo', $account);
	}
	public function deleteAccount($accountNo)
	{
		$this->db->where('accountNo',$accountNo);
		$this->db->delete('accountInfo');
		$this->db->where('username',$accountNo);
		$this->db->delete('user');
		$this->db->where('accountNo',$accountNo);
		$this->db->delete('transaction');
	}
	public function edit($account,$accountNo)
	{
		$this->db->where('accountNo',$accountNo);
		$this->db->update('accountInfo',$account);
	}
	public function getAll()
	{
		$result = $this->db->get('accountInfo');
		return $result->result_array();
	}
	public function get($accountNo)
	{
		$this->db->where('accountNo',$accountNo);
		$result = $this->db->get('accountInfo');
		return $result->row_array();
	}
	
	
}