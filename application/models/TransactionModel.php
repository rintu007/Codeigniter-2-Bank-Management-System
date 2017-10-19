<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransactionModel extends CI_Model {
	
	public function transaction($transaction)
	{
		
		$this->db->insert('transaction', $transaction);
	}
	public function getAll()
	{
		$result = $this->db->get('transaction');
		return $result->result_array();
	}
	public function get($accountNo)
	{
		$this->db->where('accountNo',$accountNo);
		$result = $this->db->get('transaction');
		return $result->result_array();
	}
	public function getBalance($accountNo)
	{
		$this->db->select('SUM(deposit-withdraw) as balance');
		$this->db->where('accountNo',$accountNo);
		$result = $this->db->get('transaction');
		return $result->row_array();
	}
	
	
}