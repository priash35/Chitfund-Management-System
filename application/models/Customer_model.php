<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function __construct()
	{
		parent ::__construct();
	}
	public function get_custdata()
	{
		$this->db->select('*');
		$this->db->from('Customers');
		$this->db->order_by('id','DESC');
		$query= $this->db->get();
		return $query->result();
	}
	public function get_cust_basic($cus_id)
	{
		$this->db->select('*');
		$this->db->from('Customers');
		$this->db->where('id', $cus_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_cust_id($bank_id)
	{
		$this->db->select('cus_id');
		$this->db->from('Customer_Banks');
		$this->db->where('id', $bank_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_custdoc_id($doc_id)
	{
		$this->db->select('cus_id');
		$this->db->from('Customer_Documents');
		$this->db->where('id', $doc_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_cust_bank($cus_id)
	{			
		$this->db->select('*');
		$this->db->from('Customer_Banks');
		$this->db->where('cus_id', $cus_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_cust_docs($cust_id)
	{
		$this->db->select('*');
		$this->db->from('Customer_Documents');
		$this->db->where('cus_id', $cust_id);
		$query= $this->db->get();
		return $query->result();
	}
	public function get_cust_bank_details($id)
	{			
		$this->db->select('*');
		$this->db->from('Customer_Banks');
		$this->db->where('id', $id);
		$query= $this->db->get();
		return $query->row();
	}
	public function get_cust_doc_details($id)
	{			
		$this->db->select('*');
		$this->db->from('Customer_Documents');
		$this->db->where('id', $id);
		$query= $this->db->get();
		return $query->row();
	}
	
	//public function add_cust_basic($data,$mobile,$email)
	public function add_cust_basic($data)
	{
		/* $exists = $this->Customer_model->customer_exists($email,$mobile);
		$count = count($exists);
		  if(empty($count)){
			if($this->db->insert('Customers',$data))
			{
			 $cust_id=$this->db->insert_id();		
			 return $cust_id; 
			}
			else
			{
				//$msg = "Email id or Mobile Number already exist.";
				return false;
			}
		  }
		  else
		  {
			 //$msg = "Email id or Mobile Number already exist.";
			return false;
		  } */
		$result= $this->db->insert('Customers',$data);
		$cust_id=$this->db->insert_id();		
		return $cust_id; 
	}
	public function customer_exists($email,$mobile)
	{
		$this->db->select('*'); 
	    $this->db->from('Customers');
	    $this->db->where('email_1', $email);	    
		$this->db->or_where('mobile_1', $mobile);
	    $query = $this->db->get();
	    $result = $query->result();
	    if ($query->num_rows()){
			return true;
		}else{
			return false;
		}
	    //return $result;
	}
	public function add_cust_bank($data)
	{		
		$result= $this->db->insert('Customer_Banks',$data);
		$bank_id=$this->db->insert_id();
		return $bank_id;
	}
	public function add_cust_docs($data = array())
	{
		$this->db->insert_batch('Customer_Documents',$data);
		$insert=$this->db->insert_id();
        return $insert;
	}
	
	public function update_cust_basic($cus_id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$cus_id);
		$this->db->update('Customers');
		/* $msg = "Customer Updated Successfully.";
		return $msg; */
	}
	public function update_cust_bank($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('Customer_Banks');
	}
	public function update_cust_docs($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('Customer_Documents');
	}
	public function delete_cus_basic($cus_id)    
	{
		$this->db->where('id', $cus_id);
		$this->db->delete('Customers');
	}
	public function delete_cus_bank($cus_id)
	{
		$this->db->where('id', $cus_id);
		$this->db->delete('Customer_Banks');
		
	}
	public function delete_cus_docs($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('Customer_Documents');
	}
	public function check_name_values($f_name,$m_name,$l_name)
	//public function check_name_values($searchbox)
	{
		$this->db->select('*');
		$this->db->from('Customers');	
		//$this->db->where('first_name',$f_name);
		$query = $this->db->get();
		$result= $query->result(); 
		
		$name = array();
		$newname = $f_name." ".$m_name." ".$l_name;
		
		foreach($result as $row)
		{
			$name[] = $row->first_name." ".$row->middle_name." ".$row->last_name;
		}
		if(in_array($newname,$name)) 
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
	public function bank_exists($bank,$account,$id)
	{
		$this->db->select('*');
		$this->db->from('Customer_Banks');	
		$this->db->where('cus_id',$id);
		$this->db->where('bank_name',$bank);
		$this->db->where('account_number',$account);
		$query = $this->db->get();
		$result= $query->result(); 

		if ($query->num_rows()){
			return true;
		}else{
			return false;
		}
		
		/*$banks = array();
		$newbank = $bank.", ".$account;
		
		foreach($result as $row)
		{		
			$banks[] = $row->bank_name.", ".$row->account_number;
		}
		
		if(in_array($newbank,$banks)) 
		{
			return true;
		}
		else
		{
			return false;
		}*/
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
	public function get_family()
	{			
		$this->db->select('family');
		$this->db->distinct();
		$this->db->from('Customers');		
		$query= $this->db->get();
		$family = [];
		foreach($query->result() as $key => $val){
		    $family[] = $val->family;
		 }
		return $family;
	}
	
}


?>