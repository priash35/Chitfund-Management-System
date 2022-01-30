<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {
		
	public function __construct()
	{
		//parent::Controller();
		parent::__construct();
		if (!isset($_SESSION['user_logged'])) {
			
			$this->session->set_flashdata("error", "please login first view of page");
			redirect("login/index","refresh");
		}
		$this->load->library('form_validation');
		$this->load->model('Admin_model');	
		$this->load->model('Group_model');	
		$this->load->model('Collection_model');		
	}	
		
	public function daily_collection()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['cust'] = $this->Group_model->get_all_cust();
		$data['cstaff'] = $this->Collection_model->get_all_executives();
		//$data['groups'] = $this->Group_model->get_groupdata();
		$this->load->view('collection/collection',$data);
	}
	public function add_collection()
	{
		date_default_timezone_set("Asia/Kolkata");
		$name = $_SESSION['userid'];
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);
		$all_coll_records = array();
		$all_bank_records = array();
		//$updated_date= date("Y-m-d h:i:s");	
		
		if(isset($_POST['save']) || isset($_POST['add_collection']))
		{
			//$data['cust'] = $this->Group_model->get_all_cust();

			$bankdata = array();
			$cnt = $_POST['cnt'];
			$status = 'OPEN';
			
			for($i=0; $i<$cnt; $i++)
			{	
				if($_POST['payment']=="Cash")
				{
					if(!empty($_POST['amount'][$i])){
						$type = 1;
						$uploadData['coll_date'] = $_POST['date'];
						$uploadData['group_id'] = $_POST['group'];
	                    $uploadData['coll_exec_id'] = $_POST['executive'];
						$uploadData['cust_id'] = $_POST['cust_id'][$i];
						$uploadData['amount'] = $_POST['amount'][$i];
						$uploadData['tran_type'] = 'CREDIT';
						$uploadData['collection_type'] = 'MANUAL';
						$uploadData['mode'] = 'CASH';
	                    $uploadData['created_date'] = $created_date;
						$uploadData['created_by'] = $name;
						$uploadData['updated_by'] = $name;
						if (isset($_POST['add_collection'])){
							$status = 'CLOSED';
						}

						//$uploadData[$i]['updated_date'] = $created_date;
						array_push($all_coll_records, $uploadData);

					}
					
				}
				else if($_POST['payment']=="Others")
				{
					
					if(!empty($_POST['p_mode'][$i]) && !empty($_POST['amount'][$i])){
						
						
						$type = 2;
						$uploadData['coll_date'] = $_POST['date'];
						$uploadData['group_id'] = $_POST['group'];
	                    $uploadData['coll_exec_id'] = $_POST['executive'];
						$uploadData['cust_id'] = $_POST['cust_id'][$i];
						$uploadData['amount'] = $_POST['amount'][$i];
						$uploadData['tran_type'] = 'CREDIT';
						$uploadData['collection_type'] = 'MANUAL';
						$uploadData['mode'] = $_POST['p_mode'][$i];						
						$uploadData['cheq_num'] = $_POST['cheq'][$uploadData['cust_id']];						
	                    $uploadData['created_date'] = $created_date;
						$uploadData['created_by'] = $name;
						$uploadData['updated_by'] = $name;
						if (isset($_POST['add_collection'])){
							$status = 'CLOSED';
						}
						
						if(empty($_POST['cheq'][$uploadData['cust_id']]) && empty($_POST['amount'][$i]) && empty($_POST['p_mode'][$i]) && empty($_POST['b_name'][$uploadData['cust_id']]) && empty($_POST['br_name'][$uploadData['cust_id']]) && empty($_POST['new_amount']))
						{
							$this->session->set_flashdata('msg1', 'Please add Cheque details');
						}
						
						$uploadData['chqdd_num'] = $_POST['cheq'][$uploadData['cust_id']];
						$uploadData['chqdd_amount'] = $_POST['amount'][$i];
						$uploadData['type'] = $_POST['p_mode'][$i];
						$uploadData['bank_name'] = $_POST['b_name'][$uploadData['cust_id']];
						$uploadData['branch_name'] = $_POST['br_name'][$uploadData['cust_id']];	
						$uploadData['other_group']=$_POST['new_amount'];		
						
						array_push($all_coll_records, $uploadData);
						
					}
				}
			}
		
			if (!empty($all_coll_records)){
				$result= $this->Collection_model->add_collection_data($all_coll_records,$type,$status);
				$this->session->set_flashdata('msg', 'Collection Recorded');
			}else{
				$this->session->set_flashdata('msg1', 'No Collection Recorded');
			}
			
		}
		
		
		redirect('Collection/daily_collection', 'refresh');
	}

	public function get_groups()
	{
		$exec_id = $this->input->post('exec');
		
		$data['result'] = $this->Collection_model->get_groups($exec_id);
		$output = null;
		$output.= "<option>Select Group</option>";
		foreach($data['result'] as $row)
		{
			$output.= "<option value='".$row->id."'>".$row->group_name."</option>";
		}
		echo $output;
		//echo json_encode($result);
	}
	
	public function get_cust()
	{
		$role_id= $_SESSION['role'];
		$group_id = $this->input->post('group_id');
		$exec_id = $this->input->post('exec_id');
		$date = $this->input->post('date');
		$my_date = date('Y-m-d', strtotime($date));
		$cleared=0;
		$uncleared=0;
		$outstanding=0;

		//$data = $this->Collection_model->get_all_cust($exec_id,$group_id);

		$data['result'] = $this->Collection_model->get_all_cust($exec_id,$group_id,$my_date);

		
		$cnt = count($data['result']);
		$output = null;
		$i=0;
		foreach($data['result'] as $row)
		{
			//$record = $this->Collection_model->get_cust_group($row->id);
			 $outstanding =  $this->Collection_model->calculate_outstanding($group_id,$row->id,$my_date);
			/*$clear_stat = $this->Collection_model->get_checkstatus($group_id,$row->id,$my_date);
			if (is_array($clear_stat)){
				if ($clear_stat['status'] == 'ENCASHED'){
					$cleared=$clear_stat['amount'];
				}else{
					$uncleared=$clear_stat['amount'];
				}
			} */

			if ($row->status == 'CLOSED' && $role_id != 1){
				$output.= '<tr id="new_row"><td>'.$row->first_name.' '.$row->last_name.'<input id="cust_id" name="cust_id[]" type="hidden" class="form-control" value="'.$row->id.'" ><input id="cnt" name="cnt" type="hidden" class="form-control" value="'.$cnt.'" ></td>	<td>'.$outstanding.'</td><td class="mode"><select id="p_mode" name="p_mode[]" class="form-control"><option value="">Select Payment Mode</option><option value="CHEQUE">Cheque</option><option value="TRANSFER">Transfer</option><option value="DD">DD</option><option value="ADJUSTMENT">Adjustment</option></select></td><td>'.$row->c_amt.'</td><td><input id="amount" name="amount[]" type="text" class="form-control" value="" readonly></td><td class="mode"><input id="cleared[]" name="cleared" type="text" class="form-control" value="'.$cleared.'" readonly></td><td class="mode"><input id="uncleared[]" name="uncleared" type="text" class="form-control" value="'.$uncleared.'" readonly></td><td></td></tr>';
			}else{
				$output.= '<tr id="new_row"><td>'.$row->first_name.' '.$row->last_name.'<input id="cust_id" name="cust_id[]" type="hidden" class="form-control" value="'.$row->id.'" ><input id="cnt" name="cnt" type="hidden" class="form-control" value="'.$cnt.'" ></td>	<td>'.$outstanding.'</td><td class="mode"><select id="p_mode" name="p_mode[]" class="form-control"><option value="">Select Payment Mode</option><option value="CHEQUE">Cheque</option><option value="TRANSFER">Transfer</option><option value="DD">DD</option><option value="ADJUSTMENT">Adjustment</option></select></td><td>'.$row->c_amt.'</td><td><input id="amount" name="amount[]" type="text" class="form-control" value="" title="'.$row->id.'"></td><td class="mode"><input id="cleared[]" name="cleared" type="text" class="form-control" value="'.$cleared.'" ></td><td class="mode"><input id="uncleared[]" name="uncleared" type="text" class="form-control" value="'.$uncleared.'" ></td><td class="mode "><button type="button" class="btn btn-maroon waves-effect waves-light cheque" data-toggle="modal" data-target="#signup-modal" name="chequedd"  id="'.$row->id.'" disabled>Cheque</button></td></tr>';
			}
			//$output.= '<input id="cust_id" name="cust_id[]" type="hidden" class="form-control" value="'.$row->id.'" >';
			$i++;
		}
		echo $output; 
		//echo json_encode($result);
	}
	public function get_cust_group()
	{
		$id = $this->input->post('id');	
		$data = $this->Collection_model->get_cust_group($id);
		echo json_encode($data);
	}
	
	public function check_names()
	{	
		$bank = trim($this->input->post('bank'));
		$cheque = trim($this->input->post('cheq'));
		
		$result = $this->Collection_model->check_name_values($bank,$cheque);
		if($result)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
		
	public function cheque_clear()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['banks'] = $this->Collection_model->get_bankdata();
		$this->load->view('collection/cheque_clear',$data);
	}
	public function update_cheqdd()
	{	
		$bank_id = $this->uri->segment(3); 
		//$bank_id = $_REQUEST['bank_id'];
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['cheq_data'] = $this->Collection_model->get_chq_dates($bank_id);
		//$data['bank_id'] = $bank_id;
		$status_array = array('RECIEVED','DEPOSITED','ENCASHED','BOUNCED');
		$data['chq_status'] = $status_array;
		/* print_r($data);
		die(); */
		$this->load->view('collection/update_cheque_details',$data);
	}
	public function update_cheqdd_details()
	{		
		date_default_timezone_set("Asia/Kolkata");
		$name = $_SESSION['userid'];
		$timestamp = time();			
		$updated_date= date("Y-m-d", $timestamp);
		//$all_bank_records = array();
		
		if(isset($_POST['update_cheque']))
		{
			$id = $_POST['bank_id'];
			$data = array(
				'chqdd_date' => $_POST['chq_date'],
				'deposit_date' => $_POST['deposit_date'],
				'clear_date' => $_POST['clear_date'],
				'status' => $_POST['c_status'],
				'updated_by' => $name,
				'updated_date' => $updated_date
				
			);
			
			$result = $this->Collection_model->update_bank_details($data, $id);
			$this->session->set_flashdata('msg', 'Cheque details updated.');
		} 
		
		redirect('Collection/cheque_clear', 'refresh');
	}
}

?>
