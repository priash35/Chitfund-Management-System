<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model {

	public function __construct()
	{
		parent ::__construct();
	}
	
	public function get_groupmaster(){		
		$this->db->select('*');
		$this->db->from('Group_Master');
		$query= $this->db->get();
		return $query->result();

	}
	public function add_group_master($data)
	{		
		$result= $this->db->insert('Group_Master',$data);
		//$bank_id=$this->db->insert_id();
		return true;
	}
	public function update_group_master($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('Group_Master');
	}
	public function delete_group_master($id)    
	{
		$this->db->where('id', $id);
		$this->db->delete('Group_Master');
	}
	public function get_groupdata(){		
		$this->db->select('*');
		$this->db->from('Group_Defn');
		$query= $this->db->get();
		return $query->result();

	}
	public function get_single_groupdata($id){		
		$this->db->select('*');
		$this->db->from('Group_Defn');
		$this->db->where('id',$id);
		$query= $this->db->get();
		return $query->result();

	}
	public function delete_group($id)    
	{
		$this->db->where('id', $id);
		$this->db->delete('Group_Defn');
	}
	public function insert_group($data)
	{
		$result= $this->db->insert('Group_Defn',$data);
		$group_id=$this->db->insert_id();		
		return $group_id; 
	}
	public function get_group_types(){		
		$this->db->select('group_type, group_duration');
		$this->db->from('Group_Master');		
		$query= $this->db->get();
		return $query->result();

	}
	public function update_group($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('Group_Defn');
	}
	public function get_distinct_group_types(){		
		$this->db->select('group_type');
		$this->db->distinct();
		$this->db->from('Group_Master');		
		$query= $this->db->get();
		return $query->result();

	}
	public function get_company_banks(){		
		$this->db->select('id,CONCAT(bank_name, " - ", branch_name," - ",account_number) AS bank_id');
		$this->db->from('Company_Bank_Details');		
		$query= $this->db->get();
		return $query->result();

	}
	public function insert_first_customer($id,$uname){
		date_default_timezone_set("Asia/Kolkata");
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);
		$data= array(
				
				'group_id' => $id,
				'group_sr_no' => 1,
				'cust_id' => 0,
				'ticket_num' => 1,				
				'commitment_YN' => 'NO',
				'executive' => 0,		
				'coll_exec' => 0,
				'agreement_YN' => 'NO',
				'qr_code' => 0,
				'sec_cheque' => 0,
				'created_date' => $created_date,
				'created_by' => $uname,
				'updated_by' => $uname,
				'status' => 'ACTIVE'
			);		
		$result= $this->db->insert('Group_details',$data);
		$group_id=$this->db->insert_id();
		return true;

	}
	public function get_all_cust(){		
		$this->db->select('*');
		$this->db->from('Customers');
		$query= $this->db->get();
		return $query->result();

	}
	public function get_group_cust($id){		
		$this->db->select('group_id as id,cust_id,COUNT(ticket_num) as ticket_num');
		$this->db->from('Group_details');
		$this->db->where('group_id',$id);	
		$this->db->group_by('cust_id'); 
		$query= $this->db->get();
		return $query->result();

	}
	public function get_all_staff(){		
		$this->db->select('*');
		$this->db->from('staffs');
		$query= $this->db->get();
		return $query->result();

	}

}


?>