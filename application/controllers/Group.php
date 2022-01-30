<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
	public function __construct()
	{
		//parent::Controller();
		parent::__construct();
		if (!isset($_SESSION['user_logged'])) {
			
			$this->session->set_flashdata("error", "please login first view of page");
			redirect("login/index","refresh");
		}
		$this->load->library('form_validation');
		$this->load->model('Group_model');	
		$this->load->model('Admin_model');	
			
	}	
	public function define_group()
	{
		$role_id= $_SESSION['role'];
		$data = array();
		$data['records'] = array();
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Group_model->get_groupmaster();			
		$this->load->view('group/define-group',$data);
	}
	
	public function get_group_name($group_type,$group_duration)
	{			
		switch($group_type){
			case "DAILY": 
				$query = $this->db->query('SELECT max(group_name) as g FROM Group_Defn where group_type = "'.$group_type.'"');				
				$res = $query->result();						
				$row = $res[0]; 
				if ($row->g != ''){
					$strg = explode("_",$row->g);
					return "D_". sprintf("%02d", ($strg[1]+1));				
				}else{
					return "D_01";
				}
				break;
			case "WEEKLY": 
				$query = $this->db->query('SELECT max(group_name) as g FROM Group_Defn where group_type = "'.$group_type.'"');				
				$res = $query->result();						
				$row = $res[0]; 
				if ($row->g != ''){
					$strg = explode("_",$row->g);
					return "SWL_".sprintf("%02d", ($strg[1]+1));					
				}else{
					return "SWL_01";
				}
				
				break;
			case "MONTHLY":
				$more40 = FALSE; 
				if ($group_duration > '40'){
					$add_query = " and group_duration > '40'";
					$more40 = TRUE;
				}else{
					$add_query = " and group_duration <= '40'";
				}
				$query = $this->db->query('SELECT max(group_name) as g FROM Group_Defn where group_type = "'.$group_type.'"'.$add_query);				
				$res = $query->result();						
				$row = $res[0]; 
				if ($row->g != ''){
					$strg = explode("_",$row->g);
					if($more40){
						return "SMK_".sprintf("%02d", ($strg[1]+1));	
					}else{
						return "SMKL_".sprintf("%02d", ($strg[1]+1));	
					}			
				}else{
					if ($more40){
						return "SMK_01";
					}else
					{
						return "SMKL_01";
					}
				}
				break;

		}
		
	}
	public function calc_group_term_date($group_type,$group_duration,$start_date)
	//public function calc_group_term_date()
	{		
		switch($group_type){
			case "DAILY": 
				$term_date = date('Y-m-d', strtotime($start_date. ' + '.$group_duration.' days'));
				return $term_date;
				break;
			case "WEEKLY": 
				$inc = $group_duration * 7;
				$term_date = date('Y-m-d', strtotime($start_date. ' + '.$inc.' days'));
				return $term_date;
				break;
			case "MONTHLY":
				
				$term_date = date('Y-m-d', strtotime($start_date. ' + '.$group_duration.' months'));
				return $term_date;				
				break;

		}

	}
	public function generate_sub_dates($group_type,$group_duration,$start_date)
	//public function generate_sub_dates()
	{
		/*$group_type = 'DAILY';
		$group_duration = '5';
		$start_date = '2018-4-24';*/		
		switch($group_type){
			case "DAILY": 
				$sub_date = array();
				for ($i=0;$i<$group_duration;$i++){
					$start_date = date('Y-m-d', strtotime($start_date. ' + 1 days'));
					array_push($sub_date, $start_date);
				}				
				return($sub_date);
				break;
			case "WEEKLY": 
				$sub_date = array();
				for ($i=0;$i<$group_duration;$i++){
					$start_date = date('Y-m-d', strtotime($start_date. ' + 7 day'));
					array_push($sub_date, $start_date);
				}				
				return($sub_date);
				break;
			case "MONTHLY":				
				$sub_date = array();
				for ($i=0;$i<$group_duration;$i++){
					$start_date = date('Y-m-d', strtotime($start_date. ' +1 month'));
					array_push($sub_date, $start_date);
				}				
				return($sub_date);
				break;

		}

	}
	public function generate_group_sub($user,$group_id,$group_type,$group_duration,$start_date)
	//public function generate_group_sub()
	{
		date_default_timezone_set("Asia/Kolkata");
		/*$group_id="3";
		$group_type = 'MONTHLY';
		$group_duration = '50';
		$start_date = '2018-4-24';
		$user = '3';*/
		$sub_dates=	$this->generate_sub_dates($group_type,$group_duration,$start_date);	
		$all_records = array();
		foreach ($sub_dates as $value) {
			$record['group_id'] = $group_id;
			$record['sub_date'] = $value;
			$record['sub_value'] = 0;
			$record['created_by'] = $user;
			$record['created_date'] = date("Y-m-d");
			$record['updated_by'] = $user;
			array_push($all_records, $record);
		}
		$this->db->insert_batch('Group_Sub',$all_records);
		return true;	

	}
	//public function generate_group_collections($user,$group_id)
	public function generate_group_collections()
	{
		date_default_timezone_set("Asia/Kolkata");
		$group_id="2";
		$query = $this->db->query('SELECT *  FROM Group_Defn where id = '.$group_id);				
		$res = $query->result();						
		$row = $res[0]; 
		$group_type = $row->group_type;
		$group_duration = $row->group_duration;
		$start_date = $row->comm_date;
		$user = '3';
		$sub_dates=	$this->generate_sub_dates($group_type,$group_duration,$start_date);	


		$query1 = $this->db->query('SELECT *  FROM Group_details where group_id = '.$group_id);	
		$result=$query1->result();
		$all_records = array();
		foreach ($sub_dates as $value) {
			foreach ($result as $row) {
				$record['group_id'] = $group_id;
				$record['cus_id'] = $row->cust_id;
				$record['ticket_num'] = $row->ticket_num;
				$record['sub_date'] = $value;
				$record['created_by'] = $user;
				$record['created_date'] = date("Y-m-d");
				$record['updated_by'] = $user;
				array_push($all_records, $record);			
			}			
		}
		$this->db->insert_batch('Group_Collections',$all_records);
		return true;	

	}
	public function add_customer_to_group($user,$group_id,$cus_id,$no_ticks,$commitment,$exec,$coll_exec,$agreement)
	//public function add_customer_to_group()
	{
		date_default_timezone_set("Asia/Kolkata");
		$all_records = array();
		/*$group_id="2";
		$cus_id = '16';
		$no_ticks = '10';
		$commitment = 'YES';
		$user = '3';
		$exec = '3';
		$coll_exec = '3';
		$agreement = 'YES';*/
		$query = $this->db->query('SELECT max(group_sr_no) as g FROM Group_details where group_id = '.$group_id);				
		$res = $query->result();						
		$row = $res[0]; 
		if ($row->g != ''){
			$sr_no = $row->g+1;
		}else{
			$sr_no = 1;
		}
		for ($i=0; $i < $no_ticks ; $i++) { 
			$record['group_id'] = $group_id;
			$record['group_sr_no'] = $sr_no+$i;
			$record['cust_id'] = $cus_id;
			$record['ticket_num'] = $sr_no+$i;		
			$record['commitment_YN'] = $commitment;
			$record['executive'] = $exec;
			$record['coll_exec'] = $coll_exec;
			$record['agreement_YN'] = $agreement;
			$record['created_date'] = date("Y-m-d");
			$record['created_by'] = $user;
			$record['updated_by'] = $user;
			array_push($all_records, $record);
		}
		
		$this->db->insert_batch('Group_details	',$all_records);
		
		return true;	

	}
	public function add_groupdefn()
	{
		//$last_id = $this->db->select('id')->order_by('id',"desc")->limit(1)->get('customers')->row();
		$uname = $_SESSION['username'];
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);			
		$updated_date= date("Y-m-d h:i:s");	
		
		
			 $data= array(				
				'group_type' => $_POST['group_type'],
				'group_duration' => $_POST['group_duration'],
				'duration_unit' => $_POST['duration_unit'],				
				'created_date' => $created_date,
				'updated_date' => $updated_date,
				'created_by' => $uname		
			);
			
			$result= $this->Group_model->add_group_master($data);
			//redirect("Customer/add_Custdata/".$result);
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['records'] = $this->Group_model->get_groupmaster();		
			$this->session->set_flashdata('msg', 'Record added.');
			$this->load->view("group/define-group",$data);
		
	}
	public function EditGroupMaster($id)
	{
			
		$role_id= $_SESSION['role'];
		$data = array();
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);		
		$data['records'] = $this->Group_model->get_groupmaster();		
		$this->load->view('group/edit_group_master',$data);
	}	
	
	public function DeleteGroupMaster($id)
	{
		//$id = $_REQUEST['id'];
		$this->Group_model->delete_group_master($id);
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];			
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Group_model->get_groupmaster();			
		$this->session->set_flashdata('msg', 'Group master deleted.');
		$this->load->view('group/define-group',$data);
		
	}
	public function update_groupmaster()
	{			
		
		$uname = $_SESSION['username'];
					
			$timestamp = time();			
			$created_date= date("Y-m-d", $timestamp);
			
			$updated_date= date("Y-m-d h:i:s");			
			
			$data= array(				
				'group_type' => $_POST['group_type'],
				'group_duration' => $_POST['group_duration'],
				'duration_unit' => $_POST['duration_unit'],				
				'created_date' => $created_date,
				'updated_date' => $updated_date,
				'created_by' => $uname				
			);
			
			$this->Group_model->update_group_master( $_POST['id'],$data);	
			$role_id= $_SESSION['role'];		
			//redirect("Company/add_companydata");
			$data['uname'] = $_SESSION['username'];	
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['records'] = $this->Group_model->get_groupmaster();
			
			$data['tab']=1;
			$this->session->set_flashdata('msg', 'Group master updated.');
			$this->load->view('group/define-group',$data);			
		
	}
	public function group_maint()
	{

		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Group_model->get_groupdata();
		$this->load->view('group/groupdefn_landing',$data);
	}
	public function EditGroup($id)
	{
			
		$role_id= $_SESSION['role'];
		$data = array();
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);		
		$data['group_data'] = $this->Group_model->get_single_groupdata($id);	
		$data['group_type'] = $this->Group_model->get_distinct_group_types();
		$data['duration'] = $this->setduration($this->Group_model->get_group_types());
		$data['banks'] = $this->Group_model->get_company_banks();			
		$data['tab']=1;
		$this->load->view('group/create-group',$data);
	}
	public function DeleteGroup()
	{
		$id = $_REQUEST['id'];
		$this->Group_model->delete_group($id);
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];			
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Group_model->get_groupdata();		
		$this->session->set_flashdata('msg', 'Group deleted.');
		$this->load->view('group/groupdefn_landing',$data);	
		
	}
	public function add_Group()
	{			
		$uname = $_SESSION['username'];
		if(isset($_POST['add_group']))
		{			
			$timestamp = time();			
			$created_date= date("Y-m-d", $timestamp);
			
			$updated_date= date("Y-m-d h:i:s");			
			
			$data= array(
				
				'group_type' => $_POST['group_type'],
				'group_duration' => $_POST['group_duration'],
				'group_name' => $this->get_group_name($_POST['group_type'],$_POST['group_duration']),
				'comm_date' => $_POST['comm_date'],
				'term_date' => $this->calc_group_term_date($_POST['group_type'],$_POST['group_duration'],$_POST['comm_date']),
				'chit_amount' => $_POST['chit_amount'],
				'byelaw_date' => $_POST['byelaw_date'],	
				'created_date' => $created_date,
				'created_by' => $uname,
				'updated_date' => $updated_date,
				'updated_by' => $uname,
				'status' => 'ACTIVE'
			);
			
			$id = $this->Group_model->insert_group($data);
			$this->Group_model->insert_first_customer($id,$uname);			
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['group_data']= $this->Group_model->get_single_groupdata($id);
			$data['group_type'] = $this->Group_model->get_distinct_group_types();
			$data['duration'] = $this->setduration($this->Group_model->get_group_types());
			$data['banks'] = $this->Group_model->get_company_banks();				
			$data['tab']=1;
			$this->session->set_flashdata('msg', 'Group added');
			$this->load->view('group/create-group',$data);			
		}		
		else 
		{
			if($this->uri->segment(3))
			{
				$id = $this->uri->segment(3);	
				$data['title']= $id;
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];			
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['group_type'] = $this->Group_model->get_distinct_group_types();
				$data['duration'] = $this->setduration($this->Group_model->get_group_types());	
				$data['banks'] = $this->Group_model->get_company_banks();
				$data['tab']=1;
				$this->load->view('group/create-group',$data);				
			}
			else
			{
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];	
				$cust_id = 0;
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['group_type'] = $this->Group_model->get_distinct_group_types();
				$data['duration'] = $this->setduration($this->Group_model->get_group_types());
				$data['banks'] = $this->Group_model->get_company_banks();								
				$data['tab']=1;
				//$data['group_data']= $this->Group_model->get_cust_bank($cust_id);
				$this->load->view('group/create-group',$data);
			}
		}
	}
	public function edit_Group()
	{			
		$uname = $_SESSION['username'];
		if(isset($_POST['add_group']))
		{			
			$timestamp = time();			
			$created_date= date("Y-m-d", $timestamp);
			
			$updated_date= date("Y-m-d h:i:s");	
			$id = $_POST['id'];			
			$data= array(
				
				'group_type' => $_POST['group_type'],
				'group_duration' => $_POST['group_duration'],
				'group_name' => $this->get_group_name($_POST['group_type'],$_POST['group_duration']),
				'comm_date' => $_POST['comm_date'],
				'term_date' => $this->calc_group_term_date($_POST['group_type'],$_POST['group_duration'],$_POST['comm_date']),
				'chit_amount' => $_POST['chit_amount'],
				'byelaw_date' => $_POST['byelaw_date'],	
				'created_date' => $created_date,
				'created_by' => $uname,
				'updated_date' => $updated_date,
				'updated_by' => $uname,
				'status' => 'ACTIVE'
			);
			
			$this->Group_model->update_group($id,$data);			
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['group_data']= $this->Group_model->get_single_groupdata($id);
			$data['group_type'] = $this->Group_model->get_distinct_group_types();
			$data['duration'] = $this->setduration($this->Group_model->get_group_types());	
			$data['banks'] = $this->Group_model->get_company_banks();
			$data['tab']=1;
			$this->session->set_flashdata('msg', 'Group information updated');
			$this->load->view('group/create-group',$data);			
		}
		if(isset($_POST['add_group_more']))
		{			
			$timestamp = time();			
			$created_date= date("Y-m-d", $timestamp);
			
			$updated_date= date("Y-m-d h:i:s");	
			$id = $_POST['id'];		
			
			$data= array(
				
				'fd_date' => $_POST['fd_date'],
				'fd_number' => $_POST['fd_number'],
				'fd_mat_date' => $_POST['fd_mat_date'],
				'bank_id' => $_POST['bank_id'],
				/*'bank_name' => $_POST['bank_name'],
				'branch_name' => $_POST['branch_name'],
				'account_number' => $_POST['account_number'],*/
				'reg_date' => $_POST['reg_date'],
				'reg_number' => $_POST['reg_number'],		
				'created_date' => $created_date,
				'created_by' => $uname,
				'updated_date' => $updated_date,
				'updated_by' => $uname,
				'status' => 'ACTIVE'
			);
			
			$this->Group_model->update_group($id,$data);			
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['group_data']= $this->Group_model->get_single_groupdata($id);
			$data['group_type'] = $this->Group_model->get_distinct_group_types();
			$data['duration'] = $this->setduration($this->Group_model->get_group_types());
			$data['banks'] = $this->Group_model->get_company_banks();			
			$data['tab']=2;
			$this->session->set_flashdata('msg', 'Group information updated');
			$this->load->view('group/create-group',$data);			
		}
	}
	public function setduration($group_type)
	{
		$duration_array = array();
		$duration_array['daily'] = array();
		$duration_array['weekly'] = array();
		$duration_array['monthly'] = array();
		$daily=array();
		$weekly=array();
		$monthly= array();

		foreach ($group_type as $row) {

			switch ($row->group_type){
				case "DAILY":
					array_push($daily, $row->group_duration);
					break;
				case "WEEKLY":
					array_push($weekly, $row->group_duration);
					break;
				case "MONTHLY":
					array_push($monthly, $row->group_duration);
					break;
			}
		}		
		array_push($duration_array['daily'],$daily);
		array_push($duration_array['weekly'],$weekly);
		array_push($duration_array['monthly'],$monthly);
		return $duration_array;
	}
	//public function remove_customer_from_group($user,$group_id,$cus_id,$no_ticks)
	public function remove_customer_from_group()
	{
		date_default_timezone_set("Asia/Kolkata");
		$all_records = array();
		$group_id="2";
		$cus_id = '16';
		$no_ticks = '5';
		/*$commitment = 'YES';
		$user = '3';
		$exec = '3';
		$coll_exec = '3';
		$agreement = 'YES';*/
		$query = $this->db->query('SELECT min(group_sr_no) as l,max(group_sr_no) as g FROM Group_details where group_id = '.$group_id.' and cust_id= '.$cus_id);				
		$res = $query->result();						
		$row = $res[0]; 
		if ($row->g != ''){
			$sr_no = $row->g+1;
		}else{
			$sr_no = 1;
		}
		for ($i=0; $i < $no_ticks ; $i++) { 

			//delete ticks
			//update sr no and ticket number
			/*$record['group_id'] = $group_id;
			$record['group_sr_no'] = $sr_no+$i;
			$record['cust_id'] = $cus_id;
			$record['ticket_num'] = $sr_no+$i;		
			$record['commitment_YN'] = $commitment;
			$record['executive'] = $exec;
			$record['coll_exec'] = $coll_exec;
			$record['agreement_YN'] = $agreement;
			$record['created_date'] = date("Y-m-d");
			$record['created_by'] = $user;
			$record['updated_by'] = $user;*/
			array_push($all_records, $record);
		}
		
		$this->db->insert_batch('Group_details	',$all_records);
		return true;	

	}
	public function cust_selection()
	{

		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Group_model->get_groupdata();
		$this->load->view('group/groupaddcus_landing',$data);
	}
	public function EditCusGroup($id)
	{
			
		$role_id= $_SESSION['role'];
		$data = array();
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);		
		$data['cust'] = $this->Group_model->get_all_cust();
		$data['staff'] = $this->Group_model->get_all_staff();
		$data['cstaff'] = $this->Group_model->get_all_staff();	
		$data['records'] = $this->Group_model->get_group_cust($id);	
		$data['id'] = $id;					
		$this->load->view('group/add_customertogroup',$data);
	}
	public function add_custtogroup()
	{			
		$uname = $_SESSION['username'];
		if(isset($_POST['add_cust']))
		{
		$cust_id = $_POST['cust_id'];

		for ($i = 0;$i< sizeof($cust_id);$i++){
			$this->add_customer_to_group($uname,$_POST['gid'],$cust_id[$i],$_POST['ticket_num'][$i],$_POST['comm'][$i],$_POST['exec'][$i],$_POST['cexec'][$i],$_POST['agreement'][$i]);
		}
		redirect("Group/EditCusGroup/".$_POST['gid']);
			
		}
	}		
}

?>	