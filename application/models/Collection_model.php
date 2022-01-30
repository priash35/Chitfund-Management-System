<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_model extends CI_Model {

	public function __construct()
	{
		parent ::__construct();
		date_default_timezone_set("Asia/Kolkata");
	}
	public function get_all_executives()
	{			
		$this->db->select('s.id, s.first_name, s.last_name');
		$this->db->from('staffs s');
		$this->db->join('Group_details g', 's.id = g.coll_exec');
		$this->db->group_by('g.coll_exec');
		$query= $this->db->get();
		return $query->result();
	}
	public function add_collection_data($data = array(),$type,$status)
	{
		/* $cur_date = $data[0]['coll_date'];
		$group_id = $data[0]['group_id']; */
		$cnt= count($data);
		$records = array();
		$trans_id = array();
		foreach($data as $row)
		{
			$records[] = $row;
		}

		//$this->db->trans_strict(TRUE);
		$this->db->trans_start(); # Starting Transaction
		//$this->db->trans_strict(TRUE);
		
		//$query = $this->db->insert_batch('Transactions', $data);
		
		/*if ($type == 2)
			$query1 = $this->db->insert_batch('ChequeDD_Details', $bank);*/
		foreach($records as $value)
		{
			//print_r($value['other_group']);
			//die();
			$cust_id = $value['cust_id'];
			$grp_id	= $value['group_id'];
			$cur_date = $value['coll_date'];
			$record_id=0;
			$cheq_arr= array();
			if ($type == 2){
				foreach($value['other_group'] as $key => $post)
				{
					$cnt = count($post);
					for($i=0; $i<$cnt; $i++)
					{
						$res = explode(',',$post[$i]);
						$group_id = $res[0];
						$amount = $res[1]; 
						$cheq_arr[$key][$group_id]=$amount;
					}
									
				}
				$bank = array(
					'chqdd_num' => $value['chqdd_num'],
					'chqdd_amount' => $value['chqdd_amount'],
					'bank_name' => $value['bank_name'],
					'branch_name' => $value['branch_name'],
					'created_date' => $value['created_date'],
					'created_by' => $value['created_by'],
					'updated_by' => $value['updated_by']						
				);

				$query1 = $this->db->insert('ChequeDD_Details', $bank);
				$record_id = $this->db->insert_id();
			}
			$data1 = array(
				'coll_date' => date("Y-m-d", strtotime($value['coll_date'])),
				'group_id' => $value['group_id'],
				'coll_exec_id' => $value['coll_exec_id'],
				'cust_id' => $value['cust_id'],
				'amount' => $value['amount'],
				'tran_type' => $value['tran_type'],
				'collection_type' => $value['collection_type'],
				'mode' => $value['mode'],
				'cheq_num' => $record_id,					
				'created_date' => $value['created_date'],
				'created_by' => $value['created_by'],
				'updated_by' => $value['updated_by']						
			);
			$query = $this->db->insert('Transactions', $data1);
			
			$date = $this->Collection_model->get_datewise_data($cur_date,$grp_id);
			$tickets = $this->Collection_model->num_tickets($cust_id,$grp_id,$date);
			
			if ($type ==2){
				$amount = $cheq_arr[$cust_id][$grp_id]/$tickets;
			}else{			
				$amount = $value['amount']/$tickets;
			}	
			
			$trans = $this->Collection_model->get_trans_id($cust_id);
			if ($type==1){
			$results = array(
				'collection_amt' => 'collection_amt + '.$amount,
				'tran_id' => "CONCAT_WS(',', NULLIF(tran_id,'0'), '".$trans."')",				
				'collection_date' => date("Y-m-d", strtotime($value['coll_date'])),
				'status' => $status
			);
			foreach ($results as $key=>$val) {
				if ($key != 'status' && $key != 'collection_date'){
   				 	$this->db->set($key, $val, FALSE);
				}else{
					$this->db->set($key, $val);
				}
			}
			
			//$this->db->set($results,FALSE);
			$this->db->where('cus_id',$cust_id);
			$this->db->where('group_id',$grp_id);
			$this->db->where('sub_date',$date);
			 //echo $this->db->get_compiled_update('Group_Collections');
			$this->db->update('Group_Collections');
			}
			//die();			
			
			if ($type==2){	
				$mode = $value['mode'];
				foreach ($cheq_arr[$cust_id] as $key=>$val) 
				{
					if ($key != $grp_id)
					{	
						$this->Collection_model->update_other_group($key,$cust_id,$cur_date,$trans,$val,$mode);
						$new_data = array(
							'cust_id' => $cust_id,
							'group_id' => $key,
							'group_amount' => $val,
							'bank_id' => $record_id,
							'chqdd_number' => $value['chqdd_num']
						);
						
						$query = $this->db->insert('Internal_Bank_Transfer', $new_data);
					}
				}
			}
		}	
		
		$this->db->trans_complete(); # Completing transaction
		
		/* if ($this->db->trans_status() === FALSE)    //if Something went wrong.
		{
			$this->db->trans_rollback();
			return FALSE;
		} 
		else 				// Everything is Perfect. Committing data to the database.
		{
			$this->db->trans_commit();
			return TRUE;
		} */
		//die();
	}
	
	public function get_trans_id($cust_id)
	{
		$this->db->select('id');
		$this->db->from('Transactions');
		$this->db->where('cust_id',$cust_id);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1, 0);
		$query= $this->db->get();
		$result = $query->result();
		$trans = $result[0]->id;
		
		return $trans;
	}	
	public function num_tickets($cust_id,$grp_id,$date)
	{
		$this->db->select('ticket_num');
		$this->db->from('Group_Collections');
		$this->db->where('cus_id',$cust_id);
		$this->db->where('group_id',$grp_id);
		$this->db->where('sub_date',$date);
		$query= $this->db->get();
		$result = $query->result();
		return count($result);
		/* echo "<pre>";
			print_r($result);
			
			echo "</pre>";
			die();  */
	}
	public function get_datewise_data($cur_date,$group_id)
	{
		$this->db->select('sub_date');
		$this->db->from('Group_Collections');
		$this->db->where('sub_date<=',$cur_date);
		$this->db->where('group_id',$group_id);
		$this->db->order_by('sub_date', 'DESC');
		$this->db->limit(1, 0);
		$query= $this->db->get();
		$result = $query->result();
		$date = $result[0]->sub_date;
		
		return $date;
		/* $this->db->select('*');
		$this->db->from('group_collections');
		$this->db->where('sub_date',$date);
		$this->db->where('group_id',$group_id);
		$query1= $this->db->get();
		return $query1->result(); */
		
		/*echo "<pre>";
			print_r($result);
			
			echo "</pre>";
			die();*/
	}
	public function get_groups($exec_id)
	{
		$this->db->select('gd.id, gd.group_name');
		$this->db->from('Group_Defn gd');
		$this->db->join('Group_details g', 'gd.id = g.group_id');
		$this->db->where('g.coll_exec', $exec_id);
		$this->db->where('gd.status', 'ACTIVE');
		$this->db->group_by('g.group_id');
		$query= $this->db->get();
		return $query->result();
	}
	public function get_cust_group($id)
	{
		$this->db->select('gd.id, gd.group_name');
		$this->db->from('Group_Defn gd');
		$this->db->join('Group_details g', 'gd.id = g.group_id');
		$this->db->join('Group_Collections gc', 'gd.id = gc.group_id');
		$this->db->where('g.cust_id', $id);
		$this->db->group_by('g.group_id');
		$query= $this->db->get();
		return $query->result();
	}
	public function get_all_cust($exec_id,$group_id,$date)
	{
		$now_date = $this->get_datewise_data($date,$group_id);
		$this->db->distinct();
		$this->db->select('cust_id');
		$this->db->from('Group_details');
		$this->db->where('group_id',$group_id);
		$this->db->where('coll_exec',$exec_id);
		$where_clause= $this->db->get_compiled_select();
		$this->db->select('c.id, c.first_name, c.last_name,sum(gc.collection_amt) as c_amt,gc.status');
		$this->db->from('Group_Collections as gc, Customers as c');
		$this->db->where('gc.group_id', $group_id);
		$this->db->where('c.id IN ('.$where_clause.')');
		$this->db->where('gc.sub_date', $now_date);	
		$this->db->where('gc.cus_id = c.id');		
		$this->db->group_by('gc.cus_id');
		
		$query= $this->db->get();

		return $query->result();
	}
	public function calculate_outstanding($group_id,$cust_id,$coll_date)
	{

		$this->db->select('SUM(sub_amt) - SUM(collection_amt) as out_amt',FALSE);
		$this->db->from('Group_Collections');
		$this->db->where('group_id', $group_id);
		$this->db->where('cus_id',$cust_id);
		$this->db->where('sub_date <=', $coll_date);		
		$query= $this->db->get();
	/*	echo $this->db->get_compiled_select();
		die();*/
		return $query->row()->out_amt;
	}
	public function get_checkstatus($group_id,$cust_id,$coll_date){	

		$this->db->select('sum(gc.collection_amt) as amount,cd.status');
		$this->db->from('Transactions t, ChequeDD_Details cd, Group_Collections as gc');
		$this->db->where('t.group_id', $group_id);
		$this->db->where('t.cust_id',$cust_id);
		$this->db->where('t.coll_date', $coll_date);
		$this->db->where('t.id in (gc.tran_id)');
		$this->db->where('cd.id=t.cheq_num');
		
		$row = $this->db->get()->row();
		
		if (!empty($row->amount)){
			$c_num= $row->cheq_num;
			$amount = $row->amount;
		}else{
			$c_num = '';
		}
		if (!empty($c_num)){
			$this->db->select('status');
			$this->db->from('ChequeDD_Details');
			$this->db->where('id', $c_num);		
			$query= $this->db->get();
			$result = array(
				'status'=> $query->row()->status,
				'amount'=> $amount
			);
			return $result;
		}else{
			return "CASH";
		}
	}
	/*public function update_other_group($group_id,$cust_id,$coll_date,$trans)
	{
			$date = $this->Collection_model->get_datewise_data($coll_date,$group_id);
			$tickets = $this->Collection_model->num_tickets($cust_id,$group_id,$date);			
			$amount = $value['amount']/$tickets;	
					
			$results = array(
				'collection_amt' => 'collection_amt + '.$amount,
				'tran_id' => "CONCAT_WS(',', NULLIF(tran_id,'0'), '".$trans."')",				
				'collection_date' => $value['coll_date'],				
			);
			foreach ($results as $key=>$val) {				
				$this->db->set($key, $val);				
			}
			
			//$this->db->set($results,FALSE);
			$this->db->where('cus_id',$cust_id);
			$this->db->where('group_id',$grp_id);
			$this->db->where('sub_date',$date);
			 //echo $this->db->get_compiled_update('Group_Collections');
			$this->db->update('Group_Collections');	
		
	}*/
	public function update_other_group($group_id,$cust_id,$coll_date,$trans,$amnt,$mode)
	{
			
			$date = $this->Collection_model->get_datewise_data($coll_date,$group_id);
			$tickets = $this->Collection_model->num_tickets($cust_id,$group_id,$date);			
			$amount = $amnt/$tickets;
			
			if($mode == 'CHEQUE' || $mode == 'DD')
			{
				$results = array(
				'uncleared_amt' => 'uncleared_amt + '.$amnt,
				'tran_id' => "CONCAT_WS(',', NULLIF(tran_id,'0'), '".$trans."')",				
				'collection_date' => date("Y-m-d", strtotime($coll_date)),				
				);
			}
			else
			{
				$results = array(
				'collection_amt' => 'collection_amt + '.$amount,
				'tran_id' => "CONCAT_WS(',', NULLIF(tran_id,'0'), '".$trans."')",				
				'collection_date' => date("Y-m-d", strtotime($coll_date)),				
				);
			}				
			foreach ($results as $key=>$val) {				
					if ($key != 'collection_date'){
						$this->db->set($key, $val, FALSE);
					}else{
						$this->db->set($key, $val);
					}			
				}
				
				//$this->db->set($results,FALSE);
				$this->db->where('cus_id',$cust_id);
				$this->db->where('group_id',$group_id);
				$this->db->where('sub_date',$date);
				 //echo $this->db->get_compiled_update('Group_Collections');
				$this->db->update('Group_Collections');	
		
			
	}
	
	public function check_name_values($bank,$cheque)
	{
		$this->db->select('*');
		$this->db->from('ChequeDD_Details');	
		$this->db->where('bank_name',$bank);
		$this->db->where('chqdd_num',$cheque);
		$query = $this->db->get();
		$result= $query->result(); 
		
		$banks = array();
		$newbank = $bank.", ".$cheque;
		
		foreach($result as $row)
		{		
			$banks[] = $row->bank_name.", ".$row->chqdd_num;
		}
		
		if(in_array($newbank,$banks)) 
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
	
	
	public function get_bankdata()
	{
		$this->db->select('*');
		$this->db->from('ChequeDD_Details');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		$result= $query->result(); 
		return $result;
	}
	public function get_chq_dates($bank_id)
	{
		$this->db->select('id, chqdd_date, deposit_date, clear_date, status');
		$this->db->from('ChequeDD_Details');
		$this->db->where('id', $bank_id);
		$query = $this->db->get();
		$result= $query->result(); 
		return $result;
	}
	public function update_bank_details($data, $id)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('ChequeDD_Details');
	}
	
}


?>
	
