<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {

	public function __construct()
	{
		parent ::__construct();
	}
	public function get_companydata()
	{
		$this->db->select('*');
		$this->db->from('Companies');
		$query= $this->db->get();
		return $query->result();
	}
	public function get_company_basic()
	{
		$this->db->select('*');
		$this->db->from('Companies');
		//$this->db->where('id', $cus_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_cust_id($bank_id)
	{
		$this->db->select('cus_id');
		$this->db->from('Company_Bank_Details');
		$this->db->where('id', $bank_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_company_bank()
	{			
		$this->db->select('*');
		$this->db->from('Company_Bank_Details');
		//$this->db->where('cus_id', $cus_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_company_one_bank($id)

	{		
		$this->db->select('*');
		$this->db->from('Company_Bank_Details');
		$this->db->where('id', $id);
		$query= $this->db->get();
		return $query->result();
	}
	
	public function edit_company_basic($data)
	{

		$result= $this->db->update('Companies',$data);
		//$cust_id=$this->db->insert_id();		
		return true; 
	}
	public function add_company_bank($data)
	{		
		$result= $this->db->insert('Company_Bank_Details',$data);
		//$bank_id=$this->db->insert_id();
		return true;
	}
	
	public function update_company_basic($data)
	{
		$this->db->set($data);
		//$this->db->where('id',$cus_id);
		$this->db->update('Companies');
	}
	public function update_company_bank($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('Company_Bank_Details');
	}
	
	public function delete_company_basic($cus_id)    
	{
		$this->db->where('id', $cus_id);
		$this->db->delete('Companies');
	}
	public function delete_company_bank($cus_id)
	{
		$this->db->where('id', $cus_id);
		$this->db->delete('Company_Bank_Details');		
	}
	
	public function get_update_fields($key,$cus_id,$data,$table){
		
		$this->db->select('*');
		$this->db->from($table);	
		$this->db->where($key,$cus_id);		
		$query1= $this->db->get();
		$old_data = array();
		$old_data = $query1->result_array();
		print_r($old_data[0]);
		print_r($data);
		
		$diff = array_diff_assoc($data, $old_data[0]);
		return $diff;

	}

}


?>